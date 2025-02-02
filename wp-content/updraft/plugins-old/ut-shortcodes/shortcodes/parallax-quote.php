<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Parallax_Quote' ) ) {
	
    class UT_Parallax_Quote {
        
        private $shortcode;
            
        function __construct() {
			
            /* shortcode base */
            $this->shortcode = 'ut_parallax_quote';
            
            add_action( 'init', array( $this, 'ut_map_shortcode' ) );
            
		}
        
        function ut_map_shortcode( $atts, $content = NULL ) {
            
            if( function_exists( 'vc_map' ) ) {
                                
                vc_map(
                    array(
                        'name'            => esc_html__( 'Parallax Quote', 'ut_shortcodes' ),
                        'base'            => $this->shortcode,
                        'category'        => 'Community',
                        'icon'            => UT_SHORTCODES_URL . '/admin/img/vc_icons/single-quote.png',
                        'class'           => 'ut-vc-icon-module ut-community-module', 
                        'content_element' => true,
                        'params'          => array(
                            
                            /* General Settings */
                            array(
								'type'              => 'iconpicker',
                                'heading'           => esc_html__( 'Choose Icon ( optional )', 'ut_shortcodes' ),
                                'param_name'        => 'icon',
                                'group'             => 'General',                                
                            ),
                            
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Cite', 'ut_shortcodes' ),
                                'param_name'        => 'cite',
                                'group'             => 'General'
                            ),
                            
                            array(
                                'type'              => 'textarea',
                                'heading'           => esc_html__( 'Quote', 'ut_shortcodes' ),
                                'param_name'        => 'content',
                                'admin_label'       => true,
                                'group'             => 'General'
                            ),
                            
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Show Quotation Marks?', 'ut_shortcodes' ),
								'param_name'        => 'quotation_marks',
								'group'             => 'General',
                                'value'             => array(
                                    esc_html__( 'yes' , 'ut_shortcodes' ) => 'yes',
                                    esc_html__( 'no' , 'ut_shortcodes' )  => 'no'                                    
                                )
						  	),
                           
                            /* Color Settings */
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Icon Color', 'ut_shortcodes' ),
								'param_name'        => 'icon_color',
								'group'             => 'Quote Styling'
						  	),
                            
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Icon Background Color', 'ut_shortcodes' ),
								'param_name'        => 'icon_background_color',
								'group'             => 'Quote Styling'
						  	),
                            
                            array(
								'type'              => 'range_slider',
								'heading'           => esc_html__( 'Icon Border Radius', 'ut_shortcodes' ),
								'param_name'        => 'icon_border_radius',
                                'value'             => array(
                                    'min'   => '0',
                                    'max'   => '50',
                                    'step'  => '1',
                                    'unit'  => '%'
                                ),
								'group'             => 'Quote Styling'
						  	),
                            
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Quote Color', 'ut_shortcodes' ),
								'param_name'        => 'quote_color',
								'group'             => 'Quote Styling'
						  	),
                            
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Quotation Marks Color', 'ut_shortcodes' ),
								'param_name'        => 'quotation_marks_color',
								'group'             => 'Quote Styling',
                                'dependency'        => array(
                                    'element'           => 'quotation_marks',
                                    'value'             => 'yes',
                                ),
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Quote Highlight Color', 'ut_shortcodes' ),
                                'description'       => sprintf( esc_html__( '(optional) - use: %s inside your quote to apply this color.', 'ut_shortcodes' ), '<xmp class="ut-code-usage"><ins>Word</ins></xmp>' ),
								'param_name'        => 'quote_ins_color',
								'group'             => 'Quote Styling'
						  	), 
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Cite Color', 'ut_shortcodes' ),
								'param_name'        => 'cite_color',
								'group'             => 'Quote Styling'
						  	), 
                            
                            
                            /* Quote Font Settings */
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Choose Font Source', 'ut_shortcodes' ),
                                'param_name'        => 'quote_font_source',
                                'value'             => array(
                                    esc_html__( 'Theme Default', 'ut_shortcodes' )  => '',
                                    esc_html__( 'Web Safe Fonts', 'ut_shortcodes' ) => 'websafe',
                                    esc_html__( 'Google Font', 'ut_shortcodes' )    => 'google'                                            
                                ),
                                'group'             => 'Quote Font'                                
                            ),
                            
                            array(
                                'type'              => 'google_fonts',
                                'param_name'        => 'quote_google_fonts',
                                'value'             => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
                                'group'             => 'Quote Font',
                                'settings'          => array(
                                    'fields' => array(
                                        'font_family_description' => __( 'Select font family.', 'ut_shortcodes' ),
                                        'font_style_description'  => __( 'Select font styling.', 'ut_shortcodes' ),
                                    ),
                                ),
                                'dependency'        => array(
                                    'element'           => 'quote_font_source',
                                    'value'             => 'google',
                                ),
                            ),
                            
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Websafe Fonts', 'ut_shortcodes' ),
                                'param_name'        => 'quote_websafe_fonts',
                                'value'             => array(
                                    esc_html__( 'Arial', 'unite' )              => 'arial',
                                    esc_html__( 'Comic Sans', 'unite' )         => 'comic',
                                    esc_html__( 'Georgia', 'unite' )            => 'georgia',
                                    esc_html__( 'Helvetica', 'unite' )          => 'helvetica',
                                    esc_html__( 'Impact', 'unite' )             => 'impact',
                                    esc_html__( 'Lucida Sans', 'unite' )        => 'lucida_sans',
                                    esc_html__( 'Lucida Console', 'unite' )     => 'lucida_console',                                    
                                    esc_html__( 'Palatino', 'unite' )           => 'palatino',
                                    esc_html__( 'Tahoma', 'unite' )             => 'tahoma',
                                    esc_html__( 'Times New Roman', 'unite' )    => 'times',
                                    esc_html__( 'Trebuchet', 'unite' )          => 'trebuchet',
                                    esc_html__( 'Verdana', 'unite' )            => 'verdana'                            
                                ),
                                'group'             => 'Quote Font',
                                'dependency'        => array(
                                    'element'           => 'quote_font_source',
                                    'value'             => 'websafe',
                                ),
                                
                            ),
                                
                            array(
								'type'              => 'range_slider',
								'heading'           => esc_html__( 'Quote Font Size', 'ut_shortcodes' ),
								'param_name'        => 'quote_font_size',
                                'value'             => array(
                                    'min'   => '0',
                                    'max'   => '100',
                                    'step'  => '1',
                                    'unit'  => 'px'
                                ),
								'group'             => 'Quote Font'
						  	),
                            
                            array(
								'type'              => 'range_slider',
								'heading'           => esc_html__( 'Quote Line Height', 'ut_shortcodes' ),
								'param_name'        => 'quote_line_height',
                                'value'             => array(
                                    'min'   => '0',
                                    'max'   => '100',
                                    'step'  => '1',
                                    'unit'  => 'px'
                                ),
								'group'             => 'Quote Font'
						  	),
                            
                            array(
								'type'              => 'range_slider',
								'heading'           => esc_html__( 'Quote Letter Spacing', 'ut_shortcodes' ),
								'param_name'        => 'quote_letter_spacing',
                                'group'             => 'Quote Font',
                                'value'             => array(
                                    'def'   => '0',
                                    'min'   => '-10',
                                    'max'   => '10',
                                    'step'  => '1',
                                    'unit'  => 'px'
                                ),
								
						  	),
                            
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Quote Font Weight', 'ut_shortcodes' ),
								'param_name'        => 'quote_font_weight',
								'group'             => 'Quote Font',
                                'value'             => array(
                                    esc_html__( 'Select Font Weight' , 'ut_shortcodes' ) => '',
                                    esc_html__( 'normal' , 'ut_shortcodes' ) => 'normal',
                                    esc_html__( 'bold' , 'ut_shortcodes' ) => 'bold'
                                ),
                                'dependency'        => array(
                                    'element'           => 'quote_font_source',
                                    'value'             => 'websafe',
                                ),
						  	),                            
                            
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Quote Text Transform', 'ut_shortcodes' ),
								'param_name'        => 'quote_text_transform',
								'group'             => 'Quote Font',
                                'value'             => array(
                                    esc_html__( 'Select Text Transform' , 'ut_shortcodes' ) => '',
                                    esc_html__( 'capitalize' , 'ut_shortcodes' ) => 'capitalize',
                                    esc_html__( 'uppercase', 'ut_shortcodes' ) => 'uppercase',
                                    esc_html__( 'lowercase', 'ut_shortcodes' ) => 'lowercase'                                    
                                ),
						  	),
                            
                            
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Quote Highlight Font Weight', 'ut_shortcodes' ),
								'param_name'        => 'quote_ins_font_weight',
								'group'             => 'Quote Font',
                                'value'             => array(
                                    esc_html__( 'Select Font Weight' , 'ut_shortcodes' ) => '',
                                    esc_html__( 'normal' , 'ut_shortcodes' ) => 'normal',
                                    esc_html__( 'bold' , 'ut_shortcodes' ) => 'bold'
                                ),
                                
						  	), 
                            
                            
                            /* Cite Font Settings */
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Choose Font Source', 'ut_shortcodes' ),
                                'param_name'        => 'cite_font_source',
                                'value'             => array(
                                    esc_html__( 'Theme Default', 'ut_shortcodes' )  => '',
                                    esc_html__( 'Web Safe Fonts', 'ut_shortcodes' ) => 'websafe',
                                    esc_html__( 'Google Font', 'ut_shortcodes' )    => 'google'                                            
                                ),
                                'group'             => 'Cite Font'                                
                            ),
                            
                            array(
                                'type'              => 'google_fonts',
                                'param_name'        => 'cite_google_fonts',
                                'value'             => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
                                'group'             => 'Cite Font',
                                'settings'          => array(
                                    'fields'        => array(
                                        'font_family_description' => __( 'Select font family.', 'ut_shortcodes' ),
                                        'font_style_description'  => __( 'Select font styling.', 'ut_shortcodes' ),
                                    ),
                                ),
                                'dependency'        => array(
                                    'element'           => 'cite_font_source',
                                    'value'             => 'google',
                                ),
                            ),
                            
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Choose Font Source', 'ut_shortcodes' ),
                                'param_name'        => 'cite_websafe_fonts',
                                'value'             => array(
                                    esc_html__( 'Arial', 'unite' )              => 'arial',
                                    esc_html__( 'Comic Sans', 'unite' )         => 'comic',
                                    esc_html__( 'Georgia', 'unite' )            => 'georgia',
                                    esc_html__( 'Helvetica', 'unite' )          => 'helvetica',
                                    esc_html__( 'Impact', 'unite' )             => 'impact',
                                    esc_html__( 'Lucida Sans', 'unite' )        => 'lucida_sans',
                                    esc_html__( 'Lucida Console', 'unite' )     => 'lucida_console',                                    
                                    esc_html__( 'Palatino', 'unite' )           => 'palatino',
                                    esc_html__( 'Tahoma', 'unite' )             => 'tahoma',
                                    esc_html__( 'Times New Roman', 'unite' )    => 'times',
                                    esc_html__( 'Trebuchet', 'unite' )          => 'trebuchet',
                                    esc_html__( 'Verdana', 'unite' )            => 'verdana'                            
                                ),
                                'group'             => 'Cite Font',
                                'dependency'        => array(
                                    'element'           => 'cite_font_source',
                                    'value'             => 'websafe',
                                ),
                                
                            ),
                              
                            array(
								'type'              => 'range_slider',
								'heading'           => esc_html__( 'Cite Font Size', 'ut_shortcodes' ),
								'param_name'        => 'cite_font_size',
                                'group'             => 'Cite Font',
                                'value'             => array(
                                    'min'   => '0',
                                    'max'   => '100',
                                    'step'  => '1',
                                    'unit'  => 'px'
                                ),
								
						  	),
                            
                            array(
								'type'              => 'range_slider',
								'heading'           => esc_html__( 'Cite Line Height', 'ut_shortcodes' ),
								'param_name'        => 'cite_line_height',
                                'value'             => array(
                                    'min'   => '0',
                                    'max'   => '100',
                                    'step'  => '1',
                                    'unit'  => 'px'
                                ),
								'group'             => 'Cite Font'
						  	),
                            
                            array(
								'type'              => 'range_slider',
								'heading'           => esc_html__( 'Cite Letter Spacing', 'ut_shortcodes' ),
								'param_name'        => 'cite_letter_spacing',
                                'group'             => 'Cite Font',
                                'value'             => array(
                                    'def'   => '0',
                                    'min'   => '-10',
                                    'max'   => '10',
                                    'step'  => '1',
                                    'unit'  => 'px'
                                ),
								
						  	),
                            
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Cite Font Weight', 'ut_shortcodes' ),
								'param_name'        => 'cite_font_weight',
								'group'             => 'Cite Font',
                                'value'             => array(
                                    esc_html__( 'Select Font Weight' , 'ut_shortcodes' ) => '',
                                    esc_html__( 'normal' , 'ut_shortcodes' ) => 'normal',
                                    esc_html__( 'bold' , 'ut_shortcodes' ) => 'bold'
                                ),
                                
						  	), 
                                                       
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Cite Text Transform', 'ut_shortcodes' ),
								'param_name'        => 'cite_text_transform',
								'group'             => 'Cite Font',
                                'value'             => array(
                                    esc_html__( 'Select Text Transform' , 'ut_shortcodes' ) => '',
                                    esc_html__( 'capitalize' , 'ut_shortcodes' ) => 'capitalize',
                                    esc_html__( 'uppercase', 'ut_shortcodes' ) => 'uppercase',
                                    esc_html__( 'lowercase', 'ut_shortcodes' ) => 'lowercase'                                    
                                ),
						  	),
                            
                                                  
                            /* css */
                            array(
                                'type'              => 'css_editor',
                                'param_name'        => 'css',
                                'group'             => esc_html__( 'Design Options', 'ut_shortcodes' ),
                            ), 
                            array(
								'type'              => 'textfield',
								'heading'           => esc_html__( 'CSS Class', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'ut_shortcodes' ),
								'param_name'        => 'class',
								'group'             => 'General'
						  	)
                            
                        )                        
                        
                    )
                
                ); /* end mapping */
                
            } 
        
        }
            
    }

}

new UT_Parallax_Quote;


if ( class_exists( 'WPBakeryShortCode' ) ) {
    
    class WPBakeryShortCode_ut_parallax_quote extends WPBakeryShortCode {
        
        /**
         * Used to get field name in vc_map function for google_fonts, font_container and etc..
         *
         * @param $key
         *
         * @since 4.4
         * @return bool
         */
        protected function getField( $key ) {
            return isset( $this->fields[ $key ] ) ? $this->fields[ $key ] : false;
        }
        
        /**
         * Get param value by providing key
         *
         * @param $key
         *
         * @since 4.4
         * @return array|bool
         */
        protected function getParamData( $key ) {
            return WPBMap::getParam( $this->shortcode, $this->getField( $key ) );
        }
        
        
        /**
         * Parses google_fonts_data to get needed css styles to markup
         *
         * @param $el_class
         * @param $css
         * @param $google_fonts_data
         * @param $font_container_data
         * @param $atts
         *
         * @since 4.3
         * @return array
         */
        public function getStyles( $quote_google_fonts_data, $cite_google_fonts_data,  $atts ) {
            
            $quote_styles = array();
            $quote_font_source = empty( $atts['quote_font_source'] ) ? '' : $atts['quote_font_source'];
                        
            if ( 'google' === $quote_font_source && ! empty( $quote_google_fonts_data ) && isset( $quote_google_fonts_data['values'], $quote_google_fonts_data['values']['font_family'], $quote_google_fonts_data['values']['font_style'] ) ) {
                $google_fonts_family = explode( ':', $quote_google_fonts_data['values']['font_family'] );
                $quote_styles[] = 'font-family:' . $google_fonts_family[0];
                $google_fonts_styles = explode( ':', $quote_google_fonts_data['values']['font_style'] );
                $quote_styles[] = 'font-weight:' . $google_fonts_styles[1];
                $quote_styles[] = 'font-style:' . $google_fonts_styles[2];
            }
            
            $cite_styles = array();
            $cite_font_source = empty( $atts['cite_font_source'] ) ? '' : $atts['cite_font_source'];
            
            if ( 'google' === $cite_font_source && ! empty( $cite_google_fonts_data ) && isset( $cite_google_fonts_data['values'], $cite_google_fonts_data['values']['font_family'], $cite_google_fonts_data['values']['font_style'] ) ) {
                $google_fonts_family = explode( ':', $cite_google_fonts_data['values']['font_family'] );
                $cite_styles[] = 'font-family:' . $google_fonts_family[0];
                $google_fonts_styles = explode( ':', $cite_google_fonts_data['values']['font_style'] );
                $cite_styles[] = 'font-weight:' . $google_fonts_styles[1];
                $cite_styles[] = 'font-style:' . $google_fonts_styles[2];
            }
            
            return array(
                'quote_inline_styles' => $quote_styles,
                'cite_inline_styles'  => $cite_styles
            );
            
        }
        
        
        /**
         * Parses shortcode attributes and set defaults based on vc_map function relative to shortcode and fields names
         *
         * @param $atts
         *
         * @since 4.3
         * @return array
         */
        public function getAttributes( $atts ) {
            /**
             * Shortcode attributes
             * @var $google_fonts
             * @var $font_container
             * @var $link
             * @var $css
             */
            $atts = vc_map_get_attributes( $this->getShortcode(), $atts );
            extract( $atts );
    
            /**
             * Get default values from VC_MAP.
             */            
            $google_fonts_obj = new Vc_Google_Fonts();
                     
            $quote_google_fonts_field  = $this->getParamData( 'quote_google_fonts' );
            $cite_google_fonts_field   = $this->getParamData( 'cite_google_fonts' );
    
            $quote_google_fonts_field_settings = isset( $quote_google_fonts_field['settings'], $quote_google_fonts_field['settings']['fields'] ) ? $quote_google_fonts_field['settings']['fields'] : array();
            $quote_google_fonts_data = strlen( $quote_google_fonts ) > 0 ? $google_fonts_obj->_vc_google_fonts_parse_attributes( $quote_google_fonts_field_settings, $quote_google_fonts ) : '';
            
            $cite_google_fonts_field_settings = isset( $cite_google_fonts_field['settings'], $cite__google_fonts_field['settings']['fields'] ) ? $cite_google_fonts_field['settings']['fields'] : array();
            $cite_google_fonts_data = strlen( $cite_google_fonts ) > 0 ? $google_fonts_obj->_vc_google_fonts_parse_attributes( $cite_google_fonts_field_settings, $cite_google_fonts ) : '';
            
            return array(
                'quote_google_fonts'      => $quote_google_fonts,
                'quote_google_fonts_data' => $quote_google_fonts_data,
                'cite_google_fonts'       => $cite_google_fonts,
                'cite_google_fonts_data'  => $cite_google_fonts_data,
            );
            
        }
        
        
        protected function content( $atts, $content = null ) {
            
            extract( shortcode_atts( array (
                
                /* icon settings */
                'icon'                  => '',
                'icon_color'            => '',
                'icon_border_radius'    => '',
                'icon_background_color' => '',
                'quotation_marks'       => 'yes',
                
                /* quote settings */
                'quote_color'           => '',
                'quote_font_size'       => '',
                'quote_line_height'     => '',
                'quote_font_weight'     => '',
                'quote_letter_spacing'  => '0',
                'quote_text_transform'  => '',
                'quotation_marks_color' => '',
                'quote_font_source'     => '',
                'quote_google_fonts'    => '',
                'quote_websafe_fonts'   => '',
                'quote_ins_color'       => '',
                'quote_ins_font_weight' => '',
                                
                /* cite settings */
                'cite'                  => '',
                'cite_color'            => '',
                'cite_font_size'        => '',
                'cite_line_height'      => '',
                'cite_font_weight'      => '',
                'cite_letter_spacing'   => '0',
                'cite_text_transform'   => '',
                'cite_font_source'      => '',
                'cite_google_fonts'     => '',
                'cite_websafe_fonts'    => '',                
                
                /* misc */
                'fontsize'              => '', /* deprecated */
                'el_class'              => '',
                'css'                   => '',
                'class'                 => ''
                  
            ), $atts ) ); 
                        
            if( ( $cite_font_source && $cite_font_source == 'google' ) || ( $quote_font_source && $quote_font_source == 'google' ) ) {
                
                /* google font settings */
                extract( $this->getAttributes( $atts ) );
                extract( $this->getStyles( $quote_google_fonts_data, $cite_google_fonts_data, $atts ) );
                
                /* subsets */            
                $settings = get_option( 'wpb_js_google_fonts_subsets' );
                if ( is_array( $settings ) && ! empty( $settings ) ) {
                    $subsets = '&subset=' . implode( ',', $settings );
                } else {
                    $subsets = '';
                }
                
                /* quote font */
                if ( $quote_font_source && isset( $quote_google_fonts_data['values']['font_family'] ) ) {
                    wp_enqueue_style( 'vc_google_fonts_' . vc_build_safe_css_class( $quote_google_fonts_data['values']['font_family'] ), '//fonts.googleapis.com/css?family=' . $quote_google_fonts_data['values']['font_family'] . $subsets );
                }
                
                /* cite font */
                if ( $cite_font_source && isset( $cite_google_fonts_data['values']['font_family'] ) ) {
                    wp_enqueue_style( 'vc_google_fonts_' . vc_build_safe_css_class( $cite_google_fonts_data['values']['font_family'] ), '//fonts.googleapis.com/css?family=' . $cite_google_fonts_data['values']['font_family'] . $subsets );
                }
            
            }
            
            /* quote inline styles */
            if ( ! empty( $quote_inline_styles ) ) {
                $quote_inline_styles = 'style="' . esc_attr( implode( ';', $quote_inline_styles ) ) . '"';
            } else {
                $quote_inline_styles = '';
            }
            
            /* quote inline styles */
            if ( ! empty( $cite_inline_styles ) ) {
                $cite_inline_styles = 'style="' . esc_attr( implode( ';', $cite_inline_styles ) ) . '"';
            } else {
                $cite_inline_styles = '';
            }
            
            /* deprecated - fallback to older versions */
            if( $fontsize && !$quote_font_size ) {
                $quote_font_size = $fontsize;
            }
            
            
            /* unique ID */
            $id = uniqid("ut_p_quote_");
            
            $css_style = '<style type="text/css" scoped>';
                
                if( $icon_color ) {
                    $css_style .= '#' . $id . ' .ut-parallax-icon .fa { color: ' . $icon_color . '; }';
                }
                
                if( $icon_background_color ) {
                    $css_style .= '#' . $id . ' .ut-parallax-icon { background: ' . $icon_background_color . '; }';
                }                
                if( $icon_border_radius ) {
                    $css_style .= '#' . $id . ' .ut-parallax-icon { border-radius: ' . $icon_border_radius . '%; -moz-border-radius: ' . $icon_border_radius . '%; -webkit-border-radius: ' . $icon_border_radius . '%; }';
                }
                
                /* quote font settings */
                if( $quote_color ) {
                    $css_style .= '#' . $id . ' blockquote { color: ' . $quote_color . '; }';                    
                }                
                if( $quotation_marks_color ) {
                    $css_style .= '#' . $id . ' .ut-parallax-quote-title .fa-quote-left { color: ' . $quotation_marks_color . '; }';
                    $css_style .= '#' . $id . ' .ut-parallax-quote-title .fa-quote-right { color: ' . $quotation_marks_color . '; }';                    
                }
                if( $quote_font_size ) {
                    $fontsize = str_replace('px', '', $quote_font_size );                    
                    $css_style .= '#' . $id . ' blockquote { font-size: ' . $quote_font_size . 'px; }';
                }
                if( $quote_font_source && $quote_font_source == 'websafe' ) {
                    $css_style .= '#' . $id . ' blockquote { font-family: ' . get_websafe_font_css_family( $quote_websafe_fonts ) . '; }';
                }
                if( $quote_line_height ) {
                    $css_style .= '#' . $id . ' blockquote { line-height: ' . $quote_line_height . 'px; }';
                }
                if( $quote_font_weight ) {
                    $css_style .= '#' . $id . ' blockquote { font-weight: ' . $quote_font_weight . '; }';
                }
                if( $quote_letter_spacing ) {
                    $css_style .= '#' . $id . ' blockquote { letter-spacing: ' . $quote_letter_spacing . 'px; }';
                }
                if( $quote_text_transform ) {
                    $css_style .= '#' . $id . ' blockquote { text-transform: ' . $quote_text_transform . '; }';
                }
                if( $quote_ins_color ) {
                    $css_style .= '#' . $id . ' blockquote ins { background-color: transparent; color: ' . $quote_ins_color . '; }';                    
                }
                if( $quote_ins_font_weight ) {
                    $css_style .= '#' . $id . ' blockquote ins { font-weight: ' . $quote_ins_font_weight . '; }';                    
                }
                
                /* cite font settings */
                if( $cite_font_size ) {
                    $css_style .= '#' . $id . ' .ut-parallax-quote-name { font-size: ' . $cite_font_size . 'px; }';
                }
                if( $cite_font_source && $cite_font_source == 'websafe' ) {
                    $css_style .= '#' . $id . ' .ut-parallax-quote-name { font-family: ' . get_websafe_font_css_family( $cite_websafe_fonts ) . '; }';
                }
                if( $cite_line_height ) {
                    $css_style .= '#' . $id . ' .ut-parallax-quote-name { line-height: ' . $cite_line_height . 'px; }';
                }
                if( $cite_font_weight ) {
                    $css_style .= '#' . $id . ' .ut-parallax-quote-name { font-weight: ' . $cite_font_weight . '; }';
                }
                if( $cite_letter_spacing ) {
                    $css_style .= '#' . $id . ' .ut-parallax-quote-name { letter-spacing: ' . $cite_letter_spacing . 'px; }';
                }
                if( $cite_text_transform ) {
                    $css_style .= '#' . $id . ' .ut-parallax-quote-name { text-transform: ' . $cite_text_transform . '; }';
                }                
                if( $cite_color ) {
                    $css_style .= '#' . $id . ' .ut-parallax-quote-name { color: ' . $cite_color . '; }';                    
                }
              
            $css_style .= '</style>';
            
            /* icon */                  
            $icon = str_replace('fa fa-', 'fa-', $icon );      
                                    
            /* start output */
            $output = '';
            
            /* attach css */
            $output .= ut_minify_inline_css( $css_style );            
            
            $output .= '<div id="' . $id . '" class="ut-parallax-quote">';
                
                if( $icon ) {
                    $output .= '<div class="ut-parallax-icon"><i class="fa ' . esc_attr( $icon ) . '"></i></div>';
                }                
                
                $output .= '<blockquote class="ut-parallax-quote-title ' . esc_attr( $class ) . '" ' . $quote_inline_styles . '>';
                    
                    if( $quotation_marks == 'yes' ) {
                        $output .=  '<span class="quote-left">"</span>';    
                    }
                                  
                    $output .=  do_shortcode( $content );
                    
                    if( $quotation_marks == 'yes' ) {
                        $output .=  '<span class="quote-right">"</span>';    
                    }
                
                $output .= '</blockquote>';
                
                if( !empty( $cite ) ) {
                    $output .= '<span class="ut-parallax-quote-name" ' . $cite_inline_styles . '>' . $cite . '</span>';
                }                
                
            $output .= '</div>';
            
            if( defined( 'WPB_VC_VERSION' ) ) { 
                
                return '<div class="wpb_content_element ' . apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->shortcode, $atts ) . '">' . $output . '</div>'; 
            
            }
                
            return $output;
                        
            
        }
        
    }
    
}