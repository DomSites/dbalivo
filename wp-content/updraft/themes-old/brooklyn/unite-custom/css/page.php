<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Page_CSS' ) ) {	
    
    class UT_Page_CSS extends UT_Custom_CSS {
        
        function headline_style( $div = '',  $style = 'pt-style-1' , $color = '' , $height = '' , $width = '' ) {
        
            if( empty( $color ) && $style != 'pt-style-4'  ) {
                return;
            }
                    
            switch ( $style ) {
                
                case 'pt-style-2':
                    
                    return '
                    '.$div.':after {
                        background-color: ' . $color . ';
                        height: ' . $height .';
                        width: ' . $width . ';
                    }';
                    
                break;
                
                case 'pt-style-3':
                    
                    return '
                        '.$div.' span { 
                            background:' . $color . ';            
                            -webkit-box-shadow:0 0 0 3px' . $color . '; 
                            -moz-box-shadow:0 0 0 3px' . $color . '; 
                            box-shadow:0 0 0 3px' . $color . '; 
                        }
                    ';                
                    
                break;
                
                case 'pt-style-4':
                    
                    return '
                    '.$div.' span {
                        border-width:' . $width . 'px;
                    }';
                    
                break;
                
                case 'pt-style-5':
                    
                    return '
                    '.$div.' span {
                        background:' . $color . ';            
                        -webkit-box-shadow:0 0 0 3px' . $color . '; 
                        -moz-box-shadow:0 0 0 3px' . $color . '; 
                        box-shadow:0 0 0 3px' . $color . '; 
                    }';
                    
                break;
                
                
                case 'pt-style-6':
                    
                    return '
                    '.$div.':after {
                        border-bottom: 1px dotted ' . $color . ';
                    }';
                
                break;
                
                
            }
            
        }
        
        public function custom_css() {
            
            global $post;
            
            if( is_front_page() && ot_get_option( 'ut_site_layout', 'onepage' ) == 'onepage' || is_home() && ot_get_option( 'ut_site_layout', 'onepage' ) == 'onepage' || is_search() ) {
                return;
            }
            
            /* assign post ID */
            $post_ID = isset( $post->ID ) ? $post->ID : '';
            $post_ID = is_front_page() || is_home() ? get_queried_object_id() : $post_ID;
            
            /* no ID - leave here */
            if( empty( $post_ID ) ) {
                return;
            }
                        
            /**
             * Page Background
             */
             
            $ut_page_background_color = get_post_meta( $post_ID , 'ut_section_background_color' , true);
            
            /* add to CSS */
            if( !empty( $ut_page_background_color ) ) {
                $this->css .= '.main-content-background { background-color: ' . $ut_page_background_color . '; }';                
            } 
            
            
            /**
             * Page Title Settings
             */
            
            $ut_page_slogan_padding = get_post_meta( $post_ID , 'ut_section_slogan_padding' , true);                
            /* add to CSS */
            if( !empty( $ut_page_slogan_padding ) ) { 
                $this->css .= '#primary .page-primary-header { padding-bottom: ' . $ut_page_slogan_padding . '; }';                               
            }
            
            /* headlines */
            $ut_section_header_font_style = get_post_meta( $post_ID , 'ut_section_header_font_style' , true );
            $this->css .= $this->global_headline_font_style(
                                '#primary h1.page-title', 
                                $ut_section_header_font_style,
                                'ut_global_page_headline_font_type',
                                'ut_global_page_google_headline_font_style',
                                'ut_global_page_headline_font_style',
                                'ut_global_page_headline_font_style_settings',
                                'ut_global_page_headline_websafe_font_style_settings',
                                'ut_global_page_headline_font_color' );
            
            /* set title style */
            $ut_page_header_style = get_post_meta( $post_ID , 'ut_section_header_style', true );
            $ut_page_header_style = ( !empty( $ut_page_header_style ) && $ut_page_header_style != 'global' ) ? $ut_page_header_style : ot_get_option( 'ut_global_page_headline_style' );
            
            $ut_page_title_color = get_post_meta( $post_ID , 'ut_section_title_color' , true);
            $ut_page_title_color = empty( $ut_page_title_color ) ? ot_get_option( 'ut_global_page_headline_font_color' ) : $ut_page_title_color;
            
            if( !empty( $ut_page_title_color ) ) {
                
                $this->css .= '#primary h1.page-title { color: ' . $ut_page_title_color . '; }';
                
                // page title styles
                $this->css .= '.page-header.pt-style-4 .page-title span, .page-header.pt-style-4 .parallax-title span, .pt-style-4 .section-title span { border-color: ' . $ut_page_title_color . '; }';            
                $this->css .= '.page-header.pt-style-5 .page-title span, .page-header.pt-style-5 .section-title span { background:' . $ut_page_title_color . ';	-webkit-box-shadow:0 0 0 3px ' . $ut_page_title_color . '; -moz-box-shadow:0 0 0 3px ' . $ut_page_title_color . '; box-shadow:0 0 0 3px ' . $ut_page_title_color . '; }';
                $this->css .= '.page-header.pt-style-5 .parallax-title span { color:' . $ut_page_title_color . '; border-color:' . $ut_page_title_color . '; }';
                $this->css .= '.page-header.pt-style-6 .page-title:after, .page-header.pt-style-6 .parallax-title:after, .page-header.pt-style-6 .section-title:after { border-color:' . $ut_page_title_color . '; }';  
                
            }
            
            /* pt style 2 */
            $ut_page_headline_style_2_color  = get_post_meta( $post_ID , 'ut_section_headline_style_2_color' , true);
            $ut_page_headline_style_2_color  = !empty( $ut_page_headline_style_2_color ) ? $ut_page_headline_style_2_color : ot_get_option('ut_global_page_headline_style_2_color', $ut_page_title_color );
            
            $ut_page_headline_style_2_height = get_post_meta( $post_ID , 'ut_section_headline_style_2_height' , true);
            $ut_page_headline_style_2_height  = !empty( $ut_page_headline_style_2_height ) ? $ut_page_headline_style_2_height : ot_get_option('ut_global_page_headline_style_2_height', '1px');
            
            $ut_page_headline_style_2_width  = get_post_meta( $post_ID , 'ut_section_headline_style_2_width' , true);
            $ut_page_headline_style_2_width  = !empty( $ut_page_headline_style_2_width ) ? $ut_page_headline_style_2_width : ot_get_option('ut_global_page_headline_style_2_width', '30px');
            
            $this->css .= $this->headline_style( '#primary .pt-style-2 h1.page-title' , 'pt-style-2', $ut_page_headline_style_2_color, $ut_page_headline_style_2_height, $ut_page_headline_style_2_width );
            
            /* pt style 3 */
            $ut_page_title_color = !empty( $ut_page_title_color ) ? $ut_page_title_color : $this->accent;
            $this->css .= $this->headline_style( '#primary header.page-header.pt-style-3', 'pt-style-3', $ut_page_title_color );
            
            /* pt style 4 */
            $ut_page_headline_style_4_width  = get_post_meta( $post_ID , 'ut_section_headline_style_4_width' , true);
            $ut_page_headline_style_4_width  = !empty( $ut_page_headline_style_4_width ) ? $ut_page_headline_style_4_width : ot_get_option('ut_global_page_headline_style_4_width', '6');
            
            $this->css .= $this->headline_style( '#primary header.page-header.pt-style-4', 'pt-style-4', '', '', $ut_page_headline_style_4_width );
                        
            $ut_page_header_margin_left = get_post_meta( $post_ID , 'ut_section_header_margin_left' , true);
            /* add to CSS */
            if( !empty($ut_page_header_margin_left) ) {
                $this->css .= '#primary .page-header:not(.wpb_wrapper .page-header) { margin-left:'.$ut_page_header_margin_left.'; }';
            }
            
            $ut_page_header_margin_right = get_post_meta( $post_ID , 'ut_section_header_margin_right' , true); 
            /* add to CSS */ 
            if( !empty($ut_page_header_margin_right) ) {
                $this->css .= '#primary .page-header:not(.wpb_wrapper .page-header) { margin-right:'.$ut_page_header_margin_right.'; }';
            }
            
            
            /**
             * Page Title Glow
             */
             
            if( get_post_meta( $post_ID , 'ut_section_title_glow' , true) == 'on' ) {
                            
                $ut_page_title_color      = get_post_meta( $post_ID , 'ut_section_title_color' , true);
                $ut_page_title_glow_color = get_post_meta( $post_ID , 'ut_section_title_glow_color' , true);
                
                if( !empty( $ut_page_title_color ) ) {                                
                
                    $this->css .= '#primary .page-title.ut-glow { 
                        text-shadow: 0 0 40px ' . $ut_page_title_color . ', 2px 2px 3px black ; 
                    }'. "\n";
                
                }
                
                if( !empty( $ut_page_title_glow_color ) ) {                                
                
                    $this->css .= '#primary .page-title.ut-glow { 
                        text-shadow: 0 0 40px ' . $ut_page_title_glow_color . ', 2px 2px 3px black ; 
                    }'. "\n";
                
                }
                                            
            }
                        
            
            /**
             * Page Lead Settings
             */
            
            $ut_page_slogan_color = get_post_meta( $post_ID , 'ut_section_slogan_color' , true);
            
            /* add to CSS */
            if( !empty( $ut_page_slogan_color ) ) {
                $this->css .= '#primary .lead p { color: ' . $ut_page_slogan_color . '; }'; 
            }
            
            $ut_section_slogan_padding_left  = get_post_meta( $post_ID , 'ut_section_slogan_padding_left' , true);
            
            /* add to CSS */
            if( !empty($ut_section_slogan_padding_left) ) {
                $this->css .= '#primary .lead p { padding-left: ' . $ut_section_slogan_padding_left . '; }'; 
            }
            
            $ut_section_slogan_padding_right = get_post_meta( $post_ID , 'ut_section_slogan_padding_right' , true);
            
            /* add to CSS */
            if( !empty($ut_section_slogan_padding_right) ) {
                $this->css .= '#primary .lead p { padding-right: ' . $ut_section_slogan_padding_right . '; }'; 
            }  
           
            /**
             * Content Section Title Header Settings
             */
            $this->css .= $this->global_headline_font_style('#primary .parallax-title' , 'global' );
            $this->css .= $this->global_headline_font_style('#primary .section-title' , 'global' );
             
            /* pt style 2 */
            $this->css .= $this->headline_style( '#primary .pt-style-2:not(.page-header):not(.csection-title) .parallax-title', 'pt-style-2' , ot_get_option('ut_global_headline_style_2_color', ot_get_option('ut_global_headline_font_color')), ot_get_option('ut_global_headline_style_2_height', '1px'), ot_get_option('ut_global_headline_style_2_width', '30px') );
            $this->css .= $this->headline_style( '#primary .pt-style-2:not(.page-header):not(.csection-title) .section-title' , 'pt-style-2' , ot_get_option('ut_global_headline_style_2_color', ot_get_option('ut_global_headline_font_color')), ot_get_option('ut_global_headline_style_2_height', '1px'), ot_get_option('ut_global_headline_style_2_width', '30px') );           
             
            /* pt style 3 */
            $this->css .= $this->headline_style( '#primary .pt-style-3:not(.page-header) .section-title' , 'pt-style-3' , $this->accent );
            
            /* pt style 4 */
            $this->css .= $this->headline_style( '.pt-style-4:not(.page-header):not(.csection-title) .page-title, .pt-style-4:not(.page-header):not(.csection-title) .parallax-title, .pt-style-4:not(.page-header):not(.csection-title) .section-title' , 'pt-style-4', '', '', ot_get_option("ut_global_headline_style_4_width","6") );
            
            // default colors
            if( ot_get_option('ut_global_headline_font_color') ) {            
                $this->css .= '.pt-style-4:not(.page-header):not(.csection-title) .page-title span, .pt-style-4:not(.page-header):not(.csection-title) .parallax-title span, .pt-style-4:not(.page-header):not(.csection-title) .section-title span { border-color: ' . ot_get_option('ut_global_headline_font_color') . '; }';            
                $this->css .= '.pt-style-5:not(.page-header):not(.csection-title) .page-title span, .pt-style-5:not(.page-header):not(.csection-title) .section-title span { background:' . ot_get_option('ut_global_headline_font_color') . ';	-webkit-box-shadow: 0 0 0 3px ' . ot_get_option('ut_global_headline_font_color') . '; -moz-box-shadow:0 0 0 3px ' . ot_get_option('ut_global_headline_font_color') . '; box-shadow:0 0 0 3px ' . ot_get_option('ut_global_headline_font_color') . '; }';
                $this->css .= '.pt-style-5:not(.page-header):not(.csection-title) .parallax-title span { color:' . ot_get_option('ut_global_headline_font_color') . '; border-color:' . ot_get_option('ut_global_headline_font_color') . '; }';
                $this->css .= '.pt-style-6:not(.page-header):not(.csection-title) .page-title:after, .pt-style-6:not(.page-header):not(.csection-title) .parallax-title:after, .pt-style-6:not(.page-header):not(.csection-title) .section-title:after { border-color:' . ot_get_option('ut_global_headline_font_color') . '; }';    
            }
            
            /**
             * Page Spacing
             */             
            
            if( get_post_meta( $post_ID , 'ut_page_padding_top' , true ) ) {
                $this->css .= '#primary { padding-top:' . $this->add_px_value( get_post_meta( $post_ID , 'ut_page_padding_top' , true ) ) . ' !important; }';
            }
            
            if( get_post_meta( $post_ID , 'ut_page_padding_bottom' , true ) ) {
                $this->css .= '#primary { padding-bottom:' .  $this->add_px_value( get_post_meta( $post_ID , 'ut_page_padding_bottom' , true ) ) . ' !important; }';
            }
                       
           
            /**
             * Content Headlines
             */
            $ut_page_heading_color = get_post_meta( $post_ID , 'ut_section_heading_color' , true);
                
            /* add to CSS */
            if( !empty( $ut_page_heading_color ) ) {
                
                $this->css .= '#primary .entry-content h1 { color: ' . $ut_page_heading_color . ' !important; }'. "\n";
                $this->css .= '#primary .entry-content h2 { color: ' . $ut_page_heading_color . ' !important; }'. "\n"; 
                $this->css .= '#primary .entry-content h3 { color: ' . $ut_page_heading_color . ' !important; }'. "\n"; 
                $this->css .= '#primary .entry-content h4 { color: ' . $ut_page_heading_color . ' !important; }'. "\n"; 
                $this->css .= '#primary .entry-content h5 { color: ' . $ut_page_heading_color . ' !important; }'. "\n"; 
                $this->css .= '#primary .entry-content h6 { color: ' . $ut_page_heading_color . ' !important; }'. "\n";
                  
            }
            
            /**
             * Content Text Color
             */
            $ut_page_text_color = get_post_meta( $post_ID , 'ut_section_text_color' , true);
            
            /* add to CSS */
            if( !empty($ut_page_text_color) ) {
                $this->css.= '#primary .entry-content { color: ' . $ut_page_text_color . '; }'. "\n"; 
            }
            
            /* output css */
            echo $this->minify_css( '<style id="ut-page-custom-css"  type="text/css">' . $this->css . '</style>' );
            
            
            
            
            
            
            
            
        
        }  
            
    }

}

new UT_Page_CSS;