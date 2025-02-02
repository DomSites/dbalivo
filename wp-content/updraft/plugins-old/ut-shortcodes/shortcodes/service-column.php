<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Service_Column' ) ) {
	
    class UT_Service_Column {
        
        private $shortcode;
            
        function __construct() {
			
            /* shortcode base */
            $this->shortcode = 'ut_service_column';
            
            add_action( 'init', array( $this, 'ut_map_shortcode' ) );
            add_shortcode( $this->shortcode, array( $this, 'ut_create_shortcode' ) );	
            
		}
        
        function ut_map_shortcode( $atts, $content = NULL ) {
            
            if( function_exists( 'vc_map' ) ) {
                                
                vc_map(
                    array(
                        'name'            => esc_html__( 'Service Column', 'ut_shortcodes' ),
                        'base'            => $this->shortcode,
                        'icon'            => UT_SHORTCODES_URL . '/admin/img/vc_icons/service-column.png',
                        'category'        => 'Information',
                        'class'           => 'ut-vc-icon-module ut-information-module',
                        'content_element' => true,
                        'custom_markup'   => '',
                        'params' => array(
                            array(
								'type'              => 'iconpicker',
                                'heading'           => esc_html__( 'Choose Icon', 'ut_shortcodes' ),
                                'param_name'        => 'icon',
                                'group'             => 'General',                                
                            ),
                            array(
								'type'              => 'attach_image',
                                'heading'           => esc_html__( 'or upload an own Icon', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'recommended size 32x32', 'ut_shortcodes' ),
                                'param_name'        => 'imageicon',
                                'group'             => 'General',                                
                            ),
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Icon Size', 'ut_shortcodes' ),
                                'param_name'        => 'size',
								'group'             => 'General',
                                'value'             => array(
                                    'large' => esc_html__( 'large', 'ut_shortcodes' ),
                                    'medium' => esc_html__( 'medium', 'ut_shortcodes' ),
                                    'small' => esc_html__( 'small', 'ut_shortcodes' ),
                                ),
						  	),                    
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Icon Shape', 'ut_shortcodes' ),
                                'param_name'        => 'shape',
								'group'             => 'General',
                                'value'             => array(
                                    'normal' => esc_html__( 'normal', 'ut_shortcodes' ),
                                    'circle' => esc_html__( 'round', 'ut_shortcodes' ),
                                    'square' => esc_html__( 'square', 'ut_shortcodes' ),
                                    'rounded'=> esc_html__( 'rounded', 'ut_shortcodes' ),
                                ),
						  	),
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Alignment', 'ut_shortcodes' ),
								'param_name'        => 'align',
								'group'             => 'General',
                                'value'             => array(
                                    'left'      => esc_html__( 'left', 'ut_shortcodes' ),
                                    'right'     => esc_html__( 'right', 'ut_shortcodes' ),
                                ),
						  	),
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Headline', 'ut_shortcodes' ),
                                'admin_label'       => true,
                                'param_name'        => 'headline',
                                'group'             => 'General'
                            ),
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Headline Margin Bottom', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'value in px , eg "20px" (optional)' , 'ut_shortcodes' ),
                                'param_name'        => 'headline_margin_bottom',
                                'group'             => 'General'
                            ),
                            
                            array(
                                'type'              => 'textarea',
                                'heading'           => esc_html__( 'Column Text', 'ut_shortcodes' ),
                                'admin_label'       => true,
                                'param_name'        => 'content',
                                'group'             => 'General'
                            ),
                            array(
                                'type'              => 'vc_link',
                                'heading'           => esc_html__( 'Column Custom Link', 'ut_shortcodes' ),
                                'param_name'        => 'link',
                                'group'             => 'General',                              
                            ),                            
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Link Text Transform', 'ut_shortcodes' ),
								'param_name'        => 'link_text_transform',
								'group'             => 'General',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'value'             => array(
                                    esc_html__( 'Select Text Transform' , 'ut_shortcodes' ) => '',
                                    esc_html__( 'capitalize' , 'ut_shortcodes' ) => 'capitalize',
                                    esc_html__( 'uppercase', 'ut_shortcodes' ) => 'uppercase',
                                    esc_html__( 'lowercase', 'ut_shortcodes' ) => 'lowercase'                                    
                                ),
						  	),
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Link Font Weight', 'ut_shortcodes' ),
								'param_name'        => 'link_font_weight',
								'group'             => 'General',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'value'             => array(
                                    esc_html__( 'Select Font Weight' , 'ut_shortcodes' ) => '',
                                    esc_html__( 'normal' , 'ut_shortcodes' )             => 'normal',
                                    esc_html__( 'bold' , 'ut_shortcodes' )               => 'bold'
                                ),
						  	),
                            
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Add Icon to Link?', 'unitedthemes' ),
                                'param_name'        => 'link_icon',
                                'group'             => 'General',
                                'value'             => array(
                                    esc_html__( 'no', 'ut_shortcodes' ) => 'no',
                                    esc_html__( 'yes', 'ut_shortcodes' ) => 'yes',                                                                                                            
                                )                                
                            ),
                            
                            array(
                                'type'          => 'dropdown',
                                'heading'       => esc_html__( 'Icon library', 'ut_shortcodes' ),
                                'description'   => esc_html__( 'Select icon library.', 'ut_shortcodes' ),
                                'param_name'    => 'link_icon_type', 
                                'group'         => 'General', 
                                'value'         => array(
                                    esc_html__( 'Font Awesome', 'ut_shortcodes' ) => 'fontawesome',
                                    esc_html__( 'Brooklyn Icons', 'ut_shortcodes' ) => 'bklynicons',
                                    //esc_html__( 'Custom Icon', 'ut_shortcodes' ) => 'custom',
                                ),
                                'dependency' => array(
                                    'element'   => 'link_icon',
                                    'value'     => 'yes',
                                ),
                                                              
                            ),
                    
                            array(
								'type'              => 'iconpicker',
                                'heading'           => esc_html__( 'Choose Icon', 'ut_shortcodes' ),
                                'param_name'        => 'link_icon_fontawesome',
                                'group'             => 'General',                                
                                'dependency' => array(
                                    'element'   => 'link_icon_type',
                                    'value'     => 'fontawesome',
                                ),
                            ),
                            
                            array(
								'type'              => 'iconpicker',
                                'heading'           => esc_html__( 'Choose Icon', 'ut_shortcodes' ),
                                'param_name'        => 'link_icon_bklyn',
                                'group'             => 'General',
                                'settings' => array(
                                    'emptyIcon'     => true,
                                    'type'          => 'bklynicons',
                                ),
                                'dependency' => array(
                                    'element'   => 'link_icon_type',
                                    'value'     => 'bklynicons',
                                ),
                                                                
                            ),
                            
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Icon Position', 'unitedthemes' ),
                                'param_name'        => 'link_icon_position',
                                'group'             => 'General',
                                'value'             => array(
                                    esc_html__( 'before', 'ut_shortcodes' ) => 'before',
                                    esc_html__( 'after', 'ut_shortcodes' ) => 'after'                                    
                                ),
                                'dependency'        => array(
                                    'element' => 'link_icon',
                                    'value'   => 'yes',
                                ),
                            ),
                            
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Add Hover Animation to Icon?', 'unitedthemes' ),
                                'param_name'        => 'link_icon_animation',
                                'group'             => 'General',
                                'value'             => array(
                                    esc_html__( 'yes', 'ut_shortcodes' ) => 'yes',
                                    esc_html__( 'no', 'ut_shortcodes' ) => 'no',                                                                        
                                )                                
                            ),
                    
                            /* Colors */
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Icon Color', 'ut_shortcodes' ),
								'param_name'        => 'color',
								'group'             => 'Colors'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Icon Background Color', 'ut_shortcodes' ),
                                'param_name'        => 'background',
								'group'             => 'Colors',
                                'dependency' => array(
                                    'element' => 'shape',
                                    'value'   => array( 'round', 'square', 'rounded' ),
                                ),
						  	),                    
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Column Headline Color', 'ut_shortcodes' ),
								'param_name'        => 'headline_color',
								'group'             => 'Colors'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Column Text Color', 'ut_shortcodes' ),
								'param_name'        => 'text_color',
								'group'             => 'Colors'
						  	),                            
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Link Color', 'ut_shortcodes' ),
								'param_name'        => 'link_color',
								'group'             => 'Colors'
						  	),                            
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Link Hover Color', 'ut_shortcodes' ),
								'param_name'        => 'link_hover_color',
								'group'             => 'Colors'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Link Icon Color', 'ut_shortcodes' ),
								'param_name'        => 'link_icon_color',
								'group'             => 'Colors',
                                'dependency'        => array(
                                    'element' => 'link_icon',
                                    'value'   => 'yes',
                                ),
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Link Icon Hover Color', 'ut_shortcodes' ),
								'param_name'        => 'link_icon_hover_color',
								'group'             => 'Colors',
                                'dependency'        => array(
                                    'element' => 'link_icon',
                                    'value'   => 'yes',
                                ),
						  	),
                    
                            /* animation */
                            array(
                                'type'              => 'animation_style',
                                'heading'           => __( 'Animation Effect', 'ut_shortcodes' ),
                                'description'       => __( 'Select image animation effect.', 'ut_shortcodes' ),
                                'group'             => 'Animation',
                                'param_name'        => 'effect',
                                'settings' => array(
                                    'type' => array(
                                        'in',
                                        'out',
                                        'other',
                                    ),
                                )
                                
                            ),
                            
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Animation Duration', 'unitedthemes' ),
                                'description'       => esc_html__( 'Animation time in seconds  e.g. 1s', 'unitedthemes' ),
                                'param_name'        => 'animation_duration',
                                'group'             => 'Animation',
                            ), 
                             
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Animate Once?', 'unitedthemes' ),
                                'description'       => esc_html__( 'Animate only once when reaching the viewport, animate everytime when reaching the viewport or make the animation infinite? By default the animation executes everytime when the element becomes visible in viewport, means when leaving the viewport the animation will be reseted and starts again when reaching the viewport again. By setting this option to yes, the animation executes exactly once. By setting it to infinite, the animation loops all the time, no matter if the element is in viewport or not.', 'unitedthemes' ),
                                'param_name'        => 'animate_once',
                                'group'             => 'Animation',
                                'value'             => array(
                                    esc_html__( 'no' , 'unitedthemes' )      => 'no',
                                    esc_html__( 'yes', 'unitedthemes' )      => 'yes',
                                    esc_html__( 'infinite', 'unitedthemes' ) => 'infinite',
                                )
                            ),  
                            
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Animate Image on Tablet?', 'ut_shortcodes' ),
                                'param_name'        => 'animate_tablet',
                                'group'             => 'Animation',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'value'             => array(
                                    esc_html__( 'no', 'ut_shortcodes' ) => 'false',
                                    esc_html__( 'yes'  , 'ut_shortcodes' ) => 'true'
                                ),
                            ),
                            
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Animate Image on Mobile?', 'ut_shortcodes' ),
                                'param_name'        => 'animate_mobile',
                                'group'             => 'Animation',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'value'             => array(
                                    esc_html__( 'no', 'ut_shortcodes' ) => 'false',
                                    esc_html__( 'yes'  , 'ut_shortcodes' ) => 'true'
                                ),
                            ),                            
                            
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Delay Animation?', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'Time in milliseconds until the image appears. e.g. 200', 'ut_shortcodes' ),
                                'param_name'        => 'delay',
                                'group'             => 'Animation',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'value'             => array(
                                    esc_html__( 'no', 'ut_shortcodes' ) => 'false',
                                    esc_html__( 'yes'  , 'ut_shortcodes' ) => 'true'                                                                        
                                )
                            ),
                            
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Delay Timer', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'Time in milliseconds until the next image appears. e.g. 200', 'ut_shortcodes' ),
                                'param_name'        => 'delay_timer',
                                'group'             => 'Animation',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'dependency'        => array(
                                    'element' => 'delay',
                                    'value'   => 'true',
                                )
                            ), 
                            
                            /* custom css */
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
						  	), 
                        ),
                        
                        
                    )
                
                ); /* end mapping */
                
            } 
        
        }
        
        function ut_create_shortcode( $atts, $content = NULL ) {
            
            extract( shortcode_atts( array (
                'icon'              => '',
                'imageicon'         => '',
                'size'              => 'large',
                'shape'             => 'normal',
                'align'             => 'left',                
                'color'             => '',
                'headline_color'    => '',
                'headline_margin_bottom' => '',
                'text_color'        => '',
                'background'        => '',
                'headline'          => '',
                
                // link
                'link'                => '',
                'link_color'          => '',
                'link_hover_color'    => '',
                'link_text_transform' => '',
                'link_font_weight'    => '',
                
                // link icon
                'link_icon'             => 'no',
                'link_icon_type'        => 'fontawesome',
                'link_icon_fontawesome' => 'fa fa-arrow-circle-right',
                'link_icon_bklyn'       => '',
                'link_icon_position'    => 'before',
                'link_icon_animation'   => 'yes',
                'link_icon_color'       => '',
                'link_icon_hover_color' => '',
                
                // Animation
                'effect'            => '',     
                'animate_once'      => 'no',
                'animate_mobile'    => false,
                'animate_tablet'    => false,
                'delay'             => 'no',
                'delay_timer'       => '200',
                'animation_duration'=> '',
                'width'             => '',      /* deprecated */
                'margin_bottom'     => '',      /* deprecated */
                'last'              => 'false', /* deprecated */
                'css'               => '',
                'class'             => ''
            ), $atts ) ); 
            
            $classes    = array();
            $attributes = array();            
            
            $classes[] = 'ut-horizontal-style-align-' . $align;
            
            /* deprecated - will be removed one day - start block */
            
                $grid = array( 
                    'third'   => 'ut-one-third',
                    'fourth'  => 'ut-one-fourth',
                    'half'    => 'ut-one-half',
                    'full'    => ''
                );  
                
                $classes[] = ( $last == 'true' ) ? 'ut-column-last' : '';
                $classes[] = !empty( $grid[$width] ) ? $grid[$width] : 'clearfix';
                $classes[] = $class;
                    
                /* margin bottom*/
                $margin_bottom = !empty($margin_bottom) ? 'style="margin-bottom:' . $margin_bottom . 'px"' : '';                
                
            /* deprecated - will be removed one day - end block */
            
            /* animation effect */
            $dataeffect = NULL;
            
            if( !empty( $effect ) ) {
                
                $attributes['data-effect']      = esc_attr( $effect );
                $attributes['data-animateonce'] = esc_attr( $animate_once );
                
                $attributes['data-delay'] = esc_attr( $delay_timer );
                
                if( !empty( $animation_duration ) ) {
                    $attributes['data-animation-duration'] = esc_attr( $animation_duration );    
                }                
                
                $classes[]  = 'ut-animate-element';
                $classes[]  = 'animated';
                
                if( !$animate_tablet ) {
                    $classes[]  = 'ut-no-animation-tablet';
                }
                
                if( !$animate_mobile ) {
                    $classes[]  = 'ut-no-animation-mobile';
                }
                
                if( $animate_once == 'infinite' ) {
                    $classes[]  = 'infinite';
                }
                                
            }
                        
            /* icon setting */
            if( !empty( $imageicon ) && is_numeric( $imageicon ) ) {
                $imageicon = wp_get_attachment_url( $imageicon );        
            }            
            
            /* overwrite default icon */
            $icon = empty( $imageicon ) ? $icon : $imageicon;
            
            /* check if icon is an image */
            $image_icon = strpos( $icon, '.png' ) !== false || strpos( $icon, '.jpg' ) !== false || strpos( $icon, '.gif' ) !== false || strpos( $icon, '.ico' ) !== false || strpos( $icon, '.svg' ) !== false ? true : false;
            
            /* font awesome icon */
            if( !$image_icon ) {
                
                /* fallback */
                $icon = str_replace('fa fa-', 'fa-', $icon );                
                
            }            
            
            /* inline css */
            $id = uniqid("ut_sc_");
            
            $css_style = '<style type="text/css" scoped>';
            
                $fcolor = get_option('ut_accentcolor' , '#F1C40F');
            
                /* fallback colors */
                if( $shape != 'normal' && empty( $background ) ) {
                    $fcolor      = '#FFF';
                    $background = get_option('ut_accentcolor' , '#F1C40F');
                }
                
                $color = !empty( $color ) ? $color : $fcolor;
            
                if( $background && $shape != 'normal' ) {
                    $css_style .= '#' . $id . ' .ut-service-icon.ut-service-icon-round { background: ' . $background . '; }';
                    $css_style .= '#' . $id . ' .ut-service-icon.ut-service-icon-square { background: ' . $background . '; }';
                    $css_style .= '#' . $id . ' .ut-service-icon.ut-service-icon-rounded { background: ' . $background . '; }';
                }            
            
                if( $headline_color ) {
                    $css_style .= '#' . $id . ' .ut-service-column h3 { color: ' . $headline_color . '; }';  
                }
                
                if( $text_color ) {
                    $css_style .= '#' . $id . ' .ut-service-column p { color: ' . $text_color . '; }';     
                }                
                
                if( $headline_margin_bottom ) {
                    $css_style .= '#' . $id . ' .ut-service-column p { margin-top: ' . $headline_margin_bottom  . '; }';
                }
                
                if( $link_color ) {
                    $css_style .= '#' . $id . ' .ut-service-column a.ut-service-column-link { color: ' . $link_color . '; }';    
                }

                if( $link_hover_color ) {
                    $css_style .= '#' . $id . ' .ut-service-column a.ut-service-column-link:hover { color: ' . $link_hover_color . '; }';
                    $css_style .= '#' . $id . ' .ut-service-column a.ut-service-column-link:active { color: ' . $link_hover_color . '; }'; 
                    $css_style .= '#' . $id . ' .ut-service-column a.ut-service-column-link:focus { color: ' . $link_hover_color . '; }';    
                }
                
                if( $link_icon_color ) {
                    $css_style .= '#' . $id . ' .ut-service-column a.ut-service-column-link i { color: ' . $link_icon_color . '; }'; 
                }
            
                if( $link_icon_hover_color ) {
                    $css_style .= '#' . $id . ' .ut-service-column a.ut-service-column-link:hover i { color: ' . $link_icon_hover_color . '; }';
                    $css_style .= '#' . $id . ' .ut-service-column a.ut-service-column-link:active i { color: ' . $link_icon_hover_color . '; }'; 
                    $css_style .= '#' . $id . ' .ut-service-column a.ut-service-column-link:focus i { color: ' . $link_icon_hover_color . '; }'; 
                }
            
                if( $link_text_transform ) {
                    $css_style .= '#' . $id . ' .ut-service-column a.ut-service-column-link { text-transform: ' . $link_text_transform . '; }';    
                }

                if( $link_font_weight ) {
                    $css_style .= '#' . $id . ' .ut-service-column a.ut-service-column-link { font-weight: ' . $link_font_weight . '; }';    
                }
            
            $css_style .= '</style>';
            
            /* align */
            $talign = ( $align == 'right' ) ? 'style="text-align:right;"' : '';
            $align  = ( $align == 'right' ) ? 'ut-si-right' : '';            
            
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
            
            $output .= '<div id="' . $id . '" ' . $attributes . ' class="' . implode(' ', $classes ) . '" ' . $margin_bottom . '>';
                
                if( $image_icon ) {

                    $output .= '<figure class="ut-service-icon ut-service-icon-' . $size . ' ut-service-icon-' . $shape . ' ut-custom-icon ' . $align . '">';

                        $output .= '<img alt="' . ( !empty($headline) ? $headline : 'icon' ) . '" src="' . esc_url( $icon ) . '">';                        

                    $output .= '</figure>';

                } elseif( !empty( $icon ) ) { 

                    $output .= '<figure class="ut-service-icon ut-service-icon-' . $size . ' ut-service-icon-' . $shape . ' ' . $align . '">';

                        $output .= '<i style="color: ' . $color . ';" class="fa ' . $icon . '"></i>';

                    $output .= '</figure>';

                }                    
                
                $output .= '<div class="ut-service-column ut-service-column-horiz" ' . $talign . '>';
                    
                    if( !empty( $headline ) ) {
                        $output .= '<h3>' . $headline . '</h3>';
                    }
                    
                    if( !empty( $content ) ) {
                        $output .= '<p>' . do_shortcode( $content ) . '</p>';
                    }
            
                    if( function_exists('vc_build_link') && $link ) {
                
                        $link = vc_build_link( $link );
                        
                        $target = !empty( $link['target'] ) ? $link['target'] : '_self';
                        $title  = !empty( $link['title'] )  ? $link['title'] : '';
                        $rel    = !empty( $link['rel'] )    ? 'rel="' . esc_attr( trim( $link['rel'] ) ) . '"' : '';
                        $link   = !empty( $link['url'] )    ? $link['url'] : '';
                        
                        $link_custom_icon = false;
                        $link_custom_classes = array();
                        
                        // icon settings
                        if( $link_icon_type == 'bklynicons' && !empty( $link_icon_bklyn ) ) {

                            $link_custom_icon = $link_icon_bklyn;

                        } else {

                            if( strpos( $link_icon_fontawesome, 'fa fa-' ) === false ) {

                                $link_custom_icon = str_replace('fa-', 'fa fa-', $link_icon_fontawesome );     

                            } else {

                                $link_custom_icon = $link_icon_fontawesome;

                            }

                        }
                        
                        if( $link_icon == 'yes' ) {
                            
                            $link_custom_classes[] = 'ut-service-column-link-icon-' . $link_icon_position;
                            
                            if( $link_icon_animation == 'yes' ) {
                                $link_custom_classes[] = 'ut-service-column-link-with-animation';
                            }
                                
                        }
                        
                        if( !empty( $link ) ) {                                                        
                            
                            $output .= '<a class="ut-service-column-link ' . implode(" ", $link_custom_classes ) . '" title="' . esc_attr( $title ) . '" href="' . esc_url( $link ) . '" target="' . esc_attr( $target ) . '" ' . $rel . '>';
                            
                            if( $link_icon == 'yes' && $link_custom_icon && $link_icon_position == 'before' ) {

                                $output .= '<i class="' . $link_custom_icon . '"></i>';    

                            }
                            
                            $output .= $title;
                            
                            if( $link_icon == 'yes' && $link_custom_icon && $link_icon_position == 'after' ) {

                                $output .= '<i class="' . $link_custom_icon . '"></i>';    

                            }
                            
                            $output .= '</a>';
                            
                            
                        }
                        
                    }
            
                $output .= '</div>';
            
            $output .= '</div>';
            
            if( defined( 'WPB_VC_VERSION' ) ) { 
                
                return '<div class="wpb_content_element ' . apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->shortcode, $atts ) . '">' . $output . '</div>'; 
            
            }
                
            return $output;
        
        }
            
    }

}

new UT_Service_Column;

if( class_exists('WPBakeryShortCode') ) {

    class WPBakeryShortCode_UT_Service_Column extends WPBakeryShortCode {
        
        /*protected function outputTitle( $title ) {
            
            $icon = $this->settings( 'icon' );
            return '<h4 class="wpb_element_title">' . ( ! empty( $headline ) ? ' ' . $headline : '' ) . '"></h4>';	
            
        }*/
        
    }

}