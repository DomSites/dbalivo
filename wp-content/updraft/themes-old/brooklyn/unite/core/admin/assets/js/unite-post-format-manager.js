/* <![CDATA[ */
(function($){
	
	"use strict";
	
    $(document).ready(function(){
    
        /* move panel above editor */
        $('<div class="post-format-holder"></div>').insertBefore('#titlediv').append( $('#ut-post-format-manager') );
        
        /* move options into panel */
        $('.post_format_audio').append( $('#_format_audio_embed') );
        $('.post_format_video').append( $('#_format_video_embed') );
        $('.post_format_link').append( $('#_format_link_url') );
        
        
        $('.post_format_quote .quote').append( $('#_format_quote') );
        $('.post_format_quote .name').append( $('#_format_quote_source_name') );
        $('.post_format_quote .url').append( $('#_format_quote_source_url') );
        
        
        
        
        /*remove initial panel */
        $('#ut-post-formats').remove();
        $('#ut_post_format_settings').remove();
        
        $.each($("input[name='post_format']:checked"), function() {
		    
            $('#ut-post-format-' + $(this).val()).show();
            $('.ut-post-format-state-' + $(this).val() ).addClass('active');
            
    	});
        
        $(document).on("change", "input[name='post_format']", function(e){ 
		    
            $('.ut-post-format-box').hide();
            $('#ut-post-format-' + $(this).val()).show();
            
            $('.ut-post-format-options a').removeClass('active');
            $('.ut-post-format-state-' + $(this).val() ).addClass('active');
            
	    });
        
        $(document).on("click", ".ut-post-format-options a", function(e){ 
            
            e.preventDefault();
            
            var postformat = $(this).data("ut-format");
            
            // change wp default post format radio
            $('#post-format-' + postformat).attr("checked", true);
            
            // hide all post format boxes
            $('.ut-post-format-box').hide();
            
            // show selected post format box
            $('#ut-post-format-' + postformat).show();
            
            // change button state
            $('.ut-post-format-options a').removeClass('active');
            $(this).addClass('active');            
        
        });
    
    });
        
})(jQuery);
 /* ]]> */     