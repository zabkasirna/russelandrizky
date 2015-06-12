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

    // Add Debuggrr toggler to body class
    if( get_field( 'enable_debuggrr', 'options' ) ) :
        $is_debugged = get_field( 'enable_debuggrr', 'options' );

        if ( $is_debugged ) :
            $body_class[] = 'is-debugged';
        endif;

    endif;

    // Add preload toggler to body class
    $body_class[] = 'is-preload';

?>

<?php
    
    // Body Color
    $body_data_color = array();

    // Get Default Color
    if ( have_rows( 'default_colors', 'options' ) ) : while ( have_rows( 'default_colors', 'options' ) ) :

            the_row();

            // String for body data-attr
            $body_default_data_color = array(
                "fg" => get_sub_field( 'colors_default_fg' ),
                "bg" => get_sub_field( 'colors_default_bg' ),
            );

            // String for body inline-style
            $body_default_bgc = $body_default_data_color[ 'bg' ];
            $body_default_fgc = $body_default_data_color[ 'fg' ];

    endwhile; endif;

    // Get Custom Color
    if ( have_rows( 'custom_colors', $post_id ) ) : while ( have_rows( 'custom_colors', $post_id ) ) :

            the_row();

            // String for body data-attr
            $body_custom_data_color = array(
                "fg" => get_sub_field( 'colors_custom_fg' ),
                "bg" => get_sub_field( 'colors_custom_bg' ),
            );

            // String for body inline-style
            $body_custom_bgc = $body_custom_data_color[ 'bg' ];
            $body_custom_fgc = $body_custom_data_color[ 'fg' ];

    endwhile; endif;

    // Apply value if only default value is overidden by custom value
    $body_bgc = 'background-color: ' . ( $body_custom_bgc ? $body_custom_bgc : $body_default_bgc ) . '; ';
    $body_fgc = 'color: ' . ( $body_custom_fgc ? $body_custom_fgc : $body_default_fgc ) . '; ';
    $body_data_color = array(
        "fg" => ( $body_custom_data_color['fg'] ? $body_custom_data_color['fg'] : $body_default_data_color['fg'] ),
        "bg" => ( $body_custom_data_color['bg'] ? $body_custom_data_color['bg'] : $body_default_data_color['bg'] )
    );
?>

<body
    <?php body_class( $body_class ); ?>

    <?php
        echo ' style="' . $body_bgc . $body_fgc . '"';
    ?>

    data-color='<?php echo json_encode( $body_data_color ); ?>'
>

<?php debuggrr( $post_id ); ?>
<?php /*debuggrr( $body_class );*/ ?>
<?php /*debuggrr( $body_data_color );*/ ?>

<div id="page" class="hfeed site">

    <header id="main-header">

        <div id="header-inner">
            
            <div id="header-brand">
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
                    'items_wrap'      => '<ol id="%1$s">%3$s</ol>'
                );

                wp_nav_menu( $nav_main_defaults );
            ?>

        </div><!-- .header-inner -->

    </header><!-- .header -->
