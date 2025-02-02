<?php if (!defined('UT_VERSION')) {
    exit; // exit if accessed directly
}

/**
 * Custom JavaScript Class
 * 
 * 
 * @package Brooklyn Theme
 * @author United Themes
 * since 4.4
 */

if( !class_exists( 'UT_Custom_JS' ) ) {	
    
    class UT_Custom_JS {
        
        public $js;
        
        function __construct() {
            
            add_action( 'wp_head', array( $this, 'header_js' ) ); 
            add_action( 'ut_java_footer_hook', array( $this, 'custom_js' ), 100 );
            
        }        
                
        public function minify_js( $js ) {
            
            $js = str_replace('<script>','', $js);
            $js = str_replace('</script>','', $js);
                        
            if( WP_DEBUG ){
                return $js;                    
            }
            
            // remove comments
            $js = preg_replace("/((?:\/\*(?:[^*]|(?:\*+[^*\/]))*\*+\/)|(?:\/\/.*))/", "", $js);
            
            // remove tabs, spaces, newlines, etc.
            $js = str_replace(array("\r\n","\r","\t","\n",'  ','    ','     '), '', $js);
            
            // remove other spaces before/after
            $js = preg_replace(array('(( )+\))','(\)( )+)'), ')', $js);
            
            return $js;
            
        }
        
        public function header_js() {
            
            ob_start(); ?>
                
            <script>
                
            (function($){

                "use strict";
                        
                $("html").removeClass("ut-no-js").addClass("ut-js js");    
                
                <?php
                
                /**
                  * Animated Hero Image
                  */           
            
                if( ut_return_hero_config('ut_hero_type', 'image') == 'animatedimage' ) :
                
                    $header_image = ut_return_hero_config('ut_hero_animated_image');
            
                    // animation speed in second
                    $image_speed  = ut_return_hero_config('ut_hero_animated_image_speed', 40);
                    $image_speed  = preg_replace("/[^0-9]/", '', $image_speed);        
            
                    // animation direction
                    $image_direction  = ut_return_hero_config('ut_hero_animated_image_direction', 'left');
                    $direction = $image_direction == 'right' ? '' : '-';
                
                    // alternate 
                    $alternate = ut_return_hero_config( 'ut_hero_animated_image_direction_alternate', 'on' );
            
                    if( !empty( $header_image ) ) :
                    
                        $header_image = ut_get_image_id( $header_image );    
                        $header_image = wp_get_attachment_image_src( $header_image , 'full' );
            
                        if( !empty( $header_image ) && is_array( $header_image ) ) :
            
                    ?>

                    $(document).ready(function(){
                        
                        
                        <?php if( ut_return_hero_config('ut_hero_animated_image_cover', 'off') == 'off' ) : ?>
                        
                            var supportedFlag = $.keyframe.isSupported(),
                                position = $(window).width() < <?php echo $header_image[1]; ?> ? <?php echo $header_image[1]; ?> - $(window).width() : $(window).width();
                        
                            if( $(window).width() < <?php echo $header_image[1]; ?> ) {
                                
                               $('#ut-hero .parallax-scroll-container').addClass('ut-animated-image-background');
                        
                            }
                                      
                        <?php else : ?>
                            
                            var supportedFlag = $.keyframe.isSupported(),
                                position = $(window).width();
                                  
                        <?php endif; ?>                    
                        
                        <?php if( $alternate == 'off' ) : ?>              
                                      
                            $.keyframe.define([{
                                name: 'animatedBackground',
                                media: 'screen and (min-width: 1025px)',
                                '0%':  { 'background-position' : '0 0'},
                                '100%':{ 'background-position' : <?php echo $direction; ?>position+'px 0' },
                            }]);

                            $(window).load(function(){

                                $('#ut-hero .parallax-scroll-container').delay(800).queue(function(){
                                            
                                    $(this).addClass('ut-hero-ready').playKeyframe({
                                        name: 'animatedBackground',
                                        timingFunction: 'linear',
                                        duration: '<?php echo $image_speed; ?>s',
                                        iterationCount: 'infinite'
                                    });

                                });                            

                            });
                    
                        <?php else : ?>    
                        
                           $.keyframe.define([{
                                name: 'animatedBackground',
                                media: 'screen and (min-width: 1025px)',
                                '0%': { 'background-position' : '0 0'},
                                '50%':{ 'background-position' : <?php echo $direction; ?>position+'px 0' },
                                '100%': { 'background-position' : '0 0'}
                            }]);

                            $(window).load(function(){

                                $('#ut-hero .parallax-scroll-container').delay(800).queue(function(){

                                    $(this).addClass('ut-hero-ready').playKeyframe({
                                        name: 'animatedBackground',
                                        timingFunction: 'linear',
                                        duration: '<?php echo $image_speed; ?>s',
                                        iterationCount: 'infinite'
                                    });

                                });                            

                            });
                                                     
                
                        <?php endif; ?>

                    });                
                
                    <?php endif; ?> 
                
                    <?php endif; ?> 
                
                <?php endif; ?>                
                
            })(jQuery);

            </script>    
                
            <?php 
            
            echo '<script type="text/javascript">' . $this->minify_js( ob_get_clean() ) . '</script>';            
            
        }
                
        public function custom_js() {
            
            $ut_hero_type = ut_return_hero_config('ut_hero_type');
            $ut_hero_type = $ut_hero_type == 'dynamic' ? 'image' : $ut_hero_type; // fallback since dynmaic header has been removed with 4.4
            
            ob_start(); ?>
                
                <script>
                
                (function($){
        	
				    "use strict";
                    
                    $("html").addClass('js');
    
                    $.fn.flowtype = function(options) {

                        var settings = $.extend({
                            maximum   : 9999,
                            minimum   : 1,
                            maxFont   : 9999,
                            minFont   : 1,
                            fontRatio : 40
                        }, options),

                        changes = function(el) {

                            var $el      = $(el),
                                elw      = $el.parent().width(),
                                width    = elw > settings.maximum ? settings.maximum : elw < settings.minimum ? settings.minimum : elw,
                                fontBase = width / settings.fontRatio,
                                fontSize = fontBase > settings.maxFont ? settings.maxFont : fontBase < settings.minFont ? settings.minFont : fontBase;

                            $el.css('font-size', fontSize + 'px');            

                        };

                        return this.each(function() {

                            var that = this;

                            $(window).resize(function(){
                                
                                changes(that);
                                
                            });
                            
                            changes(this);
                            
                        });

                    };
                    
                    
                    if( $('.site-logo h1', '#header-section').length ) {
        
                        var text_logo_original_font_size = $('.site-logo h1', '#header-section').css("font-size");
                        
                        if( text_logo_original_font_size ) {

                            var text_logo_max_font = text_logo_original_font_size.replace('px','');

                            $('.site-logo h1', '#header-section').flowtype({
                                maxFont: text_logo_max_font,
                                fontRatio : $('.site-logo h1', '#header-section').text().length / 2,
                                minFont: 10
                            });                    

                        }

                    }                    
                    
                    
                    if( $('.hero-description', '#ut-hero').length ) {
        
                        var hero_dt_original_font_size = $('.hero-description', '#ut-hero').css("font-size");
                        
                        if( hero_dt_original_font_size ) {

                            var hero_dt_max_font = hero_dt_original_font_size.replace('px','');

                            $('.hero-description', '#ut-hero:not(.slider)').flowtype({
                                maxFont: hero_dt_max_font,
                                fontRatio : 24,
                                minFont: 10
                            });                    

                        }

                    }

                    if( $('.hero-title', '#ut-hero').length ) {

                        var hero_title_original_font_size = $('.hero-title', '#ut-hero').css("font-size");
                        
                        if( hero_title_original_font_size ) {

                            var hero_title_max_font = hero_title_original_font_size.replace('px','');

                            $('.hero-title', '#ut-hero:not(.slider)').flowtype({
                                maxFont: hero_title_max_font,
                                fontRatio : 9,
                                minFont: 40
                            });

                        }

                    }
                        
                    if( $('.hero-description-bottom', '#ut-hero').length ) {

                        var hero_db_original_font_size = $('.hero-description-bottom', '#ut-hero').css("font-size");

                        if( hero_db_original_font_size ) {

                            var hero_db_max_font = hero_db_original_font_size.replace('px','');

                            $('.hero-description-bottom', '#ut-hero:not(.slider)').flowtype({
                                maxFont: hero_db_max_font,
                                fontRatio : 24,
                                minFont: 12
                            });                    

                        }

                    }

                    $(".page-title, .parallax-title, .section-title").each( function(){

                        var title_original_font_size = $(this).css("font-size");

                        if( title_original_font_size ) {

                            $(this).data("maxfont", title_original_font_size.replace('px','') );

                            $(this).flowtype({
                                maxFont: $(this).data("maxfont"),
                                fontRatio : 8,
                                minFont: 30
                            });                

                        }

                    });
                    
                    $("#ut-overlay-nav ul > li").each( function(){

                        var overlay_font_size = $(this).css("font-size");

                        if( overlay_font_size ) {

                            $(this).data("maxfont", overlay_font_size.replace('px','') );

                            $(this).flowtype({
                                maxFont: $(this).data("maxfont"),
                                fontRatio : 8,
                                minFont: 25
                            });                

                        }

                    });                    
                    
                    $('.vc_section > .vc_row').each(function() {
                        
                        var $this = $(this);
                        
                        if( $this.parent().children('.vc_row').first().is(this) ) {
                            
                            if( $this.hasClass("vc_row-has-fill") ) {
                                
                                $this.parent().addClass("ut-first-row-has-fill");
                                
                            }
                            
                            $this.addClass('ut-first-row');
                            
                        } 
                        
                        if( $this.parent().children('.vc_row').last().is(this) ) {
                            
                            if( $this.hasClass("vc_row-has-fill") ) {
                                
                                $this.parent().addClass("ut-last-row-has-fill");
                                
                            }
                            
                            $this.addClass('ut-last-row');
                                    
                        }       
                    
                    });                    
                    
                    
                    $('.vc_section').each(function() {
        
                        var $this = $(this);
                        
                        if( $this.is(':first-of-type') ) {
                            
                            $this.addClass('ut-first-section');    
                            
                        }
                        
                        if( $this.is(':last-of-type') ) {
                            
                            $this.addClass('ut-last-section');
                            
                        }
                        
                        
                        if( $this.hasClass('vc_section-has-no-fill') && !$this.hasClass('ut-last-row-has-fill') && $this.next('.vc_row-full-width').next('.vc_section').hasClass('vc_section-has-no-fill') && !$this.next('.vc_row-full-width').next('.vc_section').hasClass('ut-first-row-has-fill') ) {
                            
                            $this.addClass("vc_section-remove-padding-bottom");
                            
                        }
                        
                        
                    });
                    
                    
                    <?php 
                    
                     /**
                      * Parallax Effect
                      */                    
                    
                    if( ut_return_hero_config('ut_hero_image_parallax') == 'on' ) : ?>

                        <?php if( !unite_mobile_detection()->isMobile() ) : ?>

                            $(".hero .parallax-scroll-container").parallax("50%", 0.6);

                            var hero_inner = $(".hero-inner");
                            var scroll_down = $(".hero-down-arrow");

                            $(window).on("scroll", function() {

                                var st = $(this).scrollTop();

                                hero_inner.css({
                                    "opacity" : 1 - st/($(window).height()/4*3)
                                });

                                scroll_down.css({
                                    "opacity" : 1 - st/($(window).height()/4*3)
                                });

                            });    

                        <?php endif; ?>

                    <?php endif; ?>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <?php 
                    
                     /**
                      * Youtube Video Player 
                      */
            
                    if( !unite_mobile_detection()->isMobile() && $ut_hero_type == 'video' && ut_return_hero_config('ut_video_source' , 'youtube') == 'youtube' || !unite_mobile_detection()->isMobile() && $ut_hero_type == 'tabs' && ut_return_hero_config('ut_video_containment', 'hero') == 'body' ) : ?>
                    
                        if( $("#ut-background-video-hero").length ) {						

                            var $hero_player = $("#ut-background-video-hero").YTPlayer();

                            $("#ut-video-hero-control.youtube").click(function(event){

                                if( $(this).hasClass("ut-unmute") ) {									

                                    $(this).removeClass("ut-unmute").addClass("ut-mute");														
                                    $hero_player.YTPUnmute();

                                } else {

                                    $(this).removeClass("ut-mute").addClass("ut-unmute");
                                    $hero_player.YTPMute();							

                                }

                                event.preventDefault();

                            });

                        }
                    
                    <?php endif; ?>
                    
                    
                    
                    <?php
                
                    /**
                      * Retina JS Logo
                      */ 

                    $sitelogo_retina = !is_front_page() && !is_home() && ( !apply_filters( 'ut_show_hero', false ) ) ? ( ut_return_logo_config( 'ut_site_logo_alt_retina' ) ? ut_return_logo_config( 'ut_site_logo_alt_retina' ) : ut_return_logo_config( 'ut_site_logo_retina' ) ) : ut_return_logo_config( 'ut_site_logo_retina' );                        
                    $alternate_logo_retina = ut_return_logo_config( 'ut_site_logo_alt_retina' ) ? ut_return_logo_config( 'ut_site_logo_alt_retina' ) : ut_return_logo_config( 'ut_site_logo_retina' ); 

                    ?>

                    window.matchMedia||(window.matchMedia=function(){

                        var c=window.styleMedia || window.media;if(!c) {

                            var a=document.createElement("style"),
                                d=document.getElementsByTagName("script")[0],
                                e=null;

                            a.type="text/css";a.id="matchmediajs-test";d.parentNode.insertBefore(a,d);e="getComputedStyle"in window&&window.getComputedStyle(a,null)||a.currentStyle;c={matchMedium:function(b){b="@media "+b+"{ #matchmediajs-test { width: 1px; } }";a.styleSheet?a.styleSheet.cssText=b:a.textContent=b;return"1px"===e.width}}}return function(a){return{matches:c.matchMedium(a|| "all"),media:a||"all"}}

                    }());

                    var modern_media_query = window.matchMedia( "screen and (-webkit-min-device-pixel-ratio:2)");

                    <?php if( !empty( $sitelogo_retina ) ) : ?>

                        if( modern_media_query.matches ) {

                            var $logo = $(".site-logo:not(#ut-overlay-site-logo) img");
                            $logo.attr("src", retina_logos.sitelogo_retina );

                        }

                    <?php endif; ?>
                    
                    <?php if( !empty( $alternate_logo_retina ) ) : ?>

                        if( modern_media_query.matches ) {

                            var $logo = $(".site-logo:not(#ut-overlay-site-logo) img");
                            $logo.data("altlogo" , retina_logos.alternate_logo_retina );        

                        }

                    <?php endif; ?>
                    
                    <?php if( ot_get_option("ut_overlay_logo_retina") ) : ?>

                        if( modern_media_query.matches ) {

                            var $logo = $("#ut-overlay-site-logo img");
                            $logo.attr("src", retina_logos.overlay_sitelogo_retina );

                        }

                    <?php endif; ?>
                    
                })(jQuery);
                
                </script>
                
            <?php 
            
            echo $this->minify_js( ob_get_clean() );
            
            
        }        
            
    }

}

$UT_Custom_JS = new UT_Custom_JS;