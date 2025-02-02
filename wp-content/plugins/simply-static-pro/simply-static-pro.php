<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Plugin Name:       Simply Static Pro
 * Plugin URI:        https://patrickposner.dev
 * Description:       Enhances Simply Static with GitHub Integration, Forms, Comments and more.
 * Version:           1.6.0
 * Update URI: https://api.freemius.com
 * Author:            Patrick Posner
 * Author URI:        https://patrickposner.dev
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       simply-static-pro
 * Domain Path:       /languages
 */

define( 'SIMPLY_STATIC_PRO_PATH', plugin_dir_path( __FILE__ ) );
define( 'SIMPLY_STATIC_PRO_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );
define( 'SIMPLY_STATIC_PRO_VERSION', '1.6.0' );

// localize.
add_action( 'init', function () {
	$textdomain_dir = plugin_basename( dirname( __FILE__ ) ) . '/languages';
	load_plugin_textdomain( 'simply-static-pro', false, $textdomain_dir );
} );

// load Freemius.
require_once( SIMPLY_STATIC_PRO_PATH . 'inc/setup.php' );

// Install and activate the free version if necessary.
add_action( 'init', function () {
	$options = get_option( 'simply-static' );

	if ( ! class_exists( 'Simply_Static' ) && current_user_can( 'activate_plugins' ) && ! isset( $options['core-installed'] ) ) {
		require_once SIMPLY_STATIC_PRO_PATH . 'src/class-ssp-plugin-installer.php';

		$installer = simply_static_pro\Plugin_Installer::get_instance();
		$installer->install_package_from_wp_org( 'simply-static' );

		// Then activate
		activate_plugin( 'simply-static/simply-static.php' );

		// Update option.
		$options['core-installed'] = true;
		update_option( 'simply-static', $options );
	}
} );

// Bootmanager for Simply Static Pro plugin.
if ( ! function_exists( 'ssp_run_plugin' ) ) {

	// autoload files.
	if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
		require __DIR__ . '/vendor/autoload.php';
	}

	add_action( 'plugins_loaded', 'ssp_run_plugin');

	/**
	 * Run plugin
	 *
	 * @return void
	 */
	function ssp_run_plugin() {
		if ( function_exists( 'simply_static_run_plugin' ) ) {
			if ( ssp_fs()->is_plan_or_trial__premium_only( 'pro' ) ) {
				// We need the task class from Simply Static to integrate our job.
				require_once SIMPLY_STATIC_PATH . 'src/tasks/traits/trait-can-process-pages.php';
				require_once SIMPLY_STATIC_PATH . 'src/tasks/traits/trait-can-transfer.php';
				require_once SIMPLY_STATIC_PATH . 'src/tasks/class-ss-task.php';
				require_once SIMPLY_STATIC_PATH . 'src/tasks/class-ss-fetch-urls-task.php';
				require_once SIMPLY_STATIC_PATH . 'src/class-ss-plugin.php';
				require_once SIMPLY_STATIC_PATH . 'src/class-ss-util.php';

				// Helper.
				require_once SIMPLY_STATIC_PRO_PATH . 'src/class-ssp-helper.php';
				simply_static_pro\Helper::get_instance();

				// Filter.
				require_once SIMPLY_STATIC_PRO_PATH . 'src/class-ssp-filter.php';
				simply_static_pro\Filter::get_instance();

				// Deployment.
				require_once SIMPLY_STATIC_PRO_PATH . 'src/deployment/github/class-ssp-github-repository.php';
				require_once SIMPLY_STATIC_PRO_PATH . 'src/deployment/github/class-ssp-github-database.php';
				require_once SIMPLY_STATIC_PRO_PATH . 'src/deployment/github/class-ssp-github-commit-task.php';
				require_once SIMPLY_STATIC_PRO_PATH . 'src/deployment/bunny-cdn/class-ssp-bunny-updater.php';
				require_once SIMPLY_STATIC_PRO_PATH . 'src/deployment/bunny-cdn/class-ssp-bunny-deploy-task.php';
				require_once SIMPLY_STATIC_PRO_PATH . 'src/deployment/tiiny-host/class-ssp-tiiny-updater.php';
				require_once SIMPLY_STATIC_PRO_PATH . 'src/deployment/tiiny-host/class-ssp-tiiny-deploy-task.php';
				require_once SIMPLY_STATIC_PRO_PATH . 'src/deployment/aws-s3/class-ssp-s3-client.php';
				require_once SIMPLY_STATIC_PRO_PATH . 'src/deployment/aws-s3/class-ssp-aws-deploy-task.php';
				require_once SIMPLY_STATIC_PRO_PATH . 'src/deployment/aws-s3/class-ssp-aws-empty-task.php';
				require_once SIMPLY_STATIC_PRO_PATH . 'src/deployment/sftp/class-ssp-sftp-deploy-task.php';
				require_once SIMPLY_STATIC_PRO_PATH . 'src/deployment/sftp/class-ssp-sftp.php';

				// Builds.
				require_once SIMPLY_STATIC_PRO_PATH . 'src/build/class-ssp-build-settings.php';
				require_once SIMPLY_STATIC_PRO_PATH . 'src/build/class-ssp-build-meta.php';
				require_once SIMPLY_STATIC_PRO_PATH . 'src/build/class-ssp-build.php';

				simply_static_pro\Build_Settings::get_instance();
				simply_static_pro\Build_Meta::get_instance();
				simply_static_pro\Build::get_instance();

				// Single.
				require_once SIMPLY_STATIC_PRO_PATH . 'src/single/class-ssp-single-meta.php';
				require_once SIMPLY_STATIC_PRO_PATH . 'src/single/class-ssp-single.php';

				simply_static_pro\Single_Meta::get_instance();
				simply_static_pro\Single::get_instance();

				// Forms.
				require_once SIMPLY_STATIC_PRO_PATH . 'src/form/class-ssp-form-settings.php';
				require_once SIMPLY_STATIC_PRO_PATH . 'src/form/class-ssp-form-template-handler.php';
				require_once SIMPLY_STATIC_PRO_PATH . 'src/form/class-ssp-form-meta.php';
				require_once SIMPLY_STATIC_PRO_PATH . 'src/form/class-ssp-form-webhook.php';

				simply_static_pro\Form_Settings::get_instance();
				simply_static_pro\Form_Template_Handler::get_instance();
				simply_static_pro\Form_Meta::get_instance();
				simply_static_pro\Form_Webhook::get_instance();

				// Comments.
				require_once SIMPLY_STATIC_PRO_PATH . 'src/comment/class-ssp-comment.php';
				simply_static_pro\Comment::get_instance();

				// Cors.
				require_once SIMPLY_STATIC_PRO_PATH . 'src/cors/class-ssp-cors.php';

				simply_static_pro\CORS::get_instance();

				// iFrame.
				require_once SIMPLY_STATIC_PRO_PATH . 'src/iframe/class-ssp-iframe.php';

				simply_static_pro\Iframe::get_instance();

				// Search.
				require_once SIMPLY_STATIC_PRO_PATH . 'src/search/class-ssp-search-algolia.php';
				require_once SIMPLY_STATIC_PRO_PATH . 'src/search/class-ssp-search-fuse.php';
				require_once SIMPLY_STATIC_PRO_PATH . 'src/search/class-ssp-search-task.php';

				simply_static_pro\Search_Algolia::get_instance();
				simply_static_pro\Search_Fuse::get_instance();

				if ( \defined( 'WP_CLI' ) && \WP_CLI ) {
					require_once SIMPLY_STATIC_PRO_PATH . 'src/wp-cli/class-ssp-commands.php';
					new simply_static_pro\commands\Commands();
				}

				// Minifer.
				require_once SIMPLY_STATIC_PRO_PATH . 'src/minifier/class-ssp-minify-task.php';
				require_once SIMPLY_STATIC_PRO_PATH . 'src/minifier/class-ssp-minifer-interface.php';
				require_once SIMPLY_STATIC_PRO_PATH . 'src/minifier/class-ssp-minifer-css.php';
				require_once SIMPLY_STATIC_PRO_PATH . 'src/minifier/class-ssp-minifer-js.php';
				require_once SIMPLY_STATIC_PRO_PATH . 'src/minifier/class-ssp-minifer-html.php';

				// Optimize
				require_once SIMPLY_STATIC_PRO_PATH . 'src/optimize/class-ssp-optimize-directories.php';
				require_once SIMPLY_STATIC_PRO_PATH . 'src/optimize/class-ssp-shortpixel-task.php';
				require_once SIMPLY_STATIC_PRO_PATH . 'src/optimize/class-ssp-shortpixel-download-task.php';

				// Misc
				require_once SIMPLY_STATIC_PRO_PATH . 'src/misc/class-ssp-basic-auth.php';

				new \simply_static_pro\Basic_Auth();

				add_action( 'ss_integrations_before_load', 'ssp_include_pro_integrations' );
				add_action( 'simply_static_integrations', 'ssp_register_integrations' );
			} else {
				// Disable basic auth filter.
				require_once SIMPLY_STATIC_PATH . 'src/class-ss-plugin.php';

				$plugin = Simply_Static\Plugin::instance();
				remove_filter( 'http_request_args', array( $plugin, 'add_http_filters' ) );
			}

			if ( defined( 'SIMPLY_STATIC_VERSION' ) && version_compare( SIMPLY_STATIC_VERSION, '3.1.8', '<' ) ) {
				add_action(
					'admin_notices',
					function () {
						$message = esc_html__( 'You need to update Simply Static to version 3.1.8 before continuing to use Simply Static Pro, as we made significant changes requiring an upgrade.', 'simply-static-pro' );
						echo wp_kses_post( '<div class="notice notice-error"><p>' . $message . '</p></div>' );
					}
				);
			}
		}
	}
}

/**
 * Include pro integrations.
 *
 * @return void
 */
function ssp_include_pro_integrations() {
	require_once trailingslashit( SIMPLY_STATIC_PRO_PATH ) . 'src/integrations/class-ssp-multilingual.php';
	require_once trailingslashit( SIMPLY_STATIC_PRO_PATH ) . 'src/integrations/class-ssp-github.php';
	require_once trailingslashit( SIMPLY_STATIC_PRO_PATH ) . 'src/integrations/class-ssp-shortpixel.php';
	require_once trailingslashit( SIMPLY_STATIC_PRO_PATH ) . 'src/integrations/class-ssp-redirection.php';
	require_once trailingslashit( SIMPLY_STATIC_PRO_PATH ) . 'src/integrations/class-ssp-complianz.php';
}

/**
 * Register integrations.
 *
 * @param array $integrations List of integrations.
 *
 * @return array
 */
function ssp_register_integrations( array $integrations ): array {
	$integrations['multilingual'] = simply_static_pro\SS_Multilingual::class;
	$integrations['github']       = simply_static_pro\Github::class;
	$integrations['shortpixel']   = simply_static_pro\Shortpixel::class;
	$integrations['complianz']    = simply_static_pro\Complianz_Integration::class;
	$integrations['redirection']  = \simply_static_pro\Redirection_Integration::class;
	return $integrations;
}

add_action( 'rest_api_init', 'ssp_rest_api_init' );

function ssp_rest_api_init() {
	register_rest_route( 'simplystatic/v1', '/shortpixel-restore', array(
		'methods'             => 'POST',
		'callback'            => function () {
			set_time_limit( 3600 );
			/** @var \simply_static_pro\Shortpixel $shortpixel */
			$shortpixel = \Simply_Static\Plugin::instance()->get_integration( 'shortpixel' );
			$shortpixel->restore_all_backups();

			return json_encode( [ 'status' => 200, 'message' => __( 'Restored backups', 'simple-static-pro' ) ] );
		},
		'permission_callback' => function () {
			return current_user_can( apply_filters( 'ss_user_capability', 'manage_options', 'shortpixel-restore' ) );
		},
	) );
}
