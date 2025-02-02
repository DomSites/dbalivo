<?php

//Split path to locate wordpress root!
$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];

// Access to WordPress
require_once( $path_to_wp . '/wp-load.php' );
$themepath = get_template_directory_uri();

$jqueryuiprefix =  ( get_bloginfo('version') < "4.1" ) ? 'jquery.ui.' : '';

?>

<!DOCTYPE html>
<html lang="en-US">
    
    <head>
    <title><?php _e('Icon Generator', 'ut_shortcodes' ); ?></title>
        
        <link rel="stylesheet" href="<?php echo plugins_url( 'css/ut.style.css' , __FILE__ ); ?>" />
        <link rel="stylesheet" href="'//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'" />
        <link rel="stylesheet" href="<?php echo get_option('siteurl') ?>/wp-admin/css/color-picker.css" />
                
        <script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/jquery/jquery.js"></script>
		<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/jquery/ui/<?php echo $jqueryuiprefix; ?>core.min.js"></script>
		<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/jquery/ui/<?php echo $jqueryuiprefix; ?>widget.min.js"></script>
        
        <script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/jquery/ui/<?php echo $jqueryuiprefix; ?>mouse.min.js"></script>
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
				
				
				/*
				|--------------------------------------------------------------------------
				| First Preview
				|--------------------------------------------------------------------------
				*/
				var editor = tinyMCE.activeEditor;

				preview_shortcode();
				
				/*
				|--------------------------------------------------------------------------
				| Preview Modal
				|--------------------------------------------------------------------------
				*/
								
				$(document).on("click", ".ut-view-icon", function(event){ 
					
					event.preventDefault();
					$(".ut-preview-modal").fadeIn();
					
				});
				
				
				$(document).on("click", ".ut-close-view-icon", function(event){ 
					
					event.preventDefault();					
					$(".ut-preview-modal").fadeOut();
					
				});
				
				/*
				|--------------------------------------------------------------------------
				| Icon Modal
				|--------------------------------------------------------------------------
				*/
				
				var iconbutton = '',
					iconinput  = '';
				
				$(document).on("click", ".open-ut-modal", function(event){ 
					
					event.preventDefault();
					
					iconbutton = $(this),
					iconinput  = $(this).siblings('input:text').first();
					
					$(".ut-modal").fadeIn();
					
				});
				
				
				$(document).on("click", ".close-ut-modal", function(event){ 
					
					event.preventDefault();
					
					$(".ut-modal").fadeOut();
					
				});
				
				$(document).on("click", ".ut-glyphicon", function(event){ 
					
					var icon = $(this).data('icon');
					
					$(iconinput).val(icon);
					$(".ut-modal").fadeOut();
					
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
				| Create Color Picker
				|--------------------------------------------------------------------------
				*/
				$('.ic-color').wpColorPicker({
					
					change: function(event, ui){
						
						$('#icon-color').val( ui.color.toString() );
						
						/* icon color update */
						$('#preview-icon').css({ 'color' : ui.color.toString() });
						
						/* update preview */
						preview_shortcode();
						
					}
				
				});
				
				$('.ic-bg-color').wpColorPicker({
					
					change: function(event, ui){
						
						$('#icon-bg-color').val( ui.color.toString() );
						
						/* icon color update */
						$('#preview-bg-icon').css({ 'color' : ui.color.toString() });
						
						/* update preview */
						preview_shortcode();
						
					}
				
				});
				
		
				/*
				|--------------------------------------------------------------------------
				| Live Click Functions
				|--------------------------------------------------------------------------
				*/	

				$('.ic-btn-type').click( function(e){
					
					$('#icon-type').attr('value' , $(this).data('icon') );
					preview_shortcode();
									
				});
					
				$('.ic-btn-size').click( function(e){
					
					$('#icon-size').attr('value' , $(this).data('size') );
					preview_shortcode();
									
				});
					
				$('.ic-btn-border').click( function(e){
					
					$('#icon-border').attr('value' , $(this).data('border') );
					preview_shortcode();
									
				});
				
				$('.ic-btn-spin').click( function(e){
					
					$('#icon-spin').attr('value' , $(this).data('spin') );
					preview_shortcode();
					
				});
                    
				$('.ic-btn-rotate').click( function(e){
					
					$('#icon-rotate').attr('value' , $(this).data('rotate') );
					preview_shortcode();
									
				});
                    
				$('.ic-btn-target').click( function(e){
					
					$('#icon-target').attr('value' , $(this).data('target') );
					preview_shortcode();
									
				});
                    
				$(document).on("keyup", ".ic-class, .ic-link", function(e){ 

					preview_shortcode();
					
				});
				
				$(document).on("input propertychange", ".ic-class, .ic-link", function(e){ 
					
					preview_shortcode();
					
				});
                    
				$('.ic-btn-align').click( function(e){
					
					$('#icon-align').attr('value' , $(this).data('align') );
					preview_shortcode();
									
				});
					
				function preview_shortcode(){
					
					var icon 	=  $('#icon-type').val(),
						size 	=  $('#icon-size').val(),
						border 	=  $('#icon-border').val(),
						spin 	=  $('#icon-spin').val(),
						rotate 	=  $('#icon-rotate').val(),
						target 	=  $('#icon-target').val(),
						ilink 	=  $('.ic-link').val(),
						iclass 	=  $('#icon-class').val(),
						align 	=  $('#icon-align').val(),
						color	=  $('#icon-color').val(),
						bgcolor	=  $('#icon-bg-color').val(),
						$code	=  $('.ic-preview code');
										
					if( border === 'none' || !border ) {
						
						$markup =  $('<i id="preview-icon" class="fa"></i>');
						
					} else {
						
						$markup 	 = $('<span id="preview" class="fa-stack"></span>').addClass( size + ' ' + align );
						$icon_bottom = $('<i class="fa fa-circle fa-stack-2x"></i>').css({'color': bgcolor});
						$icon_top 	 = $('<i class="fa fa-flag fa-stack-1x"></i>').addClass( icon + ' ' + spin + ' ' + rotate ).css({'color': color});
						
					}
					
					// clear old icon and create blank icon
					$('.ic-preview .ic-prev').html('').append( $markup );
					
					// add Class to Object
					if( border === 'none' || !border ) {
					
						$markup.addClass( icon + ' ' + size + ' ' + border + ' ' + spin + ' ' + rotate + ' ' + align ).css({'color': color});
					
					} else {
						
						$markup.append( $icon_bottom );
						$markup.append( $icon_top );
										
					}
					
					// create shortcode
					newcode = '[ut_icon icon="' + icon + '"';
					
					if(size)
						newcode += ' size="' + size + '"';
					
					if(border)
						newcode += ' border="' + border + '"';
					
					if(spin)
						newcode += ' spin="' + spin + '"';
					
					if(rotate)
						newcode += ' rotate="' + rotate + '"';
					
					if(ilink)
						newcode += ' link="' + ilink + '"';
						
					if(target)
						newcode += ' target="' + target + '"';
					
					if(iclass)
						newcode += ' class="' + iclass + '"';
					
					if(align)
						newcode += ' align="' + align + '"';        
					
					if(color)
						newcode += ' color="' + color + '"';
						
					if(bgcolor)
						newcode += ' bgcolor="' + bgcolor + '"';	
					
					newcode += ']';
					
					//refresh shortcode code
					$code.html('').html( newcode );
					
				
				}		
				
				/* send shortcode back to wordpress */  
				$('.ut-insert-icon').click(function(){
				   
					editor.selection.setContent( newcode );
					tb_remove();
					return false;
					
				});
				
					
        		});

			})(jQuery);
			
		</script>
        
    </head>
    
    <body>
    
    <form role="form">
    
    <div id="ic-manager" class="ut-admin">
    	
        <header>
            <h2><span><?php _e('Icon Generator', 'ut_shortcodes' ); ?></span></h2>
        </header>
    	
		<h4 class="sc-clabel">
			<?php _e('Main Settings' , 'ut_shortcodes'); ?>
        	<a class="btn btn-success btn-sm ut-view-icon" href="#"><?php _e( 'Preview', 'ut_shortcodes' ); ?></a>
        </h4>

    	<div class="shortcode-content well">
    		
            <div class="ut-option-field">
            	<label for="icon-type"><?php _e('Choose Icon', 'ut_shortcodes' ); ?></label>
            </div>
			<div class="ut-option-value">
                <input id="icon-type" style="margin-bottom:10px !important;" class="form-control" type="text" value="fa-adjust" />
				<a href="#" class="btn btn-primary btn-sm open-ut-modal"> <?php _e('Choose Icon' , 'ut_shortcodes'); ?> </a>
			</div>
            
            <div class="hr"></div>
            
            <div class="ut-option-field">
            	<label><?php _e('Size:', 'ut_shortcodes' ); ?></label>
 			</div>
            
            <div class="ut-option-value">
            	
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-primary btn-sm ic-btn-size" data-size="fa-lg">
                    <input type="radio" name="ic-btn-size" id="ic-btn-size-1"> <?php _e('large', 'ut_shortcodes' ); ?>
                    </label>
                    <label class="btn btn-primary btn-sm ic-btn-size" data-size="fa-2x">
                    <input type="radio" name="ic-btn-size" id="ic-btn-size-2"> <?php _e('2x', 'ut_shortcodes' ); ?>
                    </label>
                    <label class="btn btn-primary btn-sm ic-btn-size" data-size="fa-3x">
                    <input type="radio" name="ic-btn-size" id="ic-btn-size-3"> <?php _e('3x', 'ut_shortcodes' ); ?>
                    </label>
                    <label class="btn btn-primary btn-sm ic-btn-size" data-size="fa-4x">
                    <input type="radio" name="ic-btn-size" id="ic-btn-size-4"> <?php _e('4x', 'ut_shortcodes' ); ?>
                    </label>
                    <label class="btn btn-primary btn-sm ic-btn-size" data-size="fa-5x">
                    <input type="radio" name="ic-btn-size" id="ic-btn-size-5"> <?php _e('5x', 'ut_shortcodes' ); ?>
                    </label>
               </div>
            
            </div>
            
            <div class="hr"></div>
            
            <div class="ut-option-field">
            	<label><?php _e('Spin:', 'ut_shortcodes' ); ?></label>
            </div> 
            
            <div class="ut-option-value">
                      	
                <div class="btn-group" data-toggle="buttons">
                    
                  <label class="btn btn-primary btn-sm ic-btn-spin" data-spin="fa-spin">
                    <input type="radio" name="ic-btn-spin" id="ic-btn-spin-1"> <?php _e('on', 'ut_shortcodes' ); ?>
                  </label>
                  
                  <label class="btn btn-primary btn-sm ic-btn-spin" data-spin="">
                    <input type="radio" name="ic-btn-spin" id="ic-btn-spin-2"> <?php _e('off', 'ut_shortcodes' ); ?>
                  </label>
                
                </div>
            
            </div>
            
            <div class="hr"></div>
            
            <div class="ut-option-field">
            	<label><?php _e('Background Shape:', 'ut_shortcodes' ); ?></label>
            </div>
            
            <div class="ut-option-value">
                            
                <div class="btn-group" data-toggle="buttons" >
                    
                    
                    <label class="btn btn-primary btn-sm ic-btn-border" data-border="none">
                        <input type="radio" name="ic-btn-border" id="ic-btn-border-1"> <?php _e('none', 'ut_shortcodes' ); ?>
                    </label>
                    
                    <label class="btn btn-primary btn-sm ic-btn-border" data-border="circle">
                        <input type="radio" name="ic-btn-border" id="ic-btn-border-1"> <?php _e('cirle', 'ut_shortcodes' ); ?>
                    </label>
                      
                    <label class="btn btn-primary btn-sm ic-btn-border" data-border="square">
                        <input type="radio" name="ic-btn-border" id="ic-btn-border-2"> <?php _e('square', 'ut_shortcodes' ); ?>
                    </label>
                     
                     
                </div>
            
            </div>
            
            <div class="hr"></div>
            
            <div class="ut-option-field">
            	<label><?php _e('Color:', 'ut_shortcodes' ); ?></label>
            </div>            
            
            <div class="ut-option-value"> 
                                  
                <input id="icon-color" type="text" name="ic-color" class="ic-color form-control input-sm" value=""/>
                
            </div>
            
            <div class="hr"></div>
            
            <div class="ut-option-field">
            	<label><?php _e('Background Color:', 'ut_shortcodes' ); ?></label>
            </div>            
            
            <div class="ut-option-value"> 
                                  
                <input id="icon-bg-color" type="text" name="ic-bg-color" class="ic-bg-color form-control input-sm" value=""/>
                <p><?php _e('only available for icons with backgroundshape', 'ut_shortcodes' ); ?></p>
                
            </div>            
            
            <div class="hr"></div>
            
            <div class="ut-option-field">
            	<label><?php _e('Rotate:', 'ut_shortcodes' ); ?></label>
            </div>
            
            <div class="ut-option-value">
             
            	<div class="btn-group" data-toggle="buttons" style="padding-top:5px">  
                                
                    <label class="btn btn-primary btn-xs ic-btn-rotate" data-rotate="">
                        <input type="radio" name="ic-btn-rotate" id="ic-btn-rotate-1"> <?php _e('normal', 'ut_shortcodes' ); ?>
                    </label>
                    <label class="btn btn-primary btn-xs ic-btn-rotate" data-rotate="fa-rotate-90">
                        <input type="radio" name="ic-btn-rotate" id="ic-btn-rotate-2"> <?php _e('90 &deg;', 'ut_shortcodes' ); ?>
                    </label>
                    <label class="btn btn-primary btn-xs ic-btn-rotate" data-rotate="fa-rotate-180">
                        <input type="radio" name="ic-btn-rotate" id="ic-btn-rotate-3"> <?php _e('180 &deg;', 'ut_shortcodes' ); ?>
                    </label>
                    <label class="btn btn-primary btn-xs ic-btn-rotate" data-rotate="fa-rotate-270">
                        <input type="radio" name="ic-btn-rotate" id="ic-btn-rotate-4"> <?php _e('270 &deg;', 'ut_shortcodes' ); ?>
                    </label>
                    <label class="btn btn-primary btn-xs ic-btn-rotate" data-rotate="fa-flip-horizontal">
                        <input type="radio" name="ic-btn-rotate" id="ic-btn-rotate-5"> <?php _e('Flip H.', 'ut_shortcodes' ); ?>
                    </label>
                    <label class="btn btn-primary btn-xs ic-btn-rotate" data-rotate="fa-flip-vertical">
                        <input type="radio" name="ic-btn-rotate" id="ic-btn-rotate-6"> <?php _e('Flip V.', 'ut_shortcodes' ); ?>
                    </label>
    
          		</div>
                
            </div>
            
            <div class="clear"></div>
    
    	</div>
    	
        
        <h4 class="sc-clabel">
			<?php _e('Links , Classes & Alignment', 'ut_shortcodes' ); ?>
            <a class="btn btn-success btn-sm ut-view-icon" href="#"><?php _e( 'Preview', 'ut_shortcodes' ); ?></a>
        </h4>
        
        <div class="shortcode-content well">
        	
            <div class="ut-option-field">
            	<label><?php _e('Link:', 'ut_shortcodes' ); ?></label>
            </div>
            
            <div class="ut-option-value">
            	<input type="text" class="ic-link form-control" value=""/>
            </div>
            
            <div class="hr"></div>
            
            <div class="ut-option-field">
            	<label><?php _e('Target:', 'ut_shortcodes' ); ?></label>
            </div>
            
            <div class="ut-option-value">                           
                <div class="btn-group" data-toggle="buttons">   
                    
                    <label class="btn btn-primary btn-sm ic-btn-target" data-target="self">
                        <input type="radio" name="ic-btn-target" id="ic-btn-target-1"> <?php _e('self', 'ut_shortcodes' ); ?>
                    </label>
                    
                    <label class="btn btn-primary btn-sm ic-btn-target" data-target="blank">
                        <input type="radio" name="ic-btn-target" id="ic-btn-target-2"> <?php _e('blank', 'ut_shortcodes' ); ?>
                    </label>
                    
                </div>
            </div>
            
            <div class="hr"></div>
            
            <div class="ut-option-field">
            	<label><?php _e('Class:', 'ut_shortcodes' ); ?></label>
            </div> 
            
            <div class="ut-option-value">                                       
            	<input type="text" id="icon-class" name="ic-class" class="ic-class form-control input-sm" value=""/>
            </div>
            
            <div class="hr"></div>
            
            <div class="ut-option-field">
            	<label><?php _e('Align:', 'ut_shortcodes' ); ?></label>
            </div>
            	
            <div class="ut-option-value">
            
            	<div class="btn-group" data-toggle="buttons" >   
                                          	
                    <label class="btn btn-primary btn-sm ic-btn-align" data-align="alignnone">
                        <input type="radio" name="ic-btn-align" id="ic-btn-align-1"> <?php _e('none', 'ut_shortcodes' ); ?>
                    </label>  
                    
                    <label class="btn btn-primary btn-sm ic-btn-align" data-align="alignleft">
                        <input type="radio" name="ic-btn-align" id="ic-btn-align-1"> <?php _e('left', 'ut_shortcodes' ); ?>
                    </label>
                    
                    <label class="btn btn-primary btn-sm ic-btn-align" data-align="alignright">
                        <input type="radio" name="ic-btn-align" id="ic-btn-align-1"> <?php _e('right', 'ut_shortcodes' ); ?>
                    </label>  
                    
                </div>
                
           </div> 
            
           <div class="clear"></div>
            
        </div>
        
        <div class="ut-preview-modal">
        
    		<h4 class="sc-clabel"><?php _e('Preview', 'ut_shortcodes' ); ?></h4>
    	
            <div class="ic-preview well">
                
                <div class="ic-prev">
                
                </div>
                
                This is an example text. The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words. 
                The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words.
                                    
                <code style="margin-top:40px;">
                
                </code>
                                
            </div><!-- end preview -->
        	
            <p style="padding-left:20px;">
            	<a class="btn btn-success btn-sm ut-close-view-icon" href="#"><?php _e( 'Edit Icon', 'ut_shortcodes' ); ?></a>
                <a class="btn btn-primary btn-sm ut-insert-icon" href="#"><?php _e( 'Insert Icon now', 'ut_shortcodes' ); ?></a>
            </p>
            
        </div>
        
        <p><a class="btn btn-primary btn-sm btn-block ut-insert-icon" href="#"><?php _e( 'Insert Icon', 'ut_shortcodes' ); ?></a></p>
        
        <div class="clear"></div>
 
    </div><!-- end ic-manager -->
        
    <input type="hidden" id="icon-size" value="fa-2x" />
    <input type="hidden" id="icon-border" value="" />
    <input type="hidden" id="icon-spin" value="" />
    <input type="hidden" id="icon-rotate" value="" />
    <input type="hidden" id="icon-target" value="" />
    <input type="hidden" id="icon-align" value="alignnone" />
        
    </form>    
    
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