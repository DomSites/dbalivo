<?php

/*
|--------------------------------------------------------------------------
| generate shortcode config element
|--------------------------------------------------------------------------
*/
if ( !function_exists( 'ut_get_option_element' ) ) {

	function ut_get_option_element( $name, $attr_opt, $type, $code ){
		
		$return = '';
				
		switch( $attr_opt['type'] ){
			
			case 'radio' : return ut_generate_radio_option( $name, $attr_opt, $type, $code ); 
			break;
		
			case 'select': return ut_generate_select_option( $name, $attr_opt, $type, $code ); 
			break;
			
			case 'effect': return ut_generate_effect_option( $name, $type, $code, $attr_opt ); 
			break;
			
		case 'custom':
	 
			if( $name == 'tabgroup' ) {
				$return .= '<p><label>'.__( 'Manage Tabs' , 'ut_shortcodes' ).'</label></p>';
				
					$return .= '<div class="sc-list-items" data-name="item" data-type="s">';
						$return .= '<div class="sc-lister well-white">';
							
							$return  .= '<div class="ut-option-field">';
								$return .= '<label>' . __('Title' , 'ut_shortcodes') . ': </label>';
							$return .= '</div>';
							
							$return .= '<div class="ut-option-value">';
								$return .= '<input data-group="tabgroup" class="sc-list-item form-control propertychange" type="text" name="" value="" />';
							$return .= '</div>';
							
							$return .= '<div class="hr"></div>';
							
							$return  .= '<div class="ut-option-field">';
								$return .= '<label>' . __('Tab Content' , 'ut_shortcodes') . ': </label>';
							$return .= '</div>';
							
							$return .= '<div class="ut-option-value">';
								$return .= '<textarea data-group="tabgroup" class="sc-list-text form-control propertychange" type="text" name="" /></textarea>';
							$return .= '</div>';	
							
							$return .= '<button data-group="tabgroup" type="button" class="btn btn-danger btn-xs remove-group-item"><i class="fa fa-trash-o"></i></button>';
							
					   $return .= '</div>';
					$return .= '</div>';
					
				$return .= '<button type="button" data-group="tabgroup" class="btn btn-primary btn-xs add-list-item">' . __('Add Tab', 'ut_shortcodes' ) . '</button><div class="clear"></div><br />';
			            
			} elseif($name == 'videotestgroup' ) {
                
                $return .= '<p><label>'.__( 'Manage Video Testimonials' , 'ut_shortcodes' ).'</label></p>';
                
                    $return .= '<div class="sc-vidtest-items" data-name="item" data-type="s">';
						$return .= '<div class="sc-testvids well-white">';
                            
                            $return  .= '<div class="ut-option-field">';
								$return .= '<label>' . __('Author' , 'ut_shortcodes') . ': </label>';
							$return .= '</div>';
                            
                            $return .= '<div class="ut-option-value">';
								$return .= '<input data-group="videotestgroup" class="sc-vidtest-item video-author form-control propertychange" type="text" name="" value="" />';
							$return .= '</div>';
							
							$return .= '<div class="hr"></div>';
                            
                            $return  .= '<div class="ut-option-field">';
								$return .= '<label>' . __('Company' , 'ut_shortcodes') . ': </label>';
							$return .= '</div>';
                            
                            $return .= '<div class="ut-option-value">';
								$return .= '<input data-group="videotestgroup" class="sc-vidtest-item video-company form-control propertychange" type="text" name="" value="" />';
							$return .= '</div>';
                            
                            $return .= '<div class="hr"></div>';
                            
                            $return  .= '<div class="ut-option-field">';
								$return .= '<label>' . __('Poster Image' , 'ut_shortcodes') . ': </label>';
							$return .= '</div>';
                            
                            $return .= '<div class="ut-option-value ut-media-access" style="margin-bottom:10px;">';
									$return .= '<input data-group="videotestgroup" class="sc-vidtest-item form-control video-poster propertychange" type="text" value="" />';
									$return .= ut_media_access( __('Add Poster Image', 'ut_shortcodes' ) );
							$return .= '</div>';
							
							$return .= '<div class="hr"></div>';
                            
                            $return  .= '<div class="ut-option-field">';
								$return .= '<label>' . __('Video Source' , 'ut_shortcodes') . ': </label>';
							$return .= '</div>';
                            
                            $return .= '<div class="ut-option-value">';
								$return .= '<input data-group="videotestgroup" class="sc-vidtest-item video-source form-control propertychange" type="text" name="" value="" />';
                                $return .= '<span class="description">' . __('You can insert one of these video sources:' , 'ut_shortcodes') . '</span><br />';
                                $return .= '<ol>';
                                    $return .= '<li><span class="description"><a target="_blank" href="http://codex.wordpress.org/Video_Shortcode">' . __('WordPress Video Shortcode' , 'ut_shortcodes') . '</a></span></li>';                                
                                    $return .= '<li><span class="description"><a target="_blank" href="http://codex.wordpress.org/Embeds">' . __('WordPress Embeds' , 'ut_shortcodes') . '</a><br /> like : http://www.youtube.com/watch?v=dQw4w9WgXcQ</span></li>';
                                $return .= '</ol>';
                                
							$return .= '</div>';
							
							$return .= '<div class="hr"></div>';
                            
                            $return .= '<div class="live-group-select-parent">';
                            
                                $return  .= '<div class="ut-option-field">';
                                    $return .= '<label>' . __('Activate Boxed Layout?' , 'ut_shortcodes') . ': </label>';
                                $return .= '</div>';
                                
                                $return .= '<div class="ut-option-value">';
                                
                                    $return .= '<select data-group="videotestgroup" class="video-box-state sc-live-group-select sc-select-live">';
                                        $return .= '<option value="off">' . __('no, thanks!' , 'ut_shortcodes') . '</option>';
                                        $return .= '<option value="on">' . __('yes, please!' , 'ut_shortcodes') . '</option>';
                                    $return .= '</select>';
                                
                                $return .= '</div>';
                                
                                $return .= '<div class="clear"></div>';
                                
                                $return .= '<div class="live-group-select-children">';
                                
                                    $return  .= '<div class="ut-option-field">';
                                        $return .= '<label>' . __('Choose Style' , 'ut_shortcodes') . ': </label>';
                                    $return .= '</div>';
                                    
                                    $return .= '<div class="ut-option-value">';
                                    
                                        $return .= '<select data-group="videotestgroup" class="video-box-style sc-select-live">';
                                            $return .= '<option data-for="" value="dark">' . __('Dark' , 'ut_shortcodes') . '</option>';
                                            $return .= '<option data-for="" value="light">' . __('Light' , 'ut_shortcodes') . '</option>';
                                        $return .= '</select>';
                                    
                                    $return .= '</div>';
                                    
                                    $return .= '<div class="clear"></div>';
                                    
                                $return .= '</div>';
                                
                            $return .= '</div>';
                            
                            $return .= '<div class="hr"></div>';
                            
                            $return  .= '<div class="ut-option-field">';
								$return .= '<label>' . __('Animation Effect' , 'ut_shortcodes') . ': </label>';
							$return .= '</div>';
                            
                            $return .= '<div class="ut-option-value">';
                            
                                $return .= '<select data-group="videotestgroup" class="video-box-effect sc-select-live">';
                                    $return .= '<option value="">Choose Animation Effect</option>';
                                    $return .= '<option value="fadeIn">fadeIn</option>';
                                    $return .= '<option value="slideInRight">slideInRight</option>';
                                    $return .= '<option value="slideInLeft">slideInLeft</option>';
                                $return .= '</select>';
                            
                            $return .= '</div>';
                            
                            $return .= '<div class="hr"></div>';                           
                            
                        $return .= '</div>';
					$return .= '</div>';       
                            
                $return .= '<button type="button" data-group="videotestgroup" class="btn btn-primary btn-xs add-videotest-item">' . __('Add Video Testimonial', 'ut_shortcodes' ) . '</button><div class="clear"></div><br />';            
            
            } elseif( $name == 'verticaltabgroup' ) {
				
				$return .= '<p><label>'.__( 'Manage Vertical Image Tabs' , 'ut_shortcodes' ).'</label></p>';
				
					$return .= '<div class="sc-list-items" data-name="item" data-type="s">';
						$return .= '<div class="sc-lister well-white">';
							
							$return  .= '<div class="ut-option-field">';
								$return .= '<label>' . __('Title' , 'ut_shortcodes') . ': </label>';
							$return .= '</div>';
							
							$return .= '<div class="ut-option-value">';
								$return .= '<input data-group="tabgroup" class="sc-list-item form-control propertychange" type="text" name="" value="" />';
							$return .= '</div>';
							
							$return .= '<div class="hr"></div>';
							
							$return  .= '<div class="ut-option-field">';
								$return .= '<label>' . __('Tab Content' , 'ut_shortcodes') . ': </label>';
							$return .= '</div>';
							
							$return .= '<div class="ut-option-value">';
								$return .= '<textarea data-group="tabgroup" class="sc-list-text form-control propertychange" type="text" name="" /></textarea>';
							$return .= '</div>';	
							
							$return .= '<button data-group="tabgroup" type="button" class="btn btn-danger btn-xs remove-group-item"><i class="fa fa-trash-o"></i></button>';
							
					   $return .= '</div>';
					$return .= '</div>';
					
				$return .= '<button type="button" data-group="tabgroup" class="btn btn-primary btn-xs add-list-item">' . __('Add Tab', 'ut_shortcodes' ) . '</button><div class="clear"></div><br />';
			
            } elseif( $name == 'highlightgroup' ) {
                                
                $return .= '<p><label>'.__( 'Manage Left Service Boxes' , 'ut_shortcodes' ).'</label></p>';
                
                $return .= '<div class="sc-highlight-items" data-name="item" data-type="s">';
                    $return .= '<div class="sc-highlights well-white ut-jquery-ui">';
                        
                        $return  .= '<div id="hightlight-left-manager-box">';
                        
                            $return .= '<h3>' . __( 'Service Box 1' , 'ut_shortcodes') . '</h3>';
                            $return .= '<div>';
                                
                                $return  .= '<div class="ut-option-field">';
                                    $return .= '<label>' . __('Box Title' , 'ut_shortcodes') . ': </label>';
                                $return .= '</div>';
                                
                                $return .= '<div class="ut-option-value">';
                                    $return .= '<input data-group="highlightgroup" data-align="left" class="sc-highlight-item form-control propertychange" type="text" name="" value="" />';
                                $return .= '</div>';
                                
                                $return .= '<div class="hr"></div>';
                                
                                $return  .= '<div class="ut-option-field">';
                                    $return .= '<label>' . __('Box Content' , 'ut_shortcodes') . ': </label>';
                                $return .= '</div>';
                                
                                $return .= '<div class="ut-option-value">';
                                    $return .= '<textarea data-group="highlightgroup" data-align="left" class="sc-highlight-text form-control propertychange" type="text" name="" /></textarea>';
                                $return .= '</div>';
                                
                                $return .= '<div class="hr"></div>';
                                
                                $return  .= '<div class="ut-option-field">';
                                    $return .= '<label>' . __('Box Icon' , 'ut_shortcodes') . ': </label>';
                                $return .= '</div>';
                                
                                $return .= '<div class="ut-option-value">';
                                    $return .= '<input style="margin-bottom:10px !important;" data-align="left" class="sc-highlight-icon attr form-control" type="text" data-attrname="icon" value="" />';
                                    $return .= '<a href="#" data-group="highlightgroup" class="btn btn-primary btn-sm open-ut-modal sc-highlight-modal"> ' . __('Choose Icon' , 'ut_shortcodes') . '</a>';
                                $return .= '</div>';
                                
                                $return .= '<div class="hr"></div>';
                                
                                $return  .= '<div class="ut-option-field">';
                                    $return .= '<label>' . __('Icon Color' , 'ut_shortcodes') . ': </label>';
                                $return .= '</div>';
                                
			                    $return .= '<div class="ut-option-value"><input data-group="highlightgroup" data-align="left" class="sc-highlight-color attr color-picker-hex form-control ut-color-picker" type="text" data-attrname="iconcolor" value="" /></div>';
                                $return .= '<div class="clear"></div>';                                                         
                                
                            $return .= '</div>';
                            
                            $return .= '<h3>' . __( 'Service Box 2' , 'ut_shortcodes') . '</h3>';
                            $return .= '<div>';
                                
                                $return  .= '<div class="ut-option-field">';
                                    $return .= '<label>' . __('Box Title' , 'ut_shortcodes') . ': </label>';
                                $return .= '</div>';
                                
                                $return .= '<div class="ut-option-value">';
                                    $return .= '<input data-group="highlightgroup" data-align="left" class="sc-highlight-item form-control propertychange" type="text" name="" value="" />';
                                $return .= '</div>';
                                
                                $return .= '<div class="hr"></div>';
                                
                                $return  .= '<div class="ut-option-field">';
                                    $return .= '<label>' . __('Box Content' , 'ut_shortcodes') . ': </label>';
                                $return .= '</div>';
                                
                                $return .= '<div class="ut-option-value">';
                                    $return .= '<textarea data-group="highlightgroup" data-align="left" class="sc-highlight-text form-control propertychange" type="text" name="" /></textarea>';
                                $return .= '</div>';
                                
                                $return .= '<div class="hr"></div>';
                                
                                $return  .= '<div class="ut-option-field">';
                                    $return .= '<label>' . __('Box Icon' , 'ut_shortcodes') . ': </label>';
                                $return .= '</div>';
                                
                                $return .= '<div class="ut-option-value">';
                                    $return .= '<input style="margin-bottom:10px !important;" data-align="left" class="sc-highlight-icon attr form-control" type="text" data-attrname="icon" value="" />';
                                    $return .= '<a href="#" data-group="highlightgroup" class="btn btn-primary btn-sm open-ut-modal sc-highlight-modal"> ' . __('Choose Icon' , 'ut_shortcodes') . '</a>';
                                $return .= '</div>';
                                
                                $return .= '<div class="hr"></div>';
                                
                                $return  .= '<div class="ut-option-field">';
                                    $return .= '<label>' . __('Icon Color' , 'ut_shortcodes') . ': </label>';
                                $return .= '</div>';
                                
			                    $return .= '<div class="ut-option-value"><input data-group="highlightgroup" data-align="left" class="sc-highlight-color attr color-picker-hex form-control ut-color-picker" type="text" data-attrname="iconcolor" value="" /></div>';
                                $return .= '<div class="clear"></div>';                                
                                
                            $return .= '</div>';
                            
                            $return .= '<h3>' . __( 'Service Box 3' , 'ut_shortcodes') . '</h3>';
                            $return .= '<div>';
                                
                                $return  .= '<div class="ut-option-field">';
                                    $return .= '<label>' . __('Box Title' , 'ut_shortcodes') . ': </label>';
                                $return .= '</div>';
                                
                                $return .= '<div class="ut-option-value">';
                                    $return .= '<input data-group="highlightgroup" data-align="left" class="sc-highlight-item form-control propertychange" type="text" name="" value="" />';
                                $return .= '</div>';
                                
                                $return .= '<div class="hr"></div>';
                                
                                $return  .= '<div class="ut-option-field">';
                                    $return .= '<label>' . __('Box Content' , 'ut_shortcodes') . ': </label>';
                                $return .= '</div>';
                                
                                $return .= '<div class="ut-option-value">';
                                    $return .= '<textarea data-group="highlightgroup" data-align="left" class="sc-highlight-text form-control propertychange" type="text" name="" /></textarea>';
                                $return .= '</div>';
                                
                                $return .= '<div class="hr"></div>';
                                
                                $return  .= '<div class="ut-option-field">';
                                    $return .= '<label>' . __('Box Icon' , 'ut_shortcodes') . ': </label>';
                                $return .= '</div>';
                                
                                $return .= '<div class="ut-option-value">';
                                    $return .= '<input style="margin-bottom:10px !important;" data-align="left" class="sc-highlight-icon attr form-control" type="text" data-attrname="icon" value="" />';
                                    $return .= '<a href="#" data-group="highlightgroup" class="btn btn-primary btn-sm open-ut-modal sc-highlight-modal"> ' . __('Choose Icon' , 'ut_shortcodes') . '</a>';
                                $return .= '</div>';
                                
                                $return .= '<div class="hr"></div>';
                                
                                $return  .= '<div class="ut-option-field">';
                                    $return .= '<label>' . __('Icon Color' , 'ut_shortcodes') . ': </label>';
                                $return .= '</div>';
                                
			                    $return .= '<div class="ut-option-value"><input data-group="highlightgroup" data-align="left" class="sc-highlight-color attr color-picker-hex form-control ut-color-picker" type="text" data-attrname="iconcolor" value="" /></div>';
                                $return .= '<div class="clear"></div>';                                
                                
                            $return .= '</div>';
                        
                        $return  .= '</div>';
                        
                        $return .= '<div class="clear"></div>';
                        
                    $return  .= '</div>';
                $return .= '</div>';
                
                $return .= '<p><label>'.__( 'Manage Right Service Boxes' , 'ut_shortcodes' ).'</label></p>';
                
                $return .= '<div class="sc-highlight-items" data-name="item" data-type="s">';
                    $return .= '<div class="sc-highlights well-white ut-jquery-ui">';
                        
                        $return  .= '<div id="hightlight-right-manager-box">';
                        
                            $return .= '<h3>' . __( 'Service Box 1' , 'ut_shortcodes') . '</h3>';
                            $return .= '<div>';
                                
                                $return  .= '<div class="ut-option-field">';
                                    $return .= '<label>' . __('Box Title' , 'ut_shortcodes') . ': </label>';
                                $return .= '</div>';
                                
                                $return .= '<div class="ut-option-value">';
                                    $return .= '<input data-group="highlightgroup" data-align="right" class="sc-highlight-item form-control propertychange" type="text" name="" value="" />';
                                $return .= '</div>';
                                
                                $return .= '<div class="hr"></div>';
                                
                                $return  .= '<div class="ut-option-field">';
                                    $return .= '<label>' . __('Box Content' , 'ut_shortcodes') . ': </label>';
                                $return .= '</div>';
                                
                                $return .= '<div class="ut-option-value">';
                                    $return .= '<textarea data-group="highlightgroup" data-align="right" class="sc-highlight-text form-control propertychange" type="text" name="" /></textarea>';
                                $return .= '</div>';
                                
                                $return .= '<div class="hr"></div>';
                                
                                $return  .= '<div class="ut-option-field">';
                                    $return .= '<label>' . __('Box Icon' , 'ut_shortcodes') . ': </label>';
                                $return .= '</div>';
                                
                                $return .= '<div class="ut-option-value">';
                                    $return .= '<input style="margin-bottom:10px !important;" data-align="right" class="sc-highlight-icon attr form-control" type="text" data-attrname="icon" value="" />';
                                    $return .= '<a href="#" data-group="highlightgroup" class="btn btn-primary btn-sm open-ut-modal sc-highlight-modal"> ' . __('Choose Icon' , 'ut_shortcodes') . '</a>';
                                $return .= '</div>';
                                
                                $return .= '<div class="hr"></div>';
                                
                                $return  .= '<div class="ut-option-field">';
                                    $return .= '<label>' . __('Icon Color' , 'ut_shortcodes') . ': </label>';
                                $return .= '</div>';
                                
			                    $return .= '<div class="ut-option-value"><input data-group="highlightgroup" data-align="right" class="sc-highlight-color attr color-picker-hex form-control ut-color-picker" type="text" data-attrname="iconcolor" value="" /></div>';
                                $return .= '<div class="clear"></div>';                                
                                
                            $return .= '</div>';
                            
                            $return .= '<h3>' . __( 'Service Box 2' , 'ut_shortcodes') . '</h3>';
                            $return .= '<div>';
                                
                                $return  .= '<div class="ut-option-field">';
                                    $return .= '<label>' . __('Box Title' , 'ut_shortcodes') . ': </label>';
                                $return .= '</div>';
                                
                                $return .= '<div class="ut-option-value">';
                                    $return .= '<input data-group="highlightgroup" data-align="right" class="sc-highlight-item form-control propertychange" type="text" name="" value="" />';
                                $return .= '</div>';
                                
                                $return .= '<div class="hr"></div>';
                                
                                $return  .= '<div class="ut-option-field">';
                                    $return .= '<label>' . __('Box Content' , 'ut_shortcodes') . ': </label>';
                                $return .= '</div>';
                                
                                $return .= '<div class="ut-option-value">';
                                    $return .= '<textarea data-group="highlightgroup" data-align="right" class="sc-highlight-text form-control propertychange" type="text" name="" /></textarea>';
                                $return .= '</div>';
                                
                                $return .= '<div class="hr"></div>';
                                
                                $return  .= '<div class="ut-option-field">';
                                    $return .= '<label>' . __('Box Icon' , 'ut_shortcodes') . ': </label>';
                                $return .= '</div>';
                                
                                $return .= '<div class="ut-option-value">';
                                    $return .= '<input style="margin-bottom:10px !important;" data-align="right" class="sc-highlight-icon attr form-control" type="text" data-attrname="icon" value="" />';
                                    $return .= '<a href="#" data-group="highlightgroup" class="btn btn-primary btn-sm open-ut-modal sc-highlight-modal"> ' . __('Choose Icon' , 'ut_shortcodes') . '</a>';
                                $return .= '</div>';
                                
                                $return .= '<div class="hr"></div>';
                                
                                $return  .= '<div class="ut-option-field">';
                                    $return .= '<label>' . __('Icon Color' , 'ut_shortcodes') . ': </label>';
                                $return .= '</div>';
                                
			                    $return .= '<div class="ut-option-value"><input data-group="highlightgroup" data-align="right" class="sc-highlight-color attr color-picker-hex form-control ut-color-picker" type="text" data-attrname="iconcolor" value="" /></div>';
                                $return .= '<div class="clear"></div>';                                
                                
                            $return .= '</div>';
                            
                            $return .= '<h3>' . __( 'Service Box 3' , 'ut_shortcodes') . '</h3>';
                            $return .= '<div>';
                                
                                $return  .= '<div class="ut-option-field">';
                                    $return .= '<label>' . __('Box Title' , 'ut_shortcodes') . ': </label>';
                                $return .= '</div>';
                                
                                $return .= '<div class="ut-option-value">';
                                    $return .= '<input data-group="highlightgroup" data-align="right" class="sc-highlight-item form-control propertychange" type="text" name="" value="" />';
                                $return .= '</div>';
                                
                                $return .= '<div class="hr"></div>';
                                
                                $return  .= '<div class="ut-option-field">';
                                    $return .= '<label>' . __('Box Content' , 'ut_shortcodes') . ': </label>';
                                $return .= '</div>';
                                
                                $return .= '<div class="ut-option-value">';
                                    $return .= '<textarea data-group="highlightgroup" data-align="right" class="sc-highlight-text form-control propertychange" type="text" name="" /></textarea>';
                                $return .= '</div>';
                                
                                $return .= '<div class="hr"></div>';
                                
                                $return  .= '<div class="ut-option-field">';
                                    $return .= '<label>' . __('Box Icon' , 'ut_shortcodes') . ': </label>';
                                $return .= '</div>';
                                
                                $return .= '<div class="ut-option-value">';
                                    $return .= '<input style="margin-bottom:10px !important;" data-align="right" class="sc-highlight-icon attr form-control" type="text" data-attrname="icon" value="" />';
                                    $return .= '<a href="#" data-group="highlightgroup" class="btn btn-primary btn-sm open-ut-modal sc-highlight-modal"> ' . __('Choose Icon' , 'ut_shortcodes') . '</a>';
                                $return .= '</div>';
                                
                                $return .= '<div class="hr"></div>';
                                
                                $return  .= '<div class="ut-option-field">';
                                    $return .= '<label>' . __('Icon Color' , 'ut_shortcodes') . ': </label>';
                                $return .= '</div>';
                                
			                    $return .= '<div class="ut-option-value"><input data-group="highlightgroup" data-align="right" class="sc-highlight-color attr color-picker-hex form-control ut-color-picker" type="text" data-attrname="iconcolor" value="" /></div>';
                                $return .= '<div class="clear"></div>';
                                
                            $return .= '</div>';
                        
                        $return  .= '</div>';
                        
                        $return .= '<div class="clear"></div>';
                        
                    $return  .= '</div>';
                $return .= '</div>';                       
            		
			} elseif( $name == 'clientgroup' ) {
				
				$return .= '<p><label>'.__( 'Manage Clients' , 'ut_shortcodes' ).'</label></p>';
				
					$return .= '<div class="sc-client-items" data-name="item" data-type="s">';
						$return .= '<div class="sc-clients well-white">';
							
							$return  .= '<div class="ut-option-field">';
								$return .= '<label>' . __('Client Name' , 'ut_shortcodes') . ': </label>';
							$return .= '</div>';
							
							$return .= '<div class="ut-option-value">';
								$return .= '<input data-group="clientgroup" class="sc-client-item form-control client-name propertychange" type="text" name="" value="" />';
							$return .= '</div>';
														
							$return  .= '<div class="ut-option-field">';
								$return .= '<label>' . __('Client URL' , 'ut_shortcodes') . ': </label>';
							$return .= '</div>';
							
							$return .= '<div class="ut-option-value">';
								$return .= '<input data-group="clientgroup" class="sc-client-item form-control client-url propertychange" type="text" name="" value="" />';
							$return .= '</div>';
														
							$return  .= '<div class="ut-option-field">';
								$return .= '<label>' . __('Logo' , 'ut_shortcodes') . ': </label>';
							$return .= '</div>';
							
							$return .= '<div class="ut-option-value ut-media-access" style="margin-bottom:10px;">';
									$return .= '<input data-group="clientgroup" class="sc-client-item form-control client-logo propertychange" type="text" value="" />';
									$return .= ut_media_access( __('Add Logo', 'ut_shortcodes' ) );
							$return .= '</div>';
															
							$return .= '<button data-group="clientgroup" type="button" class="btn btn-danger btn-xs remove-group-item"><i class="fa fa-trash-o"></i></button>';							
							
					   $return .= '</div>';
					$return .= '</div>';
					
				$return .= '<button type="button" data-group="clientgroup" class="btn btn-primary btn-xs add-client-item">'.__('Add Client', 'ut_shortcodes' ).'</button><div class="clear"></div><br />';
			
            } elseif( $name == 'imagerotator' ) {
				
				$return .= '<p><label>'.__( 'Manage Images' , 'ut_shortcodes' ).'</label></p>';
				
					$return .= '<div class="sc-irotator-items" data-name="item" data-type="s">';
						$return .= '<div class="sc-irotator well-white">';
																					
							$return  .= '<div class="ut-option-field">';
								$return .= '<label>' . __('Link' , 'ut_shortcodes') . ': </label>';
							$return .= '</div>';
							
							$return .= '<div class="ut-option-value">';
								$return .= '<input data-group="irotatorgroup" class="sc-irotator-item form-control irotator-url propertychange" type="text" name="" value="" />';
							$return .= '</div>';
														
							$return  .= '<div class="ut-option-field">';
								$return .= '<label>' . __('Upload Image' , 'ut_shortcodes') . ': </label>';
							$return .= '</div>';
							
							$return .= '<div class="ut-option-value ut-media-access" style="margin-bottom:10px;">';
									$return .= '<input data-group="irotatorgroup" class="sc-irotator-item form-control irotator-image propertychange" type="text" value="" />';
									$return .= ut_media_access( __('Add Image', 'ut_shortcodes' ) );
							$return .= '</div>';
															
							$return .= '<button data-group="irotatorgroup" type="button" class="btn btn-danger btn-xs remove-group-item"><i class="fa fa-trash-o"></i></button>';							
							
					   $return .= '</div>';
					$return .= '</div>';
					
				$return .= '<button type="button" data-group="irotatorgroup" class="btn btn-primary btn-xs add-irotator-item">'.__('Add Image', 'ut_shortcodes' ).'</button><div class="clear"></div><br />';
                
			} elseif( $name == 'quoterotator' ) {
				
				$return .= '<p><label>'.__( 'Manage Quotes' , 'ut_shortcodes' ).'</label></p>';
				
					$return .= '<div class="sc-quote-items" data-name="item" data-type="s">';
						$return .= '<div class="sc-quotes well-white">';
							
							$return  .= '<div class="ut-option-field">';
								$return .= '<label>' . __('Author' , 'ut_shortcodes') . ': </label>';
							$return .= '</div>';
							
							$return .= '<div class="ut-option-value">';
								$return .= '<input data-group="quotegroup" class="sc-quote-item form-control quote-author propertychange" type="text" name="" value="" />';
							$return .= '</div>';
							
							$return .= '<div class="hr"></div>';
							
							$return  .= '<div class="ut-option-field">';
								$return .= '<label>' . __('Avatar' , 'ut_shortcodes') . ': </label>';
							$return .= '</div>';
							
							$return .= '<div class="ut-option-value ut-media-access" style="margin-bottom:10px;">';
									$return .= '<input data-group="quotegroup" class="sc-quote-item form-control quote-avatar propertychange" type="text" value="" />';
									$return .= ut_media_access( __('Add Avatar', 'ut_shortcodes' ) );
							$return .= '</div>';
							
							$return .= '<div class="hr"></div>';
							
							$return  .= '<div class="ut-option-field">';
								$return .= '<label>' . __('Quote' , 'ut_shortcodes') . ': </label>';
							$return .= '</div>';
							
							$return .= '<div class="ut-option-value">';
								$return .= '<textarea data-group="quotegroup" class="sc-quote-text form-control propertychange" type="text" name="" /></textarea>';
							$return .= '</div>';
															
							$return .= '<button data-group="quotegroup" type="button" class="btn btn-danger btn-xs remove-group-item"><i class="fa fa-trash-o"></i></button>';
							
							
					   $return .= '</div>';
					$return .= '</div>';
					
				$return .= '<button type="button" data-group="quotegroup" class="btn btn-primary btn-xs add-quote-item">'.__('Add Quote', 'ut_shortcodes' ).'</button><div class="clear"></div><br />';
			
			} elseif( $name == 'quoterotator_alt' ) {
				
				$return .= '<p><label>'.__( 'Manage Quotes' , 'ut_shortcodes' ).'</label></p>';
				
					$return .= '<div class="sc-quote-alt-items" data-name="item" data-type="s">';
						$return .= '<div class="sc-quotes-alt well-white">';
							
							$return  .= '<div class="ut-option-field">';
								$return .= '<label>' . __('Author' , 'ut_shortcodes') . ': </label>';
							$return .= '</div>';
							
							$return .= '<div class="ut-option-value">';
								$return .= '<input data-group="quote-alt-group" class="sc-quote-alt-item form-control quote-alt-author propertychange" type="text" name="" value="" />';
							$return .= '</div>';							
						
							$return .= '<div class="hr"></div>';
							
							$return  .= '<div class="ut-option-field">';
								$return .= '<label>' . __('Quote' , 'ut_shortcodes') . ': </label>';
							$return .= '</div>';
							
							$return .= '<div class="ut-option-value">';
								$return .= '<textarea data-group="quote-alt-group" class="sc-quote-alt-text form-control propertychange" type="text" name="" /></textarea>';
							$return .= '</div>';
															
							$return .= '<button data-group="quote-alt-group" type="button" class="btn btn-danger btn-xs remove-group-alt-item"><i class="fa fa-trash-o"></i></button>';
							
							
					   $return .= '</div>';
					$return .= '</div>';
					
				$return .= '<button type="button" data-group="quote-alt-group" class="btn btn-primary btn-xs add-quote-alt-item">'.__('Add Quote', 'ut_shortcodes' ).'</button><div class="clear"></div><br />';
			
			} elseif( $name == 'togglegroup' ){ 
				
				$return .= '<p><label>'.__( 'Manage Accordion' , 'ut_shortcodes' ).'</label></p>';
				
					$return .= '<div class="sc-toggle-items" data-name="item" data-type="s">';
						$return .= '<div class="sc-toggles well-white">';
							
							$return  .= '<div class="ut-option-field">';
								$return .= '<label>' . __('Title' , 'ut_shortcodes') . ': </label>';
							$return .= '</div>';
							
							$return .= '<div class="ut-option-value">';
								$return .= '<input data-group="togglegroup" class="sc-toggle-item form-control propertychange" type="text" name="" value="" />';
							$return .= '</div>';
							
							$return .= '<div class="hr"></div>';
													
							$return  .= '<div class="ut-option-field">';
								$return .= '<label>' . __('Content' , 'ut_shortcodes') . ': </label>';
							$return .= '</div>';
							
							$return .= '<div class="ut-option-value">';
								$return .= '<textarea data-group="togglegroup" class="sc-toggle-text form-control propertychange" type="text" name="" /></textarea>';
							$return .= '</div>';
							
							$return  .= '<div class="ut-option-field">';
								$return .= '<label>' . __('State' , 'ut_shortcodes') . ': </label>';
							$return .= '</div>';
							
							$return .= '<div class="ut-option-value">';
							
							$return .= '<select data-group="togglegroup" class="sc-toggle-state sc-select-live">
											<option value="closed">' . __('closed' , 'ut_shortcodes') . '</option>
											<option value="open">' . __('open' , 'ut_shortcodes') . '</option>
										</select>';
							
							$return .= '</div>';
							
							$return .= '<button data-group="togglegroup" type="button" class="btn btn-danger btn-xs remove-group-item"><i class="fa fa-trash-o"></i></button>';
							
					   $return .= '</div>';
					$return .= '</div>';
					
				$return .= '<button type="button" data-group="togglegroup" class="btn btn-primary btn-xs add-toggle-item">'.__('Add Accordion', 'ut_shortcodes' ).'</button><div class="clear"></div><br />';        
			
			} elseif( $name == 'socialmedia' ){
			
				$return .= '<p><label>'.__( 'Manage Social Media List' , 'ut_shortcodes' ).'</label></p>';
				
					$return .= '<div class="sc-toggle-socials" data-name="item" data-type="s">';
						$return .= '<div class="sc-socials well-white">';
							
							$return  .= '<div class="ut-option-field">';
								$return .= '<label>' . __('Profile Title' , 'ut_shortcodes') . ': </label>';
							$return .= '</div>';
							
							$return .= '<div class="ut-option-value">';
								$return .= '<input data-group="socialgroup" class="sc-social-title form-control propertychange" type="text" name="" value="" />';
							$return .= '</div>';
							
							$return .= '<div class="hr"></div>';
							
							$return  .= '<div class="ut-option-field">';
								$return .= '<label>' . __('Link to Profile' , 'ut_shortcodes') . ': </label>';
							$return .= '</div>';
							
							$return .= '<div class="ut-option-value">';
								$return .= '<input data-group="socialgroup" class="sc-social-link form-control propertychange" type="text" name="" value="" />';
							$return .= '</div>';
							
							$return .= '<div class="hr"></div>';
							
							$return  .= '<div class="ut-option-field">';
								$return .= '<label>' . __('Target' , 'ut_shortcodes') . ': </label>';
							$return .= '</div>';							
							
							$return .= '<div class="ut-option-value">';
								$return .= '<select id="target" class="form-control sc-select-control" data-attrname="target">';
									$return .= '<option value="">Choose Target</option>';
									$return .= '<option value="_blank">_blank</option>';
									$return .= '<option value="_self">_self</option>';
								$return .= '</select>';
							$return .= '</div>';
							
							$return .= '<div class="hr"></div>';
							
							$return  .= '<div class="ut-option-field">';
								$return .= '<label>' . __('Icon' , 'ut_shortcodes') . ': </label>';
							$return .= '</div>';
							
							$return .= '<div class="ut-option-value">';
							
							$return .= '<select data-group="socialgroup" class="sc-social-icon sc-select-live">
											<option value="fa-adn">adn</option>
											<option value="fa-android">android</option>
											<option value="fa-apple">apple</option>
											<option value="fa-bitbucket">bitbucket</option>
											<option value="fa-bitcoin">bitcoin</option>
											<option value="fa-btc">btc</option>
											<option value="fa-css3">css3</option>
											<option value="fa-dribbble">dribbble</option>
											<option value="fa-dropbox">dropbox</option>
											<option value="fa-facebook">facebook</option>
											<option value="fa-flickr">flickr</option>
											<option value="fa-foursquare">foursquare</option>
											<option value="fa-github">github</option>
											<option value="fa-gittip">gittip</option>
											<option value="fa-google-plus">google-plus</option>
											<option value="fa-html5">html5</option>
											<option value="fa-instagram">instagram</option>
											<option value="fa-linkedin">linkedin</option>
											<option value="fa-linux">linux</option>
											<option value="fa-maxcdn">maxcdn</option>
											<option value="fa-pinterest">pinterest</option>
											<option value="fa-renren">renren</option>
											<option value="fa-skype">skype</option>
											<option value="fa-stack-exchange">stackexchange</option>
											<option value="fa-trello">trello</option>
											<option value="fa-tumblr">tumblr</option>
											<option value="fa-twitter">twitter</option>
											<option value="fa-vk">vk</option>
											<option value="fa-weibo">weibo</option>
											<option value="fa-windows">windows</option>
											<option value="fa-xing">xing</option>
											<option value="fa-youtube">youtube</option>
										</select>';
							
							$return .= '</div>';
							
							$return .= '<div class="hr"></div>';
													
							$return  .= '<div class="ut-option-field">';
								$return .= '<label>' . __('Content' , 'ut_shortcodes') . ': </label>';
							$return .= '</div>';
							
							$return .= '<div class="ut-option-value">';
								$return .= '<textarea data-group="socialgroup" class="sc-social-text form-control propertychange" type="text" name="" /></textarea>';
							$return .= '</div>';
							
							$return .= '<button data-group="socialgroup" type="button" class="btn btn-danger btn-xs remove-group-item"><i class="fa fa-trash-o"></i></button>';
							
					   $return .= '</div>';
					$return .= '</div>';
					
				$return .= '<button type="button" data-group="togglegroup" class="btn btn-primary btn-xs add-social-item">'.__('Add Profile', 'ut_shortcodes' ).'</button><div class="clear"></div>';
			
			
			} elseif( $name == 'probars' ){
				
				$return .= '<label>'.__( 'Manage Bars' , 'ut_shortcodes' ).'</label>';
				
					$return .= '<div class="sc-bar-items" data-name="item" data-type="s">';
					   
					   $return .= '<div class="sc-bars">';
							
							$return  .= '<div class="ut-option-field">';
								$return .= '<label>'.__('Width' , 'ut_shortcodes').'</label>';
							$return .= '</div>';
							
							$return .= '<div class="ut-option-value">';
								$return .= '<input data-group="probars" class="sc-bar-width form-control propertychange" type="text" name="" value="" maxlength="3" />';
							$return .= '</div>';
							
							$return  .= '<div class="ut-option-field">';
								$return .= '<label>'.__('Bar Text' , 'ut_shortcodes').'</label>';
							$return .= '</div>';
							
							$return .= '<div class="ut-option-value">';
								$return .= '<input data-group="probars" class="sc-bar-text form-control propertychange" type="text" name="" value="" />';
							$return .= '</div>';
														
							$return .= '<button type="button" data-group="probars" class="btn btn-danger btn-xs remove-bar-item"><i class="fa fa-trash-o"></i></button>';
							
					   $return .= '</div>';
					   
					   $return .= '<div class="sc-bars sc-to-copy">';
							
							$return .= '<p><label>'.__('Width' , 'ut_shortcodes').'</label>';
							$return .= '<input data-group="probars" class="sc-bar-width" type="text" name="" value="" maxlength="3" /></p>';
							
							$return .= '<p><label>'.__('Bar Text' , 'ut_shortcodes').'</label>';
							$return .= '<input data-group="probars" class="sc-bar-text" type="text" name="" value="" /></p>';
							
							$return .= '<button type="button" data-group="probars" class="btn btn-danger btn-xs remove-bar-item"><i class="fa fa-trash-o"></i></button>';
							
					   $return .= '</div>';  
										
					   $return .= '<a href="#" data-group="probars" class="btn add-bar-item">'.__('Add Bar to Group', 'ut_shortcodes' ).'</a>';
					   
					$return .= '</div>';
				
			} elseif( $type == 'c' ){
			
				$return .= '<p><label for="'.$code.'-lastcolumn"><input type="checkbox" class="lastcolumn" id="'.$code.'-lastcolumn" /> '.__('last column' , 'ut_shortcodes').'</label></p>';
			
			} elseif( $name == 'customname' ){
			
				$return .= '<input type="text" id="custom-box-name" class="form-control">';
				
			}
			break;
		
        case 'alert':
            
            $return .= '<div class="ut-option-alert">'.$attr_opt['desc'].'</div>';
            break;
        
		case 'colorpicker':
			
			$attr_opt['def'] = (isset($attr_opt['def']) && !empty($attr_opt['def'])) ? $attr_opt['def'] : '';
			
			$return .= '<div class="ut-option-field"><label for="sc-opt-'.$name.'">'.$attr_opt['title'].': </label></div>';
			$return .= '<div class="ut-option-value"><input class="attr color-picker-hex form-control ut-color-picker" type="text" data-attrname="'.$name.'" value="'.$attr_opt['def'].'" /></div>';
			
			break;
		
		case 'icon':
			
			$attr_opt['def'] = (isset($attr_opt['def']) && !empty($attr_opt['def'])) ? $attr_opt['def'] : '';
			
			$return .= '<div class="ut-option-field"><label for="sc-opt-'.$name.'">'.$attr_opt['title'].': </label></div>';
			$return .= '<div class="ut-option-value">';
				$return .= '<input style="margin-bottom:10px !important;" class="attr form-control" type="text" data-attrname="'.$name.'" value="'.$attr_opt['def'].'" />';
				$return .= '<a href="#" class="btn btn-primary btn-sm open-ut-modal"> ' . __('Choose Icon' , 'ut_shortcodes') . '</a>';
			$return .= '</div>';
			
			break;
		
		case 'range':
			
			$attr_opt['def'] = (isset($attr_opt['def']) && !empty($attr_opt['def'])) ? $attr_opt['def'] : '';
			
            /* config */            
            $min   = !empty($attr_opt['min'])   ? $attr_opt['min']   : '0';
            $max   = !empty($attr_opt['max'])   ? $attr_opt['max']   : '1';
            $step  = !empty($attr_opt['step'])  ? $attr_opt['step']  : '0.1';
            $value = !empty($attr_opt['value']) ? $attr_opt['value'] : '0.8';            
            
			$return .= '<div class="ut-option-field"><label for="sc-opt-'.$name.'">'.$attr_opt['title'].': </label></div>';
			$return .= '<div class="ut-option-value ut-range-slider-group ut-jquery-ui">';
				$return .= '<div class="ut-range-slider" data-min="' . $min . '" data-max="' . $max . '" data-step="' . $step . '" data-value="' . $value . '"></div>';
				$return .= '<span class="ut-range-value">' . $value . '</span>';
				$return .= '<input class="attr form-control ut-hidden-range-input" type="text" data-attrname="'.$name.'" value="'.$attr_opt['def'].'" />';
			$return .= '</div>';
			
			break;
		
        case 'spacing':
            
            $return .= '<div class="ut-option-field">';
				$return .= '<label for="sc-opt-'.$name.'">'.$attr_opt['title'].': </label><br />';
                
                if( !empty($attr_opt['desc']) ) {
					$return .= '<div class="clear"></div>';
                    $return .= '<span class="description" style="margin-top:10px; display:block;">'.$attr_opt['desc'].'</span>';
				}
                
			$return .= '</div>';
            
            $return .= '<div class="ut-option-value">';
                
                $return .= '<div class="ut-spacing-group">';
                    
                    $return .= '<div class="ut-spacing-left"><input class="attr form-control" type="text" data-attrname="'.$name.'_left" value="" /></div>';
                    $return .= '<div class="ut-spacing-top"><input class="attr form-control" type="text" data-attrname="'.$name.'_top" value="" /></div>';
                    $return .= '<div class="ut-spacing-right"><input class="attr form-control" type="text" data-attrname="'.$name.'_right" value="" /></div>';
                    $return .= '<div class="clear"></div>';
                    $return .= '<div class="ut-spacing-bottom"><input class="attr form-control" type="text" data-attrname="'.$name.'_bottom" value="" /></div>';
                        
                $return .= '</div>';
                
            $return .= '</div>';
            
            break;	
		
        case 'separator':
            
            $return .= '<h4 class="ut-option-separator">' . $attr_opt['title'] . ':</h4>';
            break;
        
		case 'mediaaccess':
			
			$attr_opt['def'] = (isset($attr_opt['def']) && !empty($attr_opt['def'])) ? $attr_opt['def'] : '';
			
			$return .= '<div class="ut-option-field">';
				$return .= '<label for="sc-opt-'.$name.'">'.$attr_opt['title'].': </label><br />';
			$return .= '</div>';	
			
            $return .= '<div class="ut-option-value ut-media-access">';
                
                $return .= '<input class="attr form-control" type="text" data-attrname="'.$name.'" value="'.$attr_opt['def'].'" />';
                $return .= ut_media_access( $attr_opt['title'] );
                
                if( isset($attr_opt['desc']) && !empty($attr_opt['desc']) ) {
					$return .= '<div class="clear"></div>';
                    $return .= '<span class="description" style="margin-top:10px; display:block;">'.$attr_opt['desc'].'</span>';
				}

            $return .= '</div>';
			
			break;
		
		default:
			
			$attr_opt['def'] = (isset($attr_opt['def']) && !empty($attr_opt['def'])) ? $attr_opt['def'] : '';
			
			$return  = '<div class="ut-option-field">';
				$return .= '<label for="sc-opt-'.$name.'">'.$attr_opt['title'].': </label>';
			$return .= '</div>';
			
			$return .= '<div class="ut-option-value">';
			
				$return .= '<input class="attr form-control" type="text" data-attrname="'.$name.'" value="'.$attr_opt['def'].'" />';
				
				if( isset($attr_opt['desc']) && !empty($attr_opt['desc']) ) {
					$return .= '<span class="description">'.$attr_opt['desc'].'</span>';
				}
			
			$return .= '</div>';
			
			break;
			
		}
		
        if($attr_opt['type'] != 'separator'){
		    $return .= '<div class="hr"></div>';
        }
        
		return $return;
		
	}

}


/*
|--------------------------------------------------------------------------
| generate shortcode radio option field
|--------------------------------------------------------------------------
*/
if ( !function_exists( 'ut_generate_radio_option' ) ) {

	function ut_generate_radio_option( $name, $attr_opt, $type, $code ) {
		
		$return  = '<div class="ut-option-field">';
			$return  .= $attr_opt['title'] . ':';
		$return .= '</div>';
		
		$return .= '<div class="ut-option-value">';
			
			$return .= '<div class="btn-group" data-toggle="buttons">';
			
			foreach( $attr_opt['opt'] as $val => $title ){
				
				$return .= '<label for="sc-opt-'.$code.'-'.$name.'-'.$val.'" data-value="'.$val.'" class="btn btn-primary '.($val==$attr_opt['def']?'active':'').'">';
				$return .= '<input class="attr" type="radio" data-attrname="'.$name.'" name="'.$code.'-'.$name.'" value="'.$val.'" id="sc-opt-'.$code.'-'.$name.'-'.$val.'"'.($val==$attr_opt['def']?' checked="checked"':'').'>';
				$return .= $title;
				$return .= '</label>';						
			}
			
			$return .= '</div>';
			
			if( isset($attr_opt['desc']) && !empty($attr_opt['desc']) ) {
			
				$return .= '<span class="description">'.$attr_opt['desc'].'</span>';
			
			}
			
		$return .= '</div>';
		$return .= '<div class="hr"></div>';
		
		return $return;
		
	}
	
}


/*
|--------------------------------------------------------------------------
| generate shortcode select option field
|--------------------------------------------------------------------------
*/
if ( !function_exists( 'ut_generate_select_option' ) ) {

	function ut_generate_select_option( $name, $attr_opt, $type, $code ) {
		
		/* values */
		$values = $attr_opt['values'];
		
		/* start output */
		$return  = '<div class="ut-option-field">';
			$return .= '<label for="'.$name.'">' . $attr_opt['title'] . ': </label>';
		$return .= '</div>';
			
		$return .= '<div class="ut-option-value">';
		$return .= '<select data-attrname="'.$name.'" class="form-control sc-select-control" id="'.$name.'">';
		
			$return .= '<option value="">' . __( 'Choose' , 'ut_shortcodes' ) . ' '  . $attr_opt['title'] . '</option>';
			
			foreach( $values as $value ){
				
				$return .= '<option value="'.$value.'">'.$value.'</option>';
				
			}
			
			$return .= '</select>';
			
			if( isset($attr_opt['desc']) && !empty($attr_opt['desc']) ) {
			
				$return .= '<span class="description">'.$attr_opt['desc'].'</span>';
			
			} else {
			
				$return .= '';
				
			}
		
		$return .= '</div>';
		$return .= '<div class="hr"></div>';
			
		return $return;
		
	}
	
}

/*
|--------------------------------------------------------------------------
| generate shortcode effect select option field
|--------------------------------------------------------------------------
*/
if ( !function_exists( 'ut_generate_effect_option' ) ) {

	function ut_generate_effect_option( $name, $type, $code, $attr_opt ) {
		
		/* values */
		$values = ut_recognized_animation_effects();
		
		/* start output */
		$return  = '<div class="ut-option-field">';
			$return .= '<label for="'.$name.'">' . $attr_opt['title'] . ': </label>';
		$return .= '</div>';
			
		$return .= '<div class="ut-option-value">';
		$return .= '<select data-attrname="'.$name.'" class="form-control sc-select-control" id="'.$name.'">';
		
			$return .= '<option value="">' . __( 'Choose Effect' , 'ut_shortcodes' ) . '</option>';
			
			foreach( $values as $key => $value ){
				
				$return .= '<option value="'.$key.'">'.$value.'</option>';
				
			}
			
			$return .= '</select>';
			
			if( isset($attr_opt['desc']) && !empty($attr_opt['desc']) ) {
			
				$return .= '<span class="description">'.$attr_opt['desc'].'</span>';
			
			} else {
			
				$return .= '';
				
			}
		
		$return .= '</div>';
		
        $return .= '<div class="hr"></div>';
        
		return $return;
		
	}
	
}


/*
|--------------------------------------------------------------------------
| Media Access Button
|--------------------------------------------------------------------------
*/
if ( !function_exists( 'ut_media_access' ) ) {

	function ut_media_access($button_text = "Insert", $uploader_title = "Site Files", $uploader_button = "Insert", $uploader_type = ""){
		
		$button = sprintf('<a href="#" class="ut-upload-button btn btn-primary btn-sm" data-uploader_title="%s" data-uploader_button_text="%s" data-limit_type="%s"><i class="fa fa-picture fa-inverse"></i> %s</a>', $uploader_title, $uploader_button, $uploader_type, $button_text);
		return $button;
	
	}
	
}

/*
|--------------------------------------------------------------------------
| generate shortcode select field
|--------------------------------------------------------------------------
*/
if ( !function_exists( 'ut_generate_sc_select' ) ) {
	
	function ut_generate_sc_select() {
		
		global $ut_shortcodes;
		
		$counter = 1;
		$select  = '<p><select id="ut-shortcodes" class="form-control">';
		$select .= '<option selected="selected" value="" disabled="disabled">'.__('Choose Shortcode' , 'ut_shortcodes').'</option>';
		
		foreach( $ut_shortcodes as $code => $options ){
			
			/* definition is a headline */
			if($code == 'headline_'.$counter) {
				
				$select .= '<option class="disabled" value="'.$options['title'].'" disabled="disabled">'.$options['title'].'</option>';
				$counter++;
			
			/* definition is a shortcode */	
			} else {
				
				$options['clabel'] = (isset($options['clabel']) && !empty($options['clabel'])) ? $options['clabel'] : '';
				$select .= '<option value="'.$code.'" data-clabel="'.$options['clabel'].'">'.$options['title'].'</option>';
				
			}
			
		}
		
		$select .= '</select></p>';
        
		return $select;
		
	}
	
}


/*
|--------------------------------------------------------------------------
| generate shortcode boxes
|--------------------------------------------------------------------------
*/
if ( !function_exists( 'ut_generate_sc_box' ) ) {
	
	function ut_generate_sc_box() {
		
		global $ut_shortcodes;
		
		$boxes   = '';
		$counter = 1;
		
		$boxes .= '<h4 class="sc-settings">'.__('Shortcode Settings:' , 'ut_shortcodes').'</h4>';

		foreach( $ut_shortcodes as $code => $options ){
			
			if( $code == 'headline_'.$counter ) {
				
				$counter++;
			
			} else {
			
			$boxes .= '<div class="sc-options well" id="options-'.$code.'" data-name="'.$code.'" data-type="'.$options['type'].'">';
						
				if( isset($options['attr']) ){
																			  
					 foreach( $options['attr'] as $name => $attr_opt ){
						$boxes .= ut_get_option_element( $name, $attr_opt, $options['type'], $code );
					 }
					 
				}
			
			$boxes .= '</div>';
			
			}
				
		}
				
		return $boxes;
		
	}
	
} ?>