<?php
/**
 * @package rdt-rnr15
 * @subpackage plugin/rnr-project
 * @version 0.0.0
 * @since 0.0.0
 */
/*
Plugin Name: RNR Project
Plugin URI: http://github.com/zabkasirna/russelandrizky
Description: Plugin for Project Custom Post
Author: Sirna
Version: 0.0.0
Author URI: http://github.com/zabkasirna
*/

// Register Custom Post Type
function register_cpt_project() {

    $labels = array(
        'name'                => _x( 'Projects', 'Post Type General Name', 'text_domain' ),
        'singular_name'       => _x( 'Project', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'           => __( 'Project', 'text_domain' ),
        'name_admin_bar'      => __( 'Project', 'text_domain' ),
        'parent_item_colon'   => __( 'Parent Project:', 'text_domain' ),
        'all_items'           => __( 'All Projects', 'text_domain' ),
        'add_new_item'        => __( 'New Project Setup', 'text_domain' ),
        'add_new'             => __( 'Add New', 'text_domain' ),
        'new_item'            => __( 'New Project', 'text_domain' ),
        'edit_item'           => __( 'Edit Project', 'text_domain' ),
        'update_item'         => __( 'Update Project', 'text_domain' ),
        'view_item'           => __( 'View Project', 'text_domain' ),
        'search_items'        => __( 'Search Project', 'text_domain' ),
        'not_found'           => __( 'Project Not found', 'text_domain' ),
        'not_found_in_trash'  => __( 'Project Not found in Trash', 'text_domain' ),
    );
    $args = array(
        'label'               => __( 'project', 'text_domain' ),
        'description'         => __( 'RNR Project Custom Post Type', 'text_domain' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'author', 'thumbnail', 'revisions', 'post-formats' ),
        'taxonomies'          => array( 'project_type' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-admin-post',
        'show_in_admin_bar'   => false,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'rewrite'             => $rewrite,
        'capability_type'     => 'post',
    );
    register_post_type( 'project', $args );

}

// Hook into the 'init' action
add_action( 'init', 'register_cpt_project', 0 );

/**
 * Include the template files from the plugin dir
 * [http://code.tutsplus.com/tutorials/a-guide-to-wordpress-custom-post-types-taxonomies-admin-columns-filters-and-archives--wp-27898]
 */

function include_project_template( $template_path ) {

    if ( get_post_type() == 'project' ) {

        // Include single template
        if ( is_single() ) {

            if ( $theme_file = locate_template( array( 'single-project.php' ) ) ) {
                $template_path = $theme_file;
            }

            else {
                $template_path = plugin_dir_path( __FILE__ ) . 'template/single-project.php';
            }
        }

        // Include archive template
        elseif ( is_archive() ) {

            if ( $theme_file = locate_template( array( 'archive-project.php' ) ) ) {
                $template_path = $theme_file;
            }

            else {
                $template_path = plugin_dir_path( __FILE__ ) . 'template/archive-project.php';
            }
        }
    }

    return $template_path;
}

add_filter( 'template_include', 'include_project_template', 1 );
?>