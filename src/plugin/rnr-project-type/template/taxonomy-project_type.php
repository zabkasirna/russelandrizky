<?php
/**
 * @package rdt-rnr15
 * @subpackage plugin/rnr_project
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

            <?php

                /**------------------------------------------------------**\
                 * DATA: TAXONOMY META
                 **------------------------------------------------------**/

                $_queried_object = get_queried_object();
                $_taxonomy = $_queried_object->taxonomy;
                $_term_id = $_queried_object->term_id;
                $_ptm_bgi = get_field('project_type_meta_bgi', $_taxonomy . '_' . $_term_id );
                $_ptm_bgi_url = $_ptm_bgi['url'];
                debuggrr( $_queried_object );
                // debuggrr( $_taxonomy );
                // debuggrr( $_term_id );
                // debuggrr( $_ptm_bgi['url'] );
                // debuggrr( $_ptm_bgi_url );
            ?>

            <header class="project-type-header" style="display: none;" >
                <div class="pt-header-bg"
                    data-src="<?php echo $_ptm_bgi_url; ?>"
                ></div>
                <div class="pt-header-fg">
                    <h1 class="pt-title"><?php echo $_queried_object->name; ?></h1>
                    <?php if ( $_queried_object->description !== '' ) : ?>
                    <div class="pt-excerpt-outer">
                        <p class="pt-excerpt"><?php echo $_queried_object->description; ?></p>
                    </div>
                    <?php endif; ?>
                </div>
            </header>

            <?php if ( have_posts() ) : ?>

            <div class="pt-loop-outer" style="display: none;" ></div>
            <?php endif; ?>
        
            </main>
        </div>
    </div>

<?php get_footer(); ?>
