<?php
/**
 * Post Type: Resource
 *
 * @package JUMP
 */

namespace JUMP\PostType;

use JUMP\Singleton;

/**
 * Registers the post type.
 */
final class Resource extends PostType {
	use Singleton;

	/**
	 * CPT slug.
	 *
	 * @var string
	 */
	protected $slug = 'resource';

	/**
	 * CPT singular name.
	 *
	 * @var string
	 */
	protected $single_name = 'Resource';

	/**
	 * CPT plural name.
	 *
	 * @var string
	 */
	protected $plural_name = 'Resources';

	/**
	 * CPT custom arguments.
	 *
	 * @var array
	 */
	protected $args = [
		'menu_icon' => 'dashicons-desktop',
	];

}
