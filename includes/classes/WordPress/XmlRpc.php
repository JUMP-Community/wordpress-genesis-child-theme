<?php
/**
 * WordPress XML RPC setup, site hooks and filters.
 *
 * @package JUMP
 */

namespace JUMP\WordPress;

use JUMP\Singleton;

/**
 * Class for disabling XML RPC
 */
class XmlRpc {
	use Singleton;

	/**
	 * Setup actions and filters
	 *
	 * @return void
	 */
	public function setup() {
		// Disable XML PRC.
		add_filter( 'xmlrpc_enabled', '__return_false' );
		add_filter( 'xmlrpc_methods', '__return_empty_array' );

		// Disable pingbacks and trackbacks.
		add_filter( 'wp_headers', [ $this, 'remove_pingback_headers' ] );
		add_filter( 'bloginfo_url', [ $this, 'remove_pingback_url' ], 10, 2 );
		add_filter( 'xmlrpc_call', [ $this, 'remove_pingback_xmlrpc' ] );
		add_filter( 'rewrite_rules_array', [ $this, 'remove_trackback_rewrite_rules' ] );
	}

	/**
	 * Remove pingback headers.
	 *
	 * @param array $headers Associative array of headers to be sent.
	 *
	 * @return array
	 */
	public function remove_pingback_headers( array $headers ) : array {
		unset( $headers['X-Pingback'] );
		return $headers;
	}

	/**
	 * Remove bloginfo('pingback_url').
	 *
	 * @param string $output The URL returned by bloginfo().
	 * @param string $show Type of information requested.
	 *
	 * @return string
	 */
	public function remove_pingback_url( string $output, string $show ) : string {
		return 'pingback_url' === $show ? '' : $output;
	}

	/**
	 * Disable XMLRPC pingback action.
	 *
	 * @param string $name Method name.
	 *
	 * @return void
	 */
	public function remove_pingback_xmlrpc( string $name ) {
		if ( 'pingback.ping' === $name ) {
			wp_die( 'Pingbacks are not supported', 'Not Allowed!', [ 'response' => 403 ] );
		}
	}

	/**
	 * Remove trackback rewrite rules.
	 *
	 * @param array $rules The compiled array of rewrite rules, keyed by their regex pattern.
	 *
	 * @return array
	 */
	public function remove_trackback_rewrite_rules( array $rules ) : array {
		foreach ( array_keys( $rules ) as $rule ) {
			if ( preg_match( '/trackback\/\?\$$/i', $rule ) ) {
				unset( $rules[ $rule ] );
			}
		}

		return $rules;
	}
}
