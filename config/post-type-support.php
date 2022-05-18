<?php
/**
 * Post type support.
 *
 * @package JUMP
 */

namespace JUMP;

return [
	'add'    => [
		'hero-section' => [ 'page', 'post' ],
	],
	'remove' => [
		'excerpt'                       => [ 'post', 'page' ],
		'genesis-layouts'               => [ 'post', 'page' ],
		'genesis-seo'                   => [ 'post', 'page' ],
		'genesis-breadcrumbs-toggle'    => [ 'post', 'page' ],
		'genesis-footer-widgets-toggle' => [ 'post', 'page' ],
		'genesis-singular-images'       => [ 'post', 'page' ],
		'genesis-title-toggle'          => [ 'post', 'page' ],
		'genesis-adjacent-entry-nav'    => [ 'post', 'page' ],
		'genesis-scripts'               => [ 'post', 'page' ],
	],
];