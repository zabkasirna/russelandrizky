<?php
/**
 * @package rdt-rnr15
 * @subpackage page
 * @since 0.0.0
 */

get_header(); ?>

    <div id="content">
        <div id="inner-content">
            <main id="main" role="main">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <?php the_content();?>

            <?php // End the loop. ?>
            <?php endwhile; endif; ?>
            </main><!-- #main -->
        </div><!-- #inner-content -->
    </div>

<?php get_footer(); ?>
