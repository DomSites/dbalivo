<?php
/**
 * Order Customer Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-customer.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 NM: Modified */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<ul class="customer_details">
    <h2><?php _e( 'Customer details', 'woocommerce' ); ?></h2>
	<?php if ( $order->get_customer_note() ) : ?>
		<li>
			<h3><?php _e( 'Note:', 'woocommerce' ); ?></h3>
            <div><?php echo wptexturize( $order->get_customer_note() ); ?></div>
		</li>
	<?php endif; ?>

	<?php if ( $order->get_billing_email() ) : ?>
		<li>
			<h3><?php _e( 'Email:', 'woocommerce' ); ?></h3>
			<div><?php echo esc_html( $order->get_billing_email() ); ?></div>
		</li>
	<?php endif; ?>

	<?php if ( $order->get_billing_phone() ) : ?>
		<li>
			<h3><?php _e( 'Telephone:', 'woocommerce' ); ?></h3>
			<div><?php echo esc_html( $order->get_billing_phone() ); ?></div>
		</li>
	<?php endif; ?>

	<?php do_action( 'woocommerce_order_details_after_customer_details', $order ); ?>
</ul>

<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() ) : ?>

<div class="addresses nm-row">
    <div class="nm-address-billing col-sm-6 col-xs-12">

<?php else : ?>

<div class="addresses">

<?php endif; ?>

<header class="title">
    <h3><?php _e( 'Billing address', 'woocommerce' ); ?></h3>
</header>
<address>
    <?php echo ( $address = $order->get_formatted_billing_address() ) ? $address : __( 'N/A', 'woocommerce' ); ?>
</address>

<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() ) : ?>

    </div>

    <div class="nm-address-shipping col-sm-6 col-xs-12">
        <header class="title">
            <h3><?php _e( 'Shipping address', 'woocommerce' ); ?>:</h3>
        </header>
        <address>
			<?php echo ( $address = $order->get_formatted_shipping_address() ) ? $address : __( 'N/A', 'woocommerce' ); ?>
		</address>
    </div>

<?php endif; ?>

</div>

<div class="clearfix"></div>
