<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Image_Gallery' ) ) {
	
    class UT_Image_Gallery {
        
        private $shortcode;
        
        private $add_script;
        
        private $image_count;
        private $image_total_count;
        
        private $mobile_image_count;
        private $mobile_total_count;
        
        function __construct() {
			
            /* shortcode base */
            $this->shortcode = 'ut_image_gallery';
            
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
                        'name'            => esc_html__( 'Image Gallery', 'ut_shortcodes' ),
                        'base'            => $this->shortcode,
                        'category'        => 'Media',
                        'icon'            => UT_SHORTCODES_URL . '/admin/img/vc_icons/image-gallery.png',
                        'class'           => 'ut-vc-icon-module ut-media-module',
                        'content_element' => true,
                        'params'          => array(
                            
                            array(
                                'type'              => 'attach_images',
                                'heading'           => esc_html__( 'Gallery', 'ut_shortcodes' ),
                                'group'             => 'Gallery',
                                'param_name'        => 'gallery',
                                'admin_label'       => true
                            ),
                            
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Thumbnail Size', 'ut_shortcodes' ),
                                'param_name'        => 'thumbnail_size',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'group'             => 'Gallery',
                                'value'             => array(
                                    esc_html__( 'Thumbnail (cropped)' , 'ut_shortcodes' ) => 'thumbnail',
                                    esc_html__( 'Medium (cropped)' , 'ut_shortcodes' )    => 'medium',
                                    esc_html__( 'Large (cropped)' , 'ut_shortcodes' )     => 'large',
                                    esc_html__( 'Original' , 'ut_shortcodes' )  => 'full'
                                )
                            ),
                            
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Deactivate alt tag?', 'ut_shortcodes' ),
                                'param_name'        => 'alt',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'group'             => 'Gallery',
                                'value'             => array(
                                    esc_html__( 'yes, please!' , 'ut_shortcodes' ) => 'on',
                                    esc_html__( 'no, thanks!' , 'ut_shortcodes' )  => 'off',                                    
                                )
                            ),
                            
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Gallery Items per row.', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'Select your desired amount of images per row.', 'ut_shortcodes' ),
                                'param_name'        => 'grid',
                                'group'             => 'Gallery',
                                'edit_field_class'  => 'vc_col-sm-4',
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
                                'heading'           => esc_html__( 'Adjust last row?', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'This Option will adjust the remaining items inside the last row to a higher grid if necessary.', 'ut_shortcodes' ),
                                'param_name'        => 'adjust_row',
                                'group'             => 'Gallery',
                                'edit_field_class'  => 'vc_col-sm-4',
                                'value'             => array(
                                    esc_html__( 'no', 'ut_shortcodes' ) => 'no',
                                    esc_html__( 'yes', 'ut_shortcodes' ) => 'yes'
                                ),
                            ),
                    
                            
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Gallery Items Gap.', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'Select gap between gallery images.', 'ut_shortcodes' ),
                                'param_name'        => 'gap',
                                'group'             => 'Gallery',
                                'edit_field_class'  => 'vc_col-sm-4',
                                'value'             => array(
                                    esc_html__( '0px'  , 'ut_shortcodes' ) => '0',
                                    esc_html__( '1px'  , 'ut_shortcodes' ) => '1',
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
                                'heading'           => esc_html__( 'Activate Image Shadow?', 'ut_shortcodes' ),
                                'param_name'        => 'shadow',
                                'group'             => 'Gallery',
                                'value'             => array(
                                    esc_html__( 'no', 'ut_shortcodes' ) => 'no',
                                    esc_html__( 'yes', 'ut_shortcodes' ) => 'yes',
                                )
                            ),
                        
                            array(
								'type'              => 'range_slider',
								'heading'           => esc_html__( 'Image Border Radius', 'ut_shortcodes' ),
								'param_name'        => 'image_border_radius',
                                'value'             => array(
                                    'default'   => '0',
                                    'min'       => '0',
                                    'max'       => '100',
                                    'step'      => '1',
                                    'unit'      => 'px'
                                ),
								'group'             => 'Gallery',
						  	),                    
                    
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Link to Image to Project URL?', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'When editing your image you are able to enter an additional Porject URL. When activating this option, the user gets forwarded to this URL on click.', 'ut_shortcodes' ),
                                'param_name'        => 'external_link',
                                'group'             => 'Gallery',
                                'value'             => array(
                                    esc_html__( 'no', 'ut_shortcodes' ) => 'no',
                                    esc_html__( 'yes', 'ut_shortcodes' ) => 'yes',                                    
                                )
                            ),                    
                    
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Activate Lightbox?', 'ut_shortcodes' ),
                                'param_name'        => 'lightbox',
                                'group'             => 'Gallery',
                                'value'             => array(
                                    esc_html__( 'yes', 'ut_shortcodes' ) => 'yes',
                                    esc_html__( 'no', 'ut_shortcodes' ) => 'no',
                                ),
                                'dependency'        => array(
                                    'element' => 'external_link',
                                    'value'   => 'no',
                                )
                            ),                    
                            
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Image Size in Lightbox', 'ut_shortcodes' ),
                                'param_name'        => 'lightbox_size',
                                'description'       => esc_html__( 'What does Soft Crop mean? A soft crop will never cut off any of the image, it will scale the image down until it fits within the dimensions specified, maintaining its original aspect ratio. Also keep in mind, that using sizes these sizes except "HD Ready" and "Full" will force an image re-calculation the first time the setting is used. Means if your max_execution time is low, you might have to reload your website a few times until your server was able to process all images.', 'ut_shortcodes' ),
                                'group'             => 'Gallery',
                                'value'             => array(
                                    esc_html__( 'HD Ready (1280x720 soft cropped)', 'ut_shortcodes' ) => 'hd',
                                    esc_html__( 'Full HD (1920x1280 soft cropped)', 'ut_shortcodes' ) => 'full_hd',
                                    esc_html__( 'WQHD (2560x1440 soft cropped)', 'ut_shortcodes' ) => 'wqhd',
                                    esc_html__( 'Retina 4k (4096x2304 soft cropped)', 'ut_shortcodes' ) => 'retina_4k',
                                    esc_html__( 'Retina 5k (5120x2880 soft cropped)', 'ut_shortcodes' ) => 'retina_5k',
                                    esc_html__( 'Original (Full Size no cropping)', 'ut_shortcodes' ) => 'full',
                                ),
                                'dependency'        => array(
                                    'element' => 'lightbox',
                                    'value'   => 'yes',
                                )
                            ),                     
                    
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Activate Hover Effect?', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'The hover effect can contain the image caption or a "plus sign".', 'ut_shortcodes' ),
                                'param_name'        => 'caption',
                                'group'             => 'Gallery',
                                'value'             => array(
                                    esc_html__( 'no', 'ut_shortcodes' ) => 'no',
                                    esc_html__( 'yes', 'ut_shortcodes' ) => 'yes',                                    
                                ),
                    
                            ),  
                            
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Hover Effect Content', 'ut_shortcodes' ),
                                'param_name'        => 'caption_content',
                                'group'             => 'Gallery',
                                'value'             => array(
                                    esc_html__( 'Caption Text', 'ut_shortcodes' ) => 'caption',
                                    esc_html__( 'Plus Sign', 'ut_shortcodes' ) => 'plus',
                                    esc_html__( 'Custom Text', 'ut_shortcodes' ) => 'custom',                                    
                                ),
                                'dependency'        => array(
                                    'element' => 'caption',
                                    'value'   => 'yes',
                                )
                            ),
                            
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Custom Text', 'ut_shortcodes' ),
                                'param_name'        => 'custom_caption',
                                'group'             => 'Gallery',
                                'dependency'        => array(
                                    'element' => 'caption_content',
                                    'value'   => 'custom',
                                )
                            ),
                    
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Show Image Caption Below?', 'ut_shortcodes' ),
                                'param_name'        => 'caption_below',
                                'group'             => 'Gallery',
                                'value' => array(
                                    esc_html__( 'no', 'ut_shortcodes' ) => 'no',
                                    esc_html__( 'yes', 'ut_shortcodes' ) => 'yes',                                     
                                ),
                            ),
                    
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Activate LazyLoad?', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'Speed up page loading times and decrease traffic to your users by only loading the images in view. We recommend activating an animation effect for a nicer user experience.', 'ut_shortcodes' ),
                                'param_name'        => 'lazy',
                                'group'             => 'Gallery',
                                'value'             => array(
                                    esc_html__( 'no, thanks!', 'ut_shortcodes' ) => '',
                                    esc_html__( 'yes, please!', 'ut_shortcodes' ) => 'true',                                    
                                )
                            ),
                    
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Show Image Loader?', 'ut_shortcodes' ),
                                'description'       => esc_html__( '', 'ut_shortcodes' ),
                                'param_name'        => 'loader',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'group'             => 'Gallery',
                                'value'             => array(
                                    esc_html__( 'no, thanks!', 'ut_shortcodes' ) => '',
                                    esc_html__( 'yes, please!', 'ut_shortcodes' ) => 'true',                                    
                                ),
                                'dependency'        => array(
                                    'element' => 'lazy',
                                    'value'   => 'true',
                                )
                            ),
                            
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Image Loader Color', 'ut_shortcodes' ),
								'param_name'        => 'loader_color',
								'group'             => 'Gallery',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'dependency'        => array(
                                    'element' => 'loader',
                                    'value'   => 'true',
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
								'type'              => 'range_slider',
								'heading'           => esc_html__( 'Caption Letter Spacing', 'ut_shortcodes' ),
								'param_name'        => 'caption_letter_spacing',
                                'group'             => 'Caption Settings',
                                'value'             => array(
                                    'def'   => '0',
                                    'min'   => '-100',
                                    'max'   => '100',
                                    'step'  => '1',
                                    'unit'  => 'px'
                                ),
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
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Caption Below Font Weight', 'ut_shortcodes' ),
								'param_name'        => 'caption_below_font_weight',
								'group'             => 'Caption Settings',
                                'value'             => array(
                                    esc_html__( 'bold' , 'ut_shortcodes' )               => 'bold',
                                    esc_html__( 'normal' , 'ut_shortcodes' )             => 'normal',                                    
                                ),
                                'dependency'        => array(
                                    'element' => 'caption_below',
                                    'value'   => 'yes',
                                )
						  	),                    
                    
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Caption Below Text Transform', 'ut_shortcodes' ),
                                'param_name'        => 'caption_below_transform',
                                'group'             => 'Caption Settings',
                                'value'             => array(
                                    esc_html__( 'Select Text Transform' , 'ut_shortcodes' ) => '',
                                    esc_html__( 'capitalize' , 'ut_shortcodes' ) => 'capitalize',
                                    esc_html__( 'uppercase', 'ut_shortcodes' ) => 'uppercase',
                                    esc_html__( 'lowercase', 'ut_shortcodes' ) => 'lowercase'                                    
                                ),
                                'dependency'        => array(
                                    'element' => 'caption_below',
                                    'value'   => 'yes',
                                )
                            ),
                    
                            array(
								'type'              => 'range_slider',
								'heading'           => esc_html__( 'Caption Below Letter Spacing', 'ut_shortcodes' ),
								'param_name'        => 'caption_below_letter_spacing',
                                'group'             => 'Caption Settings',
                                'value'             => array(
                                    'def'   => '0',
                                    'min'   => '-100',
                                    'max'   => '100',
                                    'step'  => '1',
                                    'unit'  => 'px'
                                ),
                                'dependency'        => array(
                                    'element' => 'caption_below',
                                    'value'   => 'yes',
                                )
								
						  	),     
                    
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Caption Below Text Color', 'ut_shortcodes' ),
								'param_name'        => 'caption_below_color',
								'group'             => 'Caption Settings',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'dependency'        => array(
                                    'element' => 'caption_below',
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
                'animate'                       => 'true',
                'effect'                        => '',
                'loader_color'                  => '',
                'caption_color'                 => '',
                'caption_font_size'             => '',
                'caption_background'            => '',
                'caption_transform'             => '',
                'caption_letter_spacing'        => '',
                'caption_below_font_weight'     => '',
                'caption_below_color'           => '',
                'caption_below_transform'       => '',
                'caption_below_letter_spacing'  => '',
                'shadow'                        => '',
                'image_border_radius'           => ''
            ), $atts ) );    
            
           $css = '<style type="text/css" scoped>';
                
                $css .= '#' . esc_attr( $id ) . ' .ut-lazy:not(.ut-image-loaded) + .ut-video-module-loading { display:block; }';
                $css .= '#' . esc_attr( $id ) . ' .ut-lazy.ut-image-loaded + .ut-video-module-loading { display:none; }';
                        
                if( $animate == 'true' && $effect ) {
                    $css .= '#' . esc_attr( $id ) . ' .ut-animate-gallery-element { opacity: 0; }';
                }
                
                if( $caption_color ) {
                    $css .= '#' . esc_attr( $id ) . ' .ut-image-gallery-item-caption-title h3 { color: '. $caption_color . '; }';
                }

                if( $caption_background ) {
                    $css .= '#' . esc_attr( $id ) . ' .ut-image-gallery-item.ut-animation-done:hover .ut-image-gallery-image-caption { background: ' . $caption_background . '; }';
                }

                if( $caption_transform ) {
                    $css .= '#' . esc_attr( $id ) . ' .ut-image-gallery-item-caption-title h3 { text-transform: '. $caption_transform . '; }';
                }
            
                if( $caption_letter_spacing ) {
                    $css .= '#' . esc_attr( $id ) . ' .ut-image-gallery-item-caption-title h3 { letter-spacing: '. $caption_letter_spacing . 'px; }';
                }
                
                if( $caption_font_size ) {
                    $css .= '#' . esc_attr( $id ) . ' .ut-image-gallery-item-caption-title h3 { font-size: '. $caption_font_size . '; }';
                }
                
                if( $caption_below_color ) {
                    $css .= '#' . esc_attr( $id ) . ' .ut-gallery-slider-caption { color: '. $caption_below_color . '; }';
                }    
            
                if( $caption_below_transform ) {
                    $css .= '#' . esc_attr( $id ) . ' .ut-gallery-slider-caption { text-transform: '. $caption_below_transform . '; }';
                }
                
                if( $caption_below_font_weight ) {
                    $css .= '#' . esc_attr( $id ) . ' .ut-gallery-slider-caption { font-weight: '. $caption_below_font_weight . '; }';
                }
                
                if( $caption_below_letter_spacing ) {
                    $css .= '#' . esc_attr( $id ) . ' .ut-gallery-slider-caption { letter-spacing: '. $caption_below_letter_spacing . 'px; }';
                }
            
                if( $shadow ) {
                    $css .= '#' . esc_attr( $id ) . ' .ut-gallery-slider-caption { margin-top: 10px; }';
                }
            
                if( $loader_color ) {
                    $css .= '#' . esc_attr( $id ) . ' .sk-fading-circle .sk-circle::before { background-color: '. $loader_color . '; }';                    
                }            
            
                if( $image_border_radius ) {
                    $css .= '#' . esc_attr( $id ) . ' .ut-image-gallery-image { -webkit-border-radius: ' . $image_border_radius . 'px; -moz-border-radius: ' . $image_border_radius . 'px; border-radius: ' . $image_border_radius . 'px; overflow:hidden; }';
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
                        
                        <?php if( $lazy ) : ?>
                        
                        $("img.ut-lazy", "#<?php echo esc_attr( $id ); ?>").Lazy({
                            threshold : 500,
                            afterLoad: function(element) {
                                
                                var $element = $(element);
                                $element.closest(".ut-image-gallery-item").addClass("ut-image-loaded");
                                $element.addClass("ut-image-loaded");
                                
                                $.force_appear(); 
                                 
                            }
                            
                        });
                                            
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
                                
                                <?php if( $lazy ) : ?>
                                
                                if( !$this.hasClass('ut-image-loaded') ) {
                                    return; // image not loaded yet
                                }
                                
                                <?php endif; ?>
                                
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

                                    $this.addClass("ut-animation-done");

                                }); 
                                
                            });
                            
                            $(document.body).on('disappear', '#<?php echo esc_attr( $id ); ?> .ut-animate-gallery-element', function() {
                                
                                var $this  = $(this),
                                    effect = $this.data('effect');
                                
                                <?php if( $lazy ) : ?>
                                
                                if( !$this.hasClass('ut-image-loaded') ) {
                                    return; // image not loaded yet
                                }
                                
                                <?php endif; ?>
                                
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
        
        
        function ut_create_shortcode( $atts, $content = NULL ) {
            
            extract( shortcode_atts( array (
                'gallery'            => '',
                'thumbnail_size'     => 'thumbnail',
                'external_link'      => '',
                'lightbox'           => 'yes',
                'lightbox_size'      => 'hd',
                'alt'                => 'on',
                'caption'            => 'no',
                'caption_content'    => 'caption',
                'custom_caption'     => '',
                'caption_color'      => '',
                'caption_background' => '',
                'caption_transform'  => '',
                'caption_below'      => 'no',
                'caption_below_color'=> '',
                'caption_below_transform' => '',
                'lazy'               => '',
                'loader'             => '',
                'loader_color'       => '',
                'animate'            => 'true',
                'effect'             => '',
                'animate_once'       => 'no',
                'animate_mobile'     => false,
                'animate_tablet'     => false,
                'gap'                => '',
                'shadow'             => '',
                'grid'               => '',
                'adjust_row'         => '',
                'class'              => '',
                'css'                => ''
            ), $atts ) ); 
            
            $this->add_script = true;                
            
            $this->image_count = NULL;
            $this->image_total_count = NULL;
            
            $this->mobile_image_count = NULL;
            $this->mobile_total_count = NULL;
            
            /* fallback */
            $grid = !$grid ? '1' : $grid;
            
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
            $image_classes = array();
            $animation_active = false;
            
            $attributes = array();
            
            /* extra element class */
            $classes[] = $class;
            
            /* shadow for images*/
            if( $shadow ) {
                $image_classes[] = 'gutter-shadow';
            }           
            
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
            
            /* attach js */
            $output .= $this->ut_create_inline_script( $id, $atts );
            
            /* attach css */
            $output .= ut_minify_inline_css( $this->ut_create_inline_css( $id, $atts ) );
                
            $gallery = explode( ',' , $gallery );
                    
            if( !empty( $gallery ) && is_array( $gallery ) ) {
                
                $this->mobile_total_count = count( $gallery );
                $this->image_total_count  = count( $gallery );
                
                $output .= '<div id="' . esc_attr( $id ) . '" class="ut-image-gallery ' . implode( ' ', $classes ) . ' clearfix">';
                    
                    foreach( $gallery as $image ) {
                        
                        $image_classes = array();
                        
                        $this->image_count++;
                        $this->mobile_image_count++;                        
                        
                        /* grid settings */
                        if( $adjust_row == 'yes' ) {
                            
                            $grid_items        = ( $this->image_total_count >= $grid ) ? $grid : $this->image_total_count;
                            $grid_items_tablet = ( $this->image_total_count >= $grid ) ? $grid : $this->image_total_count;
                            
                            /* force grid 33 for tablets */
                            if( $grid == '5' ) { $grid_items_tablet = ( $this->mobile_total_count >= '3' ) ? '3' : $this->mobile_total_count; }
                            
                            /* element classes */
                            $desktop = $theme_grid[$grid_items];
                            $tablet  = $tablet_grid[$grid_items_tablet];
                            
                        } else {
                            
                            $desktop = $theme_grid[$grid];
                            $tablet  = $tablet_grid[$grid];
                                                        
                        }
                        
                        $add_clear = '';
                        
                        /* if counter has reached the maximum of items per row, decrease the total counter */
                        if( $this->mobile_image_count == '3' && $this->mobile_total_count > '3') {
                            $this->mobile_total_count = $this->mobile_total_count - $this->mobile_image_count;
                            $this->mobile_image_count = 0;
                            $image_classes[] = 'ut-tablet-last';
                            $add_clear = '<div class="clear hide-on-desktop hide-on-tablet"></div>';
                        }
                        
                        /* if counter has reached the maximum of items per row, decrease the total counter */
                        if( $this->image_count ==  $grid && $this->image_total_count > $grid) {
                            $this->image_total_count = $this->image_total_count - $this->image_count;
                            $this->image_count = 0;
                            $image_classes[] = 'ut-desktop-last';
                            $add_clear = '<div class="clear hide-on-tablet"></div>';
                        }
                        
                        // get image by size
                        $thumbnail = wp_get_attachment_image_src( $image, $thumbnail_size );
                        
                        // check if upscale is necessary since WordPress does not upscale
                        if( get_option('large_crop') && $thumbnail_size == 'large' && ( isset( $thumbnail[1] ) && $thumbnail[1] < get_option('large_size_w') || isset( $thumbnail[2] ) && $thumbnail[2] < get_option('large_size_h') ) ) {

                            // create new thumb
                            $new_image = array();
                            $new_image[0] = ut_resize( $thumbnail[0], get_option('large_size_w'), get_option('large_size_h'), true, true, true );
                            $new_image[1] = get_option('large_size_w');
                            $new_image[2] = get_option('large_size_h');

                            // assign new thumb
                            $thumbnail = $new_image;

                        }
                        
                        // check if upscale is necessary since WordPress does not upscale
                        if( get_option('medium_crop') && $thumbnail_size == 'medium' && ( isset( $thumbnail[1] ) && $thumbnail[1] < get_option('medium_size_w') || isset( $thumbnail[2] ) && $thumbnail[2] < get_option('medium_size_h') ) ) {

                            // create new thumb
                            $new_image = array();
                            $new_image[0] = ut_resize( $thumbnail[0], get_option('medium_size_w'), get_option('medium_size_h'), true, true, true );
                            $new_image[1] = get_option('medium_size_w');
                            $new_image[2] = get_option('medium_size_h');

                            // assign new thumb
                            $thumbnail = $new_image;

                        }
                        
                        // check if upscale is necessary since WordPress does not upscale
                        if( get_option('thumbnail_crop') && $thumbnail_size == 'medium' && ( isset( $thumbnail[1] ) && $thumbnail[1] < get_option('thumbnail_size_w') || isset( $thumbnail[2] ) && $thumbnail[2] < get_option('thumbnail_size_h') ) ) {

                            // create new thumb
                            $new_image = array();
                            $new_image[0] = ut_resize( $thumbnail[0], get_option('thumbnail_size_w'), get_option('thumbnail_size_h'), true, true, true );
                            $new_image[1] = get_option('thumbnail_size_w');
                            $new_image[2] = get_option('thumbnail_size_h');

                            // assign new thumb
                            $thumbnail = $new_image;

                        }
                        
                        // fallback image
                        if( empty( $thumbnail ) ) {
                
                            $thumbnail   = array();
                            $thumbnail[] = ut_img_asset_url( 'replace-normal.jpg' );
                            $thumbnail[] = "";
                            $thumbnail[] = "";
                            
                        }
                        
                        // lightgallery zoom image
                        if( $lightbox_size == 'hd' ) {
                            
                            $lightgallery = wp_get_attachment_image_src( $image, 'ut-lightbox' );
                                
                        } elseif( $lightbox_size == 'full' ) {
                            
                            $lightgallery = wp_get_attachment_image_src( $image, 'full' );
                            
                        } elseif( $lightbox_size == 'full_hd' ) {
                            
                            $lightgallery = wp_get_attachment_image_src( $image, 'full' );
                            $lightgallery = ut_resize( $lightgallery[0], 1920, 1080, false, false, false );
                            
                        } elseif( $lightbox_size == 'wqhd' ) {    
                            
                            $lightgallery = wp_get_attachment_image_src( $image, 'full' );
                            $lightgallery = ut_resize( $lightgallery[0], 2560, 1440, false, false, false );
                            
                        } elseif( $lightbox_size == 'retina_4k' ) {    
                            
                            $lightgallery = wp_get_attachment_image_src( $image, 'full' );
                            $lightgallery = ut_resize( $lightgallery[0], 4096, 2304, false, false, false );
                            
                        } elseif( $lightbox_size == 'retina_5k' ) {    
                            
                            $lightgallery = wp_get_attachment_image_src( $image, 'full' );
                            $lightgallery = ut_resize( $lightgallery[0], 5120, 2880, false, false, false );
                            
                        }
                        
                        // fallback image
                        if( empty( $lightgallery ) ) {
                
                            $lightgallery   = array();
                            $lightgallery[] = ut_img_asset_url( 'replace-normal.jpg' );
                            $lightgallery[] = "";
                            $lightgallery[] = "";
                            
                        }
                        
                        // lightgallery thumbnail image
                        $mini = wp_get_attachment_image_src( $image, 'thumbnail' );
                        
                        // check if upscale is necessary since WordPress does not upscale
                        if( get_option('thumbnail_crop') && ( isset( $mini[1] ) && $mini[1] < get_option('thumbnail_size_w') || isset( $mini[2] ) && $mini[2] < get_option('thumbnail_size_h') ) ) {

                            // create new thumb
                            $new_image = array();
                            $new_image[0] = ut_resize( $mini[0], get_option('thumbnail_size_w'), get_option('thumbnail_size_h'), true, true, true );
                            $new_image[1] = get_option('thumbnail_size_w');
                            $new_image[2] = get_option('thumbnail_size_h');

                            // assign new thumb
                            $mini = $new_image;

                        }
                        
                        // fallback image
                        if( empty( $mini ) ) {
                
                            $mini   = array();
                            $mini[] = ut_img_asset_url( 'replace-normal.jpg' );
                            $mini[] = "";
                            $mini[] = "";
                            
                        }
                        
                        // attachment meta
                        $attachment_meta = get_post( $image );
                        
                        // needed for hover effect if animation is not active
                        $animation_classes[] = $animation_active ? '' : 'ut-animation-done';
                        
                        $output .= '<div ' . $attributes . ' data-count="' . $this->image_total_count . '" class="ut-image-gallery-item ' . implode( ' ', $animation_classes ) . ' grid-' . esc_attr( $desktop ) . ' tablet-grid-' . esc_attr( $tablet ) . ' mobile-grid-100 ' . implode( ' ', $image_classes ) . '">';
                            
                            $alt = ( $alt == 'off' ) ? 'alt="' . esc_attr( $attachment_meta->post_excerpt ) . '"' : '';
                            $title = ( $alt == 'off' ) ? 'title="' . esc_attr( $attachment_meta->post_excerpt ) . '"' : '';
                            $sub_html = !empty( $attachment_meta->post_excerpt ) ? 'data-sub-html="#ut-image-caption-' . $image . '"' : '';
                            
                            // image with lightbox
                            if( $lightbox == 'yes' && !$external_link ) {
                                
                                $output .= '<a ' . $title . ' class="ut-vc-images-lightbox" ' . $sub_html . ' data-exthumbimage="' . esc_url( $mini[0] ) . '" href="' . esc_url( $lightgallery[0] ) . '">';
                            
                            }
                        
                            $attachment_project_url = NULL;
                        
                            // image with external link
                            $attachment_project_url = get_post_meta($image, 'ut_attachment_url', true );
                        
                            if( $external_link == 'yes' && $attachment_project_url ) {
                                    
                                $output .= '<a ' . $title . ' href="' . esc_url( $attachment_project_url ) . '" target="_blank">';

                            }
                            
                            $output .= '<div class="ut-image-gallery-image">';

                                if( $lazy ) {

                                    $output .= '<img ' . $alt . ' class="' . implode( ' ', $image_classes ) . ' ut-lazy" src="' . $this->create_placeholder_svg( $thumbnail[1], $thumbnail[2] ) . '" data-src="' . esc_url( $thumbnail[0] ) . '" width="' . esc_attr( $thumbnail[1] ) . '" height="' . esc_attr( $thumbnail[2] ) . '">';

                                } else {

                                    $output .= '<img ' . $alt . ' class="' . implode( ' ', $image_classes ) . '" src="' . esc_url( $thumbnail[0] ) . '" width="' . esc_attr( $thumbnail[1] ) . '" height="' . esc_attr( $thumbnail[2] ) . '">';

                                }

                                if( $loader ) {

                                    $output .= '<div class="ut-video-module-loading">';

                                        $output .= '<div class="sk-fading-circle">';        

                                            for ($x = 1; $x <= 12; $x++) {

                                                $output .= '<div class="sk-circle'.$x.' sk-circle"></div>';

                                            }

                                        $output .= '</div>';

                                    $output .= '</div>';

                                }                                

                                if( $caption == 'yes' ) {

                                    $output .= '<div class="ut-image-gallery-image-caption">';

                                        $output .= '<div class="ut-image-gallery-item-caption-title">';

                                        if( !empty( $attachment_meta->post_excerpt ) && $caption_content == 'caption' ) {

                                            $output .= '<h3>' . $attachment_meta->post_excerpt . '</h3>';

                                        } elseif( $caption_content == 'custom' && !empty( $custom_caption ) ) {
                                            
                                            $output .= '<h3>' . $custom_caption . '</h3>';
                                            
                                        } else {
                                            
                                            $output .= '<h3 class="ut-image-gallery-empty-title">+</h3>';

                                        }

                                         $output .= '</div>';

                                    $output .= '</div>';                                

                                }

                            $output .= '</div>';    

                            if ( !empty( $attachment_meta->post_excerpt ) ) {

                                $output .= '<div id="ut-image-caption-' . $image . '" class="ut-vc-images-lightbox-caption">' . $attachment_meta->post_excerpt . '</div>';            

                            }
                        
                        if( $lightbox == 'yes' && !$external_link  || $external_link == 'yes' && $attachment_project_url ) {
                        
                            $output .= '</a>';

                        }
                            
                        if( $caption_below == 'yes' && !empty( $attachment_meta->post_excerpt ) ) {

                            $output .= '<div class="ut-gallery-slider-caption">' . $attachment_meta->post_excerpt . '</div>';

                        }    
                        
                        $output .= '</div>';
                        
                        $output .= $add_clear;
                            
                    }
                    
                    $output .= '<div class="clear"></div>';
                        
                $output .= '</div>';
            
            }
            
            $wpb = $gap ? array( 'ut-gallery-' .  $gap ) : array();
            
            return '<div class="wpb_content_element ' . implode( ' ', $wpb ) . ' ' . apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->shortcode, $atts ) . ' clearfix">' . $output . '</div>'; 
        
        }
            
    }

}

new UT_Image_Gallery;


if ( class_exists( 'WPBakeryShortCode' ) ) {
    
    class WPBakeryShortCode_ut_image_gallery extends WPBakeryShortCode {
        
        /* add images to visual composer */
        public function singleParamHtmlHolder( $param, $value ) {
            
            $output = '';
            
            $param_name = isset( $param['param_name'] ) ? $param['param_name'] : '';
            
            if ( 'gallery' === $param_name ) {
                
                $images_ids = empty( $value ) ? array() : explode( ',', trim( $value ) );
                $output .= '<ul class="attachment-thumbnails' . ( empty( $images_ids ) ? ' image-exists' : '' ) . '" data-name="' . $param_name . '">';
                foreach ( $images_ids as $image ) {
                    $img = wpb_getImageBySize( array( 'attach_id' => (int) $image, 'thumb_size' => 'thumbnail' ) );
                    $output .= ( $img ? '<li>' . $img['thumbnail'] . '</li>' : '<li><img width="150" height="150" test="' . $image . '" src="' . vc_asset_url( 'vc/blank.gif' ) . '" class="attachment-thumbnail" alt="" title="" /></li>' );
                }
                $output .= '</ul>';
                $output .= '<a href="#" class="column_edit_trigger' . ( ! empty( $images_ids ) ? ' image-exists' : '' ) . '">' . __( 'Add images', 'js_composer' ) . '</a>';
    
            }
            
            return $output;
            
        }        
        
    }
    
}