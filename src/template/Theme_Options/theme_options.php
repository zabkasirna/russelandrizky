<?php

/**
 * RDT-RNR15 acf options for the theme
 * @author sirna <https://github.com/zabkasirna>
 * @since 0.0.0
 */

require_once( 'home_options.php' );

function initThemeOptions() {

    if ( function_exists('acf_add_options_page') ) {

        acf_add_options_page( array(

            'page_title' => 'RDT-RNR15 Settings',
            'menu_title' => 'RDT-RNR15 Settings',
            'menu_slug' =>  'rdt-rnr15-settings',
            'capability' => 'manage_options',
            'redirect' =>   false,
            'position' =>   false,
            'icon_url' =>   false
        ) );

        initHomeOptions();
    }
}

?>