<?php
/**
 * Post Type: Service
 *
 * @package JUMP
 */

namespace JUMP\PostType;

use JUMP\Singleton;

/**
 * Registers the post type.
 */
final class Services extends PostType {
	use Singleton;

	/**
	 * CPT slug.
	 *
	 * @var string
	 */
	protected $slug = 'service';

	/**
	 * CPT singular name.
	 *
	 * @var string
	 */
	protected $single_name = 'Service';

	/**
	 * CPT plural name.
	 *
	 * @var string
	 */
	protected $plural_name = 'Services';

	/**
	 * CPT custom arguments.
	 *
	 * @var array
	 */
	protected $args = [
		'menu_icon' => 'dashicons-desktop',
	];

}
