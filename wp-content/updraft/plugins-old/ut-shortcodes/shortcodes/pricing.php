<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Pricing' ) ) {
	
    class UT_Pricing {
        
        private $shortcode;
            
        function __construct() {
			
            /* shortcode base */
            $this->shortcode = 'ut_pricing_table';
            
            add_action( 'init', array( $this, 'ut_map_shortcode' ) );
            add_shortcode( $this->shortcode, array( $this, 'ut_create_shortcode' ) );
            
            
            if( function_exists('vc_add_params') ) {
                
                // extra price font settings
                vc_add_params( $this->shortcode, _vc_add_font_settings( 
                    'price_', 
                    esc_html__( 'Price Font', 'ut_shortcodes' ), 
                    array( 
                        'font_size' => 60,
                        'font_size_min' => 60,
                        'font_size_max' => 100    
                    ), 
                    array( 'text_transform', 'line_height' )
                ) );
                
            }            
            
		}
        
        function ut_map_shortcode( $atts, $content = NULL ) {
            
            if( function_exists( 'vc_map' ) ) {
                                
                vc_map(
                    array(
                        'name'            => esc_html__( 'Pricing Table Module', 'ut_shortcodes' ),
                        'base'            => $this->shortcode,
                        'icon'            => UT_SHORTCODES_URL . '/admin/img/vc_icons/pricing-table.png',
                        'category'        => 'Information',
                        'class'           => 'ut-vc-icon-module ut-information-module',
                        'content_element' => true,
                        'params'          => array(

                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Headline', 'ut_shortcodes' ),
                                'param_name'        => 'headline',
                                'admin_label'       => true,
                                'group'             => 'General'
                            ),
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Subheadline', 'ut_shortcodes' ),
                                'param_name'        => 'subheadline',
                                'group'             => 'General'
                            ),
                    
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Media', 'ut_shortcodes' ),
                                'param_name'        => 'media_type',
                                'group'             => 'General',
                                'value'             => array(
                                    esc_html__( 'Featured Image', 'ut_shortcodes' ) => 'image',
                                    esc_html__( 'Video', 'ut_shortcodes' ) => 'video',
                                )
                            ),
                            array(
								'type'              => 'attach_image',
                                'heading'           => esc_html__( 'Upload Image', 'ut_shortcodes' ),
                                'param_name'        => 'image',
                                'group'             => 'General',
                                'dependency'        => array(
                                    'element' => 'media_type',
                                    'value'   => 'image',
                                ),    
                            ),
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Add Image Spacing?', 'unitedthemes' ),
                                'param_name'        => 'image_spacing',
                                'group'             => 'General',
                                'value'             => array(
                                    esc_html__( 'no, thanks!', 'ut_shortcodes' ) => '',
                                    esc_html__( 'yes, please!', 'ut_shortcodes' ) => 'true'                                    
                                ),
                                'dependency'        => array(
                                    'element' => 'media_type',
                                    'value'   => 'image',
                                ), 
                            ),
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Video URL', 'ut_shortcodes' ),
                                'description'       => esc_html__( '(required) Only the video URL eg "http://vimeo.com/62375781" or "https://youtu.be/TXQT1JKCQPo".', 'ut_shortcodes' ),
                                'param_name'        => 'video',
                                'group'             => 'General',
                                'dependency'        => array(
                                    'element' => 'media_type',
                                    'value'   => 'video',
                                ),
                            ),
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Price', 'ut_shortcodes' ),
                                'param_name'        => 'price',
                                'edit_field_class'  => 'vc_col-sm-4',
                                'group'             => 'General'
                            ),
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Currency', 'ut_shortcodes' ),
                                'param_name'        => 'currency',
                                'edit_field_class'  => 'vc_col-sm-4',
                                'group'             => 'General'
                            ),
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Currency Position', 'unitedthemes' ),
                                'param_name'        => 'currency_position',
                                'edit_field_class'  => 'vc_col-sm-4',
                                'group'             => 'General',
                                'value'             => array(
                                    esc_html__( 'before Price', 'ut_shortcodes' ) => 'before',
                                    esc_html__( 'after Price', 'ut_shortcodes' ) => 'after'                                                                        
                                )                                
                            ),                    
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Period', 'ut_shortcodes' ),
                                'param_name'        => 'period',
                                'group'             => 'General'
                            ),
                            array(
                                'type'          => 'param_group',
                                'heading'       => esc_html__( 'Table Features', 'ut_shortcodes' ),
                                'param_name'    => 'features',
                                'group'         => 'General',
                                'params' => array(
                                    
                                    array(
                                        'type'          => 'textfield',
                                        'heading'       => esc_html__( 'Feature', 'ut_shortcodes' ),
                                        'param_name'    => 'feature',                                        
                                        'admin_label'   => true,
                                    ),
                                    
                                ),

                            ),
                            array(
                            	'type'              => 'textfield',
								'heading'           => esc_html__( 'CSS Class', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'ut_shortcodes' ),
								'param_name'        => 'class',
								'group'             => 'General'
						  	),
                            
                            // General Design
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Highlight Table?', 'unitedthemes' ),
                                'description'       => esc_html__( 'Visually highlight this table. Perfect for special offers or to feature this table.', 'ut_shortcodes' ),
                                'param_name'        => 'popular',
                                'group'             => 'General Design',
                                'value'             => array(
                                    esc_html__( 'no, thanks!', 'ut_shortcodes' ) => '',
                                    esc_html__( 'yes, please!', 'ut_shortcodes' ) => 'true'                                    
                                )                                
                            ),
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Add Shadow?', 'unitedthemes' ),
                                'param_name'        => 'shadow',
                                'group'             => 'General Design',
                                'value'             => array(
                                    esc_html__( 'no, thanks!', 'ut_shortcodes' ) => '',
                                    esc_html__( 'yes, please!', 'ut_shortcodes' ) => 'true'                                    
                                )                                
                            ),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Shadow Color', 'ut_shortcodes' ),
								'param_name'        => 'shadow_color',
								'group'             => 'General Design',
                                'dependency'        => array(
                                    'element' => 'shadow',
                                    'value'   => 'true',
                                ),
						  	),
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Add Border?', 'unitedthemes' ),
                                'param_name'        => 'border',
                                'group'             => 'General Design',
                                'value'             => array(
                                    esc_html__( 'yes, please!', 'ut_shortcodes' ) => 'true',
                                    esc_html__( 'no, thanks!', 'ut_shortcodes' ) => 'false',                                                                        
                                )                                
                            ),                            
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Border Color', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'Set the color of the border.', 'ut_shortcodes' ),
								'param_name'        => 'border_color',
                                'edit_field_class'  => 'vc_col-sm-4',
								'group'             => 'General Design',
                                'dependency'        => array(
                                    'element' => 'border',
                                    'value'   => 'true',
                                ),
						  	),
                            array(
								'type'              => 'range_slider',
								'heading'           => esc_html__( 'Border Width', 'ut_shortcodes' ),
								'description'       => esc_html__( 'Set the width of the border.', 'ut_shortcodes' ),
                                'param_name'        => 'border_width',
                                'edit_field_class'  => 'vc_col-sm-4',
                                'value'             => array(
                                    'default'   => '1',
                                    'min'       => '0',
                                    'max'       => '50',
                                    'step'      => '1',
                                    'unit'      => 'px'
                                ),
								'group'             => 'General Design',
                                'dependency'        => array(
                                    'element' => 'border',
                                    'value'   => 'true',
                                ),
						  	),
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Border Style', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'double requires at least 4px border size.', 'ut_shortcodes' ),
								'param_name'        => 'border_style',
								'group'             => 'General Design',
                                'edit_field_class'  => 'vc_col-sm-4',
                                'value'             => array(
                                    esc_html__( 'solid' , 'ut_shortcodes' ) => 'solid',
                                    esc_html__( 'dotted', 'ut_shortcodes' ) => 'dotted',
                                    esc_html__( 'dashed', 'ut_shortcodes' ) => 'dashed',
                                    esc_html__( 'double', 'ut_shortcodes' ) => 'double'
                                ),
                                'dependency'        => array(
                                    'element' => 'border',
                                    'value'   => 'true',
                                ),
						  	),
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Hide Border Left?', 'unitedthemes' ),
                                'param_name'        => 'left_border',
                                'group'             => 'General Design',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'value'             => array(
                                    esc_html__( 'no, thanks!', 'ut_shortcodes' ) => '',
                                    esc_html__( 'yes, please!', 'ut_shortcodes' ) => 'true'                                    
                                ),
                                'dependency'        => array(
                                    'element' => 'border',
                                    'value'   => 'true',
                                ),
                            ), 
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Hide Border Right?', 'unitedthemes' ),
                                'param_name'        => 'right_border',
                                'group'             => 'General Design',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'value'             => array(
                                    esc_html__( 'no, thanks!', 'ut_shortcodes' ) => '',
                                    esc_html__( 'yes, please!', 'ut_shortcodes' ) => 'true'                                    
                                ),
                                'dependency'        => array(
                                    'element' => 'border',
                                    'value'   => 'true',
                                ),
                            ),                     
                    
                            // Design Settings        
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Table Background Color', 'ut_shortcodes' ),
								'param_name'        => 'background_color',
                                'edit_field_class'  => 'vc_col-sm-6',
								'group'             => 'General Design'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Table Separator Border Color', 'ut_shortcodes' ),
								'param_name'        => 'inner_border_color',                                
                                'edit_field_class'  => 'vc_col-sm-6',
								'group'             => 'General Design'
						  	),
                            array(
                                'type'              => 'range_slider',
                                'heading'           => esc_html__( 'Headline Font Size', 'ut_shortcodes' ),
                                'param_name'        => 'headline_font_size',
                                'group'             => 'General Design',
                                'value'             => array(
                                    'default'   => '17',
                                    'min'       => '8',
                                    'max'       => '200',
                                    'step'      => '1',
                                    'unit'      => 'px'
                                ),
                            ),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Table Headline Color', 'ut_shortcodes' ),
								'param_name'        => 'headline_text_color',
                                'edit_field_class'  => 'vc_col-sm-6',
								'group'             => 'General Design'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Table Subheadline Color', 'ut_shortcodes' ),
								'param_name'        => 'subheadline_text_color',
                                'edit_field_class'  => 'vc_col-sm-6',
								'group'             => 'General Design'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Table Header Background Color', 'ut_shortcodes' ),
								'param_name'        => 'header_background',
                                'edit_field_class'  => 'vc_col-sm-6',
								'group'             => 'General Design'
						  	),                    
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Table Media Background Color', 'ut_shortcodes' ),
								'param_name'        => 'media_background',
                                'edit_field_class'  => 'vc_col-sm-6',
								'group'             => 'General Design'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Table Period Text Color', 'ut_shortcodes' ),
								'param_name'        => 'period_text_color',
                                'edit_field_class'  => 'vc_col-sm-6',
								'group'             => 'General Design'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Table Price and Period Background Color', 'ut_shortcodes' ),
								'param_name'        => 'price_background_color',
                                'edit_field_class'  => 'vc_col-sm-6',
								'group'             => 'General Design'
						  	),                            
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Table Features Text Color', 'ut_shortcodes' ),
								'param_name'        => 'feature_text_color',
                                'edit_field_class'  => 'vc_col-sm-6',
								'group'             => 'General Design'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Table Features Background Color', 'ut_shortcodes' ),
								'param_name'        => 'feature_background_color',
                                'edit_field_class'  => 'vc_col-sm-6',
								'group'             => 'General Design'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Button Area Background Color', 'ut_shortcodes' ),
								'param_name'        => 'button_background_color',
                                'edit_field_class'  => 'vc_col-sm-6',
								'group'             => 'General Design'
						  	),        
                    
                    
                    
                            // Button
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Button Text', 'ut_shortcodes' ),
                                'param_name'        => 'button_text',
                                'admin_label'       => true,
                                'group'             => 'Button'
                            ),
                            array(
                                'type'              => 'vc_link',
                                'heading'           => esc_html__( 'Button Link', 'ut_shortcodes' ),
                                'param_name'        => 'button_link',
                                'group'             => 'Button'
                            ), 
                    
                            // Button Colors
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Text Color', 'ut_shortcodes' ),
								'param_name'        => 'button_text_color',
                                'edit_field_class'  => 'vc_col-sm-6',
								'group'             => 'Button'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Text Hover Color', 'ut_shortcodes' ),
								'param_name'        => 'button_text_color_hover',
                                'edit_field_class'  => 'vc_col-sm-6',    
								'group'             => 'Button'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Background Color', 'ut_shortcodes' ),
								'param_name'        => 'button_background',
                                'edit_field_class'  => 'vc_col-sm-6',
								'group'             => 'Button'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Background Hover Color', 'ut_shortcodes' ),
								'param_name'        => 'button_background_hover',
                                'edit_field_class'  => 'vc_col-sm-6',
								'group'             => 'Button'
						  	),
                            
                            // Button Design
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Button Size', 'ut_shortcodes' ),
								'param_name'        => 'button_size',
								'group'             => 'Button Design',
                                'value'             => array(
                                    esc_html__( 'Choose Button Size', 'ut_shortcodes' ) => '',
                                    esc_html__( 'mini'   , 'ut_shortcodes' ) => 'bklyn-btn-mini',
                                    esc_html__( 'small'  , 'ut_shortcodes' ) => 'bklyn-btn-small',
                                    esc_html__( 'normal' , 'ut_shortcodes' ) => 'bklyn-btn-normal',
                                    esc_html__( 'large'  , 'ut_shortcodes' ) => 'bklyn-btn-large',
                                ),
						  	),                           
                            array(
								'type'              => 'range_slider',
								'heading'           => esc_html__( 'Border Radius', 'ut_shortcodes' ),
								'param_name'        => 'button_border_radius',
                                'value'             => array(
                                    'min'   => '0',
                                    'max'   => '50',
                                    'step'  => '1',
                                    'unit'  => 'px'
                                ),
								'group'             => 'Button Design'
						  	),                            
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Activate Button Border?', 'unitedthemes' ),
                                'param_name'        => 'button_custom_border',
                                'group'             => 'Button Design',
                                'value'             => array(
                                    esc_html__( 'no', 'ut_shortcodes' ) => 'no',
                                    esc_html__( 'yes', 'ut_shortcodes' ) => 'yes'                                    
                                )                                
                            ),                            
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Border Color', 'ut_shortcodes' ),
								'param_name'        => 'button_border_color',
								'group'             => 'Button Design',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'dependency'        => array(
                                    'element' => 'button_custom_border',
                                    'value'   => 'yes',
                                ),
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Border Hover Color', 'ut_shortcodes' ),
								'param_name'        => 'button_border_color_hover',
								'group'             => 'Button Design',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'dependency'        => array(
                                    'element' => 'button_custom_border',
                                    'value'   => 'yes',
                                ),
						  	),
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Border Style', 'ut_shortcodes' ),
								'param_name'        => 'button_border_style',
								'group'             => 'Button Design',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'value'             => array(
                                    esc_html__( 'solid' , 'ut_shortcodes' ) => 'solid',
                                    esc_html__( 'dotted', 'ut_shortcodes' ) => 'dotted',
                                    esc_html__( 'dashed', 'ut_shortcodes' ) => 'dashed',
                                    esc_html__( 'double', 'ut_shortcodes' ) => 'double',
                                    esc_html__( 'groove', 'ut_shortcodes' ) => 'groove',
                                    esc_html__( 'ridge' , 'ut_shortcodes' ) => 'ridge',
                                    esc_html__( 'inset' , 'ut_shortcodes' ) => 'inset',
                                    esc_html__( 'outset', 'ut_shortcodes' ) => 'outset',
                                ),
                                'dependency'        => array(
                                    'element' => 'button_custom_border',
                                    'value'   => 'yes',
                                ),
						  	),
                            array(
								'type'              => 'range_slider',
								'heading'           => esc_html__( 'Border Width', 'ut_shortcodes' ),
								'param_name'        => 'button_border_width',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'value'             => array(
                                    'min'   => '0',
                                    'max'   => '50',
                                    'step'  => '1',
                                    'unit'  => 'px'
                                ),
								'group'             => 'Button Design',
                                'dependency'        => array(
                                    'element' => 'button_custom_border',
                                    'value'   => 'yes',
                                ),
						  	),
                            
                            // Font Settings
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Font Family', 'ut_shortcodes' ),
								'param_name'        => 'font_family',
								'group'             => 'Button Font',
                                'value'             => array(
                                    
                                    esc_html__( 'Sans Serif (default)' , 'ut_shortcodes' ) => '',
                                    esc_html__( 'Body Font (inherit)' , 'ut_shortcodes' ) => 'inherit',
                                    
                                ),
						  	),    
                    
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Font Weight', 'ut_shortcodes' ),
								'param_name'        => 'font_weight',
								'group'             => 'Button Font',
                                'value'             => array(
                                    esc_html__( 'Select Font Weight' , 'ut_shortcodes' ) => '',
                                    esc_html__( 'normal' , 'ut_shortcodes' )             => 'normal',
                                    esc_html__( 'bold' , 'ut_shortcodes' )               => 'bold'
                                ),                               
						  	),
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Text Transform', 'ut_shortcodes' ),
								'param_name'        => 'text_transform',
								'group'             => 'Button Font',
                                'value'             => array(
                                    esc_html__( 'Select Text Transform' , 'ut_shortcodes' ) => '',
                                    esc_html__( 'capitalize' , 'ut_shortcodes' ) => 'capitalize',
                                    esc_html__( 'uppercase', 'ut_shortcodes' ) => 'uppercase',
                                    esc_html__( 'lowercase', 'ut_shortcodes' ) => 'lowercase'                                    
                                ),
						  	),
                            array(
								'type'              => 'range_slider',
								'heading'           => esc_html__( 'Letter Spacing', 'ut_shortcodes' ),
								'param_name'        => 'letter_spacing',
                                'group'             => 'Button Font',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'value'             => array(
                                    'default'   => '0',
                                    'min'       => '-10',
                                    'max'       => '10',
                                    'step'      => '1',
                                    'unit'      => 'px'
                                ),								
						  	),
                            
                            // css editor
                            array(
                                'type'              => 'css_editor',
                                'param_name'        => 'css',
                                'group'             => esc_html__( 'Design Options', 'ut_shortcodes' ),
                            ), 
                            
                        )                        
                        
                    )
                
                ); // end mapping
                
            } 
        
        }
        
        function ut_create_shortcode( $atts, $content = NULL ) {
            
            extract( shortcode_atts( array (
                'headline'          => '',
                'subheadline'       => '',
                'media_type'        => 'image',
                'image'             => '',
                'image_spacing'     => '',
                'video'             => '',
                'price'             => '',
                'currency'          => '',
                'currency_position' => 'before',
                'period'            => '',
                'features'          => '',
                'shadow'            => '',
                'border'            => 'true',
                'popular'           => '',
                'button'            => '',
                'class'             => '',
                'css'               => '',
                
                // Colors
                'inner_border_color'       => '',
                'period_text_color'        => '',
                'background_color'         => '',
                'header_background'        => '',
                'price_background_color'   => '',
                'media_background'         => '',            
                'feature_background_color' => '',
                'button_background_color'  => '',
                
                // Headline Font Settings
                'headline_font_size'    => '',
                'headline_text_color'   => '',
                
                // Subheadline Font Settings
                'subheadline_text_color' => '',
                
                // Price Settings
                'price_font_size'        => '',
                'price_font_weight'      => '',
                'price_font_color'       => '',
                'price_text_transform'   => '',
                'price_font_source'      => 'theme',
                'price_google_fonts'     => '',
                'price_websafe_fonts'    => '',
                
                // general colors and styles 
                'shadow_color'      => '',
                'border_style'      => 'solid',
                'border_width'      => '1',
                'border_color'      => '',
                'popular_color'     => '',
                'right_border'      => '',
                'left_border'       => '',
                
                // feature colors
                'feature_text_color'    => '',
                'feature_bg_color'      => '',
                
                // price colors
                'price_text_color'      => '',
                'price_bg_color'        => '',
                
                // period colors
                'period_text_color'     => '',
                'period_bg_color'       => '',
                
                 // button
                'button_text'           => '',
                'button_size'           => ''
                
            ), $atts ) ); 
            
            $classes = array();
            
            if( $shadow ) {
                $classes[] = 'ut-plan-module-shadow';
            }
            
            if( $border ) {
                $classes[] = 'ut-plan-module-border';
            }
            
            if( $popular ) {
                $classes[] = 'ut-plan-module-popular';
            }
            
            if( $class ) {
                $classes[] = $class;    
            }
            
            // inline css
            $id = uniqid('bklyn_pricing_');
            
            // price font
            $ut_price_font_css = false;
            
            // initialize google font
            if( $price_font_source && $price_font_source == 'google' ) {
                
                 $ut_price_google_font = new UT_VC_Google_Fonts( $atts, 'price_google_fonts', $this->shortcode );
                 $ut_price_font_css = $ut_price_google_font->get_google_fonts_css_styles();
                        
            }
            
            $ut_price_font_css = is_array( $ut_price_font_css ) ? implode( '', $ut_price_font_css ) : $ut_price_font_css;
            
            // start CSS
            $css_style = '';
            
            // Border Settings
            if( $border == "true" ) {                    
                
                if( $border_color ) {
                    
                    if( ut_is_hex( $border_color ) ) {
                        
                        $css_style .= '#' . $id . '.ut-plan-module-border { border-color: ' . $border_color . '; }';    
                    
                    } else {                    
                    
                        $css_style .= '#' . $id . '.ut-plan-module-border { border-color: ' .  ut_rgba_to_rgb( $border_color )  . '; border-color: ' . $border_color . '; }';
                    
                    }                    
                    
                }
                
                if( $border_style ) {
                    $css_style .= '#' . $id . '.ut-plan-module-border { border-style: ' . $border_style . '; }';
                }
                
                if( $border_width ) {
                    $css_style .= '#' . $id . '.ut-plan-module-border { border-width: ' . $border_width . 'px; }';
                }
                
                if( $right_border ) {
                    $css_style .= '#' . $id . '.ut-plan-module-border { border-right: none; }';    
                }
                
                if( $left_border ) {
                    $css_style .= '#' . $id . '.ut-plan-module-border { border-left: none; }';    
                }
                
            }
            
            
            // Shadow Settings 
            if( $shadow && !empty( $shadow_color ) ) {
                    
                $css_style .= '#' . $id . '.ut-plan-module-shadow { -webkit-box-shadow: 0 5px 15px ' . $shadow_color . '; }';
                $css_style .= '#' . $id . '.ut-plan-module-shadow { -moz-box-shadow: 0 5px 15px ' . $shadow_color . '; }';
                $css_style .= '#' . $id . '.ut-plan-module-shadow { box-shadow: 0 5px 15px ' . $shadow_color . '; }';
                
            }
            
            // Background Colors
            if( !empty( $background_color ) ) {
                
                if( ut_is_hex( $background_color ) ) {
                    
                    $css_style .= '#' . $id . '.ut-plan-module-wrap { background: ' .  $background_color . '; }';
                    
                } else {
                    
                    $css_style .= '#' . $id . '.ut-plan-module-wrap { background: ' .  ut_rgba_to_rgb( $background_color )  . '; background: ' . $background_color . '; }';    
                    
                }                
                
            }
            
            if( !empty( $header_background ) ) {
                
                if( ut_is_hex( $header_background ) ) {
                    
                    $css_style .= '#' . $id . ' .ut-plan-module-header { background: ' .  $header_background . '; }';
                    
                } else {
                    
                    $css_style .= '#' . $id . ' .ut-plan-module-header { background: ' .  ut_rgba_to_rgb( $header_background )  . '; background: ' . $header_background . '; }';    
                    
                }                
                
            }
            
            if( !empty( $media_background ) ) {
                
                if( ut_is_hex( $media_background ) ) {
                    
                    $css_style .= '#' . $id . ' .ut-plan-module-media { background: ' .  $media_background . '; }';
                    
                } else {
                    
                    $css_style .= '#' . $id . ' .ut-plan-module-media { background: ' .  ut_rgba_to_rgb( $media_background )  . '; background: ' . $media_background . '; }';    
                    
                }                
                
            }
            
            if( !empty( $price_background_color ) ) {
                
                if( ut_is_hex( $price_background_color ) ) {
                    
                    $css_style .= '#' . $id . ' .ut-plan-module-price-wrap { background: ' .  $price_background_color . '; }';
                    
                } else {
                    
                    $css_style .= '#' . $id . ' .ut-plan-module-price-wrap { background: ' .  ut_rgba_to_rgb( $price_background_color )  . '; background: ' . $price_background_color . '; }';    
                    
                }                
                
            }
            
            if( !empty( $feature_background_color ) ) {
                
                if( ut_is_hex( $feature_background_color ) ) {
                    
                    $css_style .= '#' . $id . ' .ut-plan-module-content { background: ' .  $feature_background_color . '; }';
                    
                } else {
                    
                    $css_style .= '#' . $id . ' .ut-plan-module-content { background: ' .  ut_rgba_to_rgb( $feature_background_color )  . '; background: ' . $feature_background_color . '; }';    
                    
                }                
                
            }
            
            if( !empty( $button_background_color ) ) {
                
                if( ut_is_hex( $button_background_color ) ) {
                    
                    $css_style .= '#' . $id . ' .ut-plan-module-button { background: ' .  $button_background_color . '; }';
                    
                } else {
                    
                    $css_style .= '#' . $id . ' .ut-plan-module-button { background: ' .  ut_rgba_to_rgb( $button_background_color )  . '; background: ' . $button_background_color . '; }';    
                    
                }                
                
            }
            
                            
            
            // Features Text Color
            if( $feature_text_color && ut_is_hex( $feature_text_color ) ) {
                
                $css_style .= '#' . $id . ' .ut-plan-module-content { color: ' . $feature_text_color . ' }';
            
            } else {
                
                $css_style .= '#' . $id . ' .ut-plan-module-content { color: ' .  ut_rgba_to_rgb( $feature_text_color )  . '; color: ' . $feature_text_color . '; }';
                
            }
            
            // Table Colors
            if( $inner_border_color ) {
                $css_style.= '#' . $id . ' .ut-plan-module-header { border-bottom-color:' . $inner_border_color . '; }';
                $css_style.= '#' . $id . ' .ut-plan-module-media { border-bottom-color:' . $inner_border_color . '; }';
                $css_style.= '#' . $id . ' .ut-plan-module-price-wrap { border-bottom-color:' . $inner_border_color . '; }';
                $css_style.= '#' . $id . ' .ut-plan-module-content { border-bottom-color:' . $inner_border_color . '; }';
            }
            
            // Headline CSS
            if( $headline_font_size ) {
                $css_style.= '#' . $id . ' .ut-plan-module-headline { font-size:' . $headline_font_size . 'px; }';
            }
            
            if( $headline_text_color ) {
                $css_style.= '#' . $id . ' .ut-plan-module-headline { color:' . $headline_text_color . '; }';
            }
            
            // Period
            if( $period_text_color ) {
                $css_style.= '#' . $id . ' .ut-plan-module-price-period { color:' . $period_text_color . '; }';
            }
            
            // Table Media
            if( $image_spacing && $media_type == 'image' ) {
                $css_style.= '#' . $id . ' .ut-plan-module-media { padding:20px; }';
            }
            
            // Subheadline CSS
            if( $subheadline_text_color ) {
                $css_style.= '#' . $id . ' .ut-plan-module-subheadline { color:' . $subheadline_text_color . '; }';
            }
            
            // Price CSS
            if( $ut_price_font_css ) {
               $css_style.= '#' . $id . ' .ut-plan-module-price { ' . $ut_price_font_css . ' }';
            }
            
            if( $price_font_size ) {
                $css_style.= '#' . $id . ' .ut-plan-module-price { font-size:' . $price_font_size . 'px; }';
            }
            
            if( $price_font_color ) {
                $css_style.= '#' . $id . ' .ut-plan-module-price { color:' . $price_font_color . '; }';
            }
            
            if( $price_background_color ) {
                $css_style.= '#' . $id . ' .ut-plan-module-price-wrap { background:' . $price_background_color . '; }';    
            }
            
            if( $price_font_weight && $price_font_source != 'google' ) {
                $css_style.= '#' . $id . ' .ut-plan-module-price { font-weight:' . $price_font_weight . '; }';
            }
            
            if( $price_text_transform ) {
                $css_style.= '#' . $id . ' .ut-plan-module-price { text-transform:' . $price_text_transform . '; }';
            }
            
            // decode features 
            $features = vc_param_group_parse_atts( $features ); 
            
            /* start output */
            ob_start(); ?>
            
            <?php 
            
            if( !empty( $css_style ) ) {
            
                echo ut_minify_inline_css( '<style type="text/css" scoped>' . $css_style . '</style>' ); 
            
            }
            
            ?>
            
            <div id="<?php echo esc_attr( $id ); ?>" class="ut-plan-module-wrap ut-plan-module <?php echo esc_attr( implode(' ', $classes ) ); ?>">
                
                <?php if( $headline || $subheadline ) : ?>
                
                    <div class="ut-plan-module-header">

                        <?php if( $headline ) : ?>

                            <h3 class="ut-plan-module-headline"><?php echo $headline; ?></h3>

                        <?php endif; ?>

                        <?php if( $subheadline ) : ?>

                        <span class="ut-plan-module-subheadline"><?php echo $subheadline; ?></span>

                        <?php endif; ?>            

                    </div>
                
                <?php endif; ?>
                
                <?php if( $media_type == 'image' && !empty( $image ) || $media_type == 'video' && !empty( $video ) ) : ?>
                
                <div class="ut-plan-module-media">
                    
                    <?php if( $media_type == 'image' ) : ?>
                        
                        <?php
            
                            // get table image
                            $image = wp_get_attachment_image_src( $image, 'full' );
                            echo !empty( $image[0] ) ? '<img alt="' . ( !empty( $headline ) ? $headline : '' )  . '" src="' . esc_url( $image[0] ) . '">' : '';
                        
                        ?>
                        
                    <?php else : ?>
                        
                        <?php echo wp_oembed_get( trim( $video ) ); ?>
                    
                    <?php endif; ?>
                    
                </div>
                
                <?php endif; ?>
                
                <?php if( $price || $period ) : ?>
                
                <div class="ut-plan-module-price-wrap">
                    
                    <?php if( $price ) : ?>
                        
                        <span class="ut-plan-module-price">
                        <?php echo !empty( $currency ) && $currency_position == "before" ? $currency : '';  ?><?php echo $price; ?><?php echo !empty( $currency ) && $currency_position == "after" ? $currency : '';  ?>
                        </span>
                    
                    <?php endif; ?>
                    
                    <?php if( $period ) : ?>
                    
                        <span class="ut-plan-module-price-period"><?php echo $period; ?></span>
                        
                    <?php endif; ?>
                    
                </div>
                
                <?php endif; ?>
                
                <?php if( !empty( $features ) && is_array( $features ) && array_filter( $features ) ) : ?>
                
                    <div class="ut-plan-module-content">
                        
                        <ul>
                            
                            <?php foreach( $features as $feature ) : ?>
                                
                                <?php if( !empty( $feature['feature'] ) ) : ?>
                                
                                    <li><?php echo $feature['feature']; ?></li>
                                
                                <?php endif; ?>                            
                                
                                
                            <?php endforeach; ?>
    
                        </ul>
                        
                    </div>
                
                <?php endif; ?>
                
                <?php if( !empty( $button_text ) ) : ?>
                
                    <div class="ut-plan-module-button">
                            
                        <?php $button = new UT_BTN(); ?>
                        <?php $atts["button_size"] = !empty( $atts["button_size"] ) ? $atts["button_size"] : 'bklyn-btn-small'; ?>
                        
                        <?php echo $button->ut_create_shortcode( $atts ); ?>
                            
                    </div>
                
                <?php endif; ?>
                
            </div>
            
            <?php
                            
            $output = ob_get_clean();
            
            if( defined( 'WPB_VC_VERSION' ) ) { 
                
                return '<div class="wpb_content_element ' . apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->shortcode, $atts ) . '">' . $output . '</div>'; 
            
            }
           
            return $output;
        
        }
            
    }

}

new UT_Pricing;