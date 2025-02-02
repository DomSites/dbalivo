<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Button' ) ) {
	
    class UT_Button {
        
        function __construct() {
			
            add_action( 'init', array( $this, 'ut_map_shortcode' ) );
            add_shortcode( 'ut_button', array( $this, 'ut_create_shortcode' ) );	
            
		}
        
        function ut_map_shortcode( $atts, $content = NULL ) {
            
            if( function_exists( 'vc_map' ) ) {
                                
                vc_map(
                    array(
                        'name'            => esc_html__( 'Button (old)', 'ut_shortcodes' ),
                        'base'            => 'ut_button',
                        'deprecated'      => true,
                        'icon'            => UT_SHORTCODES_URL . '/admin/img/vc_icons/button.png',
                        'class'           => 'ut-vc-icon-module ut-deprecated-module',
                        'content_element' => true,
                        'params' => array(
                            array(
								'type'        => 'dropdown',
								'heading'     => esc_html__( 'Button Size', 'ut_shortcodes' ),
								'param_name'  => 'size',
								'group'       => 'General',
                                'value'       => array(
                                    esc_html__( 'Small', 'ut_shortcodes' )  => 'small',
                                    esc_html__( 'Medium', 'ut_shortcodes' ) => 'medium',
                                    esc_html__( 'Large', 'ut_shortcodes' )  => 'large',
                                ),
						  	),
                            array(
								'type'        => 'dropdown',
								'class'       => '',
								'heading'     => esc_html__( 'Button Skin', 'ut_shortcodes' ),
								'param_name'  => 'color',
								'group'       => 'General',
                                'value'       => array(
                                    esc_html__( 'Red', 'ut_shortcodes' )          => 'red',
                                    esc_html__( 'Turquoise', 'ut_shortcodes' )    => 'turquoise',
                                    esc_html__( 'Green', 'ut_shortcodes' )        => 'green',
                                    esc_html__( 'Blue', 'ut_shortcodes' )         => 'blue',
                                    esc_html__( 'Mid Blue', 'ut_shortcodes' )     => 'mid-blue',
                                    esc_html__( 'Yellow', 'ut_shortcodes' )       => 'yellow',
                                    esc_html__( 'Purple', 'ut_shortcodes' )       => 'purple',
                                    esc_html__( 'Grey', 'ut_shortcodes' )         => 'grey',
                                    esc_html__( 'Orange', 'ut_shortcodes' )       => 'orange',
                                    esc_html__( 'Theme Button', 'ut_shortcodes' ) => 'theme-btn',
                                    esc_html__( 'Dark', 'ut_shortcodes' )         => 'dark' 
                                ),
						  	), 
                            array(
								'type'        => 'dropdown',
								'heading'     => esc_html__( 'Button Shape', 'ut_shortcodes' ),
								'param_name'  => 'shape',
								'group'       => 'General',
                                'value'       => array(
                                    esc_html__( 'Normal', 'ut_shortcodes' ) => 'normal',
                                    esc_html__( 'Round', 'ut_shortcodes' )  => 'round',
                                ),
						  	),                           
                            array(
								'type'        => 'textfield',
								'heading'     => esc_html__( 'Button Link', 'ut_shortcodes' ),
								'param_name'  => 'link',
								'group'       => 'General'
						  	),
                            array(
								'type'        => 'dropdown',
								'heading'     => esc_html__( 'Button Link Target', 'ut_shortcodes' ),
								'param_name'  => 'target',
								'group'       => 'General',
                                'value'       => array(
                                    esc_html__( 'blank', 'ut_shortcodes' ) => '_blank',
                                    esc_html__( 'self', 'ut_shortcodes' ) => '_self',
                                ),
						  	),
                            array(
                                'type'        => 'textfield',
                                'heading'     => __( 'Button Text', 'ut_shortcodes' ),
                                'param_name'  => 'content',
                                'group'       => 'General'
                            ),
                            array(
                                'type'        => 'textfield',
                                'heading'     => esc_html__( 'Button Title', 'ut_shortcodes' ),
                                'description' => esc_html__( '', 'ut_shortcodes' ),
                                'param_name'  => 'title',
                                'group'       => 'General'
                            ),
                            array(
								'type'        => 'textfield',
								'class'       => '',
								'heading'     => esc_html__( 'Class', 'ut_shortcodes' ),
                                'description' => esc_html__( '( optional )', 'ut_shortcodes' ),
								'param_name'  => 'class',
								'group'       => 'General'
						  	),
                            
                        )
                        
                    )
                
                ); /* end mapping */
                
            } 
        
        }
        
        function ut_create_shortcode( $atts, $content = NULL ) {
            
            extract( shortcode_atts( array (
                'link'      =>  '#',
                'color'     =>  '',
                'class'     =>  '',
                'size'      =>  'small',
                'target'    =>  '_self',
                'title'     =>  '',
                'shape'     =>  ''
            ), $atts ) ); 
            
            /* start output */
            $output = '';
        
            $output .= '<a title="' . esc_attr( $title ) . '" target="' . $target . '" class="ut-btn ' . $class . ' ' . $color . ' ' . $size . ' ' . $shape . '" href="' . esc_url( $link ) . '">';
                $output .= $content;
            $output .= '</a>';
                
            return $output;
        
        }
            
    }

}

new UT_Button;