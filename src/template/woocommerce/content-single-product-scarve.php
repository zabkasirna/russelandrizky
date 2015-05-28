<?php
/**
 * @author      Sirna
 * @package     sirna-po15/templates/woocommerce
 * @version     0.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $post, $product;

// $scs_test = get_field('scs_main');
// echo '<pre>';
// print_r ( $scs_test );
// echo '</pre>';

?>

<?php
    /**
     * woocommerce_before_single_product hook
     *
     * @hooked wc_print_notices - 10
     */
     do_action( 'woocommerce_before_single_product' );

     if ( post_password_required() ) {
        echo get_the_password_form();
        return;
     }
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="scarve" <?php post_class(); ?>>
    
    <?php if ( powc_cat_is( 'scarve' ) ):  ?>

        <?php
            $scs_main = get_field('scs_main');
            if ( isset( $scs_main ) ) : ?>

    <div class="scarve-product-outer">
        <?php foreach ($scs_main as $s_loop) : ?>
        <div class="scarve-product" data-url="<?php echo $s_loop['scs_image']['url'] ?>">
            <div class="scarve-nail-outer">
                <img class="scarve-nail-left" src="<?php echo get_template_directory_uri() . '/uploads/images/nail/nail 0.png' ?>" alt="">
                <img class="scarve-nail-right" src="<?php echo get_template_directory_uri() . '/uploads/images/nail/nail 1.png' ?>" alt="">
            </div>
        </div>
        <div class="preloader-outer">
            <img class="preloader" src="<?php echo get_template_directory_uri() . '/uploads/images/preloader/preloader.gif' ?>" alt="">
        </div>
        <?php endforeach; ?>
    </div>

        <?php endif; ?>

    <?php else: ?>
        <?php
            /**
             * woocommerce_before_single_product_summary hook
             *
             * @hooked woocommerce_show_product_sale_flash - 10
             * @hooked woocommerce_show_product_images - 20
             */
            do_action( 'woocommerce_before_single_product_summary' );
        ?>
    <?php endif; ?>

    <div class="summary entry-summary">
        <?php

            /**
             * woocommerce_single_product_summary hook
             *
             * @hooked woocommerce_template_single_title - 5
             * @hooked woocommerce_template_single_rating - 10
             * @hooked woocommerce_template_single_price - 10
             * @hooked woocommerce_template_single_excerpt - 20
             * @hooked woocommerce_template_single_add_to_cart - 30
             * @hooked woocommerce_template_single_meta - 40
             * @hooked woocommerce_template_single_sharing - 50
             */
            do_action( 'woocommerce_single_product_summary' );
        ?>

    </div><!-- .summary -->

    <?php
        /**
         * woocommerce_after_single_product_summary hook
         *
         * @hooked woocommerce_output_product_data_tabs - 10
         * @hooked woocommerce_upsell_display - 15
         * @hooked woocommerce_output_related_products - 20
         */
        do_action( 'woocommerce_after_single_product_summary' );
    ?>

    <meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
