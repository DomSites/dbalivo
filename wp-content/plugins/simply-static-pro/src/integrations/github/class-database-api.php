<?php

namespace simply_static_pro\integrations\Github;

class Database_API extends API {

	public function create_blob( $owner, $repository, $content, $encoding ) {
		$resource = 'repos/' . rawurlencode( $owner ) . '/' . rawurlencode( $repository ) . '/git/blobs';

		return $this->post( $resource, [
			'content'  => $content,
			'encoding' => $encoding
		] );
	}

	public function get_tree( $owner, $repository, $sha ) {
		$resource = 'repos/' . rawurlencode( $owner ) . '/' . rawurlencode( $repository ) . '/git/trees/' . rawurlencode( $sha );

		return $this->get( $resource );
	}

	public function create_tree( $owner, $repository, $base_tree, $tree ) {
		$resource = 'repos/' . rawurlencode( $owner ) . '/' . rawurlencode( $repository ) . '/git/trees';

		$data = [
			'tree' => $tree
		];

		if ( $base_tree ) {
			$data['base_tree'] = $base_tree;
		}

		return $this->post( $resource, $data );
	}

	public function commit( $owner, $repository, $data ) {
		$resource = 'repos/' . rawurlencode( $owner ) . '/' . rawurlencode( $repository ) . '/git/commits';

		return $this->post( $resource, $data );
	}

	public function update_reference( $owner, $repository, $ref, $data ) {
		$resource = 'repos/' . rawurlencode( $owner ) . '/' . rawurlencode( $repository ) . '/git/refs/' . $ref;

		return $this->patch( $resource, $data );
	}
}