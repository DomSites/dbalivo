<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $full_width
 * @var $full_height
 * @var $columns_placement
 * @var $content_placement
 * @var $parallax
 * @var $parallax_image
 * @var $css
 * @var $el_id
 * @var $video_bg
 * @var $video_bg_url
 * @var $video_bg_parallax
 * @var $parallax_speed_bg
 * @var $parallax_speed_video
 * @var $content - shortcode content
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row
 */

$el_class = $full_height = $hide_on_desktop = $hide_on_tablet = $hide_on_mobile = $parallax_speed_bg = $parallax_speed_video = $full_width = $flex_row = $columns_placement = $content_placement = $parallax = $parallax_image = $css = $el_id = $video_bg = $video_bg_url = $video_bg_parallax = $css_animation = '';
$disable_element = '';
$output = $after_output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script( 'wpb_composer_front_js' );

$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_classes = array(
    'vc_section',    
    $el_class,    
    vc_shortcode_custom_css_class( $css ),
);    

if( is_page() || is_singular("portfolio") ) {
    $css_classes[] = 'ut-vc-' . ot_get_option( 'ut_section_spacing_system' , '80' );
}

if ( 'yes' === $disable_element ) {
	
    if ( vc_is_page_editable() ) {
		$css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
	} else {
		return '';
	}
    
}

if ( vc_shortcode_custom_css_has_property( $css, array( 'border', 'background' ) ) || $video_bg || $parallax || $bklyn_overlay ) {
	
    $css_classes[] = 'vc_section-has-fill';
    
} else {
    
    $css_classes[] = 'vc_section-has-no-fill';
    
}

// responsive classes
if( $hide_on_desktop ) {
    $css_classes[] = 'hide-on-desktop';
}

if( $hide_on_tablet ) {
    $css_classes[] = 'hide-on-tablet';
}

if( $hide_on_mobile ) {
    $css_classes[] = 'hide-on-mobile';
}



$needs_side_nav_spacing = false;
$wrapper_attributes = array();

// build attributes for wrapper
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}
if ( ! empty( $full_width ) ) {
	$wrapper_attributes[] = 'data-vc-full-width="true"';
	$wrapper_attributes[] = 'data-vc-full-width-init="false"';
	
    if ( 'stretch_row_content' === $full_width ) {
		$wrapper_attributes[] = 'data-vc-stretch-content="true"';
        $needs_side_nav_spacing = true;
	}
    
	$after_output .= '<div class="vc_row-full-width vc_clearfix"></div>';
}

if ( ! empty( $full_height ) ) {
	$css_classes[] = 'vc_row-o-full-height';
}

if ( ! empty( $content_placement ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_section-o-content-' . $content_placement;
}

if ( ! empty( $flex_row ) ) {
	$css_classes[] = 'vc_section-flex';
}

/**
 * Overlay Settings
 */

$overlay_style_id     = uniqid("ut-section-overlay-");
$section_custom_class = uniqid("ut-section-");


$css_classes[] = $section_custom_class;


$custom_css_style = '<style type="text/css" scoped>';
    
if( $bklyn_overlay_color ) {
    
    if ( preg_match( '/^#[a-f0-9]{6}$/i', $bklyn_overlay_color ) ) {
        $bklyn_overlay_color = 'rgba(' .  ut_hex_to_rgb( $bklyn_overlay_color )  . ', 0.8 );';
    }
            
    $custom_css_style .= '#' . $overlay_style_id . '{ background-color: ' . $bklyn_overlay_color . ';}';    
    
}

if( $bklyn_overlay_pattern && 'bklyn-custom-pattern' == $bklyn_overlay_pattern_style && !empty( $bklyn_overlay_custom_pattern ) ) {
    
    $bklyn_overlay_custom_pattern = wp_get_attachment_url( $bklyn_overlay_custom_pattern );        
    $custom_css_style .= '#' . $overlay_style_id . '{ background-image: url( ' . esc_url( $bklyn_overlay_custom_pattern ) . '); }'; 
    
} 

if( $bklyn_overlay ) {

    /* add parent css class */
    $css_classes[] = 'bklyn-section-with-overlay';

}

$custom_css_style .= '</style>';


$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );

$parallax_speed = $parallax_speed_bg;
if ( $has_video_bg ) {
	$parallax = $video_bg_parallax;
	$parallax_speed = $parallax_speed_video;
	$parallax_image = $video_bg_url;
	$css_classes[] = 'vc_video-bg-container';
	wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}

if ( ! empty( $parallax ) ) {
	wp_enqueue_script( 'vc_jquery_skrollr_js' );
	$wrapper_attributes[] = 'data-vc-parallax="' . esc_attr( $parallax_speed ) . '"'; // parallax speed
	$css_classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;
	if ( false !== strpos( $parallax, 'fade' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fade';
		$wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
	} elseif ( false !== strpos( $parallax, 'fixed' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fixed';
	}
}

if ( ! empty( $parallax_image ) ) {
	if ( $has_video_bg ) {
		$parallax_image_src = $parallax_image;
	} else {
		$parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
		$parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
		if ( ! empty( $parallax_image_src[0] ) ) {
			$parallax_image_src = $parallax_image_src[0];
		}
	}
	$wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';
}
if ( ! $parallax && $has_video_bg ) {
	$wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
}
$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

$output .= '<section ' . implode( ' ', $wrapper_attributes ) . '>';

if( !empty( $bklyn_section_anchor_id ) ) {
    
    $output .= '<a class="ut-vc-offset-anchor-top" id="section-' . ut_create_slug( $bklyn_section_anchor_id ) .'" name="section-' . ut_create_slug( $bklyn_section_anchor_id ) .'">' . $bklyn_section_anchor_id .'</a>';    
    
}

if( function_exists('ut_return_header_config') && ut_return_header_config( 'ut_header_layout', 'default' ) == 'side' && $needs_side_nav_spacing ) {
    $output .= '<div class="vc-sidenav-column-container-wrap">';
}

$output .= wpb_js_remove_wpautop( $content );

if( function_exists('ut_return_header_config') && ut_return_header_config( 'ut_header_layout', 'default' ) == 'side' && $needs_side_nav_spacing ) {
    $output .= '</div>';
}    

if( !empty( $bklyn_section_anchor_id ) ) {
    
    $output .= '<a class="ut-vc-offset-anchor-bottom" id="section-' . ut_create_slug( $bklyn_section_anchor_id ) .'" name="section-' . ut_create_slug( $bklyn_section_anchor_id ) .'">' . $bklyn_section_anchor_id .'</a>';    
    
}

$output .= $custom_css_style;

if( $bklyn_overlay ) {
    
    $output .= '<div id="' . $overlay_style_id . '" class="bklyn-overlay ' . ( $bklyn_overlay_pattern ? $bklyn_overlay_pattern_style : '' ) . '"></div>';
    
}

$output .= '</section>';
$output .= $after_output;

echo $output;
