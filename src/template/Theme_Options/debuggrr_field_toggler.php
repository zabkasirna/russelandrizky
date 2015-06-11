<?php

function initDebuggrrFieldToggler() {

    if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array (
        'key' => 'group_debuggrr_toggler',
        'title' => 'Debuggrr',
        'fields' => array (
            array (
                'key' => 'field_debuggrr_toggler',
                'label' => 'Enable Debuggrr',
                'name' => 'enable_debuggrr',
                'type' => 'true_false',
                'instructions' => 'This options will toggle Debuggrr capability (remember to turn this off, on the production site)',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 0,
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'rdt-rnr15-settings',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
    ));

    endif;

}

?>