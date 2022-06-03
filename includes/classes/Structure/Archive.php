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
		add_filter( 'get_the_content_more_link', [ $this, 'read_more_link' ] );
		add_filter( 'the_content_more_link', [ $this, 'read_more_link' ] );
		// Remove featured image.
		remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
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
