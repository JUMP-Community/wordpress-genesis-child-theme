<?php
/**
 * Configuration for Intervention plugin
 *
 * @see https://github.com/soberwp/intervention
 *
 * @package JUMP
 */

return [
	'application'  => [
		'theme'               => 'jump',
		'plugins'             => [
			'coblocks/class-coblocks.php'        => true,
			'gutenberg'                          => true,
			'intervention'                       => true,
			'worker/init.php'                    => true,
			'memberpress'                        => true,
			'page-links-to'                      => true,
			'tracking-code-for-google-analytics' => true,
			'uncomment/plugin.php'               => true,
			'wordpress-seo/wp-seo.php'           => true,
		],
		'writing'             => [
			'default-category'    => 9,
			'default-post-format' => 'standard',
		],
		'reading'             => [
			'front-page'        => 83,
			'front-page.posts'  => 212,
			'posts-per-page'    => 10,
			'posts-per-rss'     => 10,
			'rss-excerpt'       => 'summary',
			'discourage-search' => false,
		],
		'discussion'          => false,
		'media'               => [
			'sizes.thumbnail'  => [
				'width'  => 150,
				'height' => 150,
				'crop'   => true,
			],
			'sizes.medium'     => [
				'width'  => 300,
				'height' => 300,
				'crop'   => false,
			],
			'sizes.large'      => [
				'width'  => 1040,
				'height' => 600,
				'crop'   => true,
			],
			'mimes.svg'        => false,
			'uploads.organize' => true,
		],
		'permalinks'          => [
			'structure'     => '/%year%/%monthnum%/%postname%/',
			'category-base' => '',
			'tag-base'      => '',
		],
		'privacy.policy-page' => 3,
	],
	'wp-admin.all' => [
		'login'      => [
			'logo',
			'back',
			'policy',
		],
		'appearance' => [
			'theme-editor',
		],
		'common'     => [
			'adminbar' => [
				'wp',
				'updates',
				'new',
				'search',
				'comments',
				'customize',
				'user' => [
					'howdy',
				],
			],
			'updates',
			'footer',
			'tabs'     => [
				'help',
			],
		],
		'dashboard'  => [
			'home' => [
				'tabs',
				'cols' => 2,
				'welcome',
				'notices',
				'activity',
				'recent-comments',
				'incoming-links',
				'plugins',
				'quick-draft',
				'drafts',
				'news',
				'site-health',
			],
		],
		'plugins'    => [
			'plugin-editor',
		],
		'users'      => [
			'profile' => [
				'options',
				'contact',
				'about',
			],
		],
	],
];
