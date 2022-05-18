<?php
/**
 * Base functions for all post type creation
 *
 * Uses the Extended CPT repository by John Blackbourn
 *
 * @see https://github.com/johnbillion/extended-cpts/wiki/Registering-Post-Types
 *
 * @package JUMP
 */

namespace JUMP\PostType;

/**
 * Parent for all post types.
 */
abstract class PostType {

	/**
	 * Post type id or key
	 *
	 * @var string
	 */
	protected $slug = '';

	/**
	 * Post type singular name.
	 *
	 * @var string
	 */
	protected $single_name = '';

	/**
	 * Post type plural name.
	 *
	 * @var string
	 */
	protected $plural_name = '';

	/**
	 * Post type optional arguments.
	 *
	 * @var array
	 */
	protected $args = [];

	/**
	 * Hook into WP.
	 *
	 * @return void
	 */
	public function setup() {
		add_action( 'init', [ $this, 'register' ] );
	}

	/**
	 * Register CPTs.
	 *
	 * @return void
	 */
	public function register() {
		register_extended_post_type(
			$this->slug,
			$this->args,
			[
				'singular' => $this->single_name,
				'plural'   => $this->plural_name,
				'slug'     => $this->slug,
			]
		);
	}

}
