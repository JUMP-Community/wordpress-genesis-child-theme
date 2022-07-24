<?php
/**
 * Subscriber customizations
 *
 * @package JUMP
 */

namespace JUMP\WordPress;

use JUMP\Singleton;

/**
 * Subscribers class
 */
class Subscribers {
	use Singleton;

	/**
	 * Setup module
	 *
	 * @return void
	 */
	public function setup() {
		add_action( 'show_admin_bar', [ $this, 'maybe_hide_wp_admin_bar' ] );
		add_action( 'admin_init', [ $this, 'maybe_hide_wp_admin' ] );
	}

	/**
	 * Maybe disable the wp admin bar
	 *
	 * @return bool
	 */
	public function maybe_hide_wp_admin_bar() : bool {

		if ( ! is_user_logged_in() ) {
			return false;
		}

		if ( ! current_user_can( 'edit_posts' ) ) {
			return false;
		}

		return true;
	}

	/**
	 * Redirect subscribers back to the frontend.
	 *
	 * @return void
	 */
	public function maybe_hide_wp_admin() {

		if ( ! is_user_logged_in() ) {
			return;
		}

		if ( current_user_can( 'subscriber' ) ) {
			wp_safe_redirect( home_url(), 301 );
			exit();
		}
	}
}
