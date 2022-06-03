<?php
/**
 * Setup theme.
 *
 * @package JUMP
 */

namespace JUMP;

use JUMP\Singleton;

/**
 * Defaults class
 */
class Setup {
	use Singleton;

	/**
	 * Setup actions and filters
	 *
	 * @return void
	 */
	public function setup() {
		add_action( 'after_setup_theme', [ $this, 'register_support_before' ], 5 );
		add_action( 'init', [ $this, 'register_support_after' ], 15 );
	}

	/**
	 * Theme setup.
	 *
	 * @return void
	 */
	public function register_support_before() {
		$theme_support = \genesis_get_config( 'theme-support' );
		$image_sizes   = \genesis_get_config( 'image-sizes' );
		$page_layouts  = \genesis_get_config( 'page-layouts' );
		$widget_areas  = \genesis_get_config( 'widget-areas' );

		// Add theme supports.
		\array_walk(
			$theme_support['add'],
			function ( $value, $key ) {
				\is_int( $key ) ? \add_theme_support( $value ) : \add_theme_support( $key, $value );
			}
		);

		// Remove theme supports.
		\array_walk(
			$theme_support['remove'],
			function ( $name ) {
				\remove_theme_support( $name );
			}
		);

		// Add image sizes.
		\array_walk(
			$image_sizes['add'],
			function ( $args, $name ) {
				\add_image_size( $name, $args[0], $args[1], $args[2] );
			}
		);

		// Remove image sizes.
		\array_walk(
			$image_sizes['remove'],
			function ( $name ) {
				\remove_image_size( $name );
			}
		);

		// Add page layouts.
		\array_walk(
			$page_layouts['add'],
			function ( $args ) {
				\genesis_register_layout( $args['id'], $args );
			}
		);

		// Remove page layouts.
		\array_walk(
			$page_layouts['remove'],
			function ( $name ) {
				\genesis_unregister_layout( $name );
			}
		);

		// Add widget areas.
		\array_walk(
			$widget_areas['add'],
			function ( $id ) {
				\genesis_register_widget_area( $id );
			}
		);

		// Remove widget areas.
		\array_walk(
			$widget_areas['remove'],
			function ( $id ) {
				\unregister_sidebar( $id );
			}
		);
	}

	/**
	 * Theme setup.
	 *
	 * @return void
	 */
	public function register_support_after() {
		$post_type_support = \genesis_get_config( 'post-type-support' );

		// Add post type supports.
		\array_walk(
			$post_type_support['add'],
			function ( $post_types, $feature ) {
				foreach ( $post_types as $post_type ) {
					\add_post_type_support( $post_type, $feature );
				}
			}
		);

		// Remove post type supports.
		\array_walk(
			$post_type_support['remove'],
			function ( $post_types, $feature ) {
				foreach ( $post_types as $post_type ) {
					\remove_post_type_support( $post_type, $feature );
				}
			}
		);

	}
}
