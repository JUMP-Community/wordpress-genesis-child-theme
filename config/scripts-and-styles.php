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
			'handle'  => 'frontend',
			'src'     => JUMP_DIST_URI . '/js/frontend.js',
			'deps'    => [],
			'version' => '',
		],
		[
			'type'    => 'style',
			'handle'  => 'frontend-style',
			'src'     => JUMP_DIST_URI . '/css/frontend-style.css',
			'deps'    => [],
			'version' => '',
		],
	],
	'remove' => [
		'superfish',
	],
];
