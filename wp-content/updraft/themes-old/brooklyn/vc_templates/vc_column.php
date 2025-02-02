<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $width
 * @var $css
 * @var $offset
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Column
 */
$el_class = $width = $css = $offset = $hide_on_desktop = $hide_on_tablet = $hide_on_mobile = $add_box_shadow = $shadow_color = $shadow_color_hover = $add_box_shadow_spacing = '';

$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$width = wpb_translateColumnWidthToSpan( $width );
$width = vc_column_offset_class_merge( $offset, $width );

$css_classes = array(
	$this->getExtraClass( $el_class ),
	'wpb_column',
	'vc_column_container',
	$width,
);

if( vc_shortcode_custom_css_has_property( $css, array('border', 'background', 'background-image', 'background-color' ) ) || $bklyn_overlay ) {
	$css_classes[]='vc_col-has-fill';
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


$animation_attributes = array();

/* fill animation classes */
if( !empty( $effect ) && $effect != 'none' ) {
    
    $css_classes[] = 'ut-animate-element';
    $css_classes[] = 'animated';             
                
    if( $animate_tablet ) {
        $css_classes[]  = 'ut-no-animation-tablet';
    }
    
    if( $animate_mobile ) {
        $css_classes[]  = 'ut-no-animation-mobile';
    }
    
    if( $animate_once == 'infinite' ) {
        $css_classes[]  = 'infinite';
    }
    
    $animation_attributes['data-effect'] = esc_attr( $effect );
    $animation_attributes['data-animateonce'] = esc_attr( $animate_once );
    
    //$animation_attributes['data-appear-top-offset'] = '-120';
    
    $delay_timer = !empty( $delay_timer ) ? $delay_timer : 200;
    $animation_attributes['data-delay'] = esc_attr( $delay_timer );
    
    $animation_duration = !empty( $animation_duration ) ? $animation_duration : '1s';
    $animation_attributes['data-animation-duration'] = esc_attr( $animation_duration );    
    
}

/* attributes string */
$animation_attributes = implode(' ', array_map(
    function ($v, $k) { return sprintf("%s=\"%s\"", $k, $v); },
    $animation_attributes,
    array_keys( $animation_attributes )
) );




/**
 * Overlay Settings
 */

$overlay_style_id = uniqid("ut_row_overlay_");

$row_custom_class = uniqid("ut_row_");
$column_inner_id = uniqid("ut_inner_column_");

$inner_css_classes = array();
$modified_css = false;

// box shadow
if( $add_box_shadow ) {
    $inner_css_classes[] = 'ut-column-shadow';
}

$custom_css_style = '<style type="text/css" scoped>';
    
    if( $add_box_shadow && $shadow_color ) {
        $custom_css_style .= '#' . $column_inner_id . '.ut-column-shadow { transition: box-shadow 0.3s ease-in-out; box-shadow: 0 0 40px ' . $shadow_color . '; }';        
    }

    if( $add_box_shadow && $shadow_color_hover ) {
        $custom_css_style .= '#' . $column_inner_id . ':hover.ut-column-shadow { box-shadow: 0 0 40px ' . $shadow_color_hover . '; }';        
    }

    if( $add_box_shadow && $add_box_shadow_spacing ) {
        $custom_css_style .= '#' . $column_inner_id . '.ut-column-shadow { margin: 40px; }';    
    }


    if( $bklyn_overlay ) {

        if( $bklyn_overlay_color ) {
    
            if ( preg_match( '/^#[a-f0-9]{6}$/i', $bklyn_overlay_color ) ) {
                $bklyn_overlay_color = 'rgba(' .  ut_hex_to_rgb( $bklyn_overlay_color )  . ', 0.8 );';
            }

            $custom_css_style .= '#' . $overlay_style_id . '{ background-color: ' . $bklyn_overlay_color . ';}';
        
        }
            
        /* add parent css class */
        $css_classes[] = 'bklyn-column-with-overlay';
        
    }    
    
    if( $background_position ) {
    
        $custom_css_style .= '.' . $row_custom_class . '{ background-position: ' . $background_position . ';}';        
            
        /* remove vc background position */
        $atts['css'] = preg_replace("/background-position:/", "", $atts['css']); 
        
        if( unite_mobile_detection()->isMobile() && $hide_bg_mobile ) {
            $atts['css'] = preg_replace("/background-image:/", "", $atts['css']); 
        }
        
        if( unite_mobile_detection()->isTablet() && $hide_bg_tablet ) {
            $atts['css'] = preg_replace("/background-image:/", "", $atts['css']); 
        }
        
        /* search for vc custom css */            
        $vc_custom_css_id = ut_search_array_key('vc_custom_', $css_classes);
        
        /* replace vc css class */
        $atts['css'] = str_replace( esc_attr( trim( vc_shortcode_custom_css_class( $css ) ) ), $row_custom_class, $atts['css']);
        
        /* add remaining VC CSS */
        $custom_css_style .= $atts['css'];
        
        $inner_css_classes[] = $row_custom_class;
        $modified_css = true;
        
    }
        
    if( $background_attachment ) {
    
        $custom_css_style .= '.' . $row_custom_class . '{ background-attachment: ' . $background_attachment . ';}'; 
        $modified_css = true;
    
    }

$custom_css_style .= '</style>';

if( $hide_bg_tablet ) {
    $inner_css_classes[] = 'hide-bg-on-tablet';
}        
    
if( $hide_bg_mobile ) {
    $inner_css_classes[] = 'hide-bg-on-mobile';
} 

if( $hide_bg_medium ) {
    $inner_css_classes[] = 'hide-bg-on-medium';
}















$wrapper_attributes = array();

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';
$wrapper_attributes[] = $animation_attributes;

if( !$modified_css ) {
    $inner_css_classes[] = esc_attr( trim( vc_shortcode_custom_css_class( $css ) ) );
}

$output .= $custom_css_style;
$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';
$output .= '<div id="' . $column_inner_id . '" class="vc_column-inner ' . implode(' ', $inner_css_classes ) . '">';
$output .= '<div class="wpb_wrapper">';
$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';
if( $bklyn_overlay ) {
        
    $output .= '<div id="' . $overlay_style_id . '" class="bklyn-overlay ' . ( $bklyn_overlay_pattern ? $bklyn_overlay_pattern_style : '' ) . '"></div>';
    
}
$output .= '</div>';
$output .= '</div>';

echo $output;
