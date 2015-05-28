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

<body <?php body_class(); ?>>

<div id="page" class="hfeed site">
    <header class="header">
        <div class="header-inner">
            
            <!--
            <div class="header-brand">
                <a href='/' rel="nofollow" class="header-link"></a>
            </div>
            -->

        </div><!-- .header-inner -->

        <!-- Main Navigation -->
        <?php 
            $nav_main_defaults = array(
                'theme_location'  => 'main-navi',
                'container'       => 'nav',
                'menu_class'      => 'nav',
                'menu_id'         => 'nav-main'
            );

            wp_nav_menu ( $nav_main_defaults );
        ?>

    </header><!-- .header -->
