<?php
/**
 * WordPress wp_head setup, site hooks and filters.
 *
 * @package JUMP
 */

namespace JUMP\WordPress;

use JUMP\Singleton;

/**
 * Class for WpHead
 */
class WpHead {
	use Singleton;

	/**
	 * Registers instances where we will override default WP Core behavior.
	 *
	 * @link https://developer.wordpress.org/reference/functions/wp_generator/
	 * @link https://developer.wordpress.org/reference/functions/wlwmanifest_link/
	 * @link https://developer.wordpress.org/reference/functions/rsd_link/
	 * @link https://developer.wordpress.org/reference/functions/adjacent_posts_rel_link_wp_head/
	 * @link https://developer.wordpress.org/reference/functions/wp_shortlink_wp_head/
	 * @link https://developer.wordpress.org/reference/functions/rest_output_link_wp_head/
	 *
	 * @return void
	 */
	public function setup() {
		// Remove WordPress generator meta.
		remove_action( 'wp_head', 'wp_generator' );
		// Remove Windows Live Writer manifest link.
		remove_action( 'wp_head', 'wlwmanifest_link' );
		// Remove the link to Really Simple Discovery service endpoint.
		remove_action( 'wp_head', 'rsd_link' );
		// Remove adjacent post link.
		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );
		// Remove shortlink support.
		remove_action( 'wp_head', 'wp_shortlink_wp_head', 10 );
		// Remove REST API discovery link.
		remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
	}
}
