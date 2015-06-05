<?php
/**
 * @package rdt-rnr15
 * @subpackage index
 * @since 0.0.0
 */

get_header(); ?>

<div id="content" class="<?php echo get_post_type(); ?>">
    <div id="inner-content">
        <main id="main" role="main">

        <?php if ( have_posts() ) : ?>

            <div class="loop-outer">
                <?php while ( have_posts() ) : the_post(); ?>

                <?php // LOOP ?>
                <div class="loop" data-id="<?php echo the_id(); ?>">
                    <section>
                        <?php the_content(); ?>
                    </section>
                </div>
                <?php endwhile ?>
            </div>
    
        <?php endif; ?>
    
        </main><!-- #main -->
    </div><!-- #inner-content -->
</div>

<?php get_footer(); ?>
