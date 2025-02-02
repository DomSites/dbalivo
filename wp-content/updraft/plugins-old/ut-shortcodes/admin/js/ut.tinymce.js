// JavaScript Document
(function() {
    
   
    tinymce.create('tinymce.plugins.uttiny', {
        
        init : function( ed, url ) {
        
		
		ed.addCommand('ut_icons', function() {
				
				tb_show("United Themes Button Generator", url + '/../ut.icons.popup.php?width=600&height=560');
				
		}),   
		
		ed.addCommand('ut_buttons', function() {				
				
				tb_show("United Themes Button Generator", url + '/../ut.buttons.popup.php?width=600&height=580');
	
		}),
		     
        ed.addCommand('ut_scgenerator', function() {
                
				tb_show("United Themes Shortcodes", url + '/../ut.sc.generator.php?width=560&height=600');
            
        });
             
    // Register buttons
    ed.addButton('ut_scgenerator', {title : 'Add Custom Shortcode', cmd : 'ut_scgenerator', image : url + '/../img/ut.scgenerator.png' });
	ed.addButton('ut_icons' , {title : 'Add Custom Icon', cmd : 'ut_icons', image : url + '/../img/ut.icons.png' });
	ed.addButton('ut_buttons' , {title : 'Add Custom Button', cmd : 'ut_buttons', image : url + '/../img/ut.buttons.png' });

    },
    
    createControl : function(n, cm) {
              return null;
    },
    
    getInfo : function() {
            return {
                longname : 'UT TinyMCE',
                author : 'Matthias Nettekoven Marcel Moerkens - United Themes',
                authorurl : 'http://unitedthemes.com',
                infourl : 'http://unitedthemes.com',
                version : tinymce.majorVersion + "." + tinymce.minorVersion
            };
        }
    });
    
    tinymce.PluginManager.add('ut_buttons', tinymce.plugins.uttiny);
    
})();