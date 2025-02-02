<?php
/**
 *	The template for displaying the shop header
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $nm_theme_options, $nm_globals;

$header_class = '';
$filters_or_search_enabled = false;

// Categories
if ( $nm_theme_options['shop_categories'] ) {
    nm_add_page_include( 'shop_categories' );
	
    $show_categories = true;
} else {
	$show_categories = false;
	$header_class .= ' no-categories';
}

// Filters
if ( $nm_theme_options['shop_filters'] == 'header' ) {
    nm_add_page_include( 'shop_filters' );
    
	$show_filters = true;
    $filters_or_search_enabled = true;
} else {
	$show_filters = false;
	$header_class .= ' no-filters';
}

// Search
if ( $nm_globals['shop_search'] ) {
	$filters_or_search_enabled = true;
} else {
    $header_class .= ' no-search';
}


if ( $nm_globals['shop_filters_popup'] || ! $filters_or_search_enabled ) {
    $header_class .= ' centered'; // Add "centered" class to center category-menu when filters and search is disabled
}
?>
    <div class="nm-shop-header<?php echo esc_attr( $header_class ); ?>">
        <div class="nm-shop-menu <?php echo esc_attr( $nm_theme_options['shop_categories_layout'] ); ?>">
            <div class="nm-row">
                <div class="col-xs-12">
                    <ul id="nm-shop-filter-menu" class="nm-shop-filter-menu">
                        <?php if ( $show_categories ) : ?>
                        <li class="nm-shop-categories-btn-wrap" data-panel="cat">
                            <a href="#categories" class="invert-color"><?php esc_html_e( 'Categories', 'woocommerce' ); ?></a>
                        </li>
                        <?php 
							endif;
							
							if ( $show_filters ) :
						?>
                        <li data-panel="filter">
                            <a href="#filter" class="invert-color"><?php esc_html_e( 'Filter', 'woocommerce' ); ?></a>
						</li>
                        <?php 
							endif;
							
							if ( $nm_globals['shop_search'] ) :
                            
                            $menu_divider = apply_filters( 'nm_shop_categories_divider', '<span>&frasl;</span>' );
						?>
                        <li class="nm-shop-search-btn-wrap" data-panel="search">
                            <?php echo $menu_divider; ?>
                            <a href="#search" id="nm-shop-search-btn" class="invert-color">
                                <span><?php esc_html_e( 'Search', 'woocommerce' ); ?></span>
                                <i class="nm-font nm-font-search-alt flip"></i>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                    <?php if ( $show_categories ) : ?>
                    <ul id="nm-shop-categories" class="nm-shop-categories">
                        <?php nm_category_menu(); ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <?php if ( $show_filters ) : ?>
        <div id="nm-shop-sidebar" class="nm-shop-sidebar nm-shop-sidebar-header" data-sidebar-layout="header">
            <div class="nm-shop-sidebar-inner">
                <div class="nm-row">
                    <div class="col-xs-12">
                        <ul id="nm-shop-widgets-ul" class="small-block-grid-<?php echo esc_attr( $nm_theme_options['shop_filters_columns'] ); ?>">
                            <?php
                                if ( is_active_sidebar( 'widgets-shop' ) ) {
                                    dynamic_sidebar( 'widgets-shop' );
								}
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div id="nm-shop-sidebar-layout-indicator"></div> <!-- Don't remove (used for testing sidebar/filters layout in JavaScript) -->
        </div>
        <?php endif; ?>
        
        <?php 
			// Search-form
			if ( $nm_globals['shop_search'] ) {
				wc_get_template( 'product-searchform_nm.php' );
			}
		?>
    </div>
