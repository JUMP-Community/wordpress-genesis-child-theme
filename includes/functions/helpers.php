<?php
/**
 * Helpers.
 *
 * @package JUMP
 */

namespace JUMP\Functions;

/**
 * Returns the child theme directory.
 *
 * @return string
 */
function get_theme_dir() : string {
	static $dir = null;

	if ( \is_null( $dir ) ) {
		$dir = \trailingslashit( \get_stylesheet_directory() );
	}

	return $dir;
}

/**
 * Returns the child theme URL.
 *
 * @return string
 */
function get_theme_url() : string {
	static $url = null;

	if ( \is_null( $url ) ) {
		$url = \trailingslashit( \get_stylesheet_directory_uri() );
	}

	return $url;
}

/**
 * Check if were on any type of singular page.
 *
 * @return bool
 */
function is_type_single() : bool {
	return \is_front_page() || \is_single() || \is_page() || \is_404() || \is_attachment() || \is_singular();
}

/**
 * Check if were on any type of archive page.
 *
 * @return bool
 */
function is_type_archive() : bool {
	return \is_home() || \is_post_type_archive() || \is_category() || \is_tag() || \is_tax() || \is_author() || \is_date() || \is_year() || \is_month() || \is_day() || \is_time() || \is_archive() || \is_search();
}

/**
 * Checks if current page has the hero section enabled.
 *
 * @return bool
 */
function has_hero_section() : bool {
	return \in_array( 'has-hero-section', \get_body_class(), true );
}
