<?php
/**
 * WordPress Dashboard hooks and filters.
 *
 * @package JUMP
 */

namespace JUMP\WordPress;

use JUMP\Singleton;

/**
 * Class for WordPress ADmin Dashboard
 */
class Dashboard {
	use Singleton;

	/**
	 * Setup actions and filters
	 *
	 * @return void
	 */
	public function setup() {
		add_action( 'wp_dashboard_setup', [ $this, 'remove_dashboard_widgets' ], 99 );
		add_action( 'wp_network_dashboard_setup', [ $this, 'remove_dashboard_widgets' ], 99 );
	}

	/**
	 * Remove certain dashboard widgets to clean up the admin.
	 *
	 * @return void
	 */
	public function remove_dashboard_widgets() {
		remove_meta_box( 'jetpack_summary_widget', 'dashboard', 'normal' );
		remove_meta_box( 'wp_mail_smtp_reports_widget_lite', 'dashboard', 'normal' );
		remove_meta_box( 'wpseo-dashboard-overview', 'dashboard', 'normal' );
		remove_meta_box( 'redux_dashboard_widget', 'dashboard', 'side' );
		remove_meta_box( 'pressable_dashboard_widget', 'dashboard', 'normal' );
		remove_meta_box( 'rg_forms_dashboard', 'dashboard', 'normal' );
		remove_meta_box( 'wpe_dify_news_feed', 'dashboard', 'normal' );
	}

}
