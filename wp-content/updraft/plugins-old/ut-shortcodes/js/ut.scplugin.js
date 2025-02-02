/* <![CDATA[ */
(function($){
    
    "use strict";
    
    /* Count To Plugin enhanced by UnitedThemes
    ================================================== */
    $.fn.utCountTo = function (options) {
        
        options = options || {};
        
        return $(this).each(function () {
            
            // set options for current element
            var settings = $.extend({}, $.fn.utCountTo.defaults, {
                from:            $(this).data('from'),
                to:              $(this).data('to'),
                suffix:          $(this).data('suffix'),
                prefix:          $(this).data('prefix'),
                speed:           $(this).data('speed'),
                sep:             $(this).data('sep'),
                refreshInterval: $(this).data('refresh-interval'),
                decimals:        $(this).data('decimals')
            }, options);
            
            // how many times to update the value, and how much to increment the value on each update
            var loops = Math.ceil(settings.speed / settings.refreshInterval),
                increment = (settings.to - settings.from) / loops;
            
            // references & variables that will change with each update
            var self = this,
                $self = $(this),
                loopCount = 0,
                value = settings.from,
                data = $self.data('countTo') || {};
            
            $self.data('countTo', data);
            
            // if an existing interval can be found, clear it first
            if (data.interval) {
                clearInterval(data.interval);
            }
            data.interval = setInterval(updateTimer, settings.refreshInterval);
            
            // initialize the element with the starting value
            render(value);
            
            function updateTimer() {
                value += increment;
                loopCount++;
                
                render(value);
                
                if (typeof(settings.onUpdate) === 'function') {
                    settings.onUpdate.call(self, value);
                }
                
                if (loopCount >= loops) {
                    // remove the interval
                    $self.removeData('countTo');
                    clearInterval(data.interval);
                    value = settings.to;
                    
                    if (typeof(settings.onComplete) === 'function') {
                        settings.onComplete.call(self, value);
                    }
                }
            }
            
            function render(value) {
                
                var formattedValue = settings.formatter.call(self, value, settings);
                
                if( true === settings.sep ) {
                    
                    $self.html( settings.prefix + formattedValue.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + settings.suffix );
                    
                } else {
                    
                    $self.html( settings.prefix + formattedValue + settings.suffix );                    
                    
                }
                
            }
        });
    };
    
    $.fn.utCountTo.defaults = {
        from: 0,               // the number the element should start at
        to: 0,                 // the number the element should end at
        speed: 1000,           // how long it should take to count between the target numbers
        refreshInterval: 100,  // how often the element should be updated
        decimals: 0,           // the number of decimal places to show
        suffix: '',
        prefix: '',             
        sep: '',
        formatter: formatter,  // handler for formatting the value before rendering
        onUpdate: null,        // callback method for every time the element is updated
        onComplete: null       // callback method for when the element finishes updating
    };
    
    function formatter(value, settings) {
        return value.toFixed(settings.decimals);

    }
    
    /* Check if Element is visible
    ================================================== */
    $.fn.visible = function(partial,hidden){
		
	    var $t				= $(this).eq(0),
	    	t				= $t.get(0),
	    	$w				= $(window),
	    	viewTop			= $w.scrollTop(),
	    	viewBottom		= viewTop + $w.height(),
	    	_top			= $t.offset().top,
	    	_bottom			= _top + $t.height(),
	    	compareTop		= partial === true ? _bottom : _top,
	    	compareBottom	= partial === true ? _top : _bottom,
	    	clientSize		= hidden === true ? t.offsetWidth * t.offsetHeight : true;
		
		return !!clientSize && ((compareBottom <= viewBottom) && (compareTop >= viewTop));
    };    
    
    /* Check if Element is in Viewport Plugin
    ================================================== */
    $.fn.isOnScreen = function(){

        var win = $(window);

        var viewport = {
            top : win.scrollTop(),
            left : win.scrollLeft()
        };
        viewport.right = viewport.left + win.width();
        viewport.bottom = viewport.top + win.height();

        var bounds = this.offset();
        bounds.right = bounds.left + this.outerWidth();
        bounds.bottom = bounds.top + this.outerHeight();

        return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));

    };
    
    $(document).ready(function(){
        
        /* Helper Functions
        ================================================== */
        function create_id() {
             return '-' + Math.random().toString(36).substr(2, 9);
        }
                
        /* FitVid
        ================================================== */
        $(".ut-video").fitVids();
        
        
        /* United Video Player
        ================================================== */
        function ut_load_video_player(url, uniqueID, $parent, callback){
                
            if( !url ) {
                return;
            }
                        
            var ajaxURL = utShortcode.ajaxurl,
                $video = $('<div id="ut-video'+uniqueID+'"></div>'),
                $caption = $parent.find('.ut-video-module-caption-text');            
            
            $.ajax({
              
              type: 'POST',
              url: ajaxURL,
              data: {"action": "ut_get_video_player", "video" : url },
              success: function(response) {                  
                  
                  $video.html(response).fitVids();                      
                  $parent.html( $video.append($caption) );
                  
                  return false;
                                   
              },
              complete : function() {
                                
                  if (callback && typeof(callback) === "function") {   
                      callback();  
                  }
                        
              }
                    
            });
        
        }
        
        $(document).on('click', '.ut-load-video', function(event) {        
                
            var url = $(this).data('video'),
                uniqueID = create_id(),
                $parent = $(this).parent('.ut-video-module-caption'),
                $loader = $parent.next('.ut-video-module-loading');
            
            $parent.find(".ut-video-module-caption-text").fadeOut();
            $loader.fadeIn();
                
            ut_load_video_player(url, uniqueID, $parent, function() {
                
                $loader.fadeOut();
                
                
            });
            
            event.preventDefault();                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
        });
        
        
        /* Deactivated Link
		================================================== */
        $(document).on('click', '.ut-deactivated-link', function(event) {
        
            event.preventDefault();
            
        });
        
        /* Image Gallery Module
		================================================== */
        if ( $().lightGallery ) {
                        
            $('.entry-content').lightGallery({
                selector: '.ut-vc-images-lightbox',
                exThumbImage: 'data-exthumbimage',
                download: site_settings.lg_download,
                hash: false
            });            
            
            $(document).ajaxComplete(function() {
                
                /* restart */    
                $('.vc_media_grid').lightGallery({
                    selector: '.ut-vc-ajax-images-lightbox',
                    exThumbImage: 'data-exthumbimage',
                    download: site_settings.lg_download,
                    hash: false
                });
                
            });            
            
        }
        
        /* Blog Article Animation
        ================================================== */    
        if( $("body").hasClass("ut-blog-has-animation") ) {
        
            $('article').appear();
            
            $('article').each(function(i){
                
                $(this).css('z-index', $('article').length+i);                
                
            });            
            
            $(document.body).on('appear', 'article', function() {            

                if( !$(this).hasClass('fadeInUp') ) {

                    $(this).addClass('fadeInUp');    

                }
                
            });        
        
        }
            
        /* Milestone Counter - animate when visible on load or on appear
        ================================================== */        
        $('.ut-counter').appear();
        
        $(document.body).on('appear', '.ut-counter', function() {
            
            var counter  = $(this).data('counter'),
                c_suffix = $(this).data('suffix'),
                c_prefix = $(this).data('prefix'),
                c_sep    = $(this).data('sep');
            
            if ( !$(this).hasClass('ut-already-counted') ) {

                $(this).addClass('ut-already-counted');

                $(this).find('.ut-count').utCountTo({
                    from: 0,
                    to: counter,
                    suffix: c_suffix,
                    prefix: c_prefix,
                    speed: 2000,
                    sep: c_sep,
                    refreshInterval: 100
                });                

            }

        });    
        
        /* Element Effects
        ================================================== */
        $('.ut-animate-element').appear();
    
        $(document.body).on('webkitAnimationStart mozAnimationStart MSAnimationStart oanimationstart animationstart', '.ut-animate-element, .ut-animate-image', function() {

            var $this = $(this);
            
            if( !$this.hasClass( $this.data("effect") ) ) {
                return;
            }
            
            // extra class    
            $this.addClass('ut-element-is-animating');

        });        

        $(document.body).on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', '.ut-animate-element, .ut-animate-image', function() {

            var $this  = $(this);    
            var effect = $this.data('effect');
                        
            if( !$this.hasClass( effect ) ) {
                return;
            }
            
            // extra class
            $this.removeClass('ut-element-is-animating');

            // start animation again            
            if( $this.data('animation-between') ) {

                $this.removeClass(effect).delay( $this.data('animation-between') * 1000 ).queue( function() {

                    $this.addClass( effect ).dequeue();

                });

            }

            // check if element is hidden and will be animated again
            if( $this.data('animateonce') === 'no' && !$this.isOnScreen() ) {

                $this.clearQueue().removeClass( effect ).css('opacity','0').dequeue();                   

            }

        });             

        $(document.body).on('webkitAnimationStart mozAnimationStart MSAnimationStart oanimationstart animationstart', '.ut-animate-gallery-element', function(event) {
            
            var $this = $(this);
            
            if( !$this.hasClass( $this.data("effect") ) ) {
                return;
            }
            
            // extra class    
            $this.addClass('ut-element-is-animating');

        });        

        $(document.body).on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', '.ut-animate-gallery-element', function() {
            
            var $this  = $(this);    
            var effect = $this.data('effect');
            
            if( !$this.hasClass( effect ) ) {
                return;
            }
            
            // extra class
            $this.removeClass('ut-element-is-animating');

            // start animation again            
            if( $this.data('animation-between') ) {

                $this.removeClass(effect).delay( $this.data('animation-between') ).queue( function() {

                    $this.addClass( effect ).dequeue();

                });

            }

            // check if element is hidden and will be animated again
            if( $this.data('animateonce') === 'no' && !$this.isOnScreen() ) {

                $this.clearQueue().removeClass( effect ).css('opacity','0').dequeue();                   

            }

        });

        $(document.body).on('appear', '.ut-animate-element', function() {

            var $this = $(this),
                effect = $this.data('effect');

            if( $this.hasClass('ut-animation-complete') || $this.hasClass('ut-element-is-animating') ) {
                return;
            }

            if( $this.data('animation-duration') ) {

                $this.css('animation-duration', $this.data('animation-duration') );

            }

            $this.delay( $this.data('delay') ).queue( function() {

                $this.css('opacity','1').addClass( effect ).dequeue();

            });


        });

        $(document.body).on('disappear', '.ut-animate-element', function() {

            var $this  = $(this),
                effect = $this.data('effect');


            if( $this.hasClass('ut-animation-complete') || $this.hasClass('ut-element-is-animating') ) {
                return;
            }

            if( $this.data('animateonce') === 'no' ) {

                $this.clearQueue().removeClass( effect ).css('opacity','0').dequeue();                     

            } else {

                $this.addClass('ut-animation-complete');

            }

        });

        /* Animate Image
        ================================================== */
        $('.ut-animate-image').appear();

        $(document.body).on('appear', '.ut-animate-image', function() {

            var $this = $(this),
                effect = $this.data('effect');

           if( $this.hasClass('ut-animation-complete') || $this.hasClass('ut-element-is-animating') ) {
                return;
            }

            if( $this.data('animation-duration') ) {

                $this.css('animation-duration', $this.data('animation-duration') );

            }

            if( $this.data('animation-between') ) {

                $this.css('animation-delay', $this.data('animation-between') );

            }

            $this.delay( $this.data('delay') ).queue( function() {

                $this.css('opacity','1').addClass( effect ).dequeue();

            });

        });

        $(document.body).on('disappear', '.ut-animate-image', function() {

            var $this  = $(this),
                effect = $this.data('effect');

            if( $this.hasClass('ut-animation-complete') || $this.hasClass('ut-element-is-animating') ) {
                return;
            }

            if( $this.data('animateonce') === 'no' ) {

                $this.clearQueue().removeClass( effect ).css('opacity','0').dequeue();                   

            } else {

                $this.addClass('ut-animation-complete');

            }

        });
                
        /* Skillbar
        ================================================== */
        $('.ut-skill-active').appear();
        
        $(document.body).on('appear', '.ut-skill-active', function() {
            
            var $this     = $(this),
                bar_width = $this.data('width');
                    
                if( !$this.hasClass('ut-already-visible') ) {
                    
                    if(  $this.hasClass('ut-skill-progress-thin') ) {
                        
                        $this.addClass("ut-already-visible").width(bar_width + "%");
                        
                    } else {                    
                    
                        $this.addClass("ut-already-visible").stop(true, true).animate({width : bar_width+"%"} , 1000 );
                    
                    }
                
                }            
            
                        
        });
        
        $(document.body).on('disappear', '.ut-skill-active', function() {
            
            if( $(this).data('animateonce') === 'no' ) {
                                    
                $(this).removeClass("ut-already-visible").css('width',0);
                
            }
                        
        });                          
        
    });
    
    
    /* Gallery Slider
    ================================================== */
    var user_can_click = true;
    
    function delay_click( timer ) {
        
        setTimeout(function() {
            
            user_can_click = true;
        
        }, timer );
    
    }

    $(document).on('click', '.ut-next-gallery-slide', function(event) {
        
        event.stopImmediatePropagation();
        event.preventDefault();
        
        if( !user_can_click ) {
            return;
        }
        
        var $owl = $('#' + $(this).data('for') );
        $owl.trigger('prev.owl.carousel'); 
        
        user_can_click = false;        
        delay_click( 200 ); // should be same as animation speed in css        
        
    });
   
    $(document).on('click', '.ut-prev-gallery-slide', function(event) {
        
        event.stopImmediatePropagation();
        event.preventDefault();
        
        if( !user_can_click ) {
            return;
        }
        
        var $owl = $('#' + $(this).data('for') );
        $owl.trigger('next.owl.carousel');
        
        user_can_click = false;        
        delay_click( 200 ); // should be same as animation speed in css                 
        
    });    
    
    /* Progress Circles 
    ================================================== */
     $('.bkly-progress-svg').appear();
        
    $(document.body).on('appear', '.bkly-progress-svg', function() {
        
        var $this = $(this);
        
        if( $this.hasClass('ut-animation-complete') ) {
            return;
        }
                                
        var totalProgress = $this.find('.circle').attr('stroke-dasharray'),
            progress      = $this.parent().data('circle-percent');
        
        $this.find('.stroke').get(0).style['stroke-dashoffset'] = -502.4 + ( totalProgress * progress / 100 );
        $this.find('.circle').get(0).style['stroke-dashoffset'] = totalProgress * progress / 100;        
                       
    });
    
    $(document.body).on('disappear', '.bkly-progress-svg', function() {
        
        var $this  = $(this);
                        
        if( $this.data('animateonce') === 'no' ) {
            
            $this.find('.stroke').get(0).style['stroke-dashoffset'] = -502.4;
            $this.find('.circle').get(0).style['stroke-dashoffset'] = 0;
        
        } else {
            
            $this.addClass('ut-animation-complete');
        
        }
                        
    });
    
    
    /* Load Instagram Feeds
    ================================================== */
    var instagram_is_loading = false,
        load_instagram_images_on_scroll = false;
    
    $(window).load(function(){
        
        $(".ut-instagram-gallery-wrap").each( function(){
        
            $(this).height( $(this).height() );

        });
        
    });
    
    function ut_load_instagram_feeds( $gallery, $clear, atts, callback ){

        if( !atts ) {
            return;
        }

        $.ajax({

          type: 'POST',
          url: utShortcode.ajaxurl,
          data: {
              "action": "ut_get_gallery_instagram_feed", 
              "atts" : JSON.stringify(atts),
          },
          success: function(response) {                  
            
              // update atts on gallery
              $gallery.data("atts", response.atts);
              
              // get new items
              var $newItems = $(response.feeds );
              
              // hide items since images are not loaded yet
              $newItems.find(".ut-image-gallery-item").hide();              
              $newItems.insertBefore( $clear );
              
              // wait for images
              $newItems.imagesLoaded( function() {
                  
                  // show new images
                  $newItems.find(".ut-image-gallery-item").show();
                  
                  // animate container height
                  $gallery.parent(".ut-instagram-gallery-wrap").height( $gallery.height() );
                  
                  // run appear for possible animations
                  $.force_appear();
                  
                  // remove flag
                  instagram_is_loading = false;
                  
              });
              
              /* restart */    
              $('.ut-instagram-gallery').lightGallery({
                    selector: '.ut-vc-images-lightbox',
                    exThumbImage: 'data-exthumbimage',
                    download: site_settings.lg_download,
                    hash: false
              });
              
              return false;

          },
          complete : function() {

              if (callback && typeof(callback) === "function") {   
                  callback();  
              }

          }

        });

    }
    
    $(document).on('click', '.ut-load-instagram-feeds', function(event) {        
        
        var instagram_gallery_id = $(this).data('for'),
            $button = $(this);
        
        if( instagram_is_loading ) {
            return false;
        }
        
        // set flag
        instagram_is_loading = true;
        
        // hide load more button - will be replaced with a loading icon on scroll
        $button.fadeOut();
        
        // load feeds
        ut_load_instagram_feeds( $(instagram_gallery_id), $(instagram_gallery_id + '_clear') , $(instagram_gallery_id).data("atts"), function() {
            
            // remove flag
            instagram_is_loading = false;
            
            // activate scroll loading
            load_instagram_images_on_scroll = true;

        });

        event.preventDefault();
        
    });    
    
    
    $(window).scroll( function(){
        
        if( !load_instagram_images_on_scroll || instagram_is_loading ) {
            return;
        }
        
        $('.ut-instagram-gallery').each(function(){
                       
            var $this = $(this);
            
            if( $(window).scrollTop() >= $this.offset().top + $this.outerHeight() - window.innerHeight) {
                
                $this.find(".ut-instagram-module-loading").fadeIn();
                
                // set flag
                instagram_is_loading = true;

                // load feeds
                ut_load_instagram_feeds( $this, $('#' + $this.attr("id") + '_clear') , $this.data("atts"), function() {
                    
                    $this.find(".ut-instagram-module-loading").fadeOut();

                });

            }
            
        });
        
        
    });
    
    
    // force visible elements to appear after load
    $(window).load( function(){
        
        $(window).trigger("resize");
        $.force_appear();
                   
    });        

})(jQuery);
 /* ]]> */