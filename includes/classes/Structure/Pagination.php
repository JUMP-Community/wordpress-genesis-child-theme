<?php
/**
 * Pagination
 *
 * @package JUMP
 */

namespace JUMP\Structure;

use JUMP\Singleton;

/**
 * Class for Pagination
 */
class Pagination {
	use Singleton;

	/**
	 * Setup actions and filters
	 *
	 * @return void
	 */
	public function setup() {
		add_filter( 'genesis_markup_open', [ $this, 'entry_pagination_wrap_open' ], 10, 2 );
		add_filter( 'genesis_markup_close', [ $this, 'entry_pagination_wrap_close' ], 10, 2 );
		add_filter( 'genesis_prev_link_text', [ $this, 'previous_page_link' ] );
		add_filter( 'genesis_next_link_text', [ $this, 'next_page_link' ] );
		add_filter( 'genesis_markup_pagination-previous_content', [ $this, 'previous_pagination_text' ] );
		add_filter( 'genesis_markup_pagination-next_content', [ $this, 'next_pagination_text' ] );
		// Reposition archive pagination.
		remove_action( 'genesis_after_endwhile', 'genesis_posts_nav' );
		add_action( 'genesis_after_content_sidebar_wrap', 'genesis_posts_nav' );
		// Reposition single navigation.
		remove_action( 'genesis_after_entry', 'genesis_adjacent_entry_nav' );
		add_action( 'genesis_after_content_sidebar_wrap', 'genesis_adjacent_entry_nav' );
		// Removes alignment classes.
		remove_filter( 'genesis_attr_pagination-previous', 'genesis_adjacent_entry_attr_previous_post' );
		remove_filter( 'genesis_attr_pagination-next', 'genesis_adjacent_entry_attr_next_post' );
	}

	/**
	 * Outputs the opening pagination wrap markup.
	 *
	 * @param string $open Opening markup.
	 * @param array  $args Markup args.
	 *
	 * @return string
	 */
	public function entry_pagination_wrap_open( string $open, array $args ) : string {
		if ( 'archive-pagination' === $args['context'] || 'adjacent-entry-pagination' === $args['context'] ) {
			$open .= '<div class="wrap">';
		}

		return $open;
	}

	/**
	 * Outputs the closing pagination wrap markup.
	 *
	 * @param string $close Closing markup.
	 * @param array  $args  Markup args.
	 *
	 * @return string
	 */
	public function entry_pagination_wrap_close( string $close, array $args ) : string {
		if ( 'archive-pagination' === $args['context'] || 'adjacent-entry-pagination' === $args['context'] ) {
			$close .= '</div>';
		}

		return $close;
	}

	/**
	 * Changes the previous page link text.
	 *
	 * @return string
	 */
	public function previous_page_link() : string {
		return sprintf( '← %s', esc_html__( 'Previous', 'jump' ) );
	}

	/**
	 * Changes the next page link text.
	 *
	 * @return string
	 */
	public function next_page_link() : string {
		return sprintf( '%s →', esc_html__( 'Next', 'jump' ) );
	}

	/**
	 * Changes the previous link arrow icon.
	 *
	 * @param string $content Previous link text.
	 *
	 * @return string
	 */
	public function previous_pagination_text( string $content ) : string {
		return str_replace( '&#xAB;', '←', $content );
	}

	/**
	 * Changes the next link arrow icon.
	 *
	 * @param string $content Next link text.
	 *
	 * @return string
	 */
	public function next_pagination_text( string $content ) : string {
		return str_replace( '&#xBB;', '→', $content );
	}
}
