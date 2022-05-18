<?php
/**
 * Single
 *
 * @package JUMP
 */

namespace JUMP\Structure;

use JUMP\Singleton;

/**
 * Class for Single
 */
class Single {
	use Singleton;

	/**
	 * Setup actions and filters
	 *
	 * @return void
	 */
	public function setup() {
		add_action( 'after_setup_theme', [ $this, 'disable_edit_post_link' ] );
		// Reposition featured image.
		remove_action( 'genesis_entry_content', 'genesis_do_singular_image', 8 );
		add_action( 'genesis_entry_header', 'genesis_do_singular_image' );
	}

	/**
	 * Disables the post edit link.
	 *
	 * @since 3.5.0
	 *
	 * @return void
	 */
	public function disable_edit_post_link() {
		\add_filter( 'edit_post_link', '__return_empty_string' );
	}
}
