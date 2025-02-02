<?php

/**
 * One Page Blog Config
 *
 * @access    private
 * @since     4.2.0
 * @version   1.0.0
 */ 

function _ut_blog_hero_config( $config ) {
    
    if( !( is_home() && ot_get_option( 'ut_site_layout', 'onepage' ) == 'onepage' ) ) {
        return $config;
    }
    
    /*new settings array */
    $config = array(
        'ut_hero_type' => 'ut_blog_header_type'        
    );
    
    
    /**
     * Hero Content Elements 
     */     
    $config = array_merge( array(
        
        'ut_hero_custom_html'    => 'ut_blog_custom_slogan',
        'ut_hero_caption_slogan' => 'ut_blog_expertise_slogan',
        'ut_hero_caption_title'  => 'ut_blog_company_slogan',
        'ut_hero_catchphrase'    => 'ut_blog_catchphrase'
        
        ), $config    
    
    );
    
    
    /**
     * Hero Content Elements Colors and Fonts
     */     
    $config = array_merge( array(
        
        'ut_hero_caption_slogan_color'            => 'ut_blog_expertise_slogan_color',
        'ut_hero_caption_slogan_background_color' => 'ut_blog_expertise_slogan_background_color',
        'ut_hero_caption_slogan_margin_bottom'    => 'ut_blog_expertise_margin',
        'ut_hero_caption_title_color'             => 'ut_blog_company_slogan_color',
        'ut_hero_caption_title_glow'              => 'ut_blog_company_slogan_glow',
        'ut_hero_caption_title_uppercase'         => 'ut_blog_company_slogan_uppercase',
        'ut_hero_caption_title_letterspacing'     => 'ut_blog_company_slogan_letterspacing',
        'ut_hero_catchphrase_color'               => 'ut_blog_catchphrase_color',
        'ut_hero_catchphrase_line_color'          => 'ut_blog_catchphrase_line_color',
        'ut_hero_catchphrase_websafe_font_style'  => 'ut_blog_catchphrase_websafe_font_style',
        'ut_hero_catchphrase_top_websafe_font_style'  => 'ut_blog_catchphrase_top_websafe_font_style',
        
        ), $config    
    
    );
    
    
    /**
     * Hero Main Button
     */     
    $config = array_merge( array(
        
        'ut_main_hero_button'          => 'ut_blog_scroll_to_main',           
        'ut_main_hero_button_style'    => 'ut_blog_scroll_to_main_style',
        'ut_main_hero_button_settings' => 'ut_blog_hrbtn',  
    
        ), $config    
    
    );
    
    
    /**
     * Hero Secondary Button
     */     
    $config = array_merge( array(
        
        'ut_second_hero_button'          => 'ut_blog_second_button',
        'ut_second_hero_button_text'     => 'ut_blog_second_button_text',
        'ut_second_hero_button_url'      => 'ut_blog_second_button_url',
        'ut_second_hero_button_target'   => 'ut_blog_second_button_target',
        'ut_second_hero_button_style'    => 'ut_blog_second_button_style',
        'ut_second_hero_button_settings' => 'ut_blog_second_hrbtn',       
        
        ), $config    
    
    );
    
    
    /**
     * Hero Down Arrow
     */     
    $config = array_merge( array(
        
        'ut_hero_down_arrow'                          => 'ut_blog_hero_down_arrow', 
        'ut_hero_down_arrow_color'                    => 'ut_blog_hero_down_arrow_color',
        'ut_hero_down_arrow_scroll_position'          => 'ut_blog_hero_down_arrow_scroll_position',
        'ut_hero_down_arrow_scroll_position_vertical' => 'ut_blog_hero_down_arrow_scroll_position_vertical'
        
        ), $config    
    
    );
    
    
    /**
     * Hero Overlay
     */     
    $config = array_merge( array(
        
        'ut_hero_overlay'                => 'ut_blog_overlay',
        'ut_hero_overlay_color'          => 'ut_blog_overlay_color',
        'ut_hero_overlay_color_opacity'  => 'ut_blog_overlay_color_opacity',
        'ut_hero_overlay_pattern'        => 'ut_blog_overlay_pattern',
        'ut_hero_overlay_pattern_style'  => 'ut_blog_overlay_pattern_style',
        'ut_hero_overlay_effect'         => 'ut_blog_overlay_effect',
        'ut_hero_overlay_effect_style'   => 'ut_blog_overlay_effect_style',
        'ut_hero_overlay_effect_color'   => 'ut_blog_overlay_effect_color',  
        'ut_hero_overlay_pattern_style'  => 'ut_blog_overlay_pattern_style',
        
        ), $config    
    
    );
    
    
    /**
     * Hero Video
     */     
    $config = array_merge( array(
        
        'ut_video_url'          => 'ut_blog_video',
        'ut_video_containment'  => 'ut_blog_video_containment',
        'ut_video_url_vimeo'    => 'ut_blog_video_vimeo',
        'ut_video_url_custom'   => 'ut_blog_video_custom',
        'ut_video_source'       => 'ut_blog_video_source',
        'ut_video_volume'       => 'ut_blog_video_volume',
        'ut_video_mute_button'  => 'ut_video_mute_button_blog',
        'ut_video_loop'         => 'ut_blog_video_loop',
        'ut_video_preload'      => 'ut_blog_video_preload',
        'ut_video_mute_state'   => 'ut_blog_video_sound',
        'ut_video_poster'       => 'ut_blog_video_poster',
        'ut_video_mp4'          => 'ut_blog_video_mp4',
        'ut_video_ogg'          => 'ut_blog_video_ogg',
        'ut_video_webm'         => 'ut_blog_video_webm',
        
        ), $config    
    
    );
    
    
    /**
     * Hero Tablet Slider
     */     
    $config = array_merge( array(
        
        'ut_tabs_headline'       => 'ut_blog_tabs_headline',
        'ut_tabs_headline_style' => 'ut_blog_tabs_headline_style',
        'ut_tabs'                => 'ut_blog_tabs',
        'ut_tabs_tablet_color'   => 'ut_blog_tabs_tablet_color',
        'ut_tabs_tablet_shadow'  => 'ut_blog_tabs_tablet_shadow',
        
        ), $config    
    
    );
    
    
    /**
     * Hero Split Content
     */     
    $config = array_merge( array(
        
        'ut_hero_split_content_type'      => 'ut_blog_split_content_type',
        'ut_hero_split_video'             => 'ut_blog_split_video',
        'ut_hero_split_video_box'         => 'ut_blog_split_video_box',
        'ut_hero_split_video_box_style'   => 'ut_blog_split_video_box_style',
        'ut_hero_split_video_box_padding' => 'ut_blog_split_video_box_padding',                
        'ut_hero_split_image_effect'      => 'ut_blog_split_image_effect',
        'ut_hero_split_image_width'       => 'ut_blog_split_image_max_width',
        'ut_hero_split_image'             => 'ut_blog_split_image',
        
        ), $config    
    
    );
    
    
    /**
     * Hero Background Slider
     */     
    $config = array_merge( array(
        
        'ut_background_slider_slides'                       => 'ut_blog_slider',
        'ut_background_slider_animation'                    => 'blog_animation',
        'ut_background_slider_slideshow_speed'              => 'blog_slideshow_speed',
        'ut_background_slider_animation_speed'              => 'blog_animation_speed',
        'ut_background_slider_arrow_background_color'       => 'ut_blog_slider_arrow_background_color',
        'ut_background_slider_arrow_background_color_hover' => 'ut_blog_slider_arrow_background_color_hover',
        'ut_background_slider_arrow_color'                  => 'ut_blog_slider_arrow_color',        
        'ut_background_slider_arrow_color_hover'            => 'ut_blog_slider_arrow_color_hover',
        
        ), $config    
    
    );
    
    
    /**
     * Hero Fancy Slider
     */     
    $config = array_merge( array(
        
        'ut_fancy_slider_slides' => 'ut_blog_fancy_slider',
        'ut_fancy_slider_effect' => 'blog_fancy_slider_effect',
        'ut_fancy_slider_height' => 'blog_fancy_slider_height',
        
        ), $config    
    
    );
    
    
    /**
     * Hero Dynamic Content
     */     
    $config = array_merge( array(
        
        'ut_hero_height'                        => 'blog_hero_height', // new hero height var
        'ut_hero_dynamic_content'               => 'blog_hero_dynamic_content',
        'ut_hero_dynamic_content_height'        => 'blog_hero_dynamic_height',
        'ut_hero_dynamic_content_v_align'       => 'blog_hero_dynamic_content_v_align',
        'ut_hero_dynamic_content_margin_bottom' => 'blog_hero_dynamic_content_margin_bottom',
        
        ), $config    
    
    );
    
    
    /**
     * Hero Border 
     */     
    $config = array_merge( array(
        
        'ut_hero_border_bottom'       => 'ut_blog_hero_border_bottom',
        'ut_hero_border_bottom_color' => 'ut_blog_hero_border_bottom_color',
        'ut_hero_border_bottom_width' => 'ut_blog_hero_border_bottom_width',
        'ut_hero_border_bottom_style' => 'ut_blog_hero_border_bottom_style',
        
        ), $config    
    
    );
    
    
    /**
     * Hero Fancy Border
     */     
    $config = array_merge( array(
        
        'ut_hero_fancy_border'                  => 'ut_blog_hero_fancy_border',
        'ut_hero_fancy_border_color'            => 'ut_blog_fancy_border_color',
        'ut_hero_fancy_border_background_color' => 'ut_blog_fancy_border_background_color',
        'ut_hero_fancy_border_size'             => 'ut_blog_fancy_border_size', 
        
        ), $config    
    
    );
    
    
    /**
     * Hero Misc Settings
     */          
    $config = array_merge( array(
        
        'ut_hero_buttons_margin' => 'ut_blog_hero_buttons_margin',
        'ut_hero_style' => 'ut_blog_hero_style',
        'ut_hero_align' => 'ut_blog_hero_align',
        'ut_hero_v_align' => 'ut_blog_hero_v_align',
        'ut_hero_v_align_margin_bottom' => 'ut_blog_hero_v_align_margin_bottom',
        'ut_hero_width' => 'ut_blog_hero_width',
        'ut_hero_font_style' => 'ut_blog_hero_font_style',
        'ut_hero_image' => 'ut_blog_header_image',
        'ut_hero_image_parallax' => 'ut_blog_header_parallax',
        'ut_hero_rain_effect' => 'ut_blog_header_rain',
        'ut_hero_rain_sound' => 'ut_blog_header_rain_sound',
        'ut_hero_animated_image' => 'ut_blog_header_animatedimage',
        'ut_hero_shortcode' => 'blog_hero_custom_shortcode'

        ), $config    
    
    );
    
    
    /* deprecated keys since 4.2 */
    $config = array_merge( array(
        
        'ut_custom_slogan'       => 'ut_blog_custom_slogan',
        'ut_expertise_slogan'    => 'ut_blog_expertise_slogan',
        'ut_company_slogan'      => 'ut_blog_company_slogan',
        'ut_company_slogan_glow' => 'ut_blog_company_slogan_glow',
        'ut_catchphrase'         => 'ut_blog_catchphrase',
    
    ), $config );
    
    /* return config */
    return $config;

}



/**
 * One Page Blog Global Hero Styling
 *
 * @access    private
 * @since     4.2.0
 * @version   1.0.0
 */ 

function _ut_blog_hero_global_styling( $config ) {
    
    if( !( is_home() && ot_get_option( 'ut_site_layout', 'onepage' ) == 'onepage' ) ) {
        return $config;
    }    
        
    if( ot_get_option( 'ut_blog_hero_global_styling', 'off' ) == 'on' ) {
        
        $config['ut_hero_style']                         = 'ut_global_hero_style';
        $config['ut_hero_align']                         = 'ut_global_hero_align';
        $config['ut_hero_overlay']                       = 'ut_global_hero_overlay';
        $config['ut_hero_overlay_color']                 = 'ut_global_hero_overlay_color';
        $config['ut_hero_overlay_color_opacity']         = 'ut_global_hero_overlay_color_opacity';
        $config['ut_hero_overlay_pattern']               = 'ut_global_hero_overlay_pattern';
        $config['ut_hero_overlay_pattern_style']         = 'ut_global_hero_overlay_pattern_style';
        $config['ut_hero_overlay_effect']                = 'ut_global_hero_overlay_effect';
        $config['ut_hero_overlay_effect_style']          = 'ut_global_hero_overlay_effect_style';
        $config['ut_hero_overlay_effect_color']          = 'ut_global_hero_overlay_effect_color';
        $config['ut_hero_border_bottom']                 = 'ut_global_hero_border_bottom';
        $config['ut_hero_border_bottom_color']           = 'ut_global_hero_border_bottom_color';
        $config['ut_hero_border_bottom_width']           = 'ut_global_hero_border_bottom_width';
        $config['ut_hero_border_bottom_style']           = 'ut_global_hero_border_bottom_style';
        $config['ut_hero_fancy_border']                  = 'ut_global_hero_fancy_border';
        $config['ut_hero_fancy_border_color']            = 'ut_global_hero_fancy_border_color';
        $config['ut_hero_fancy_border_background_color'] = 'ut_global_hero_fancy_border_background_color';
        $config['ut_hero_fancy_border_size']             = 'ut_global_hero_fancy_border_size';               
    
    }
    
    return $config;

}


/**
 * One Page Blog Global Hero Content Styling
 *
 * @access    private
 * @since     4.2.0
 * @version   1.0.0
 */ 

function _ut_blog_hero_global_content_styling( $config ) {
    
    if( !( is_home() && ot_get_option( 'ut_site_layout', 'onepage' ) == 'onepage' ) ) {
        return $config;
    }
    
    if( ot_get_option( 'ut_blog_hero_global_content_styling', 'off' ) == 'on' ) {

        $config['ut_hero_caption_slogan_color']             = 'ut_global_hero_expertise_slogan_color';
        $config['ut_hero_caption_slogan_background_color']  = 'ut_global_hero_expertise_slogan_background_color';
        $config['ut_hero_caption_title_color']              = 'ut_global_hero_company_slogan_color';
        $config['ut_hero_catchphrase_color']                = 'ut_global_hero_catchphrase_color';
        $config['ut_hero_catchphrase_line_color']           = 'ut_global_hero_catchphrase_line_color';
    
    }
    
    return $config;

}

/**
 * Apply One Page Blog Filters
 *
 * @access    private
 * @since     4.2.0
 * @version   1.0.0
 */ 

add_filter( 'ut_hero_config', '_ut_blog_hero_config', 10, 1 );
add_filter( 'ut_hero_config', '_ut_blog_hero_global_styling', 30, 1 );
add_filter( 'ut_hero_config', '_ut_blog_hero_global_content_styling', 31, 1 );