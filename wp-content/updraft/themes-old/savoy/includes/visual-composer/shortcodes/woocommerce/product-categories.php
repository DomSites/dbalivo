<?php

	// Shortcode: nm_product_categories
	function nm_shortcode_product_categories( $atts, $content = NULL ) {
		nm_add_page_include( 'product_categories' );
		
		global $nm_globals, $woocommerce_loop;
		
        // Global settings
        $nm_globals['is_categories_shortcode'] = true;
        $nm_globals['categories_shortcode_heading_tag'] = isset( $atts['title_tag'] ) ? $atts['title_tag'] : 'h1'; // Categories heading tag
        
		// Columns (large column is set via shortcode attribute)
		$woocommerce_loop['columns_small'] = '1';
		$woocommerce_loop['columns_medium'] = '2';
		
		if ( isset( $atts['packery'] ) && $atts['packery'] === '1' ) {
			nm_add_page_include( 'product_categories_packery' );
			
			// Enqueue script
			wp_enqueue_script( 'packery', NM_THEME_URI . '/js/plugins/packery.pkgd.min.js', array(), '1.3.2', true );
			
			$packery_class = 'packery-enabled nm-loader';
		} else {
			$packery_class = '';
		}
		
		return '<div class="nm-product-categories ' . $packery_class . '">' . WC_Shortcodes::product_categories( $atts ) . '</div>';
	}
	
	add_shortcode( 'nm_product_categories', 'nm_shortcode_product_categories' );
	