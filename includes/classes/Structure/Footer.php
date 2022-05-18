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
		'footer-one',
		'footer-two',
		'footer-three',
		'footer-four',
	];

	/**
	 * Setup actions and filters
	 *
	 * @return void
	 */
	public function setup() {
		add_filter( 'genesis_attr_site-footer', [ $this, 'attributes' ], 10, 1 );
		add_filter( 'genesis_structural_wrap-footer', [ $this, 'wrapper' ], 10, 2 );
		add_action( 'genesis_footer', [ $this, 'navigation' ], 8 );
		add_filter( 'genesis_footer_output', [ $this, 'credits' ] );
	}

	/**
	 * Add Bootstrap utility classes to container.
	 *
	 * @param array $attributes Default attributes.
	 *
	 * @return array
	 */
	public function attributes( array $attributes ) : array {
		$attributes['class'] .= ' mt-5 bg-light border-top pt-5 pb-3';
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
		if ( 'open' === $original_output ) {
			$output = '<div class="container py-5">' . $output;
		}
		if ( 'close' === $original_output ) {
			$output = $output . '</div>';
		}
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
			printf(
				'<div class="col-6 col-lg-3 mb-5"><h4>%s</h4>',
				esc_html( wp_get_nav_menu_name( $location ) )
			);
			// Navigation element.
			genesis_nav_menu(
				[
					'depth'          => 1,
					'theme_location' => $location,
					'menu_class'     => 'nav flex-column',
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
	 * Display the custom credits text wrapped in Bootstrap markup.
	 *
	 * @return string
	 */
	public function credits() : string {
		return sprintf(
			'<div class="col pt-3">%s &#183; %s</div>',
			do_shortcode( '[footer_copyright before="Copyright "]' ),
			esc_html( get_bloginfo( 'name' ) )
		);
	}

	/**
	 * Add nav-link classes
	 *
	 * @param array $attributes Default attributes.
	 *
	 * @return array
	 */
	public function nav_link( array $attributes ) : array {
		$attributes['class'] = 'd-block mb-3';
		return $attributes;
	}

}
