<?php
/**
 * Product quantity inputs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/quantity-input.php.
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
 * @version     2.5.0
 NM: Modified */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( $max_value && $min_value === $max_value ) {
	?>
	<input type="hidden" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $min_value ); ?>" />
	<?php
} else {
    ?>
    <div class="nm-quantity-wrap">
        <label><?php esc_html_e( 'Quantity', 'woocommerce' ); ?></label>
        <label class="nm-qty-label-abbrev"><?php esc_html_e( 'Qty', 'woocommerce' ); ?></label>

        <div class="quantity">
            <div class="nm-qty-minus nm-font nm-font-media-play flip"></div>

            <input type="number" class="input-text qty text" step="<?php echo esc_attr( $step ); ?>" min="<?php echo esc_attr( $min_value ); ?>" max="<?php echo esc_attr( 0 < $max_value ? $max_value : '' ); ?>" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $input_value ); ?>" size="4" pattern="[0-9]*" />

            <div class="nm-qty-plus nm-font nm-font-media-play"></div>
        </div>
    </div>
<?php
}
