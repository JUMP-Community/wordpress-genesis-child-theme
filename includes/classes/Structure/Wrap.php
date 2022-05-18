<?php
/**
 * Wrap
 *
 * @package JUMP
 */

namespace JUMP\Structure;

use JUMP\Singleton;

/**
 * Class for Wrap
 */
class Wrap {
	use Singleton;

	/**
	 * Setup actions and filters
	 *
	 * @return void
	 */
	public function setup() {
		add_filter( 'genesis_attr_structural-wrap', [ $this, 'row' ], 10, 1 );
		// Remove content-sidebar-wrap.
		add_filter( 'genesis_markup_content-sidebar-wrap', '__return_empty_string', 10, 1 );
	}

	/**
	 * Change content-sidebar-wrap class to wrap.
	 *
	 * @param array $attributes Default element attributes.
	 *
	 * @return array
	 */
	public function row( array $attributes ) : array {
		$attributes['class'] = 'row';
		return $attributes;
	}
}
