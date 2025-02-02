<?php if ( ! defined( 'OT_VERSION' ) ) exit( 'No direct script access allowed' );

/**
 * Builds the HTML for each of the available option types by calling those
 * function with call_user_func and passing the arguments to the second param.
 *
 * All fields are required!
 *
 * @param     array       $args The array of arguments are as follows:
 * @param     string      $type Type of option.
 * @param     string      $field_id The field ID.
 * @param     string      $field_name The field Name.
 * @param     mixed       $field_value The field value is a string or an array of values.
 * @param     string      $field_desc The field description.
 * @param     string      $field_std The standard value.
 * @param     string      $field_class Extra CSS classes.
 * @param     array       $field_choices The array of option choices.
 * @param     array       $field_settings The array of settings for a list item.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_display_by_type' ) ) {

    function ot_display_by_type( $args = array() ) {
    
        /* allow filters to be executed on the array */
        $args = apply_filters( 'ot_display_by_type', $args );
    
        /* build the function name */
        $function_name_by_type = str_replace( '-', '_', 'ot_type_' . $args['type'] );
    
        /* call the function & pass in arguments array */
        if ( function_exists( $function_name_by_type ) ) {
        
            call_user_func( $function_name_by_type, $args );
            
        } else {
            
            echo '<p>' . __( 'Sorry, this function does not exist', 'option-tree' ) . '</p>';
            
        }
    
    }
  
}

/**
 * Background Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_background' ) ) {
  
    function ot_type_background( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
            
        /* fallback if field was an upload field before */
        if( !is_array( $field_value ) && !empty( $field_value )  ) {
            
            /* store image url first */
            $background = $field_value;
            
            $field_value = array(
                'background-image'      => $background,
                'background-repeat'     => 'no-repeat',
                'background-attachment' => '',
                'background-position'   => '',
                'background-size'       => 'cover'
            );
                    
        }
    
        echo '<div class="ut-ui-select-group clearfix">';
        
            /* build background repeat */
            $background_repeat = isset( $field_value['background-repeat'] ) ? esc_attr( $field_value['background-repeat'] ) : '';

            echo '<div class="ut-ui-select-field">';
            
                echo '<select name="' . esc_attr( $field_name ) . '[background-repeat]" id="' . esc_attr( $field_id ) . '-repeat" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';
                    
                    echo '<option value="">' . __( 'background-repeat', 'option-tree' ) . '</option>';
                    
                    foreach ( ot_recognized_background_repeat( $field_id ) as $key => $value ) {
                        echo '<option value="' . esc_attr( $key ) . '" ' . selected( $background_repeat, $key, false ) . '>' . esc_attr( $value ) . '</option>';
                    }
                    
                echo '</select>';
            
            echo '</div>';
            
            
            /* build background attachment */
            $background_attachment = isset( $field_value['background-attachment'] ) ? esc_attr( $field_value['background-attachment'] ) : '';
            
            echo '<div class="ut-ui-select-field">';
            
                echo '<select name="' . esc_attr( $field_name ) . '[background-attachment]" id="' . esc_attr( $field_id ) . '-attachment" class="ut-ui-form-select ut-ui-select ' . $field_class . '">';
    
                    echo '<option value="">' . __( 'background-attachment', 'option-tree' ) . '</option>';
                    
                    foreach ( ot_recognized_background_attachment( $field_id ) as $key => $value ) {
                      echo '<option value="' . esc_attr( $key ) . '" ' . selected( $background_attachment, $key, false ) . '>' . esc_attr( $value ) . '</option>';
                    }
                    
                echo '</select>';
            
            echo '</div>';
            
                      
            /* build background position */
            $background_position = isset( $field_value['background-position'] ) ? esc_attr( $field_value['background-position'] ) : '';
            
            echo '<div class="ut-ui-select-field">';
            
                echo '<select name="' . esc_attr( $field_name ) . '[background-position]" id="' . esc_attr( $field_id ) . '-position" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';
                
                    echo '<option value="">' . __( 'background-position', 'option-tree' ) . '</option>';
                    
                    foreach ( ot_recognized_background_position( $field_id ) as $key => $value ) {
                        echo '<option value="' . esc_attr( $key ) . '" ' . selected( $background_position, $key, false ) . '>' . esc_attr( $value ) . '</option>';
                    }
              
                echo '</select>';
            
            echo '</div>';            
            
            
            /* build background size */
            $background_size = isset( $field_value['background-size'] ) ? esc_attr( $field_value['background-size'] ) : '';
            
            echo '<div class="ut-ui-select-field">';
            
                echo '<select name="' . esc_attr( $field_name ) . '[background-size]" id="' . esc_attr( $field_id ) . '-size" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';
                
                    echo '<option value="">' . __( 'background-size', 'option-tree' ) . '</option>';
                    
                    foreach ( ot_recognized_background_size( $field_id ) as $key => $value ) {
                        echo '<option value="' . esc_attr( $key ) . '" ' . selected( $background_size, $key, false ) . '>' . esc_attr( $value ) . '</option>';
                    }
                    
                echo '</select>';
            
            echo '</div>';
            
            
        echo '</div>'; 
        
        echo '<div class="ut-ui-upload-parent">';
          
            /* input */
            echo '<input type="text" name="' . esc_attr( $field_name ) . '[background-image]" id="' . esc_attr( $field_id ) . '" value="' . ( isset( $field_value['background-image'] ) ? esc_attr( $field_value['background-image'] ) : '' ) . '" class="ut-ui-form-input ut-ui-upload-input ' . esc_attr( $field_class ) . '" />';
          
            /* add media button */
            echo '<button class="ut-media-upload ut-ui-button" rel="' . $post_id . '" title="' . __( 'Add Media', 'option-tree' ) . '">' . __( 'Add Media', 'option-tree' ) . '</button>';
        
        echo '</div>';
        
        /* media */
        if ( isset( $field_value['background-image'] ) && $field_value['background-image'] !== '' ) {
        
            echo '<div id="' . esc_attr( $field_id ) . '_media" class="ut-ui-media-wrap">';

                if ( preg_match( '/\.(?:jpe?g|png|gif|ico)$/i', $field_value['background-image'] ) ) {
                    echo '<div class="ut-ui-image-wrap"><img src="' . esc_url( $field_value['background-image'] ) . '" alt="" /></div><div class="clear"></div>';
                }
                
                echo '<button class="ut-ui-remove-media ut-ui-button" title="' . __( 'X', 'option-tree' ) . '">' . __( 'X', 'option-tree' ) . '</button>';
            
            echo '</div>';
          
        }
    
    }
  
}


/**
 * Category Checkbox Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_category_checkbox' ) ) {
  
    function ot_type_category_checkbox( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
      
        /* get category array */
        $categories = get_categories( array( 'hide_empty' => false ) );
        
        /* build categories */
        if ( ! empty( $categories ) ) {
            
            foreach ( $categories as $category ) {

                echo '<label for="' . esc_attr( $field_id ) . '-' . esc_attr( $category->term_id ) . '">' . esc_attr( $category->name ) . '</label>';
                echo '<input type="checkbox" name="' . esc_attr( $field_name ) . '[' . esc_attr( $category->term_id ) . ']" id="' . esc_attr( $field_id ) . '-' . esc_attr( $category->term_id ) . '" value="' . esc_attr( $category->term_id ) . '" ' . ( isset( $field_value[$category->term_id] ) ? checked( $field_value[$category->term_id], $category->term_id, false ) : '' ) . ' class="ut-ui-form-checkbox ut-ui-checkbox ' . esc_attr( $field_class ) . '" />';
            
            } 
            
        } else {
          
          echo '<p>' . __( 'No Categories Found', 'option-tree' ) . '</p>';
          
        }
    
    }
  
}


/**
 * Category Select Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_category_select' ) ) {
  
    function ot_type_category_select( $args = array() ) {
    
        extract( $args );
        
        echo '<div class="ut-ui-select-field">';
            
            echo '<select name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="ut-ui-form-select ut-ui-select ' . $field_class . '">';
            
            /* get category array */
            $categories = get_categories( array( 'hide_empty' => false ) );
            
            /* has cats */
            if ( ! empty( $categories ) ) {
                
                echo '<option value="">-- ' . esc_html__( 'Choose One', 'option-tree' ) . ' --</option>';
                
                foreach ( $categories as $category ) {
                    
                    echo '<option value="' . esc_attr( $category->term_id ) . '"' . selected( $field_value, $category->term_id, false ) . '>' . esc_attr( $category->name ) . '</option>';
                
                }            
            
            } else {
            
              echo '<option value="">' . __( 'No Categories Found', 'option-tree' ) . '</option>';
            
            }
            
            echo '</select>';
        
        echo '</div>';
    
    }
  
}

/**
 * Checkbox Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_checkbox' ) ) {
  
    function ot_type_checkbox( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );    

        /* build checkbox */
        foreach ( (array) $field_choices as $key => $choice ) {
            
            if ( isset( $choice['value'] ) && isset( $choice['label'] ) ) {
                
                echo '<div class="ut-ui-form-checkbox-wrap clearfix">';    
                    echo '<label for="' . esc_attr( $field_id ) . '-' . esc_attr( $key ) . '">' . esc_attr( $choice['label'] ) . '</label>';
                    echo '<input type="checkbox" name="' . esc_attr( $field_name ) . '[' . esc_attr( $key ) . ']" id="' . esc_attr( $field_id ) . '-' . esc_attr( $key ) . '" value="' . esc_attr( $choice['value'] ) . '" ' . ( isset( $field_value[$key] ) ? checked( $field_value[$key], $choice['value'], false ) : '' ) . ' class="ut-ui-form-checkbox ut-ui-checkbox ' . esc_attr( $field_class ) . '" />';                
                echo '</div>';
                
            }
            
        }
    
    }
  
}

/**
 * Colorpicker Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_colorpicker' ) ) {
  
    function ot_type_colorpicker( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
        
        /* input */          
        echo '<div class="ut-minicolors-wrap">';
            
            echo '<input data-mode="' . esc_attr( $field_mode ) . '" type="text" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" value="' . esc_attr( $field_value ) . '" class="ut-ui-form-input ut-minicolors minicolors-input ut-color-mode-' . esc_attr( $field_mode ) . ' ' . esc_attr( $field_class ) . '" autocomplete="off" />';                  
            echo '<span class="ut-minicolors-swatch" style="background-color:' . esc_attr( $field_value ) . ';"></span>';            
            
        echo '</div>';

    
    }
  
}

/**
 * Colorpicker Option Type. Connect to WordPress Customizer
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_colorpicker_customizer' ) ) {
  
    function ot_type_colorpicker_customizer( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
    
        /* get value from WordPress Customizer */
        $field_value = get_option($field_id , '#F1C40F');    
        
        /* input */
        echo '<div class="ut-minicolors-wrap">';
        
            echo '<input data-mode="' . esc_attr( $field_mode ) . '" type="text" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" value="' . esc_attr( $field_value ) . '" class="ut-ui-form-input ut-minicolors minicolors-input ut-color-mode-' . esc_attr( $field_mode ) . ' ' . esc_attr( $field_class ) . '" autocomplete="off" />';                  
            echo '<span class="ut-minicolors-swatch" style="background-color:' . esc_attr( $field_value ) . ';"></span>';            
            
        echo '</div>';
        
    }
  
}




/**
 * Iconpicker Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     4.1
 */
if ( ! function_exists( 'ot_type_iconpicker' ) ) {
  
    function ot_type_iconpicker( $args = array() ) {
        
        /* turns arguments array into variables */
        extract( $args );
                
        if( function_exists('ut_recognized_icons') ) {
                                    
            echo '<select class="ut-ui-form-select ut-icon-select" id="' , esc_attr( $field_id ) , '" name="' , esc_attr( $field_name ) , '">';
                
                echo '<option value="">' . esc_html__('Select Icon','unitedthemes') . '</option>';
                
                foreach( ut_recognized_icons() as $key => $icon ) {
    
                     echo '<option value="fa ' , $icon , '" ' , selected( $field_value, 'fa ' . $icon, false ) , '>' , 'fa ' , $icon , '</option>';
                
                }
            
            echo '</select>';
        
        }
        
    }

}




/**
 * Button Builder Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_button_builder' ) ) {
  
    function ot_type_button_builder( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
        
        echo '<div class="ut-button-builder">';
                        
            /* build colorpicker for button color */  
            echo '<div class="ut-minicolors-wrap">';
              
              /* input */
              echo '<label for="' . esc_attr( $field_id ) . '_color">' . __('Button Background Color' , 'unitedthemes') . '</label><br />';          
              echo '<input data-mode="rgb" maxlength="7" type="text" name="' . esc_attr( $field_name ) . '[color]" id="' . esc_attr( $field_id ) . '_color" value="' . ( isset( $field_value['color'] ) ? esc_attr( $field_value['color'] ) : '' ) . '" class="ut-ui-form-input ut-minicolors ' . esc_attr( $field_class ) . '" autocomplete="off" />';
              
            echo '</div>';
            
            /* build colorpicker for button hover color */  
            echo '<div class="ut-minicolors-wrap">';
                        
              /* input */
              echo '<label for="' . esc_attr( $field_id ) . '_hover_color">' . __('Button Background Hover Color' , 'unitedthemes') . '</label><br />';
              echo '<input data-mode="rgb" maxlength="7" type="text" name="' . esc_attr( $field_name ) . '[hover_color]" id="' . esc_attr( $field_id ) . '_hover_color" value="' . ( isset( $field_value['hover_color'] ) ? esc_attr( $field_value['hover_color'] ) : '' ) . '" class="ut-ui-form-input ut-minicolors ' . esc_attr( $field_class ) . '" autocomplete="off" />';
    
            echo '</div>';
            
            /* build colorpicker for button text color */  
            echo '<div class="ut-minicolors-wrap">';
              
              /* input */
              echo '<label for="' . esc_attr( $field_id ) . '_text_color">' . __('Button Text Color' , 'unitedthemes') . '</label><br />';
              echo '<input data-mode="rgb" maxlength="7" type="text" name="' . esc_attr( $field_name ) . '[text_color]" id="' . esc_attr( $field_id ) . '_text_color" value="' . ( isset( $field_value['text_color'] ) ? esc_attr( $field_value['text_color'] ) : '' ) . '" class="ut-ui-form-input ut-minicolors ' . esc_attr( $field_class ) . '" autocomplete="off" />';
              
            echo '</div>';
            
            /* build colorpicker for button text hover color */  
            echo '<div class="ut-minicolors-wrap">';
                        
              /* input */
              echo '<label for="' . esc_attr( $field_id ) . '_text_hover_color">' . __('Button Text Hover Color' , 'unitedthemes') . '</label><br />';
              echo '<input data-mode="rgb" maxlength="7" type="text" name="' . esc_attr( $field_name ) . '[text_hover_color]" id="' . esc_attr( $field_id ) . '_text_hover_color" value="' . ( isset( $field_value['text_hover_color'] ) ? esc_attr( $field_value['text_hover_color'] ) : '' ) . '" class="ut-ui-form-input ut-minicolors ' . esc_attr( $field_class ) . '" autocomplete="off" />';
              
            echo '</div>';
            
            echo '<div class="ut-numeric-slider-outer-wrap">';
            
                echo '<label for="' . esc_attr( $field_id ) . '_border_radius">' . __('Button Border Radius' , 'unitedthemes') . '</label>';
                
                echo '<div class="ut-numeric-slider-wrap">';
                        
                    echo '<input autocomplete="off" type="hidden" name="' . esc_attr( $field_name ) . '[border_radius]" id="' . esc_attr( $field_id ) . '_border_radius" class="ut-numeric-slider-hidden-input" value="' . ( isset( $field_value['border_radius'] ) ? esc_attr( $field_value['border_radius'] ) : '' ) . '" data-min="0" data-max="50" data-step="1">';
        
                    echo '<input data-min="0" data-max="50" type="input" class="ut-ui-form-input ut-numeric-slider-helper-input" data-tooltip="' . esc_html( 'Max Value:', 'unitedthemes' ) . ' 50" value="' . ( isset( $field_value['border_radius'] ) ? esc_attr( $field_value['border_radius'] ) : '' ) . '" autocomplete="off">';
                    echo '<div id="ut_numeric_slider_' . esc_attr( $field_id ) . '_border_radius" class="ut-numeric-slider ui-slider ui-slider-horizontal"></div>';
        
                echo '</div>';
            
            echo '</div>';
           
            /* build colorpicker for button border color */  
            echo '<div class="ut-minicolors-wrap">';
                        
              /* input */
              echo '<label for="' . esc_attr( $field_id ) . '_border_color">' . __('Button Border Color' , 'unitedthemes') . '</label><br />';
              echo '<input data-mode="rgb" maxlength="7" type="text" name="' . esc_attr( $field_name ) . '[border_color]" id="' . esc_attr( $field_id ) . '_border_color" value="' . ( isset( $field_value['border_color'] ) ? esc_attr( $field_value['border_color'] ) : '' ) . '" class="ut-ui-form-input ut-minicolors ' . esc_attr( $field_class ) . '" autocomplete="off" />';
    
            echo '</div>';
            
            
            /* build colorpicker for button text hover color */  
            echo '<div class="ut-minicolors-wrap">';
                        
              /* input */
              echo '<label for="' . esc_attr( $field_id ) . '_border_hover_color">' . __('Button Border Hover Color' , 'unitedthemes') . '</label><br />';
              echo '<input data-mode="rgb" maxlength="7" type="text" name="' . esc_attr( $field_name ) . '[border_hover_color]" id="' . esc_attr( $field_id ) . '_border_hover_color" value="' . ( isset( $field_value['border_hover_color'] ) ? esc_attr( $field_value['border_hover_color'] ) : '' ) . '" class="ut-ui-form-input ut-minicolors ' . esc_attr( $field_class ) . '" autocomplete="off" />';
              
            echo '</div>';        
           
            
            if( function_exists('ut_recognized_icons') ) {
                
                echo '<div class="ut-iconpicker-wrap">';
                
                    echo '<label for="' . esc_attr( $field_id ) . '_icon">' . __('Button Icon' , 'unitedthemes') . '</label><br />';
                                            
                    echo '<select class="ut-ui-form-select ut-icon-select" id="' , esc_attr( $field_id ) , '_icon" name="' , esc_attr( $field_name ) , '[icon]">';
                        
                        echo '<option value="">' . esc_html__('Select Icon','unitedthemes') . '</option>';
                        
                        $field_value = !empty( $field_value['icon'] ) ? $field_value['icon'] : '';
                                    
                        foreach( ut_recognized_icons() as $key => $icon ) {
                            
                            echo '<option value="fa ' , $icon , '" ' , selected( $field_value, 'fa ' . $icon, false ) , '>' , 'fa ' , $icon , '</option>';
                        
                        }
                    
                    echo '</select>';
                
                echo '</div>';
            
            }
                    
            echo '<div class="clear"></div>';
            
            echo '<div class="ut-single-options-wrap">';
            
                $font_size = isset( $field_value['font-size'] ) ? esc_attr( $field_value['font-size'] ) : '';
                    
                echo '<label for="' . esc_attr( $field_id ) . '-font-size">' . __('Button Font Size' , 'unitedthemes') . '</label><br />';
                
                echo '<div class="ut-ui-select-field">';
                    
                    echo '<select name="' . esc_attr( $field_name ) . '[font-size]" id="' . esc_attr( $field_id ) . '-font-size" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';
                        
                        echo '<option value="">font-size</option>';
                        
                        foreach( ot_recognized_font_sizes( $field_id ) as $option ) { 
                            
                            echo '<option value="' . esc_attr( $option ) . '" ' . selected( $font_size, $option, false ) . '>' . esc_attr( $option ) . '</option>';
                            
                        }
                        
                    echo '</select>';
                
                echo '</div>';
            
            echo '</div>';
            
            
            echo '<div class="ut-single-options-wrap">';
            
                $text_transform = isset( $field_value['text-transform'] ) ? esc_attr( $field_value['text-transform'] ) : '';
                
                echo '<label for="' . esc_attr( $field_id ) . '-text-transform">' . __('Button Text Transform' , 'unitedthemes') . '</label><br />';
                
                echo '<div class="ut-ui-select-field">';
                
                    echo '<select name="' . esc_attr( $field_name ) . '[text-transform]" id="' . esc_attr( $field_id ) . '-text-transform" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';
                       
                       echo '<option value="">text-transform</option>';
                       
                       foreach ( ot_recognized_text_transformations( $field_id ) as $key => $value ) {
                       
                         echo '<option value="' . esc_attr( $key ) . '" ' . selected( $text_transform, $key, false ) . '>' . esc_attr( $value ) . '</option>';
                       }
                       
                       
                    echo '</select>';
              
                echo '</div>';
            
            echo '</div>';
            
            echo '<div class="clear"></div>';
            
        echo '</div>';
    
    }
  
}

/**
 * CSS Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     4.1
 */
if ( ! function_exists( 'ot_type_css' ) ) {
  
    function ot_type_css( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
        
        /* build textarea for CSS */
        echo '<div data-mode="css" data-id="' , esc_attr( $field_id ) , '" id="' , esc_attr( $field_id ) , '_ace" class="ut-ace-css-editor">' , esc_attr( $field_value ) , '</div>';
        echo '<textarea class="ut-full-width ut-hide ut-ace-textarea ' . esc_attr( $field_class ) . '" rows="40" name="' . esc_attr( $field_name ) .'" id="' . esc_attr( $field_id ) . '">' . esc_textarea( $field_value ) . '</textarea>';
    
    }
  
}

/**
 * Custom Editor Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     4.1
 */
if ( ! function_exists( 'ot_type_custom_editor' ) ) {
  
    function ot_type_custom_editor( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
    
        /* build textarea for Editor */
        echo '<div class="ut-custom-editor">';
            
            echo '<div class="wp-editor-tabs">
                <button type="button" id="content-tmce" class="wp-switch-editor switch-tmce" data-wp-editor-id="content">Visual</button>
                <button type="button" id="content-html" class="wp-switch-editor switch-html" data-wp-editor-id="content">Text</button>
            </div><div class="clear"></div>';
            
            
                 
            echo '<textarea class="' . esc_attr( $field_class ) . '" rows="40" name="' . esc_attr( $field_name ) .'" id="' . esc_attr( $field_id ) . '">' . esc_textarea( $field_value ) . '</textarea>';
            
        echo '</div>';
    
    }
  
}


/**
 * Custom Post Type Checkbox Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_custom_post_type_checkbox' ) ) {
    
    function ot_type_custom_post_type_checkbox( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
        
        /* setup the post types */
        $post_type = isset( $field_post_type ) ? explode( ',', $field_post_type ) : array( 'post' );

        /* query posts array */
        $my_posts = get_posts( apply_filters( 'ot_type_custom_post_type_checkbox_query', array( 'post_type' => $post_type, 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC', 'post_status' => 'any' ), $field_id ) );

        /* has posts */
        if ( is_array( $my_posts ) && ! empty( $my_posts ) ) {

            foreach( $my_posts as $my_post ){

                echo '<p>';
                    echo '<input type="checkbox" name="' . esc_attr( $field_name ) . '[' . esc_attr( $my_post->ID ) . ']" id="' . esc_attr( $field_id ) . '-' . esc_attr( $my_post->ID ) . '" value="' . esc_attr( $my_post->ID ) . '" ' . ( isset( $field_value[$my_post->ID] ) ? checked( $field_value[$my_post->ID], $my_post->ID, false ) : '' ) . ' class="ut-ui-form-checkbox ut-ui-checkbox ' . esc_attr( $field_class ) . '" />';
                    echo '<label for="' . esc_attr( $field_id ) . '-' . esc_attr( $my_post->ID ) . '">' . $my_post->post_title . '</label>';
                echo '</p>';
            
            }
            
        } else {
          
          echo '<p>' . __( 'No Posts Found', 'option-tree' ) . '</p>';
          
        }
    
    }
  
}

/**
 * Custom Post Type Select Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_custom_post_type_select' ) ) {
  
    function ot_type_custom_post_type_select( $args = array() ) {

        /* turns arguments array into variables */
        extract( $args );
        
        echo '<div class="ut-ui-select-field">';
        
            /* build category */
            echo '<select name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="ut-ui-form-select ut-ui-select ' . $field_class . '">';
            
                /* setup the post types */
                $post_type = isset( $field_post_type ) ? explode( ',', $field_post_type ) : array( 'post' );
            
                /* query posts array */
                $my_posts = get_posts( apply_filters( 'ot_type_custom_post_type_select_query', array( 'post_type' => $post_type, 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC', 'post_status' => 'any' ), $field_id ) );
            
                /* has posts */
                if ( is_array( $my_posts ) && ! empty( $my_posts ) ) {
                    
                    echo '<option value="">-- ' . __( 'Choose One', 'option-tree' ) . ' --</option>';
                    
                    foreach( $my_posts as $my_post ){
                        echo '<option value="' . esc_attr( $my_post->ID ) . '"' . selected( $field_value, $my_post->ID, false ) . '>' . esc_attr( $my_post->post_title ) . '</option>';
                    }
            
                } else {
                
                    echo '<option value="">' . __( 'No Posts Found', 'option-tree' ) . '</option>';
              
                }
            
            echo '</select>';
        
        echo '</div>';
    
    }
  
}

/**
 * List Item Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_list_item' ) ) {
  
    function ot_type_list_item( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
        
        /* pass the settings array arround */
        echo '<input type="hidden" name="' . esc_attr( $field_id ) . '_settings_array" id="' . esc_attr( $field_id ) . '_settings_array" value="' . ot_encode( serialize( $field_settings ) ) . '" />';
        
        /** 
         * settings pages have array wrappers like 'option_tree'.
         * So we need that value to create a proper array to save to.
         * This is only for NON metaboxes settings.
         */
        if ( ! isset( $get_option ) ) {
            $get_option = '';
        }
          
        /* build list items */
        echo '<ul class="ut-sortable" data-list-title="' . $field_list_title . '" data-name="' . esc_attr( $field_id ) . '" data-id="' . esc_attr( $post_id ) . '" data-get-option="' . esc_attr( $get_option ) . '" data-type="' . esc_attr( $type ) . '">';
        
            if ( is_array( $field_value ) && ! empty( $field_value ) ) {
            
                foreach( $field_value as $key => $list_item ) {
                    
                    if( array_filter($list_item) ) {
                        
                        echo '<li class="ui-state-default list-list-item">';
                        
                            ot_list_item_view( $field_id, $key, $list_item, $post_id, $get_option, $field_settings, $type, $field_list_title );
                            
                        echo '</li>';
                        
                    }
                    
                }
              
            }
        
        echo '</ul>';
        
        /* button */
        echo '<button class="ut-list-item-add ut-ui-button" title="' . __( 'Add New', 'option-tree' ) . '">' . __( 'Add New', 'option-tree' ) . '</button>';

    
    }
  
}

/**
 * Numeric Slider Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.1
 */
if( ! function_exists( 'ot_type_numeric_slider' ) ) {

    function ot_type_numeric_slider( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
        
        $_options = explode( ',', $field_min_max_step );
        $min  = isset( $_options[0] ) ? $_options[0] : 0;
        $max  = isset( $_options[1] ) ? $_options[1] : 100;
        $step = isset( $_options[2] ) ? $_options[2] : 1;
        
        // field value cannot be smaller than min
        $field_value = $field_value < $min ? $min : $field_value;
        
        echo '<div class="ut-numeric-slider-wrap ' . $field_class . '">';

            echo '<input autocomplete="off" type="hidden" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="ut-numeric-slider-hidden-input" value="' . esc_attr( $field_value ) . '" data-min="' . esc_attr( $min ) . '" data-max="' . esc_attr( $max ) . '" data-step="' . esc_attr( $step ) . '">';

            echo '<input data-min="' . esc_attr( $min ) . '" data-max="' . esc_attr( $max ) . '" type="input" class="ut-ui-form-input ut-numeric-slider-helper-input" data-tooltip="' . esc_html( 'Max Value:', 'unitedthemes' ) . ' ' . esc_attr( $max ) . '" value="' . esc_attr( $field_value ) . '" autocomplete="off">';
            echo '<div id="ut_numeric_slider_' . esc_attr( $field_id ) . '" class="ut-numeric-slider ui-slider ui-slider-horizontal"></div>';

        echo '</div>';
      

  }

}

/**
 * Page Checkbox Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_page_checkbox' ) ) {
  
    function ot_type_page_checkbox( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );

        /* query pages array */
        $my_posts = get_posts( apply_filters( 'ot_type_page_checkbox_query', array( 'post_type' => array( 'page' ), 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC', 'post_status' => 'any' ), $field_id ) );

        /* has pages */
        if ( is_array( $my_posts ) && ! empty( $my_posts ) ) {
        
            foreach( $my_posts as $my_post ){
                
                echo '<p>';
                    echo '<input type="checkbox" name="' . esc_attr( $field_name ) . '[' . esc_attr( $my_post->ID ) . ']" id="' . esc_attr( $field_id ) . '-' . esc_attr( $my_post->ID ) . '" value="' . esc_attr( $my_post->ID ) . '" ' . ( isset( $field_value[$my_post->ID] ) ? checked( $field_value[$my_post->ID], $my_post->ID, false ) : '' ) . ' class="ut-ui-form-checkbox ut-ui-checkbox ' . esc_attr( $field_class ) . '" />';
                    echo '<label for="' . esc_attr( $field_id ) . '-' . esc_attr( $my_post->ID ) . '">' . $my_post->post_title . '</label>';
                echo '</p>';
                
            }
        
        } else {
            
            echo '<p>' . __( 'No Pages Found', 'option-tree' ) . '</p>';
            
        }      

    }
  
}

/**
 * Page Select Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_page_select' ) ) {
  
    function ot_type_page_select( $args = array() ) {

        /* turns arguments array into variables */
        extract( $args );
        
        echo '<div class="ut-ui-select-field">';
        
            /* build page select */
            echo '<select name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="ut-ui-form-select ut-ui-select ' . $field_class . '">';
            
            /* query pages array */
            $my_posts = get_posts( apply_filters( 'ot_type_page_select_query', array( 'post_type' => array( 'page' ), 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC', 'post_status' => 'any' ), $field_id ) );
            
            /* has pages */
            if ( is_array( $my_posts ) && ! empty( $my_posts ) ) {
                
                echo '<option value="">-- ' . __( 'Choose One', 'option-tree' ) . ' --</option>';
                
                foreach( $my_posts as $my_post ) {
                
                    echo '<option value="' . esc_attr( $my_post->ID ) . '"' . selected( $field_value, $my_post->ID, false ) . '>' . esc_attr( $my_post->post_title ) . '</option>';
                    
                }
                
            } else {
              
              echo '<option value="">' . __( 'No Pages Found', 'option-tree' ) . '</option>';
              
            }
            
            echo '</select>';
        
        echo '</div>';
    
    }
  
}


/**
 * Section Select Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_section_select' ) ) {
  
    function ot_type_section_select( $args = array() ) {

        /* turns arguments array into variables */
        extract( $args );
          
        /* only query pages which are sections */
        if ( has_nav_menu( 'primary' ) ) {
            
            $args = ut_prepare_front_query();
            
            echo '<div class="ut-ui-select-field">';
                  
                /* build page select */
                echo '<select name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="ut-ui-form-select ut-ui-select ' . $field_class . '">';
                
                    echo '<option value="">-- ' . __( 'Choose One', 'option-tree' ) . ' --</option>';
                    
                    /* query pages array */
                    $my_posts = get_posts( apply_filters( 'ot_type_page_select_query', $args , $field_id ) );
                    
                    /* has pages */
                    if ( is_array( $my_posts ) && ! empty( $my_posts ) ) {
                        
                        foreach( $my_posts as $my_post ) {
                        
                            echo '<option value="' . esc_attr( $my_post->ID ) . '"' . selected( $field_value, $my_post->ID, false ) . '>' . esc_attr( $my_post->post_title ) . '</option>';
                            
                        }
                    
                    } else {
                      
                      echo '<option value="">' . __( 'No Pages Found', 'option-tree' ) . '</option>';
                      
                    }
                
                echo '</select>';
            
            echo '</div>';
            
        } else {
        
            echo _e( 'Information: There are no Pages are assigned to the menu yet or the assigned pages are not set to menutype "Section"! Please read the delivered documentation carefully. We recommend to start with the "Start from Scratch Setup" documentation part.' , 'unitedthemes' );
        
        }
    
    }
  
}


/**
 * List Item Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_slider' ) ) {
  
    function ot_type_slider( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
        
        /* pass the settings array arround */
        echo '<input type="hidden" name="' . esc_attr( $field_id ) . '_settings_array" id="' . esc_attr( $field_id ) . '_settings_array" value="' . ot_encode( serialize( $field_settings ) ) . '" />';
        
        /** 
         * settings pages have array wrappers like 'option_tree'.
         * So we need that value to create a proper array to save to.
         * This is only for NON metaboxes settings.
         */
        if ( ! isset( $get_option ) ) {
            $get_option = '';
        }
          
        /* build list items */
        echo '<ul class="ut-sortable" data-name="' . esc_attr( $field_id ) . '" data-id="' . esc_attr( $post_id ) . '" data-get-option="' . esc_attr( $get_option ) . '" data-type="' . esc_attr( $type ) . '">';
        
            if ( is_array( $field_value ) && ! empty( $field_value ) ) {
            
                foreach( $field_value as $key => $list_item ) {
                
                    echo '<li class="ui-state-default list-list-item">';
                      
                      ot_list_item_view( $field_id, $key, $list_item, $post_id, $get_option, $field_settings, $type );
                      
                    echo '</li>';
                
                }
              
            }
        
        echo '</ul>';
        
        /* button */
        echo '<button class="ut-list-item-add ut-ui-button" title="' . __( 'Add New', 'option-tree' ) . '">' . __( 'Add New', 'option-tree' ) . '</button>';
        
        /* description */
        echo '<div class="list-item-description">' . __( 'You can re-order with drag & drop, the order will update after saving.', 'option-tree' ) . '</div>';
    
    }
  
}

/**
 * Post Checkbox Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_post_checkbox' ) ) {
  
    function ot_type_post_checkbox( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
        
        /* query posts array */
        $my_posts = get_posts( apply_filters( 'ot_type_post_checkbox_query', array( 'post_type' => array( 'post' ), 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC', 'post_status' => 'any' ), $field_id ) );
        
        /* has posts */
        if ( is_array( $my_posts ) && ! empty( $my_posts ) ) {
            
            foreach( $my_posts as $my_post ){
                
                echo '<p>';
                    echo '<input type="checkbox" name="' . esc_attr( $field_name ) . '[' . esc_attr( $my_post->ID ) . ']" id="' . esc_attr( $field_id ) . '-' . esc_attr( $my_post->ID ) . '" value="' . esc_attr( $my_post->ID ) . '" ' . ( isset( $field_value[$my_post->ID] ) ? checked( $field_value[$my_post->ID], $my_post->ID, false ) : '' ) . ' class="ut-ui-form-checkbox ut-ui-checkbox ' . esc_attr( $field_class ) . '" />';
                    echo '<label for="' . esc_attr( $field_id ) . '-' . esc_attr( $my_post->ID ) . '">' . esc_attr( $my_post->post_title ) . '</label>';
                echo '</p>';
                
            } 
        
        } else {
            
            echo '<p>' . __( 'No Posts Found', 'option-tree' ) . '</p>';
            
        }
    
    }
  
}

/**
 * Post Select Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_post_select' ) ) {
  
    function ot_type_post_select( $args = array() ) {

        /* turns arguments array into variables */
        extract( $args );
        
        echo '<div class="ut-ui-select-field">';
      
            /* build page select */
            echo '<select name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="ut-ui-form-select ut-ui-select ' . $field_class . '">';
            
                /* query posts array */
                $my_posts = get_posts( apply_filters( 'ot_type_post_select_query', array( 'post_type' => array( 'post' ), 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC', 'post_status' => 'any' ), $field_id ) );
            
                /* has posts */
                if ( is_array( $my_posts ) && ! empty( $my_posts ) ) {
                
                    echo '<option value="">-- ' . __( 'Choose One', 'option-tree' ) . ' --</option>';
                  
                    foreach( $my_posts as $my_post ){
                        
                        echo '<option value="' . esc_attr( $my_post->ID ) . '"' . selected( $field_value, $my_post->ID, false ) . '>' . esc_attr( $my_post->post_title ) . '</option>';
                        
                    }
                  
                } else {
                  
                    echo '<option value="">' . __( 'No Posts Found', 'option-tree' ) . '</option>';
                  
                }
            
            echo '</select>';
        
        echo '</div>';
    
    }
  
}

/**
 * Radio Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_radio' ) ) {
  
    function ot_type_radio( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
      
        /* build radio */
        foreach ( (array) $field_choices as $key => $choice ) {
            
            echo '<p><input type="radio" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '-' . esc_attr( $key ) . '" value="' . esc_attr( $choice['value'] ) . '"' . checked( $field_value, $choice['value'], false ) . ' class="ut-ui-form-radio ut-ui-radio ' . esc_attr( $field_class ) . '" /><label for="' . esc_attr( $field_id ) . '-' . esc_attr( $key ) . '">' . esc_attr( $choice['label'] ) . '</label></p>';
            
        }
    
    }
  
}

/**
 * Radio Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_radio_group' ) ) {
  
    function ot_type_radio_group( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
        
        /* format setting inner wrapper */
        echo '<div class="ut-ui-radio-group" data-group="' . esc_attr( $field_name ) . '">';
      
        /* build radio */
        foreach ( (array) $field_choices as $key => $choice ) {
            
            echo '<p><input data-for="' . esc_attr( implode(',' , $choice['for'] ) ) . '" type="radio" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '-' . esc_attr( $key ) . '" value="' . esc_attr( $choice['value'] ) . '"' . checked( $field_value, $choice['value'], false ) . ' class="ut-ui-form-radio ut-ui-radio ' . esc_attr( $field_class ) . ' ' . ( isset($field_toplevel) && $field_toplevel ? 'ut-toplevel-radio-option' : '' ) . '" /><label for="' . esc_attr( $field_id ) . '-' . esc_attr( $key ) . '">' . esc_attr( $choice['label'] ) . '</label></p>';
            
        }
      
        echo '</div>';
    
    }
  
}

if ( ! function_exists( 'ot_type_radio_group_button' ) ) {
  
    function ot_type_radio_group_button( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
                
        /* format setting inner wrapper */
        echo '<div class="ut-ui-radio-group" data-group="' . esc_attr( $field_name ) . '">';
        
            /* build buttons */
            echo '<div class="ut-radio-button-group">';
                
                foreach ( (array) $field_choices as $key => $choice ) {
                    
                    $custom_class = !empty( $choice['class'] ) ? $choice['class'] : '';
                    $selected = ( $field_value == $choice['value'] ) ? 'selected' : '';
                    
                    echo '<a href="#" data-for="' . esc_attr( $field_id ) . '-' . esc_attr( $key ) . '" title="' . esc_attr( $choice['label'] ) . '" class="ut-radio-button '.$selected.' '.$custom_class.'">' . esc_attr( $choice['label'] ) . '</a>';  
                  
                }
                  
            echo '</div>';
        
            /* build radio */
            foreach ( (array) $field_choices as $key => $choice ) {
                
                echo '<p class="ut-hide"><input data-for="' . esc_attr( implode(',' , $choice['for'] ) ) . '" type="radio" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '-' . esc_attr( $key ) . '" value="' . esc_attr( $choice['value'] ) . '"' . checked( $field_value, $choice['value'], false ) . ' class="ut-ui-form-radio ut-ui-radio ' . esc_attr( $field_class ) . '" /><label for="' . esc_attr( $field_id ) . '-' . esc_attr( $key ) . '">' . esc_attr( $choice['label'] ) . '</label></p>';
                
            }
        
        echo '</div>';
    
    }
  
}

/**
 * Radio Images Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_radio_image' ) ) {
  
    function ot_type_radio_image( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
        
        /**
         * load the default filterable images if nothing 
         * has been set in the choices array.
         */
        if ( empty( $field_choices ) ) {
            $field_choices = ot_radio_images( $field_id );
        }
          
        /* build radio image */
        foreach ( (array) $field_choices as $key => $choice ) {
          
            $src = THEME_WEB_ROOT . '/admin/assets/images/options/' . $choice['src'];
          
            echo '<div class="ut-ui-radio-images">';
                
                echo '<input type="radio" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '-' . esc_attr( $key ) . '" value="' . esc_attr( $choice['value'] ) . '"' . checked( $field_value, $choice['value'], false ) . ' class="ut-ui-form-radio ut-ui-radio" />';  
                echo '<label for="' . esc_attr( $field_id ) . '-' . esc_attr( $key ) . '"><img src="' . esc_url( $src ) . '" alt="' . esc_attr( $choice['label'] ) .'" title="' . esc_attr( $choice['label'] ) .'" class="option-tree-ui-radio-image ' . esc_attr( $field_class ) . '" /></label>';
                echo '<p>' . esc_attr( $choice['label'] ) . '</p>';
                
            echo '</div>';
        
        }
    
    }
  
}

/**
 * Select Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_select' ) ) {
  
    function ot_type_select( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
        
        /* fallback for older version */
        if( is_array( $field_value ) ) {
            $field_value = implode("", $field_value);
        }        
        
        echo '<div class="ut-ui-select-field">';
        
            /* build select */
            echo '<select autocomplete="off" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';
                
                foreach ( (array) $field_choices as $choice ) {
                    if ( isset( $choice['value'] ) && isset( $choice['label'] ) ) {
                        echo '<option class="select-option-' . esc_attr( $choice['value'] ) . '" data-orglabel="' . esc_attr( $choice['label'] ) . '" data-altlabel="' . ( isset($choice['alt_label']) ? esc_attr( $choice['alt_label'] ) : '' ) . '" value="' . esc_attr( $choice['value'] ) . '"' . selected( $field_value, $choice['value'], false ) . '>' . esc_attr( $choice['label'] ) . '</option>';
                    }
                }
            
            echo '</select>';
        
        echo '</div>';
    
    }
  
}

/**
 * Select Option Type for groups.
 */
if ( ! function_exists( 'ot_type_select_group' ) ) {
  
    function ot_type_select_group( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args ); 
                    
        /* fallback for older version */
        if( is_array( $field_value ) ) {
            $field_value = implode("", $field_value);
        }
        
        echo '<div class="ut-ui-select-field">';
        
            /* build select */
            echo '<select autocomplete="off" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="ut-ui-form-select ut-ui-select ut-ui-group-select ' . esc_attr( $field_class ) . ' ' . ( isset($field_toplevel) && $field_toplevel ? 'ut-toplevel-select-option' : '' ) . '">';
                
                foreach ( (array) $field_choices as $choice ) {
                
                    if ( isset( $choice['value'] ) && isset( $choice['label'] ) ) {
                        echo '<option class="select-group-option-' . esc_attr( $choice['value'] ) . '" data-orglabel="' . esc_attr( $choice['label'] ) . '" data-altlabel="' . ( isset($choice['alt_label']) ? esc_attr( $choice['alt_label'] ) : '' ) . '" data-for="' . ( isset($choice['for']) && is_array($choice['for']) ? esc_attr( implode(',' , $choice['for'] ) ) : '' ) . '" value="' . esc_attr( $choice['value'] ) . '"' . selected( $field_value, $choice['value'], false ) . '>' . esc_attr( $choice['label'] ) . '</option>';
                    }
                
                }
            
            echo '</select>';
        
        echo '</div>';
          
    }
  
}

/**
 * Sidebar Select Option Type.
 *
 * This option type makes it possible for users to select a WordPress registered sidebar 
 * to use on a specific area. By using the two provided filters, 'ot_recognized_sidebars', 
 * and 'ot_recognized_sidebars_{$field_id}' we can be selective about which sidebars are 
 * available on a specific content area.
 *
 * For example, if we create a WordPress theme that provides the ability to change the 
 * Blog Sidebar and we don't want to have the footer sidebars available on this area, 
 * we can unset those sidebars either manually or by using a regular expression if we 
 * have a common name like footer-sidebar-$i.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.1
 */
if ( ! function_exists( 'ot_type_sidebar_select' ) ) {
  
  function ot_type_sidebar_select( $args = array() ) {
  
    /* turns arguments array into variables */
    extract( $args );
        
        echo '<div class="ut-ui-select-field">';
      
            /* build page select */
            echo '<select autocomplete="off" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="ut-ui-form-select ut-ui-select ' . $field_class . '">';
    
            /* get the registered sidebars */
            global $wp_registered_sidebars;
    
            $sidebars = array();
            foreach( $wp_registered_sidebars as $id=>$sidebar ) {
              $sidebars[ $id ] = $sidebar[ 'name' ];
            }
    
            /* filters to restrict which sidebars are allowed to be selected, for example we can restrict footer sidebars to be selectable on a blog page */
            $sidebars = apply_filters( 'ot_recognized_sidebars', $sidebars );
            $sidebars = apply_filters( 'ot_recognized_sidebars_' . $field_id, $sidebars );
    
            /* has sidebars */
            if ( count( $sidebars ) ) {
              echo '<option value="">-- ' . __( 'Choose Sidebar', 'option-tree' ) . ' --</option>';
              foreach ( $sidebars as $id => $sidebar ) {
                echo '<option value="' . esc_attr( $id ) . '"' . selected( $field_value, $id, false ) . '>' . esc_attr( $sidebar ) . '</option>';
              }
            } else {
              echo '<option value="">' . __( 'No Sidebars', 'option-tree' ) . '</option>';
            }
            
            echo '</select>';
        
        echo '</div>';        
    
    }
  
}

/**
 * Tag Checkbox Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_tag_checkbox' ) ) {
  
  function ot_type_tag_checkbox( $args = array() ) {
    
    /* turns arguments array into variables */
    extract( $args );
        

      
        /* get tags */
        $tags = get_tags( array( 'hide_empty' => false ) );
        
        /* has tags */
        if ( $tags ) {
          foreach( $tags as $tag ) {
            echo '<p>';
              echo '<input type="checkbox" name="' . esc_attr( $field_name ) . '[' . esc_attr( $tag->term_id ) . ']" id="' . esc_attr( $field_id ) . '-' . esc_attr( $tag->term_id ) . '" value="' . esc_attr( $tag->term_id ) . '" ' . ( isset( $field_value[$tag->term_id] ) ? checked( $field_value[$tag->term_id], $tag->term_id, false ) : '' ) . ' class="ut-ui-form-checkbox ut-ui-checkbox ' . esc_attr( $field_class ) . '" />';
              echo '<label for="' . esc_attr( $field_id ) . '-' . esc_attr( $tag->term_id ) . '">' . esc_attr( $tag->name ) . '</label>';
            echo '</p>';
          } 
        } else {
          echo '<p>' . __( 'No Tags Found', 'option-tree' ) . '</p>';
        }

    
  }
  
}

/**
 * Tag Select Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_tag_select' ) ) {
  
  function ot_type_tag_select( $args = array() ) {

    /* turns arguments array into variables */
    extract( $args );
        
        /* build tag select */
        echo '<select name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="ut-ui-form-select ut-ui-select ' . $field_class . '">';
        
        /* get tags */
        $tags = get_tags( array( 'hide_empty' => false ) );
        
        /* has tags */
        if ( $tags ) {
          echo '<option value="">-- ' . __( 'Choose One', 'option-tree' ) . ' --</option>';
          foreach( $tags as $tag ) {
            echo '<option value="' . esc_attr( $tag->term_id ) . '"' . selected( $field_value, $tag->term_id, false ) . '>' . esc_attr( $tag->name ) . '</option>';
          }
        } else {
          echo '<option value="">' . __( 'No Tags Found', 'option-tree' ) . '</option>';
        }
        
        echo '</select>';
      

    
  }
  
}

/**
 * Taxonomy Checkbox Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_taxonomy_checkbox' ) ) {
  
  function ot_type_taxonomy_checkbox( $args = array() ) {
    
    /* turns arguments array into variables */
    extract( $args );
        
        /* setup the taxonomy */
        $taxonomy = isset( $field_taxonomy ) ? explode( ',', $field_taxonomy ) : array( 'category' );
        
        /* get taxonomies */
        $taxonomies = get_categories( array( 'hide_empty' => false, 'taxonomy' => $taxonomy ) );
        
        /* has tags */
        if ( $taxonomies ) {
            
            foreach( $taxonomies as $taxonomy ) {
                echo '<p>';
                    echo '<input type="checkbox" name="' . esc_attr( $field_name ) . '[' . esc_attr( $taxonomy->term_id ) . ']" id="' . esc_attr( $field_id ) . '-' . esc_attr( $taxonomy->term_id ) . '" value="' . esc_attr( $taxonomy->term_id ) . '" ' . ( isset( $field_value[$taxonomy->term_id] ) ? checked( $field_value[$taxonomy->term_id], $taxonomy->term_id, false ) : '' ) . ' class="ut-ui-form-checkbox ut-ui-checkbox ' . esc_attr( $field_class ) . '" />';
                echo '<label for="' . esc_attr( $field_id ) . '-' . esc_attr( $taxonomy->term_id ) . '">' . esc_attr( $taxonomy->name ) . '</label>';
                echo '</p>';
            } 
            
        } else {
            
            echo '<p>' . __( 'No Taxonomies Found', 'option-tree' ) . '</p>';
            
        }
        

    
  }
  
}

/**
 * Taxonomy Select Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_taxonomy_select' ) ) {
  
  function ot_type_taxonomy_select( $args = array() ) {

    /* turns arguments array into variables */
    extract( $args );
        
        echo '<div class="ut-ui-select-field">';
      
            /* build tag select */
            echo '<select name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="ut-ui-form-select ut-ui-select ' . $field_class . '">';
            
            /* setup the taxonomy */
            $taxonomy = isset( $field_taxonomy ) ? explode( ',', $field_taxonomy ) : array( 'category' );
            
            /* get taxonomies */
            $taxonomies = get_categories( array( 'hide_empty' => false, 'taxonomy' => $taxonomy ) );
            
            /* has tags */
            if ( $taxonomies ) {
                
                echo '<option value="">-- ' . __( 'Choose One', 'option-tree' ) . ' --</option>';
                
                foreach( $taxonomies as $taxonomy ) {
                    echo '<option value="' . esc_attr( $taxonomy->term_id ) . '"' . selected( $field_value, $taxonomy->term_id, false ) . '>' . esc_attr( $taxonomy->name ) . '</option>';
                }
                
            } else {
              
              echo '<option value="">' . __( 'No Taxonomies Found', 'option-tree' ) . '</option>';
              
            }
            
            echo '</select>';
      
        echo '</div>';
    
    }
  
}

/**
 * Text Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_text' ) ) {
  
  function ot_type_text( $args = array() ) {
    
    /* turns arguments array into variables */
    extract( $args );
      
        /* build text input */
        echo '<input type="text" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" value="' . esc_attr( $field_value ) . '" class="ut-ui-form-input ' . esc_attr( $field_class ) . '" />';
    
    }
  
}


/**
 * Unique ID Hidden Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_unique_id' ) ) {
  
  function ot_type_unique_id( $args = array() ) {
      
        /* turns arguments array into variables */
        extract( $args );
      
        if( empty( $field_value ) ) {
        
            $field_value = uniqid("ut_id_");

        } 
      
        /* build text input */
        echo '<input type="hidden" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" value="' . esc_attr( $field_value ) . '" class="ut-ui-form-input ' . esc_attr( $field_class ) . '" />';
    
    }
  
}


/**
 * Textarea Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_textarea' ) ) {
  
  function ot_type_textarea( $args = array() ) {
    
    /* turns arguments array into variables */
    extract( $args );
        
        echo '<div class="ut-ui-tinymce">';
            
            /* create a min height due to a minor bug since WP4.0*/
            echo '<style type="text/css">#'.$field_id.'_ifr {min-height:350px;}</style>';
            
            /* build textarea */
            wp_editor( 
                $field_value, 
                esc_attr( $field_id ), 
                array(
                    'editor_class'  => esc_attr( $field_class ),
                    'wpautop'       => true,
                    'media_buttons' => apply_filters( 'ot_media_buttons', true, $field_id ),
                    'textarea_name' => esc_attr( $field_name ),
                    'textarea_rows' => esc_attr( $field_rows ),
                    'tinymce'       => apply_filters( 'ot_tinymce', true, $field_id ),              
                    'quicktags'     => apply_filters( 'ot_quicktags', array( 'buttons' => 'strong,em,link,block,del,ins,img,ul,ol,li,code,spell,close' ), $field_id )
                ) 
            ); 
        
        echo '</div>';        
    
    }
  
}

/**
 * Textarea Simple Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_textarea_simple' ) ) {
  
  function ot_type_textarea_simple( $args = array() ) {
    
    /* turns arguments array into variables */
    extract( $args );

        /* filter to allow wpautop */
        $wpautop = apply_filters( 'ot_wpautop', false, $field_id );
        
        /* wpautop $field_value */
        if ( $wpautop == true ) 
          $field_value = wpautop( $field_value );
        
        /* build textarea simple */
        echo '<textarea class="ut-ui-form-textarea ' . esc_attr( $field_class ) . '" rows="' . esc_attr( $field_rows )  . '" cols="40" name="' . esc_attr( $field_name ) .'" id="' . esc_attr( $field_id ) . '">' . esc_textarea( $field_value ) . '</textarea>';
        
        if(!empty($field_htmldesc)) {
            echo '<pre>' . $field_htmldesc . '</pre>';
        }

    } 
  
}

/**
 * Panel Headlines
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     4.1
 */
if ( ! function_exists( 'ot_type_panel_headline' ) ) {
  
    function ot_type_panel_headline( $args = array() ) {
    
        extract( $args );
        echo '<div class="ut-panel-headline-content"><h1 class="ut-panel-title">' . htmlspecialchars_decode( $field_label ) . '</h1></div>';
    
    }
  
}

/**
 * Section Headlines
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     4.1
 */
if ( ! function_exists( 'ot_type_section_headline' ) ) {
  
    function ot_type_section_headline( $args = array() ) {
    
        extract( $args );
        
        if( !empty( $field_label ) )
        echo '<div class="ut-section-headline-content"><h2 class="ut-section-title">' . htmlspecialchars_decode( $field_label ) . '</h2></div>';
        
    
    }
  
}


/**
 * Subsectionheadline Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     4.1
 */
if ( ! function_exists( 'ot_type_sub_section_headline' ) ) {
  
  function ot_type_sub_section_headline( $args = array() ) {
    
    /* turns arguments array into variables */
    extract( $args );
    
    /* description */
    echo '<div class="ut-section-sub-headline-content"><h3 class="ut-section-sub-title">' . htmlspecialchars_decode( $field_label ) . '</h3></div>';
    
  }
  
}

/**
 * Section Headline Info Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     4.0
 */
if ( ! function_exists( 'ot_type_section_headline_info' ) ) {
  
    function ot_type_section_headline_info( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
    
        /* description */
        echo '<div class="description">' . htmlspecialchars_decode( $field_desc ) . '</div>';
      
    
    }
  
}

/**
 * Easing Effect for different purposes
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_easing' ) ) {
  
    function ot_type_easing( $args = array() ) {
        
        /* turns arguments array into variables */
        extract( $args );
        
        /* allow fields to be filtered */
        $ot_recognized_easing_fields = apply_filters( 'ot_recognized_easing_fields', array( 
            'easing',
        ), $field_id );
        
        /* build font easing dropdown */
        if ( in_array( 'easing', $ot_recognized_easing_fields ) ) {
        
            $easing = isset( $field_value['easing'] ) ? esc_attr( $field_value['easing'] ) : '';
            
            echo '<div class="ut-ui-select-field">';
            
                echo '<select name="' . esc_attr( $field_name ) . '[easing]" data-group="' . esc_attr( $field_id ) . '" id="' . esc_attr( $field_id ) . '-easing" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';
                    echo '<option value="">' . __('Default' , 'unitedthemes') . '</option>';
                    
                    foreach ( ot_recognized_easing_effects( $field_id ) as $key => $value ) {
                          echo '<option value="' . esc_attr( $key ) . '" ' . selected( $easing, $key, false ) . '>' . esc_attr( $value ) . '</option>';
                    }
                    
                echo '</select>';
            
            echo '<div>';
                                
        }
                
    }

}


/**
 * Google font typography Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_googlefont' ) ) {
  
    function ot_type_googlefont( $args = array() ) {
        
        /* turns arguments array into variables */
        extract( $args );
        
        /* allow fields to be filtered */
        $ot_recognized_typography_fields = apply_filters( 'ot_recognized_typography_fields', array( 
            'font-color',
            'font-family',
            'font-id', 
            'font-size', 
            'font-style', 
            'font-variant', 
            'font-weight', 
            'font-subset',
            'letter-spacing', 
            'line-height', 
            'text-decoration', 
            'text-transform'
        ), $field_id );
        
        echo '<div class="ut-ui-select-group clearfix">';
        
            /* build font family */
            if ( in_array( 'font-family', $ot_recognized_typography_fields ) ) {
                        
                /*echo '<select data-placeholder="' . esc_html__( 'Select Google Font', 'option-tree' ) . '" name="' . esc_attr( $field_name ) . '[font-family]" data-group="' . esc_attr( $field_id ) . '" id="' . esc_attr( $field_id ) . '-font-family" class="ut-google-font-select ' . esc_attr( $field_class ) . '" style="width: 100%;">';
                    
                    echo '<option value="">font-family</option>';
                    
                    if( !empty( $field_value['font-id'] ) ) {
                        
                        $google_fonts = ut_recognized_google_fonts( $field_id );
                        
                        $subsets  = implode(",", $google_fonts[$field_value['font-id']]['subsets']);
                        $variants = implode(",", $google_fonts[$field_value['font-id']]['variants']);
                        $value    = preg_replace( '/\s+/', '', strtolower($google_fonts[$field_value['font-id']]['family']) );
                            
                        echo '<option selected="selected" data-fontid="' . $field_value['font-id'] . '" data-subsets="' . $subsets . '" data-variants="' . $variants . '" data-font="' . esc_attr( $google_fonts[$field_value['font-id']]['family'] ) . '" data-family="' . esc_attr( $google_fonts[$field_value['font-id']]['family'] ) . '" value="' . esc_attr( $value ) . '">' . esc_attr( $google_fonts[$field_value['font-id']]['family'] ) . '</option>';
                        
                    }
                    
                echo '</select>';  
                      
                echo '<div class="clear"></div>'; */
                      
                $font_family = isset( $field_value['font-family'] ) ? $field_value['font-family'] : '';
                
                echo '<div class="ut-ui-select-field">';
                
                    echo '<select name="' . esc_attr( $field_name ) . '[font-family]" data-group="' . esc_attr( $field_id ) . '" id="' . esc_attr( $field_id ) . '-font-family" class="ut-ui-form-select ut-ui-select ut-google-font-select' . esc_attr( $field_class ) . '">';
                        
                        echo '<option value="">font-family</option>';
                        
                        foreach ( ut_recognized_google_fonts( $field_id ) as $id => $font ) {
                              
                            $key = preg_replace( '/\s+/', '', strtolower($font['family']) );
                            $variants = implode(",", $font['variants']);
                            $subsets = implode(",", $font['subsets']);
                            
                            echo '<option data-fontid="' . esc_attr( $id ) . '" data-subsets="' .  esc_attr( $subsets ) . '" data-variants="' . esc_attr( $variants ) . '" data-font="' . esc_attr( $font['family'] ) . '" data-family="' . esc_attr( $font['family'] ) . '" value="' . esc_attr( $key ) . '" ' . selected( $font_family , $key , false ) . '>' . esc_attr( $font['family'] ) . '</option>';
                          
                        }
                        
                    echo '</select>';
                
                echo '</div>';
                
                  
            }
                
            
                
            /* build font subsets */
            if ( in_array( 'font-subset', $ot_recognized_typography_fields ) ) {
    
                $font_subset = isset( $field_value['font-subset'] ) ? esc_attr( $field_value['font-subset'] ) : '';
                
                echo '<div class="ut-ui-select-field">';
                
                    echo '<select name="' . esc_attr( $field_name ) . '[font-subset]" data-group="' . esc_attr( $field_id ) . '" id="' . esc_attr( $field_id ) . '-font-subset" class="ut-ui-form-select ut-ui-select ut-google-font-subset ' . esc_attr( $field_class ) . '">';
                        
                        echo '<option value="">font-subset</option>';
                        
                        foreach ( ot_recognized_google_subsets( $field_id ) as $key => $value ) {
                            
                            echo '<option value="' . esc_attr( $key ) . '" ' . selected( $font_subset, $key, false ) . '>' . esc_attr( $value ) . '</option>';
                            
                        }
                        
                    echo '</select>';
                
                echo '</div>';
                
                
            }
            
            /* build font size */
            if ( in_array( 'font-size', $ot_recognized_typography_fields ) ) {
                
                $font_size = isset( $field_value['font-size'] ) ? esc_attr( $field_value['font-size'] ) : '';
                
                echo '<div class="ut-ui-select-field">';
                
                    echo '<select name="' . esc_attr( $field_name ) . '[font-size]" data-group="' . esc_attr( $field_id ) . '" id="' . esc_attr( $field_id ) . '-font-size" class="ut-ui-form-select ut-ui-select ut-google-font-size ' . esc_attr( $field_class ) . '">';
                        
                        echo '<option value="">font-size</option>';
                        
                        foreach( ot_recognized_font_sizes( $field_id ) as $option ) { 
                      
                            echo '<option value="' . esc_attr( $option ) . '" ' . selected( $font_size, $option, false ) . '>' . esc_attr( $option ) . '</option>';
                            
                        }
                        
                    echo '</select>';
                
                echo '</div>';
                
                
            }
            
            /* build font weight */
            if ( in_array( 'font-weight', $ot_recognized_typography_fields ) ) {
                
                $font_weight = isset( $field_value['font-weight'] ) ? esc_attr( $field_value['font-weight'] ) : '';
                
                echo '<div class="ut-ui-select-field">';
                
                    echo '<select name="' . esc_attr( $field_name ) . '[font-weight]" data-group="' . esc_attr( $field_id ) . '" id="' . esc_attr( $field_id ) . '-font-weight" class="ut-ui-form-select ut-ui-select ut-google-font-weight ' . esc_attr( $field_class ) . '">';
                        
                        echo '<option value="">font-weight</option>';
                        
                        foreach ( ot_recognized_google_font_weights( $field_id ) as $key => $value ) {
                            
                            echo '<option value="' . esc_attr( $key ) . '" ' . selected( $font_weight, $key, false ) . '>' . esc_attr( $value ) . '</option>';
                            
                        }
                        
                    echo '</select>';
                
                echo '</div>';
                
                    
            }
            
            /* optional letter spacing */
            if( apply_filters("ot_letter_spacing_for_google_font", true, $field_id ) ) {
        
                $letter_spacing = isset( $field_value['letter-spacing'] ) ? esc_attr( $field_value['letter-spacing'] ) : 0;

                echo '<div class="ut-numeric-slider-outer-wrap" style="margin-bottom:20px;">';

                    echo '<label for="' . esc_attr( $field_id ) . '-letter-spacing">' . esc_html( 'Letter Spacing', 'option-tree' ) . '</label>';

                    echo '<div class="ut-numeric-slider-wrap">';

                        echo '<input autocomplete="off" type="hidden" name="' . esc_attr( $field_name ) . '[letter-spacing]" id="' . esc_attr( $field_id ) . '-letter-spacing" class="ut-numeric-slider-hidden-input" value="' . $letter_spacing . '" data-min="-100" data-max="100" data-step="1">';

                        echo '<input min="-100" max="100" type="input" class="ut-ui-form-input ut-numeric-slider-helper-input" data-tooltip="' . esc_html( 'Max Value:', 'unitedthemes' ) . ' 100" value="' . esc_attr( $letter_spacing ) . '" autocomplete="off">';
                        echo '<div id="ut_numeric_slider_' . esc_attr( $field_id ) . '_border_radius" class="ut-numeric-slider ui-slider ui-slider-horizontal"></div>';

                    echo '</div>';

                echo '</div>';
        
            }
        
            /* build line height */
            if ( in_array( 'line-height', $ot_recognized_typography_fields ) ) {
                
                $line_height = isset( $field_value['line-height'] ) ? esc_attr( $field_value['line-height'] ) : '';

                echo '<div class="ut-ui-select-field">';
                
                    echo '<select name="' . esc_attr( $field_name ) . '[line-height]" id="' . esc_attr( $field_id ) . '-line-height" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';
                        
                        echo '<option value="">line-height</option>';
                        
                        foreach( ot_recognized_line_heights( $field_id ) as $option ) { 
                        
                          echo '<option value="' . esc_attr( $option ) . '" ' . selected( $line_height, $option, false ) . '>' . esc_attr( $option ) . '</option>';
                          
                        }
                        
                    echo '</select>';
                
                echo '</div>';
                
                
            }
                
            /* build font style */
            if ( in_array( 'font-style', $ot_recognized_typography_fields ) ) {
                
                $font_style = isset( $field_value['font-style'] ) ? esc_attr( $field_value['font-style'] ) : '';
                
                echo '<div class="ut-ui-select-field">';
                
                    echo '<select name="' . esc_attr( $field_name ) . '[font-style]" data-group="' . esc_attr( $field_id ) . '" id="' . esc_attr( $field_id ) . '-font-style" class="ut-ui-form-select ut-ui-select ut-google-font-style ' . esc_attr( $field_class ) . '">';
                        
                        echo '<option value="">font-style</option>';
                        
                        foreach ( ot_recognized_google_font_styles( $field_id ) as $key => $value ) {
        
                          echo '<option value="' . esc_attr( $key ) . '" ' . selected( $font_style, $key, false ) . '>' . esc_attr( $value ) . '</option>';
                          
                        }
                            
                    echo '</select>';
                
                echo '</div>';
                
                
            }
                
            /* build text transform */
            if ( in_array( 'text-transform', $ot_recognized_typography_fields ) ) {
            
                  $text_transform = isset( $field_value['text-transform'] ) ? esc_attr( $field_value['text-transform'] ) : '';
                  
                  echo '<div class="ut-ui-select-field">';
                    
                      echo '<select name="' . esc_attr( $field_name ) . '[text-transform]" data-group="' . esc_attr( $field_id ) . '" id="' . esc_attr( $field_id ) . '-text-transform" class="ut-ui-form-select ut-ui-select ut-google-text-transform ' . esc_attr( $field_class ) . '">';
                        
                        echo '<option value="">text-transform</option>';
                        
                        foreach ( ot_recognized_text_transformations( $field_id ) as $key => $value ) {
                            
                            echo '<option value="' . esc_attr( $key ) . '" ' . selected( $text_transform, $key, false ) . '>' . esc_attr( $value ) . '</option>';
                            
                        }
                        
                      echo '</select>';
                  
                  echo '</div>';
                  
                  
            }
        
        echo '</div>';
        
        /* hidden font id */
        if ( in_array( 'font-id', $ot_recognized_typography_fields ) ) {
            $font_id = isset( $field_value['font-id'] ) ? esc_attr( $field_value['font-id'] ) : ''; /* @todo - needs to be changed to font slug!!! */
            echo '<input type="hidden" name="' . esc_attr( $field_name ) . '[font-id]" id="' . esc_attr( $field_id ) . '-fontid" value="' . esc_attr( $font_id ) . '" autocomplete="off" />';
        }
            
        /* build preview window */
        echo '<link id="ut-google-style-link-' . esc_attr( $field_id ) . '" rel="stylesheet" type="text/css" href="">';
        echo '<style id="ut-google-style-' . esc_attr( $field_id ) . '" type="text/css"></style>';
        
        echo '<div id="ut-google-preview-' . esc_attr( $field_id ) . '" class="ut-google-font-preview">';
            
            esc_html_e('The quick brown fox jumps over the lazy dog.' , 'unitedthemes');    
        
        echo '</div>';

    }
    
}


/**
 * Typography Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_typography' ) ) {
  
    function ot_type_typography( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
        
        /* allow fields to be filtered */
        $ot_recognized_typography_fields = apply_filters( 'ot_recognized_typography_fields', array( 
            //'font-color',
            'font-family', 
            'font-size', 
            'font-style', 
            'font-variant', 
            'font-weight', 
            'letter-spacing', 
            'line-height', 
            'text-decoration', 
            'text-transform' 
        ), $field_id );
        
        /* build background colorpicker */
        if ( in_array( 'font-color', $ot_recognized_typography_fields ) ) {
        
          echo '<div class="option-tree-ui-colorpicker-input-wrap">';
                        
            /* set background color */
            $background_color = isset( $field_value['font-color'] ) ? esc_attr( $field_value['font-color'] ) : '';
            
            /* set border color */
            $border_color = in_array( $background_color, array( '#FFFFFF', '#FFF', '#ffffff', '#fff' ) ) ? '#ccc' : $background_color;
            
            /* input */
            echo '<input maxlength="7" type="text" name="' . esc_attr( $field_name ) . '[font-color]" id="' . esc_attr( $field_id ) . '-picker" value="' . esc_attr( $background_color ) . '" class="ut-ui-form-input ut-minicolors ' . esc_attr( $field_class ) . '" autocomplete="off" placeholder="font-color" />';
            
          echo '</div>';
        
        }
        
        echo '<div class="ut-ui-select-group clearfix">';
        
            /* build font family */
            if ( in_array( 'font-family', $ot_recognized_typography_fields ) ) {
                
                $font_family = isset( $field_value['font-family'] ) ? $field_value['font-family'] : '';
                
                echo '<div class="ut-ui-select-field">';          
                    
                    echo '<select name="' . esc_attr( $field_name ) . '[font-family]" id="' . esc_attr( $field_id ) . '-font-family" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';
                        
                        echo '<option value="">font-family</option>';
                        
                        foreach ( ut_recognized_font_families( $field_id ) as $key => $value ) {
                            
                            echo '<option value="' . esc_attr( $key ) . '" ' . selected( $font_family, $key, false ) . '>' . esc_attr( $value ) . '</option>';
                            
                        }
                        
                    echo '</select>';
                    
                echo '</div>';
                
                    
            }
            
            /* build font size */
            if ( in_array( 'font-size', $ot_recognized_typography_fields ) ) {
                
                $font_size = isset( $field_value['font-size'] ) ? esc_attr( $field_value['font-size'] ) : '';
                
                echo '<div class="ut-ui-select-field">';
                
                    echo '<select name="' . esc_attr( $field_name ) . '[font-size]" id="' . esc_attr( $field_id ) . '-font-size" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';
                        
                        echo '<option value="">font-size</option>';
                        
                        foreach( ot_recognized_font_sizes( $field_id ) as $option ) { 
                        
                            echo '<option value="' . esc_attr( $option ) . '" ' . selected( $font_size, $option, false ) . '>' . esc_attr( $option ) . '</option>';
                            
                        }
                        
                    echo '</select>';
                
                echo '</div>';
                
                
            }
            
            /* build font style */
            if ( in_array( 'font-style', $ot_recognized_typography_fields ) ) {
                
                $font_style = isset( $field_value['font-style'] ) ? esc_attr( $field_value['font-style'] ) : '';
                
                echo '<div class="ut-ui-select-field">';
                
                    echo '<select name="' . esc_attr( $field_name ) . '[font-style]" id="' . esc_attr( $field_id ) . '-font-style" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';
                    
                        echo '<option value="">font-style</option>';
                        
                        foreach ( ot_recognized_font_styles( $field_id ) as $key => $value ) {
                        
                            echo '<option value="' . esc_attr( $key ) . '" ' . selected( $font_style, $key, false ) . '>' . esc_attr( $value ) . '</option>';
                            
                        }
                        
                    echo '</select>';
            
                echo '</div>';
                
                    
            }
            
            /* build font variant */
            if ( in_array( 'font-variant', $ot_recognized_typography_fields ) ) {
                
                $font_variant = isset( $field_value['font-variant'] ) ? esc_attr( $field_value['font-variant'] ) : '';
                
                echo '<div class="ut-ui-select-field">';
                
                    echo '<select name="' . esc_attr( $field_name ) . '[font-variant]" id="' . esc_attr( $field_id ) . '-font-variant" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';
                    
                        echo '<option value="">font-variant</option>';
                        
                        foreach ( ot_recognized_font_variants( $field_id ) as $key => $value ) {
                            
                            echo '<option value="' . esc_attr( $key ) . '" ' . selected( $font_variant, $key, false ) . '>' . esc_attr( $value ) . '</option>';
                            
                        }
                        
                    echo '</select>';
                
                echo '</div>';
                
                
            }
            
            /* build font weight */
            if ( in_array( 'font-weight', $ot_recognized_typography_fields ) ) {
                
                $font_weight = isset( $field_value['font-weight'] ) ? esc_attr( $field_value['font-weight'] ) : '';
                
                echo '<div class="ut-ui-select-field">';
                
                    echo '<select name="' . esc_attr( $field_name ) . '[font-weight]" id="' . esc_attr( $field_id ) . '-font-weight" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';
                        
                        echo '<option value="">font-weight</option>';
                        
                        foreach ( ot_recognized_font_weights( $field_id ) as $key => $value ) {
                            
                            echo '<option value="' . esc_attr( $key ) . '" ' . selected( $font_weight, $key, false ) . '>' . esc_attr( $value ) . '</option>';
                        
                        }
                        
                    echo '</select>';
                
                echo '</div>';
                
                
            }
            
            /* build letter spacing */
            if ( in_array( 'letter-spacing', $ot_recognized_typography_fields ) ) {
                
                if( apply_filters("ot_letter_spacing_option_type", "numeric", $field_id ) == "default" ) {
                    
                    $letter_spacing = isset( $field_value['letter-spacing'] ) ? esc_attr( $field_value['letter-spacing'] ) : '';
                    
                    echo '<div class="ut-ui-select-field">';

                        echo '<select name="' . esc_attr( $field_name ) . '[letter-spacing]" id="' . esc_attr( $field_id ) . '-letter-spacing" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';

                            echo '<option value="">letter-spacing</option>';

                            foreach( ot_recognized_letter_spacing( $field_id ) as $option ) { 

                                echo '<option value="' . esc_attr( $option ) . '" ' . selected( $letter_spacing, $option, false ) . '>' . esc_attr( $option ) . '</option>';

                            }

                        echo '</select>';

                    echo '</div>';
                
                } else {
                    
                    $letter_spacing = !empty( $field_value['letter-spacing'] ) ? esc_attr( $field_value['letter-spacing'] ) : 0;
                    
                    echo '<div class="ut-numeric-slider-outer-wrap" style="margin-bottom:20px;">';

                        echo '<label for="' . esc_attr( $field_id ) . '-letter-spacing">' . esc_html( 'Letter Spacing', 'option-tree' ) . '</label>';

                        echo '<div class="ut-numeric-slider-wrap">';

                            echo '<input autocomplete="off" type="hidden" name="' . esc_attr( $field_name ) . '[letter-spacing]" id="' . esc_attr( $field_id ) . '-letter-spacing" class="ut-numeric-slider-hidden-input" value="' . $letter_spacing . '" data-min="-100" data-max="100" data-step="1">';

                            echo '<input min="-100" max="100" type="input" class="ut-ui-form-input ut-numeric-slider-helper-input" data-tooltip="' . esc_html( 'Max Value:', 'unitedthemes' ) . ' 100" value="' . esc_attr( $letter_spacing ) . '" autocomplete="off">';
                            echo '<div id="ut_numeric_slider_' . esc_attr( $field_id ) . '_border_radius" class="ut-numeric-slider ui-slider ui-slider-horizontal"></div>';

                        echo '</div>';

                    echo '</div>';                    
                    
                }
                
            }
        
            
            /* build line height */
            if ( in_array( 'line-height', $ot_recognized_typography_fields ) ) {
                
                $line_height = isset( $field_value['line-height'] ) ? esc_attr( $field_value['line-height'] ) : '';
                
                echo '<div class="ut-ui-select-field">';
                
                    echo '<select name="' . esc_attr( $field_name ) . '[line-height]" id="' . esc_attr( $field_id ) . '-line-height" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';
                    
                        echo '<option value="">line-height</option>';
                        
                        foreach( ot_recognized_line_heights( $field_id ) as $option ) { 
                            echo '<option value="' . esc_attr( $option ) . '" ' . selected( $line_height, $option, false ) . '>' . esc_attr( $option ) . '</option>';
                        }
                        
                    echo '</select>';
                
                echo '</div>';
                
                
            }
            
            /* build text decoration */
            if ( in_array( 'text-decoration', $ot_recognized_typography_fields ) ) {
                
                $text_decoration = isset( $field_value['text-decoration'] ) ? esc_attr( $field_value['text-decoration'] ) : '';
                    
                echo '<div class="ut-ui-select-field">';
                
                    echo '<select name="' . esc_attr( $field_name ) . '[text-decoration]" id="' . esc_attr( $field_id ) . '-text-decoration" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';
                        
                        echo '<option value="">text-decoration</option>';
                        
                        foreach ( ot_recognized_text_decorations( $field_id ) as $key => $value ) {
                            
                            echo '<option value="' . esc_attr( $key ) . '" ' . selected( $text_decoration, $key, false ) . '>' . esc_attr( $value ) . '</option>';
                            
                        }
                        
                    echo '</select>';
                
                echo '</div>';
                
                
            }
            
            /* build text transform */
            if ( in_array( 'text-transform', $ot_recognized_typography_fields ) ) {
                
                $text_transform = isset( $field_value['text-transform'] ) ? esc_attr( $field_value['text-transform'] ) : '';
                
                echo '<div class="ut-ui-select-field">';
                
                    echo '<select name="' . esc_attr( $field_name ) . '[text-transform]" id="' . esc_attr( $field_id ) . '-text-transform" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';
                    
                        echo '<option value="">text-transform</option>';
                        
                        foreach ( ot_recognized_text_transformations( $field_id ) as $key => $value ) {
                            
                            echo '<option value="' . esc_attr( $key ) . '" ' . selected( $text_transform, $key, false ) . '>' . esc_attr( $value ) . '</option>';
                            
                        }
                        
                    echo '</select>';
                    
                echo '</div>';
                
              
            }
        
        echo '</div>';
        
    }
  
}

/**
 * Upload Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_upload' ) ) {
  
    function ot_type_upload( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
      
        /* build upload */
        echo '<div class="ut-ui-upload-parent ' . esc_attr( $field_class ) . '">';
          
            /* input */
            echo '<input type="text" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" value="' . esc_attr( $field_value ) . '" class="ut-ui-form-input ut-ui-upload-input" />';
          
            /* add media button */
            echo '<button class="ut-media-upload ut-ui-button" rel="' . $post_id . '" title="' . __( 'Add Media', 'option-tree' ) . '">' . __( 'Add Media', 'option-tree' ) . '</button>';
        
        echo '</div>';
        
        /* media */
        if ( $field_value ) {
        
            echo '<div id="' . esc_attr( $field_id ) . '_media" class="ut-ui-media-wrap">';
          
                if ( preg_match( '/\.(?:jpe?g|png|svg|gif|ico)$/i', $field_value ) ) {
                    echo '<div class="ut-ui-image-wrap"><img src="' . esc_url( $field_value ) . '" alt="" /></div>';
                }
                
                echo '<button class="ut-ui-remove-media ut-ui-button" title="' . __( 'X', 'option-tree' ) . '">' . __( 'X', 'option-tree' ) . '</button>';
            
            echo '</div>';
          
        }
    
    }
  
}

/**
 * Upload Option Type. Connect to WordPress Customizer
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_upload_customizer' ) ) {
  
    function ot_type_upload_customizer( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
    
        /* get option from theme mod */
        $field_value = get_theme_mod($field_id);
        
        /* build upload */
        echo '<div class="ut-ui-upload-parent">';
          
            /* input */
            echo '<input type="text" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" value="' . esc_attr( $field_value ) . '" class="ut-ui-form-input ut-ui-upload-input ' . esc_attr( $field_class ) . '" />';
          
            /* add media button */
            echo '<button class="ut-media-upload ut-ui-button" rel="' . $post_id . '" title="' . __( 'Add Media', 'option-tree' ) . '">' . __( 'Add Media', 'option-tree' ) . '</button>';
        
        echo '</div>';
        
        /* media */
        if ( $field_value ) {
        
          echo '<div id="' . esc_attr( $field_id ) . '_media" class="ut-ui-media-wrap">';
          
            if ( preg_match( '/\.(?:jpe?g|png|svg|gif|ico)$/i', $field_value ) ) {
                echo '<div class="ut-ui-image-wrap"><img src="' . esc_url( $field_value ) . '" alt="" /></div><div class="clear"></div>';
            }
            
            echo '<button class="ut-ui-remove-media ut-ui-button" title="' . __( 'X', 'option-tree' ) . '">' . __( 'X', 'option-tree' ) . '</button>';
            
          echo '</div>';
          
        }
    
    }
  
}




/**
 * Border Settings
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     5.0.0
 * @version   1.0.0
 */
if ( ! function_exists( 'ot_type_border' ) ) {
    
    function ot_type_border( $args = array() ) {
        
        extract( $args );
        
        // allow fields to be filtered
        $ut_recognized_border_fields = apply_filters( 'ut_recognized_border_fields', array( 
            'top', 
            'right',
            'bottom', 
            'left',
            'padding'
        ), $field_id );
        
        $directions = array(
            'top'       => esc_html( 'Top', 'unitedthemes'),
            'right'     => esc_html( 'Right', 'unitedthemes'),
            'bottom'    => esc_html( 'Bottom', 'unitedthemes'),
            'left'      => esc_html( 'Left', 'unitedthemes'),
        );
        
        foreach( $directions as $key => $direction ) {
            
            if( !in_array( $key, $ut_recognized_border_fields ) )  {
                continue;
            }
            
            $value = !empty( $field_value['border-' . $key . '-color'] ) ? $field_value['border-' . $key . '-color'] : '';
            
            echo '<div class="' . ( in_array( 'padding', $ut_recognized_border_fields ) ? 'grid-20' : 'grid-25' ) . '">';
                
                echo '<label>' . sprintf( esc_html( 'Border %s Color', 'option-tree' ), $direction ) . '</label>';
                 
                echo '<div class="ut-minicolors-wrap">';
                
                    echo '<input data-mode="rgb" type="text" name="' . esc_attr( $field_name ) . '[border-' . $key . '-color]" id="' . esc_attr( $field_id ) . '-border-' . $key . '-color" value="' . esc_attr( $value ) . '" class="ut-ui-form-input ut-minicolors minicolors-input ut-color-mode-' . esc_attr( $field_mode ) . ' ' . esc_attr( $field_class ) . '" autocomplete="off" />';                  
                    echo '<span class="ut-minicolors-swatch" style="background-color:' . esc_attr( $value ) . ';"></span>';            
                    
                echo '</div>';
            
            echo '</div>';
            
            $value = !empty( $field_value['border-' . $key . '-style'] ) ? $field_value['border-' . $key . '-style'] : '';
            
            echo '<div class="' . ( in_array( 'padding', $ut_recognized_border_fields ) ? 'grid-20' : 'grid-25' ) . '">';
            
                echo '<div class="ut-ui-select-field">';
                        
                    echo '<label>' . sprintf( esc_html( 'Border %s Style', 'option-tree' ), $direction ) . '</label>';
                    
                    echo '<select autocomplete="off" name="' . esc_attr( $field_name ) . '[border-' . $key . '-style]" id="' . esc_attr( $field_id ) . '-border-' . $key . '-style" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';
                        
                        echo '<option value="">border-style</option>';
                        
                        foreach ( ot_recognized_border_styles( $field_id ) as $skey => $svalue ) {
                            
                            echo '<option value="' . esc_attr( $skey ) . '" ' . selected( $value, $skey, false ) . '>' . esc_attr( $svalue ) . '</option>';
                            
                        }
                        
                    echo '</select>';
                
                echo '</div>';
            
            echo '</div>';
            
            $value = !empty( $field_value['border-' . $key . '-width'] ) ? $field_value['border-' . $key . '-width'] : 0;
            
            echo '<div class="' . ( in_array( 'padding', $ut_recognized_border_fields ) ? 'grid-30' : 'grid-50' ) . '">';
            
                echo '<div class="ut-numeric-slider-outer-wrap">';
                
                    echo '<label for="' . esc_attr( $field_id ) . '-border-' . $key . '-width">' . sprintf( esc_html( 'Border %s Width', 'option-tree' ), $direction ) . '</label>';
                    
                    echo '<div class="ut-numeric-slider-wrap">';
                            
                        echo '<input autocomplete="off" type="hidden" name="' . esc_attr( $field_name ) . '[border-' . $key . '-width]" id="' . esc_attr( $field_id ) . '-border-' . $key . '-width" class="ut-numeric-slider-hidden-input" value="' . ( isset( $field_value['border-' . $key . '-width'] ) ? esc_attr( $field_value['border-' . $key . '-width'] ) : '' ) . '" data-min="0" data-max="20" data-step="1">';
            
                        echo '<input min="0" max="20" type="input" class="ut-ui-form-input ut-numeric-slider-helper-input" data-tooltip="' . esc_html( 'Max Value:', 'unitedthemes' ) . ' 20" value="' . esc_attr( $value ) . '" autocomplete="off">';
                        echo '<div id="ut_numeric_slider_' . esc_attr( $field_id ) . '_border_radius" class="ut-numeric-slider ui-slider ui-slider-horizontal"></div>';
            
                    echo '</div>';
                
                echo '</div>';
            
            echo '</div>';
            
            if( in_array( 'padding', $ut_recognized_border_fields ) )  {
            
                $value = !empty( $field_value['padding-' . $key] ) ? $field_value['padding-' . $key] : 0;

                echo '<div class="grid-30">';

                    echo '<div class="ut-numeric-slider-outer-wrap">';

                        echo '<label for="' . esc_attr( $field_id ) . '-padding-' . $key . '">' . sprintf( esc_html( 'Padding %s', 'option-tree' ), $direction ) . '</label>';

                        echo '<div class="ut-numeric-slider-wrap">';

                            echo '<input autocomplete="off" type="hidden" name="' . esc_attr( $field_name ) . '[padding-' . $key . ']" id="' . esc_attr( $field_id ) . '-padding-' . $key . '" class="ut-numeric-slider-hidden-input" value="' . esc_attr( $value ) . '" data-min="0" data-max="40" data-step="1">';

                            echo '<input min="0" max="40" type="input" class="ut-ui-form-input ut-numeric-slider-helper-input" data-tooltip="' . esc_html( 'Max Value:', 'unitedthemes' ) . ' 40" value="' . esc_attr( $value ) . '" autocomplete="off">';
                            echo '<div id="ut_numeric_slider_' . esc_attr( $field_id ) . '_border_radius" class="ut-numeric-slider ui-slider ui-slider-horizontal"></div>';

                        echo '</div>';

                    echo '</div>';

                echo '</div>';                
            
            }
                
            echo '<div class="clear"></div>';

        }        
        
    }

}

/**
 * Frame Settings
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     5.0.0
 * @version   1.0.0
 */
if ( ! function_exists( 'ot_type_frame' ) ) {
    
    function ot_type_frame( $args = array() ) {
        
        extract( $args );
        
        $directions = array(
            'top'       => esc_html( 'Top', 'unitedthemes'),
            'right'     => esc_html( 'Right', 'unitedthemes'),
            'bottom'    => esc_html( 'Bottom', 'unitedthemes'),
            'left'      => esc_html( 'Left', 'unitedthemes'),
        );
        
        echo '<div class="ut-ui-select-group clearfix">';
        
        foreach( $directions as $key => $direction ) {
            
            $value = !empty( $field_value['margin-' . $key] ) ? $field_value['margin-' . $key] : 'on';
            
            echo '<div class="ut-ui-select-field">';

                echo '<label>' . sprintf( esc_html( 'Show %s Frame', 'option-tree' ), $direction ) . '</label>';

                echo '<select autocomplete="off" name="' . esc_attr( $field_name ) . '[margin-' . $key . ']" id="margin-' . esc_attr( $field_id ) . '-' . $key . '" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';

                    echo '<option value="on" ' . selected( $value, 'on', false ) . '>' . esc_html( 'yes, please!', 'unitedthemes' ) . '</option>';
                    echo '<option value="off" ' . selected( $value, 'off', false ) . '>' . esc_html( 'no, thanks!', 'unitedthemes' ) . '</option>';                        

                echo '</select>';

            echo '</div>';

        }
        
        echo '</div>';
        
    }

}