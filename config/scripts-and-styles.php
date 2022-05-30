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
			'deps'    => [ 'jquery' ],
			'version' => wp_get_theme()->get( 'Version' ),
		],
		[
			'type'    => 'style',
			'handle'  => 'frontend-style',
			'src'     => JUMP_DIST_URI . '/css/frontend-style.css',
			'deps'    => [],
			'version' => wp_get_theme()->get( 'Version' ),
		],
	],
	'remove' => [
		'superfish',
	],
];
