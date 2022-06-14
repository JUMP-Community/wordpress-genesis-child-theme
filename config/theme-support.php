<?php
/**
 * Theme Support.
 *
 * @package JUMP
 */

namespace JUMP;

return [
	'add'    => [
		'align-wide',
		'genesis-accessibility'    => [
			'404-page',
			'headings',
			'rems',
			'search-form',
			'skip-links',
		],
		'genesis-custom-logo'      => [
			'height'      => 50,
			'width'       => 50,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => [
				'.site-title',
				'.site-description',
			],
		],
		'genesis-footer-widgets'   => 1,
		'genesis-menus'            => [
			'primary'        => __( 'Primary Menu', 'jump' ),
			'secondary'      => __( 'Secondary Menu', 'jump' ),
			'footer'         => __( 'Footer Menu', 'jump' ),
			'command-center' => __( 'Command Center Menu', 'jump' ),
		],
		'genesis-structural-wraps' => [
			'header',
			'site-inner',
			'footer-widgets',
			'footer',
		],
		'gutenberg'                => [
			'wide-images' => true,
		],
		'html5'                    => [
			'caption',
			'comment-form',
			'comment-list',
			'gallery',
			'search-form',
		],
		'responsive-embeds',
		'wp-block-styles',
	],
	'remove' => [
		'genesis-breadcrumbs',
		'genesis-auto-updates',
		'genesis-archive-layouts',
		'genesis-seo-settings-menu',
		'genesis-import-export-menu',
		'genesis-customizer-seo-settings',
	],
];
