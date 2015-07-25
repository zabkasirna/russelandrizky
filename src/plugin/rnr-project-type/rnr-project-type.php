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
        'show_tagcloud'              => false,
        'update_count_callback'      => '_update_post_term_count',
    );
    register_taxonomy( 'project_type', array( 'post', 'project', 'philosophy' ), $args );
}

// Hook into the 'init' action
add_action( 'init', 'register_taxonomy_project_type', 0 );

/**
 * Include the template files from the plugin dir
 * [http://wordpress.stackexchange.com/questions/50201/custom-taxonomy-in-plugin-and-template/50206#50206]
 * [http://wordpress.stackexchange.com/questions/2126/at-what-priority-does-add-filter-overwrite-core-functions/2127#2127]
 * [http://stackoverflow.com/questions/6369362/wordpress-filter-with-priority/6369545#6369545]
 */

function include_project_type_template( $template_path ) {
    if ( is_tax('project_type') ) {
        $template_path = plugin_dir_path( __FILE__ ) . 'template/taxonomy-project_type.php';
    }

    return $template_path;
}

add_filter( 'template_include', 'include_project_type_template', 11 );

?>