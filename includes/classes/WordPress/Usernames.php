<?php
/**
 * Username Restrictions
 *
 * @package JUMP
 */

namespace JUMP\WordPress;

use JUMP\Singleton;
/**
 * Usernames class
 */
class Usernames {
	use Singleton;

	/**
	 * Common user names
	 */
	const COMMON_USER_NAMES = [
		'admin',
		'administrator',
		'user',
		'username',
		'demo',
		'sql',
		'guest',
		'root',
		'test',
		'mysql',
		'ftp',
		'www',
		'client',
	];

	/**
	 * Setup actions and filters
	 *
	 * @return void
	 */
	public function setup() {
		add_filter( 'authenticate', [ $this, 'prevent_common_username' ], 30, 3 );
	}

	/**
	 * Prevent users from authenticating if they are using a generic username
	 *
	 * @param \WP_User $user User object.
	 * @param string   $username Username.
	 *
	 * @return \WP_User|\WP_Error
	 */
	public function prevent_common_username( $user, string $username ) {

		if ( in_array( strtolower( trim( $username ) ), self::COMMON_USER_NAMES, true ) ) {
			return new \WP_Error(
				'Auth Error',
				__( 'Please have an administrator change your username in order to meet security standards.', 'jump' )
			);
		}

		return $user;
	}

}
