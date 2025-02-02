<?php

namespace simply_static_pro;

use Simply_Static\Integration;
use simply_static_pro\integrations\Github\API;
use simply_static_pro\integrations\Github\Database_API;
use simply_static_pro\integrations\Github\Rate_Limit_API;
use simply_static_pro\integrations\Github\Repository_API;
use WPML\ICLToATEMigration\Data;

class Github extends Integration {

	protected $id = 'github';

	protected $always_active = true;

	public function __construct() {
		$this->name = __( 'Github', 'simply-static' );
		$this->description = __( 'Used when deploying the exported sites to Github', 'simply-static' );
	}

	/**
	 * Get a Personal Access Token.
	 *
	 * @return mixed|null
	 */
	public function get_personal_access_token() {
		return $this->get_option( 'github_personal_access_token' );
	}

	/**
	 * Get Option.
	 *
	 * @param string $option Option key.
	 *
	 * @return mixed|null
	 */
	public function get_option( $option ) {
		$options = $this->get_options();
		return ! empty( $options[ $option ] ) ? $options[ $option ] : null;
	}

	/**
	 * Get Options.
	 *
	 * @return false|mixed|null
	 */
	public function get_options() {
		return get_option( 'simply-static', [] );
	}

	/**
	 * Run.
	 *
	 * @return void
	 */
	public function run() {
		require_once 'github/class-api.php';
		require_once 'github/class-repository-api.php';
		require_once 'github/class-database-api.php';
		require_once 'github/class-rate-limit-api.php';
	}

	/**
	 * Get the API
	 *
	 * @param string $api API to get.
	 *
	 * @return API|Database_API|Repository_API
	 */
	public function api( $api ) {
		$token  = $this->get_personal_access_token();
		$object = new API();

		switch ( $api ) {
			case 'repo':
				$object = new Repository_API();
				break;
			case 'data':
				$object = new Database_API();
				break;
			case 'limit':
				$object = new Rate_Limit_API();
				break;
		}

		$object->set_token( $token );
		return $object;
	}
}