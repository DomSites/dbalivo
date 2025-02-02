<?php

/*
|--------------------------------------------------------------------------
| Contact Section Video Player
|--------------------------------------------------------------------------
*/
if( !function_exists('ut_create_csection_bg_video') ) :
    
    function ut_create_csection_bg_video() {
        
        /* settings */        
        $playerconfig = array();
        $ut_csection_video_source = ot_get_option('ut_csection_video_source' , 'youtube');
        
        if( $ut_csection_video_source == 'youtube' ) {
            $ut_csection_video = ot_get_option('ut_csection_video');
            if(isset($ut_csection_video) && $ut_csection_video != '') { array_push($playerconfig, 'video="'.$ut_csection_video.'"'); }
        }
                    
        if( $ut_csection_video_source == 'selfhosted' ) {
            $ut_csection_video_mp4 = ot_get_option('ut_csection_video_mp4');
            if(isset($ut_csection_video_mp4) && $ut_csection_video_mp4 != '') { array_push($playerconfig, 'mp4="'.$ut_csection_video_mp4.'"'); }
            
            $ut_csection_video_ogg = ot_get_option('ut_csection_video_ogg');
            if(isset($ut_csection_video_ogg) && $ut_csection_video_ogg != '') { array_push($playerconfig, 'ogg="'.$ut_csection_video_ogg.'"'); }
            
            $ut_csection_video_webm = ot_get_option('ut_csection_video_webm');
            if(isset($ut_csection_video_webm) && $ut_csection_video_webm != '') { array_push($playerconfig, 'webm="'.$ut_csection_video_webm.'"'); }
            
            $ut_csection_video_preload = ot_get_option('ut_csection_video_preload');
            if(isset($ut_csection_video_preload) && $ut_csection_video_preload != '') { array_push($playerconfig, 'preload="'.$ut_csection_video_preload.'"'); }
        }
        
        $ut_csection_video_loop = ot_get_option('ut_csection_video_loop');
        if(isset($ut_csection_video_loop) && $ut_csection_video_loop != '') { array_push($playerconfig, 'loop="'.$ut_csection_video_loop.'"'); }
        
        $ut_csection_video_volume = ot_get_option('ut_csection_video_volume');
        if(isset($ut_csection_video_volume) && $ut_csection_video_volume != '') { array_push($playerconfig, 'volume="'.$ut_csection_video_volume.'"'); }
        
        $ut_csection_video_sound = ot_get_option('ut_csection_video_sound');
        if(isset($ut_csection_video_sound) && $ut_csection_video_sound != '') { array_push($playerconfig, 'sound="'.$ut_csection_video_sound.'"'); }
        
        $ut_csection_video_mute_button = ot_get_option('ut_csection_video_mute_button' , true );
        if(isset($ut_csection_video_mute_button) && $ut_csection_video_mute_button != '') { array_push($playerconfig, 'mutebutton="'.$ut_csection_video_mute_button.'"'); }
        
        echo do_shortcode('[ut_section_video id="contact-section-video" section="#contact-section" source="'.$ut_csection_video_source.'" '.implode(" ", $playerconfig).']');        
        
    }
    
endif; 

/*
|--------------------------------------------------------------------------
| Create Background Video Player
|--------------------------------------------------------------------------
*/
if( !function_exists('ut_create_bg_videoplayer') ) :

    function ut_create_bg_videoplayer( $call = '' ) {
                        
        if( unite_mobile_detection()->isMobile() ) {
            return;
        }
        
        $player = NULL;
        $video_url = NULL;
        $youtube = false;
        $vimeo = false;
        $custom = false;
        $selfhosted = false;        
        $containment = ( ut_return_hero_config('ut_video_containment' , 'hero') == 'body' ) ? 'body' : '#ut-hero';
                          
        /* only create player for desktop devices */
        if( !unite_mobile_detection()->isMobile() ) : 
                                                  
            /* check if youtube is active */
            if( ut_return_hero_config('ut_video_source' , 'youtube') == 'youtube' ) {
                $youtube = true;
            }
            
            /* check if vimeo is active */
            if( ut_return_hero_config('ut_video_source' , 'youtube') == 'vimeo' ) {
                $vimeo = true;
            }
        
            /* check if youtube is active */
            if( ut_return_hero_config('ut_video_source' , 'youtube') == 'custom' ) {
                $custom = true;
            } 
                        
            /* check if selfhosted is active */
            if( ut_return_hero_config('ut_video_source' , 'youtube') == 'selfhosted' ) {
                $selfhosted = true;
            }           

            /* conditional to prevent selfhosted video displaying inside hero if it has been set to background */
            if( $selfhosted && ut_return_hero_config('ut_video_containment', 'hero') == 'body' && $call == 'section' ) {
                return;
            }
            
            /* conditional to prevent selfhosted video displaying inside the background if it has been set to hero */
            if( $selfhosted && ut_return_hero_config('ut_video_containment', 'hero') == 'hero' && $call == 'body' ) {
                return;
            }            
                                        
            if( $youtube ) {
                                
                $video_url = ut_return_hero_config('ut_video_url');
                
                if( !empty($video_url) ) :
                    
                    $muted   = ut_return_hero_config('ut_video_mute_state' , "off");
					$muted   = ($muted == 'off') ? 'mute : true' : 'mute : false';
                    $volume  = ut_return_hero_config('ut_video_volume' , "5") ;
                    $volume  = ($muted == 'off') ? 'vol : 0' : 'vol: ' . $volume;
                    $loop    = ut_return_hero_config('ut_video_loop' , "on") ;
                    $loop    = ($loop == 'on') ? 'loop : true' : 'loop : false';
                    
                    $startAt = ut_return_hero_config('ut_video_start_at' , "0" ) ;
                    $startAt = !empty( $startAt ) ? $startAt : '0';
                    $stopAt  = ut_return_hero_config('ut_video_stop_at' , "0" ) ;
                    $stopAt  = !empty( $stopAt ) ? $stopAt : '0';
                
                    /* build player */
                    $player .= '<a id="ut-background-video-hero" class="ut-video-player" data-property="{ videoURL : \'' . $video_url . '\' , containment : \'' . $containment . '\', showControls: false, autoPlay : true, '.$loop.', '.$muted.', '.$volume.', startAt : '.$startAt.', stopAt : ' . $stopAt . ', opacity : 1}"></a>';                        
                        
                    return $player;
                
                endif;
            
            } 
            
            if( $vimeo && $call == 'section' ) {
                
                $video_url = ut_return_hero_config('ut_video_vimeo_url');
                
                if( class_exists('UT_Section_Video_player') && $video_url ) {

                    $video = new UT_Section_Video_player();
                    
                    return $video::handle_shortcode( array(
                        'id'            => 'hero',
                        'section'       => '#ut-hero',   
                        'source'        => 'vimeo',
                        'volume'        => ut_return_hero_config('ut_video_volume' , "5"),
                        'sound'         => ut_return_hero_config('ut_video_mute_state' , "off"),
                        'loop'          => ut_return_hero_config('ut_video_loop' , "on"),
                        'video_vimeo'   => $video_url
                    ) );

                }                
                
            }        
        
            if( $selfhosted )  {
                
                $mp4 = $ogg = $webm = NULL;
                
                $mp4  = ut_return_hero_config('ut_video_mp4');
                $ogg  = ut_return_hero_config('ut_video_ogg');
                $webm = ut_return_hero_config('ut_video_webm');
                                                
                if( !empty($mp4) || !empty($ogg) || !empty($webm) ) :
                    
                    $volume  = ut_return_hero_config('ut_video_volume' , "5") ;
                    $muted   = ut_return_hero_config('ut_video_mute_state' , "off");
                    $muted   = ($muted == 'off') ? 'muted' : '';
                    $loop    = ut_return_hero_config('ut_video_loop' , "on") ;
                    $loop    = ($loop == 'on') ? 'loop' : '';
                    $preload = ut_return_hero_config('ut_video_preload' , "on") ;
                    $preload = ($loop == 'on') ? 'preload="auto"' : '';
                                                    
                    $player .= '<div class="ut-video-container"><video id="ut-video-hero" class="ut-selfvideo-player" autoplay '.$loop.' '.$muted.' '.$preload.' volume="'.$volume.'" autobuffer controls>';
                    
                        if( !empty( $mp4 ) ) :
                            
                            $player .= '<source src="' . $mp4 . '" type="video/mp4"> ';
                            
                        endif;
                        
                        if( !empty( $webm ) ) :
                            
                            $player .= '<source src="' . $webm . '" type="video/webm"> ';
                            
                        endif;    
                        
                        if( !empty( $ogg ) ) :
                            
                            $player .= ' <source src="' . $ogg . '" type="video/ogg ogv">';
                                            
                        endif;
                    
                    $player .= '</video></div><div class="ut-video-spacer"></div>';
                    
                    return $player;    
                
                endif; /* check for player files */
            
            }
            
            if( $custom && $call != 'body' )  {
                
                $video_embedded = ut_return_hero_config('ut_video_url_custom');
                $player .= do_shortcode($video_embedded);
                
            }
                    
        endif;
        
        return $player;
        
    }
    
endif;


/*
|--------------------------------------------------------------------------
| Front Page Video Background Player
|--------------------------------------------------------------------------
*/
if( !function_exists('ut_create_front_bg_video') ) :
    
    function ut_create_front_bg_video() {
        
        /* settings */        
        $playerconfig = array();
        
        /* video has been turn off or we are not on the front page */
        if( ot_get_option('ut_front_bg_video_state' , 'off' ) == 'off' || !is_front_page() ) {
            return;
        }            
        
        if( ot_get_option('ut_front_bg_video_source' , 'youtube') == 'youtube' ) {
            
            $ut_front_bg_video_youtube = ot_get_option('ut_front_bg_video_youtube');
            if( isset($ut_front_bg_video_youtube) && $ut_front_bg_video_youtube != '' ) { 
                array_push($playerconfig, 'video="' . $ut_front_bg_video_youtube . '"'); 
            }
            
        }
        
        if( ot_get_option('ut_front_bg_video_source' , 'youtube') == 'selfhosted' ) {
            
            $ut_front_bg_video_mp4 = ot_get_option('ut_front_bg_video_mp4');
            if( isset($ut_front_bg_video_mp4) && $ut_front_bg_video_mp4 != '' ) { 
                array_push($playerconfig, 'mp4="' . $ut_front_bg_video_mp4 . '"'); 
            }
            
            $ut_front_bg_video_ogg = ot_get_option('ut_front_bg_video_ogg');
            if( isset($ut_front_bg_video_ogg) && $ut_front_bg_video_ogg != '' ) { 
                array_push($playerconfig, 'ogg="' . $ut_front_bg_video_ogg . '"'); 
            }
            
            $ut_front_bg_video_webm = ot_get_option('ut_front_bg_video_webm');
            if( isset($ut_front_bg_video_webm) && $ut_front_bg_video_webm != '' ) { 
                array_push($playerconfig, 'webm="' . $ut_front_bg_video_webm . '"'); 
            }
            
            $ut_csection_video_preload = ot_get_option('ut_csection_video_preload');
            if( isset($ut_csection_video_preload) && $ut_csection_video_preload != '' ) { 
                array_push($playerconfig, 'preload="' . $ut_csection_video_preload . '"'); 
            }
            
        }
        
        $ut_front_bg_video_volume = ot_get_option('ut_front_bg_video_volume');
        if( isset($ut_front_bg_video_volume) && $ut_front_bg_video_volume != '' ) { 
            array_push($playerconfig, 'volume="' . $ut_front_bg_video_volume . '"'); 
        }
        
        $ut_front_bg_video_mute_button = ot_get_option('ut_front_bg_video_mute_button' , true );
        if(isset($ut_front_bg_video_mute_button) && $ut_front_bg_video_mute_button != '') { 
            array_push($playerconfig, 'mutebutton="' . $ut_front_bg_video_mute_button . '"'); 
        }        
        
        echo do_shortcode('[ut_section_video id="front-bg-vid" section="body" source="' . ot_get_option('ut_front_bg_video_source' , 'youtube') . '" ' . implode(" ", $playerconfig) . ']');
        
    }

endif;


?>