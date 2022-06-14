<?php
/**
 * Registers the Brief taxonomy
 *
 * @package JUMP
 */

namespace JUMP\Taxonomy;

use JUMP\Singleton;

/**
 * Registers the Task taxonomy
 */
final class Brief extends Taxonomy {

	use Singleton;

	/**
	 * Taxonomy id or key
	 *
	 * @var string
	 */
	protected $key = 'brief';

	/**
	 * Taxonomy id or key
	 *
	 * @var array
	 */
	protected $post_types = [ 'post' ];

	/**
	 * Taxonomy singular name.
	 *
	 * @var string
	 */
	protected $single_name = 'Brief';

	/**
	 * Taxonomy plural name.
	 *
	 * @var string
	 */
	protected $plural_name = 'Briefs';

	/**
	 * Taxonomy optional arguments.
	 *
	 * @var array
	 */
	protected $args = [
		'hierarchical'      => false,
		'meta_box'          => 'simple',
		'show_in_rest'      => true,
		'show_admin_column' => true,
	];
}
