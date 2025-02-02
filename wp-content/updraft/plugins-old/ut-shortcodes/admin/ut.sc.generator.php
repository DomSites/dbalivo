<?php

$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];

// Access to WordPress
require_once( $path_to_wp . '/wp-load.php' );
$themepath = get_template_directory_uri();

//get definitions
require_once( 'ut.sc.definitions.php' );
require_once( 'ut.sc.functions.php' );

$jqueryuiprefix =  ( get_bloginfo('version') < "4.1" ) ? 'jquery.ui.' : '';

?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<title><?php _e( 'Insert Shortcode' , 'ut_shortcodes' ); ?></title>

<link rel="stylesheet" href="<?php echo plugins_url( 'css/ut.style.css' , __FILE__ ); ?>" />
<link rel="stylesheet" href="<?php echo plugins_url( 'css/ut.chosen.css' , __FILE__ ); ?>" />
<link rel="stylesheet" href="<?php echo plugins_url( 'css/ut.jqueryui.css' , __FILE__ ); ?>" />

<link rel="stylesheet" href="'//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'" />
<link rel="stylesheet" href="<?php echo get_option('siteurl') ?>/wp-admin/css/color-picker.css" />

<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/jquery/jquery.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo plugins_url( 'js/ut.chosen.jquery.min.js' , __FILE__ ); ?>"></script>

<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/jquery/ui/<?php echo $jqueryuiprefix; ?>core.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/jquery/ui/<?php echo $jqueryuiprefix; ?>widget.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/jquery/ui/<?php echo $jqueryuiprefix; ?>effect.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/jquery/ui/<?php echo $jqueryuiprefix; ?>mouse.min.js"></script>


<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/jquery/ui/<?php echo $jqueryuiprefix; ?>accordion.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/jquery/ui/<?php echo $jqueryuiprefix; ?>draggable.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/jquery/ui/<?php echo $jqueryuiprefix; ?>slider.min.js"></script>

<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/jquery/jquery.ui.touch-punch.js"></script>

<script type='text/javascript'>
/* <![CDATA[ */
var wpColorPickerL10n = { "clear":"Clear" , "defaultString" : "Default" , "pick" : "Select Color" };
/* ]]> */
</script>

<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-admin/js/iris.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-admin/js/color-picker.min.js"></script>

<script type="text/javascript">
/* <![CDATA[ */
(function($){
	
	$('#TB_window').css('opacity',0);
	
    $(document).ready(function(){
		
		/*
		|--------------------------------------------------------------------------
		| Fix Ajax Content
		|--------------------------------------------------------------------------
		*/
		function calcTB_Pos() {
			$('#TB_window').css({
			   'height': ($('#TB_ajaxContent').outerHeight() + 30) + 'px',
			   'width': ( $('#TB_ajaxContent').outerWidth() ) + 'px',
			   'top' : (($(window).height() + $(window).scrollTop())/2 - (($('#TB_ajaxContent').outerHeight()-$(window).scrollTop()) + 30)/2) + 'px',
			   'opacity' : 1
			});
		}
		
		setTimeout(calcTB_Pos,10);
		setTimeout(calcTB_Pos,100);
		
		$(window).resize(calcTB_Pos);
		
        /* global timer */
        var timer;
		
		/*
		|--------------------------------------------------------------------------
		| Editor Functions
		|--------------------------------------------------------------------------
		*/
		
		/* get selected content */
		var editor = tinyMCE.activeEditor,
			content = editor.selection.getContent();
				
		
		/* set selected content */	
		$('#sc-content textarea').val( content );
		
		
		/* send shortcode back to wordpress */  
		$('#insert-shortcode').click(function(){
		   
			editor.selection.setContent( $('#shortcode-preview-o').text() + $('#shortcode-preview-m').text() + $('#shortcode-preview-c').text() );
			tb_remove();
			return false;
			
		});
	
		/*
		|--------------------------------------------------------------------------
		| Media Access
		|--------------------------------------------------------------------------
		*/
		
		var input = '',
			datagroup = '';
			
		$(document).on("click", ".ut-upload-button", function(event){ 

			event.preventDefault();
			
			input = '';
			datagroup = '';
			
			var button = $(this);
			input  = $(this).parent().find('input:text').first();
			datagroup = $(input).data('group');
			
			if ( typeof(ut_file_frame)!=="undefined" ) {
				
				ut_file_frame.on( "select", function() {
				
					var attachment = ut_file_frame.state().get("selection").first().toJSON();
					$(input).val(attachment.url);
							
					/* update preview */
					create_group_item( datagroup );
					preview_shortcode();
					
				});
				
				ut_file_frame.open();
				return;
			}
			
			ut_file_frame = null;

			// Create the media frame.
			ut_file_frame = wp.media.frames.customHeader = wp.media({
				title       : button.data( 'uploader_title' ),
				multiple    : false,
				library     : { type : button.data( 'limit_type' )},
				button      : { text : button.data( 'uploader_button_text' ) }
			});

			ut_file_frame.on( "select", function() {
				
				var attachment = ut_file_frame.state().get("selection").first().toJSON();
				$(input).val(attachment.url);
								
				/* update preview */
				create_group_item( datagroup );
				preview_shortcode();
				
				
			});
				
			ut_file_frame.open();
			return;
			
		});
		
        /*
		|--------------------------------------------------------------------------
		| Accordions
		|--------------------------------------------------------------------------
		*/
		$("#hightlight-left-manager-box").accordion({ heightStyle: "content" });
        $("#hightlight-right-manager-box").accordion({ heightStyle: "content" });
        
        
        
		/*
		|--------------------------------------------------------------------------
		| Icon Modal
		|--------------------------------------------------------------------------
		*/
		
		var iconbutton = '',
			iconinput  = '',
            icongroup  = '',
            nested     = false;
		
		$(document).on("click", ".open-ut-modal", function(event){ 
			
			event.preventDefault();
			
			iconbutton = $(this),
			iconinput  = $(this).siblings('input:text').first(),
			nested     = ( $(this).hasClass('sc-highlight-modal') ) ? true : false,
            icongroup  = $(this).data('group');

			$(".ut-modal").fadeIn();
			
		});
		
		
		$(document).on("click", ".close-ut-modal", function(event){ 
			
			event.preventDefault();
			
            icongroup  = '';
            nested     = '';
            
			$(".ut-modal").fadeOut();
			
		});
		
		$(document).on("click", ".ut-glyphicon", function(event){ 
			
			var icon = $(this).data('icon');
			
			$(iconinput).val(icon);
			$(".ut-modal").fadeOut();
			
            if( nested ) { 
                                
                create_group_item( icongroup );
            
            } else {

                /* update preview */
                preview_shortcode();
		    
            }
            
            icongroup  = '';
            nested     = '';
            
		});
		
		
		/*
		|--------------------------------------------------------------------------
		| Create Range Slider
		|--------------------------------------------------------------------------
		*/
		$( ".ut-range-slider" ).each(function() {
            
             $(this).slider({
                    
                min: $(this).data('min'),
                max: $(this).data('max'),
                step: $(this).data('step'),
                value: $(this).data('value'),
                slide: function( event, ui ) {
        
                    $(this).parent().find('.ut-hidden-range-input').val( ui.value );
                    $(this).parent().find('.ut-range-value').text( ui.value );
                    
                    /* update preview */
                    preview_shortcode();
                    
                }
            
            });
                
        });
        
        
        
		
		/*
		|--------------------------------------------------------------------------
		| Create Color Picker
		|--------------------------------------------------------------------------
		*/
		$('.ut-color-picker:not(".sc-highlight-color")').wpColorPicker({
			
			change: function(event, ui){
				
				$(this).val( ui.color.toString() );
				
				/* update preview */
				preview_shortcode();
				
			}
		
		});
        
        $('.sc-highlight-color').wpColorPicker({
			
			change: function(event, ui){
				
				$(this).val( ui.color.toString() );
				
				/* update preview */
				create_group_item( $(this).data('group') );
				
			}
		
		});
		
		
		/*
		|--------------------------------------------------------------------------
		| Shortcode Change Box
		|--------------------------------------------------------------------------
		*/
		
		/* create nice dropdown*/
		$("#ut-shortcodes").chosen();
		
		/* main change function */
		$( '#ut-shortcodes' ).change(function(){
			
			$( '.sc-options' ).hide();
			$( '#options-' + $(this).val() ).show();
			$( '.sc-settings' ).show();
			
			var datatype = $('#options-'+$(this).val()).attr('data-type');
			
			if( datatype == 'e' || datatype == 'c' ){
				
				$('#sc-content').show().find('textarea').val( content );
				
				if($(this).children('option:selected').attr('data-clabel')!='' ) {
					$('#clabel').html( $(this).children('option:selected').attr('data-clabel')+':' );
				} else {
					$('#clabel').html( 'Content:' );
				}
				
			} else {
				$('#sc-content textarea').val('').parent().hide();
			}
			
			/* update preview */
			preview_shortcode();
			
		});		
		
		
		/*
		|--------------------------------------------------------------------------
		| Button Group
		|--------------------------------------------------------------------------
		*/
		$(document).on("click", '.btn-group .btn', function(e){ 
        
			$(this).parent().find('.btn').removeClass('active');
			$(this).addClass('active');
			$(this).parent().find('input').val( $(this).data('value') );
			
		});
	
		
		/*
		|--------------------------------------------------------------------------
		| Shortcode : Progress Bars
		|--------------------------------------------------------------------------
		*/
		$(document).on("click", ".remove-bar-item", function(e){ 
		
			$(this).parent().remove();
			create_group_item( $(this).data('group') );
			return false;
			
		});
    
		$('.add-bar-item').click(function(e){
			
			e.preventDefault();
			
			// parent element
			group_parent  = $(this).parent();
			
			// item to copy        
			item_to_copy  = group_parent.find('.sc-to-copy').clone();
			
			// activate item
			group_parent.find('.sc-to-copy').removeClass('sc-to-copy');
			
			// search for last item
			fieldLocation = group_parent.find('.sc-bars:last');
			
			// create hidden copy
			item_to_copy.insertAfter( fieldLocation );
			
		});

		$(document).on("keyup", ".sc-bar-width, .sc-bar-text", function(e){ 
			
            create_group_item( $(this).data('group') );
            
		})
		
		$(document).on("input propertychange", ".sc-bar-width, .sc-bar-text", function(e){ 
			
            create_group_item( $(this).data('group') );
            
		})
		
		$(document).on("click", ".sc-bar-btn", function(e){ 
			
            create_group_item( $(this).data('group') );
            
		});
    	
        /*
		|--------------------------------------------------------------------------
		| Select or Radio Change Functions
		|--------------------------------------------------------------------------
		*/
	    $(document).on("change", ".sc-live-group-select", function(e){ 
            
            var status = $(this).find(':selected').val();
            
            if( status === 'on' ) {
                
                $(this).parent().parent('.live-group-select-parent').find('.live-group-select-children').show("slow");
            
            } else {
                
                $(this).parent().parent('.live-group-select-parent').find('.live-group-select-children').hide("slow");
            
            }
            
        });
        
		/*
		|--------------------------------------------------------------------------
		| Input, Select or Radio Change Functions
		|--------------------------------------------------------------------------
		*/
		        
		/* main textarea for shortcode content */
		$('#sc-content textarea').bind('keyup', function(){ 
            
            clearInterval(timer);            
            timer = setTimeout(function() {
            
                /* update preview */
                preview_shortcode();
                        
            }, 1000);
			
		}).bind('input propertychange', function(){ 
			
			clearInterval(timer);            
            timer = setTimeout(function() {
            
                /* update preview */
                preview_shortcode();
                        
            }, 1000);
			
		});
		
		/* delete group item */		
		$(document).on("click", ".remove-group-item", function(e){ 
        
			$(this).parent().remove();
			create_group_item( $(this).data('group') );
			return false;
			
		});
		
		
		$(document).on("keyup", ".propertychange", function(e){ 
			
            clearInterval(timer);
            var group = $(this).data('group');           
            
            timer = setTimeout(function() {
            
                create_group_item( group );
                        
            }, 1000);
            
		});
		
		$(document).on("input propertychange", ".propertychange", function(e){ 
			
            clearInterval(timer);
            var group = $(this).data('group');           
            
            timer = setTimeout(function() {
            
                create_group_item( group );
                        
            }, 1000);
            
		});
		
		$(document).on("change", ".sc-select-control:not('.sc-highlight-effect')", function(e){ 
            
			/* update preview */
			preview_shortcode();
		
		});
        
        $(document).on("change", ".sc-highlight-effect", function(e){ 
            
			/* update preview */
			create_group_item( $(this).data('group') );
		
		});
		
		$(document).on("change", ".sc-select-live", function(e){ 
                        
			/* update preview */
			create_group_item( $(this).data('group') );
		
		});
		
		$(document).on("keyup click", ".sc-options input.attr", function(e){ 
			
			/* update preview */
			preview_shortcode();
			
		}).bind('input propertychange', function(){ 
			
			/* update preview */
			preview_shortcode();
			
		});
		
		$(document).on("click", ".lastcolumn", function(e){ 
        
			if( $(this).is(':checked') ) {
				
				/* update preview */
				preview_shortcode( '_last' );
				
			} else {
				
				/* update preview */
				preview_shortcode();
				
			}
	
		});
		
		
		/*
		|--------------------------------------------------------------------------
		| Add Group Items
		|--------------------------------------------------------------------------
		*/
		
		/* tabs */
		$('.add-list-item').click(function(){
			
			$(this).prevAll('div').append( '<div class="sc-lister well-white"><div class="ut-option-field"><label>Title: </label></div><div class="ut-option-value"><input type="text" value="" name="" class="sc-list-item form-control propertychange" data-group="tabgroup"></div><div class="hr"></div><div class="ut-option-field"><label>Tab Content: </label></div><div class="ut-option-value"><textarea name="" type="text" class="sc-list-text form-control propertychange" data-group="tabgroup"></textarea></div><button class="btn btn-danger btn-xs remove-group-item" type="button" data-group="tabgroup"><i class="icon-trash"></i></button></div>' );
			return false;
			
		});
		
		/* toggles */
		$('.add-toggle-item').click(function(){
			
			$(this).prevAll('div').append( '<div class="sc-toggles well-white"><div class="ut-option-field"><label>Title: </label></div><div class="ut-option-value"><input type="text" value="" name="" class="sc-toggle-item form-control propertychange" data-group="togglegroup"></div><div class="hr"></div><div class="ut-option-field"><label>Content: </label></div><div class="ut-option-value"><textarea name="" type="text" class="sc-toggle-text form-control propertychange" data-group="togglegroup"></textarea></div><div class="ut-option-field"><label>State: </label></div><div class="ut-option-value"><select class="sc-social-icon" data-group="socialgroup"><option value="closed">closed</option><option value="open">open</option></select></div><button class="btn btn-danger btn-xs remove-group-item" type="button" data-group="togglegroup"><i class="fa fa-trash-o"></i></button></div>' );
			return false;
			
		});
		
		/* quotes */
		$('.add-quote-item').click(function(){
			
			$(this).prevAll('div').append( '<div class="sc-quotes well-white"><div class="ut-option-field"><label>Author: </label></div><div class="ut-option-value"><input type="text" value="" name="" class="sc-quote-item form-control quote-author propertychange" data-group="quotegroup"></div><div class="hr"></div><div class="ut-option-field"><label>Avatar: </label></div><div style="margin-bottom:10px;" class="ut-option-value ut-media-access"><input type="text" value="" class="sc-quote-item form-control quote-avatar propertychange" data-group="quotegroup"><a data-limit_type="" data-uploader_button_text="Insert" data-uploader_title="Site Files" class="ut-upload-button btn btn-primary btn-sm" href="#"><i class="icon-picture icon-white"></i> Add Avatar</a></div><div class="hr"></div><div class="ut-option-field"><label>Quote: </label></div><div class="ut-option-value"><textarea name="" type="text" class="sc-quote-text form-control propertychange" data-group="quotegroup"></textarea></div><button class="btn btn-danger btn-xs remove-group-item" type="button" data-group="quotegroup"><i class="icon-trash"></i></button></div>' );
			return false;
			
		});
		
		/* quotes alt */
		$('.add-quote-alt-item').click(function(){
			
			$(this).prevAll('div').append( '<div class="sc-quotes-alt well-white"><div class="ut-option-field"><label>Author: </label></div><div class="ut-option-value"><input type="text" value="" name="" class="sc-quote-alt-item form-control quote-alt-author propertychange" data-group="quote-alt-group"></div><div class="hr"></div><div class="ut-option-field"><label>Quote: </label></div><div class="ut-option-value"><textarea name="" type="text" class="sc-quote-alt-text form-control propertychange" data-group="quote-alt-group"></textarea></div><button class="btn btn-danger btn-xs remove-group-alt-item" type="button" data-group="quote-alt-group"><i class="fa fa-trash-o"></i></button></div>' );
			return false;
			
		});
		
		/* clients */
		$('.add-client-item').click(function(){
			
			$(this).prevAll('div').append( '<div class="sc-clients well-white"><div class="ut-option-field"><label>Client Name: </label></div><div class="ut-option-value"><input type="text" value="" name="" class="sc-client-item form-control client-name propertychange" data-group="clientgroup"></div><div class="ut-option-field"><label>Client URL: </label></div><div class="ut-option-value"><input type="text" value="" name="" class="sc-client-item form-control client-url propertychange" data-group="clientgroup"></div><div class="ut-option-field"><label>Logo: </label></div><div style="margin-bottom:10px;" class="ut-option-value ut-media-access"><input type="text" value="" class="sc-client-item form-control client-logo propertychange" data-group="clientgroup"><a data-limit_type="" data-uploader_button_text="Insert" data-uploader_title="Site Files" class="ut-upload-button btn btn-primary btn-sm" href="#"><i class="fa fa-picture fa-inverse"></i> Add Logo</a></div><button class="btn btn-danger btn-xs remove-group-item" type="button" data-group="clientgroup"><i class="fa fa-trash-o"></i></button></div>' );
			return false;
			
		});
        
        /* irotator */
		$('.add-irotator-item').click(function(){
			
			$(this).prevAll('div').append( '<div class="sc-irotator well-white"><div class="ut-option-field"><label>Link: </label></div><div class="ut-option-value"><input type="text" value="" name="" class="sc-irotator-item form-control irotator-url propertychange" data-group="irotatorgroup" kl_virtual_keyboard_secure_input="on"></div><div class="ut-option-field"><label>Upload Image: </label></div><div style="margin-bottom:10px;" class="ut-option-value ut-media-access"><input type="text" value="" class="sc-irotator-item form-control irotator-logo propertychange" data-group="irotatorgroup" kl_virtual_keyboard_secure_input="on"><a data-limit_type="" data-uploader_button_text="Insert" data-uploader_title="Site Files" class="ut-upload-button btn btn-primary btn-sm" href="#"><i class="fa fa-picture fa-inverse"></i> Add Image</a></div><button class="btn btn-danger btn-xs remove-group-item" type="button" data-group="irotatorgroup"><i class="fa fa-trash-o"></i></button></div>' );
			return false;
			
		});
		
		/* social icons */
		$('.add-social-item').click(function(){
			
			$(this).prevAll('div').append( '<div class="sc-socials well-white"><div class="ut-option-field"><label>Profile Title: </label></div><div class="ut-option-value"><input type="text" value="" name="" class="sc-social-title form-control propertychange" data-group="socialgroup"></div><div class="hr"></div><div class="ut-option-field"><label>Link to Profile: </label></div><div class="ut-option-value"><input type="text" value="" name="" class="sc-social-link form-control propertychange" data-group="socialgroup"></div><div class="hr"></div><div class="ut-option-field"><label>Icon: </label></div><div class="ut-option-value"><select class="sc-social-icon" data-group="socialgroup"><option value="fa-adn">adn</option><option value="fa-android">android</option><option value="fa-apple">apple</option><option value="fa-bitbucket">bitbucket</option><option value="fa-bitcoin">bitcoin</option><option value="fa-btc">btc</option><option value="fa-css3">css3</option><option value="fa-dribbble">dribbble</option><option value="fa-dropbox">dropbox</option><option value="fa-facebook">facebook</option><option value="fa-flickr">flickr</option><option value="fa-foursquare">foursquare</option><option value="fa-github">github</option><option value="fa-gittip">gittip</option><option value="fa-google-plus">google-plus</option><option value="fa-html5">html5</option><option value="fa-instagram">instagram</option><option value="fa-linkedin">linkedin</option><option value="fa-linux">linux</option><option value="fa-maxcdn">maxcdn</option><option value="fa-pinterest">pinterest</option><option value="fa-renren">renren</option><option value="fa-skype">skype</option><option value="fa-stack-exchange">stackexchange</option><option value="fa-trello">trello</option><option value="fa-tumblr">tumblr</option><option value="fa-twitter">twitter</option><option value="fa-vk">vk</option><option value="fa-weibo">weibo</option><option value="fa-windows">windows</option><option value="fa-xing">xing</option><option value="fa-youtube">youtube</option></select></div><div class="hr"></div><div class="ut-option-field"><label>Content: </label></div><div class="ut-option-value"><textarea name="" type="text" class="sc-social-text form-control propertychange" data-group="socialgroup"></textarea></div><button class="btn btn-danger btn-xs remove-group-item" type="button" data-group="socialgroup"><i class="fa fa-trash-o"></i></button></div>' );
		    return false;
			
		});
        
        /* video testimonials */        
        $('.add-videotest-item').click(function(){
            $(this).prevAll('div').append('<div class="sc-testvids well-white"><div class="ut-option-field"><label>Author: </label></div><div class="ut-option-value"><input data-group="videotestgroup" class="sc-vidtest-item video-author form-control propertychange" name="" value="" type="text"></div><div class="hr"></div><div class="ut-option-field"><label>Company: </label></div><div class="ut-option-value"><input data-group="videotestgroup" class="sc-vidtest-item video-company form-control propertychange" name="" value="" type="text"></div><div class="hr"></div><div class="ut-option-field"><label>Poster Image: </label></div><div class="ut-option-value ut-media-access" style="margin-bottom:10px;"><input data-group="videotestgroup" class="sc-vidtest-item form-control video-poster propertychange" value="" type="text"><a href="#" class="ut-upload-button btn btn-primary btn-sm" data-uploader_title="Site Files" data-uploader_button_text="Insert" data-limit_type=""><i class="fa fa-picture fa-inverse"></i> Add Poster Image</a></div><div class="hr"></div><div class="ut-option-field"><label>Video Source: </label></div><div class="ut-option-value"><input data-group="videotestgroup" class="sc-vidtest-item video-source form-control propertychange" name="" value="" type="text"><span class="description">You can insert one of these video sources:</span><br><ol><li><span class="description"><a target="_blank" href="http://codex.wordpress.org/Video_Shortcode">WordPress Video Shortcode</a></span></li><li><span class="description"><a target="_blank" href="http://codex.wordpress.org/Embeds">WordPress Embeds</a><br> like : http://www.youtube.com/watch?v=dQw4w9WgXcQ</span></li></ol></div><div class="hr"></div><div class="live-group-select-parent"><div class="ut-option-field"><label>Activate Boxed Layout?: </label></div><div class="ut-option-value"><select data-group="videotestgroup" class="video-box-state sc-live-group-select sc-select-live"><option value="off">no, thanks!</option><option value="on">yes, please!</option></select></div><div class="clear"></div><div style="display: block;" class="live-group-select-children"><div class="ut-option-field"><label>Choose Style: </label></div><div class="ut-option-value"><select data-group="videotestgroup" class="video-box-style sc-select-live"><option data-for="" value="dark">Dark</option><option data-for="" value="light">Light</option></select></div><div class="clear"></div></div></div><div class="hr"></div><div class="ut-option-field"><label>Animation Effect: </label></div><div class="ut-option-value"><select data-group="videotestgroup" class="video-box-effect sc-select-live"><option value="">Choose Animation Effect</option><option value="fadeIn">fadeIn</option><option value="slideInRight">slideInRight</option><option value="slideInLeft">slideInLeft</option></select></div><div class="hr"></div></div>');
            return false;
        });
	
    	/*
		|--------------------------------------------------------------------------
		| Process Group Item
		|--------------------------------------------------------------------------
		*/
		function create_group_item( groupname ){
		   
			var code = '';
			var tabid = '1';
			
			if('tabgroup' == groupname ) {
				
				$('.sc-list-item').each(function(){
				   if( $(this).val() != '' ) {
						
						var tabcontent = $(this).parent().parent().find('.sc-list-text').val();
						
						code += ' [ut_tab title="' + $(this).val() + '" id="t' + tabid + '"] '+ tabcontent + ' [/ut_tab] '; 
						tabid++;
					}
				});
				
			}
			
			if('quotegroup' == groupname ) {
				
				$('.sc-quotes').each(function(){
				   
				   var	author 		 = $(this).find('.quote-author').val(),
						avatar 		 = $(this).find('.quote-avatar').val(),
						quotecontent = $(this).find('.sc-quote-text').val();
	
						code += ' [ut_quote author="' + author + '" avatar="' + avatar + '"] ' + quotecontent + ' [/ut_quote] '; 
										   
				});
				
			}
			
			if('quote-alt-group' == groupname ) {
				
				$('.sc-quotes-alt').each(function(){
				   
				   var	author 		 = $(this).find('.quote-alt-author').val(),
						quotecontent = $(this).find('.sc-quote-alt-text').val();
	
						code += ' [ut_quote_alt author="' + author + '"] ' + quotecontent + ' [/ut_quote_alt] '; 
										   
				});
				
			}
			
			if('clientgroup' == groupname ) {
				
				$('.sc-clients').each(function(){
				   
				   var	client 		 = $(this).find('.client-name').val(),
				   		url 		 = $(this).find('.client-url').val(),
						logo 		 = $(this).find('.client-logo').val();
	
						code += ' [ut_client url="' + url + '" name="' + client + '" logo="' + logo + '"][/ut_client] '; 
										   
				});
				
			}
            
            if('irotatorgroup' == groupname ) {
				
				$('.sc-irotator').each(function(){
				   
				   var	url 		 = $(this).find('.irotator-url').val(),
						logo 		 = $(this).find('.irotator-image').val();
	
						code += ' [ut_irotator url="' + url + '" image="' + logo + '"][/ut_irotator] '; 
										   
				});
				
			}
			
			if('socialgroup' == groupname ) {
				
				$('.sc-socials').each(function(){
				   
				   var	title		  = $(this).find('.sc-social-title').val(),
				   		url 		  = $(this).find('.sc-social-link').val(),
						icon 		  = $(this).find('.sc-social-icon').val(),
						socialcontent = $(this).find('.sc-social-text').val();
	
						code += ' [ut_social title="' + title + '" url="' + url + '" icon="' + icon + '"] ' + socialcontent + ' [/ut_social] '; 
										   
				});
				
			}
			
			if('togglegroup' == groupname ) {
				
				$('.sc-toggle-item').each(function(){
				   if( $(this).val() != '' ) {
						
						var togglecontent = $(this).parent().parent().find('.sc-toggle-text').val(),
							togglestate   = $(this).parent().parent().find('.sc-toggle-state').val();
						
						code += ' [ut_toggle title="'+$(this).val()+'" state="'+togglestate+'"] '+ togglecontent +' [/ut_toggle] '; 
						
				   }
				});
				
			}
            
            if('highlightgroup' == groupname ) {				
                
				$('.sc-highlight-item').each(function(){
				   
                   if( $(this).val() != '' || $(this).parent().parent().find('.sc-highlight-text').val() != '' ) {
						
						var highlightcontent = $(this).parent().parent().find('.sc-highlight-text').val(),
                            highlighticon    = $(this).parent().parent().find('.sc-highlight-icon').val(),                            
                            highlightcolor   = $(this).parent().parent().find('.sc-highlight-color').val(),
                            highlighteffect  = $(this).parent().parent().find('.sc-highlight-effect').val(),
                            highlightalign   = $(this).data('align');
						
                        if( highlightalign == 'left' ) {						
                            
                            code += ' [ut_highlight_left title="'+$(this).val()+'" ' + ( ( highlighteffect != "" ) ? 'effect="'+highlighteffect+'"' : '' ) + ' ' + ( ( highlighticon != "" ) ? 'icon="'+highlighticon+'"' : '' ) + ' ' + ( ( highlightcolor != "" ) ? 'color="'+highlightcolor+'"' : '' ) + '] '+ highlightcontent +' [/ut_highlight_left] '; 
                            
                        } else {
                           
                            code += ' [ut_highlight_right title="'+$(this).val()+'" ' + ( ( highlighteffect != "" ) ? 'effect="'+highlighteffect+'"' : '' ) + ' ' + ( ( highlighticon != "" ) ? 'icon="'+highlighticon+'"' : '' ) + ' ' + ( ( highlightcolor != "" ) ? 'color="'+highlightcolor+'"' : '' ) + '] '+ highlightcontent +' [/ut_highlight_right] ';  
                            
                        }
						
				   }
                   
				});
				
			}
			
			if('probars' == groupname ) {
				
				$('.sc-bar-width').each(function(){
				   
				   $this = $(this);
				   
				   if( $this.val() != '' ) {
						
						var bartext    = $this.parent().parent('.sc-bars').find('.sc-bar-text').val();                    
						var barstyle   = $this.parent().parent('.sc-bars').find('.sc-bar-style').val();
											
						code += ' [bar width="'+$this.val()+'" style="' + barstyle + '"] ' +bartext+ ' [/bar] '; 
						
				   }
				   
				});
				
			}
			
            if('videotestgroup' == groupname ) {
                
                $('.sc-testvids').each(function(){
                    
                    $this = $(this);
                    
                    var vidtest_author    = $this.find('.video-author').val(),
                        vidtest_company   = $this.find('.video-company').val(),
                        vidtest_poster    = $this.find('.video-poster').val(),
                        vidtest_source    = $this.find('.video-source').val(),
                        vidtest_box       = $this.find('.video-box-state').val(),
                        vidtest_box_style = $this.find('.video-box-style').val(),
                        vidtest_box_effect= $this.find('.video-box-effect').val();                        
                    
                    code += '[ut_video_testimonial ' + ( ( vidtest_box_effect != "" ) ? 'effect="'+vidtest_box_effect+'"' : '' ) + ' ' + ( ( vidtest_poster != "" ) ? 'poster="'+vidtest_poster+'"' : '' ) + ' ' + ( ( vidtest_box === "on" ) ? 'box="'+vidtest_box+'"' : '' ) + ' ' + ( ( vidtest_box === "on" && vidtest_box_style != "" ) ? 'style="'+vidtest_box_style+'"' : '' ) + ' ' + ( ( vidtest_author != "" ) ? 'author="'+vidtest_author+'"' : '' ) + ' ' + ( ( vidtest_company != "" ) ? 'company="'+vidtest_company+'"' : '' ) + ']' + vidtest_source + '[/ut_video_testimonial]';
                    
                        
                });                
            
            }
            
			$('#shortcode-preview-m').html( code );
			
		}
    
		
		
		/*
		|--------------------------------------------------------------------------
		| Shortcode Preview
		|--------------------------------------------------------------------------
		*/
		function preview_shortcode( add ){
		
			name = $('#ut-shortcodes').val();
			add  = add||'';        
			if(( name=='num' || name=='h' ) && add=='') add='1';
	
			var code = ' ['+name;
			if( $('#options-'+name).attr('data-type')=='c' ){
				if( $('#options-'+name+' input.lastcolumn').is(':checked') )
				add = '_last';
			}
			code += add;
			
			$('#options-'+name+' input.attr').not('.sc-highlight-color , .sc-highlight-icon').each(function(){				
                
				$this = $(this);
	
				switch( $this.attr('type') ){
				
				case 'text':
					if( $this.val() )
					code += ' '+$this.attr('data-attrname')+'="'+$this.val()+'"';
					break;
					
				case 'radio':
				case 'checkbox':
					if( $this.is(':checked') )
					code += ' '+$this.attr('data-attrname')+'="'+$this.parent().data("value")+'"';
					break;
				}
				
			});
			
			$('#options-'+name+' select.sc-select-control').not('.sc-highlight-effect').each(function(){
				
				$this = $(this);
				
				if( $this.val() ) {
					code += ' '+$this.attr('data-attrname')+'="'+$this.val()+'"';
				}
				
			});
			
			code += '] ';
	
			datatype = $('#options-'+name).attr('data-type');
			
			if( datatype=='s' ){
				$('#shortcode-preview-m').html( '' );
			} else {
				if( datatype!='m' )
				$('#shortcode-preview-m').text(  $('#sc-content textarea').val() );
			}
			
			$('#shortcode-preview-o').html( code );
			
			if( $('#options-'+name).attr('data-type') != 's' ) {
				$('#shortcode-preview-c').html( ' [/'+name+add+'] ' );
			} else {
				$('#shortcode-preview-c').html( '' );
			}
		}		
    
	});

})(jQuery);
 /* ]]> */	
</script>



</head>
    <body>
    
        <div id="ut-scgenerator-dialog" class="ut-admin">
        	
            <header>
                <h2><span><?php _e('Shortcode Generator', 'ut_shortcodes' ); ?></span></h2>
            </header>
            
			<?php echo ut_generate_sc_select(); ?>
            <?php echo ut_generate_sc_box(); ?>
            
            <div class="shortcode-content">
				
                <h4 class="sc-clabel" id="clabel" for="sc-content"><?php _e('Content' , 'ut_shortcodes'); ?></h4>
                
                <div id="sc-content" class="well">
                
                    <textarea class="form-control"></textarea>
                	                    
                </div>
                
				<h4 class="sc-preview"><?php _e('Shortcode Preview:', 'ut_shortcodes' ); ?></h4>
                
				<div class="well">
                
                    <code class="shortcode_prev">
                        <span id="shortcode-preview-o" style=""><?php _e('Select a Shortcode above' , 'ut_shortcodes' ); ?></span>
                        <span id="shortcode-preview-m"></span>
                        <span id="shortcode-preview-c" style=""></span>
                    </code>
                
                </div>
                
            </div>
            
            <p><a class="btn btn-primary btn-sm btn-block" id="insert-shortcode"><?php _e('Insert Shortcode', 'ut_shortcodes' ); ?></a></p>
            
        </div>
    	
        <div class="ut-modal">
        	<div class="ut-modal-box ut-admin">
            	
                <div class="ut-modal-header">
                	<div class="inner">
                    	<h2><?php _e( 'Choose Icon' , 'ut_shortcodes' ); ?></h2>
                    </div>
                </div>
                
                <div class="ut-modal-body">
                	<div class="inner">
                        <ul class="ut-glyphicons">
                        
                        <?php foreach( ut_recognized_icons() as $key => $icon) {
                                                
                            $icondisplay = ($icon == 'icon-noicon') ? 'no icon' : '<i class="fa '.$icon.'"></i>';
                            
                            echo '<li><span data-icon="'.$icon.'" class="ut-glyphicon">'.$icondisplay.'</span></li>';
                        
                        } ?>
                        
                        </ul>
                    </div>
                </div>
                
                <div class="ut-modal-footer">
                	<div class="inner">
                    	<a href="#" class="close-ut-modal"><?php _e( 'Close' , 'ut_shortcodes' ); ?></a>
                    </div>
                </div>
                
            </div>
        </div>
        
    </body>
</html>