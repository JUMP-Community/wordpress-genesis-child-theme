<?php
/**
 * WP Mail SMTP.
 *
 * @package JUMP
 */

namespace JUMP\Plugins;

use JUMP\Singleton;

/**
 * Class for WP Mail SMTP
 */
class WpMailSmtp {
	use Singleton;

	/**
	 * Setup actions and filters
	 *
	 * @return void
	 */
	public function setup() {
		add_filter( 'wp_mail_smtp_admin_dashboard_widget', '__return_false' );
		add_filter( 'wp_mail_smtp_admin_adminbarmenu_has_access', '__return_false' );
		add_filter( 'wp_mail_smtp_reports_emails_summary_is_disabled', '__return_true' );
		add_filter( 'wp_mail_smtp_usage_tracking_is_enabled', '__return_false' );
		add_filter( 'wp_mail_smtp_usage_tracking_load_allowed', '__return_false' );
		add_filter( 'wp_mail_smtp_admin_pages_misc_tab_show_usage_tracking_setting', '__return_false' );
		add_filter( 'wp_mail_smtp_admin_notifications_has_access', '__return_false' );
		add_filter( 'wp_mail_smtp_admin_is_error_delivery_notice_enabled', '__return_false' );
		add_filter( 'wp_mail_smtp_admin_education_notice_bar', '__return_false' );
		add_filter( 'wp_mail_smtp_admin_flyout_menu', '__return_false' );
		add_filter( 'wp_mail_smtp_admin_setup_wizard_load_wizard', '__return_false' );
	}
}
