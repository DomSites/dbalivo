/* <![CDATA[ */
(function ($) {

    "use strict";
        
    $(document).ready(function(){

        /* remove post formats visually and reset them - since Version 2.6 */        
        if( ut_meta_panel_vars.post_type === "portfolio" ) {
            
            /* reset post format - we do not need it anymore */
            $('#post-format-0').attr('checked' , 'checked');
            
            /* disable options */
            $('#setting_ut_section_header_align').addClass('ut-disabled-for-user');            
            
        }
        
    });
    
})(jQuery);
/* ]]> */     