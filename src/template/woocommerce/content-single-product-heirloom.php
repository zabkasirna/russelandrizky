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

// $shs_test = get_field('shs_main');
// echo '<pre>';
// print_r ( $shs_test );
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

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="heirloom" <?php post_class(); ?>>
    
    <?php if ( powc_cat_is( 'heirloom' ) ):  ?>

        <?php
            $shs_main = get_field('shs_main');
            if ( isset( $shs_main ) ) : ?>

        <div class="heirloom-product-outer">
            <ul class="heirloom-product">

            <?php foreach ($shs_main as $h_loop) : ?>

                <li class="heirloom-product-item">
                    <img class="heirloom-product-image" src="<?php echo $h_loop['h_image']['url']; ?>">
                    <?php if( $h_loop['is_shs'] ): ?>

                        <div class="heirloom-hotspot-outer">
                        <?php foreach( $h_loop['shs_data'] as $shs_data ): ?>

                            <a
                                class="shs-pin"
                                style="position: absolute; top: <?php echo $shs_data['shs_y'] . '%'; ?>; left: <?php echo $shs_data['shs_x'] . '%'; ?>;"
                                href="<?php echo ( isset( $shs_data['shs_link'] ) ) ? $shs_data['shs_link'] : '#'; ?>"
                            >
                                <?php if ( $shs_data['shs_label'] !== '' ): ?>
                                <span class="shs-pin-label"><?php echo $shs_data['shs_label']; ?></span>
                                <?php endif; ?>

                                <?php if ($shs_data['shs_text'] !== '' ): ?>
                                <span class="<?php echo $shs_data['shs_layout'] . ' shs-pin-text'; ?>"><?php echo $shs_data['shs_text']; ?></span>
                                <?php endif; ?>
                            </a>
                            
                        <?php endforeach; ?>
                        </div>

                    <?php endif; ?>
                </li>

            <?php endforeach; ?>

            </ul>
        </div>
        <div class="heirloom-product-control">
            <a href="#" class="hpc-prev">←</a>
            <a href="#" class="hpc-next">→</a>
            <a href="#" class="hpc-zoom"><i class="fa fa-search-plus"></i></a>
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
