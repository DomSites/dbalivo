<?php

if ( !defined( 'ABSPATH' ) )exit;

if ( !class_exists( 'UT_Gallery_Slider' ) ) {

    class UT_Gallery_Slider {

        private $shortcode;
        private $add_script;

        function __construct() {

            /* shortcode base */
            $this->shortcode = 'ut_gallery_slider';

            add_action( 'init', array( $this, 'ut_map_shortcode' ) );
            add_shortcode( $this->shortcode, array( $this, 'ut_create_shortcode' ) );

            /* scripts */
            add_action( 'init', array( $this, 'register_scripts' ) );
            add_action( 'wp_footer', array( $this, 'enqueue_scripts' ) );

        }

        function ut_map_shortcode( $atts, $content = NULL ) {

            if ( function_exists( 'vc_map' ) ) {

                vc_map(
                    array(
                        'name' => esc_html__( 'Gallery Slider', 'ut_shortcodes' ),
                        'base' => $this->shortcode,
                        'category' => 'Media',
                        'icon' => UT_SHORTCODES_URL . '/admin/img/vc_icons/gallery-slider.png',
                        'class' => 'ut-vc-icon-module ut-media-module',
                        'content_element' => true,
                        'params' => array(

                            array(
                                'type' => 'attach_images',
                                'heading' => esc_html__( 'Slides', 'ut_shortcodes' ),
                                'group' => 'Slides',
                                'param_name' => 'slides',
                            ),
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__( 'Activate Lightbox?', 'ut_shortcodes' ),
                                'param_name' => 'lightbox',
                                'group' => 'Slides',
                                'value' => array(
                                    esc_html__( 'yes', 'ut_shortcodes' ) => 'yes',
                                    esc_html__( 'no', 'ut_shortcodes' ) => 'no',
                                )
                            ),
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__( 'Slider Type', 'ut_shortcodes' ),
                                'param_name' => 'type',
                                'group' => 'Slider Settings',
                                'value' => array(
                                    esc_html__( 'Single Slide', 'ut_shortcodes' ) => 'single',
                                    esc_html__( 'Carousel', 'ut_shortcodes' ) => 'carousel'
                                ),
                            ),
                            array(
                                'type' => 'range_slider',
                                'heading' => esc_html__( 'Slides on Desktop', 'ut_shortcodes' ),
                                'description' => esc_html__( 'The number of items you want to see on the screen.', 'ut_shortcodes' ),
                                'param_name' => 'number',
                                'group' => 'Slider Settings',
                                'value' => array(
                                    'min' => '1',
                                    'max' => '5',
                                    'step' => '1',
                                    'unit' => 'x'
                                ),
                                'dependency' => array(
                                    'element' => 'type',
                                    'value' => array( 'carousel' ),
                                )
                            ),
                            array(
                                'type' => 'range_slider',
                                'heading' => esc_html__( 'Slides on Tablet', 'ut_shortcodes' ),
                                'description' => esc_html__( 'The number of items you want to see on the screen.', 'ut_shortcodes' ),
                                'param_name' => 'number_tablet',
                                'group' => 'Slider Settings',
                                'value' => array(
                                    'min' => '1',
                                    'max' => '5',
                                    'step' => '1',
                                    'unit' => 'x'
                                ),
                                'dependency' => array(
                                    'element' => 'type',
                                    'value' => array( 'carousel' ),
                                )
                            ),
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__( 'Autoplay Slider?', 'ut_shortcodes' ),
                                'param_name' => 'autoplay',
                                'group' => 'Slider Settings',
                                'value' => array(
                                    esc_html__( 'no', 'ut_shortcodes' ) => 'false',
                                    esc_html__( 'yes', 'ut_shortcodes' ) => 'true'
                                ),
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__( 'Autoplay Timeout', 'ut_shortcodes' ),
                                'description' => esc_html__( 'Autoplay interval timeout in milliseconds. Default: 5000', 'ut_shortcodes' ),
                                'param_name' => 'autoplay_timeout',
                                'group' => 'Slider Settings',
                                'dependency' => array(
                                    'element' => 'autoplay',
                                    'value' => array( 'true' ),
                                )

                            ),
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__( 'Loop Slider?', 'ut_shortcodes' ),
                                'param_name' => 'loop',
                                'group' => 'Slider Settings',
                                'value' => array(
                                    esc_html__( 'yes', 'ut_shortcodes' ) => 'true',
                                    esc_html__( 'no', 'ut_shortcodes' ) => 'false',
                                ),
                                'dependency' => array(
                                    'element' => 'type',
                                    'value' => array( 'single' ),
                                )
                            ),
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__( 'Show Next / Prev Navigation?', 'ut_shortcodes' ),
                                'param_name' => 'nav',
                                'group' => 'Slider Settings',
                                'value' => array(
                                    esc_html__( 'yes', 'ut_shortcodes' ) => 'true',
                                    esc_html__( 'no', 'ut_shortcodes' ) => 'false'
                                ),
                            ),
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__( 'Show Zoom Icon?', 'ut_shortcodes' ),
                                'param_name' => 'zoom',
                                'group' => 'Slider Settings',
                                'value' => array(
                                    esc_html__( 'yes', 'ut_shortcodes' ) => 'true',
                                    esc_html__( 'no', 'ut_shortcodes' ) => 'false'
                                ),
                            ),
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__( 'Show Dot Navigation?', 'ut_shortcodes' ),
                                'param_name' => 'dots',
                                'group' => 'Slider Settings',
                                'value' => array(
                                    esc_html__( 'no', 'ut_shortcodes' ) => 'false',
                                    esc_html__( 'yes', 'ut_shortcodes' ) => 'true',
                                ),
                            ),
                            array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__( 'Hover Color', 'ut_shortcodes' ),
                                'param_name' => 'hover_color',
                                'group' => 'Slider Settings',
                            ),
                            array(
                                'type' => 'range_slider',
                                'heading' => esc_html__( 'Hover Color Opacity', 'ut_shortcodes' ),
                                'param_name' => 'hover_color_opacity',
                                'group' => 'Slider Settings',
                                'value' => array(
                                    'default' => '90',
                                    'min' => '0',
                                    'max' => '100',
                                    'step' => '1',
                                    'unit'=> '%'
                                ),
                            ),
                    
                            // Slide Effects
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__( 'Animation Effect In', 'ut_shortcodes' ),
                                'param_name' => 'effect_in',
                                'group' => 'Slide Effects',
                                'value' => ut_recognized_in_animation_effects()
                            ),
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__( 'Animation Effect Out', 'ut_shortcodes' ),
                                'param_name' => 'effect_out',
                                'group' => 'Slide Effects',
                                'value' => ut_recognized_out_animation_effects()
                            ),
                            
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__( 'CSS Class', 'ut_shortcodes' ),
                                'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'ut_shortcodes' ),
                                'param_name' => 'class',
                                'group' => 'Slides'
                            ),
                            /* caption */
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__( 'Show Image Caption Below?', 'ut_shortcodes' ),
                                'param_name' => 'caption',
                                'group' => 'Caption Settings',
                                'value' => array(
                                    esc_html__( 'off', 'ut_shortcodes' ) => 'off',
                                    esc_html__( 'on', 'ut_shortcodes' ) => 'on',                                    
                                ),
                            ),
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__( 'Image Caption Below Text Transform', 'ut_shortcodes' ),
                                'param_name' => 'caption_text_transform',
                                'group' => 'Caption Settings',
                                'value' => array(
                                    esc_html__( 'Select Text Transform', 'ut_shortcodes' ) => '',
                                    esc_html__( 'capitalize', 'ut_shortcodes' ) => 'capitalize',
                                    esc_html__( 'uppercase', 'ut_shortcodes' ) => 'uppercase',
                                    esc_html__( 'lowercase', 'ut_shortcodes' ) => 'lowercase'
                                ),
                                'dependency' => array(
                                    'element' => 'caption',
                                    'value' => array( 'on' ),
                                )

                            ),
                            array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__( 'Image Caption Below Color', 'ut_shortcodes' ),
                                'param_name' => 'caption_color',
                                'group' => 'Caption Settings',
                                'dependency' => array(
                                    'element' => 'caption',
                                    'value' => array( 'on' ),
                                )
                            ),
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__( 'Show Image Caption On Hover?', 'ut_shortcodes' ),
                                'param_name' => 'hover_caption',
                                'group' => 'Caption Settings',
                                'value' => array(
                                    esc_html__( 'off', 'ut_shortcodes' ) => 'off',
                                    esc_html__( 'on', 'ut_shortcodes' ) => 'on',                                    
                                ),
                            ),
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__( 'Image Caption On Hover Text Transform', 'ut_shortcodes' ),
                                'param_name' => 'hover_caption_text_transform',
                                'group' => 'Caption Settings',
                                'value' => array(
                                    esc_html__( 'Select Text Transform', 'ut_shortcodes' ) => '',
                                    esc_html__( 'capitalize', 'ut_shortcodes' ) => 'capitalize',
                                    esc_html__( 'uppercase', 'ut_shortcodes' ) => 'uppercase',
                                    esc_html__( 'lowercase', 'ut_shortcodes' ) => 'lowercase'
                                ),
                                'dependency' => array(
                                    'element' => 'hover_caption',
                                    'value' => array( 'on' ),
                                )

                            ),
                            array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__( 'Image Caption On Hover Color', 'ut_shortcodes' ),
                                'param_name' => 'hover_caption_color',
                                'group' => 'Caption Settings',
                                'dependency' => array(
                                    'element' => 'hover_caption',
                                    'value' => array( 'on' ),
                                )
                            ),

                            /* colors */
                            array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__( 'Arrow Color', 'ut_shortcodes' ),
                                'param_name' => 'arrow_color',
                                'group' => 'Navigation Colors'
                            ),
                            array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__( 'Arrow Color Hover', 'ut_shortcodes' ),
                                'param_name' => 'arrow_color_hover',
                                'group' => 'Navigation Colors'
                            ),
                            array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__( 'Arrow Background Color', 'ut_shortcodes' ),
                                'param_name' => 'arrow_background_color',
                                'group' => 'Navigation Colors'
                            ),
                            array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__( 'Arrow Background Color Hover', 'ut_shortcodes' ),
                                'param_name' => 'arrow_background_color_hover',
                                'group' => 'Navigation Colors'
                            ),

                            array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__( 'Dot Color', 'ut_shortcodes' ),
                                'param_name' => 'dot_color',
                                'group' => 'Navigation Colors'
                            ),
                            array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__( 'Dot Color Hover / Active', 'ut_shortcodes' ),
                                'param_name' => 'dot_color_hover',
                                'group' => 'Navigation Colors'
                            ),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Maximize Icon Color', 'ut_shortcodes' ),
								'param_name'        => 'max_icon_color',
								'group'             => 'Navigation Colors'
						  	),
                    
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Maximize Icon Background Color', 'ut_shortcodes' ),
								'param_name'        => 'max_icon_bg_color',
								'group'             => 'Navigation Colors'
						  	),

                            /* css editor */
                            array(
                                'type' => 'css_editor',
                                'param_name' => 'css',
                                'group' => esc_html__( 'Design Options', 'ut_shortcodes' ),
                            )

                        )

                    )

                ); /* end mapping */

            }

        }

        function ut_create_inline_css( $id, $atts ) {

            extract( shortcode_atts( array(
                'max_icon_color' => '',
                'max_icon_bg_color' => '',
                'hover_caption' => '',
                'hover_color' => '',
                'hover_color_opacity' => '',
                'arrow_color' => '',
                'arrow_color_hover' => '',
                'arrow_background_color' => '',
                'arrow_background_color_hover' => '',
                'dot_color' => '',
                'dot_color_hover' => '',
                'caption_color' => '',
                'caption_text_transform' => '',
                'hover_caption_color' => '',
                'hover_caption_text_transform' => '',
                'zoom' => 'true'
            ), $atts ) );

            ob_start();

            ?>

            <style type="text/css" scoped>
                
                <?php if( $arrow_color): ?> 
                
                    #<?php echo $id; ?> .ut-next-gallery-slide {
                        color: <?php echo $arrow_color ?>;
                    }
                
                    #<?php echo $id; ?> .ut-prev-gallery-slide {
                        color: <?php echo $arrow_color ?>;
                    }
                
                <?php endif; ?> 
                
                <?php if( $arrow_color_hover): ?> 
                    
                    #<?php echo $id; ?> .ut-next-gallery-slide:hover {
                        color: <?php echo $arrow_color_hover ?>;
                    }
                
                    #<?php echo $id; ?> .ut-prev-gallery-slide:hover {
                        color: <?php echo $arrow_color_hover ?>;
                    }
                
                <?php endif; ?> 
                
                <?php if( $arrow_background_color): ?> 
                
                    #<?php echo $id; ?> .ut-next-gallery-slide {
                        background: <?php echo $arrow_background_color ?>;
                    }
                
                    #<?php echo $id; ?> .ut-prev-gallery-slide {
                        background: <?php echo $arrow_background_color ?>;
                    }
                
                <?php endif; ?> 
                
                <?php if( $arrow_background_color_hover): ?> 
                    
                    #<?php echo $id; ?> .ut-next-gallery-slide:hover {
                        background: <?php echo $arrow_background_color_hover ?>;
                    }
                
                    #<?php echo $id; ?> .ut-prev-gallery-slide:hover {
                        background: <?php echo $arrow_background_color_hover ?>;
                    }
                
                <?php endif; ?>
                
                <?php if( $max_icon_color ) : ?>     
                    
                    #<?php echo $id; ?> .ut-slider-maximize { 
                        color:<?php echo $max_icon_color; ?>;
                    }
                    
                <?php endif; ?>
                
                <?php if( $max_icon_bg_color ) : ?>     
                    
                    #<?php echo $id; ?> .ut-slider-maximize { 
                        background:<?php echo $max_icon_bg_color; ?>;
                    }
                    
                <?php endif; ?>
                
                <?php if( $dot_color): ?> 
                
                    #<?php echo $id; ?> .owl-theme .owl-dots .owl-dot span {
                        background: <?php echo $dot_color ?>;
                    }
                
                <?php endif; ?> 
                
                
                <?php if( $caption_color ): ?> 
                    
                    #<?php echo $id; ?> .ut-gallery-slider-caption {
                        color: <?php echo $caption_color ?>;
                    }
                
                <?php endif; ?> 
                
                <?php if( $caption_text_transform ): ?> 
                
                    #<?php echo $id; ?> 
                
                    .ut-gallery-slider-caption {
                        text-transform: <?php echo $caption_text_transform; ?>;
                    }
                
                <?php endif; ?> 
                
                <?php if( $hover_caption_color ) : ?> 
                    
                    #<?php echo $id; ?> .ut-gallery-slider-caption-wrap::before {
                        color: <?php echo $hover_caption_color; ?>;
                    }
                
                <?php endif; ?>
                
                <?php if( $hover_caption_text_transform ) : ?> 
                
                    #<?php echo $id; ?> .ut-gallery-slider-caption-wrap::before {
                        text-transform: <?php echo $hover_caption_text_transform; ?>;
                    }
                
                <?php endif; ?>
                
                <?php if( $hover_caption != 'on' ) : ?> 
                
                    #<?php echo $id; ?> .ut-gallery-slider-caption-wrap::before { content: ""; }
                
                <?php endif; ?>
                                
                <?php if( $hover_color ) : ?> 
                
                    #<?php echo $id; ?> .ut-gallery-slider-caption-wrap::after {
                        background-color: <?php echo $hover_color; ?>;
                    }
                
                <?php endif; ?>
                
                <?php if( $hover_color_opacity ) : ?> 
                
                    #<?php echo $id; ?> .ut-gallery-slider-caption-wrap:hover::after {
                        opacity: <?php echo $hover_color_opacity / 100; ?>
                    }
                
                <?php endif; ?>
                
                <?php if( $dot_color_hover): ?> #<?php echo $id; ?> 
                    
                    .owl-theme .owl-dots .owl-dot.active span,
                    
                    #<?php echo $id; ?> .owl-theme .owl-dots .owl-dot:hover span {
                        background: <?php echo $dot_color_hover ?>;
                    }
                
                <?php endif; ?>
                
                <?php if( $zoom == 'false' ) : ?>
                    
                     #<?php echo $id; ?> .ut-slider-maximize { display:none; }
                
                <?php endif; ?>
                
            </style>

            <?php

            return ob_get_clean();

        }

        function ut_create_inline_script( $id, $atts ) {

            /* no custom js for search excerpts */
            if ( is_search() ) {
                return;
            }

            extract( shortcode_atts( array(
                'type' => 'single',
                'caption' => 'on',
                'effect_in' => 'fadeIn',
                'effect_out' => 'fadeOut',
                'autoplay' => 'false',
                'autoplay_timeout' => 5000,
                'loop' => 'true',
                'nav' => 'true',
                'zoom' => 'true',
                'dots' => 'false',
                'number' => 1,
                'number_tablet' => 1,
                'lightbox' => 'yes',
            ), $atts ) );

            ob_start();

            ?>

            <script type="text/javascript">
                
                (function ($) {

                    $(document).ready( function () {

                        <?php if( $type == 'single' ) : ?>

                        var owl_<?php echo esc_attr( $id ); ?> = {
                            items: 1,
                            lazyLoad: true,
                            smartSpeed: 600,
                            animateIn: "<?php echo $effect_in; ?>",
                            animateOut: "<?php echo $effect_out; ?>",
                            autoplay: <?php echo $autoplay; ?>,
                            autoplayTimeout: <?php echo $autoplay_timeout; ?>,
                            loop: <?php echo $loop; ?>,
                            nav: false,
                            dots: <?php echo $dots; ?>,
                        };

                        <?php else : ?>

                        var owl_<?php echo esc_attr( $id ); ?> = {
                            items: <?php echo $number; ?>,
                            lazyLoad: true,
                            smartSpeed: 600,
                            animateIn: "<?php echo $effect_in; ?>",
                            animateOut: "<?php echo $effect_out; ?>",
                            autoplay: <?php echo $autoplay; ?>,
                            autoplayTimeout: <?php echo $autoplay_timeout; ?>,
                            loop: true,
                            nav: false,
                            dots: <?php echo $dots; ?>,
                            responsiveClass: true,
                            responsive: {
                                0: {
                                    items: 1
                                },
                                768: {
                                    items: <?php echo $number_tablet; ?>
                                },
                                1025: {
                                    items: <?php echo $number; ?>
                                }
                            }
                        };

                        <?php endif; ?>

                        var $owl_<?php echo esc_attr( $id ); ?> = $( "#<?php echo esc_attr( $id ); ?>" );

                        if ( $( "#<?php echo esc_attr( $id ); ?>" ).closest( '.vc_row[data-vc-full-width]' ).length && $( window ).width() > 1600 ) {

                            /* wait for f***king vc */
                            new ResizeSensor( $( "#<?php echo esc_attr( $id ); ?>" ).closest( '.vc_row[data-vc-full-width]' ), function () {

                                $owl_<?php echo esc_attr( $id ); ?>.owlCarousel( owl_<?php echo esc_attr( $id ); ?> );

                            } );

                        } else if ( $( "#<?php echo esc_attr( $id ); ?>" ).closest( '.vc_section[data-vc-full-width]' ).length && $( window ).width() > 1600 ) {

                            /* wait for f***king vc */
                            new ResizeSensor( $( "#<?php echo esc_attr( $id ); ?>" ).closest( '.vc_section[data-vc-full-width]' ), function () {

                                $owl_<?php echo esc_attr( $id ); ?>.owlCarousel( owl_<?php echo esc_attr( $id ); ?> );

                            } );

                        } else {

                            $owl_<?php echo esc_attr( $id ); ?>.owlCarousel( owl_<?php echo esc_attr( $id ); ?> );

                        }

                        <?php if( $lightbox != 'no' ) : ?>

                        if ( $().lightGallery ) {

                            var $lightgallery_<?php echo esc_attr( $id ); ?> = $( "#<?php echo esc_attr( $id ); ?>" );

                            var lightgallery_<?php echo esc_attr( $id ); ?> = {
                                selector: ".for-lightbox",
                                hash: false,
                                thumbnail: false,
                                exThumbImage: 'data-exthumbimage',
                                getCaptionFromTitleOrAlt: "true"
                            };

                            /* run lightgallery */
                            $lightgallery_<?php echo esc_attr( $id ); ?>.lightGallery( lightgallery_<?php echo esc_attr( $id ); ?> );

                            $owl_<?php echo esc_attr( $id ); ?>.on( 'changed.owl.carousel', function ( event ) {

                                $lightgallery_<?php echo esc_attr( $id ); ?>.data( 'lightGallery' ).destroy( true );
                                $lightgallery_<?php echo esc_attr( $id ); ?>.lightGallery( lightgallery_<?php echo esc_attr( $id ); ?> );

                            });

                        }

                        <?php endif; ?>

                    });

                } )( jQuery );
            </script>

            <?php

            return ob_get_clean();

        }

        function create_retina_url( $image ) {

            $extension = pathinfo( $image, PATHINFO_EXTENSION );

            /* retina url */
            $retina = str_replace( '.' . $extension, '@2x.' . $extension, $image );

            if ( file_exists( $retina ) !== false ) {

                return $retina;

            }

            return $image;

        }

        function create_image_slide( $image, $lightbox, $type, $caption ) {

            if ( empty( $image ) ) {
                return;
            }
            
            // get image by size
            $thumbnail = wp_get_attachment_image_src( $image, 'large' );

            // check if upscale is necessary since WordPress does not upscale
            if( get_option('large_crop') && ( isset( $thumbnail[1] ) && $thumbnail[1] < get_option('large_size_w') || isset( $thumbnail[2] ) && $thumbnail[2] < get_option('large_size_h') ) ) {

                // create new thumb
                $new_image = array();
                $new_image[0] = ut_resize( $thumbnail[0], get_option('large_size_w'), get_option('large_size_h'), true, true, true );
                $new_image[1] = get_option('large_size_w');
                $new_image[2] = get_option('large_size_h');

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
            $lightgallery = wp_get_attachment_image_src( $image, 'ut-lightbox' );
            
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
            
            if ( !empty( get_post( $image )->post_excerpt ) ) {
                
                $caption = $caption == 'on' ? '<div class="ut-gallery-slider-caption">' . get_post( $image )->post_excerpt . '</div>' : '';
                return '<div><figure data-caption="' . esc_attr( get_post( $image )->post_excerpt ) . '" class="ut-gallery-slider-caption-wrap"><a data-sub-html="#ut-image-caption-' . $image . '" data-exthumbimage="' . esc_url( $mini[0] ) . '" href="' . esc_url( $lightgallery[0] ) . '" class="for-lightbox ut-slider-maximize"><i class="Bklyn-Core-Maximize-3"></i></a><img alt="' . esc_attr( get_post( $image )->post_excerpt ) . '" class="item owl-lazy" data-src="' . esc_url( $thumbnail[0] ) . '" /></figure>' . $caption . '<div id="ut-image-caption-' . $image . '" class="ut-vc-images-lightbox-caption">' . get_post( $image )->post_excerpt . '</div></div>';

            } else {

                return '<div><figure class="ut-gallery-slider-caption-wrap"><a data-exthumbimage="' . esc_url( $mini[0] ) . '" href="' . esc_url( $lightgallery[0] ) . '" class="for-lightbox ut-slider-maximize"><i class="Bklyn-Core-Maximize-3"></i></a><img class="item owl-lazy" data-src="' . esc_url( $thumbnail[0] ) . '" /></figure></div>';

            }

        }

        function ut_create_shortcode( $atts, $content = NULL ) {

            /* enqueue scripts */
            $this->add_script = true;

            extract( shortcode_atts( array(
                'type' => 'single',
                'caption' => '',
                'slides' => '',
                'effect_in' => 'fadeIn',
                'effect_out' => 'fadeOut',
                'nav' => 'true',
                'lightbox' => 'yes',
                'class' => '',
                'css' => ''
            ), $atts ) );

            /* class array */
            $classes = array();

            /* extra element class */
            $classes[] = $class;

            /* unique ID */
            $id = uniqid( "ut_ms_" );
            $outer_id = uniqid( "ut_oms_" );

            /* start output */
            $output = '';

            /* attach js */
            $output .= $this->ut_create_inline_script( $id, $atts );

            /* attach css */
            $output .= ut_minify_inline_css( $this->ut_create_inline_css( $outer_id, $atts ) );

            $slides = explode( ',', $slides );

            if ( !empty( $slides ) && is_array( $slides ) ) {

                $output .= '<div class="ut-owl-gallery-slider-wrap">';

                $output .= '<div id="' . esc_attr( $id ) . '" class="ut-owl-gallery-slider owl-carousel ' . implode( ' ', $classes ) . '">';

                foreach ( $slides as $slide ) {

                    $output .= $this->create_image_slide( $slide, $lightbox, $type, $caption );

                }

                $output .= '</div>';

                if ( $nav == 'true' ) {

                    $output .= '<a href="#" data-for="' . esc_attr( $id ) . '" class="ut-prev-gallery-slide"><i class="Bklyn-Core-Left-2"></i></a>';
                    $output .= '<a href="#" data-for="' . esc_attr( $id ) . '" class="ut-next-gallery-slide"><i class="Bklyn-Core-Right-2"></i></a>';

                }

                $output .= '</div>';

            }

            return '<div id="' . esc_attr( $outer_id ) . '" class="wpb_content_element ' . apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->shortcode, $atts ) . '">' . $output . '</div>';

        }

        function register_scripts() {

            $min = NULL;

            if ( !WP_DEBUG ) {
                $min = '.min';
            }

            wp_register_script(
                'ut-owl-carousel',
                plugins_url( '../js/plugins/owlsider/js/owl.carousel' . $min . '.js', __FILE__ ),
                array( 'jquery' ),
                '2.0.0',
                true
            );

            wp_register_script(
                'ut-resize-sensor',
                plugins_url( '../js/plugins/element-queries/ResizeSensor' . $min . '.js', __FILE__ ),
                array( 'jquery' ),
                '2.0.0',
                true
            );

            wp_register_style(
                'ut-owl-carousel',
                plugins_url( '../js/plugins/owlsider/css/owl.carousel' . $min . '.css', __FILE__ ),
                array(),
                '2.0.0'
            );

            wp_register_style(
                'ut-owl-carousel-theme',
                plugins_url( '../js/plugins/owlsider/css/owl.theme.default' . $min . '.css', __FILE__ ),
                array(),
                '2.0.0'
            );



        }

        function enqueue_scripts() {

            if ( !$this->add_script ) {
                return;
            }

            wp_print_scripts( 'ut-owl-carousel' );
            wp_print_scripts( 'ut-resize-sensor' );
            wp_print_styles( 'ut-owl-carousel' );
            wp_print_styles( 'ut-owl-carousel-theme' );

        }

    }

}

new UT_Gallery_Slider;



if ( class_exists( 'WPBakeryShortCode' ) ) {

    class WPBakeryShortCode_ut_gallery_slider extends WPBakeryShortCode {

        /* add images to visual composer */
        public
        function singleParamHtmlHolder( $param, $value ) {

            $output = '';
            $param_name = isset( $param[ 'param_name' ] ) ? $param[ 'param_name' ] : '';

            if ( 'slides' === $param_name ) {

                $images_ids = empty( $value ) ? array() : explode( ',', trim( $value ) );
                $output .= '<ul class="attachment-thumbnails' . ( empty( $images_ids ) ? ' image-exists' : '' ) . '" data-name="' . $param_name . '">';
                foreach ( $images_ids as $image ) {
                    $img = wpb_getImageBySize( array( 'attach_id' => ( int )$image, 'thumb_size' => 'thumbnail' ) );
                    $output .= ( $img ? '<li>' . $img[ 'thumbnail' ] . '</li>' : '<li><img width="150" height="150" test="' . $image . '" src="' . vc_asset_url( 'vc/blank.gif' ) . '" class="attachment-thumbnail" alt="" title="" /></li>' );
                }
                $output .= '</ul>';
                $output .= '<a href="#" class="column_edit_trigger' . ( !empty( $images_ids ) ? ' image-exists' : '' ) . '">' . __( 'Add images', 'js_composer' ) . '</a>';

            }

            return $output;

        }

    }

}