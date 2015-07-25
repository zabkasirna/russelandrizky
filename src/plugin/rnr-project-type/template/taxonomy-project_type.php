<?php
/**
 * @package rdt-rnr15
 * @subpackage rnr_project
 * @version 0.0.0
 * @since 0.0.0
 */
?>

<?php
// get_header();
// if(have_posts()) : while(have_posts()) : the_post();
//     the_title();
//     echo '<div class="entry-content">';
//     the_content();
//     echo '</div>';
// endwhile; endif;
// get_footer();
?>

<?php get_header(); ?>

    <div id="content" class="<?php echo get_post_type(); ?>">
        <div id="inner-content">
            <main id="main" role="main">

            <?php if ( have_posts() ) : ?>

                <div class="loop-outer">
                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php the_title(); ?>
                    <?php endwhile; ?>
                </div>
        
            <?php endif; ?>
        
            </main>
        </div>
    </div>

<?php get_footer(); ?>
