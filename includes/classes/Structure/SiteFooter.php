<?php
/**
 * Site Footer
 *
 * @package JUMP
 */

namespace JUMP\Structure;

use JUMP\Singleton;
use JUMP\BootstrapNavWalker;

/**
 * Class for SiteFooter
 */
class SiteFooter {
	use Singleton;

	/**
	 * Footer menu locations.
	 */
	const FOOTER_MENU_LOCATIONS = [
		'footer',
	];

	/**
	 * Setup actions and filters
	 *
	 * @return void
	 */
	public function setup() {
		add_filter( 'genesis_structural_wrap-footer', [ $this, 'wrapper_footer' ], 10, 2 );
		add_filter( 'genesis_structural_wrap-footer-widgets', [ $this, 'wrapper_widgets' ], 10, 2 );
		add_action( 'genesis_footer', [ $this, 'navigation' ], 8 );
		add_filter( 'genesis_footer_output', [ $this, 'credits' ] );
		add_filter( 'genesis_attr_nav-footer', [ $this, 'nav_aria_label' ] );
	}

	/**
	 * Wrap the 'row' within a Bootstrap 'container' class
	 *
	 * @param string $output HTML markup.
	 * @param string $original_output Open or close.
	 *
	 * @return string
	 */
	public function wrapper_footer( string $output, string $original_output ) : string {
		$output = 'open' === $original_output ? '<div class="container py-3">' . $output : $output;
		$output = 'close' === $original_output ? $output . '</div>' : $output;
		return $output;
	}

	/**
	 * Wrap the 'row' within a Bootstrap 'container' class
	 *
	 * @param string $output HTML markup.
	 * @param string $original_output Open or close.
	 *
	 * @return string
	 */
	public function wrapper_widgets( string $output, string $original_output ) : string {
		$output = 'open' === $original_output ? '<div class="container py-2">' . $output : $output;
		$output = 'close' === $original_output ? $output . '</div>' : $output;
		return $output;
	}

	/**
	 * Display the footer menus with Bootstrap grid.
	 *
	 * @return void
	 */
	public function navigation() {
		foreach ( self::FOOTER_MENU_LOCATIONS as $location ) {
			// Add nav-link classes.
			add_filter( 'genesis_attr_nav-link', [ $this, 'nav_link' ], 15, 1 );
			// Opening container and heading.
			echo '<div class="col-12 text-center mb-3">';
			// Navigation element.
			genesis_nav_menu(
				[
					'depth'          => 1,
					'theme_location' => $location,
					'menu_class'     => 'nav flex-column flex-md-row justify-content-center',
					'bs_version'     => 5,
					'walker'         => new BootstrapNavWalker(),
					'fallback_cb'    => 'BootstrapNavWalker::fallback',
				]
			);
			// Closing markup.
			echo '</div>';
		}
	}

	/**
	 * Add nav-link classes
	 *
	 * @param array $attributes Default attributes.
	 *
	 * @return array
	 */
	public function nav_link( array $attributes ) : array {
		$attributes['class'] = 'd-block mx-0 mx-md-3 mb-4 mb-md-0 text-decoration-none';
		return $attributes;
	}

	/**
	 * Display the custom credits text wrapped in Bootstrap markup.
	 *
	 * @return string
	 */
	public function credits() : string {
		return sprintf(
			'<div class="col-12 text-center">%s &#183; %s</div>',
			do_shortcode( '[footer_copyright before=" "]' ),
			esc_html__( 'Parachute, LLC', 'jump' )
		);
	}

	/**
	 * Site footer aria label
	 *
	 * @param array $attributes Default attributes.
	 *
	 * @return array
	 */
	public function nav_aria_label( array $attributes ) : array {
		$attributes['aria-label'] = esc_html__( 'Footer Navigation', 'jump' );
		return $attributes;
	}

}
