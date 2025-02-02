<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Instagram_Gallery' ) ) {
	
    class UT_Instagram_Gallery {
        
        public $shortcode;
        public $add_script;
        public $feed_items;
        
        function __construct() {
			
            /* shortcode base */
            $this->shortcode = 'ut_instagram_gallery';
            
            add_action( 'init', array( $this, 'ut_map_shortcode' ) );
            add_shortcode( $this->shortcode, array( $this, 'ut_create_shortcode' ) );	
            
            add_action( 'init', array( $this, 'register_scripts' ) );
            add_action( 'wp_footer', array( $this, 'print_scripts' ) );
            
		}
        
        function register_scripts(){
            
            $min = NULL;
        
            if( !WP_DEBUG ){
                $min = '.min';
            }
            
            wp_register_script(
                'ut-lazy',
                UT_SHORTCODES_URL . 'js/jquery.lazy' . $min . '.js', 
                array('jquery'),
                '1.8.2', 
                true
            );            
            
        }
        
        function print_scripts(){
            
            if( !$this->add_script ) {
                return;
            }
                        
            wp_enqueue_script('ut-lazy');            
            
        }
        
        function ut_map_shortcode( $atts, $content = NULL ) {
            
            if( function_exists( 'vc_map' ) ) {
                                
                vc_map(
                    array(
                        'name'            => esc_html__( 'Instagram Gallery', 'ut_shortcodes' ),
                        'base'            => $this->shortcode,
                        'category'        => 'Media',
                        'icon'            => UT_SHORTCODES_URL . '/admin/img/vc_icons/image-gallery.png',
                        'class'           => 'ut-vc-icon-module ut-media-module',
                        'content_element' => true,
                        'params'          => array(
                            
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Instagram Username', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'Please enter your Instagram Username.', 'ut_shortcodes' ),
                                'group'             => 'Gallery',
                                'param_name'        => 'instagram_user',
                                'admin_label'       => true
                            ),
                            
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Cache Instagram Feeds?', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'This option will activate a cache which has a lifetime of 1 hour and caches all your feeds inside the WordPress Database. Turning this option on is recommended for production sites, since it increases your page loading speed.', 'ut_shortcodes' ), 
                                'param_name'        => 'cache',
                                'group'             => 'Gallery',
                                'value'             => array(
                                    esc_html__( 'no, thanks!' , 'ut_shortcodes' )  => 'off',
                                    esc_html__( 'yes, please!' , 'ut_shortcodes' ) => 'on',
                                )
                            ),
                            
                            array(
                                'type'              => 'range_slider',
                                'heading'           => esc_html__( 'Instagram Images to load?', 'ut_shortcodes' ),
                                'param_name'        => 'count',
                                'group'             => 'Gallery',
                                'value'             => array(
                                    'default' => '12',
                                    'min'     => '1',
                                    'max'     => '20',
                                    'step'    => '1',
                                    'unit'    => ''
                                ),                                
                            ),
                    
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Instagram Items per row.', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'Select your desired amount of images per row.', 'ut_shortcodes' ),
                                'param_name'        => 'grid',
                                'group'             => 'Gallery',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'value'             => array(
                                    esc_html__( '1' , 'ut_shortcodes' ) => '1',
                                    esc_html__( '2' , 'ut_shortcodes' ) => '2',
                                    esc_html__( '3' , 'ut_shortcodes' ) => '3',
                                    esc_html__( '4' , 'ut_shortcodes' ) => '4',
                                    esc_html__( '5' , 'ut_shortcodes' ) => '5',
                                )
                            ),
                            
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Gallery Items Gap.', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'Select gap between gallery images.', 'ut_shortcodes' ),
                                'param_name'        => 'gap',
                                'group'             => 'Gallery',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'value'             => array(
                                    esc_html__( '0px'  , 'ut_shortcodes' ) => '0',
                                    esc_html__( '5px'  , 'ut_shortcodes' ) => '5',
                                    esc_html__( '10px' , 'ut_shortcodes' ) => '10',
                                    esc_html__( '15px' , 'ut_shortcodes' ) => '15',
                                    esc_html__( '20px' , 'ut_shortcodes' ) => '20',
                                    esc_html__( '25px' , 'ut_shortcodes' ) => '25',
                                    esc_html__( '30px' , 'ut_shortcodes' ) => '30',
                                    esc_html__( '35px' , 'ut_shortcodes' ) => '35',
                                    esc_html__( '40px' , 'ut_shortcodes' ) => '40',
                                )
                            ),
                            
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Open Instagram Images in Lightbox?', 'ut_shortcodes' ),
                                'param_name'        => 'lightbox',
                                'group'             => 'Gallery',
                                'value'             => array(
                                    esc_html__( 'yes', 'ut_shortcodes' ) => 'yes',
                                    esc_html__( 'no', 'ut_shortcodes' ) => 'no',
                                )
                            ),
                                                
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Show Instagram Caption On Hover?', 'ut_shortcodes' ),
                                'param_name'        => 'caption',
                                'group'             => 'Gallery',
                                'value'             => array(
                                    esc_html__( 'no', 'ut_shortcodes' ) => 'no',
                                    esc_html__( 'yes', 'ut_shortcodes' ) => 'yes',                                    
                                ),                                
                            ),  
                    
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Add Load More?', 'ut_shortcodes' ),
                                'description'       => esc_html__( '', 'ut_shortcodes' ),
                                'param_name'        => 'loader',
                                'group'             => 'Gallery',
                                'value'             => array(
                                    esc_html__( 'no, thanks!', 'ut_shortcodes' ) => '',
                                    esc_html__( 'yes, please!', 'ut_shortcodes' ) => 'true',                                    
                                ),
                            ),
                    
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Spinner Loader Color', 'ut_shortcodes' ),
								'param_name'        => 'loader_color',
								'group'             => 'Gallery',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'dependency'        => array(
                                    'element' => 'loader',
                                    'value'   => 'true',
                                )
						  	),
                        
                            
                    
                    
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Deactivate ALT tag?', 'ut_shortcodes' ),
                                'param_name'        => 'alt',
                                'group'             => 'Gallery',
                                'value'             => array(
                                    esc_html__( 'yes, please!' , 'ut_shortcodes' ) => 'on',
                                    esc_html__( 'no, thanks!' , 'ut_shortcodes' )  => 'off',                                    
                                )
                            ),
                    
                    
                    
                    
                            // Image Animation
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Animate Images?', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'Animate each element inside your gallery with an awesome animation effect.', 'ut_shortcodes' ),
                                'param_name'        => 'animate',
                                'group'             => 'Animation',
                                'edit_field_class'  => 'vc_col-sm-12',
                                'value'             => array(
                                    esc_html__( 'yes'  , 'ut_shortcodes' ) => 'true',
                                    esc_html__( 'no', 'ut_shortcodes' ) => 'false'
                                ),
                            ),
                            
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Animate Images on Tablet?', 'ut_shortcodes' ),
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
                                'heading'           => esc_html__( 'Animate Images on Mobile?', 'ut_shortcodes' ),
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
                                'heading'           => esc_html__( 'Animate Once?', 'unitedthemes' ),
                                'description'       => esc_html__( 'Animate only once when reaching the viewport, animate everytime when reaching the viewport or make the animation infinite? By default the animation executes everytime when the element becomes visible in viewport, means when leaving the viewport the animation will be reseted and starts again when reaching the viewport again. By setting this option to yes, the animation executes exactly once. By setting it to infinite, the animation loops all the time, no matter if the element is in viewport or not.', 'unitedthemes' ),
                                'param_name'        => 'animate_once',
                                'group'             => 'Animation',
                                'value'             => array(
                                    esc_html__( 'no' , 'unitedthemes' )      => 'no',
                                    esc_html__( 'yes', 'unitedthemes' )      => 'yes',
                                    esc_html__( 'infinite', 'unitedthemes' ) => 'infinite',
                                ),
                                'dependency'        => array(
                                    'element' => 'animate',
                                    'value'   => 'true',
                                )
                            ), 
                            
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Delay Animation?', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'Animate Images inside the Gallery one by one.', 'ut_shortcodes' ),
                                'param_name'        => 'delay_animation',
                                'group'             => 'Animation',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'value'             => array(
                                    esc_html__( 'no', 'ut_shortcodes' ) => 'false',
                                    esc_html__( 'yes'  , 'ut_shortcodes' ) => 'true'                                                                        
                                ),
                                'dependency'        => array(
                                    'element' => 'animate',
                                    'value'   => 'true'
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
                                    'element' => 'delay_animation',
                                    'value'   => 'true',
                                )
                            ),                            
                            
                            array(
                                'type'              => 'animation_style',
                                'heading'           => __( 'Animation Effect', 'ut_shortcodes' ),
                                'description'       => __( 'Select initial loading animation for images.', 'ut_shortcodes' ),
                                'group'             => 'Animation',
                                'param_name'        => 'effect',
                                'settings' => array(
                                    'type' => array(
                                        'in',
                                        'other',
                                    ),
                                ),
                                'dependency'        => array(
                                    'element' => 'animate',
                                    'value'   => 'true',
                                )
                                
                            ),
                            
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Caption Text Transform', 'ut_shortcodes' ),
                                'param_name'        => 'caption_transform',
                                'group'             => 'Caption Settings',
                                'value'             => array(
                                    esc_html__( 'Select Text Transform' , 'ut_shortcodes' ) => '',
                                    esc_html__( 'capitalize' , 'ut_shortcodes' ) => 'capitalize',
                                    esc_html__( 'uppercase', 'ut_shortcodes' ) => 'uppercase',
                                    esc_html__( 'lowercase', 'ut_shortcodes' ) => 'lowercase'                                    
                                ),
                                'dependency'        => array(
                                    'element' => 'caption',
                                    'value'   => 'yes',
                                )
                            ),
                            
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Caption Font Size', 'ut_shortcodes' ),
                                'description'       => esc_html__( '(optional) value in px or em, eg "20px"' , 'ut_shortcodes' ),
                                'param_name'        => 'caption_font_size',
                                'group'             => 'Caption Settings',
                                'dependency'        => array(
                                    'element' => 'caption',
                                    'value'   => 'yes',
                                )
                            ),
                    
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Caption Text Color', 'ut_shortcodes' ),
								'param_name'        => 'caption_color',
								'group'             => 'Caption Settings',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'dependency'        => array(
                                    'element' => 'caption',
                                    'value'   => 'yes',
                                )
						  	),
                    
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Caption Background Color', 'ut_shortcodes' ),
								'param_name'        => 'caption_background',
								'group'             => 'Caption Settings',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'dependency'        => array(
                                    'element' => 'caption',
                                    'value'   => 'yes',
                                )
						  	),
                    
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'CSS Class', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'ut_shortcodes' ),
                                'param_name'        => 'class',
                                'group'             => 'Gallery'
                            ),
                            
                            /* css editor */
                            array(
                                'type'              => 'css_editor',
                                'param_name'        => 'css',
                                'group'             => esc_html__( 'Design Options', 'ut_shortcodes' ),
                            )                            
                            
                        )                        
                        
                    )
                
                ); /* end mapping */
                
            } 
        
        }
        
        function ut_create_inline_css( $id, $atts ) {
            
            extract( shortcode_atts( array (
                'animate'            => 'true',
                'effect'             => '',
                'loader_color'       => '',
                'caption_color'      => '',
                'caption_font_size'  => '',
                'caption_background' => '',
                'caption_transform'  => '',
            ), $atts ) );    
            
           $css = '<style type="text/css" scoped>';
                                        
                if( $animate == 'true' && $effect ) {
                
                    $css .= '#' . esc_attr( $id ) . ' .ut-animate-gallery-element { opacity: 0; }';

                }
                
                if( $caption_color ) {
                    $css .= '#' . esc_attr( $id ) . ' .ut-image-gallery-item-caption-title h3 { color: '. $caption_color . '; }';
                }

                if( $caption_background ) {
                    $css .= '#' . esc_attr( $id ) . ' .ut-image-gallery-item:hover .ut-image-gallery-image.ut-animation-done .ut-image-gallery-image-caption { background: ' . $caption_background . '; }';
                }

                if( $caption_transform ) {
                    $css .= '#' . esc_attr( $id ) . ' .ut-image-gallery-item-caption-title h3 { text-transform: '. $caption_transform . '; }';
                }
                
                if( $caption_font_size ) {
                    $css .= '#' . esc_attr( $id ) . ' .ut-image-gallery-item-caption-title h3 { font-size: '. caption_font_size . '; }';
                }
            
                if( $loader_color ) {
                    $css .= '#' . esc_attr( $id ) . ' .sk-fading-circle .sk-circle::before { background-color: '. $loader_color . '; }';                    
                }
            
            
           $css .= '</style>';
            
           return $css;
        
        }
        
        function ut_create_inline_script( $id, $atts ) {
            
            /* no custom js for search excerpts */
            if( is_search() ) {
                return;
            }
            
            extract( shortcode_atts( array (
                'animate'         => 'true',
                'lightbox'        => 'yes',
                'effect'          => '',
                'lazy'            => '',
                'delay_animation' => 'false',
                'delay_timer'     => 200,
            ), $atts ) );
            
            ob_start();
            
            ?>
            
            <script type="text/javascript">
                
                (function($){
                    
                    $(document).ready(function(){
                        
                        <?php if( $lightbox == "yes" ) : ?>
                        
                        if ( $().lightGallery ) {
                            
                            var $<?php echo esc_attr( $id ); ?> = $("#<?php echo esc_attr( $id ); ?>");
                            
                            $<?php echo esc_attr( $id ); ?>.lightGallery({
                                selector: '.ut-vc-instagram-lightbox',
                                exThumbImage: 'data-exthumbimage',
                                hash: false
                            });

                            $(document).ajaxComplete(function() {
                                        
                                /* restart */
                                $<?php echo esc_attr( $id ); ?>.data('lightGallery').destroy(true);                                
                                
                                $<?php echo esc_attr( $id ); ?>.lightGallery({
                                    selector: '.ut-vc-instagram-lightbox',
                                    exThumbImage: 'data-exthumbimage',
                                    hash: false
                                });
                                
                                return false;

                            });            

                        }
                        
                        <?php endif; ?>
                        
                        function get_animated_objects( $all_appeared_elements, effect ) {
                            
                            var counter = 0;
                            
                            $all_appeared_elements.each(function(){
                                        
                                if( $(this).hasClass(effect) ) {

                                    counter++;

                                }

                            });
                            
                            return counter;
                            
                        }
                        
                        <?php if( $animate == 'true' && $effect ) : ?>
                            
                            $("#<?php echo esc_attr( $id ); ?> .ut-animate-gallery-element").appear();
                                                    
                            $(document.body).on('appear', '#<?php echo esc_attr( $id ); ?> .ut-animate-gallery-element', function( event, $all_appeared_elements ) {
                                
                                var $this    = $(this),
                                    effect   = $this.data('effect');
                                
                                if( $this.hasClass('ut-animation-complete') || $this.hasClass('ut-element-is-animating') ) {
                                    return;
                                }
                                
                                if( $this.data('animation-duration') ) {
            
                                    $this.css('animation-duration', $this.data('animation-duration') );
                                    
                                }
                                                            
                                <?php if( $delay_animation == 'true' ) : ?>
                                    
                                    $this.delay(<?php echo $delay_timer; ?> * ( $all_appeared_elements.index(this) - get_animated_objects( $all_appeared_elements, effect ) ) ).queue( function() {
                
                                        $this.css('opacity','1').addClass( effect ).dequeue();
                                        
                                    });
                                
                                <?php else: ?>
                                    
                                    $this.delay( $this.data('delay') ).queue( function() {
                
                                        $this.css('opacity','1').addClass( effect ).dequeue();                                        
                                        
                                    });
                                
                                <?php endif; ?>
                                
                                $this.one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(e) {

                                    $this.closest(".ut-image-gallery-item").addClass("ut-animation-done");

                                }); 
                                
                            });
                            
                            $(document.body).on('disappear', '#<?php echo esc_attr( $id ); ?> .ut-animate-gallery-element', function() {
                                
                                var $this  = $(this),
                                    effect = $this.data('effect');
                                
                                if( $this.hasClass('ut-animation-complete') || $this.hasClass('ut-element-is-animating') ) {
                                    return;
                                }
                                            
                                if( $this.data('animateonce') === 'no' ) {
                                    
                                    $this.parent().removeClass("ut-animation-done");
                                    $this.clearQueue().removeClass( effect ).css('opacity','0').dequeue();                     
                                
                                } else {
                                    
                                    $this.addClass('ut-animation-complete');
                                
                                }
                                          
                            }); 
                        
                        <?php endif; ?>
  
                    });
                        
                })(jQuery);
            
            </script>
            
            <?php
            
            return ob_get_clean();
        
        }
        
        function create_placeholder_svg( $width , $height ){
            
            // fallback values
            $width = empty( $width ) ? '800' : $width;
            $height = empty( $height ) ? '600' : $height;            
            
            return 'data:image/svg+xml;charset=utf-8,%3Csvg xmlns%3D\'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg\' viewBox%3D\'0 0 ' . esc_attr( $width ) . ' ' . esc_attr( $height ) . '\'%2F%3E';            
            
        }
        
        public function set_feed_items( $feed_items ) {
            
            $this->feed_items = $feed_items;    
            
        }        
        
        function ut_create_shortcode( $atts, $content = NULL ) {
            
            extract( shortcode_atts( array (
                'instagram_user'     => '',
                'cache'              => 'off',
                'count'              => '12',
                'lightbox'           => 'yes',
                'alt'                => 'on',
                'caption'            => 'no',
                'caption_color'      => '',
                'caption_background' => '',
                'caption_transform'  => '',
                'loader'             => '',
                'loader_color'       => '',
                'animate'            => 'true',
                'effect'             => '',
                'animate_once'       => 'no',
                'animate_mobile'     => false,
                'animate_tablet'     => false,
                'gap'                => '',
                'grid'               => '1',
                'class'              => '',
                'css'                => '',
            ), $atts ) ); 
            
            if( !$instagram_user ) {
                return esc_html__( 'Please enter your instagram username.', 'ut_shortcodes' );
            }
            
            /* available grid sizes */
            $theme_grid = array(  
                1 => '100',
                2 => '50',
                3 => '33',
                4 => '25',
                5 => '20' 
            );
            
            $tablet_grid = array(  
                1 => '100',
                2 => '50',
                3 => '33',
                4 => '50',
                5 => '33' 
            );
                        
            /* class array */
            $classes = array();
            $animation_classes = array();
            $animation_active = false;
            
            $attributes = array();
            
            /* extra element class */
            $classes[] = $class;
            
            /* gap */
            if( $gap ) {
                $classes[] = 'ut-image-gallery-' .  $gap;
            }
            
            if( $animate == 'true' && $effect ) {
                
                $attributes['data-effect']      = esc_attr( $effect );
                $attributes['data-animateonce'] = esc_attr( $animate_once );
                
                $animation_classes[]  = 'ut-animate-gallery-element';
                $animation_classes[]  = 'animated';
                
                if( !$animate_tablet ) {
                    $animation_classes[]  = 'ut-no-animation-tablet';
                }
                
                if( !$animate_mobile ) {
                    $animation_classes[]  = 'ut-no-animation-mobile';
                }
                
                if( $animate_once == 'infinite' ) {
                    $css_classes[]  = 'infinite';
                }
                
                $animation_active = true;
                
            }         
            
            /* attributes string */
            $attributes = implode(' ', array_map(
                function ($v, $k) { return sprintf("%s=\"%s\"", $k, $v); },
                $attributes,
                array_keys( $attributes )
            ) ); 
            
            
            /* unique ID */
            $id = uniqid("ut_ig_");
            
            /* start output */
            $output = '';
            
            if( !defined( 'DOING_AJAX' ) ) {
            
                // attach js
                $output .= $this->ut_create_inline_script( $id, $atts );

                // attach css
                $output .= ut_minify_inline_css( $this->ut_create_inline_css( $id, $atts ) );
            
            }
            
            
            if( !$this->feed_items ) {
            
                // initiate API
                $instagram = new UT_Instagram_API();

                // assign username and settings
                $instagram->set_username( $instagram_user );
                $instagram->set_cache( $cache );            
                $instagram->set_count( $count );

                // get instagram feed items            
                $this->set_feed_items( $instagram->get_instagram_feed() );
            
            }
            
            //ut_print( $this->feed_items );
            
            if( !empty( $this->feed_items ) && is_array( $this->feed_items ) ) {
                
                $last_item_id = end( $this->feed_items );                
                
                // necessary max id for ajax
                $atts["max_id"] = $last_item_id["id"];
                
                // fallback for count
                $atts["count"] = empty( $atts["count"] ) ? "12" : $atts["count"];
                
                
                if( !defined( 'DOING_AJAX' ) )
                $output .= '<div id="' . esc_attr( $id ) . '" data-atts=\'' . json_encode( $atts ) . '\' class="ut-image-gallery ut-instagram-gallery ' . implode( ' ', $classes ) . ' clearfix">';
                
                    foreach( $this->feed_items as $key => $feed ) {
                        
                        // grid sizes
                        $desktop = $theme_grid[$grid];
                        $tablet  = $tablet_grid[$grid];                                                       
                        
                        $extra_class = $animation_active ? '' : 'ut-animation-done';
                        
                        // start item
                        $output .= '<div class="ut-image-gallery-item grid-' . esc_attr( $desktop ) . ' tablet-grid-' . esc_attr( $tablet ) . ' mobile-grid-100 ' . $extra_class . '">';    
                            
                            // additional image settings
                            $title = ( $alt == 'off' ) ? 'title="' . esc_attr( $feed['caption']['text'] ) . '"' : '';
                            $sub_html = !empty( $feed['caption']['text'] ) ? 'data-sub-html="#ut-image-caption-' . $feed['id'] . '"' : '';
                        
                                if( $lightbox == 'yes' ) {
                                    
                                    $large = 'https://www.instagram.com/p/' . $feed["code"] . '/media/?size=l';
                                    
                                    if( $feed["type"] == 'video' ) {
                                        
                                        $output .= '<div class="ut-instagram-video-container" id="video_' . $feed["id"] . '">';
                                            $output .= '<video class="lg-video-object lg-html5" controls preload="none">';
                                                $output .= '<source src="' . esc_url( $feed["videos"]["standard_resolution"]["url"] ) . '" type="video/mp4">';
                                                $output .= esc_html( 'Your browser does not support HTML5 video.' , 'ut_shortcodes' );
                                            $output .= '</video>';
                                        $output .= '</div>';
                                                                                
                                        $output .= '<a ' . $title . ' class="ut-vc-instagram-lightbox" ' . $sub_html . ' data-exthumbimage="' . esc_url( $feed['images']['thumbnail']['url'] ) . '" data-poster="' . esc_url( $feed['images']['standard_resolution']['url'] ) . '" data-html="#video_' . $feed["id"] . '">';
                                        
                                    } else {
                                        
                                        $output .= '<a ' . $title . ' class="ut-vc-instagram-lightbox" ' . $sub_html . ' data-exthumbimage="' . esc_url( $feed['images']['thumbnail']['url'] ) . '" href="' . esc_url( $large ) . '">';   
                                        
                                    }
                                    
                                } else {
                                    
                                    $output .= '<a ' . $title . ' href="' . esc_url( $feed['link'] ) . '" target="_blank">';
                                    
                                }                                
                                
                                $output .= '<div class="ut-image-gallery-image">';
                                    
                                    $output .= '<img ' . $alt . ' class="' . implode( ' ', $animation_classes ) . '" ' . $attributes . ' src="' . esc_url( $feed['images']['standard_resolution']['url'] ) . '" width="' . esc_attr( $feed['images']['standard_resolution']['width'] ) . '" height="' . esc_attr( $feed['images']['standard_resolution']['height'] ) . '">';

                                    if( $caption == 'yes' ) {

                                        $output .= '<div class="ut-image-gallery-image-caption">';

                                            $output .= '<div class="ut-image-gallery-item-caption-title">';

                                                if( !empty( $feed['likes']['count'] ) ) {

                                                    $output .= '<span class="ut-instagram-likes"><i class="fa fa-heart"></i>' . $feed['likes']['count'] . '</span>';                        

                                                } else {

                                                    $output .= '<span class="ut-instagram-likes"><i class="fa fa-heart-o"></i>' . 0 . '</span>';

                                                }

                                                $output .= '<span class="ut-instagram-line">&nbsp;</span>';


                                                if( !empty( $feed['comments']['count'] ) ) {                        

                                                    $output .= '<span class="ut-instagram-comments"><i class="fa fa-comments-o"></i>' . $feed['comments']['count'] . '</span>';

                                                } else {

                                                    $output .= '<span class="ut-instagram-comments"><i class="fa fa-comment-o"></i>' . 0 . '</span>';

                                                }

                                             $output .= '</div>';

                                        $output .= '</div>';                                

                                    }

                                $output .= '</div>';    

                                if( $lightbox == 'yes' && !empty( $feed['caption']['text'] ) ) {

                                    $output .= '<div id="ut-image-caption-' . $feed['id'] . '" class="ut-vc-images-lightbox-caption">' . $feed['caption']['text'] . '</div>';            

                                }

                            $output .= '</a>';

                        $output .= '</div>';

                    }
                
                    if( !defined( 'DOING_AJAX' ) ) {
                
                    $output .= '<div id="' . esc_attr( $id ) . '_clear" class="clear"></div>';
                    
                    if( $loader ) {

                        $output .= '<div data-for="#' . esc_attr( $id ) . '" class="ut-instagram-module-loading">';

                            $output .= '<div class="sk-fading-circle">';        

                                for ($x = 1; $x <= 12; $x++) {

                                    $output .= '<div class="sk-circle'.$x.' sk-circle"></div>';

                                }

                            $output .= '</div>';

                        $output .= '</div>';
                        
                        $output .= '<a id="' . esc_attr( $id ) . '_loader" href="#" data-for="#' . esc_attr( $id ) . '" target="_self" class="ut-load-instagram-feeds bklyn-btn bklyn-btn-small">' . esc_html( 'Load More', 'ut_shortcodes' ) . '</a>';

                    }               
                
                $output .= '</div>';
                
                }
                        
            }
            
            // only return gallery items on ajax request
            if( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
                return $output;                
            }
            
            $wpb = $gap ? array( 'ut-gallery-' .  $gap ) : array();
            
            return '<div class="wpb_content_element ut-instagram-gallery-wrap ' . implode( ' ', $wpb ) . ' ' . apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->shortcode, $atts ) . ' clearfix">' . $output . '</div>'; 
        
        }        
        
    }

}

new UT_Instagram_Gallery;