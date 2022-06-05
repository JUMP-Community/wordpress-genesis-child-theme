<?php
/**
 * Archive
 *
 * @package JUMP
 */

namespace JUMP\Structure;

use JUMP\Singleton;

/**
 * Class for Archive templates
 */
class Archive {
	use Singleton;

	/**
	 * Setup actions and filters
	 *
	 * @return void
	 */
	public function setup() {
		add_action( 'pre_get_posts', [ $this, 'posts_page_category' ] );
		add_action( 'wp', [ $this, 'resources_category' ] );
		add_filter( 'get_the_content_more_link', [ $this, 'read_more_link' ] );
		add_filter( 'the_content_more_link', [ $this, 'read_more_link' ] );
		// Remove featured image.
		remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
	}

	/**
	 * Limit the blog roll to only show a specific category.
	 *
	 * @param \WP_Query $query WordPress Query.
	 *
	 * @return void
	 */
	public function posts_page_category( \WP_Query $query ) {
		if ( $query->is_admin() ) {
			return;
		}
		if ( ! $query->is_main_query() ) {
			return;
		}
		if ( ! $query->is_home() ) {
			return;
		}
		$query->set( 'cat', '1' );
	}

	/**
	 * Only show linked title on Resources archive view.
	 *
	 * @return void
	 */
	public function resources_category() {
		// Run on all archives, blog home, search results.
		if ( is_singular() ) {
			return;
		}
		// Only run on specific category designation.
		if ( ! has_category( 'resources' ) ) {
			return;
		}
		add_filter( 'genesis_markup_entry-title-link_close', [ $this, 'External_link_svg'], 10, 2 );
		remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
		remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
	}

	public function external_link_svg( $close, $args ) {
		$close = sprintf( '</a>%s', '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-external-link" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M256 64C256 46.33 270.3 32 288 32H415.1C415.1 32 415.1 32 415.1 32C420.3 32 424.5 32.86 428.2 34.43C431.1 35.98 435.5 38.27 438.6 41.3C438.6 41.35 438.6 41.4 438.7 41.44C444.9 47.66 447.1 55.78 448 63.9C448 63.94 448 63.97 448 64V192C448 209.7 433.7 224 416 224C398.3 224 384 209.7 384 192V141.3L214.6 310.6C202.1 323.1 181.9 323.1 169.4 310.6C156.9 298.1 156.9 277.9 169.4 265.4L338.7 96H288C270.3 96 256 81.67 256 64V64zM0 128C0 92.65 28.65 64 64 64H160C177.7 64 192 78.33 192 96C192 113.7 177.7 128 160 128H64V416H352V320C352 302.3 366.3 288 384 288C401.7 288 416 302.3 416 320V416C416 451.3 387.3 480 352 480H64C28.65 480 0 451.3 0 416V128z"/></svg>' );
		return $close;
	}

	/**
	 * Modify the content limit read more link
	 *
	 * @param string $more_link_text Default more link text.
	 *
	 * @return string
	 */
	public function read_more_link( string $more_link_text ) : string {
		$more_link_text = \str_replace( '<a', '</p><p><a', $more_link_text );
		$more_link_text = \str_replace( [ '[', ']', '...' ], '', $more_link_text );
		return \str_replace( 'more-link', 'button', $more_link_text );
	}


}
