<?php
/**
 * WordPress Overrides
 *
 * @package JUMP
 */

namespace JUMP\WordPress;

use JUMP\Singleton;

/**
 * Class for WordPress overrides
 */
class Overrides {
	use Singleton;

	/**
	 * Setup actions and filters
	 *
	 * @return void
	 */
	public function setup() {
		// Disable Application Passwords.
		add_filter( 'wp_is_application_passwords_available', '__return_false' );
		// Disable Post By Email on options-writing.php.
		add_filter( 'enable_post_by_email_configuration', '__return_false' );
		// Disable Update Services on options-writing.php.
		add_filter( 'enable_update_services_configuration', '__return_false' );
		// Remove language dropdown on login screen.
		add_filter( 'login_display_language_dropdown', '__return_false' );
	}

}
