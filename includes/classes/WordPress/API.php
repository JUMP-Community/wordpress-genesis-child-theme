<?php
/**
 * REST API customizations
 *
 * @package JUMP
 */

namespace JUMP\WordPress;

use JUMP\Singleton;

/**
 * REST API customizations class
 */
class API {
	use Singleton;

	/**
	 * Default value for API restriction
	 */
	const DEFAULT_RESTRICTION_LEVEL = 'users';

	/**
	 * Allowed values for API restriction
	 */
	const ALLOWED_RESTRICTION_LEVELS = [ 'all', 'users', 'none' ];

	/**
	 * Setup actions and filters
	 *
	 * @return void
	 */
	public function setup() {
		// Make sure this runs somewhat late but before core's cookie auth at 100.
		add_filter( 'rest_authentication_errors', [ $this, 'restrict_rest_api' ], 99 );
		add_filter( 'rest_endpoints', [ $this, 'restrict_user_endpoints' ] );
	}

	/**
	 * Get restriction level and allow filtering.
	 *
	 * Allowed values are 'all', 'users', 'none'.
	 *
	 * @return string
	 */
	public function get_restriction_level() : string {
		$level = apply_filters( 'jump_restrict_rest_api', self::DEFAULT_RESTRICTION_LEVEL );

		if ( ! in_array( $level, self::ALLOWED_RESTRICTION_LEVELS, true ) ) {
			$level = self::DEFAULT_RESTRICTION_LEVEL;
		}

		return $level;
	}

	/**
	 * Return a 403 status and corresponding error for unauthed REST API access.
	 *
	 * @param  \WP_Error|null|bool $result Error from another authentication handler,
	 *                                    null if we should handle it, or another value
	 *                                    if not.
	 *
	 * @return \WP_Error|null|bool
	 */
	public function restrict_rest_api( $result ) {
		// Respect other handlers.
		if ( null !== $result ) {
			return $result;
		}

		$restrict = $this->get_restriction_level();

		if ( 'all' === $restrict && ! $this->user_can_access_rest_api() ) {
			return new \WP_Error(
				'rest_api_restricted',
				esc_html__( 'Authentication Required', 'jump' ),
				array( 'status' => rest_authorization_required_code() )
			);
		}

		return $result;
	}

	/**
	 * Remove user endpoints for unauthed users.
	 *
	 * @param  array $endpoints Array of endpoints.
	 *
	 * @return array
	 */
	public function restrict_user_endpoints( array $endpoints ) : array {
		$restrict = $this->get_restriction_level();

		if ( 'none' === $restrict ) {
			return $endpoints;
		}

		if ( ! $this->user_can_access_rest_api() ) {
			$keys = preg_grep( '/\/wp\/v2\/users\b/', array_keys( $endpoints ) );

			foreach ( $keys as $key ) {
				unset( $endpoints[ $key ] );
			}

			return $endpoints;
		}

		return $endpoints;
	}


	/**
	 * Check if user can access REST API based on our criteria
	 *
	 * @return bool Whether the given user can access the REST API.
	 */
	public function user_can_access_rest_api() : bool {
		return is_user_logged_in();
	}

}
