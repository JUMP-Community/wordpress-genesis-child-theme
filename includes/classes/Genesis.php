<?php
/**
 * Genesis Framework.
 *
 * @package JUMP
 */

namespace JUMP;

use JUMP\Singleton;

/**
 * Class for Genesis Framework
 */
class Genesis {
	use Singleton;

	/**
	 * Setup actions and filters
	 *
	 * @return void
	 */
	public function setup() {
		add_action( 'after_switch_theme', [ $this, 'default_theme_settings' ] );
	}

	/**
	 * Set default theme settings on theme activation.
	 *
	 * @return void
	 */
	public function default_theme_settings() {
		$settings = \genesis_get_config( 'genesis-settings' );

		\genesis_update_settings( $settings );
		\update_option( 'posts_per_page', $settings['blog_cat_num'] );
	}

}
