<?php
/**
 * Footer
 *
 * @package JUMP
 */

namespace JUMP\Structure;

use JUMP\Singleton;
use JUMP\BootstrapNavWalker;

/**
 * Class for Footer
 */
class Footer {
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
		add_filter( 'genesis_structural_wrap-footer', [ $this, 'wrapper' ], 10, 2 );
		add_action( 'genesis_footer', [ $this, 'navigation' ], 8 );
		add_filter( 'genesis_footer_output', [ $this, 'credits' ] );
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
		$output = 'open' === $original_output ? '<div class="container py-5">' . $output : $output;
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
			echo '<div class="col-12 text-center pb-4">';
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
		$attributes['class'] = 'd-block mx-0 mx-md-4 mb-4 mb-md-0';
		return $attributes;
	}

	/**
	 * Display the custom credits text wrapped in Bootstrap markup.
	 *
	 * @return string
	 */
	public function credits() : string {
		return sprintf(
			'<div class="col-12 text-center pt-4">%s &#183; %s</div>',
			do_shortcode( '[footer_copyright before=" "]' ),
			esc_html__( 'Parachute, LLC', 'jump' )
		);
	}

}
