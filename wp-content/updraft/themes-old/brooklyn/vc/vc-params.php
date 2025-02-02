<?php

if ( ! defined( 'ABSPATH' ) ) exit;

/* check if Visual Composer is installed */
if( ! defined( 'WPB_VC_VERSION' )  ) {
    return;
}


/**
 * Extract CSS Property from string
 *
 * @param $subject
 * @param $property
 * @param bool|false $strict
 *
 * @since 4.5
 * @return bool 
 */

function ut_extract_custom_css_property( $subject, $property, $strict = false ) {
	
    $styles = array();
	$pattern = '/\{([^\}]*?)\}/i';
	preg_match( $pattern, $subject, $styles );
	
    if ( array_key_exists( 1, $styles ) ) {
		$styles = explode( ';', $styles[1] );
	}
    
	$new_styles = array();
	
    foreach ( $styles as $val ) {

        $attr = explode( ':', $val );
                
        if( isset( $attr[0] ) && $attr[0] == $property ) {
            
            if( $property == 'background-image' ) {
            
                $url = wp_extract_urls( $val );
                
                if( !empty( $url[0] )  ) {
                    
                    return $url[0];
                    
                }
            
            }
            
            return $val;            
            
        }
            
	}

	return false;
    
}



/**
 * Add Text Transform for Custom Heading Shortcode
 *
 * @return    array
 *
 * @access    private
 * @since     4.0
 */
 
function _vc_add_text_transform_to_custom_heading() {
    
    return array(
        'type'          => 'dropdown',
        'heading'       => esc_html__( 'Text Transform', 'unitedthemes' ),
        'param_name'    => 'text_transform',
        'value'         => array(
            esc_html__( 'Select Text Transform' , 'unitedthemes' ) => '',
            esc_html__( 'None' , 'unitedthemes' )        => 'none',
            esc_html__( 'Capitalize' , 'unitedthemes' )  => 'capitalize',
            esc_html__( 'Inherit' , 'unitedthemes' )     => 'inherit',
            esc_html__( 'Lowercase' , 'unitedthemes' )   => 'lowercase',
            esc_html__( 'Uppercase' , 'unitedthemes' )   => 'uppercase'            
        ),
        
    );
    
}

vc_add_param( 'vc_custom_heading', _vc_add_text_transform_to_custom_heading() );



/**
 * Add Offset Anchors 
 *
 * @return    array
 *
 * @access    private
 * @since     4.3
 */

function _vc_add_section_anchor_to_vc_row() {
    
    return array(
        
        array(
            'type' => 'section_anchor',
            'heading' => esc_html__( 'Linking ID', 'ut_shortcodes' ),
            'description' => sprintf( __( 'Enter ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'js_composer' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
            'param_name' => 'bklyn_section_anchor_id',
            'group' => 'Linking'
        ),
        
    );

}

vc_add_params( 'vc_row', _vc_add_section_anchor_to_vc_row() );
vc_add_params( 'vc_section', _vc_add_section_anchor_to_vc_row() );

/**
 * Enhance VC Section
 *
 * @return    array
 *
 * @access    private
 * @since     4.3.0
 */

function _vc_add_enhance_vc_section() {

    return array(
        
        'type'          => 'dropdown',
        'heading'       => __( 'Section stretch', 'js_composer' ),
        'param_name'    => 'full_width',
        'value'         => array(
            esc_html__( 'Default', 'js_composer' ) => '',
            esc_html__( 'Stretch section', 'js_composer' ) => 'stretch_row',
            esc_html__( 'Stretch section and content', 'js_composer' ) => 'stretch_row_content',
        ),
        'std'           => 'stretch_row',
        'description'   => __( 'Select stretching options for section and content (Note: stretched may not work properly if parent container has "overflow: hidden" CSS property).', 'unitedthemes' ),
        
    );
    
}

vc_add_param( 'vc_section', _vc_add_enhance_vc_section() );



/**
 * Enhance VC Row
 *
 * @return    array
 *
 * @access    private
 * @since     4.3.0
 */

function _vc_add_enhance_vc_row() {

    return array(
        
        'type'          => 'dropdown',
        'heading'       => __( 'Row stretch', 'js_composer' ),
        'param_name'    => 'full_width',
        'value'         => array(
            esc_html__( 'Default', 'js_composer' ) => '',
            esc_html__( 'Stretch row', 'js_composer' ) => 'stretch_row',
			esc_html__( 'Stretch row and content', 'js_composer' ) => 'stretch_row_content',
			esc_html__( 'Stretch row and content (no paddings)', 'js_composer' ) => 'stretch_row_content_no_spaces',
        ),
        'std'           => 'stretch_row',
        'description'   => __( 'Select stretching options for row and content (Note: stretched may not work properly if parent container has "overflow: hidden" CSS property).', 'unitedthemes' ),
        
    );
    
}

vc_add_param( 'vc_row', _vc_add_enhance_vc_row() );


// remove default section params
vc_remove_param( "vc_section", "video_bg" );
vc_remove_param( "vc_section", "video_bg_url" );
vc_remove_param( "vc_section", "video_bg_parallax" );
vc_remove_param( "vc_section", "parallax" );
vc_remove_param( "vc_section", "parallax_image" );
vc_remove_param( "vc_section", "parallax_speed_video" );
vc_remove_param( "vc_section", "parallax_speed_bg" );
vc_remove_param( "vc_section", "video_bg_url" );

// remove default animation param 
vc_remove_param( "vc_column", "css_animation" );




/**
 * Add Overlay Settings to VC Row
 *
 * @return    array
 *
 * @access    private
 * @since     4.0
 */

function _vc_add_overlay_settings_to_vc_row() {
    
    return array( 
        
        array(
            'type'          => 'dropdown',
            'heading'       => esc_html__( 'Activate Overlay?', 'unitedthemes' ),
            'param_name'    => 'bklyn_overlay',
            'value'         => array(
                esc_html__( 'off', 'unitedthemes' ) => '',
                esc_html__( 'on', 'unitedthemes' )  => 'true'
            ),
            'group'         => 'Overlay'
        ),
        array(
            'type'          => 'colorpicker',
            'heading'       => esc_html__( 'Overlay Color', 'unitedthemes' ),
            'param_name'    => 'bklyn_overlay_color',
            'group'         => 'Overlay',
            'dependency'    => array(
                'element' => 'bklyn_overlay',
                'value'   => 'true',
            ),
        ),
        array(
            'type'          => 'dropdown',
            'heading'       => esc_html__( 'Activate Overlay Pattern?', 'unitedthemes' ),
            'param_name'    => 'bklyn_overlay_pattern',
            'value'         => array(
                esc_html__( 'off', 'unitedthemes' ) => '',
                esc_html__( 'on', 'unitedthemes' )  => 'true'
            ),
            'group'         => 'Overlay',
            'dependency'    => array(
                'element' => 'bklyn_overlay',
                'value'   => 'true',
            ),
        ),
        array(
            'type'          => 'dropdown',
            'heading'       => esc_html__( 'Overlay Style', 'unitedthemes' ),
            'param_name'    => 'bklyn_overlay_pattern_style',
            'group'         => 'Overlay',
            'value'         => array(
                esc_html__( 'Style One' , 'unitedthemes' )  => 'bklyn-style-one',
                esc_html__( 'Style Two' , 'unitedthemes' )  => 'bklyn-style-two',
                esc_html__( 'Style Three' , 'unitedthemes' )  => 'bklyn-style-three',
            ),
            'dependency'    => array(
                'element' => 'bklyn_overlay_pattern',
                'value'   => 'true',
            )
                        
        )
        
        
    );
    
}

vc_add_params( 'vc_row', _vc_add_overlay_settings_to_vc_row() );
vc_add_params( 'vc_section', _vc_add_overlay_settings_to_vc_row() );
vc_add_params( 'vc_column', _vc_add_overlay_settings_to_vc_row() );



/**
 * Add Box Shadow Settings to VC Elements
 *
 * @return    array
 *
 * @access    private
 * @since     4.5
 */

function _vc_add_box_shadow_settings_to_vc() {
    
    return array(
    
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__( 'Add Box Shadow?', 'unitedthemes' ),
            'param_name'        => 'add_box_shadow',
            'value'             => array(
                esc_html__( 'no', 'unitedthemes' )     => '',
                esc_html__( 'yes', 'unitedthemes' )    => 'true'
            ),
            'group'             => 'Design Options'
        ),
        
        array(
            'type'              => 'colorpicker',
            'heading'           => esc_html__( 'Shadow Color', 'ut_shortcodes' ),
            'param_name'        => 'shadow_color',
            'edit_field_class'  => 'vc_col-sm-6',
            'group'             => 'Design Options',
            'dependency' => array(
                'element'   => 'add_box_shadow',
                'value'     => 'true',
            ),
        ),
        
        array(
            'type'              => 'colorpicker',
            'heading'           => esc_html__( 'Shadow Hover Color', 'ut_shortcodes' ),
            'param_name'        => 'shadow_color_hover',
            'edit_field_class'  => 'vc_col-sm-6',
            'group'             => 'Design Options',
            'dependency' => array(
                'element'   => 'add_box_shadow',
                'value'     => 'true',
            ),
        ),
        
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__( 'Force Shadow Spacing?', 'unitedthemes' ),
            'description'       => esc_html__( 'If box shadow is cut off due to overflow issues, please activate this option.', 'unitedthemes' ),    
            'param_name'        => 'add_box_shadow_spacing',
            'value'             => array(
                esc_html__( 'no', 'unitedthemes' )     => '',
                esc_html__( 'yes', 'unitedthemes' )    => 'true'
            ),
            'group'             => 'Design Options'
        ),
    
    );

}

vc_add_params( 'vc_column', _vc_add_box_shadow_settings_to_vc() );


/**
 * Add Background Settings to VC Row
 *
 * @return    array
 *
 * @access    private
 * @since     4.0.3
 */

function _vc_add_background_settings_to_vc_row() {
    
    return array(
        
        array(
            'type'          => 'dropdown',
            'heading'       => esc_html__( 'Background Position', 'unitedthemes' ),
            'param_name'    => 'background_position',
            'value'         => array(
                esc_html__( 'Select Background Position', 'unite' ) => '',
                esc_html__( 'left top', 'unite' )                   => 'left top',
                esc_html__( 'left center', 'unite' )                => 'left center',
                esc_html__( 'left bottom', 'unite' )                => 'left bottom',
                esc_html__( 'center top', 'unite' )                 => 'center top',
                esc_html__( 'center center', 'unite' )              => 'center center',
                esc_html__( 'center bottom', 'unite' )              => 'center bottom',
                esc_html__( 'right top', 'unite' )                  => 'right top',
                esc_html__( 'right center', 'unite' )               => 'right center',
                esc_html__( 'right bottom', 'unite' )               => 'right bottom'  
            ),
            'group'         => 'Design Options',
            'dependency'    => array(
                'element' => 'parallax',
                'value_not_equal_to' => array('content-moving','content-moving-fade')
            )
        ),
        array(
            'type'          => 'dropdown',
            'heading'       => esc_html__( 'Background Attachment', 'unitedthemes' ),
            'param_name'    => 'background_attachment',
            'value'         => array(
                esc_html__( 'Select Background Attachment', 'unitedthemes' )=> '',
                esc_html__( 'Scroll', 'unitedthemes' )                      => 'scroll',
                esc_html__( 'Fixed', 'unitedthemes' )                       => 'fixed',
                esc_html__( 'Inherit', 'unitedthemes' )                     => 'inherit'
            ),
            'group'         => 'Design Options',
            'dependency'    => array(
                'element' => 'parallax',
                'value_not_equal_to' => array('content-moving','content-moving-fade')
            )   
        ),
        
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__( 'Hide Background on Medium Desktop?', 'unitedthemes' ),
            'param_name'        => 'hide_bg_medium',
            'edit_field_class'  => 'vc_col-sm-6',
            'value'             => array(
                esc_html__( 'no', 'unitedthemes' )     => '',
                esc_html__( 'yes', 'unitedthemes' )    => 'true'
            ),
            'group'             => 'Design Options'
        ),
        
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__( 'Hide Background on Tablet?', 'unitedthemes' ),
            'param_name'        => 'hide_bg_tablet',
            'edit_field_class'  => 'vc_col-sm-6',
            'value'             => array(
                esc_html__( 'no', 'unitedthemes' )     => '',
                esc_html__( 'yes', 'unitedthemes' )    => 'true'
            ),
            'group'             => 'Design Options'
        ),
        
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__( 'Hide Background on Mobile?', 'unitedthemes' ),
            'param_name'        => 'hide_bg_mobile',
            'edit_field_class'  => 'vc_col-sm-6',
            'value'             => array(
                esc_html__( 'no', 'unitedthemes' )     => '',
                esc_html__( 'yes', 'unitedthemes' )    => 'true'
            ),
            'group'             => 'Design Options'
        ),            
        
    );
    
}

vc_add_params( 'vc_row', _vc_add_background_settings_to_vc_row() );
vc_add_params( 'vc_column', _vc_add_background_settings_to_vc_row() );



/**
 * Add Responsive Settings
 *
 * @return    array
 *
 * @access    private
 * @since     4.4
 */

function _vc_add_responsive_settings_classes() {

    return array(

        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Hide on Desktop?', 'unitedthemes' ),
            'param_name' => 'hide_on_desktop',
            'value' => array(
                esc_html__( 'off', 'unitedthemes' ) => '',
                esc_html__( 'on', 'unitedthemes' ) => 'true'
            ),
            'group' => 'Responsive'
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Hide on Tablet?', 'unitedthemes' ),
            'param_name' => 'hide_on_tablet',
            'value' => array(
                esc_html__( 'off', 'unitedthemes' ) => '',
                esc_html__( 'on', 'unitedthemes' ) => 'true'
            ),
            'group' => 'Responsive'
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Hide on Mobile?', 'unitedthemes' ),
            'param_name' => 'hide_on_mobile',
            'value' => array(
                esc_html__( 'off', 'unitedthemes' ) => '',
                esc_html__( 'on', 'unitedthemes' ) => 'true'
            ),
            'group' => 'Responsive'
        ),

    );

}

vc_add_params( 'vc_row', _vc_add_responsive_settings_classes() );
vc_add_params( 'vc_section', _vc_add_responsive_settings_classes() );
vc_add_params( 'vc_row_inner', _vc_add_responsive_settings_classes() );

/**
 * Enhance VC Media Grid
 *
 * @return    array
 *
 * @access    private
 * @since     4.0.3
 */

function _vc_add_enhance_media_grid_gap() {
    
    return array(
        'type' => 'dropdown',
        'heading' => __( 'Gap', 'unitedthemes' ),
        'param_name' => 'gap',
        'value' => array(
            '0px' => '0',
            '1px' => '1',
            '2px' => '2',
            '3px' => '3',
            '4px' => '4',
            '5px' => '5',
            '10px' => '10',
            '15px' => '15',
            '20px' => '20',
            '25px' => '25',
            '30px' => '30',
            '35px' => '35',
            '40px' => '40',
        ),
        'std' => '40',
        'description' => __( 'Select gap between grid elements.', 'unitedthemes' ),
        'edit_field_class' => 'vc_col-sm-6'
        
    );
    
}

vc_add_param( 'vc_media_grid', _vc_add_enhance_media_grid_gap() );

/* remove grid items */
vc_remove_param( 'vc_media_grid', 'item' );



function _vc_add_enhance_row_grid_gap() {
    
    return array(
        'type' => 'dropdown',
        'heading' => __( 'Gap', 'unitedthemes' ),
        'param_name' => 'gap',
        'value' => array(
            '0px' => '0',
            '1px' => '1',
            '2px' => '2',
            '3px' => '3',
            '4px' => '4',
            '5px' => '5',
            '10px' => '10',
            '15px' => '15',
            '20px' => '20',
            '25px' => '25',
            '30px' => '30',
            '35px' => '35',
            '40px' => '40',
        ),
        'std' => '0',
        'description' => __( 'Select gap between grid elements.', 'unitedthemes' ),
        'edit_field_class' => 'vc_col-sm-6'
        
    );
    
}

vc_add_param( 'vc_row', _vc_add_enhance_row_grid_gap() );
vc_add_param( 'vc_row_inner', _vc_add_enhance_row_grid_gap() );




/**
 * Enhance VC Empty Space
 *
 * @return    array
 *
 * @access    private
 * @since     4.0.3
 */

function _vc_add_enhance_empty_space_height() {
    
    return array(
        'type' => 'textfield',
        'heading' => __( 'Height', 'js_composer' ),
        'param_name' => 'height',
        'value' => '40px',
        'admin_label' => true,
        'description' => __( 'Enter empty space height (Note: CSS measurement units allowed).', 'js_composer' ),
    );
    
}

vc_add_param( 'vc_empty_space', _vc_add_enhance_empty_space_height() );



/**
 * Enhance VC Media Gallery
 *
 * @return    array
 *
 * @access    private
 * @since     4.0.3
 */

function _vc_add_color_settings_to_vc_media_gallery() {
    
    return array(
        
        array(
            'type'          => 'colorpicker',
            'heading'       => esc_html__( 'Arrow Color', 'unitedthemes' ),
            'param_name'    => 'arrow_color',
            'group'         => 'Colors'
        ),
        array(
            'type'          => 'colorpicker',
            'heading'       => esc_html__( 'Arrow Hover Color', 'unitedthemes' ),
            'param_name'    => 'arrow_color_hover',
            'group'         => 'Colors'
        ),
        array(
            'type'          => 'colorpicker',
            'heading'       => esc_html__( 'Dot Color', 'unitedthemes' ),
            'param_name'    => 'dot_color',
            'group'         => 'Colors'
        ),
        array(
            'type'          => 'colorpicker',
            'heading'       => esc_html__( 'Dot Color Active', 'unitedthemes' ),
            'param_name'    => 'dot_color_active',
            'group'         => 'Colors'
        )
    
    );

}

vc_add_params( 'vc_gallery', _vc_add_color_settings_to_vc_media_gallery() );




$deprecated = array (
    'category'   => 'Brooklyn ( Deprecated )',
    'deprecated' => true
);

vc_map_update( 'vc_posts_slider', $deprecated );
vc_map_update( 'vc_media_grid', $deprecated );
vc_map_update( 'vc_images_carousel', $deprecated );
vc_map_update( 'vc_gallery', $deprecated );




/**
 * Add Animation Settings to VC Column
 *
 * @return    array
 *
 * @access    private
 * @since     4.2.0
 */

function _vc_add_animation_settings_to_vc_column() {
    
    return array (
        
       array(
            'type'              => 'animation_style',
            'heading'           => __( 'Animation Effect', 'unitedthemes' ),
            'description'       => __( 'Select image animation effect.', 'unitedthemes' ),
            'group'             => 'Animation',
            'param_name'        => 'effect',
            'settings' => array(
                'type' => array(
                    'in',
                    'out',
                    'other',
                ),
            )
            
        ),
        
        array(
            'type'              => 'textfield',
            'heading'           => esc_html__( 'Animation Duration', 'unitedthemes' ),
            'description'       => esc_html__( 'Animation time in seconds  e.g. 1s', 'unitedthemes' ),
            'param_name'        => 'animation_duration',
            'group'             => 'Animation',
        ), 
        
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__( 'Animate Once?', 'unitedthemes' ),
            'description'       => esc_html__( 'Animate only once when reaching the viewport, animate everytime when reaching the viewport or make the animation infinite? By default the animation executes everytime when the element becomes visible in viewport, means when leaving the viewport the animation will be reseted and starts again when reaching the viewport again. By setting this option to yes, the animation executes exactly once. By setting it to infinite, the animation loops all the time, no matter if the element is in viewport or not.', 'unitedthemes' ),
            'param_name'        => 'animate_once',
            'group'             => 'Animation',
            'value'             => array(
                esc_html__( 'no' , 'unitedthemes' )      => 'no',
                esc_html__( 'yes', 'unitedthemes' )      => 'yes',
                esc_html__( 'infinite', 'unitedthemes' ) => 'infinite',
            )
        ), 
        
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__( 'Animate Image on Tablet?', 'unitedthemes' ),
            'param_name'        => 'animate_tablet',
            'group'             => 'Animation',
            'edit_field_class'  => 'vc_col-sm-6',
            'value'             => array(
                esc_html__( 'no', 'unitedthemes' ) => 'false',
                esc_html__( 'yes'  , 'unitedthemes' ) => 'true'
            ),
        ),
        
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__( 'Animate Image on Mobile?', 'unitedthemes' ),
            'param_name'        => 'animate_mobile',
            'group'             => 'Animation',
            'edit_field_class'  => 'vc_col-sm-6',
            'value'             => array(
                esc_html__( 'no', 'unitedthemes' ) => 'false',
                esc_html__( 'yes'  , 'unitedthemes' ) => 'true'
            ),
        ),                            
        
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__( 'Delay Animation?', 'unitedthemes' ),
            'param_name'        => 'delay',
            'group'             => 'Animation',
            'edit_field_class'  => 'vc_col-sm-6',
            'value'             => array(
                esc_html__( 'no', 'unitedthemes' ) => 'false',
                esc_html__( 'yes'  , 'unitedthemes' ) => 'true'                                                                        
            )
        ),
        
        array(
            'type'              => 'textfield',
            'heading'           => esc_html__( 'Delay Timer', 'unitedthemes' ),
            'description'       => esc_html__( 'Time in milliseconds until the image animation starts. e.g. 200', 'unitedthemes' ),
            'param_name'        => 'delay_timer',
            'group'             => 'Animation',
            'edit_field_class'  => 'vc_col-sm-6',
            'dependency'        => array(
                'element' => 'delay',
                'value'   => 'true',
            )
        ),   
    
    );

}

vc_add_params( 'vc_row', _vc_add_animation_settings_to_vc_column() );
vc_add_params( 'vc_column', _vc_add_animation_settings_to_vc_column() );
vc_add_params( 'vc_row_inner', _vc_add_animation_settings_to_vc_column() );
vc_add_params( 'vc_column_inner', _vc_add_animation_settings_to_vc_column() );