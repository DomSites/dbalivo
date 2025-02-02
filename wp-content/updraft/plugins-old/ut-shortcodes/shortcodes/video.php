<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Video_Shortcode' ) ) {
	
    class UT_Video_Shortcode {
        
        private $shortcode;
            
        function __construct() {
			
            // shortcode base
            $this->shortcode = 'ut_video_player';
            
            add_action( 'init', array( $this, 'ut_map_shortcode' ) );
            add_shortcode( $this->shortcode, array( $this, 'ut_create_shortcode' ) );	
            
            // ajax requests
            add_action( 'wp_ajax_nopriv_unite_get_video_player', array( $this, 'get_video_player' ) );
            add_action( 'wp_ajax_unite_get_video_player', array( $this, 'get_video_player' ) );            
            
		}
        
        /**
         * Render Video Player.
         *
         * @since    1.0.0
         */    
        public function get_video_player() {
        
            // get video to check
            $video = esc_url( $_POST['video'] );
            
            // needed variables 
            $embed_code = NULL;
            
            // check if youtube has been used 
            preg_match('~(?:http|https|)(?::\/\/|)(?:www.|)(?:youtu\.be\/|youtube\.com(?:\/embed\/|\/v\/|\/watch\?v=|\/ytscreeningroom\?v=|\/feeds\/api\/videos\/|\/user\S*[^\w\-\s]|\S*[^\w\-\s]))([\w\-]{11})[a-z0-9;:@#?&%=+\/\$_.-]*~i', trim($video) , $matches );        
                
            if( !empty( $matches[1] ) ) {
                $embed_code = '<iframe height="315" width="560" src="//www.youtube.com/embed/'.trim($matches[1]).'?wmode=transparent&vq=hd720&autoplay=1" wmode="Opaque" allowfullscreen="" frameborder="0"></iframe>';          
            }
            
            // no video found so far, try to create a player 
            if( empty($embed_code) ) {
                
                $video_embed = wp_oembed_get(trim($video));
                if( !empty($video_embed) ) {
                    $embed_code = $video_embed;            
                }
                
            }
            
            // still no video found , let's try to apply a shortcode
            if( empty( $embed_code ) ) {
                $embed_code = do_shortcode(stripslashes($video));
            
            }
             
            echo $embed_code;
            
            die(1);
        
        }
        
        function ut_map_shortcode( $atts, $content = NULL ) {
            
            if( function_exists( 'vc_map' ) ) {
                                
                vc_map(
                    array(
                        'name'            => esc_html__( 'Video Player', 'ut_shortcodes' ),
                        'base'            => $this->shortcode,
                        'icon'            => UT_SHORTCODES_URL . '/admin/img/vc_icons/video-player.png',
                        'category'        => 'Media',
                        'class'           => 'ut-vc-icon-module ut-media-module',
                        'content_element' => true,
                        'params'          => array(
                            
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Video URL', 'ut_shortcodes' ),
                                'description'       => esc_html__( '(required) Only the video URL eg "http://vimeo.com/62375781" or "https://youtu.be/TXQT1JKCQPo".', 'ut_shortcodes' ),
                                'param_name'        => 'url',
                                'group'             => 'General',
                                'admin_label'       => true,
                            ),
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Video Caption', 'ut_shortcodes' ),
                                'description'       => esc_html__( '(optional) Will be displayed below the video and poster.', 'ut_shortcodes' ),
                                'param_name'        => 'caption',
                                'group'             => 'General',
                                'class'             => 'ut-textarea-mid-size',
                            ),
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Video Caption Font Weight', 'ut_shortcodes' ),
								'param_name'        => 'caption_font_weight',
								'group'             => 'General',
                                'value'             => array(
                                    esc_html__( 'bold' , 'ut_shortcodes' ) => 'bold',
                                    esc_html__( 'normal' , 'ut_shortcodes' ) => 'normal',
                                ),                               
						  	),                    
                            array(
								'type'              => 'attach_image',
								'heading'           => esc_html__( 'Poster Image', 'ut_shortcodes' ),
                                'description'       => esc_html__( '(required) A poster image will be displayed until the user decides to play the video. This saves bandwidth and increases the page speed! If you use Youtube or Vimeo this field is optional since the script will use the broadcaster thumbnail as fallback.', 'ut_shortcodes' ),
								'param_name'        => 'poster',
								'group'             => 'General',
						  	),
                            array(
								'type'              => 'range_slider',
								'heading'           => esc_html__( 'Max. Width', 'ut_shortcodes' ),
								'param_name'        => 'maxwidth',
                                'group'             => 'General',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'value'             => array(
                                    'default' => '100',
                                    'min'     => '50',
                                    'max'     => '100',
                                    'step'    => '25',
                                    'unit'    => '%'
                                ),
						  	),
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Alignment', 'ut_shortcodes' ),
								'param_name'        => 'align',
								'group'             => 'General',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'value'             => array(
                                    esc_html__( 'none', 'ut_shortcodes' )   => '',
                                    esc_html__( 'left'  , 'ut_shortcodes' ) => 'left',
                                    esc_html__( 'center', 'ut_shortcodes' ) => 'center',
                                    esc_html__( 'right' , 'ut_shortcodes' ) => 'right',
                                ),
						  	),
                            
                            // box settings
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Show Video Box Shadow?', 'ut_shortcodes' ),
								'param_name'        => 'video_shadow',
								'group'             => 'Box Settings',
                                'value'             => array(
                                    esc_html__( 'no, thanks!', 'ut_shortcodes' )   => 'off',
                                    esc_html__( 'yes, please!', 'ut_shortcodes' )   => 'on'                                    
                                ),
						  	),    
                            
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Shadow Color', 'ut_shortcodes' ),
								'param_name'        => 'shadow_color',
								'group'             => 'Box Settings',
                                'dependency'        => array(
                                    'element' => 'video_shadow',
                                    'value'   => 'on',
                                ),
						  	),
                    
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Show Video Border?', 'ut_shortcodes' ),
								'param_name'        => 'video_border',
								'group'             => 'Box Settings',
                                'value'             => array(
                                    esc_html__( 'no, thanks!', 'ut_shortcodes' ) => 'off',
                                    esc_html__( 'yes, please!', 'ut_shortcodes' ) => 'on'                                    
                                ),
						  	),
                            
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Border Color', 'ut_shortcodes' ),
								'param_name'        => 'border_color',
								'group'             => 'Box Settings',
                                'dependency'        => array(
                                    'element' => 'video_border',
                                    'value'   => 'on',
                                ),
						  	),
                            
                            array(
								'type'              => 'range_slider',
								'heading'           => esc_html__( 'Video Box Padding', 'ut_shortcodes' ),
								'param_name'        => 'video_padding',
                                'group'             => 'Box Settings',
                                'value'             => array(
                                    'default'   => '20',
                                    'min'       => '0',
                                    'max'       => '40',
                                    'step'      => '1',
                                    'unit'      => 'px'
                                ),
                                'dependency'        => array(
                                    'element' => 'video_border',
                                    'value'   => 'on',
                                ),
						  	),
                        
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Video Caption Text Color', 'ut_shortcodes' ),
								'param_name'        => 'caption_color',
								'group'             => 'Box Settings',                                
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Overlay Color', 'ut_shortcodes' ),
								'param_name'        => 'overlay_color',
								'group'             => 'Box Settings',                                
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Video Play Icon Color', 'ut_shortcodes' ),
								'param_name'        => 'play_color',
								'group'             => 'Box Settings',                                
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Video Play Icon Background Color', 'ut_shortcodes' ),
								'param_name'        => 'play_bg_color',
								'group'             => 'Box Settings',                                
						  	),
                            
                            // CSS
                            array(
								'type'              => 'textfield',
								'heading'           => esc_html__( 'Class', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'ut_shortcodes' ),
								'param_name'        => 'class',
								'group'             => 'General'
						  	),
                    
                            // CSS Editor
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
                'url' => '',
                'caption' => '',
                'caption_font_weight' => 'bold',
                'caption_color' => '',
                'overlay_color' => '',
                'poster' => '',
                'maxwidth' => '',
                'align' => '',
                'video_border' => 'off',
                'video_shadow' => '',
                'shadow_color' => '',
                'video_padding' => '',
                'border_color' => '',
                'play_color' => '',
                'play_bg_color' => '',
                'class' => '' ,
                'css' => '',
            ), $atts ) ); 
            
            // extract url as fallback
            $url = ut_extract_url_from_string( $url );
            
            // we have no url, leave here 
            if( empty( $url ) ) {
                return esc_html__( 'No Video URL found!', 'ut_shortcodes' );
            } 
                        
            // settings
            $css_style = '';
            $image_icon = false;
            $classes = array();
            $classes[] = $class;
            
            $classes2 = array(); // module
            $classes3 = array(); // caption
            
            // video border
            if( $video_border == 'on' ) {
                $classes3[] = 'ut-video-module-border';
            }
            
            // video shadow
            if( $video_shadow == 'on' ) {
                $classes3[] = 'ut-video-module-shadow';
            }
            
            // video align
            if( $align ) {
                $classes[] = 'ut-shortcode-video-wrap-' . $align ;
            } 
            
            // get poster image
            $poster = wp_get_attachment_image_src( $poster, 'full' );
            $poster = !empty( $poster[0] ) ? '<img src="' . esc_url( $poster[0] ) . '">' : ''; 
            
            // poster is empty - use fallback ( currently only for youtube and vimeo )
            if( empty( $poster ) ) {
                
                // youtube
                if( ut_video_is_youtube( $url ) ) {
                
                    preg_match('~(?:http|https|)(?::\/\/|)(?:www.|)(?:youtu\.be\/|youtube\.com(?:\/embed\/|\/v\/|\/watch\?v=|\/ytscreeningroom\?v=|\/feeds\/api\/videos\/|\/user\S*[^\w\-\s]|\S*[^\w\-\s]))([\w\-]{11})[a-z0-9;:@#?&%=+\/\$_.-]*~i', trim( $url ) , $matches );

                    if( !empty( $matches[1] ) ) {

                        $poster = '<img src="//i.ytimg.com/vi/' . $matches[1] . '/maxresdefault.jpg" alt="United Themes Shortcode Plugin">';

                    }
                
                }                   
                    
                // vimeo
                if( ut_video_is_vimeo( $url ) ) {
                    
                    $vimeo_id = extract_vimeo_id( $url );
                    
                    if( $vimeo_id ) {
                    
                        $data = file_get_contents("http://vimeo.com/api/v2/video/$vimeo_id.json");
                        $data = json_decode( $data );
                        
                        if( !empty( $data[0]->thumbnail_large ) ) {
                        
                            $poster = '<img src="' . esc_url( $data[0]->thumbnail_large ) . '">';
                            
                        }
                    
                    }                    
                    
                }                
                
            }
            
            // still empty, let's use a final fallback
            if( empty( $poster ) ) {
                $poster = '<img src="' . UT_SHORTCODES_URL . '/img/placeholder/video-poster.jpg" alt="United Themes Shortcode Plugin">';
            }
                        
            // start output
            $output = '';
                        
            // set unique ID for this video
            $id = uniqid("ut_vs_");
            
            // custom CSS
            
            if( !empty( $maxwidth ) ) {
                
                // custom max width
                $css_style .= '#' . $id . '.ut-shortcode-video-wrap .ut-video-module { max-width: ' . $maxwidth . '% ; }';
            
            }
            
            if( $video_border == 'on' && !empty( $border_color ) ) {
                
                // border color
                $css_style .= '#' . $id . '.ut-shortcode-video-wrap .ut-video-module-border { border-color: ' . $border_color . '; }';    
                
            }
            
            if( $video_border == 'on' && !empty( $video_padding ) ) {
                
                // border spacing
                $css_style .= '#' . $id . '.ut-shortcode-video-wrap .ut-video-module-caption { padding: ' . $video_padding . 'px; }';    
                
            }
            
            if( $video_shadow == 'on' && !empty( $shadow_color ) ) {
                
                // shadow color
                $css_style .= '#' . $id . '.ut-shortcode-video-wrap .ut-video-module-shadow { color: ' . $shadow_color . '; }';    
                
            }
            
            if( $overlay_color ) {
                $css_style .= '#' . $id . '.ut-shortcode-video-wrap .ut-video-module-caption .ut-load-video::before { background: ' . $overlay_color . '; }';
            }
            
            if( $caption_font_weight ) {
                
                $css_style .= '#' . $id . '.ut-shortcode-video-wrap .ut-video-module-caption-text span { font-weight: ' . $caption_font_weight . '; }';
                
            }
            
            if( $caption_color ) {
                $css_style .= '#' . $id . '.ut-shortcode-video-wrap .ut-video-module-caption-text span { color: ' . $caption_color . '; }';                
            }
            
            if( $play_color ) {
                $css_style .= '#' . $id . '.ut-shortcode-video-wrap .ut-video-module-caption-text i { color: ' . $play_color . '; }';                
            }
            
            if( $play_bg_color ) {
                $css_style .= '#' . $id . '.ut-shortcode-video-wrap .ut-video-module-play-icon { background: ' . $play_bg_color . '; }';                
            }
            
            
            if( !empty( $css_style ) ) {
            
                $output .= ut_minify_inline_css( '<style type="text/css" scoped>' . $css_style . '</style>' ); 
            
            }            
            
            $output .= '<div id="' . $id . '" class="ut-shortcode-video-wrap ' . esc_attr( implode( " ", $classes ) ) . ' clearfix">';
            
                $output .= '<div class="ut-video-module ' . esc_attr( implode( " ", $classes2 ) ) . '">';
            
                    $output .= '<div class="ut-video-module-caption ' . esc_attr( implode( " ", $classes3 ) ) . '">';

                        $output .= '<a class="ut-load-video" data-video="' . trim( $url ) . '" href="#">';
                            
                            $output .= $poster;
                        
                            if( !empty( $caption ) ) {
                            
                                $output .= '<div class="ut-video-module-caption-text">';
                                
                                    $output .= '<div class="ut-video-module-inner-caption-text">';
                                
                                        $output .= '<div class="ut-video-module-play-icon"><i class="Bklyn-Core-Right-6" aria-hidden="true"></i></div>';
                                        $output .= '<span>' . $caption . '</span>';
                                
                                    $output .= '</div>';
                                
                                $output .= '</div>';

                            }
            
                        $output .= '</a>';
            
                        $output .= '</div>';
                    
                    $output .= '<div class="ut-video-module-loading">';
                        
                        $output .= '<div class="sk-fading-circle">';        
                            
                            for ($x = 1; $x <= 12; $x++) {
                                
                                $output .= '<div class="sk-circle'.$x.' sk-circle"></div>';
                                
                            }
                        
                        $output .= '</div>';
                    
                    $output .= '</div>';
            
                $output .= '</div>';
            
            $output .= '</div>';
            
            /* return player */
            if( defined( 'WPB_VC_VERSION' ) ) { 
                
                return '<div class="wpb_content_element ' . apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->shortcode, $atts ) . '">' . $output . '</div>'; 
            
            }
           
            return $output;
        
        }
            
    }

}

new UT_Video_Shortcode;