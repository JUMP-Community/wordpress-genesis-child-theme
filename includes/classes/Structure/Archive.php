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
		// Remove read more link.
		add_filter( 'get_the_content_more_link', '__return_empty_string' );
		add_filter( 'the_content_more_link', '__return_empty_string' );
		// Remove featured image.
		remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
	}

}
