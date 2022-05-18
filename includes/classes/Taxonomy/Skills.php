<?php
/**
 * Registers the Skills taxonomy
 *
 * @package JUMP
 */

namespace JUMP\Taxonomy;

use JUMP\Singleton;

/**
 * Registers the Task taxonomy
 */
final class Skills extends Taxonomy {

	use Singleton;

	/**
	 * Taxonomy id or key
	 *
	 * @var string
	 */
	protected $key = 'skill';

	/**
	 * Taxonomy id or key
	 *
	 * @var array
	 */
	protected $post_types = [ 'service' ];

	/**
	 * Taxonomy singular name.
	 *
	 * @var string
	 */
	protected $single_name = 'Skill';

	/**
	 * Taxonomy plural name.
	 *
	 * @var string
	 */
	protected $plural_name = 'Skills';

	/**
	 * Taxonomy optional arguments.
	 *
	 * @var array
	 */
	protected $args = [];
}
