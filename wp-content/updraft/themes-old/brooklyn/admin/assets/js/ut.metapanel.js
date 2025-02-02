/* <![CDATA[ */
(function ($) {

    "use strict";
    
    /* outer tabs */        
    var $metaboxes = $("#ut-metabox-tabs");
    
    $metaboxes.FormDependencies({
        
        inactiveClass: 'ut-hide',
        
    });
        
    $metaboxes.tabs({
        
        create: function() {
                        
            /* inner tabs */
            $(".ui-has-inner-tabs").tabs();
            
            
        }
    
    });
    
    /* section and page switch */
    $('#setting_ut_page_type').parent().hide();    
            
    if( ut_meta_panel_vars.site_type === "onepage" ) {

        $('*[data-group="ut_page_type"]').appendTo('#ut-option-switch');
    
    }
    
    
    if( ut_meta_panel_vars.post_type === "portfolio" ) {
        
        $('.ut-manage-team').remove(); 
    
    }
    
    if( ut_meta_panel_vars.post_type !== "portfolio" ) {
    
        $('.ut-portfolio-details').addClass('ut-hide');
    
    }
        
    $(document).ready(function(){
        
        
        function set_global_flag( $obj ) {
            
            var value = $obj.is(':checked') ? 'on' : 'off';
            
            $.ajax({
                type: 'POST',
                url: ajaxurl,
                data: { 
                     "action"   : "set_global_flag",
                     "post"     : $obj.data("post"),
                     "option"   : $obj.attr("name"),
                     "value"    : value,
                     "nonce"    : $obj.data('nonce'),
                },
                success: function(response) {
                    
                
                }
            
            });
        
        }
        
        function show_hide_options_set( $obj ) {
            
            if( $obj.is(':checked') ) {
                
                $('#switch_overlay_' + $obj.data('option') ).removeClass('show');
                $('#setting_' + $obj.data('option') ).addClass("ut-custom-active").removeClass("ut-global-active");    
                
            } else {
                
                $('#switch_overlay_' + $obj.data('option') ).addClass('show');
                $('#setting_' + $obj.data('option') ).addClass("ut-global-active").removeClass("ut-custom-active");
                
            }        
        
        }
        
        
        /**
         * Global Option Switch
         */
        
        $(document).on("click", ".ut-switch-for-globals input", function(event){
            
            var $this = $(this);
            
            // start ajax
            set_global_flag( $this );
            show_hide_options_set( $this );
            
            event.stopPropagation();
            event.stopImmediatePropagation();            
             
        });
        
        
        $(window).load(function(){
            
            /* remove inline styles */
            $(".ui-state-default").removeAttr('style');    
        
        });
        
        
        /**
         * radio buttons
         */
        
        $(document).on("click", ".ut-radio-button", function(event){
            
            var $this = $(this);
            
            /* deactivate buttons first */
            $this.parent().find('.ut-radio-button').removeClass('selected');
            
            /* now apply selected state to current button */
            $this.addClass('selected');
            
            /* change state of connected radio button */            
            $('#' +  $(this).data('for') ).attr('checked', true).trigger("change");
                        
            event.preventDefault();  
             
        });
        
        
        /**
         * Page Section Switch 
         */        
        
        $(document).on("click", '*[data-group="ut_page_type"] .ut-radio-button', function(){            
            
            $('#publish').trigger('click');
            
        });   
        
        
        
        
        
        /* special one page settings */
        if( ut_meta_panel_vars.site_type === "onepage" ) {
        
        
        
        
        
        
        
        
        }
        /* end special one page settings */
        
        
        
        
        
        /* special multipage settings */
        if( ut_meta_panel_vars.site_type === "onepage" ) {
        
        
        
        
        
        
        
        
        }
        /* end special multipage settings */
        
        
        
        /**
         * Hero Parallax 
         */
                 
        /* disable background settings if parallax is active */
        var parallax_status = $("#ut_page_hero_parallax").val();
                
        if( parallax_status === 'on' ) {
            
            $("#ut_page_hero_image-attachment").prop('selectedIndex', 0);
            $("#ut_page_hero_image-attachment").attr("disabled", true ).parent().wrap('<div class="disabled" />');
            
            $("#ut_page_hero_image-position").prop('selectedIndex', 0);
            $("#ut_page_hero_image-position").attr("disabled", true ).parent().wrap('<div class="disabled" />');
        
        }
        
        $("#ut_page_hero_parallax").change(function() { 
        
            parallax_status = $(this).val();
            
            if( parallax_status === 'on' ) {
                
                $("#ut_page_hero_image-attachment").prop('selectedIndex', 0).trigger("change");
                $("#ut_page_hero_image-attachment").attr("disabled", true ).parent().wrap('<div class="disabled" />');
                
                $("#ut_page_hero_image-position").prop('selectedIndex', 0).trigger("change");
                $("#ut_page_hero_image-position").attr("disabled", true ).parent().wrap('<div class="disabled" />');
                            
            } else {
                
                $("#ut_page_hero_image-attachment").attr("disabled", false ).parent().unwrap();                
                $("#ut_page_hero_image-position").attr("disabled", false ).parent().unwrap();            
            
            }            
        
        });
        
        /**
         * Section Parallax 
         */
        
        /* disable background settings of parallax is active */
        parallax_status = $("#ut_parallax_section").val();
                
        if( parallax_status === 'on' ) {
            
            $("#ut_parallax_image-attachment").prop('selectedIndex', 0);
            $("#ut_parallax_image-attachment").attr("disabled", true ).parent().wrap('<div class="disabled" />');
            
            $("#ut_parallax_image-position").prop('selectedIndex', 0);
            $("#ut_parallax_image-position").attr("disabled", true ).parent().wrap('<div class="disabled" />');
        
        }
        
        $("#ut_parallax_section").change(function() { 
        
            parallax_status = $(this).val();
            
            if( parallax_status === 'on' ) {
                
                $("#ut_parallax_image-attachment").prop('selectedIndex', 0).trigger("change");
                $("#ut_parallax_image-attachment").attr("disabled", true ).parent().wrap('<div class="disabled" />');
                
                $("#ut_parallax_image-position").prop('selectedIndex', 0).trigger("change");
                $("#ut_parallax_image-position").attr("disabled", true ).parent().wrap('<div class="disabled" />');
                            
            } else {
                
                $("#ut_parallax_image-attachment").attr("disabled", false ).parent().unwrap();                
                $("#ut_parallax_image-position").attr("disabled", false ).parent().unwrap();            
            
            }            
        
        });
        
        
        /**
         * Team Template Switcher and Notification
         */
                
        var current_template = $("#page_template").val();
        
        /* display or hide team manager */        
        if( current_template === 'templates/template-team.php' ) {
            
            $('.ut-team-section').parent().show();
            $('#setting_ut_manage_team_info').hide();
            
        } else {
            
            $('.ut-team-section').parent().hide();
            $('#setting_ut_manage_team_info').show();
            
        }
        
        /* display or hide team manager on template change */    
        $("#page_template").change(function() { 
            
            var chosen_template = $(this).val();
            
            /* display or hide team manager */        
            if(chosen_template === 'templates/template-team.php') {
                
                $('.ut-team-section').parent().show();
                $('#setting_ut_manage_team_info').hide();
                
            } else {
                
                $('.ut-team-section').parent().hide();
                $('#setting_ut_manage_team_info').show();
                
            }            
        
        });
       
        
        /**
         * Portfolio Settings
         */
        
        if( ut_meta_panel_vars.post_type === "portfolio" ) {            
            
            var portfolio_link_type = '';
            
            var restricted_settings = [
                'ut_page_hero_parallax',
                'ut_page_hero_rain_effect',
                'ut_page_hero_rain_sound',
                'ut_page_hero_slider_animation_speed',
                'ut_page_hero_slider_slideshow_speed',
                'ut_page_video_sound',
                'ut_page_video_volume',
                'ut_page_video_mute_button',
                'ut_page_video_poster'
            ];
            
            var show_hide_portfolio_slider_settings = function( state ) {
    
                var $slider_settings = $('#setting_ut_page_hero_slider');
                
                if( state==='show' ) {
                   
                    $slider_settings.find('.option-tree-setting-body').each(function() {
            
                        $(this).children('.ut-format-settings').removeClass('ut-hide');
                        
                    }); 
                    
                    
                } else {
                    
                    $slider_settings.find('.option-tree-setting-body').each(function() {
            
                        $(this).children('.ut-format-settings').addClass('ut-hide');
                        $(this).children('.ut-format-settings').eq(0).removeClass('ut-hide');
                        $(this).children('.ut-format-settings').eq(1).removeClass('ut-hide');
                        
                    });        
                    
                }
                
            };

            var show_hide_portfolio_tabs = function( type ) {
                                
                if( type === 'internal' ) {
                    
                    $('.ut-hero-styling').removeClass('ut-hide');
                    $('.ut-hero-settings').removeClass('ut-hide');
                    $('.ut-page-header-settings').removeClass('ut-hide');       
                    $('.ut-contact-section').removeClass('ut-hide');
                    $('.ut-page-settings').removeClass('ut-hide');
                    $('.ut-navigation-section').removeClass('ut-hide');
                                        
                    $('#setting_ut_activate_page_hero').removeClass('ut-hide');
                    $('#setting_ut_page_hero_type .description').removeClass('ut-hide');
                                        
                    show_hide_portfolio_slider_settings('show');                    
                    
                    $.each(restricted_settings, function(index, value) {
                        
                        $('#setting_' + value).parent().removeClass('ut-disabled-for-user');
                        
                    });
                    
                    
                         
                } else {
                
                    $('.ut-hero-styling').addClass('ut-hide');
                    $('.ut-hero-settings').addClass('ut-hide');
                    $('.ut-page-header-settings').addClass('ut-hide');
                    $('.ut-contact-section').addClass('ut-hide');
                    $('.ut-page-settings').addClass('ut-hide');
                    $('.ut-navigation-section').addClass('ut-hide');
                    
                    $('#setting_ut_activate_page_hero').addClass('ut-hide');                   
                    $('#setting_ut_page_hero_type .description').addClass('ut-hide');
                    
                    show_hide_portfolio_slider_settings('hide');
                    
                    $.each(restricted_settings, function(index, value) {
                        
                        $('#setting_' + value).parent().addClass('ut-disabled-for-user');
                        
                    });
                    
                }
                
            };
            
            
            if( $('#ut_portfolio_link_type').val() === 'global' ) {
                
                portfolio_link_type =  $('#setting_ut_portfolio_link_type').data('detailstyle');
                
            } else {
            
                portfolio_link_type = $('#ut_portfolio_link_type').val();
            
            }
                        
            show_hide_portfolio_tabs( portfolio_link_type );
            
            $('#ut_portfolio_link_type').change(function() {
                    
                var _portfolio_link_type = '';
                
                if( $(this).val() === 'global' ) {
                
                    _portfolio_link_type =  $('#setting_ut_portfolio_link_type').data('detailstyle');
                    
                } else {
                
                    _portfolio_link_type = $(this).val();
                
                }
                
                show_hide_portfolio_tabs( _portfolio_link_type );
                
                if( _portfolio_link_type === 'internal' ) {
                    
                    $('.ut-hero-type a').text( $('.ut-hero-type').data('page') );
                    $('#setting_ut_page_hero_type .ut-panel-description').removeClass('ut-hide');
                    $('#setting_ut_page_hero_type .ut-single-option-title').text( $('.ut-hero-type').data('page') );
                    $('#setting_ut-hero-settings .ut-panel-title').text( $('.ut-hero-type').data('page') );
                    
                    /* switch name */
                    $("#ut_page_hero_type").each(function(){
                        
                        $(this).children("option").each(function() {
                            
                            if( $(this).data('orglabel') ) {
                                $(this).text( $(this).data('orglabel') );
                            }
                                
                        });
                     
                    });
                    
                    $('#ut_page_hero_type .select-option-animatedimage').removeClass('ut-hide');
                    $('#ut_page_hero_type .select-option-splithero').removeClass('ut-hide');
                    $('#ut_page_hero_type .select-option-transition').removeClass('ut-hide');
                    $('#ut_page_hero_type .select-option-tabs').removeClass('ut-hide');
                    $('#ut_page_hero_type .select-option-custom').removeClass('ut-hide');
                    $('#ut_page_hero_type .select-option-dynamic').removeClass('ut-hide');                    
                   
                    $('#ut_page_hero_type').trigger('change');
                    
                    
                } else {
                    
                    $('.ut-hero-type a').text( $('.ut-hero-type').data('portfolio') );
                    
                    $('#setting_ut_activate_page_hero').find('.ut-on').trigger('click');
                    
                    $('#setting_ut_page_hero_type .ut-panel-description').addClass('ut-hide');
                    $('#setting_ut_page_hero_type .ut-single-option-title').text( $('.ut-hero-type').data('portfolio') );
                    $('#setting_ut-hero-settings .ut-panel-title').text( $('.ut-hero-type').data('portfolio') );
                    
                    /* switch name */
                    $("#ut_page_hero_type").each(function(){
                        
                        $(this).children("option").each(function() {
                            
                            if( $(this).data('altlabel') ) {
                                $(this).text( $(this).data('altlabel') );
                            }
                                 
                        });
                     
                    });
                    
                    $('#ut_page_hero_type .select-option-animatedimage').addClass('ut-hide');
                    $('#ut_page_hero_type .select-option-splithero').addClass('ut-hide');
                    $('#ut_page_hero_type .select-option-transition').addClass('ut-hide');
                    $('#ut_page_hero_type .select-option-tabs').addClass('ut-hide');
                    $('#ut_page_hero_type .select-option-custom').addClass('ut-hide');
                    $('#ut_page_hero_type .select-option-dynamic').addClass('ut-hide');
                   
                    $('#ut_page_hero_type').trigger('change');                    
                                    
                }
                
            });
            
            $('#ut_portfolio_link_type').trigger('change');
            
        }
    
    });

})(jQuery);
 /* ]]> */  