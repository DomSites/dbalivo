<?php

global $ut_shortcodes;

/*
|--------------------------------------------------------------------------
| Column Layouts
|--------------------------------------------------------------------------
*/

$ut_shortcodes['headline_1'] = array(
    'type'  =>  's',
    'title' =>  __('Column Shortcodes', 'ut_shortcodes' )
);

/* sixth */
$ut_shortcodes['ut_one_sixth'] = array( 
    'type'  =>  'c',
    'title' =>  __('One Sixth Column', 'ut_shortcodes' ),
    'attr'  => array( 
        
        'class' =>  array(
            'type'  =>  'input' ,
            'title' =>  __('Optional Class','ut_shortcodes')
         ),
         
         'last' =>  array(
            'type'  => 'custom', 
            'title' => __('Last Column','ut_shortcodes')
         ),
         
         'effect'  => array(
            'type'  =>  'effect',
            'title' => __('Optional Animation Effect','ut_shortcodes')
         ),
         'animate_once' =>  array(
            'type'  =>  'select',
            'title' =>  __('Animate Once' , 'ut_shortcodes'),
            'values'=> array( 'no' , 'yes' )
         ),
    )
);

/* fifth */
$ut_shortcodes['ut_one_fifth'] = array( 
    'type'  =>  'c',
    'title' =>  __('One Fifth Column', 'ut_shortcodes' ),
    'attr'  => array( 
        
        'class' =>  array(
            'type'  =>  'input' ,
            'title' =>  __('Optional Class','ut_shortcodes')
         ),
         
         'last' =>  array(
            'type'  => 'custom', 
            'title' => __('Last Column','ut_shortcodes')
         ),
         
         'effect'  => array(
            'type'  =>  'effect',
            'title' => __('Optional Animation Effect','ut_shortcodes')
         ),
         'animate_once' =>  array(
            'type'  =>  'select',
            'title' =>  __('Animate Once' , 'ut_shortcodes'),
            'values'=> array( 'no' , 'yes' )
         ),         
    )
);

/* thirds */
$ut_shortcodes['ut_one_third'] = array( 
    'type'  =>  'c',
    'title' =>  __('One Third Column', 'ut_shortcodes' ),
    'attr'  => array( 
        
        'class' =>  array(
            'type'  =>  'input' ,
            'title' =>  __('Optional Class','ut_shortcodes')
         ),
         
         'last' =>  array(
            'type'  => 'custom', 
            'title' => __('Last Column','ut_shortcodes')
         ),
         
         'effect'  => array(
            'type'  =>  'effect',
            'title' => __('Optional Animation Effect','ut_shortcodes')
         ),
         'animate_once' =>  array(
            'type'  =>  'select',
            'title' =>  __('Animate Once' , 'ut_shortcodes'),
            'values'=> array( 'no' , 'yes' )
         ),         
    )
);

$ut_shortcodes['ut_two_thirds'] = array( 
    'type'  =>  'c',
    'title' =>  __('Two Thirds Column', 'ut_shortcodes' ),
    'attr'  => array( 
        
        'class' =>  array(
            'type'  =>  'input' ,
            'title' =>  __('Optional Class','ut_shortcodes')
         ),
         
         'last' =>  array(
            'type'  => 'custom', 
            'title' => __('Last Column','ut_shortcodes')
         ),
         
         'effect'  => array(
            'type'  =>  'effect',
            'title' => __('Optional Animation Effect','ut_shortcodes')
         ),
         'animate_once' =>  array(
            'type'  =>  'select',
            'title' =>  __('Animate Once' , 'ut_shortcodes'),
            'values'=> array( 'no' , 'yes' )
         ),         
    )
);                                    

/* half */
$ut_shortcodes['ut_one_half'] = array( 
    'type'  =>  'c',
    'title' =>  __('One Half Column', 'ut_shortcodes' ),
    'attr'  => array( 
        
        'class' =>  array(
            'type'  =>  'input' ,
            'title' =>  __('Optional Class','ut_shortcodes')
         ),
         
         'last' =>  array(
            'type'  => 'custom', 
            'title' => __('Last Column','ut_shortcodes')
         ),
         
         'effect'  => array(
            'type'  =>  'effect',
            'title' => __('Optional Animation Effect','ut_shortcodes')
         ),
         'animate_once' =>  array(
            'type'  =>  'select',
            'title' =>  __('Animate Once' , 'ut_shortcodes'),
            'values'=> array( 'no' , 'yes' )
         ),         
    )
);

/* fourth */  
$ut_shortcodes['ut_one_fourth'] = array( 
    'type'  =>  'c',
    'title' =>  __('One Fourth Column', 'ut_shortcodes' ),
    'attr'  => array( 
        
        'class' =>  array(
            'type'  =>  'input' ,
            'title' =>  __('Optional Class','ut_shortcodes')
         ),
         
         'last' =>  array(
            'type'  => 'custom', 
            'title' => __('Last Column','ut_shortcodes')
         ),
         
         'effect'  => array(
            'type'  =>  'effect',
            'title' => __('Optional Animation Effect','ut_shortcodes')
         ),
         'animate_once' =>  array(
            'type'  =>  'select',
            'title' =>  __('Animate Once' , 'ut_shortcodes'),
            'values'=> array( 'no' , 'yes' )
         ),         
    )
);  

$ut_shortcodes['ut_three_fourths'] = array( 
    'type'  =>  'c',
    'title' =>  __('Three Fourths Column', 'ut_shortcodes' ),
    'attr'  => array( 
        
        'class' =>  array(
            'type'  =>  'input' ,
            'title' =>  __('Optional Class','ut_shortcodes')
         ),
         
         'last' =>  array(
            'type'  => 'custom', 
            'title' => __('Last Column','ut_shortcodes')
         ),
         
         'effect'  => array(
            'type'  =>  'effect',
            'title' => __('Optional Animation Effect','ut_shortcodes')
         ),
         'animate_once' =>  array(
            'type'  =>  'select',
            'title' =>  __('Animate Once' , 'ut_shortcodes'),
            'values'=> array( 'no' , 'yes' )
         ),         
    )
);

$ut_shortcodes['ut_spacer'] = array( 
    'type'  =>  's',
    'title' =>  __('Spacer', 'ut_shortcodes' ),
    'attr'  => array( 
        'margin_top' =>  array(
            'type'  =>  'input' ,
            'title' =>  __('Margin Top','ut_shortcodes'),
            'desc'  =>  __('value in px , eg "20" (optional)' , 'ut_shortcodes' ) 
        ), 
        'margin_bottom' =>  array(
            'type'  =>  'input' ,
            'title' =>  __('Margin Bottom','ut_shortcodes'),
            'desc'  =>  __('value in px , eg "20" (optional)' , 'ut_shortcodes' )
        ), 
        'class' =>  array(
            'type'  =>  'input' ,
            'title' =>  __('Optional Class','ut_shortcodes')
         ),        
         
    )
); 

/*
|--------------------------------------------------------------------------
| Elements like Tabs & Toggle or Callout
|--------------------------------------------------------------------------
*/

$ut_shortcodes['headline_2'] = array(
    'type'  =>  's',
    'title' =>  __('Elements', 'ut_shortcodes' )
);
                                        
                                        
/* blog */
$ut_shortcodes['ut_blog'] = array(
    'type'  =>  's',
    'title' =>  __('Blog Excerpt', 'ut_shortcodes' ),
    'attr'  =>  array(
        
        'buttontext' => array(
            'type'  =>  'input',
            'title' =>  __('Button Text' , 'ut_shortcodes'),
            'desc'  =>  __('Text for link to main blog' , 'ut_shortcodes') 
         ),
         
         'excerpt' => array(
            'type'  =>  'input',
            'title' =>  __('Excerpt Length' , 'ut_shortcodes'),
            'desc'  =>  __('(optional)' , 'ut_shortcodes')
         ), 
         
         'cat' => array(
            'type'  =>  'input', 
            'title' =>  __('Show Posts by Category <br />ID' , 'ut_shortcodes'),
            'desc'  =>  __('Show Posts From Several Categories <br />by Category ID ( separate by comma for multiple IDs )' , 'ut_shortcodes')
         ),
         
         'category_name' => array(
                'type'  =>  'input',
                'title' => __('Show Posts by Category <br />Slug' , 'ut_shortcodes'),
                'desc'  => __('Show Posts From Several Categories <br />by Category Slug ( separate by comma for multiple Slugs )' , 'ut_shortcodes')
         ),
         
         'class' => array( 
                'type'  =>  'input',
                'title' => __('Optional Class','ut_shortcodes')
         )
         
    )
);

/* highlight section */
$ut_shortcodes['ut_highlight_section'] = array(
    'type'  => 'c',
    'title' =>  __('Highlight Section', 'ut_shortcodes' ),
    'attr'  => array(
        
        'image' => array( 
            'type'  =>  'mediaaccess',
            'title' =>  __('Image' , 'ut_shortcodes')
        ),
        
        'imagetype' => array(
            'type'  =>  'select',
            'title' =>  __('Image Orientation' , 'ut_shortcodes'),
            'desc'  =>  __('Please select the image orientation of the uploaded image' , 'ut_shortcodes'),
            'values'=> array( 'portrait' , 'landscape' )
        ),
        
        'imageeffect' => array(
            'type'  =>  'effect',
            'title' => __('Image Effect','ut_shortcodes'),
            'desc' =>  __('Optional Image Animation Effect','ut_shortcodes')
        ),
        
        'margin_bottom' => array(
            'type'  =>  'input',
            'title' =>  __('Margin Bottom' , 'ut_shortcodes'),
            'desc'  =>  __('value in px , eg "20" (optional)' , 'ut_shortcodes' )
        ),
        
        'leftboxeffect' => array(
            'type'  =>  'effect',
            'title' => __('Effect for Left Service Boxes','ut_shortcodes'),
            'desc' =>  __('Optional Animation Effect for "Left Service Boxes"','ut_shortcodes')
        ),
        
        'rightboxeffect' => array(
            'type'  =>  'effect',
            'title' => __('Effect for Right Service Boxes','ut_shortcodes'),
            'desc' =>  __('Optional Animation Effect for "Right Service Boxes"','ut_shortcodes')
        ),
        
        'animate_once' =>  array(
            'type'  =>  'select',
            'title' =>  __('Animate Once' , 'ut_shortcodes'),
            'values'=> array( 'no' , 'yes' )
        ),
        
        'highlightgroup' => array(
            'type'  =>  'custom'
        ),        
        
        'class' => array( 
            'type'  =>  'input',
            'title' => __('Optional Class','ut_shortcodes')
        )
        
    )
);
                                                                                                                                                            
/* service box */
$ut_shortcodes['ut_service_box'] = array(
    'type'  =>  'c',
    'title' =>  __('Icon Box', 'ut_shortcodes' ),
    'attr'  => array(
        
        'color' => array(
            'type'  =>  'colorpicker',
            'title' =>  __('Icon Color' , 'ut_shortcodes')
        ),
        
        'background' => array(
            'type'  => 'colorpicker',
            'title' => __('Icon Background Color' , 'ut_shortcodes')
        ),
        
        'opacity' => array(
            'type'  =>  'range',
            'title' =>  __('Background Opacity' , 'ut_shortcodes')
        ),
        
        'icon' => array(
            'type'  =>  'icon',
            'title' => __('Icon' , 'ut_shortcodes')
        ),
        
        'headline' => array(
            'type'  => 'input',
            'title' => __('Headline' , 'ut_shortcodes')
        ),
        
        'width' => array(
            'type'  =>  'select',
            'title' =>  __('Box Width' , 'ut_shortcodes'),
            'values' => array('third' , 'half' )
        ),
        
        'effect' => array(
            'type'  =>  'effect',
            'title' =>  __('Optional Animation Effect','ut_shortcodes')
        ),
        
        'animate_once' =>  array(
            'type'  =>  'select',
            'title' =>  __('Animate Once' , 'ut_shortcodes'),
            'values'=> array( 'no' , 'yes' )
        ),
        
        'last' => array(
            'type'   =>  'select',
            'title'  =>  __('Last in row' , 'ut_shortcodes'),
            'values' => array( "true" , "false")
        ),
        
        'class' => array(
            'type'  =>  'input',
            'title' =>  __('Optional Class','ut_shortcodes')
        )
        
    )
);

/* service icon box */
$ut_shortcodes['ut_service_icon_box'] = array(
    'type'  =>  'c',
    'title' =>  __('Service Icon Box', 'ut_shortcodes' ),
    'attr'  =>  array(
        
        'color' =>  array(
            'type'  =>  'colorpicker',
            'title' => __('Color' , 'ut_shortcodes')
        ),
        
        'hovercolor' => array(
            'type'  =>  'colorpicker',
            'title' => __('Hover Color' , 'ut_shortcodes')
        ),
        
        'icon'  =>  array(
            'type'  =>  'icon',
            'title' =>  __('Icon' , 'ut_shortcodes')
        ),
        
        'url'   =>  array(
            'type'  =>  'input',
            'title' =>  __('Link' , 'ut_shortcodes'),
            'desc'  =>  __('Don\'t forget to put "http://" in front of your url' , 'ut_shortcodes')
        ),
        
        'target' =>  array(
            'type'  =>  'select',
            'title' =>  __('Target' , 'ut_shortcodes'),
            'values'=> array( '_blank' , '_self' )
        ),
        
        'headline' => array(
            'type'  =>  'input',
            'title' =>  __('Headline' , 'ut_shortcodes'),
            'desc'  =>  __('Box Headline' , 'ut_shortcodes' )
        ),
        
        'width' => array(
            'type'  =>  'select',
            'title' =>  __('Box Width' , 'ut_shortcodes'),
            'values'=> array( 'third' , 'fourth' , 'half' )
        ),
        
        'effect' => array(
            'type'  =>  'effect',
            'title' =>  __('Optional Animation Effect','ut_shortcodes')
        ),
        
        'animate_once' =>  array(
            'type'  =>  'select',
            'title' =>  __('Animate Once' , 'ut_shortcodes'),
            'values'=> array( 'no' , 'yes' )
        ),
        
        'last' => array(
            'type'  =>  'select',
            'title' =>  __('Last in row' , 'ut_shortcodes'),
            'values'=> array( 'true' , 'false')
        ),
        
        'class' =>  array(
            'type'  =>  'input',
            'title' =>  __('Optional Class','ut_shortcodes')
        )
        
    )
);


/* service column */
$ut_shortcodes['ut_service_column'] = array(
    'type'  =>  'c',
    'title' =>  __('Service Column Horizontal', 'ut_shortcodes' ),
    'attr'  =>  array(
        
        'color' =>  array(
            'type'  =>  'colorpicker',
            'title' =>  __('Icon Color' , 'ut_shortcodes')
        ),
        
        'background' => array(
            'type'  =>  'colorpicker',
            'title' =>  __('Background Icon Color' , 'ut_shortcodes')
        ),
        
        'icon' => array(
            'type'  =>  'icon',
            'title' =>  __('Icon' , 'ut_shortcodes')
        ),
        
        'shape' => array(
            'type'  =>  'select',
            'title' =>  __('Icon Shape' , 'ut_shortcodes'),
            'values'=>  array( 'normal' , 'round')
        ),
        
        'headline' => array(
            'type'  =>  'input',
            'title' =>  __('Headline' , 'ut_shortcodes'),
            'desc'  =>  __('Column Headline' , 'ut_shortcodes' )
        ),
        
        'align' => array(
            'type'  =>  'select',
            'title' =>  __('Alignment' , 'ut_shortcodes'),
            'values'=> array( 'left' , 'right' )
        ),
        
        'width' => array(
            'type'  =>  'select',
            'title' =>  __('Box Width' , 'ut_shortcodes'),
            'values'=>  array( 'third' , 'fourth' , 'half' , 'full' )
        ),
        
        'margin_bottom' => array(
            'type'  =>  'input',
            'title' =>  __('Margin Bottom' , 'ut_shortcodes'),
            'desc'  =>  __('value in px , eg "20"' , 'ut_shortcodes' )
        ),
        
        'effect' => array(
            'type'  =>  'effect',
            'title' =>  __('Optional Animation Effect','ut_shortcodes')
        ),
        
        'animate_once' =>  array(
            'type'  =>  'select',
            'title' =>  __('Animate Once' , 'ut_shortcodes'),
            'values'=> array( 'no' , 'yes' )
        ),
        
        'last' => array(
            'type'  =>  'select',
            'title' =>  __('Last in row' , 'ut_shortcodes'),
            'values'=>  array( 'true' , 'false')
        ),
        
        'class' => array(
            'type'  =>  'input',
            'title' =>  __('Optional Class','ut_shortcodes')
        )
        
    )
);

/* vertical service column */
$ut_shortcodes['ut_service_column_vertical'] = array(
    'type'  =>  'c',
    'title' =>  __('Service Column Vertical', 'ut_shortcodes' ),
    'attr'  => array(
    
        'color' => array( 
            'type'  =>  'colorpicker',
            'title' => __('Icon Color' , 'ut_shortcodes')
        ),
        
        'icon' => array(
            'type'  =>  'icon',
            'title' =>  __('Icon' , 'ut_shortcodes')
        ),
        
        'shape' => array(
            'type'  =>  'select',
            'title' =>  __('Icon Shape' , 'ut_shortcodes'),
            'values'=> array( 'normal' , 'round')
        ),
        
        'background' => array(
            'type'  =>  'colorpicker',
            'title' =>  __('Background Icon Color' , 'ut_shortcodes'),
            'desc'  =>  __('( only for shape round )' , 'ut_shortcodes')
        ),
        
        'headline' => array(
            'type'  =>  'input',
            'title' =>  __('Headline' , 'ut_shortcodes')
        ),
        
        
        'width' => array(
            'type'  =>  'select',
            'title' => __('Box Width' , 'ut_shortcodes'),
            'values'=> array( 'third' , 'fourth' , 'half' , 'full' )
        ),
        
        'margin_bottom' => array(
            'type'  =>  'input',
            'title' =>  __('Margin Bottom' , 'ut_shortcodes'),
            'desc'  =>  __('value in px , eg "20"' , 'ut_shortcodes' )
        ),
        
        'effect' => array(
            'type'  =>  'effect',
            'title' =>  __('Optional Animation Effect','ut_shortcodes')
        ),
        
        'animate_once' =>  array(
            'type'  =>  'select',
            'title' =>  __('Animate Once' , 'ut_shortcodes'),
            'values'=> array( 'no' , 'yes' )
        ),
        
        'last'  => array(
            'type'  =>  'select',
            'title' => __('Last in row' , 'ut_shortcodes') , 'values' => array( "true" , "false")
        ),
        
        'class' => array(
            'type'  =>  'input',
            'title' =>  __('Optional Class','ut_shortcodes')
        ) 
        
    )
);

/* image animation */
$ut_shortcodes['ut_animate_image'] = array(
    'type'  =>  's',
    'title' =>  __('Animated Image', 'ut_shortcodes' ),
    'attr'  => array(
        
        'image' => array( 
            'type'  =>  'mediaaccess',
            'title' =>  __('Image' , 'ut_shortcodes')
        ),
        
        'effect' => array(
            'type'  =>  'select',
            'title' =>  __('Animation Effect' , 'ut_shortcodes'),
            'values'=> array('fadeIn' , 'slideInRight' , 'slideInLeft')
        ),
        
        'animate_once' =>  array(
            'type'  =>  'select',
            'title' =>  __('Animate Once' , 'ut_shortcodes'),
            'values'=> array( 'no' , 'yes' )
        ),
        
        'align' => array(
            'type'  =>  'select',
            'title' =>  __('Alignment' , 'ut_shortcodes'),
            'values'=> array('left' , 'center' , 'right')
        ),
        
        'alt' => array(
            'type'  =>  'input',
            'title' => __('Image alt','ut_shortcodes')
        ),
        
        'margin_top' => array( 
            'type'  =>  'input',
            'title' =>  __('Margin Top' , 'ut_shortcodes'),
            'desc'  =>  __('value in px , eg "20"' , 'ut_shortcodes' )
        ),
        
        'margin_bottom' => array(
            'type'  =>  'input',
            'title' =>  __('Margin Bottom' , 'ut_shortcodes'), 
            'desc'  =>  __('value in px , eg "20"' , 'ut_shortcodes' )
        ),
        
        'link' => array( 
            'type'  =>  'input',
            'title' =>  __('Link' , 'ut_shortcodes'),
            'desc'  =>  __('Optional Link' , 'ut_shortcodes' )
        ),
        
        'target' => array(
            'type'  =>  'select',
            'title' =>  __('Target' , 'ut_shortcodes'),
            'values'=> array('_self' , '_blank')
        ),
        
        'class' => array(
            'type'  =>  'input',
            'title' =>  __('Optional Class','ut_shortcodes')
        )
        
    )
);

/* count up box */
$ut_shortcodes['ut_count_up'] = array(
    'type'  =>  'c',
    'title' =>  __('Count Up Box', 'ut_shortcodes' ),
    'attr'  => array(
        
        'color' => array(
            'type'  =>  'colorpicker',
            'title' =>  __('Counter Color' , 'ut_shortcodes')
        ),
        
        'desccolor' => array(
            'type'  => 'colorpicker',
            'title' =>  __('Counter Description Color' , 'ut_shortcodes')
        ),
        
        'to' => array(
            'type'  =>  'input',
            'title' =>  __('Count up to this value','ut_shortcodes')
        ),
        
        'background' => array(
            'type'  => 'colorpicker',
            'title' => __('Counter Background Color' , 'ut_shortcodes')
        ),
        
        'opacity' => array(
            'type'  =>  'range',
            'title' =>  __('Counter Background Opacity' , 'ut_shortcodes')
        ),
        
        'icon' => array(
            'type'  =>  'icon',
            'title' =>  __('Icon' , 'ut_shortcodes')
        ),
        
        'width' => array(
            'type'  =>  'select',
            'title' =>  __('Box Width' , 'ut_shortcodes'),
            'values'=> array( 'third' , 'fourth' , 'half' )
         ),
         
         'last' => array(
            'type'  => 'select',
            'title' =>  __('Last in row' , 'ut_shortcodes'),
            'values'=> array( 'true' , 'false')
         ),
         
         'class' => array(
            'type'  =>  'input',
            'title' =>  __('Optional Class','ut_shortcodes')
         )
         
    )
);

/* custom box */
$ut_shortcodes['ut_custom_box'] = array(
    'type'  =>  'c',
    'title' =>  __('Custom Box', 'ut_shortcodes' ),
    'attr'  => array(
        
        'title' => array(
            'type'  =>  'input',
            'title' =>  __('Box Title','ut_shortcodes')
        ),        
        'logo' => array(
            'type'  =>  'mediaaccess',
            'title' =>  __('Box Logo','ut_shortcodes')
        ),        
        'separator_text' => array(
            'type'  => 'separator',
            'title' => __('Box Text Colors (optional)' , 'ut_shortcodes')
        ),
        'title_color' => array(
            'type'  => 'colorpicker',
            'title' => __('Title Color' , 'ut_shortcodes')
        ),
        'text_color' => array(
            'type'  => 'colorpicker',
            'title' => __('Text Color' , 'ut_shortcodes')
        ),
        'separator_box' => array(
            'type'  => 'separator',
            'title' => __('Box Colors (optional)' , 'ut_shortcodes')
        ),
        'background' => array(
            'type'  => 'colorpicker',
            'title' => __('Background Color' , 'ut_shortcodes')
        ),
        'separator_border' => array(
            'type'  => 'separator',
            'title' => __('Border Settings (optional)' , 'ut_shortcodes')
        ),        
        'border_width' => array(
            'type'  =>  'input',
            'title' =>  __('Border Width' , 'ut_shortcodes'),
            'desc'  =>  __('value in px , eg "1"' , 'ut_shortcodes' )
        ),
        'border_style' => array(
            'type'  =>  'select',
            'title' =>  __('Border Style' , 'ut_shortcodes'),
            'values'=> array( 'none' , 'solid' , 'dashed' , 'dotted' , 'double' )
        ),
        'border_color' => array(
            'type'  => 'colorpicker',
            'title' => __('Border Color' , 'ut_shortcodes')
        ),
        'border_radius' => array(
            'type'  =>  'input',
            'title' =>  __('Border Radius' , 'ut_shortcodes'),
            'desc'  =>  __('value in px , eg "1"' , 'ut_shortcodes' )
        ),
        'separator_space' => array(
            'type'  => 'separator',
            'title' => __('Margin & Padding (optional)' , 'ut_shortcodes')
        ),
        'margin' => array(
            'type'  =>  'spacing',
            'title' =>  __('Margin' , 'ut_shortcodes'),
            'desc'  =>  __('(outer box spacing)' , 'ut_shortcodes' )
        ),
        'padding' => array(
            'type'  =>  'spacing',
            'title' =>  __('Padding' , 'ut_shortcodes'),
            'desc'  =>  __('(inner box spacing)' , 'ut_shortcodes' )
        ),
        'separator_misc' => array(
            'type'  => 'separator',
            'title' => __('Misc Settings (optional)' , 'ut_shortcodes')
        ),
        'effect'  => array(
            'type'  =>  'effect',
            'title' => __('Optional Animation Effect','ut_shortcodes')
        ),
        'animate_once' =>  array(
            'type'  =>  'select',
            'title' =>  __('Animate Once' , 'ut_shortcodes'),
            'values'=> array( 'no' , 'yes' )
        ),
        'class' => array(
            'type'  =>  'input',
            'title' =>  __('Optional Class','ut_shortcodes')
        )
        
    )
);


/* social media icons */
$ut_shortcodes['ut_social_media'] = array(
    'type'  =>  'm',
    'title' =>  __('Social Media Icon List', 'ut_shortcodes' ),
    'attr'  =>  array(
        
        'socialmedia' => array( 
            'type'  =>  'custom'
        ),
        
        'class' =>  array(
            'type'  =>  'input',
            'title' => __('Optional Class','ut_shortcodes')
        )
        
    )
);

/* single testimonial */
$ut_shortcodes['ut_single_quote'] = array(
    'type'  =>  'c',
    'title' =>  __('Single Quote', 'ut_shortcodes'),
    'attr' => array(
        
        'author' => array(
            'type'  =>  'input',
            'title' =>  __('Author','ut_shortcodes')
        ),
        
        'company' => array(
            'type'  =>  'input',
            'title' =>  __('Company','ut_shortcodes')
        ),
        
        'title' => array(
            'type'  => 'input',
            'title' =>  __('Title','ut_shortcodes')
        ),
        
        'avatar' => array(
            'type'  => 'mediaaccess',
            'title' =>  __('Avatar' , 'ut_shortcodes')
        ),
        
        'date' => array(
            'type'  =>  'input',
            'title' => __('Date of Quote','ut_shortcodes')
        ),
        
        'rating' => array(
            'type'  =>  'select',
            'title' =>  __('Rating' , 'ut_shortcodes'),
            'values'=>  array( 'one' , 'two' , 'three' , 'four' , 'five' )
        ),
         
        'width' => array(
            'type'  =>  'select',
            'title' =>  __('Box Width' , 'ut_shortcodes'),
            'values'=> array( 'third' , 'fourth' , 'half' )
        ),
        
        'last' => array(
            'type'  =>  'select',
            'title' =>  __('Last in row' , 'ut_shortcodes'),
            'values'=> array( 'true' , 'false')
        ),
        
        'effect' => array(
            'type'  =>  'effect',
            'title' =>  __('Optional Animation Effect','ut_shortcodes')
        ),
        
        'animate_once' =>  array(
            'type'  =>  'select',
            'title' =>  __('Animate Once' , 'ut_shortcodes'),
            'values'=> array( 'no' , 'yes' )
        ),
        
        'margin_bottom' => array(
            'type'  =>  'input',
            'title' => __('Margin Bottom' , 'ut_shortcodes'),
            'desc'  => __('value in px , eg "20"' , 'ut_shortcodes' )
        ),
        
        'class' => array(
            'type'  =>  'input',
            'title' =>  __('Optional Class','ut_shortcodes')
        )
    
    )
);

/* testimonials with avatar */
$ut_shortcodes['ut_quote_rotator'] = array(
    'type'  =>  'm',
    'title' =>  __('Quote Rotator ( with Avatar )', 'ut_shortcodes' ),
    'attr'  => array( 
        
        'quoterotator' => array( 
            'type'  =>  'custom'
        ),
        
        'speed' => array(
            'type'  =>  'input',
            'title' =>  __('Rotation Speed in ms','ut_shortcodes')
        ),
        
        'autoplay' => array(
            'type'  =>  'select',
            'title' => __('Autoplay' , 'ut_shortcodes'),
            'values'=> array( 'on' , 'off' )
        ),
        
        'randomize' => array(
            'type'  =>  'select',
            'title' =>  __('Randomize' , 'ut_shortcodes'),
            'values'=> array( 'on' , 'off' )
        ),
        
        'width' => array(
            'type'  =>  'select',
            'title' =>  __('Rotator Width' , 'ut_shortcodes'),
            'values'=> array( 'half' , 'fullwidth' )
        ),
        
        'last' => array(
            'type'  =>  'select',
            'title' =>  __('Last in row' , 'ut_shortcodes'),
            'values'=> array( 'true' , 'false')
        ),
        
    )
);

/* testimonials without avatar */
$ut_shortcodes['ut_quote_rotator_alt'] = array(
    'type'  =>  'm',
    'title' =>  __('Quote Rotator (without Avatar)', 'ut_shortcodes' ),
    'attr'  => array( 
        
        'quoterotator_alt' => array( 
            'type'  =>  'custom'
        ),
        
        'speed' => array(
            'type'  =>  'input',
            'title' =>  __('Rotation Speed in ms','ut_shortcodes')
        ),
        
        'autoplay' => array(
            'type'  =>  'select',
            'title' =>  __('Autoplay' , 'ut_shortcodes'),
            'values'=> array( 'on' , 'off' )
        ),
        
        'randomize' => array(
            'type'  =>  'select',
            'title' =>  __('Randomize' , 'ut_shortcodes'),
            'values'=> array( 'on' , 'off' )
        ),
        
        'width' => array(
            'type'  =>  'select',
            'title' =>  __('Rotator Width' , 'ut_shortcodes'),
            'values'=> array( 'half' , 'fullwidth' )
        ),
        
        'last' => array(
            'type'  => 'select',
            'title' =>  __('Last in row' , 'ut_shortcodes'),
            'values'=> array( 'true' , 'false') 
        ),
    
    )
);

$ut_shortcodes['ut_video_testimonials'] = array(
    'type'  =>  'm',
    'title' =>  __('Video Testimonials', 'ut_shortcodes' ),
    'attr'  =>  array(
        
        'videotestgroup' => array( 
            'type'  =>  'custom'
        ),
        
        'class' => array(
            'type'  =>  'input',
            'title' =>  __('Optional Class','ut_shortcodes')
        ) 
        
        
    )
);

/* twitter rotator */
if( ut_is_plugin_active('ut-twitter/ut-twitter.php') ) {

    $ut_shortcodes['ut_twitter_rotator'] = array(
        'type'  =>  'm',
        'title' =>  __('Twitter Rotator', 'ut_shortcodes' ),
        'attr'  =>  array(
            
            'count' => array(
                'type'  =>  'input',
                'title' =>  __('Tweets to display','ut_shortcodes')
            ),
            
            'avatar' => array(
                'type'  =>  'select',
                'title' =>  __('Show Avatar' , 'ut_shortcodes'),
                'values'=> array( 'on' , 'off')
            ),
            
            'speed' => array(
                'type'  =>  'input',
                'title' =>  __('Rotation Speed in ms','ut_shortcodes')
            ),
            
            'width' => array(
                'type'  =>  'select',
                'title' =>  __('Rotator Width' , 'ut_shortcodes'),
                'values'=> array( 'half' , 'fullwidth' )
            ),
            
            'last' => array(
                'type'  =>  'select',
                'title' =>  __('Last in row' , 'ut_shortcodes'),
                'values'=>  array( 'true' , 'false')
            ),
            
            'class' => array(
                'type'  =>  'input',
                'title' =>  __('Optional Class','ut_shortcodes')
            ) 
            
        )
    );
}


/* toggles */
$ut_shortcodes['ut_togglegroup'] = array(
    'type'  =>  'm',
    'title' =>  __('Accordion / Toggle', 'ut_shortcodes' ),
    'attr'  =>  array(
        
        'togglegroup' => array(
            'type'  =>  'custom'
        ),
        
        'width' => array(
            'type'  =>  'select',
            'title' =>  __('Toggle Width' , 'ut_shortcodes'),
            'values'=> array( 'third' , 'fourth' , 'half' )
        ),
        
        'last' => array(
            'type'  =>  'select',
            'title' =>  __('Last in row' , 'ut_shortcodes'),
            'values'=> array( 'true' , 'false')
        ),
        
    )
);


/* tabs */
$ut_shortcodes['ut_tabgroup'] = array(
    'type'  =>  'm',
    'title' =>  __('Tabs', 'ut_shortcodes' ),
    'attr'  =>  array( 
        
        'tabgroup' => array(
            'type'  =>  'custom'
        ),
        
        'width' => array(
            'type'  =>  'select',
            'title' => __('Tab Width' , 'ut_shortcodes'),
            'values'=> array( '"third' , 'fourth' , 'half' )
        ),
        
        'last' => array(
            'type'  =>  'select',
            'title' =>  __('Last in row' , 'ut_shortcodes'),
            'values'=> array( 'true' , 'false')
        ),
        
    )
);

/* clientgroup */
$ut_shortcodes['ut_client_group'] = array(
    'type'  =>  'm',
    'title' =>  __('Clients', 'ut_shortcodes' ),
    'attr'  => array(
        
        'clientgroup' => array(
            'type'  =>  'custom'
        ),
        
        'carousel' => array(
            'type'  =>  'select',
            'title' =>  __('Display as Carousel' , 'ut_shortcodes'),
            'values'=> array( 'on' , 'off')
        ),
        
        'class' => array(
            'type'  =>  'input',
            'title' =>  __('Optional Class','ut_shortcodes')
        )
        
    )
);

/* title divider */
$ut_shortcodes['ut_title_divider'] = array(
    'type'  =>  'c',
    'title' =>  __('Title Divider', 'ut_shortcodes'),
    'attr'  => array(
        
        'margin_top' => array(
            'type'  =>  'input',
            'title' =>  __('Margin Top' , 'ut_shortcodes'),
            'desc'  =>  __('value in px , eg "20"' , 'ut_shortcodes' )
        ),
        
        'class' => array(
            'type'  =>  'input',
            'title' =>  __('Optional Class','ut_shortcodes')
        )
    )
);

/* blockquote left */
$ut_shortcodes['ut_blockquote_left'] = array(
    'type'  =>  'c',
    'title' =>  __('Blockquote (left)', 'ut_shortcodes' )
);

/* blockquote right*/
$ut_shortcodes['ut_blockquote_right'] = array(
    'type'  =>  'c',
    'title' =>  __('Blockquote (right)', 'ut_shortcodes' )
);


/* dropcap */
$ut_shortcodes['ut_dropcap'] = array(
    'type'  =>  'c',
    'title' =>  __('Dropcap', 'ut_shortcodes'),
    'attr'  =>  array(
        
        'style' => array(
            'type'  =>  'radio',
            'title' =>  'Style',
            'def'   =>  'one',
            'opt'   => array(
                    'one'   =>   __('Style One', 'ut_shortcodes'),
                    'two'   =>   __('Style Two', 'ut_shortcodes')
            )
        ),
        
        'class' => array(
            'type'  =>  'input',
            'title' =>  __('Optional Class','ut_shortcodes')
        )
    
    )
);

/* parallax quote */
$ut_shortcodes['ut_parallax_quote'] = array(
    'type'  =>  'c',
    'title' =>  __('Parallax Quote', 'ut_shortcodes'),
    'attr'  =>  array(
        
        'cite' => array(
            'type'  =>  'input',
            'title' =>  __('Cite','ut_shortcodes')
        ),
        
        'class' => array(
            'type'  =>  'input',
            'title' => __('Optional Class','ut_shortcodes')
        )
    
    )
);

/* highlight */
$ut_shortcodes['ut_highlight'] = array(
    'type'  =>  'c',
    'title' =>  __('Highlight', 'ut_shortcodes'),
    'attr'  =>  array(
        
        'color' => array(
            'type'  =>  'colorpicker',
            'title' =>  __('Font Color' , 'ut_shortcodes')
        ),
        
        'bgcolor' => array(
            'type'  =>  'colorpicker',
            'title' =>  __('Background Color' , 'ut_shortcodes')
        )
    )
);

/* alerts */
$ut_shortcodes['ut_alert'] = array(
    'type'  =>  'c',
    'title' =>  __('Message Box', 'ut_shortcodes'),
    'attr'  =>  array(
        
        'color' => array(
            'type'  =>  'radio',
            'title' =>  'Color',
            'def'   =>  'info',
            'opt'   =>  array(
                    'white'         =>  __('White', 'ut_shortcodes'),
                    'grey'          =>  __('Grey', 'ut_shortcodes'),
                    'themecolor'    =>  __('Themecolor', 'ut_shortcodes')
            )
        ),
        
        'effect' => array(
            'type'  =>  'effect',
            'title' =>  __('Optional Animation Effect','ut_shortcodes')
        ),
        
        'animate_once' =>  array(
            'type'  =>  'select',
            'title' =>  __('Animate Once' , 'ut_shortcodes'),
            'values'=> array( 'no' , 'yes' )
        ),
        
    )
);

/* progress bar */
$ut_shortcodes['ut_probar'] = array(
    'type'  =>  's',
    'title' =>  __('Single Progress Bar', 'ut_shortcodes'),
    'attr'  =>  array(
        
        'width' => array(
            'type'  =>  'input',
            'title' =>  __('Percentage ( required )' , 'ut_shortcodes')
        ),
        
        'info' => array(
            'type'  =>  'input',
            'title' =>  __('Info Text','ut_shortcodes')
        ),
        
        'color' => array(
            'type'  =>  'colorpicker',
            'title' =>  __('Bar Color' , 'ut_shortcodes'),
            'desc'  =>  __('optional : default themecolor' , 'ut_shortcodes')
        ),
        
        'class' => array(
            'type'  =>  'input',
            'title' =>  __('Optional Class','ut_shortcodes')
        )
        
    )
);

                                                                                                             
/* word rotator */
$ut_shortcodes['ut_rotate_words'] = array(
    'type'  =>  'c',
    'title' =>  __('Word Rotator (comma seperated words)', 'ut_shortcodes' ),
    'attr'  =>  array(
        
        'timer' => array(
            'type'  =>  'input',
            'title' =>  __('Animation Speed' , 'ut_shortcodes')
        ),
        
        'class' => array(
            'type'  =>  'input',
            'title' =>  __('Optional Class','ut_shortcodes')
        )
        
    )
);

/* fancy link */
$ut_shortcodes['ut_fancy_link'] = array(
    'type'  =>  'c',
    'title' =>  __('Fancy Link', 'ut_shortcodes' ),
    'attr'  =>  array(  
    
        'url' => array(
            'type'  =>  'input',
            'title' =>  __('Link','ut_shortcodes')
        ),
        
        'class' => array(
            'type'  =>  'input',
            'title' =>  __('Optional Class','ut_shortcodes')
        )
        
    )
);

/* vimeo video */
$ut_shortcodes['ut_video_vimeo'] = array(
    'type'  =>  's',
    'title' =>  __('Vimeo Video', 'ut_shortcodes' ),
    'attr'  => array(
        
        'info' => array(
            'type'  =>  'alert',
            'desc'  =>  __('This Shortcode is deprecated. And will be dropped in a future update. Please use the "United Video" Shortcode instead!' , 'ut_shortcodes')
        ),
        
        'id' => array(
            'type'  =>  'input',
            'title' =>  __('Video ID','ut_shortcodes'),
            'desc'  =>  __('only the video ID , eg "23237102"' , 'ut_shortcodes')
        ),
        
        'class' => array(
            'type'  =>  'input',
            'title' =>  __('Optional Class','ut_shortcodes')
        )
    
    )
);

/* youtube video */
$ut_shortcodes['ut_video_youtube'] = array(
    'type'  =>  's',
    'title' =>  __('Youtube Video', 'ut_shortcodes' ),
    'attr'  =>  array(
        
        'info' => array(
            'type'  =>  'alert',
            'desc'  =>  __('This Shortcode is deprecated. And will be dropped in a future update. Please use the "United Video" Shortcode instead!' , 'ut_shortcodes')
        ),
        
        'id' => array(
            'type'  =>  'input',
            'title' =>  __('Video ID','ut_shortcodes'),
            'desc'  =>  __('only the video ID , eg "gvt_YFuZ8LA"' , 'ut_shortcodes')
        ),
        
        'class' => array(
            'type'  =>  'input',
            'title' =>  __('Optional Class','ut_shortcodes')
        )
    
    )
);

$ut_shortcodes['ut_united_video'] = array(
    'type'  =>  's',
    'title' =>  __('United Video', 'ut_shortcodes' ),
    'attr'  =>  array(
        'url' => array(
            'type'  =>  'input',
            'title' =>  __('Video URL','ut_shortcodes'),
            'desc'  =>  __('only the video URL eg "http://vimeo.com/62375781". You can find a full list of currently supported URLs <a href="http://codex.wordpress.org/Embeds" target="_blank">here</a>' , 'ut_shortcodes')
        ),        
        'poster' => array( 
            'type'  =>  'mediaaccess',
            'title' =>  __('Poster Image' , 'ut_shortcodes'),
            'desc'  => __('(required). This poster image will be displayed until the user decides to play the video. This saves bandwidth and increases the page speed!','ut_shortcodes')
        ),
        'maxwidth' => array(
            'type'  => 'range',
            'min'   => '0',
            'max'   => '100',
            'step'  => '10',
            'value' => '100',            
            'title' =>  __('(optional)' , 'ut_shortcodes')
        ),        
        'class' => array(
            'type'  =>  'input',
            'title' =>  __('Optional Class','ut_shortcodes')
        )
    )
);
                                                                                                                                                                                                                                        
/* simple clear */
$ut_shortcodes['ut_clear'] = array(
    'type'  =>  's',
    'title' =>  __('Clear', 'ut_shortcodes')
);