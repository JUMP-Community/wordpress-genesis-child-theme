<?php
/**
 * Footer Widgets
 *
 * @package JUMP
 */

namespace JUMP\Structure;

use JUMP\Singleton;

/**
 * Class for Footer Widgets
 */
class FooterWidgets {
	use Singleton;

	/**
	 * Setup actions and filters
	 *
	 * @return void
	 */
	public function setup() {
		add_filter( 'genesis_structural_wrap-footer-widgets', [ $this, 'wrapper' ], 10, 2 );
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
		$output = 'open' === $original_output ? '<div class="container py-2">' . $output : $output;
		$output = 'close' === $original_output ? $output . '</div>' : $output;
		return $output;
	}

}
