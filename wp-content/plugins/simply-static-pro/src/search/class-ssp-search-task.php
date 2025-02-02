<?php

namespace simply_static_pro;

use Exception;
use Simply_Static;
use Simply_Static\Options;
use Simply_Static\Page;
use Simply_Static\Url_Fetcher;
use Simply_Static\Util;
use voku\helper\HtmlDomParser;

/**
 * Class which handles Search indexing task.
 */
class Search_Task extends Simply_Static\Task {
	/**
	 * The task name.
	 *
	 * @var string
	 */
	protected static $task_name = 'search';

	/**
	 * Given start time for the export.
	 *
	 * @var string
	 */
	private $start_time;

	/**
	 * Temp directory.
	 *
	 * @var string
	 */
	private string $temp_dir;

	/**
	 * Search instance.
	 *
	 * @var object
	 */
	private $search;

	/**
	 * Search type.
	 *
	 * @var string
	 */
	public $search_type;

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct();

		$options    = Options::instance();
		$ss_options = get_option( 'simply-static' );

		$this->start_time  = get_transient( 'ssp_search_index_start_time' );
		$this->temp_dir    = $options->get_archive_dir();
		$this->search_type = $ss_options['search_type'] ?? 'fuse';

		if ( 'algolia' === $this->search_type ) {
			$this->search = Search_Algolia::get_instance();
		} else {
			$this->search = Search_Fuse::get_instance();
		}
	}

	/**
	 * Add a batch of pages to the search index.
	 *
	 * @return boolean true if done, false if not done.
	 */
	public function perform() {
		// We don't index results on build and single exports.
		$use_single = get_option( 'simply-static-use-single' );
		$use_build  = get_option( 'simply-static-use-build' );

		if ( isset( $use_build ) && ! empty( $use_build ) || isset( $use_single ) && ! empty( $use_single ) ) {
			return true;
		}

		$search_results = get_transient( 'ssp_search_results' );
		list( $pages_processed, $total_pages ) = $this->index_items();

		if ( $pages_processed !== 0 ) {
			$message = sprintf( __( "Indexed %d of %d pages", 'simply-static' ), $pages_processed, $total_pages );
			$this->save_status_message( $message );
		}

		// return true when done (no more pages).
		if ( $pages_processed >= $total_pages && ! empty( $search_results ) ) {
			if ( 'fuse' === $this->search_type ) {
				$this->search->update_index_file( $this->temp_dir );
			}

			// Handle cleanup.
			delete_transient( 'ssp_search_results' );
			delete_transient( 'ssp_search_index_start_time' );

			do_action( 'ssp_finished_search_index' );
		}

		return $pages_processed >= $total_pages;
	}

	/**
	 * Index files in Fuse.js index file.
	 *
	 * @return array
	 * @throws Exception When the upload fails.
	 */
	public function index_items(): array {
		$batch_size     = apply_filters( 'ssp_search_index_batch', 25 );
		$search_results = get_transient( 'ssp_search_results' );

		if ( ! is_array( $search_results ) ) {
			$search_results = [];
		}

		// last_modified_at > ? AND.
		$static_pages    = Page::query()
		                       ->where( "file_path IS NOT NULL" )
		                       ->where( "file_path != ''" )
		                       ->where( "( last_checked_at < ? OR last_checked_at IS NULL )", $this->start_time )
		                       ->limit( $batch_size )
		                       ->find();
		$pages_remaining = count( $static_pages );
		$total_pages     = Page::query()
		                       ->where( "file_path IS NOT NULL" )
		                       ->where( "file_path != ''" )
		                       ->count();

		$pages_processed = $total_pages - $pages_remaining;

		Util::debug_log( 'Total pages: ' . $total_pages . '; Pages remaining: ' . $pages_remaining );

		while ( $static_page = array_shift( $static_pages ) ) {
			$index_item = $this->get_index_item( $static_page );

			if ( false !== $index_item ) {
				$search_results[] = $index_item;
			}

			$static_page->last_checked_at = Util::formatted_datetime();
			$static_page->save();
		}

		set_transient( 'ssp_search_results', $search_results, DAY_IN_SECONDS );

		return array( $pages_processed, $total_pages );
	}

	/**
	 * Push static pages to Algolia.
	 *
	 * @param object $static_page static page object after crawling.
	 *
	 * @return array|bool
	 */
	public function get_index_item( $static_page ) {
		$options    = get_option( 'simply-static' );
		$use_search = $options['use_search'] ?? false;

		// Check if search is active.
		if ( ! $use_search ) {
			return false;
		}

		// If it's a file, skip
		$path = parse_url( $static_page->url, PHP_URL_PATH );
		$ext  = pathinfo( $path, PATHINFO_EXTENSION );

		if ( $ext ) {
			return false;
		}

		// Exclude from search index.
		$excludables = array( 'feed', 'comments', 'author' );

		if ( ! empty( $options['search_excludable'] ) ) {
			$excludables = explode( "\n", $options['search_excludable'] );

			// Remove files, feeds, comments and author archives from index.
			$excludables = apply_filters(
				'ssp_excluded_by_default',
				array_merge(
					$excludables,
					array(
						'feed',
						'comments',
						'author'
					)
				)
			);
		}

		if ( ! empty( $excludables ) ) {
			foreach ( $excludables as $excludable ) {
				// Check excludable URL patterns.
				$in_url = strpos( urldecode( $static_page->url ), $excludable );

				if ( false !== $in_url ) {
					return false;
				}
			}
		}

		// Check if it's a full static export.
		$use_single = get_option( 'simply-static-use-single' );
		$use_build  = get_option( 'simply-static-use-build' );

		// Is build?
		if ( ! empty( $use_build ) ) {
			return false;
		}
		// Is single?
		if ( ! empty( $use_single ) ) {
			return false;
		}

		if ( 200 == $static_page->http_status_code ) {
			$response = Url_Fetcher::remote_get( $static_page->url );
			$dom      = HtmlDomParser::str_get_html( wp_remote_retrieve_body( $response ) );

			if ( is_null( $dom ) ) {
				return false;
			}

			// Get elements from settings.
			$title   = 'title';
			$body    = 'body';
			$excerpt = '.entry-content';

			if ( isset( $options['search_index_title'] ) && ! empty( $options['search_index_title'] ) ) {
				$title = $options['search_index_title'];
			}

			if ( isset( $options['search_index_content'] ) && ! empty( $options['search_index_content'] ) ) {
				$body = $options['search_index_content'];

			}

			if ( isset( $options['search_index_excerpt'] ) && ! empty( $options['search_index_excerpt'] ) ) {
				$excerpt = $options['search_index_excerpt'];
			}

			// Filter dom for creating index entries.
			$title   = $this->get_selector_data( $title, $dom );
			$body    = wp_strip_all_tags( $this->get_selector_data( $body, $dom ) );
			$excerpt = wp_strip_all_tags( $this->get_selector_data( $excerpt, $dom ) );
			$post_id = wp_strip_all_tags( $dom->find( '.ssp-id', 0 )->innertext );

			// Multilingual.
			$language = '';

			foreach ( $dom->find( 'link' ) as $link ) {
				if ( $link->hasAttribute( 'hreflang' ) ) {
					if ( $static_page->url === $link->getAttribute( 'href' ) && 'x-default' !== $link->getAttribute( 'hreflang' ) ) {
						$language = $link->getAttribute( 'hreflang' );
					}
				}
			}

			if ( '' !== $title && '' !== $post_id ) {
				// Build search entry.
				$index_item = array(
					'objectID' => $post_id,
					'title'    => wp_strip_all_tags( $title ),
					'content'  => $body,
					'excerpt'  => wp_trim_words( $excerpt, '20', '..' ),
					'path'     => str_replace( home_url(), '', $static_page->url ),
				);

				// Is Multilingual?
				if ( '' !== $language ) {
					$index_item['language'] = $language;
				}

				// Additional Path set?
				if ( ! empty( $options['relative_path'] ) ) {
					$index_item['path'] = $options['relative_path'] . str_replace( home_url(), '', $static_page->url );
				}

				$index_item = apply_filters( 'ssp_search_index_item', $index_item, $dom );

				if ( 'algolia' === $this->search_type ) {
					// Add data to Algolia.
					try {
						// Create a new index item.
						$this->search->index->saveObject( $index_item );
					} catch ( Exception $e ) {
						Util::debug_log( __( 'There was an connection error with Algolia. Please check your settings.', 'simply-static-pro' ) );
					}
				}

				Util::debug_log( __( 'Added the following URL to search index', 'simply-static-pro' ) . ': ' . $static_page->url );

				return $index_item;
			}
		}

		return false;
	}

	protected function get_selector_data( $selector, $dom ) {
		if ( $this->is_meta_selector( $selector ) ) {
			return $this->get_meta_data( $selector, $dom );
		}

		return $dom->find( $selector, 0 )->innertext;
	}

	protected function get_meta_data( $selector, $dom ) {
		$meta_array = array_filter( explode( '|', $selector ) );

		$attribute       = 'name';
		$attribute_value = $meta_array[0];
		$value           = $meta_array[1];
		if ( $meta_array[0] === 'property' ) {
			$attribute       = 'property';
			$attribute_value = $meta_array[1];
			$value           = 'content';
		}
		$search = 'meta[' . $attribute . '="' . $attribute_value . '"]';

		$meta_found = $dom->find( $search, 0 );

		if ( ! $meta_found ) {
			return '';
		}

		$meta_value = $meta_found->{$value};

		if ( ! $meta_value ) {
			return '';
		}

		if ( is_array( $meta_value ) ) {
			$meta_value = current( $meta_value );
		}

		return $meta_value;
	}

	protected function is_meta_selector( $selector ) {
		$expanded = array_filter( explode( '|', $selector ) );
		var_dump( $expanded );
		var_dump( $selector );

		return count( $expanded ) === 2;
	}
}
