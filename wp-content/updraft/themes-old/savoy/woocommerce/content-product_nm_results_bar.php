<?php
/**
 *	Template for displaying shop results bar/button
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $nm_theme_options;

$results_bar_class = '';
$results_bar_buttons = array();

// Filters
$filters_count = nm_get_active_filters_count();
if ( $filters_count ) {
    $results_bar_class = ' has-filters';
    $results_bar_buttons['filters'] = array(
        'id'    => 'nm-shop-filters-reset',
        'title' => sprintf( esc_html__( 'Filters active %s(%s)%s', 'nm-framework' ), '<span>', $filters_count, '</span>' )
    );
}

// Search
if ( ! empty( $_REQUEST['s'] ) ) { // Is search query set and not empty?
    $results_bar_class .= ' is-search';
    $results_bar_buttons['search_taxonomy'] = array(
        'id'    => 'nm-shop-search-taxonomy-reset',
        'title' => sprintf( esc_html__( 'Search results for %s&ldquo;%s&rdquo;%s', 'nm-framework' ), '<span>', esc_html( $_REQUEST['s'] ), '</span>' )
    );
}
// Taxonomy
else if ( is_product_taxonomy() ) {
    $results_bar_buttons['search_taxonomy'] = array(
        'id' => 'nm-shop-search-taxonomy-reset'
    );
    $current_term = $GLOBALS['wp_query']->get_queried_object();
    
    if ( is_product_category() ) {
        $results_bar_class .= ' is-category';
        $results_bar_buttons['search_taxonomy']['title'] = sprintf( esc_html__( 'Showing %s&ldquo;%s&rdquo;%s', 'nm-framework' ), '<span>', esc_html( $current_term->name ), '</span>' );
    } else {
        $results_bar_class .= ' is-tag';
        $results_bar_buttons['search_taxonomy']['title'] = sprintf( esc_html__( 'Products tagged %s&ldquo;%s&rdquo;%s', 'nm-framework' ), '<span>', esc_html( $current_term->name ), '</span>' );
    }
}

if ( ! empty( $results_bar_buttons ) ) :
?>

<div class="nm-shop-results-bar <?php echo esc_attr( $results_bar_class ); ?>">
    <?php 
        $shop_url = esc_url( get_permalink( wc_get_page_id( 'shop' ) ) );
        
        foreach ( $results_bar_buttons as $button ) {
            printf( '<a href="%s" id="%s" data-shop-url="%s"><i class="nm-font nm-font-close2"></i>%s</a>',
                $nm_theme_options['shop_filters_enable_ajax'] ? '#' : $shop_url,
                $button['id'],
                $shop_url,
                $button['title']
            );
        }
    ?>
</div>

<?php endif; ?>
