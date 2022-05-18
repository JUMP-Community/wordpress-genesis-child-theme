<?php
/**
 * Theme Support.
 *
 * @package JUMP
 */

namespace JUMP;

return [
	'add'    => [
		// 'align-wide',
		'automatic-feed-links',
		// 'editor-styles',
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
		// 'genesis-footer-widgets'   => 0,
		'genesis-menus'            => [
			'primary'      => __( 'Header Menu', 'jump' ),
			'footer-one'   => __( 'Footer One', 'jump' ),
			'footer-two'   => __( 'Footer Two', 'jump' ),
			'footer-three' => __( 'Footer Three', 'jump' ),
			'footer-four'  => __( 'Footer Four', 'jump' ),
		],
		'genesis-structural-wraps' => [
			'header',
			'footer',
			'site-inner',
		],
		// 'gutenberg'                => [
		// 'wide-images' => true,
		// ],
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
