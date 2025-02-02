<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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
 * @version     1.6.4
 NM: Modified */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $nm_theme_options;

/* Product summary: Opening tags */
function nm_single_product_summary_open() {
	echo '<div class="nm-product-summary-inner-col nm-product-summary-inner-col-1">';
}
/* Product summary: Divider tags */
function nm_single_product_summary_divider() {
	echo '</div><div class="nm-product-summary-inner-col nm-product-summary-inner-col-2">';
}
/* Product summary: Closing tag */
function nm_single_product_summary_close() {
	echo '</div>';
}

// Action: woocommerce_before_single_product
remove_action( 'woocommerce_before_single_product', 'wc_print_notices', 10 );

// Action: woocommerce_before_single_product_summary
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

// Action: woocommerce_single_product_summary
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'nm_single_product_summary_open', 1 );
add_action( 'woocommerce_single_product_summary', 'nm_single_product_summary_divider', 15 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 21 );
add_action( 'woocommerce_single_product_summary', 'nm_single_product_summary_close', 100 );

// Action: woocommerce_after_single_product_summary
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_template_single_meta', 12 );

// Main container class
$post_class = 'nm-single-product';

// Gallery column class
$post_class .= ' gallery-col-' . $nm_theme_options['product_image_column_size'];

// Summary column class
$summary_column_size = 12 - intval( $nm_theme_options['product_image_column_size'] );
$post_class .= ' summary-col-' . $summary_column_size;

// Thumbnails class
$post_class .= ' thumbnails-' . apply_filters( 'nm_single_product_thumbnails_layout', 'vertical' ); // Use "horizontal" to change layout


// Background color class
if ( isset( $_GET['nobg'] ) ) {
	$post_class .= ' no-bg';
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div id="product-<?php the_ID(); ?>" <?php post_class( $post_class ); ?>>
    
    <div class="nm-single-product-bg">
    
        <?php wc_get_template( 'single-product/breadcrumb_nm.php' ); ?>
        
        <?php nm_print_shop_notices(); ?>

        <div class="nm-single-product-showcase">
            <div class="nm-row">
                <div class="col-xs-12">

                    <?php
                        /**
                         * woocommerce_before_single_product_summary hook.
                         *
                         * @hooked woocommerce_show_product_sale_flash - 10
                         * @hooked woocommerce_show_product_images - 20
                         */
                        do_action( 'woocommerce_before_single_product_summary' );
                    ?>

                    <div class="summary entry-summary">

                        <?php
                            /**
                             * woocommerce_single_product_summary hook.
                             *
                             * @hooked woocommerce_template_single_title - 5
                             * @hooked woocommerce_template_single_rating - 10
                             * @hooked woocommerce_template_single_price - 10
                             * @hooked woocommerce_template_single_excerpt - 20
                             * @hooked woocommerce_template_single_add_to_cart - 30
                             * @hooked woocommerce_template_single_meta - 40
                             * @hooked woocommerce_template_single_sharing - 50
                             * @hooked WC_Structured_Data::generate_product_data() - 60
                             */
                            do_action( 'woocommerce_single_product_summary' );
                        ?>

                    </div><!-- .summary -->

                </div>
            </div>
        </div>
    
    </div>
        
	<?php
		/**
		 * woocommerce_after_single_product_summary hook.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
