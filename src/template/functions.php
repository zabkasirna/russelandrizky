<?php
/**
 * @author sirna <https://github.com/zabkasirna>
 * @since 0.0.0
 */

// Load Sirna debugger
// @todo make this automatically detect dev env
require_once( 'printrr.php' );

// Load theme's core
require_once( 'rdt-rnr15.php' );

// Conf at theme launch
function rr_conf() {

    // Head cleanup
    add_action( 'init', 'rr_head_cleanup' );

    // Menu
    add_action( 'init', 'register_rr_nav_menus' );

    // Remove wp version from rss
    add_filter( 'the_generator', 'rr_rss_version' );

    // Enqueue scripts & styles
    add_action( 'wp_enqueue_scripts', 'rr_scripts_and_styles', 999 );

    // theme support after theme setup
    rr_theme_support();

    // clean up random code around images
    add_filter( 'the_content', 'rr_filter_ptags_on_images' );
}

add_action( 'after_setup_theme', 'rr_conf' );

/** Navigation */
function toggle_nav_class( $classes, $item ) {
    if ( in_array( 'current-menu-item', $classes ) ) {
        $classes[] = 'active';
    }

    return $classes;
}

add_filter( 'nav_menu_css_class', 'toggle_nav_class', 10, 2 );

/** Debugger */
add_filter( 'template_include', 'var_template_include', 1000 );
function var_template_include( $t ){
    $GLOBALS['current_theme_template'] = basename($t);
    return $t;
}

function get_current_template( $echo = false ) {
    if( !isset( $GLOBALS['current_theme_template'] ) )
        return false;
    if( $echo )
        echo $GLOBALS['current_theme_template'];
    else
        return $GLOBALS['current_theme_template'];
}
?>