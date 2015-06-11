<?php

/**
 * RDT-RNR15 acf options for the theme
 * @author sirna <https://github.com/zabkasirna>
 * @since 0.0.0
 */

require_once( 'home_options.php' );
require_once( 'home_field_color.php' );
require_once( 'debuggrr_field_toggler.php' );

function initThemeOptions() {

    if ( function_exists('acf_add_options_page') ) {

        acf_add_options_page( array(

            'page_title' =>  'General Settings',
            'menu_title' =>  'RDT-RNR15 Settings',
            'menu_slug' =>   'rdt-rnr15-settings',
            'parent_slug' => '',
            'capability' =>  'manage_options',
            'redirect' =>    false,
            'position' =>    false,
            'icon_url' =>    false
        ) );

        // Sub Page
        initHomeOptions();
    }

    // Fields
    // initDebuggrrFieldToggler();
    // initHomeFieldColors();
}

?>