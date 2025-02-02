/* <![CDATA[ */
!(function($){
	
	"use strict";
	
    $(document).ready(function(){
        
        $('.ut-range-slider').each(function() {
            
            $(this).slider({
                range: "max",
                min: $(this).data('min'),
                max: $(this).data('max'),
                step: $(this).data('step'),
                value: $(this).data('value'),
                slide: function( event, ui ) {
                    
                    $(this).parent().find('.wpb-textinput').val( ui.value );
                    $(this).parent().find('.ut-range-value').text( ui.value );
                    
                }
            });
            
        });
        
    });
        
})(window.jQuery);
 /* ]]> */	