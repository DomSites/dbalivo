<?php


if( !function_exists('ut_return_hero_config') ) {

	function ut_return_hero_config( $option = '' , $fallback = '' , $single = true ) {
        
        /* no option has been set - leave here */
        if( empty( $option ) ) {
            return;
        }
        
        /* trim whitespaces */
        $option = trim( $option );
        
        /* Store Post ID */
        $hero_post_id = get_the_ID();
        
        /* Fetch Post ID if Shop is displaying */
        if( ut_is_shop() ) {
            $hero_post_id = get_option('woocommerce_shop_page_id');    
        }
        
        /* global key array for single pages */
        $global_hero_styling = array();
        
        /* Config Array gets filled by filters */
        $config = apply_filters( 'ut_hero_config', array() );
                
        /* Global Hero Styles */        
        if( !is_front_page() && is_page() || ut_is_shop() || is_singular('product') || is_singular('portfolio') || is_search() || is_404() || is_archive() || apply_filters( 'ut_maintenance_mode_active', false ) ) {
            
            $global_hero_styling = _ut_page_hero_global_styling( $hero_post_id );                
        
        }
        
        // Temporary Single Hero Settings
        if( is_single() && !is_singular('portfolio') ) {
            
            if( $option == 'ut_hero_image_parallax' ) {
                return 'on';
            }                
            
        }
        
        
        /* option exceptions for frontpage */
        if( is_front_page() && !is_home() ) {
        
            /* main hero button target behavior */
            if( $option == 'ut_main_hero_button_target') {
                
                $ut_main_hero_button_url_type   = ot_get_option( $config['ut_main_hero_button_url_type'] );
                $ut_main_hero_button_target     = ot_get_option( $config['ut_main_hero_button_target'] );                
                                                
                return ( !empty( $ut_main_hero_button_target ) && $ut_main_hero_button_url_type == 'section' ) ? '#section-' . ut_get_the_slug($ut_main_hero_button_target) : ot_get_option('ut_front_scroll_to_main_url', $fallback) ;
                
                
            }
                        
            if( $option == 'ut_main_hero_button_link_target' ) {
                
                $ut_main_hero_button_url_type = ot_get_option($config['ut_main_hero_button_url_type']);
                return $ut_main_hero_button_url_type == 'section' ? '_self' : ot_get_option('ut_front_scroll_to_main_link_target' , '_self');
            
            }
            
            /* second button target behavior */
            if( $option == 'ut_second_hero_button_url') {
                
                $ut_second_hero_button_url_type = ot_get_option('ut_front_second_button_url_type');
                $ut_second_hero_button_target   = ot_get_option('ut_front_second_button_scroll_target');
                
                return ( !empty( $ut_second_hero_button_target ) && $ut_second_hero_button_url_type == 'section' ) ? '#section-' . ut_get_the_slug($ut_second_hero_button_target) : ot_get_option('ut_front_second_button_url') ;            
            
            }
            
            if( $option == 'ut_second_hero_button_target' ) {
            
                $ut_second_hero_button_url_type = ot_get_option('ut_front_second_button_url_type');
                return $ut_second_hero_button_url_type == 'section' ? '_self' : ot_get_option('ut_front_second_button_target' , '_self');
            
            }
            
        }        
        
        /* option exceptions for blog */
        if( is_home() ) {
        
            /* main hero button target behavior */
            if( $option == 'ut_main_hero_button_target') {
            
                return '#ut-to-first-section';
           
            }
            
            if( $option == 'ut_main_hero_button_link_target' ) {
                
                return '_self';
            
            }
            
        
        }
        
        /* front and blog settings are stored inside the theme options */
        if( is_front_page() || is_home() ) {
        
            if( empty( $fallback ) && isset( $config[$option] ) ) {        
                return ot_get_option( $config[$option] );
            }
            
            elseif( !empty( $fallback ) && isset( $config[$option] ) ) {        
                return ot_get_option( $config[$option] , $fallback );
            }
            
            elseif( !empty( $fallback ) && !isset( $config[$option] ) ) {
                return $fallback;
            }
            
            else {
                return false;
            }
        
        /* page and portfolio hero settings are provided by meta boxes*/        
        } else {
            
            /* portfolio exceptions */
            if( is_singular( 'portfolio' ) ) {
                
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
                    
                    $hero_image   = wp_get_attachment_url( get_post_thumbnail_id( $hero_post_id ) ); 
                    
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
                    
                }                
                
                return get_post_meta( $hero_post_id , $config[$option] , $single );
                
            } 
            
            elseif( !empty( $fallback ) && isset( $config[$option] ) ) { 
                
                if( array_key_exists( $option, $global_hero_styling ) ) {
                    
                    $value = ot_get_option( $global_hero_styling[$option] );
                    
                } else { 
                             
                    $value = get_post_meta( $hero_post_id , $config[$option] , $single );
                    
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

}


