<?php

// additional overlay navigation
$overlay_navigation = ot_get_option('ut_global_overlay_navigation', 'off') == 'on' ? true : false;

// container classes
if( $overlay_navigation ) {
    
    $classes = array('grid-80 hide-on-tablet hide-on-mobile');
    
} else {
    
    $classes = array('grid-85 hide-on-tablet hide-on-mobile');
    
}

// navigation flush
if( ( ut_page_option( 'ut_site_border', 'hide' ) == 'show' && ot_get_option( 'ut_site_navigation_flush', 'no' ) == 'yes' ) && ut_return_header_config( 'ut_navigation_width', 'centered' ) == 'fullwidth' ) {
    
    $classes[] = 'ut-flush-nav'; 
    
} 

if( $overlay_navigation ) {

    echo '<div class="ut-open-overlay-trigger grid-5 hide-on-tablet hide-on-mobile">';

        echo ut_transform_button( 'ut-open-overlay-menu' );

    echo '</div>';

}

if( !$overlay_navigation ) {

    // main navigation args
    $menu = array(
        'echo'              => false,
        'container'         => 'nav',
        'container_id'      => 'navigation',
        'fallback_cb'       => 'ut_default_menu',
        'container_class'   => implode(' ' , $classes ),
        'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'theme_location'    => 'primary', 
        'walker'            => new ut_menu_walker()
    );

    /* main navigation */
    echo wp_nav_menu( $menu );
    
}