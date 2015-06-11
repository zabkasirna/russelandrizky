<?php

function initHomeFieldColors() {

    if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array (
        'key' => 'group_home_colors',
        'title' => 'Home Colors',
        'fields' => array (
            array (
                'key' => 'field_home_colors',
                'label' => 'Colors',
                'name' => 'home_colors',
                'type' => 'repeater',
                'instructions' => 'This settings will be used for various options of the page\'s display color',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => 100,
                    'class' => '',
                    'id' => '',
                ),
                'min' => '',
                'max' => '',
                'layout' => 'row',
                'button_label' => 'Add Color\'s Row',
                'sub_fields' => array (
                    array (
                        'key' => 'field_home_color_fg',
                        'label' => 'Foreground Color',
                        'name' => 'home_foreground_color',
                        'type' => 'color_picker',
                        'instructions' => 'Foreground Color will be set to Logo and other Foreground Elements',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => 'rnr15-input-color-field-fg',
                            'id' => '',
                        ),
                        'default_value' => '#FFFFFF',
                    ),
                    array (
                        'key' => 'field_home_color_bg',
                        'label' => 'Background Color',
                        'name' => 'home_background_color',
                        'type' => 'color_picker',
                        'instructions' => 'Background Color will be set to page\'s body element and other background elements',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => 'rnr15-input-color-field-bg',
                            'id' => '',
                        ),
                        'default_value' => '#333333',
                    ),
                ),
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'rdt-rnr15-home-settings',
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