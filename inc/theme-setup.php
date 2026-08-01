<?php
/**
 * Theme supports and setup for a block (FSE) theme.
 *
 * @package lumina-blocks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function theme_setup() {
	load_theme_textdomain( 'lumina-blocks', get_template_directory() . '/languages' );

	// Block themes provide title-tag, post-thumbnails, responsive-embeds and
	// HTML5 automatically, but declaring the ones we rely on is harmless and explicit.
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support(
		'html5',
		array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
			'navigation-widgets',
		)
	);

	// Load the compiled SCSS bundle inside the block editor so the editor
	// canvas matches the front end. Relative to the theme root.
	add_editor_style( 'dist/assets/main.css' );
}
add_action( 'after_setup_theme', 'theme_setup' );

/**
 * Register the theme's block-pattern category. The Lumina starter patterns —
 * one configured stamp per custom block — group under it in the inserter,
 * separate from WordPress's core pattern categories.
 */
function lumina_register_pattern_categories() {
	register_block_pattern_category(
		'lumina-blocks',
		array( 'label' => __( 'Lumina', 'lumina-blocks' ) )
	);
}
add_action( 'init', 'lumina_register_pattern_categories' );
