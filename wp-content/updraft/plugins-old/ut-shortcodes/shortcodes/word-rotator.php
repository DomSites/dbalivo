<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Word_rotator' ) ) {
	
    class UT_Word_rotator {
        
        private $shortcode;
            
        function __construct() {
			
            /* shortcode base */
            $this->shortcode = 'ut_rotate_words';
            
            add_action( 'init', array( $this, 'ut_map_shortcode' ) );
            add_shortcode( $this->shortcode, array( $this, 'ut_create_shortcode' ) );	
            
		}
        
        function ut_map_shortcode( $atts, $content = NULL ) {
            
            if( function_exists( 'vc_map' ) ) {
                                
                vc_map(
                    array(
                        'name'            => esc_html__( 'Word Rotator', 'ut_shortcodes' ),
                        'base'            => $this->shortcode,
                        'category'        => 'Information',
                        'icon'            => UT_SHORTCODES_URL . '/admin/img/vc_icons/word-rotator.png',
                        'class'           => 'ut-vc-icon-module ut-information-module', 
                        'content_element' => true,
                        'params'          => array(
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Rotation Time', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'value in miliseconds, eg "3000"', 'ut_shortcodes'),
                                'param_name'        => 'timer',
                                'group'             => 'General'
                            ),
                            array(
                                'type'              => 'exploded_textarea',
                                'heading'           => esc_html__( 'Words', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'Each new line will be separate Word.', 'ut_shortcodes'),
                                'admin_label'       => true,
                                'param_name'        => 'content',
                                'group'             => 'General'
                            ),
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Font Size', 'ut_shortcodes' ),
                                'description'       => esc_html__( '(optional) value in px or em, eg "20px" or "6em"' , 'ut_shortcodes' ),
                                'param_name'        => 'font_size',
                                'group'             => 'General'
                            ),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Font Color', 'ut_shortcodes' ),
								'param_name'        => 'font_color',
								'group'             => 'General'
						  	),
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Display', 'ut_shortcodes' ),
								'param_name'        => 'display',
								'group'             => 'General',
                                'value'             => array(
                                    esc_html__( 'Inline' , 'ut_shortcodes' ) => 'inline',
                                    esc_html__( 'Block'  , 'ut_shortcodes' ) => 'block',
                                ),
						  	), 
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Text Align', 'ut_shortcodes' ),
								'param_name'        => 'text_align',
								'group'             => 'General',
                                'dependency' => array(
                                    'element' => 'display',
                                    'value'   => array( 'block' ),
                                ),
                                'value'             => array(
                                    esc_html__( 'left'   , 'ut_shortcodes' ) => 'left',
                                    esc_html__( 'center' , 'ut_shortcodes' ) => 'center',
                                    esc_html__( 'right' , 'ut_shortcodes' ) => 'right',
                                ),
						  	),                            
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
                'timer'      => 2000,
                'font_size'  => '',
                'font_color' => '',
                'text_align' => '',
                'display'    => '',
                'css'        => '',
                'class'      => ''
            ), $atts ) ); 
            
            $classes    = array();
            $classes[]  = $class;
            
            /* split up words */
            $words = explode( ',' , $content );
            
            /* final rotator word variable*/
            $rotator_words = '';
            
            /* loop through word array and concatinate final string*/
            foreach( $words as $key => $word ) {                
                $rotator_words .= '\'' . trim(  addslashes( $word ) )  . '\',';                
            }
            
            /* cut of last comma */ 
            $rotator_words = substr($rotator_words,0,-1);
            
            /* unique ID */
            $id = uniqid("ut_word_rotator_");
            
            $css = '';
                
            if( $font_size ) {
                $css .= '#' . $id . ' span.ut-word-rotator { font-size: ' . $font_size . '; }';
            }    
            
            if( $font_color ) {
                $css .= '#' . $id . ' span.ut-word-rotator { color: ' . $font_color . ' !important; }';
            }
            
            if( $text_align ) {
                $css .= '#' . $id . ' span.ut-word-rotator { text-align: ' . $text_align . '; }';
            }
            
            if( $display ) {
                $css .= '#' . $id . ' span.ut-word-rotator { display: ' . $display . '; }';
            }          
            
            
            /* needed javascript */
            $script = '
            <script type="text/javascript">
            /* <![CDATA[ */
            
            (function($){
            
                "use strict";
                
                var ut_word_rotator = function() {
                    
                    var ut_rotator_words = [
                       ' . $rotator_words . '
                    ] ,
                    counter = 0;                
                    
                    setInterval(function() {
                    $("#' . $id . ' .ut-word-rotator").fadeOut(function(){
                            $(this).html(ut_rotator_words[counter=(counter+1)%ut_rotator_words.length]).fadeIn();
                        });
                    }, ' . $timer . ');
                }
                
                ut_word_rotator();
                
            })(jQuery);
            
            /* ]]> */
            </script>';
            
            /* start output */
            $output = '';
                        
            /* attach js */
            $output .= $script;
            
            /* attach css */
            if( !empty( $css ) ) {
                $output .= ut_minify_inline_css( '<style type="text/css" scoped>' . $css . '</style>' );
            }
            
            $output .= '<span class="' . implode( ' ', $classes ) . ' ut-word-rotator">' . $words[0] . '</span>';
                
            return '<div id="' . $id . '" class="wpb_content_element">' . $output . '</div>';                             
            
        
        }
            
    }

}

new UT_Word_rotator;