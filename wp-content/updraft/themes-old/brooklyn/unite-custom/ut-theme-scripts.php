<?php 

if (!defined('ABSPATH')) {
    exit; // exit if accessed directly
}

if ( ! function_exists( 'ut_search_sub_array' ) ) :

    function ut_search_sub_array( $array, $key, $value ) {   
        
        foreach( $array as $subarray ){  
                    
            if (isset( $subarray[$key] ) && preg_replace( '/\s+/', '', strtolower($subarray[$key]) ) == $value ) {
                
                return $subarray;
                
            }        
            
        } 
        
        return false;
        
    }

endif;

if ( ! function_exists( 'ut_create_google_font_link' ) ) :
    
    function ut_create_google_font_link() {
        
        global $wpdb;
        
        /* needed vars */
        $google_url = '//fonts.googleapis.com/css?family=';
                
        /* available google fonts */
        $google_fonts = ut_recognized_google_fonts();
        
        /* catch for all google typography settings */
        $option_keys = array();
        
        /* already loaded fonts*/
        $already_loaded = array();
        
        /* custom array of all affected option tree options */
        $google_options = array(
            
            'ut_body_font_type' => 'ut_google_body_font_style',
            'ut_blockquote_font_type' => 'ut_google_blockquote_font_style',
            'ut_front_hero_font_type' => 'ut_google_front_page_hero_font_style',
            'ut_blog_catchphrase_font_type' => 'ut_google_blog_catchphrase_font_style',
            'ut_front_catchphrase_font_type' => 'ut_google_front_catchphrase_font_style',
            'ut_blog_catchphrase_top_font_type' => 'ut_google_blog_catchphrase_top_font_style',
            'ut_front_catchphrase_top_font_type' => 'ut_google_front_catchphrase_top_font_style',
            'ut_blog_hero_font_type' => 'ut_google_blog_hero_font_style',
            'ut_global_headline_font_type' => 'ut_global_google_headline_font_style',
            'ut_global_lead_font_type' => 'ut_google_lead_font_style',
            'ut_global_h1_font_type' => 'ut_h1_google_font_style',
            'ut_global_h2_font_type' => 'ut_h2_google_font_style',
            'ut_global_h3_font_type' => 'ut_h3_google_font_style',
            'ut_global_h4_font_type' => 'ut_h4_google_font_style',
            'ut_global_h5_font_type' => 'ut_h5_google_font_style',
            'ut_global_h6_font_type' => 'ut_h6_google_font_style',
            'ut_csection_header_font_type' => 'ut_csection_header_google_font_style',
            'ut_global_portfolio_title_font_type' => 'ut_google_portfolio_title_font_style',
            'ut_global_portfolio_category_font_type' => 'ut_google_portfolio_category_font_style',
            'ut_footer_widgets_headline_font_type' => 'ut_footer_widgets_headline_google_font_style',
            'ut_global_blog_widgets_headline_font_type' => 'ut_global_blog_widgets_headline_google_font_style',
            'ut_global_navigation_font_type' => 'ut_global_navigation_google_font_style',
            'ut_global_header_text_logo_font_type' => 'ut_global_header_text_google_font_style',
            'ut_global_page_headline_font_type' => 'ut_global_page_google_headline_font_style'
        
        );
        
        /* fill option keys */
        foreach( $google_options as $key => $google_option) {
            
            if( ot_get_option( $key , 'ut-font' ) == 'ut-google' ) {
                
                $option_keys[$key] = ot_get_option($google_option);
            
            }
            
        }  
        
        /* query meta values */
        /* $meta_keys = $wpdb->get_results( $wpdb->prepare("
            SELECT p.ID, pm.meta_value FROM {$wpdb->postmeta} pm
            LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
            WHERE pm.meta_key = '%s' 
            AND p.post_type = '%s'
        ", 'ut_section_header_font_type' , 'page')); */        
        
        /* create query string */        
        foreach( $option_keys as $key => $option ) {
            
            $google_fonts = ut_search_sub_array( ut_recognized_google_fonts(), 'family', $option['font-family'] );
            
            if( $google_fonts ) {
                
                /* reset */
                $query_args   = array();
                $query_string = '';
                
                /* replace whitespace with + */
                $family = preg_replace("/\s+/" , '+' , $google_fonts['family'] );
                
                /* query args */
                $query_args['family'] = $family . ':' . ( !empty($option['font-weight']) ? $option['font-weight'] : '' ) . ( !empty( $option['font-style'] ) ? '|' . $option['font-style'] : '' );
                
                if( !empty( $option['font-subset'] ) ) {
                    $query_args['subset'] = $option['font-subset'];
                }
                
                $query_string = add_query_arg( $query_args, $google_url );
                
                if( !in_array( $query_string, $already_loaded ) ) {
                
                    wp_enqueue_style( $key, $query_string );
                    $already_loaded[] = $query_string;
                    
                }
                    
            }
                    
        }
        
    }
    
endif;






if ( ! function_exists( 'unite_scripts' ) ) {

    function unite_scripts() {
        
        global $wp_query;
        
        $min = NULL;
            
        if( !WP_DEBUG ){
            $min = '.min';
        }
        
        /*
         * CSS
         */
        
        /* Google Fonts */
        ut_create_google_font_link(); 
        
        /* Fonts */
        wp_enqueue_style(
            'ut-main-font-face',
            THEME_WEB_ROOT . '/css/ut-fontface' . $min . '.css'
        ); 
        
        /* Font Awesome */
        wp_enqueue_style(
            'ut-fontawesome',
            THEME_WEB_ROOT . '/css/font-awesome' . $min . '.css'
        ); 
        
        /* Brooklyn Icons */
        wp_enqueue_style(
            'ut-bklynicons',
            THEME_WEB_ROOT . '/css/bklynicons/bklynicons.css'
        ); 
        
        /* Responsive Grid */
        wp_enqueue_style(
            'ut-responsive-grid',
            THEME_WEB_ROOT . '/css/ut-responsive-grid' . $min . '.css' 
        );
        
        /* Animate CSS */
        wp_enqueue_style(
            'ut-animate',
            THEME_WEB_ROOT . '/css/ut.animate' . $min . '.css'
        );
        
        /* Superfish */
        wp_enqueue_style(
            'ut-superfish',
            THEME_WEB_ROOT . '/css/ut-superfish' . $min . '.css'
        );
        
        /* Fancy Slider */
        if( ut_return_hero_config( 'ut_hero_type' ) == 'transition' ) {
            
            wp_enqueue_style(
                'ut-fancy-slider',
                THEME_WEB_ROOT . '/css/ut-fancyslider' . $min . '.css'
            );
            
        }        
        
        /* Flexslider */
        wp_enqueue_style(
            'ut-flexslider',
            THEME_WEB_ROOT . '/css/flexslider' . $min . '.css'
        );
            
        /* Lightgallery */
        wp_enqueue_style(
            'ut-lightgallery',
            THEME_WEB_ROOT . '/assets/vendor/lightGallery/css/lightgallery' . $min . '.css'
        );            
        
        /* Brookyln CSS */
        wp_enqueue_style(
            'ut-main-style',
            get_stylesheet_uri(),
            array(), 
            UT_THEME_VERSION
        );
        
        /* Brookyln Theme CSS 
        wp_enqueue_style(
            'ut-theme-style',
            THEME_WEB_ROOT . '/css/ut.theme' . $min . '.css',
            array('ut-main-style'), 
            UT_THEME_VERSION
        ); */
        
        
        /*
         * JS
         */
        
        /* jquery */
        wp_enqueue_script( 'jquery' );
        
        /* browser and mobile detection */
        wp_enqueue_script( 
            'modernizr',
            THEME_WEB_ROOT . '/js/modernizr' . $min . '.js', 
            array('jquery'), 
            '2.6.2'
        );
        
        /* preloader */
        if( ot_get_option('ut_use_image_loader') == 'on' ) {
            
            $loader_for = ot_get_option('ut_use_image_loader_on');
            $loader_match = false;
            
            if( !empty( $loader_for ) && is_array( $loader_for ) ) :    
            
                foreach( $loader_for as $key => $conditional ) {
                
                    if( $conditional() && $conditional != 'is_singular' ) {

                        $loader_match = true;
                        
                        /* front page gets handeled as a page too */
                        if( $conditional == 'is_page' && is_front_page() ) {
                            
                            $loader_match = false;
                        
                        } elseif( $conditional == 'is_single' && is_singular('portfolio') ) {
                           
                            $loader_match = false;
                                
                        } else {
                        
                            /* we have a match , so we can stop the loop */
                            break;
                        
                        }
                        
                    }
                    
                    if( $conditional( 'portfolio' ) && $conditional == 'is_singular' ) {
                        
                        $loader_match = true;
                        break;
                    
                    }
                
                }
            
            endif;
            
            if( $loader_match ) : 
            
                wp_enqueue_script(
                    'ut-loader',
                    THEME_WEB_ROOT . '/js/jquery.queryloader2' . $min . '.js',
                    array('jquery'),
                    '2.9.0',
                    false
                );                 
            
            endif;
                        
        }
        
        /* overlay animation effect */
        if( ut_return_hero_config( 'ut_hero_overlay_effect', 'off' ) == 'on' ) {
            
            
            wp_enqueue_script(
                'ut-greensock-tweenlite', 
                THEME_WEB_ROOT . '/js/greensock/TweenLite' . $min . '.js', 
                array(), 
                '1.0',
                true 
            );            
            
            wp_enqueue_script(
                'ut-greensock-easepack',
                THEME_WEB_ROOT . '/js/greensock/EasePack' . $min . '.js',
                array('ut-greensock-tweenlite'),
                '1.0',
                true
            );
                        
            wp_enqueue_script(
                'ut-animation-frame', 
                THEME_WEB_ROOT . '/js/greensock/AnimationFrame.js', 
                array('ut-greensock-easepack'),
                '1.0',
                true
            );
            
            /* connecting dots overlay */
            if( ut_return_hero_config( 'ut_hero_overlay_effect_style' ) == 'dots' ) {
                
                wp_enqueue_script(
                    'ut-connecting-dots',
                    THEME_WEB_ROOT . '/js/canvas.connectingdots' . $min . '.js', 
                    array('ut-animation-frame'),
                    '1.0', 
                    true
                );            
                
            }
            
            /* rising bubbles overlay */
            if( ut_return_hero_config( 'ut_hero_overlay_effect_style' ) == 'bubbles' ) {
                
                wp_enqueue_script(
                    'ut-rising-bubbles',
                    THEME_WEB_ROOT . '/js/canvas.risingbubbles' . $min . '.js', 
                    array('ut-animation-frame'),
                    '1.0',
                    true
                );
                
            }
            
        }
        
        /* rain effect */
        if( ut_return_hero_config( 'ut_hero_rain_effect' , 'off' ) == 'on' ) {
            
            wp_enqueue_script(
                'ut-rain',
                THEME_WEB_ROOT . '/js/rainyday' . $min . '.js', 
                array('jquery'),
                '1.0',
                true
            );
                        
        }
        
        /* fancy slider */
        if( ut_return_hero_config( 'ut_hero_type' ) == 'transition' ) {
            
            wp_enqueue_script(
                'ut-fancy-slider',
                THEME_WEB_ROOT . '/js/ut-fancyslider' . $min . '.js',
                array('jquery'),
                '1.0',
                true
            );
            
        }
        
        /* background video player */
        if( !unite_mobile_detection()->isMobile() && ut_return_hero_config('ut_hero_type') == 'video' && ut_return_hero_config('ut_video_source' , 'youtube') == 'youtube' || !unite_mobile_detection()->isMobile() && ut_return_hero_config('ut_hero_type') == 'tabs' && ut_return_hero_config('ut_video_containment', 'hero') == 'body' ) :
            
            wp_enqueue_script(
                'ut-bgvid',
                THEME_WEB_ROOT . '/js/jquery.mb.YTPlayer' . $min . '.js',
                array('jquery'),
                '1.7.15', 
                true
            ); 
            
        endif;
        
        
        /* Selfhosted Video Player */
        if( ut_return_hero_config('ut_video_source' , 'youtube') == 'selfhosted' ) {
           
            wp_enqueue_script(
                'ut-video',
                THEME_WEB_ROOT . '/js/ut-videoplayer' . $min . '.js', 
                array('jquery'),
                '1.0',
                true
            );
            
        }        
        
        /* superfish navigation */
        wp_enqueue_script(
            'ut-superfish',
            THEME_WEB_ROOT . '/js/superfish' . $min . '.js', 
            array('jquery'), 
            '1.7.4',
            true 
        );
        
        /* Main Libraries */
        wp_enqueue_script( 
            'ut-scriptlibrary',
            THEME_WEB_ROOT . '/js/ut-scriptlibrary' . $min . '.js', 
            array('jquery'), 
            UT_THEME_VERSION
        );
        
        /* Lightbox Script */
        wp_enqueue_script(
            'ut-lightgallery-js',
            THEME_WEB_ROOT . '/assets/vendor/lightGallery/js/lightgallery-all' . $min . '.js' , 
            array('jquery'),
            '1.2.6',
            true            
        );             
        
        
        /* Comment Reply*/
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
            
            wp_enqueue_script( 'comment-reply' ); 
        
        } 
        
        /* Custom JavaScripts */
        wp_enqueue_script(
            'unitedthemes-init', 
            THEME_WEB_ROOT . '/js/ut-init' . $min . '.js',
            array('jquery','ut-scriptlibrary'), 
            UT_THEME_VERSION, 
            true
        );
        
         /* retina logos with fallback */
        $ut_activate_page_hero = get_post_meta( get_the_ID() , 'ut_activate_page_hero' , true );  
         
        $sitelogo_retina = !is_front_page() && !is_home() && ( !apply_filters( 'ut_show_hero', false ) ) ? ( ut_return_logo_config( 'ut_site_logo_alt_retina' ) ? ut_return_logo_config( 'ut_site_logo_alt_retina' ) : ut_return_logo_config( 'ut_site_logo_retina' ) ) : ut_return_logo_config( 'ut_site_logo_retina' );                        
        $alternate_logo_retina = ut_return_logo_config( 'ut_site_logo_alt_retina' ) ? ut_return_logo_config( 'ut_site_logo_alt_retina' ) : ut_return_logo_config( 'ut_site_logo_retina' );
         
        $retina_logos = array(
            'sitelogo_retina'       => $sitelogo_retina, 
            'alternate_logo_retina' => $alternate_logo_retina,
            'overlay_sitelogo_retina' => ot_get_option("ut_overlay_logo_retina"), 
        );
         
        wp_localize_script('unitedthemes-init' , 'retina_logos' , $retina_logos );
                
        /* pre loader settings */
        $loader_settings = array( 
            'loader_logo'       => ot_get_option( 'ut_image_loader_logo' ), 
            'style'             => ot_get_option( 'ut_image_loader_style', 'style_one' ), 
            'loader_percentage' => ot_get_option( 'ut_show_loader_percentage', 'on' ), 
            'loader_text'       => ot_get_option( 'ut_image_loader_text', 'loading' ),
            'text_logo'         => '<div class="site-logo"><h1 class="logo">' . get_bloginfo( "name" ) . '</h1></div>'
        );
        
        wp_localize_script('unitedthemes-init' , 'preloader_settings' , $loader_settings );
        
        
        /* site settings */
        $site_settings = array(
            'type'              =>  ot_get_option( 'ut_site_layout', 'onepage' ),
            'navigation'        =>  ut_return_header_config( 'ut_header_layout', 'default' ),
            'lg_download'       =>  ot_get_option( 'ut_lightgallery_download', 'false' ) ? false : true,
        );
        
        wp_localize_script('unitedthemes-init' , 'site_settings' , $site_settings );
        
        
        
        /* set volume for rain effect */        
        if( ut_return_hero_config('ut_hero_rain_sound' , 'off') == 'on' ) {
        
            wp_localize_script( 'wp-mediaelement', '_wpmejsSettings', array(
                'pluginPath' => includes_url( 'js/mediaelement/', 'relative' ),
                'startVolume' => 0.1
            ) );
        
        }
        
        /* remove fontawesome */
        if( function_exists('vc_set_as_theme') ) {
            wp_deregister_style( 'font-awesome' ); /* theme has own library call */
        }
        
           
    }    
    
    add_action( 'wp_enqueue_scripts', 'unite_scripts' );
    
}