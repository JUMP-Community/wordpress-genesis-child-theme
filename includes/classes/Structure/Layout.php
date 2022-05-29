<?php
/**
 * Layout
 *
 * @package JUMP
 */

namespace JUMP\Structure;

use JUMP\Singleton;

/**
 * Class for Layout
 */
class Layout {
	use Singleton;

	/**
	 * Setup actions and filters
	 *
	 * @return void
	 */
	public function setup() {
		add_filter( 'genesis_attr_structural-wrap', [ $this, 'row' ] );
		add_filter( 'genesis_attr_content', [ $this, 'content' ] );
		add_filter( 'genesis_attr_sidebar-primary', [ $this, 'sidebar_primary' ] );
		add_filter( 'genesis_attr_sidebar-secondary', [ $this, 'sidebar_secondary' ] );
		// Remove content-sidebar-wrap.
		add_filter( 'genesis_markup_content-sidebar-wrap', '__return_empty_string', 10, 1 );
	}

	/**
	 * Add support for Bootstrap's row class by replacing the default "wrap".
	 *
	 * @param array $attributes Default attributes.
	 *
	 * @return array
	 */
	public function row( array $attributes ) : array {
		$attributes['class'] = 'row';
		return $attributes;
	}

	/**
	 * Define layout for content area
	 *
	 * @param array $attributes Default attributes.
	 *
	 * @return array
	 */
	public function content( array $attributes ) : array {
		switch ( genesis_site_layout() ) {
			case 'full-width-content':
				$attributes['class'] .= ' col-12';
				break;

			case 'sidebar-sidebar-content':
				$attributes['class'] .= ' col-12 col-md-6 order-2';
				break;

			case 'sidebar-content-sidebar':
				$attributes['class'] .= ' col-12 col-md-6 order-1';
				break;

			case 'content-sidebar-sidebar':
				$attributes['class'] .= ' col-12 col-md-6 order-0';
				break;

			case 'content-sidebar':
				$attributes['class'] .= ' col-12 col-md-9 order-0';
				break;

			case 'sidebar-content':
				$attributes['class'] .= ' col-12 col-md-9 order-1';
				break;

		}
		return $attributes;
	}

	/**
	 * Define layout for primary sidebar
	 *
	 * @param array $attributes Default attributes.
	 *
	 * @return array
	 */
	public function sidebar_primary( array $attributes ) : array {
		switch ( genesis_site_layout() ) {
			case 'sidebar-sidebar-content':
				$attributes['class'] .= ' col-12 col-md-3 order-0';
				break;

			case 'sidebar-content-sidebar':
				$attributes['class'] .= ' col-12 col-md-3 order-0';
				break;

			case 'content-sidebar-sidebar':
				$attributes['class'] .= ' col-12 col-md-3 order-1';
				break;

			case 'content-sidebar':
				$attributes['class'] .= ' col-12 col-md-3 order-1';
				break;

			case 'sidebar-content':
				$attributes['class'] .= ' col-12 col-md-3 order-0';
				break;

		}
		return $attributes;
	}

	/**
	 * Define layout for secondary sidebar
	 *
	 * @param array $attributes Default attributes.
	 *
	 * @return array
	 */
	public function sidebar_secondary( array $attributes ) : array {
		switch ( genesis_site_layout() ) {
			case 'sidebar-sidebar-content':
				$attributes['class'] .= ' col-12 col-md-3 order-1';
				break;

			case 'sidebar-content-sidebar':
				$attributes['class'] .= ' col-12 col-md-3 order-2';
				break;

			case 'content-sidebar-sidebar':
				$attributes['class'] .= ' col-12 col-md-3 order-2';
				break;

		}
		return $attributes;
	}
}
