<?php

// Disable automatic WordPress plugin updates:
add_filter( 'auto_update_plugin', '__return_false' );

// Disable automatic WordPress theme updates:
add_filter( 'auto_update_theme', '__return_false' );

// Diable wp-includes/ jQuery
if (!is_admin()):
    // Remove emoji style and script
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
endif;

// Enqueue script & style
add_action('wp_enqueue_scripts', 'ocm_enqueue_style_and_script');
function ocm_enqueue_style_and_script() {
    // Enqueue Style
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('bootstrap-css',get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('slick-css',get_template_directory_uri() . '/assets/css/slick.css');
    wp_enqueue_style('theme-css',get_template_directory_uri() . '/assets/css/theme.css');


    // Deregister admin script
    if (!is_admin()) :
        wp_deregister_script('jquery');
    endif;

    // Enqueue Script
    wp_register_script('jquery', get_template_directory_uri().'/assets/js/jquery.min.js');
    wp_register_script('bootstrap-js', get_template_directory_uri().'/assets/js/bootstrap.min.js', 'jquery' );
    wp_register_script('slick-js', get_template_directory_uri().'/assets/js/slick.min.js', 'jquery' );
    wp_register_script('custom-js', get_template_directory_uri().'/assets/js/custom.js', 'jquery' );

    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-js');
    wp_enqueue_script('slick-js');
    wp_enqueue_script('mCustomScrollbar-js');
    wp_enqueue_script('custom-js');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */

function ocm_theme_support() {

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
    // remove logged in header bar
    add_filter( 'show_admin_bar', '__return_false' );
    // Custom background color.
    add_theme_support(
        'custom-background',
        array(
            'default-color' => 'f5efe0',
        )
    );

    // Set content-width.
    global $content_width;
    if ( ! isset( $content_width ) ) {
        $content_width = 580;
    }

    add_theme_support( 'post-thumbnails' );

    // Set post thumbnail size.
    set_post_thumbnail_size( 1200, 9999 );

    // Add custom image size used in Cover Template.
    add_image_size( 'ocm-fullscreen', 1980, 9999 );

    // Custom logo.
    $logo_width  = 120;
    $logo_height = 90;

    add_theme_support(
        'custom-logo',
        array(
            'height'      => $logo_height,
            'width'       => $logo_width,
            'flex-height' => true,
            'flex-width'  => true,
        )
    );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style',
        )
    );
}

add_action( 'after_setup_theme', 'ocm_theme_support' );


/**
 * Register navigation menus uses wp_nav_menu
 */

function ocm_menus() {
    $locations = array(
        'primary'  => __( 'Header Menu', 'ocm' )
    );
    register_nav_menus( $locations );
}
add_action( 'init', 'ocm_menus' );


// Filter in Search Toggle to end of primary menu
add_filter('wp_nav_menu_items', 'wpb_add_search_toggle', 10, 2);
function wpb_add_search_toggle($items, $args) {
    if( $args->theme_location == 'primary' ) //Swap to your location
        $items .= '<li class="search search-wpb"><a href="javascript:void(0);" class="search-icon" > <img src="'.get_template_directory_uri().'/assets/images/fa-fa-search-icon.png;"> </a><div style="display:none;" class="wpbsearchform">'. get_search_form(false) .'</div></li>';
    return $items;
}


/**
 * Post view
 */
function post_view_count($postID) {
    $count_post_key = '_post_views_count';
    $count_post = get_post_meta($postID, $count_post_key, true);
    if($count_post ==''):
        $count_post = 1;
        delete_post_meta($postID, $count_post_key);
        add_post_meta($postID, $count_post_key, '1');
    else:
        $count_post++;
        update_post_meta($postID, $count_post_key, $count_post);
    endif;
}
