<?php if (!defined('ABSPATH')) {
    exit; // exit if accessed directly
}

// no button support for old one page system due to different walkers
if( ot_get_option( 'ut_site_layout', 'onepage' ) == 'onepage' ) {
    return;
}


/**
 * Add Button Translation Strings
 *
 * @since     4.4.8
 * @version   1.0.0
 */

if ( ! function_exists( '_ut_navigation_button_js_translation' ) ) :
    
    function _ut_navigation_button_js_translation( $strings ) {
        
        $strings['button_added'] = esc_html__( 'Button successfully added!', 'unite' );
        
        return $strings;
        
    }

    add_filter( 'ut_recognized_js_translation_strings', '_ut_navigation_button_js_translation' );

endif;


/**
 * Mega Menu Admin Scripts
 *
 * @since     1.0.0
 * @version   1.0.0
 */
if ( ! function_exists( '_ut_megamenu_scripts' ) ) :
    
    function _ut_megamenu_scripts() {
        
        $min = NULL;
            
        if( !WP_DEBUG ){
            $min = '.min';
        }
         
        wp_enqueue_media();
        
        // megamenu css
        wp_register_script(
            'unite-megamenu-admin', 
            THEME_WEB_ROOT . '/unite-custom/admin/assets/js/unite-megamenu.js', 
            array(
                'jquery', 
                'jquery-ui-tabs', 
                'jquery-ui-accordion'
            ), 
            UT_VERSION
        );
         
        // megamenu js
        wp_enqueue_script( 'unite-megamenu-admin' );
        
        wp_enqueue_style(
            'unite-megamenu-admin', 
            THEME_WEB_ROOT . '/unite-custom/admin/assets/css/unite-megamenu.css', 
            false, 
            UT_VERSION
        );        
             
    }
    
    add_action('admin_print_scripts-nav-menus.php', '_ut_megamenu_scripts');

endif;





if ( !class_exists( 'UT_Menu_Button_Extensions' ) ) {

    class UT_Menu_Button_Extensions {
        
        /**
         * Navigation Button
         * @var string
         */
        private $mm_button_key = 'megamenu-button';
        
        /**
         * Constructor
         * @since     4.4.8
         * @version   1.0.0
         */
        public function __construct() {
            
            /* run hooks */
            $this->hooks();
                
        }
        
        /**
         * Initiate our hooks
         * @since     4.4.8
         * @version   1.0.0
         */
        public function hooks() {
            
            // add meta box to menu
            add_action( 'admin_init', array( $this, 'menu_setup' ) );
            
            // filter the menu item
            add_filter( 'wp_setup_nav_menu_item', array( $this, 'label' ), 10, 1 );
                    
        }
        
        /**
         * Add Metabox to Menu Management
         * @since     4.4.8
         * @version   1.0.0
         */
        public function menu_setup() {
            
            // Current menu
            $nav_menu_selected_id = isset( $_REQUEST['menu'] ) ? (int) $_REQUEST['menu'] : 0;
            
            // Get recently edited nav menu.
            $recently_edited = absint( get_user_option( 'nav_menu_recently_edited' ) );
            if ( empty( $recently_edited ) && is_nav_menu( $nav_menu_selected_id ) ) {
                $recently_edited = $nav_menu_selected_id;
            }
                
            // Use $recently_edited if none are selected.
            if ( empty( $nav_menu_selected_id ) && ! isset( $_GET['menu'] ) && is_nav_menu( $recently_edited ) ) {
                $nav_menu_selected_id = $recently_edited;
            }
                        
            $locations = get_registered_nav_menus();
            $menu_locations = get_nav_menu_locations();
            
            foreach ( $locations as $location => $description ) {
                
                if( ot_get_option( 'ut_header_layout', 'default' ) == 'default' && 'primary' == $location && isset( $menu_locations[ $location ] ) && $menu_locations[ $location ] == $nav_menu_selected_id ) {
                    
                    add_meta_box( 
                        'add-button-section', 
                        esc_html__( 'Navigation Buttons', 'unite' ), 
                        array( $this, 'button_meta_box' ), 
                        'nav-menus', 
                        'side', 
                        'low'
                    );
                    
                }
                
            }
            
        }
        
        /**
         * Button Metabox for Menu Management
         * @since     4.4.8
         * @version   1.0.0
         */        
        
        public function button_meta_box() {
            
            global $_nav_menu_placeholder, $nav_menu_selected_id;
            
            /* start output for menu button  */
            echo '<div id="ut-mm-button-for-menu" class="ut-mega-menu-setting">';
                
                echo '<div class="ut-megamenu-panel-setting">';
                    
                    echo '<p>';
                    
                        echo '<label for="mm-button-title' , $_nav_menu_placeholder , '">';
                                
                            echo '<span>', esc_html__( 'Button Text', 'unite' ) , '</span>';
                            echo '<input autocomplete="off" placeholder="' , esc_attr__( 'Enter Button Text', 'unite' ), '" id="mm-button-title' , $_nav_menu_placeholder , '" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-title]" type="text" class="regular-text menu-item-textbox input-with-default-title" title="' , esc_attr__( 'Button Title', 'unite' ), '" />';
                            
                            /* field settings */
                            echo '<input type="hidden" class="menu-item-object" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-object]" value="' , $this->mm_button_key , '" />';
                            echo '<input type="hidden" class="menu-item-object-id" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-object-id]" value="' , $_nav_menu_placeholder , '" />';
                            echo '<input type="hidden" class="menu-item-parent-id" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-parent-id]" value="0" />';
                            echo '<input type="hidden" class="menu-item-type" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-type]" value="" />';
                            
                            /* additional fields */
                            echo '<input type="hidden" class="menu-item-url" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-url]" value="#" />';
                            echo '<input type="hidden" class="menu-item-target" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-target]" value="" />';
                            echo '<input type="hidden" class="menu-item-attr_title" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-attr_title]" value="" />';
                            echo '<input type="hidden" class="menu-item-classes" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-classes]" value="" />';
                                                        
                        echo '</label>';
                    
                    echo '</p>';
                
                echo '</div>';
                
                echo '<p class="button-controls">';
                    echo '<button data-menu-id="' , $_nav_menu_placeholder , '" type="button" name="add-mm-button-item" id="add-mm-button-to-menu" class="ut-ui-button">' , esc_attr_e('Add Button', 'unite') , '</button>';
                echo '</p>';                     
            
            echo '</div>';
            
        }
        
        
        /**
         * Create Label for Menu Edit Page
         * @since     4.4.8
         * @version   1.0.0
         */         
        
        public function label( $item ) {
            
            if ( is_object( $item ) && isset( $item->object ) ) {
            
                switch( $item->object ) {
                    
                    case $this->mm_button_key;
                    $item->type_label = esc_html__( 'Button', 'unite' );
                    break;
                    
                }
            
            }
            
            return $item;
            
        }        
        
    }

    new UT_Menu_Button_Extensions();
    
}


/**
 * Recognized Button Settings Fields
 *
 * @return    array
 *
 * @access    public
 * @since     4.4.8
 * @version   1.0.0
 */
 
if ( !function_exists( '_ut_recognized_button_settings_fields' ) ) {

    function _ut_recognized_button_settings_fields() {
        
        return apply_filters( '_ut_recognized_button_settings_fields', array(
            'menu_button',
            'megamenu_button_link',
            'megamenu_button_link_target',
            'megamenu_button_background_color',
            'megamenu_button_background_color_hover',
            'megamenu_button_text_color',
            'megamenu_button_text_color_hover',
            'megamenu_button_border_radius',
        ) );
        
    }

}



/**
 * Add Button Custom Field
 *
 * @since     1.0.0 
 * @version   1.0.0
 */
if ( !function_exists( '_ut_add_nav_custom_button_field' ) ) {

    function _ut_add_nav_custom_button_field( $menu_item ) {
        
        if( !isset( $menu_item->ID ) ) {
            return;
        }   
                            
        foreach( _ut_recognized_button_settings_fields() as $field ) {
                            
            if( get_post_meta( $menu_item->ID, '_menu_item_' . $field , true ) ) {
                
                $menu_item->$field = get_post_meta( $menu_item->ID, '_menu_item_' . $field, true );
                
            }
        
        }        
        
        return $menu_item;
        
    }
    
    /* add custom menu fields to menu */
    add_filter( 'wp_setup_nav_menu_item', '_ut_add_nav_custom_button_field' );

}

/**
 * Update Navigation Custom Field
 *
 * @since     1.0.0
 * @version   1.0.0
 */
 
if ( !function_exists( '_ut_update_nav_custom_button_field' ) ) {
    
    function _ut_update_nav_custom_button_field( $menu_id, $menu_item_db_id, $args ) {
            
        foreach( _ut_recognized_button_settings_fields() as $field ) {
            
            $request_field = str_replace('_' , '-', $field );
            
            if ( isset($_REQUEST['menu-item-' . $request_field][$menu_item_db_id]) ) {
            
                update_post_meta( $menu_item_db_id, '_menu_item_' . $field, $_REQUEST['menu-item-' . $request_field][$menu_item_db_id] );
                
            } else {
                
                delete_post_meta( $menu_item_db_id, '_menu_item_' . $field );
                
            }        
        
        }                
        
    }
    
    /* save menu custom fields */
    add_action( 'wp_update_nav_menu_item', '_ut_update_nav_custom_button_field' , 10 , 3 ); 

}



/**
 * Edit Menutype Button Field
 *
 * @since     1.0.0
 * @version   1.0.0
 */
 
 if ( !function_exists( '_ut_button_edit_walker' ) ) {

    function _ut_button_edit_walker( $walker , $menu_id ) {
        
        return 'WP_UT_Nav_Menu_Button_Edit';
        
    }
    
    /* edit menu walker */
     add_filter( 'wp_edit_nav_menu_walker', '_ut_button_edit_walker' , 10 , 2 ); 

}

/**
 * Enhance "Appearance" => "Menus"
 *
 * @since     1.0.0
 * @version   1.0.0
 */
if( !class_exists('WP_UT_Nav_Menu_Button_Edit') ) :

    class WP_UT_Nav_Menu_Button_Edit extends Walker_Nav_Menu  {
        
        /**
         * Starts the list before the elements are added.
         *
         * @see Walker_Nav_Menu::start_lvl()
         *
         * @since 3.0.0
         *
         * @param string $output Passed by reference.
         * @param int    $depth  Depth of menu item. Used for padding.
         * @param array  $args   Not used.
         */
        public function start_lvl( &$output, $depth = 0, $args = array() ) {
        
        }        
        
        
        /**
         * Ends the list of after the elements are added.
         *
         * @see Walker_Nav_Menu::end_lvl()
         *
         * @since 3.0.0
         *
         * @param string $output Passed by reference.
         * @param int    $depth  Depth of menu item. Used for padding.
         * @param array  $args   Not used.
         */
        public function end_lvl( &$output, $depth = 0, $args = array() ) {
            
        }
        
                
        function display_element ($element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {
            
            // check, whether there are children for the given ID and append it to the element with a (new) ID
            $element->hasChildren = isset($children_elements[$element->ID]) && !empty($children_elements[$element->ID]);
    
            return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
            
        }
        
        /**
         * Start the element output.
         *
         * @see Walker_Nav_Menu::start_el()
         * @since 3.0.0
         *
         * @param string $output Passed by reference. Used to append additional content.
         * @param object $item   Menu item data object.
         * @param int    $depth  Depth of menu item. Used for padding.
         * @param array  $args   Not used.
         * @param int    $id     Not used.
         */
        public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
            
            global $_wp_nav_menu_max_depth;
            $_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;

            ob_start();
            
            $item_id = esc_attr( $item->ID );
            $removed_args = array(
                'action',
                'customlink-tab',
                'edit-menu-item',
                'menu-item',
                'page-tab',
                '_wpnonce',
            );

            $original_title = false;
            if ( 'taxonomy' == $item->type ) {
                $original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
                if ( is_wp_error( $original_title ) )
                    $original_title = false;
            } elseif ( 'post_type' == $item->type ) {
                $original_object = get_post( $item->object_id );
                $original_title = get_the_title( $original_object->ID );
            } elseif ( 'post_type_archive' == $item->type ) {
                $original_object = get_post_type_object( $item->object );
                if ( $original_object ) {
                    $original_title = $original_object->labels->archives;
                }
            }

            $classes = array(
                'menu-item menu-item-depth-' . $depth,
                'menu-item-' . esc_attr( $item->object ),
                'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
            );

            $title = $item->title;

            if ( ! empty( $item->_invalid ) ) {
                $classes[] = 'menu-item-invalid';
                /* translators: %s: title of menu item which is invalid */
                $title = sprintf( __( '%s (Invalid)', 'unite' ), $item->title );
            } elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
                $classes[] = 'pending';
                /* translators: %s: title of menu item in draft status */
                $title = sprintf( __('%s (Pending)', 'unite'), $item->title );
            }

            $title = ( ! isset( $item->label ) || '' == $item->label ) ? $title : $item->label;

            $submenu_text = '';
            if ( 0 == $depth )
                $submenu_text = 'style="display: none;"';

            ?>
            <li id="menu-item-<?php echo $item_id; ?>" class="<?php echo implode(' ', $classes ); ?>">
                <div class="menu-item-bar">
                    <div class="menu-item-handle">
                        <span class="item-title">
                        
                        <span class="menu-item-title"><?php echo esc_html( $title ); ?></span> 
                        
                            <?php if( 'megamenu-button' == $item->object ) : ?>

                                <span id="mega-menu-button-<?php echo $item_id; ?>" class="ut-is-button"><?php esc_html_e( 'Button', 'unite' ); ?></span>

                            <?php else: ?>

                                <span class="is-submenu" <?php echo $submenu_text; ?>><?php _e( 'sub item' , 'unite' ); ?></span>

                            <?php endif; ?>
                        
                        </span>
                        
                        <span class="item-controls">
                            <span class="item-type"><?php echo esc_html( $item->type_label ); ?></span>
                            <span class="item-order hide-if-js">
                                <a href="<?php
                                    echo wp_nonce_url(
                                        add_query_arg(
                                            array(
                                                'action' => 'move-up-menu-item',
                                                'menu-item' => $item_id,
                                            ),
                                            remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
                                        ),
                                        'move-menu_item'
                                    );
                                ?>" class="item-move-up" aria-label="<?php esc_attr_e( 'Move up' , 'unite' ) ?>">&#8593;</a>
                                |
                                <a href="<?php
                                    echo wp_nonce_url(
                                        add_query_arg(
                                            array(
                                                'action' => 'move-down-menu-item',
                                                'menu-item' => $item_id,
                                            ),
                                            remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
                                        ),
                                        'move-menu_item'
                                    );
                                ?>" class="item-move-down" aria-label="<?php esc_attr_e( 'Move down' , 'unite' ) ?>">&#8595;</a>
                            </span>
                            <a class="item-edit" id="edit-<?php echo $item_id; ?>" href="<?php
                                echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) );
                            ?>" aria-label="<?php esc_attr_e( 'Edit menu item', 'unite' ); ?>"><?php _e( 'Edit', 'unite' ); ?></a>
                        </span>
                    </div>
                </div>

                <div class="menu-item-settings wp-clearfix" id="menu-item-settings-<?php echo $item_id; ?>">
                    <?php if ( 'custom' == $item->type ) : ?>
                        <p class="field-url description description-wide">
                            <label for="edit-menu-item-url-<?php echo $item_id; ?>">
                                <?php _e( 'URL', 'unite' ); ?><br />
                                <input type="text" id="edit-menu-item-url-<?php echo $item_id; ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->url ); ?>" />
                            </label>
                        </p>
                    <?php endif; ?>
                    <p class="description description-wide">
                        <label for="edit-menu-item-title-<?php echo $item_id; ?>">
                            
                            <?php if( 'megamenu-button' == $item->object ) : ?>
                            
                                <?php _e( 'Button Text', 'unite' ); ?><br />
                            
                            <?php else : ?>
                            
                                <?php _e( 'Navigation Label', 'unite' ); ?><br />
                            
                            <?php endif; ?>
                            
                            <input type="text" id="edit-menu-item-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->title ); ?>" />
                        </label>
                    </p>
                    
                    <?php if( 'megamenu-button' != $item->object ) : ?>
                    
                    <p class="field-title-attribute field-attr-title description description-wide">
                        <label for="edit-menu-item-attr-title-<?php echo $item_id; ?>">
                            <?php _e( 'Title Attribute', 'unite' ); ?><br />
                            <input type="text" id="edit-menu-item-attr-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>" />
                        </label>
                    </p>
                    <p class="field-link-target description">
                        <label for="edit-menu-item-target-<?php echo $item_id; ?>">
                            <input type="checkbox" id="edit-menu-item-target-<?php echo $item_id; ?>" value="_blank" name="menu-item-target[<?php echo $item_id; ?>]"<?php checked( $item->target, '_blank' ); ?> />
                            <?php _e( 'Open link in a new tab', 'unite' ); ?>
                        </label>
                    </p>
                    <p class="field-css-classes description description-thin">
                        <label for="edit-menu-item-classes-<?php echo $item_id; ?>">
                            <?php _e( 'CSS Classes (optional)', 'unite' ); ?><br />
                            <input type="text" id="edit-menu-item-classes-<?php echo $item_id; ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo $item_id; ?>]" value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />
                        </label>
                    </p>
                    <p class="field-xfn description description-thin">
                        <label for="edit-menu-item-xfn-<?php echo $item_id; ?>">
                            <?php _e( 'Link Relationship (XFN)', 'unite' ); ?><br />
                            <input type="text" id="edit-menu-item-xfn-<?php echo $item_id; ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->xfn ); ?>" />
                        </label>
                    </p>
                    <p class="field-description description description-wide">
                        <label for="edit-menu-item-description-<?php echo $item_id; ?>">
                            <?php _e( 'Description', 'unite' ); ?><br />
                            <textarea id="edit-menu-item-description-<?php echo $item_id; ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo $item_id; ?>]"><?php echo esc_html( $item->description ); // textarea_escaped ?></textarea>
                            <span class="description"><?php _e('The description will be displayed in the menu if the current theme supports it.' , 'unite' ); ?></span>
                        </label>
                    </p>
                    
                    <?php endif; ?>
                    
                    <fieldset class="field-move hide-if-no-js description description-wide">
                        <span class="field-move-visual-label" aria-hidden="true"><?php _e( 'Move', 'unite' ); ?></span>
                        <button type="button" class="button-link menus-move menus-move-up" data-dir="up"><?php _e( 'Up one', 'unite' ); ?></button>
                        <button type="button" class="button-link menus-move menus-move-down" data-dir="down"><?php _e( 'Down one', 'unite' ); ?></button>
                        <button type="button" class="button-link menus-move menus-move-left" data-dir="left"></button>
                        <button type="button" class="button-link menus-move menus-move-right" data-dir="right"></button>
                        <button type="button" class="button-link menus-move menus-move-top" data-dir="top"><?php _e( 'To the top', 'unite' ); ?></button>
                    </fieldset>
                                        
                    <?php /* New fields insertion starts here */ ?>
                    
                    <div class="clear"></div>
                    
                        <?php if( 'megamenu-button' == $item->object ) : ?>
                    
                            <div class="ut-megamenu-settings">
                            
                                <h4><?php esc_html_e( 'Button Settings', 'unite' ); ?></h4>
                            
                                <div id="ut-megamenu-settings-<?php echo $item_id; ?>" class="ut-megamenu-settings-inner has-tabs">    
                                    
                                    <div class="ut-tabs">
                                    
                                        <ul>
                                            <li>
                                                <a href="#"><?php esc_html_e( 'General', 'unite' ); ?></a>
                                            </li>
                                            <li>
                                                <a href="#"><?php esc_html_e( 'Styling', 'unite' ); ?></a>
                                            </li>
                                        </ul>
                                        
                                        <div>
                                            
                                            <h5><?php esc_html_e( 'Link', 'unite' ); ?></h5>
                                                
                                            <?php
            
                                                $field_settings = array(
                                                    'field_id'    => 'edit-menu-item-megamenu-button-link-' . $item_id,
                                                    'field_name'  => 'menu-item-megamenu-button-link['.$item_id.']',
                                                    'type'        => 'text',
                                                    'field_value' => isset( $item->megamenu_button_link ) ? $item->megamenu_button_link : '',
                                                    'field_class' => 'widefat'
                                                );

                                                call_user_func( 'ot_type_' . $field_settings['type'], $field_settings );

                                            ?>
                                            
                                            
                                            <h5><?php esc_html_e( 'Link Target', 'unite' ); ?></h5>
                                                
                                            <?php
            
                                                $field_settings = array(
                                                    'field_id'     => 'edit-menu-item-megamenu-button-link-target-' . $item_id,
                                                    'field_name'   => 'menu-item-megamenu-button-link-target['.$item_id.']',
                                                    'type'         => 'select',
                                                    'field_choices'=> array(
                                                        
                                                        array(
                                                            'value' => '_blank',
                                                            'label' => 'blank'
                                                        ),
                                                        array(
                                                            'value' => '_self',
                                                            'label' => 'self'
                                                        ),
                                                        
                                                    ),
                                                    'field_value' => isset( $item->megamenu_button_link_target ) ? $item->megamenu_button_link_target : '',
                                                    'field_class' => ''
                                                );

                                                call_user_func( 'ot_type_' . $field_settings['type'], $field_settings );

                                            ?>
                                        
                                        </div>
                                        
                                        
                                        <div>
                                            
                                            
                                            <h5><?php esc_html_e( 'Text Color', 'unite' ); ?></h5>
                                                
                                            <?php
            
                                                $field_settings = array(
                                                    'field_id'    => 'edit-menu-item-megamenu-button-text-color-' . $item_id,
                                                    'field_name'  => 'menu-item-megamenu-button-text-color['.$item_id.']',
                                                    'type'        => 'colorpicker',
                                                    'field_mode'  => 'rgb',
                                                    'field_value' => isset( $item->megamenu_button_text_color ) ? $item->megamenu_button_text_color : '',
                                                    'field_class' => ''
                                                );

                                                call_user_func( 'ot_type_' . $field_settings['type'], $field_settings );

                                            ?>
                                            
                                            
                                            <h5><?php esc_html_e( 'Text Hover Color', 'unite' ); ?></h5>
                                                
                                            <?php
            
                                                $field_settings = array(
                                                    'field_id'    => 'edit-menu-item-megamenu-button-text-color-hover-' . $item_id,
                                                    'field_name'  => 'menu-item-megamenu-button-text-color-hover['.$item_id.']',
                                                    'type'        => 'colorpicker',
                                                    'field_mode'  => 'rgb',
                                                    'field_value' => isset( $item->megamenu_button_text_color_hover ) ? $item->megamenu_button_text_color_hover : '',
                                                    'field_class' => ''
                                                );

                                                call_user_func( 'ot_type_' . $field_settings['type'], $field_settings );

                                            ?>
                                            
                                            <h5><?php esc_html_e( 'Background Color', 'unite' ); ?></h5>
                                                
                                            <?php
                                                
                                                $field_settings = array(
                                                    'field_id'    => 'edit-menu-item-megamenu-button-background-color-' . $item_id,
                                                    'field_name'  => 'menu-item-megamenu-button-background-color['.$item_id.']',
                                                    'type'        => 'colorpicker',
                                                    'field_mode'  => 'rgb',
                                                    'field_value' => isset( $item->megamenu_button_background_color ) ? $item->megamenu_button_background_color : '',
                                                    'field_class' => ''
                                                );

                                                call_user_func( 'ot_type_' . $field_settings['type'], $field_settings );

                                            ?>
                                            
                                            <h5><?php esc_html_e( 'Background Hover Color', 'unite' ); ?></h5>
                                                
                                            <?php
            
                                                $field_settings = array(
                                                    'field_id'    => 'edit-menu-item-megamenu-button-background-color-hover-' . $item_id,
                                                    'field_name'  => 'menu-item-megamenu-button-background-color-hover['.$item_id.']',
                                                    'type'        => 'colorpicker',
                                                    'field_mode'  => 'rgb',
                                                    'field_value' => isset( $item->megamenu_button_background_color_hover ) ? $item->megamenu_button_background_color_hover : '',
                                                    'field_class' => ''
                                                );

                                                call_user_func( 'ot_type_' . $field_settings['type'], $field_settings );

                                            ?>
                                            
                                            <h5><?php esc_html_e( 'Activate Border Radius', 'unite' ); ?></h5>
                                                
                                            <?php
            
                                                $field_settings = array(
                                                    'field_id'     => 'edit-menu-item-megamenu-button-border-radius-' . $item_id,
                                                    'field_name'   => 'menu-item-megamenu-button-border-radius['.$item_id.']',
                                                    'type'         => 'select',
                                                    'field_choices'=> array(
                                                        array(
                                                            'value' => 'off',
                                                            'label' => 'no, thanks!'
                                                        ),
                                                        array(
                                                            'value' => 'on',
                                                            'label' => 'yes, please!'
                                                        ),
                                                        
                                                    ),
                                                    'field_value' => isset( $item->megamenu_button_border_radius ) ? $item->megamenu_button_border_radius : '',
                                                    'field_class' => ''
                                                );

                                                call_user_func( 'ot_type_' . $field_settings['type'], $field_settings );

                                            ?>                                            
                                        
                                        </div>
                                    
                                    </div>
                                    
                                </div>                                
                            
                            </div>
                    
                        <?php endif; ?>
                    
                    <?php /* New fields insertion ends here */ ?> 
                    
                    <div class="menu-item-actions description-wide submitbox">
                        <?php if ( 'custom' != $item->type && $original_title !== false ) : ?>
                            <p class="link-to-original">
                                <?php printf( __('Original: %s' , 'unite' ), '<a href="' . esc_attr( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
                            </p>
                        <?php endif; ?>
                        <a class="item-delete submitdelete deletion" id="delete-<?php echo $item_id; ?>" href="<?php
                        echo wp_nonce_url(
                            add_query_arg(
                                array(
                                    'action' => 'delete-menu-item',
                                    'menu-item' => $item_id,
                                ),
                                admin_url( 'nav-menus.php' )
                            ),
                            'delete-menu_item_' . $item_id
                        ); ?>"><?php _e( 'Remove', 'unite' ); ?></a> <span class="meta-sep hide-if-no-js"> | </span> <a class="item-cancel submitcancel hide-if-no-js" id="cancel-<?php echo $item_id; ?>" href="<?php echo esc_url( add_query_arg( array( 'edit-menu-item' => $item_id, 'cancel' => time() ), admin_url( 'nav-menus.php' ) ) );
                            ?>#menu-item-settings-<?php echo $item_id; ?>"><?php _e('Cancel', 'unite'); ?></a>
                    </div>

                    <input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo $item_id; ?>]" value="<?php echo $item_id; ?>" />
                    <input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />
                    <input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->object ); ?>" />
                    <input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />
                    <input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />
                    <input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->type ); ?>" />
                </div><!-- .menu-item-settings-->
                <ul class="menu-item-transport"></ul>
            <?php
            $output .= ob_get_clean();
            
            
            
        }       
        
        
    }

endif;