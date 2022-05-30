<?php
/**
 * Post type support.
 *
 * @package JUMP
 */

namespace JUMP;

return [
	'add'    => [
		'genesis-singular-images' => [ 'post', 'page' ],
	],
	'remove' => [
		'excerpt'                           => [ 'post', 'page' ],
		'genesis-seo'                       => [ 'post', 'page' ],
		'genesis-breadcrumbs-toggle'        => [ 'post', 'page' ],
		'genesis-footer-widgets-toggle'     => [ 'post', 'page' ],
		'genesis-title-toggle'              => [ 'post', 'page' ],
		'genesis-adjacent-entry-nav'        => [ 'post', 'page' ],
		'genesis-scripts'                   => [ 'post', 'page' ],
		'genesis-entry-meta-before-content' => [ 'single-memberpressproduct' ],
		'genesis-entry-meta-after-content'  => [ 'single-memberpressproduct' ],
	],
];
