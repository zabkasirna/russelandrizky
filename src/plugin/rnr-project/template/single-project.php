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

                <?php

                    /**------------------------------------------------------**\
                     * DATA: PROJECT HEADER
                     **------------------------------------------------------**/

                    $project_header = array(
                        'layout'         => get_field( 'project_head_layout' ),
                        'color'          => get_field( 'project_head_title_color' ),
                        'excerpt'        => get_field( 'project_head_excerpt' ),
                        'excerpt_color'  => get_field( 'project_head_excerpt_color' )
                    );

                    // debuggrr( $project_header );


                    /**------------------------------------------------------**\
                     * DATA: PROJECT COVER
                     **------------------------------------------------------**/

                    $project_cover_settings = array();

                    if ( get_field( 'project_cover_settings' ) ) :
                        foreach( get_field( 'project_cover_settings' ) as $pcs ) :
                            $project_cover_settings[] = array(
                                'src_landscape'=>$pcs['pci_source_landscape']['url'],
                                'src_portrait'=>$pcs['pci_source_portrait']['url'],
                                'layout'=>$pcs['pci_layout']
                            );

                    endforeach; endif;

                    // debuggrr( $project_cover_settings );


                    /**------------------------------------------------------**\
                     * DATA: PROJECT DESCRIPTION
                     **------------------------------------------------------**/

                    if ( get_field( 'project_desc_section' ) ) :

                        $project_desc_section = get_field( 'project_desc_section' );

                    endif;

                    // debuggrr( $project_desc_section );
                ?>

                <article class="project-outer">
                    
                    <?php
                    /**------------------------------------------------------**\
                     * TEMPLATE: PROJECT HEADER
                     **------------------------------------------------------**/
                    ?>

                    <header class="project-header">
                        
                        <?php if ( !empty( $project_header ) ) : ?>

                        <!-- The Title -->
                        <div class="project-title-outer <?php echo $project_header[ 'layout' ]; ?>">
                            
                            <h1 class="project-title"><?php
                                echo $project_header[ 'layout' ] == 'left' ? '_' : '';
                                the_title();
                                echo $project_header[ 'layout' ] == 'right' ? '_' : '';
                            ?></h1>

                            <div class="project-excerpt-outer"
                                <?php echo 'style="color: ' . $project_header[ 'excerpt_color' ] . '"' ?>
                            >
                                <?php echo $project_header['excerpt']; ?>
                            </div>
                        </div>

                        <?php endif; ?>

                        <?php if ( !empty( $project_cover_settings ) ) : ?>

                        <!-- The Masks -->
                        <svg height="0" id="pcm_svg">
                          <mask id="pcm_fade_left"
                                maskUnits="objectBoundingBox"
                                maskContentUnits="objectBoundingBox">

                            <linearGradient id="pcm_fade_left_grad"
                                            gradientUnits="objectBoundingBox"
                                            x2="1" y2="0">

                                <stop stop-color="black" stop-opacity="0" offset="0"></stop>
                                <stop stop-color="black" stop-opacity="1" offset="0.5"></stop>
                            </linearGradient>

                            <rect x="0" y="0"
                                  width="1" height="1"
                                  fill="url(#pcm_fade_left_grad)"
                            ></rect>
                          </mask>

                          <mask id="pcm_fade_right"
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
                                  fill="url(#pcm_fade_right_grad)"
                            ></rect>
                          </mask>
                        </svg>

                        <!-- The Cover -->
                        <div class="project-cover-outer">

                            <ul class="project-cover">

                                <?php foreach( $project_cover_settings as $pcs ) : ?>

                                <?php

                                $pcs_layout_css = "project-cover-lists ";

                                if ( $pcs['layout'] === 'is_full' ) $pcs_layout_css .= 'full';

                                else {
                                    if ( $project_header[ 'layout' ] === 'right' ) $pcs_layout_css .= 'half left';
                                    else $pcs_layout_css .= 'half right';
                                }

                                $pcs_srcs = array(
                                    'landscape' => isset( $pcs['src_landscape'] ) ? $pcs['src_landscape'] : "",
                                    'portrait'  => isset( $pcs['src_portrait'] ) ? $pcs['src_portrait'] : ""
                                );

                                ?>

                                <li class="<?php echo $pcs_layout_css; ?>">
                                    
                                    <div class="pci-outer">
                                        <div class="pci"
                                            data-src-landscape="<?php echo $pcs_srcs['landscape']; ?>"
                                            data-src-portrait="<?php echo $pcs_srcs['portrait']; ?>"
                                        ></div>
                                    </div>

                                </li>

                                <?php endforeach; ?>

                            </ul>
                        </div>

                        <?php endif; ?>
                    </header>


                    <?php
                    /**------------------------------------------------------**\
                     * TEMPLATE: PROJECT DESCRIPTION
                     **------------------------------------------------------**/
                    ?>

                    <?php if ( isset( $project_desc_section ) ) : ?>

                    <div class="project-desc">

                        <?php foreach ( $project_desc_section as $pd_section_key => $pd_section_val ) : ?>
                            
                            <?php
                                $__inline_style = "\r\n";

                                if ( !is_null($pd_section_val['desc_sect_bgi'] ) ) {

                                    if ( !is_null($pd_section_val['desc_sect_bgo'] ) ) {
                                        $__inline_style .= "background: url(" . $pd_section_val['desc_sect_bgo']['url'] . ") ";
                                        $__inline_style .= "repeat,\r\n";
                                    }

                                    $__inline_style .= "transparent url(" . $pd_section_val['desc_sect_bgi']['url'] . ") ";
                                    $__inline_style .= "no-repeat center center;\r\n";

                                    $__inline_style .= "background-size: ";
                                    if ( !is_null($pd_section_val['desc_sect_bgo'] ) ) {
                                        $__inline_style .= $pd_section_val['desc_sect_bgo']['sizes']['large-width'] . "px ";
                                        $__inline_style .= $pd_section_val['desc_sect_bgo']['sizes']['large-height'] . "px, ";
                                    }
                                    $__inline_style .= "cover;\r\n";
                                }

                                if( $pd_section_val['desc_sect_bgc'] !== "" ) {
                                    $__inline_style .= "background-color: ";
                                    $__inline_style .= $pd_section_val['desc_sect_bgc'] . ";\r\n";
                                }
                            ?>

                            <div class="pd-section" style="<?php echo $__inline_style; ?>">

                                <?php foreach ( $pd_section_val['desc_copy'] as $pd_copy_key => $pd_copy_val ) : ?>
                                    <?php switch( $pd_copy_val['acf_fc_layout'] ) : case 'desc_copy_yell' : ?>

                                        <?php $__css_classes = 'pd-copy yell ' . $pd_copy_val['desc_copy_yell_layout'] ?>
                                        <?php if ( isset($pd_copy_val[ 'desc_copy_yell_color' ]) ) $__inline_style = "color: " . $pd_copy_val[ 'desc_copy_yell_color' ] . "; "; ?>
                                        <p class="<?php echo $__css_classes; ?>" style="<?php echo $__inline_style; ?>"
                                        ><?php echo $pd_copy_val['desc_copy_yell_text']; ?></p>

                                    <?php break; case 'desc_copy_shout' : ?>

                                        <?php $__css_classes = 'pd-copy shout ' . $pd_copy_val['desc_copy_shout_layout'] ?>
                                        <?php if ( isset($pd_copy_val[ 'desc_copy_shout_color' ]) ) $__inline_style = "color: " . $pd_copy_val[ 'desc_copy_shout_color' ] . "; "; ?>
                                        <p class="<?php echo $__css_classes; ?>" style="<?php echo $__inline_style; ?>"
                                        ><?php echo $pd_copy_val['desc_copy_shout_text']; ?></p>

                                    <?php break; case 'desc_copy_speak' : ?>

                                        <?php $__css_classes = 'pd-copy speak ' . $pd_copy_val['desc_copy_speak_layout'] ?>
                                        <?php if ( isset($pd_copy_val[ 'desc_copy_speak_color' ]) ) $__inline_style = "color: " . $pd_copy_val[ 'desc_copy_speak_color' ] . "; "; ?>
                                        <p class="<?php echo $__css_classes; ?>" style="<?php echo $__inline_style; ?>"
                                        ><?php echo $pd_copy_val['desc_copy_speak_text']; ?></p>

                                    <?php endswitch; ?>
                                <?php endforeach; ?>
                            </div>

                        <?php endforeach; ?>
                    </div>

                    <?php endif; ?>
                </article>
        
                <?php endwhile; ?>
        
            <?php else : ?>
        
                <p>no project found</p>
        
            <?php endif; ?>
        
            </main><!-- #main -->
        </div><!-- #inner-content -->
    </div>

<?php get_footer(); ?>
