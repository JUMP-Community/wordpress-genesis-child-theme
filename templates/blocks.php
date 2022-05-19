<?php
/**
 * Template Name: Blocks
 *
 * @package JUMP
 */

namespace JUMP;

\add_filter( 'genesis_site_layout', __NAMESPACE__ . '\blocks_template_layout' );
/**
 * Gets the correct page layout for the template.
 *
 * @return string
 */
function blocks_template_layout() : string {
	$layout = \genesis_get_custom_field( '_genesis_layout' );

	if ( 'content-sidebar' === $layout || 'sidebar-content' === $layout ) {
		$layout = 'narrow-content';
	}

	return $layout;
}

// Removes hero section.
\remove_theme_support( 'hero-section' );

// Removes breadcrumbs.
\remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

// Removes entry header.
\remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
\remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
\remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
\remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );

\genesis();
