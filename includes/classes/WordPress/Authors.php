<?php
/**
 * Author customizations
 *
 * @package JUMP
 */

namespace JUMP\WordPress;

use JUMP\Singleton;

/**
 * Authors class
 */
class Authors {
	use Singleton;

	/**
	 * Setup module
	 *
	 * @return void
	 */
	public function setup() {
		add_action( 'template_redirect', [ $this, 'maybe_disable_author_archive' ] );
	}

	/**
	 * Check to see if author archive page should be disabled for certain user accounts
	 *
	 * @return void
	 */
	public function maybe_disable_author_archive() {

		if ( is_admin() ) {
			return;
		}

		if ( ! is_author() ) {
			return;
		}

		wp_safe_redirect( home_url(), 301 );
		exit();
	}
}
