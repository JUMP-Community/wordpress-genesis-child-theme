<?php
/**
 * Functions.
 *
 * @package JUMP
 */

namespace JUMP;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Definitions.
define( 'FORKLIFT_TEMPLATE_PATH', get_template_directory() );
define( 'FORKLIFT_STYLESHEET_PATH', get_stylesheet_directory() );
define( 'FORKLIFT_CONFIG_PATH', FORKLIFT_STYLESHEET_PATH . '/config' );
define( 'FORKLIFT_DIST_URI', get_stylesheet_directory_uri() . '/dist' );
define( 'FORKLIFT_VENDOR_PATH', FORKLIFT_STYLESHEET_PATH . '/vendor' );
define( 'FORKLIFT_FUNCTIONS_PATH', FORKLIFT_STYLESHEET_PATH . '/includes/functions' );

// Starts the engine (do not remove).
require_once FORKLIFT_TEMPLATE_PATH . '/lib/init.php';

// Load up Composer dependencies.
if ( file_exists( FORKLIFT_VENDOR_PATH . '/autoload.php' ) ) {
	require FORKLIFT_VENDOR_PATH . '/autoload.php';
}

// Functions.
// Do not put into autoloader.
require_once FORKLIFT_FUNCTIONS_PATH . '/header.php';
require_once FORKLIFT_FUNCTIONS_PATH . '/helpers.php';

// Configuration.
// Do not put into autoloader.
require_once FORKLIFT_CONFIG_PATH . '/genesis-settings.php';
require_once FORKLIFT_CONFIG_PATH . '/image-sizes.php';
require_once FORKLIFT_CONFIG_PATH . '/page-layouts.php';
require_once FORKLIFT_CONFIG_PATH . '/post-type-support.php';
require_once FORKLIFT_CONFIG_PATH . '/scripts-and-styles.php';
require_once FORKLIFT_CONFIG_PATH . '/theme-support.php';

// General.
Enqueue::instance()->setup();
Genesis::instance()->setup();
Markup::instance()->setup();
Setup::instance()->setup();

// Post Types.
PostType\Resources::instance()->setup();

// Taxonomies.
Taxonomy\Skills::instance()->setup();

// WordPress.
WordPress\API::instance()->setup();
WordPress\Authors::instance()->setup();
WordPress\Dashboard::instance()->setup();
WordPress\Emojis::instance()->setup();
WordPress\Overrides::instance()->setup();
WordPress\Updates::instance()->setup();
WordPress\Usernames::instance()->setup();
WordPress\WpHead::instance()->setup();
WordPress\XmlRpc::instance()->setup();

// Plugins.
Plugins\ManageWP::instance()->setup();
Plugins\WordPressSeo::instance()->setup();
Plugins\WpMailSmtp::instance()->setup();

// Structure.
Structure\Archive::instance()->setup();
Structure\Footer::instance()->setup();
Structure\Header::instance()->setup();
Structure\Hero::instance()->setup();
Structure\Pagination::instance()->setup();
Structure\Single::instance()->setup();
Structure\SiteContainer::instance()->setup();
Structure\SiteInner::instance()->setup();
Structure\Wrap::instance()->setup();
