<?php
/**
 * Scripts and Styles.
 *
 * @package JUMP
 */

namespace JUMP;

return [
	'add'    => [
		[
			'type'    => 'script',
			'handle'  => 'shared',
			'src'     => FORKLIFT_DIST_URI . '/js/shared.js',
			'deps'    => [],
			'version' => '',
			'editor'  => true,
		],
		[
			'type'    => 'script',
			'handle'  => 'admin',
			'src'     => FORKLIFT_DIST_URI . '/js/admin.js',
			'deps'    => [],
			'version' => '',
			'editor'  => true,
		],
		[
			'type'    => 'script',
			'handle'  => 'frontend',
			'src'     => FORKLIFT_DIST_URI . '/js/frontend.js',
			'deps'    => [],
			'version' => '',
		],
		[
			'type'    => 'style',
			'handle'  => 'shared-style',
			'src'     => FORKLIFT_DIST_URI . '/css/shared-style.css',
			'deps'    => [],
			'version' => '',
			'editor'  => true,
		],
		[
			'type'    => 'style',
			'handle'  => 'admin-style',
			'src'     => FORKLIFT_DIST_URI . '/css/admin-style.css',
			'deps'    => [],
			'version' => '',
		],
		[
			'type'    => 'style',
			'handle'  => 'editor-style',
			'src'     => FORKLIFT_DIST_URI . '/css/editor-style.css',
			'deps'    => [],
			'version' => '',
			'editor'  => true,
		],
		[
			'type'    => 'style',
			'handle'  => 'bootstrap',
			'src'     => 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css',
			'deps'    => [],
			'version' => '',
		],
		[
			'type'    => 'style',
			'handle'  => 'frontend-style',
			'src'     => FORKLIFT_DIST_URI . '/css/frontend-style.css',
			'deps'    => [],
			'version' => '',
		],
	],
	'remove' => [
		'superfish',
	],
];
