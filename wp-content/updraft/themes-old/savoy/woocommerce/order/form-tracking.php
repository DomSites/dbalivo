<?php
/**
 * Order tracking form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/form-tracking.php.
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
 * @version 1.6.4
 NM: Modified */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;

?>

<style type="text/css">
	.woocommerce-error { margin: 55px auto -9px; text-align: center; }
	@media all and (max-width: 550px) { .woocommerce-error { margin-bottom: -36px; } }
</style>

<div class="nm-order-track">
    <div class="nm-order-track-top">
        <h1><?php esc_html_e( 'Order Tracking', 'nm-framework' ); ?></h1>
        
		<p><?php esc_html_e( 'To track your order please enter your Order ID in the box below and press the "Track" button. This was given to you on your receipt and in the confirmation email you should have received.', 'woocommerce' ); ?></p>        
    </div>
    
    <div class="nm-order-track-form">
        <form action="<?php echo esc_url( get_permalink( $post->ID ) ); ?>" method="post" class="track_order">
            <p class="form-row form-row-wide"><label for="orderid"><?php _e( 'Order ID', 'woocommerce' ); ?></label> <input class="input-text" type="text" name="orderid" id="orderid" placeholder="<?php _e( 'Found in your order confirmation email.', 'woocommerce' ); ?>" /></p>
            <p class="form-row form-row-wide"><label for="order_email"><?php _e( 'Billing email', 'woocommerce' ); ?></label> <input class="input-text" type="text" name="order_email" id="order_email" placeholder="<?php _e( 'Email you used during checkout.', 'woocommerce' ); ?>" /></p>
        
            <p class="form-actions"><input type="submit" class="button" name="track" value="<?php _e( 'Track', 'woocommerce' ); ?>" /></p>
            <?php wp_nonce_field( 'woocommerce-order_tracking' ); ?>
        </form>
    </div>
</div>