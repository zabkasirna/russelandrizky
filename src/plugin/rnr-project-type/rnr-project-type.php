<?php
/**
 * @package rdt-rnr15
 * @subpackage plugin/rnr-project-type
 * @version 0.0.0
 * @since 0.0.0
 */
/*
Plugin Name: RNR Project Type
Plugin URI: http://github.com/zabkasirna/russelandrizky
Description: Plugin for Project Type Custom Taxonomy
Author: Sirna
Version: 0.0.0
Since: 0.0.0
Author URI: http://github.com/zabkasirna
*/

// Register Custom Taxonomy
function register_taxonomy_project_type() {

    $labels = array(
        'name'                       => _x( 'Project Types', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Project Type', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Project Type', 'text_domain' ),
        'all_items'                  => __( 'All Project Types', 'text_domain' ),
        'parent_item'                => __( 'Parent Project Types', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Project Type:', 'text_domain' ),
        'new_item_name'              => __( 'New Project Type Name', 'text_domain' ),
        'add_new_item'               => __( 'Add New Project Type', 'text_domain' ),
        'edit_item'                  => __( 'Edit Project Type', 'text_domain' ),
        'update_item'                => __( 'Update Project Type', 'text_domain' ),
        'view_item'                  => __( 'View Project Type', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate Project Types with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove Project Types', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Project Types', 'text_domain' ),
        'search_items'               => __( 'Search Project Types', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'update_count_callback'      => 'update_project_type_cb',
    );
    register_taxonomy( 'project_type', array( 'post', ' project', ' philosophy' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'register_taxonomy_project_type', 0 );
?>