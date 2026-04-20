<?php

function theme_modules_init()
{
    // Get all block files from the templates/blocks directory
    $block_dir = get_template_directory() . '/page-templates/blocks/';
    $block_files = glob($block_dir . '*.php');

    if (function_exists('acf_register_block')) {
        foreach ($block_files as $file) {
            $block_name = basename($file, '.php'); // Extract block name from filename
            $block_title = ucwords(str_replace('-', ' ', $block_name)); // Convert slug to readable title
            
            // Load the SVG icon content
            $svg_icon_path = get_template_directory() . '/assets/images/block-icon.svg';
            $block_icon = file_exists($svg_icon_path) ? file_get_contents($svg_icon_path) : '<svg><circle cx="8" cy="8" r="8" fill="#000"/></svg>';

            $acf_block = [
                'name'              => $block_name,
                'title'             => $block_title,
                'category'          => 'formatting',
                'icon'              => $block_icon,
                'mode'              => 'edit',
                'align'             => 'wide',
                'supports'          => [
                    'anchor'    => true,
                    'jsx'       => true,
                    'mode'       => false,
                    'align'     => false,
                ],
                'example'           => [
                    'attributes' => [
                        'mode' => 'preview',
                        'image' => get_template_directory_uri() . '/img/blocks/' . $block_name . '.jpg'
                    ]
                ],
                'render_callback'   => function ($block, $content = '', $is_preview = false, $post_id = 0) use ($file) {
                    include $file; // Directly include the block template file
                },
            ];

            acf_register_block_type($acf_block);
        }
    }
}

add_action('acf/init', 'theme_modules_init');
