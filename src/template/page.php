<?php
/**
 * @package rdt-rr15
 * @subpackage page
 * @since 0.0.0
 */

get_header(); ?>

    <div id="content">
        <div id="inner-content">
            <main id="main" role="main">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <h1 class="h2 uc"><?php the_title();?></h1>
                <?php the_content();?>

            <?php // End the loop. ?>
            <?php endwhile; endif; ?>
            </main><!-- #main -->
        </div><!-- #inner-content -->
    </div>

<?php get_footer(); ?>
