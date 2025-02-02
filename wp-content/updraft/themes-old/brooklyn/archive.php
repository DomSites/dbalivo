<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package unitedthemes
 */
global $wp_query;

get_header(); ?>

<div class="grid-container">
    
    <div id="primary" class="grid-parent grid-100 tablet-grid-100 mobile-grid-100">
        
        <?php if( apply_filters( 'unite_blog_layout', ot_get_option('ut_blog_layout', 'classic') ) == 'grid' ) : ?>          
            
            <div class="ut-blog-grid clearfix">    

        <?php endif; ?> 
        
        <?php if ( have_posts() ) : ?>

            <?php /* Start the Loop */ ?>

            <?php while ( have_posts() ) : the_post(); ?>

                <?php

                    /* before article hook */
                    ut_before_article_hook();

                    /* Include the Post-Format-specific template for the content.
                     * If you want to overload this in a child theme then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */

                    get_template_part( 'partials/' . unite_get_template_path() . '/content', get_post_format() );

                    /* after article hook */
                    ut_after_article_hook();

                ?>

            <?php endwhile; ?>

            <?php /* end the Loop */ ?>                    

        <?php endif; ?>
        
        <?php if( apply_filters( 'unite_blog_layout', ot_get_option('ut_blog_layout', 'classic') ) == 'grid' ) : ?>          
            
            </div>    

        <?php endif; ?>                                                      
                                                      
    </div><!-- #primary -->
    
</div><!-- .grid-container -->

<div class="ut-scroll-up-waypoint-wrap">
    <div class="ut-scroll-up-waypoint" data-section="section-to-main-content"></div>
</div>

<?php if( $wp_query->max_num_pages > 1 ) : ?>
    
    <div id="ut-blog-navigation">
        <div class="grid-container">
            <div class="grid-100">	
                <?php if ( have_posts() ) : ?>
                    <?php unitedthemes_content_nav( 'nav-below' ); ?>
                <?php endif; ?>	
            </div><!-- .grid-100 -->  
        </div><!-- .grid-container -->
    </div><!-- #ut-blog-navigation -->
    
<?php endif; ?>

<?php get_footer(); ?>