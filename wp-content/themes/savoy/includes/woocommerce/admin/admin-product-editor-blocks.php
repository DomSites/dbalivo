<?php
/**
 * WooCommerce Product Editor: Custom blocks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

use Automattic\WooCommerce\Admin\BlockTemplates\BlockInterface;

if ( ! function_exists( 'YOUR_PREFIX_add_block' ) ) {
    /**
     * Add a new block to the template after the product description field.
     *
     * @param BlockInterface $product_name_field The product name block.
     */
    function nm_product_editor_description_add_blocks( BlockInterface $product_name_field ) {
        $parent = $product_name_field->get_parent();
        
        if ( ! method_exists( $parent, 'add_block' ) ) {
            return;
        }
        
        // Block - Text field: Featured video URl
        $parent->add_block(
            [
                'id'         => 'nm-product-editor-featured-video-url',
                'order'      => $product_name_field->get_order() + 5,
                'blockName'  => 'woocommerce/product-text-field',
                'attributes' => [
                    'property' => 'meta_data.nm_product_editor_featured_video_url',
                    'label'    => __( 'Featured Video URL (YouTube or Vimeo)', 'nm-framework-admin' ),
                ],
            ]
        );
    }
    
    add_action( 'woocommerce_block_template_area_product-form_after_add_block_product-description', 'nm_product_editor_description_add_blocks' );
}
