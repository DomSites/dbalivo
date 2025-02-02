<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Contact_CSS' ) ) {	
    
    class UT_Contact_CSS extends UT_Custom_CSS {
        
        public function custom_css() {
            
            /* contact section is off, leave here */
            if( ut_return_csection_config('ut_activate_csection') != 'on' ) {
                return;
            }
                   
            ob_start(); ?>

            <style id="ut-contact-section-css" type="text/css">
                
                <?php if( ot_get_option('ut_csection_fancy_border' , 'off' ) == 'on') : ?>
                    
                    /* fancy border */
                    #contact-section .ut-fancy-border { 
                        display: block; 
                        position: absolute; 
                        bottom: 0; 
                        left: 0; 
                        width: 100%; 
                        background:<?php echo ot_get_option('ut_csection_fancy_border_background_color' , '#FFF'); ?>; 
                        border-bottom:<?php echo ot_get_option('ut_csection_fancy_border_size' , '10px'); ?>;
                        border-color:<?php echo ot_get_option('ut_csection_fancy_border_color' , $this->accent); ?>; 
                        border-style: dashed; 
                        z-index:9999; 
                    }
                    
                    #contact-section { position:relative; }  
                    
                <?php endif; ?>
                
                
                <?php
                
                /* contact section header styling */
                $ut_csection_header_slogan_color = ot_get_option('ut_csection_header_slogan_color');
                
                $ut_csection_header_style = ot_get_option('ut_csection_header_style' , 'pt-style-1');
                $ut_csection_header_style = $ut_csection_header_style == 'global' ? ot_get_option('ut_global_headline_style') : $ut_csection_header_style;
                
                /* pt style 2 */
                if( $ut_csection_header_style == 'pt-style-2') {                
                
                    $ut_csection_headline_style_2_color  = ot_get_option('ut_csection_headline_style_2_color', ot_get_option('ut_csection_header_slogan_color', ot_get_option('ut_global_headline_style_2_color', '#151515') ) );
                    $ut_csection_headline_style_2_height = ot_get_option('ut_csection_headline_style_2_height', ot_get_option('ut_global_headline_style_2_height', '1px') );
                    $ut_csection_headline_style_2_width  = ot_get_option('ut_csection_headline_style_2_width', ot_get_option('ut_global_headline_style_2_width', '30px') );
                    
                    echo $this->section_headline_css( 
                        '#contact-section',
                        'pt-style-2', 
                        $ut_csection_headline_style_2_color,
                        $ut_csection_headline_style_2_height,
                        $ut_csection_headline_style_2_width 
                    );
                
                }
                
                /* pt style 3 needs a fallback color */
                if( empty( $ut_csection_header_slogan_color) && $ut_csection_header_style == 'pt-style-3' ) {
                    $ut_csection_header_slogan_color = $this->accent;
                }
                
                /* pt style 4 */
                if( $ut_csection_header_style == 'pt-style-4' && ot_get_option("ut_csection_headline_style_4_width") ) {
                    echo '#contact-section .pt-style-4 .page-title span, 
                          #contact-section .pt-style-4 .parallax-title span, 
                          #contact-section .pt-style-4 .section-title span {
                            border-width: ' . ot_get_option("ut_csection_headline_style_4_width") . 'px;
                          }';
                }              
            
                if( !empty( $ut_csection_header_slogan_color ) ) {
                    
                    echo '#contact-section .parallax-title, #contact-section .section-title { color: ' . $ut_csection_header_slogan_color . '; }';
                    echo $this->section_headline_css( '#contact-section', $ut_csection_header_style, $ut_csection_header_slogan_color );
                    
                }
                
                if( $ut_csection_header_style == 'global' ) {
                    
                    echo $this->section_headline_css( 
                        '#contact-section',
                        'pt-style-2', 
                        ot_get_option('ut_global_headline_style_2_color', '#151515'),
                        ot_get_option('ut_global_headline_style_2_height', '1px'),
                        ot_get_option('ut_global_headline_style_2_width', '30px') 
                    );
                    
                }
                
                /* slogan spacing */
                if( ot_get_option('ut_csection_header_expertise_slogan_margin_top') ) {
                    echo '#contact-section .lead { margin-top: ' . ot_get_option('ut_csection_header_expertise_slogan_margin_top') . ' }'. "\n";    
                }    
            
            
                /* title span highlight */
                echo '#contact-section .parallax-title span span, #contact-section .section-title span span { color:' . $this->accent . '; }';
                
                /* contact section section styles */
                $csection_background      = NULL;
                $csection_background_type = ot_get_option('ut_csection_background_type' , 'image');
                $csection_parallax        = ot_get_option('ut_csection_parallax', 'on');
            
                /* contact section styling */
                if( $csection_background_type == 'image' ) {
                    
                    $ut_csection_background_image = ut_return_csection_config('ut_csection_background_image');                
                    
                    if( is_array( $ut_csection_background_image ) && !empty( $ut_csection_background_image['background-image'] ) ) {                    
                        
                        if( $csection_parallax == 'on' && !unite_mobile_detection()->isMobile() ) {
                        
                            $csection_background .= $this->css_background( '#contact-section .parallax-scroll-container' , $ut_csection_background_image );
                        
                        } else {
                        
                            $csection_background .= $this->css_background( '#contact-section' , $ut_csection_background_image );                        
                        
                        }
                        
                        /* store for later use */
                        $ut_csection_background_image = $ut_csection_background_image['background-image'];
                        
                    
                    } elseif( !is_array( $ut_csection_background_image ) ) {
                        
                        if( $csection_parallax == 'on' && !unite_mobile_detection()->isMobile() ) {
                        
                            $csection_background .= !empty( $ut_csection_background_image ) ? '#contact-section .parallax-scroll-container { background-image: url(' . esc_url( $ut_csection_background_image ) . '); }'. "\n" : '';
                        
                        } else {
                        
                            $csection_background .= !empty( $ut_csection_background_image ) ? '#contact-section { background-image: url(' . esc_url( $ut_csection_background_image ) . '); }'. "\n" : '';                        
                        
                        }
                        
                    }
                    
                }
                
                /* video poster image */
                if( $csection_background_type == 'video' && unite_mobile_detection()->isMobile() || unite_mobile_detection()->isMobile() && ot_get_option('ut_front_video_containment' ,'hero') == 'body' ) {
                    
                    $ut_csection_video_poster = ot_get_option('ut_csection_video_poster');    
                    
                    /* video poster image for mobile devices */    
                    echo '#contact-section { 
                          background-image: url(' . esc_url( $ut_csection_video_poster ) . '); 
                          background-size: cover !important;
                          background-attachment: scroll !important;
                    }';
                
                }
                
                /* there is no image, so we check if a background color has been set */
                $ut_csection_background_color = ot_get_option('ut_csection_background_color');
                if( empty( $ut_csection_background_image ) || empty( $ut_csection_video_poster ) ) {
                    
                    $csection_background .= !empty( $ut_csection_background_color ) ? '#contact-section { background: ' . $ut_csection_background_color . '; }'. "\n" : '';
                    
                }
               
                /* add to CSS */
                echo $csection_background;
                
                /* contact section border styling */
                if( ot_get_option('ut_activate_csection_border' , 'off') == 'on' ) {
                    
                    /* border settings */
                    $ut_csection_border_color = ot_get_option('ut_csection_border_color');                                
                    $ut_csection_border_color = !empty($ut_csection_border_color) ? $ut_csection_border_color : $this->accent;                                
                    $ut_csection_border_width = ot_get_option('ut_csection_border_width'); 
                    $ut_csection_border_width = !empty( $ut_csection_border_width) ?  $ut_csection_border_width : '1'; 
                    $ut_csection_border_style =  ot_get_option('ut_csection_border_style'); 
                    $ut_csection_border_style = !empty( $ut_csection_border_style) ?  $ut_csection_border_style : 'solid';                               
                   
                    if( ut_return_csection_config('ut_csection_overlay', 'on') == 'on' ) {
                    
                        echo '#contact-section .parallax-overlay { border-top: ' . $this->add_px_value( $ut_csection_border_width ) . ' ' . $ut_csection_border_style . ' ' . $ut_csection_border_color . '; }';
                        
                    } else {
                        
                        echo '#contact-section { border-top: ' . $this->add_px_value( $ut_csection_border_width ) . ' ' . $ut_csection_border_style . ' ' . $ut_csection_border_color . '; }';
                        
                    }
                
                } 
                
                
                /* contact section box styling */
                $ut_left_csection_content_area_color  = ot_get_option('ut_left_csection_content_area_color');
                $ut_right_csection_content_area_color = ot_get_option('ut_right_csection_content_area_color');
                
                $ut_left_csection_content_area_opacity  = ot_get_option('ut_left_csection_content_area_opacity' , '0.8' );
                $ut_right_csection_content_area_opacity = ot_get_option('ut_right_csection_content_area_opacity', '0.8' );
                
                echo !empty( $ut_left_csection_content_area_color )  ? '#contact-section .ut-left-footer-area { background: rgb(' . $this->hex_to_rgb( $ut_left_csection_content_area_color ) . ',' . $ut_left_csection_content_area_opacity . '); }' : '';
                echo !empty( $ut_left_csection_content_area_color )  ? '#contact-section .ut-left-footer-area { background: rgba(' . $this->hex_to_rgb( $ut_left_csection_content_area_color ) . ',' . $ut_left_csection_content_area_opacity . '); }' : '';
                echo !empty( $ut_right_csection_content_area_color ) ? '#contact-section .ut-right-footer-area { background: rgb(' . $this->hex_to_rgb( $ut_right_csection_content_area_color ) . ',' . $ut_right_csection_content_area_opacity . '); }' : '';
                echo !empty( $ut_right_csection_content_area_color ) ? '#contact-section .ut-right-footer-area { background: rgba(' . $this->hex_to_rgb( $ut_right_csection_content_area_color ) . ',' . $ut_right_csection_content_area_opacity . '); }' : '';
                
                /* contact section overlay color */
                $ut_csection_overlay = ut_return_csection_config('ut_csection_overlay', 'on');
                $ut_csection_overlay_color = ut_return_csection_config('ut_csection_overlay_color');
                $ut_csection_overlay_opacity = ut_return_csection_config('ut_csection_overlay_opacity' , '0.8');
                
                echo !empty( $ut_csection_overlay_color )  ? '#contact-section .parallax-overlay { background: rgb(' . $this->hex_to_rgb( $ut_csection_overlay_color ) . ',' . $ut_csection_overlay_opacity . '); }' : '';
                echo !empty( $ut_csection_overlay_color )  ? '#contact-section .parallax-overlay { background: rgba(' . $this->hex_to_rgb( $ut_csection_overlay_color ) . ',' . $ut_csection_overlay_opacity . '); }' : '';
                
                /* contact section header padding bottom */
                $ut_csection_header_padding_bottom = ot_get_option('ut_csection_header_padding_bottom');
                
                echo !empty( $ut_csection_header_padding_bottom ) ? '#contact-section .parallax-header, #contact-section .section-header { margin-bottom: ' . $ut_csection_header_padding_bottom . '; }' : '';   
                
            
                
                
            
            
            
            
            
            
            
                /* contact section section padding */
                $ut_csection_padding_top    = ot_get_option('ut_csection_padding_top', '80px');
                $ut_csection_padding_bottom = ot_get_option('ut_csection_padding_bottom', '60px' );
            
                if( $ut_csection_overlay == 'on' ) {
                    
                    if( ot_get_option('ut_csection_padding_top') ) {
                        

                        echo '#contact-section.ut-contact-section-with-overlay .parallax-overlay { padding-top:' . ot_get_option('ut_csection_padding_top') . '; }';  
                        
                    } else {
                    
                        echo '#contact-section.ut-contact-section-with-overlay .parallax-overlay { padding-top:' . ot_get_option( 'ut_section_spacing_system' , '80' ) . 'px; }';
                        
                    }                    
                    
                    if( ot_get_option('ut_csection_padding_bottom') ) {
                        
                        echo '#contact-section.ut-contact-section-with-overlay .parallax-overlay { padding-bottom:' . ot_get_option('ut_csection_padding_bottom') . '; }';  
                        
                    } else {
                        
                        if( ut_return_csection_config('ut_show_scroll_up_button' , 'on') == 'on' ) { 
                            
                            echo '#contact-section.ut-contact-section-with-overlay.ut-contact-section-scroll-top .parallax-overlay { padding-bottom:' . ( ot_get_option( 'ut_section_spacing_system' , '80' ) + 40 ) . 'px; }';
                        
                        } else {
                            
                            echo '#contact-section.ut-contact-section-with-overlay .parallax-overlay { padding-bottom:' . ( ot_get_option( 'ut_section_spacing_system' , '80' ) ) . 'px; }';
                            
                        }                        
                        
                    }
                    
                } else {
                    
                    
                    if( ot_get_option('ut_csection_padding_top') ) {
                        
                        echo '#contact-section.ut-contact-section-without-overlay { padding-top:' . ot_get_option('ut_csection_padding_top') . '; }';  
                        
                    } else {
                    
                        echo '#contact-section.ut-contact-section-without-overlay { padding-top:' . ot_get_option( 'ut_section_spacing_system' , '80' ) . 'px; }';
                        
                    }
                    
                    
                    if( ot_get_option('ut_csection_padding_bottom') ) {
                        
                        echo '#contact-section.ut-contact-section-without-overlay { padding-bottom:' . ot_get_option('ut_csection_padding_bottom') . '; }';  
                        
                    } else {
                        
                        if( ut_return_csection_config('ut_show_scroll_up_button' , 'on') == 'on' ) {
                            
                            echo '#contact-section.ut-contact-section-without-overlay.ut-contact-section-scroll-top { padding-bottom:' . ( ot_get_option( 'ut_section_spacing_system' , '80' ) + 40 ) . 'px; }';
                            
                        } else {
                            
                            echo '#contact-section.ut-contact-section-without-overlay { padding-bottom:' . ( ot_get_option( 'ut_section_spacing_system' , '80' ) ) . 'px; }';
                            
                        }                        
                        
                    }
                    
                    
                }
                
                if( ot_get_option( 'ut_site_layout', 'onepage' ) == 'onepage' ) {
                    
                    echo '#contact-section .ut-offset-anchor { top:-' . ( 79 + str_replace("px" , "" , $ut_csection_padding_top ) ), 'px; }';
                
                } ?>
                
                
                
                
                
            
            
            
            
            </style>
            
            <?php
            
            echo $this->minify_css( ob_get_clean() );
            
            
        }
    
    }

}

new UT_Contact_CSS;