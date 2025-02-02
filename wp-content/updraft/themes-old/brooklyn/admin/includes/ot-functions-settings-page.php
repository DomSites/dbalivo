<?php if ( ! defined( 'OT_VERSION' ) ) exit( 'No direct script access allowed' );

/**
 * Import Data option type.
 *
 * @return    string
 *
 * @access    public
 * @since     2.0
 */

if ( ! function_exists( 'ot_type_import_data' ) ) {
  
  function ot_type_import_data() {
    
    echo '<form method="post" id="import-data-form">';
      
      /* form nonce */
      wp_nonce_field( 'import_data_form', 'import_data_nonce' );
        
      /* format setting outer wrapper */
      echo '<div class="format-setting type-textarea has-desc">';
        
        /* description */
        echo '<div class="description">';
          
          if ( OT_SHOW_SETTINGS_IMPORT ) echo '<p>' . __( 'Only after you\'ve imported the Settings should you try and update your Theme Options.', 'option-tree' ) . '</p>';
          
          echo '<p>' . __( 'To import your Theme Options copy and paste what appears to be a random string of alpha numeric characters into this textarea and press the "Import Theme Options" button.', 'option-tree' ) . '</p>';
          
          /* button */
          echo '<button class="ut-ui-button blue right hug-right">' . __( 'Import Theme Options', 'option-tree' ) . '</button>';
          
        echo '</div>';
        
        /* textarea */
        echo '<div class="format-setting-inner">';
          
          echo '<textarea rows="10" cols="40" name="import_data" id="import_data" class="textarea"></textarea>';

        echo '</div>';
        
      echo '</div>';
    
    echo '</form>';
    
  }
  
}

/**
 * Export Data option type.
 *
 * @return    string
 *
 * @access    public
 * @since     2.0
 */

if ( ! function_exists( 'ot_type_export_data' ) ) {
  
  function ot_type_export_data() {
    
    /* format setting outer wrapper */
    echo '<div class="format-setting type-textarea simple has-desc">';
      
      /* get theme options data */
      $data = get_option( 'option_tree' );
      $data = ! empty( $data ) ? ot_encode( serialize( $data ) ) : '';
        
      echo '<div class="format-setting-inner">';
        echo '<textarea rows="10" cols="40" style="width:100%;" name="export_data" id="export_data" class="textarea">' . $data . '</textarea>';
      echo '</div>';
      
    echo '</div>';
    
  }
  
}

/* End of file ot-functions-settings-page.php */
/* Location: ./includes/ot-functions-settings-page.php */