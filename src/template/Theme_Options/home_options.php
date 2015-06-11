<?php

/**
 * RDT-RNR15 acf options for home
 * @author sirna <https://github.com/zabkasirna>
 * @since 0.0.0
 */

function initHomeOptions() {

    if ( function_exists('acf_add_options_sub_page') ) {

        acf_add_options_sub_page( array(

            'page_title' =>  'Home Settings',
            'menu_title' =>  'Home',
            'menu_slug' =>   'rdt-rnr15-home-settings',
            'capability' =>  'manage_options',
            'parent_slug' => 'rdt-rnr15-settings',
            'redirect' =>    false,
            'position' =>    false,
            'icon_url' =>    false
        ) );
    }
}

?>