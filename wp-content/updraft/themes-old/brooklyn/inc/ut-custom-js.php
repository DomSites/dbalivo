<?php

/*
 * Custom Javascript from Option Panel
 * by www.unitedthemes.com
 */


/*
|--------------------------------------------------------------------------
| Custom JS Minifier
|--------------------------------------------------------------------------
*/
add_filter( 'ut-custom-js' , 'ut_compress_java' );
if ( !function_exists( 'ut_compress_java' ) ) {

	function ut_compress_java($buffer) {
		
		/* remove comments */
		$buffer = preg_replace("/((?:\/\*(?:[^*]|(?:\*+[^*\/]))*\*+\/)|(?:\/\/.*))/", "", $buffer);
		/* remove tabs, spaces, newlines, etc. */
		$buffer = str_replace(array("\r\n","\r","\t","\n",'  ','    ','     '), '', $buffer);
		/* remove other spaces before/after ) */
		$buffer = preg_replace(array('(( )+\))','(\)( )+)'), ')', $buffer);
	
		return $buffer;
		
	}

}


if ( !function_exists( 'ut_needed_js' ) ) {
    
    function ut_needed_js() { 
        
		$accentcolor  = get_option('ut_accentcolor' , '#CC5E53');
		$ut_hero_type = ut_return_hero_config('ut_hero_type');
        
        // fallback
        $ut_hero_type = $ut_hero_type == 'dynamic' ? 'image' : $ut_hero_type;
        
        
        $js = '(function($){
        	
				"use strict";
		
				$(document).ready(function(){ ';
			    
                $js .= 'var brooklyn_scroll_offset = $("#header-section").outerHeight();';
                
				/*
				|--------------------------------------------------------------------------
				| Pre Loader
				|--------------------------------------------------------------------------
				*/
                
                if( ot_get_option('ut_use_image_loader') == 'on' ) :
					
					if( ut_dynamic_conditional('ut_use_image_loader_on') ) : 
					
						/* settings for pre loader */
						$loadercolor = ot_get_option( 'ut_image_loader_color' );
						$barcolor = ot_get_option( 'ut_image_loader_bar_color' , $accentcolor );
						$loader_bg_color = ot_get_option('ut_image_loader_background' , '#FFF');
						$bar_height = ot_get_option('ut_image_loader_barheight', 3 );
						$ut_show_loader_bar = ot_get_option('ut_show_loader_bar' , 'on');
																
						if( unite_mobile_detection()->isMobile() ) :
							
							$js .= 'window.addEventListener("DOMContentLoaded", function() {
															
								$("body").queryLoader2({
									showbar: "'.$ut_show_loader_bar.'",					
									barColor: "'.$barcolor.'",
									textColor: "'.$loadercolor.'",
									backgroundColor: "'.$loader_bg_color.'",
									barHeight: '.$bar_height.',
									percentage: true,						
									completeAnimation: "fade",
									minimumTime: 500,
                                    onComplete : function() {
									
										$(".ut-loader-overlay").fadeOut( 1200 , "easeInOutExpo" , function() {
											$(this).remove();
										});
										
									}
									
								});
							});';
							
						else :
						
							$js .= '$("body").queryLoader2({						
								showbar: "'.$ut_show_loader_bar.'",			
								barColor: "'.$barcolor.'",
								textColor: "'.$loadercolor.'",
								backgroundColor: "'.$loader_bg_color.'",
								barHeight: '.$bar_height.',
								percentage: true,						
								completeAnimation: "fade",
								minimumTime: 500,
                                onComplete : function() {
								
									$(".ut-loader-overlay").fadeOut( 1200 , "easeInOutExpo" , function() {
										$(this).remove();
									});
									
								}
								
							});';
							
						endif;

                	endif;

                endif;
				  
				/*
				|--------------------------------------------------------------------------
				| Slogan / Welcome Message Animation
				|--------------------------------------------------------------------------
				*/
                 
				if( $ut_hero_type != 'slider' ) :
				
				$js .= '
                    
                    $(".hero-holder", "#ut-hero").addClass("ut-hero-ready");
                    $(".hero-down-arrow-wrap", "#ut-hero").addClass("ut-hero-ready");
                    $(".hero-down-arrow-wrap", ".ut-custom-hero").addClass("ut-hero-ready");
                
                '; 
				
				endif;  
				                
				/*
				|--------------------------------------------------------------------------
				| Main Navigation Animation - Floating
				|--------------------------------------------------------------------------
				*/
                
                if( ut_return_header_config('ut_navigation_scroll_position' , 'floating') == 'floating' ) {
                
                    if( ( ( is_home() || is_front_page() || is_singular('portfolio') || apply_filters( 'ut_show_hero', false ) ) ) && ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) == 'ut-header-custom' ) :
                    
                        if( ut_return_header_config('ut_navigation_customskin_state' , 'off') == 'off' ) {
                            
                            $classes = array();
                            
                            $classes[] = 'ut-primary-custom-skin';
                            $classes[] = ut_return_header_config( 'ut_navigation_width', 'centered' );
                            
                            $classes[] = ut_page_option( 'ut_top_header' , 'hide' ) == 'show' ? 'bordered-top' : '';
                            $classes[] = apply_filters( 'ut_show_siteframe', 'hide' ) == 'show' ? 'bordered-navigation' : '';
                            $classes[] = ut_page_option( 'ut_site_border', 'hide' ) == 'show' && ot_get_option( 'ut_site_navigation_flush', 'no' && ut_return_header_config( 'ut_navigation_width', 'centered' ) == 'fullwidth' ) == 'yes' ? 'ut-flush' : '';
                            
                            $classes = implode(' ', $classes );
                            $classes = preg_replace('/\s\s+/', ' ', $classes); // remove double white spaces
                            
                            ob_start();
                        
                            ?>
                                               
                            /* Header Animation
                            ================================================== */		
                            var $header     = $("#header-section"),
                                $logo	    = $(".site-logo img"),
                                logo	    = $logo.attr("src"),
                                logoalt     = $logo.data("altlogo"),
                                is_open     = false,
                                has_passed  = false;
                            
                            var ut_nav_skin_changer = function( direction , animClassDown, animClassUp ) {
                                
                                if( direction === "down" && animClassDown ) {
                                    
                                    $header.attr("class", "ha-header <?php echo $classes; ?>").addClass(animClassDown);
                                    $logo.attr("src" , logoalt );
                                    
                                } else if( direction === "up" && animClassUp ){
                                    
                                    $header.attr("class", "ha-header <?php echo $classes; ?>").addClass(animClassUp);
                                    $logo.attr("src" , logo );
                                    
                                }
                                
                            };
                                                
                            $( ".ha-waypoint" ).each( function(i) {
                                
                                /* needed vars */
                                var $this = $( this ),
                                    animClassDown = $this.data( "animateDown" ),
                                    animClassUp   = $this.data( "animateUp" );
                                
                                $this.waypoint(function(direction) {
                                    
                                    ut_nav_skin_changer( direction , animClassDown , animClassUp );
                                    
                                }, { offset: brooklyn_scroll_offset+1 } );
                                
                            });
                            
                            <?php
                            
                            $js .= ob_get_clean();
                        
                        }
                        
                        if( ut_return_header_config('ut_navigation_customskin_state' , 'off') == 'on_switch' ) {
                            
                            $flush_nav = ( ut_page_option( 'ut_site_border', 'hide' ) == 'show' && ot_get_option( 'ut_site_navigation_flush', 'no' ) == 'yes' && ut_return_header_config( 'ut_navigation_width', 'centered' ) == 'fullwidth' ) ? 'ut-flush' : '';
                            
                            $navigation_width    = esc_attr( ut_return_header_config( 'ut_navigation_width', 'centered' ) );
                            $border_header_class = apply_filters( 'ut_show_siteframe', 'hide' ) == 'show' ? 'bordered-navigation' : '';
                            
                            $primary_skin   = 'ut-primary-custom-skin';
                            $secondary_skin = 'ut-secondary-custom-skin';
                            
                            ob_start();
                            
                            ?>   
                            
                            /* Header Animation
                            ================================================== */		
                            var $header      = $("#header-section"),
                                $logo	     = $(".site-logo img"),
                                logo	     = $logo.attr("src"),
                                logoalt      = $logo.data("altlogo"),
                                is_open      = false,
                                has_passed   = false;
                            
                            var ut_update_header_skin = function() {
                                
                                if ( ( $(window).width() > 979 ) && is_open ) {
                                    
                                    $(".ut-mm-trigger").trigger("click");
                                    
                                    if( !has_passed ) {
                                        
                                        $header.attr("class", "ha-header").addClass("<?php echo $flush_nav; ?>").addClass("<?php echo $primary_skin; ?>").addClass("<?php echo $navigation_width; ?>").addClass("<?php echo $border_header_class; ?>");
                                        
                                    } else {
                                        
                                        $header.attr("class", "ha-header").addClass("<?php echo $flush_nav; ?>").addClass("<?php echo $secondary_skin; ?>").addClass("<?php echo $navigation_width; ?>").addClass("<?php echo $border_header_class; ?>");
                                        
                                    }
                                    
                                }
                                   
                            };
                            
                            var ut_nav_skin_changer = function( direction ) {
                                
                                if( direction === "down" && !is_open ) {
                                    
                                    $header.attr("class", "ha-header").addClass("<?php echo $flush_nav; ?>").addClass("<?php echo $secondary_skin; ?>").addClass("<?php echo $navigation_width; ?>").addClass("<?php echo $border_header_class; ?>");
                                    $logo.attr("src" , logoalt );
                                    
                                    has_passed = true;                            
                                    
                                } else if( direction === "up" && !is_open ) {
                                    
                                    $header.attr("class", "ha-header").addClass("<?php echo $flush_nav; ?>").addClass("<?php echo $primary_skin; ?>").addClass("<?php echo $navigation_width; ?>").addClass("<?php echo $border_header_class; ?>");
                                    $logo.attr("src" , logo );

                                    has_passed = false;
                                    
                                }	
                            
                            };
                            
                            $(".ut-mm-trigger").click(function(event){ 
                                                        
                                if( $header.hasClass("<?php echo $primary_skin; ?>") && !has_passed ) {
                                    
                                    $header.attr("class", "ha-header").addClass("<?php echo $flush_nav; ?>").addClass("<?php echo $navigation_width; ?>").addClass("<?php echo $secondary_skin; ?>").addClass("<?php echo $border_header_class; ?>");
                                    $logo.attr("src" , logoalt );                            
                                                                
                                } else if ( $header.hasClass("<?php echo $secondary_skin; ?>") && !has_passed ) {
                                    
                                    setTimeout( function () {
                                    
                                        $header.attr("class", "ha-header").addClass("<?php echo $flush_nav; ?>").addClass("<?php echo $primary_skin; ?>").addClass("<?php echo $navigation_width; ?>").addClass("<?php echo $border_header_class; ?>");
                                        $logo.attr("src" , logo );
                                    
                                     }, 400 ); 
                                    
                                }
                                                                                
                                event.preventDefault();
                                
                            }).toggle(function(){ is_open = true; }, function() { is_open = false; });   
                                                
                            $(window).utresize(function(){
                                
                                ut_update_header_skin();
                                
                            });
                                            
                            $( "#main-content" ).waypoint( function( direction ) {
                                    
                                ut_nav_skin_changer(direction);			
                                
                                if( direction === "down" ) {
                                    
                                    has_passed = true;                           
                                    
                                } else if( direction === "up" ) {
                                                                
                                    has_passed = false;                           
                                    
                                }	
                                
                            }, { offset: brooklyn_scroll_offset+1 });                        
                        
                            <?php
                            
                            $js .= ob_get_clean();                        
                        
                        }                    
                    
                    endif;
                                    
                    if( ( ( is_home() || is_front_page() || is_singular('portfolio') || apply_filters( 'ut_show_hero', false ) ) ) && ut_return_header_config('ut_navigation_state' , 'off') == 'off' && ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) != 'ut-header-custom' ) :
                        
                        $classes = array();
                        
                        $classes[] = trim( ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) );
                        $classes[] = trim( ut_return_header_config( 'ut_navigation_width', 'centered' ) );
                        
                        $classes[] = ut_page_option( 'ut_top_header' , 'hide' ) == 'show' ? 'bordered-top' : '';
                        $classes[] = apply_filters( 'ut_show_siteframe', 'hide' ) == 'show' ? 'bordered-navigation' : '';
                        $classes[] = ut_page_option( 'ut_site_border', 'hide' ) == 'show' && ot_get_option( 'ut_site_navigation_flush', 'no' ) == 'yes' && ut_return_header_config( 'ut_navigation_width', 'centered' ) == 'fullwidth' ? 'ut-flush' : '';
                    
                        $classes = implode(' ', $classes );
                        $classes = preg_replace('/\s\s+/', ' ', $classes);  // remove double white spaces      
                    
                        ob_start();
                        
                        ?>
                                           
                        /* Header Animation
                        ================================================== */		
                        var $header     = $("#header-section"),
                            $logo	    = $(".site-logo img"),
                            logo	    = $logo.attr("src"),
                            logoalt     = $logo.data("altlogo"),
                            is_open     = false,
                            has_passed  = false;
                        
                        var ut_nav_skin_changer = function( direction , animClassDown, animClassUp ) {
                            
                            if( direction === "down" && animClassDown ) {
                                
                                $header.attr("class", "ha-header <?php echo $classes; ?>").addClass(animClassDown);
                                $logo.attr("src" , logoalt );
                                
                            } else if( direction === "up" && animClassUp ){
                                
                                $header.attr("class", "ha-header <?php echo $classes; ?>").addClass(animClassUp);
                                $logo.attr("src" , logoalt );
                                
                            }
                            
                        };
                                            
                        $( ".ha-waypoint" ).each( function(i) {
                            
                            /* needed vars */
                            var $this = $( this ),
                                animClassDown = $this.data( "animateDown" ),
                                animClassUp   = $this.data( "animateUp" );
                            
                            $this.waypoint(function(direction) {
                                
                                ut_nav_skin_changer( direction , animClassDown , animClassUp );
                                
                            }, { offset: brooklyn_scroll_offset+1 } );
                            
                        });
                        
                        <?php
                        
                        $js .= ob_get_clean();
                    
                    endif;
                    
                    if( ( is_home() || is_front_page() || is_singular('portfolio') || apply_filters( 'ut_show_hero', false ) ) && ut_return_header_config('ut_navigation_state' , 'off') == 'on_transparent' && ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) != 'ut-header-custom' ) :
                                            
                        $ut_navigation_skin = ut_return_header_config('ut_navigation_skin' , 'ut-header-light');
                        $ut_navigation_transparent_border = ut_return_header_config('ut_navigation_state') == 'on_transparent' && ut_return_header_config('ut_navigation_transparent_border') == 'on' ?  'ut-header-has-border' : '';
                        $navigation_width = ut_return_header_config('ut_navigation_width' , 'centered');
                        $ut_site_border_header_class = apply_filters( 'ut_show_siteframe', 'hide' ) == 'show' ? 'bordered-navigation' : '';
                        $flush_nav = ( ut_page_option( 'ut_site_border', 'hide' ) == 'show' && ot_get_option( 'ut_site_navigation_flush', 'no' ) == 'yes' && ut_return_header_config( 'ut_navigation_width', 'centered' ) == 'fullwidth' ) ? 'ut-flush' : '';
                        
                         
                        $js .= '				
                        /* Header Animation
                        ================================================== */		
                        var $header     = $("#header-section"),
                            $logo	    = $(".site-logo img"),
                            logo	    = $logo.attr("src"),
                            logoalt     = $logo.data("altlogo"),
                            is_open     = false,
                            has_passed  = false;
                        
                        var ut_update_header_skin = function() {
                            
                            if ( ( $(window).width() > 979 ) && is_open ) {
                                
                                $(".ut-mm-trigger").trigger("click");
                                
                                if( has_passed ) {
                                    
                                    $header.attr("class", "ha-header").addClass("' . $flush_nav . '").addClass("' . $ut_navigation_skin . '").addClass("' . $navigation_width . '").addClass("' . $ut_site_border_header_class . '");
                                    
                                } else {
                                    
                                    $header.attr("class", "ha-header").addClass("' . $flush_nav . '").addClass("ha-transparent").addClass("' . $ut_navigation_transparent_border . '").addClass("' . $navigation_width . '").addClass("' . $ut_site_border_header_class . '");
                                    
                                }
                                
                            }
                               
                        };
                        
                        var ut_nav_skin_changer = function( direction ) {
                            
                            if( direction === "down" && !is_open ) {
                                
                                $header.attr("class", "ha-header").addClass("' . $flush_nav . '").addClass("' . $ut_navigation_skin . '").addClass("' . $navigation_width . '").addClass("' . $ut_site_border_header_class . '");
                                $logo.attr("src" , logoalt );
                                
                                has_passed = true;                            
                                
                            } else if( direction === "up" && !is_open ) {
                                
                                $header.attr("class", "ha-header").addClass("' . $flush_nav . '").addClass("ha-transparent").addClass("' . $ut_navigation_transparent_border . '").addClass("' . $navigation_width . '").addClass("' . $ut_site_border_header_class . '");
                                $logo.attr("src" , logo );
                                
                                has_passed = false;
                                
                            }	
                        
                       };
                        
                       $(".ut-mm-trigger").click(function(event){ 
                                                    
                            if( $header.hasClass("ha-transparent") && !has_passed ) {
                                
                                $header.attr("class", "ha-header").addClass("' . $flush_nav . '").addClass("' . $navigation_width . '").addClass("' . $ut_navigation_skin . '").addClass("' . $ut_site_border_header_class . '");
                                $logo.attr("src" , logoalt );                            
                                                            
                            } else if ( $header.hasClass("'.$ut_navigation_skin.'") && !has_passed ) {
                                
                                $header.attr("class", "ha-header").addClass("' . $flush_nav . '").addClass("ha-transparent").addClass("' . $navigation_width . '").addClass("' . $ut_site_border_header_class . '");
                                $logo.attr("src" , logo );                            
                                
                            }
                                                                            
                            event.preventDefault();
                            
                        }).toggle(function(){ is_open = true; }, function() { is_open = false; });   
                                            
                        $(window).utresize(function(){
                            ut_update_header_skin();
                        });
                                        
                        $( "#main-content" ).waypoint( function( direction ) {
                                
                            ut_nav_skin_changer(direction);			
                            
                            if( direction === "down" ) {
                                
                                has_passed = true;                           
                                
                            } else if( direction === "up" ) {
                                                            
                                has_passed = false;                           
                                
                            }	
                            
                        }, { offset: brooklyn_scroll_offset+1 });';
                    
                    endif;
				
                }
                
                /*
				|--------------------------------------------------------------------------
				| Main Navigation Animation - Floating
				|--------------------------------------------------------------------------
				*/
        
                if( ut_return_header_config('ut_navigation_scroll_position' , 'floating') == 'fixed' ) {
                    
                    // default skins with option transparent
                    if( ( is_home() || is_front_page() || is_singular('portfolio') || apply_filters( 'ut_show_hero', false ) ) && ut_return_header_config('ut_navigation_state' , 'off') == 'on_transparent' && ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) != 'ut-header-custom' ) {
                        
                        $ut_navigation_skin = ut_return_header_config('ut_navigation_skin' , 'ut-header-light');
                        
                        $js .= '
                        
                        var $logo	    = $(".site-logo img"),
                            logo	    = $logo.attr("src"),
                            logoalt     = $logo.data("altlogo"),
                            is_open     = false;
                        
                        var ut_update_header_skin = function() {
                            
                            if( $(window).width() > 979 && is_open ) {
                                
                                $(".ut-mm-trigger").trigger("click");
                        
                            }
                        
                        };
                        
                        $(window).utresize(function(){
                            ut_update_header_skin();
                        });
                        
                        $(".ut-mm-trigger").toggle(function(){ 
                            
                            $("#header-section").removeClass("ha-transparent").addClass("' . $ut_navigation_skin . '");    
                            $logo.attr("src" , logoalt );
                            
                            is_open = true;
                            
                        }, function() { 
                            
                            $("#header-section").addClass("ha-transparent").removeClass("' . $ut_navigation_skin . '");
                            $logo.attr("src" , logo );
                            
                            is_open = false;
                            
                        });';                        
                        
                    }
                    
                    // custom skins
                    if( ( ( is_home() || is_front_page() || is_singular('portfolio') || apply_filters( 'ut_show_hero', false ) ) ) && ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) == 'ut-header-custom' ) {
                        
                        if( ut_return_header_config('ut_navigation_customskin_state' , 'off') == 'on_switch' ) {
                            
                            $primary_skin = 'ut-primary-custom-skin';
                            $secondary_skin = 'ut-secondary-custom-skin';
                            
                            $js .= '
                        
                            var $logo	    = $(".site-logo img"),
                                logo	    = $logo.attr("src"),
                                logoalt     = $logo.data("altlogo"),
                                is_open     = false;

                            var ut_update_header_skin = function() {

                                if( $(window).width() > 979 && is_open ) {

                                    $(".ut-mm-trigger").trigger("click");

                                }

                            };

                            $(window).utresize(function(){
                                ut_update_header_skin();
                            });

                            $(".ut-mm-trigger").toggle(function(){ 

                                $("#header-section").removeClass("' . $primary_skin . '").addClass("' . $secondary_skin . '");    
                                $logo.attr("src" , logoalt );

                                is_open = true;

                            }, function() { 

                                $("#header-section").addClass("' . $primary_skin . '").removeClass("' . $secondary_skin . '");
                                $logo.attr("src" , logo );

                                is_open = false;

                            });';        
                            
                            
                        }                        
                        
                    }
                    
                }
        
				/*
				|--------------------------------------------------------------------------
				| Rain Effect for images
				|--------------------------------------------------------------------------
				*/
				if( ut_return_hero_config( 'ut_hero_rain_effect' , 'off' ) == 'on' && ($ut_hero_type == 'image' || $ut_hero_type == 'tabs' || $ut_hero_type == 'splithero')) :
					
					$js .= '
					
					$.fn.utFullSize = function( callback ) {
						
						var fullsize = $(this);		
					
						function utResizeObject() {
						  
						  	var imgwidth = fullsize.width(),
						   		imgheight = fullsize.height(),
								winwidth = $(window).width(),
						  		winheight = $(window).height(),
								widthratio = winwidth / imgwidth,
						  		heightratio = winheight / imgheight,
								widthdiff = heightratio * imgwidth,
						  		heightdiff = widthratio * imgheight;
							
							if( heightdiff > winheight ) {
							
								fullsize.css({
									width: winwidth+"px",
									height: heightdiff+"px"
								});
							
							} else {
							
								fullsize.css({
									width: widthdiff+"px",
									height: winheight+"px"
								});		
								
							}
							
						} 
						
						utResizeObject();
						
						$(window).utresize(function(){
							utResizeObject();
						});
						
						if (callback && typeof(callback) === "function") {   
							callback();  
						}

					};
					
					
					function ut_init_RainyDay( callback ) {
												
						var $image = document.getElementById("ut-rain-background"),
							$hero  = document.getElementById("ut-hero");						
							
							var engine = new RainyDay({
								image: $image,
								parentElement : $hero,
								blur: 20,
								opacity: 1,
								fps: 30
							});
							
							engine.gravity = engine.GRAVITY_NON_LINEAR;
							engine.trail = engine.TRAIL_SMUDGE;
							engine.rain([ [6, 6, 0.1], [2, 2, 0.1] ], 50 );
						
						$image.crossOrigin = "anonymous";
						
						if (callback && typeof(callback) === "function") {   
							callback();  
						}
						
					}
										
					
					$(window).load(function(){
						
						$("#ut-rain-background").utFullSize( function() {
							
							/* play rainday sound and remove section image and adjust canvas */
							ut_init_RainyDay( function() {
								
								$("#ut-hero").css("background-image" , "none");
								$("#ut-hero canvas").utFullSize();
								
								if( $("#ut-hero-audio").length != 0 ) {
									$("#ut-hero-audio").find(".mejs-play button").click();
								}
								
							});
						
						});
						
					});';
					
					if( ut_return_hero_config('ut_hero_rain_sound' , 'off') == 'on' ) :					
					
					$js .= '
					
					$(".ut-audio-control").click(function(event){
                                            
						var $audioPlayer = $("#ut-hero-audio");
						                                                
						if( $(".ut-audio-control").hasClass("ut-unmute") ) {
							
                            $audioPlayer.find(".mejs-unmute button").click();
													
							$(this).removeClass("ut-unmute").addClass("ut-mute");	
						
						} else {
							
							$audioPlayer.find(".mejs-mute button").click();								
							$(this).removeClass("ut-mute").addClass("ut-unmute");
							
						}
						
						event.preventDefault();
						
					});
					
					';
					
					endif;
					
				
				endif;
				
				/*
				|--------------------------------------------------------------------------
				| Slider Settings Hook
				|--------------------------------------------------------------------------
				*/ 
				if( apply_filters( 'ut_show_hero', false ) && ( $ut_hero_type == 'slider' || is_singular("portfolio") && get_post_format() == 'gallery' ) ) : 
           			
                    $animation		= ut_return_hero_config('ut_background_slider_animation' , 'fade');
					$slideshowSpeed = ut_return_hero_config('ut_background_slider_slideshow_speed' , 7000);
					$animationSpeed = ut_return_hero_config('ut_background_slider_animation_speed' , 600);					
                    
                    if( is_singular("portfolio") ) {
                        
                        $animation		= 'fade';
						$slideshowSpeed = '7000';
						$animationSpeed = '600';
                    
                    }
                     
                
                 $js .= '
				 $(window).load(function(){
					 
					 var $hero_captions = $("#ut-hero-captions"),
					 	 animatingTo = 0;
					 
					 $hero_captions.find(".hero-holder").each(function() {						
						
						var pos = $(this).data("animation"),
							add = "-50%";
						
						if( pos==="left" || pos==="right" ) { add = "-25%" };						
						
						$(this).css( pos , add );	
												
					 });
					 
                     function run_flowtype() {
                        
                        if( $(".hero-description", "#ut-hero").length ) {
                        
                             $(".hero-description", "#ut-hero").each(function(){
                                
                                if( $(this).css("font-size") ) {
                                    
                                    var hero_dt_max_font = $(this).css("font-size").replace("px","");
                                    
                                    $(this).flowtype({
                                        maxFont: hero_dt_max_font,
                                        fontRatio : 24,
                                        minFont: 10
                                    });                                    
                                
                                }                             
                             
                             });

                        }
                        
                        
                        if( $(".hero-title", "#ut-hero").length ) {
                            
                            $(".hero-title", "#ut-hero").each(function(){
                            
                                if( $(this).css("font-size") ) {

                                    var hero_title_max_font = $(this).css("font-size").replace("px","");
                                    
                                    $(this).flowtype({
                                        maxFont: hero_title_max_font,
                                        fontRatio : $(this).text().trim().replace(/[\s]+/g, " ").split(" ").length,
                                        minFont: 40
                                    });

                                }
                                
                            });

                        }
                        
                        if( $(".hero-description-bottom", "#ut-hero").length ) {
                            
                            $(".hero-description-bottom", "#ut-hero").each(function(){
                            
                                if( $(this).css("font-size") ) {

                                    var hero_db_max_font = $(this).css("font-size").replace("px","");
                                    
                                    $(this).flowtype({
                                        maxFont: hero_db_max_font,
                                        fontRatio : 24,
                                        minFont: 12
                                    });

                                }
                                
                            });
                            

                        }
                     
                     }                     
                     
                     $hero_captions.flexslider({
                        animation: "fade",
						animationSpeed: '.$animationSpeed.',
						slideshowSpeed: '.$slideshowSpeed.',
                        controlNav: false,
						directionNav: false,
                        animationLoop: true,
                        slideshow: true,
                        init : function(){
                            
                            run_flowtype();
                            
                        },
                        before: function(slider){                        	
							
							/* hide hero holder */
							$(".flex-active-slide").find(".hero-holder").fadeOut("fast", function() {
								
								var pos = $(this).data("animation"),
									anim = { opacity: 0 , display : "table" },
									add = "-50%";
								
								if( pos==="left" || pos==="right" ) { add = "-25%" };
								
								anim[pos] = add;
								
								$(this).css(anim);
								
							});
														
							/* animate background slider */
                            $("#ut-hero-slider").flexslider(slider.animatingTo);
						    
                        },
						after: function(slider) {
							
							/* change position of caption slider */
							slider.animate( { top : ( $(window).height() - $hero_captions.find(".flex-active-slide").height() ) / 2 } , 100 , function() {
							
								/* show hero holder */
								var pos = $(".flex-active-slide").find(".hero-holder").data("animation"),
									anim = { opacity: 1 };
								
								anim[pos] = 0;
								
								$(".flex-active-slide").find(".hero-holder").animate( anim );
							
							});
														
						},
						start: function(slider) {
							 
							/* create external navigation */
							$(".ut-flex-control").click(function(event){
								
								if ($(this).hasClass("next")) {
								
								  slider.flexAnimate(slider.getTarget("next"), true);
								
								} else {
								
								  slider.flexAnimate(slider.getTarget("prev"), true);
								
								}
								
								event.preventDefault();	
								
							});
							
							$(".hero.slider .parallax-overlay").fadeIn("fast");
														
							/* change position of caption slider */
							slider.animate( { top : ( $(window).height() - $hero_captions.find(".flex-active-slide").height() ) / 2 } , 100 , function() { 
								
								/* show hero holder */
								var pos = $(".flex-active-slide").find(".hero-holder").data("animation"),
									anim = { opacity: 1 };
					
								anim[pos] = 0;
									
								$(".flex-active-slide").find(".hero-holder").animate( anim );
							
							
							});
														
						}
					});
                    
                    var ut_trigger = 0;
                    
					$(window).utresize(function(){
                        
                        /* do not fire on window load resize event */    
                        if( ut_trigger > 0 ) {
                        
                            /* adjust first slide browser bug */
                            $hero_captions.find(".hero-holder").each(function() {
                                
                                $(this).find(".hero-title").width("");
                                
                                if( $(this).width() > $(this).parent().width() ) {
                                    
                                    $(this).find(".hero-title").width( $(this).parent().width()-20 );
                                
                                }
                            
                            });
                            
                            /* change slide */
                            $hero_captions.flexslider("next");
                            $hero_captions.flexslider("play");
                        
                        }
                        
                        ut_trigger++;
                            
					});
										
                    $("#ut-hero-slider").flexslider({
						animation: "fade",
						animationSpeed: '.$animationSpeed.',
						slideshowSpeed: '.$slideshowSpeed.', 
                        directionNav: false,
						controlNav: false,
    					animationLoop: true,
                        slideshow: true
					});
                                        
				});';
                
                endif;
				
				
				/*
				|--------------------------------------------------------------------------
				| Parallax Effect - disabled for mobile devices to much repaint cost
				|--------------------------------------------------------------------------
				*/ 
				if( !unite_mobile_detection()->isMobile() ) {			
								
					$js .= '$(".parallax-banner .parallax-scroll-container").each(function() {                
                            $(this).css({
                                "height" : $(window).height() * 1.1 + "px",
                                "width"  : $(window).width()  * 1.1 + "px",
                                "left"   : "-5%"                            
                            }).parallax( "50%", 0.6 ); 
                        });';
							
				}                
                
                /*
				|--------------------------------------------------------------------------
				| Parallax Effect for Footer
				|--------------------------------------------------------------------------
				*/ 
                               
                $ut_csection_parallax = ot_get_option('ut_csection_parallax' , 'on'); 
				
				if( $ut_csection_parallax == 'on' ) : 
                	
					if( !unite_mobile_detection()->isMobile() ) :
					
                		$js .= '$(".contact-section .parallax-scroll-container").css({
                            "height" : $(window).height() * 1.1 + "px",
                            "width"  : $(window).width()  * 1.1 + "px",
                            "left"   : "-5%"                            
                        }).parallax("50%", 0.6,true);';
                	
					endif;
					
                endif;
				
                
                /*
				|--------------------------------------------------------------------------
				| Lightbox
				|--------------------------------------------------------------------------
				*/
                    
                $js .= '$(".ut-lightbox").lightGallery({
                    selector: "this",
                    hash: false
                });';
                    
                
				/*
				|--------------------------------------------------------------------------
				| Section Animation
				|--------------------------------------------------------------------------
				*/
								
				if( !unite_mobile_detection()->isMobile() && ot_get_option('ut_animate_sections' , 'on') == 'on' && ot_get_option( 'ut_site_layout', 'onepage' ) == 'onepage' ) : 
						
						$csection_timer = ot_get_option('ut_animate_sections_timer' , '1600');
						
						$js .= '$("section").each(function() {
															
							var outerHeight = $(this).outerHeight(),
								offset		= "90%",
								effect		= $(this).data("effect");
							
							if( outerHeight > $(window).height() / 2 ) {
								offset = "70%";
							}
							
                            $(this).waypoint("destroy");
							$(this).waypoint( function( direction ) {
								
								var $this = $(this);
												
								if( direction === "down" && !$(this).hasClass( "animated-" + effect ) ) {
									
									$this.find(".section-content").animate( { opacity: 1 } , ' . $csection_timer . ' );
									$this.find(".section-header-holder").animate( { opacity: 1 } , ' . $csection_timer . ' );
								    
                                    $this.addClass( "animated-" + effect );
                                    		
								}
								
							} , { offset: offset } );			
								
						});';             
            	
				endif;
					                
            $js .= '});
			
        })(jQuery);';
		        
        //echo $js;
		echo apply_filters( 'ut-custom-js' , $js );
                
    }
    
    add_action( 'ut_java_footer_hook', 'ut_needed_js', 100 );

}