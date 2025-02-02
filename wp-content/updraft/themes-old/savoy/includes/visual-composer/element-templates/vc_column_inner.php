<?php
$el_class = $width = $el_id = $css = $offset = '';
extract(shortcode_atts(array(
    'el_class' 		=> '',
    'el_id'         => '',
    'width' 		=> '1/1',
    'css' 			=> '',
    'offset' 		=> ''
), $atts));

$width = wpb_translateColumnWidthToSpan( $width );
$width = vc_column_offset_class_merge( $offset, $width );
$width = str_replace( 'vc_', '', $width ); // Remove 'vc_' prefix(es)

$css_classes = array(
    $this->getExtraClass( $el_class ),
    'nm_column',
    'nm_column_inner',
    $width,
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
