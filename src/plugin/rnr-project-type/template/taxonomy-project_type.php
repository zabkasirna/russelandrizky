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
                 * DATA: TAXONOMY META & ACF
                 **------------------------------------------------------**/

                $_queried_object = get_queried_object();
                $_taxonomy = $_queried_object->taxonomy;
                $_term_id = $_queried_object->term_id;
                // debuggrr( $_queried_object );
                
                /**------------------------------------------------------**\
                 * DATA: PROJECT TYPE HEADER
                 **------------------------------------------------------**/

                $pt_header = array(
                    'layout'      => get_field( 'project_type_head_layout' ),
                    'title_color' => get_field( 'project_type_head_title_color' ),
                    'desc_color'  => get_field( 'project_type_head_desc_color' )
                );

                // debuggrr( $project_header );
                
                /**------------------------------------------------------**\
                 * DATA: PROJECT TYPE BACKGROUND
                 **------------------------------------------------------**/

                $ptbgs = array();

                if ( get_field( 'ptbg_settings', $_taxonomy . '_' . $_term_id ) ) :
                    foreach( get_field( 'ptbg_settings', $_taxonomy . '_' . $_term_id ) as $ptbg ) :
                        $ptbgs[] = array(
                            'src_landscape'=> $ptbg['ptbg_source_landscape']['url'],
                            'src_portrait' =>
                                $ptbg['ptbg_is_responsive'] ?
                                    $ptbg['ptbg_source_portrait']['url'] :
                                    $ptbg['ptbg_source_landscape']['sizes']['thumbnail']
                                ,
                            'layout'=>$ptbg['ptbg_layout']
                        );

                endforeach; endif;

                // debuggrr( get_field( 'ptbg_settings', $_taxonomy . '_' . $_term_id ) );
                // debuggrr( $ptbgs );
            ?>

            <header class="project-type-header" >
                <!-- The Masks -->
                <svg height="0" id="cover_mask_svg" style="display: none;" >
                    <mask id="cover_mask_fade_left"
                        maskUnits="objectBoundingBox"
                        maskContentUnits="objectBoundingBox">

                        <linearGradient id="cover_mask_fade_left_grad"
                                        gradientUnits="objectBoundingBox"
                                        x2="1" y2="0">

                            <stop stop-color="black" stop-opacity="0" offset="0"></stop>
                            <stop stop-color="black" stop-opacity="1" offset="0.5"></stop>
                        </linearGradient>

                        <rect x="0" y="0"
                              width="1" height="1"
                              fill="url(#cover_mask_fade_left_grad)"
                        ></rect>
                    </mask>

                    <mask id="cover_mask_fade_right"
                        maskUnits="objectBoundingBox"
                        maskContentUnits="objectBoundingBox">

                        <linearGradient id="pcm_fade_right_grad"
                                        gradientUnits="objectBoundingBox"
                                        x2="1" y2="0">

                          <stop stop-color="black" stop-opacity="0" offset="0.5"></stop>
                          <stop stop-color="black" stop-opacity="1" offset="1"></stop>
                        </linearGradient>

                        <rect x="0" y="0"
                              width="1" height="1"
                              fill="url(#cover_mask_fade_right_grad)"
                        ></rect>
                    </mask>
                </svg>

                <div class="pt-header-bg">

                    <?php foreach( $ptbgs as $ptbg ) : ?>

                    <?php

                        $ptbg_layout_css = "ptbg-lists ";

                        if ( $ptbg['layout'] === 'is_full' ) $ptbg_layout_css .= 'full';

                        else {
                            if ( $pt_header[ 'layout' ] === 'right' ) $ptbg_layout_css .= 'half left';
                            else $ptbg_layout_css .= 'half right';
                        }

                        $ptbg_srcs = array(
                            'landscape' => isset( $ptbg['src_landscape'] ) ? $ptbg['src_landscape'] : "",
                            'portrait'  => isset( $ptbg['src_portrait'] ) ? $ptbg['src_portrait'] : ""
                        );
                    ?>

                    <div class="<?php echo $ptbg_layout_css; ?>">
                        <div class="ptbgi"
                            data-src-landscape="<?php echo $ptbg_srcs['landscape']; ?>"
                            data-src-portrait="<?php echo $ptbg_srcs['portrait']; ?>"
                        ></div>
                    </div>

                    <?php endforeach; ?>
                </div>

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
