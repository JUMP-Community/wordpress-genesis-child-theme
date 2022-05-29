<?php
/**
 * Header
 *
 * @package JUMP
 */

namespace JUMP\Structure;

use JUMP\Singleton;
use JUMP\BootstrapNavWalker;

/**
 * Class for Header
 */
class Header {
	use Singleton;

	/**
	 * Setup actions and filters
	 *
	 * @return void
	 */
	public function setup() {
		add_filter( 'genesis_attr_site-header', [ $this, 'container' ] );
		add_filter( 'genesis_structural_wrap-header', [ $this, 'wrapper' ], 10, 2 );
		add_filter( 'genesis_attr_title-area', [ $this, 'title_area' ] );
		add_filter( 'genesis_attr_header-widget-area', [ $this, 'header_right' ] );
		add_filter( 'genesis_header', [ $this, 'menu_toggle' ] );
		add_filter( 'wp_nav_menu_args', [ $this, 'navigation' ], 10, 2 );
		// Reposition primary and secondary navigation.
		remove_action( 'genesis_after_header', 'genesis_do_nav' );
		remove_action( 'genesis_after_header', 'genesis_do_subnav' );
		add_action( 'genesis_header_right', 'genesis_do_nav' );
		add_action( 'genesis_header_right', 'genesis_do_subnav' );
	}

	/**
	 * Site header container
	 *
	 * @param array $attributes Default attributes.
	 *
	 * @return array
	 */
	public function container( array $attributes ) : array {
		$attributes['class'] .= ' navbar navbar-expand-lg navbar-light bg-transparent py0 mb-5';
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
		$output = 'open' === $original_output ? '<div class="container-xl">' : $output;
		$output = 'close' === $original_output ? '</div>' : $output;
		return $output;
	}

	/**
	 * Genesis attributes
	 *
	 * @param array $attributes Default attributes.
	 *
	 * @return array
	 */
	public function title_area( array $attributes ) : array {
		$attributes['class'] .= ' navbar-brand';
		return $attributes;
	}

	/**
	 * Genesis attributes
	 *
	 * @param array $attributes Default attributes.
	 *
	 * @return array
	 */
	public function header_right( array $attributes ) : array {
		$attributes['class'] = 'd-md-flex justify-content-md-between collapse navbar-collapse';
		return $attributes;
	}

	/**
	 * Navigation toggle
	 *
	 * @return void
	 */
	public function menu_toggle() {
		printf(
			'<button class="%s" data-bs-toggle="%s" data-bs-target="#%s" aria-controls="%s" aria-expanded="%s" aria-label="%s"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" class="bi" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"></path></svg></button>',
			esc_attr( 'navbar-toggler collapsed' ),
			esc_attr( 'collapse' ),
			esc_attr( 'genesis-nav-primary' ),
			esc_attr( 'genesis-nav-primary' ),
			esc_attr( 'false' ),
			esc_html__( 'Toggle navigation', 'jump' )
		);
	}

	/**
	 * Primary navigation
	 *
	 * @param array $args Arguments.
	 *
	 * @return array
	 */
	public function navigation( array $args ) : array {
		// Bail early if not on correct menu.
		if ( 'primary' !== $args['theme_location'] ) {
			return $args;
		}

		// Add nav-link classes.
		add_filter( 'genesis_attr_nav-link', [ $this, 'nav_link' ], 15, 1 );

		// Customizations.
		$args['depth']       = 2;
		$args['menu_class']  = 'nav';
		$args['bs_version']  = 5;
		$args['walker']      = new BootstrapNavWalker();
		$args['fallback_cb'] = 'BootstrapNavWalker::fallback';
		return $args;
	}

	/**
	 * Add nav-link classes
	 *
	 * @param array $attributes Default attributes.
	 *
	 * @return array
	 */
	public function nav_link( array $attributes ) : array {
		$attributes['class'] = 'nav-link';
		return $attributes;
	}

}
