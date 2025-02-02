<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Hero_CSS' ) ) {	
    
    class UT_Hero_CSS extends UT_Custom_CSS {
        
        public function custom_css() {
            
            global $post;
            
            $ut_hero_type  = ut_return_hero_config( 'ut_hero_type', 'image' );
            $ut_hero_style = ut_return_hero_config( 'ut_hero_style' , 'ut-hero-style-1' );
            
            // fallback 
            $ut_hero_type = $ut_hero_type == 'dynamic' ? 'image' : $ut_hero_type;
            
            ob_start(); ?>
            
            <style id="ut-hero-custom-css" type="text/css">
                
                <?php
                
                /* 
                 * Hero Custom Height
                 */
                
                $var_offset = 0;
                $status = ut_page_option( 'ut_site_border_status' ); 
                
                if( ut_page_option( 'ut_top_header', 'hide' ) == 'show' ) {
                    $var_offset = 40;
                }
            
                if( ut_page_option( 'ut_top_header', 'hide' ) == 'hide' && ut_page_option('ut_site_border', 'hide' ) == 'show' && isset( $status['margin-top'] ) && $status['margin-top'] == 'on' ) {
                    $var_offset = 40;
                }
            
                if( ut_return_header_config('ut_navigation_scroll_position' , 'floating') == 'fixed' && ut_return_header_config('ut_navigation_state') == 'on') {
                    $var_offset = $var_offset + ut_return_header_config( 'ut_navigation_height', 80 );
                }
            
                if( $ut_hero_type == 'image' || $ut_hero_type == 'video' || $ut_hero_type == 'animatedimage' ) :
                    
                    // check old storage
                    if( ut_return_hero_config('ut_hero_type', 'image') == 'dynamic' ) : ?>
                        
                        #ut-hero.hero { 
                            min-height: calc( <?php echo ut_return_hero_config('ut_hero_dynamic_content_height','60'); ?>% - <?php echo $var_offset; ?>px);
                            height: calc( <?php echo ut_return_hero_config('ut_hero_dynamic_content_height','60'); ?>% - <?php echo $var_offset; ?>px);
                        }
                        
                        <?php if( ut_return_hero_config( 'ut_hero_dynamic_content_v_align', 'middle' ) == 'bottom' ) : ?>
                    
                            #ut-hero.hero .hero-holder .hero-inner.ut-hero-bottom { 
                                padding-bottom: <?php echo ut_return_hero_config( 'ut_hero_dynamic_content_margin_bottom', '40px' ); ?>; 
                            }

                        <?php endif; ?>
                                
                    <?php else : ?>    
                
                        #ut-sitebody:not(.ut-page-has-no-content) #ut-hero.hero { 
                            min-height: calc( <?php echo ut_return_hero_config('ut_hero_height','100'); ?>% - <?php echo $var_offset; ?>px); 
                            height: calc( <?php echo ut_return_hero_config('ut_hero_height','100'); ?>% - <?php echo $var_offset; ?>px); 
                        }
                
                        <?php if( $ut_hero_type == 'image' && ut_return_hero_config('ut_hero_rain_effect' , 'off') == 'on' || $ut_hero_type == 'image' && ut_return_hero_config('ut_hero_overlay_effect' , 'off') == 'on' ) : ?>
                
                            @media (min-width: 1025px) {
                
                                #ut-hero canvas:not(#ut-animation-canvas) {
                                    top: -<?php echo ( 100 - ut_return_hero_config('ut_hero_height','100') ); ?>% !important;
                                }
                                
                            }
                            
                            <?php if( unite_mobile_detection()->isMobile() ) : ?>
                
                                #ut-hero {
                                    background : transparent !important;
                                }
                            
                            <?php endif; ?>
                
                        <?php endif; ?>                        
                
                        <?php if( ut_return_hero_config( 'ut_hero_v_align', 'middle' ) == 'bottom' ) : ?>
                            
                            <?php 
                            
                            // check page custom value first
                            $ut_hero_v_align_margin_bottom = get_post_meta( $post->ID, 'ut_page_hero_v_align_margin_bottom', true );
                            
                            if( empty( $ut_hero_v_align_margin_bottom ) ) {
                                
                                $ut_hero_v_align_margin_bottom = ot_get_option( 'ut_global_hero_v_align_margin_bottom', '40px' ); 
                                
                            } ?>
            
                            #ut-hero.hero .hero-holder .hero-inner.ut-hero-bottom { 
                                padding-bottom: <?php echo $this->add_px_value( $ut_hero_v_align_margin_bottom ); ?>; 
                            }
                
                        <?php endif; ?>
                
                    <?php endif; ?>
                
                <?php endif; ?>
                
                
                
                <?php
                
                /* 
                 * Split Hero Height
                 */
                
                if( $ut_hero_type == 'splithero' ) : ?>
                    
                    #ut-hero.hero { 
                        min-height: calc( 100% - <?php echo $var_offset; ?>px);
                        height: calc( 100% - <?php echo $var_offset; ?>px);
                    }
                    
                <?php endif; ?>                
                
                
                <?php
                
                /* 
                 * Single Post Hero Height
                 */
                 
                if( is_single() && !is_singular( 'portfolio' ) && apply_filters( 'ut_show_hero', false ) && ut_collect_option('ut_post_hero_height', '50', 'ut_') < 100 ) : ?>
                    
                    #ut-hero.hero { 
                        height: calc(<?php echo ut_collect_option('ut_post_hero_height', '50', 'ut_'); ?>% - <?php echo $var_offset; ?>px) !important; 
                        min-height: calc(<?php echo ut_collect_option('ut_post_hero_height', '50', 'ut_'); ?>% - <?php echo $var_offset; ?>px) !important; 
                    }
                    
                <?php endif; ?>
                
                
                <?php
                
                /* 
                 * Archive Hero Height
                 */
                 
                if( is_archive() && ot_get_option('ut_archive_hero_height') ) : ?>
                    
                    #ut-hero.hero { 
                        height: calc(<?php echo ot_get_option('ut_archive_hero_height'); ?>% - <?php echo $var_offset; ?>px) !important; 
                        min-height: calc(<?php echo ot_get_option('ut_archive_hero_height'); ?>% - <?php echo $var_offset; ?>px) !important; 
                    }
                    
                <?php endif; ?>
                
                
                
                <?php if( ut_return_header_config('ut_navigation_scroll_position' , 'floating') == 'fixed' && ut_return_header_config('ut_navigation_state') == 'on') : ?>
                
                    @media (max-width: 767px) {
                        
                        #ut-hero.hero {
                            height: calc(100vh - 60px) !important;
                            min-height: calc(100vh - 60px) !important;
                        }
                        
                    }
                
                <?php endif; ?>               
                
                <?php
                
                /* 
                 * Hero Buttons
                 */                
                
                ?>
                .ut-hero-style-4 .hero-second-btn {
                    background: <?php echo $this->accent; ?>;
                }
                .ut-hero-style-10 .hero-second-btn,
                .ut-hero-style-9 .hero-second-btn,
                .ut-hero-style-8 .hero-second-btn,
                .ut-hero-style-7 .hero-second-btn,
                .ut-hero-style-6 .hero-second-btn,
                .ut-hero-style-5 .hero-second-btn,
                .ut-hero-style-3 .hero-second-btn,
                .ut-hero-style-1 .hero-second-btn,
                .ut-hero-style-2 .hero-second-btn {
                    border-color: <?php echo $this->accent; ?>;
                }
                
                .ut-hero-video-boxed.ut-hero-video-themecolor {
                    border-color: <?php echo $this->accent; ?>;
                }

                <?php
                
                /** 
                 * Hero Align
                 */                
                
                if( ut_return_hero_config('ut_hero_align' , 'center') && !is_archive() && !is_singular("post") && !apply_filters( 'ut_maintenance_mode_active', false ) ) : ?>
                
                    #ut-hero .hero-inner {
                        text-align: <?php echo ut_return_hero_config('ut_hero_align' , 'center'); ?>
                    }
               
                <?php endif; ?>
                
                
                <?php
                
                /** 
                 * Hero Background Color
                 */                
                
                if( ut_return_hero_config('ut_hero_background_color') ) : ?>
                
                    #ut-hero {
                        background: <?php echo ut_return_hero_config('ut_hero_background_color'); ?>
                    }
               
                <?php endif; ?>     
                
                    
                <?php
                
                /** 
                 * Hero Caption Slogan Color
                 */
                
                $ut_hero_caption_slogan_color = ut_return_hero_config('ut_hero_caption_slogan_color');
                
                if( $ut_hero_caption_slogan_color ) : ?>
                
                    .hero-description { 
                        color: <?php echo $ut_hero_caption_slogan_color; ?>;
                    }
                
                <?php endif; ?>
                
                
                <?php
                
                /** 
                 * Hero Caption Slogan Background Color
                 */
                
                $ut_hero_caption_slogan_background_color = ut_return_hero_config('ut_hero_caption_slogan_background_color');
                
                if( $ut_hero_caption_slogan_background_color && ut_return_hero_config('ut_hero_style' , 'ut-hero-style-1') != 'ut-hero-style-3' ) : ?>
                
                    .hero-description { 
                        background: <?php echo $ut_hero_caption_slogan_background_color; ?>;
                        padding:2px 6px; 
                        margin-bottom: 10px;
                    }
                
                <?php endif; ?>
                
                <?php
                
                /** 
                 * Hero Caption Title
                 */
                
                $ut_hero_caption_title_color = ut_return_hero_config( 'ut_hero_caption_title_color' );
                
                if( $ut_hero_caption_title_color ) : ?> 
                    
                    #ut-hero .hero-title { 
                        color: <?php echo $ut_hero_caption_title_color; ?>; 
                    }
                    
                    .ut-hero-style-4 .hero-title {
                        border-color: <?php echo $ut_hero_caption_title_color; ?>;
                    }
                
                    .ut-hero-style-6 .hero-title { 
                        border-color: <?php echo $ut_hero_caption_title_color; ?>;  
                    }
                    
                    .ut-hero-style-7 .hero-title { 
                        border-color: <?php echo $ut_hero_caption_title_color; ?>;
                    }
                    
                    .ut-hero-style-8 .hero-title { 
                        border-bottom-color: <?php echo $ut_hero_caption_title_color; ?>;
                        border-top-color: <?php echo $ut_hero_caption_title_color; ?>;
                    }
                    
                    .ut-hero-style-9 .hero-title { 
                        border-left-color: <?php echo $ut_hero_caption_title_color; ?>;
                        border-right-color: <?php echo $ut_hero_caption_title_color; ?>;
                    }
                    
                    .ut-hero-style-10 .hero-title { 
                        border-left-color: <?php echo $ut_hero_caption_title_color; ?>;
                        border-right-color: <?php echo $ut_hero_caption_title_color; ?>;
                    }
                    
                    .hero-title.ut-glow { 
                        color: <?php echo $ut_hero_caption_title_color; ?>;
                        text-shadow: 0 0 40px <?php echo $ut_hero_caption_title_color; ?>, 2px 2px 3px black; 
                    }
                    
                <?php endif; ?>                   
                
                <?php if( ut_return_hero_config( 'ut_hero_catchphrase_line_color' ) ) : ?>
                
                    .ut-hero-style-3 .hero-description { 
                        border: 3px solid <?php echo $ut_hero_caption_title_color; ?>;  
                    }
                
                <?php endif; ?>
                
                .ut-hero-style-5 .hero-description { 
                    border-color:<?php echo $this->accent; ?>; 
                }
                
                .hero-title span:not(.ut-word-rotator) { 
                    color:<?php echo $this->accent; ?> !important; 
                }
                
                .hero-title.ut-glow span:not(.ut-word-rotator) { 
                    color:<?php echo $this->accent; ?>; 
                    text-shadow: 0 0 40px <?php echo $this->accent; ?>, 2px 2px 3px black; 
                }
                
                .hero-title.ut-glow span:not(.ut-word-rotator) span {                     
                    color: <?php echo ut_return_hero_config( 'ut_hero_caption_title_color', '#FFF' ); ?>;
                    text-shadow: 0 0 40px <?php echo ut_return_hero_config( 'ut_hero_caption_title_color', '#FFF' ); ?>, 2px 2px 3px black;                    
                }
                
                <?php
                
                /** 
                 * Hero Caption Title Text Transform
                 */
                
                if( ut_return_hero_config('ut_hero_caption_title_uppercase' ) == 'on' ) : ?>
                
                    .hero-title { 
                        text-transform: uppercase !important;  
                    }
                
                <?php elseif( ut_return_hero_config('ut_hero_caption_title_uppercase' ) == 'off' )  : ?>
                    
                    .hero-title { 
                        text-transform: none !important; 
                    }
                
                <?php endif; ?>
                
                <?php
                
                /** 
                 * Hero Caption Title Text Transform
                 */
                
                if( isset( $this->ID ) && get_post_meta( $this->ID, 'ut_page_hero_font_size', true ) ) : ?>
                    
                    #ut-hero .hero-title { font-size: <?php echo $this->add_px_value( get_post_meta( $this->ID, 'ut_page_hero_font_size', true ) ); ?>; }                
                
                <?php endif; ?>
                
                
                <?php
                
                /** 
                 * Hero Caption Title Font Weight
                 */
                
                if( isset( $this->ID ) && get_post_meta( $this->ID, 'ut_page_hero_font_weight', true ) ) : ?>
                    
                    #ut-hero .hero-title { font-weight: <?php echo get_post_meta( $this->ID, 'ut_page_hero_font_weight', true ); ?>; }                
                
                <?php endif; ?>
                
                
                <?php
                
                /** 
                 * Hero Caption Title Line Height
                 */
                
                if( isset( $this->ID ) && get_post_meta( $this->ID, 'ut_page_hero_font_line_height', true ) ) : ?>
                    
                    #ut-hero .hero-title { line-height: <?php echo get_post_meta( $this->ID, 'ut_page_hero_font_line_height', true ); ?>; }                
                
                <?php endif; ?>
                
                
                
                <?php
                
                /** 
                 * Hero Caption Title Letterspacing
                 */
                
                $ut_hero_caption_title_letterspacing = ut_return_hero_config('ut_hero_caption_title_letterspacing');
                
                if( $ut_hero_caption_title_letterspacing ) : ?>
                    
                    .hero-title { 
                        letter-spacing: <?php echo $this->add_px_value( $ut_hero_caption_title_letterspacing ); ?>; 
                    }
                    
                <?php endif; ?>
                
                
                
                <?php
            
                    if( ot_get_option( 'ut_front_page_hero_websafe_font_style_mobile' ) ) {
                        
                        echo '@media (max-width: 767px) {';
                            
                            echo '#ut-sitebody .hero-title { line-height: ' . ut_get_option_attribute( 'ut_front_page_hero_websafe_font_style_mobile', 'line-height' ) .' !important; }';                        
                        
                        echo '}';

                    }
            
                    if( ot_get_option( 'ut_front_page_hero_websafe_font_style_tablet' ) ) {
                        
                        echo '@media (min-width: 768px) and (max-width: 1024px) {';
                        
                            echo '#ut-sitebody .hero-title { line-height: ' . ut_get_option_attribute( 'ut_front_page_hero_websafe_font_style_tablet', 'line-height' ) .' !important; }';       
                        
                        echo '}';

                    }
            
            
                ?>
                
                <?php
                
                /** 
                 * Hero Description Top Font Settings 
                 */
            
                if( is_home() || is_singular("post") ) {
                    
                    echo $this->font_style_css( array(
                        'selector' => '#ut-hero .hero-description',
                        'font-type' => ot_get_option('ut_blog_catchphrase_top_font_type', 'ut-websafe' ),   
                        'font-style' => ot_get_option('ut_blog_catchphrase_top_font_style', 'semibold' ),
                        'google-font-style' => ot_get_option('ut_google_blog_catchphrase_top_font_style'),
                        'websafe-font-style' => ot_get_option('ut_blog_catchphrase_top_websafe_font_style') 
                    ) );                    
                    
                } else {
                    
                    echo $this->font_style_css( array(
                        'selector' => '#ut-hero .hero-description',
                        'font-type' => ot_get_option('ut_front_catchphrase_top_font_type', 'ut-websafe' ),   
                        'font-style' => ot_get_option('ut_front_catchphrase_top_font_style', 'semibold' ),
                        'google-font-style' => ot_get_option('ut_google_front_catchphrase_top_font_style'),
                        'websafe-font-style' => ot_get_option('ut_front_catchphrase_top_websafe_font_style') 
                    ) );
                    
                }            
                
                /** 
                 * Hero Title Font Settings 
                 */
            
                if( is_front_page() || is_singular('portfolio') || is_page() || is_404() || is_archive() || is_author() || is_search() ) {
            
                    if( $ut_hero_type == 'splithero' && ot_get_option( 'ut_split_hero_custom_font' , 'no' ) == 'yes' ) {

                        echo $this->font_style_css( array(
                            'selector' => '.ut-hero-highlighted-header .hero-title',
                            'font-type' => ot_get_option('ut_split_hero_font_type', 'ut-websafe' ),   
                            'font-style' => ot_get_option('ut_split_hero_font_style', 'semibold' ),
                            'google-font-style' => ot_get_option('ut_google_split_hero_font_style'),
                            'websafe-font-style' => ot_get_option('ut_split_hero_websafe_font_style') 
                        ) );

                    } else {

                        echo $this->font_style_css( array(
                            'selector' => '.hero-title',
                            'font-type' => ot_get_option('ut_front_hero_font_type', 'ut-websafe' ),   
                            'font-style' => ot_get_option('ut_front_page_hero_font_style', 'semibold' ),
                            'google-font-style' => ot_get_option('ut_google_front_page_hero_font_style'),
                            'websafe-font-style' => ot_get_option('ut_front_page_hero_websafe_font_style') 
                        ) );                    

                    }
            
                }
            
                /** 
                 * Hero Description Bottom Font Settings 
                 */
                
                if( is_home() || is_singular("post") ) {
                    
                    echo $this->font_style_css( array(
                        'selector' => '#ut-hero .hero-description-bottom',
                        'font-type' => ot_get_option('ut_blog_catchphrase_font_type', 'ut-websafe' ),   
                        'font-style' => ot_get_option('ut_blog_catchphrase_font_style', 'semibold' ),
                        'google-font-style' => ot_get_option('ut_google_blog_catchphrase_font_style'),
                        'websafe-font-style' => ot_get_option('ut_blog_catchphrase_websafe_font_style') 
                    ) );
                    
                } else {
                    
                    echo $this->font_style_css( array(
                        'selector' => '#ut-hero .hero-description-bottom',
                        'font-type' => ot_get_option('ut_front_catchphrase_font_type', 'ut-websafe' ),   
                        'font-style' => ot_get_option('ut_front_catchphrase_font_style', 'semibold' ),
                        'google-font-style' => ot_get_option('ut_google_front_catchphrase_font_style'),
                        'websafe-font-style' => ot_get_option('ut_front_catchphrase_websafe_font_style') 
                    ) );
                    
                }
                
                /** 
                 * Hero Meta Description Bottom (Single Posts) Font Settings 
                 */
                if( $this->typography_css( '#ut-hero .ut-hero-meta-description-holder', ot_get_option( 'ut_hero_post_meta_description_websafe_font_style' ) ) ) {
                
                    echo $this->typography_css( '#ut-hero .ut-hero-meta-description-holder', ot_get_option( 'ut_hero_post_meta_description_websafe_font_style' ) );     
                
                }
            
                /** 
                 * Hero Description Bottom Page Custom Font Settings 
                 */
            
                if( $this->typography_css( '#ut-hero .hero-description-bottom', ut_return_hero_config( 'ut_hero_catchphrase_websafe_font_style' ) ) ) {
                
                    echo $this->typography_css( '#ut-hero .hero-description-bottom', ut_return_hero_config( 'ut_hero_catchphrase_websafe_font_style' ) );     
                
                }
                
                /** 
                 * Hero Description Top Page Custom Font Settings 
                 */
            
                if( $this->typography_css( '#ut-hero .hero-description', ut_return_hero_config( 'ut_hero_catchphrase_websafe_top_font_style' ) ) ) {
                
                    echo $this->typography_css( '#ut-hero .hero-description', ut_return_hero_config( 'ut_hero_catchphrase_websafe_top_font_style' ) );     
                
                }
                
                ?>
                
                <?php if( ut_return_hero_config('ut_hero_catchphrase_color') ) : ?>
                
                    .hero-description-bottom { color: <?php echo ut_return_hero_config('ut_hero_catchphrase_color'); ?>;}                
                
                <?php endif; ?>
                
                
                <?php if( get_post_meta( $post->ID, 'ut_page_caption_description_margin', true ) ) : ?>
                
                    .hdb { margin-top: <?php echo $this->add_px_value( get_post_meta( $post->ID, 'ut_page_caption_description_margin', true ) ); ?>;}                
                
                <?php endif; ?>
                
                
                <?php
                
                /**
                 * Hero Primary Button Style for all pages  
                 */
                             
                if( ut_return_hero_config('ut_main_hero_button_style' , 'default' ) == 'custom') {
                    
                    echo $this->create_button('.hero-btn' , ut_return_hero_config('ut_main_hero_button_settings') );
                    
                } 
                
                ?>
                
                <?php
                
                /**
                 * Hero Secondary Button Style for all pages  
                 */
                             
                if( ut_return_hero_config('ut_second_hero_button_style' , 'default' ) == 'custom') {
                    
                    echo $this->create_button('.hero-second-btn' , ut_return_hero_config('ut_second_hero_button_settings') );
                    
                } 
                
                ?>
                
                
                <?php
                
                /** 
                 * Hero Border Bottom 
                 */
                
                if( ut_return_hero_config('ut_hero_buttons_margin') ) {
                    
                    echo '#ut-hero .hero-btn-holder { margin-top: ' , $this->add_px_value( ut_return_hero_config('ut_hero_buttons_margin', 0 ) ) . '; }';
                    
                }
                
                ?>
                
                
                <?php
                
                /** 
                 * Hero Border Bottom 
                 */
                if( ut_return_hero_config('ut_hero_border_bottom' , 'off' ) == 'on') {
                   
                    if( ut_return_hero_config('ut_hero_overlay') == 'on') {
                        
                        echo '#ut-hero .parallax-overlay { border-bottom: ' , $this->add_px_value( ut_return_hero_config('ut_hero_border_bottom_width' , 1 ) ) , ' '.ut_return_hero_config('ut_hero_border_bottom_style' , 'solid' ) , ' ' , ut_return_hero_config('ut_hero_border_bottom_color', $this->accent ) , '; }';
                        
                    } else {
                        
                        echo '#ut-hero { border-bottom: ' , $this->add_px_value( ut_return_hero_config('ut_hero_border_bottom_width' , 1 ) ) , ' '.ut_return_hero_config('ut_hero_border_bottom_style' , 'solid' ) , ' ' , ut_return_hero_config('ut_hero_border_bottom_color', $this->accent ) , '; }';
                        
                    }
                   
                }
                
                ?>
                
                
                <?php 
                
                /** 
                 * Fancy Border
                 */
            
                if( ut_return_hero_config( 'ut_hero_fancy_border', 'off' ) == 'on') : ?>
                
                    #ut-hero .ut-fancy-border { 
                        display: block; 
                        position: absolute; 
                        bottom: 0; 
                        left: 0; 
                        width: 100%; 
                        background:<?php echo ut_return_hero_config( 'ut_hero_fancy_border_background_color' , '#FFF' ); ?>; 
                        border-bottom:<?php echo ut_return_hero_config( 'ut_hero_fancy_border_size' , '10px' ); ?>;
                        border-color:<?php echo ut_return_hero_config( 'ut_hero_fancy_border_color' , $this->accent ); ?>; 
                        border-style: dashed; 
                        z-index:9999; 
                    }
                
                <?php endif; ?>
                
                
                <?php
                
                /** 
                 * Hero Background Image for Tablet Slider 
                 */
                if( $ut_hero_type == 'tabs' ) {
                    
                    echo $this->global_headline_font_style('.ut-tablets-title', ut_return_hero_config('ut_tabs_headline_style', 'semibold') );
                    
                    /* hero type tabs uses a different header image */            
                    echo $this->css_background( '.hero .parallax-scroll-container', ut_return_hero_config('ut_hero_image', '' , true ) );
                    
                } ?>
                
                <?php
                
                /**
                 * Hero Background Image 
                 */
                 
                if( $ut_hero_type == 'image' || $ut_hero_type == 'splithero' ) :
                    
                    $ut_hero_image = ut_return_hero_config('ut_hero_image');                            
            
                    // featured image as hero background
                    if( is_single() && !is_singular( 'portfolio' ) ) {
                        
                        $ut_hero_image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
                        $ut_hero_image = ut_resize( $ut_hero_image, 1920, 1080, false );                        
                        
                    }
            
                    if( is_array( $ut_hero_image ) && !empty( $ut_hero_image['background-image'] ) ) {

                        echo $this->css_background( '.hero .parallax-scroll-container' , $ut_hero_image );

                    } elseif( !empty( $ut_hero_image ) && !is_array( $ut_hero_image ) ) {

                        echo '.hero .parallax-scroll-container { background-image: url(' , esc_url( $ut_hero_image ) , '); }'. "\n";

                    }
                        
                    // Mobile Versions
                    $ut_hero_image_tablet = ut_return_hero_config('ut_hero_image_tablet');
                    $ut_hero_image_mobile = ut_return_hero_config('ut_hero_image_mobile');
                    
                    // only for desktop responsive 
                    if( !unite_mobile_detection()->isMobile() && !unite_mobile_detection()->isTablet() ) {
            
                        if( is_array( $ut_hero_image_tablet ) && !empty( $ut_hero_image_tablet['background-image'] ) ) {

                            echo '@media (min-width: 768px) and (max-width: 1024px) {';

                                echo $this->css_background( '.hero .parallax-scroll-container' , $ut_hero_image_tablet );

                            echo '}';

                        }

                        if( is_array( $ut_hero_image_mobile ) && !empty( $ut_hero_image_mobile['background-image'] ) ) {

                            echo '@media (max-width: 767px) {';

                                echo $this->css_background( '.hero .parallax-scroll-container' , $ut_hero_image_mobile );

                            echo '}';

                        }
                    
                    }
                    
                    // only for tablet
                    if( unite_mobile_detection()->isTablet() && is_array( $ut_hero_image_tablet ) && !empty( $ut_hero_image_tablet['background-image'] ) ) {
                        
                        echo $this->css_background( '.hero .parallax-scroll-container' , $ut_hero_image_tablet );
                        
                    }

                    // only for mobile
                    if( !unite_mobile_detection()->isTablet() && unite_mobile_detection()->isMobile() && is_array( $ut_hero_image_mobile ) && !empty( $ut_hero_image_mobile['background-image'] ) ) {
                        
                        echo $this->css_background( '.hero .parallax-scroll-container' , $ut_hero_image_mobile );
                        
                    } 
            
                endif; ?>
                                
                
                <?php
                
                /**
                 * Video Poster 
                 */
                
                if( $ut_hero_type == 'video' ) :
                    
                    /* video poster image for mobile devices */
                    $ut_video_poster = ut_return_hero_config('ut_video_poster');
                    
                    if( !empty( $ut_video_poster ) && ( ut_return_hero_config('ut_video_source' , 'youtube') == 'youtube' || ut_return_hero_config('ut_video_source' , 'youtube') == 'vimeo' ) || !empty( $ut_video_poster ) && unite_mobile_detection()->isMobile() ) {
                        
                        echo '#ut-hero.hero { 
                            background-image: url(' . esc_url( $ut_video_poster ) . ');
                            background-size: cover !important;
                            background-position: center center;
                        }'. "\n";                    
                        
                    }
                    
            
                    // Mobile Versions
                    $ut_video_poster_tablet = ut_return_hero_config('ut_video_poster_tablet');
                    $ut_video_poster_mobile = ut_return_hero_config('ut_video_poster_mobile');
                    
                    // only for desktop responsive 
                    if( !unite_mobile_detection()->isMobile() && !unite_mobile_detection()->isTablet() ) {
            
                        if( !empty( $ut_video_poster_tablet ) ) {

                            echo '@media (min-width: 768px) and (max-width: 1024px) {';
                                    
                                echo '#ut-hero.hero { 
                                    background-image: url(' . esc_url( $ut_video_poster_tablet ) . ');
                                    background-size: cover !important;
                                    background-position: center center;
                                }'. "\n"; 

                            echo '}';

                        }

                        if( !empty( $ut_video_poster_mobile ) ) {

                            echo '@media (max-width: 767px) {';
                                    
                                echo '#ut-hero.hero { 
                                    background-image: url(' . esc_url( $ut_video_poster_mobile ) . ');
                                    background-size: cover !important;
                                    background-position: center center;
                                }'. "\n";
                            

                            echo '}';

                        }
                    
                    }
            
                    // only for tablet
                    if( unite_mobile_detection()->isTablet() && !empty( $ut_video_poster_tablet ) ) {
                        
                        echo '@media (min-width: 768px) and (max-width: 1024px) {';

                            echo '#ut-hero.hero { 
                                background-image: url(' . esc_url( $ut_video_poster_tablet ) . ');
                                background-size: cover !important;
                                background-position: center center;
                            }'. "\n"; 

                        echo '}';
                        
                        
                    }

                    // only for mobile
                    if( !unite_mobile_detection()->isTablet() && unite_mobile_detection()->isMobile() && !empty( $ut_video_poster_mobile ) ) {
                        
                        echo '@media (max-width: 767px) {';
                                    
                            echo '#ut-hero.hero { 
                                background-image: url(' . esc_url( $ut_video_poster_mobile ) . ');
                                background-size: cover !important;
                                background-position: center center;
                            }'. "\n";


                        echo '}';                        
                        
                    } 
            
                    // hide video controls on mobile
                    if( unite_mobile_detection()->isMobile() ) {
                                        
                        echo '#ut-hero.ut-video-control {
                            display:none !important;
                        }';
                    
                    }
                    
                endif; ?>
                
                
                <?php
                
                /** 
                 * Video Position for selfhosted Videos
                 */
                 
                if( ut_return_hero_config('ut_video_source' , 'youtube') == 'selfhosted' && !unite_mobile_detection()->isMobile() && ut_return_hero_config('ut_video_containment' , 'hero') == 'body' && is_front_page() ) {                
                    echo '.ut-video-container { position:fixed; }';                               
                }
                
                ?>
                
                <?php
                
                /**
                 * Video Position Fix
                 */
                
                if( !is_home() ) {
                             
                    echo '#wrapper_mbYTP_ut-background-video-hero { min-width: 100% !important; }';
                
                } ?>
                
                
                <?php 
                
                /**
                 * Split Hero 
                 */
                
                if( $ut_hero_type == 'splithero' ) {
                    
                    $split_image_max_width = ut_return_hero_config('ut_hero_split_image_width');
                    
                    /* check if value is available */
                    $split_image_max_width = empty( $split_image_max_width ) ? '60' : $split_image_max_width;
                    
                    echo '#ut-hero .ut-split-image { max-width: ' , $split_image_max_width , '% !important; }'. "\n";
                    
                
                }
                
                ?>
                
                
                <?php
                
                /** 
                 * Split Hero - Video Padding 
                 */
                 
                if( $ut_hero_type == 'splithero' ) {
                
                    echo '.ut-hero-video-boxed { padding: ' , $this->add_px_value( ut_return_hero_config('ut_hero_split_video_box_padding', '20') ) , '; }';                
                
                }
                
                ?>
                
                
                <?php
                
                /** 
                 * Hero Holder Position
                 */
            
                if( ut_return_header_config( 'ut_header_layout', 'default' ) != 'side' ) {
            
                    if( ut_return_header_config('ut_navigation_state') != 'off' && ut_return_header_config('ut_navigation_scroll_position' , 'floating') == 'floating' || ut_return_header_config('ut_navigation_scroll_position' , 'floating') == 'fixed' && ut_return_header_config('ut_navigation_state') == 'on_transparent' ) {

                        echo '

                        #ut-hero:not(.slider) .hero-holder { padding-top:' .  ut_return_header_config( 'ut_navigation_height', 80 ) . 'px; }

                        @media (max-width: 767px) {

                            #ut-hero:not(.slider) .hero-holder { padding-top:60px; }

                        }';                

                    }
                
                }
            
                ?>
                
                
                <?php
                
                /**
                 * Animated Image 
                 */
                 
                if( $ut_hero_type == 'animatedimage' ) {
                    
                    $header_image = ut_return_hero_config('ut_hero_animated_image');
                    $mobile_image = ut_return_hero_config('ut_hero_animated_image_mobile');
                    
                    if( !empty( $header_image ) ) :
                    
                        echo '@media (min-width: 1025px) {
                        
                            #ut-hero .parallax-scroll-container { 
                                background-position: 0px 0px;
                                background-repeat: repeat-x;
                                background-image: url("' . esc_url( $header_image ) . '"); 
                            }

                            #ut-hero.ut-hero-animated-background .parallax-scroll-container {
                                opacity:0;
                            }

                            #ut-hero.ut-hero-animated-background .parallax-scroll-container.ut-hero-ready {
                                opacity:1;
                            }

                            #ut-hero .parallax-scroll-container.ut-animated-image-background {
                                background-size: unset !important;
                            }
                        
                        }';
                    
                    endif; 
                    
                    if( !empty( $mobile_image ) ) : ?>
                        
                        @media (max-width: 1024px) {
                            
                            #ut-hero .parallax-scroll-container { 
                                background-position: 0px 0px;
                                background-repeat: repeat-x;
                                background-size: cover;
                                background-image: url("<?php echo esc_url( $mobile_image ); ?>"); 
                            }                            
                            
                        }
                    
                    <?php elseif( !empty( $header_image ) ) : ?>    
                
                        @media (max-width: 1024px) {
                            
                            #ut-hero .parallax-scroll-container { 
                                background-position: 0px 0px;
                                background-repeat: repeat-x;
                                background-size: cover;
                                background-image: url("<?php echo esc_url( $header_image ); ?>"); 
                            }                            
                            
                        }
                
                    <?php endif;
                        
                }
                
                ?>
                
                
                <?php
                
                /**
                 * Background Slider Arrow Colors 
                 */
                 
                if( $ut_hero_type == 'slider' ) {
                    
                    if( ut_return_hero_config('ut_background_slider_arrow_background_color') ) {
                        
                        echo '#ut-hero .ut-flex-control { background: ' , ut_return_hero_config('ut_background_slider_arrow_background_color') , '; }';
                        echo '#ut-hero .ut-flex-control:visited { background: ' , ut_return_hero_config('ut_background_slider_arrow_background_color') , '; }';
                        
                    }
                    
                    if( ut_return_hero_config('ut_background_slider_arrow_background_color_hover') ) {
                        
                        echo '#ut-hero .ut-flex-control:hover { background: ' , ut_return_hero_config('ut_background_slider_arrow_background_color_hover') , '; }';
                        echo '#ut-hero .ut-flex-control:focus { background: ' , ut_return_hero_config('ut_background_slider_arrow_background_color_hover') , '; }';
                        echo '#ut-hero .ut-flex-control:active{ background: ' , ut_return_hero_config('ut_background_slider_arrow_background_color_hover') , '; }';
                        
                    }
                    
                    if( ut_return_hero_config('ut_background_slider_arrow_color') ) {
                        
                        echo '#ut-hero .ut-flex-control { color: ' , ut_return_hero_config('ut_background_slider_arrow_color') , '; }';
                        echo '#ut-hero .ut-flex-control:visited { color: ' , ut_return_hero_config('ut_background_slider_arrow_color') , '; }';
                        
                    }
                    
                    if( ut_return_hero_config('ut_background_slider_arrow_color_hover') ) {
                        
                        echo '#ut-hero .ut-flex-control:hover { color: ' , ut_return_hero_config('ut_background_slider_arrow_color_hover') , '; }';
                        echo '#ut-hero .ut-flex-control:focus { color: ' , ut_return_hero_config('ut_background_slider_arrow_color_hover') , '; }';
                        echo '#ut-hero .ut-flex-control:active{ color: ' , ut_return_hero_config('ut_background_slider_arrow_color_hover') , '; }';
                        
                    }
                    
                }
                
                ?>
                
                <?php
                
                /**
                 * Fancy Slider 
                 */
                
                if( $ut_hero_type == 'transition' ) {
                    
                    $slider_height = ut_return_hero_config('ut_fancy_slider_height' , '60' ) > 100 ? 100 : ut_return_hero_config('ut_fancy_slider_height' , '60' );
                    echo '#ut-sitebody:not(.ut-page-has-no-content) #ut-hero { height: ' , $slider_height , '%; min-height: ' , $slider_height , '%; }';    
                
                }
                
                ?>
                
                
                
                <?php
                
                /**
                 * Hero Overlay Styling 
                 */

                if( ut_return_hero_config('ut_hero_overlay_color') ) {
                   
                   echo '.hero .parallax-overlay { background-color: rgba(' . $this->hex_to_rgb( ut_return_hero_config( 'ut_hero_overlay_color' ) ) . ' , ' , ut_return_hero_config('ut_hero_overlay_color_opacity' , '0.8') , ' ) !important; }'. "\n";
                   
                }
                
                ?>                
                
                
                <?php
                
                /** 
                 * Hero Overlay
                 */ 
                
                if( ut_return_hero_config( 'ut_hero_overlay_pattern_style', 'style_one' ) == 'custom' ) {
                    
                    echo $this->css_background( '.parallax-overlay-pattern.custom' , ut_return_hero_config('ut_hero_overlay_custom_pattern') );
                
                }
                
                ?>
                
               
                <?php 
                
                 /**
                 * Hero Scroll Down
                 */                
                
                ?>
                    
                .hero-down-arrow a { 
                    color: <?php echo ut_return_hero_config('ut_hero_down_arrow_color', '#FFF' ); ?>; 
                }
                
                .hero-down-arrow a:hover, 
                .hero-down-arrow a:focus, 
                .hero-down-arrow a:active { 
                    color: <?php echo ut_return_hero_config('ut_hero_down_arrow_color', '#FFF' ); ?> 
                }
                
                <?php if( ut_return_hero_config('ut_hero_down_arrow_scroll_position') != '' ) : ?>
                
                    .hero-down-arrow { 
                        
                        left: <?php echo ut_return_hero_config('ut_hero_down_arrow_scroll_position'); ?>%;
                        
                        <?php if( ut_return_hero_config('ut_hero_down_arrow_scroll_position') == '0' && ut_return_hero_config( 'ut_hero_width', 'centered' ) == 'centered' ) : ?>
                            
                            margin-left: 10px;        
                        
                        <?php endif; ?>
                                                
                        <?php if( ut_return_hero_config('ut_hero_down_arrow_scroll_position') == '100' && ut_return_hero_config( 'ut_hero_width', 'centered' ) == 'centered' ) : ?>
                            
                            margin-left: -26px;        
                        
                        <?php endif; ?>                       
                         
                    }
                    
                    @media (min-width: 1025px) {
                            
                        <?php if( ut_return_hero_config('ut_hero_down_arrow_scroll_position') == '0' && ut_return_hero_config( 'ut_hero_width', 'centered' ) == 'fullwidth' ) : ?>

                            .hero-down-arrow {        
                                margin-left: 30px;        
                            }

                        <?php endif; ?> 
                        
                        <?php if( ut_return_hero_config('ut_hero_down_arrow_scroll_position') == '100' && ut_return_hero_config( 'ut_hero_width', 'centered' ) == 'fullwidth' ) : ?>
                            
                            .hero-down-arrow {
                                margin-left: -46px;        
                            }
                        <?php endif; ?> 
                        
                    }
                
                    @media (max-width: 1024px) {
                        
                        <?php if( ut_return_hero_config('ut_hero_down_arrow_scroll_position') == '0' && ut_return_hero_config( 'ut_hero_width', 'centered' ) == 'fullwidth' ) : ?>

                            .hero-down-arrow {        
                                margin-left: 10px;        
                            }

                        <?php endif; ?>
                        
                        <?php if( ut_return_hero_config('ut_hero_down_arrow_scroll_position') == '100' && ut_return_hero_config( 'ut_hero_width', 'centered' ) == 'fullwidth' ) : ?>
                            .hero-down-arrow {
                                margin-left: -26px;        
                            }
                        <?php endif; ?>
                        
                    }
                
                <?php endif; ?>
                
                <?php if( $ut_hero_type == 'video' && ut_return_hero_config('ut_video_mute_button' , 'hide') == 'show' || is_single() && 'video' == get_post_format() || $ut_hero_type == 'image' && ut_return_hero_config('ut_hero_rain_effect' , 'off') == 'on' && ut_return_hero_config('ut_hero_rain_sound' , 'off')== 'on' ) : ?>
                    
                    .hero-down-arrow { 
                        bottom: 50px;
                    }

                <?php else : ?>  
                    
                    <?php if( ut_return_hero_config('ut_hero_down_arrow_scroll_position_vertical') != '' ) : ?>
                
                        .hero-down-arrow { 
                            bottom: <?php echo $this->add_px_value( ut_return_hero_config('ut_hero_down_arrow_scroll_position_vertical') ); ?>;
                        }
                    
                    <?php endif; ?>
                
                <?php endif; ?>
                
                
                <?php 
                
                /**
                 * No Result Page Hero
                 */
                 
                if( is_search() && ot_get_option('ut_search_hero_background_image') ) : 
                    
                    echo $this->css_background( '.search-no-results .hero .parallax-scroll-container' , ot_get_option('ut_search_hero_background_image') );
                    echo $this->css_background( '.search-results .hero .parallax-scroll-container' , ot_get_option('ut_search_hero_background_image') );
                
                 endif; ?>
                 
                <?php 
                
                /**
                 * 404 Page Hero
                 */
                 
                if( is_404() && ot_get_option('ut_404_hero_background_image') ) : 
                    
                    echo $this->css_background( '.error404 .hero .parallax-scroll-container' , ot_get_option('ut_404_hero_background_image') );
                
                 endif; ?>
                 
                <?php 
                
                /**
                 * Archive Page Hero
                 */
                 
                if( is_archive() ) : 
                    
                    $ut_hero_image = '';
            
                    if( have_posts() ) : 
                    
                        while( have_posts() ) : the_post(); 
                            
                            if( wp_get_attachment_url( get_post_thumbnail_id() ) ) {
                                
                                $ut_hero_image = wp_get_attachment_url( get_post_thumbnail_id() );
                                break;
                                
                            }
            
                        endwhile; 
                    
                    endif;
                    
                    rewind_posts();    
            
                    $ut_hero_image = !empty( $ut_hero_image ) ? $ut_hero_image : '';
                    
                    // check if global image is available
                    $ut_global_hero_image = ot_get_option( 'ut_archive_hero_background_image' );
                    
                    if( is_array( $ut_global_hero_image ) && !empty( $ut_global_hero_image['background-image'] ) ) {
                        
                        $ut_hero_image = $ut_global_hero_image;
                        
                    }
                    
                    if( is_array( $ut_hero_image ) && !empty( $ut_hero_image['background-image'] ) ) {
                        
                        echo $this->css_background( '.hero .parallax-scroll-container' , $ut_hero_image );
                        
                    } elseif( !empty( $ut_hero_image ) && !is_array( $ut_hero_image ) ) {
                        
                        echo '.hero .parallax-scroll-container { background-image: url(' , esc_url( $ut_hero_image ) , '); }'. "\n";
                    
                    }
            
                 endif; ?>
                 
                 <?php 
                
                /**
                 * Maintance Page Hero
                 */
                 
                if( apply_filters( 'ut_maintenance_mode_active', false ) && ot_get_option('ut_maintenance_hero_background_image') ) : 
                    
                    echo $this->css_background( '.ut-bklyn-maintenance .hero .parallax-scroll-container' , ot_get_option('ut_maintenance_hero_background_image') );
                
                 endif; ?>
                
                
            </style>
            
            <?php 
 
            echo $this->minify_css( ob_get_clean() );
        
        }  
            
    }

}

new UT_Hero_CSS;