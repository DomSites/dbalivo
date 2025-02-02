<article id="post-<?php the_ID(); ?>" <?php post_class( 'ut-blog-list-article grid-100 tablet-grid-100 mobile-grid-100 clearfix' ); ?>>
    
    <div class="ut-blog-layout-list-article-inner">
    
        <?php if ( ( unite_has_post_thumbnail() || get_post_format_video_content() ) && ! post_password_required() ) : ?>
            
            <div class="ut-post-thumbnail">

                <div class="entry-thumbnail">
                    
                    <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>        
                                
                        <a title="<?php printf(esc_html__('Permanent Link to %s', 'unitedthemes'), get_the_title()); ?>" href="<?php the_permalink(); ?>">

                            <?php 

                                ut_create_picture( $post->ID, array( 
                                    'desktop' => array( '756', '700' ),
                                    'devices' => array(
                                        'tablet'  => array( '1336', '768', 'max-width: 1024px' ),
                                        'mobile'  => array( '767', '1336', 'max-width: 767px' )
                                    )  
                                ) );

                            ?>                

                        </a>
                        
                        <a title="<?php printf(esc_html__('Permanent Link to %s', 'unitedthemes'), get_the_title()); ?>" href="<?php the_permalink(); ?>">
                    
                            <div class="ut-meta-post-icon"><i class="Bklyn-Core-Right-6" aria-hidden="true"></i></div>

                        </a>                         
                        
                    <?php else : ?>

                        <?php post_format_video_content(); ?>
                    
                    <?php endif; ?>
                    
                    <a href="<?php echo get_month_link( get_the_time('Y'), get_the_time('m') ); ?>">
                    
                        <div class="date-format">
                            <span class="day"><?php the_time('d'); ?></span>
                            <span class="month"><?php the_time('M'); ?> <?php the_time('Y'); ?></span>
                        </div>
                    
                    </a>   
                        
                </div>  

            </div>
            <!-- Close UT-post-thumbnail -->

        <?php endif; ?>

        <div class="ut-blog-list-content">

            <div class="entry-meta entry-meta-top clearfix">

                <?php
                    /* translators: used between list items, there is a space after the comma */
                    $categories_list = get_the_category_list( esc_html__( ', ', 'unitedthemes' ) );
                    if ( $categories_list && unitedthemes_categorized_blog() ) :
                ?>
                <span class="ut-sticky"><i class="fa fa-thumb-tack"></i></span>
                <span class="cat-links"><i class="fa fa-folder-open-o"></i><?php printf( esc_html__( 'Posted in %1$s', 'unitedthemes' ), $categories_list ); ?></span> 

                <?php endif; ?>

            </div>
            <!-- close entry-meta -->
            
            <a class="ut-blog-link" title="<?php echo esc_attr( wp_strip_all_tags( get_the_title() ) ); ?>" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
            
                <div class="ut-blog-layout-list-content-wrap">

                    <?php if( get_the_title() ) :?>

                        <header class="entry-header clearfix">

                            <h2 class="entry-title"><?php the_title(); ?></h2>          

                        </header>
                        <!-- close entry-header -->

                    <?php endif; ?>

                    <div class="entry-content clearfix">

                        <?php echo unite_get_excerpt_by_id( $post, apply_filters( 'ut_blog_list_excerpt_length', ut_get_option( 'ut_blog_list_excerpt_length', 20 ) ) ); ?>

                    </div>
                    <!-- entry-content -->

                </div>
            
            </a>
            
            <div class="entry-meta clearfix">

                <span class="author-links"><i class="fa fa-user-o"></i><?php the_author_posts_link(); ?></span>

                <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>

                    <span class="comments-link"><i class="fa fa-comments-o"></i><?php comments_popup_link(esc_html__('No Comments', 'unitedthemes'), esc_html__('1 Comment', 'unitedthemes'), esc_html__('% Comments', 'unitedthemes')); ?></span>

                <?php endif; ?>       

            </div>
            <!-- close entry-meta -->
            
        </div>
    
    </div>
    
</article>
<!-- #post-<?php the_ID(); ?> -->