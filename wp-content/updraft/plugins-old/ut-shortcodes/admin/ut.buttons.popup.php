<?php

$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];

// Access to WordPress
require_once( $path_to_wp . '/wp-load.php' );

?>

<!DOCTYPE html>
<html lang="en-US">
<head>
<title><?php _e( 'Insert Button' , 'ut_shortcodes' ); ?></title>

<link rel="stylesheet" href="<?php echo plugins_url( 'css/ut.style.css' , __FILE__ ); ?>" />
<link rel="stylesheet" href="'//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'" />

<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/jquery/jquery.js"></script>


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
			   'top' : (($(window).height() + $(window).scrollTop())/2 - (($('#TB_ajaxContent').outerHeight()-$(window).scrollTop()) + 30)/2) + 'px',
			   'opacity' : 1
			});
		}
		
		setTimeout(calcTB_Pos,10);
		setTimeout(calcTB_Pos,100);
		
		$(window).resize(calcTB_Pos);
		
		/* get selected content */
		var editor = tinyMCE.activeEditor,
			content = editor.selection.getContent();
		
		/* send shortcode back to wordpress */  
		$('.ut-insert-button').click(function(event){
			var url    = jQuery('#ut-button-dialog input#button-url').val(),
				text   = jQuery('#ut-button-dialog input#button-text').val(),
                title  = jQuery('#ut-button-dialog input#button-title').val(),
				color  = jQuery('#ut-button-dialog select#button-color').val(),	
				target = jQuery('#ut-button-dialog select#button-target').val(),
				size   = jQuery('#ut-button-dialog select#button-size').val(),
				shape  = jQuery('#ut-button-dialog select#button-shape').val(),
				bclass = jQuery('#ut-button-dialog input#button-class').val(),
				output = '';
			
			
			// setup the output of our shortcode
			output = ' [ut_button ';
			output += 'color="' + color + '" ';
			output += 'target="' + target + '" ';
				
				// only insert if the url field is not blank
				if(url)
					output += ' link="' + url + '" ';
				
				// only insert if the url field is not blank
				if(bclass)
					output += ' class="' + bclass + '" ';
				
				// only insert if the size field is not blank
				if(size)
					output += ' size="' + size + '" ';
				
				// only insert if the shape field is not blank
				if(shape)
					output += ' shape="' + shape + '" ';
				
                // only insert if the title field is not blank
				if(title)
					output += ' title="' + title + '" ';
                
				// check to see if the TEXT field is blank
				if(text) {	
					output += ']'+ text + '[/ut_button] ';
				}
                
				
			// if it is blank, use the selected text, if present
			else {
				output += ']' + content + '[/ut_button] ';
			}
			
			
			editor.selection.setContent( output );
			tb_remove();
			
		});
	
	});

})(jQuery);
 /* ]]> */	
</script>

</head>
<body>

	<div id="ut-button-dialog" class="ut-admin">
    	
        <header>
            <h2><span><?php _e('Button Generator', 'ut_shortcodes' ); ?></span></h2>
        </header>
        
        <div class="well">
        
        <form role="form" method="get" accept-charset="utf-8" action="/">
          	
            <div class="ut-option-field">
            	<label for="button-url" class="col-lg-2 control-label"><?php _e('URL', 'ut_shortcodes' ); ?></label>
            </div>
            <div class="ut-option-value">
            	<input type="text" class="form-control input-sm" id="button-url" placeholder="http://www.unitedthemes.com">
          	</div>
            
            <div class="ut-option-field">
            	<label for="button-text" class="col-lg-2 control-label"><?php _e('Text', 'ut_shortcodes' ); ?></label>
            </div>
            <div class="ut-option-value">
            	<input type="text" class="form-control input-sm" id="button-text" placeholder="Text">
          	</div>
            
            <div class="ut-option-field">
            	<label for="button-title" class="col-lg-2 control-label"><?php _e('Title', 'ut_shortcodes' ); ?></label>
            </div>
            <div class="ut-option-value">
            	<input type="text" class="form-control input-sm" id="button-title" placeholder="Title">
          	</div>
            
            <div class="ut-option-field">
            	<label for="button-target" class="col-lg-2 control-label"><?php _e('Target', 'ut_shortcodes' ); ?></label>
            </div>
            <div class="ut-option-value">
            <select class="form-control input-sm" name="button-target"  id="button-target">
          		<option value="_self"><?php _e('Self', 'ut_shortcodes' ); ?></option>
                <option value="_blank"><?php _e('Blank', 'ut_shortcodes' ); ?></option>
            </select>
            </div>
          
          	<div class="ut-option-field">
            	<label for="button-size" class="col-lg-2 control-label"><?php _e('Size', 'ut_shortcodes' ); ?></label>
            </div>
            <div class="ut-option-value">
            <select class="form-control input-sm" name="button-size"  id="button-size">
          		<option value="small"><?php _e('Small', 'ut_shortcodes' ); ?></option>
                <option value="medium"><?php _e('Medium', 'ut_shortcodes' ); ?></option>
                <option value="large"><?php _e('Large', 'ut_shortcodes' ); ?></option>  
            </select>
            </div>
          	
            <div class="ut-option-field">
            	<label for="button-shape" class="col-lg-2 control-label"><?php _e('Shape', 'ut_shortcodes' ); ?></label>
            </div>
            <div class="ut-option-value">
            <select class="form-control input-sm" name="button-shape"  id="button-shape">
          		<option value=""><?php _e('Normal', 'ut_shortcodes' ); ?></option>
                <option value="round"><?php _e('Round', 'ut_shortcodes' ); ?></option>
            </select>
          	</div>
            
          	<div class="ut-option-field">
            	<label for="button-color" class="col-lg-2 control-label"><?php _e('Color', 'ut_shortcodes' ); ?></label>
            </div>
            <div class="ut-option-value">
            <select class="form-control input-sm" name="button-color"  id="button-color">
          		<option value="red"><?php _e('Red', 'ut_shortcodes' ); ?></option>
                <option value="turquoise"><?php _e('Turquoise', 'ut_shortcodes' ); ?></option>
                <option value="green"><?php _e('Green', 'ut_shortcodes' ); ?></option>
                <option value="blue"><?php _e('Blue', 'ut_shortcodes' ); ?></option>
                <option value="mid-blue"><?php _e('Mid Blue', 'ut_shortcodes' ); ?></option>
                <option value="yellow"><?php _e('Yellow', 'ut_shortcodes' ); ?></option>
                <option value="purple"><?php _e('Purple', 'ut_shortcodes' ); ?></option>
                <option value="grey"><?php _e('Grey', 'ut_shortcodes' ); ?></option>
                <option value="orange"><?php _e('Orange', 'ut_shortcodes' ); ?></option>
                <option value="theme-btn"><?php _e('Theme Button', 'ut_shortcodes' ); ?></option>
                <option value="dark"><?php _e('Dark', 'ut_shortcodes' ); ?></option>      
            </select>
          	</div>
            
          	<div class="ut-option-field">
            	<label for="button-class" class="col-lg-2 control-label"><?php _e('Class (optional)', 'ut_shortcodes' ); ?></label>
            </div>
            <div class="ut-option-value">
            	<input type="text" class="form-control input-sm" id="button-class" placeholder="Text">
          	</div>
            
            <div class="clear"></div>
           
        </form>
        
        </div>
        
        <a class="btn btn-primary btn-sm btn-block ut-insert-button" href="#"><?php _e('Insert Button', 'ut_shortcodes' ); ?></a>
        
		</div>
     	
</body>
</html>