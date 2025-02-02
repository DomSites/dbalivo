<?php
/**
 *	The template for displaying the shop filters popup
 */

global $nm_globals, $nm_theme_options;
?>

<div id="nm-shop-sidebar-popup-button"><span><?php esc_html_e( 'Filter Products', 'nm-framework' ); ?></span><i class="nm-font nm-font-plus"></i></div>
        
<div id="nm-shop-sidebar-popup" class="nm-shop-sidebar-popup">
    <?php 
        if ( $nm_globals['shop_search_popup'] ) :
        
        $searchClass = ( $nm_theme_options['shop_search_ajax'] ) ? ' nm-shop-search-ajax' : '';
    ?>
    <div id="nm-shop-search" class="nm-shop-search nm-shop-search-popup<?php echo $searchClass; ?>">
        <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <input type="text" id="nm-shop-search-input" autocomplete="off" value="" name="s" placeholder="<?php esc_attr_e( 'Search Products', 'woocommerce' ); ?>" />
            <span class="nm-search-icon nm-font nm-font-search-alt"></span>
            <input type="hidden" name="post_type" value="product" />
        </form>

        <div id="nm-shop-search-notice"><span><?php printf( esc_html__( 'press %sEnter%s to search', 'nm-framework' ), '<u>', '</u>' ); ?></span></div>
    </div>
    <?php endif; ?>

    <div id="nm-shop-sidebar" class="nm-shop-sidebar nm-shop-sidebar-popup" data-sidebar-layout="popup">
        <ul id="nm-shop-widgets-ul">
            <?php
                if ( is_active_sidebar( 'widgets-shop' ) ) {
                    dynamic_sidebar( 'widgets-shop' );
                }
            ?>
        </ul>
    </div>

    <div class="nm-shop-sidebar-popup-reset">
        <a href="#" id="nm-shop-sidebar-popup-reset-button" class="button"><span><?php esc_html_e( 'Reset Filters', 'nm-framework' ); ?></span><i class="nm-font-replay"></i></a>
    </div>
</div>
