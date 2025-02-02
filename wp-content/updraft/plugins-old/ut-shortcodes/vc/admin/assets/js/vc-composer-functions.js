/* <![CDATA[ */
(function($){
	
	"use strict";
	
    $(document).ready(function(){
        
        /* 
         * Force People to add Section in top level
         */

        $(document).on('click', '#vc_no-content-add-element, #vc_not-empty-add-element', function(event) {

            var $modal = $('#vc_ui-panel-add-element');

            $modal.find('ul.vc_ui-tabs-line').children('.vc_edit-form-tab-control').not('.ut-structual, .ut-all').each(function() {

                $(this).hide();

            });

            $modal.find('.wpb-layout-element-button').each(function() {

                if( $(this).data('element') !== 'vc_section' && $(this).data('element') !== 'ut_split_section' && $(this).data('element') !== 'ut_custom_section' ) {

                    $(this).addClass('vc_inappropriate');

                }                        

            });

            event.preventDefault();

        });
        
         
    });
        
})(jQuery);
 /* ]]> */	