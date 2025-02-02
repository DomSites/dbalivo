<?php

namespace simply_static_pro;

/**
 * Class to handle meta for builds.
 */
class Build_Meta {
	/**
	 * Contains instance or null
	 *
	 * @var object|null
	 */
	private static $instance = null;

	/**
	 * Returns instance of Build_Meta.
	 *
	 * @return object
	 */
	public static function get_instance() {

		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Constructor for Build_Meta.
	 */
	public function __construct() {
		add_action( 'ssp-build_add_form_fields', array( $this, 'add_build_fields' ) );
		add_action( 'ssp-build_edit_form_fields', array( $this, 'edit_build_fields' ), 10, 2 );
		add_action( 'created_ssp-build', array( $this, 'save_build_fields' ) );
		add_action( 'edited_ssp-build', array( $this, 'save_build_fields' ) );
		add_filter( 'manage_edit-ssp-build_columns', array( $this, 'modify_build_columns' ) );
		add_filter( 'manage_ssp-build_custom_column', array( $this, 'modify_build_columns_content' ), 10, 3 );
	}

	/**
	 * Add builds meta fields to new build.
	 *
	 * @param object $taxonomy current taxonomy.
	 *
	 * @return void
	 */
	public function add_build_fields( $taxonomy ) {
		?>
        <div class="form-field">
            <label for="additional-urls"><?php esc_html_e( 'URLs', 'simply-static-pro' ); ?></label>
            <textarea rows="5" cols="10" name="additional-urls" id="additional-urls"></textarea>
            <p><?php esc_html_e( 'Add URLs you want to export or delete here (one per line). Simply Static will export or delete those URLs on your static site.', 'simply-static-pro' ); ?></p>
        </div>
        <div class="form-field">
            <label for="additional-files"><?php esc_html_e( 'Files and Directories', 'simply-static-pro' ); ?></label>
            <textarea rows="5" cols="10" name="additional-files" id="additional-files"></textarea>
            <p><?php esc_html_e( 'Add paths to files or directories (one per line). Simply Static will export or delete those files and directories on your static site.', 'simply-static-pro' ); ?></p>
            <p><?php echo sprintf( esc_html__( 'Example: %s', 'simply-static-pro' ), '<code>' . esc_html( trailingslashit( WP_CONTENT_DIR ) ) . esc_html__( 'my-file.pdf', 'simply-static-pro' ) ) . '</code>'; ?></p>
            <p>
                <span style="background: #7200e5;color:white;padding:2px 5px;border-radius:5px;font-size:smaller;text-transform:uppercase;margin-right: 2px;">Beta</span>
				<?php echo sprintf( esc_html__( 'Wildcard Example: %s', 'simply-static-pro' ), '<code>' . esc_html( trailingslashit( home_url() ) ) . esc_html__( 'simple-*', 'simply-static-pro' ) ) . '</code>'; ?>
				<?php esc_html_e( 'This will try to find all pages that match that in URL', 'simply-static-pro' ); ?>
            </p>

        </div>
        <div class="form-field">
            <label for="export-assets"><?php esc_html_e( 'Export Assets', 'simply-static-pro' ); ?></label>
            <p>
                <input type="checkbox" value="1" name="export-assets" id="export-assets"/>
				<?php esc_html_e( 'Export Assets such as CSS, JS and images found on page.', 'simply-static-pro' ); ?>
            </p>
        </div>
		<?php
	}


	/**
	 * Add meta to edit build.
	 *
	 * @param object $build current build.
	 * @param object $taxonomy current taxonomy.
	 *
	 * @return void
	 */
	public function edit_build_fields( $build, $taxonomy ) {
		$additional_urls  = get_term_meta( $build->term_id, 'additional-urls', true );
		$additional_files = get_term_meta( $build->term_id, 'additional-files', true );
		$export_assets    = get_term_meta( $build->term_id, 'export-assets', true );
		?>
        <tr class="form-field">
            <th>
                <label for="additional-urls"><?php esc_html_e( 'URLs', 'simply-static-pro' ); ?></label>
            </th>
            <td>
                <textarea rows="5" cols="10" name="additional-urls"
                          id="additional-urls"><?php echo $additional_urls; ?></textarea>
                <p><?php esc_html_e( 'Add URLs you want to export or delete here (one per line). Simply Static will export or delete those URLs on your static site.', 'simply-static-pro' ); ?></p>
                <p>
                    <span style="background: #7200e5;color:white;padding:2px 5px;border-radius:5px;font-size:smaller;text-transform:uppercase;margin-right: 2px;">Beta</span>
					<?php echo sprintf( esc_html__( 'Wildcard Example: %s', 'simply-static-pro' ), '<code>' . esc_html( trailingslashit( home_url() ) ) . esc_html__( 'simple-*', 'simply-static-pro' ) ) . '</code>'; ?>
					<?php esc_html_e( 'This will try to find all pages that match that in URL', 'simply-static-pro' ); ?>
                </p>
            </td>
        </tr>
        <tr class="form-field">
            <th>
                <label for="additional-files"><?php esc_html_e( 'Files and Directories', 'simply-static-pro' ); ?></label>
            </th>
            <td>
                <textarea rows="5" cols="10" name="additional-files"
                          id="additional-files"><?php echo $additional_files; ?></textarea>
                <p><?php esc_html_e( 'Add paths to files or directories (one per line). Simply Static will export or delete those files and directories on your static site.', 'simply-static-pro' ); ?></p>
                <p><?php echo sprintf( esc_html__( 'Example: %s', 'simply-static-pro' ), '<code>' . esc_html( trailingslashit( WP_CONTENT_DIR ) ) . esc_html__( 'my-file.pdf', 'simply-static-pro' ) ) . '</code>'; ?></p>
            </td>
        </tr>
        <tr class="form-field">
            <th>
                <label for="export-assets"><?php esc_html_e( 'Export Assets', 'simply-static-pro' ); ?></label>
            </th>
            <td>
                <p>
                    <input type="checkbox" value="1" name="export-assets"
                           id="export-assets" <?php checked( $export_assets, '1', true ); ?> />
					<?php esc_html_e( 'Export Assets such as CSS, JS and images found on page.', 'simply-static-pro' ); ?>
                </p>
            </td>
        </tr>
		<?php
	}

	/**
	 * Update build meta field.
	 *
	 * @param int $build_id current build id.
	 *
	 * @return void
	 */
	public function save_build_fields( $build_id ) {
		update_term_meta( $build_id, 'additional-urls', $_POST['additional-urls'] );
		update_term_meta( $build_id, 'additional-files', $_POST['additional-files'] );
		update_term_meta( $build_id, 'export-assets', isset( $_POST['export-assets'] ) ? '1' : '0' );
	}

	/**
	 * Add shortcode to columns for filr-lists.
	 *
	 * @param array $columns new columns to add.
	 *
	 * @return array
	 */
	public function modify_build_columns( $columns ) {
		$columns = array(
			'cb'       => '<input type="checkbox" />',
			'name'     => __( 'Name', 'simply-static-pro' ),
			'generate' => __( 'Static Site Actions', 'simply-static-pro' ),
		);

		return $columns;
	}

	/**
	 * Add content to shortcode column.
	 *
	 * @param string $value current value.
	 * @param string $name name of column.
	 * @param int $term_id current id.
	 *
	 * @return string
	 */
	public function modify_build_columns_content( $value, $name, $term_id ) {
		switch ( $name ) {
			case 'generate':
				?>
                <div class="build-actions">
                    <p id="export-file-container">
                        <a href="#" class="generate-build button button-primary"
                           data-term-id="<?php echo esc_html( $term_id ); ?>"><?php esc_html_e( 'Export Static', 'simply-static-pro' ); ?></a>
                        <span class="spinner"></span>
                    </p>
                    <p></p>
                    <a href="#" class="delete-build button button-secondary"
                       data-term-id="<?php echo esc_html( $term_id ); ?>"><?php esc_html_e( 'Delete Static', 'simply-static-pro' ); ?></a>
                    </p>
                </div>
                <style>
                    .build-actions {
                        max-width: 150px;
                    }
                </style>
				<?php
				break;
		}
	}
}
