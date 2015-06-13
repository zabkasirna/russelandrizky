<?php
/**
 * @package rdt-rnr15
 * @subpackage header
 * @since 0.0.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">

    <?php // force Internet Explorer to use the latest rendering engine available ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php wp_title(''); ?></title>

    <?php // mobile meta (hooray!) ?>
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <?php // @todo Add all icons & favicons here ?>

    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php // wordpress head functions ?>
    <?php wp_head(); ?>
    <?php // end of wordpress head ?>

    <?php // drop Google Analytics Here ?>
    <?php // end analytics ?>
</head>

<?php
    global $wp_query;
    $post_id = $wp_query -> post -> ID;
?>

<?php

    // Body css class modifiers

    $body_class = array();

    // Add preload toggler to body class
    $body_class[] = 'is-preload';

    // Add Debuggrr toggler to body class
    if( get_field( 'enable_debuggrr', 'options' ) ) :
        $is_debugged = get_field( 'enable_debuggrr', 'options' );

        if ( $is_debugged ) :
            $body_class[] = 'is-debugged';
        endif;

    endif;
?>

<?php
    
    /**
     * data design structure for bg type is solid
     * {
     *     [ 'fg' ] => string(n) 'hex',
     *     [ 'bg_type' ] => string(n) 'is_solid',
     *     [ 'bg' ] => string(n) 'hex',
     * }
     *
     * data design structure for bg type is linear
     * {
     *     [ 'fg_hex' ] => string(n) 'hex',
     *     [ 'bg_type' ] => string(n) 'is_linear',
     *     [ 'bg_hex' ] => array(n) [ 'hex1', ..., 'hexN' ],
     *     [ 'bg_length' ] => array(n) [ 'length1', ..., 'lengthN' ],
     *     [ 'grad_deg' ] => int(n) 0 ... 359
     * }
     *
     * data design structure for bg type is radial
     * {
     *     [ 'fg_hex' ] => string(n) 'hex',
     *     [ 'bg_type' ] => string(n) 'is_linear',
     *     [ 'bg_hex' ] => array(n) [ 'hex1', ..., 'hexN' ],
     *     [ 'bg_length' ] => array(n) [ 'length1', ..., 'lengthN' ]
     * }
     */

    // --- start of default color data --- //

    // get default background type
    $bg_type_default = get_field( 'default_bg_type', 'options' ) ?: 'is_solid';

    // set sefault Color
    $color_datas_default = array();

    // populate conditionally
    if ( $bg_type_default == 'is_solid' ) :

        $color_datas_default['fg_hex'] = get_field( 'default_fg_hex', 'options' ) ?: '#FFFFFF';
        $color_datas_default['bg_type'] = get_field( 'default_bg_type', 'options' );
        $color_datas_default['bg_hex'] = get_field( 'default_bg_hex_solid', 'options' ) ?: '#333333';

    elseif ( $bg_type_default == 'is_linear' || $bg_type_default == 'is_radial' ) :

        $color_datas_default['fg_hex'] = get_field( 'default_fg_hex', 'options' ) ?: '#FFFFFF';
        $color_datas_default['bg_type'] = get_field( 'default_bg_type', 'options' );

        $temp_default_bg_gradient = get_field( 'default_bg_gradient', 'options' );

        $color_datas_default['bg_hex'] = array();
        $color_datas_default['bg_length'] = array();

        for ( $i = 0; $i < count( $temp_default_bg_gradient ); ++ $i ) {

            $color_datas_default['bg_hex'][$i] = $temp_default_bg_gradient[ $i ]['default_bg_gradient_hex'];
            $color_datas_default['bg_length'][$i] = $temp_default_bg_gradient[ $i ]['default_bg_gradient_length'] . '%';

        }

        if ( $bg_type_default == 'is_linear' ) $color_datas_default['grad_deg'] = get_field( 'default_grad_deg', 'options' ) . 'deg';

    endif;

    debuggrr( $color_datas_default, 'default' );

    // --- start of custom color data --- //

    // get custom background type
    $bg_type_custom = get_field( 'custom_bg_type', $post_id ) ?: 'is_solid';

    // set custom Color
    $color_datas_custom = array();

    // populate conditionally
    if ( $bg_type_custom == 'is_solid' ) :

        $color_datas_custom['fg_hex'] = get_field( 'custom_fg_hex', $post_id );
        $color_datas_custom['bg_type'] = get_field( 'custom_bg_type', $post_id );
        $color_datas_custom['bg_hex'] = get_field( 'custom_bg_hex_solid', $post_id );

    elseif ( $bg_type_custom == 'is_linear' || $bg_type_custom == 'is_radial' ) :

        $color_datas_custom['fg_hex'] = get_field( 'custom_fg_hex', $post_id );
        $color_datas_custom['bg_type'] = get_field( 'custom_bg_type', $post_id );

        $temp_custom_bg_gradient = get_field( 'custom_bg_gradient', $post_id );

        $color_datas_custom['bg_hex'] = array();
        $color_datas_custom['bg_length'] = array();

        for ( $i = 0; $i < count( $temp_custom_bg_gradient ); ++ $i ) {

            $color_datas_custom['bg_hex'][$i] = $temp_custom_bg_gradient[ $i ]['custom_bg_gradient_hex'];
            $color_datas_custom['bg_length'][$i] = $temp_custom_bg_gradient[ $i ]['custom_bg_gradient_length'] . '%';

        }

        if ( $bg_type_custom == 'is_linear' ) $color_datas_custom['grad_deg'] = get_field( 'custom_grad_deg', $post_id ) . 'deg';

    endif;

    debuggrr( $color_datas_custom, 'custom' );

    // --- start target color --- //
    $color_datas = array();

    $color_datas['fg_hex'] = $color_datas_custom['fg_hex'] ?: $color_datas_default['fg_hex'];
    $color_datas['bg_type'] = $color_datas_custom['bg_type'] ?: $color_datas_default['bg_type'];
    $color_datas['bg_hex'] = $color_datas_custom['bg_hex'] ?: $color_datas_default['bg_hex'];
    $color_datas['bg_length'] = $color_datas_custom['bg_length'] ?: $color_datas_default['bg_length'];
    $color_datas['grad_deg'] = $color_datas_custom['grad_deg'] ?: $color_datas_default['grad_deg'] ?: '0deg';

    debuggrr( $color_datas, 'color_datas' );

    // --- start body bgc css string --- //
    
    $body_bgc = "\r\n" . 'background-color: #FFFFFF;';
    $gradient_color_stop = array();

    if ( $color_datas['bg_type'] == 'is_solid' ) :

        $body_bgc = "\r\n" . 'background-color: ' . $color_datas['bg_hex'] . '; ';

    elseif ( $color_datas['bg_type'] == 'is_linear' || $color_datas['bg_type'] == 'is_radial' ) :

        $key_from_bg_hex = array_keys( $color_datas['bg_hex'] );
        for ( $i = 0; $i < count($key_from_bg_hex); ++ $i ) {
            $gradient_color_stop[] = $color_datas['bg_hex'][$i] . ' ' . $color_datas['bg_length'][$i];
        }

        debuggrr( $gradient_color_stop, 'gradient_color_stop' );

        $gradient_string = '';

        if ( $color_datas['bg_type'] == 'is_linear' ) :

            // 'background-image: linear-gradient( XXXdeg, #XXX XXX%, #XXX XXX% );'
            // 'background-image: -webkit-linear-gradient( XXXdeg, #XXX XXX%, #XXX XXX% );'

            $gradient_string = $color_datas['grad_deg'] . ', ' . ( implode( ', ', $gradient_color_stop ) );
            $body_bgc .= "\r\n" . 'background-image: -webkit-linear-gradient(' . $gradient_string . ' );';
            $body_bgc .= "\r\n" . 'background-image: -moz-linear-gradient(' . $gradient_string . ' );';
            $body_bgc .= "\r\n" . 'background-image: -o-linear-gradient(' . $gradient_string . ' );';
            $body_bgc .= "\r\n" . 'background-image: linear-gradient(' . $gradient_string . ' );';

        elseif ( $color_datas['bg_type'] == 'is_radial' ) :

            // 'background-image: radial-gradient( circle closest-corner, #XXX XXX%, #XXX XXX% );'
            // 'background-image: -webkit-radial-gradient( circle closest-corner, #XXX XXX%, #XXX XXX% );'

            $gradient_string = 'circle farthest-corner' . ', ' . ( implode( ', ', $gradient_color_stop ) );
            $body_bgc .= "\r\n" . 'background-image: -webkit-radial-gradient( ' . $gradient_string . ' );';
            $body_bgc .= "\r\n" . 'background-image: -moz-radial-gradient( ' . $gradient_string . ' );';
            $body_bgc .= "\r\n" . 'background-image: -o-radial-gradient( ' . $gradient_string . ' );';
            $body_bgc .= "\r\n" . 'background-image: gradial-radient( ' . $gradient_string . ' );';

        endif;

    endif;

    // --- start body fgc css string --- //
    $body_fgc = "\r\n" . 'color: ' . $color_datas['fg_hex'] . '; ';

    // --- start body data-color attribute string --- //
    $body_data_color = array(
        "fg" => $color_datas['fg_hex'],
        "bg" => is_array( $color_datas['bg_hex'] ) ? end($color_datas['bg_hex']) : $color_datas['bg_hex']
    );
?>

<body
    <?php body_class( $body_class ); ?>

    <?php
        echo ' style="' . $body_bgc . $body_fgc . "\r\n\"";
    ?>

    data-color='<?php echo json_encode( $body_data_color ); ?>'
>

<?php /*debuggrr( $post_id );*/ ?>
<?php /*debuggrr( $body_class );*/ ?>
<?php debuggrr( $body_data_color ); ?>

<div id="page" class="hfeed site">

    <header id="main-header">

        <div id="header-inner">
            
            <div id="header-brand">
                <div class="fauxborder"></div>
                <a href='/' rel="nofollow" class="logo-anchor">
                    <object class="logo-object" type="image/svg+xml" data="<?php echo get_template_directory_uri() . '/uploads/images/logo/logo_head_default.svg' ?>">RNR</object>
                </a>
            </div>

            <?php 
                $nav_main_defaults = array(
                    'theme_location'  => 'main-navi',
                    'container'       => 'nav',
                    'container_class' => '',
                    'container_id'    => 'header-nav',
                    'menu_class'      => '',
                    'menu_id'         => 'nav-lists',
                    'items_wrap'      => '<ol id="%1$s">%3$s</ol>',
                    'link_before'     => '<span class="fauxbg"></span>',
                    'after'           => '<span class="fauxborder"></span>'
                );

                wp_nav_menu( $nav_main_defaults );
            ?>

        </div><!-- .header-inner -->

    </header><!-- .header -->
