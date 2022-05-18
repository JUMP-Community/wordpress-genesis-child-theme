<?php
/**
 * Markup.
 *
 * @package JUMP
 */

namespace JUMP;

use JUMP\Singleton;
use function JUMP\Functions\is_type_archive;
use function JUMP\Functions\is_type_single;

/**
 * Defaults class
 */
class Markup {
	use Singleton;

	/**
	 * Setup actions and filters
	 *
	 * @return void
	 */
	public function setup() {
		add_filter( 'body_class', [ $this, 'body_classes' ] );
		add_action( 'genesis_before', [ $this, 'narrow_content' ] );
	}

	/**
	 * Add additional classes to the body element.
	 *
	 * @param  array $classes Body classes.
	 *
	 * @return array
	 */
	public function body_classes( array $classes ) : array {

		// Remove unnecessary page template classes.
		$template  = \get_page_template_slug();
		$basename  = \basename( $template, '.php' );
		$directory = \str_replace( [ '/', \basename( $template ) ], '', $template );
		$classes   = \array_diff(
			$classes,
			[
				'page-template',
				'page-template-' . $basename,
				'page-template-' . $directory,
				'page-template-' . $directory . $basename . '-php',
			]
		);

		// Add simple template name.
		if ( $basename ) {
			$classes[] = 'template-' . $basename;
		}

		// Add transparent header class.
		if ( \current_theme_supports( 'transparent-header' ) ) {
			$classes[] = 'transparent-header';
		}

		// Add sticky header class.
		if ( \current_theme_supports( 'sticky-header' ) ) {
			$classes[] = 'sticky-header';
		}

		// Add single type class.
		if ( is_type_single() ) {
			$classes[] = 'is-single';
		}

		// Add archive type class.
		if ( is_type_archive() ) {
			$classes[] = 'is-archive';
		}

		// Add no hero section class.
		$classes[] = 'no-hero-section';

		return $classes;
	}

	/**
	 * Remove sidebars on narrow content layout.
	 *
	 * @return void
	 */
	public function narrow_content() {
		if ( 'narrow-content' === \genesis_site_layout() ) {
			\add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );
		}
	}
}
