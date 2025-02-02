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
 * @version     2.0.0
 NM: Modified */

global $woocommerce_loop, $nm_theme_options;

// Columns large
if ( ( isset( $woocommerce_loop['columns'] ) && $woocommerce_loop['columns'] != '' ) ) {
	$columns_large = $woocommerce_loop['columns'];
} else {
	$columns_large = ( isset( $_GET['col'] ) ) ? intval( $_GET['col'] ) : $nm_theme_options['shop_columns'];
}

// Columns medium
if ( intval( $columns_large ) < 3 ) {
	$columns_medium = '2'; // Make sure "columns_medium" is lower-than or equal-to "columns"
} else {
	$columns_medium = ( isset( $woocommerce_loop['columns_medium'] ) ) ? $woocommerce_loop['columns_medium'] : '3';
}

// Columns small
$columns_small = ( isset( $woocommerce_loop['columns_small'] ) ) ? $woocommerce_loop['columns_small'] : '2';

// Columns x-small
$columns_xsmall = ( isset( $woocommerce_loop['columns_xsmall'] ) ) ? $woocommerce_loop['columns_xsmall'] : $nm_theme_options['shop_columns_mobile'];

// Class
$columns_class = 'xsmall-block-grid-' . $columns_xsmall . ' small-block-grid-' . $columns_small . ' medium-block-grid-' . $columns_medium . ' large-block-grid-' . $columns_large;


// Reset column values so they're not used in the next loop
unset( $woocommerce_loop['columns'] );
unset( $woocommerce_loop['columns_medium'] );
unset( $woocommerce_loop['columns_small'] );
unset( $woocommerce_loop['columns_xsmall'] );
?>
<ul class="nm-products products <?php echo esc_attr( $columns_class ); ?>">
