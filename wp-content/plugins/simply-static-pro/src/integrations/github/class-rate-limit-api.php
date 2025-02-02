<?php

namespace simply_static_pro\integrations\Github;

class Rate_Limit_API extends API {

	protected $limits = null;

	public function get_limits( $force = false ) {

		if ( $force ) {
			$this->limits = null;
		}

		if ( null === $this->limits ) {
			$this->limits = $this->get( 'rate_limit' );
		}

		return $this->limits;
	}

	public function get_resources() {
		$limits = $this->get_limits();

		return $limits['resources'] ?? [];
	}

	public function get_core() {
		$resources = $this->get_resources();

		return $resources['core'] ?? [];
	}

	public function get_core_data( $data ) {
		$core = $this->get_core();

		return $core[ $data ] ?? false;

	}
}