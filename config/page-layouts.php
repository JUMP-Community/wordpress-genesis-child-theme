<?php
/**
 * Page layouts.
 *
 * @package JUMP
 */

namespace JUMP;

use function JUMP\Functions\get_theme_url;

return [
	'add'    => [
		[
			'id'    => 'narrow-content',
			'label' => __( 'Narrow Content', 'jump' ),
			'img'   => get_theme_url() . 'assets/img/narrow-content.gif',
		],
	],
	'remove' => [
		'content-sidebar-sidebar',
		'sidebar-sidebar-content',
		'sidebar-content-sidebar',
	],
];
