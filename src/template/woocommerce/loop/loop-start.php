<?php
/**
 * Product Loop Start
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
?>
<?php if ( powc_cat_is('heirloom') ) :?>
    <div class="products-heirloom-outer">
        <ul class="products">
<?php elseif ( powc_cat_is('scarve') ) :?>
    <div class="products-scarve-outer">
        <ul class="products">
<?php else: ?>
    <ul class="products">
<?php endif; ?>