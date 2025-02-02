/*!
* FitVids 1.1
*
* Copyright 2013, Chris Coyier - http://css-tricks.com + Dave Rupert - http://daverupert.com
* Credit to Thierry Koblentz - http://www.alistapart.com/articles/creating-intrinsic-ratios-for-video/
* Released under the WTFPL license - http://sam.zoy.org/wtfpl/
*
*/
(function(a){a.fn.fitVids=function(b){var e={customSelector:null,ignore:null,};if(!document.getElementById("fit-vids-style")){var d=document.head||document.getElementsByTagName("head")[0];var c=".fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}";var f=document.createElement("div");f.innerHTML='<p>x</p><style id="fit-vids-style">'+c+"</style>";d.appendChild(f.childNodes[1])}if(b){a.extend(e,b)}return this.each(function(){var g=["iframe[src*='player.vimeo.com']","iframe[src*='youtube.com']","iframe[src*='youtube-nocookie.com']","iframe[src*='kickstarter.com'][src*='video.html']","object","embed"];if(e.customSelector){g.push(e.customSelector)}var h=".fitvidsignore";if(e.ignore){h=h+", "+e.ignore}var i=a(this).find(g.join(","));i=i.not("object object");i=i.not(h);i.each(function(){var n=a(this);if(n.hasClass("jwswf")){return}if(n.parents(h).length>0){return}if(this.tagName.toLowerCase()==="embed"&&n.parent("object").length||n.parent(".fluid-width-video-wrapper").length){return}if((!n.css("height")&&!n.css("width"))&&(isNaN(n.attr("height"))||isNaN(n.attr("width")))){n.attr("height",9);n.attr("width",16)}var j=(this.tagName.toLowerCase()==="object"||(n.attr("height")&&!isNaN(parseInt(n.attr("height"),10))))?parseInt(n.attr("height"),10):n.height(),k=!isNaN(parseInt(n.attr("width"),10))?parseInt(n.attr("width"),10):n.width(),l=j/k;if(!n.attr("id")){var m="fitvid"+Math.floor(Math.random()*999999);n.attr("id",m)}n.wrap('<div class="fluid-width-video-wrapper"></div>').parent(".fluid-width-video-wrapper").css("padding-top",(l*100)+"%");n.removeAttr("height").removeAttr("width")})})}})(window.jQuery||window.Zepto);

/**
 * JQuery Appear
 */
(function($) {
    
    "use strict";
    
    var selectors = [];
    var check_binded = false;   
    var check_lock = false;
    
    var defaults = {
        interval: 250,
        force_process: false
    };
    
    var $window = $(window);
    var $prior_appeared = [];

    function appeared(selector) {
        return $(selector).filter(function() {
            return $(this).is(':appeared');
        });
    }

    function process() {

        check_lock = false;

        for (var index = 0, selectorsLength = selectors.length; index < selectorsLength; index++) {
            
            var $appeared = appeared(selectors[index]);
            $appeared.trigger('appear', [$appeared]);

            if ($prior_appeared[index]) {
                var $disappeared = $prior_appeared[index].not($appeared);
                $disappeared.trigger('disappear', [$disappeared]);
            }
            
            $prior_appeared[index] = $appeared;
        }
        
    }

    function add_selector(selector) {
        selectors.push(selector);
        $prior_appeared.push();
    }

    
    $.expr[':'].appeared = function(element) {

        var $element = $(element);
        
        if (!$element.is(':visible')) {
          return false;
        }

        var window_left = $window.scrollLeft();
        var window_top = $window.scrollTop();
        var offset = $element.offset();
        var left = offset.left;
        var top = offset.top;

        if (top + $element.height() >= window_top && top - ($element.data('appear-top-offset') || 0) <= window_top + $window.height() && left + $element.width() >= window_left && left - ($element.data('appear-left-offset') || 0) <= window_left + $window.width()) {
            return true;
        } else {
            return false;
        }
    };

    $.fn.extend({
        
        // watching for element's appearance in browser viewport
        appear: function(options) {
            
            var opts = $.extend({}, defaults, options || {});
            var selector = this.selector || this;
            
            if (!check_binded) {
                
                var on_check = function() {
                
                if (check_lock) {
                    return;
                }
                
                check_lock = true;
                setTimeout(process, opts.interval);
                
                };
    
                $(window).scroll(on_check).resize(on_check);
                check_binded = true;
                
            }
    
            if (opts.force_process) {
                setTimeout(process, opts.interval);
            }
            
            add_selector(selector);
            return $(selector);
            
        }
    });

    $.extend({
    
        force_appear: function() {
            
            if (check_binded) {
                process();
                return true;
            }
            
            return false;
        
        }
        
    });
    
})(jQuery);


;(function ($) {
    
    "use strict";
    
    $.fn.numeric = function (options) {

        return this.each(function () {

            var  $this = $(this);

            $this.keypress(options, function (e) {
                
                if( e.which === 8 || e.which === 0 ) {
                    return  true;
                }

                if( e.which < 48 || e.which > 57 ) {
                     return false;
                }

                var dest = e.which - 48;
                var result = this.value + dest.toString();

                if( result > e.data.max ) {
                     
                     $this.val( e.data.max );
                     $this.siblings('.ut-numeric-slider').slider( "value", e.data.max );
                     $this.siblings('.ut-numeric-slider-hidden-input').val( e.data.max );
                     
                     return false;
                     
                }

            });

        });

    };

})(jQuery);


/**
 * Option Tree UI
 * 
 * @author Derek Herman (derek@valendesigns.com)
 */
;(function($) {
    
    "use strict";
    
    var OT_UI = {
    
        processing: false,
    
        init: function() {
            
            this.init_hide_body();
            this.init_sortable();
            this.add_list_title();
            this.init_numeric_slider();
            this.init_icon_picker();
            this.init_color_picker();
            this.init_google_font();
            this.runTinyMCE();
            this.init_dependencies();
            this.replicate_ajax();
            
        },
        init_hide_body: function(elm,type) {
      
            var css = '.option-tree-setting-body';
      
            if ( type === 'parent' ) {
            
                $(css).not(elm.parent().parent().children(css)).hide();
                
            } else if (type === 'child') {
                
                elm.closest('ul').find(css).not( elm.parent().parent().children(css) ).hide();
                
            } else if (type === 'child-add') {
                
                elm.children().find(css).hide();
                
            } else if (type === 'toggle') {
                
                elm.parent().parent().children(css).toggle();
                
            } else {
                
                $(css).hide();
            
            }
      
        },
        init_remove_active: function(elm,type) {
            
            var css = '.option-tree-setting-edit';
            
            if ( type === 'parent' ) {
                
                $(css).not(elm).removeClass('active');
                
            } else if (type === 'child') {
            
                elm.closest('ul').find(css).not(elm).removeClass('active');
                
            } else if (type === 'child-add') {
                
                elm.children().find(css).removeClass('active');
                
            } else {
                
                $(css).removeClass('active');
                
            }
        
        },
        init_sortable: function() {
            
            $('.ut-sortable').not('.ut-option-initialized').each( function() {
                
                if ( $(this).children('li').length ) {
                    
                    var elm = $(this);
                    
                    elm.show();
                    elm.sortable({
                        items: 'li:not(.ui-state-disabled)',
                        handle: 'div.option-tree-setting',
                        placeholder: 'ui-state-highlight',
                        cancel: '.option-tree-setting-body',
                        start: function (event, ui) {
                            ui.placeholder.height(ui.item.height());
                        },
                        stop: function(evt, ui) {
                            
                            setTimeout( function(){                                
                                OT_UI.update_ids(elm);                                
                            }, 200 );
                            
                        }
                        
                    });
                    
                    $(this).addClass('ut-option-initialized');
                       
                }
                
            });
        
        },
        add_list_title: function() {
            
            $('.ut-select-setting-title').each(function() {
                OT_UI.edit_title_select(this);                        
            });                        
            
        },
        runTinyMCE: function() {
            
            if( typeof tinyMCEPreInit === "undefined" ) {
                return false;
            }            
            
            /* get config from hidden editor */
            var tinyMCEConfig = tinyMCEPreInit.mceInit['ut-hidden-editor'];  
            var $textareas = $('.ut-ui-tinymce textarea'); 
            
            $textareas.each(function() {  
                
                var area_id = $(this).attr('id'),
                    parent  = $(this).closest('.wp-editor-wrap');
                
                /* add changed settings object to tinyMCEPreInit Object */
                tinyMCEPreInit.mceInit[area_id] = tinyMCEConfig;
                
                var qtsettings = {
                    'buttons' : '', 
                    'disabled_buttons' : '', 
                    'id' : area_id
                };
                
                /* add qt settings for the new instance as well*/
                tinyMCEPreInit.qtInit[area_id] = qtsettings;
                
                /* run editor */
                tinymce.init( tinyMCEConfig ); 
                tinymce.execCommand( 'mceAddEditor', true, area_id );
                
                /* add quicktags */
                var qt = new QTags(qtsettings);
                
                setTimeout( function() {
                    
                    $(parent).removeClass('html-active').addClass('tmce-active');
                    QTags._buttonsInit();
                     
                }, 750 );
            
            });  
            
        },
        init_google_font: function() {

            
            /* update all fields first */
            $(".ut-google-font-select").not(".ut-google-initialized").each(function() {
                
                var $this = $(this);
                
                OT_UI.update_google_font_fields( $this.data("group") );
                
                $this.addClass('ut-google-initialized');
                
            });
            
        },
        update_google_font_fields: function( group ) {
			
			if(!group) {
				return;
			}
			
			var $this		   = $("#"+group+"-font-family"),
				font 		   = $this.find(':selected').data('font'),
				subsets		   = $this.find(':selected').data('subsets'),
				variants	   = $this.find(':selected').data('variants'),
				font_id		   = $this.find(':selected').data('fontid'),
				font_size	   = $("#"+group+"-font-size").val(),
				font_weight	   = $("#"+group+"-font-weight").val(),
                text_transform = $("#"+group+"-text-transform").val(),
				font_style	   = $("#"+group+"-font-style").val();			
			
			if( font ) {
			
				/* update subsets */			
				OT_UI.update_google_font_subsets( group , subsets );
				
				/* update weights*/
				OT_UI.update_google_font_weights( group , variants );
				
				/* update styles*/
				OT_UI.update_google_font_styles( group , variants );
				
				/* change link attr */
				OT_UI.update_google_font_link( group );
							
				/* update font preview */
				OT_UI.update_google_font_preview( group , font_size , font, font_weight, font_style, text_transform );		
				
				/* update hidden ID */
				$("#"+group+"-fontid").val(font_id);
				
			} else {
                
                $("#ut-google-style-"+group).text('');
            
            }
			
		},
        update_google_font_subsets: function( group , subsets ) {
			
			subsets = subsets.split(","); 
			
			/* reset select field if selected state is not available anymore */		
			if( $.inArray( $("#"+group+"-font-subset").val() , subsets ) === -1 ) {
				$("#"+group+"-font-subset").prop('selectedIndex', 0).prev('span').replaceWith('<span>' + $("#"+group+"-font-subset").find('option:selected').text() + '</span>');
			}
			
			/* update available subsets */
			$("#"+group+"-font-subset option").each(function() {
				
				if( $.inArray( $(this).val() , subsets ) >= 0 || !$(this).val() ) {
					
					$(this).attr("disabled" , false);
					
				} else {
				
					$(this).attr("disabled" , true);
					
				}
				
			});
		
        },
        update_google_font_weights: function( group , variants ) {
			
            variants = variants.replace("regular", "400");			
            variants = variants.split(",");
						
			/* reset select field if selected state is not available anymore */	
			if( $.inArray( $("#"+group+"-font-weight").val() , variants ) === -1 ) {
				$("#"+group+"-font-weight").prop('selectedIndex', 0).prev('span').replaceWith('<span>' + $("#"+group+"-font-weight").find('option:selected').text() + '</span>');
			}
			
			$("#"+group+"-font-weight option").each(function() {
				
				if( $.inArray( $(this).val() , variants ) >= 0 || !$(this).val() ) {
				
					$(this).attr("disabled" , false);
				
				} else {
				
					$(this).attr("disabled" , true);
								
				}
					
			});
		},
        update_google_font_styles: function( group , variants ) {
		
			variants = variants.split(",");
			
			/* reset select field if selected state is not available anymore */	
			if( $.inArray( $("#"+group+"-font-style").val() , variants ) === -1 ) {
				$("#"+group+"-font-style").prop('selectedIndex', 0).prev('span').replaceWith('<span>' + $("#"+group+"-font-style").find('option:selected').text() + '</span>').show();
			}
			
			$("#"+group+"-font-style option").each(function() {
				
				if( $.inArray( $(this).val() , variants ) >= 0 || !$(this).val() ) {
				
					$(this).attr("disabled" , false);
				
				} else {
				
					$(this).attr("disabled" , true);
								
				}			
			
			});
		
		},        
        update_google_font_link: function( group ) {
			
			if(!group) {
				return;
			}
			
			var $this		= $("#"+group+"-font-family"),
				url 		= 'http://fonts.googleapis.com/css?family=',
				family  	= $this.find(':selected').data('family'),
				font_weight	= $("#"+group+"-font-weight").val(),
				font_style	= $("#"+group+"-font-style").val();		
			
			$("#ut-google-style-link-"+group).attr("href" , url+family+':'+font_weight+font_style);
		
		},
        update_google_font_preview: function( group , font_size , font, font_weight, font_style, text_transform ) {
		    
            $("#ut-google-style-"+group).text('#ut-google-preview-'+group+' { font-size: '+font_size+'; font-family: "'+ font +'" !important; font-weight: '+font_weight+'; font-style: '+font_style+'; text-transform: '+text_transform+'; }');
		    
		},
        add: function(elm,type) {
            
            var self = this, 
                list = '', 
                list_class = '',
                name = '', 
                post_id = 0, 
                get_option = '', 
                settings = '',
                list_title = '';
            
            if ( type === 'choice' ) {
                
                list = $(elm).parent().children('ul');
                list_class = 'list-choice';
                
            } else if ( type === 'list_item' ) {
                
                list = $(elm).parent().children('ul');
                list_class = 'list-sub-setting';
                
            } else if ( type === 'list_item_setting' ) {
                
                list = $(elm).parent().children('ul');
                list_class = 'list-sub-setting';
                
            } else {
                
                list = $(elm).parent().find('ul:first');
                list_class = ( type === 'section' ) ? 'list-section' : 'list-setting';
                
            }
            
            name = list.data('name');
            post_id = list.data('id');
            get_option = list.data('getOption');
            list_title = list.data('list-title');
            settings = $('#'+name+'_settings_array').val();
            
            if ( this.processing === false ) {
                
                this.processing = true;
                  
                var count = parseInt(list.children('li').length);
                
                if ( type === 'list_item' ) {
                    
                    list.find('li input.option-tree-setting-title', self).each(function(){
                    
                        var setting = $(this).attr('name'),
                            regex = /\[([0-9]+)\]/,
                            matches = setting.match(regex),
                            id = null !== matches ? parseInt(matches[1]) : 0;
                        id++;
                        if ( id > count) {
                          count = id;
                        }
                    
                    });
                }
                
                $.ajax({
                    type: 'POST',
                    url: ajaxurl,
                    data: {
                        action: 'add_' + type,
                        count: count,
                        name: name,
                        post_id: post_id,
                        get_option: get_option,
                        settings: settings,
                        type: type,
                        list_title: list_title
                    },
                    complete: function( data ) {
                    
                        if ( type === 'choice' || type === 'list_item_setting' ) {
                        
                          OT_UI.init_remove_active(list,'child-add');
                          OT_UI.init_hide_body(list,'child-add');
                          
                        } else {
                          
                          OT_UI.init_remove_active();
                          OT_UI.init_hide_body();
                          
                        }
                    
                        list.append('<li class="ui-state-default ' + list_class + '">' + data.responseText + '</li>');
                        list.children().last().find('.option-tree-setting-edit').toggleClass('active');
                        list.children().last().find('.option-tree-setting-body').toggle();
                        list.children().last().find('.option-tree-setting-title').focus();
                        
                        OT_UI.update_ids(list);
                        
                        setTimeout( function() {
                          
                          OT_UI.init_sortable();
                          OT_UI.add_list_title();
                          OT_UI.init_numeric_slider();
                          OT_UI.init_color_picker();    
                          
                        }, 500);
                
                        if( $('#ut_portfolio_link_type').length !== 0 ) {
                            $('#ut_portfolio_link_type').trigger('change');
                        }
                
                        self.processing = false;
                    }
        
                });
        
            }
        
        },
        remove: function(e) {
            $(e).parent().parent().parent('li').remove();
        },
        edit_title: function(e) {
            
            if ( this.timer ) {
                clearTimeout(e.timer);
            }
            
            this.timer = setTimeout( function() {
                $(e).parent().parent().parent().children('.open').text(e.value);
            }, 100);
            
            return true;
            
        },
        edit_title_select: function(e) {
            
            var title = e.value.replace("fa-","").replace("-"," ");
            
            $(e).parent().parent().parent().parent().children('.open').text(title);
            
            return true;
            
        },        
        update_id: function(e) {
          
            if ( this.timer ) {
                clearTimeout(e.timer);
            }
          
            this.timer = setTimeout( function() {
                OT_UI.update_ids( $(e).parents('ul') );
            }, 100);
          
            return true;
            
        },    
        update_ids: function(list) {
            
            var last_section, section, list_items = list.children('li');
            
            list_items.each(function(index) {
                
                if ( $(this).hasClass('list-section') ) {

                    section = $(this).find('.section-id').val().trim().toLowerCase().replace(/[^a-z0-9]/gi,'_');
                
                    if (!section) {
                        section = $(this).find('.section-title').val().trim().toLowerCase().replace(/[^a-z0-9]/gi,'_');
                    }
                    
                    if (!section) {
                        section = last_section;
                    }
                    
                }
            
                if ($(this).hasClass('list-setting') ) {
                    
                    $(this).find('.hidden-section').attr({'value':section});
                    
                }
                
                last_section = section;
            });
        },        
        init_upload_fix: function(elm) {
        
            var id  = $(elm).attr('id'),
                val = $(elm).val(),
                img = $(elm).parent().next('ut-ui-media-wrap').find('img'),
                src = img.attr('src'),
                btnContent = '';
                
            if ( val !== src ) {
                img.attr('src', val);
            }
            
            if ( val !== '' && ( typeof src === 'undefined' || src === false ) && OT_UI.url_exists(val) ) {
                
                var image = /\.(?:jpe?g|png|svg|gif|ico)$/i;
                
                if (val.match(image)) {
                  btnContent += '<div class="ut-ui-image-wrap"><img src="'+val+'" alt="" /></div>';
                }
                
                btnContent += '<button class="ut-ui-remove-media ut-ui-button red" title="'+unite_js_translation.remove_media_text+'">'+unite_js_translation.remove_media_text+'</button>';
                
                $('#'+id).val(val);
                $('#'+id+'_media').remove();
                $('#'+id).parent().parent('div').append('<div class="ut-ui-media-wrap" id="'+id+'_media" />');
                $('#'+id+'_media').append(btnContent).slideDown();
                
            } else if ( val === '' || ! OT_UI.url_exists(val) ) {
                
                $(elm).parent().next('.ut-ui-media-wrap').remove();
            
            }
        
        },
        init_numeric_slider: function() {
                        
            $(".ut-numeric-slider-wrap").not('.ut-option-initialized').each(function() {
                                
                var hidden  = $(".ut-numeric-slider-hidden-input", this),
                    helper  = $(".ut-numeric-slider-helper-input", this),
                    $slider = $(".ut-numeric-slider", this),
                    value   = hidden.val();
                    
                if ( ! value ) {
                    value = hidden.data("min");
                    helper.val(value);
                }
                
                $slider.slider({
                    min: hidden.data("min"),
                    max: hidden.data("max"),
                    step: hidden.data("step"),
                    value: value, 
                    slide: function(event, ui) {
                        hidden.add(helper).val(ui.value);
                    }
                });
                
                /* set max value and tooltip */
                helper.tooltipster({trigger:"click"}).tooltipster('content', helper.data('tooltip') ).numeric({ max: hidden.data("max") });
                
                $(this).addClass('ut-option-initialized');
                
            });
            
            
        },
        init_icon_picker: function() {
            
            $('.ut-icon-select').not(".ut-option-initialized").each(function() {
                
                var $this = $(this);
                
                $this.fontIconPicker({
                    
                     theme: 'fip-inverted',
                     iconsPerPage: 50
                                 
                });
                
                $this.addClass('ut-option-initialized');
                    
            });            
            
        },
        init_color_picker: function() {
            
            
            $('.ut-minicolors').not(".ut-option-initialized").each(function() {
            
                var $this = $(this),
                    mode  = $this.data('mode');
                        
                if( mode === 'rgb' ) {
                                    
                    $this.minicolors({
                        format : mode,
                        opacity: true
                    });
                
                } else {
                    
                    $this.minicolors({
                        format: mode,
                        letterCase: 'uppercase'
                    });
                    
                }
                
                $this.addClass('ut-option-initialized');            
                
            });
        
        },
        remove_image: function(e) {
            $(e).parent().parent().find('.ut-ui-upload-input').attr('value','');
            $(e).parent('.ut-ui-media-wrap').remove();
        },
        init_dependencies: function() {
            
            /* theme options dependencies */
            if( $("#ut-admin-wrap").length ) {
                
                $("#ut-admin-wrap").find('.ut-options-outer-panel-group.ut-panel-loaded').not(".ut-dependencies-initialized").each(function() {
                    
                    $(this).FormDependencies({
                        inactiveClass: 'ut-hide',
                    }).addClass('ut-dependencies-initialized');
                    
                });
            
            }            
        
        },
        replicate_ajax: function() {
            
            if ( location.href.indexOf("#") !== -1 ) {
                
                var url =  $("input[name=\'_wp_http_referer\']").val(),
                    hash = location.href.substr(location.href.indexOf("#"));
                
                $("input[name=\'_wp_http_referer\']").val( url + hash );
                this.scroll_to_top();
                
            }
            
            setTimeout( function() {
                $(".wrap.settings-wrap .fade").fadeOut("fast");
            }, 3000 );
            
        },
        url_exists: function(url) {
            
            var http = new XMLHttpRequest();
            
            http.open('HEAD', url, false);
            http.send();
            
            return http.status!==404;
            
        },
        scroll_to_top: function() {
            
            setTimeout( function() {
                $(this).scrollTop(0);
            }, 50 );
            
        }
    }; /* End OT_UI */
    
    OT_UI.init();
    
    
    $(document).ready( function() {
        
        
        function slicknavOpened(trigger) {
            
            var $trigger = $(trigger[0]);
            
            if( $trigger.hasClass('slicknav_btn') ) {
                return;
            }
            
            // trigger is an <a> anchor contained in a <li>
            var $liParent = $trigger.parent();
            
            // parent <li> is contained inside a <ul>
            var $ulParent = $liParent.parent();
            
            $ulParent.children().each(function () {
                var $child = $(this);
                
                if ($child.is($liParent)) {
                    return;
                }
                
                if ($child.hasClass('slicknav_collapsed')) {
                    return;
                }
                
                if (!$child.hasClass('slicknav_open')) {
                    return;
                }
                
                var $anchor = $child.children().first();
                
                if (!$anchor.hasClass('slicknav_item')) {
                    return;
                }

                $anchor.click();
                
            });
        }
        
        
        $('.ut-admin-inner-nav').each(function() {
            
            var $this = $(this);
            
            $this.slicknav({
                label: '',
                duplicate: false,
                duration: 0, /* no animation */
                prependTo: $this.parent(),
                allowParentLinks: true,
                beforeOpen : function(trigger) { 
                
                    slicknavOpened(trigger); 
                    
                }
            }).slicknav('open'); 
            
        });        
        
        /* ajax panel loader */        
        var panel_is_loading = false;
        
        function load_panel_section( $this ) {
            
            if( $this.parent().hasClass("ut-panel-loaded") ) {
                return;
            }            
            
            $('#' + $this.data("section") + '_placeholder' ).removeClass('ut-hide').addClass('ut-show');
            
            /* show loader */
            $('#' + $this.data("section") + '_loader' ).fadeIn();
            
            /* panel is loading now */
            panel_is_loading = true;
                                    
            $.ajax({
              
                type: 'POST',
                url: ajaxurl,
                data: { 
                    "action"      : "load_theme_panel_section",
                    "section"     : $this.data("section"),
                },
                success: function(response) {
                    
                    /* define section */
                    var section = "#section_" + $this.data("section");
                    
                    /* append new items */
                    $(response).appendTo( $(section).children('.ut-options-outer-panel-group-append') ); 
                    
                    /* add class to menu in order to avoid double loading */
                    $this.parent().addClass("ut-panel-loaded");
                    
                    /* add status to panel as well */
                    $(section).addClass("ut-panel-loaded");
                    
                    $('#' + $this.data("section") + '_placeholder' ).removeClass('ut-show').addClass('ut-hide');
                    
                    /* hide all tabs first */
                    $('.ut-options-outer-panel-group').removeClass('ut-show').addClass('ut-hide');
                        
                    /* show current tab */
                    $("#section_" + $this.data("section") ).removeClass('ut-hide').addClass('ut-show');
                    
                    /* show sub tab */
                    $("[data-default-section='" +  $this.data("subsection") +"']").trigger("click");
                    $("[data-section='" +  $this.data("subsection") +"']").trigger("click");
                    
                    /* set min height for editor */
                    $('.ut-ace-css-editor').css('min-height',400);
                                        
                    /* init options */
                    OT_UI.init();
                    
                    $('#' + $this.data("section") + '_loader' ).fadeOut( 400, function(){
                        
                        /* store ID for later use */
                        store_loaded_panels( $this.data("section") );
                        
                        /* remove flag */
                        panel_is_loading = false;
                        
                    });
                    
                
                } 
            
            });
        
        }
        
        
        
        /* store panel ids for saving process */
        var stored_panels = [];
        
        function store_loaded_panels( id ) {
            
            stored_panels.push( id );
            
            $('#ut-store-panels').val( stored_panels.join() );            
            
        }
        
        $('#ut-admin-outer-nav li').each(function() {
            
            if( $(this).hasClass('ut-panel-loaded') ) {
                
                store_loaded_panels( $(this).children("a").data("section") );
                       
            }
            
        });
                
        $(document).on('click', '#ut-admin-outer-nav li:not(".ut-admin-branding") a', function( event ) {
            
            if( panel_is_loading ) {
                return false;
            }
            
            $(this).parent().siblings().removeClass('ut-ui-state-active');
            $(this).parent().siblings().find('.ut-ui-state-active').removeClass('ut-ui-state-active');
            $(this).parent().addClass('ut-ui-state-active');
            
            /* hide all tabs first */
            $('.ut-options-outer-panel-group').removeClass('ut-show').addClass('ut-hide');
                
            /* show current tab */
            $("#section_" + $(this).data("section") ).removeClass('ut-hide').addClass('ut-show');
            
            /* show sub tab */
            $("[data-section='" + $(this).data("subsection") +"']").trigger("click");
            
            /* set cookies */
            Cookies.set( 'ut_open_panel_section', $(this).data("section") );
            Cookies.set( 'ut_open_panel_subsection', $(this).data("subsection") );
            
            /* try to load panel */
            load_panel_section( $(this) );
            
            event.preventDefault();
        
        });        
        
        $(document).on('click', '.ut-admin-inner-nav li a', function( event ) {        
            
            /* clear all active states */
            $(this).parent().parent().find('.ut-ui-state-active').removeClass('ut-ui-state-active');
            
            $(this).parent().addClass('ut-ui-state-active');
            
            $('.ut-options-inner-panel-group').removeClass('ut-show').addClass('ut-hide');
            
            $("#section_" + $(this).data("section") ).removeClass('ut-hide').addClass('ut-show');
            
            /* set cookies */
            Cookies.set( 'ut_open_panel_subsection', $(this).data("section") );
            
            if( typeof $(this).data("default-section") !== 'undefined' ) {
                
                $("[data-section='" +  $(this).data("default-section") +"']").parent().addClass('ut-ui-state-active');
                
            }
                        
            $.force_appear();
            
            event.preventDefault();
            
        });
        
        /* option tree edit */
        $(document).on('click', '.option-tree-setting-edit', function(event) {
            
            event.preventDefault();
            
            var $this = $(this);
            
            if ( $this.parents().hasClass('option-tree-setting-body') ) {
          
                OT_UI.init_remove_active($this,'child');
                OT_UI.init_hide_body($this,'child');
          
            } else {
          
                OT_UI.init_remove_active($this,'parent');
                OT_UI.init_hide_body($this, 'parent');
          
            }
        
            $this.toggleClass('active');
            OT_UI.init_hide_body($this, 'toggle');
        
        });
        
        
        
        /* option tree add list item */
        $(document).on('click', '.ut-list-item-add', function( event ) {
            
            event.preventDefault();
            OT_UI.add(this,'list_item');
        
        });
        
        
        
        /* option tree add choice */
        $(document).on('click', '.option-tree-choice-add', function( event ) {
        
            event.preventDefault();
            OT_UI.add(this,'choice');
                
        });
        
        
        
        /* option tree remove setting */
        $(document).on('click', '.option-tree-setting-remove', function( event ) {
            
            event.preventDefault();
            
            if ( $(this).parents('li').hasClass('ui-state-disabled') ) {
              alert(unite_js_translation.remove_no);
              return false;
            }
            
            var _this = this,
                $this = $(_this),
                list  = $this.parents('ul');
            
            modal({
                type: 'confirm',
                title: 'Confirm',
                text: unite_js_translation.remove_agree,
                buttons: [
                    {
                        addClass: 'ut-ui-button-health'
                    },
                    {
                        addClass: 'ut-ui-button-blue'
                    }
                ], 
                callback: function(result) {
                    
                    if( result === true ) {
                        
                        OT_UI.remove(_this);
                        
                        setTimeout( function() { 
                            OT_UI.update_ids(list); 
                        }, 200 );
                        
                    }
                    
                }
                
            });
            
            return false;
            
        });
        
        
        
        /* change titlte on key */
        $(document).on('keyup', '.option-tree-setting-title', function() {
            OT_UI.edit_title(this);
        });    
        
        $(document).on('change', '.ut-select-setting-title', function() {
            OT_UI.edit_title_select(this);
        });
        
        $(document).on('keyup', '.section-id', function() {
            OT_UI.update_id(this);
        });
        
        
        
        /* image select */
        $(document).on('click', '.option-tree-ui-radio-image', function( event ) {
            
            var $this = $(this);
                        
            $this.closest('.type-radio-image').find('.option-tree-ui-radio-image').removeClass('option-tree-ui-radio-image-selected');
            $this.toggleClass('option-tree-ui-radio-image-selected');
            $this.parent().find('.option-tree-ui-radio').attr('checked', true);
            
        });
        
        
        
        $(document).on('focus blur', '.ut-ui-upload-input', function() {
            
            $(this).parent('.ut-ui-upload-parent').toggleClass('focus');
            OT_UI.init_upload_fix(this);
            
        });
        
        
        /* media uploader */
        $(document).on('click', '.ut-media-upload', function( event ) {
            
            event.preventDefault();
                            
            var field_id   = $(this).parent('.ut-ui-upload-parent').find('input').attr('id'),
                post_id    = $(this).attr('rel'),
                btnContent = '';
                
            window.ot_media_frame = window.ot_media_frame || new wp.media.view.MediaFrame.Select({
                title: $(this).attr('title'),
                button: {
                  text: unite_js_translation.upload_text
                }, 
                multiple: false
            });
            
            window.ot_media_frame.on('select', function() {
    
                var attachment = window.ot_media_frame.state().get('selection').first(), 
                    href       = attachment.attributes.url, 
                    mime       = attachment.attributes.mime,
                    //regex      = /^image\/(?:jpe?g|png|svg|gif|x-icon)$/i,
                    regex      = /\.(?:jpe?g|png|svg|gif|ico)$/i;
                
                if ( href.match( regex ) ) {
                    btnContent += '<div class="ut-ui-image-wrap"><img src="'+href+'" alt="" /></div>';
                }
                
                btnContent += '<button class="ut-ui-remove-media ut-ui-button red" title="'+unite_js_translation.remove_media_text+'">'+unite_js_translation.remove_media_text+'</button>';
                
                $('#'+field_id).val(href);
                $('#'+field_id+'_media').remove();
                $('#'+field_id).parent().parent('div').append('<div class="ut-ui-media-wrap" id="'+field_id+'_media" />');
                $('#'+field_id+'_media').append(btnContent).slideDown();
                
                window.ot_media_frame.off('select');
                
            }).open();
    
  
        });
        
        
        
        /* remove media */
        $(document).on('click', '.ut-ui-remove-media', function( event ) {
            
            var $this = $(this);
            
            modal({
                type: 'confirm',
                title: 'Confirm',
                text: unite_js_translation.remove_agree,
                buttons: [
                    {
                        addClass: 'ut-ui-button-health'
                    },
                    {
                        addClass: 'ut-ui-button-blue'
                    }
                ], 
                callback: function(result) {
                    
                    if( result === true ) {
                        OT_UI.remove_image($this);
                    }
                    
                }
                
            });
            
            event.preventDefault();
            
        });
        
        /* numeric slider helper input */
        $(document).on('input propertychange', '.ut-numeric-slider-helper-input', function() {
            
            var $this = $(this);
                    
            $this.siblings('.ut-numeric-slider').slider( "value", $this.val() );
            $this.siblings('.ut-numeric-slider-hidden-input').val( $this.val() );
        
        });
        
        $(window).load( function(){
            
            setTimeout(function(){
            
                $('.ut-numeric-slider-helper-input').trigger('propertychange');
            
            }, 500 );
            
        });        
        
        /*
         * Header Styles Preview Boxes
         */
		tb_position = function() {
			var tbWindow = $('#TB_window');
			var width = 840;
			var H = 600;
			var W = width;
	
			if ( tbWindow.size() ) {
				tbWindow.width( W - 50 ).height( H - 45 );
				$('#TB_iframeContent').width( W - 50 ).height( H - 75 );
				tbWindow.css({'margin-left': '-' + parseInt((( W - 50 ) / 2),10) + 'px'});
				if ( typeof document.body.style.maxWidth != 'undefined' )
					tbWindow.css({'top':'40px','margin-top':'0'});
			};
	
			return $('a.thickbox').each( function() {
				var href = $(this).attr('href');
				if ( ! href ) return;
				href = href.replace(/&width=[0-9]+/g, '');
				href = href.replace(/&height=[0-9]+/g, '');
				$(this).attr( 'href', href + '&width=' + ( W - 80 ) + '&height=' + ( H - 85 ) );
			});
		};
	
		$('a.thickbox').click(function(){
			if ( typeof tinyMCE != 'undefined' &&  tinyMCE.activeEditor ) {
				tinyMCE.get('content').focus();
				tinyMCE.activeEditor.windowManager.bookmark = tinyMCE.activeEditor.selection.getBookmark('simple');
			}
		});
		
		/* show font style */
		$(document).on('click', '.ut-font-preview', function() {
			
			tb_show('', unite.pop_url + 'fontpreview.html?TB_iframe=true');
 			return false;
			
		});
				
		/* show header style */
		$(document).on('click', '.ut-header-preview', function() {
			
			tb_show('', unite.pop_url + 'headerpreview.html?TB_iframe=true');
 			return false;
			
		});
		
		/* show header style */
		$(document).on('click', '.ut-hero-preview', function() {
			
			tb_show('', unite.pop_url + 'heropreview.html?TB_iframe=true');
 			return false;
			
		});	
        
        
        
        /* ace editor */            
        $('.ut-ace-css-editor').css('min-height',500).appear();
        
        $(document.body).on('appear', '.ut-ace-css-editor', function() {
        
            var $this       = $(this),
                id          = $this.attr('id'),
                area        = $this.data('id'),
                aceeditor   = ace.edit(id),
                mode        = $this.data('mode');
                
            /* set theme  */
            aceeditor.setTheme("ace/theme/tomorrow");
            
            /* set editor mode */
            aceeditor.getSession().setMode("ace/mode/"+mode);
            aceeditor.setShowPrintMargin(false);
            
            /* update textarea for theme options */
            aceeditor.on('change', function() {
                $( '#' + area ).val( aceeditor.getSession().getValue() );
                aceeditor.resize();
            }); 
        
        
        });
        
        /* make colorpicker and all other appear elements on current page visible */
        $(window).load( function(){
            $.force_appear();
        });
        
        /* 
         * Live functions for Google font preview 
         */
         
        $(document).on("change", ".ut-google-font-select", function(){ 
			
			var group = $(this).data("group");
								
			/* update fields */
			OT_UI.update_google_font_fields( group );
			
		});
		
        $(document).on("change", ".ut-google-font-size", function(){ 
			
			var group = $(this).data("group");
					
			/* update fields */
			OT_UI.update_google_font_fields( group );
			
		});
		
        $(document).on("change", ".ut-google-font-weight", function(){ 
			
			var group = $(this).data("group");
								
			/* update fields */
			OT_UI.update_google_font_fields( group );
			
		});
        
        $(document).on("change", ".ut-google-text-transform", function(){ 
			
			var group = $(this).data("group");
								
			/* update fields */
			OT_UI.update_google_font_fields( group );
			
		});
		
        $(document).on("change", ".ut-google-font-style", function(){ 
			
			var group = $(this).data("group");
					
			/* update fields */
			OT_UI.update_google_font_fields( group );
			
		});
		        		
		/*
        |--------------------------------------------------------------------------
        | Parallax 
        |--------------------------------------------------------------------------
        */
        
		/* disable background settings of parallax is active // front page */
		var parallax_status = $("#ut_front_header_parallax").val();
				
		if( parallax_status === 'on' ) {
			
			$("#ut_front_header_image-attachment").prop('selectedIndex', 0);
			$("#ut_front_header_image-attachment").attr("disabled", true ).parent().wrap('<div class="disabled" />');
			
			$("#ut_front_header_image-position").prop('selectedIndex', 0);
			$("#ut_front_header_image-position").attr("disabled", true ).parent().wrap('<div class="disabled" />');
		
		}
		
        $(document).on("change", "#ut_front_header_parallax", function(){ 
		
			parallax_status = $(this).val();
			
			if( parallax_status === 'on' ) {
				
				$("#ut_front_header_image-attachment").prop('selectedIndex', 0).trigger("change");
				$("#ut_front_header_image-attachment").attr("disabled", true ).parent().wrap('<div class="disabled" />');
				
				$("#ut_front_header_image-position").prop('selectedIndex', 0).trigger("change");
				$("#ut_front_header_image-position").attr("disabled", true ).parent().wrap('<div class="disabled" />');
							
			} else {
				
				$("#ut_front_header_image-attachment").attr("disabled", false ).parent().unwrap();				
				$("#ut_front_header_image-position").attr("disabled", false ).parent().unwrap();			

			}			
		
		});
		
		/* disable background settings of parallax is active // blog */
		parallax_status = $("#ut_blog_header_parallax").val();
				
		if( parallax_status === 'on' ) {
			
			$("#ut_blog_header_image-attachment").prop('selectedIndex', 0);
			$("#ut_blog_header_image-attachment").attr("disabled", true ).parent().wrap('<div class="disabled" />');
			
			$("#ut_blog_header_image-position").prop('selectedIndex', 0);
			$("#ut_blog_header_image-position").attr("disabled", true ).parent().wrap('<div class="disabled" />');
		
		}
		
        $(document).on("change", "#ut_front_header_parallax", function(){ 
		
			parallax_status = $(this).val();
			
			if( parallax_status === 'on' ) {
				
				$("#ut_blog_header_image-attachment").prop('selectedIndex', 0).trigger("change");
				$("#ut_blog_header_image-attachment").attr("disabled", true ).parent().wrap('<div class="disabled" />');
				
				$("#ut_blog_header_image-position").prop('selectedIndex', 0).trigger("change");
				$("#ut_blog_header_image-position").attr("disabled", true ).parent().wrap('<div class="disabled" />');
							
			} else {
				
				$("#ut_blog_header_image-attachment").attr("disabled", false ).parent().unwrap();				
				$("#ut_blog_header_image-position").attr("disabled", false ).parent().unwrap();			
			
			}			
		
		});
		
		
		/* disable background settings of parallax is active // contact section */
		parallax_status = $("#ut_csection_parallax").val();
				
		if( parallax_status === 'on' ) {
			
			$("#ut_csection_background_image-attachment").prop('selectedIndex', 0);
			$("#ut_csection_background_image-attachment").attr("disabled", true ).parent().wrap('<div class="disabled" />');
			
			$("#ut_csection_background_image-position").prop('selectedIndex', 0);
			$("#ut_csection_background_image-position").attr("disabled", true ).parent().wrap('<div class="disabled" />');
		
		}
		
        $(document).on("change", "#ut_csection_parallax", function(){ 
		
			parallax_status = $(this).val();
			
			if( parallax_status === 'on' ) {
				
				$("#ut_csection_background_image-attachment").prop('selectedIndex', 0).trigger("change");
				$("#ut_csection_background_image-attachment").attr("disabled", true ).parent().wrap('<div class="disabled" />');
				
				$("#ut_csection_background_image-position").prop('selectedIndex', 0).trigger("change");
				$("#ut_csection_background_image-position").attr("disabled", true ).parent().wrap('<div class="disabled" />');
							
			} else {
				
				$("#ut_csection_background_image-attachment").attr("disabled", false ).parent().unwrap();				
				$("#ut_csection_background_image-position").attr("disabled", false ).parent().unwrap();			
			
			}			
		
		});
        
        /* admin notice dismiss
		================================================== */    
        $(document).on('click', '.unite-health-status .notice-dismiss', function( event ) {
            
            $.ajax({
                url: ajaxurl,
                data: {
                    action: 'hide_health_notification'
                }
            });
                        
            event.preventDefault();
            
        });
        
        $( document ).on( 'widget-added widget-updated', function( event, widget ){
            
            widget.find('.ut-option-initialized').removeClass('ut-option-initialized');
            
            OT_UI.init_numeric_slider();
            
        });
        
        
        
        
        
        /* United Video Player
		================================================== */
        function create_id() {
             return '-' + Math.random().toString(36).substr(2, 9);
        }
        
        function ut_load_video_player(url, uniqueID, $parent, callback){
                
            if( !url ) {
                return;
            }
                        
            var $video = $('<div id="ut-video'+uniqueID+'"></div>'),
                $caption = $parent.find('.ut-video-caption-text');            
            
            $.ajax({
              
              type: 'POST',
              url: ajaxurl ,
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
                $parent = $(this).parent('.ut-video-caption'),
                $loader = $parent.next('.ut-video-loading');
            
            $loader.fadeIn();
                
            ut_load_video_player(url, uniqueID, $parent, function() {
                $loader.fadeOut();
            });
            
            event.preventDefault();                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
        });
        
        $(document).on('click', '#option-tree-settings-api-submit', function() { 
            
            $('#option-tree-settings-api').submit();
            
        }); 
        
        
        
         /* United Help LightGallery
		================================================== */
        if ( $().lightGallery ) {
            
            $('#ut-dashboard-content').lightGallery({
                selector: '.ut-help-lightbox',
                subHtmlSelectorRelative: true,
                thumbnail:false,
                hash: false
            });       
            
        }
        
        
        if ( $().hideseek ) {
               
            $('#search-topics').hideseek({
                highlight: true,
                nodata: 'No results found'
            });
            
        }
        
        
        
        
        
        
        
        // restore theme defaults 
        function ut_restore_theme_defaults( $this ) {
            
            $.ajax({
              
                type: 'POST',
                url: ajaxurl,
                data: { 
                    "action" : "restore_theme_options",
                    "nonce"  : $this.data("nonce"),
                },
                success: function(response) {
                    
                    location.reload();
                    return false;
                    
                }
            
            });
            
        }
        
        $(document).on('click', '#option-tree-settings-api-restore', function (event) {
            
            event.preventDefault();
            
            modal({
                type: 'confirm',
                title: 'Confirm',
                text: unite_js_translation.reset_agree,
                buttons: [{
                    addClass: 'ut-ui-button-health'
                }, {
                    addClass: 'ut-ui-button-blue'
                }],
                callback: function (result) {

                    if ( result === true ) {

                        ut_restore_theme_defaults( $(this) );

                    }

                }

            });

            return false;

        });
        
        
        
    });
  
})(jQuery);