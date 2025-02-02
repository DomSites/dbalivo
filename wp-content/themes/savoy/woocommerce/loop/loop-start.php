<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 NM: Modified */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $woocommerce_loop, $nm_globals, $nm_theme_options;


$container_classes = array();

$is_product_shortcode = isset( $nm_globals['is_product_shortcode'] ) ? true : false; // Note: $nm_globals['is_product_shortcode'] is unset in "../woocommerce/loop/loop-end.php"
$is_shop_catalog = ( ( is_shop() || is_product_taxonomy() ) && ! $is_product_shortcode ) ? true : false;
$is_non_standard_grid = ( $is_shop_catalog && $nm_theme_options['shop_grid'] !== 'default' ) ? true : false;


// Columns size: Large
if ( $is_non_standard_grid ) {
    $columns_grid = array(
        'scattered'     => '2',
        'grid-6n-1-5'   => '3',
        'grid-10n-1-7'  => '4',
        'list'          => '1'
    );
    $columns_large = ( isset( $columns_grid[$nm_theme_options['shop_grid']] ) ) ? $columns_grid[$nm_theme_options['shop_grid']] : '4';
} else {
    // Note: $woocommerce_loop['columns'] is set in "../archive-product.php"
    if ( ( isset( $woocommerce_loop['columns'] ) && $woocommerce_loop['columns'] != '' ) ) {
        $columns_large = $woocommerce_loop['columns'];
    } else {
        $columns_large = ( isset( $_GET['col'] ) ) ? intval( $_GET['col'] ) : $nm_theme_options['shop_columns'];
    }
}
// Columns size: Medium
if ( isset( $woocommerce_loop['columns_medium'] ) ) {
    $columns_medium = $woocommerce_loop['columns_medium'];
} else {
    $columns_medium = apply_filters( 'nm_shop_columns_medium_class', array(
        // (large column) => (medium column)
        '1' => '1',
        '2' => '2',
        '3' => ( $nm_theme_options['products_layout'] !== 'overlay' ) ? '3' : '2',
        '4' => '3',
        '5' => '3',
        '6' => '3',
        '7' => '4',
        '8' => '4',
    ) );
    $columns_medium = ( isset( $columns_medium[$columns_large] ) ) ? $columns_medium[$columns_large] : '2';
}
// Columns size: Small
if ( isset( $woocommerce_loop['columns_small'] ) ) {
    $columns_small = $woocommerce_loop['columns_small'];
} else {
    $columns_small = ( intval( $columns_large ) < 2 ) ? $columns_large : '2';
}
// Columns size: Xsmall
$columns_xsmall = ( isset( $woocommerce_loop['columns_xsmall'] ) ) ? $woocommerce_loop['columns_xsmall'] : $nm_theme_options['shop_columns_mobile'];


// Columns class
$container_classes['columns_class'] = apply_filters( 'nm_shop_columns_class', 'xsmall-block-grid-' . $columns_xsmall . ' small-block-grid-' . $columns_small . ' medium-block-grid-' . $columns_medium . ' large-block-grid-' . $columns_large );


// Grid and Layout class
if ( $is_shop_catalog ) {
    $grid_class = ( strpos( $nm_theme_options['shop_grid'], 'grid' ) !== false ) ? 'grid-variable ' . $nm_theme_options['shop_grid'] : 'grid-' . $nm_theme_options['shop_grid'];
    $layout_class = ( strpos( $nm_theme_options['shop_grid'], 'list' ) !== false ) ? 'layout-default' : 'layout-' . $nm_theme_options['products_layout'];
} else {
    $grid_class = 'grid-default';
    $layout_class = 'layout-' . $nm_theme_options['products_layout'];
}
$container_classes['grid_class'] = apply_filters( 'nm_shop_grid_class', $grid_class );
$container_classes['layout_class'] = apply_filters( 'nm_shop_layout_class', $layout_class );


// Attributes (color/image swatches) class
$container_classes['attributes_class'] = 'attributes-position-' . $nm_theme_options['product_attributes_position'];


// Action links class
$container_classes['action_link_class'] = ( ! $nm_theme_options['product_action_link'] && ! $nm_theme_options['product_quickview_link'] ) ? 'no-action-links' : 'has-action-links';


// Container classes
$container_class = 'nm-products products ' .  implode( ' ', $container_classes );
?>
<ul class="<?php echo esc_attr( $container_class ); ?>">
