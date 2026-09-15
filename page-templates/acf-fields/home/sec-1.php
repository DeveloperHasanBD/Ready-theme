<?php

/**
 * ACF fields — Home / Section 1 (Hero carousel)
 *
 * Shown on the "Home Sec 1" block (acf/home-sec-1). Auto-loaded on acf/init
 * by redapple_autoload_acf_fields() in functions.php.
 *
 * One repeater of slides. Each slide picks a type — Video background,
 * Event / Trade show, or Promo / Message — and only the fields for that type
 * are shown. Render template: page-templates/page-blocks/home/sec-1.php.
 *
 * @package redapple
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (! function_exists('acf_add_local_field_group')) {
    return;
}

acf_add_local_field_group(array(
    'key'    => 'group_home_sec_1',
    'title'  => 'Home — Section 1 (Hero Carousel)',
    'fields' => array(

        array(
            'key'          => 'field_home_sec_1_slides',
            'label'        => 'Slides',
            'name'         => 'hero_slides',
            'type'         => 'repeater',
            'instructions' => 'Each slide picks a type; only the fields for that type are shown. The first slide shows first.',
            'min'          => 1,
            'layout'       => 'block',
            'button_label' => 'Add Slide',
            'sub_fields'   => array(

                // ---- Slide type ------------------------------------------------
                array(
                    'key'           => 'field_hs1_type',
                    'label'         => 'Slide Type',
                    'name'          => 'slide_type',
                    'type'          => 'select',
                    'choices'       => array(
                        'video' => 'Video background',
                        'event' => 'Event / Trade show',
                        'promo' => 'Promo / Message',
                    ),
                    'default_value' => 'event',
                    'return_format' => 'value',
                    'wrapper'       => array('width' => '100'),
                ),

                // ---- Background ------------------------------------------------
                array(
                    'key'           => 'field_hs1_bg_image',
                    'label'         => 'Background Image',
                    'name'          => 'bg_image',
                    'type'          => 'image',
                    'return_format' => 'url',
                    'preview_size'  => 'medium',
                    'library'       => 'all',
                    'mime_types'    => 'jpg,jpeg,png,webp',
                    'instructions'  => 'Background for Event / Promo slides.',
                    'wrapper'       => array('width' => '50'),
                    'conditional_logic' => array(
                        array(
                            array('field' => 'field_hs1_type', 'operator' => '!=', 'value' => 'video'),
                        ),
                    ),
                ),
                array(
                    'key'           => 'field_hs1_bg_video',
                    'label'         => 'Background Video',
                    'name'          => 'bg_video',
                    'type'          => 'file',
                    'return_format' => 'url',
                    'library'       => 'all',
                    'mime_types'    => 'mp4,webm',
                    'instructions'  => 'Autoplaying, muted, looping background video.',
                    'wrapper'       => array('width' => '50'),
                    'conditional_logic' => array(
                        array(
                            array('field' => 'field_hs1_type', 'operator' => '==', 'value' => 'video'),
                        ),
                    ),
                ),
                array(
                    'key'           => 'field_hs1_bg_poster',
                    'label'         => 'Video Poster',
                    'name'          => 'bg_video_poster',
                    'type'          => 'image',
                    'return_format' => 'url',
                    'preview_size'  => 'medium',
                    'library'       => 'all',
                    'mime_types'    => 'jpg,jpeg,png,webp',
                    'instructions'  => 'Still shown while the video loads.',
                    'wrapper'       => array('width' => '50'),
                    'conditional_logic' => array(
                        array(
                            array('field' => 'field_hs1_type', 'operator' => '==', 'value' => 'video'),
                        ),
                    ),
                ),

                // ---- Event / Trade show ---------------------------------------
                array(
                    'key'          => 'field_hs1_eyebrow',
                    'label'        => 'Eyebrow',
                    'name'         => 'eyebrow',
                    'type'         => 'text',
                    'instructions' => 'Small line above the title, e.g. "SEE YOU SOON AT".',
                    'wrapper'      => array('width' => '50'),
                    'conditional_logic' => array(
                        array(
                            array('field' => 'field_hs1_type', 'operator' => '==', 'value' => 'event'),
                        ),
                    ),
                ),
                array(
                    'key'          => 'field_hs1_title',
                    'label'        => 'Title',
                    'name'         => 'title',
                    'type'         => 'textarea',
                    'rows'         => 2,
                    'new_lines'    => '',
                    'instructions' => 'Main title. Use <br> for line breaks.',
                    'wrapper'      => array('width' => '50'),
                    'conditional_logic' => array(
                        array(
                            array('field' => 'field_hs1_type', 'operator' => '==', 'value' => 'event'),
                        ),
                    ),
                ),
                array(
                    'key'           => 'field_hs1_title_blue',
                    'label'         => 'Blue Title',
                    'name'          => 'title_blue',
                    'type'          => 'true_false',
                    'ui'            => 1,
                    'instructions'  => 'Use the blue title style.',
                    'wrapper'       => array('width' => '50'),
                    'conditional_logic' => array(
                        array(
                            array('field' => 'field_hs1_type', 'operator' => '==', 'value' => 'event'),
                        ),
                    ),
                ),
                array(
                    'key'          => 'field_hs1_booth',
                    'label'        => 'Booth',
                    'name'         => 'booth',
                    'type'         => 'textarea',
                    'rows'         => 2,
                    'new_lines'    => '',
                    'instructions' => 'e.g. "BOOTH #1557". Use <br> for line breaks.',
                    'wrapper'      => array('width' => '50'),
                    'conditional_logic' => array(
                        array(
                            array('field' => 'field_hs1_type', 'operator' => '==', 'value' => 'event'),
                        ),
                    ),
                ),
                array(
                    'key'           => 'field_hs1_booth_white',
                    'label'         => 'White Booth Text',
                    'name'          => 'booth_white',
                    'type'          => 'true_false',
                    'ui'            => 1,
                    'wrapper'       => array('width' => '50'),
                    'conditional_logic' => array(
                        array(
                            array('field' => 'field_hs1_type', 'operator' => '==', 'value' => 'event'),
                        ),
                    ),
                ),
                array(
                    'key'           => 'field_hs1_badge',
                    'label'         => 'Badge Image',
                    'name'          => 'badge_image',
                    'type'          => 'image',
                    'return_format' => 'url',
                    'preview_size'  => 'thumbnail',
                    'library'       => 'all',
                    'instructions'  => 'Optional badge shown between booth lines (e.g. Innovation Lounge).',
                    'wrapper'       => array('width' => '50'),
                    'conditional_logic' => array(
                        array(
                            array('field' => 'field_hs1_type', 'operator' => '==', 'value' => 'event'),
                        ),
                    ),
                ),
                array(
                    'key'          => 'field_hs1_location',
                    'label'        => 'Location Line',
                    'name'         => 'location',
                    'type'         => 'text',
                    'instructions' => 'Optional extra booth line, e.g. "Location IA-12".',
                    'wrapper'      => array('width' => '50'),
                    'conditional_logic' => array(
                        array(
                            array('field' => 'field_hs1_type', 'operator' => '==', 'value' => 'event'),
                        ),
                    ),
                ),
                array(
                    'key'          => 'field_hs1_meta',
                    'label'        => 'Meta (date / venue)',
                    'name'         => 'meta',
                    'type'         => 'textarea',
                    'rows'         => 3,
                    'new_lines'    => '',
                    'instructions' => 'e.g. "<strong>October 20-23, 2026</strong><br>Messe Düsseldorf<br>Düsseldorf, Germany".',
                    'wrapper'      => array('width' => '100'),
                    'conditional_logic' => array(
                        array(
                            array('field' => 'field_hs1_type', 'operator' => '==', 'value' => 'event'),
                        ),
                    ),
                ),

                // ---- Promo / Message ------------------------------------------
                array(
                    'key'          => 'field_hs1_heading',
                    'label'        => 'Heading',
                    'name'         => 'heading',
                    'type'         => 'textarea',
                    'rows'         => 3,
                    'new_lines'    => '',
                    'instructions' => 'Big headline. Use <br> for line breaks and <span> to accent words.',
                    'wrapper'      => array('width' => '100'),
                    'conditional_logic' => array(
                        array(
                            array('field' => 'field_hs1_type', 'operator' => '==', 'value' => 'promo'),
                        ),
                    ),
                ),
                array(
                    'key'          => 'field_hs1_script',
                    'label'        => 'Script Line',
                    'name'         => 'script_line',
                    'type'         => 'text',
                    'instructions' => 'Optional cursive line, e.g. "Italian History American Vision".',
                    'wrapper'      => array('width' => '100'),
                    'conditional_logic' => array(
                        array(
                            array('field' => 'field_hs1_type', 'operator' => '==', 'value' => 'promo'),
                        ),
                    ),
                ),
                array(
                    'key'          => 'field_hs1_btn_text',
                    'label'        => 'Button Text',
                    'name'         => 'button_text',
                    'type'         => 'text',
                    'instructions' => 'Optional. Leave empty to hide the button.',
                    'wrapper'      => array('width' => '50'),
                    'conditional_logic' => array(
                        array(
                            array('field' => 'field_hs1_type', 'operator' => '==', 'value' => 'promo'),
                        ),
                    ),
                ),
                array(
                    'key'          => 'field_hs1_btn_link',
                    'label'        => 'Button Link',
                    'name'         => 'button_link',
                    'type'         => 'url',
                    'instructions' => 'Where the button goes.',
                    'wrapper'      => array('width' => '50'),
                    'conditional_logic' => array(
                        array(
                            array('field' => 'field_hs1_type', 'operator' => '==', 'value' => 'promo'),
                        ),
                    ),
                ),
            ),
        ),
    ),

    'location' => array(
        array(
            array(
                'param'    => 'block',
                'operator' => '==',
                'value'    => 'acf/home-sec-1',
            ),
        ),
    ),

    'menu_order'      => 0,
    'position'        => 'normal',
    'style'           => 'default',
    'label_placement' => 'top',
    'active'          => true,
));
