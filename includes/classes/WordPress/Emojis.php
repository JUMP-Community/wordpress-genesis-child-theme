<?php
/**
 * Removes Emoji support from WordPress.
 *
 * @package JUMP
 */

namespace JUMP\WordPress;

use JUMP\Singleton;

/**
 * Class for disabling Emoji support
 */
class Emojis {
	use Singleton;

	/**
	 * Registers instances where we will override default WordPress Core behavior.
	 *
	 * @link https://developer.wordpress.org/reference/functions/print_emoji_detection_script/
	 * @link https://developer.wordpress.org/reference/functions/print_emoji_styles/
	 * @link https://developer.wordpress.org/reference/functions/wp_staticize_emoji/
	 * @link https://developer.wordpress.org/reference/functions/wp_staticize_emoji_for_email/
	 *
	 * @return void
	 */
	public function setup() {
		// Remove the Emoji detection script.
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );

		// Remove inline Emoji detection script.
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );

		// Remove Emoji-related styles from front end and back end.
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );

		// Remove Emoji-to-static-img conversion.
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

		// Remove Emojis from TinyMCE Editor.
		add_filter( 'tiny_mce_plugins', [ $this, 'disable_emojis_tinymce' ] );
		add_filter( 'wp_resource_hints', [ $this, 'disable_emoji_dns_prefetch' ], 10, 2 );
	}

	/**
	 * Remove the TinyMCE emoji plugin.
	 *
	 * @param    array $plugins TinyMCE plugins.
	 *
	 * @return   array
	 */
	public function disable_emojis_tinymce( array $plugins ) : array {
		return array_diff( $plugins, array( 'wpemoji' ) );
	}

	/**
	 * Remove emoji CDN hostname from DNS prefetching hints.
	 *
	 * @param  array  $urls          URLs to print for resource hints.
	 * @param  string $relation_type The relation type the URLs are printed for.
	 *
	 * @return array
	 */
	public function disable_emoji_dns_prefetch( array $urls, string $relation_type ) : array {
		// Bail early if we are not modifying dns-prefetch.
		if ( 'dns-prefetch' !== $relation_type ) {
			return $urls;
		}
		// Strip out any URLs referencing the WordPress.org emoji location.
		foreach ( $urls as $key => $url ) {
			if ( is_array( $url ) ) {
				if ( ! isset( $url['href'] ) ) {
					continue;
				}
				$url = $url['href'];
			}
			if ( strpos( $url, 'https://s.w.org/images/core/emoji/' ) !== false ) {
				unset( $urls[ $key ] );
			}
		}
		return $urls;
	}
}
