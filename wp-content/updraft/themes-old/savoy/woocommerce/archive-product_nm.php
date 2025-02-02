<?php
/**
 * The template for displaying product archives content, including the main shop page which is a post type archive.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $nm_theme_options, $nm_globals;


nm_add_page_include( 'products' );


// Action: woocommerce_before_main_content
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

// Action: woocommerce_before_main_content
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );


// Product taxonomy
$is_product_taxonomy = ( is_product_taxonomy() ) ? true : false;


// Page content
if ( $is_product_taxonomy ) {
    $show_shop_page                 = ( $nm_theme_options['shop_content_taxonomy'] == 'shop_page' ) ? true : false;
    $show_taxonomy_header           = ( $nm_theme_options['shop_content_taxonomy'] == 'taxonomy_header' ) ? true : false;
    $hidden_taxonomy_description    = ( $show_taxonomy_header ) ? true : false;
    $show_taxonomy_description      = ( ! $show_taxonomy_header && $nm_theme_options['shop_category_description'] ) ? true : false;
} else {
    $show_shop_page                 = ( $nm_theme_options['shop_content_home'] ) ? true : false;
    $show_taxonomy_header           = false;
    $hidden_taxonomy_description    = false;
    $show_taxonomy_description      = ( $nm_theme_options['shop_category_description'] ) ? true : false;
}


// Shop header
$shop_class = ( $nm_theme_options['shop_header'] ) ? '' : 'header-disabled ';


// Sidebar/Filters
$show_filters_popup = false;
if ( $nm_theme_options['shop_filters'] == 'default' ) {
    nm_add_page_include( 'shop_filters' );
    
	$show_filters_sidebar  = true;
    $shop_class            .= 'nm-shop-sidebar-' . $nm_theme_options['shop_filters'] . ' nm-shop-sidebar-position-' . $nm_theme_options['shop_filters_sidebar_position'];
	$shop_column_size      = 'col-md-9 col-sm-12';
} else {
	$show_filters_sidebar  = false;
    $shop_class            .= 'nm-shop-sidebar-' . $nm_theme_options['shop_filters'];
    $shop_column_size      = 'col-xs-12';
    
    if ( $nm_theme_options['shop_filters'] == 'popup' ) {
        nm_add_page_include( 'shop_filters' );
        
        $show_filters_popup = true;
    }
}

get_header(); ?>
	
    <?php
        if ( $show_taxonomy_header ) :
            
            // Product taxonomy image
            $header_image_id    = get_woocommerce_term_meta( get_queried_object_id(), 'thumbnail_id', true );
            $header_image_url   = wp_get_attachment_url( $header_image_id );
            $header_image_class = $header_image_style_attr = '';
            if ( $header_image_url ) {
                $header_image_class         = ' has-image';
                $header_image_style_attr    = ' style="background-image: url(' . esc_url( $header_image_url ) . ');"';
            }

            $header_text_column_class = apply_filters( 'nm_category_header_column_class', 'col-xs-12 col-' . $nm_theme_options['shop_taxonomy_header_text_alignment'] );
    ?>
    
    <div id="nm-shop-taxonomy-header" class="nm-shop-taxonomy-header<?php echo esc_attr( $header_image_class ); ?>">
        <div class="nm-shop-taxonomy-header-inner"<?php echo $header_image_style_attr; ?>>
            <div class="nm-shop-taxonomy-text align-<?php echo esc_attr( $nm_theme_options['shop_taxonomy_header_text_alignment'] ); ?>">
                <div class="nm-row">
                    <div class="nm-shop-taxonomy-text-col <?php echo esc_attr( $header_text_column_class ); ?>">
                        <h1><?php woocommerce_page_title(); ?></h1>
                        <?php
                            /**
                             * woocommerce_archive_description hook
                             *
                             * @hooked woocommerce_taxonomy_archive_description - 10
                             * @hooked woocommerce_product_archive_description - 10
                             */
                            do_action( 'woocommerce_archive_description' );
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php elseif ( $hidden_taxonomy_description ) : ?>

    <div class="nm-shop-hidden-taxonomy-content">
        <h1><?php woocommerce_page_title(); ?></h1>
        <?php
			// Hidden taxonomy description
            if ( ! $show_taxonomy_description ) {
				/**
                 * woocommerce_archive_description hook
                 *
                 * @hooked woocommerce_taxonomy_archive_description - 10
                 * @hooked woocommerce_product_archive_description - 10
                 */
                do_action( 'woocommerce_archive_description' );
			}
        ?>
    </div>

    <?php endif; ?>

	<?php
        // Note: Keep below "get_header()" (page not loading properly in some cases otherwise)
        $shop_page = ( $show_shop_page ) ? get_post( apply_filters( 'wpml_object_id', $nm_globals['shop_page_id'], 'page' ) ) : false; // WPML: The "wpml_object_id" filter is used to get the translated page (if created)

        if ( $shop_page ) :
	?>

    <div class="nm-page-full">
        <div class="entry-content">
            <?php
				$shop_page_content = apply_filters( 'the_content', $shop_page->post_content );
				echo $shop_page_content;
			?>
        </div>
    </div>

	<?php endif; ?>
        
    <div id="nm-shop" class="nm-shop <?php echo esc_attr( $shop_class ); ?>">
        <?php
            /**
             * woocommerce_before_main_content hook.
             *
             * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
             */
            do_action( 'woocommerce_before_main_content' );
        ?>
        
        <?php 
			// Shop header
			if ( $nm_theme_options['shop_header'] ) {
				wc_get_template_part( 'content', 'product_nm_header' );
			}
		?>
        
        <?php nm_print_shop_notices(); // Note: Don't remove (WooCommerce will output multiple messages otherwise) ?>
        
        <div id="nm-shop-products" class="nm-shop-products">
            <div class="nm-row">
                <?php 
                    if ( $show_filters_sidebar ) {
                        /**
                         * woocommerce_sidebar hook.
                         *
                         * @hooked woocommerce_get_sidebar - 10
                         */
                        do_action( 'woocommerce_sidebar' );
                    }
                ?>
                
                <div class="nm-shop-products-col <?php echo esc_attr( $shop_column_size ); ?>">
                    <div id="nm-shop-products-overlay" class="nm-loader"></div>
                    <div id="nm-shop-browse-wrap" class="nm-shop-description-<?php echo esc_attr( $nm_theme_options['shop_description_layout'] ); ?>">
                        <?php
                            // Results bar/button
                            wc_get_template_part( 'content', 'product_nm_results_bar' );
                        ?>
                        
                        <?php
                            // Taxonomy description
                            if ( $show_taxonomy_description ) {
                                if ( $is_product_taxonomy ) {
                                    /**
                                     * woocommerce_archive_description hook
                                     *
                                     * @hooked woocommerce_taxonomy_archive_description - 10
                                     * @hooked woocommerce_product_archive_description - 10
                                     */
                                    do_action( 'woocommerce_archive_description' );
                                } else if ( strlen( $nm_theme_options['shop_default_description'] ) > 0 && ! isset( $_REQUEST['s'] ) ) { // Don't display on search
                                    // Default description
                                    nm_shop_description( $nm_theme_options['shop_default_description'] );
                                }
                            }
						?>
                        
						<?php if ( have_posts() ) : ?>
                            
                            <?php
                                /**
                                 * woocommerce_before_shop_loop hook.
                                 */
                                do_action( 'woocommerce_before_shop_loop' );
                            ?>
                        
                            <?php 
                                global $woocommerce_loop;
                                
                                // Set column sizes (large column is set via theme setting)
                                $woocommerce_loop['columns_small'] = '2';
                                $woocommerce_loop['columns_medium'] = '3';
                                
                                woocommerce_product_loop_start();
                            ?>
                                
                                <?php 
                                    $nm_globals['is_categories_shortcode'] = false;
                                    woocommerce_product_subcategories();
                                ?>
                                
                                <?php while ( have_posts() ) : the_post(); ?>
                                    
                                    <?php
                                        // Note: Don't place in another template (image lazy-loading is only used in the Shop and WooCommerce shortcodes can use the other product templates)
                                        global $nm_globals;
                                        $nm_globals['shop_image_lazy_loading'] = ( $nm_theme_options['product_image_lazy_loading'] ) ? true : false;
                                        
                                        wc_get_template_part( 'content', 'product' );
                                    ?>
                                
                                <?php endwhile; // end of the loop. ?>
                
                            <?php woocommerce_product_loop_end(); ?>
                            
                            <?php
                                /**
                                 * woocommerce_after_shop_loop hook
                                 *
                                 * @hooked woocommerce_pagination - 10
                                 */
                                do_action( 'woocommerce_after_shop_loop' );
                            ?>
                            
                        <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
                    
                            <?php wc_get_template( 'loop/no-products-found.php' ); ?>
                        
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <?php
                /**
                 * woocommerce_after_main_content hook
                 *
                 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                 */
                do_action( 'woocommerce_after_main_content' );
            ?>
        </div>
        
        <?php
            // Sidebar/filters popup
            if ( $show_filters_popup ) {
                wc_get_template_part( 'content', 'product_nm_filters_popup' );
            }
        ?>
        
	</div>
    
    <?php
		/**
		 * nm_after_shop hook
		 */
		do_action( 'nm_after_shop' );
	?>
    
<?php get_footer(); ?>
