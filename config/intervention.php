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
			'advanced-custom-fields-pro/acf.php' => true,
			'intervention'                       => true,
			'worker/init.php'                    => true,
			'query-monitor'                      => true,
			'redirection'                        => true,
			'tracking-code-for-google-analytics' => true,
			'wp-mail-smtp/wp_mail_smtp.php'      => true,
			'wp-search-with-algolia/algolia.php' => true,
			'wordpress-seo/wp-seo.php'           => true,
		],
		'general'             => [
			'site-title'   => 'JUMP',
			'tagline'      => 'JUMP',
			'admin-email'  => 'support@joinjump.community',
			'membership'   => false,
			'default-role' => 'subscriber',
			'language'     => 'en_US',
			'timezone'     => 'America/Chicago',
			'date-format'  => 'F j, Y',
			'time-format'  => 'g:i a',
			'week-starts'  => 'Mon',
		],
		'writing'             => [
			'default-category'    => 10,
			'default-post-format' => 'standard',
		],
		'reading'             => [
			'front-page'        => 2,
			'front-page.posts'  => 10,
			'posts-per-page'    => 20,
			'posts-per-rss'     => 20,
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
				'width'  => 1024,
				'height' => 1024,
				'crop'   => false,
			],
			'mimes.svg'        => true,
			'uploads.organize' => true,
		],
		'permalinks'          => [
			'structure'     => '/%postname%/',
			'category-base' => '',
			'tag-base'      => '',
			'search-base'   => 'search',
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
