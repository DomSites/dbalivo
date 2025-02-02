<?php
	
	/* WooCommerce
	=============================================================== */
	
	global $nm_theme_options, $nm_globals;
    
    
    
	/*
     *  Disable default WooCommerce styles
     */
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );
	
	
    
	/*
	 *	Set image dimensions on theme activation
	 */
	if ( ! function_exists( 'nm_woocommerce_set_image_dimensions' ) ) {
		function nm_woocommerce_set_image_dimensions() {
			if ( ! get_option( 'nm_shop_image_sizes_set' ) ) {
				$catalog = array(
					'width' 	=> '350',	// px
					'height'	=> '',		// px
					'crop'		=> 0 		// no-crop
				);
				
				$single = array(
					'width' 	=> '595',	// px
					'height'	=> '',		// px
					'crop'		=> 0 		// no-crop
				);
				
				$thumbnail = array(
					'width' 	=> '',		// px
					'height'	=> '127',	// px
					'crop'		=> 0 		// no-crop
				);
				
				// Image sizes
				update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
				update_option( 'shop_single_image_size', $single ); 		// Single product image
				update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
				
				// Set "images size set" option
				add_option( 'nm_shop_image_sizes_set', '1' );
			}
		}
	}
	// Theme activation hook
	add_action( 'after_switch_theme', 'nm_woocommerce_set_image_dimensions', 1 );
	// Additional hook for when WooCommerce is installed/activated after the theme
	add_action( 'admin_init', 'nm_woocommerce_set_image_dimensions', 1000 );
    
    
    
	/*
	 *	Set image dimensions on theme activation
	 */
	if ( ! function_exists( 'nm_woocommerce_add_image_sizes' ) ) {
		function nm_woocommerce_add_image_sizes() {
			// Add image size: Quick view
			add_image_size( 'nm_quick_view', 680, '', true );
		}
	}
	add_action( 'after_setup_theme', 'nm_woocommerce_add_image_sizes' );
	
	
	
    /*
	 *	Add-to-cart (AJAX) redirect: Include custom template
	 */
	function nm_ajax_add_to_cart_redirect_template() {
		if ( isset( $_REQUEST['nm-ajax-add-to-cart'] ) ) {
			wc_get_template( 'ajax-add-to-cart-fragments.php' );
			exit;
		}
	}
	add_action( 'wp', 'nm_ajax_add_to_cart_redirect_template', 1000 );
	
	
	
    /*
     *	Add-to-cart (static) redirect: Add body class so the Cart panel will show
     */
	if ( get_option( 'woocommerce_cart_redirect_after_add' ) != 'yes' ) { // Only show cart panel if redirect is disabled
		function nm_add_to_cart_class() {
			// Add a class to the <body> tag so it can be checked with JS
			global $nm_body_class;
			$nm_body_class .= ' nm-added-to-cart';
		}
		add_action( 'woocommerce_add_to_cart', 'nm_add_to_cart_class' );
	}
    
    
    
    /*
	 *	Get cart contents count
	 */
	function nm_get_cart_contents_count() {
        $cart_count = apply_filters( 'nm_cart_count', WC()->cart->cart_contents_count );
        $count_class = ( $cart_count > 0 ) ? '' : ' nm-count-zero';
        
		return '<span class="nm-menu-cart-count count' . $count_class . '">' . $cart_count . '</span>';
	}
	
	
	
	/*
     *  Prices: WooCommerce 3.8 removed the 'Trailing Zeros' setting.
     *  Note: add theme setting?
     */
	add_filter( 'woocommerce_price_trim_zeros', '__return_false' );
    
	
    
	/*
     *  Shop: Products per page
     */
	$products_per_page = ( strlen( $nm_theme_options['products_per_page'] ) > 0 ) ? intval( $nm_theme_options['products_per_page'] ) : 12;
	add_filter( 'loop_shop_per_page', create_function( '$cols', 'return ' . $products_per_page . ';' ), 20 );
    
    
    
    /*
     *  Shop: Default placeholder product image
     */
    $nm_globals['product_placeholder_image'] = apply_filters( 'nm_shop_placeholder_img_src', NM_THEME_URI . '/img/placeholder.gif' );
	
    
    
    /*
     *  Shop: Get active filters count
     */
    function nm_get_active_filters_count() {
        $count = 0;

        // WooCommerce source: "../plugins/woocommerce/includes/widgets/class-wc-widget-layered-nav-filters.php" (line 50)
        $_chosen_attributes = WC_Query::get_layered_nav_chosen_attributes();
        $count += isset( $_GET['min_price'] ) ? 1 : 0;
        //$count += isset( $_GET['max_price'] ) ? 1 : 0;
        $count += isset( $_GET['rating_filter'] ) ? 1 : 0;
        // /WooCommerce source

        //$count += isset( $_GET['orderby'] ) ? 1 : 0;

        // Count active terms/filters
        foreach ( $_chosen_attributes as $attributes ) {
            $count += count( $attributes['terms'] );
        }

        return $count;
    }
    
    
    
    /*
     *  Shop: Product categories - Modify category count
     */
    function nm_shop_category_count( $string, $category ) {
        return '<mark class="count">' . sprintf( __( '%s products', 'nm-framework' ), $category->count ) . '</mark>';
    }
    add_filter( 'woocommerce_subcategory_count_html', 'nm_shop_category_count', 10, 2 );
	
    
    
	/*
	 *	Single product: Set gallery options
	 */
    function nm_single_product_params( $params ) {
        if ( isset( $params['flexslider'] ) ) {
            $params['flexslider']['animation'] = 'fade';
            $params['flexslider']['directionNav'] = true;
            $params['flexslider']['animationSpeed'] = 300;
        }

        return $params;
    }
    add_filter( 'wc_single_product_params', 'nm_single_product_params' );
    
    
    
	/*
	 *	Single product: Get sale percentage
	 */
	function nm_product_get_sale_percent( $product ) {
		if ( $product->get_type() === 'variable' ) {
			// Get product variation prices (regular and sale)
			$product_variation_prices = $product->get_variation_prices();
			
			$highest_sale_percent = 0;
			
			foreach( $product_variation_prices['regular_price'] as $key => $regular_price ) {
				// Get sale price for current variation
				$sale_price = $product_variation_prices['sale_price'][$key];
				
				// Is product variation on sale?
				if ( $sale_price < $regular_price ) {
					$sale_percent = round( ( ( $regular_price - $sale_price ) / $regular_price ) * 100 );
					
					// Is current sale percent highest?
					if ( $sale_percent > $highest_sale_percent ) {
						$highest_sale_percent = $sale_percent;
					}
				}
			}
			
			// Return the highest product variation sale percent
			return $highest_sale_percent;
		} else {
            $regular_price = $product->get_regular_price();
			$sale_percent = 0;
			
			// Make sure the percentage value can be calculated
			if ( intval( $regular_price ) > 0 ) {
				$sale_percent = round( ( ( $regular_price - $product->get_sale_price() ) / $regular_price ) * 100 );
			}
			
			return $sale_percent;
		}
	}
    
    
    
    /*
     *  Single product: Variation select - Change default "Choose an option" option name
     */
    if ( $nm_theme_options['product_select_hide_labels'] ) {
        function nm_dropdown_variation_change_option_name( $args ) {
            //$args['show_option_none'] = sprintf( esc_html__( 'Select %s', 'nm-framework' ),  wc_attribute_label( $args['attribute'] ) );
            $args['show_option_none'] = wc_attribute_label( $args['attribute'] );

            return $args;
        }
        add_filter( 'woocommerce_dropdown_variation_attribute_options_args', 'nm_dropdown_variation_change_option_name' );
    }
    
    
    
	/*
	 *	Single product: Tabs - Disable "Reviews" tab
	 */
	if ( ! $nm_theme_options['product_reviews'] ) {
		function nm_woocommerce_remove_reviews_tab( $tabs ) {
			unset( $tabs['reviews'] );
			return $tabs;
		}
		add_filter( 'woocommerce_product_tabs', 'nm_woocommerce_remove_reviews_tab', 98 );
	}
	
    
    
	/*
	 *	Single product: Tabs - Change "Reviews" tab title
	 */
	function nm_woocommerce_reviews_tab_title( $title ) {
		$title = strtr( $title, array( 
			'(' => '<span>',
			')' => '</span>' 
		) );
		
		return $title;
	}
	add_filter( 'woocommerce_product_reviews_tab_title', 'nm_woocommerce_reviews_tab_title' );
    
	
    
	/*
	 * Single product: Up-sells and Related-products per page
	 */
	function nm_upsell_related_products_args( $args ) {
		global $nm_theme_options;
        
		$args['posts_per_page'] = $nm_theme_options['product_upsell_related_per_page'];
		$args['columns'] = $nm_theme_options['product_upsell_related_columns'];
		//$args['orderby'] = 'rand'; // Note: Use to change product order
		return $args;
	}
    add_filter( 'woocommerce_upsell_display_args', 'nm_upsell_related_products_args' );
	add_filter( 'woocommerce_output_related_products_args', 'nm_upsell_related_products_args' );
    
	
    
	/*
	 *	Cart: Get refreshed header fragment
	 */
	if ( ! function_exists( 'nm_header_add_to_cart_fragment' ) ) {
		function nm_header_add_to_cart_fragment( $fragments ) {
            $cart_count = nm_get_cart_contents_count();
			$fragments['.nm-menu-cart-count'] = $cart_count;
            
			return $fragments;
		}
	}
	add_filter( 'woocommerce_add_to_cart_fragments', 'nm_header_add_to_cart_fragment' ); // Ensure cart contents update when products are added to the cart via Ajax
	
    
    
	/*
	 *	Cart: Get refreshed fragments
	 */
	function nm_get_cart_fragments( $return_array = array() ) {
		// Get cart count
		$cart_count = nm_header_add_to_cart_fragment( array() );
		
		// Get cart panel
		ob_start();
		woocommerce_mini_cart();
		$cart_panel = ob_get_clean();
		
		return apply_filters( 'woocommerce_add_to_cart_fragments', array(
			'.nm-menu-cart-count' 				=> reset( $cart_count ),
			'div.widget_shopping_cart_content'	=> '<div class="widget_shopping_cart_content">' . $cart_panel . '</div>'
		) );
	}
	
    
    
	/*
	 *	Cart: Get refreshed hash
	 */
	function nm_get_cart_hash() {
		return apply_filters( 'woocommerce_add_to_cart_hash', WC()->cart->get_cart_for_session() ? md5( json_encode( WC()->cart->get_cart_for_session() ) ) : '', WC()->cart->get_cart_for_session() );
	}
    
    
    
    /*
	 *	Cart: Cross-sells per page
	 */
    add_filter( 'woocommerce_cross_sells_total', function() { 
        global $nm_theme_options; return $nm_theme_options['product_upsell_related_per_page'];
    } );
	
	
	
	/*
	 *	Cart panel: AJAX - Remove product from cart
	 */
	function nm_cart_panel_remove_product() {
		$cart_item_key = $_POST['cart_item_key'];
		
		$cart = WC()->instance()->cart;
		$removed = $cart->remove_cart_item( $cart_item_key ); // Note: WP 2.3 >
        
		if ( $removed )	{
			$json_array['status'] = '1';
			
            // Not replacing whole cart-panel by default (thumbnails "flicker" when they're replaced)
            if ( defined( 'NM_CART_PANEL_REPLACE' ) ) {
                $json_array['fragments'] = nm_get_cart_fragments();
            } else {
                $json_array['fragments'] = apply_filters( 'woocommerce_add_to_cart_fragments', array(
                    '.nm-menu-cart-count'                              => nm_get_cart_contents_count(), // Cart count
                    '#nm-widget-panel .nm-cart-panel-summary-subtotal' => '<span class="nm-cart-panel-summary-subtotal">' . WC()->cart->get_cart_subtotal() . '</span>' // Cart subtotal
                ) );
            }
			
            $json_array['cart_hash'] = nm_get_cart_hash();
		} else {
			$json_array['status'] = '0';
		}
		
		echo json_encode( $json_array );
				
		exit;
	}
	add_action( 'wp_ajax_nm_cart_panel_remove_product' , 'nm_cart_panel_remove_product' );
	add_action( 'wp_ajax_nopriv_nm_cart_panel_remove_product', 'nm_cart_panel_remove_product' );
    
    
    
    /*
	 *	Cart panel: AJAX - Update quantity
	 */
	function nm_cart_panel_update_quantity() {
        $nm_json_array = array();
        
        // WooCommerce: Code copied from the "../woocommerce/includes/class-wc-form-handler.php" source file
        $cart_updated = false;
        $cart_totals  = isset( $_POST['cart'] ) ? $_POST['cart'] : '';

        //if ( ! WC()->cart->is_empty() && is_array( $cart_totals ) ) {
        if ( is_array( $cart_totals ) ) {
            foreach ( WC()->cart->get_cart() as $cart_item_key => $values ) {

                $_product = $values['data'];

                // Skip product if no updated quantity was posted
                if ( ! isset( $cart_totals[ $cart_item_key ] ) || ! isset( $cart_totals[ $cart_item_key ]['qty'] ) ) {
                    continue;
                }

                // Sanitize
                $quantity = apply_filters( 'woocommerce_stock_amount_cart_item', wc_stock_amount( preg_replace( "/[^0-9\.]/", '', $cart_totals[ $cart_item_key ]['qty'] ) ), $cart_item_key );

                if ( '' === $quantity || $quantity == $values['quantity'] )
                    continue;

                // Update cart validation
                $passed_validation 	= apply_filters( 'woocommerce_update_cart_validation', true, $cart_item_key, $values, $quantity );

                // is_sold_individually
                if ( $_product->is_sold_individually() && $quantity > 1 ) {
                    //wc_add_notice( sprintf( __( 'You can only have 1 %s in your cart.', 'woocommerce' ), $_product->get_title() ), 'error' );
                    $passed_validation = false;
                }

                if ( $passed_validation ) {
                    WC()->cart->set_quantity( $cart_item_key, $quantity, false );
                    $cart_updated = true;
                    
                    // NM
                    // Save "cart item key" ("$cart_item_key" is overwritten)
                    $nm_cart_item_key = $cart_item_key;
                    // Code from "../savoy/woocommerce/cart/cart.php" (variable names changed)
                    $nm_cart_item_subtotal = apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $quantity ), $values, $cart_item_key );
                    // /NM
                }

            }
        }
        
        // Trigger action - let 3rd parties update the cart if they need to and update the $cart_updated variable
        $cart_updated = apply_filters( 'woocommerce_update_cart_action_cart_updated', $cart_updated );

        if ( $cart_updated ) {
            // Recalc our totals
            WC()->cart->calculate_totals();
            
            // NM
            $nm_json_array['status'] = '1';
			$nm_json_array['fragments'] = apply_filters( 'woocommerce_add_to_cart_fragments', array(
                '.nm-menu-cart-count'                                                       => nm_get_cart_contents_count(), // Cart count
                '#nm-cart-panel-item-' . $nm_cart_item_key . ' .nm-cart-panel-item-price'   => '<div class="nm-cart-panel-item-price">' . $nm_cart_item_subtotal . '</div>', // Cart item subtotal
                '#nm-widget-panel .nm-cart-panel-summary-subtotal'                          => '<span class="nm-cart-panel-summary-subtotal">' . WC()->cart->get_cart_subtotal() . '</span>' // Cart subtotal
            ) );
        } else {
            $nm_json_array['status'] = '0';
		}
        // /NM
        // /WooCommerce
        
        echo json_encode( $nm_json_array );
        
		exit;
	}
	add_action( 'wp_ajax_nm_cart_panel_update' , 'nm_cart_panel_update_quantity' );
	add_action( 'wp_ajax_nopriv_nm_cart_panel_update', 'nm_cart_panel_update_quantity' );  
    
    
    
    /*
     *  Checkout: Default templates
     */
	if ( defined( 'NM_SHOP_DEFAULT_CHECKOUT' ) ) {
		/*
		 *	Disable custom template path
		 */
		function nm_woocommerce_disable_template_path() {
			// Returning an invalid template-path will ensure the default WooCommerce templates are used
			return 'nm-woocommerce-disable/';
		}
		
		/*
		 *	Checkout: Disable custom checkout templates
		 */
		function nm_woocommerce_disable_custom_checkout_templates() {
			if ( is_checkout() ) {
				add_filter( 'woocommerce_template_path', 'nm_woocommerce_disable_template_path' );
			}
		}
		add_action( 'wp', 'nm_woocommerce_disable_custom_checkout_templates' );
	}
    
    
    
    /*
     *  Checkout: Required field notices
     */
    if ( $nm_theme_options['checkout_inline_notices'] ) {
        $nm_globals['checkout_required_notices_count'] = 0;
        
        function nm_checkout_required_field_notice( $notice ) {
            global $nm_globals;

            $nm_globals['checkout_required_notices_count']++;

            // Display a single generic notice instead of one for each field
            if ( $nm_globals['checkout_required_notices_count'] > 1 ) {
                return '';  
            } else {
                return __( 'Please fill in the required fields', 'nm-framework' );
                //return __( 'Error processing checkout. Please try again.', 'woocommerce' );
            }
        }
        add_filter( 'woocommerce_checkout_required_field_notice', 'nm_checkout_required_field_notice' );
    }
    
    
    
    /*
     *  Checkout: Replace PayPal icon
	 */
    function nm_replace_paypal_icon() {
        return NM_THEME_URI . '/img/paypal-icon.png';
    }
    add_filter( 'woocommerce_paypal_icon', 'nm_replace_paypal_icon' );
    
    
    
    /*
     *  Change the default WooCommerce 'spinner' image
     */
	/*function nm_custom_wc_spinner() {
		return '/img/loader-dots.gif';
	}
	add_filter( 'woocommerce_ajax_loader_url', 'nm_custom_wc_spinner' );*/
