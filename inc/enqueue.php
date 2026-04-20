<?php

/**
 * redapple enqueue scripts
 *
 * @package redapple
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (!function_exists('understrap_scripts')) {
    /**
     * Load theme's JavaScript and CSS sources.
     */
    function understrap_scripts()
    {
        // Get the theme data.
        $theme_version = time();

        wp_enqueue_style('enq-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), $theme_version);
        wp_enqueue_style('enq-meanmenu', get_template_directory_uri() . '/assets/css/meanmenu.css', array(), $theme_version);
        wp_enqueue_style('enq-all', get_template_directory_uri() . '/assets/css/all.min.css', array(), $theme_version);
        wp_enqueue_style('enq-swiper-bundle', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', array(), $theme_version);
        wp_enqueue_style('enq-magnific', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), $theme_version);
        wp_enqueue_style('enq-animate', get_template_directory_uri() . '/assets/css/animate.css', array(), $theme_version);
        wp_enqueue_style('enq-nice-select', get_template_directory_uri() . '/assets/css/nice-select.css', array(), $theme_version);
        wp_enqueue_style('enq-style', get_template_directory_uri() . '/assets/css/style.css', array(), $theme_version);
        wp_enqueue_style('enq-custom', get_template_directory_uri() . '/assets/css/custom.css', array(), $theme_version);
        wp_enqueue_style('enq-theme-style', get_stylesheet_uri());


        wp_enqueue_script('jquery');


        wp_enqueue_script('enq-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), $theme_version, true);
        wp_enqueue_script('enq-meanmenu', get_template_directory_uri() . '/assets/js/meanmenu.js', array(), $theme_version, true);
        wp_enqueue_script('enq-swiper-bundle', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array(), $theme_version, true);
        wp_enqueue_script('enq-counterup', get_template_directory_uri() . '/assets/js/jquery.counterup.min.js', array(), $theme_version, true);
        wp_enqueue_script('enq-slicknav', get_template_directory_uri() . '/assets/js/jquery.slicknav.js', array(), $theme_version, true);
        wp_enqueue_script('enq-wow', get_template_directory_uri() . '/assets/js/wow.min.js', array(), $theme_version, true);
        wp_enqueue_script('enq-magnific', get_template_directory_uri() . '/assets/js/magnific-popup.min.js', array(), $theme_version, true);
        wp_enqueue_script('enq-nice-select', get_template_directory_uri() . '/assets/js/nice-select.min.js', array(), $theme_version, true);
        wp_enqueue_script('enq-isotope', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array(), $theme_version, true);
        wp_enqueue_script('enq-waypoints', get_template_directory_uri() . '/assets/js/jquery.waypoints.js', array(), $theme_version, true);
        wp_enqueue_script('enq-gsap', get_template_directory_uri() . '/assets/js/gsap/gsap.min.js', array(), $theme_version, true);
        wp_enqueue_script('enq-ScrollTrigger', get_template_directory_uri() . '/assets/js/gsap/ScrollTrigger.min.js', array(), $theme_version, true);
        wp_enqueue_script('enq-ScrollSmoother', get_template_directory_uri() . '/assets/js/gsap/ScrollSmoother.min.js', array(), $theme_version, true);
        wp_enqueue_script('enq-script', get_template_directory_uri() . '/assets/js/script.js', array(), $theme_version, true);
        wp_enqueue_script('enq-custom-gsap', get_template_directory_uri() . '/assets/js/custom-gsap.js', array(), $theme_version, true);

        wp_enqueue_script('enq-ajax-data', get_template_directory_uri() . '/assets/js/ajax-data.js', array(), $theme_version, true);


        wp_localize_script('enq-ajax-data', 'action_url_ajax', [
            'ajax_url' => admin_url('admin-ajax.php'),
        ]);


        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }
} // End of if function_exists( 'understrap_scripts' ).

add_action('wp_enqueue_scripts', 'understrap_scripts');
