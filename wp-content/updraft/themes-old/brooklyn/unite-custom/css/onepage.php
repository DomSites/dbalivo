<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_OnePage_CSS' ) ) {	
    
    class UT_OnePage_CSS extends UT_Custom_CSS {
        
        public function custom_css() {
            
            ob_start(); ?>
            
            <style type="text/css">

                .home:not(.blog) .main-content-background {
                    background: transparent !important;
                }    
                           
                <?php if( is_front_page() ) {
                
                /* retrieve query arguements */
                $pagequery = ut_prepare_front_query();                            
                
                if( !empty( $pagequery ) ) {
            
                    $css_query = new WP_Query( $pagequery );
                    
                    if ( $css_query->have_posts() ) :
                    
                        while ( $css_query->have_posts() ) : $css_query->the_post();
                                                        
                            $ut_section_video_state = get_post_meta( $css_query->post->ID , 'ut_section_video_state' , true );
                            
                                /* 
                                 * split section
                                 */
                                $ut_section_width = get_post_meta( $css_query->post->ID , 'ut_section_width' , true);
                                if( $ut_section_width == 'split' ) {
                                    
                                    /* try to get featured image */
                                    $fullsize = wp_get_attachment_url( get_post_thumbnail_id( $css_query->post->ID ) );
                                    
                                    if( !empty( $fullsize ) ) {
                                        echo '#' . ut_clean_section_id($css_query->post->post_name) . ' .ut-split-screen-poster{ background: url("' . $fullsize . '") }';
                                    }
                                    
                                    /* padding settings */
                                    $ut_split_section_margin_top = get_post_meta( $css_query->post->ID , 'ut_split_section_margin_top' , true);
                                    $ut_split_section_margin_bottom = get_post_meta( $css_query->post->ID , 'ut_split_section_margin_bottom' , true);
                                    
                                    /* fallback if there is no entry */
                                    $ut_split_section_margin_top = empty($ut_split_section_margin_top) ? '' : $ut_split_section_margin_top;
                                    $ut_split_section_margin_bottom = empty($ut_split_section_margin_bottom) ? '' : $ut_split_section_margin_bottom;
                                    
                                    $ut_split_content_align = get_post_meta( $css_query->post->ID , 'ut_split_content_align' , true);
                                    
                                    if( !empty( $ut_split_content_align ) && $ut_split_content_align == 'right' ) {
                                        echo '#' . ut_clean_section_id($css_query->post->post_name) . ' .ut-split-content-right { margin-top:' . $ut_split_section_margin_top . '; }'. "\n";
                                        echo '#' . ut_clean_section_id($css_query->post->post_name) . ' .ut-split-content-right { margin-bottom:' . $ut_split_section_margin_bottom . '; }'. "\n";
                                    }
                                    
                                    if( !empty( $ut_split_content_align ) && $ut_split_content_align == 'left' ) {                                    
                                        echo '#' . ut_clean_section_id($css_query->post->post_name) . ' .ut-split-content-left  { margin-top:' . $ut_split_section_margin_top . ';  }'. "\n";
                                        echo '#' . ut_clean_section_id($css_query->post->post_name) . ' .ut-split-content-left  { margin-bottom:' . $ut_split_section_margin_bottom . ';  }'. "\n";
                                    }
                                  
                                }                          
                                
                                
                                /* section fancy border */
                                if( get_post_meta( $css_query->post->ID , 'ut_section_fancy_border' , true ) == 'on' ) {
                                    
                                    $ut_section_fancy_border_color = get_post_meta( $css_query->post->ID , 'ut_section_fancy_border_color' , true);
                                    $ut_section_fancy_border_color = empty($ut_section_fancy_border_color) ? $this->accent : $ut_section_fancy_border_color;
                                    
                                    $ut_section_fancy_border_background_color = get_post_meta( $css_query->post->ID , 'ut_section_fancy_border_background_color' , true);
                                    $ut_section_fancy_border_background_color = empty($ut_section_fancy_border_background_color) ? '#FFF' : $ut_section_fancy_border_background_color;
                                    
                                    $ut_section_fancy_border_size = get_post_meta( $css_query->post->ID , 'ut_section_fancy_border_size' , true);
                                    $ut_section_fancy_border_size = empty($ut_section_fancy_border_size) ? '10px' : $ut_section_fancy_border_size;
                                    
                                    
                                    echo '#' . ut_clean_section_id($css_query->post->post_name) . ' .ut-fancy-border { 
                                        display: block; 
                                        position: absolute; 
                                        bottom: 0; 
                                        left: 0; 
                                        width: 100%; 
                                        background:' . $ut_section_fancy_border_background_color . '; 
                                        border-bottom:' . $ut_section_fancy_border_size . ';
                                        border-color:' . $ut_section_fancy_border_color . '; 
                                        border-style: dashed; 
                                        z-index:9999; 
                                    }';
                                    
                                }
                                                                
                                /* 
                                 * section padding
                                 */
                                
                                /* get overlay settings */
                                $ut_overlay_section = get_post_meta( $css_query->post->ID , 'ut_overlay_section' , true);                                
                                
                                /* padding settings */
                                $ut_section_padding_top = get_post_meta( $css_query->post->ID , 'ut_section_padding_top' , true);
                                $ut_section_padding_bottom = get_post_meta( $css_query->post->ID , 'ut_section_padding_bottom' , true);
                                $ut_section_slogan_padding = get_post_meta( $css_query->post->ID , 'ut_section_slogan_padding' , true );
                        
                                /* fallback if there is no entry */
                                $ut_section_padding_top = empty($ut_section_padding_top) ? '80px' : $ut_section_padding_top;
                                $ut_section_padding_bottom = empty($ut_section_padding_bottom) ? '60px' : $ut_section_padding_bottom;
                                $ut_section_slogan_padding = empty($ut_section_slogan_padding) ? '30px' : $ut_section_slogan_padding;    
                                
                                    /* add to CSS */
                                    if( $ut_overlay_section == 'on' ) {                                        
                                        echo '#' . ut_clean_section_id($css_query->post->post_name) . ' .parallax-overlay { padding-top:' . $ut_section_padding_top . '; padding-bottom:' . $ut_section_padding_bottom . '; }'. "\n";
                                        //echo '#' . ut_clean_section_id($css_query->post->post_name) . ' .ut-offset-anchor { top:-' . ( 79 + str_replace("px" , "" , $ut_navigation_padding_top) + str_replace("px" , "" , $ut_navigation_padding_bottom) ) . 'px; }'. "\n"; 
                                    } else {                                        
                                        echo '#' . ut_clean_section_id($css_query->post->post_name) . '{ padding-top:' . $ut_section_padding_top . '; padding-bottom:' . $ut_section_padding_bottom . '; }'. "\n";
                                        //echo '#' . ut_clean_section_id($css_query->post->post_name) . ' .ut-offset-anchor { top:-' . ( 79 + str_replace("px" , "" , $ut_section_padding_top) + str_replace("px" , "" , $ut_navigation_padding_top) + str_replace("px" , "" , $ut_navigation_padding_bottom) ) . 'px; }'. "\n"; 
                                    }
                                    
                                    echo '#' . ut_clean_section_id($css_query->post->post_name) . ' .parallax-header { padding-bottom:' . $ut_section_slogan_padding . '; }'. "\n";
                                    echo '#' . ut_clean_section_id($css_query->post->post_name) . ' .section-header { padding-bottom:' . $ut_section_slogan_padding . '; }'. "\n";                                    
                            
                                /* 
                                 * section header font
                                 */
                                
                                /* get font style */
                                $ut_section_header_font_style = get_post_meta( $css_query->post->ID , 'ut_section_header_font_style' , true );
                                
                                /* fallback if there is no entry */
                                $ut_section_header_font_style = empty($ut_section_header_font_style) ? 'semibold' : $ut_section_header_font_style;
                                
                                    /* add to CSS */
                                    echo $this->global_headline_font_style('#' . ut_clean_section_id($css_query->post->post_name) . ' .parallax-title' , $ut_section_header_font_style);
                                    echo $this->global_headline_font_style('#' . ut_clean_section_id($css_query->post->post_name) . ' .section-title' , $ut_section_header_font_style);                                
                                    
                                if($ut_section_video_state != 'on') {
                                
                                /* 
                                 * section parallax image
                                 */ 
                                    
                                /* get parallax settings*/
                                $ut_parallax_image = get_post_meta( $css_query->post->ID , 'ut_parallax_image' , true );
                                $ut_parallax_section = get_post_meta( $css_query->post->ID , 'ut_parallax_section' , true);
                                
                                /* image fallback to version 1.0 */
                                if( is_array( $ut_parallax_image ) && !empty( $ut_parallax_image['background-image'] ) ) {
                                    
                                    if( !empty( $ut_parallax_image ) && $ut_parallax_section == 'on' ) {
                                        
                                        echo $this->css_background( '#' . ut_clean_section_id( $css_query->post->post_name ) . ' .parallax-scroll-container' , $ut_parallax_image );
                                        
                                    } else {
                                        
                                        echo $this->css_background( '#' . ut_clean_section_id($css_query->post->post_name) , $ut_parallax_image );
                                        
                                    }
                                                                
                                } elseif( !is_array( $ut_parallax_image ) ) {
                                
                                    if( !empty( $ut_parallax_image ) && $ut_parallax_section == 'on' ) { 
                                        
                                        echo '#' . ut_clean_section_id($css_query->post->post_name) . ' .parallax-scroll-container { background-image: url(' . esc_url( $ut_parallax_image ) . '); }'. "\n";
                                    
                                    } else {  
                                        
                                        echo '#' . ut_clean_section_id($css_query->post->post_name) . ' { background-image: url(' . esc_url( $ut_parallax_image ) . '); }'. "\n";
                                    
                                    }; 
                                
                                }                               
                                                                
                                /* 
                                 * section background color 
                                 */                            
                                $ut_section_background_color = get_post_meta( $css_query->post->ID , 'ut_section_background_color' , true);
                                
                                if(!empty($ut_section_background_color)) {
                                    /* add to CSS */
                                    echo '#' . ut_clean_section_id($css_query->post->post_name) . '{ background-color: ' . $ut_section_background_color . '; }'. "\n";                                                                
                                }
                            }
                            
                            /* video poster for section */
                            if( unite_mobile_detection()->isMobile() && $ut_section_video_state != 'off' || unite_mobile_detection()->isMobile() && ot_get_option('ut_front_video_containment' ,'hero') == 'body' ) :
                                    
                                $ut_video_poster = get_post_meta( $css_query->post->ID , 'ut_section_video_poster' , true);
                                
                                if( !empty($ut_video_poster) ) {
                                    
                                    /* video poster image for mobile devices */    
                                    echo '#' . ut_clean_section_id($css_query->post->post_name) . ' { 
                                        background-image: url(' . esc_url( $ut_video_poster ) . '); 
                                        background-size: cover !important;
                                        background-attachment: scroll !important;
                                    }'. "\n";
                                    
                                } else {
                                    
                                    $ut_section_video_bgcolor = get_post_meta( $css_query->post->ID , 'ut_section_video_bgcolor' , true); 
                                    
                                    if( !empty($ut_section_video_bgcolor) ) {
                                        /* add to CSS */
                                        echo '#' . ut_clean_section_id($css_query->post->post_name) . '{ background-color: ' . $ut_section_video_bgcolor . '; }'. "\n";
                                        echo '#' . ut_clean_section_id($css_query->post->post_name) . ' .section-header.pt-style-1 .section-title span  { background-color: ' . $ut_section_video_bgcolor . '; }'. "\n"; 
                                    }
                                }                                               
                                
                            endif; 
                            
                            /* 
                             * section title , text , heading and lead color 
                             */
                            
                            $ut_section_text_color = get_post_meta( $css_query->post->ID , 'ut_section_text_color' , true);
                            if(!empty($ut_section_text_color)) {
                                
                                /* add to CSS */
                                echo '#' . ut_clean_section_id($css_query->post->post_name) . ' .section-content { color: ' . $ut_section_text_color . '; }'. "\n"; 
                                
                            }
                            
                            $ut_section_heading_color = get_post_meta( $css_query->post->ID , 'ut_section_heading_color' , true);
                            if( !empty($ut_section_heading_color) ) {
                                
                                /* add to CSS */
                                echo '#' . ut_clean_section_id($css_query->post->post_name) . ' .section-content h1 { color: ' . $ut_section_heading_color . '; }'. "\n";
                                echo '#' . ut_clean_section_id($css_query->post->post_name) . ' .section-content h2 { color: ' . $ut_section_heading_color . '; }'. "\n"; 
                                echo '#' . ut_clean_section_id($css_query->post->post_name) . ' .section-content h3 { color: ' . $ut_section_heading_color . '; }'. "\n"; 
                                echo '#' . ut_clean_section_id($css_query->post->post_name) . ' .section-content h4 { color: ' . $ut_section_heading_color . '; }'. "\n"; 
                                echo '#' . ut_clean_section_id($css_query->post->post_name) . ' .section-content h5 { color: ' . $ut_section_heading_color . '; }'. "\n"; 
                                echo '#' . ut_clean_section_id($css_query->post->post_name) . ' .section-content h6 { color: ' . $ut_section_heading_color . '; }'. "\n";  
                            }  

                            $ut_section_header_style = get_post_meta( $css_query->post->ID , 'ut_section_header_style', true );
                            $ut_section_header_style = ( !empty($ut_section_header_style) && $ut_section_header_style != 'global' ) ? $ut_section_header_style : ot_get_option('ut_global_headline_style');                             
                            
                            $ut_section_title_color = get_post_meta( $css_query->post->ID , 'ut_section_title_color' , true);                            
                            
                            /* pt style 3 needs a fallback */
                            if( empty($ut_section_title_color) && $ut_section_header_style == 'pt-style-3') {
                                $ut_section_title_color = $this->accent;
                            }
                            
                            if( !empty($ut_section_title_color) ) {
                                
                                /* add to CSS */
                                echo '#' . ut_clean_section_id($css_query->post->post_name) . ' .parallax-title { color: ' . $ut_section_title_color . '; }'. "\n";
                                echo '#' . ut_clean_section_id($css_query->post->post_name) . ' .section-title { color: ' . $ut_section_title_color . '; }'. "\n";
                                
                                echo $this->section_headline_css( '#' . ut_clean_section_id($css_query->post->post_name) , $ut_section_header_style , $ut_section_title_color );
             
                            }
                            
                            $ut_section_headline_style_2_color  = get_post_meta( $css_query->post->ID , 'ut_section_headline_style_2_color' , true);
                            $ut_section_headline_style_2_color  = !empty( $ut_section_headline_style_2_color ) ? $ut_section_headline_style_2_color : ot_get_option('ut_global_headline_style_2_color', '#222');
                            
                            $ut_section_headline_style_2_height = get_post_meta( $css_query->post->ID , 'ut_section_headline_style_2_height' , true);
                            $ut_section_headline_style_2_height  = !empty( $ut_section_headline_style_2_height ) ? $ut_section_headline_style_2_height : ot_get_option('ut_global_headline_style_2_height', '1px');
                            
                            $ut_section_headline_style_2_width  = get_post_meta( $css_query->post->ID , 'ut_section_headline_style_2_width' , true);
                            $ut_section_headline_style_2_width  = !empty( $ut_section_headline_style_2_width ) ? $ut_section_headline_style_2_width : ot_get_option('ut_global_headline_style_2_width', '30px');
                            
                            echo $this->section_headline_css( '#' . ut_clean_section_id($css_query->post->post_name), ' .pt-style-2', $ut_section_headline_style_2_color, $ut_section_headline_style_2_height, $ut_section_headline_style_2_width );
                            
                            /* pt style 4 */
                            $ut_section_headline_style_4_width  = get_post_meta( $post_ID , 'ut_section_headline_style_4_width' , true);
                            $ut_section_headline_style_4_width  = !empty( $ut_section_headline_style_4_width ) ? $ut_section_headline_style_4_width : ot_get_option('ut_global_headline_style_4_width', '6');
                            
                            echo '#' . ut_clean_section_id($css_query->post->post_name) . ' .pt-style-4 .page-title span, 
                                  ' . '#' . ut_clean_section_id($css_query->post->post_name) . ' .pt-style-4 .parallax-title span, 
                                  ' . '#' . ut_clean_section_id($css_query->post->post_name) . ' .pt-style-4 .section-title span {
                                    border-width:' . $ut_section_headline_style_4_width . ';
                                  }';
                    
                            /* 
                             * section title shadow
                             */
                            
                            if( get_post_meta( $css_query->post->ID , 'ut_section_title_glow' , true) == 'on' ) {
                                
                                $ut_section_title_color      = get_post_meta( $css_query->post->ID , 'ut_section_title_color' , true);
                                $ut_section_title_glow_color = get_post_meta( $css_query->post->ID , 'ut_section_title_glow_color' , true);
                                
                                if( !empty($ut_section_title_color) ) {                                
                                     
                                    /* add to CSS */ 
                                    echo '#' . ut_clean_section_id($css_query->post->post_name) . ' .parallax-title.ut-glow { 
                                        text-shadow: 0 0 40px ' . $ut_section_title_color . ', 2px 2px 3px black ; 
                                    }'. "\n";
                                    
                                    echo '#' . ut_clean_section_id($css_query->post->post_name) . ' .section-title.ut-glow { 
                                        text-shadow: 0 0 40px ' . $ut_section_title_color . ', 2px 2px 3px black; 
                                    }'. "\n";
                                
                                }
                                
                                if( !empty($ut_section_title_glow_color) ) {                                
                                    
                                    /* add to CSS */
                                    echo '#' . ut_clean_section_id($css_query->post->post_name) . ' .parallax-title.ut-glow { 
                                        text-shadow: 0 0 40px ' . $ut_section_title_glow_color . ', 2px 2px 3px black ; 
                                    }'. "\n";
                                    
                                    echo '#' . ut_clean_section_id($css_query->post->post_name) . ' .section-title.ut-glow { 
                                        text-shadow: 0 0 40px ' . $ut_section_title_glow_color . ', 2px 2px 3px black; 
                                    }'. "\n";
                                
                                }
                                                            
                            }
                            
                            
                            /* 
                             * section header spacing
                             */
                            $ut_section_header_margin_left  = get_post_meta( $css_query->post->ID , 'ut_section_header_margin_left' , true);
                            $ut_section_header_margin_right = get_post_meta( $css_query->post->ID , 'ut_section_header_margin_right' , true);
                                
                                /* add to CSS */
                                if( !empty($ut_section_header_margin_left) ) {
                                    echo '#' . ut_clean_section_id($css_query->post->post_name) . ' header.section-header { margin-left:'.$ut_section_header_margin_left.'; }'. "\n";
                                    echo '#' . ut_clean_section_id($css_query->post->post_name) . ' header.parallax-header { margin-left:'.$ut_section_header_margin_left.'; }'. "\n";
                                }
                                
                                /* add to CSS */ 
                                if( !empty($ut_section_header_margin_right) ) {
                                    echo '#' . ut_clean_section_id($css_query->post->post_name) . ' header.section-header { margin-right:'.$ut_section_header_margin_right.'; }'. "\n";
                                    echo '#' . ut_clean_section_id($css_query->post->post_name) . ' header.parallax-header { margin-right:'.$ut_section_header_margin_right.'; }'. "\n";
                                }
                            
                            /* 
                             * section p lead padding
                             */
                            $ut_section_slogan_padding_left  = get_post_meta( $css_query->post->ID , 'ut_section_slogan_padding_left' , true);
                            $ut_section_slogan_padding_right = get_post_meta( $css_query->post->ID , 'ut_section_slogan_padding_right' , true);
                                
                                /* add to CSS */
                                if( !empty($ut_section_slogan_padding_left) ) {                                    
                                    echo '#' . ut_clean_section_id($css_query->post->post_name) . ' .lead { padding-left: ' . $ut_section_slogan_padding_left . '; }'. "\n";                                    
                                }
                                
                                /* add to CSS */
                                if( !empty($ut_section_slogan_padding_right) ) {                                    
                                    echo '#' . ut_clean_section_id($css_query->post->post_name) . ' .lead { padding-right: ' . $ut_section_slogan_padding_right . '; }'. "\n";                                    
                                }
                            
                            /* 
                             * section lead color
                             */
                            $ut_section_slogan_color = get_post_meta( $css_query->post->ID , 'ut_section_slogan_color' , true);
                            
                                /* add to CSS */
                                if( !empty($ut_section_slogan_color) ) {
                                    echo '#' . ut_clean_section_id($css_query->post->post_name) . ' .lead, #' . ut_clean_section_id($css_query->post->post_name) . ' .lead p { color: ' . $ut_section_slogan_color . '; }'. "\n"; 
                                }
                            
                            
                            /* 
                             * overlay color
                             */
                             
                            if( $ut_overlay_section == 'on') {
                                
                                $ut_overlay_color = get_post_meta( $css_query->post->ID , 'ut_overlay_color' , true);
                                $ut_overlay_color_opacity = get_post_meta( $css_query->post->ID , 'ut_overlay_color_opacity' , true);
                                $ut_overlay_color_opacity = !empty($ut_overlay_color_opacity) ? $ut_overlay_color_opacity : '0.8';

                                
                                /* add to CSS */
                                echo '#' . ut_clean_section_id($css_query->post->post_name) . ' .parallax-overlay { background-color: rgb(' . ut_hex_to_rgb($ut_overlay_color) . '); }'. "\n";
                                echo '#' . ut_clean_section_id($css_query->post->post_name) . ' .parallax-overlay { background-color: rgba(' . ut_hex_to_rgb($ut_overlay_color) . ' , ' . $ut_overlay_color_opacity . ' ); }'. "\n";
                                
                            } 
                            
                            /* 
                             * section border top 
                             */
                            if( get_post_meta( $css_query->post->ID , 'ut_section_border_top' , true) == 'on' ) {
                                
                                /* border settings */
                                $ut_section_border_top_color = get_post_meta( $css_query->post->ID , 'ut_section_border_top_color' , true);                                
                                $ut_section_border_top_color = !empty($ut_section_border_top_color) ? $ut_section_border_top_color : $this->accent;                                
                                $ut_section_border_top_width = get_post_meta( $css_query->post->ID , 'ut_section_border_top_width' , true); 
                                $ut_section_border_top_width = !empty( $ut_section_border_top_width) ?  $ut_section_border_top_width : '1'; 
                                $ut_section_border_top_style = get_post_meta( $css_query->post->ID , 'ut_section_border_top_style' , true); 
                                $ut_section_border_top_style = !empty( $ut_section_border_top_style) ?  $ut_section_border_top_style : 'solid';                               
                               
                                /* add to CSS */
                                if( $ut_overlay_section == 'on') {
                                    
                                    echo '#' . ut_clean_section_id($css_query->post->post_name) . ' .parallax-overlay { border-top: '.$ut_section_border_top_width.'px '.$ut_section_border_top_style.' '.$ut_section_border_top_color.'; }';
                                
                                } else {
                                    
                                    echo '#' . ut_clean_section_id($css_query->post->post_name) . '{ border-top: '.$ut_section_border_top_width.'px '.$ut_section_border_top_style.' '.$ut_section_border_top_color.'; }';
                                
                                }
                            
                            }
                            
                            
                            /* 
                             * section border bottom 
                             */
                            if( get_post_meta( $css_query->post->ID , 'ut_section_border_bottom' , true) == 'on' ) {
                                
                                /* border settings */
                                $ut_section_border_bottom_color = get_post_meta( $css_query->post->ID , 'ut_section_border_bottom_color' , true);                                
                                $ut_section_border_bottom_color = !empty($ut_section_border_bottom_color) ? $ut_section_border_bottom_color : $this->accent;                                
                                $ut_section_border_bottom_width = get_post_meta( $css_query->post->ID , 'ut_section_border_bottom_width' , true); 
                                $ut_section_border_bottom_width = !empty( $ut_section_border_bottom_width) ?  $ut_section_border_bottom_width : '1'; 
                                $ut_section_border_bottom_style = get_post_meta( $css_query->post->ID , 'ut_section_border_bottom_style' , true); 
                                $ut_section_border_bottom_style = !empty( $ut_section_border_bottom_style) ?  $ut_section_border_bottom_style : 'solid';                               
                               
                                /* add to CSS */
                                if( $ut_overlay_section == 'on') {
                                    
                                    echo '#' . ut_clean_section_id($css_query->post->post_name) . ' .parallax-overlay { border-bottom: '.$ut_section_border_bottom_width.'px '.$ut_section_border_bottom_style.' '.$ut_section_border_bottom_color.'; }';

                                } else {
                                    
                                    echo '#' . ut_clean_section_id($css_query->post->post_name) . ' { border-bottom: '.$ut_section_border_bottom_width.'px '.$ut_section_border_bottom_style.' '.$ut_section_border_bottom_color.'; }';
                                
                                }
                            
                            }
                            
                                                        
                        endwhile;
                    
                    endif;
                    
                    wp_reset_postdata();
                    
                }
            
            } /* end front page styling */ ?>
                
            </style>
            
            <?php 
            
            /* output css */
            echo $this->minify_css( ob_get_clean() );    
        
        }  
            
    }

}

if( ot_get_option( 'ut_site_layout', 'onepage' ) == 'onepage' ) {

    new UT_OnePage_CSS;

}