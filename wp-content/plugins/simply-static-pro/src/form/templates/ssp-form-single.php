<?php
get_header();

// Get related metadata.
$post_id = get_the_ID();
$meta    = array(
	'form_type'            => get_post_meta( $post_id, 'form_type', true ),
	'form_installation'    => get_post_meta( $post_id, 'form_installation', true ),
	'form_plugin'          => get_post_meta( $post_id, 'form_plugin', true ),
	'form_id'              => get_post_meta( $post_id, 'form_id', true ),
	'form_shortcode'       => get_post_meta( $post_id, 'form_shortcode', true ),
	'form_custom_css'      => get_post_meta( $post_id, 'form_custom_css', true ),
	'form_success_message' => get_post_meta( $post_id, 'form_success_message', true ),
	'form_error_message'   => get_post_meta( $post_id, 'form_error_message', true ),
	'form_use_redirect'    => get_post_meta( $post_id, 'form_use_redirect', true ),
	'form_redirect_url'    => get_post_meta( $post_id, 'form_redirect_url', true ),
);

?>
    <div class="ssp-form-embed">
		<?php if ( ! empty( $meta['form_type'] ) && 'embedded' === $meta['form_type'] ) : ?>
			<?php if ( ! empty( $meta['form_shortcode'] ) ) : ?>
				<?php echo do_shortcode( $meta['form_shortcode'] ); ?>
			<?php endif; ?>
		<?php else: ?>
            <p><?php esc_html_e( 'You have configured a webhook, this template will not be used.', 'simply-static-pro' ); ?></p>
		<?php endif; ?>
        <style>
            html {
                margin: 0 !important;
            }

            header, footer, #footer, #header, #wpadminbar {
                display: none !important;
            }

            <?php if ( ! empty( $meta['form_custom_css'] ) ) : ?>
            <?php echo wp_kses_post( $meta['form_custom_css'] ); ?>
            <?php endif; ?>
        </style>
    </div>
<?php
get_footer();
