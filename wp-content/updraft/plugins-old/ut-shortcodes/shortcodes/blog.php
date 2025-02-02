<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Blog' ) ) {
	
    class UT_Blog {
        
        private $shortcode;
            
        function __construct() {
			
            /* shortcode base */
            $this->shortcode = 'ut_blog';
            
            add_action( 'init', array( $this, 'ut_map_shortcode' ) );
            add_shortcode( $this->shortcode, array( $this, 'ut_create_shortcode' ) );	
            
		}
        
        function ut_map_shortcode( $atts, $content = NULL ) {
            
            if( function_exists( 'vc_map' ) ) {
                                
                vc_map(
                    array(
                        'name'            => esc_html__( 'Blog Excerpt', 'ut_shortcodes' ),
                        'base'            => $this->shortcode,
                        'icon'            => UT_SHORTCODES_URL . '/admin/img/vc_icons/default.png',
                        'category'        => 'Community',
                        'class'           => 'ut-vc-icon-module ut-community-module', 
                        'content_element' => true,
                        'params'          => array(
                            
                            array(
                                'type'        => 'textfield',
                                'heading'     => esc_html__( 'Posts to Display', 'ut_shortcodes' ),
                                'description' => esc_html__( 'Enter desired amount of posts to display. Default 3.', 'ut_shortcodes' ),
                                'param_name'  => 'numberposts',
                                'group'       => 'General'
                            ),
                    
                            array(
                                'type'        => 'textfield',
                                'heading'     => esc_html__( 'Excerpt Length', 'ut_shortcodes' ),
                                'description' => esc_html__( '', 'ut_shortcodes' ),
                                'param_name'  => 'excerpt',
                                'group'       => 'General'
                            ),
                    
                            /*array(
                                'type' => 'dropdown',
                                'heading' => __( 'Order by', 'ut_shortcodes' ),
                                'param_name' => 'orderby',
                                'value' => array(
                                    __( 'Date', 'ut_shortcodes' ) => 'date',
                                    __( 'Order by post ID', 'ut_shortcodes' ) => 'ID',
                                    __( 'Author', 'ut_shortcodes' ) => 'author',
                                    __( 'Last modified date', 'ut_shortcodes' ) => 'modified',
                                    __( 'Number of comments', 'ut_shortcodes' ) => 'comment_count',
                                    __( 'Random order', 'ut_shortcodes' ) => 'rand',
                                ),
                                'description' => __( 'Select order type.', 'ut_shortcodes' ),
                                'group' => __( 'Data Settings', 'ut_shortcodes' ),
                            ),*/
                            array(
                                'type'        => 'textfield',
                                'heading'     => esc_html__( 'Show Posts by Category ID', 'ut_shortcodes' ),
                                'description' => esc_html__( 'Enter category ID, separate multiple category IDs with comma.', 'ut_shortcodes' ),
                                'param_name'  => 'cat',
                                'group'       => 'Query Settings'
                            ),        
                    
                            array(
                                'type'        => 'textfield',
                                'heading'     => esc_html__( 'Show Posts by Category Name', 'ut_shortcodes' ),
                                'description' => esc_html__( 'Enter category slug, separate multiple category slugs with comma.', 'ut_shortcodes' ),
                                'param_name'  => 'category_name',
                                'group'       => 'Query Settings'
                            ),
                    
                            array(
                                'type'        => 'textfield',
                                'heading'     => esc_html__( 'Link text to main blog.', 'ut_shortcodes' ),
                                'param_name'  => 'buttontext',
                                'group'       => 'General'
                            ),
                            
                            
                        )                        
                        
                    )
                
                ); /* end mapping */
                
            } 
        
        }
        
        function ut_create_shortcode( $atts, $content = NULL ) {
            
            $class = '';
            
            extract( shortcode_atts( array (
                'numberposts'     => '3',
                'excerpt'         => '',
                'cat'             => '',
                'category_name'   => '',                
                'buttontext'      => esc_html__('Read More' , 'ut_shortcodes'),
                'class'           => '',
            ), $atts ) ); 
            
            $args = array(
                'post_type'      => 'post',
                'cat'            => $cat,
                'category_name'  => $category_name,
                'posts_per_page' => $numberposts,    
            );
            
            /* blog output */
            $output = '<div class="ut-bs-wrap ' . $class . '">';
            
                /* initiate query */
                $blog_query = new WP_Query( $args );
                
                /* start loop */
                if ( $blog_query->have_posts() ) : while ( $blog_query->have_posts() ) : $blog_query->the_post();
                    
                    /* post format */
                    $post_format = get_post_format();
                    
                    /* start single blog entry */
                    $output .= '<div class="grid-33 tablet-grid-33 mobile-grid-100"><article id="post-' . $blog_query->post->ID . '" class="' . implode( " " ,get_post_class( "clearfix" ) ) . '">'; 
                    
                    /* entry header ( ho headline for quotes ) */
                    if( $post_format != 'quote' ) {    
                        
                        $output .= '<!-- entry-header --><header class="entry-header">';
                        
                            $output .= '<h3 class="entry-title"><a href="' . get_permalink() . '" rel="bookmark" title="' . sprintf(esc_html__("Permanent Link to %s", "ut_shortcodes"), get_the_title() ) . '">' . get_the_title() . '</a></h3>';
                            
                        $output .= '</header>';
                        
                    }
                    
                    /* entry meta */
                    $output .= '<div class="entry-meta">';
        
                        $output .= '<span class="ut-sticky"><i class="fa fa-thumb-tack"></i>' . esc_html__("Sticky Post", "ut_shortcodes") . '</span>';
                        $output .= '<span class="date-format"><i class="fa fa-clock-o"></i>' . esc_html__("On", "ut_shortcodes") . ' <span>' . get_the_time( get_option("date_format") ) . '</span></span>';
                        
                        if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : 
                        
                            $output .= '<span class="comments-link"><i class="fa fa-comments-o"></i>' . esc_html__("With", "ut_shortcodes") . ' ' . ut_get_comments_popup_link( esc_html__("No Comments", "ut_shortcodes"), esc_html__("1 Comment", "ut_shortcodes"), esc_html__("% Comments", "ut_shortcodes") ) . '</span>';
                        
                        endif;
                        
                    $output .= '</div>';
                                    
                    /* post thumbnail */
                    if ( has_post_thumbnail() && ! post_password_required() ) {    
                    
                        $postthumbnail = wp_get_attachment_url( get_post_thumbnail_id( $blog_query->post->ID ) );
                        
                        $output .= '<div class="entry-thumbnail">';
                            
                            $output .= '<a title="' . sprintf(esc_html__('Permanent Link to %s', 'ut_shortcodes'), get_the_title()) . '" href="' . get_permalink() . '">';
                                
                                $output .= get_the_post_thumbnail($blog_query->post->ID , "medium");
                                
                            $output .= '</a>';
                            
                        $output .= '</div>';
                        
                    }    
                    
                    /* post format gallery */
                    if( $post_format == 'gallery' && function_exists("ut_flex_slider") ) {
                        
                        $output .= ut_flex_slider( $blog_query->post->ID , true );
                        
                        if( !empty($excerpt) && (int)$excerpt ) {
                            
                            $the_content = $this->get_excerpt_by_id( $blog_query->post->ID , $excerpt );
                            
                        } else {
                            
                            /* default content without gallery shortcode */
                            $the_content = get_the_content( '<span class="more-link">' . esc_html__( 'Read more', 'ut_shortcodes' ) . '<i class="fa fa-chevron-circle-right"></i></span>' );
                            $the_content = preg_replace( '/(.?)\[(gallery)\b(.*?)(?:(\/))?\](?:(.+?)\[\/\2\])?(.?)/s', '$1$6', $the_content ); 
                            $the_content = apply_filters( 'the_content' , $the_content );
                            
                        }
                        
                        
                    } elseif ( $post_format == 'gallery' && !function_exists("ut_flex_slider") ) {
                        
                        /* default content with wordPress gallery shortcode */
                        if( !empty($excerpt) && (int)$excerpt ) {
                            
                            $the_content = $this->get_excerpt_by_id( $blog_query->post->ID , $excerpt );
                            
                        } else {
                            
                            $the_content = get_the_content( '<span class="more-link">' . esc_html__( 'Read more', 'ut_shortcodes' ) . '<i class="fa fa-chevron-circle-right"></i></span>' );
                            $the_content = apply_filters( 'the_content' , $the_content );    
                            
                        }
                    
                    } else {
                        
                        /* content for all other post formats */
                        if( !empty($excerpt) && (int)$excerpt ) {
                            
                            $the_content = $this->get_excerpt_by_id( $blog_query->post->ID , $excerpt );
                            
                        } else {
                            
                            $the_content = get_the_content( '<span class="more-link">' . esc_html__( 'Read more', 'ut_shortcodes' ) . '<i class="fa fa-chevron-circle-right"></i></span>' );
                            $the_content = apply_filters( 'the_content' , $the_content );
                                
                        }
                    
                    }
                    
                    /* post content */
                    $output .= '<!-- entry-content --><div class="entry-content clearfix">';
                        
                        /* add content which has been defined above */
                        $output .= $the_content;
                    
                    $output .= '</div><!-- close entry-content -->';
                                    
                    /* end single blog entry */
                    $output .= '</article></div><!-- close post -->';
                
                /* loop finished */
                endwhile; endif;        
                
                /* Restore original Post Data */
                wp_reset_postdata();
            
            $output .= '<div class="clear"></div>';
            
            /* create link to blog */
            $blog_id = get_option('page_for_posts');        
            $output .= '<div class="ut-bs-holder"><a class="ut-bs-btn" href="' . get_permalink( $blog_id ) . '">' . $buttontext . '</a></div>';
                        
            $output .= '</div>';
                            
            return $output;
        
        }
        
        function get_excerpt_by_id($post, $length = 10, $tags = '<a><em><strong>') {
        
            if( $post ) {
                
                $post = get_post($post);
                
            } elseif(!is_object($post)) {
                
                return false;
                
            }
             
            if( has_excerpt( $post->ID ) ) {
                
                $the_excerpt = $post->post_excerpt;
                $the_excerpt = apply_filters('the_content', $the_excerpt);
                $the_excerpt .= '<p><a class="more-link" href="' . get_permalink( $post->ID ) . '"><span class="more-link">' . esc_html__( 'Read More' , 'ut_shortcodes' ) . '<i class="fa fa-chevron-circle-right"></i></span></a></p>';
                return $the_excerpt;
                
            } else {
                
                $the_excerpt = $post->post_content;
                
            }
             
            $the_excerpt = strip_shortcodes(strip_tags($the_excerpt), $tags);
            $the_excerpt = preg_split('/\s+/', $the_excerpt, $length + 1);
            $excerpt_waste = array_pop($the_excerpt);
            $the_excerpt = implode(" ",$the_excerpt);
            
            if( isset($the_excerpt) && !empty($the_excerpt) ) {
                
                $the_excerpt  = '<p>' . $the_excerpt . '</p>';
                $the_excerpt .= '<p><a class="more-link" href="' . get_permalink( $post->ID ) . '"><span class="more-link">' . esc_html__( 'Read More' , 'ut_shortcodes' ) . '<i class="fa fa-chevron-circle-right"></i></span></a></p>';
                
            } else {
                
                $the_excerpt = '<p><a class="more-link" href="' . get_permalink( $post->ID ) . '"><span class="more-link">' . esc_html__( 'Read More' , 'ut_shortcodes' ) . '<i class="fa fa-chevron-circle-right"></i></span></a></p>';
            }
    
            return $the_excerpt;
            
        }
            
    }

}

new UT_Blog;