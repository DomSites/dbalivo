/* <![CDATA[ */
(function ($) {

    "use strict";
        
    $(document).ready(function(){
          
               
        /*
        |--------------------------------------------------------------------------
        | Hide complete tabs depending on hero type 
        |--------------------------------------------------------------------------
        */                
        if(!section_settings_active) {
            
            if( !limit_settings ) {
                
                if($("#ut_page_hero_type").val()==='slider'||$("#ut_page_hero_type").val()==='transition'||$("#ut_page_hero_type").val()==='custom'){
                    $(".ut-hero-settings").hide();
                    $("#ut-hero-settings").hide();            
                    if($("#ut_page_hero_type").val()==='custom'){
                        $(".ut-hero-styling").hide();
                        $("#ut-hero-styling").hide();
                    }            
                    $("#ut-panel-tabs").tabs("refresh");            
                
                } else {            
                    $(".ut-hero-settings").show();
                    $("#ut-hero-settings").show();
                    $(".ut-hero-styling").show();
                    $("#ut-hero-styling").show();            
                    $("#ut-panel-tabs").tabs("refresh");        
                }
            
            }
            
        }
        $("#ut_page_hero_type").change(function(){            
            
            if( !limit_settings ) {
            
                if(!section_settings_active) {
                    if($(this).val()==='slider'||$(this).val()==='transition'||$(this).val()==='custom'){
                        $(".ut-hero-settings").hide();
                        $("#ut-hero-settings").hide();                
                        if($(this).val()==='custom'){
                            $(".ut-hero-styling").hide();
                            $("#ut-hero-styling").hide();
                        }                
                    } else {
                        $(".ut-hero-settings").show();
                        $("#ut-hero-settings").show();
                        $(".ut-hero-styling").show();
                        $("#ut-hero-styling").show();
                    }
                    $("#ut-panel-tabs").tabs("refresh");
                }
            
            }
            
        });
        
        
        
        
        
        
    });

})(jQuery);
 /* ]]> */    