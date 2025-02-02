/* <![CDATA[ */
(function($){
	
	"use strict";
	
    $(document).ready(function(){
        
        function trimChars(str, char){
            
            var str = str.trim();
        
            var checkCharCount = function(side) {
                var inner_str = (side == "left")? str : str.split("").reverse().join(""),
                    count = 0;
        
                for (var i = 0, len = inner_str.length; i < len; i++) {
                    if (inner_str[i] !== char) {
                        break;
                    }
                    count++;
                }
                return (side == "left")? count : (-count - 1);
            };
        
            if (typeof char === "string" && str.indexOf(char) === 0 && str.lastIndexOf(char, -1) === 0) {
                str = str.slice(checkCharCount("left"), checkCharCount("right")).trim();
            }
        
            return str;
        }
        
        function ut_create_slug( title ) {
            
            var slug = '';
            
            /* remove special characters */
            slug = title.replace(/[^a-zA-Z ]/g, '');
            
            /* remove numbers */
            slug = slug.replace(/[0-9]/g, '');
            
            /* remove whitespaces */
            slug = slug.trim();
            slug = slug.replace(/\s/g, String.fromCharCode(45) );
            
            /* make lowercase */
            slug = slug.toLowerCase();        
            
            /* remove last dash if necessary */
            return trimChars( slug, String.fromCharCode(45) );
            
        }
        
        $(document).on('keyup', '.ut-section-anchor-input', function() {
           
           $(this).siblings('code').find('.ut-url').text( ut_meta_panel_vars.permalink );
           $(this).siblings('code').find('.ut-section-id').text( '#section-' + ut_create_slug( $(this).val() ) );
           
        });
        
        $('.ut-section-anchor-input').each(function() {
            
            $(this).siblings('code').find('.ut-url').text( ut_meta_panel_vars.permalink );
            $(this).siblings('code').find('.ut-section-id').text( '#section-' + ut_create_slug( $(this).val() ) );
        
        });
        
        var processing_request = false;
        
        $(document).on( 'click', '.ut-add-anchor-section', function( event ) {
            
            if( processing_request ) {
                return;
            }
            
            processing_request = true;
            
            event.stopImmediatePropagation();
            event.preventDefault();
            
            var section_name = $(this).siblings('.ut-section-anchor-input').val(),
                section_url  = ut_meta_panel_vars.permalink + '#section-' + ut_create_slug( section_name );            
            
            if( !section_name ) {
                
            } else {
            
                $.ajax({
                    type: 'POST',
                    url: ajaxurl,
                    data: {
                        "action" : "save_section_anchor",
                        "title"  : section_name,
                        "url"    : section_url
                    },
                    success: function( response ) {
                        
                        if( response === "item_added" ) {
                        
                            modal({
                                type: 'info',
                                title: 'Successfully added to menu!',
                                text: 'Menu Item has been successfully added. You can now optionally re order your menu.',
                                buttons: [
                                    {
                                        
                                        text: 'Manage Menu now!', 
                                        val: 'ok',
                                        eKey: true,
                                        addClass: 'ut-ui-button-green',
                                        onClick: function() {
                                            
                                            var win = window.open(ut_meta_panel_vars.navmenu, '_blank');
                                            win.focus();
                                            return true;
                                            
                                        }
                                        
                                    }, 
                                    {
                                        text: 'OK',
                                        addClass: 'ut-ui-button-blue'
                                    }
                                ]
                            });   
                        
                        } else if( response === "error" ) {
                            
                            modal({
                                type: 'error',
                                title: 'An error occured',
                                size: 'large',
                                text: 'Please try again!'                               
                            }); 
                        
                        } else if( response === 'no_menu' ) {
                            
                            modal({
                                type: 'error',
                                title: 'Ohhh something is missing!',
                                size: 'large',
                                text: 'You havent created a primary menu yet!',
                                buttons: [
                                    {
                                        
                                        text: 'Got it!', 
                                        val: 'ok',
                                        eKey: true,
                                        addClass: 'ut-ui-button-health',
                                        onClick: function(dialog) {
                                            
                                            var win = window.open(ut_meta_panel_vars.navmenu, '_blank');
                                            win.focus(); 
                                            return true;
                                            
                                        }
                                        
                                    }                   
                                                                          
                                ],
                            }); 
                        
                        }
                        
                        processing_request = false;
                         
                    },
                    error: function() {
                        
                        modal({
                            type: 'error',
                            title: 'An error occured',
                            size: 'large',
                            text: 'Please try again!'                               
                        }); 
                        
                        processing_request = false;
                        
                    }
                
                });
            
            }
        
        });
        
    });
        
})(jQuery);
 /* ]]> */