<?php
/**
 * Yoast WordPress SEO.
 *
 * @package JUMP
 */

namespace JUMP\Plugins;

use JUMP\Singleton;

/**
 * Class for Yoast WordPress SEO
 */
class WordPressSeo {
	use Singleton;

	/**
	 * Setup actions and filters
	 *
	 * @return void
	 */
	public function setup() {
		add_action( 'admin_init', [ $this, 'remove_user_roles' ] );
		add_filter( 'get_user_option_closedpostboxes_page', [ $this, 'closed_by_default' ] );
		add_filter( 'get_user_option_closedpostboxes_post', [ $this, 'closed_by_default' ] );
		add_filter( 'option_wpseo', [ $this, 'filter_wpseo_options' ] );
		add_filter( 'option_wpseo_titles', [ $this, 'filter_wpseo_titles_options' ] );
		add_action( 'admin_head', [ $this, 'register_styles' ] );
	}

	/**
	 * Remove default user roles.
	 *
	 * @return void
	 */
	public function remove_user_roles() {
		// Remove Yoast `SEO Manager` role.
		if ( get_role( 'wpseo_manager' ) ) {
			remove_role( 'wpseo_manager' );
		}

		// Remove Yoast `SEO Editor` role.
		if ( get_role( 'wpseo_editor' ) ) {
			remove_role( 'wpseo_editor' );
		}
	}

	/**
	 * Close the Yoast SEO metabox on by default within the editor.
	 *
	 * @param mixed $closed Boolean or array value from database.
	 *
	 * @return mixed Boolean or array.
	 */
	public function closed_by_default( $closed ) {
		if ( is_bool( $closed ) ) {
			return [ 'wpseo_meta' ];
		}
		if ( is_array( $closed ) ) {
			return array_merge( $closed, [ 'wpseo_meta' ] );
		}
	}

	/**
	 * Filter the default options.
	 *
	 * @param array $options Default options.
	 *
	 * @return array
	 */
	public function filter_wpseo_options( array $options ) : array {
		$options['tracking']                             = false;
		$options['disableadvanced_meta']                 = false;
		$options['enable_headless_rest_endpoints']       = false;
		$options['ryte_indexability']                    = false;
		$options['enable_admin_bar_menu']                = false;
		$options['enable_cornerstone_content']           = false;
		$options['enable_text_link_counter']             = false;
		$options['show_onboarding_notice']               = false;
		$options['semrush_integration_active']           = false;
		$options['zapier_integration_active']            = false;
		$options['enable_metabox_insights']              = false;
		$options['enable_link_suggestions']              = false;
		$options['dismiss_configuration_workout_notice'] = true;
		$options['wincher_integration_active']           = false;
		return $options;
	}

	/**
	 * Filter title options.
	 *
	 * @param array $options Default title options.
	 *
	 * @return array
	 */
	public function filter_wpseo_titles_options( array $options ) : array {
		$options['disable-author']      = true;
		$options['disable-date']        = true;
		$options['disable-post_format'] = true;
		$options['disable-attachment']  = true;
		return $options;
	}

	/**
	 * Inline styles to clean up admin
	 *
	 * @return void
	 */
	public function register_styles() {
		echo "
			<style type='text/css'>
			.wpseo_content_wrapper #sidebar-container,
			#yoast-helpscout-beacon,
			.yoast-sidebar,
			.yoast_premium_upsell,
			#wpseo-local-seo-upsell,
			.yoast-settings-section-disabled {
				display: none !important;
			}
			</style>
		";
	}
}
