<?php
/**
 * Template Name: Hidden Title, Clouds Header
 *
 * @package JUMP
 */

namespace JUMP;

\add_filter( 'body_class', __NAMESPACE__ . '\background_image' );
/**
 * Add class to body element
 *
 * @param array $classes Default classes.
 *
 * @return array
 */
function background_image( array $classes ) : array {
	return array_merge( $classes, array( 'bg-clouds' ) );
}

\add_filter( 'genesis_attr_entry-title', __NAMESPACE__ . '\hide_title' );
/**
 * Hide title but still keep it accessible.
 *
 * @param array $attributes Default attributes.
 *
 * @return array
 */
function hide_title( array $attributes ) : array {
	$attributes['class'] .= ' screen-reader-text';
	return $attributes;
}

\genesis();
