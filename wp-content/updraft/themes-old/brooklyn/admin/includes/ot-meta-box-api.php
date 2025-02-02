<?php
if ( !defined( 'OT_VERSION' ) )exit( 'No direct script access allowed' );

if ( !class_exists( 'OT_Meta_Box' ) ) {

    class OT_Meta_Box {

        /**
         * meta box settings array 
         */

        private $meta_box;

        /** 
         * site type
         */

        private $site_type = '';

        /** 
         * panel list
         */

        private $panel_list_open = false;

        /** 
         * one page supported options 
         */

        private $one_page_supported = array();

        /** 
         * one page unsupported options 
         */

        private $one_page_not_supported = array();

        /**
         * This method adds other methods of the class to specific hooks within WordPress.
         *
         * @uses      add_action()
         *
         * @return    void
         *
         * @access    public
         * @since     1.0
         */

        function __construct( $meta_box ) {

            if ( !is_admin() ) {
                return;
            }

            /* no boxes for front and posts page */
            if ( ( isset( $_GET[ 'post' ] ) && $_GET[ 'post' ] == get_option( 'page_on_front' ) && ot_get_option( 'ut_site_layout', 'onepage' ) == 'onepage' ) || isset( $_GET[ 'post' ] ) && $_GET[ 'post' ] == get_option( 'page_for_posts' ) && ot_get_option( 'ut_site_layout', 'onepage' ) == 'onepage' ) {
                return;
            }

            $this->meta_box = $meta_box;
            $this->site_type = ot_get_option( 'ut_site_layout', 'onepage' );

            add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
            add_action( 'save_post', array( $this, 'save_meta_box' ), 1, 2 );


            /* necessary scripts and styles */
            add_action( 'admin_print_styles-post.php', array( & $this, 'register_settings_styles' ) );
            add_action( 'admin_print_styles-post-new.php', array( & $this, 'register_settings_styles' ) );

            $this->one_page_supported = array(
                'ut-section-settings',
                'ut-section-parallax-settings',
                'ut-section-video-settings',
                'ut-section-overlay-settings'
            );

            $this->one_page_not_supported = array(
                'ut-portfolio-details',
                'ut-hero-type',
                'ut-hero-settings',
                'ut-hero-content-color-settings',
                'ut-hero-content-custom-html-settings',
                'ut-hero-content-caption-slogan-settings',
                'ut-hero-content-caption-title-settings',
                'ut-hero-content-caption-description-settings',
                'ut-hero-content-button-settings',
                'ut-hero-styling',
                'ut-page-settings',
                'ut-contact-section',
                'ut-navigation-section'
            );

        }

        public function register_settings_styles() {

            global $post_ID;

            /* custom css files */
            wp_enqueue_style(
                'ut-metapanel-styles',
                THEME_WEB_ROOT . '/admin/assets/css/ut.metapanel.css'
            );

            /* deprecated js files */
            wp_enqueue_script(
                'ut-deprecated-scripts',
                THEME_WEB_ROOT . '/admin/assets/js/ut.deprecated.js'
            );

            /* custom js files */
            wp_enqueue_script(
                'ut-metapanel-scripts',
                THEME_WEB_ROOT . '/admin/assets/js/ut.metapanel.js',
                array(),
                false,
                true
            );

            $popup_vars = array(
                'pop_url' => THEME_WEB_ROOT . '/admin/',
                'site_type' => ot_get_option( 'ut_site_layout', 'onepage' ),
                'permalink' => get_permalink( $post_ID ),
                'navmenu' => admin_url( 'nav-menus.php' )
            );

            if ( get_post_type( $post_ID ) == 'portfolio' ) {
                $popup_vars[ 'post_type' ] = get_post_type( $post_ID );
            }

            wp_localize_script(
                'ut-metapanel-scripts',
                'ut_meta_panel_vars',
                $popup_vars
            );

        }

        /**
         * Adds meta box to any post type
         *
         * @uses      add_meta_box()
         *
         * @return    void
         *
         * @access    public
         * @since     1.0
         */

        function add_meta_boxes() {

            foreach ( ( array )$this->meta_box[ 'pages' ] as $page ) {

                add_meta_box(
                    $this->meta_box[ 'id' ],
                    $this->meta_box[ 'title' ],
                    array( $this, 'build_meta_box' ),
                    $page,
                    $this->meta_box[ 'context' ],
                    $this->meta_box[ 'priority' ],
                    $this->meta_box[ 'fields' ]
                );

            }

        }


        function get_showcase_setting() {

            global $post_ID;

            if ( get_post_type( $post_ID ) == 'portfolio' ) {

                $ut_detail_source = '';
                $ut_detail_style = false;

                /* get current categories */
                $current_categories = wp_get_object_terms( $post_ID, 'portfolio-category' );

                $showcases = get_posts( array(
                    'posts_per_page' => -1,
                    'post_type' => 'portfolio-manager',
                ) );

                if ( !empty( $showcases ) && is_array( $showcases ) && !empty( $current_categories ) ) {

                    foreach ( $showcases as $showcase ) {

                        $showcase_categories = '';

                        /* get used categories */
                        $showcase_categories = get_post_meta( $showcase->ID, 'ut_portfolio_categories', true );

                        foreach ( $current_categories as $category ) {

                            /* we have a match */
                            if ( !empty( $showcase_categories ) && is_array( $showcase_categories ) && array_key_exists( $category->term_id, $showcase_categories ) ) {

                                $portfolio_settings = get_post_meta( $showcase->ID, 'ut_portfolio_settings', true );

                                $ut_detail_source = $showcase->post_title;
                                $ut_detail_style = !empty( $portfolio_settings[ 'detail_style' ] ) ? $portfolio_settings[ 'detail_style' ] : false;

                            }

                        }

                    }

                }

                return 'data-detailstyle="' . esc_attr( $ut_detail_style ) . '"';

            }

        }



        /**
         * Prepare Option Args
         *
         * @return    string
         *
         * @access    public
         * @since     4.0
         */

        function prepare_option_args( $field, $field_value, $post_ID ) {

            return array(
                'type' => $field[ 'type' ],
                'field_id' => $field[ 'id' ],
                'field_name' => $field[ 'id' ],
                'field_toplevel' => isset( $field[ 'toplevel' ] ) && $field[ 'toplevel' ] ? $field[ 'toplevel' ] : '',
                'field_list_title' => isset( $field[ 'list_title' ] ) && !$field[ 'list_title' ] ? false : true,
                'field_value' => $field_value,
                'field_global' => isset( $field[ 'global' ] ) ? $field[ 'global' ] : '',
                'field_prefix' => isset( $field[ 'prefix' ] ) ? $field[ 'prefix' ] : 'ut_page_',
                'field_desc' => isset( $field[ 'desc' ] ) ? $field[ 'desc' ] : '',
                'field_label' => isset( $field[ 'label' ] ) ? $field[ 'label' ] : '',
                'field_htmldesc' => isset( $field[ 'htmldesc' ] ) ? $field[ 'htmldesc' ] : '',
                'field_std' => isset( $field[ 'std' ] ) ? $field[ 'std' ] : '',
                'field_rows' => isset( $field[ 'rows' ] ) && !empty( $field[ 'rows' ] ) ? $field[ 'rows' ] : 10,
                'field_post_type' => isset( $field[ 'post_type' ] ) && !empty( $field[ 'post_type' ] ) ? $field[ 'post_type' ] : 'post',
                'field_taxonomy' => isset( $field[ 'taxonomy' ] ) && !empty( $field[ 'taxonomy' ] ) ? $field[ 'taxonomy' ] : 'category',
                'field_min_max_step' => isset( $field[ 'min_max_step' ] ) && !empty( $field[ 'min_max_step' ] ) ? $field[ 'min_max_step' ] : '0,100,1',
                'field_class' => isset( $field[ 'class' ] ) ? $field[ 'class' ] : '',
                'field_choices' => isset( $field[ 'choices' ] ) ? $field[ 'choices' ] : array(),
                'field_settings' => isset( $field[ 'settings' ] ) && !empty( $field[ 'settings' ] ) ? $field[ 'settings' ] : array(),
                'field_mode' => !empty( $field[ 'mode' ] ) ? $field[ 'mode' ] : 'hex',
                'field_markup' => !empty( $field[ 'markup' ] ) ? $field[ 'markup' ] : '12_12',
                'post_id' => $post_ID,
                'meta' => true
            );

        }

        /**
         * Simple Metabox
         *
         * @return    string
         *
         * @access    public
         * @since     4.2
         */
        function build_simple_meta_box( $post, $metabox ) {
            
            $nonce = wp_create_nonce( 'ut-global-flag-nonce' );

            /* loop through meta box fields */
            foreach ( $this->meta_box[ 'fields' ] as $field ) {
                
                $classes = array();
                $section_classes = '';
                
                /* get current post meta data */
                $field_value = get_post_meta( $post->ID, $field[ 'id' ], true );

                /* set standard value */
                if ( isset( $field[ 'std' ] ) ) {
                    $field_value = ot_filter_std_value( $field_value, $field[ 'std' ] );
                }

                /* build the arguments array */
                $_args = $this->prepare_option_args( $field, $field_value, $post->ID );

                // flag for custom value
                $custom_value = false;

                if ( isset( $_args[ 'field_global' ] ) && $_args[ 'field_global' ] == 'on' ) {

                    $custom_value = get_post_meta( $post->ID, $_args[ 'field_id' ] . '_global_overwrite', true );
                    $classes[] = $custom_value ? 'ut-custom-active' : 'ut-global-active';
                    $section_classes = ' ut-has-overlay';
                }

                echo '<div id="setting_', $_args[ 'field_id' ], '" class="ut-panel-section ', implode( ' ', $classes ), '">';

                if ( isset( $_args[ 'field_global' ] ) && $_args[ 'field_global' ] == 'on' ) {

                    echo '<div class="ut-switch ut-switch-for-globals" data-on="', esc_html( 'custom', 'unitedthemes' ), '" data-off="', esc_html( 'global', 'unitedthemes' ), '">';

                    echo '<input data-option="' . $_args[ 'field_id' ] . '" id="' . $_args[ 'field_id' ] . '_global_overwrite" data-nonce="' . esc_attr( $nonce ) . '" data-post="' . esc_attr( $post->ID ) . '" name="' . $_args[ 'field_id' ] . '_global_overwrite" type="checkbox" ', ( isset( $custom_value ) ? checked( true, $custom_value ) : '' ), ' />';
                    echo '<label for="', esc_attr( $_args[ 'field_id' ] ), '_global_overwrite"></label>';

                    echo '</div>';

                }

                echo '<h3 class="ut-single-option-title">';

                echo $field[ 'label' ];

                echo '</h3>';

                if ( !empty( $field[ 'desc' ] ) ) {

                    echo '<p>' . $field[ 'desc' ] . '</p>';

                }

                echo '<div class="' . $section_classes . '">';

                $overlay_state = '';

                if ( isset( $_args[ 'field_global' ] ) && $_args[ 'field_global' ] == 'on' && !$custom_value ) {

                    // show overlay
                    $overlay_state = 'show';

                    // parse theme default into metabox if global is active
                    $theme_options_value = str_replace( $_args[ 'field_prefix' ], 'ut_global_', $_args[ 'field_id' ] );
                    $_args[ 'field_value' ] = ot_get_option( $theme_options_value );

                }

                echo '<div id="switch_overlay_', $_args[ 'field_id' ], '" class="ut-global-switch-overlay ', $overlay_state, '"></div>';

                /* field output */
                echo ot_display_by_type( $_args );

                echo '</div>';

                echo '</div>';

            }

        }

        /**
         * Build Meta Box Tabs Menu
         *
         * @return    string
         *
         * @access    public
         * @since     4.2
         */

        function build_meta_box_menu( $sections, $class = '' ) {

            global $post_ID;

            echo '<ul class="ui-tabs-nav ui-widget-header ' . $class . '">';

            foreach ( $sections as $section ) {

                $attributes = array();

                $dependency = !empty( $section[ 'required' ] ) ? $section[ 'required' ] : '';

                /**
                 * Strip or add menu items
                 */

                if ( ot_get_option( 'ut_site_layout', 'onepage' ) == 'onepage' && get_post_meta( $post_ID, 'ut_page_type', true ) == 'section' ) {

                    /* options - which are not supported by sections */
                    if ( in_array( $section[ 'id' ], $this->one_page_not_supported ) ) {

                        continue;

                    }

                } else {

                    /* special one page options - gets stripped for all regular metaboxes */
                    if ( in_array( $section[ 'id' ], $this->one_page_supported ) ) {

                        continue;

                    }

                }


                if ( get_post_type( $post_ID ) != 'portfolio' && $section[ 'id' ] == 'ut-portfolio-details' ) {

                    continue;

                }



                if ( isset( $section[ 'data' ] ) ) {

                    foreach ( $section[ 'data' ] as $dkey => $data ) {

                        $attributes[] = 'data-' . $dkey . '="' . esc_attr( $data ) . '"';

                    }

                }


                echo '<li class="' . esc_attr( $section[ 'id' ] ) . '" ' . ut_create_dependency( $dependency ) . ' ' . implode( ' ', $attributes ) . '>';

                echo '<a href="#' . esc_attr( $section[ 'id' ] ) . '">' . $section[ 'title' ] . '</a>';

                echo '</li>';

            }

            echo '</ul>';

        }



        function meta_box_option( $post, $field ) {

            /* field is not supporting this post type */
            if ( !isset( $field[ 'pages' ] ) || !in_array( get_post_type( $post->ID ), $field[ 'pages' ] ) ) {
                return;
            }

            /* inject meta panel */
            if ( get_post_type( $post->ID ) == 'portfolio' ) {

                /* options to skip */
                $option_to_skip = array(
                    'ut_page_type'
                );

                if ( in_array( $field[ 'id' ], $option_to_skip ) ) {
                    return;
                }

                /* options to inject */
                $option_to_inject = array(
                    'ut_page_hero_style' => 'ut_portfolio_hero_style',
                    'ut_page_hero_align' => 'ut_portfolio_caption_align',
                    'ut_section_slogan' => 'ut_page_slogan'
                );

                if ( array_key_exists( $field[ 'id' ], $option_to_inject ) ) {
                    /* overwrite field ID */
                    $field[ 'id' ] = $option_to_inject[ $field[ 'id' ] ];
                }

            }

            /* get current post meta data */
            $field_value = get_post_meta( $post->ID, $field[ 'id' ], true );
            $all_meta = get_post_meta( $post->ID );
            
            /* set standard value */
            if ( isset( $field[ 'std' ] ) ) {
                
                $field_value = ot_filter_meta_std_value( $field_value, $field[ 'std' ], $field['id'], $all_meta, $field['type'] );
                
            }

            /* build the arguments array */
            $_args = $this->prepare_option_args( $field, $field_value, $post->ID );

            /* extra classes */
            $classes = array();
            $classes[] = 'grid-100 grid-parent ut-panel-section';
            $classes[] = !empty( $field[ "section_class" ] ) ? $field[ "section_class" ] : '';

            /* field dependency */
            $dependency = !empty( $field[ 'required' ] ) ? $field[ 'required' ] : '';

            /* section field sizes */
            $section_classes = 'grid-50 tablet-grid-100 mobile-grid-100';

            if ( isset( $field[ 'markup' ] ) && $field[ 'markup' ] == '1_1' ) {

                $section_classes = 'grid-100 tablet-grid-100 mobile-grid-100 ut-panel-description-full';

            }

            if ( $field[ 'type' ] == 'panel_headline' ) {

                echo '<div id="setting_' . esc_attr( $_args[ 'field_id' ] ) . '" class="ut-panel-headline" ' . ut_create_dependency( $dependency ) . '>';

                echo ot_display_by_type( $_args );

                echo '</div>';

            } elseif ( $field[ 'type' ] == 'section_headline' ) {

                if ( $this->panel_list_open ) {

                    echo '</ul>';

                    $this->panel_list_open = false;

                }

                echo '<div id="setting_' . esc_attr( $_args[ 'field_id' ] ) . '" class="ut-section-headline" ' . ut_create_dependency( $dependency ) . '>';

                echo ot_display_by_type( $_args );

                echo '</div>';

            } else if ( $field[ 'type' ] == 'sub_section_headline' ) {

                if ( $this->panel_list_open ) {

                    echo '</ul>';

                    $this->panel_list_open = false;

                }

                echo '<div id="setting_' . esc_attr( $_args[ 'field_id' ] ) . '" class="ut-section-sub-headline" ' . ut_create_dependency( $dependency ) . '>';

                echo ot_display_by_type( $_args );

                echo '</div>';

            } else if ( $field[ 'type' ] == 'section_headline_info' ) {

                echo '<div id="setting_' . esc_attr( $_args[ 'field_id' ] ) . '" class="ut-panel-infoheadline" ' . ut_create_dependency( $dependency ) . '>';

                echo ot_display_by_type( $_args );

                echo '</div>';

            } else {

                if ( !$this->panel_list_open ) {

                    echo '<ul class="ut-panel-list">';

                    $this->panel_list_open = true;

                }

                echo '<li ' . ut_create_dependency( $dependency ) . '>';

                echo '<div id="setting_' . $_args[ 'field_id' ] . '" class="' . implode( ' ', $classes ) . '" ' . ( $_args[ 'field_id' ] == 'ut_portfolio_link_type' ? $this->get_showcase_setting() : '' ) . '>';

                echo '<div class="grid-100 tablet-grid-100 mobile-grid-100">';

                echo '<h3 class="ut-single-option-title">';

                echo $field[ 'label' ];

                echo '</h3>';

                echo '</div>';

                echo '<div class="' . $section_classes . '">';

                    echo '<div class="ut-panel-description">';

                        if ( isset( $field[ 'desc' ] ) ) {

                            echo htmlspecialchars_decode( $field[ 'desc' ] );

                        }

                        echo '</div>';

                    echo '</div>';

                    echo '<div class="' . $section_classes . '">';

                        echo ot_display_by_type( $_args );

                    echo '</div>';

                echo '</div>';

                echo '</li>';

            }

        }


        /**
         * Meta box view
         *
         * @return    string
         *
         * @access    public
         * @since     1.0
         */
        function build_meta_box( $post, $metabox ) {

            global $post_ID;
                        
            // old panel migration
            $this->meta_panel_migration( $post_ID );
            
            /* Use nonce for verification */
            echo '<input type="hidden" name="' . $this->meta_box[ 'id' ] . '_nonce" value="' . wp_create_nonce( $this->meta_box[ 'id' ] ) . '" />';

            /* meta box description */
            echo isset( $this->meta_box[ 'desc' ] ) && !empty( $this->meta_box[ 'desc' ] ) ? '<div class="ut-metabox-description">' . htmlspecialchars_decode( $this->meta_box[ 'desc' ] ) . '</div>': '';

            /* simple metabox or metabox with tabs */
            if ( isset( $this->meta_box[ 'type' ] ) && $this->meta_box[ 'type' ] == 'simple' || !isset( $this->meta_box[ 'type' ] ) ) {

                echo '<div id="ut-admin-wrap" class="ut-metabox-wrap ut-metabox-wrap-simple clearfix">';

                echo $this->build_simple_meta_box( $post, $metabox );

            } else {

                /* page section switch for one pages */
                if ( ot_get_option( 'ut_site_layout', 'onepage' ) == 'onepage' && get_post_type( $post_ID ) == 'page' ) {

                    echo '<div id="ut-option-switch-wrap">';

                        echo '<div id="ut-option-switch"></div>';

                        echo '<span class="ut-dash-fa-demo hide-on-mobile"><i class="fa fa-cogs" aria-hidden="true"></i></span>';

                    echo '</div>';

                }

                echo '<div id="ut-admin-wrap" class="ut-metabox-wrap clearfix">';

                echo '<div id="ut-metabox-tabs" class="ui-tabs">';

                /* build metabox menu */
                $this->build_meta_box_menu( $this->meta_box[ 'sections' ], 'ui-tabs-nav-outer' );

                /* build metabox container */
                foreach ( $this->meta_box[ 'sections' ] as $section ) {

                    /**
                     * Strip or add menu items
                     */

                    if ( ot_get_option( 'ut_site_layout', 'onepage' ) == 'onepage' && get_post_meta( $post_ID, 'ut_page_type', true ) == 'section' ) {

                        /* options - which are not supported by sections */
                        if ( in_array( $section[ 'id' ], $this->one_page_not_supported ) ) {

                            continue;

                        }

                    } else {

                        /* special one page options - gets stripped for all regular metaboxes */
                        if ( in_array( $section[ 'id' ], $this->one_page_supported ) ) {

                            continue;

                        }

                    }

                    echo '<div id="' . esc_attr( $section[ 'id' ] ) . '" class="ui-tabs-panel ui-tabs-panel-outer ' . ( isset( $section[ 'subsection' ] ) ? 'ui-has-inner-tabs' : '' ) . ' clearfix">';

                    if ( isset( $section[ 'subsection' ] ) ) {

                        $this->build_meta_box_menu( $section[ 'subsection' ], 'ui-tabs-nav-inner' );

                        foreach ( $section[ 'subsection' ] as $subsection ) {

                            /**
                             * Strip or add menu items
                             */

                            if ( ot_get_option( 'ut_site_layout', 'onepage' ) == 'onepage' && get_post_meta( $post_ID, 'ut_page_type', true ) == 'section' ) {

                                /* options - which are not supported by sections */
                                if ( in_array( $subsection[ 'id' ], $this->one_page_not_supported ) ) {

                                    continue;

                                }

                            } else {

                                /* special one page options - gets stripped for all regular metaboxes */
                                if ( in_array( $subsection[ 'id' ], $this->one_page_supported ) ) {

                                    continue;

                                }

                            }

                            echo '<div id="' . esc_attr( $subsection[ 'id' ] ) . '" class="ui-tabs-panel ui-tabs-panel-inner clearfix">';

                            foreach ( $this->meta_box[ 'fields' ] as $field ) {

                                /* next item */
                                if ( isset( $field[ 'metapanel' ] ) && $field[ 'metapanel' ] != $subsection[ 'id' ] ) {
                                    continue;
                                }

                                /* create field */
                                $this->meta_box_option( $post, $field );

                            }

                            if ( $this->panel_list_open ) {

                                echo '</ul>';

                                $this->panel_list_open = false;

                            }

                            echo '</div>';

                        }

                    } else {

                        /* loop through field which are part of this container */
                        foreach ( $this->meta_box[ 'fields' ] as $field ) {

                            /* next item */
                            if ( isset( $field[ 'metapanel' ] ) && $field[ 'metapanel' ] != $section[ 'id' ] ) {
                                continue;
                            }

                            /* create field */
                            $this->meta_box_option( $post, $field );

                        }

                        if ( $this->panel_list_open ) {

                            echo '</ul>';

                            $this->panel_list_open = false;

                        }

                    }

                    echo '</div>';

                }

            }

            echo '</div>';

        }

        public function get_page_menu_id( $object_id = NULL ) {

            $theme_locations = get_nav_menu_locations();

            if ( empty( $theme_locations[ 'primary' ] ) ) {
                return false;
            }

            $menu_objects = get_term( $theme_locations[ 'primary' ], 'nav_menu' );
            $menu_id = $menu_objects->term_id;
            $menu_object = wp_get_nav_menu_items( $menu_id );

            /* no menu, leave here  */
            if ( !$menu_object ) {
                return false;
            }

            foreach ( ( array )$menu_object as $key => $menu_item ) {

                if ( $menu_item->object_id == $object_id ) {

                    return $menu_item->ID;
                    break;

                }

            }

            return false;

        }

        
        
        /**
         * Meta Panel Option Migration
         *
         * @return    void
         *
         * @access    public
         * @since     4.4
         */
        
        public function meta_panel_migration( $post_ID ) {
            
            $meta = get_post_meta( $post_ID );
            
            // check if there is a global 
            if( array_key_exists( 'ut_page_hero_global_style', $meta ) ) {
                
                $value = get_post_meta( $post_ID, 'ut_page_hero_global_style', true );
                
                if( $value ) {
                    
                    // single options
                    update_post_meta( $post_ID, 'ut_page_hero_style_global_overwrite', $value );
                    update_post_meta( $post_ID, 'ut_page_hero_font_style_global_overwrite', $value );
                    update_post_meta( $post_ID, 'ut_page_hero_width_global_overwrite', $value );
                    update_post_meta( $post_ID, 'ut_page_hero_align_global_overwrite', $value );
                    
                    // option groups
                    update_post_meta( $post_ID, 'ut_page_hero_overlay_global_overwrite', $value );
                    update_post_meta( $post_ID, 'ut_page_hero_overlay_effect_global_overwrite', $value );
                    update_post_meta( $post_ID, 'ut_page_hero_border_bottom_global_overwrite', $value );
                    update_post_meta( $post_ID, 'ut_page_hero_fancy_border_global_overwrite', $value ); 
                    
                    delete_post_meta( $post_ID, 'ut_page_hero_global_style');
                    
                }
                
            }
            
        }        
        
        
        /**
         * Set Global Flag
         *
         * @return    void
         *
         * @access    public
         * @since     4.4
         */
        
        public function set_global_flag() {

            /* get nonce */
            $nonce = $_POST[ 'nonce' ];

            /* check if nonce is set and correct */
            if ( !wp_verify_nonce( $nonce, 'ut-global-flag-nonce' ) ) {
                die( 'Busted!' );
            }

            if ( current_user_can( 'manage_options' ) ) {

                $ID = isset( $_POST[ 'post' ] ) ? ( int )$_POST[ 'post' ] : '';
                $option = sanitize_text_field( $_POST[ 'option' ] );
                $value = sanitize_text_field( $_POST[ 'value' ] );
                $value = ( $value === 'on' ) ? true : false;

                if ( $value ) {

                    update_post_meta( $ID, $option, $value );

                } else {

                    delete_post_meta( $ID, $option );

                }

            }

        }

        /**
         * Saves the meta box values
         *
         * @return    void
         *
         * @access    public
         * @since     1.0
         */
        function save_meta_box( $post_id, $post_object ) {
            global $pagenow;

            /* don't save if $_POST is empty */
            if ( empty( $_POST ) )
                return $post_id;

            /* don't save during quick edit */
            if ( $pagenow == 'admin-ajax.php' )
                return $post_id;

            /* don't save during autosave */
            if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
                return $post_id;

            /* don't save if viewing a revision */
            if ( $post_object->post_type == 'revision' || $pagenow == 'revision.php' )
                return $post_id;

            /* verify nonce */
            if ( isset( $_POST[ $this->meta_box[ 'id' ] . '_nonce' ] ) && !wp_verify_nonce( $_POST[ $this->meta_box[ 'id' ] . '_nonce' ], $this->meta_box[ 'id' ] ) )
                return $post_id;

            /* check permissions */
            if ( isset( $_POST[ 'post_type' ] ) && 'page' == $_POST[ 'post_type' ] ) {
                if ( !current_user_can( 'edit_page', $post_id ) )
                    return $post_id;
            } else {
                if ( !current_user_can( 'edit_post', $post_id ) )
                    return $post_id;
            }

            foreach ( $this->meta_box[ 'fields' ] as $field ) {

                $old = get_post_meta( $post_id, $field[ 'id' ], true );
                $new = '';

                /* there is data to validate */
                if ( isset( $_POST[ $field[ 'id' ] ] ) ) {

                    /* slider and list item */
                    if ( in_array( $field[ 'type' ], array( 'list-item', 'slider' ) ) ) {

                        /* required title setting */
                        $required_setting = array(
                            array(
                                'id' => 'title',
                                'label' => __( 'Title', 'option-tree' ),
                                'desc' => '',
                                'std' => '',
                                'type' => 'text',
                                'rows' => '',
                                'class' => 'option-tree-setting-title',
                                'post_type' => '',
                                'choices' => array()
                            )
                        );

                        /* get the settings array */
                        $settings = isset( $_POST[ $field[ 'id' ] . '_settings_array' ] ) ? unserialize( ot_decode( $_POST[ $field[ 'id' ] . '_settings_array' ] ) ) : array();

                        /* settings are empty for some odd ass reason get the defaults */
                        if ( empty( $settings ) ) {
                            $settings = 'slider' == $field[ 'type' ] ?
                                ot_slider_settings( $field[ 'id' ] ) :
                                ot_list_item_settings( $field[ 'id' ] );
                        }

                        /* merge the two settings array */
                        $settings = array_merge( $required_setting, $settings );

                        foreach ( $_POST[ $field[ 'id' ] ] as $k => $setting_array ) {

                            foreach ( $settings as $sub_setting ) {

                                /* verify sub setting has a type & value */
                                if ( isset( $sub_setting[ 'type' ] ) && isset( $_POST[ $field[ 'id' ] ][ $k ][ $sub_setting[ 'id' ] ] ) ) {

                                    $_POST[ $field[ 'id' ] ][ $k ][ $sub_setting[ 'id' ] ] = ot_validate_setting( $_POST[ $field[ 'id' ] ][ $k ][ $sub_setting[ 'id' ] ], $sub_setting[ 'type' ], $sub_setting[ 'id' ] );

                                }

                            }

                        }

                        /* set up new data with validated data */
                        $new = $_POST[ $field[ 'id' ] ];

                    } else {

                        /* run through validattion */
                        $new = ot_validate_setting( $_POST[ $field[ 'id' ] ], $field[ 'type' ], $field[ 'id' ] );

                    }

                }

                /* check if current post is in menu */
                if ( $field[ 'id' ] == 'ut_page_type' ) {

                    $in_menu = $this->get_page_menu_id( $post_id );

                    if ( $in_menu && get_post_type( $post_id ) == 'page' ) {

                        update_post_meta( $in_menu, '_menu_item_menutype', $new );

                    }

                }

                if ( isset( $new ) && $new !== $old ) {
                    update_post_meta( $post_id, $field[ 'id' ], $new );
                } else if ( '' == $new && $old ) {
                    delete_post_meta( $post_id, $field[ 'id' ], $old );
                }
            }

        }

    }

}

/**
 * This method instantiates the meta box class & builds the UI.
 *
 * @uses     OT_Meta_Box()
 *
 * @param    array    Array of arguments to create a meta box
 * @return   void
 *
 * @access   public
 * @since    2.0
 */
if ( !function_exists( 'ot_register_meta_box' ) ) {

    function ot_register_meta_box( $args ) {

        if ( !$args ) {

            return;

        }

        $ot_meta_box = new OT_Meta_Box( $args );
        add_action( 'wp_ajax_set_global_flag'    , array( $ot_meta_box, 'set_global_flag' ) );

    }

}