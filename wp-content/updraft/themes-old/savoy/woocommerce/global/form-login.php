<?php
/**
 * Login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/form-login.php.
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
 * @version     2.1.0
 NM: Modified */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( is_user_logged_in() ) { 
	return;
}
?>

<div class="nm-myaccount-login">

    <h2><?php _e( 'Login', 'woocommerce' ); ?></h2>
    
    <p class="nm-login-message"><?php if ( $message ) { echo wptexturize( $message ); } ?></p>

    <form method="post" class="login" <?php if ( $hidden ) { echo 'style="display:none;"'; } ?>>

        <?php do_action( 'woocommerce_login_form_start' ); ?>

        <p class="form-row">
            <label for="username"><?php _e( 'Username or email', 'woocommerce' ); ?> <span class="required">*</span></label>
            <input type="text" class="input-text" name="username" id="username" />
        </p>
        <p class="form-row">
            <label for="password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
            <input class="input-text" type="password" name="password" id="password" />
        </p>

        <?php do_action( 'woocommerce_login_form' ); ?>

        <p class="form-row form-group">
            <label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
                <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php _e( 'Remember me', 'woocommerce' ); ?></span>
            </label>
            
            <span class="woocommerce-LostPassword lost_password">
                <a href="<?php echo esc_url( wc_lostpassword_url() ); ?>"><?php _e( 'Lost your password?', 'woocommerce' ); ?></a>
            </span>
        </p>

        <p class="form-actions">
            <?php wp_nonce_field( 'woocommerce-login' ); ?>
            <input type="submit" class="button" name="login" value="<?php _e( 'Login', 'woocommerce' ); ?>" />
            <input type="hidden" name="redirect" value="<?php echo esc_url( $redirect ) ?>" />
        </p>

        <?php do_action( 'woocommerce_login_form_end' ); ?>

    </form>

</div>