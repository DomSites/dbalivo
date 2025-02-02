<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Split_Section' ) ) {
	
    class UT_Split_Section {
        
        private $shortcode;
        private $inner_shortcode;
            
        function __construct() {
			
            /* shortcode base */
            $this->shortcode       = 'ut_split_section';
            $this->inner_shortcode = 'ut_split_inner_section';
            
            add_action( 'init', array( $this, 'ut_map_shortcode' ) );
            add_shortcode( $this->shortcode, array( $this, 'ut_create_shortcode' ) );
            add_shortcode( $this->inner_shortcode, array( $this, 'ut_create_inner_shortcode' ) );	
            
		}
        
        function ut_map_shortcode( $atts, $content = NULL ) {
            
            if( function_exists( 'vc_map' ) ) {
                                
                vc_map(
                    array(
                        'name'            => esc_html__( 'Split Section', 'ut_shortcodes' ),
                        'base'            => $this->shortcode,
                        'category'        => 'Brooklyn ( 4.0 )',
                        'as_parent'       => array(
                            'only' => $this->inner_shortcode,
                        ),
                        'content_element' => true,
                        'is_container'    => true,
                        'js_view'         => 'VcRowView',
                        'default_content_in_template' => '[ut_split_inner_section][/ut_split_inner_section]',
                        'params'          => array(
                            
                            
                                
                        )                        
                        
                    )
                
                ); /* end mapping */
                
                vc_map(
                    array(
                        'name'            => esc_html__( 'Split Section Part', 'ut_shortcodes' ),
                        'base'            => $this->inner_shortcode,
                        'as_parent'       => array(
                            'except' => 'vc_row',
                             $this->inner_shortcode                            
                        ),
                        'js_view'        => 'VcColumnView',
                        'params'          => array(
                        
                        )
                    )
                    
                ); /* end mapping */               
                
            } 
        
        }
        
        function ut_create_shortcode( $atts, $content = NULL ) {
            
            extract( shortcode_atts( array (

            ), $atts ) ); 
            
            /* start output */
            $output = '';
        

                
            return $output;
        
        }
        
        function ut_create_inmner_shortcode( $atts, $content = NULL ) {
            
            extract( shortcode_atts( array (

            ), $atts ) ); 
            
            /* start output */
            $output = '';
        

                
            return $output;
        
        }        
            
    }

}

new UT_Split_Section;

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    
    class WPBakeryShortCode_ut_split_section extends WPBakeryShortCode {
        
        protected $predefined_atts = array(
            'el_class' => ''
        );
    
        protected function content($atts, $content = null) {
            $prefix = '';
            return $prefix . $this->loadTemplate( $atts, $content );
        }
        
        public function customAdminBockParams() {
            return '';
        }
        
        
        public function getLayoutsControl() {
                
                /* no layout control */    
            
        }
        
        public function getColumnControls($controls, $extended_css = '') {
            
            $output = '<div class="vc_controls vc_controls-row controls controls_row vc_clearfix">';
            $controls_end = '</div>';
            
            //Create columns
            $controls_layout = $this->getLayoutsControl();
            
            $controls_move = ' <a class="vc_control column_move vc_column-move" href="#" title="' . __('Drag Split Section to reorder', 'ut_shortcodes') . '" data-vc-control="move"><i class="vc_icon"></i></a>';
            $controls_add = ' <a class="vc_control column_add vc_column-add" href="#" title="' . __('Add column', 'ut_shortcodes') . '" data-vc-control="add"><i class="vc_icon"></i></a>';
            $controls_delete = '<a class="vc_control column_delete vc_column-delete" href="#" title="' . __('Delete this Split Section', 'ut_shortcodes') . '" data-vc-control="delete"><i class="vc_icon"></i></a>';
            $controls_edit = ' <a class="vc_control column_edit vc_column-edit" href="#" title="' . __('Edit this Split Section', 'ut_shortcodes') . '" data-vc-control="edit"><i class="vc_icon"></i></a>';
            $controls_clone = ' <a class="vc_control column_clone vc_column-clone" href="#" title="' . __('Clone this Split Section', 'ut_shortcodes') . '" data-vc-control="clone"><i class="vc_icon"></i></a>';
            $controls_toggle = ' <span class="vc_control vc_row_section_mark" title="">Split Section</span><a class="vc_control column_toggle vc_column-toggle" href="#" title="' . __('Toggle Split Section', 'ut_shortcodes') . '" data-vc-control="toggle"><i class="vc_icon"></i></a>';
            if (is_array($controls) && !empty($controls)) {
                foreach ($controls as $control) {
                    $control_var = 'controls_' . $control;
                    $output.= $$control_var;
                }
                $output.= $controls_end;
            } 
            elseif (is_string($controls)) {
                $control_var = 'controls_' . $controls;
                $output.= $$control_var . $controls_end;
            } 
            else {
                $row_edit_clone_delete = '<span class="vc_row_edit_clone_delete">';
                $row_edit_clone_delete.= $controls_delete . $controls_clone . $controls_edit . $controls_toggle;
                $row_edit_clone_delete.= '</span>';
                
                //$column_controls_full =  $controls_start. $controls_move . $controls_center_start . $controls_layout . $controls_delete . $controls_clone . $controls_edit . $controls_center_end . $controls_end;
                $output.= $controls_move . $controls_layout . $controls_add . $row_edit_clone_delete . $controls_end;
            }
            return $output;
        }
        
        public function contentAdmin($atts, $content = null) {
            $width = $el_class = '';
            extract(shortcode_atts($this->predefined_atts, $atts));
            
            $output = '';
            
            $column_controls = $this->getColumnControls($this->settings('controls'));
            
            for ($i = 0; $i < count($width); $i++) {
                $output.= '<div' . $this->customAdminBockParams() . ' data-element_type="' . $this->settings["base"] . '" class="' . $this->cssAdminClass() . '">';
                $output.= str_replace("%column_size%", 1, $column_controls);
                $output.= '<div class="wpb_element_wrapper">';
                $output.= '<div class="vc_row vc_row-fluid wpb_row_container vc_container_for_children">';
                
                if ($content == '' && !empty($this->settings["default_content_in_template"])) {
                    $output.= do_shortcode(shortcode_unautop($this->settings["default_content_in_template"]));
                } 
                
                else {
                    $output.= do_shortcode(shortcode_unautop($content));
                }
                
                $output.= '</div>';
                if (isset($this->settings['params'])) {
                    $inner = '';
                    foreach ($this->settings['params'] as $param) {
                        $param_value = isset($$param['param_name']) ? $$param['param_name'] : '';
                        if (is_array($param_value)) {
                            
                            // Get first element from the array
                            reset($param_value);
                            $first_key = key($param_value);
                            $param_value = $param_value[$first_key];
                        }
                        $inner.= $this->singleParamHtmlHolder($param, $param_value);
                    }
                    $output.= $inner;
                }
                $output.= '</div>';
                $output.= '</div>';
            }
            
            return $output;
        }
        
        public function cssAdminClass() {
            return 'wpb_' . $this->settings['base'] . ' wpb_sortable';
        }
    
        
    }
    
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    
    class WPBakeryShortCode_ut_split_inner_section extends WPBakeryShortCodesContainer {
        
    }
    
}