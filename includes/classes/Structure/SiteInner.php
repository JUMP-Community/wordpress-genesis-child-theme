<?php
/**
 * Site Inner
 *
 * @package JUMP
 */

namespace JUMP\Structure;

use JUMP\Singleton;

/**
 * Class for site-inner
 */
class SiteInner {
	use Singleton;

	/**
	 * Setup actions and filters
	 *
	 * @return void
	 */
	public function setup() {
		add_filter( 'genesis_attr_site-inner', [ $this, 'attributes' ], 10, 1 );
		add_filter( 'genesis_structural_wrap-site-inner', [ $this, 'wrapper' ], 10, 2 );
	}

	/**
	 * Genesis attributes
	 *
	 * @param array $attributes Default attributes.
	 *
	 * @return array
	 */
	public function attributes( array $attributes ) : array {
		$attributes['class'] .= ' flex-grow-1';
		return $attributes;
	}

	/**
	 * Wrap the 'row' within a Bootstrap 'container' class
	 *
	 * @param string $output HTML markup.
	 * @param string $original_output Open or close.
	 *
	 * @return string
	 */
	public function wrapper( string $output, string $original_output ) : string {
		$output = 'open' === $original_output ? '<div class="container-fluid py-md-5 px-md-0"><div class="row g-0">' : $output;
		$output = 'close' === $original_output ? $output . '</div>' : $output;
		return $output;
	}
}
