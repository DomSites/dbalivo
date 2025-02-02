<?php

/**
 * Single Pages Hero Config
 *
 * @access    private
 * @since     4.2.0
 * @version   1.0.0
 */

function _ut_page_hero_config( $config ) {

    if ( is_home() && ot_get_option( 'ut_site_layout', 'onepage' ) == 'onepage' || is_front_page() && ot_get_option( 'ut_site_layout', 'onepage' ) == 'onepage' ) {
        return $config;
    }

    /*new settings array */
    $config = array(
        'ut_hero_type' => 'ut_page_hero_type',
    );

    /**
     * Hero Content Elements 
     */
    $config = array_merge( array(

            'ut_hero_custom_html' => 'ut_page_custom_hero_html',
            'ut_hero_caption_slogan' => 'ut_page_caption_slogan',
            'ut_hero_caption_title' => 'ut_page_caption_title',
            'ut_hero_catchphrase' => 'ut_page_caption_description'

        ), $config

    );


    /**
     * Hero Content Elements Colors and Fonts
     */
    $config = array_merge( array(

            'ut_hero_caption_slogan_color' => 'ut_page_caption_slogan_color',
            'ut_hero_caption_slogan_background_color' => 'ut_page_caption_slogan_background_color',
            'ut_hero_caption_slogan_margin_bottom' => 'ut_page_caption_slogan_margin',
            'ut_hero_caption_title_color' => 'ut_page_caption_title_color',
            'ut_hero_caption_title_glow' => 'ut_page_caption_slogan_glow',
            'ut_hero_caption_title_uppercase' => 'ut_page_caption_slogan_uppercase',
            'ut_hero_caption_title_letterspacing' => 'ut_page_caption_title_letterspacing',
            'ut_hero_catchphrase_color' => 'ut_page_caption_description_color',
            'ut_hero_catchphrase_line_color' => 'ut_page_caption_description_line_color',
            'ut_hero_catchphrase_websafe_font_style' => 'ut_page_caption_description_websafe_font_style',
            'ut_hero_catchphrase_websafe_top_font_style' => 'ut_page_caption_description_top_websafe_font_style',

        ), $config

    );


    /**
     * Hero Main Button
     */
    $config = array_merge( array(

            'ut_main_hero_button' => 'ut_page_main_hero_button',
            'ut_main_hero_button_text' => 'ut_page_main_hero_button_text',
            'ut_main_hero_button_url_type' => 'ut_page_main_hero_button_url_type',
            'ut_main_hero_button_url' => 'ut_page_main_hero_button_url',
            'ut_main_hero_button_link_target' => 'ut_page_main_hero_button_target',
            'ut_main_hero_button_style' => 'ut_page_main_hero_button_style',
            'ut_main_hero_button_settings' => 'ut_page_main_hrbtn'

        ), $config

    );


    /**
     * Hero Secondary Button
     */
    $config = array_merge( array(

            'ut_second_hero_button' => 'ut_page_second_button',
            'ut_second_hero_button_text' => 'ut_page_second_button_text',
            'ut_second_hero_button_url_type' => 'ut_page_second_button_url_type',
            'ut_second_hero_button_url' => 'ut_page_second_button_url',
            'ut_second_hero_button_target' => 'ut_page_second_button_target',
            'ut_second_hero_button_style' => 'ut_page_second_button_style',
            'ut_second_hero_button_settings' => 'ut_page_second_hrbtn'

        ), $config

    );

    /**
     * Hero Down Arrow
     */
    $config = array_merge( array(

            'ut_hero_down_arrow' => 'ut_page_scroll_down_arrow',
            'ut_hero_down_arrow_color' => 'ut_page_scroll_down_arrow_color',
            'ut_hero_down_arrow_scroll_position' => 'ut_page_scroll_down_arrow_position',
            'ut_hero_down_arrow_scroll_position_vertical' => 'ut_page_scroll_down_arrow_position_vertical'

        ), $config

    );


    /**
     * Hero Overlay
     */
    $config = array_merge( array(

            'ut_hero_background_color' => 'ut_page_hero_background_color',
            'ut_hero_overlay' => 'ut_page_hero_overlay',
            'ut_hero_overlay_color' => 'ut_page_hero_overlay_color',
            'ut_hero_overlay_color_opacity' => 'ut_page_hero_overlay_color_opacity',
            'ut_hero_overlay_pattern' => 'ut_page_hero_overlay_pattern',
            'ut_hero_overlay_pattern_style' => 'ut_page_hero_overlay_pattern_style',
            'ut_hero_overlay_custom_pattern' => 'ut_page_hero_overlay_custom_pattern',
            'ut_hero_overlay_effect' => 'ut_page_hero_overlay_effect',
            'ut_hero_overlay_effect_style' => 'ut_page_hero_overlay_effect_style',
            'ut_hero_overlay_effect_color' => 'ut_page_hero_overlay_effect_color'

        ), $config

    );

    /**
     * Hero Video
     */
    $config = array_merge( array(

            'ut_video_source' => 'ut_page_video_source',
            'ut_video_volume' => 'ut_page_video_volume',
            'ut_video_mute_button' => 'ut_page_video_mute_button',
            'ut_video_loop' => 'ut_page_video_loop',
            'ut_video_start_at' => 'ut_page_video_start_at',
            'ut_video_stop_at' => 'ut_page_video_stop_at',
            'ut_video_preload' => 'ut_page_video_preload',
            'ut_video_url' => 'ut_page_video',
            'ut_video_vimeo_url' => 'ut_page_video_vimeo',
            'ut_video_url_custom' => 'ut_page_video_custom',
            'ut_video_url_vimeo' => 'ut_page_video_vimeo',
            'ut_video_mute_state' => 'ut_page_video_sound',
            'ut_video_poster' => 'ut_page_video_poster',
            'ut_video_poster_tablet' => 'ut_page_video_poster_tablet',
            'ut_video_poster_mobile' => 'ut_page_video_poster_mobile',
            'ut_video_mp4' => 'ut_page_video_mp4',
            'ut_video_ogg' => 'ut_page_video_ogg',
            'ut_video_webm' => 'ut_page_video_webm'

        ), $config

    );


    /**
     * Hero Tablet Slider
     */
    $config = array_merge( array(

            'ut_tabs_headline' => 'ut_page_hero_tabs_headline',
            'ut_tabs_headline_style' => 'ut_page_hero_tabs_headline_style',
            'ut_tabs' => 'ut_page_hero_tabs',
            'ut_tabs_tablet_color' => 'ut_page_hero_tabs_tablet_color',
            'ut_tabs_tablet_shadow' => 'ut_page_hero_tabs_tablet_shadow'

        ), $config

    );


    /**
     * Hero Split Content
     */
    $config = array_merge( array(

            'ut_hero_split_content_type' => 'ut_page_hero_split_content_type',
            'ut_hero_split_video' => 'ut_page_hero_split_video',
            'ut_hero_split_form' => 'ut_page_hero_split_form',
            'ut_hero_split_video_box' => 'ut_page_hero_split_video_box',
            'ut_hero_split_video_box_style' => 'ut_page_hero_split_video_box_style',
            'ut_hero_split_video_box_padding' => 'ut_page_hero_split_video_box_padding',
            'ut_hero_split_image_effect' => 'ut_page_hero_split_image_effect',
            'ut_hero_split_image_width' => 'ut_page_hero_split_image_max_width',
            'ut_hero_split_image' => 'ut_page_hero_split_image'

        ), $config

    );


    /**
     * Hero Background Slider
     */
    $config = array_merge( array(

            'ut_background_slider_slides' => 'ut_page_hero_slider',
            'ut_background_slider_animation' => 'ut_page_hero_slider_animation',
            'ut_background_slider_slideshow_speed' => 'ut_page_hero_slider_slideshow_speed',
            'ut_background_slider_animation_speed' => 'ut_page_hero_slider_animation_speed',
            'ut_background_slider_arrow_background_color' => 'ut_page_hero_slider_arrow_background_color',
            'ut_background_slider_arrow_background_color_hover' => 'ut_page_hero_slider_arrow_background_color_hover',
            'ut_background_slider_arrow_color' => 'ut_page_hero_slider_arrow_color',
            'ut_background_slider_arrow_color_hover' => 'ut_page_hero_slider_arrow_color_hover'

        ), $config

    );


    /**
     * Hero Fancy Slider
     */
    $config = array_merge( array(

            'ut_fancy_slider_slides' => 'ut_page_hero_fancy_slider',
            'ut_fancy_slider_effect' => 'ut_page_hero_fancy_slider_effect',
            'ut_fancy_slider_height' => 'ut_page_hero_fancy_slider_height'

        ), $config

    );


    /**
     * Hero Dynamic Content ( removed with 4.4 )
     */
    $config = array_merge( array(

            'ut_hero_height' => 'ut_page_hero_height', // new hero height var
            'ut_hero_dynamic_content' => 'ut_page_hero_dynamic_content',
            'ut_hero_dynamic_content_height' => 'ut_page_hero_dynamic_height',
            'ut_hero_dynamic_content_v_align' => 'ut_page_hero_dynamic_content_v_align',
            'ut_hero_dynamic_content_margin_bottom' => 'ut_page_hero_dynamic_content_margin_bottom'

        ), $config

    );


    /**
     * Hero Border 
     */
    $config = array_merge( array(

            'ut_hero_border_bottom' => 'ut_page_hero_border_bottom',
            'ut_hero_border_bottom_color' => 'ut_page_hero_border_bottom_color',
            'ut_hero_border_bottom_width' => 'ut_page_hero_border_bottom_width',
            'ut_hero_border_bottom_style' => 'ut_page_hero_border_bottom_style'

        ), $config

    );


    /**
     * Hero Fancy Border
     */
    $config = array_merge( array(

            'ut_hero_fancy_border' => 'ut_page_hero_fancy_border',
            'ut_hero_fancy_border_color' => 'ut_page_fancy_border_color',
            'ut_hero_fancy_border_background_color' => 'ut_page_fancy_border_background_color',
            'ut_hero_fancy_border_size' => 'ut_page_fancy_border_size',

        ), $config

    );


    /**
     * Hero Misc Settings
     */
    $config = array_merge( array(

            'ut_hero_buttons_margin' => 'ut_page_hero_buttons_margin',
            'ut_hero_style' => 'ut_page_hero_style',
            'ut_hero_align' => 'ut_page_hero_align',
            'ut_hero_v_align' => 'ut_page_hero_v_align',
            'ut_hero_v_align_margin_bottom' => 'ut_page_hero_v_align_margin_bottom',
            'ut_hero_width' => 'ut_page_hero_width',
            'ut_hero_font_style' => 'ut_page_hero_font_style',
            'ut_hero_image' => 'ut_page_hero_image',
            'ut_hero_image_tablet' => 'ut_page_hero_image_tablet',
            'ut_hero_image_mobile' => 'ut_page_hero_image_mobile',
            'ut_hero_image_parallax' => 'ut_page_hero_parallax',
            'ut_hero_rain_effect' => 'ut_page_hero_rain_effect',
            'ut_hero_rain_sound' => 'ut_page_hero_rain_sound',
            'ut_hero_animated_image' => 'ut_page_hero_animated_image',
            'ut_hero_animated_image_mobile' => 'ut_page_hero_animated_image_mobile',
            'ut_hero_animated_image_speed' => 'ut_page_hero_animated_image_speed',
            'ut_hero_animated_image_direction' => 'ut_page_hero_animated_image_direction',
            'ut_hero_animated_image_direction_alternate' => 'ut_page_hero_animated_image_direction_alternate',
            'ut_hero_animated_image_cover' => 'ut_page_hero_animated_image_cover',
            'ut_hero_shortcode' => 'ut_page_hero_custom_shortcode'

        ), $config

    );

    /* deprecated keys since 4.2 */
    $config = array_merge( array(

        'ut_custom_slogan' => 'ut_page_custom_hero_html',
        'ut_expertise_slogan' => 'ut_page_caption_slogan',
        'ut_company_slogan' => 'ut_page_caption_title',
        'ut_company_slogan_glow' => 'ut_page_caption_slogan_glow',
        'ut_catchphrase' => 'ut_page_caption_description'

    ), $config );

    return $config;

}


/**
 * Single Portfolio Hero Config
 *
 * @access    private
 * @since     4.2.0
 * @version   1.0.0
 */

function _ut_portfolio_hero_config( $config ) {

    if ( is_singular( 'portfolio' ) ) {

        $config['ut_hero_style'] = 'ut_portfolio_hero_style';
        $config['ut_hero_align'] = 'ut_portfolio_caption_align';

    }

    return $config;

}


/**
 * Page Global Hero Styling
 *
 * @access    private
 * @since     4.2.0
 * @version   1.0.0
 * deprecated since 4.4
 */

function _ut_page_hero_global_styling( $hero_post_id ) {

    if ( get_post_meta( $hero_post_id, 'ut_page_hero_global_style', true ) == 'on' ) {

        return apply_filters( 'ut_page_hero_global_styling', array(

            'ut_hero_style' => 'ut_global_hero_style',
            'ut_hero_align' => 'ut_global_hero_align',
            'ut_hero_v_align' => 'ut_global_hero_v_align',
            'ut_hero_v_align_margin_bottom' => 'ut_global_hero_v_align_margin_bottom',
            'ut_hero_width' => 'ut_global_hero_width',
            'ut_hero_background_color' => 'ut_global_hero_background_color',
            'ut_hero_overlay' => 'ut_global_hero_overlay',
            'ut_hero_overlay_color' => 'ut_global_hero_overlay_color',
            'ut_hero_overlay_color_opacity' => 'ut_global_hero_overlay_color_opacity',
            'ut_hero_overlay_pattern' => 'ut_global_hero_overlay_pattern',
            'ut_hero_overlay_pattern_style' => 'ut_global_hero_overlay_pattern_style',
            'ut_hero_overlay_custom_pattern' => 'ut_global_hero_custom_pattern',
            'ut_hero_overlay_effect' => 'ut_global_hero_overlay_effect',
            'ut_hero_overlay_effect_style' => 'ut_global_hero_overlay_effect_style',
            'ut_hero_overlay_effect_color' => 'ut_global_hero_overlay_effect_color',
            'ut_hero_border_bottom' => 'ut_global_hero_border_bottom',
            'ut_hero_border_bottom_color' => 'ut_global_hero_border_bottom_color',
            'ut_hero_border_bottom_width' => 'ut_global_hero_border_bottom_width',
            'ut_hero_border_bottom_style' => 'ut_global_hero_border_bottom_style',
            'ut_hero_fancy_border' => 'ut_global_hero_fancy_border',
            'ut_hero_fancy_border_color' => 'ut_global_hero_fancy_border_color',
            'ut_hero_fancy_border_background_color' => 'ut_global_hero_fancy_border_background_color',
            'ut_hero_fancy_border_size' => 'ut_global_hero_fancy_border_size',


            'ut_hero_font_style' => 'ut_front_page_hero_font_style',

        ) );

    } else {

        return apply_filters( 'ut_page_hero_global_styling', array() );

    }

}


/**
 * Page Global Hero Overlay Styling Overwrite
 *
 * @access    private
 * @since     4.4.0
 * @version   1.0.0
 */

function _ut_page_hero_overlay_global_styling( $hero_post_id ) {

    if ( get_post_meta( $hero_post_id, 'ut_page_hero_overlay_global_overwrite', true ) == 'on' ) {

        return apply_filters( 'ut_page_hero_overlay_global_styling', array(

            'ut_hero_overlay' => 'ut_global_hero_overlay',
            'ut_hero_overlay_color' => 'ut_global_hero_overlay_color',
            'ut_hero_overlay_color_opacity' => 'ut_global_hero_overlay_color_opacity',
            'ut_hero_overlay_pattern' => 'ut_global_hero_overlay_pattern',
            'ut_hero_overlay_pattern_style' => 'ut_global_hero_overlay_pattern_style',
            'ut_hero_overlay_custom_pattern' => 'ut_global_hero_custom_pattern',

        ), $hero_post_id );

    } else {

        return apply_filters( 'ut_page_hero_overlay_global_styling', array(), $hero_post_id );

    }

}


/**
 * Page Global Hero Overlay Effect Styling Overwrite
 *
 * @access    private
 * @since     4.4.0
 * @version   1.0.0
 */

function _ut_page_hero_overlay_effect_global_styling( $config, $hero_post_id ) {

    if ( get_post_meta( $hero_post_id, 'ut_page_hero_overlay_effect_global_overwrite', true ) == 'on' ) {

        $config[ 'ut_hero_overlay_effect' ] = 'ut_global_hero_overlay_effect';
        $config[ 'ut_hero_overlay_effect_style' ] = 'ut_global_hero_overlay_effect_style';
        $config[ 'ut_hero_overlay_effect_color' ] = 'ut_global_hero_overlay_effect_color';

    }

    return $config;

}

add_filter( 'ut_page_hero_overlay_global_styling', '_ut_page_hero_overlay_effect_global_styling', 20, 2 );


/**
 * Page Global Hero Border Styling Overwrite
 *
 * @access    private
 * @since     4.4.0
 * @version   1.0.0
 */

function _ut_page_hero_border_global_styling( $config, $hero_post_id ) {

    if ( get_post_meta( $hero_post_id, 'ut_page_hero_border_bottom_global_overwrite', true ) == 'on' ) {

        $config[ 'ut_hero_border_bottom' ] = 'ut_global_hero_border_bottom';
        $config[ 'ut_hero_border_bottom_color' ] = 'ut_global_hero_border_bottom_color';
        $config[ 'ut_hero_border_bottom_width' ] = 'ut_global_hero_border_bottom_width';
        $config[ 'ut_hero_border_bottom_style' ] = 'ut_global_hero_border_bottom_style';

    }

    return $config;

}

add_filter( 'ut_page_hero_overlay_global_styling', '_ut_page_hero_border_global_styling', 21, 2 );


/**
 * Page Global Hero Fancy Border Styling Overwrite
 *
 * @access    private
 * @since     4.4.0
 * @version   1.0.0
 */

function _ut_page_hero_fancy_border_global_styling( $config, $hero_post_id ) {

    if ( get_post_meta( $hero_post_id, 'ut_page_hero_fancy_border_global_overwrite', true ) == 'on' ) {

        $config[ 'ut_hero_fancy_border' ] = 'ut_global_hero_fancy_border';
        $config[ 'ut_hero_fancy_border_color' ] = 'ut_global_hero_fancy_border_color';
        $config[ 'ut_hero_fancy_border_background_color' ] = 'ut_global_hero_fancy_border_background_color';
        $config[ 'ut_hero_fancy_border_size' ] = 'ut_global_hero_fancy_border_size';

    }

    return $config;

}

add_filter( 'ut_page_hero_overlay_global_styling', '_ut_page_hero_fancy_border_global_styling', 22, 2 );

/**
 * Page Global Hero Content Styling
 *
 * @access    private
 * @since     4.2.0
 * @version   1.0.0
 */

function _ut_post_global_content_styling( $config ) {

    if ( is_single() && !is_singular( 'portfolio' ) ) {

        return array(

            'ut_hero_style' => 'ut_global_hero_style',
            'ut_hero_align' => 'ut_global_hero_align',
            'ut_hero_v_align' => 'ut_global_hero_v_align',
            'ut_hero_width' => 'ut_global_hero_width',
            'ut_hero_background_color' => 'ut_global_hero_background_color',

            'ut_hero_overlay' => 'ut_global_hero_overlay',
            'ut_hero_overlay_color' => 'ut_global_hero_overlay_color',
            'ut_hero_overlay_color_opacity' => 'ut_global_hero_overlay_color_opacity',
            'ut_hero_overlay_pattern' => 'ut_global_hero_overlay_pattern',
            'ut_hero_overlay_pattern_style' => 'ut_global_hero_overlay_pattern_style',
            'ut_hero_overlay_custom_pattern' => 'ut_global_hero_custom_pattern',
            'ut_hero_overlay_effect' => 'ut_global_hero_overlay_effect',
            'ut_hero_overlay_effect_style' => 'ut_global_hero_overlay_effect_style',
            'ut_hero_overlay_effect_color' => 'ut_global_hero_overlay_effect_color',

            'ut_hero_border_bottom' => 'ut_global_hero_border_bottom',
            'ut_hero_border_bottom_color' => 'ut_global_hero_border_bottom_color',
            'ut_hero_border_bottom_width' => 'ut_global_hero_border_bottom_width',
            'ut_hero_border_bottom_style' => 'ut_global_hero_border_bottom_style',

            'ut_hero_fancy_border' => 'ut_global_hero_fancy_border',
            'ut_hero_fancy_border_color' => 'ut_global_hero_fancy_border_color',
            'ut_hero_fancy_border_background_color' => 'ut_global_hero_fancy_border_background_color',
            'ut_hero_fancy_border_size' => 'ut_global_hero_fancy_border_size',

            'ut_hero_font_style' => 'ut_front_page_hero_font_style',

        );

    }

    return $config;

}

add_filter( 'ut_page_hero_global_styling', '_ut_post_global_content_styling', 30, 1 );


/**
 * Page Global Hero Content Styling
 *
 * @access    private
 * @since     4.2.0
 * @version   1.0.0
 */

function _ut_single_post_global_content_styling( $config ) {

    if ( is_single() && !is_singular( 'portfolio' ) ) {

        $config[ 'ut_hero_caption_slogan_color' ] = 'ut_global_hero_expertise_slogan_color';
        $config[ 'ut_hero_caption_slogan_background_color' ] = 'ut_global_hero_expertise_slogan_background_color';
        $config[ 'ut_hero_caption_title_color' ] = 'ut_global_hero_company_slogan_color';
        $config[ 'ut_hero_catchphrase_color' ] = 'ut_global_hero_catchphrase_color';
        $config[ 'ut_hero_catchphrase_line_color' ] = 'ut_global_hero_catchphrase_line_color';

    }

    return $config;

}

add_filter( 'ut_page_hero_global_styling', '_ut_single_post_global_content_styling', 30, 1 );


/**
 * Page Global Hero Content Styling
 *
 * @access    private
 * @since     4.2.0
 * @version   1.0.0
 */

function _ut_page_global_content_styling( $config ) {

    /* Store Post ID */
    $hero_post_id = get_the_ID();

    /* Fetch Post ID if Shop is displaying */
    if ( ut_is_shop() ) {
        $hero_post_id = get_option( 'woocommerce_shop_page_id' );
    }

    if ( get_post_meta( $hero_post_id, 'ut_page_hero_global_content_style', true ) == 'on' || is_search() ) {

        $config[ 'ut_hero_caption_slogan_color' ] = 'ut_global_hero_expertise_slogan_color';
        $config[ 'ut_hero_caption_slogan_background_color' ] = 'ut_global_hero_expertise_slogan_background_color';
        $config[ 'ut_hero_caption_title_color' ] = 'ut_global_hero_company_slogan_color';
        $config[ 'ut_hero_catchphrase_color' ] = 'ut_global_hero_catchphrase_color';
        $config[ 'ut_hero_catchphrase_line_color' ] = 'ut_global_hero_catchphrase_line_color';

    }

    return $config;

}

add_filter( 'ut_page_hero_global_styling', '_ut_page_global_content_styling', 20, 1 );


/**
 * Apply Page Filters
 *
 * @access    private
 * @since     4.2.0
 * @version   1.0.0
 */

add_filter( 'ut_hero_config', '_ut_page_hero_config', 10, 1 );
add_filter( 'ut_hero_config', '_ut_portfolio_hero_config', 11, 1 );


/**
 * Search No Result Hero Styling
 *
 * @access    private
 * @since     4.2.0
 * @version   1.0.0
 */

function _ut_search_hero_styling( $config ) {

    if ( is_search() ) {

        $config[ 'ut_hero_style' ] = 'ut_global_hero_style';
        $config[ 'ut_hero_align' ] = 'ut_global_hero_align';
        $config[ 'ut_hero_v_align' ] = 'ut_global_hero_v_align';
        $config[ 'ut_hero_width' ] = 'ut_global_hero_width';

        $config[ 'ut_hero_caption_slogan_color' ] = 'ut_global_hero_expertise_slogan_color';
        $config[ 'ut_hero_caption_slogan_background_color' ] = 'ut_global_hero_expertise_slogan_background_color';
        $config[ 'ut_hero_caption_title_color' ] = 'ut_global_hero_company_slogan_color';
        $config[ 'ut_hero_catchphrase_color' ] = 'ut_global_hero_catchphrase_color';
        $config[ 'ut_hero_catchphrase_line_color' ] = 'ut_global_hero_catchphrase_line_color';

        $config[ 'ut_hero_down_arrow_color' ] = 'ut_search_hero_down_arrow_color';
        $config[ 'ut_hero_down_arrow_scroll_position' ] = 'ut_search_hero_down_arrow_scroll_position';
        $config[ 'ut_hero_down_arrow_scroll_position_vertical' ] = 'ut_search_hero_down_arrow_scroll_position_vertical';

        $config[ 'ut_hero_image_parallax' ] = 'ut_search_hero_parallax';
        $config[ 'ut_hero_background_color' ] = 'ut_search_hero_background_color';
        $config[ 'ut_hero_overlay' ] = 'ut_search_hero_overlay';
        $config[ 'ut_hero_overlay_color' ] = 'ut_search_hero_overlay_color';
        $config[ 'ut_hero_overlay_color_opacity' ] = 'ut_search_hero_overlay_color_opacity';
        $config[ 'ut_hero_overlay_pattern' ] = 'ut_search_hero_overlay_pattern';
        $config[ 'ut_hero_overlay_pattern_style' ] = 'ut_search_hero_overlay_pattern_style';

        $config[ 'ut_hero_catchphrase_websafe_font_style' ] = 'ut_front_catchphrase_websafe_font_style';
        $config[ 'ut_hero_catchphrase_top_websafe_font_style' ] = 'ut_front_catchphrase_top_websafe_font_style';

    }

    return $config;

}

add_filter( 'ut_page_hero_global_styling', '_ut_search_hero_styling', 40, 1 );

/**
 * 404 Hero Styling
 *
 * @access    private
 * @since     4.2.0
 * @version   1.0.0
 */

function _ut_404_hero_styling( $config ) {

    if ( is_404() ) {

        $config[ 'ut_hero_style' ] = 'ut_global_hero_style';
        $config[ 'ut_hero_align' ] = 'ut_global_hero_align';
        $config[ 'ut_hero_v_align' ] = 'ut_global_hero_v_align';
        $config[ 'ut_hero_width' ] = 'ut_global_hero_width';

        $config[ 'ut_hero_caption_slogan_color' ] = 'ut_global_hero_expertise_slogan_color';
        $config[ 'ut_hero_caption_slogan_background_color' ] = 'ut_global_hero_expertise_slogan_background_color';
        $config[ 'ut_hero_caption_title_color' ] = 'ut_global_hero_company_slogan_color';
        $config[ 'ut_hero_catchphrase_color' ] = 'ut_global_hero_catchphrase_color';
        $config[ 'ut_hero_catchphrase_line_color' ] = 'ut_global_hero_catchphrase_line_color';

        $config[ 'ut_hero_image_parallax' ] = 'ut_404_hero_parallax';
        $config[ 'ut_hero_background_color' ] = 'ut_404_hero_background_color';
        $config[ 'ut_hero_overlay' ] = 'ut_404_hero_overlay';
        $config[ 'ut_hero_overlay_color' ] = 'ut_404_hero_overlay_color';
        $config[ 'ut_hero_overlay_color_opacity' ] = 'ut_404_hero_overlay_color_opacity';
        $config[ 'ut_hero_overlay_pattern' ] = 'ut_404_hero_overlay_pattern';
        $config[ 'ut_hero_overlay_pattern_style' ] = 'ut_404_hero_overlay_pattern_style';

        $config[ 'ut_hero_catchphrase_websafe_font_style' ] = 'ut_front_catchphrase_websafe_font_style';
        $config[ 'ut_hero_catchphrase_top_websafe_font_style' ] = 'ut_front_catchphrase_top_websafe_font_style';
        
    }

    return $config;

}

add_filter( 'ut_page_hero_global_styling', '_ut_404_hero_styling', 40, 1 );


/**
 * Archive Hero Styling
 *
 * @access    private
 * @since     4.2.0
 * @version   1.0.0
 */

function _ut_archive_hero_styling( $config ) {

    if ( is_archive() ) {

        $config[ 'ut_hero_style' ] = 'ut_global_hero_style';
        $config[ 'ut_hero_align' ] = 'ut_global_hero_align';
        $config[ 'ut_hero_v_align' ] = 'ut_global_hero_v_align';
        $config[ 'ut_hero_width' ] = 'ut_global_hero_width';

        $config[ 'ut_hero_caption_slogan_color' ] = 'ut_global_hero_expertise_slogan_color';
        $config[ 'ut_hero_caption_slogan_background_color' ] = 'ut_global_hero_expertise_slogan_background_color';
        $config[ 'ut_hero_caption_title_color' ] = 'ut_global_hero_company_slogan_color';
        $config[ 'ut_hero_catchphrase_color' ] = 'ut_global_hero_catchphrase_color';
        $config[ 'ut_hero_catchphrase_line_color' ] = 'ut_global_hero_catchphrase_line_color';

        $config[ 'ut_hero_down_arrow_color' ] = 'ut_archive_hero_down_arrow_color';
        $config[ 'ut_hero_down_arrow_scroll_position' ] = 'ut_archive_hero_down_arrow_scroll_position';
        $config[ 'ut_hero_down_arrow_scroll_position_vertical' ] = 'ut_archive_hero_down_arrow_scroll_position_vertical';

        $config[ 'ut_hero_image_parallax' ] = 'ut_archive_hero_parallax';
        $config[ 'ut_hero_background_color' ] = 'ut_archive_hero_background_color';
        $config[ 'ut_hero_overlay' ] = 'ut_archive_hero_overlay';
        $config[ 'ut_hero_overlay_color' ] = 'ut_archive_hero_overlay_color';
        $config[ 'ut_hero_overlay_color_opacity' ] = 'ut_archive_hero_overlay_color_opacity';
        $config[ 'ut_hero_overlay_pattern' ] = 'ut_archive_hero_overlay_pattern';
        $config[ 'ut_hero_overlay_pattern_style' ] = 'ut_archive_hero_overlay_pattern_style';

        $config[ 'ut_hero_catchphrase_websafe_font_style' ] = 'ut_front_catchphrase_websafe_font_style';
        $config[ 'ut_hero_catchphrase_top_websafe_font_style' ] = 'ut_front_catchphrase_top_websafe_font_style';
        
    }

    return $config;

}

add_filter( 'ut_page_hero_global_styling', '_ut_archive_hero_styling', 40, 1 );


/**
 * Maintenance Hero Styling
 *
 * @access    private
 * @since     4.2.0
 * @version   1.0.0
 */

function _ut_maintenance_hero_styling( $config ) {

    if ( apply_filters( 'ut_maintenance_mode_active', false ) ) {

        $config[ 'ut_hero_style' ] = 'ut_global_hero_style';
        $config[ 'ut_hero_align' ] = 'ut_global_hero_align';
        $config[ 'ut_hero_v_align' ] = 'ut_global_hero_v_align';
        $config[ 'ut_hero_width' ] = 'ut_global_hero_width';

        $config[ 'ut_hero_caption_slogan_color' ] = 'ut_global_hero_expertise_slogan_color';
        $config[ 'ut_hero_caption_slogan_background_color' ] = 'ut_global_hero_expertise_slogan_background_color';
        $config[ 'ut_hero_caption_title_color' ] = 'ut_global_hero_company_slogan_color';
        $config[ 'ut_hero_catchphrase_color' ] = 'ut_global_hero_catchphrase_color';
        $config[ 'ut_hero_catchphrase_line_color' ] = 'ut_global_hero_catchphrase_line_color';

        $config[ 'ut_hero_image_parallax' ] = 'ut_maintenance_hero_parallax';
        $config[ 'ut_hero_background_color' ] = 'ut_maintenance_hero_background_color';
        $config[ 'ut_hero_overlay' ] = 'ut_maintenance_hero_overlay';
        $config[ 'ut_hero_overlay_color' ] = 'ut_maintenance_hero_overlay_color';
        $config[ 'ut_hero_overlay_color_opacity' ] = 'ut_maintenance_hero_overlay_color_opacity';
        $config[ 'ut_hero_overlay_pattern' ] = 'ut_maintenance_hero_overlay_pattern';
        $config[ 'ut_hero_overlay_pattern_style' ] = 'ut_maintenance_hero_overlay_pattern_style';

        $config[ 'ut_hero_catchphrase_websafe_font_style' ] = 'ut_front_catchphrase_websafe_font_style';
        $config[ 'ut_hero_catchphrase_top_websafe_font_style' ] = 'ut_front_catchphrase_top_websafe_font_style';

    }

    return $config;

}

add_filter( 'ut_page_hero_global_styling', '_ut_maintenance_hero_styling', 99, 1 );



function _ut_system_page_hero_support( $config ) {

    if ( is_search() || is_404() || is_archive() || apply_filters( 'ut_maintenance_mode_active', false ) ) {

        /* reset config */
        $config = array();

        $config[ 'ut_hero_style' ] = 'ut_global_hero_style';
        $config[ 'ut_hero_align' ] = 'ut_global_hero_align';
        $config[ 'ut_hero_v_align' ] = 'ut_global_hero_v_align';
        $config[ 'ut_hero_width' ] = 'ut_global_hero_width';

        $config[ 'ut_hero_caption_slogan_color' ] = 'ut_global_hero_expertise_slogan_color';
        $config[ 'ut_hero_caption_slogan_background_color' ] = 'ut_global_hero_expertise_slogan_background_color';
        $config[ 'ut_hero_caption_title_color' ] = 'ut_global_hero_company_slogan_color';
        $config[ 'ut_hero_catchphrase_color' ] = 'ut_global_hero_catchphrase_color';
        $config[ 'ut_hero_catchphrase_line_color' ] = 'ut_global_hero_catchphrase_line_color';

        $config[ 'ut_hero_image_parallax' ] = 'ut_search_hero_parallax';
        $config[ 'ut_hero_background_color' ] = 'ut_search_hero_background_color';
        $config[ 'ut_hero_overlay' ] = 'ut_search_hero_overlay';
        $config[ 'ut_hero_overlay_color' ] = 'ut_search_hero_overlay_color';
        $config[ 'ut_hero_overlay_color_opacity' ] = 'ut_search_hero_overlay_color_opacity';
        $config[ 'ut_hero_overlay_pattern' ] = 'ut_search_hero_overlay_pattern';
        $config[ 'ut_hero_overlay_pattern_style' ] = 'ut_search_hero_overlay_pattern_style';

        $config[ 'ut_hero_catchphrase_websafe_font_style' ] = 'ut_front_catchphrase_websafe_font_style';
        $config[ 'ut_hero_catchphrase_top_websafe_font_style' ] = 'ut_front_catchphrase_top_websafe_font_style';

    }

    if ( is_search() || is_archive() ) {

        $config[ 'ut_hero_down_arrow_color' ] = 'ut_search_hero_down_arrow_color';
        $config[ 'ut_hero_down_arrow_scroll_position' ] = 'ut_search_hero_down_arrow_scroll_position';
        $config[ 'ut_hero_down_arrow_scroll_position_vertical' ] = 'ut_search_hero_down_arrow_scroll_position_vertical';

    }


    return $config;

}

add_filter( 'ut_hero_config', '_ut_system_page_hero_support', 40, 1 );