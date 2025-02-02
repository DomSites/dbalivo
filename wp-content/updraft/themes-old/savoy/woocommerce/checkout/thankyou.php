<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
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
 * @version     3.0.0
 NM: Modified */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="nm-checkout-ty">

    <?php if ( $order ) : ?>

        <?php if ( $order->has_status( 'failed' ) ) : ?>

            <p class="woocommerce-thankyou-order-failed nm-shop-notice woocommerce-error">
                <span>
                    <i class="nm-font nm-font-close"></i><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?>
                </span>
            </p>

            <p class="woocommerce-thankyou-order-failed-actions">
                <a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', 'woocommerce' ) ?></a>
                <?php if ( is_user_logged_in() ) : ?>
                    <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php _e( 'My Account', 'woocommerce' ); ?></a>
                <?php endif; ?>
            </p>

        <?php else : ?>

            <p class="woocommerce-thankyou-order-received nm-shop-notice woocommerce-message">
                <span>
                    <i class="nm-font nm-font-check"></i><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); ?>
                </span>
            </p>

            <div class="nm-checkout-ty-order-details-top">
                <ul class="woocommerce-thankyou-order-details order_details">
                    
                    <li class="order">
                        <?php _e( 'Order number:', 'woocommerce' ); ?>
                        <strong><?php echo $order->get_order_number(); ?></strong>
                    </li>
                    
                    <li class="date">
                        <?php _e( 'Date:', 'woocommerce' ); ?>
                        <strong><?php echo wc_format_datetime( $order->get_date_created() ); ?></strong>
                    </li>
                    
                    <li class="total">
                        <?php _e( 'Total:', 'woocommerce' ); ?>
                        <strong><?php echo $order->get_formatted_order_total(); ?></strong>
                    </li>
                    
                    <?php if ( $order->payment_method_title ) : ?>
                    
                    <li class="method">
                        <?php _e( 'Payment method:', 'woocommerce' ); ?>
                        <strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
                    </li>
                    
                    <?php endif; ?>
                    
                </ul>
            </div>

        <?php endif; ?>

        <div class="nm-checkout-ty-payment-details">
            <?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
        </div>

        <?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

    <?php else : ?>

        <p class="woocommerce-thankyou-order-received nm-shop-notice woocommerce-message">
            <span>
                <i class="nm-font nm-font-check"></i><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), null ); ?>
            </span>
        </p>

    <?php endif; ?>
    
</div>
