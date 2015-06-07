<?php
/**
 * Core rdt-rnr15 file
 * @author sirna <https://github.com/zabkasirna>
 * @since 0.0.0
 */

/**
 * HEAD CLEANUP
 */

function rr_head_cleanup() {

    // EditURI link
    remove_action( 'wp_head', 'rsd_link' );
    // windows live writer
    remove_action( 'wp_head', 'wlwmanifest_link' );
    // previous link
    remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
    // start link
    remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
    // links for adjacent posts
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
    // WP version
    remove_action( 'wp_head', 'wp_generator' );
    // remove WP version from css
    add_filter( 'style_loader_src', 'rr_remove_wp_ver_css_js', 9999 );
    // remove Wp version from scripts
    add_filter( 'script_loader_src', 'rr_remove_wp_ver_css_js', 9999 );

} /* end po15 head cleanup */

// remove WP version from RSS
function rr_rss_version() { return ''; }

// remove WP version from scripts
function rr_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) ) $src = remove_query_arg( 'ver', $src );
    return $src;
}

// remove injected CSS from gallery
function rr_gallery_style($css) {
    return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
}

/**
 * SCRIPTS & ENQUEUEING
 */

function rr_scripts_and_styles() {

    global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

    if (!is_admin()) {

        // modernizr
        wp_register_script( 'rr-modernizr', get_template_directory_uri() . '/script/vendor/modernizr/modernizr.js', array(), '', false );

        // jquery
        wp_register_script( 'rr-jquery', get_template_directory_uri() . '/script/vendor/jquery/dist/jquery.js', array(), '', true );

        // waypoints
        wp_register_script( 'rr-waypoints', get_template_directory_uri() . '/script/vendor/waypoints/lib/jquery.waypoints.js', array( 'rr-jquery' ), '', true );

        // jquery transit
        wp_register_script( 'rr-transit', get_template_directory_uri() . '/script/vendor/jquery.transit/jquery.transit.js', array( 'rr-jquery' ), '', true );

        // site
        wp_register_script( 'rr-js', get_template_directory_uri() . '/script/main.js', array( 'rr-jquery' ), '', true );

        // enqueue scripts
        wp_enqueue_script( 'rr-modernizr' );
        wp_enqueue_script( 'rr-jquery' );
        wp_enqueue_script( 'rr-waypoints' );
        wp_enqueue_script( 'rr-transit' );
        wp_enqueue_script( 'rr-js' );

        // dequeue scripts
        wp_deregister_script( 'jquery-migrate' );
        wp_deregister_script( 'jquery-core' );

        // main stylesheet
        wp_register_style( 'rr-stylesheet', get_stylesheet_directory_uri() . '/style.css', array(), '', 'all' );

        // ie-only stylesheet
        // @todo: Develop ie-only stylesheet
        wp_register_style( 'rr-stylesheet', get_stylesheet_directory_uri() . '/style.ie.css', array(), '' );

        // enqueue styles
        wp_enqueue_style( 'rr-stylesheet' );
        wp_enqueue_style( 'rr-ie-only' );

        $wp_styles->add_data( 'rr-ie-only', 'conditional', 'lt IE 9' ); // add conditional wrapper around ie stylesheet
    }
}

// Admin script queue
function rr_admin_scripts_and_styles() {}

/**
 * THEME SUPPORT
 */

function rr_theme_support() {


    // wp thumbnails (sizes handled in functions.php)
    add_theme_support( 'post-thumbnails' );

    // image sizes
    set_post_thumbnail_size(1200, 9999);

    // wp rss
    // add_theme_support('automatic-feed-links');

} /* end rr theme support */

/**
 * MENUS
 */

// Register Navigation Menus
function register_rr_nav_menus() {

    $locations = array(
        'main-navi' => __( 'Site main navigations', 'text_domain' )
    );
    register_nav_menus( $locations );
}


/**
 * OTHER CLEANUPS
 */

// remove the p from around imgs
// [ http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/ ]
function rr_filter_ptags_on_images($content){
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

/**
 * PO Campaign Plugin
 * [ http://justintadlock.com/archives/2010/02/02/showing-custom-post-types-on-your-home-blog-page ]
 */
function get_campaign_for_home( $query ) {

    if ( is_home() && $query->is_main_query() )
        $query->set( 'post_type', array( 'campaign' ) );

    return $query;
}

?>
