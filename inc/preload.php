<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Preload critical above-the-fold fonts in <head>.
 *
 * Without this, the browser only discovers @font-face URLs after CSS parses,
 * which delays text rendering and worsens LCP. Preloading fires the requests
 * in parallel with HTML parsing.
 *
 * Only preload fonts used above the fold. Each unused preload wastes
 * bandwidth and competes with other critical resources.
 *
 * These are the self-hosted files registered in theme.json via `fontFace`
 * (assets/fonts/). Keep this list in sync with the above-the-fold families.
 */
function theme_preload_critical_fonts() {
	$base = get_template_directory_uri() . '/assets/fonts';

	// Add or remove based on what the project's above-the-fold UI actually uses.
	// Including unused weights here is a net negative — wastes bandwidth.
	$fonts = array(
		'lato-400.woff2',      // body, default weight
		'marcellus-400.woff2', // heading, default weight
	);

	foreach ( $fonts as $font ) {
		printf(
			'<link rel="preload" href="%s/%s" as="font" type="font/woff2" crossorigin="anonymous">' . "\n",
			esc_url( $base ),
			esc_attr( $font )
		);
	}
}
add_action( 'wp_head', 'theme_preload_critical_fonts', 1 );
