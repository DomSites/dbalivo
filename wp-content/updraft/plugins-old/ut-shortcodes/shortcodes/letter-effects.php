<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Letter_Effects' ) ) {
	
    class UT_Letter_Effects {
        
        private $shortcode;
        private $add_script;  
        
        function __construct() {
			
            /* shortcode base */
            $this->shortcode = 'ut_letter_effects';
            
            add_action( 'init', array( $this, 'ut_map_shortcode' ) );
            add_shortcode( $this->shortcode, array( $this, 'ut_create_shortcode' ) );	
            
            /* scripts */
            add_action( 'init', array( $this, 'register_scripts' ) );
            add_action( 'wp_footer', array( $this, 'enqueue_scripts' ) );
            
		}
        
        function ut_map_shortcode( $atts, $content = NULL ) {
            
            if( function_exists( 'vc_map' ) ) {
                                
                vc_map(
                    array(
                        'name'            => esc_html__( 'Letter Effects Module', 'ut_shortcodes' ),
                        'base'            => $this->shortcode,
                        'icon'            => UT_SHORTCODES_URL . '/admin/img/vc_icons/default.png',
                        'category'        => 'Information',
                        'class'           => 'ut-information-module',
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
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Effect', 'ut_shortcodes' ),
								'param_name'        => 'effect',
								'group'             => 'General',
                                'value'             => array(
                                    esc_html__( 'Franklin' , 'ut_shortcodes' ) => 'fx1',
                                    esc_html__( 'Lawrence' , 'ut_shortcodes' ) => 'fx2',
                                    esc_html__( 'Orange'   , 'ut_shortcodes' ) => 'fx3',
                                    esc_html__( 'Richmond' , 'ut_shortcodes' ) => 'fx4',
                                    esc_html__( 'Abbey'    , 'ut_shortcodes' ) => 'fx5',
                                    esc_html__( 'Alice'    , 'ut_shortcodes' ) => 'fx6',
                                    esc_html__( 'Barberry' , 'ut_shortcodes' ) => 'fx7',
                                    esc_html__( 'Cameron'  , 'ut_shortcodes' ) => 'fx8',
                                    esc_html__( 'Coffey'   , 'ut_shortcodes' ) => 'fx9',
                                    esc_html__( 'Dunham'   , 'ut_shortcodes' ) => 'fx10',
                                    esc_html__( 'Denton '  , 'ut_shortcodes' ) => 'fx11',
                                    esc_html__( 'Blake'    , 'ut_shortcodes' ) => 'fx12',
                                    esc_html__( 'Elm'      , 'ut_shortcodes' ) => 'fx13',
                                    esc_html__( 'Elton'    , 'ut_shortcodes' ) => 'fx14',
                                    esc_html__( 'Fillmore' , 'ut_shortcodes' ) => 'fx15',
                                    esc_html__( 'Lancaster', 'ut_shortcodes' ) => 'fx16',
                                    esc_html__( 'Old Dock' , 'ut_shortcodes' ) => 'fx17',
                                    esc_html__( 'Rock'     , 'ut_shortcodes' ) => 'fx18',
                                ),                               
						  	),
                            
                            // Title Font Settings
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Choose Font Source', 'ut_shortcodes' ),
                                'param_name'        => 'font_source',
                                'group'             => 'Font Settings',
                                'value'             => array(
                                    esc_html__( 'Theme Default', 'ut_shortcodes' )  => 'default',
                                    esc_html__( 'Web Safe Fonts', 'ut_shortcodes' ) => 'websafe',
                                    esc_html__( 'Google Font', 'ut_shortcodes' )    => 'google'                                            
                                ),                                                                
                            ),
                            array(
                                'type'              => 'google_fonts',
                                'param_name'        => 'google_fonts',
                                'value'             => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
                                'group'             => 'Font Settings',
                                'settings'          => array(
                                    'fields' => array(
                                        'font_family_description' => __( 'Select font family.', 'ut_shortcodes' ),
                                        'font_style_description'  => __( 'Select font styling.', 'ut_shortcodes' ),
                                    ),
                                ),
                                'dependency'        => array(
                                    'element'           => 'font_source',
                                    'value'             => 'google',
                                ),
                            ),
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Websafe Fonts', 'ut_shortcodes' ),
                                'param_name'        => 'websafe_fonts',
                                'group'             => 'Font Settings',
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
                                'dependency'        => array(
                                    'element'           => 'font_source',
                                    'value'             => 'websafe',
                                ),
                                
                            ),
                            array(
								'type'              => 'range_slider',
								'heading'           => esc_html__( 'Font Size', 'ut_shortcodes' ),
								'param_name'        => 'font_size',
                                'group'             => 'Font Settings',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'value'             => array(
                                    'min'   => '8',
                                    'max'   => '200',
                                    'step'  => '1',
                                    'unit'  => 'px'
                                ),								
						  	),
                            array(
								'type'              => 'range_slider',
								'heading'           => esc_html__( 'Line_height', 'ut_shortcodes' ),
								'param_name'        => 'line_height',
                                'group'             => 'Font Settings',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'value'             => array(
                                    'default'   => '150',
                                    'min'       => '80',
                                    'max'       => '300',
                                    'step'      => '5',
                                    'unit'      => '%'
                                ),
								
						  	),
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Title Text Transform', 'ut_shortcodes' ),
                                'description'       => esc_html__( '(optional)' , 'ut_shortcodes' ),
								'param_name'        => 'text_transform',
								'group'             => 'Font Settings',
                                'value'             => array(
                                    esc_html__( 'Select Text Transform' , 'ut_shortcodes' ) => '',
                                    esc_html__( 'capitalize' , 'ut_shortcodes' )            => 'capitalize',
                                    esc_html__( 'uppercase', 'ut_shortcodes' )              => 'uppercase',
                                    esc_html__( 'lowercase', 'ut_shortcodes' )              => 'lowercase'                                    
                                ),
						  	),
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Font Weight', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'Please keep in mind, that the selected font needs to support the font weight.', 'ut_shortcodes' ),
								'param_name'        => 'font_weight',
								'group'             => 'Font Settings',
                                'value'             => array(
                                    esc_html__( 'Select Font Weight' , 'ut_shortcodes' ) => '',
                                    esc_html__( 'lighter' , 'ut_shortcodes' )  => 'lighter',
                                    esc_html__( 'normal' , 'ut_shortcodes' ) => 'normal',
                                    esc_html__( 'bold' , 'ut_shortcodes' )   => 'bold',
                                    esc_html__( 'bolder' , 'ut_shortcodes' ) => 'bolder',
                                    esc_html__( '100' , 'ut_shortcodes' )    => '100',
                                    esc_html__( '200' , 'ut_shortcodes' )    => '200',
                                    esc_html__( '300' , 'ut_shortcodes' )    => '300',
                                    esc_html__( '400' , 'ut_shortcodes' )    => '400',
                                    esc_html__( '500' , 'ut_shortcodes' )    => '500',
                                    esc_html__( '600' , 'ut_shortcodes' )    => '600',
                                    esc_html__( '700' , 'ut_shortcodes' )    => '700',
                                    esc_html__( '800' , 'ut_shortcodes' )    => '800',
                                    esc_html__( '900' , 'ut_shortcodes' )    => '900',
                                ),
                                'dependency'        => array(
                                    'element'           => 'font_source',
                                    'value'             => array('websafe','default'),
                                ),                                
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
                            
                            
                            
                            /* css editor */
                            array(
                                'type'              => 'css_editor',
                                'param_name'        => 'css',
                                'group'             => esc_html__( 'Design Options', 'ut_shortcodes' ),
                            )                            
                            
                        )                        
                        
                    )
                
                ); // end mapping
                
            } 
        
        }
        
        function ut_create_shortcode( $atts, $content = NULL ) {
            
            /* enqueue scripts */
            $this->add_script = true;
            
            extract( shortcode_atts( array (
                
                'timer'          => 2000,
                'effect'         => 'fx10',
                
                // Font Settings
                'font_size'      => '',
                'font_weight'    => '',
                'line_height'    => '',
                'text_transform' => '',
                'font_source'    => 'theme',
                'google_fonts'   => '',
                'websafe_fonts'  => '',
                
                
                

                'font_color'    => '',
                'text_align'    => '',
                
                
                
                
                
                'class'         => '',
                'title_class'   => '',
                'css'           => ''
                
            ), $atts ) ); 
            
            // classes
            $classes    = array('ut-word-effects');
            $classes[]  = $class;
            
            // animation attributes 
            $attributes = array(); 
            
            
            
            
            
            $ut_font_css = false;
            
            /* initialize google font */
            if( $font_source && $font_source == 'google' ) {
                
                 $ut_google_font     = new UT_VC_Google_Fonts( $atts, 'google_fonts', $this->shortcode );
                 $ut_font_css        = $ut_google_font->get_google_fonts_css_styles();
                        
            }
            
            $ut_font_css = is_array( $ut_font_css ) ? implode( '', $ut_font_css ) : $ut_font_css;
            
            // unique ID
            $id = uniqid("ut_word_effects_");
            
            ob_start(); ?>
            
                <style type="text/css" scoped>
                    
                    <?php if( $font_source && $font_source == 'websafe' ) : ?>
                    
                    
                    
                    
                    <?php endif; ?>
                    
                    
                    <?php if( $ut_font_css ) : ?>
                        
                        #<?php echo $id; ?> h1 { 
                            <?php echo $ut_font_css; ?>                     
                        }
                    
                    <?php endif; ?>
                                        
                    <?php if( $line_height ) : ?>
                        
                        #<?php echo $id; ?> h1 { 
                            font-size: <?php echo $line_height; ?>px;                     
                        }
                        
                    <?php endif; ?>
                        
                    
                    <?php if( $font_color ) : ?>
                        
                        #<?php echo $id; ?> .title { color: <?php echo $font_color; ?> !important; }';
                        
                    <?php endif; ?>
                    
                    <?php if( $text_align ) : ?>
                        
                        #<?php echo $id; ?> .ut-word-effect-slide { 
                            -webkit-align-items: <?php echo $text_align; ?>;
                                 -ms-flex-align: <?php echo $text_align; ?>;
                                    align-items: <?php echo $text_align; ?>;
                            
                            -webkit-justify-content: <?php echo $text_align; ?>;
                                -ms-justify-content: <?php echo $text_align; ?>;        
                                    justify-content: <?php echo $text_align; ?>;
                        }
                        
                    <?php endif; ?>
                
                </style>
            
            <?php
            
            $css = ob_get_clean();
            
            /* start output */
            $output = '';
            
            /* attach css */
            if( !empty( $css ) ) {
                $output .= ut_minify_inline_css( $css );
            }
            
            
            
            
            //@todo in viewport
            
            /* split up words */
            $words = explode( '+' , $content );
            
            if( !empty( $words ) && is_array( $words ) ) {
                
                $count = 1;
                    
                $output .= '<div id="' . $id . '" class="' . implode( ' ', $classes ) . '" data-effect="' . esc_attr( $effect ) . '" data-timer="' . esc_attr( $timer ) . '">';
                
                    foreach( $words as $key => $word ) {                
                                 
                        $output .= '<div class="ut-word-effect-slide ' . ( $count == 1 ? 'slide--current' : '' ) . '"><h1 data-maxfont="' . esc_attr( $font_size ) . '" class="ut-letter-effect letter-effect ' . $title_class . '">' . trim( $word ) . '</h1></div>';                
                        
                        $count++;
                                
                    }
                
                $output .= '</div>';
            
            }
                                        
            return $output;
        
        }
        
        function register_scripts() {
            
            $min = NULL;
        
            if( !WP_DEBUG ){
                $min = '.min';
            }
            
            wp_register_script( 
                'ut-anime', 
                plugins_url('../js/plugins/letter-effects/anime.min.js', __FILE__), 
                array('jquery'), 
                UT_SHORTCODES_VERSION, 
                true
            );
            
            wp_register_script( 
                'ut-charming', 
                plugins_url('../js/plugins/letter-effects/charming.min.js', __FILE__), 
                array('jquery'), 
                UT_SHORTCODES_VERSION, 
                true
            );
            
            wp_register_script( 
                'ut-letter-effects', 
                plugins_url('../js/plugins/letter-effects/textfx' . $min . '.js', __FILE__), 
                array('jquery'), 
                UT_SHORTCODES_VERSION, 
                true
            );
             
        
        }
        
        function enqueue_scripts() {
            
            if( !$this->add_script ) {
                return;
            }
            
            wp_print_scripts('ut-charming');
            wp_print_scripts('ut-anime');
            wp_print_scripts('ut-letter-effects');
        
        }
            
    }

}

new UT_Letter_Effects;