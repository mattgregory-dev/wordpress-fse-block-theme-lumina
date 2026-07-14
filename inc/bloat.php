<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Disable the JS-based emoji polyfill. Modern OSes render emoji natively.
function theme_disable_emoji() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'theme_disable_emoji' );

// Strip the s.w.org dns-prefetch hint that exists only to support emoji.
function theme_remove_emoji_dns_prefetch( $urls, $relation_type ) {
	if ( 'dns-prefetch' === $relation_type ) {
		$urls = array_diff(
			$urls,
			array( 'http://s.w.org', 'https://s.w.org', 's.w.org' )
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'theme_remove_emoji_dns_prefetch', 10, 2 );

// Strip <meta name="generator" content="WordPress X.Y"> from <head>.
function theme_remove_generator() {
	remove_action( 'wp_head', 'wp_generator' );
}
add_action( 'init', 'theme_remove_generator' );

// Disable oEmbed: pasted URLs render as plain links instead of rich embeds,
// no wp-embed JS, no discovery links advertising our oEmbed endpoint.
function theme_disable_oembed() {
	if ( isset( $GLOBALS['wp_embed'] ) ) {
		remove_filter( 'the_content', array( $GLOBALS['wp_embed'], 'autoembed' ), 8 );
	}
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
	remove_action( 'wp_head', 'wp_oembed_add_host_js' );
	wp_deregister_script( 'wp-embed' );
}
add_action( 'init', 'theme_disable_oembed', 9999 );

// Conditionally load core block library CSS only on singular pages whose
// content actually contains blocks. Saves ~30KB on archives, search results,
// and PHP-only templates.
function theme_conditional_block_library() {
	if ( is_singular() && has_blocks() ) {
		return;
	}
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
}
add_action( 'wp_enqueue_scripts', 'theme_conditional_block_library', 100 );

// Drop classic-theme-styles (default <button> styling for classic themes).
// Our SCSS supplies button styling.
function theme_dequeue_classic_styles() {
	wp_dequeue_style( 'classic-theme-styles' );
	wp_deregister_style( 'classic-theme-styles' );
}
add_action( 'wp_enqueue_scripts', 'theme_dequeue_classic_styles', 100 );
