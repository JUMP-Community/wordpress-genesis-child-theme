<?php
/**
 * Enqueue.
 *
 * @package JUMP
 */

namespace JUMP;

use JUMP\Singleton;

/**
 * Defaults class
 */
class Enqueue {
	use Singleton;

	/**
	 * Setup actions and filters
	 *
	 * @return void
	 */
	public function setup() {
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_assets' ] );
		add_action( 'enqueue_block_editor_assets', [ $this, 'enqueue_assets' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'deregister_scripts' ] );
		// Genesis style trump.
		// remove_action( 'genesis_meta', 'genesis_load_stylesheet' );
		// add_action( 'wp_enqueue_scripts', 'genesis_enqueue_main_stylesheet', 99 );
	}

	/**
	 * Register and enqueue all scripts and styles.
	 *
	 * @return void
	 */
	public function enqueue_assets() {
		$assets = \genesis_get_config( 'scripts-and-styles' )['add'];

		foreach ( $assets as $asset ) {
			$type      = isset( $asset['type'] ) ? $asset['type'] : '';
			$handle    = $asset['handle'];
			$src       = isset( $asset['src'] ) ? $asset['src'] : '';
			$deps      = isset( $asset['deps'] ) ? $asset['deps'] : [];
			$ver       = isset( $asset['ver'] ) ? $asset['ver'] : \genesis_get_theme_version();
			$media     = isset( $asset['media'] ) ? $asset['media'] : 'all';
			$in_footer = isset( $asset['in_footer'] ) ? $asset['in_footer'] : true;
			$editor    = isset( $asset['editor'] ) ? $asset['editor'] : false;
			$condition = isset( $asset['condition'] ) ? $asset['condition'] : '__return_true';
			$localize  = isset( $asset['localize'] ) ? $asset['localize'] : [];
			$last_arg  = 'style' === $type ? $media : $in_footer;
			$register  = "wp_register_$type";
			$enqueue   = "wp_enqueue_$type";

			if ( \is_admin() && $editor || ! \is_admin() && ! $editor || 'both' === $editor ) {
				if ( is_callable( $condition ) && $condition() ) {
					$register( $handle, $src, $deps, $ver, $last_arg );
					$enqueue( $handle );

					if ( ! empty( $localize ) ) {
						\wp_localize_script( $handle, $localize['name'], $localize['data'] );
					}
				}
			}
		}
	}

	/**
	 * Deregister scripts.
	 *
	 * @return void
	 */
	public function deregister_scripts() {
		$assets = \genesis_get_config( 'scripts-and-styles' )['remove'];

		foreach ( $assets as $asset ) {
			\wp_deregister_script( $asset );
		}
	}

}
