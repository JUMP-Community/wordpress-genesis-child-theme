<?php
/**
 * Author customizations
 *
 * @package JUMP
 */

namespace JUMP\WordPress;

use JUMP\Singleton;

/**
 * Authors class
 */
class Authors {
	use Singleton;

	/**
	 * Domain names to block for author archives.
	 */
	const ALLOW_LIST_DOMAINS = [ 'joinjump.community' ];

	/**
	 * Setup module
	 *
	 * @return void
	 */
	public function setup() {
		add_action( 'wp', [ $this, 'maybe_disable_author_archive' ] );
	}

	/**
	 * Check to see if author archive page should be disabled for certain user accounts
	 *
	 * @return void
	 */
	public function maybe_disable_author_archive() {

		if ( is_admin() ) {
			return;
		}

		if ( ! is_author() ) {
			return;
		}

		$is_author_disabled = false;
		$author             = get_queried_object();
		$current_domain     = wp_parse_url( get_site_url(), PHP_URL_HOST );

		// Perform partial match on domains to catch subdomains or variation of domain name.
		$filtered_domains = array_filter(
			self::ALLOW_LIST_DOMAINS,
			function( $domain ) use ( $current_domain ) {
				return false !== stripos( $current_domain, $domain );
			}
		);

		// If the query object doesn't have a user e-mail address, bail.
		if ( ! empty( $filtered_domains ) || empty( $author->data->user_email ) ) {
			return;
		}

		// E-mail addresses containing the domain will be filtered out on the front-end.
		if ( false !== stripos( $author->data->user_email, 'joinjump.community' ) ) {
			$is_author_disabled = true;
		}

		if ( true === $is_author_disabled ) {
			wp_safe_redirect( home_url(), '301' );
			exit();
		}
	}
}
