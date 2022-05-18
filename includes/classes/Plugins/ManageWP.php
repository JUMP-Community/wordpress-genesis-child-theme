<?php
/**
 * ManageWP.
 *
 * @package JUMP
 */

namespace JUMP\Plugins;

use JUMP\Singleton;

/**
 * Class for ManageWP
 */
class ManageWP {
	use Singleton;

	/**
	 * Setup actions and filters
	 *
	 * @return void
	 */
	public function setup() {
		add_filter( 'mwp_admin_notice_enabled', '__return_false' );
	}
}
