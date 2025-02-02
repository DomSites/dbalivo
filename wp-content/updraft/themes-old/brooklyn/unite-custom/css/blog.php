<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Blog_CSS' ) ) {	
    
    class UT_Blog_CSS extends UT_Custom_CSS { 
        
        public function custom_css() {
            
            ob_start(); ?>
            
            <style id="ut-blog-custom-css" type="text/css">
            
                
            <?php if( apply_filters( 'unite_blog_layout', ot_get_option('ut_blog_layout', 'classic') ) != 'classic' && ot_get_option( 'ut_blog_background_color' ) ) {
                
                echo '
                    .blog .main-content-background,
                    .archive .main-content-background,
                    .search .main-content-background,
                    .post.ut-blog-grid-article, 
                    .post.ut-blog-list-article { background: ' . ot_get_option( 'ut_blog_background_color' ) . '; }';
                
            } ?>
                
                
            <?php
            
            /**
             * Hero Title Font 
             */
            
            if( is_home() || ( is_single() && !is_singular( 'portfolio' ) ) ) {
                
                echo $this->font_style_css( array(
                    'selector'           => '.hero-title',
                    'font-type'          => ot_get_option('ut_blog_hero_font_type', 'ut-font' ),   
                    'font-style'         => ot_get_option('ut_blog_hero_font_style', 'semibold' ),
                    'google-font-style'  => ot_get_option('ut_google_blog_hero_font_style'),
                    'websafe-font-style' => ot_get_option('ut_blog_hero_websafe_font_style') 
                ) ); 
            
            }
            
            ?>
                                    
            /**
             * Title Highlight
             */            
            .entry-title span {
                color: <?php echo $this->accent; ?>; 
            }
                        
            /**
             * Blog Pagination
             */
            <?php if( ot_get_option('ut_blog_pagination_background_color') ) : ?>
                    
               #ut-blog-navigation { background: <?php echo ot_get_option('ut_blog_pagination_background_color'); ?>;} 
                
            <?php endif; ?>
            
            <?php if( ot_get_option('ut_blog_pagination_height') ) : ?>
                
               #ut-blog-navigation { height: <?php echo ot_get_option('ut_blog_pagination_height'); ?>px;}
               #ut-blog-navigation .fa { line-height: <?php echo ot_get_option('ut_blog_pagination_height'); ?>px;}  
                
            <?php endif; ?>
            
            <?php if( ot_get_option('ut_blog_pagination_arrow_color') ) : ?>
                
               #ut-blog-navigation a { color: <?php echo ot_get_option('ut_blog_pagination_arrow_color'); ?>;}
               #ut-blog-navigation a:visited { color: <?php echo ot_get_option('ut_blog_pagination_arrow_color'); ?>;}  
                
            <?php endif; ?>
            
            <?php if( ot_get_option('ut_blog_pagination_arrow_hover_color', $this->accent ) ) : ?>
                
               #ut-blog-navigation a:hover { color: <?php echo ot_get_option('ut_blog_pagination_arrow_hover_color', $this->accent ); ?>;} 
               #ut-blog-navigation a:focus { color: <?php echo ot_get_option('ut_blog_pagination_arrow_hover_color', $this->accent ); ?>;}
               #ut-blog-navigation a:active { color: <?php echo ot_get_option('ut_blog_pagination_arrow_hover_color', $this->accent ); ?>;}
                
            <?php endif; ?>           
            
                
            /**
             * Blog Titles
             */
            
            <?php if( ot_get_option('ut_global_blog_titles_font_style') ) : ?>
                 
                <?php echo $this->typography_css('.blog .ut-blog-classic-article .ut-quote-post-block, .blog .ut-blog-classic-article h2.entry-title, .archive .ut-blog-classic-article h2.entry-title, .search .ut-blog-classic-article h2.entry-title', ot_get_option('ut_global_blog_titles_font_style') ); ?>
                <?php echo $this->typography_css('.blog .ut-blog-mixed-large-article .ut-quote-post-block, .blog .ut-blog-mixed-large-article h2.entry-title, .archive .ut-blog-mixed-large-article h2.entry-title, .search .ut-blog-mixed-large-article h2.entry-title', ot_get_option('ut_global_blog_titles_font_style') ); ?>
                
            <?php endif; ?>
                
            <?php if( ot_get_option('ut_global_grid_blog_titles_font_style') ) : ?>
                 
                <?php echo $this->typography_css('.blog .ut-blog-grid-article .ut-quote-post-block, .blog .ut-blog-grid-article h2.entry-title, .archive .ut-blog-grid-article h2.entry-title, .search .ut-blog-grid-article h2.entry-title', ot_get_option('ut_global_grid_blog_titles_font_style') ); ?>
            
            <?php endif; ?>
                
                
            <?php if( ot_get_option('ut_global_list_blog_titles_font_style') ) : ?>
                 
                <?php echo $this->typography_css('.blog .ut-blog-list-article .ut-quote-post-block, .blog .ut-blog-list-article h2.entry-title, .archive .ut-blog-list-article h2.entry-title, .search .ut-blog-list-article h2.entry-title', ot_get_option('ut_global_list_blog_titles_font_style') ); ?>
            
            <?php endif; ?>    
              
                
            /**
             * Single Post Titles
             */
            
            <?php if( ot_get_option('ut_global_blog_single_titles_font_style') ) : ?>
                
                <?php echo $this->typography_css('.single-post h1.entry-title', ot_get_option('ut_global_blog_single_titles_font_style') ); ?>
            
            <?php endif; ?>            
            
                
            /**
             * Elements Border
             */
            
            <?php if( ot_get_option( 'ut_blog_avatar_border', 'on' ) == 'off' ) : ?>                
                
                .ut-hero-meta-author .ut-entry-avatar-image img, 
                .ut-archive-hero-avatar img,
                .author-avatar img,
                .comment-avatar .avatar {
                     -webkit-border-radius:0;
                        -moz-border-radius:0;
                             border-radius:0;    
                }
                
            <?php endif; ?> 
            
            <?php if( ot_get_option( 'ut_blog_button_border', 'off' ) == 'off' ) : ?>
                
                button, input[type="button"], 
                input[type="submit"], 
                .dark button, 
                .dark input[type="button"], 
                .dark input[type="submit"],
                .light button, 
                .light input[type="submit"], 
                .light input[type="button"] {
                     -webkit-border-radius:0;
                        -moz-border-radius:0;
                             border-radius:0;    
                }
                
            <?php endif; ?>                
                
            <?php if( ot_get_option( 'ut_blog_elements_border', 'on' ) == 'off' ) : ?>
                
                pre,
                .wp-caption img, 
                img[class*="wp-image-"],
                .ut-blog-layout-list-article-inner,
                .ut-blog-grid-article-inner,
                .ut-blog-classic-article .entry-thumbnail,
                .ut-blog-classic-article .ut-gallery-slider,
                .ut-blog-mixed-large-article-large,
                #commentform .comment-form-comment textarea,
                #commentform .comment-form-author input,
                #commentform .comment-form-email input,
                #commentform .comment-form-url input,
                .ut-format-link,
                .format-link .entry-header a,
                .comment-body,
                .ut-quote-post,
                .ut_widget_flickr li img {
                    -webkit-border-radius:0;
                        -moz-border-radius:0;
                            border-radius:0;   
                }

            <?php endif; ?>    
            
            
            <?php if( ot_get_option( 'ut_blog_elements_border', 'on' ) == 'on' && ot_get_option( 'ut_blog_elements_border_radius' ) ) : ?>    
                
                pre,
                .wp-caption img, 
                img[class*="wp-image-"],
                .ut-blog-layout-list-article-inner,
                .ut-blog-grid-article-inner,
                .ut-blog-classic-article .entry-thumbnail,
                .ut-blog-classic-article .ut-gallery-slider,
                .ut-blog-mixed-large-article-large,
                #commentform .comment-form-comment textarea,
                #commentform .comment-form-author input,
                #commentform .comment-form-email input,
                #commentform .comment-form-url input,
                .ut-format-link,
                .format-link .entry-header a,
                .comment-body,
                .ut-quote-post,
                .ut_widget_flickr li img {
                    -webkit-border-radius:<?php echo ot_get_option( 'ut_blog_elements_border_radius','4' ); ?>px;
                        -moz-border-radius:<?php echo ot_get_option( 'ut_blog_elements_border_radius','4' ); ?>px;
                            border-radius:<?php echo ot_get_option( 'ut_blog_elements_border_radius','4' ); ?>px;   
                }                
                
            <?php endif; ?>
                
                
            /**
             * Post Formats
             */    
            
            .ut-quote-post {
                background: <?php echo $this->accent; ?>;                    
            }                
            
            .format-quote .ut-quote-post-link:hover .ut-quote-post blockquote,
            .format-quote .ut-quote-post-link:active .ut-quote-post blockquote,
            .format-quote .ut-quote-post-link:focus .ut-quote-post blockquote {
                border-color: <?php echo $this->accent; ?>;
            }
            
            .single-post .ut-quote-post blockquote {
                border-color: <?php echo $this->accent; ?>;
            }
            
            
            /**
             * Author Bio
             */ 
            
            <?php if( ot_get_option("ut_author_archive_link_color") ) : ?>      
                
                .author-link {
                    color: <?php echo ot_get_option("ut_author_archive_link_color"); ?>;    
                }
            
            <?php endif; ?>    
                
                
            <?php if( ot_get_option("ut_author_archive_link_color_hover") ) : ?>    
                
                .author-link:hover, 
                .author-link:active, 
                .author-link:focus {
                    color: <?php echo ot_get_option("ut_author_archive_link_color_hover"); ?>;
                }    
            
            <?php endif; ?>         
            
            <?php if( ot_get_option("ut_author_archive_link_arrow_color") ) : ?>      
                
                .author-link i {
                    color: <?php echo ot_get_option("ut_author_archive_link_arrow_color"); ?>;    
                }
            
            <?php endif; ?>     
                
            <?php if( ot_get_option("ut_author_archive_link_arrow_color_hover") ) : ?>      
                
                .author-link:hover i {
                    color: <?php echo ot_get_option("ut_author_archive_link_arrow_color_hover"); ?>;    
                }
            <?php else: ?>
                
                .author-link:hover i {
                    color: <?php echo $this->accent; ?>;
                } 
                
            <?php endif; ?>    
            
            <?php if( ot_get_option("ut_author_bio_social_icon_color") ) : ?>      
                
                .author-social-links {
                    color: <?php echo ot_get_option("ut_author_bio_social_icon_color"); ?>;    
                }
            
            <?php endif; ?>    
                
            <?php if( ot_get_option("ut_author_bio_social_icon_color_hover") ) : ?>    
                
                .author-social-links a:hover, 
                .author-social-links a:active, 
                .author-social-links a:focus {
                    color: <?php echo ot_get_option("ut_author_bio_social_icon_color_hover"); ?>;
                }    
            
            <?php else : ?>    
                
                .author-social-links a:hover, 
                .author-social-links a:active, 
                .author-social-links a:focus {
                    color: <?php echo $this->accent; ?>;
                }
                
            <?php endif; ?>    
            
            
            /**
             * Blog Overview Colors
             */     
            
            <?php if( ot_get_option("ut_blog_overview_article_title_color") ) : ?>    
                
                .blog .ut-blog-classic-article h2.entry-title a, 
                .archive .ut-blog-classic-article h2.entry-title a, 
                .search .ut-blog-classic-article h2.entry-title a {
                    color: <?php echo ot_get_option("ut_blog_overview_article_title_color"); ?>;    
                }
                
            <?php endif; ?>    
                
            <?php if( ot_get_option("ut_blog_overview_article_title_color_hover") ) : ?>    
                
                .blog .ut-blog-classic-article h2.entry-title a:hover,
                .blog .ut-blog-classic-article h2.entry-title a:active, 
                .blog .ut-blog-classic-article h2.entry-title a:focus, 
                .archive .ut-blog-classic-article h2.entry-title a:hover,
                .archive .ut-blog-classic-article h2.entry-title a:active,
                .archive .ut-blog-classic-article h2.entry-title a:focus,
                .search .ut-blog-classic-article h2.entry-title a:hover,
                .search .ut-blog-classic-article h2.entry-title a:active,
                .search .ut-blog-classic-article h2.entry-title a:focus {
                    color: <?php echo ot_get_option("ut_blog_overview_article_title_color_hover"); ?>;    
                }
                
            <?php endif; ?>
                
            <?php if( ot_get_option("ut_blog_overview_meta_icon_color") ) : ?>    
                
                .reply-link i, .edit-link i, .tags-links i, .entry-meta i {
                    color: <?php echo ot_get_option("ut_blog_overview_meta_icon_color"); ?>;    
                }
                
            <?php endif; ?>    
            
            <?php if( ot_get_option("ut_blog_overview_meta_link_color") ) : ?>    
                
                .entry-meta a {
                    color: <?php echo ot_get_option("ut_blog_overview_meta_link_color"); ?>;    
                }
                
            <?php endif; ?>    
                
            <?php if( ot_get_option("ut_blog_overview_meta_link_color_hover") ) : ?>    
                
                .entry-meta a:hover,
                .entry-meta a:active,
                .entry-meta a:focus {
                    color: <?php echo ot_get_option("ut_blog_overview_meta_link_color_hover"); ?>;    
                }
                
            <?php endif; ?>    
            
            <?php if( ot_get_option('ut_blog_overview_meta_link_font_style') ) : ?>
                 
                <?php echo $this->typography_css('.entry-meta a', ot_get_option('ut_blog_overview_meta_link_font_style') ); ?>                
                
            <?php endif; ?>
                
            <?php if( ot_get_option("ut_blog_read_more_color") ) : ?>    
                
                .more-link {
                    color: <?php echo ot_get_option("ut_blog_read_more_color"); ?>;    
                }
                
            <?php endif; ?>
                
            <?php if( ot_get_option("ut_blog_read_more_color_hover") ) : ?>    
                
                .more-link:hover, .more-link:active, .more-link:focus {
                    color: <?php echo ot_get_option("ut_blog_read_more_color_hover"); ?>;    
                }
                
            <?php endif; ?>    
            
            <?php if( ot_get_option("ut_blog_read_more_icon_color") ) : ?>    
                
                .more-link i {
                    color: <?php echo ot_get_option("ut_blog_read_more_icon_color"); ?>;    
                }
                
            <?php endif; ?>    
                
            <?php if( ot_get_option("ut_blog_read_more_icon_color_hover") ) : ?>    
                
                .more-link:hover i, .more-link:active i, .more-link:focus i {
                    color: <?php echo ot_get_option("ut_blog_read_more_icon_color_hover"); ?>;    
                }
                
            <?php endif; ?>    
            
            <?php if( ot_get_option('ut_blog_read_more_font_style') ) : ?>
                 
                <?php echo $this->typography_css('.more-link', ot_get_option('ut_blog_read_more_font_style') ); ?>                
                
            <?php endif; ?>
            
            <?php if( ot_get_option('ut_blog_read_more_align') ) : ?>
                 
                .more-link .more-link { text-align: <?php echo ot_get_option('ut_blog_read_more_align','right'); ?>; }
                
            <?php endif; ?> 
                
            <?php if( ot_get_option("ut_blog_overview_gallery_arrow_color") ) : ?>    
                
                .ut-gallery-slider .flex-direction-nav a {
                    color: <?php echo ot_get_option("ut_blog_overview_gallery_arrow_color"); ?>;    
                }
                
            <?php endif; ?>    
            
            <?php if( ot_get_option("ut_blog_overview_gallery_arrow_background_color") ) : ?>    
                
                .ut-gallery-slider .flex-direction-nav a {
                    background: <?php echo ot_get_option("ut_blog_overview_gallery_arrow_background_color"); ?>;    
                }
                
            <?php endif; ?>                     
            
            <?php if( ot_get_option("ut_blog_overview_gallery_arrow_color_hover") ) : ?>    
                
                .ut-gallery-slider .flex-direction-nav a:hover,
                .ut-gallery-slider .flex-direction-nav a:active,
                .ut-gallery-slider .flex-direction-nav a:focus {
                    color: <?php echo ot_get_option("ut_blog_overview_gallery_arrow_color_hover"); ?>;    
                }
                
            <?php endif; ?>    
                
            <?php if( ot_get_option("ut_blog_overview_gallery_arrow_background_color_hover") ) : ?>    
                
                .ut-gallery-slider .flex-direction-nav a:hover,
                .ut-gallery-slider .flex-direction-nav a:active,
                .ut-gallery-slider .flex-direction-nav a:focus {
                    background: <?php echo ot_get_option("ut_blog_overview_gallery_arrow_background_color_hover"); ?>;    
                }
                
            <?php endif; ?>    
            
                
            /**
             * Meta Post Icons
             */  
                
            <?php if( ot_get_option("ut_blog_overview_pformat_icon_color") ) : ?>    
                
                .ut-meta-post-icon i {
                    color: <?php echo ot_get_option("ut_blog_overview_pformat_icon_color"); ?>;    
                }
                
            <?php endif; ?>    
                
            .ut-meta-post-icon {
                background: <?php echo ot_get_option("ut_blog_overview_pformat_icon_background_color", $this->accent ); ?>;    
            }   
                
            /**
             * Blog Date Colors for Classic Blog
             */ 
                
            <?php if( ot_get_option("ut_blog_overview_date_color") ) : ?>    
                
                .entry-meta .date-format .day {
                    color: <?php echo ot_get_option("ut_blog_overview_date_color"); ?>;    
                }
                
            <?php endif; ?>
            
            <?php if( ot_get_option("ut_blog_overview_date_color_bottom") ) : ?>    
                
                .entry-meta .date-format .month {
                    color: <?php echo ot_get_option("ut_blog_overview_date_color_bottom"); ?>;    
                }
                
            <?php endif; ?>    
                
            <?php if( ot_get_option( 'ut_blog_date_body_font', 'off' ) == 'on' ) : ?>    
                
                .entry-meta .date-format .day ,
                .entry-meta .date-format .month {
                    font-family: initial; 
                }
                
            <?php endif; ?>    
                
                
                
                
            
            <?php
            
            /**
             * Blog Date Skins
             */ 
            
            $date_color_skins = ot_get_option("ut_date_color_skins");
            
            if( !empty( $date_color_skins ) && is_array( $date_color_skins ) ) {
                
                foreach( $date_color_skins as $skin ) {

                    if( !empty( $skin["date_color"] ) ) {
                        
                        // blog grid 
                        echo '.ut-blog-grid-article.' . $skin["unique_id"] . ' .ut-post-thumbnail .date-format .day { color: ' . $skin["date_color"] . '; }';
                        echo '.ut-blog-grid-article.' . $skin["unique_id"] . ' .ut-format-gallery .date-format .day { color: ' . $skin["date_color"] . '; }';
                        
                        //blog list   
                        echo '.ut-blog-list-article.' . $skin["unique_id"] . ' .ut-post-thumbnail:not(.ut-post-thumbnail-empty) .date-format .day { color: ' . $skin["date_color"] . '; }';
                        echo '.ut-blog-list-article.' . $skin["unique_id"] . ' .ut-format-gallery .date-format .day { color: ' . $skin["date_color"] . '; }';
                        
                    }
                    
                    if( !empty( $skin["date_color_bottom"] ) ) {
                        
                        // blog grid 
                        echo '.ut-blog-grid-article.' . $skin["unique_id"] . ' .ut-post-thumbnail .date-format .month { color: ' . $skin["date_color"] . '; }';
                        echo '.ut-blog-grid-article.' . $skin["unique_id"] . ' .ut-format-gallery .date-format .month { color: ' . $skin["date_color"] . '; }';
                        
                        //blog list   
                        echo '.ut-blog-list-article.' . $skin["unique_id"] . ' .ut-post-thumbnail:not(.ut-post-thumbnail-empty) .date-format .month { color: ' . $skin["date_color"] . '; }';
                        echo '.ut-blog-list-article.' . $skin["unique_id"] . ' .ut-format-gallery .date-format .month { color: ' . $skin["date_color"] . '; }';
                        
                    }
                    
                    if( !empty( $skin["caption_color"] ) ) {
                        
                        // blog image caption
                        echo '.' . $skin["unique_id"] . ' .ut-post-thumbnail-caption { color: ' . $skin["caption_color"] . '; }';
                        
                    }
                    
                }
                
            } ?>
                
            </style>
            
            <?php
            
            /* output css */
            echo $this->minify_css( ob_get_clean() );
        
        }  
            
    }

}

new UT_Blog_CSS;