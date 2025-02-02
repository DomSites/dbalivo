<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
	}

    // This is your option name where all the Redux data is stored.
    $opt_name = 'nm_theme_options';
	

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // NM: Disable tracking
		'disable_tracking' => true,
		// TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
		'menu_title'			=> __( 'Theme Settings', 'nm-framework-admin' ),
		'page_title'			=> __( 'Theme Settings', 'nm-framework-admin' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => 'AIzaSyAX_2L_UzCDPEnAHTG7zhESRVpMPS4ssII',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => false,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        'forced_dev_mode_off'  => true,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => false,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        'footer_credit'     => '&nbsp;',
		// Footer credit text

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
		'system_info'          => false,
        // REMOVE

        //'compiler'             => true,
		
        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                )
            )
        )
    );
	
    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */
	
	
    /*
     *
     * ---> START SECTIONS
     *
     */
	
	Redux::setSection( $opt_name, array(
		'title'		=> __( 'General', 'nm-framework-admin' ),
		'icon'		=> 'el-icon-cog',
		'fields'	=> array(
            array(
				'id' 		=> 'full_width_layout',
				'type' 		=> 'switch', 
				'title' 	=> __( 'Full Width Layout', 'nm-framework-admin' ),
				'desc'		=> __( 'Display full-width page layout.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on' 		=> 'Enable',
				'off' 		=> 'Disable'
			),
			array(
				'id' 		=> 'page_load_transition',
				'type' 		=> 'switch', 
				'title' 	=> __( 'Page Load Transition', 'nm-framework-admin' ),
				'desc'		=> __( 'Page load transition animation.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on' 		=> 'Enable',
				'off' 		=> 'Disable'
			),
            array(
				'id' 	=> 'favicon',
				'type' 	=> 'media', 
				'title'	=> __( 'Favicon', 'nm-framework-admin' ),
				'desc'	=> __( 'Upload a .ico/.png image to display as your favicon.', 'nm-framework-admin' )
			),
            array(
				'id'		=> 'custom_wp_gallery',
				'type'		=> 'switch', 
				'title'		=> __( 'WordPress Gallery - Custom Slider', 'nm-framework-admin' ),
				'desc'		=> __( 'Replace the default WordPress gallery with a custom image slider.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> 'Enable',
				'off'		=> 'Disable'
			),
            array(
				'id'		=> 'wp_gallery_popup',
				'type'		=> 'switch', 
				'title'		=> __( 'WordPress Gallery - Popup', 'nm-framework-admin' ),
				'desc'		=> __( 'Modal popup for WordPress Gallery.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> 'Enable',
				'off'		=> 'Disable',
                'required'	=> array( 'custom_wp_gallery', '=', '0' )
			),
			array(
				'id' 		=> 'font_awesome',
				'type' 		=> 'switch', 
				'title' 	=> __( 'Font Awesome', 'nm-framework-admin' ),
				'desc'		=> __( 'Include the <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Font Awesome</a> icon library (uses the Bootstrap CDN).', 'nm-framework-admin' ),
				'default'	=> 0,
				'on' 		=> 'Enable',
				'off' 		=> 'Disable'
			),
			array(
				'id' 		=> 'wp_admin_bar',
				'type' 		=> 'switch', 
				'title' 	=> __( 'WordPress Admin Bar', 'nm-framework-admin' ),
				'desc'		=> __( 'Display the front-end WordPress admin bar for logged-in users.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on' 		=> 'Enable',
				'off' 		=> 'Disable'
			),
            array (
				'id'	=> 'vcomp_info',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Visual Composer', 'nm-framework-admin' ) . '</h3>',
			),
            array(
				'id' 		=> 'vcomp_enable_frontend',
				'type' 		=> 'switch', 
				'title' 	=> __( 'Frontend Editor', 'nm-framework-admin' ),
				'desc'		=> __( 'Enable frontend editor for the Visual Composer plugin.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on' 		=> 'Enable',
				'off' 		=> 'Disable'
			),
            array(
				'id' 		=> 'vcomp_stock',
				'type' 		=> 'switch', 
				'title' 	=> __( 'Default Elements', 'nm-framework-admin' ),
				'desc'		=> __( 'Enable additional default elements for the Visual Composer plugin.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on' 		=> 'Enable',
				'off' 		=> 'Disable'
			)
		)
	) );

    Redux::setSection( $opt_name, array(
		'title'		=> __( 'Top Bar', 'nm-framework-admin' ),
		'icon'		=> 'el-icon-minus',
		'fields'	=> array(
			array(
				'id' 		=> 'top_bar',
				'type' 		=> 'switch', 
				'title' 	=> __( 'Top Bar', 'nm-framework-admin' ),
				'desc'		=> __( 'Display the top-bar.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on' 		=> 'Enable',
				'off' 		=> 'Disable'
			),
			array(
				'id' 		=> 'top_bar_text',
				'type' 		=> 'editor',
				'title' 	=> __( 'Text', 'nm-framework-admin' ),
				'desc' 		=> __( 'Enter the top-bar text.', 'nm-framework-admin' ),
				'default'	=> __( 'Welcome to our shop!', 'nm-framework-admin' ),
				'args'		=> array(
					'wpautop'	=> false,
					'teeny' 	=> true
				),
				'required'	=> array( 'top_bar', '=', '1' )
			),
			array(
				'id'			=> 'top_bar_left_column_size',
				'type'			=> 'slider',
				'title'			=> __( 'Text Column Size', 'nm-framework-admin' ),
				'desc'			=> __( 'Select size-span of top-bar Text column.', 'nm-framework-admin' ),
				'default'		=> 6,
				'min'			=> 1,
				'max'			=> 12,
				'step'			=> 1,
				'display_value'	=> 'text',
				'required'	=> array( 'top_bar', '=', '1' )
			),
			array(
				'id'		=> 'top_bar_social_icons',
				'type'		=> 'select',
				'title'		=> __( 'Social Icons', 'nm-framework-admin' ),
				'desc'		=> __( 'Display social profile icons (from the "Social Profiles" settings tab).', 'nm-framework-admin' ),
				'options'	=> array( '0' => 'None', 'l_c' => 'Display in Text (left) column', 'r_c' => 'Display in Menu (right) column' ),
				'default'	=> '0',
				'required'	=> array( 'top_bar', '=', '1' )
			)
		)
	) );
	
	Redux::setSection( $opt_name, array(
		'title'		=> __( 'Header', 'nm-framework-admin' ),
		'icon'		=> 'el-icon-chevron-up',
		'fields'	=> array(
			array(
				'id' 		=> 'header_layout',
				'type' 		=> 'image_select',
				'title' 	=> __( 'Layout', 'nm-framework-admin' ),
				'desc' 		=> __( 'Select header layout.', 'nm-framework-admin' ),
				'options'	=> array(
					'default' 	        => array( 'alt' => 'Default', 'img' => NM_URI . '/assets/img/option-panel/header-default.png' ),
                    'menu-centered'     => array( 'alt' => 'Centered menu', 'img' => NM_URI . '/assets/img/option-panel/header-menu-centered.png' ),
					'centered'          => array( 'alt' => 'Centered logo', 'img' => NM_URI . '/assets/img/option-panel/header-centered.png' ),
                    'stacked'           => array( 'alt' => 'Stacked', 'img' => NM_URI . '/assets/img/option-panel/header-stacked.png' ),
                    'stacked-centered'  => array( 'alt' => 'Stacked Centered', 'img' => NM_URI . '/assets/img/option-panel/header-stacked-centered.png' )
				),
				'default' 	=> 'centered'
			),
            array(
				'id'		=> 'header_layout_mobile',
				'type'		=> 'select',
				'title' 	=> __( 'Layout - Mobile', 'nm-framework-admin' ),
				'desc'		=> __( 'Select header layout for Mobile screen widths.', 'nm-framework-admin' ),
                'options'	=> array( 'default' => 'Show Cart-count', 'alt' => 'Hide Cart-count and left-align Logo' ),
				'default'	=> 'alt'
			),
			array(
				'id'		=> 'header_fixed',
				'type'		=> 'switch', 
				'title'		=> __( 'Float', 'nm-framework-admin' ),
				'desc'		=> __( 'Float header above page-content when scrolling the page.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> 'Enable',
				'off'		=> 'Disable'
			),
            array(
				'id'		=> 'header_transparency',
				'type'		=> 'select',
				'title' 	=> __( 'Transparency', 'nm-framework-admin' ),
				'desc'		=> __( 'Select page(s) to enable header transparency.', 'nm-framework-admin' ),
				'options'	=> array( '0' => 'Disable', 'home' => 'Home', 'home-shop' => 'Home and Shop' ),
				'default'	=> 'disabled'
			),
            array (
				'id'	=> 'header_info_spacing',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Spacing', 'nm-framework-admin' ) . '</h3>',
			),
            array(
				'id'			=> 'header_spacing_top',
				'type'			=> 'slider',
				'title'			=> __( 'Top', 'nm-framework-admin' ),
				'desc'			=> __( 'Top header spacing.', 'nm-framework-admin'),
				'default'		=> 17,
				'min'			=> 0,
				'max'			=> 250,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
            array(
				'id'			=> 'header_spacing_top_alt',
				'type'			=> 'slider',
				'title'			=> __( 'Top - Float, Tablet & Mobile', 'nm-framework-admin' ),
				'desc'			=> __( 'Top header spacing on Floating-header, Tablet and Mobile.', 'nm-framework-admin'),
				'default'		=> 10,
				'min'			=> 0,
				'max'			=> 250,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
            array(
				'id'			=> 'logo_spacing_bottom',
				'type'			=> 'slider',
				'title'			=> __( 'Logo - Bottom', 'nm-framework-admin' ),
				'desc'			=> __( 'Bottom logo spacing.', 'nm-framework-admin'),
				'default'		=> 0,
				'min'			=> 0,
				'max'			=> 250,
				'step'			=> 1,
				'display_value'	=> 'text',
                'required'		=> array( 'header_layout', 'contains', 'stacked' )
			),
			array(
				'id'			=> 'header_spacing_bottom',
				'type'			=> 'slider',
				'title'			=> __( 'Bottom', 'nm-framework-admin' ),
				'desc'			=> __( 'Bottom header spacing.', 'nm-framework-admin'),
				'default'		=> 17,
				'min'			=> 0,
				'max'			=> 250,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
            array(
				'id'			=> 'header_spacing_bottom_alt',
				'type'			=> 'slider',
				'title'			=> __( 'Bottom - Float, Tablet & Mobile', 'nm-framework-admin' ),
				'desc'			=> __( 'Bottom header spacing on Floating-header, Tablet and Mobile.', 'nm-framework-admin'),
				'default'		=> 10,
				'min'			=> 0,
				'max'			=> 250,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
            array (
				'id'	=> 'header_info_border',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Border', 'nm-framework-admin' ) . '</h3>',
			),
			array(
				'id'		=> 'header_border',
				'type'		=> 'switch', 
				'title'		=> __( 'Border', 'nm-framework-admin' ),
				'desc'		=> __( 'Display a header border.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> 'Enable',
				'off'		=> 'Disable'
			),
			array(
				'id'		=> 'home_header_border',
				'type'		=> 'switch', 
				'title'		=> __( 'Border - Home Page', 'nm-framework-admin' ),
				'desc'		=> __( 'Display a header border on the home page.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> 'Enable',
				'off'		=> 'Disable'
			),
			array(
				'id'		=> 'shop_header_border',
				'type'		=> 'switch', 
				'title'		=> __( 'Border - Shop', 'nm-framework-admin' ),
				'desc'		=> __( 'Display a header border on the Shop archive/listing pages.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> 'Enable',
				'off'		=> 'Disable'
			),
            array (
				'id'	=> 'header_info_logo',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Logo', 'nm-framework-admin' ) . '</h3>',
			),
			array(
				'id'	=> 'logo',
				'type'	=> 'media', 
				'title'	=> __( 'Logo Upload', 'nm-framework-admin' ),
				'desc'	=> __( 'Upload your logo.', 'nm-framework-admin' )
			),
			array(
				'id'		=> 'alt_logo_config',
				'type'		=> 'select',
				'title'		=> __( 'Alternative Logo', 'nm-framework-admin' ),
				'desc'		=> __( 'Select an option to enable alternative logo.', 'nm-framework-admin' ),
				'options'	=> array( 
                    '0'                                 => __( 'Disable', 'nm-framework-admin' ),
                    'alt-logo-home'                     => __( 'Display in Home-page header', 'nm-framework-admin' ),
                    'alt-logo-fixed'                    => __( 'Display in Float header', 'nm-framework-admin' ),
                    'alt-logo-home alt-logo-fixed'      => __( 'Display in Home-page and Float header', 'nm-framework-admin' ),
                    'alt-logo-tablet'                   => __( 'Display in Tablet header', 'nm-framework-admin' ),
                    'alt-logo-mobile'                   => __( 'Display in Mobile header', 'nm-framework-admin' ),
                    'alt-logo-tablet alt-logo-mobile'   => __( 'Display in Tablet and Mobile header', 'nm-framework-admin' )
                ),
				'default'	=> '0'
			),
            array(
				'id'	=> 'alt_logo',
				'type'	=> 'media', 
				'title'	=> __( 'Alternative Logo Upload', 'nm-framework-admin' ),
				'desc'	=> __( 'Upload your alternative logo.', 'nm-framework-admin' ),
                'required'	=> array( 'alt_logo_config', '!=', '0' )
			),
			array(
				'id'			=> 'logo_height',
				'type'			=> 'slider',
				'title'			=> __( 'Logo Height', 'nm-framework-admin' ),
				'desc'			=> __( 'Logo height.', 'nm-framework-admin'),
				'default'		=> 16,
				'min'			=> 10,
				'max'			=> 500,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
			array(
				'id'			=> 'logo_height_tablet',
				'type'			=> 'slider',
				'title'			=> __( 'Logo Height - Tablet', 'nm-framework-admin' ),
				'desc'			=> __( 'Logo height for Tablet screen widths.', 'nm-framework-admin'),
				'default'		=> 16,
				'min'			=> 10,
				'max'			=> 500,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
			array(
				'id'			=> 'logo_height_mobile',
				'type'			=> 'slider',
				'title'			=> __( 'Logo Height - Mobile', 'nm-framework-admin' ),
				'desc'			=> __( 'Logo height for Mobile screen widths.', 'nm-framework-admin'),
				'default'		=> 16,
				'min'			=> 10,
				'max'			=> 500,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
            array (
				'id'	=> 'header_info_menu',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Menu', 'nm-framework-admin' ) . '</h3>',
			),
			array(
				'id'			=> 'menu_height',
				'type'			=> 'slider',
				'title'			=> __( 'Menu Height', 'nm-framework-admin' ),
				'desc'			=> __( 'Menu height.', 'nm-framework-admin'),
				'default'		=> 50,
				'min'			=> 50,
				'max'			=> 500,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
            array(
				'id'			=> 'menu_height_tablet',
				'type'			=> 'slider',
				'title'			=> __( 'Menu Height - Tablet', 'nm-framework-admin' ),
				'desc'			=> __( 'Menu height for Tablet screen widths.', 'nm-framework-admin'),
				'default'		=> 50,
				'min'			=> 50,
				'max'			=> 500,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
            array(
				'id'			=> 'menu_height_mobile',
				'type'			=> 'slider',
				'title'			=> __( 'Menu Height - Mobile', 'nm-framework-admin' ),
				'desc'			=> __( 'Menu height for Mobile screen widths.', 'nm-framework-admin'),
				'default'		=> 50,
				'min'			=> 50,
				'max'			=> 500,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
            array (
				'id'	=> 'header_info_menu_login',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Menu - Login/My Account', 'nm-framework-admin' ) . '</h3>',
			),
            array(
				'id'		=> 'menu_login',
				'type'		=> 'switch', 
				'title'		=> __( 'Menu', 'nm-framework-admin' ),
				'desc'		=> __( 'Display login/my-account in header menu.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> 'Enable',
				'off'		=> 'Disable'
			),
			array(
				'id'		=> 'menu_login_popup',
				'type'		=> 'switch', 
				'title'		=> __( 'Popup', 'nm-framework-admin' ),
				'desc'		=> __( 'Display login/register form in a popup window.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> 'Enable',
				'off'		=> 'Disable',
				'required'	=> array( 'menu_login', '=', '1' )
			),
			array(
				'id'		=> 'menu_login_icon',
				'type'		=> 'switch', 
				'title'		=> __( 'Icon', 'nm-framework-admin' ),
				'desc'		=> __( 'Display login/my-account menu icon (instead of text).', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> 'Enable',
				'off'		=> 'Disable',
				'required'	=> array( 'menu_login', '=', '1' )
			),
            array (
				'id'	=> 'header_info_menu_cart',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Menu - Cart', 'nm-framework-admin' ) . '</h3>',
			),
			array(
				'id'		=> 'menu_cart',
				'type'		=> 'select',
				'title'		=> __( 'Menu', 'nm-framework-admin' ),
				'desc'		=> __( 'Configure the Cart menu widget.', 'nm-framework-admin' ),
				'options'	=> array( '1' => 'Enable', 'link' => 'Link only (no slide panel)', '0' => 'Disable' ),
				'default'	=> '1'
			),
			array(
				'id'		=> 'menu_cart_icon',
				'type'		=> 'switch', 
				'title'		=> __( 'Icon', 'nm-framework-admin' ),
				'desc'		=> __( 'Display cart menu icon (instead of text).', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> 'Enable',
				'off'		=> 'Disable',
				'required'	=> array( 'menu_cart', '!=', '0' )
			),
			array (
				'id'	=> 'widget_panel_info',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Cart Panel', 'nm-framework-admin' ) . '</h3>',
			),
            array(
				'id'		=> 'widget_panel_color',
				'type'		=> 'select',
				'title'		=> __( 'Color Scheme', 'nm-framework-admin' ),
				'desc'		=> __( 'Select a color scheme for the cart slide-panel.', 'nm-framework-admin' ),
				'options'	=> array( 'light' => 'Light', 'dark' => 'Dark' ),
				'default'	=> 'dark'
			)
		)
	) );
	
	Redux::setSection( $opt_name, array(
		'title'		=> __( 'Footer', 'nm-framework-admin' ),
		'icon'		=> 'el-icon-chevron-down',
		'fields'	=> array(
			array(
				'id'		=> 'footer_sticky',
				'type'		=> 'switch', 
				'title'		=> __( 'Sticky', 'nm-framework-admin' ),
				'desc'		=> __( 'Make the footer sections "stick" to the bottom of the page.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> 'Enable',
				'off'		=> 'Disable'
			),
			array (
				'id'	=> 'footer_widgets_info',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Widgets', 'nm-framework-admin' ) . '</h3>',
			),
			array(
				'id'		=> 'footer_widgets_layout',
				'type'		=> 'select',
				'title'		=> __( 'Layout', 'nm-framework-admin' ),
				'desc'		=> __( 'Select a layout for the footer widgets section.', 'nm-framework-admin' ),
				'options'	=> array( 'boxed' => 'Boxed', 'full' => 'Full', 'full-nopad' => 'Full (No padding)' ),
				'default'	=> 'boxed'
			),
			array(
				'id'		=> 'footer_widgets_border',
				'type'		=> 'switch',
				'title'		=> __( 'Top Border', 'nm-framework-admin' ),
				'desc'		=> __( 'Display a top-border on the footer widgets sections.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> 'Enable',
				'off'		=> 'Disable'
			),
			array(
				'id'			=> 'footer_widgets_columns',
				'type'			=> 'slider',
				'title'			=> __( 'Columns', 'nm-framework-admin' ),
				'desc'			=> __( 'Select the number of footer widget columns to display.', 'nm-framework-admin' ),
				'default'		=> 2,
				'min'			=> 1,
				'max'			=> 4,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
			array (
				'id'	=> 'footer_bar_info',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Bar', 'nm-framework-admin' ) . '</h3>',
			),
			array(
				'id'	=> 'footer_bar_logo',
				'type'	=> 'media', 
				'title'	=> __( 'Logo', 'nm-framework-admin' ),
				'desc'	=> __( 'Upload a custom logo (max-height is set to 30px).', 'nm-framework-admin' )
			),
			array(
				'id'		=> 'footer_bar_text',
				'type'		=> 'text',
				'title'		=> __( 'Copyright Text', 'nm-framework-admin' ),
				'desc'		=> __( 'Enter your copyright text.', 'nm-framework-admin' ),
				'validate'	=> 'html'
			),
			array(
				'id'		=> 'footer_bar_text_cr_year',
				'type'		=> 'switch', 
				'title'		=> __( 'Copyright Text - Copyright & Year', 'nm-framework-admin' ),
				'desc'		=> __( 'Display the copyright-symbol (&copy;) and current year before the copyright text.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> 'Enable',
				'off'		=> 'Disable'
			),
			array(
				'id'		=> 'footer_bar_content',
				'type'		=> 'select',
				'title'		=> __( 'Right Column', 'nm-framework-admin' ),
				'desc'		=> __( 'Content in the right column.', 'nm-framework-admin' ),
				'options'	=> array( 'copyright_text' => 'Copyright text', 'social_icons' => 'Social media icons (From the "Social Profiles" settings tab)', 'custom' => 'Custom content' ),
				'default'	=> 'copyright_text'
			),
			array(
				'id'		=> 'footer_bar_custom_content',
				'type'		=> 'text',
				'title'		=> __( 'Custom Content', 'nm-framework-admin' ),
				'desc'		=> __( 'Custom content (HTML allowed).', 'nm-framework-admin' ),
				'validate'	=> 'html',
				'required'	=> array( 'footer_bar_content', '=', 'custom' )
			)
		)
	) );
	
	Redux::setSection( $opt_name, array(
		'title'		=> __( 'Styling', 'nm-framework-admin' ),
		'icon'		=> 'el-icon-eye-open',
		'fields'	=> array(
			array(
				'id'	=> 'info_styling_general',
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( 'General', 'nm-framework-admin' ) . '</h3>'
			),
			array(
				'id'			=> 'highlight_color',
				'type'			=> 'color',
				'title'			=> __( 'Highlight Color', 'nm-framework-admin' ),
				'desc'			=> __( 'Main theme highlight color.', 'nm-framework-admin' ),
				'default'		=> '#dc9814',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'			=> 'button_font_color',
				'type'			=> 'color',
				'title'			=> __( 'Button - Font Color', 'nm-framework-admin' ),
				'desc'			=> __( 'Product buttons text.', 'nm-framework-admin' ),
				'default'		=> '#ffffff',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'			=> 'button_background_color',
				'type'			=> 'color',
				'title'			=> __( 'Button - Background Color', 'nm-framework-admin' ),
				'desc'			=> __( 'Product buttons background color.', 'nm-framework-admin' ),
				'default'		=> '#282828',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'	=> 'info_typography',
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Typography', 'nm-framework-admin' ) . '</h3>'
			),
			array(
				'id'			=> 'main_font_color',
				'type'			=> 'color',
				'title'			=> __( 'Main Font Color', 'nm-framework-admin' ),
				'desc'			=> __( 'Body text color.', 'nm-framework-admin' ),
				'default'		=> '#777777',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'			=> 'heading_color',
				'type'			=> 'color',
				'title'			=> __( 'Heading Color', 'nm-framework-admin' ),
				'desc'			=> __( 'Heading text color.', 'nm-framework-admin' ),
				'default'		=> '#282828',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'	=> 'info_styling_background',
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Background', 'nm-framework-admin' ) . '</h3>'
			),
			array(
				'id'			=> 'main_background_color',
				'type'			=> 'color',
				'title'			=> __( 'Background Color', 'nm-framework-admin' ),
				'desc'			=> __( 'Main site background color.', 'nm-framework-admin' ),
				'default'		=> '#ffffff',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'	=> 'main_background_image',
				'type'	=> 'media', 
				'url'	=> true,
				'title'	=> __( 'Background Image', 'nm-framework-admin' ),
				'desc'	=> __( 'Upload a background image or specify a URL (boxed layout).', 'nm-framework-admin' )
			),
			array(
				'id'		=> 'main_background_image_type',
				'type'		=> 'select',
				'title'		=> __( 'Background Type', 'nm-framework-admin' ),
				'desc'		=> __( 'Select the background-image type (fixed image or repeat pattern/texture).', 'nm-framework-admin' ),
				'options'	=> array( 'fixed' => 'Fixed (full)', 'repeat' => 'Repeat (pattern)' ),
				'default'	=> 'fixed'
			),
			array(
				'id'	=> 'info_styling_top_bar',
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Top Bar', 'nm-framework-admin' ) . '</h3>'
			),
			array(
				'id'			=> 'top_bar_font_color',
				'type'			=> 'color',
				'title'			=> __( 'Font Color', 'nm-framework-admin' ),
				'desc'			=> __( 'Top bar text color.', 'nm-framework-admin' ),
				'default'		=> '#eeeeee',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'			=> 'top_bar_background_color',
				'type'			=> 'color',
				'title'			=> __( 'Background Color', 'nm-framework-admin' ),
				'desc'			=> __( 'Top bar background color.', 'nm-framework-admin' ),
				'default'		=> '#282828',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'	=> 'info_styling_header',
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Header', 'nm-framework-admin' ) . '</h3>'
			),
			array(
				'id'			=> 'header_navigation_color',
				'type'			=> 'color',
				'title'			=> __( 'Menu Font Color', 'nm-framework-admin' ),
				'desc'			=> __( 'Header menu links color.', 'nm-framework-admin' ),
				'default'		=> '#707070',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'			=> 'header_navigation_highlight_color',
				'type'			=> 'color',
				'title'			=> __( 'Menu Font Color - Highlight', 'nm-framework-admin' ),
				'desc'			=> __( 'Used for "highlighting" links in the header menu.', 'nm-framework-admin' ),
				'transparent'	=> false,
				'default'		=> '#282828',
				'validate'		=> 'color'
			),
			array(
				'id'		=> 'header_background_color',
				'type'		=> 'color',
				'title'		=> __( 'Background Color', 'nm-framework-admin' ),
				'desc'		=> __( 'Header background color.', 'nm-framework-admin' ),
				'default'	=> '#ffffff',
				'validate'	=> 'color'
			),
			array(
				'id'		=> 'header_home_background_color',
				'type'		=> 'color',
				'title'		=> __( 'Background Color - Home Page', 'nm-framework-admin' ),
				'desc'		=> __( 'Header background color on the Home page.', 'nm-framework-admin' ),
				'default'	=> '#ffffff',
				'validate'	=> 'color'
			),
			array(
				'id'		=> 'header_float_background_color',
				'type'		=> 'color',
				'title'		=> __( 'Background Color - Floating', 'nm-framework-admin' ),
				'desc'		=> __( 'Floating header background color.', 'nm-framework-admin' ),
				'default'	=> '#ffffff',
				'validate'	=> 'color'
			),
			array(
				'id'			=> 'header_slide_menu_open_background_color',
				'type'			=> 'color',
				'title'			=> __( 'Background Color - Mobile Menu Open', 'nm-framework-admin' ),
				'desc'			=> __( 'Header background color when the mobile menu is open.', 'nm-framework-admin' ),
				'default'		=> '#ffffff',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'	=> 'info_styling_dropdown_menu',
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Dropdown Menu', 'nm-framework-admin' ) . '</h3>'
			),
			array(
				'id'			=> 'dropdown_menu_font_color',
				'type'			=> 'color',
				'title'			=> __( 'Font Color', 'nm-framework-admin' ),
				'desc'			=> __( 'Header dropdown menu links color.', 'nm-framework-admin' ),
				'transparent'	=> false,
				'default'		=> '#a0a0a0',
				'validate'		=> 'color'
			),
			array(
				'id'			=> 'dropdown_menu_font_highlight_color',
				'type'			=> 'color',
				'title'			=> __( 'Font Color - Highlight', 'nm-framework-admin' ),
				'desc'			=> __( 'Used for "highlighting" links in the header dropdown menu.', 'nm-framework-admin' ),
				'transparent'	=> false,
				'default'		=> '#eeeeee',
				'validate'		=> 'color'
			),
			array(
				'id'			=> 'dropdown_menu_background_color',
				'type'			=> 'color',
				'title'			=> __( 'Background Color', 'nm-framework-admin' ),
				'desc'			=> __( 'Header dropdown menu background color.', 'nm-framework-admin' ),
				'default'		=> '#282828',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
            array(
				'id'	=> 'info_styling_slide_menu',
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Mobile Menu', 'nm-framework-admin' ) . '</h3>'
			),
            array(
				'id'			=> 'slide_menu_font_color',
				'type'			=> 'color',
				'title'			=> __( 'Font Color', 'nm-framework-admin' ),
				'desc'			=> __( 'Mobile menu font color.', 'nm-framework-admin' ),
				//'default'		=> '#cccccc',
                'default'		=> '#555555',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
            array(
				'id'			=> 'slide_menu_font_highlight_color',
				'type'			=> 'color',
				'title'			=> __( 'Font Color - Highlight', 'nm-framework-admin' ),
				'desc'			=> __( 'Mobile menu font "highlight" color.', 'nm-framework-admin' ),
				//'default'		=> '#eeeeee',
                'default'		=> '#282828',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
            array(
				'id'			=> 'slide_menu_border_color',
				'type'			=> 'color',
				'title'			=> __( 'Border Color', 'nm-framework-admin' ),
				'desc'			=> __( 'Mobile menu border color.', 'nm-framework-admin' ),
				//'default'		=> '#464646',
                'default'		=> '#eeeeee',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
            array(
				'id'			=> 'slide_menu_background_color',
				'type'			=> 'color',
				'title'			=> __( 'Background Color', 'nm-framework-admin' ),
				'desc'			=> __( 'Mobile menu background color.', 'nm-framework-admin' ),
				//'default'		=> '#333333',
                'default'		=> '#ffffff',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'	=> 'info_styling_footer_widgets',
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Footer Widgets', 'nm-framework-admin' ) . '</h3>'
			),
			array(
				'id'			=> 'footer_widgets_font_color',
				'type'			=> 'color',
				'title'			=> __( 'Font Color', 'nm-framework-admin' ),
				'desc'			=> __( 'Footer widgets text color.', 'nm-framework-admin' ),
				'default'		=> '#777777',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'			=> 'footer_widgets_title_font_color',
				'type'			=> 'color',
				'title'			=> __( 'Font Color - Titles', 'nm-framework-admin' ),
				'desc'			=> __( 'Footer widgets title color.', 'nm-framework-admin' ),
				'default'		=> '#282828',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'			=> 'footer_widgets_highlight_font_color',
				'type'			=> 'color',
				'title'			=> __( 'Font Color - Highlights', 'nm-framework-admin' ),
				'desc'			=> __( 'Link hover states color.', 'nm-framework-admin' ),
				'default'		=> '#dc9814',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'			=> 'footer_widgets_background_color',
				'type'			=> 'color',
				'title'			=> __( 'Background Color', 'nm-framework-admin' ),
				'desc'			=> __( 'Footer widgets background color.', 'nm-framework-admin' ),
				'default'		=> '#ffffff',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'	=> 'info_styling_footer_bar',
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Footer Bar', 'nm-framework-admin' ) . '</h3>'
			),
			array(
				'id'			=> 'footer_bar_font_color',
				'type'			=> 'color',
				'title'			=> __( 'Font Color', 'nm-framework-admin' ),
				'desc'			=> __( 'Footer-bar text color.', 'nm-framework-admin' ),
				'default'		=> '#aaaaaa',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'			=> 'footer_bar_highlight_font_color',
				'type'			=> 'color',
				'title'			=> __( 'Font Color - Highlights', 'nm-framework-admin' ),
				'desc'			=> __( 'Link hover states color.', 'nm-framework-admin' ),
				'default'		=> '#eeeeee',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'			=> 'footer_bar_menu_border_color',
				'type'			=> 'color',
				'title'			=> __( 'Menu Border Color', 'nm-framework-admin' ),
				'desc'			=> __( 'Menu border color on smaller screen widths.', 'nm-framework-admin' ),
				'default'		=> '#3a3a3a',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'			=> 'footer_bar_background_color',
				'type'			=> 'color',
				'title'			=> __( 'Background Color', 'nm-framework-admin' ),
				'desc'			=> __( 'Footer-bar background color.', 'nm-framework-admin' ),
				'default'		=> '#282828',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'	=> 'info_styling_shop',
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Shop', 'nm-framework-admin' ) . '</h3>'
			),
            array(
				'id'			=> 'shop_taxonomy_header_heading_color',
				'type'			=> 'color',
				'title'			=> __( 'Category Banner - Heading Color', 'nm-framework-admin' ),
				'desc'			=> __( 'Category Banner heading color.', 'nm-framework-admin' ),
				'default'		=> '#282828',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
            array(
				'id'			=> 'shop_taxonomy_header_description_color',
				'type'			=> 'color',
				'title'			=> __( 'Category Banner - Description Color', 'nm-framework-admin' ),
				'desc'			=> __( 'Category Banner description color.', 'nm-framework-admin' ),
				'default'		=> '#777777',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'			=> 'sale_flash_font_color',
				'type'			=> 'color',
				'title'			=> __( 'Sale Badge - Font Color', 'nm-framework-admin' ),
				'desc'			=> __( '"Sale badges" text color.', 'nm-framework-admin' ),
				'default'		=> '#373737',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'			=> 'sale_flash_background_color',
				'type'			=> 'color',
				'title'			=> __( 'Sale Badge - Background Color', 'nm-framework-admin' ),
				'desc'			=> __( '"Sale badges" background color.', 'nm-framework-admin' ),
				'default'		=> '#ffffff',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'	=> 'info_styling_shop_single_product',
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Shop - Single Product', 'nm-framework-admin' ) . '</h3>'
			),
			array(
				'id'			=> 'single_product_background_color',
				'type'			=> 'color',
				'title'			=> __( 'Background', 'nm-framework-admin' ),
				'desc'			=> __( 'Single product details background color.', 'nm-framework-admin' ),
				'default'		=> '#eeeeee',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'			=> 'featured_video_icon_color',
				'type'			=> 'color',
				'title'			=> __( 'Featured Video Icon - Color', 'nm-framework-admin' ),
				'desc'			=> __( 'Featured video icon color.', 'nm-framework-admin' ),
				'default'		=> '#282828',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'			=> 'featured_video_background_color',
				'type'			=> 'color',
				'title'			=> __( 'Featured Video Icon - Background Color', 'nm-framework-admin' ),
				'desc'			=> __( 'Featured video icon background color.', 'nm-framework-admin' ),
				'default'		=> '#ffffff',
				'transparent'	=> false,
				'validate'		=> 'color'
			)
		)
	) );
	
	Redux::setSection( $opt_name, array(
		'title'		=> __( 'Typography', 'nm-framework-admin' ),
		'icon'		=> 'el-icon-font',
		'fields'	=> array(
			// Main font
			array (
				'id'	=> 'main_font_info',
				'type'	=> 'info',
				'icon'	=> true,
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Main Font', 'nm-framework-admin' ) . '</h3>',
			),
			array(
				'id'		=> 'main_font_source',
				'type'		=> 'radio',
				'title'		=> __( 'Font Source', 'nm-framework-admin' ),
				'options'	=> array(
					'1'	=> 'Standard + Google Webfonts', 
					'2'	=> 'Adobe Typekit',
                    '3'	=> 'Custom CSS'
				),
				'default'	=> '1'
			),
			// Main font: Standard + Google Webfonts
			array (
				'id'			=> 'main_font',
				'type'			=> 'typography',
				'title'			=> __( 'Font Face', 'nm-framework-admin' ),
				'line-height'	=> false,
				'text-align'	=> false,
				'font-style'	=> false,
				'font-weight'	=> false,
				'font-size'		=> false,
				'color'			=> false,
				'all_styles'    => true, // Since v1.3.4: Include all available styles for selected Google font
                'default'		=> array (
					'font-family'	=> 'Open Sans',
					'subsets'		=> '',
				),
				'required'		=> array( 'main_font_source', '=', '1' )
			),
			// Main font: Adobe Typekit
			array(
				'id'		=> 'main_font_typekit_kit_id',
				'type'		=> 'text',
				'title'		=> __( 'Typekit Kit ID', 'nm-framework-admin' ),
				'desc'		=> __( 'Enter your Typekit Kit ID for the Main Font.', 'nm-framework-admin' ),
				'default'	=> '',
				'required'	=> array( 'main_font_source', '=', '2' )
			),
			array (
				'id'		=> 'main_typekit_font',
				'type'		=> 'text',
				'title'		=> __( 'Typekit Font Face', 'nm-framework-admin' ),
				'desc'		=> __( 'Example: futura-pt', 'nm-framework-admin' ),
				'default'	=> '',
				'required'	=> array( 'main_font_source', '=', '2' )
			),
            // Main font: Custom CSS
			array(
				'id'		=> 'main_font_custom_css',
				'type'		=> 'ace_editor',
				'title' 	=> __( 'Custom CSS', 'nm-framework-admin' ),
				'desc' 		=> __( 'Enter custom CSS rules.<br><br>Example: body { font-family: "Proxima Nova Regular", sans-serif; }', 'nm-framework-admin' ),
				'mode'		=> 'css',
				'theme'		=> 'chrome',
				'default'	=> '',
				'required'	=> array( 'main_font_source', '=', '3' )
			),
			// Secondary font
			array (
				'id'	=> 'secondary_font_info',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Secondary Font', 'nm-framework-admin' ) . '</h3>',
			),
			array(
				'id'		=> 'secondary_font_source',
				'type'		=> 'radio',
				'title'		=> __('Font Source', 'nm-framework-admin'),
				'options'	=> array(
					'0' => '(none)',
					'1'	=> 'Standard + Google Webfonts', 
					'2'	=> 'Adobe Typekit'
				),
				'default'	=> '0'
			),
			// Secondary font: Standard + Google Webfonts
			array (
				'id'			=> 'secondary_font',
				'type'			=> 'typography',
				'title'			=> __( 'Font Face', 'nm-framework-admin' ),
				'line-height'	=> false,
				'text-align'	=> false,
				'font-style'	=> false,
				'font-weight'	=> false,
				'font-size'		=> false,
				'color'			=> false,
                'all_styles'    => true, // Since v1.3.4: Include all available styles for selected Google font
                'default'		=> array (
					'font-family'	=> 'Open Sans',
					'subsets'		=> '',
				),
				'required'		=> array( 'secondary_font_source', '=', '1' )
			),
			// Secondary font: Adobe Typekit
			array(
				'id'		=> 'secondary_font_typekit_kit_id',
				'type'		=> 'text',
				'title'		=> __( 'Typekit Kit ID', 'nm-framework-admin' ), 
				'desc'		=> __( 'Enter your Typekit Kit ID for the Secondary Font.', 'nm-framework-admin' ),
				'default'	=> '',
				'required'	=> array( 'secondary_font_source', '=', '2' )
			),
			array (
				'id'		=> 'secondary_typekit_font',
				'type'		=> 'text',
				'title'		=> __( 'Typekit Font Face', 'nm-framework-admin' ),
				'desc'		=> __( 'Example: proxima-nova', 'nm-framework-admin' ),
				'default'	=> '',
				'required'	=> array( 'secondary_font_source', '=', '2' )
			)
		)
	) );

	Redux::setSection( $opt_name, array(
		'title'		=> __( 'Blog', 'nm-framework-admin' ),
		'icon'		=> 'el-icon-website',
		'fields'	=> array(
			array(
				'id'		=> 'blog_static_page',
				'type'		=> 'switch', 
				'title'		=> __( 'Static Content', 'nm-framework-admin' ),
				'desc'		=> __( "Display static page content on the blog's index page.", 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> 'Enable',
				'off'		=> 'Disable'
			),
			array(
				'id'		=> 'blog_static_page_id',
				'type'		=> 'select',
				'title'		=> __( 'Static Content - Page', 'nm-framework-admin' ),
				'desc'		=> __( "Select a page to display on the blog's index page.", 'nm-framework-admin' ),
				'data'		=> 'pages',
				'required'	=> array( 'blog_static_page', '=', '1' )
			),
			array (
				'id'	=> 'blog_categories_info',
				'type'	=> 'info',
				'icon'	=> true,
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Categories', 'nm-framework-admin' ) . '</h3>',
			),
            array(
				'id'		=> 'blog_categories',
				'type'		=> 'switch', 
				'title'		=> __( 'Categories', 'nm-framework-admin' ),
				'desc'		=> __( 'Display post categories on the main blog page.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> 'Enable',
				'off'		=> 'Disable'
			),
            array(
				'id'		=> 'blog_categories_hide_empty',
				'type'		=> 'switch',
				'title'		=> __( 'Hide Empty', 'nm-framework-admin' ),
				'desc'		=> __( 'Hide empty post categories.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> 'Enable',
				'off'		=> 'Disable',
				'required'	=> array( 'blog_categories', '=', '1' )
			),
			array(
				'id'		=> 'blog_categories_layout',
				'type'		=> 'select',
				'title'		=> __( 'Layout', 'nm-framework-admin' ),
				'desc'		=> __( 'Select categories menu layout.', 'nm-framework-admin' ),
				'options'	=> array( 'list' => 'Separated list', 'list_nosep' => 'List', 'columns' => 'Columns' ),
				'default'	=> 'list',
                'required'	=> array( 'blog_categories', '=', '1' )
			),
			array(
				'id'			=> 'blog_categories_columns',
				'type'			=> 'slider',
				'title'			=> __( 'Columns', 'nm-framework-admin' ),
				'desc'			=> __( 'Select the number of category columns to display.', 'nm-framework-admin' ),
				'default'		=> 4,
				'min'			=> 2,
				'max'			=> 5,
				'step'			=> 1,
				'display_value'	=> 'text',
				'required'	=> array( 'blog_categories_layout', '=', 'columns' )
			),
			array(
				'id'		=> 'blog_categories_toggle',
				'type'		=> 'switch', 
				'title'		=> __( 'Toggle', 'nm-framework-admin' ),
				'desc'		=> __( 'Display a link to show/hide categories on small browser widths.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> 'Enable',
				'off'		=> 'Disable',
                'required'	=> array( 'blog_categories', '=', '1' )
			),
			array(
				'id'		=> 'blog_categories_orderby',
				'type'		=> 'select',
				'title'		=> __( 'Order', 'nm-framework-admin' ),
				'desc'		=> __( 'Select categories order.', 'nm-framework-admin' ),
				'options'	=> array( 'id' => 'ID', 'name' => 'Name', 'slug' => 'Slug', 'count' => 'Count', 'term_group' => 'Term Group' ),
				'default'	=> 'name',
                'required'	=> array( 'blog_categories', '=', '1' )
			),
			array(
				'id'		=> 'blog_categories_order',
				'type'		=> 'select',
				'title'		=> __( 'Order Direction', 'nm-framework-admin' ),
				'desc'		=> __( 'Select categories order direction.', 'nm-framework-admin' ),
				'options'	=> array( 'asc' => 'Ascending', 'desc' => 'Descending' ),
				'default'	=> 'asc',
                'required'	=> array( 'blog_categories', '=', '1' )
			),
			array (
				'id'	=> 'blog_archive_info',
				'type'	=> 'info',
				'icon'	=> true,
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Archive/Listing', 'nm-framework-admin' ) . '</h3>',
			),
			array(
				'id'		=> 'blog_layout',
				'type'		=> 'select',
				'title'		=> __( 'Layout', 'nm-framework-admin' ),
				'desc'		=> __( 'Select blog layout.', 'nm-framework-admin' ),
				'options'	=> array( 'classic' => 'Classic', 'grid' => 'Grid', 'list' => 'List' ),
				'default'	=> 'grid'
			),
            array(
				'id'		=> 'blog_sidebar',
				'type'		=> 'select',
				'title'		=> __( 'Sidebar', 'nm-framework-admin' ),
				'desc'		=> __( 'Select blog sidebar layout.', 'nm-framework-admin' ),
				'options'	=> array( 'none' => 'No sidebar', 'left' => 'Sidebar Left', 'right' => 'Sidebar Right' ),
				'default'	=> 'none',
                'required'	=> array( 'blog_layout', '=', 'classic' )
			),
            array(
				'id'		=> 'blog_grid_preloader',
				'type'		=> 'switch', 
				'title'		=> __( 'Preloader', 'nm-framework-admin' ),
				'desc'		=> __( 'Show preloader when Blog images are loading.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> 'Enable',
				'off'		=> 'Disable',
                'required'	=> array( 'blog_layout', '=', 'grid' )
			),
			array(
				'id'			=> 'blog_grid_columns',
				'type'			=> 'slider',
				'title'			=> __( 'Grid Columns', 'nm-framework-admin' ),
				'desc'			=> __( 'Select the number of columns in the grid layout.', 'nm-framework-admin' ),
				'default'		=> 3,
				'min'			=> 2,
				'max'			=> 5,
				'step'			=> 1,
				'display_value'	=> 'text',
				'required'	=> array( 'blog_layout', '=', 'grid' )
			),
			array(
				'id'		=> 'blog_show_full_posts',
				'type'		=> 'switch', 
				'title'		=> __( 'Show Full Posts', 'nm-framework-admin' ),
				'desc'		=> __( 'Show full posts on blog listing.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> 'Enable',
				'off'		=> 'Disable'
			),
			array(
				'id'		=> 'blog_gallery',
				'type'		=> 'switch', 
				'title'		=> __( 'Blog Gallery', 'nm-framework-admin' ),
				'desc'		=> __( 'Display image galleries on blog listing', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> 'Enable',
				'off'		=> 'Disable'
			),
			array (
				'id'	=> 'blog_single_post_info',
				'type'	=> 'info',
				'icon'	=> true,
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Single Post', 'nm-framework-admin' ) . '</h3>',
			),
			array(
				'id'		=> 'single_post_sidebar',
				'type'		=> 'select',
				'title'		=> __( 'Single Post Layout', 'nm-framework-admin' ),
				'desc'		=> __( 'Select single post layout.', 'nm-framework-admin' ),
				'options'	=> array( 'none' => 'No sidebar', 'left' => 'Sidebar Left', 'right' => 'Sidebar Right' ),
				'default'	=> 'none'
			),
            array(
				'id'		=> 'single_post_display_featured_image',
				'type'		=> 'switch', 
				'title'		=> __( 'Display Featured Image', 'nm-framework-admin' ),
				'desc'		=> __( 'Display featured image above post title.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> 'Enable',
				'off'		=> 'Disable'
			),
            array(
				'id'		=> 'single_post_related',
				'type'		=> 'switch', 
				'title'		=> __( 'Related Posts', 'nm-framework-admin' ),
				'desc'		=> __( 'Display related posts below content.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> 'Enable',
				'off'		=> 'Disable'
			),
            array(
				'id'			=> 'single_post_related_columns',
				'type'			=> 'slider',
				'title'			=> __( 'Related Posts - Columns', 'nm-framework-admin' ),
				'desc'			=> __( 'Select number of related post columns to display.', 'nm-framework-admin' ),
				'default'		=> 4,
				'min'			=> 2,
				'max'			=> 6,
				'step'			=> 2,
				'display_value'	=> 'text',
                'required'	=> array( 'single_post_related', '=', '1' )
			),
            array(
				'id'			=> 'single_post_related_per_page',
				'type'			=> 'slider',
				'title'			=> __( 'Related Posts - Products per Page', 'nm-framework-admin' ),
				'desc'			=> __( 'Select number of related posts to display.', 'nm-framework-admin' ),
				'default'		=> 4,
				'min'			=> 1,
				'max'			=> 48,
				'step'			=> 1,
				'display_value'	=> 'text',
                'required'	=> array( 'single_post_related', '=', '1' )
			)
		)
	) );
	
	Redux::setSection( $opt_name, array(
		'title'		=> __( 'Shop Filters', 'nm-framework-admin' ),
		'icon'		=> 'el-icon-shopping-cart',
		'fields'	=> array(
			array(
				'id'		=> 'shop_header',
				'type'		=> 'switch',
				'title'		=> __( 'Header', 'nm-framework-admin' ),
				'desc'		=> __( 'Display shop header.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> 'Enable',
				'off'		=> 'Disable'
			),
			array(
				'id'		=> 'shop_filters_enable_ajax',
				'type'		=> 'select',
				'title'		=> __( 'AJAX', 'nm-framework-admin' ),
				'desc'		=> __( 'Use AJAX to filter shop content (AJAX allows new content without reloading the whole page).', 'nm-framework-admin' ),
				'options'	=> array( '1' => 'Enable', 'desktop' => 'Disable on Touch devices', '0' => 'Disable' ),
				'default'	=> '1'
			),
			array(
				'id'		=> 'shop_ajax_update_title',
				'type'		=> 'switch',
				'title'		=> __( 'AJAX - Update Page Title', 'nm-framework-admin' ),
				'desc'		=> __( 'Update document/page title after AJAX loading a new page.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> 'Enable',
				'off'		=> 'Disable',
				'required'	=> array( 'shop_filters_enable_ajax', '!=', '0' )
			),
			array (
				'id' 	=> 'shop_header_categories_info',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Categories', 'nm-framework-admin' ) . '</h3>',
			),
			array(
				'id'		=> 'shop_categories',
				'type'		=> 'switch',
				'title'		=> __( 'Categories', 'nm-framework-admin' ),
				'desc'		=> __( 'Display product categories in the shop header.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> 'Enable',
				'off'		=> 'Disable'
			),
			array(
				'id'		=> 'shop_categories_hide_empty',
				'type'		=> 'switch',
				'title'		=> __( 'Hide Empty', 'nm-framework-admin' ),
				'desc'		=> __( 'Hide empty product categories.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> 'Enable',
				'off'		=> 'Disable',
				'required'	=> array( 'shop_categories', '=', '1' )
			),
			array(
				'id'		=> 'shop_categories_top_level',
				'type'		=> 'select',
				'title'		=> __( 'Display Type', 'nm-framework-admin' ),
				'desc'		=> __( 'Select product categories display type.', 'nm-framework-admin' ),
				'options'	=> array( '1' => 'Always show top-level categories', '0' => 'Hide top-level categories (on category pages)' ),
				'default'	=> '1',
				'required'	=> array( 'shop_categories', '=', '1' )
			),
			array(
				'id'		=> 'shop_categories_back_link',
				'type'		=> 'select',
				'title'		=> __( '"Back" Link', 'nm-framework-admin' ),
				'desc'		=> __( 'Display "Back" link on sub-category menus.', 'nm-framework-admin' ),
				'options'	=> array( '0' => 'Disable', '1st' => 'Display', '2nd' => 'Display from 2nd sub-category level' ),
				'default'	=> '1st',
				'required'	=> array( 'shop_categories_top_level', '=', '0' )
			),
			array(
				'id'		=> 'shop_categories_layout',
				'type'		=> 'select',
				'title'		=> __( 'Layout', 'nm-framework-admin' ),
				'desc'		=> __( 'Select product categories menu layout.', 'nm-framework-admin' ),
				'options'	=> array( 'list_sep' => 'Separated list', 'list_nosep' => 'List' ),
				'default'	=> 'list_sep',
				'required'	=> array( 'shop_categories', '=', '1' )
			),
			array(
				'id'		=> 'shop_categories_orderby',
				'type'		=> 'select',
				'title'		=> __( 'Order', 'nm-framework-admin' ),
				'desc'		=> __( 'Select product categories order.', 'nm-framework-admin' ),
				'options'	=> array(
                    'id' => 'ID',
                    'name'          => 'Name/Menu-order',
                    'slug'          => 'Slug',
                    'count'         => 'Count',
                    'term_group'    => 'Term group'
                ),
				'default'	=> 'slug',
				'required'	=> array( 'shop_categories', '=', '1' )
			),
			array(
				'id'		=> 'shop_categories_order',
				'type'		=> 'select',
				'title'		=> __( 'Order Direction', 'nm-framework-admin' ),
				'desc'		=> __( 'Select product categories order direction.', 'nm-framework-admin' ),
				'options'	=> array( 'asc' => 'Ascending', 'desc' => 'Descending' ),
				'default'	=> 'asc',
				'required'	=> array( 'shop_categories', '=', '1' )
			),
			array (
				'id' 	=> 'shop_header_filters_info',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Filter Widgets', 'nm-framework-admin' ) . '</h3>',
			),
			array(
				'id'		=> 'shop_filters',
				'type'		=> 'select',
				'title'		=> __( 'Filters', 'nm-framework-admin' ),
				'desc'		=> __( 'Select product-filters layout.', 'nm-framework-admin' ),
				'options'	=> array(
                    'disabled'  => 'Disable',
                    'header'    => 'Display in shop header',
                    'default'   => 'Display in sidebar',
                    'popup'     => 'Display in pop-up panel'
                ),
				'default'	=> 'disabled'
			),
			array(
				'id'			=> 'shop_filters_columns',
				'type'			=> 'slider',
				'title'			=> __( 'Columns', 'nm-framework-admin' ),
				'desc'			=> __( 'Select the number of filter columns to display.', 'nm-framework-admin' ),
				'default'		=> 4,
				'min'			=> 1,
				'max'			=> 4,
				'step'			=> 1,
				'display_value'	=> 'text',
				'required'	=> array( 'shop_filters', '=', 'header' )
			),
			/*array(
				'id'		=> 'shop_filters_scrollbar',
				'type'		=> 'select',
				'title'		=> __( 'Scrollbar', 'nm-framework-admin' ),
				'desc'		=> __( 'Enable scrollbar for product filters with long content (set height below).', 'nm-framework-admin' ),
				'options'	=> array(
                    '0'         => 'Disable',
                    'default'   => 'Default scrollbar',
                    'js'        => 'Custom scrollbar'
                ),
				'default'	=> '0',
				'required'	=> array( 'shop_filters', '=', 'header' )
			),*/
            array(
				'id'		=> 'shop_filters_scrollbar',
				'type'		=> 'switch',
				'title'		=> __( 'Scrollbar', 'nm-framework-admin' ),
				'desc'		=> __( 'Display scrollbar for product filters with long content (set height below).', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> 'Enable',
				'off'		=> 'Disable',
                'required'	=> array( 'shop_filters', '=', 'header' )
			),
			array(
				'id'			=> 'shop_filters_height',
				'type'			=> 'slider',
				'title'			=> __( 'Filter Height', 'nm-framework-admin' ),
				'desc'			=> __( 'Set product filter height (longer content is scrollable).', 'nm-framework-admin' ),
				'default'		=> 150,
				'min'			=> 80,
				'max'			=> 1000,
				'step'			=> 1,
				'display_value'	=> 'text',
				'required'		=> array( 'shop_filters_scrollbar', '!=', '0' )
			),
            array(
				'id'		=> 'shop_filters_sidebar_position',
				'type'		=> 'select',
				'title'		=> __( 'Sidebar Position', 'nm-framework-admin' ),
				'desc'		=> __( 'Select filters-sidebar position.', 'nm-framework-admin' ),
				'options'	=> array( 'left' => 'Left', 'right' => 'Right' ),
				'default'	=> 'left',
				'required'	=> array( 'shop_filters', '=', 'default' )
			),
			array (
				'id' 	=> 'shop_header_search_info',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Search', 'nm-framework-admin' ) . '</h3>',
			),
			array(
				'id'		=> 'shop_search',
				'type'		=> 'select',
				'title'		=> __( 'Search', 'nm-framework-admin' ),
				'desc'		=> __( 'Select product search layout.', 'nm-framework-admin' ),
				'options'	=> array(
                    '0' => 'Disable',
                    'header' => 'Display in header menu',
                    'shop' => 'Display in shop'
                ),
				'default'	=> 'shop'
			),
			array(
				'id'		=> 'shop_search_ajax',
				'type'		=> 'switch',
				'title'		=> __( 'AJAX', 'nm-framework-admin' ),
				'desc'		=> __( 'Use AJAX when searching in the main shop (AJAX allows new content without reloading the whole page).', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> 'Enable',
				'off'		=> 'Disable'
			),
            array(
				'id'		=> 'shop_search_auto_close',
				'type'		=> 'switch',
				'title'		=> __( 'Auto Close', 'nm-framework-admin' ),
				'desc'		=> __( 'Close search-field when performing a search.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> 'Enable',
				'off'		=> 'Disable'
			),
			array(
				'id'			=> 'shop_search_min_char',
				'type'			=> 'slider',
				'title'			=> __( 'Minimum Characters', 'nm-framework-admin' ),
				'desc'			=> __( 'Minimum number of characters required to search.', 'nm-framework-admin' ),
				'default'		=> 2,
				'min'			=> 1,
				'max'			=> 10,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
			array(
				'id'		=> 'shop_search_by_titles',
				'type'		=> 'switch',
				'title'		=> __( 'Titles Only', 'nm-framework-admin' ),
				'desc'		=> __( 'Search by product titles only.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> 'Enable',
				'off'		=> 'Disable'
			)
		)
	) );
	
	Redux::setSection( $opt_name, array(
		'title'		=> __( 'Shop', 'nm-framework-admin' ),
		'icon'		=> 'el-icon-shopping-cart',
		'fields'	=> array(
            array(
				'id'		=> 'shop_content_home',
				'type'		=> 'switch',
				'title'		=> __( 'Page Content', 'nm-framework-admin' ),
				'desc'		=> __( 'Display default Shop Page on "WooCommerce > Settings > Products > Display".', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> 'Enable',
				'off'		=> 'Disable'
			),
			array (
				'id' 	=> 'shop_category_info',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Category', 'nm-framework-admin' ) . '</h3>',
			),
            array(
				'id'		=> 'shop_content_taxonomy',
				'type'		=> 'select',
				'title'		=> __( 'Page Content', 'nm-framework-admin' ),
				'desc'		=> __( 'Select content to display on category pages.', 'nm-framework-admin' ),
				'options'	=> array(
                    '0'                 => 'Disable',
                    'taxonomy_header'   => 'Category Banner (static)',
                    'shop_page'         => 'Shop Page on "WooCommerce > Settings > Products > Display"'
                ),
				'default'	=> 'shop_page'
			),
            array(
				'id'		=> 'shop_taxonomy_header_text_alignment',
				'type'		=> 'select',
				'title'		=> __( 'Banner - Text Alignment', 'nm-framework-admin' ),
				'desc'		=> __( 'Select Banner text alignment.', 'nm-framework-admin' ),
				'options'	=> array( 'left' => 'Left', 'center' => 'Center', 'right' => 'Right' ),
				'default'	=> 'center',
                'required'	=> array( 'shop_content_taxonomy', '=', 'taxonomy_header' )
			),
            array(
                'id'		=> 'shop_taxonomy_header_text_max_width',
                'type' 		=> 'text',
                'title' 	=> __( 'Banner - Text Maximum Width', 'nm-framework-admin' ),
                'desc'		=> __( 'Enter a maximum width for the Banner text.', 'nm-framework-admin' ),
                'validate'	=> 'numeric',
                'default'	=> '',
                'required'	=> array( 'shop_content_taxonomy', '=', 'taxonomy_header' )
            ),
            array(
				'id'			=> 'shop_taxonomy_header_image_height',
				'type'			=> 'slider',
				'title'			=> __( 'Banner - Image Height', 'nm-framework-admin' ),
				'desc'			=> __( 'Category banner-image height.', 'nm-framework-admin' ),
				'default'		=> 370,
				'min'			=> 1,
				'max'			=> 1000,
				'step'			=> 1,
				'display_value'	=> 'text',
                'required'	=> array( 'shop_content_taxonomy', '=', 'taxonomy_header' )
			),
            array(
				'id'			=> 'shop_taxonomy_header_image_height_tablet',
				'type'			=> 'slider',
				'title'			=> __( 'Banner - Image Height Tablet', 'nm-framework-admin' ),
				'desc'			=> __( 'Category banner-image height for Tablet screen widths.', 'nm-framework-admin' ),
				'default'		=> 370,
				'min'			=> 1,
				'max'			=> 1000,
				'step'			=> 1,
				'display_value'	=> 'text',
                'required'	=> array( 'shop_content_taxonomy', '=', 'taxonomy_header' )
			),
            array(
				'id'			=> 'shop_taxonomy_header_image_height_mobile',
				'type'			=> 'slider',
				'title'			=> __( 'Banner - Image Height Mobile', 'nm-framework-admin' ),
				'desc'			=> __( 'Category banner-image height for Mobile screen widths.', 'nm-framework-admin' ),
				'default'		=> 210,
				'min'			=> 1,
				'max'			=> 1000,
				'step'			=> 1,
				'display_value'	=> 'text',
                'required'	=> array( 'shop_content_taxonomy', '=', 'taxonomy_header' )
			),
			array(
				'id'		=> 'shop_category_description',
				'type'		=> 'switch',
				'title'		=> __( 'Description', 'nm-framework-admin' ),
				'desc'		=> __( 'Display category description.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> 'Enable',
				'off'		=> 'Disable',
                'required'	=> array( 'shop_content_taxonomy', '!=', 'taxonomy_header' )
			),
            array(
                'id'		=> 'shop_default_description',
                'type'		=> 'textarea',
                'title'		=> __( 'Description - Default', 'nm-framework-admin' ),
                'desc'		=> __( 'Enter a default description to display when no category is selected.', 'nm-framework-admin' ),
                'rows'      => 4,
                'validate'	=> 'html',
                'required'	=> array( 'shop_category_description', '=', '1' )
            ),
            array(
				'id'		=> 'shop_description_layout',
				'type'		=> 'select',
				'title'		=> __( 'Description - Layout', 'nm-framework-admin' ),
				'desc'		=> __( 'Select a layout for the Shop description.', 'nm-framework-admin' ),
				'options'	=> array( 'clean' => 'Clean', 'borders' => 'Borders' ),
				'default'	=> 'clean',
                'required'	=> array( 'shop_category_description', '=', '1' )
			),
			array (
				'id' 	=> 'shop_catalog_info',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Catalog', 'nm-framework-admin' ) . '</h3>',
			),
			array(
				'id'			=> 'shop_columns',
				'type'			=> 'slider',
				'title'			=> __( 'Columns', 'nm-framework-admin' ),
				'desc'			=> __( 'Select the number of product columns to display.', 'nm-framework-admin' ),
				'default'		=> 4,
				'min'			=> 1,
				'max'			=> 6,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
			array(
				'id'			=> 'shop_columns_mobile',
				'type'			=> 'slider',
				'title'			=> __( 'Columns - Mobile', 'nm-framework-admin' ),
				'desc'			=> __( 'Select the number of product columns to display on mobile screen widths.', 'nm-framework-admin' ),
				'default'		=> 1,
				'min'			=> 1,
				'max'			=> 2,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
			array(
				'id'			=> 'products_per_page',
				'type'			=> 'slider',
				'title'			=> __( 'Products per Page', 'nm-framework-admin' ),
				'desc'			=> __( 'Select the number of products to display per page in the shop-catalog.', 'nm-framework-admin' ),
				'default'		=> 12,
				'min'			=> 1,
				'max'			=> 48,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
			array(
				'id'		=> 'product_sale_flash',
				'type'		=> 'select',
				'title'		=> __( 'Product Sale Flash', 'nm-framework-admin' ),
				'desc'		=> __( 'Product sale flash badges.', 'nm-framework-admin' ),
				'options'	=> array( '0' => 'Disable', 'txt' => 'Display sale Text', 'pct' => 'Display sale Percentage' ),
				'default'	=> 'pct'
			),
			array(
				'id'		=> 'product_image_lazy_loading',
				'type'		=> 'switch',
				'title'		=> __( 'Image Lazy Loading', 'nm-framework-admin' ),
				'desc'		=> __( 'Lazy load product catalog images when scrolling down the page (speeds up load times).', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> 'Enable',
				'off'		=> 'Disable'
			),
			array(
				'id'		=> 'product_hover_image_global',
				'type'		=> 'switch',
				'title'		=> __( 'Hover Image', 'nm-framework-admin' ),
				'desc'		=> __( 'Display a secondary image from the gallery when a product is "hovered".', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> 'Enable',
				'off'		=> 'Disable'
			),
			array(
				'id'		=> 'product_action_link',
				'type'		=> 'select',
				'title'		=> __( 'Product Action Link', 'nm-framework-admin' ),
				'desc'		=> __( 'Configure the product action link (e.g. "Show more").', 'nm-framework-admin' ),
				'options'	=> array( 'action-link-hide' => 'Show on hover', 'action-link-show' => 'Always show', 'action-link-touch' => 'Always show on touch devices' ),
				'default'	=> 'action-link-hide'
			),
			array(
				'id'		=> 'shop_infinite_load',
				'type'		=> 'select',
				'title'		=> __( 'Infinite Load', 'nm-framework-admin' ),
				'desc'		=> __( 'Configure "infinite" product loading.', 'nm-framework-admin' ),
				'options'	=> array( '0' => 'Disable', 'button' => 'Button', 'scroll' => 'Scroll' ),
				'default'	=> 'button'
			),
            array (
				'id' 	=> 'shop_catalog_auto_scroll_info',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Catalog - Auto Scroll', 'nm-framework-admin' ) . '</h3>',
			),
            array(
				'id'			=> 'shop_scroll_offset',
				'type'			=> 'slider',
				'title'			=> __( 'Scroll Offset', 'nm-framework-admin' ),
				'desc'			=> __( 'Used to offset the shop scroll position (for example when a category link is clicked).', 'nm-framework-admin' ),
				'default'		=> 70,
				'min'			=> 0,
				'max'			=> 1000,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
            array(
				'id'			=> 'shop_scroll_offset_tablet',
				'type'			=> 'slider',
				'title'			=> __( 'Scroll Offset - Tablet', 'nm-framework-admin' ),
				'desc'			=> __( 'Used to offset the shop scroll position (for example when a category link is clicked).', 'nm-framework-admin' ),
				'default'		=> 70,
				'min'			=> 0,
				'max'			=> 1000,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
            array(
				'id'			=> 'shop_scroll_offset_mobile',
				'type'			=> 'slider',
				'title'			=> __( 'Scroll Offset - Mobile', 'nm-framework-admin' ),
				'desc'			=> __( 'Used to offset the shop scroll position (for example when a category link is clicked).', 'nm-framework-admin' ),
				'default'		=> 70,
				'min'			=> 0,
				'max'			=> 1000,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
			array (
				'id' 	=> 'product_quickview_info',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Quick View', 'nm-framework-admin' ) . '</h3>',
			),
			array(
				'id'		=> 'product_quickview',
				'type'		=> 'switch',
				'title'		=> __( 'Quick View', 'nm-framework-admin' ),
				'desc'		=> __( 'Product quick view.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> 'Enable',
				'off'		=> 'Disable'
			),
            array(
				'id'		=> 'product_quickview_links',
				'type'		=> 'select',
				'title'		=> __( 'Links', 'nm-framework-admin' ),
				'desc'		=> __( 'Select quick view link(s).', 'nm-framework-admin' ),
				'options'	=> array( 'all' => 'All product links', 'detail' => 'Product details link' ),
				'default'	=> 'detail',
				'required'	=> array( 'product_quickview', '=', '1' )
			),
			array(
				'id'		=> 'product_quickview_summary_layout',
				'type'		=> 'select',
				'title'		=> __( 'Product Summary', 'nm-framework-admin' ),
				'desc'		=> __( 'Select quick view product summary layout.', 'nm-framework-admin' ),
				'options'	=> array( 'align-top' => 'Align to Top (suitable for shorter images)', 'align-bottom' => 'Align to Bottom' ),
				'default'	=> 'align-bottom',
				'required'	=> array( 'product_quickview', '=', '1' )
			),
			array(
				'id'		=> 'product_quickview_atc',
				'type'		=> 'switch',
				'title'		=> __( 'Add to Cart Button', 'nm-framework-admin' ),
				'desc'		=> __( 'Display add-to-cart button.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> 'Enable',
				'off'		=> 'Disable',
				'required'	=> array( 'product_quickview', '=', '1' )
			),
			array(
				'id'		=> 'product_quickview_details_button',
				'type'		=> 'switch',
				'title'		=> __( 'Details Button', 'nm-framework-admin' ),
				'desc'		=> __( 'Display button to full product details.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> 'Enable',
				'off'		=> 'Disable',
				'required'	=> array( 'product_quickview', '=', '1' )
			),
			array (
				'id' 	=> 'cart_info',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Cart', 'nm-framework-admin' ) . '</h3>',
			),
			array(
				'id'		=> 'cart_show_item_price',
				'type'		=> 'switch',
				'title'		=> __( 'Single Item Price', 'nm-framework-admin' ),
				'desc'		=> __( 'Display single-item price for products in the Cart.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> 'Enable',
				'off'		=> 'Disable'
			),
            array (
				'id' 	=> 'checkout_info',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Checkout', 'nm-framework-admin' ) . '</h3>',
			),
			array(
				'id'		=> 'checkout_inline_notices',
				'type'		=> 'switch',
				'title'		=> __( 'Inline Validation Notices', 'nm-framework-admin' ),
				'desc'		=> __( 'Display inline validation notices (below the input fields).', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> 'Enable',
				'off'		=> 'Disable'
			)
		)
	) );
	
	Redux::setSection( $opt_name, array(
		'title'		=> __( 'Single Product', 'nm-framework-admin' ),
		'icon'		=> 'el-icon-shopping-cart',
		'fields'	=> array(
			array(
				'id'		=> 'product_navigation_same_term',
				'type'		=> 'switch',
				'title'		=> __( 'Product Navigation - Same Category', 'nm-framework-admin' ),
				'desc'		=> __( 'Keep product navigation within the same category.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> 'Enable',
				'off'		=> 'Disable'
			),
            array(
				'id'		=> 'product_redirect_scroll',
				'type'		=> 'switch',
				'title'		=> __( 'Redirect Scroll', 'nm-framework-admin' ),
				'desc'		=> __( 'Scroll to products after redirecting to the Shop (after clicking a Breadcrumb, Category or Tag link).', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> 'Enable',
				'off'		=> 'Disable'
			),
            array(
				'id'		=> 'single_product_sale_flash',
				'type'		=> 'select',
				'title'		=> __( 'Sale Flash', 'nm-framework-admin' ),
				'desc'		=> __( 'Product sale flash badges.', 'nm-framework-admin' ),
				'options'	=> array( '0' => 'Disable', 'txt' => 'Display sale Text', 'pct' => 'Display sale Percentage' ),
				'default'	=> '0'
			),
            array (
				'id' 	=> 'product_image_info',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Gallery', 'nm-framework-admin' ) . '</h3>',
			),
			array(
				'id'			=> 'product_image_column_size',
				'type'			=> 'slider',
				'title'			=> __( 'Column Size', 'nm-framework-admin' ),
				'desc'			=> __( 'Select size-span of the gallery column.', 'nm-framework-admin' ),
				'default'		=> 7,
				'min'			=> 3,
				'max'			=> 7,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
			array(
				'id'		=> 'product_image_zoom',
				'type'		=> 'switch',
				'title'		=> __( 'Lightbox', 'nm-framework-admin' ),
				'desc'		=> __( 'Lightbox gallery for viewing full-size images.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> 'Enable',
				'off'		=> 'Disable'
			),
			array(
				'id'		=> 'product_image_hover_zoom',
				'type'		=> 'switch',
				'title'		=> __( 'Zoom', 'nm-framework-admin' ),
				'desc'		=> __( 'Mouseover image to zoom and pan.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> 'Enable',
				'off'		=> 'Disable'
			),
            array(
				'id'			=> 'product_image_max_size',
				'type'			=> 'slider',
				'title'			=> __( 'Max width - Tablet/mobile', 'nm-framework-admin' ),
				'desc'			=> __( 'Select gallery max-width (in pixels) for smaller screen sizes.', 'nm-framework-admin' ),
				'default'		=> 500,
				'min'			=> 100,
				'max'			=> 1220,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
            array(
				'id'		=> 'product_image_pagination',
				'type'		=> 'switch',
				'title'		=> __( 'Pagination - Tablet/mobile', 'nm-framework-admin' ),
				'desc'		=> __( 'Display pagination on smaller screen sizes.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> 'Enable',
				'off'		=> 'Disable'
			),
			array (
				'id' 	=> 'product_details_info',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Details', 'nm-framework-admin' ) . '</h3>',
			),
            array(
				'id'		=> 'product_custom_select',
				'type'		=> 'switch',
				'title'		=> __( 'Variations - Custom Dropdown', 'nm-framework-admin' ),
				'desc'		=> __( 'Display custom dropdown-menu for product-variations.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> 'Enable',
				'off'		=> 'Disable'
			),
            array(
				'id'		=> 'product_select_hide_labels',
				'type'		=> 'switch',
				'title'		=> __( 'Variations - Hide Dropdown Labels', 'nm-framework-admin' ),
				'desc'		=> __( 'Hide labels for product-variations dropdown.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> 'Enable',
				'off'		=> 'Disable'
			),
            /*array(
				'id'		=> 'grouped_products_qty_arrows',
				'type'		=> 'select',
				'title'		=> __( 'Grouped - Quantity Arrows', 'nm-framework-admin' ),
				'desc'		=> __( 'Select quantity arrows layout for grouped-products.', 'nm-framework-admin' ),
				'options'	=> array( 'qty-hide' => 'Disable', 'qty-show' => 'Show', 'qty-show qty-hover-show' => 'Show on Hover' ),
				'default'	=> 'qty-hide'
			),*/
            array(
				'id'		=> 'grouped_products_qty_arrows',
				'type'		=> 'switch',
				'title'		=> __( 'Grouped - Quantity Arrows', 'nm-framework-admin' ),
				'desc'		=> __( 'Display quantity arrows for grouped products.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> 'Enable',
				'off'		=> 'Disable'
			),
			array(
				'id'		=> 'product_description_layout',
				'type'		=> 'select',
				'title'		=> __( 'Description Layout', 'nm-framework-admin' ),
				'desc'		=> __( 'Select layout for the product description.', 'nm-framework-admin' ),
				'options'	=> array( 'boxed' => 'Boxed', 'full' => 'Full width' ),
				'default'	=> 'boxed'
			),
			array(
				'id'		=> 'product_reviews',
				'type'		=> 'switch',
				'title'		=> __( 'Reviews', 'nm-framework-admin' ),
				'desc'		=> __( 'Display product reviews tab.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> 'Enable',
				'off'		=> 'Disable'
			),
            array(
				'id'		=> 'product_share_buttons',
				'type'		=> 'switch',
				'title'		=> __( 'Share Buttons', 'nm-framework-admin' ),
				'desc'		=> __( 'Display social share buttons.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> 'Enable',
				'off'		=> 'Disable'
			),
            array (
				'id' 	=> 'product_upsell_related_info',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Up-sells &amp; Related Products', 'nm-framework-admin' ) . '</h3>',
			),
            array(
				'id'			=> 'product_upsell_related_columns',
				'type'			=> 'slider',
				'title'			=> __( 'Columns', 'nm-framework-admin' ),
				'desc'			=> __( 'Select number of up-sell/related product columns to display.', 'nm-framework-admin' ),
				'default'		=> 4,
				'min'			=> 1,
				'max'			=> 6,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
            array(
				'id'			=> 'product_upsell_related_per_page',
				'type'			=> 'slider',
				'title'			=> __( 'Products per Page', 'nm-framework-admin' ),
				'desc'			=> __( 'Select number of up-sell/related products to display.', 'nm-framework-admin' ),
				'default'		=> 4,
				'min'			=> 1,
				'max'			=> 48,
				'step'			=> 1,
				'display_value'	=> 'text'
			)
		)
	) );
	
    Redux::setSection( $opt_name, array(
		'title'		=> __( 'My Account', 'nm-framework-admin' ),
		'icon'		=> 'el-icon-shopping-cart',
		'fields'	=> array(
			array(
                'id'		=> 'myaccount_profile_image',
                'type'		=> 'switch',
                'title'		=> __( 'Profile Image', 'nm-framework-admin' ),
                'desc'		=> 'Display <a href="http://en.gravatar.com/" target="_blank">gravatar</a> profile image.',
                'default'	=> 0,
                'on'		=> 'Enable',
                'off'		=> 'Disable'
            ),
            array(
				'id' 		=> 'myaccount_dashboard_text',
				'type' 		=> 'editor',
				'title' 	=> __( 'Dashboard Text', 'nm-framework-admin' ),
				'desc' 		=> __( 'Enter text to display on the Dashboard page.', 'nm-framework-admin' ),
				'default'	=> '',
				'args'		=> array(
					'wpautop'	=> false,
					'teeny' 	=> true
				)
			)
		)
	) );
    
    if ( defined( 'NM_WISHLIST_DIR' ) ) {
        Redux::setSection( $opt_name, array(
            'title'		=> __( 'Wishlist', 'nm-framework-admin' ),
            'icon'		=> 'el-icon-heart',
            'fields'	=> array(
                array(
                    'id'		=> 'wishlist_show_variations',
                    'type'		=> 'switch',
                    'title'		=> __( 'Display Variations', 'nm-framework-admin' ),
                    'desc'		=> __( 'Display available variations for products in the wishlist.', 'nm-framework-admin' ),
                    'default'	=> 0,
                    'on'		=> 'Enable',
                    'off'		=> 'Disable'
                ),
                array(
                    'id'		=> 'wishlist_share',
                    'type'		=> 'switch',
                    'title'		=> __( 'Share Links', 'nm-framework-admin' ),
                    'desc'		=> __( 'Display social share links.', 'nm-framework-admin' ),
                    'default'	=> 0,
                    'on'		=> 'Enable',
                    'off'		=> 'Disable'
                ),
                array(
                    'id'	=> 'wishlist_page_id',
                    'type'	=> 'select',
                    'title'	=> __( 'Wishlist Page', 'nm-framework-admin' ),
                    'desc'	=> __( 'Select the Wishlist page (used to create the share links).', 'nm-framework-admin' ),
                    'data'	=> 'pages',
                    'required'	=> array( 'wishlist_share', '=', '1' )
                ),
                array(
                    'id'		=> 'wishlist_share_title',
                    'type'		=> 'text',
                    'title'		=> __( 'Share Title', 'nm-framework-admin' ),
                    'desc'		=> __( 'Enter a title for the social share links.', 'nm-framework-admin' ),
                    'default'	=> 'My Wishlist',
                    'validate'	=> 'no_html',
                    'required'	=> array( 'wishlist_share', '=', '1' )
                ),
                array(
                    'id'		=> 'wishlist_share_text',
                    'type'		=> 'textarea',
                    'title'		=> __( 'Share Text', 'nm-framework-admin' ),
                    'desc'		=> __( 'Enter a description for the social share links. Enter <strong>%wishlist_url%</strong> to display the Wishlist URL.', 'nm-framework-admin' ),
                    'rows'      => 4,
                    'validate'	=> 'no_html',
                    'required'	=> array( 'wishlist_share', '=', '1' )
                ),
                array(
                    'id'		=> 'wishlist_share_image_url',
                    'type'		=> 'text',
                    'title'		=> __( 'Share Image URL', 'nm-framework-admin' ),
                    'desc'		=> __( 'Enter a image-URL for the social share links.', 'nm-framework-admin' ),
                    'validate'	=> 'url',
                    'required'	=> array( 'wishlist_share', '=', '1' )
                )
            )
        ) );
    }

	if ( defined( 'NM_PORTFOLIO_VERSION' ) ) {
        Redux::setSection( $opt_name, array(
            'title'		=> __( 'Portfolio', 'nm-framework-admin' ),
            'icon'		=> 'el-icon-website',
            'fields'	=> array(
                array(
                    'id'        => 'portfolio_page_layout',
                    'type'      => 'select',
                    'title'     => __( 'Page Layout', 'nm-framework-admin' ),
                    'desc'      => __( 'Select portfolio page layout.', 'nm-framework-admin' ),
                    'options'	=> array( 
                        'full'          => 'Full',
                        'full-nopad'    => 'Full (no padding)',
                        'boxed'         => 'Boxed'
                    ),
                    'default'   => 'boxed'
                ),
                array(
                    'id'		=> 'portfolio_categories',
                    'type'		=> 'switch',
                    'title'		=> __( 'Categories', 'nm-framework-admin' ),
                    'desc'		=> __( 'Display category menu.', 'nm-framework-admin' ),
                    'default'	=> 1,
                    'on'		=> 'Enable',
                    'off'		=> 'Disable'
                ),
                array(
                    'id'        => 'portfolio_categories_alignment',
                    'type'      => 'select',
                    'title'     => __( 'Categories - Alignment', 'nm-framework-admin' ),
                    'desc'      => __( 'Select category menu alignment.', 'nm-framework-admin' ),
                    'options'	=> array( 
                        'left'      => 'Left',
                        'center'    => 'Center',
				        'right'     => 'Right'
                    ),
                    'default'	=> 'left',
                    'required'	=> array( 'portfolio_categories', '=', '1' )
                ),
                array(
                    'id'		=> 'portfolio_categories_js',
                    'type'		=> 'switch',
                    'title'		=> __( 'Categories - Animated Sorting', 'nm-framework-admin' ),
                    'desc'		=> __( 'Animated category sorting.', 'nm-framework-admin' ),
                    'default'	=> 1,
                    'on'		=> 'Enable',
                    'off'		=> 'Disable',
                    'required'	=> array( 'portfolio_categories', '=', '1' )
                ),
                array(
                    'id'	    => 'portfolio_layout',
                    'type'	    => 'select',
                    'title'	    => __( 'Layout', 'nm-framework-admin' ),
                    'desc'	    => __( 'Select portfolio layout.', 'nm-framework-admin' ),
                    'options'   => array( 
                        'standard'  => 'Standard',
                        'overlay'   => 'Overlay'
                    ),
                    'default'   => 'standard'
                ),
                array(
                    'id'		=> 'portfolio_packery',
                    'type'		=> 'switch',
                    'title'		=> __( 'Packery Grid', 'nm-framework-admin' ),
                    'desc'		=> __( 'Enable "Packery" grid layout.', 'nm-framework-admin' ),
                    'default'	=> 1,
                    'on'		=> 'Enable',
                    'off'		=> 'Disable'
                ),
                array(
                    'id'		=> 'portfolio_items',
                    'type' 		=> 'text',
                    'title' 	=> __( 'Items', 'nm-framework-admin' ),
                    'desc'		=> __( 'Number of items to display (leave blank for unlimited).', 'nm-framework-admin' ),
                    'validate'	=> 'numeric',
                    'default'	=> ''
                ),
                array(
                    'id'        => 'portfolio_columns',
                    'type'      => 'select',
                    'title'     => __( 'Items per Row', 'nm-framework-admin' ),
                    'desc'      => __( 'Select number of items per row.', 'nm-framework-admin' ),
                    'options'	=> array( 
                        '1' => '1',
                        '2' => '2',
                        '3'	=> '3',
                        '4'	=> '4'
                    ),
                    'default'   => '2'
                ),
                /*array(
                    'id'		=> 'portfolio_category',
                    'type' 		=> 'text',
                    'title' 	=> __( "Category (optional)", 'nm-framework-admin' ),
                    'desc'		=> __( "Enter slug-name for portfolio category to display.", 'nm-framework-admin' ),
                    'validate'	=> 'no_special_chars',
                    'default'	=> ''
                ),
                array(
                    'id'		=> 'portfolio_ids',
                    'type' 		=> 'text',
                    'title' 	=> __( "Item ID's (optional)", 'nm-framework-admin' ),
                    'desc'		=> __( "Enter comma separated ID's of portfolio items to display.", 'nm-framework-admin' ),
                    'validate'	=> 'comma_numeric',
                    'default'	=> ''
                ),*/
                array(
                    'id'        => 'portfolio_order_by',
                    'type'      => 'select',
                    'title'     => __( 'Order By', 'nm-framework-admin' ),
                    'desc'      => __( 'Order portfolio items by.', 'nm-framework-admin' ),
                    'options'	=> array( 
                        'date'  => 'Date',
                        'title' => 'Title',
                        'rand'  => 'Random'
                    ),
                    'default'   => 'date'
                ),
                array(
                    'id'	    => 'portfolio_order',
                    'type'	    => 'select',
                    'title'	    => __( 'Order', 'nm-framework-admin' ),
                    'desc'	    => __( 'Portfolio items order.', 'nm-framework-admin' ),
                    'options'   => array( 
                        'desc'  => 'Descending',
                        'asc'   => 'Ascending'
                    ),
                    'default'   => 'desc'
                ),
                array (
                    'id' 	=> 'portfolio_permalinks_info',
                    'icon'	=> true,
                    'type'	=> 'info',
                    'raw'	=> '<h3 style="margin: 0;">' . __( 'Permalinks', 'nm-framework-admin' ) . '</h3>',
                ),
                array(
                    'id'		=> 'portfolio_permalink',
                    'type'		=> 'text',
                    'title'		=> __( 'Permalink', 'nm-framework-admin' ),
                    //'desc'		=> __( 'Enter base parmalink name for the portfolio.', 'nm-framework-admin' ),
                    'desc'		=> sprintf( '%s <br><strong>%s</strong>',
                        __( 'Enter base parmalink name for the portfolio.', 'nm-framework-admin' ), 
                        __( 'Re-save the "Settings > Permalinks" page after changing.</strong>', 'nm-framework-admin' )
                    ),
                    'default'	=> 'portfolio',
                    'validate'	=> 'unique_slug'
                    //'flush_permalinks' => true // NM: Doesn't seem to work: https://docs.reduxframework.com/core/the-basics/validation/
                ),
                array(
                    'id'		=> 'portfolio_category_permalink',
                    'type'		=> 'text',
                    'title'		=> __( 'Category Permalink', 'nm-framework-admin' ),
                    //'desc'		=> __( 'Enter base parmalink name for portfolio-categories.', 'nm-framework-admin' ),
                    'desc'		=> sprintf( '%s <br><strong>%s</strong>',
                        __( 'Enter base parmalink name for portfolio-categories.', 'nm-framework-admin' ),
                        __( 'Re-save the "Settings > Permalinks" page after changing.', 'nm-framework-admin' )
                    ),
                    'default'	=> 'portfolio-category',
                    'validate'	=> 'unique_slug'
                    //'flush_permalinks' => true // NM: Doesn't seem to work: https://docs.reduxframework.com/core/the-basics/validation/
                )
            )
        ) );
    }
	
	Redux::setSection( $opt_name, array(
        'title'		=> __( 'Social Profiles', 'nm-framework-admin' ),
		'icon'		=> 'el-icon-share-alt',
        'fields'    => array(
            array(
                'id'        => 'social_profiles',
                'type'      => 'sortable',
                'title'     => __( 'Enter your social profile URLs', 'nm-framework-admin' ),
                //'label'     => true,
                'desc'      => __( 'Drag and drop to change the order of your social profiles.', 'nm-framework-admin' ),
                'mode'      => 'text',
                'options'   => array(
                    'facebook'      => 'Facebook profile URL',
                    'instagram'     => 'Instagram profile URL',
                    'twitter'       => 'Twitter profile URL',
                    'googleplus'    => 'Google+ profile URL',
                    'flickr'        => 'Flickr profile URL',
                    'linkedin'      => 'LinkedIn profile URL',
                    'pinterest'     => 'Pinterest profile URL',
                    'rss'           => 'RSS feed URL',
                    'snapchat'      => 'Snapchat profile URL',
                    'behance'       => 'Behance profile URL',
                    'dribbble'      => 'Dribbble profile URL',
                    'soundcloud'    => 'SoundCloud profile URL',
                    'tumblr'        => 'Tumblr profile URL',
                    'vimeo'         => 'Vimeo profile URL',
                    'vk'            => 'VK profile URL',
                    'weibo'         => 'Weibo profile URL',
                    'youtube'       => 'YouTube profile URL'
                )
            )
        )
	) );
	
	Redux::setSection( $opt_name, array(
		'title'		=> __( 'Custom Code', 'nm-framework-admin' ),
		'icon'		=> 'el-icon-lines',
		'fields'	=> array(
			array(
				'id'		=> 'custom_css',
				'type'		=> 'ace_editor',
				'title'		=> __( 'CSS', 'nm-framework-admin' ),
				'desc'		=> __( "Add custom CSS to the head/top of your site.", 'nm-framework-admin' ),
				'mode'		=> 'css',
				'theme'		=> 'chrome',
				'default'	=> ''
			),
			array(
				'id'		=> 'custom_js',
				'type'		=> 'ace_editor',
				'title'		=> __( 'JavaScript', 'nm-framework-admin' ),
				'desc'		=> __( "Add custom JavaScript to the footer/bottom of your theme.", 'nm-framework-admin' ),
				'mode'		=> 'javascript',
				'theme'		=> 'chrome',
				'default'	=> ''
			)
		)
	) );
    
    /*
     * <--- END SECTIONS
     */
	