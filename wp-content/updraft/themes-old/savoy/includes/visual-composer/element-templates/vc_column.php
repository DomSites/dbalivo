<?php
$el_class = $el_id = $width = $css = $offset = $css_animation = '';
extract(shortcode_atts(array(
    'el_id'         => '',
    'el_class' 		=> '',
    'width' 		=> '1/1',
    'css' 			=> '',
    'offset' 		=> '',
    'css_animation' => ''
), $atts));

$width = wpb_translateColumnWidthToSpan( $width );
$width = vc_column_offset_class_merge( $offset, $width );
$width = str_replace( 'vc_', '', $width ); // Remove 'vc_' prefix(es)

$css_classes = array(
    $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation ),
    'nm_column',
    $width
);

$wrapper_attributes = array();

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';
if ( ! empty( $el_id ) ) {
    $wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}

$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';
$output .= '<div class="wpb_wrapper">';
$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';
$output .= '</div>';

echo $output;
