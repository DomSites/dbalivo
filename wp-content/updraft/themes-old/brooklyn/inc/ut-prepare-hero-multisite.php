<?php

/*
|--------------------------------------------------------------------------
| helper function : returns needed options of the current page
|--------------------------------------------------------------------------
*/

if( !function_exists('ut_return_hero_config') ) {

	function ut_return_hero_config( $option = '' , $fallback = '' , $single = true ) {
        
        /* no option has been set - leave here */
        if( empty( $option ) ) {
            return;
        }
        
        $option = trim($option);
        
        $global_hero_styling = array();
        
        /* store post ID for later use */
        $current = get_queried_object();        
        
        $hero_post_id = isset( $current->ID ) ? $current->ID : '';
        
        /* Config Array gets filled by filters */
        $config = apply_filters( 'ut_hero_config', array() );
                
        /* Global Hero Styles */        
        $global_hero_styling = _ut_page_hero_global_styling( $hero_post_id );
        $global_hero_overlay_styling = _ut_page_hero_overlay_global_styling( $hero_post_id );
                
        // Temporary Single Hero Settings
        if( is_single() && !is_singular('portfolio') ) {
            
            if( $option == 'ut_hero_image_parallax' ) {
                return 'on';
            }                
            
        }
        
        /* portfolio exceptions */
        if( is_singular('portfolio') ) {
            
            /* hero type fallback */
            if( $option == 'ut_hero_type' ) {
                
                if( get_post_format() == '' && get_post_meta( $hero_post_id , 'ut_page_hero_type' , true ) == '' ) {
                    return 'image';                    
                }
                
                if( get_post_format() == 'video' && get_post_meta( $hero_post_id , 'ut_page_hero_type' , true ) == '' ) {
                    return 'video';                    
                }
                
                if( get_post_format() == 'gallery' && get_post_meta( $hero_post_id , 'ut_page_hero_type' , true ) == '' ) {
                    return 'slider';                    
                }
            
            }                
            
            /* hero image will be delivered by featured or detailed image */
            if( $option == 'ut_hero_image' || $option == 'ut_hero_animated_image' || $option == 'ut_video_poster' ) {
                
                /* switch option key */
                switch ( $option ) {
                
                    case 'ut_hero_image':
                        $optionkey = 'ut_page_hero_image';
                        break;
                        
                    case 'ut_hero_animated_image':
                        $optionkey = 'ut_page_hero_animated_image';
                        break;
                        
                    case 'ut_video_poster':
                        $optionkey = 'ut_page_video_poster';
                        break;
                
                }                    
                
                /* check if detail image has been set */
                $hero_image = get_post_meta( $hero_post_id , $optionkey , true );
                
                if( is_array($hero_image) && array_filter($hero_image) && !empty($hero_image['background-image']) ) {
                    
                    $fullsizeID = ut_get_attachment_id_from_url($hero_image['background-image']);
                    
                } elseif( !is_array($hero_image) && !empty($hero_image) ) {
                    
                    $fullsizeID = ut_get_attachment_id_from_url($hero_image);
                    
                } else {
                    
                    $hero_image = wp_get_attachment_url( get_post_thumbnail_id( $hero_post_id ) ); 
                    $fullsizeID = ut_get_attachment_id_from_url( $hero_image );
                    
                }
                                    
                if( ( $option == 'ut_hero_caption_slogan' || $option == 'ut_hero_caption_title' ) && ( get_post_format() == '' && get_post_meta($hero_post_id , 'ut_page_hero_type' , true ) == '') ) {
                    
                    $thumbnaildetails = get_posts(array('p' => $fullsizeID, 'post_type' => 'attachment'));
                                            
                    if( $option == 'ut_hero_caption_slogan' && !empty($thumbnaildetails[0]->post_excerpt) ) {
                        return $thumbnaildetails[0]->post_excerpt;
                    } 
                    
                    if( $option == 'ut_hero_caption_title' && !empty($thumbnaildetails[0]->post_title) ) {
                        return $thumbnaildetails[0]->post_title;
                    }
                
                }
                
                if( $option == 'ut_hero_image' || $option == 'ut_hero_animated_image' || $option == 'ut_video_poster' ) {                    
                    return $hero_image;                    
                }                    
                
            }
            
            if( $option == 'ut_background_slider_slides' || $option == 'ut_fancy_slider_slides' ) {
                
                /* fallback to old hero */
                if( get_post_format() == 'gallery' && get_post_meta( $hero_post_id , 'ut_page_hero_type' , true ) == '' && function_exists('ut_portfolio_extract_gallery_images_ids') ) {
                    
                    $galleryimages = array();
                    $key = NULL;
                    
                    /* rebuild old array */
                    foreach ( ut_portfolio_extract_gallery_images_ids($hero_post_id) as $ID => $imagedata ) : 
                        
                        $thumbnaildetails = get_posts(array('p' => $imagedata, 'post_type' => 'attachment'));
                          
                        if( !empty($thumbnaildetails[0]->post_excerpt) ) {
                            $galleryimages[$key]['expertise'] = $thumbnaildetails[0]->post_excerpt;                              
                        }
                        
                        if( !empty($thumbnaildetails[0]->post_title) ) {
                            $galleryimages[$key]['description' ] = $thumbnaildetails[0]->post_title;                              
                        }                             
                                
                        if( isset( $imagedata->guid ) && !empty($imagedata->guid) ) {
                          
                            $image = $imagedata->guid; // fallback to older wp versions
                              
                        } else {
                              
                            $image = wp_get_attachment_image_src($imagedata , 'single-post-thumbnail');					
                              
                        }
                    
                        if( !empty($image[0]) ) :
                              
                            $galleryimages[$key]['image'] = $image[0];
                              
                        endif; 
                    
                    $key++;
                    
                    endforeach;
                                            
                    return $galleryimages;                        
                                             
                } else {
                 
                    /* let's try to load background sliders , if no sliders found, let's try to load a gallery from the content */
                    $slider_type = ( $option == 'ut_background_slider_slides' ) ? 'ut_page_hero_slider' : 'ut_page_hero_fancy_slider';                                                
                    $galleryslides = get_post_meta( $hero_post_id , $slider_type , $single );
                    
                    if( empty( $galleryslides ) && function_exists('ut_portfolio_extract_gallery_images_ids') ) {
                        
                        $galleryimages = array();
                        $extracted_images = ut_portfolio_extract_gallery_images_ids( $hero_post_id );                        
                        
                        $key = NULL;
                        
                        if( !empty( $extracted_images ) && is_array( $extracted_images ) ) {
                        
                        /* rebuild old array */
                        foreach ( $extracted_images as $ID => $imagedata ) : 
                            
                            $thumbnaildetails = get_posts(array('p' => $imagedata, 'post_type' => 'attachment'));
                              
                            if( !empty($thumbnaildetails[0]->post_excerpt) ) {
                                $galleryimages[$key]['expertise'] = $thumbnaildetails[0]->post_excerpt;                              
                            }
                            
                            if( !empty($thumbnaildetails[0]->post_title) ) {
                                $galleryimages[$key]['description' ] = $thumbnaildetails[0]->post_title;                              
                            }                             
                                    
                            if( isset( $imagedata->guid ) && !empty($imagedata->guid) ) {
                              
                                $image = $imagedata->guid; // fallback to older wp versions
                                  
                            } else {
                                  
                                $image = wp_get_attachment_image_src($imagedata , 'single-post-thumbnail');					
                                  
                            }
                        
                            if( !empty($image[0]) ) :
                                  
                                $galleryimages[$key]['image'] = $image[0];
                                  
                            endif; 
                        
                        $key++;
                        
                        endforeach;
                        
                        }
                    
                        return $galleryimages; 
                    
                    
                    } else {
                    
                        return $galleryslides;
                    
                    }
                
                
                }
            
            }                
        
        }
        
        /* $option exceptions for single pages - featured image in hero */
        if( $option == 'ut_hero_image') {
            
            $hero_image = get_post_meta( $hero_post_id , 'ut_page_hero_image' , true );
            
            if( is_array($hero_image) && array_filter($hero_image) && !empty($hero_image['background-image']) ) {
                
                
            } elseif( !is_array($hero_image) && !empty($hero_image) ) {                    
                
                
            } else {
                
                $hero_image   = wp_get_attachment_url(get_post_thumbnail_id($hero_post_id));                    
                
            }
            
            return $hero_image;
            
        }
        
        
        /* option exceptions for single pages - check main button status */
        if( $option == 'ut_main_hero_button') {
        
            $button_status = get_post_meta( $hero_post_id , 'ut_page_main_hero_button' , $single );
            $button_text   = get_post_meta( $hero_post_id , 'ut_page_main_hero_button_text' , $single );
            
            if( $button_status == 'on' && !empty($button_text) ) {
                
                return $button_text;
                
            } else {
                
                return '';
                
            }
        
        }
        
        /* return correct button url */
        if( $option == 'ut_main_hero_button_target') {
        
            $ut_main_hero_button_url_type = get_post_meta( $hero_post_id , 'ut_page_main_hero_button_url_type' , $single );                
            return ( $ut_main_hero_button_url_type == 'content' ) ? '#ut-to-first-section' : get_post_meta( $hero_post_id , 'ut_page_main_hero_button_url' , $single);
            
        }
        
        if( $option == ' ut_main_hero_button_link_target') {
            
            $ut_main_hero_button_url_type = get_post_meta( $hero_post_id , 'ut_page_main_hero_button_url_type' , $single );                
            return $ut_main_hero_button_url_type == 'content' ? '_self' : get_post_meta( $hero_post_id , 'ut_page_main_hero_button_target' , $single);
        
        }
                    
        /* second button target behavior */
        if( $option == 'ut_second_hero_button_url') {
        
            $ut_second_hero_button_url_type = get_post_meta( $hero_post_id , 'ut_page_second_button_url_type' , $single );
            return ( $ut_second_hero_button_url_type == 'content' ) ? '#ut-to-first-section' : get_post_meta( $hero_post_id , 'ut_page_second_button_url' , $single);
        
        }
    
        
        if( empty( $fallback ) && isset( $config[$option] ) ) {
            
            if( array_key_exists( $option, $global_hero_styling ) ) {
                    
                return ot_get_option( $global_hero_styling[$option] );
                
            } else {
                
                // overlay settings first
                if( array_key_exists( $option, $global_hero_overlay_styling ) ) {
                    
                    return ot_get_option( $global_hero_overlay_styling[$option] );
                    
                } else {
                    
                    // check if option is forced to use a global value
                    if( 'ut_portfolio_hero_style' == $config[$option] ) {
                        
                        $option_parent = 'ut_page_hero_style';
                        
                    } elseif( 'ut_portfolio_caption_align' == $config[$option] ) {
                        
                        $option_parent = 'ut_page_hero_align';
                        
                    } else {
                        
                        $option_parent = $config[$option];
                        
                    }
                    
                    $overwrite = get_post_meta( $hero_post_id, $option_parent . '_global_overwrite', true );    
                    
                    if( $overwrite == 'on' ) {

                        // get global value
                        if (strpos($config[$option], 'ut_portfolio_') !== false) {
                            
                            // portfolio exceptions temporary fix
                            if( 'ut_portfolio_caption_align' == $config[$option] ) {
                                
                                $overwrite = 'ut_global_hero_align';
                                
                            } else {
                                
                                $overwrite = str_replace('ut_portfolio_', 'ut_global_', $config[$option] );    
                                
                            }     
                            
                        } else {
                            
                            $overwrite = str_replace('ut_page_', 'ut_global_', $config[$option] );
                            
                        }
                        
                        return ot_get_option( $overwrite );

                    } else {

                        // get custom value
                        return get_post_meta($hero_post_id , $config[$option] , $single );    

                    }
                    
                }
                
            }                            
            
        } elseif( !empty( $fallback ) && isset( $config[$option] ) ) { 
            
            if( array_key_exists( $option, $global_hero_styling ) ) {
                
                $value = ot_get_option( $global_hero_styling[$option] );
                
            } else { 
                
                // overlay settings first
                if( array_key_exists( $option, $global_hero_overlay_styling ) ) {
                    
                    $value = ot_get_option( $global_hero_overlay_styling[$option] );
                    
                } else {
                    
                    // check if option is forced to use a global value
                    if( 'ut_portfolio_hero_style' == $config[$option] ) {
                        
                        $option_parent = 'ut_page_hero_style';
                        
                    } elseif( 'ut_portfolio_caption_align' == $config[$option] ) {
                        
                        $option_parent = 'ut_page_hero_align';
                        
                    } else {
                        
                        $option_parent = $config[$option];
                        
                    }
                    
                    $overwrite = get_post_meta( $hero_post_id, $option_parent . '_global_overwrite', true );    
                    
                    if( $overwrite == 'on' ) {

                        // get global value
                        if (strpos($config[$option], 'ut_portfolio_') !== false) {
                            
                            // portfolio exceptions temporary fix
                            if( 'ut_portfolio_caption_align' == $config[$option] ) {
                                
                                $overwrite = 'ut_global_hero_align';
                                
                            } else {
                                
                                $overwrite = str_replace('ut_portfolio_', 'ut_global_', $config[$option] );    
                                
                            }                            
                            
                        } else {
                            
                            $overwrite = str_replace('ut_page_', 'ut_global_', $config[$option] );
                            
                        }                        
                        
                        $value = ot_get_option( $overwrite );

                    } else {

                        // get custom value
                        $value = get_post_meta($hero_post_id , $config[$option] , $single );    

                    }
                    
                }
            
            }
                            
            return !empty( $value ) ? $value : $fallback;
            
        }
        
        elseif( !empty( $fallback ) && !isset( $config[$option] ) ) {

            return $fallback;
                        
        }
        
        else {
            
            return false;
            
        }
        
        
    }

}

?>