<?php
	
	// VC element: nm_product_search
	vc_map( array(
	   'name'			=> __( 'Product Search', 'nm-framework-admin' ),
	   'category'		=> __( 'WooCommerce', 'nm-framework-admin' ),
	   'description'	=> __( 'Search field for products', 'nm-framework-admin' ),
	   'base'			=> 'nm_product_search',
	   'icon'			=> 'icon-wpb-woocommerce',
	   'params'			=> array(
			array(
				'type' 			=> 'checkbox',
				'heading' 		=> __( 'Search Button', 'nm-framework-admin' ),
				'param_name' 	=> 'search_button',
				'description'	=> __( 'Display search button.', 'nm-framework-admin' ),
				'value'			=> array(
					__( 'Enable', 'nm-framework-admin' ) => '1'
				),
                'std' 			=> '1'
			)
	   )
	) );
	