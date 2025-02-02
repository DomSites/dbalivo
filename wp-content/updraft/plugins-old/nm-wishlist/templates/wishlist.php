<?php
/**
 * NM - Wishlist template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $nm_theme_options, $nm_wishlist_ids, $product;

$wishlist_ids = array_keys( $nm_wishlist_ids );
$wishlist_empty_class = '';

if ( ! empty( $nm_wishlist_ids ) ) {
    $args = array(
		'post_type'		 => 'product',
		'order'			 => 'DESC',
		'orderby' 		 => 'post__in',
		'posts_per_page' => apply_filters( 'nm_wishlist_products_limit', 500 ), // -1 = no limit
		'post__in'		 => $wishlist_ids
	);
			
	$wishlist_loop = new WP_Query( $args );
} else {
	$wishlist_loop = false;
}

?>

<?php if ( $wishlist_loop && $wishlist_loop->have_posts() ) : ?>

<div id="nm-wishlist">
	<div class="nm-row">
        <?php nm_print_shop_notices(); // Note: Don't remove (WooCommerce will output multiple messages otherwise) ?>
        
        <div class="col-lg-3 col-xs-12">
            <h1><?php esc_html_e( 'Wishlist', 'nm-wishlist' ); ?></h1>
        </div>
        
        <div class="col-lg-9 col-xs-12">
            <table id="nm-wishlist-table" class="products" cellspacing="0">
                <thead>
                    <tr>
                        <th class="title" colspan="2"><span><?php esc_html_e( 'Product', 'nm-wishlist' ); ?></span></th>
                        <th class="price-stock" colspan="2"><span><?php esc_html_e( 'Price & Stock', 'nm-wishlist' ); ?></span></th>
                    </tr>
                </thead>
                <tbody>
					<?php 
                        while ( $wishlist_loop->have_posts() ) : $wishlist_loop->the_post(); 
                            
                        global $product;
                    ?>
                    <tr data-product-id="<?php echo $product->get_id(); ?>">
                        <td class="thumbnail">
                            <a href="<?php the_permalink(); ?>"><?php echo $product->get_image(); ?></a>
                        </td>
                        <td class="title">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            
                            <?php
                                // Product variations
                                if ( $nm_theme_options['wishlist_show_variations'] && $product->get_type() == 'variable' ) {
                                    nm_product_variations_list( $product );
                                }
                            ?>
                            
                            <a href="#" class="nm-wishlist-remove invert-color"><?php esc_html_e( 'Remove', 'nm-wishlist' ); ?></a>
                        </td>
                        <td class="price-stock">
                            <?php
								// Price
								woocommerce_template_loop_price();
				            ?>
                            
                            <?php
                                // Availability
                                $availability      = $product->get_availability();
                                $availability_html = empty( $availability['availability'] ) ? '' : '<p class="stock ' . esc_attr( $availability['class'] ) . '">' . esc_html( $availability['availability'] ) . '</p>';
                            
                                echo apply_filters( 'woocommerce_stock_html', $availability_html, $availability['availability'], $product );
							?>
                        </td>
                        <td class="actions">
                            <?php woocommerce_template_loop_add_to_cart(); ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
             </table>
            
            <?php if ( $nm_theme_options['wishlist_share'] ) : ?>
            <div class="nm-wishlist-share">
                <?php
                    if ( strlen( $nm_theme_options['wishlist_page_id'] ) > 0 ) :
                        $share_link_url         = esc_url( get_permalink( $nm_theme_options['wishlist_page_id'] ) . '?nmwl_share=' . implode( ',', $wishlist_ids ) );
                        $share_link_title       = esc_attr( $nm_theme_options['wishlist_share_title'] );
                        $share_summary          = esc_attr( str_replace( '%wishlist_url%', $share_link_url, $nm_theme_options['wishlist_share_text'] ) );
                        $share_twitter_summary  = esc_attr( str_replace( '%wishlist_url%', '', $nm_theme_options['wishlist_share_text'] ) );
                        $share_image_url        = esc_url( $nm_theme_options['wishlist_share_image_url'] );
                ?>
                <ul>
                    <li>
                        <span><?php esc_html_e( 'Share Wishlist:', 'nm-wishlist' ); ?></span>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/sharer.php?s=100&amp;p%5Btitle%5D=<?php echo $share_link_title; ?>&amp;p%5Burl%5D=<?php echo $share_link_url; ?>&amp;p%5Bsummary%5D=<?php echo $share_summary; ?>&amp;p%5Bimages%5D%5B0%5D=<?php echo $share_image_url; ?>" class="facebook invert-color" target="_blank" title="<?php esc_html_e( 'Share on Facebook', 'nm-wishlist' ); ?>">
                            <i class="nm-font nm-font-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/share?url=<?php echo $share_link_url; ?>&amp;text=<?php echo $share_twitter_summary; ?>" class="twitter invert-color" target="_blank" title="<?php esc_html_e( 'Share on Twitter', 'nm-wishlist' ); ?>">
                            <i class="nm-font nm-font-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="http://pinterest.com/pin/create/button/?url=<?php echo $share_link_url; ?>&amp;description=<?php echo $share_summary; ?>&amp;media=<?php echo $share_image_url; ?>" class="pinterest invert-color" target="_blank" title="<?php esc_html_e( 'Pin on Pinterest', 'nm-wishlist' ); ?>" onclick="window.open(this.href);return false;">
                            <i class="nm-font nm-font-pinterest"></i>
                        </a>
                    </li>
                </ul>
                <?php else: ?>
                <p class="nm-wishlist-share-notice">Social share: Please select the Wishlist page on "Theme Settings > Wishlist" in the WP admin.</p>
                <?php endif; ?>
            </div>
            <?php endif; ?>
         </div>
     </div>
</div>

<?php 
    else :

        $wishlist_empty_class = ' class="show"';
    
    endif;
?>

<div id="nm-wishlist-empty"<?php echo $wishlist_empty_class; ?>>
    <div class="nm-row">
        <div class="col-xs-12">
            <p class="icon"><i class="nm-font nm-font-close2"></i></p>
            <h1><?php esc_html_e( 'The wishlist is currently empty.', 'nm-wishlist' ); ?></h1>
            <p class="note"><?php printf( esc_html__( 'Click the %s icons to add products', 'nm-wishlist' ), apply_filters( 'nm_wishlist_button_icon', '<i class="nm-font nm-font-heart-o"></i>' ) ); ?></p>
            <p><a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>" class="button"><?php esc_html_e( 'Return to Shop', 'nm-wishlist' ); ?></a></p>
        </div>
    </div>
</div>
