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
		// Remove post edit link.
		add_filter( 'edit_post_link', '__return_empty_string' );
		// Reposition featured image.
		remove_action( 'genesis_entry_content', 'genesis_do_singular_image', 8 );
		add_action( 'genesis_entry_header', 'genesis_do_singular_image' );
		// Remove sidebars.
		remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
		remove_action( 'genesis_sidebar_alt', 'genesis_do_sidebar_alt' );
		// Remove entry footer.
		remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
		remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
		remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );
		// Post info.
		add_filter( 'genesis_post_info', [ $this, 'post_info' ] );
	}

	/**
	 * Filter the Genesis post info
	 *
	 * @param string $post_info Post information.
	 *
	 * @return string
	 */
	public function post_info( string $post_info ) : string {
		return sprintf( '%s: [post_date]', esc_html__( 'Brief date', 'jump' ) );
	}

}
