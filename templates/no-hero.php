<?php
/**
 * Template Name: No Hero
 *
 * Template Post Type: post, page, product, portfolio
 *
 * @package JUMP
 */

namespace JUMP;

// Removes hero section.
\remove_theme_support( 'hero-section' );

// Runs the Genesis loop.
genesis();
