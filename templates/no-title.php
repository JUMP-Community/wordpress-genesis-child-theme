<?php
/**
 * Template Name: Hidden Title
 *
 * @package JUMP
 */

namespace JUMP;

\add_filter( 'genesis_attr_entry-title', __NAMESPACE__ . '\hide_title' );
/**
 * Hide title but still keep it accessible.
 *
 * @param array $attributes Default attributes.
 *
 * @return string
 */
function hide_title( array $attributes ) : array {
	$attributes['class'] .= ' screen-reader-text';
	return $attributes;
}

\genesis();
