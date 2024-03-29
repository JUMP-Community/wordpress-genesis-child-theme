<?php
/**
 * Singleton Trait
 *
 * @package JUMP
 */

namespace JUMP;

/**
 * Singleton trait to be reused for Singleton pattern
 */
trait Singleton {

	/**
	 * Singleton instance.
	 *
	 * @var mixed
	 */
	private static $instance = false;

	/**
	 * Return post type instance
	 *
	 * @return mixed
	 */
	public static function instance() {
		if ( ! self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

}
