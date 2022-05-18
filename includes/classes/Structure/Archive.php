<?php
/**
 * Archive
 *
 * @package JUMP
 */

namespace JUMP\Structure;

use JUMP\Singleton;

use function JUMP\Functions\is_type_archive;

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
		add_filter( 'post_class', [ $this, 'archive_post_class' ] );
		add_filter( 'get_the_content_more_link', [ $this, 'read_more_link' ] );
		add_filter( 'the_content_more_link', [ $this, 'read_more_link' ] );
		add_filter( 'genesis_author_box_gravatar_size', [ $this, 'author_box_gravatar' ] );
		add_action( 'genesis_entry_header', [ $this, 'entry_wrap_open' ], 4 );
		add_action( 'genesis_entry_footer', [ $this, 'entry_wrap_close' ], 15 );
		add_filter( 'genesis_markup_entry-header_open', [ $this, 'widget_entry_wrap_open' ], 10, 2 );
		// Reposition entry image.
		remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
		add_action( 'genesis_entry_header', 'genesis_do_post_image', 1 );
	}

	/**
	 * Add column class to archive posts.
	 *
	 * @param array $classes Array of post classes.
	 *
	 * @return array
	 */
	public function archive_post_class( array $classes ): array {
		if ( ! is_type_archive() ) {
			return $classes;
		}

		if ( \did_action( 'genesis_before_sidebar_widget_area' ) ) {
			return $classes;
		}

		if ( 'full-width-content' === \genesis_site_layout() ) {
			$classes[] = 'one-third';
			$count     = 3;

		} else {
			$classes[] = 'one-half';
			$count     = 2;
		}

		global $wp_query;

		if ( 0 === $wp_query->current_post || 0 === $wp_query->current_post % $count ) {
			$classes[] = 'first';
		}

		return $classes;
	}

	/**
	 * Modify the content limit read more link
	 *
	 * @param string $more_link_text Default more link text.
	 *
	 * @return string
	 */
	public function read_more_link( string $more_link_text ) : string {
		return \str_replace( [ '[', ']', '...' ], '', $more_link_text );
	}

	/**
	 * Modifies size of the Gravatar in the author box.
	 *
	 * @param int $size Original icon size.
	 *
	 * @return int Modified icon size.
	 */
	public function author_box_gravatar( int $size ): int {
		return \genesis_get_config( 'genesis-settings' )['avatar_size'];
	}

	/**
	 * Outputs the opening entry wrap markup.
	 *
	 * @return void
	 */
	public function entry_wrap_open() {
		if ( is_type_archive() ) {
			\genesis_markup(
				[
					'open'    => '<div %s>',
					'context' => 'entry-wrap',
				]
			);
		}
	}

	/**
	 * Outputs the closing entry wrap markup.
	 *
	 * @return void
	 */
	public function entry_wrap_close() {
		if ( is_type_archive() ) {
			\genesis_markup(
				[
					'close'   => '</div>',
					'context' => 'entry-wrap',
				]
			);
		}
	}

	/**
	 * Outputs the opening entry wrap markup in widgets.
	 *
	 * @param string $open Opening markup.
	 * @param array  $args Markup args.
	 *
	 * @return string
	 */
	public function widget_entry_wrap_open( string $open, array $args ) : string {
		if ( isset( $args['params']['is_widget'] ) && $args['params']['is_widget'] ) {
			$markup = \genesis_markup(
				[
					'open'    => '<div %s>',
					'context' => 'entry-wrap',
					'echo'    => false,
				]
			);

			$open = $markup . $open;
		}

		return $open;
	}
}
