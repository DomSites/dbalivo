<?php

/**
 * Multisite Menu Walker
 *
 * @access    public 
 * @since     4.2
 * @version   1.0
 *
 */

class ut_menu_walker extends Walker_Nav_Menu {
    
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        
        $front_page_id 	= get_option('page_on_front');	
        
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        
        $home_link = false;
        
        if( is_front_page() && $front_page_id == $item->object_id ) {
            $classes[] = 'ut-home-link menu-item-object-custom';
            $home_link = true;
        }
                
        if( $front_page_id == $item->object_id ) {
            $classes[] = 'ut-front-page-link';            
        }
            
        /**
         * Filter the arguments for a single nav menu item.
         *
         * @since 4.4.0
         *
         * @param array  $args  An array of arguments.
         * @param object $item  Menu item data object.
         * @param int    $depth Depth of menu item. Used for padding.
         */
        $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

        /**
         * Filter the CSS class(es) applied to a menu item's list item element.
         *
         * @since 3.0.0
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param array  $classes The CSS classes that are applied to the menu item's `<li>` element.
         * @param object $item    The current menu item.
         * @param array  $args    An array of {@see wp_nav_menu()} arguments.
         * @param int    $depth   Depth of menu item. Used for padding.
         */
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        /**
         * Filter the ID applied to a menu item's list item element.
         *
         * @since 3.0.1
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param string $menu_id The ID that is applied to the menu item's `<li>` element.
         * @param object $item    The current menu item.
         * @param array  $args    An array of {@see wp_nav_menu()} arguments.
         * @param int    $depth   Depth of menu item. Used for padding.
         */
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names .'>';

        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
        
        if( $home_link && $depth == 0 ) {
            $atts['href'] = '#top';
        }
        
        /**
         * Filter the HTML attributes applied to a menu item's anchor element.
         *
         * @since 3.6.0
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param array $atts {
         *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
         *
         *     @type string $title  Title attribute.
         *     @type string $target Target attribute.
         *     @type string $rel    The rel attribute.
         *     @type string $href   The href attribute.
         * }
         * @param object $item  The current menu item.
         * @param array  $args  An array of {@see wp_nav_menu()} arguments.
         * @param int    $depth Depth of menu item. Used for padding.
         */
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
        
        if( $home_link ) {
            $atts['class'] = 'selected';
        }
        
        $attributes = '';
        
        if( strpos( $class_names, 'contact-us') !== false ) {
        
            if( ut_return_csection_config('ut_activate_csection', 'on') == 'on' ) {

                $atts["href"] = esc_attr( $item->url );

            } else {

                $ut_activate_csection = ot_get_option('ut_activate_csection');

                if( is_array( $ut_activate_csection ) && in_array( 'is_front_page', $ut_activate_csection ) ) {
                    
                    $atts["href"] = esc_attr( home_url() . '/'   . esc_attr( $item->url ) );

                }

            }  
        
        }
        
        foreach ( $atts as $attr => $value ) {
            
            if ( ! empty( $value ) ) {
                $value = ( 'href'  === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
            
        }
        
        /** This filter is documented in wp-includes/post-template.php */
        $title = apply_filters( 'the_title', $item->title, $item->ID );
        
        /**
         * Filter a menu item's title.
         *
         * @since 4.4.0
         *
         * @param string $title The menu item's title.
         * @param object $item  The current menu item.
         * @param array  $args  An array of {@see wp_nav_menu()} arguments.
         * @param int    $depth Depth of menu item. Used for padding.
         */
        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
        
        
        if( $item->object == "megamenu-button" ) {
            
            if( class_exists("UT_BTN") ) {
            
                $fallback_background_color = !empty( $_GET['color'] ) ? '#' . $_GET['color'] : get_option('ut_accentcolor' , '#F1C40F');
                
                $button = new UT_BTN();
                
                $item_output = $button->ut_create_shortcode( array(
                    'button_text'               => $title,
                    'button_text_color'         => isset( $item->megamenu_button_text_color ) ? $item->megamenu_button_text_color : '#FFF',
                    'button_text_color_hover'   => isset( $item->megamenu_button_text_color_hover ) ? $item->megamenu_button_text_color_hover : '#FFF',
                    'button_background'         => isset( $item->megamenu_button_background_color ) ? $item->megamenu_button_background_color : $fallback_background_color,
                    'button_background_hover'   => isset( $item->megamenu_button_background_color_hover ) ? $item->megamenu_button_background_color_hover : '#151515',
                    'button_border_radius'      => isset( $item->megamenu_button_border_radius ) && $item->megamenu_button_border_radius == 'on' ? '4' : '',
                    'button_plain_link'         => isset( $item->megamenu_button_link ) ? $item->megamenu_button_link : '',
                    'button_plain_target'       => isset( $item->megamenu_button_link_target ) ? $item->megamenu_button_link_target : '_blank',
                    'class'                     => 'bklyn-btn-menu'
                ) );
                
                
            }  
            
        } else {
            
            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before . $title . $args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;
            
        }
        

        /**
         * Filter a menu item's starting output.
         *
         * The menu item's starting output only includes `$args->before`, the opening `<a>`,
         * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
         * no filter for modifying the opening and closing `<li>` for a menu item.
         *
         * @since 3.0.0
         *
         * @param string $item_output The menu item's starting HTML output.
         * @param object $item        Menu item data object.
         * @param int    $depth       Depth of menu item. Used for padding.
         * @param array  $args        An array of {@see wp_nav_menu()} arguments.
         */
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
      
}

?>