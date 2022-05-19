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
		'automatic-feed-links',
		'genesis-accessibility'    => [
			'404-page',
			// 'drop-down-menu',
			'headings',
			'rems',
			'search-form',
			'skip-links',
		],
		// 'genesis-custom-logo'      => [
		// 'height'      => 60,
		// 'width'       => 120,
		// 'flex-height' => true,
		// 'flex-width'  => true,
		// 'header-text' => [
		// '.site-title',
		// '.site-description',
		// ],
		// ],
		'genesis-footer-widgets'   => 1,
		'genesis-menus'            => [
			'primary'        => __( 'Main Menu', 'jump' ),
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
		// 'hero-section',
		'html5'                    => [
			'caption',
			'comment-form',
			'comment-list',
			'gallery',
			'search-form',
		],
		'post-thumbnails',
		'responsive-embeds',
		// phpcs:ignore Squiz.PHP.CommentedOutCode.Found
		// 'sticky-header',
		// phpcs:ignore Squiz.PHP.CommentedOutCode.Found
		// 'transparent-header',
		'wp-block-styles',
	],
	'remove' => [],
];
