<?php
/**
 * Template Name: Outline Title
 *
 * @package JUMP
 */

namespace JUMP;

\add_filter( 'genesis_attr_entry-title', __NAMESPACE__ . '\entry_title_style' );
/**
 * Add utility class to entry title.
 *
 * @param array $attributes Default attributes.
 *
 * @return array
 */
function entry_title_style( array $attributes ) : array {
	$attributes['class'] .= ' is-style-pink-heading-outline';
	return $attributes;
}

\genesis();
