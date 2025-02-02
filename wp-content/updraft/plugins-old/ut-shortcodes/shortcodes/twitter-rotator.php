<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Twitter_Rotator' ) && ut_is_plugin_active('ut-twitter/ut-twitter.php') ) {
	
    class UT_Twitter_Rotator {
        
        private $shortcode;
            
        function __construct() {
			
            /* shortcode base */
            $this->shortcode = 'ut_twitter_rotator';
            
            add_action( 'init', array( $this, 'ut_map_shortcode' ) );
            add_shortcode( $this->shortcode, array( $this, 'ut_create_shortcode' ) );	
            
		}
        
        function ut_map_shortcode( $atts, $content = NULL ) {
            
            if( function_exists( 'vc_map' ) ) {
                                
                vc_map(
                    array(
                        'name'            => esc_html__( 'Twitter Rotator', 'ut_shortcodes' ),
                        'base'            => $this->shortcode,
                        'category'        => 'Community',
                        'icon'            => UT_SHORTCODES_URL . '/admin/img/vc_icons/twitter.png',
                        'class'           => 'ut-vc-icon-module ut-community-module', 
                        'content_element' => true,
                        'params'          => array(
                            
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Tweets to display?', 'ut_shortcodes' ),
                                'admin_label'       => true,
                                'param_name'        => 'count',
                                'group'             => 'General'
                            ),
                    
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Show Avatar?', 'ut_shortcodes' ),
								'param_name'        => 'avatar',
								'group'             => 'General',
                                'value'             => array(
                                    esc_html__( 'no, thanks!', 'ut_shortcodes' )  => 'off',
                                    esc_html__( 'yes, please!', 'ut_shortcodes' ) => 'on'                                    
                                ),
						  	),                    
                            
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Tweets Rotation Speed', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'Set the speed of the tweets slideshow cycling, in milliseconds. e.g. 9000' , 'ut_shortcodes' ),
                                'param_name'        => 'speed',
                                'group'             => 'General'
                            ),                    
                    
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Autoplay Tweets?', 'ut_shortcodes' ),
								'param_name'        => 'autoplay',
								'group'             => 'General',
                                'value'             => array(
                                    esc_html__( 'no, thanks!', 'ut_shortcodes' )  => 'off',
                                    esc_html__( 'yes, please!', 'ut_shortcodes' ) => 'on'
                                ),
						  	),
                            
                            /* colors */
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Twitter Icon Color', 'ut_shortcodes' ),
								'param_name'        => 'tweet_icon_color',
								'group'             => 'Colors',
                                'dependency'        => array(
                                    'element'   => 'avatar',
                                    'value'     => 'off',
                                ),
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Tweet Color', 'ut_shortcodes' ),
								'param_name'        => 'tweet_text_color',
								'group'             => 'Colors'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Tweet Link Color', 'ut_shortcodes' ),
								'param_name'        => 'tweet_link_color',
								'group'             => 'Colors'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Tweet Link Hover Color', 'ut_shortcodes' ),
								'param_name'        => 'tweet_link_color_hover',
								'group'             => 'Colors'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Tweet Days Ago Color', 'ut_shortcodes' ),
								'param_name'        => 'tweet_date_color',
								'group'             => 'Colors'
						  	),
                    
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Arrow Color', 'ut_shortcodes' ),
								'param_name'        => 'arrow_color',
								'group'             => 'Colors'
						  	),
                    
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Arrow Hover Color', 'ut_shortcodes' ),
								'param_name'        => 'arrow_color_hover',
								'group'             => 'Colors'
						  	),    
                            
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Arrow Background Color', 'ut_shortcodes' ),
								'param_name'        => 'arrow_bg_color',
								'group'             => 'Colors'
						  	),
                    
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Arrow Background Hover Color', 'ut_shortcodes' ),
								'param_name'        => 'arrow_bg_color_hover',
								'group'             => 'Colors'
						  	),
                            
                            // Font Settings
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Tweet Font Size', 'ut_shortcodes' ),
                                'param_name'        => 'tweet_font_size',
                                'group'             => 'Tweet Font Settings',
                            ),
                            array(
								'type'              => 'range_slider',
								'heading'           => esc_html__( 'Tweet Line Height', 'ut_shortcodes' ),
								'param_name'        => 'tweet_line_height',
                                'group'             => 'Tweet Font Settings',
                                'value'             => array(
                                    'default' => '125',
                                    'min'     => '80',
                                    'max'     => '200',
                                    'step'    => '1',
                                    'unit'    => '%'
                                ),								
						  	),
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Tweet Font Weight', 'ut_shortcodes' ),
								'param_name'        => 'tweet_font_weight',
								'group'             => 'Tweet Font Settings',
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
						  	), 
                            
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Days Ago Font Weight', 'ut_shortcodes' ),
								'param_name'        => 'tweet_date_font_weight',
								'group'             => 'Tweet Font Settings',
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
        
        function twitterify( $tweet_text ) {
            
            $tweet_text = preg_replace("#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t< ]*)#", "\\1<a href=\"\\2\" target=\"_blank\">\\2</a>", $tweet_text);
            $tweet_text = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r< ]*)#", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $tweet_text);
            $tweet_text = preg_replace("/@(\w+)/", "<a href=\"http://www.twitter.com/\\1\" target=\"_blank\">@\\1</a>", $tweet_text);
            
            // hashtags
            $tweet_text = preg_replace("/#(\w+)/", "<a href=\"https://twitter.com/search?q=%23\\1\" target=\"_blank\">#\\1</a>", $tweet_text);
            return $tweet_text;
            
        }
        
        function ut_create_inline_css( $id, $atts ) {
            
            extract( shortcode_atts( array (
               
                // Colors
                'tweet_icon_color'       => '',
                'tweet_text_color'       => '',
                'tweet_link_color'       => '',
                'tweet_link_color_hover' => '',
                'tweet_date_color'       => '',
                
                // Font Settings
                'tweet_font_size'        => '',
                'tweet_line_height'      => '125',
                'tweet_font_weight'      => '',
                
                // Days Ago
                'tweet_date_font_weight' => '',
                
                // Arrow Colors
                'arrow_color'            => '',
                'arrow_color_hover'      => '',
                'arrow_bg_color'         => '',
                'arrow_bg_color_hover'   => '',

            ), $atts ) );
            
            ob_start();
            
            ?>   
            
            <style type="text/css" scoped>
                
                #<?php echo $id; ?>.ut-twitter-rotator .ut-rq-icon-tw { margin-bottom:20px; }
                
                <?php if( !empty( $tweet_icon_color ) ) : ?>     
                
                    #<?php echo $id; ?>.ut-twitter-rotator .ut-rq-icon-tw { color: <?php echo $tweet_icon_color; ?>; }
                    
                <?php endif; ?>
                
                <?php if( !empty( $tweet_text_color ) ) : ?>     
                    
                    #<?php echo $id; ?>.ut-twitter-rotator .ut-quote-comment { color: <?php echo $tweet_text_color; ?>;}
                    
                <?php endif; ?>
                
                <?php if( !empty( $tweet_link_color ) ) : ?>     
                    
                    #<?php echo $id; ?>.ut-twitter-rotator .ut-quote-comment a { color: <?php echo $tweet_link_color; ?>;}
                    
                <?php endif; ?>
                
                <?php if( !empty( $tweet_link_color_hover ) ) : ?>     
                    
                    #<?php echo $id; ?>.ut-twitter-rotator .ut-quote-comment a:hover { color: <?php echo $tweet_link_color_hover; ?>;}
                    #<?php echo $id; ?>.ut-twitter-rotator .ut-quote-comment a:active { color: <?php echo $tweet_link_color_hover; ?>;}
                    #<?php echo $id; ?>.ut-twitter-rotator .ut-quote-comment a:focus { color: <?php echo $tweet_link_color_hover; ?>;}
                    
                <?php endif; ?>
                
                <?php if( !empty( $tweet_font_size ) ) : ?>     
                    
                    #<?php echo $id; ?>.ut-twitter-rotator .ut-quote-comment { font-size:<?php echo $tweet_font_size; ?>;}
                    
                <?php endif; ?>
                
                <?php if( !empty( $tweet_line_height ) ) : ?>     
                    
                    #<?php echo $id; ?>.ut-twitter-rotator .ut-quote-comment { line-height:<?php echo $tweet_line_height; ?>%;}
                    
                <?php endif; ?>
                
                <?php if( !empty( $tweet_font_weight ) ) : ?>     
                    
                    #<?php echo $id; ?>.ut-twitter-rotator .ut-quote-comment { font-weight:<?php echo $tweet_font_weight; ?>;}
                    
                <?php endif; ?>
                
                <?php if( !empty( $tweet_date_color ) ) : ?>     
                    
                    #<?php echo $id; ?>.ut-twitter-rotator .ut-quote-name { color: <?php echo $tweet_date_color; ?>;}
                    
                <?php endif; ?>
                
                <?php if( !empty( $tweet_date_font_weight ) ) : ?>     
                    
                    #<?php echo $id; ?>.ut-twitter-rotator .ut-quote-name { font-weight: <?php echo $tweet_date_font_weight; ?>;}
                    
                <?php endif; ?>                
                
                
                <?php if( !empty( $arrow_color ) ) : ?>     
                    
                    #<?php echo $id; ?> .flex-direction-nav .flex-prev { color: <?php echo $arrow_color; ?>;}
                    #<?php echo $id; ?> .flex-direction-nav .flex-next { color: <?php echo $arrow_color; ?>;}
                    
                <?php endif; ?>
                
                <?php if( !empty( $arrow_color_hover ) ) : ?>     
                    
                    #<?php echo $id; ?> .flex-direction-nav .flex-prev:hover { color: <?php echo $arrow_color_hover; ?>;}
                    #<?php echo $id; ?> .flex-direction-nav .flex-next:hover { color: <?php echo $arrow_color_hover; ?>;}
                    
                <?php endif; ?>
                
                <?php if( !empty( $arrow_bg_color ) ) : ?>     
                    
                    #<?php echo $id; ?> .flex-direction-nav .flex-prev { background: <?php echo $arrow_bg_color; ?>;}
                    #<?php echo $id; ?> .flex-direction-nav .flex-next { background: <?php echo $arrow_bg_color; ?>;}
                    
                <?php endif; ?>
                
                <?php if( !empty( $arrow_bg_color_hover ) ) : ?>     
                    
                    #<?php echo $id; ?> .flex-direction-nav .flex-prev:hover { background: <?php echo $arrow_bg_color_hover; ?>;}
                    #<?php echo $id; ?> .flex-direction-nav .flex-next:hover { background: <?php echo $arrow_bg_color_hover; ?>;}
                    
                <?php endif; ?>
                
            </style>
            
            <?php
            
            return ob_get_clean();
            
        }        
        
        function ut_create_shortcode( $atts, $content = NULL ) {
            
            extract( shortcode_atts( array (
                'avatar'   => 'off',
                'count'    => '3',
                'speed'    => '9000',
                'autoplay' => 'off',
                
                // Colors
                'tweet_text_color'       => '',
                'tweet_link_color'       => '',
                'tweet_link_color_hover' => '',
                'tweet_date_color'       => '',
                
                // Arrow Colors
                'arrow_color'            => '',
                'arrow_color_hover'      => '',
                'arrow_bg_color'         => '',
                'arrow_bg_color_hover'   => '',
                
                
                'width'    => '', // deprecated
                'last'     => 'false', // deprecated
                'css'      => '',
                'class'    => '',
            ), $atts ) ); 
            
            $classes = array();
            
            /* deprecated */
            
                $grid = array( 
                    'third'     => 'ut-one-third',
                    'fourth'    => 'ut-one-fourth',
                    'half'      => 'ut-one-half',
                    'fullwdith' => '');

                $classes[] = $last == 'true' ? 'ut-column-last' : '';
                $classes[] = !empty($grid[$width]) ? $grid[$width] : '';
            
            /* deprecated */
            
            
            /* autoplay */
            $autoplay = ($autoplay == 'off') ? 'slideshow: false,' : NULL;
            
            /* twitter options */
            $twitter_options = ( is_array( get_option('ut_twitter_options') ) ) ? get_option('ut_twitter_options') : array();
            
            if( empty($twitter_options['oauth_access_token']) || empty($twitter_options['oauth_access_token_secret']) || empty($twitter_options['consumer_key']) || empty($twitter_options['consumer_secret']) ) {
        
                return '<div class="ut-alert themecolor">' . esc_html__( 'Please make sure you have entered all necessary Twitter API Keys under Dashboard -> Settings -> Twitter' , 'ut_shortcodes') . '</div>';
        
            } else {
                
                // Set access tokens here - see: https://dev.twitter.com/apps/ 
                $settings = array(
                    'oauth_access_token' => $twitter_options['oauth_access_token'],
                    'oauth_access_token_secret' => $twitter_options['oauth_access_token_secret'],
                    'consumer_key' => $twitter_options['consumer_key'],
                    'consumer_secret' => $twitter_options['consumer_secret']
                );                
                        
                // config
                $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
                $getfield = '?count=' . $count;
                $requestMethod = 'GET';
                                
                // try to get cached feeds to avoid hammering the twitter API
                $tweets = get_transient( 'ut_twitter_' . $twitter_options['consumer_key'] . '_' . $count );
                
                if( !$tweets || empty( $tweets ) ) {
                    
                    $twitter = new TwitterAPIExchange($settings);
                    $tweets  = $twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest();
                    $tweets  = json_decode( $tweets );                    
                
                }
                
                if( empty( $tweets ) ) {
                    
                    return esc_html__( 'An Error has occured, no Twitter Feeds are available' , 'ut_shortcodes' );
                    
                } else {
                    
                    // set unique ID for this rotator
                    $id = uniqid("ut_tweet_");
                    $css_id = uniqid("ut_tweet_css_");
                    
                    // start output 
                    $output = '';                    
                    
                    // custom CSS
                    $output .= $this->ut_create_inline_css( $css_id, $atts );
                    
                    // output for slider without avatar
                    if( $avatar == 'off' ) { 
                        
                        $script = '
                        <script type="text/javascript">
                        /* <![CDATA[ */
                        
                        (function($){
                
                            $(document).ready(function(){
                                                
                                $("#' . $id . '").flexslider({
                                    useCSS: false,  
                                    animation: "fade",
                                    directionNav:true,
                                    controlNav:false,        
                                    smoothHeight: false,
                                    animationLoop:true,
                                    ' . $autoplay . '
                                    slideshowSpeed: ' . $speed . ',
                                    prevText: "",
                                    nextText: ""   
                                });
                        
                            });
                
                        })(jQuery);
                        
                         /* ]]> */    
                        </script>';
                        
                        $quote_rotator  = '<div id="' . $css_id . '" class="ut-testimonials ut-twitter-rotator ' . implode( " ", $classes ) . '">';    
                            $quote_rotator  .= '<div id="' . $id . '" class="ut-rotate-quote-alt flexslider">';    
                                $quote_rotator .= '<ul class="slides">';
                                    
                                    foreach($tweets as $tweet) :
                                        
                                        $tweetdate = new DateTime($tweet->created_at);
                                        $tweetdate = strtotime($tweetdate->format('Y-m-d H:i:s'));
                                        $currentdate = strtotime(date('Y-m-d H:i:s'));  
                                        $days = ut_twitter_time_ago($tweetdate , $currentdate);
                                        
                                        $quote_rotator .= '<li><i class="ut-rq-icon-tw fa fa-twitter fa-3x"></i><div class="ut-quote-comment">' . $this->twitterify( $tweet->text ) . '</div><span class="ut-quote-name">' . $tweet->user->name . esc_html__(' about ' , 'ut_shortcodes') . $days . '</span></li>';
                                    
                                    endforeach;
                                                                    
                                $quote_rotator .= '</ul>';
                            $quote_rotator .= '</div>';
                        $quote_rotator .= '</div>';
                    
                    }
                    
                    // output for slider with avatar
                    if( $avatar == 'on' ) { 
                        
                        $script = '
                        <script type="text/javascript">
                        /* <![CDATA[ */
                        
                        (function($){
                
                            $(document).ready(function(){
                                
                                $("#avatarSlider_' . $id . '").flexslider({
                                    animation: "fade",
                                    directionNav:false,
                                    controlNav:false,
                                    smoothHeight: true,
                                    animationLoop:true,
                                    ' . $autoplay . '
                                    slideshowSpeed: ' . $speed . ',        
                                    slideToStart: 0,
                                    prevText: "",
                                    nextText: ""   
                                });
                                
                                $("#quoteSlider_' . $id . '").flexslider({
                                    animation: "slide",
                                    directionNav:true,
                                    controlNav:false,
                                    ' . $autoplay . '    
                                    smoothHeight: true,
                                    animationLoop:true,
                                    sync: "#avatarSlider_' . $id . '",
                                    slideshowSpeed: ' . $speed . ',            
                                    slideToStart: 0,
                                    prevText: "",
                                    nextText: ""   
                                });
                        
                            });
                
                        })(jQuery);
                        
                         /* ]]> */    
                        </script>';
                        
                        $quote_rotator  = '<div id="' . $css_id . '" class="ut-testimonials ut-twitter-rotator ' . implode( " ", $classes ) . '">';
                            $quote_rotator .= '<div id="avatarSlider_' . $id . '" class="ut-rotate-twitter-avatar flexslider">';    
                                $quote_rotator .= '<ul class="slides">';
                                    
                                    foreach($tweets as $tweet) :
                                    
                                        $avatar = preg_replace('/_normal/' , '' , $tweet->user->profile_image_url );
                                        $quote_rotator .= '<li><img alt="' . $tweet->user->name . '" class="ut-twitter-avatar" src="' . esc_url( $avatar ) . '" /></li>';
                                    
                                    endforeach;
                                    
                                $quote_rotator .= '</ul>';            
                            $quote_rotator .= '</div>';    
                        
                            $quote_rotator  .= '<div id="quoteSlider_' . $id . '" class="ut-rotate-quote">';    
                                $quote_rotator .= '<ul class="slides">';
                                    
                                    foreach($tweets as $tweet) :
                                        
                                        $tweetdate = new DateTime($tweet->created_at);
                                        $tweetdate = strtotime($tweetdate->format('Y-m-d H:i:s'));
                                        $currentdate = strtotime(date('Y-m-d H:i:s'));  
                                        $days = ut_twitter_time_ago($tweetdate , $currentdate);                                        
                                        
                                        $quote_rotator .= '<li><div class="ut-quote-comment">' . ut_twitterify($tweet->text) . '</div><span class="ut-quote-name">' . $tweet->user->name . esc_html__(' about ' , 'ut_shortcodes') . $days . '</span></li>';
                                    
                                    endforeach;                                
                                    
                                $quote_rotator .= '</ul>';
                            $quote_rotator .= '</div>';
                        $quote_rotator .= '</div>';
                    
                    }
                    
                }
                
            }
            
            if( !empty( $tweets ) && !isset( $tweets->errors[0]->code ) ) {
                
                set_transient( 'ut_twitter_' . $twitter_options['consumer_key'] . '_' . $count, $tweets, 60 * 10 );
                
            }
            
            $output .= $script . $quote_rotator;
            
            if( defined( 'WPB_VC_VERSION' ) ) { 
                
                return '<div class="wpb_content_element ' . apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->shortcode, $atts ) . '">' . $output . '</div>'; 
            
            }
                
            return $output;
            
        
        }
            
    }
    
    new UT_Twitter_Rotator;

}

