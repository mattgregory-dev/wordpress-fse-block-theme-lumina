<?php
/**
 * Front-end asset loading.
 *
 * Loads the compiled SCSS bundle (dist/assets/main.css) and the theme JS
 * bundle (dist/main.js), or the Vite dev server when CUSTOM_WP_VITE_DEV is on.
 *
 * @package lumina-blocks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function theme_is_vite_dev() {
	return defined( 'CUSTOM_WP_VITE_DEV' ) && CUSTOM_WP_VITE_DEV;
}

function theme_assets() {
	$theme_uri = get_template_directory_uri();
	$dist      = $theme_uri . '/dist';

	// Toggle with: define('CUSTOM_WP_VITE_DEV', true); in wp-config.php
	if ( theme_is_vite_dev() ) {
		$vite = 'http://localhost:5175';

		add_filter(
			'script_loader_tag',
			function ( $tag, $handle, $src ) {
				$module_handles = array( 'vite-client', 'theme-main' );
				if ( in_array( $handle, $module_handles, true ) ) {
					// phpcs:ignore WordPress.WP.EnqueuedResources.NonEnqueuedScript -- Filtering an already-enqueued handle.
					return '<script type="module" src="' . esc_url( $src ) . '"></script>';
				}
				return $tag;
			},
			10,
			3
		);

		// phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion -- Dev server, no cache concern.
		wp_enqueue_script( 'vite-client', $vite . '/@vite/client', array(), null, false );
		wp_script_add_data( 'vite-client', 'type', 'module' );

		// Main JS entry served by Vite (imports SCSS in dev).
		// phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion -- Dev server, no cache concern.
		wp_enqueue_script( 'theme-main', $vite . '/main.js', array(), null, false );
		wp_script_add_data( 'theme-main', 'type', 'module' );

		return;
	}

	$main_css_path    = get_template_directory() . '/dist/assets/main.css';
	$main_js_path     = get_template_directory() . '/dist/main.js';
	$main_css_version = file_exists( $main_css_path ) ? filemtime( $main_css_path ) : null;
	$main_js_version  = file_exists( $main_js_path ) ? filemtime( $main_js_path ) : null;

	// Compiled SCSS bundle.
	wp_enqueue_style( 'theme-main', $dist . '/assets/main.css', array(), $main_css_version );

	// Main JS bundle (ES module).
	wp_enqueue_script(
		'theme-main',
		$dist . '/main.js',
		array(),
		$main_js_version,
		array(
			'strategy'  => 'defer',
			'in_footer' => true,
		)
	);
	wp_script_add_data( 'theme-main', 'type', 'module' );
}
add_action( 'wp_enqueue_scripts', 'theme_assets', 999 );

/**
 * Load the compiled SCSS bundle inside the editor canvas too, so custom CSS
 * (image border-radius, form and FAQ styling, button variations, etc.) previews
 * the same as the front end instead of falling back to editor defaults.
 * Note: logo colour is handled separately in theme.json's styles.css, since the
 * logo is a Custom HTML block that the editor previews in an isolated iframe.
 */
function theme_editor_assets() {
	add_editor_style( 'dist/assets/main.css' );
}
add_action( 'after_setup_theme', 'theme_editor_assets' );

// Force the theme main bundle to render as an ES module.
function theme_force_main_module_tag( $tag, $handle, $src ) {
	if ( 'theme-main' !== $handle ) {
		return $tag;
	}
	// phpcs:ignore WordPress.WP.EnqueuedResources.NonEnqueuedScript -- Filtering an already-enqueued handle.
	return '<script type="module" src="' . esc_url( $src ) . '"></script>';
}
add_filter( 'script_loader_tag', 'theme_force_main_module_tag', 20, 3 );
