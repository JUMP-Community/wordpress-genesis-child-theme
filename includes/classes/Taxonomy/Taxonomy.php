<?php
/**
 * Base functions for creating taxonomy
 *
 * Uses the Extended CPTs repository by John Blackbourn
 *
 * @see https://github.com/johnbillion/extended-cpts/wiki/Registering-taxonomies
 *
 * @package JUMP
 */

namespace JUMP\Taxonomy;

/**
 * Base functions for creating taxonomy
 */
abstract class Taxonomy {

	/**
	 * Taxonomy id or key
	 *
	 * @var string
	 */
	protected $key = '';

	/**
	 * Post types for this taxonomy
	 *
	 * @var array
	 */
	protected $post_types = [];

	/**
	 * Taxonomy singular name.
	 *
	 * @var string
	 */
	protected $single_name = '';

	/**
	 * Taxonomy plural name.
	 *
	 * @var string
	 */
	protected $plural_name = '';

	/**
	 * Taxonomy optional arguments.
	 *
	 * @var array
	 */
	protected $args = array();

	/**
	 * Setup hooks and filters
	 *
	 * @return void
	 */
	public function setup() {
		add_action( 'init', [ $this, 'register' ] );
	}

	/**
	 * Registers the taxonomy
	 *
	 * @return void
	 */
	public function register() {
		register_extended_taxonomy(
			$this->key,
			$this->post_types,
			$this->args,
			[
				'slug'     => $this->key,
				'singular' => $this->single_name,
				'plural'   => $this->plural_name,
			]
		);
	}

}
