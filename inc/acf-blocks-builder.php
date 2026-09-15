<?php

/**
 * ACF blocks builder
 *
 * Auto-registers an ACF block for every render template found under:
 *
 *   /page-templates/page-blocks/<area>/<file>.php
 *
 * Examples:
 *   /page-templates/page-blocks/home/sec-1.php       → block "home-sec-1"
 *   /page-templates/page-blocks/about-us/sec-1.php   → block "about-us-sec-1"
 *
 * It scans EVERY subfolder at any depth, so dropping in a new sec-*.php file
 * registers a new block automatically — no need to edit this file.
 *
 * The subfolder (home, about-us, …) becomes the block's editor category, so
 * blocks group by area in the inserter. The template file is used as the
 * render template and has access to $block, $content, $is_preview and $post_id.
 *
 * The matching ACF field group for each block lives in
 *   /page-templates/acf-fields/<area>/<file>.php
 * and is auto-loaded by redapple_autoload_acf_fields() in functions.php.
 *
 * @package redapple
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (! function_exists('redapple_block_root')) {
    /**
     * Resolve the block-templates root folder.
     *
     * Accepts either "page-blocks" (this theme) or "pages-block" (naming used
     * by some sibling themes), whichever exists — so the two stay compatible.
     *
     * @return string Absolute path with trailing slash, or '' if none exists.
     */
    function redapple_block_root()
    {
        foreach (array('page-blocks', 'pages-block') as $folder) {
            $path = get_template_directory() . '/page-templates/' . $folder . '/';
            if (is_dir($path)) {
                return $path;
            }
        }

        return '';
    }
}

if (! function_exists('redapple_get_block_files')) {
    /**
     * Recursively collect every .php render template inside the block-templates tree.
     *
     * @return array List of absolute file paths, ordered deterministically.
     */
    function redapple_get_block_files()
    {
        $block_root = redapple_block_root();

        if ('' === $block_root) {
            return array();
        }

        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($block_root, FilesystemIterator::SKIP_DOTS)
        );

        $files = array();
        foreach ($iterator as $file_info) {
            if ($file_info->isFile() && 'php' === strtolower($file_info->getExtension())) {
                $files[] = $file_info->getPathname();
            }
        }

        // e.g. about-us/ before home/, sec-1.php before sec-2.php.
        sort($files, SORT_STRING);

        return $files;
    }
}

if (! function_exists('redapple_block_meta_from_path')) {
    /**
     * Derive a block's name, title and category slug from its file path.
     *
     * @param string $file Absolute path to a block template.
     * @return array { name, title, area, category }
     */
    function redapple_block_meta_from_path($file)
    {
        // Normalise separators first — on Windows the file iterator returns
        // backslash paths, which broke the old prefix stripping.
        $file = wp_normalize_path($file);

        $file_slug = basename($file, '.php');    // "sec-1"          (php file name)
        $area      = basename(dirname($file));   // "home"/"about-us" (holder folder)

        // Fallback if a template sits directly in the root with no subfolder.
        if ('' === $area || 'page-blocks' === $area || 'pages-block' === $area) {
            $area = 'general';
        }

        return array(
            'name'     => sanitize_title($area . '-' . $file_slug),                   // "home-sec-1"
            'title'    => ucwords(str_replace('-', ' ', $area . ' ' . $file_slug)),   // "Home Sec 1"
            'area'     => $area,
            'category' => 'redapple-' . sanitize_title($area),                        // "redapple-home"
        );
    }
}

/**
 * Register all discovered blocks with ACF.
 */
function theme_modules_init()
{
    if (! function_exists('acf_register_block_type')) {
        return;
    }

    $block_files = redapple_get_block_files();

    if (empty($block_files)) {
        return;
    }

    /*
     * The shared block icon, inline rather than read off disk: it is editor
     * chrome, so it should not depend on a file living in the theme folder,
     * and building it once here costs nothing per block.
     */
    $block_icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">'
        . '<circle cx="8" cy="8" r="7" fill="none" stroke="currentColor" stroke-width="1.4"/>'
        . '<circle cx="8" cy="8" r="2.6" fill="currentColor"/>'
        . '</svg>';

    foreach ($block_files as $file) {

        $meta = redapple_block_meta_from_path($file);

        acf_register_block_type(array(
            'name'            => $meta['name'],
            'title'           => $meta['title'],
            'category'        => $meta['category'],
            'icon'            => $block_icon,
            // 'edit' = show the ACF fields inline in the block canvas (not the sidebar).
            'mode'            => 'edit',
            'align'           => 'wide',
            // NOTE: do NOT enable 'jsx' / InnerBlocks support here. A block that
            // supports InnerBlocks is forced to render in PREVIEW mode in the
            // editor (so the inner blocks can be placed), which hides the fields
            // from the canvas and pushes them into the sidebar / expanded editor.
            // We don't use InnerBlocks, so leaving it off keeps fields inline.
            'supports'        => array(
                'anchor' => true,
                'mode'   => true,
                'align'  => false,
            ),
            'render_callback' => function ($block, $content = '', $is_preview = false, $post_id = 0) use ($file) {
                // The template can use $block, $content, $is_preview, $post_id and get_field().
                include $file;
            },
        ));
    }
}
add_action('acf/init', 'theme_modules_init');

/**
 * Keep every ACF block open in EDIT mode in the editor.
 *
 * Registering the blocks with 'mode' => 'edit' only sets the default for a
 * block that has never been saved with a mode of its own. Once "preview" is
 * stored in the block's comment in post_content it wins, and that block keeps
 * reopening in preview mode with its fields hidden.
 *
 * The script filters the `mode` attribute as blocks are parsed out of
 * post_content, so every acf/* block starts in edit mode no matter what is
 * stored — without dispatching anything, so the post is not flagged as having
 * unsaved changes. See assets/js/admin-blocks.js.
 */
function redapple_enqueue_block_editor_assets()
{
    $handle   = 'redapple-admin-blocks';
    $rel_path = '/assets/js/admin-blocks.js';
    $abs_path = get_template_directory() . $rel_path;

    if (! file_exists($abs_path)) {
        return;
    }

    wp_enqueue_script(
        $handle,
        get_template_directory_uri() . $rel_path,
        array('wp-hooks', 'wp-blocks'),
        filemtime($abs_path),
        true
    );
}
add_action('enqueue_block_editor_assets', 'redapple_enqueue_block_editor_assets');

/**
 * Register one editor block category per block-templates subfolder, so the
 * auto-registered blocks group by area (Home, About Us, …) in the inserter.
 *
 * @param array $categories Existing block categories.
 * @return array
 */
function redapple_register_block_categories($categories)
{
    $block_root = redapple_block_root();

    if ('' === $block_root) {
        return $categories;
    }

    $existing = wp_list_pluck($categories, 'slug');

    foreach (glob($block_root . '*', GLOB_ONLYDIR) as $dir) {
        $area = basename($dir);
        $slug = 'redapple-' . sanitize_title($area);

        if (in_array($slug, $existing, true)) {
            continue;
        }

        $categories[] = array(
            'slug'  => $slug,
            'title' => ucwords(str_replace('-', ' ', $area)) . ' Blocks',
        );
        $existing[] = $slug;
    }

    return $categories;
}
add_filter('block_categories_all', 'redapple_register_block_categories');
