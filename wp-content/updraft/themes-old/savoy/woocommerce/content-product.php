<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 NM: Modified */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $nm_theme_options, $nm_globals;

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

nm_add_page_include( 'products' );

// Action: woocommerce_before_shop_loop_item
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
// Action: woocommerce_before_shop_loop_item_title
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
// Action: woocommerce_shop_loop_item_title
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
// Action: woocommerce_after_shop_loop_item_title
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
// Action: woocommerce_after_shop_loop_item
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

// Hover product image
$hover_image = ( $nm_theme_options['product_hover_image_global'] ) ? true : get_post_meta( $product->get_id(), 'nm_product_image_swap', true );
$post_classes = ( $hover_image ) ? 'hover-image-load' : '';

// Product link
$product_link_atts = ' href="' . esc_url( get_permalink() ) . '"';

// Quickview link
if ( $nm_theme_options['product_quickview'] ) {
    $quickview_enabled = true;
    
    // Default link
    $show_default_link = apply_filters( 'nm_product_default_link', false );
    if ( ! $show_default_link ) {
        // Action: woocommerce_after_shop_loop_item
        remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
    }
    
    $quickview_link_atts = $product_link_atts . ' data-product_id="' . esc_attr( $product->get_id() ) . '" class="nm-quickview-btn product_type_' . esc_attr( $product->get_type() ) . '"';
    
    // Override static product link?
    if ( $nm_theme_options['product_quickview_links'] == 'all' ) {
        $product_link_atts = $quickview_link_atts;
    }
} else {
    $quickview_enabled = false;
}
?>
<li <?php post_class( $post_classes ); ?>>

	<?php
		/**
		 * woocommerce_before_shop_loop_item hook.
		 */
		do_action( 'woocommerce_before_shop_loop_item' );
	?>
    
    <div class="nm-shop-loop-thumbnail nm-loader">
        <a<?php echo $product_link_atts; ?> class="woocommerce-LoopProduct-link">
            <?php
				/**
				 * woocommerce_before_shop_loop_item_title hook.
				 *
				 * @hooked woocommerce_show_product_loop_sale_flash - 10
				 */
				do_action( 'woocommerce_before_shop_loop_item_title' );
			?>
            
			<?php
                if ( has_post_thumbnail() ) {
                    $product_thumbnail_id = get_post_thumbnail_id();
                    echo nm_product_thumbnail( $product_thumbnail_id );
                } else {
				    echo '<img src="' . esc_url( $nm_globals['product_placeholder_image'] ) . '" class="attachment-shop-catalog" />';
                }
            
                // Alternative/hover image
                if ( $hover_image ) {
                    echo nm_product_thumbnail_alt( $product );
                }
			?>
        </a>
    </div>
	
    <div class="nm-shop-loop-details">
    	<?php if ( $nm_globals['wishlist_enabled'] ) : ?>
        <div class="nm-shop-loop-wishlist-button"><?php nm_wishlist_button(); ?></div>
        <?php endif; ?>
        
        <h3><a<?php echo $product_link_atts; ?>><?php the_title(); ?></a></h3>
        <?php 
            /**
             * woocommerce_shop_loop_item_title hook.
             */
            do_action( 'woocommerce_shop_loop_item_title' );
        ?>
        
        <div class="nm-shop-loop-after-title <?php echo esc_attr( $nm_theme_options['product_action_link'] ); ?>">
			<div class="nm-shop-loop-price">
                <?php
					/**
					 * woocommerce_after_shop_loop_item_title hook.
					 *
					 * @hooked woocommerce_template_loop_price - 10
					 */
					do_action( 'woocommerce_after_shop_loop_item_title' );
				?>
            </div>
            
            <div class="nm-shop-loop-actions">
				<?php
                    if ( $quickview_enabled ) {
                        echo apply_filters( 'nm_product_quickview_link', '<a' . $quickview_link_atts . '>' . esc_html__( 'Show more', 'nm-framework' ) . '</a>' );
                    }
                
                    /**
                     * woocommerce_after_shop_loop_item hook.
                     *
                     * @hooked woocommerce_template_loop_add_to_cart - 10
                     */
                    do_action( 'woocommerce_after_shop_loop_item' );
                ?>
            </div>
        </div>
    </div>

</li>
