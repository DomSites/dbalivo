<?php


/**
 * One Page Front Page Config
 *
 * @access    private
 * @since     4.2.0
 * @version   1.0.0
 */ 

function _ut_front_hero_config( $config ) {
    
    if( !( is_front_page() && ot_get_option( 'ut_site_layout', 'onepage' ) == 'onepage' ) ) {
        return $config;
    }
    
    /*new settings array */
    $config = array(
        'ut_hero_type' => 'ut_front_page_header_type'        
    );
    
    
    /**
     * Hero Content Elements 
     */     
    $config = array_merge( array(
        
        'ut_hero_custom_html'    => 'ut_front_custom_slogan',
        'ut_hero_caption_slogan' => 'ut_front_expertise_slogan',
        'ut_hero_caption_title'  => 'ut_front_company_slogan',
        'ut_hero_catchphrase'    => 'ut_front_catchphrase'
        
        ), $config    
    
    );
    
    
    /**
     * Hero Content Elements Colors and Fonts
     */     
    $config = array_merge( array(
        
        'ut_hero_caption_slogan_color'            => 'ut_front_expertise_slogan_color',
        'ut_hero_caption_slogan_background_color' => 'ut_front_expertise_slogan_background_color',
        'ut_hero_caption_slogan_margin_bottom'    => 'ut_front_expertise_margin',
        'ut_hero_caption_title_color'             => 'ut_front_company_slogan_color',
        'ut_hero_caption_title_glow'              => 'ut_front_company_slogan_glow',
        'ut_hero_caption_title_uppercase'         => 'ut_front_company_slogan_uppercase',
        'ut_hero_caption_title_letterspacing'     => 'ut_front_company_slogan_letterspacing',
        'ut_hero_catchphrase_color'               => 'ut_front_catchphrase_color',
        'ut_hero_catchphrase_line_color'          => 'ut_front_catchphrase_line_color',
        'ut_hero_catchphrase_websafe_font_style'  => 'ut_front_catchphrase_websafe_font_style',
        'ut_hero_catchphrase_top_websafe_font_style'  => 'ut_front_catchphrase_top_websafe_font_style'
        
        ), $config    
    
    );
    
    
    /**
     * Hero Main Button
     */     
    $config = array_merge( array(
        
        'ut_main_hero_button'             => 'ut_front_scroll_to_main',
        'ut_main_hero_button_url_type'    => 'ut_front_scroll_to_main_url_type',
        'ut_main_hero_button_target'      => 'ut_front_scroll_to_main_target',
        'ut_main_hero_button_link_target' => 'ut_front_scroll_to_main_link_target',
        'ut_main_hero_button_style'       => 'ut_front_scroll_to_main_style',
        'ut_main_hero_button_settings'    => 'ut_front_hrbtn'
    
        ), $config    
    
    );
    
    
    /**
     * Hero Secondary Button
     */     
    $config = array_merge( array(
        
        'ut_second_hero_button'          => 'ut_front_second_button',
        'ut_second_hero_button_text'     => 'ut_front_second_button_text',
        'ut_second_hero_button_url_type' => 'ut_front_second_button_url_type',
        'ut_second_hero_button_url'      => 'ut_front_second_button_url',
        'ut_second_hero_button_target'   => 'ut_front_second_button_target',
        'ut_second_hero_button_style'    => 'ut_front_second_button_style',
        'ut_second_hero_button_settings' => 'ut_front_second_hrbtn'        
        
        ), $config    
    
    );
    
    
    /**
     * Hero Down Arrow
     */     
    $config = array_merge( array(
        
        'ut_hero_down_arrow'         => 'ut_front_hero_down_arrow',
        'ut_hero_down_arrow_target'  => 'ut_front_hero_down_arrow_scroll_target',                
        'ut_hero_down_arrow_color'   => 'ut_front_hero_down_arrow_color',
        'ut_hero_down_arrow_scroll_position'          => 'ut_front_hero_down_arrow_scroll_position',
        'ut_hero_down_arrow_scroll_position_vertical' => 'ut_front_hero_down_arrow_scroll_position_vertical',
        
        ), $config    
    
    );
    
    
    /**
     * Hero Overlay
     */     
    $config = array_merge( array(
        
        'ut_hero_overlay'               => 'ut_front_page_overlay',
        'ut_hero_overlay_color'         => 'ut_front_page_overlay_color',
        'ut_hero_overlay_color_opacity' => 'ut_front_page_overlay_color_opacity',
        'ut_hero_overlay_pattern'       => 'ut_front_page_overlay_pattern',
        'ut_hero_overlay_pattern_style' => 'ut_front_page_overlay_pattern_style',
        'ut_hero_overlay_effect'        => 'ut_front_page_overlay_effect',
        'ut_hero_overlay_effect_style'  => 'ut_front_page_overlay_effect_style',
        'ut_hero_overlay_effect_color'  => 'ut_front_page_overlay_effect_color',
        'ut_hero_overlay_pattern_style' => 'ut_front_page_overlay_pattern_style',
        
        ), $config    
    
    );
    
    
    /**
     * Hero Video
     */     
    $config = array_merge( array(
        
        'ut_video_url'          => 'ut_front_video',
        'ut_video_containment'  => 'ut_front_video_containment',
        'ut_video_url_vimeo'    => 'ut_front_video_vimeo',
        'ut_video_url_custom'   => 'ut_front_video_custom',
        'ut_video_source'       => 'ut_front_video_source',
        'ut_video_volume'       => 'ut_front_video_volume',
        'ut_video_mute_button'  => 'ut_video_mute_button',
        'ut_video_loop'         => 'ut_front_video_loop',
        'ut_video_preload'      => 'ut_front_video_preload',
        'ut_video_mute_state'   => 'ut_front_video_sound',
        'ut_video_poster'       => 'ut_front_video_poster',
        'ut_video_mp4'          => 'ut_front_video_mp4',
        'ut_video_ogg'          => 'ut_front_video_ogg',
        'ut_video_webm'         => 'ut_front_video_webm'
        
        ), $config    
    
    );
    
    
    /**
     * Hero Tablet Slider
     */     
    $config = array_merge( array(
        
        'ut_tabs_headline'       => 'ut_front_page_tabs_headline',
        'ut_tabs_headline_style' => 'ut_front_page_tabs_headline_style',
        'ut_tabs'                => 'ut_front_page_tabs',
        'ut_tabs_tablet_color'   => 'ut_front_page_tabs_tablet_color',
        'ut_tabs_tablet_shadow'  => 'ut_front_page_tabs_tablet_shadow',
        
        ), $config    
    
    );
    
    
    /**
     * Hero Split Content
     */     
    $config = array_merge( array(
        
        'ut_hero_split_content_type'      => 'ut_front_split_content_type',
        'ut_hero_split_video'             => 'ut_front_split_video',
        'ut_hero_split_video_box'         => 'ut_front_split_video_box',
        'ut_hero_split_video_box_style'   => 'ut_front_split_video_box_style', 
        'ut_hero_split_video_box_padding' => 'ut_front_split_video_box_padding',               
        'ut_hero_split_image_effect'      => 'ut_front_split_image_effect',
        'ut_hero_split_image_width'       => 'ut_front_split_image_max_width',
        'ut_hero_split_image'             => 'ut_front_split_image'
        
        ), $config    
    
    );
    
    
    /**
     * Hero Background Slider
     */     
    $config = array_merge( array(
        
        'ut_background_slider_slides'                       => 'ut_front_page_slider',
        'ut_background_slider_animation'                    => 'front_animation',
        'ut_background_slider_slideshow_speed'              => 'front_slideshow_speed',
        'ut_background_slider_animation_speed'              => 'front_animation_speed',
        'ut_background_slider_arrow_background_color'       => 'front_slideshow_arrow_background_color',
        'ut_background_slider_arrow_background_color_hover' => 'front_slideshow_arrow_background_color_hover',
        'ut_background_slider_arrow_color'                  => 'front_slideshow_arrow_color',        
        'ut_background_slider_arrow_color_hover'            => 'front_slideshow_arrow_color_hover',
        
        ), $config    
    
    );
    
    
    /**
     * Hero Fancy Slider
     */     
    $config = array_merge( array(
        
        'ut_fancy_slider_slides' => 'ut_front_page_fancy_slider',
        'ut_fancy_slider_effect' => 'front_fancy_slider_effect',
        'ut_fancy_slider_height' => 'front_fancy_slider_height',
        
        ), $config    
    
    );
    
    
    /**
     * Hero Dynamic Content ( merged to Hero with 4.5 )
     */     
    $config = array_merge( array(
        
        'ut_hero_height'                        => 'front_hero_height', // new hero height var
        'ut_hero_dynamic_content'               => 'front_hero_dynamic_content',
        'ut_hero_dynamic_content_height'        => 'front_hero_dynamic_height',
        'ut_hero_dynamic_content_v_align'       => 'front_hero_dynamic_content_v_align',
        'ut_hero_dynamic_content_margin_bottom' => 'front_hero_dynamic_content_margin_bottom',
        
        ), $config    
    
    );
    
    /**
     * Hero Border 
     */     
    $config = array_merge( array(
        
        'ut_hero_border_bottom'       => 'ut_front_hero_border_bottom',
        'ut_hero_border_bottom_color' => 'ut_front_hero_border_bottom_color',
        'ut_hero_border_bottom_width' => 'ut_front_hero_border_bottom_width',
        'ut_hero_border_bottom_style' => 'ut_front_hero_border_bottom_style',
        
        ), $config    
    
    );
    
    
    /**
     * Hero Fancy Border
     */     
    $config = array_merge( array(
        
        'ut_hero_fancy_border'                  => 'ut_front_hero_fancy_border',
        'ut_hero_fancy_border_color'            => 'ut_front_fancy_border_color',
        'ut_hero_fancy_border_background_color' => 'ut_front_fancy_border_background_color',
        'ut_hero_fancy_border_size'             => 'ut_front_fancy_border_size', 
        
        ), $config    
    
    );
    
    
    /**
     * Hero Misc Settings
     */          
    $config = array_merge( array(
        
        'ut_hero_buttons_margin' => 'ut_front_hero_buttons_margin',
        'ut_hero_style' => 'ut_front_page_hero_style',
        'ut_hero_align' => 'ut_front_page_hero_align',
        'ut_hero_v_align' => 'ut_front_hero_v_align',
        'ut_hero_v_align_margin_bottom' => 'ut_front_hero_v_align_margin_bottom',
        'ut_hero_width' => 'ut_front_hero_width',
        'ut_hero_font_style' => 'ut_front_page_hero_font_style',
        'ut_hero_image' => 'ut_front_header_image',
        'ut_hero_image_parallax' => 'ut_front_header_parallax',
        'ut_hero_rain_effect' => 'ut_front_header_rain',
        'ut_hero_rain_sound' => 'ut_front_header_rain_sound',
        'ut_hero_animated_image' => 'ut_front_header_animatedimage',
        'ut_hero_shortcode' => 'front_hero_custom_shortcode',
        
        ), $config    
    
    );
    
    
    /* deprecated keys since 4.2 */
    $config = array_merge( array(
        
        'ut_custom_slogan'       => 'ut_front_custom_slogan',
        'ut_expertise_slogan'    => 'ut_front_expertise_slogan',
        'ut_company_slogan'      => 'ut_front_company_slogan',
        'ut_company_slogan_glow' => 'ut_front_company_slogan_glow',
        'ut_catchphrase'         => 'ut_front_catchphrase',
    
    ), $config );
    
    /* return config */
    return $config;

}



/**
 * One Page Front Page Global Hero Styling
 *
 * @access    private
 * @since     4.2.0
 * @version   1.0.0
 */ 

function _ut_front_hero_global_styling( $config ) {
    
    if( !( is_front_page() && ot_get_option( 'ut_site_layout', 'onepage' ) == 'onepage' ) ) {
        return $config;
    }    
        
    if( ot_get_option( 'ut_front_hero_global_styling', 'off' ) == 'on' ) {
                           
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
 * One Page Front Page Global Hero Content Styling
 *
 * @access    private
 * @since     4.2.0
 * @version   1.0.0
 */ 

function _ut_front_hero_global_content_styling( $config ) {
    
    if( !( is_front_page() && ot_get_option( 'ut_site_layout', 'onepage' ) == 'onepage' ) ) {
        return $config;
    }
    
    if( ot_get_option( 'ut_front_hero_global_content_styling', 'off' ) == 'on' ) {

        $config['ut_hero_caption_slogan_color']            = 'ut_global_hero_expertise_slogan_color';
        $config['ut_hero_caption_slogan_background_color'] = 'ut_global_hero_expertise_slogan_background_color';
        $config['ut_hero_caption_title_color']             = 'ut_global_hero_company_slogan_color';
        $config['ut_hero_catchphrase_color']               = 'ut_global_hero_catchphrase_color';
        $config['ut_hero_catchphrase_line_color']          = 'ut_global_hero_catchphrase_line_color';
    
    }
    
    return $config;

}



/**
 * Apply One Page Front Page Filters
 *
 * @access    private
 * @since     4.2.0
 * @version   1.0.0
 */ 

add_filter( 'ut_hero_config', '_ut_front_hero_config', 10, 1 );
add_filter( 'ut_hero_config', '_ut_front_hero_global_styling', 20, 1 );
add_filter( 'ut_hero_config', '_ut_front_hero_global_content_styling', 21, 1 );