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
                                'src_landscape'=> $pcs['pci_source_landscape']['url'],
                                'src_portrait' =>
                                    $pcs['pci_is_responsive'] ?
                                        $pcs['pci_source_portrait']['url'] :
                                        $pcs['pci_source_landscape']['sizes']['thumbnail']
                                    ,
                                'layout'=>$pcs['pci_layout']
                            );

                    endforeach; endif;

                    // debuggrr( get_field( 'project_cover_settings' ) );
                    // debuggrr( $project_cover_settings );


                    /**------------------------------------------------------**\
                     * DATA: PROJECT DESCRIPTION
                     **------------------------------------------------------**/

                    if ( get_field( 'project_desc_section' ) ) :

                        $project_desc_section = get_field( 'project_desc_section' );

                    endif;

                    // debuggrr( $project_desc_section );
                    
                    /**------------------------------------------------------**\
                     * DATA: PROJECT META
                     **------------------------------------------------------**/

                    if ( get_field( 'project_meta' ) ) :

                        $project_meta = get_field( 'project_meta' );

                    endif;

                    // debuggrr( $project_meta );
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

                                // inline style to be printed
                                $__inline_style = "\r\n";

                                // background color
                                $__desc_sect_bgc = $pd_section_val['desc_sect_bgc'] !== "" ?
                                    $pd_section_val['desc_sect_bgc'] :
                                    "transparent"
                                ;

                                // background overlay
                                $__desc_sect_bgo_url = "";
                                if ( isset( $pd_section_val['desc_sect_bgo'] ) ) :

                                    switch( $pd_section_val['desc_sect_bgo'] ) : case 'desc_sect_bgo_1' :

                                        $__desc_sect_bgo_url .= "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAQAAAAECAYAAACp8Z5+AAAAJElEQVQIW2NkYGCoZ0CABkYkgQYGBga4AJgDUghS8R/GAQkAAK9UBYHnk87BAAAAAElFTkSuQmCC";

                                    break; case 'desc_sect_bgo_2' :

                                        $__desc_sect_bgo_url .= "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAQAAAAECAYAAACp8Z5+AAAAJklEQVQIW2NkYGD4z8DA0MAABYwMDAz1UAGwIEwAxAYJNCALgAUByNQFgQ1xvi4AAAAASUVORK5CYII=";

                                    break; case 'desc_sect_bgo_3' :

                                        $__desc_sect_bgo_url .= "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAQAAAAECAYAAACp8Z5+AAAAI0lEQVQIW2NkYGD4z8DA0MAABYwMDAz1MA6IRhYAqWrAUAEAn1QEAdi0guwAAAAASUVORK5CYII=";

                                    break; case 'desc_sect_bgo_4' :

                                        $__desc_sect_bgo_url .= "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAQAAAAECAYAAACp8Z5+AAAAFklEQVQIW2NkYGCoZ2BgaIBiBkbSBQDPVAYBj5BW5QAAAABJRU5ErkJggg==";

                                    break; case 'desc_sect_bgo_5' :

                                        $__desc_sect_bgo_url .= "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAQAAAAECAYAAACp8Z5+AAAAG0lEQVQIW2NkYGCoZ0ACjAwMDP/RBTBUoAgAAGTUAoFwA9RYAAAAAElFTkSuQmCC";

                                    break;
                                endswitch; endif; 

                                /**------------------------------------------------------**\
                                 * set inline style if
                                 * project desc background image
                                 * is available
                                 **------------------------------------------------------**/

                                if ( isset( $pd_section_val['desc_sect_bgi']['url'] ) ) {

                                    $__inline_style .= "background: ";

                                    // If background overlay available
                                    if ( $pd_section_val['desc_sect_bgo'] !== "" ) {
                                        $__inline_style .= "url(" . $__desc_sect_bgo_url . ") ";
                                        $__inline_style .= "repeat,\r\n";
                                    }

                                    $__inline_style .= $__desc_sect_bgc . " url(" . $pd_section_val['desc_sect_bgi']['url'] . ") ";
                                    $__inline_style .= "no-repeat center center;\r\n";

                                    $__inline_style .= "background-size: ";

                                    // If background overlay available
                                    if ( $pd_section_val['desc_sect_bgo'] !== "" ) {
                                        $__inline_style .= "4px ";
                                        $__inline_style .= "4px, ";
                                    }

                                    $__inline_style .= "cover;\r\n";
                                }

                                /**------------------------------------------------------**\
                                 * set inline style if only
                                 * project desc background color
                                 * which is available
                                 **------------------------------------------------------**/

                                if(
                                    in_array('desc_sect_is_bgc', $pd_section_val['desc_sect_options']) &&
                                    !in_array('desc_sect_is_bgi', $pd_section_val['desc_sect_options']) &&
                                    $pd_section_val['desc_sect_bgc'] !== ""
                                ) {
                                    $__inline_style = "\r\n";
                                    $__inline_style .= "background-color: ";
                                    $__inline_style .= $__desc_sect_bgc . ";\r\n";
                                }

                                // debuggrr( $__inline_style );
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

                    <?php
                    /**------------------------------------------------------**\
                     * TEMPLATE: PROJECT META
                     **------------------------------------------------------**/
                    ?>

                    <?php if ( isset( $project_meta ) ) : ?>

                    <div class="project-meta">
                        <ol class="project-meta-list">
                        <?php foreach ( $project_meta as $pd_meta_key => $meta_val ) : ?>
                            <?php switch( $meta_val['pmr_key'] ) : case 'pmr_val_client' : if ( !empty( $meta_val['pmr_val_client'] ) ) : ?>
                                <li><span class="meta-key">client</span><span class="meta-val"><?php echo $meta_val['pmr_val_client']; ?></span></li>
                            <?php endif; break; case 'pmr_val_date' : if ( !empty( $meta_val['pmr_val_date'] ) ) : ?>
                                <li><span class="meta-key">date</span><span class="meta-val"><?php echo $meta_val['pmr_val_date']; ?></span></li>
                            <?php endif; break; case 'pmr_val_role' : if ( !empty( $meta_val['pmr_val_role'] ) ) : ?>
                                <li><span class="meta-key">role</span><span class="meta-val"><?php echo $meta_val['pmr_val_role']; ?></span></li>
                            <?php endif; break; case 'pmr_val_credit' : if ( !empty( $meta_val['pmr_val_credit'] ) ) : ?>
                                <li><span class="meta-key">credit</span><span class="meta-val"><?php echo $meta_val['pmr_val_credit']; ?></span></li>
                            <?php endif; break; case 'pmr_val_custom' : if ( !empty( $meta_val['pmr_val_custom'] ) ) : ?>
                                <li><span class="meta-key"
                                    ><?php echo $meta_val['pmr_val_custom'][0]['pmr_val_custom_label'] ?: "N/A"; ?></span>
                                    <span class="meta-val"><?php echo $meta_val['pmr_val_custom'][0]['pmr_val_custom_text'] ?: "N/A"; ?></span
                                ></li>
                            <?php endif; break; ?>
                            <?php endswitch; ?>
                        <?php endforeach; ?>
                        </ol>
                    </div>

                    <?php endif; ?>

                </article>
        
                <?php endwhile; ?>
        
            <?php else : ?>
        
                <p>no project found</p>
            <?php endif; ?>
            </main>
        </div>
    </div>

    <div id="preloader" class="">
        <?php include_once( get_stylesheet_directory() . '/preloader.svg' ); ?>
    </div>

<?php get_footer(); ?>
