<?php
/**
 * Advanced Custom Fields Pro.
 *
 * @package JUMP
 */

namespace JUMP\Plugins;

use JUMP\Singleton;

/**
 * Class for Advanced Custom Fields Pro
 */
class AdvancedCustomFieldsPro {
	use Singleton;

	/**
	 * Setup actions and filters
	 *
	 * @return void
	 */
	public function setup() {
		add_filter( 'acf/settings/show_admin', '__return_true' );
	}
}
