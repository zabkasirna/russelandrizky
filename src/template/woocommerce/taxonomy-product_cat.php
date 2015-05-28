<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template.
 *
 * Override this template by copying it to yourtheme/woocommerce/taxonomy-product_cat.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( powc_cat_is( 'heirloom' ) ) {
    wc_get_template( 'archive-product-heirloom.php' );
}
else if ( powc_cat_is( 'scarve' ) ) {
    wc_get_template( 'archive-product-scarve.php' );
}
else {
    wc_get_template( 'archive-product.php' );
}