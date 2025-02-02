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
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 7.8.0
 NM: Modified */

defined( 'ABSPATH' ) || exit;

$nm_is_hidden = ( $type === 'hidden' ) ? true : false;

if ( ! $nm_is_hidden ) {
    global $nm_theme_options;
    $nm_quantity_wrapper_classes = ( $nm_theme_options['qty_arrows'] ) ? 'qty-show' : 'qty-hide';
} else {
    $nm_quantity_wrapper_classes = 'nm-is-readonly';
}
?>
<div class="nm-quantity-wrap <?php echo esc_attr( $nm_quantity_wrapper_classes ); ?>">
    <?php do_action( 'woocommerce_before_quantity_input_field' ); ?>
    <label><?php esc_html_e( 'Quantity', 'woocommerce' ); ?></label>
    <label class="nm-qty-label-abbrev"><?php esc_html_e( 'Qty', 'woocommerce' ); ?></label>

    <?php
    /**
     * Hook to output something before the quantity input field.
     *
     * @since 7.2.0
     */
    do_action( 'woocommerce_before_quantity_input_field' );
    ?>
    <div class="quantity">
        <?php if ( ! $nm_is_hidden ): ?>
        <div class="nm-qty-minus nm-font nm-font-media-play flip"></div>
        <?php endif; ?>
        <input
            type="<?php echo esc_attr( $type ); ?>"
            <?php echo $readonly ? 'readonly="readonly"' : ''; ?>
            id="<?php echo esc_attr( $input_id ); ?>"
            class="<?php echo esc_attr( join( ' ', (array) $classes ) ); ?>"
            name="<?php echo esc_attr( $input_name ); ?>"
            value="<?php echo esc_attr( $input_value ); ?>"
            aria-label="<?php esc_attr_e( 'Product quantity', 'woocommerce' ); ?>"
            size="4"
            min="<?php echo esc_attr( $min_value ); ?>"
            max="<?php echo esc_attr( 0 < $max_value ? $max_value : '' ); ?>"
            <?php if ( ! $readonly ) : ?>
                step="<?php echo esc_attr( $step ); ?>"
                placeholder="<?php echo esc_attr( $placeholder ); ?>"
                pattern="[0-9]*"
            <?php endif; ?>
        />
        <?php if ( ! $nm_is_hidden ): ?>
        <div class="nm-qty-plus nm-font nm-font-media-play"></div>
        <?php endif; ?>
    </div>
    <?php
	/**
	 * Hook to output something after quantity input field
	 *
	 * @since 3.6.0
	 */
	do_action( 'woocommerce_after_quantity_input_field' );
	?>
</div>
<?php
