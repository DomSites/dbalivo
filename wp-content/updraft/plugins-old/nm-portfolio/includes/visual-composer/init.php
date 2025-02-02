<?php

	/* Visual Composer: Initialize
	================================================== */
	
	if ( class_exists( 'WPBakeryVisualComposerAbstract' ) ) {
		
		// Include external shortcodes
		function nm_portfolio_vc_register_shortcodes() {
			include( NM_PORTFOLIO_INC_DIR . '/visual-composer/shortcodes/portfolio.php' );
		}
		add_action( 'init', 'nm_portfolio_vc_register_shortcodes' );
		
		
		if ( is_admin() ) {
			// Include external elements
			function nm_portfolio_vc_register_elements() {
				include( NM_PORTFOLIO_INC_DIR . '/visual-composer/elements/portfolio.php' );
			}
            add_action( 'init', 'nm_portfolio_vc_register_elements', 2 ); // Note: Using priority "2" so the "portfolio-category" taxonomy is available when the "Portfolio" Visual Composer element is registered
		}
		
	}
