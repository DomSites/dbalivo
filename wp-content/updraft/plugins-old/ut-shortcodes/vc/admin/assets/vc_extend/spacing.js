/* <![CDATA[ */
!(function($){
	
	"use strict";
	
    $(document).ready(function(){
        
        function assign_ut_css_editor() {
            
            if( $('#ut-css-editor').val() ) {
                
                var attributes = $('#ut-css-editor').val().split(';');
                
                for( var i = 0; i < attributes.length; i++ ) {
                    
                    var single_attribute = attributes[i].split(':');
                    var field_value      = single_attribute[1];
                    
                    if( single_attribute[1].indexOf('px') === -1 ) {
                        field_value = field_value + 'px';
                    }
                    
                    $('.ut-css-editor-field[name="' + single_attribute[0].replace('-','_') + '"]').val( field_value );
                
                }
            
            }
        
        }       
        
        assign_ut_css_editor();
        
        function update_ut_css_editor() {
        
            var css = $('.ut-css-editor-field').map(function() { 
                
                if( this.value !== '' ) {
                    
                    if( this.value.indexOf('px') !== -1 ) {
                        
                        return $(this).data('attribute') + ':' + this.value; 
                        
                    }
                    
                    return $(this).data('attribute') + ':' + this.value + 'px';                     
                        
                }
            
            }).get().join(';');
            
            $('#ut-css-editor').val( css );
        
        }
        
        $(document).on('keyup', '.ut-css-editor-field', function() {
            
            update_ut_css_editor();
            
        });
        
        $(document).on('change', '.ut-css-editor-field', function() {
            
            update_ut_css_editor();
            
        });
                          
        
    });    
        
})(window.jQuery);
 /* ]]> */	