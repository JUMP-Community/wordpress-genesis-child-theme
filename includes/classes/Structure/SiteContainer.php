<?php
/**
 * Site Container
 *
 * @package JUMP
 */

namespace JUMP\Structure;

use JUMP\Singleton;

/**
 * Class for site-container
 */
class SiteContainer {
	use Singleton;

	/**
	 * Setup actions and filters
	 *
	 * @return void
	 */
	public function setup() {
		add_filter( 'genesis_attr_site-container', [ $this, 'attributes' ], 10, 1 );
	}

	/**
	 * Genesis attributes
	 *
	 * @param array $attributes Default attributes.
	 *
	 * @return array
	 */
	public function attributes( array $attributes ) : array {
		$attributes['class'] .= ' d-flex flex-nowrap flex-column min-vh-100';
		return $attributes;
	}
}
