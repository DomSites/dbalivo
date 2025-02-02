/* <![CDATA[ */
(function($){
	
	"use strict";
		
    $(document).ready(function(){
		
        var confirmed = false;
        
        $('.ut-choose-demo-img').click( function(){
            
            $('*[data-for="' + $(this).attr('for') + '"]').trigger('click');
            
        });
        
        
        $('.ut-run-importer').click( function(e){
            
            $('#'+ $(this).data('for') ).trigger('click');
                        
            if( importer_notices.imported === "true" ) {
            
                modal({
                    type: 'warning',
                    title: 'Demo already installed!',
                    size: 'large',
                    text: importer_notices.imported_message,
                    buttons: [
                        {   
                            text: 'Download Plugin', 
                            val: 'ok',
                            eKey: true,
                            addClass: 'ut-ui-button-yellow',
                            onClick: function(dialog) {
                                window.location = "http://wordpress.org/plugins/wordpress-database-reset/"; 
                                return true;
                            }
                        }                   
                                                              
                    ],
                });
                
                e.preventDefault();
                return; 
            
            }    
            
        });
        
		$(".ut-import-demo-form").submit(function(e){
			
            var $form = $(this);
            
            if( !confirmed ) {
                
                modal({
                    type: 'confirm',
                    title: 'Import ' + $form.data('demo'),
                    text: 'Are you sure? The import of <span class="ut-modal-highlight">' + $form.data('demo')  + '</span> will start immediately.',
                    buttons: [
                        {
                            addClass: 'ut-ui-button-health'
                        },
                        {
                            addClass: 'ut-ui-button-blue'
                        }
                    ],
                    callback: function(result) {
                        
                        if( result ) {
                            
                            confirmed = true;
                            
                            $('#ut-demo-importer-overlay').fadeIn(400,function(){
                                
                                $form.submit();
                                
                            });
                            
                            
                        }
                        
                    }
                });
                
                e.preventDefault();
                return;
                
            } else {
                
                /* final submit here */    
            
            }
						
		});
        
        
        if( importer_notices.error.length && importer_notices.missing_plugins === "true" && importer_notices.missing_perm === "true" ) {
            
            modal({
                type: 'error',
                title: 'Ohhh something is missing!',
                size: 'large',
                closable: false,
                text: importer_notices.error,
                buttons: [
                    {
                        
                        text: 'Check Permissions', 
                        val: 'ok',
                        eKey: true,
                        addClass: 'ut-ui-button-demo',
                        onClick: function(dialog) {
                            window.location = "https://codex.wordpress.org/Changing_File_Permissions#Using_an_FTP_Client"; 
                            return true;
                        }
                        
                    },
                    {
                        
                        text: 'Install Plugins', 
                        val: 'ok',
                        eKey: true,
                        addClass: 'ut-ui-button-health',
                        onClick: function(dialog) {
                            window.location = importer_notices.dashboard; 
                            return true;
                        }
                        
                    }                   
                                                          
                ],
            }); 
        
        }
                        
        if( importer_notices.error.length && importer_notices.missing_plugins === "true" && importer_notices.missing_perm === "false" ) {
            
            modal({
                type: 'error',
                title: 'Ohhh something is missing!',
                size: 'large',
                closable: false,
                text: importer_notices.error,
                buttons: [
                    {
                        
                        text: 'Install Plugins', 
                        val: 'ok',
                        eKey: true,
                        addClass: 'ut-ui-button-health',
                        onClick: function(dialog) {
                            window.location = importer_notices.dashboard; 
                            return true;
                        }
                        
                    }                   
                                                          
                ],
            }); 
        
        }
        
        if( importer_notices.error.length && importer_notices.missing_plugins === "false" && importer_notices.missing_perm === "true" ) {
        
            modal({
                type: 'error',
                title: 'Ohhh something is missing!',
                size: 'large',
                closable: false,
                text: importer_notices.error,
                buttons: [
                    {
                        
                        text: 'Got it!', 
                        val: 'ok',
                        eKey: true,
                        addClass: 'ut-ui-button-health',
                        onClick: function(dialog) {
                            window.location = "https://codex.wordpress.org/Changing_File_Permissions#Using_an_FTP_Client"; 
                            return true;
                        }
                        
                    }                   
                                                          
                ],
            }); 
        
        }
         
        /* importer was successful */
        if( importer_notices.status === 'true' ) {
        
            modal({
                type: 'info',
                title: 'Import successful!',
                text: 'Congratulations! Enjoy using your Brooklyn powered Website!',
                buttons: [
                    {
                        
                        text: 'Visit Site!', 
                        val: 'ok',
                        eKey: true,
                        addClass: 'ut-ui-button-green',
                        onClick: function(dialog) {
                            
                            var win = window.open(importer_notices.frontpage, '_blank');
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
        
        }       
        
		
	});

})(jQuery);
 /* ]]> */	