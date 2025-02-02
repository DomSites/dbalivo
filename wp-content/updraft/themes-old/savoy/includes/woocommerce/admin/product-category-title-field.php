<?php
	/*
	 *	WooCommerce product category: Custom "Categories Grid" title field
	 */
	
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}
	
	
	/* Product category - Add: Include "Categories Grid" title field */
	function nm_product_category_add_title_field() {
		?>
        <div class="form-field nm-term-title-wrap">
            <label for="nm_categories_description"><?php esc_html_e( 'Categories Grid Title', 'nm-framework' ); ?></label>
            <input type="text" id="nm-categories-description" name="nm_categories_description" value="" size="40">
            <p><?php esc_html_e( 'Enter a custom title to display in the "Product Categories" element.','nm-framework' ); ?></p>
        </div>
	<?php
	}
	add_action( 'product_cat_add_form_fields', 'nm_product_category_add_title_field', 10, 2 );
	
	
	/* Product category - Edit: Include "Categories Grid" title field */
	function nm_product_category_add_edit_title_field( $term ) {
		// Get custom field's saved data
		$saved_data = get_option( 'nm_taxonomy_product_cat_' . $term->term_id . '_description' ); ?>
        
        <tr class="form-field nm-term-title-wrap">
			<th scope="row"><label for="nm_categories_description"><?php esc_html_e( 'Categories Grid Title', 'nm-framework' ); ?></label></th>
			<td>
                <input type="text" id="nm-categories-description" name="nm_categories_description" value="<?php echo ( $saved_data ) ? esc_attr( $saved_data ) : '' ;?>" size="40" aria-required="true">
                <p class="description"><?php esc_html_e( 'Enter a custom title to display in the "Product Categories" element.','nm-framework' ); ?></p>
			</td>
		</tr>
	<?php
	}
	add_action( 'product_cat_edit_form_fields', 'nm_product_category_add_edit_title_field', 10, 2 );
	
	
	/* Product category - Save: Save "Categories Grid" title field data */
	function nm_product_categories_save_title_field( $term_id ) {
		if ( isset( $_POST['nm_categories_description'] ) ) {
            // Escape data before saving
			$data = stripslashes_deep( esc_html( $_POST['nm_categories_description'] ) );
            
            // Save custom field data
			update_option( 'nm_taxonomy_product_cat_' . $term_id . '_description', $data );
		}
	}
	add_action( 'create_product_cat', 'nm_product_categories_save_title_field', 10, 2 );
	add_action( 'edited_product_cat', 'nm_product_categories_save_title_field', 10, 2 );
	