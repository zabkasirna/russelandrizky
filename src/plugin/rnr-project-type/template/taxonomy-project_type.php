<?php
/**
 * @package rdt-rnr15
 * @subpackage plugin/rnr_project
 * @version 0.0.0
 * @since 0.0.0
 */
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
                    $_term = $_taxonomy . '_' . $_term_id;
                    // debuggrr( $_queried_object );
                    
                    /**------------------------------------------------------**\
                     * DATA: PROJECT TYPE HEADER
                     **------------------------------------------------------**/

                    $pt_header = array(
                        'layout'      => get_field( 'project_type_head_layout', $_term ),
                        'title_color' => get_field( 'project_type_head_title_color', $_term ),
                        'desc_color'  => get_field( 'project_type_head_desc_color', $_term )
                    );

                    // debuggrr( $pt_header );
                    
                    /**------------------------------------------------------**\
                     * DATA: PROJECT TYPE BACKGROUND
                     **------------------------------------------------------**/

                    $ptbgs = array();

                    if ( get_field( 'ptbg_settings', $_term ) ) :
                        foreach( get_field( 'ptbg_settings', $_term ) as $ptbg ) :

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

                    // debuggrr( get_field( 'ptbg_settings', $_term ) );
                    // debuggrr( $ptbgs );
                ?>

                <header class="project-type-header" >
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

                    <div class="pt-header-fg <?php echo $pt_header['layout']; ?>">
                        <div class="ptfg-outer">
                            <h1 class="pt-title"
                                style="color: <?php echo $pt_header['title_color']; ?>;"
                            ><?php echo $_queried_object->name; ?></h1>
                            <?php if ( $_queried_object->description !== '' ) : ?>
                            <div class="pt-desc-outer"
                                style="color: <?php echo $pt_header['desc_color']; ?>;"
                            >
                                <p class="pt-desc"><?php echo $_queried_object->description; ?></p>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </header>

                <?php if ( have_posts() ) : ?>

                <div class="post-loop" >

                    <?php while ( have_posts() ) : the_post(); ?>

                    <?php
                        /**------------------------------------------------------**\
                         * DATA: PAD LAYOUT
                         **------------------------------------------------------**/

                        $pad_css = '';

                        if ( get_field( 'pad_layout' ) ) {
                            switch ( get_field( 'pad_layout' )) {
                                case 'pad_layout_0': $pad_css = 'w-full h-full'; break;
                                case 'pad_layout_1': $pad_css = 'w-half h-full'; break;
                                case 'pad_layout_2': $pad_css = 'w-full h-half'; break;
                                case 'pad_layout_3': $pad_css = 'w-half h-half'; break;
                                default: $pad_css = $pad_css; break;
                            }
                        }

                        // debuggrr( $pad_css );
                        
                        /**------------------------------------------------------**\
                         * DATA: POST CUSTOM COLOR
                         **------------------------------------------------------**/
                        
                    ?>

                    <div class="post <?php echo $pad_css; ?>">
                        <div class="post-inner">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php
                                    /**------------------------------------------------------**\
                                     * DATA: FEATURED IMAGE
                                     **------------------------------------------------------**/
                                    $_post_img_full = wp_get_attachment_image_src( get_post_thumbnail_id(), full )[0];
                                    $_post_img_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), thumbnail )[0];
                                ?>
                            <a class="post-bg"
                                href="<?php echo get_permalink(); ?>"
                                data-src-landscape="<?php echo $_post_img_full; ?>"
                                data-src-portrait="<?php echo $_post_img_thumb; ?>"
                            ></a>
                            <?php endif; ?>
                            
                            <div class="post-fg">
                                <div class="post-fg-head">
                                    <div class="post-fg-head-inner">
                                        <h2 class="post-title"><a href="<?php echo get_permalink(); ?>">_<?php echo the_title(); ?></a></h2>
                                        <div class="post-term">
                                            <?php echo the_terms( $post->ID, 'project_type', '', '', '' ); ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    if ( get_field( 'project_head_excerpt', $post->ID ) ) :
                                    
                                    $_project_head_excerpt = get_field( 'project_head_excerpt', $post->ID );
                                ?>
                                <div class="post-fg-body">
                                    <?php echo $_project_head_excerpt; ?>
                                </div>
                                <?php endif; ?>

                                <?php if ( has_post_thumbnail() ) : ?>
                                <div class="post-preloader">
                                    <div class="pp-bar"></div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>

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
