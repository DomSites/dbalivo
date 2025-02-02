<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Single_Quote' ) ) {
	
    class UT_Single_Quote {
        
        private $shortcode;
            
        function __construct() {
			
            /* shortcode base */
            $this->shortcode = 'ut_single_quote';
            
            add_action( 'init', array( $this, 'ut_map_shortcode' ) );
            add_shortcode( $this->shortcode, array( $this, 'ut_create_shortcode' ) );	
            
		}
        
        function ut_map_shortcode( $atts, $content = NULL ) {
            
            if( function_exists( 'vc_map' ) ) {
                                
                vc_map(
                    array(
                        'name'            => esc_html__( 'Single Testimonial', 'ut_shortcodes' ),
                        'base'            => $this->shortcode,
                        'category'        => 'Community',
                        'icon'            => UT_SHORTCODES_URL . '/admin/img/vc_icons/single-quote.png',
                        'class'           => 'ut-vc-icon-module ut-community-module', 
                        'content_element' => true,
                        'params'          => array(
                    
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Style', 'ut_shortcodes' ),
                                'param_name'        => 'style',
                                'group'             => 'General',
                                'value'             => array(
                                    esc_html__( 'Avatar left', 'ut_shortcodes' )   => 'style-1',
                                    esc_html__( 'Avatar below', 'ut_shortcodes' )  => 'style-2',
                                ) 
                            ),
                            array(
                                'type'              => 'attach_image',
                                'heading'           => esc_html__( 'Avatar', 'ut_shortcodes' ),
                                'param_name'        => 'avatar',
                                'group'             => 'General'
                            ),
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Title', 'ut_shortcodes' ),
                                'param_name'        => 'title',
                                'admin_label'       => true,    
                                'group'             => 'General'
                            ),
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Date', 'ut_shortcodes' ),
                                'param_name'        => 'date',
                                'group'             => 'General'
                            ),
                            array(
                                'type'              => 'textarea',
                                'heading'           => esc_html__( 'Quote Text', 'ut_shortcodes' ),
                                'admin_label'       => true,
                                'param_name'        => 'content',
                                'group'             => 'General'
                            ),
                             array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Activate Star Rating?', 'unitedthemes' ),
                                'param_name'        => 'activate_rating',
                                'group'             => 'General',
                                'value'             => array(
                                    esc_html__( 'yes', 'ut_shortcodes' ) => 'yes',
                                    esc_html__( 'no', 'ut_shortcodes' ) => 'no',
                                )                                
                            ),
                            array(
								'type'              => 'range_slider',
								'heading'           => esc_html__( 'Rating', 'ut_shortcodes' ),
								'param_name'        => 'rating',
                                'value'             => array(
                                    'min'   => '1',
                                    'max'   => '5',
                                    'step'  => '1',
                                    'unit'  => ''
                                ),
								'group'             => 'General',
                                'dependency'        => array(
                                    'element' => 'activate_rating',
                                    'value'   => 'yes',
                                ),                                
						  	),
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Author Name', 'ut_shortcodes' ),
                                'param_name'        => 'author',
                                'admin_label'       => true,
                                'group'             => 'General'
                            ),
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Company / Occupation', 'ut_shortcodes' ),
                                'param_name'        => 'company',
                                'group'             => 'General'
                            ),
                            array(
								'type'              => 'textfield',
								'heading'           => esc_html__( 'Class', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'ut_shortcodes' ),
								'param_name'        => 'class',
								'group'             => 'General'
						  	),
                            
                            /* colors */
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Author Color', 'ut_shortcodes' ),
								'param_name'        => 'author_color',
								'group'             => 'Colors'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Company Color', 'ut_shortcodes' ),
								'param_name'        => 'company_color',
								'group'             => 'Colors'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Title Color', 'ut_shortcodes' ),
								'param_name'        => 'title_color',
								'group'             => 'Colors'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Date Color', 'ut_shortcodes' ),
								'param_name'        => 'date_color',
								'group'             => 'Colors'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Rating Color', 'ut_shortcodes' ),
								'param_name'        => 'rating_color',
								'group'             => 'Colors'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Decoration Line Color', 'ut_shortcodes' ),
								'param_name'        => 'deco_line_color',
								'group'             => 'Colors'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Quote Color', 'ut_shortcodes' ),
								'param_name'        => 'quote_color',
								'group'             => 'Colors'
						  	),
                            
                            /* animation */
                            array(
                                'type'              => 'dropdown',
								'heading'           => esc_html__( 'Animate Avatar', 'ut_shortcodes' ),
								'param_name'        => 'effect',
								'group'             => 'Animation',
                                'value'             =>  ut_recognized_animation_effects_vc()                            
                            ),
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Animate Once?', 'ut_shortcodes' ),
								'param_name'        => 'animate_once',
								'group'             => 'Animation',
                                'value'             => array(
                                    esc_html__( 'no' , 'ut_shortcodes' ) => 'no',
                                    esc_html__( 'yes', 'ut_shortcodes' ) => 'yes'                                    
                                ),
						  	), 
                            
                            /* css editor */
                            array(
                                'type'              => 'css_editor',
                                'param_name'        => 'css',
                                'group'             => esc_html__( 'Design Options', 'ut_shortcodes' ),
                            ),
                            
                        )                        
                        
                    )
                
                ); /* end mapping */
                
            } 
        
        }
        
        function ut_create_shortcode( $atts, $content = NULL ) {
            
            extract( shortcode_atts( array (
                 'style'           => 'style-1',
                 'author'          => '',
                 'author_color'    => '',
                 'company'         => '',
                 'company_color'   => '',
                 'avatar'          => '',
                 'title'           => '',
                 'title_color'     => '',
                 'date'            => '',
                 'date_color'      => '',
                 'activate_rating' => 'yes',
                 'rating'          => '',
                 'rating_color'    => get_option('ut_accentcolor' , '#F1C40F'),
                 'quote_color'     => '',
                 'deco_line_color' => '',
                 'width'           => '',        /* deprecated */  
                 'last'            => 'false',   /* deprecated */
                 'margin_bottom'   => '',        /* deprecated */
                 'effect'          => '',        
                 'animate_once'    => 'no',      
                 'class'           => '',
                 'css'             => ''

            ), $atts ) ); 
            
            $classes    = array();
            $classes_2  = array();
            $attributes = array();
                        
            /* ratings */
            $ratings = array(
                
                /* deprecated */
                'one'   => '<li class="ut-rated"><i class="fa fa-star"></i></li><li><i class="fa fa-star"></i></li><li><i class="fa fa-star"></i></li><li><i class="fa fa-star"></i></li><li><i class="fa fa-star"></i></li>',
                'two'   => '<li class="ut-rated"><i class="fa fa-star"></i></li><li class="ut-rated"><i class="fa fa-star"></i></li><li><i class="fa fa-star"></i></li><li><i class="fa fa-star"></i></li><li><i class="fa fa-star"></i></li>',
                'three' => '<li class="ut-rated"><i class="fa fa-star"></i></li><li class="ut-rated"><i class="fa fa-star"></i></li><li class="ut-rated"><i class="fa fa-star"></i></li><li><i class="fa fa-star"></i></li><li><i class="fa fa-star"></i></li>',
                'four'  => '<li class="ut-rated"><i class="fa fa-star"></i></li><li class="ut-rated"><i class="fa fa-star"></i></li><li class="ut-rated"><i class="fa fa-star"></i></li><li class="ut-rated"><i class="fa fa-star"></i></li><li><i class="fa fa-star"></i></li>',
                'five'  => '<li class="ut-rated"><i class="fa fa-star"></i></li><li class="ut-rated"><i class="fa fa-star"></i></li><li class="ut-rated"><i class="fa fa-star"></i></li><li class="ut-rated"><i class="fa fa-star"></i></li><li class="ut-rated"><i class="fa fa-star"></i></li>',
                /* end deprecated */
                
                '1'  => '<li class="ut-rated"><i class="fa fa-star"></i></li><li><i class="fa fa-star"></i></li><li><i class="fa fa-star"></i></li><li><i class="fa fa-star"></i></li><li><i class="fa fa-star"></i></li>',
                '2'  => '<li class="ut-rated"><i class="fa fa-star"></i></li><li class="ut-rated"><i class="fa fa-star"></i></li><li><i class="fa fa-star"></i></li><li><i class="fa fa-star"></i></li><li><i class="fa fa-star"></i></li>',
                '3'  => '<li class="ut-rated"><i class="fa fa-star"></i></li><li class="ut-rated"><i class="fa fa-star"></i></li><li class="ut-rated"><i class="fa fa-star"></i></li><li><i class="fa fa-star"></i></li><li><i class="fa fa-star"></i></li>',
                '4'  => '<li class="ut-rated"><i class="fa fa-star"></i></li><li class="ut-rated"><i class="fa fa-star"></i></li><li class="ut-rated"><i class="fa fa-star"></i></li><li class="ut-rated"><i class="fa fa-star"></i></li><li><i class="fa fa-star"></i></li>',
                '5'  => '<li class="ut-rated"><i class="fa fa-star"></i></li><li class="ut-rated"><i class="fa fa-star"></i></li><li class="ut-rated"><i class="fa fa-star"></i></li><li class="ut-rated"><i class="fa fa-star"></i></li><li class="ut-rated"><i class="fa fa-star"></i></li>'
                
            );
            
            
            /* deprecated - will be removed one day - start block */
            
                $grid = array( 
                    'third'   => 'ut-one-third',
                    'fourth'  => 'ut-one-fourth',
                    'half'    => 'ut-one-half'
                );  
                
                $classes[] = ( $last == 'true' ) ? 'ut-column-last' : '';
                $classes[] = !empty( $grid[$width] ) ? $grid[$width] : 'clearfix';
                                                
                
            /* deprecated - will be removed one day - end block */
            
            
            /* animation effect */
            $dataeffect = NULL;
            
            if( !empty( $effect ) ) {
                
                $attributes['data-effect']      = esc_attr( $effect );
                $attributes['data-animateonce'] = esc_attr( $animate_once );
                
                $classes_2[]  = 'ut-animate-element';
                $classes_2[]  = 'ut-animate-element animated';
                
            }
            
            /* extra element class */
            $classes[] = $class; 
            
            
            /* custom CSS */
            $id = uniqid('ut_sq_');
            
            $css_style = '<style type="text/css" scoped>';
                
                if( $author_color ) {
                    $css_style .= '#' . $id . ' .ut-st div.ut-st-name { color: ' . $author_color . '; }';
                }
                if( $company_color ) {
                    $css_style .= '#' . $id . ' .ut-st p.ut-st-subtitle { color: ' . $company_color . '; }';
                }
                if( $title_color ) {
                    $css_style .= '#' . $id . ' .ut-st-title  { color: ' . $title_color . '; }';
                }
                if( $date_color ) {
                    $css_style .= '#' . $id . ' .ut-st-date { color: ' . $date_color . '; }';
                }
                if( $rating_color ) {
                    $css_style .= '#' . $id . ' .ut-rated i { color: ' . $rating_color . '; }';
                }
                if( $deco_line_color ) {
                    $css_style .= '#' . $id . ' .ut-st-header  { border-color: ' . $deco_line_color . '; }';
                }
                if( $quote_color ) {
                    $css_style .= '#' . $id . ' .ut-st p { color: ' . $quote_color . '; }';
                }
                
                /* deprecated - will be removed one day - start block */
                if( !empty( $margin_bottom ) ) {
                    
                    $margin_bottom = str_replace( 'px', '', $margin_bottom );
                    $css_style .= '#' . $id . ' { margin-bottom: ' . $margin_bottom . '; }'; 
                    
                }                
                /* deprecated - will be removed one day - end block */
                
            $css_style.= '</style>';
            
            
            /* attributes string */
            $attributes = implode(' ', array_map(
                function ($v, $k) { return sprintf("%s=\"%s\"", $k, $v); },
                $attributes,
                array_keys( $attributes )
            ) );
                        
            /* start output */
            $output = '';
            
            /* add css */ 
            $output .= ut_minify_inline_css( $css_style );
            
            $output .= '<div id="' . esc_attr( $id ) . '" class="' . implode(' ', $classes ) . ' bklyn-single-testimonial bklyn-single-testimonial-' . $style . '">'; 
                
                // style 1
                if( $style == 'style-1' ) {
            
                    if( strpos( $avatar, '.png' ) !== false || strpos( $avatar, '.jpg' ) !== false || strpos( $avatar, '.gif' ) !== false || strpos( $avatar, '.ico' ) !== false ) {

                        $avatar = ut_resize( $avatar , '160' , '160', true , true , true );

                    } elseif( is_numeric( $avatar ) ) {

                        $avatar = ut_resize( wp_get_attachment_url( $avatar ) , '160' , '160', true , true , true );

                    } else {

                        $avatar = false;                    

                    } 

                    if( $avatar ) {                    

                        $output .= '<figure ' . $attributes . ' class="ut-st-avatar ' . implode(' ', $classes_2 ) . '"><img alt="' . $author . '" src="' . $avatar . '" /></figure>';                    

                    }   

                    $output .= '<div class="ut-st">';

                        if( !empty( $title ) || !empty( $date ) ) {

                        $output .= '<header class="ut-st-header">';

                        if( !empty( $title ) ) {
                            $output .= '<h3 class="ut-st-title">' . $title . '</h3>';
                        }

                        if( !empty( $date ) ) {
                            $output .= '<span class="ut-st-date">' . $date . '</span>';
                        }

                        $output .= '</header>';

                    }

                    $output .= '<p>' . do_shortcode($content) . '</p>';

                    if( $activate_rating == 'yes' && !empty( $rating ) && isset( $ratings[$rating] ) ) {
                        $output .= '<div class="ut-st-rating"><ul>' . $ratings[$rating] . '</ul></div>';
                    }

                    if( !empty( $author ) ) {
                        $output .= '<div class="ut-st-name">' . $author . '</div>';
                    }

                    if( !empty( $company ) ) {
                        $output .= '<p class="ut-st-subtitle">' . $company . '</p>';
                    }

                    $output .= '</div>';
                }
            
                if( $style == 'style-2' ) {
                    
                    if( strpos( $avatar, '.png' ) !== false || strpos( $avatar, '.jpg' ) !== false || strpos( $avatar, '.gif' ) !== false || strpos( $avatar, '.ico' ) !== false ) {

                        $avatar = ut_resize( $avatar , '160' , '160', true , true , true );

                    } elseif( is_numeric( $avatar ) ) {

                        $avatar = ut_resize( wp_get_attachment_url( $avatar ) , '160' , '160', true , true , true );

                    } else {

                        $avatar = false;                    

                    } 

                    $output .= '<div class="ut-st">';

                        if( !empty( $title ) || !empty( $date ) ) {

                            $output .= '<header class="ut-st-header">';

                            if( !empty( $title ) ) {
                                $output .= '<h3 class="ut-st-title">' . $title . '</h3>';
                            }

                            if( !empty( $date ) ) {
                                $output .= '<span class="ut-st-date">' . $date . '</span>';
                            }

                            $output .= '</header>';

                        }
                    
                        if( !empty( $content ) ) {

                            $output .= '<p>' . do_shortcode($content) . '</p>';

                        }
                    
                    
                        $output .= '<div class="ut-st-meta-wrap clearfix">';

                            if( $avatar ) {                    
                                $output .= '<figure ' . $attributes . ' class="ut-st-avatar ' . implode(' ', $classes_2 ) . '"><img alt="' . $author . '" src="' . $avatar . '" /></figure>';
                            } 
                    
                            if( !empty( $author ) || !empty( $company ) || $activate_rating == 'yes' && !empty( $rating ) && isset( $ratings[$rating] ) ) {
                    
                                $output .= '<div class="ut-st-data-wrap">';

                                    if( !empty( $author ) ) {

                                        $output .= '<div class="ut-st-name">' . $author . '</div>';

                                    }

                                    if( !empty( $company ) ) {

                                        $output .= '<p class="ut-st-subtitle">' . $company . '</p>';

                                    }

                                    if( $activate_rating == 'yes' && !empty( $rating ) && isset( $ratings[$rating] ) ) {

                                        $output .= '<div class="ut-st-rating"><ul>' . $ratings[$rating] . '</ul></div>';

                                    }

                                $output .= '</div>';
                            
                            }
                                
                        $output .= '</div>';
                        
                    
                    $output .= '</div>';
                
                }
            
            
            $output .= '</div>';
            
        
            if( defined( 'WPB_VC_VERSION' ) ) { 
                
                return '<div class="wpb_content_element ' . apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->shortcode, $atts ) . '">' . $output . '</div>'; 
            
            }
                
            return $output;
        
        }
            
    }

}

new UT_Single_Quote;


if ( class_exists( 'WPBakeryShortCode' ) ) {
    
    class WPBakeryShortCode_ut_single_quote extends WPBakeryShortCode {
        
        function __construct( $settings ) {
            
            parent::__construct( $settings );
            $this->jsScripts();
            
        }
    
        public function jsScripts() {
            
            wp_register_script( 'zoom', vc_asset_url( 'lib/bower/zoom/jquery.zoom.min.js' ), array(), WPB_VC_VERSION );
            wp_register_script( 'vc_image_zoom', vc_asset_url( 'lib/vc_image_zoom/vc_image_zoom.min.js' ), array(
                'jquery',
                'zoom',
            ), WPB_VC_VERSION, true );
            
        }
    
        public function singleParamHtmlHolder( $param, $value ) {
            
            $output = '';
    
            $param_name = isset( $param['param_name'] ) ? $param['param_name'] : '';
            $type = isset( $param['type'] ) ? $param['type'] : '';
            $class = isset( $param['class'] ) ? $param['class'] : '';
    
            if ( 'attach_image' === $param['type'] && 'avatar' === $param_name ) {
                $output .= '<input type="hidden" class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '" value="' . $value . '" />';
                $element_icon = $this->settings( 'icon' );
                $img = wpb_getImageBySize( array(
                    'attach_id' => (int) preg_replace( '/[^\d]/', '', $value ),
                    'thumb_size' => 'thumbnail',
                ) );
                $this->setSettings( 'logo', ( $img ? $img['thumbnail'] : '<img width="150" height="150" src="' . vc_asset_url( 'vc/blank.gif' ) . '" class="attachment-thumbnail vc_general vc_element-icon"  data-name="' . $param_name . '" alt="" title="" style="display: none;" />' ) . '<span class="no_image_image vc_element-icon' . ( ! empty( $element_icon ) ? ' ' . $element_icon : '' ) . ( $img && ! empty( $img['p_img_large'][0] ) ? ' image-exists' : '' ) . '" /><a href="#" class="column_edit_trigger' . ( $img && ! empty( $img['p_img_large'][0] ) ? ' image-exists' : '' ) . '">' . __( 'Add image', 'js_composer' ) . '</a>' );
                $output .= $this->outputTitleTrue( $this->settings['name'] );
            } elseif ( ! empty( $param['holder'] ) ) {
                if ( 'input' === $param['holder'] ) {
                    $output .= '<' . $param['holder'] . ' readonly="true" class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '" value="' . $value . '">';
                } elseif ( in_array( $param['holder'], array( 'img', 'iframe' ) ) ) {
                    $output .= '<' . $param['holder'] . ' class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '" src="' . $value . '">';
                } elseif ( 'hidden' !== $param['holder'] ) {
                    $output .= '<' . $param['holder'] . ' class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '">' . $value . '</' . $param['holder'] . '>';
                }
            }
    
            if ( ! empty( $param['admin_label'] ) && true === $param['admin_label'] ) {
                $output .= '<span class="vc_admin_label admin_label_' . $param['param_name'] . ( empty( $value ) ? ' hidden-label' : '' ) . '"><label>' . $param['heading'] . '</label>: ' . $value . '</span>';
            }
    
            return $output;
        }
    
        public function getImageSquareSize( $img_id, $img_size ) {
            if ( preg_match_all( '/(\d+)x(\d+)/', $img_size, $sizes ) ) {
                $exact_size = array(
                    'width' => isset( $sizes[1][0] ) ? $sizes[1][0] : '0',
                    'height' => isset( $sizes[2][0] ) ? $sizes[2][0] : '0',
                );
            } else {
                $image_downsize = image_downsize( $img_id, $img_size );
                $exact_size = array(
                    'width' => $image_downsize[1],
                    'height' => $image_downsize[2],
                );
            }
            $exact_size_int_w = (int) $exact_size['width'];
            $exact_size_int_h = (int) $exact_size['height'];
            if ( isset( $exact_size['width'] ) && $exact_size_int_w !== $exact_size_int_h ) {
                $img_size = $exact_size_int_w > $exact_size_int_h
                    ? $exact_size['height'] . 'x' . $exact_size['height']
                    : $exact_size['width'] . 'x' . $exact_size['width'];
            }
    
            return $img_size;
        }
    
        protected function outputTitle( $title ) {
            return '';
        }
    
        protected function outputTitleTrue( $title ) {
            return '<h4 class="wpb_element_title">' . $title . ' ' . $this->settings( 'logo' ) . '</h4>';
        }                
        
    }
    
}