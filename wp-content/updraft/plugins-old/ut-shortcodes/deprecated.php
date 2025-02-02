<?php


/*
 * One Sixth Grid
 */

if( !function_exists('ut_one_sixth') ) { 
 
    function ut_one_sixth( $atts, $content = null ) {
        
        extract(shortcode_atts(array(
             'class'        => '',
             'effect'       => '',
             'animate_once' => 'no',
        ), $atts));
        
        /* animation effect */
        $dataeffect = $animated = NULL;
        if( !empty( $effect ) ) {

            $dataeffect = 'data-effect="' . $effect . '" data-animateonce="' . $animate_once . '"';
            $animated   = 'ut-animate-element animated';
            
        }
        
        return '<div ' . $dataeffect . ' class="ut-one-sixth ' . $class . ' ' . $animated . '">' . do_shortcode($content) . '</div>';
    }
    add_shortcode('ut_one_sixth', 'ut_one_sixth');

}

if( !function_exists('ut_one_sixth_last') ) { 
 
    function ut_one_sixth_last( $atts, $content = null ) {
        
        extract(shortcode_atts(array(
             'class'        => '',
             'effect'       => '',
             'animate_once' => 'no',
        ), $atts));
        
        /* animation effect */
        $dataeffect = $animated = NULL;
        if( !empty( $effect ) ) {

            $dataeffect = 'data-effect="' . $effect . '" data-animateonce="' . $animate_once . '"';
            $animated   = 'ut-animate-element animated';
            
        }
        
        return '<div ' . $dataeffect . ' class="ut-one-sixth ut-column-last ' . $class . ' ' . $animated . '">' . do_shortcode($content) . '</div><div class="clear"></div>';
    }
    add_shortcode('ut_one_sixth_last', 'ut_one_sixth_last');

}

/*
 * One Fifth Grid
 */

if( !function_exists('ut_one_fifth') ) { 
 
    function ut_one_fifth( $atts, $content = null ) {
        
        extract(shortcode_atts(array(
             'class'        => '',
             'effect'       => '',
             'animate_once' => 'no',
        ), $atts));
        
        /* animation effect */
        $dataeffect = $animated = NULL;
        if( !empty( $effect ) ) {

            $dataeffect = 'data-effect="' . $effect . '" data-animateonce="' . $animate_once . '"';
            $animated   = 'ut-animate-element animated';
            
        }
        
        return '<div ' . $dataeffect . ' class="ut-one-fifth ' . $class . ' ' . $animated . '">' . do_shortcode($content) . '</div>';
    }
    add_shortcode('ut_one_fifth', 'ut_one_fifth');

}

if( !function_exists('ut_one_fifth_last') ) { 
 
    function ut_one_fifth_last( $atts, $content = null ) {
        
        extract(shortcode_atts(array(
             'class'        => '',
             'effect'       => '',
             'animate_once' => 'no',
        ), $atts));
        
        /* animation effect */
        $dataeffect = $animated = NULL;
        if( !empty( $effect ) ) {

            $dataeffect = 'data-effect="' . $effect . '" data-animateonce="' . $animate_once . '"';
            $animated   = 'ut-animate-element animated';
            
        }
        
        return '<div ' . $dataeffect . ' class="ut-one-fifth ut-column-last ' . $class . ' ' . $animated . '">' . do_shortcode($content) . '</div><div class="clear"></div>';
    }
    
    add_shortcode('ut_one_fifth_last', 'ut_one_fifth_last');

}


/*
 * One Fourth Grid
 */

if( !function_exists('ut_one_fourth') ) { 
 
    function ut_one_fourth( $atts, $content = null ) {
        
        extract(shortcode_atts(array(
             'class'        => '',
             'effect'       => '',
             'animate_once' => 'no',
        ), $atts));
        
        /* animation effect */
        $dataeffect = $animated = NULL;
        if( !empty( $effect ) ) {

            $dataeffect = 'data-effect="' . $effect . '" data-animateonce="' . $animate_once . '"';
            $animated   = 'ut-animate-element animated';
            
        }
        
        return '<div ' . $dataeffect . ' class="ut-one-fourth ' . $class . ' ' . $animated . '">' . do_shortcode($content) . '</div>';
    }
    add_shortcode('ut_one_fourth', 'ut_one_fourth');

}

if( !function_exists('ut_one_fourth_last') ) { 
 
    function ut_one_fourth_last( $atts, $content = null ) {
        
        extract(shortcode_atts(array(
             'class'        => '',
             'effect'       => '',
             'animate_once' => 'no',
        ), $atts));
        
        /* animation effect */
        $dataeffect = $animated = NULL;
        if( !empty( $effect ) ) {

            $dataeffect = 'data-effect="' . $effect . '" data-animateonce="' . $animate_once . '"';
            $animated   = 'ut-animate-element animated';
            
        }
        
        return '<div ' . $dataeffect . ' class="ut-one-fourth ut-column-last ' . $class . ' ' . $animated . '">' . do_shortcode($content) . '</div><div class="clear"></div>';
    }
    add_shortcode('ut_one_fourth_last', 'ut_one_fourth_last');

}

/*
 * One Third Grid
 */

if( !function_exists('ut_one_third') ) { 
 
    function ut_one_third( $atts, $content = null ) {
        
        extract(shortcode_atts(array(
             'class'        => '',
             'effect'       => '',
             'animate_once' => 'no',
        ), $atts));
        
        /* animation effect */
        $dataeffect = $animated = NULL;
        if( !empty( $effect ) ) {

            $dataeffect = 'data-effect="' . $effect . '" data-animateonce="' . $animate_once . '"';
            $animated   = 'ut-animate-element animated';
            
        }
        
        return '<div ' . $dataeffect . ' class="ut-one-third ' . $class . ' ' . $animated . '">' . do_shortcode($content) . '</div>';
    }
    add_shortcode('ut_one_third', 'ut_one_third');

}

if( !function_exists('ut_one_third_last') ) { 
 
    function ut_one_third_last( $atts, $content = null ) {
        
        extract(shortcode_atts(array(
             'class'        => '',
             'effect'       => '',
             'animate_once' => 'no',
        ), $atts));
        
        /* animation effect */
        $dataeffect = $animated = NULL;
        if( !empty( $effect ) ) {

            $dataeffect = 'data-effect="' . $effect . '" data-animateonce="' . $animate_once . '"';
            $animated   = 'ut-animate-element animated';
            
        }
        
        return '<div ' . $dataeffect . ' class="ut-one-third ut-column-last ' . $class . ' ' . $animated . '">' . do_shortcode($content) . '</div><div class="clear"></div>';
    }
    add_shortcode('ut_one_third_last', 'ut_one_third_last');

}

/*
 * One Half Grid
 */

if( !function_exists('ut_one_half') ) { 
 
    function ut_one_half( $atts, $content = null ) {
        
        extract(shortcode_atts(array(
             'class'        => '',
             'effect'       => '',
             'animate_once' => 'no',
        ), $atts));
        
        /* animation effect */
        $dataeffect = $animated = NULL;
        if( !empty( $effect ) ) {

            $dataeffect = 'data-effect="' . $effect . '" data-animateonce="' . $animate_once . '"';
            $animated   = 'ut-animate-element animated';
            
        }
        
        return '<div ' . $dataeffect . ' class="ut-one-half ' . $class . ' ' . $animated . '">' . do_shortcode($content) . '</div>';
    }
    add_shortcode('ut_one_half', 'ut_one_half');

}

if( !function_exists('ut_one_half_last') ) { 
 
    function ut_one_half_last( $atts, $content = null ) {
        
        extract(shortcode_atts(array(
             'class'        => '',
             'effect'       => '',
             'animate_once' => 'no',
        ), $atts));
        
        /* animation effect */
        $dataeffect = $animated = NULL;
        if( !empty( $effect ) ) {

            $dataeffect = 'data-effect="' . $effect . '" data-animateonce="' . $animate_once . '"';
            $animated   = 'ut-animate-element animated';
            
        }
        
        return '<div ' . $dataeffect . ' class="ut-one-half ut-column-last ' . $class . ' ' . $animated . '">' . do_shortcode($content) . '</div><div class="clear"></div>';
    }
    add_shortcode('ut_one_half_last', 'ut_one_half_last');

}


/*
 * Two Thirds Grid
 */

if( !function_exists('ut_two_thirds') ) { 
 
    function ut_two_thirds( $atts, $content = null ) {
        
        extract(shortcode_atts(array(
             'class'        => '',
             'effect'       => '',
             'animate_once' => 'no',
        ), $atts));
        
        /* animation effect */
        $dataeffect = $animated = NULL;
        if( !empty( $effect ) ) {

            $dataeffect = 'data-effect="' . $effect . '" data-animateonce="' . $animate_once . '"';
            $animated   = 'ut-animate-element animated';
            
        }
        
        return '<div ' . $dataeffect . ' class="ut-two-thirds ' . $class . ' ' . $animated . '">' . do_shortcode($content) . '</div>';
    }
    add_shortcode('ut_two_thirds', 'ut_two_thirds');

}

if( !function_exists('ut_two_thirds_last') ) { 
 
    function ut_two_thirds_last( $atts, $content = null ) {
        
        extract(shortcode_atts(array(
             'class'        => '',
             'effect'       => '',
             'animate_once' => 'no',
        ), $atts));
        /* animation effect */
        $dataeffect = $animated = NULL;
        if( !empty( $effect ) ) {

            $dataeffect = 'data-effect="' . $effect . '" data-animateonce="' . $animate_once . '"';
            $animated   = 'ut-animate-element animated';
            
        }
        
        return '<div ' . $dataeffect . ' class="ut-two-thirds ut-column-last ' . $class . ' ' . $animated . '">' . do_shortcode($content) . '</div><div class="clear"></div>';
    }
    add_shortcode('ut_two_thirds_last', 'ut_two_thirds_last');

}

/*
 * Three Fourth Grid
 */

if( !function_exists('ut_three_fourths') ) { 
 
    function ut_three_fourths( $atts, $content = null ) {
        
        extract(shortcode_atts(array(
             'class'        => '',
             'effect'       => '',
             'animate_once' => 'no',
        ), $atts));
        
        /* animation effect */
        $dataeffect = $animated = NULL;
        if( !empty( $effect ) ) {

            $dataeffect = 'data-effect="' . $effect . '" data-animateonce="' . $animate_once . '"';
            $animated   = 'ut-animate-element animated';
            
        }
        
        return '<div ' . $dataeffect . ' class="ut-three-fourths ' . $class . ' ' . $animated . '">' . do_shortcode($content) . '</div>';
    }
    add_shortcode('ut_three_fourths', 'ut_three_fourths');

}

if( !function_exists('ut_three_fourths_last') ) { 
 
    function ut_three_fourths_last( $atts, $content = null ) {
        
        extract(shortcode_atts(array(
             'class'        => '',
             'effect'       => '',
             'animate_once' => 'no',
        ), $atts));
        
        /* animation effect */
        $dataeffect = $animated = NULL;
        if( !empty( $effect ) ) {

            $dataeffect = 'data-effect="' . $effect . '" data-animateonce="' . $animate_once . '"';
            $animated   = 'ut-animate-element animated';
            
        }
        
        return '<div ' . $dataeffect . ' class="ut-three-fourths ut-column-last ' . $class . ' ' . $animated . '">' . do_shortcode($content) . '</div><div class="clear"></div>';
    }
    add_shortcode('ut_three_fourths_last', 'ut_three_fourths_last');

}

/*
 * Vimeo
 */ 

if( !function_exists('ut_video_vimeo') ) {
    
    function ut_video_vimeo($atts, $content = null) {
        
        extract(shortcode_atts(array(
             
             'url'            => '',
             'id'            => '',
             'class'        => ''
        
        ), $atts));
        
        if( !empty($url) && (int)$url ) {
            $id = $url;
        }
        
        if( !(int)$id ) {
            
            return esc_html__( 'Please insert only a valid video ID' , 'ut_shortcodes' );
            
        } else {
            
            return str_replace('&','&amp;','<div class="ut-video ' . $class . '"><iframe height="315" width="560" src="http://player.vimeo.com/video/' . trim($id) . '" webkitAllowFullScreen mozallowfullscreen allowFullScreen frameborder="0"></iframe></div>');
            
        }
        
    }
    
    add_shortcode('ut_video_vimeo', 'ut_video_vimeo');
    
}


/*
 * Youtube
 */ 

if( !function_exists('ut_video_youtube') ) {

    function ut_video_youtube($atts, $content = null) {
       
       extract(shortcode_atts(array(
             
             'url'            => '',
             'id'            => '',
             'class'        => ''
        
        ), $atts));
       
       if( !empty($url) ) {
            $id = $url;
        }
        
        return str_replace('&','&amp;','<div class="ut-video ' . $class . '"><iframe height="315" width="560" src="http://www.youtube.com/embed/' . trim($id) . '?wmode=transparent&vq=hd720" wmode="Opaque" allowfullscreen="" frameborder="0"></iframe></div>');
        
    }
    
    add_shortcode('ut_video_youtube', 'ut_video_youtube');

}

/*
 * clear
 */ 

if( !function_exists('ut_clear') ) {

    function ut_clear() {
       
       return '<div class="clear"></div>';
       
    }
    
    add_shortcode('ut_clear', 'ut_clear');

}


/*
 * Quote Rotator
 */ 

if( !function_exists('ut_quote_rotator') ) {

    function ut_quote_rotator( $atts, $content ){
            
        extract(shortcode_atts(array(
            'width'        => '',
            'last'        => 'false',
            'speed'        => '9000',
            'autoplay'    => 'on',
            'randomize'    => 'off',
            'class'     => ''
        ), $atts));        
        
        $grid = array( 'third'      => 'ut-one-third',
                       'fourth'     => 'ut-one-fourth',
                       'half'        => 'ut-one-half',
                       'fullwdith'     => '');
        
        $last = $last == 'true' ? 'ut-column-last' : '';
        
        /* fallback */
        $gridwidth = !empty($grid[$width]) ? $grid[$width] : '';
                
        /* set unique ID for this rotator */
        $id = uniqid("utquote_");
        
        /* autoplay */
        $autoplay = ($autoplay == 'off') ? 'slideshow: false,' : NULL; 
        
        /* randomize */
        $randomize = ($randomize == 'on') ? 'randomize: true,' : NULL; 
        
        $script = '
        <script type="text/javascript">
        /* <![CDATA[ */
        
        (function($){

            $(document).ready(function(){
                
                $("#avatarSlider_' . $id . '").flexslider({
                    animation: "fade",
                    ' . $autoplay . '
                    directionNav:false,
                    controlNav:false,
                    smoothHeight: true,
                    animationLoop:true,
                    slideshowSpeed: ' . $speed . ',        
                    slideToStart: 0,
                    prevText: "",
                    nextText: ""   
                });
                
                $("#quoteSlider_' . $id . '").flexslider({
                    animation: "slide",
                    ' . $autoplay . '
                    ' . $randomize . '
                    directionNav:true,
                    controlNav:false,        
                    smoothHeight: true,
                    animationLoop:true,
                    sync: "#avatarSlider_' . $id . '",
                    slideshowSpeed: ' . $speed . ',            
                    slideToStart: 0,
                    prevText: "",
                    nextText: ""   
                });
        
            });

        })(jQuery);
        
         /* ]]> */    
        </script>';
        
        $quote_rotator  = '<div class="ut-testimonials ' . $gridwidth . ' ' . $last . '">';
            $quote_rotator .= '<div class="ut-rotate-avatar flexslider" id="avatarSlider_' . $id . '">';    
                $quote_rotator .= '<ul class="slides">';
                    $quote_rotator .= do_shortcode( $content );
                $quote_rotator .= '</ul>';            
            $quote_rotator .= '</div>';    
        
            $quote_rotator  .= '<div class="ut-rotate-quote" id="quoteSlider_' . $id . '">';    
                $quote_rotator .= '<ul class="slides">';
                    $quote_rotator .= do_shortcode( $content );
                $quote_rotator .= '</ul>';
            $quote_rotator .= '</div>';
        $quote_rotator .= '</div>';
        
        return $script . $quote_rotator;
            
    }
    
    add_shortcode( 'ut_quote_rotator', 'ut_quote_rotator' );

}

if( !function_exists('ut_quote') ) {

    function ut_quote( $atts, $content ){
        
        extract(shortcode_atts(array(
            'author' => '',
            'avatar' => ''
        ), $atts));
        
        if( !empty( $avatar ) ) {        
            $avatar = ut_resize( $avatar , '200' , '200', true , true , true );
        }
        
        $quote = '<li>';
            
            if( !empty( $avatar ) ) {
                $quote .= '<img alt="' . $author . '" class="ut-quote-avatar" src="' . $avatar . '" />';
            }
            
            if( !empty( $content ) ) {
                $quote .= '<h3 class="ut-quote-comment">' . do_shortcode( $content ) . '</h3>';
            }
            
            if( !empty( $author ) ) {
                $quote .= '<span class="ut-quote-name">' . $author . '</span>';
            }
            
        $quote .= '</li>';
        
        return $quote;        
        
    }
    
    add_shortcode( 'ut_quote', 'ut_quote' );
    
}

/*
 * Quote Rotator Alt ( without Avatar )
 */ 

if( !function_exists('ut_quote_rotator_alt') ) {

    function ut_quote_rotator_alt( $atts, $content ){
            
        extract(shortcode_atts(array(
            'width'        => '',
            'last'        => 'false',
            'speed'        => '9000',
            'autoplay'    => 'on',
            'randomize'    => 'off',
            'class'     => ''
        ), $atts));        
        
        $grid = array( 'third'      => 'ut-one-third',
                       'fourth'     => 'ut-one-fourth',
                       'half'        => 'ut-one-half',
                       'fullwdith'     => '');
        
        $last = $last == 'true' ? 'ut-column-last' : '';
        
        /* fallback */
        $gridwidth = !empty($grid[$width]) ? $grid[$width] : '';
        
        /* autoplay */
        $autoplay = ($autoplay == 'off') ? 'slideshow: false,' : NULL;
        
        /* randomize */
        $randomize = ($randomize == 'on') ? 'randomize: true,' : NULL; 
        
        /* set unique ID for this rotator */
        $id = uniqid("utquote_");
        
        $script = '
        <script type="text/javascript">
        /* <![CDATA[ */
        
        (function($){

            $(document).ready(function(){
                                
                $("#quoteSlider_' . $id . '").flexslider({
                    useCSS: false,  
                    animation: "slide",
                    ' . $autoplay . '
                    ' . $randomize . '
                    directionNav:true,
                    controlNav:false,        
                    smoothHeight: true,
                    animationLoop:true,
                    slideshowSpeed: ' . $speed . ',
                    prevText: "",
                    nextText: ""   
                });
        
            });

        })(jQuery);
        
         /* ]]> */    
        </script>';
        
        $quote_rotator  = '<div class="ut-testimonials ' . $gridwidth . ' ' . $last . '">';    
            $quote_rotator  .= '<div class="ut-rotate-quote-alt flexslider" id="quoteSlider_' . $id . '">';    
                $quote_rotator .= '<ul class="slides">';
                    $quote_rotator .= do_shortcode( $content );
                $quote_rotator .= '</ul>';
            $quote_rotator .= '</div>';
        $quote_rotator .= '</div>';
        
        return $script . $quote_rotator;
            
    }
    
    add_shortcode( 'ut_quote_rotator_alt', 'ut_quote_rotator_alt' );

}

if( !function_exists('ut_quote_alt') ) {

    function ut_quote_alt( $atts, $content ){
        
        extract(shortcode_atts(array(
            'author' => ''
        ), $atts));
        
        $quote = '<li><i class="ut-rq-icon fa fa-quote-right"></i><h2 class="ut-quote-comment">' . do_shortcode( $content ) . '</h2><span class="ut-quote-name">' . $author . '</span></li>';
        
        return $quote;        
        
    }
    
    add_shortcode( 'ut_quote_alt', 'ut_quote_alt' );
    
}


/*
 * Image Animation
 */

if( !function_exists('ut_animate_image') ) {  

    function ut_animate_image( $atts, $content = null ) {
        
        extract(shortcode_atts(array(
                'align'         => 'left',
                'class'         => '',
                'image'         => '',
                'link'          => '',
                'target'        => '_self',
                'alt'           => '',
                'margin_top'    => '',
                'margin_bottom' => '',
                'effect'        => 'fadeIn',
                'animate_once'  => 'no',
                'width'         => '',
                'height'        => ''
            ), $atts));
        
        if( empty($image) ) {
            return esc_html__( 'No Image Selected' , 'ut_shortcodes' );
        }
        
        $extrastyle = NULL;
        
        if( !empty($margin_top) ) {
            $margin_top = str_replace('px','',$margin_top);
            $extrastyle .= 'margin-top:' . $margin_top . 'px; ';
        }
                
        if( !empty($margin_bottom) ) {
            $margin_bottom = str_replace('px','',$margin_bottom);
            $extrastyle .= 'margin-bottom:' . $margin_bottom . 'px; ';
        }
        
        if( !empty($width) ) {
            $width = 'width="' . $width . '"';    
        }
        
        if( !empty($height) ) {
            $height = 'height="' . $height . '"';
        }
                
        $out = '<div style="text-align:' . $align . '; ' . $extrastyle . '">';
            
            if( !empty($link) ) { $out .= '<a target="' . $target . '" href="' . $link . '">'; }            
            
            $out .= '<img alt="' . $alt . '" ' . $width . ' ' . $height  . ' class="ut-animate-image animated ' .  $class  . '" data-animateonce="' . $animate_once . '" data-effecttype="image" data-effect="' . $effect . '" src="' .  $image  . '" />';
            
            if( !empty($link) ) { $out .= '</a>'; }
            
        $out .= '</div>';
                
        return $out;
        
        
    }
    
    add_shortcode('ut_animate_image', 'ut_animate_image');
    
}

/*
 * Helper Shortcode : Displays available atrributes for a shortcode
 */

if( !function_exists('ut_show_atts') ) { 
 
    function ut_show_atts( $atts, $content = null ) {

        extract(shortcode_atts(array(
             'shortcode' => '',
        ), $atts));
        
        include( UT_SHORTCODES_DIR . '/admin/ut.sc.definitions.php');
        
        if( empty($shortcode) ) {
            return false;
        } 
        
        global $ut_shortcodes;
        
        $return = NULL;
        
        if( !empty($ut_shortcodes[$shortcode]['attr']) && is_array($ut_shortcodes[$shortcode]['attr']) ) {
            
            $return = '<table>';
            
            $return .= '<tr>';
                $return .= '<td><h6>Attribute</h6></td>';
                $return .= '<td><h6>Values</h6></td>';
            $return .= '<tr>';
            
            foreach( $ut_shortcodes[$shortcode]['attr'] as $attr => $values ) {
                
                $return .= '<tr>';
                    
                    $return .= '<td>' . $attr . '</td>';
                    
                    /* possible attribute values */
                    if( !empty($values['values']) ) {
                        $return .= '<td>' . esc_html__('value :' , 'ut_shortcodes') . implode(' or ' , $values['values']) . '</td>';
                    }
                    
                    /* hex color */
                    if( isset( $values['type'] ) && $values['type'] == 'colorpicker' ) {
                        $return .= '<td>' . esc_html__('value : color hex' , 'ut_shortcodes') . '</td>';
                    }
                    
                    /* font awesome icon */
                    if( isset( $values['type'] ) && $values['type'] == 'icon' ) {
                        $return .= '<td>' . esc_html__('value : iconname' , 'ut_shortcodes') . ' <a href="http://faq.unitedthemes.com/brooklyn/icon-usage/available-icons/" target="_blank">' . esc_html__('list of icons names' , 'ut_shortcodes') . ' </a></td>';
                    }
                    
                    /* class info */
                    if( $attr == 'class') {
                        $return .= '<td>' . esc_html__('optional CSS class or classes' , 'ut_shortcodes') . '</td>';    
                    }
                    
                    if( isset( $values['type'] ) && $values['type'] == 'input' && $attr != 'class' ) {
                        $return .= '<td>' . esc_html__('value: custom value' , 'ut_shortcodes') . '</td>';    
                    }
                    
                    /* available effects */
                    if( isset( $values['type'] ) && $values['type'] == 'effect' ) {
                        $return .= '<td>' . esc_html__('value : effectname' , 'ut_shortcodes') . ' <a href="http://faq.unitedthemes.com/brooklyn/available-animation-effects/" target="_blank">' . esc_html__('list of effect names' , 'ut_shortcodes') . ' </a></td>';
                    }
                    
                $return .= '</tr>';
                
            }
            
            $return .= '</table>';
        
        }
        
        return $return;
        
    }
    
    add_shortcode('ut_show_atts', 'ut_show_atts');

}