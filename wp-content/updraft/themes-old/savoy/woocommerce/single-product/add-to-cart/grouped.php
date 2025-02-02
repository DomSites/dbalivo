<?php
/**
 * Grouped product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/grouped.php.
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

global $product, $post, $nm_theme_options;

// Quantity arrows class
$nm_quantity_arrows_class = ( $nm_theme_options['grouped_products_qty_arrows'] ) ? ' qty-show' : '';

// Add-to-cart button
$nm_add_to_cart_button = sprintf(
    '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="%s product_type_%s button" title="%s"><i class="nm-font-plus"></i></a>',
    esc_url( $grouped_product->add_to_cart_url() ),
    esc_attr( $grouped_product->get_id() ),
    esc_attr( $grouped_product->get_sku() ),
    esc_attr( isset( $quantity ) ? $quantity : 1 ),
    $grouped_product->is_purchasable() && $grouped_product->is_in_stock() ? 'add_to_cart_button' : '',
    esc_attr( $grouped_product->get_type() ),
    esc_html( $grouped_product->add_to_cart_text() )
);

// Default quantity
$nm_qty = apply_filters( 'nm_product_grouped_default_qty', 1 );

do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form class="cart" method="post" enctype='multipart/form-data'>
	<table cellspacing="0" class="group_table<?php echo esc_attr( $nm_quantity_arrows_class ); ?>">
		<tbody>
			<?php
                $quantites_required = false;
            
				foreach ( $grouped_products as $grouped_product ) {
                    $post_object        = get_post( $grouped_product->get_id() );
					$quantites_required = $quantites_required || ( $grouped_product->is_purchasable() && ! $grouped_product->has_options() );

					setup_postdata( $GLOBALS['post'] =& $post_object );
					?>
					<tr id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
						<td class="label">
							<label for="product-<?php echo $grouped_product->get_id(); ?>">
								<?php echo $product->is_visible() ? '<a href="' . esc_url( apply_filters( 'woocommerce_grouped_product_list_link', get_permalink(), $grouped_product->get_id() ) ) . '" class="invert-color">' . get_the_title() . '</a>' : get_the_title(); ?>
							</label>
						</td>
						<?php do_action( 'woocommerce_grouped_product_list_before_price', $grouped_product ); ?>
						<td class="price">
							<?php
								echo $grouped_product->get_price_html();
								echo wc_get_stock_html( $grouped_product );
							?>
						</td>
                        <td>
                            <?php if ( ! $grouped_product->is_purchasable() || $grouped_product->has_options() ) : ?>
                                <?php echo $nm_add_to_cart_button; //woocommerce_template_loop_add_to_cart(); ?>
                            
                            <?php elseif ( $grouped_product->is_sold_individually() ) : ?>
                                <input type="checkbox" name="<?php echo esc_attr( 'quantity[' . $grouped_product->get_id() . ']' ); ?>" value="1" class="wc-grouped-product-add-to-cart-checkbox" />
                                
							<?php else : ?>
								<?php
                                    /**
									 * @since 3.0.0.
									 */
									do_action( 'woocommerce_before_add_to_cart_quantity' );
									
                                    woocommerce_quantity_input( array(
										'input_name'  => 'quantity[' . $grouped_product->get_id() . ']',
										'input_value' => isset( $_POST['quantity'][ $grouped_product->get_id() ] ) ? wc_stock_amount( $_POST['quantity'][ $grouped_product->get_id() ] ) : $nm_qty,
										'min_value'   => apply_filters( 'woocommerce_quantity_input_min', 0, $grouped_product ),
										'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $grouped_product->get_max_purchase_quantity(), $grouped_product ),
									) );
                    
                                    /**
									 * @since 3.0.0.
									 */
									do_action( 'woocommerce_after_add_to_cart_quantity' );
								?>
							<?php endif; ?>
						</td>
					</tr>
					<?php
				}
				wp_reset_postdata();
			?>
		</tbody>
	</table>

	<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" />

	<?php if ( $quantites_required ) : ?>

		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<button type="submit" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

	<?php endif; ?>
</form>

<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
