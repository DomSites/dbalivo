<?php
global $nm_globals, $nm_theme_options;

$default_links = array();

// Search
if ( $nm_globals['shop_search_header'] ) {
    $search_icon_html = apply_filters( 'nm_header_search_icon_html', '<i class="nm-font nm-font-search"></i>' );
    
    $default_links['search'] = sprintf(
        '<li class="nm-menu-search menu-item-default has-icon"><a href="#" id="nm-menu-search-btn" aria-label="%s">%s</a></li>',
        esc_html__( 'Search', 'woocommerce' ),
        $search_icon_html
    );
}

// Wishlist
if ( $nm_globals['wishlist_enabled'] && $nm_theme_options['menu_wishlist'] ) {
    $icon_class = ( $nm_theme_options['menu_wishlist_icon'] ) ? 'has-icon' : 'no-icon';
    $wishlist_link_escaped = ( function_exists( 'nm_wishlist_get_header_link' ) ) ? nm_wishlist_get_header_link() : '';
    
    $default_links['wishlist'] = sprintf(
        '<li class="nm-menu-wishlist menu-item-default %s" aria-label="%s">%s</li>',
        esc_attr( $icon_class ),
        esc_html__( 'Wishlist', 'nm-wishlist' ),
        $wishlist_link_escaped
    );
}

// Login/My Account
if ( nm_woocommerce_activated() && $nm_theme_options['menu_login'] ) {
    $icon_class = ( $nm_theme_options['menu_login_icon'] ) ? 'has-icon' : 'no-icon';
    
    $default_links['my_account'] = sprintf(
        '<li class="nm-menu-account menu-item-default %s" aria-label="%s">%s</li>',
        esc_attr( $icon_class ),
        esc_html__( 'My account', 'woocommerce' ),
        nm_get_myaccount_link( true ) // Args: $is_header
    );
}

// Cart
if ( $nm_globals['cart_link'] ) {
    $icon_class = ( $nm_theme_options['menu_cart_icon'] ) ? 'has-icon' : 'no-icon';
    $cart_url = ( $nm_globals['cart_panel'] ) ? '#' : wc_get_cart_url();
    
    $default_links['cart'] = sprintf(
        '<li class="nm-menu-cart menu-item-default %s"><a href="%s" id="nm-menu-cart-btn">%s %s</a></li>',
        esc_attr( $icon_class ),
        esc_url( $cart_url ),
        nm_get_cart_title(),
        nm_get_cart_contents_count()
    );
}

$default_links = apply_filters( 'nm_header_default_links', $default_links );

foreach( $default_links as $default_link ) {
    echo $default_link;
}
