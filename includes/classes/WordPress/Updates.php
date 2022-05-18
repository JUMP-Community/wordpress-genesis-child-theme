<?php
/**
 * WordPress Core setup, site hooks and filters.
 *
 * @package JUMP
 */

namespace JUMP\WordPress;

use JUMP\Singleton;

/**
 * Class for WordPress core customizations
 */
class Updates {
	use Singleton;

	/**
	 * Setup actions and filters
	 *
	 * @return void
	 */
	public function setup() {
		// Auto updates.
		add_filter( 'auto_update_plugin', '__return_false' );
		add_filter( 'auto_update_theme', '__return_false' );

		// Disable plugin/theme editor.
		if ( ! defined( 'DISALLOW_FILE_EDIT' ) ) {
			define( 'DISALLOW_FILE_EDIT', true );
		}

		// Disable plugin/theme installations.
		if ( ! defined( 'DISALLOW_FILE_MODS' ) ) {
			define( 'DISALLOW_FILE_MODS', false );
		}

	}

}
