<?php
/**
 * @author      Sirna
 * @package     sirna-po15/templates/woocommerce
 * @version     0.0.0
 */

global $woocommerce;
$t = $woocommerce->customer->get_country();

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

    <?php
        /**
         * woocommerce_before_main_content hook
         *
         * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
         * @hooked woocommerce_breadcrumb - 20
         */
        do_action( 'woocommerce_before_main_content' );
    ?>

        <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

            <h1 class="h2 page-title"><?php woocommerce_page_title(); ?></h1>

        <?php endif; ?>

        <?php do_action( 'woocommerce_archive_description' ); ?>

        <?php if ( have_posts() ) : ?>

            <?php
                /**
                 * woocommerce_before_shop_loop hook
                 *
                 * @hooked woocommerce_result_count - 20
                 * @hooked woocommerce_catalog_ordering - 30
                 */
                do_action( 'woocommerce_before_shop_loop' );
            ?>

            <?php woocommerce_product_loop_start(); ?>

                <?php woocommerce_product_subcategories(); ?>

                <?php while ( have_posts() ) : the_post(); ?>

                    <?php wc_get_template_part( 'content', 'product' ); ?>

                <?php endwhile; // end of the loop. ?>

            <?php woocommerce_product_loop_end(); ?>

            <div class="heirloom-filter-toggle">
                <a href="#">FILTER</a>
            </div>

            <div class="heirloom-filters">
                <ul class="heirloom-filter">
                    <li><a class="hf-link-all" data-tag-filter="all" href="#">ALL</a></li>
                    <li><a class="hf-link" data-tag-filter="bags" href="#">BAGS</a></li>
                    <li><a class="hf-link" data-tag-filter="blazers" href="#">BLAZERS</a></li>
                    <li><a class="hf-link" data-tag-filter="dresses" href="#">DRESSES</a></li>
                    <li><a class="hf-link" data-tag-filter="jewelries" href="#">JEWELRIES</a></li>
                    <li><a class="hf-link" data-tag-filter="pants" href="#">PANTS</a></li>
                    <li><a class="hf-link" data-tag-filter="shirts" href="#">SHIRTS</a></li>
                    <li><a class="hf-link" data-tag-filter="shoes" href="#">SHOES</a></li>
                    <li><a class="hf-link" data-tag-filter="sweaters" href="#">SWEATERS</a></li>
                    <li><a class="hf-link" data-tag-filter="tops" href="#">TOPS</a></li>
                </ul>
            </div>

            <?php
                /**
                 * woocommerce_after_shop_loop hook
                 *
                 * @hooked woocommerce_pagination - 10
                 */
                do_action( 'woocommerce_after_shop_loop' );
            ?>

        <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

            <?php wc_get_template( 'loop/no-products-found.php' ); ?>

        <?php endif; ?>

    <?php
        /**
         * woocommerce_after_main_content hook
         *
         * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
         */
        do_action( 'woocommerce_after_main_content' );
    ?>

    <?php
        /**
         * woocommerce_sidebar hook
         *
         * @hooked woocommerce_get_sidebar - 10
         */
        do_action( 'woocommerce_sidebar' );
    ?>

<?php get_footer( 'shop' ); ?>