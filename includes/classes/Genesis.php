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
		add_action( 'customize_register', [ $this, 'remove_customizer_sections' ], 11 );
		// Disable admin menu.
		add_filter( 'genesis_theme_settings_menu_ops', '__return_empty_array' );
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

	/**
	 * Remove Customizer Sections from Genesis Child Theme
	 *
	 * @return void
	 */
	public function remove_customizer_sections() {

		global $wp_customize;

		$sections = array(
			'genesis_updates',
			'genesis_header',
			'genesis_adsense',
			'genesis_color_scheme',
			'genesis_footer',
			'genesis_layout',
			'genesis_breadcrumbs',
			'genesis_comments',
			'genesis_archives',
			'genesis_single',
			'genesis_scripts',
		);

		foreach ( $sections as $section ) :
			$wp_customize->remove_section( $section );
		endforeach;
	}

}
