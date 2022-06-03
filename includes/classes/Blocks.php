<?php
/**
 * Blocks.
 *
 * @package JUMP
 */

namespace JUMP;

use JUMP\Singleton;

/**
 * Class for Blocks
 */
class Blocks {
	use Singleton;

	/**
	 * Setup actions and filters
	 *
	 * @return void
	 */
	public function setup() {
		add_action( 'init', [ $this, 'register_heading_style' ] );
	}

	/**
	 * Register a block style for the heading block.
	 *
	 * @return void
	 */
	public function register_heading_style() {
		register_block_style(
			'core/button',
			array(
				'name'       => 'button-large',
				'label'      => __( 'Large', 'jump' ),
				'is_default' => false,
			)
		);
		register_block_style(
			'core/heading',
			array(
				'name'       => 'pink-heading-outline',
				'label'      => __( 'Pink Outline', 'jump' ),
				'is_default' => false,
			)
		);
		register_block_style(
			'core/heading',
			array(
				'name'       => 'black-heading-outline',
				'label'      => __( 'Black Outline', 'jump' ),
				'is_default' => false,
			)
		);
		register_block_style(
			'core/column',
			array(
				'name'       => 'teal-column-outline',
				'label'      => __( 'Teal Outline', 'jump' ),
				'is_default' => false,
			)
		);
		register_block_style(
			'core/column',
			array(
				'name'       => 'purple-column-outline',
				'label'      => __( 'Purple Outline', 'jump' ),
				'is_default' => false,
			)
		);
		register_block_style(
			'core/column',
			array(
				'name'       => 'pink-column-outline',
				'label'      => __( 'Pink Outline', 'jump' ),
				'is_default' => false,
			)
		);
	}

}
