<?php
/**
 * @package rdt-rnr15
 * @subpackage rnr_project
 * @version 0.0.0
 * @since 0.0.0
 */

?>

<?php get_header(); ?>

    <div id="content">
        <div id="inner-content">
            <main id="main" role="main">
        
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <section>
                    <?php the_content(); ?>
                </section>
        
                <?php endwhile; ?>
        
            <?php else : ?>
        
                <p>no project found</p>
        
            <?php endif; ?>
        
            </main><!-- #main -->
        </div><!-- #inner-content -->
    </div>

<?php get_footer(); ?>
