<?php
/* Save custom theme styles */
if ( ! function_exists( 'nm_custom_styles_save' ) ) :

function nm_custom_styles_save() {
	global $nm_theme_options;
	
    
	/* 
     *  Fonts
     */
    // Primary font
    if ( $nm_theme_options['main_font_source'] === '2' && isset( $nm_theme_options['main_font_typekit_kit_id'] ) ) {
        // Typekit font
        $main_font_css = 'body{font-family:' . $nm_theme_options['main_typekit_font'] . ',sans-serif;}';
    } else if ( $nm_theme_options['main_font_source'] === '3' ) {
        // Custom CSS
        $main_font_css = $nm_theme_options['main_font_custom_css'];
    } else {
        // Standard + Google Webfonts font
        $main_font_css = 'body{font-family:' . $nm_theme_options['main_font']['font-family'] . ',sans-serif;}';
    }

    // Secondary font
    $secondary_font_enabled = ( $nm_theme_options['secondary_font_source'] !== '0' ) ? true : false;
    if ( $secondary_font_enabled ) {
        if ( $nm_theme_options['secondary_font_source'] == '2' && isset( $nm_theme_options['secondary_font_typekit_kit_id'] ) ) {
            // Typekit font
            $secondary_font = $nm_theme_options['secondary_typekit_font'];
        } else {
            // Standard + Google Webfonts font
            $secondary_font = $nm_theme_options['secondary_font']['font-family'];
        }
    }
    
    
	/*
     *  Header height
     */
	$header_spacing_desktop = intval( $nm_theme_options['header_spacing_top'] ) + intval( $nm_theme_options['header_spacing_bottom'] );
    $header_spacing_alt = intval( $nm_theme_options['header_spacing_top_alt'] ) + intval( $nm_theme_options['header_spacing_bottom_alt'] );
    
    $logo_height_desktop = intval( $nm_theme_options['logo_height'] );
    $logo_height_tablet = intval( $nm_theme_options['logo_height_tablet'] );
    $logo_height_mobile = intval( $nm_theme_options['logo_height_mobile'] );
    
    $menu_height_desktop = intval( $nm_theme_options['menu_height'] );
    $menu_height_tablet = intval( $nm_theme_options['menu_height_tablet'] );
    $menu_height_mobile = intval( $nm_theme_options['menu_height_mobile'] );
    
    // Desktop
    if ( strpos( $nm_theme_options['header_layout'], 'stacked' ) !== false ) { // Is a "stacked" header layout enabled?
        $header_height_desktop = $menu_height_desktop;
        $stacked_logo_height_desktop = ( $logo_height_desktop > $menu_height_desktop ) ? $logo_height_desktop : $menu_height_desktop;
        $header_total_height_desktop = $header_spacing_desktop + $stacked_logo_height_desktop + intval( $nm_theme_options['logo_spacing_bottom'] ) + $header_height_desktop;
    } else {
        $header_height_desktop = ( $logo_height_desktop > $menu_height_desktop ) ? $logo_height_desktop : $menu_height_desktop;
        $header_total_height_desktop = $header_spacing_desktop + $header_height_desktop;
    }
    // Tablet
    $header_height_tablet = ( $logo_height_tablet > $menu_height_tablet ) ? $logo_height_tablet : $menu_height_tablet;
    $header_total_height_tablet = $header_spacing_alt + $header_height_tablet;
    // Mobile
    $header_height_mobile = ( $logo_height_mobile > $menu_height_mobile ) ? $logo_height_mobile : $menu_height_mobile;
    $header_total_height_mobile = $header_spacing_alt + $header_height_mobile;
    
	
	/* 
	 *	NOTE: Keep CSS formatting unchanged (single whitespaces will not be minified, only new-lines and tab-indents)
	 */
	ob_start();
?>
<style type="text/css" class="nm-custom-styles">
/* Typography */
<?php
echo $main_font_css;

if ( $secondary_font_enabled ) :
?>
h1,
h2,
h3,
h4,
h5,
h6,
.nm-alt-font
{
	font-family:<?php echo esc_attr( $secondary_font ); ?>,sans-serif;
}
<?php endif; ?>

/* Typography: Color */
.widget ul li a,
body
{
	color:<?php echo esc_attr( $nm_theme_options['main_font_color'] ); ?>;
}
h1, h2, h3, h4, h5, h6
{
	color:<?php echo esc_attr( $nm_theme_options['heading_color'] ); ?>;
}

/* Highlight color: Font color */
a,
a.dark:hover,
a.gray:hover,
a.invert-color:hover,
.nm-highlight-text,
.nm-highlight-text h1,
.nm-highlight-text h2,
.nm-highlight-text h3,
.nm-highlight-text h4,
.nm-highlight-text h5,
.nm-highlight-text h6,
.nm-highlight-text p,
.nm-menu-cart a .count,
.nm-menu li.nm-menu-offscreen .nm-menu-cart-count,
#nm-mobile-menu .nm-mobile-menu-cart a .count,
.page-numbers li span.current,
.nm-blog .sticky .nm-post-thumbnail:before,
.nm-blog .category-sticky .nm-post-thumbnail:before,
.nm-blog-categories ul li.current-cat a,
.commentlist .comment .comment-text .meta time,
.widget ul li.active,
.widget ul li a:hover,
.widget ul li a:focus,
.widget ul li a.active,
#wp-calendar tbody td a,
/* elements.css */
.nm-banner-text .nm-banner-link:hover,
.nm-banner.text-color-light .nm-banner-text .nm-banner-link:hover,
.nm-portfolio-categories li.current a,
.add_to_cart_inline ins,
/* shop.css */
.woocommerce-breadcrumb a:hover,
.products .price ins,
.products .price ins .amount,
.no-touch .nm-shop-loop-actions > a:hover,
.nm-shop-menu ul li a:hover,
.nm-shop-menu ul li.current-cat a,
.nm-shop-menu ul li.active a,
.nm-shop-heading span,
.nm-single-product-menu a:hover,
.woocommerce-product-gallery__trigger:hover,
.woocommerce-product-gallery .flex-direction-nav a:hover,
.product-summary .price .amount,
.product-summary .price ins,
.nm-product-wishlist-button-wrap a.added:active,
.nm-product-wishlist-button-wrap a.added:focus,
.nm-product-wishlist-button-wrap a.added:hover,
.nm-product-wishlist-button-wrap a.added,
.woocommerce-tabs .tabs li a span,
#review_form .comment-form-rating .stars:hover a,
#review_form .comment-form-rating .stars.has-active a,
.product_meta a:hover,
.star-rating span:before,
.nm-order-view .commentlist li .comment-text .meta,
.nm_widget_price_filter ul li.current,
.widget_product_categories ul li.current-cat > a,
.widget_layered_nav ul li.chosen a,
.widget_layered_nav_filters ul li.chosen a,
.product_list_widget li ins .amount,
.woocommerce.widget_rating_filter .wc-layered-nav-rating.chosen > a,
.nm-wishlist-button.added:active,
.nm-wishlist-button.added:focus,
.nm-wishlist-button.added:hover,
.nm-wishlist-button.added,
#nm-wishlist-empty .note i,
/* slick-theme.css */
.slick-prev:not(.slick-disabled):hover, .slick-next:not(.slick-disabled):hover,
/* photoswipe-skin.css */
.pswp__button:hover
{
	color:<?php echo esc_attr( $nm_theme_options['highlight_color'] ); ?>;
}

/* Highlight color: Border */
.nm-blog-categories ul li.current-cat a,
/* elements.css */
.nm-portfolio-categories li.current a,
/* shop.css */
.widget_layered_nav ul li.chosen a,
.widget_layered_nav_filters ul li.chosen a,
/* slick-theme.css */
.slick-dots li.slick-active button
{
	border-color:<?php echo esc_attr( $nm_theme_options['highlight_color'] ); ?>;
}

/* Highlight color: Background */
.blockUI.blockOverlay:after,
.nm-loader:after,
.nm-image-overlay:before,
.nm-image-overlay:after,
.gallery-icon:before,
.gallery-icon:after,
.widget_tag_cloud a:hover,
.widget_product_tag_cloud a:hover,
.nm-page-not-found-icon:before,
.nm-page-not-found-icon:after,
/* shop.css */
.demo_store,
.nm-order-info mark,
.nm-order-info .order-number,
.nm-order-info .order-date,
.nm-order-info .order-status
{
	background:<?php echo esc_attr( $nm_theme_options['highlight_color'] ); ?>;
}
/* slick-theme.css */
@media all and (max-width:400px)
{	
	.slick-dots li.slick-active button,
    .woocommerce-product-gallery.pagination-enabled .flex-control-thumbs li img.flex-active
	{
		background:<?php echo esc_attr( $nm_theme_options['highlight_color'] ); ?>;
	}
}

/* Button */
.button,
input[type=submit],
.widget_tag_cloud a, .widget_product_tag_cloud a,
/* elements.css */
.add_to_cart_inline .add_to_cart_button,
/* shop.css */
#nm-shop-sidebar-popup-button
{
	color:<?php echo esc_attr( $nm_theme_options['button_font_color'] ); ?>;
	background-color:<?php echo esc_attr( $nm_theme_options['button_background_color'] ); ?>;
}

/* Button: Hover */
.button:hover,
input[type=submit]:hover
{
	color:<?php echo esc_attr( $nm_theme_options['button_font_color'] ); ?>;
}

/* Button: Font color */
/* shop.css */
.product-summary .quantity .nm-qty-minus,
.product-summary .quantity .nm-qty-plus
{
	color:<?php echo esc_attr( $nm_theme_options['button_background_color'] ); ?>;
}

<?php if ( $nm_theme_options['full_width_layout'] ) : ?>
/* Grid - Full width */
.nm-row
{
	max-width:none;
}
.woocommerce-cart .nm-page-wrap-inner > .nm-row,
.woocommerce-checkout .nm-page-wrap-inner > .nm-row
{
	max-width:1280px;
}
@media (min-width: 1400px)
{
	.nm-row
	{
		padding-right:2.5%;
		padding-left:2.5%;
	}
}
<?php endif; ?>

/* Structure */
.nm-page-wrap
{
	<?php if ( strlen( $nm_theme_options['main_background_image']['url'] ) > 0 ) : ?>
	background-image:url("<?php echo esc_url( $nm_theme_options['main_background_image']['url'] ); ?>");
	<?php if ( $nm_theme_options['main_background_image_type'] == 'fixed' ) : ?>
	background-attachment:fixed;
	background-size:cover;
	<?php else : ?>
	background-repeat:repeat;
	background-position:0 0;
	<?php endif; endif; ?>
	background-color:<?php echo esc_attr( $nm_theme_options['main_background_color'] ); ?>;
}

/* Top bar */
.nm-top-bar
{
	background:<?php echo esc_attr( $nm_theme_options['top_bar_background_color'] ); ?>;
}
.nm-top-bar .nm-top-bar-text,
.nm-top-bar .nm-top-bar-text a,
.nm-top-bar .nm-menu > li > a,
.nm-top-bar-social li i
{
	color:<?php echo esc_attr( $nm_theme_options['top_bar_font_color'] ); ?>;
}

/* Header */
.nm-header-placeholder
{
	height:<?php echo $header_total_height_desktop; ?>px;
}
.nm-header
{
	line-height:<?php echo $header_height_desktop; ?>px;
	padding-top:<?php echo intval( $nm_theme_options['header_spacing_top'] ); ?>px;
	padding-bottom:<?php echo intval( $nm_theme_options['header_spacing_bottom'] ); ?>px;
	background:<?php echo esc_attr( $nm_theme_options['header_background_color'] ); ?>;
}
.home .nm-header
{
	background:<?php echo esc_attr( $nm_theme_options['header_home_background_color'] ); ?>;
}
.header-search-open .nm-header,
.mobile-menu-open .nm-header
{
	background:<?php echo esc_attr( $nm_theme_options['header_slide_menu_open_background_color'] ); ?> !important;
}
.header-on-scroll .nm-header,
.home.header-transparency.header-on-scroll .nm-header
{
	background:<?php echo esc_attr( $nm_theme_options['header_float_background_color'] ); ?>;
}
.header-on-scroll .nm-header:not(.static-on-scroll)
{
    padding-top:<?php echo intval( $nm_theme_options['header_spacing_top_alt'] ); ?>px;
	padding-bottom:<?php echo intval( $nm_theme_options['header_spacing_bottom_alt'] ); ?>px;
}
.nm-header.stacked .nm-header-logo,
.nm-header.stacked-centered .nm-header-logo
{
    padding-bottom:<?php echo intval( $nm_theme_options['logo_spacing_bottom'] ); ?>px;
}
.nm-header-logo img
{
	height:<?php echo $logo_height_desktop; ?>px;
}
@media all and (max-width:880px)
{
    .nm-header-placeholder
    {
        height:<?php echo $header_total_height_tablet; ?>px;
    }
    .nm-header
    {
        line-height:<?php echo $header_height_tablet; ?>px;
        padding-top:<?php echo intval( $nm_theme_options['header_spacing_top_alt'] ); ?>px;
        padding-bottom:<?php echo intval( $nm_theme_options['header_spacing_bottom_alt'] ); ?>px;
	}
    .nm-header.stacked .nm-header-logo,
    .nm-header.stacked-centered .nm-header-logo
    {
        padding-bottom:0px;
    }
    .nm-header-logo img
	{
		height:<?php echo $logo_height_tablet; ?>px;
	}
}
@media all and (max-width:400px)
{
    .nm-header-placeholder
    {
        height:<?php echo $header_total_height_mobile; ?>px;
    }
    .nm-header
    {
        line-height:<?php echo $header_height_mobile; ?>px;
	}
	.nm-header-logo img
	{
		height:<?php echo $logo_height_mobile; ?>px;
	}
}

/* Menu */
.nm-menu li a
{
	color:<?php echo esc_attr( $nm_theme_options['header_navigation_color'] ); ?>;
}
.nm-menu li a:hover
{
	color:<?php echo esc_attr( $nm_theme_options['header_navigation_highlight_color'] ); ?>;
}

/* Menu: Dropdown */
.nm-menu ul.sub-menu
{
	background:<?php echo esc_attr( $nm_theme_options['dropdown_menu_background_color'] ); ?>;
}
.nm-menu ul.sub-menu li a
{
	color:<?php echo esc_attr( $nm_theme_options['dropdown_menu_font_color'] ); ?>;
}
.nm-menu ul.sub-menu li a:hover,
.nm-menu ul.sub-menu li a .label,
.nm-menu .megamenu > ul > li > a
{
	color:<?php echo esc_attr( $nm_theme_options['dropdown_menu_font_highlight_color'] ); ?>;
}
    
/* Menu icon */
.nm-menu-icon span
{
    background:<?php echo esc_attr( $nm_theme_options['header_navigation_color'] ); ?>;
}

/* Mobile menu */
/*#nm-mobile-menu .nm-mobile-menu-content*/
#nm-mobile-menu
{   
    background:<?php echo esc_attr( $nm_theme_options['slide_menu_background_color'] ); ?>;
}
#nm-mobile-menu li
{
    border-bottom-color:<?php echo esc_attr( $nm_theme_options['slide_menu_border_color'] ); ?>;
}
#nm-mobile-menu a,
#nm-mobile-menu ul li .nm-menu-toggle,
#nm-mobile-menu .nm-mobile-menu-top .nm-mobile-menu-item-search input,
#nm-mobile-menu .nm-mobile-menu-top .nm-mobile-menu-item-search span
{
    color:<?php echo esc_attr( $nm_theme_options['slide_menu_font_color'] ); ?>;
}
.no-touch #nm-mobile-menu a:hover,
#nm-mobile-menu ul li.active > a,
#nm-mobile-menu ul > li.active > .nm-menu-toggle:before,
#nm-mobile-menu a .label
{
    color:<?php echo esc_attr( $nm_theme_options['slide_menu_font_highlight_color'] ); ?>;
}
#nm-mobile-menu ul ul
{
    border-top-color:<?php echo esc_attr( $nm_theme_options['slide_menu_border_color'] ); ?>;
}

/* Search: Header */
#nm-shop-search.nm-header-search
{
	top:<?php echo intval( $nm_theme_options['header_spacing_bottom'] ); ?>px;
}

/* Footer widgets */
.nm-footer-widgets
{
	background-color:<?php echo esc_attr( $nm_theme_options['footer_widgets_background_color'] ); ?>;
}
.nm-footer-widgets,
.nm-footer-widgets .widget ul li a,
.nm-footer-widgets a
{
	color:<?php echo esc_attr( $nm_theme_options['footer_widgets_font_color'] ); ?>;
}
.widget .nm-widget-title
{
	color:<?php echo esc_attr( $nm_theme_options['footer_widgets_title_font_color'] ); ?>;
}
.nm-footer-widgets .widget ul li a:hover,
.nm-footer-widgets a:hover
{
	color:<?php echo esc_attr( $nm_theme_options['footer_widgets_highlight_font_color'] ); ?>;
}
.nm-footer-widgets .widget_tag_cloud a:hover,
.nm-footer-widgets .widget_product_tag_cloud a:hover
{
	background:<?php echo esc_attr( $nm_theme_options['footer_widgets_highlight_font_color'] ); ?>;
}

/* Footer bar */
.nm-footer-bar
{
	color:<?php echo esc_attr( $nm_theme_options['footer_bar_font_color'] ); ?>;
}
.nm-footer-bar-inner
{
	background-color:<?php echo esc_attr( $nm_theme_options['footer_bar_background_color'] ); ?>;
}
.nm-footer-bar a
{
	color:<?php echo esc_attr( $nm_theme_options['footer_bar_font_color'] ); ?>;
}
.nm-footer-bar a:hover,
.nm-footer-bar-social li i
{
	color:<?php echo esc_attr( $nm_theme_options['footer_bar_highlight_font_color'] ); ?>;
}
.nm-footer-bar .menu > li
{
	border-bottom-color:<?php echo esc_attr( $nm_theme_options['footer_bar_menu_border_color'] ); ?>;
}

/* Shop - Taxonomy header */
#nm-shop-taxonomy-header.has-image
{
    height:<?php echo intval( $nm_theme_options['shop_taxonomy_header_image_height'] ); ?>px;
}
.nm-shop-taxonomy-text-col
{
    max-width:<?php echo ( strlen( $nm_theme_options['shop_taxonomy_header_text_max_width'] ) > 0 ) ? intval( $nm_theme_options['shop_taxonomy_header_text_max_width'] ) . 'px' : 'none'; ?>;
}
.nm-shop-taxonomy-text h1
{
    color:<?php echo esc_attr( $nm_theme_options['shop_taxonomy_header_heading_color'] ); ?>;
}
.nm-shop-taxonomy-text .term-description
{
    color:<?php echo esc_attr( $nm_theme_options['shop_taxonomy_header_description_color'] ); ?>;
}
@media all and (max-width:991px)
{
    #nm-shop-taxonomy-header.has-image
    {
        height:<?php echo intval( $nm_theme_options['shop_taxonomy_header_image_height_tablet'] ); ?>px;
    }
}
@media all and (max-width:768px)
{
    #nm-shop-taxonomy-header.has-image
    {
        height:<?php echo intval( $nm_theme_options['shop_taxonomy_header_image_height_mobile'] ); ?>px;
    }
}
    
/* Shop - Filters: Scrollbar */
.nm-shop-widget-scroll
{
	height:<?php echo intval( $nm_theme_options['shop_filters_height'] ); ?>px;
}

/* Shop - "Sale" flash */
.onsale
{
	color:<?php echo esc_attr( $nm_theme_options['sale_flash_font_color'] ); ?>;
	background:<?php echo esc_attr( $nm_theme_options['sale_flash_background_color'] ); ?>;
}
    
/* Shop - "Out of stock" flash */
.products li.outofstock .nm-shop-loop-thumbnail > a:after
{
    content: "<?php echo esc_html_e( 'Out of stock', 'woocommerce' ); ?>";
}
    
/* Shop - Products: Overlay */
#nm-shop-products-overlay
{
    background:<?php echo esc_attr( $nm_theme_options['main_background_color'] ); ?>;
}

/* Single product */
.nm-single-product-bg
{
	background:<?php echo esc_attr( $nm_theme_options['single_product_background_color'] ); ?>;
}
@media (max-width:1199px)
{
	.woocommerce-product-gallery
	{
		max-width:<?php echo intval( $nm_theme_options['product_image_max_size'] ); ?>px;
	}
}
.nm-featured-video-icon
{
	color:<?php echo esc_attr( $nm_theme_options['featured_video_icon_color'] ); ?>;
	background:<?php echo esc_attr( $nm_theme_options['featured_video_background_color'] ); ?>;
}
    
/* Checkout */
.nm-validation-inline-notices .form-row.woocommerce-invalid-required-field:after
{
    content:"<?php esc_attr_e( 'Required field.', 'nm-framework' ) ?>";
}

/* Custom CSS */
<?php echo $nm_theme_options['custom_css']; ?>
</style>
<?php
	$styles = ob_get_clean();
	
	// Remove comments
    $styles = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $styles );
	
	// Remove new-lines, tab-indents and spaces (excluding single spaces)
	$styles = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '   ', '    ' ), '', $styles );
		
	// Save styles to WP settings db
	update_option( 'nm_theme_custom_styles', $styles, true );
}

endif;

// Redux hook: Options saved - https://docs.reduxframework.com/core/advanced/actions-hooks/
add_action( 'redux/options/nm_theme_options/saved', 'nm_custom_styles_save' );


/* Make sure custom theme styles are saved */
function nm_custom_styles_install() {
	if ( ! get_option( 'nm_theme_custom_styles' ) && get_option( 'nm_theme_options' ) ) {
		nm_custom_styles_save();
	}
}
// Redux hook: When registering the options - https://docs.reduxframework.com/core/advanced/actions-hooks/
add_action( 'redux/options/nm_theme_options/register', 'nm_custom_styles_install' );
