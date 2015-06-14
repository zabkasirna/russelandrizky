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

                    // Header Fields

                    $project_header = array(
                        'layout'         => get_field( 'project_head_layout' ),
                        'color'          => get_field( 'project_head_title_color' ),
                        'excerpt'        => get_field( 'project_head_excerpt' ),
                        'excerpt_color'  => get_field( 'project_head_excerpt_color' )
                    );

                    // debuggrr( $project_header );
                ?>

                <?php

                    $project_cover = array();

                    if ( get_field( 'project_cover_images' ) ) :
                    foreach( get_field( 'project_cover_images' ) as $pci ) :

                        // $project_cover[] = basename( $pci['url'] );
                        $project_cover[] = $pci['url'];

                    endforeach; endif;

                    debuggrr( $project_cover );

                ?>

                <article class="project-outer">
                    
                    <header class="project-header">
                        
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


                        <?php if ( !empty( $project_cover ) ) : ?>

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

                        <div class="project-cover-outer <?php echo $project_header[ 'layout' ] === 'right' ? 'left' : 'right'; ?>">
                            

                            <ul class="project-cover">
                                

                                <?php foreach( $project_cover as $pci ) : ?>

                                <li class="project-cover-lists">
                                    
                                    <img src="<?php echo $pci; ?>" alt="" class="project-cover-image">

                                </li>

                                <?php endforeach; ?>

                            </ul>

                        </div>

                        <?php endif; ?>


                    </header>
                </article>
        
                <?php endwhile; ?>
        
            <?php else : ?>
        
                <p>no project found</p>
        
            <?php endif; ?>
        
            </main><!-- #main -->
        </div><!-- #inner-content -->
    </div>

<?php get_footer(); ?>
