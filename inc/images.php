<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Override the threshold above which WP scales uploaded images.
// WP default is 2560px. Bumped to 3000 so retina-density source images
// survive their initial upload pass.
function theme_big_image_size_threshold() {
	return 3000;
}
add_filter( 'big_image_size_threshold', 'theme_big_image_size_threshold' );

// Override default JPEG quality. WP default is 82.
function theme_jpeg_quality() {
	return 85;
}
add_filter( 'jpeg_quality', 'theme_jpeg_quality' );

// LCP hint: promote the first attachment image rendered inside the main loop
// on a singular page (typically `the_post_thumbnail()`) to `loading="eager"`
// and `fetchpriority="high"`. Overrides WP's auto-heuristic, which can pick
// the wrong image on layouts with logos/avatars/nav icons above the hero.
//
// Only affects images flowing through wp_get_attachment_image[*] functions.
// Hand-written <img> tags must set loading/fetchpriority themselves.
function theme_lcp_image_hint( $attr ) {
	static $promoted = false;

	if ( $promoted ) {
		return $attr;
	}
	if ( is_admin() || is_feed() ) {
		return $attr;
	}
	if ( ! is_singular() || ! in_the_loop() || ! is_main_query() ) {
		return $attr;
	}

	$attr['loading']       = 'eager';
	$attr['fetchpriority'] = 'high';
	$promoted              = true;

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'theme_lcp_image_hint' );

//////////////////////////////////////////////////
//////////////// SVG uploads /////////////////////
//////////////////////////////////////////////////
//
// SVGs can carry inline JavaScript that executes when the file is rendered,
// so they are blocked by default. To allow uploads safely, choose ONE:
//
//   1. Install the "Safe SVG" plugin (by 10up). Sanitization happens at
//      upload time, no theme code change required.
//
//   2. `composer require enshrined/svg-sanitize`, then in a custom
//      wp_handle_upload_prefilter add the sanitizer call before WP stores
//      the file. Then uncomment the filter below.
//
// The bare allow-list below is INTENTIONALLY commented out. Do not enable
// without one of the sanitization paths above in place — uploaded SVGs
// will execute JS in the context of any logged-in user who views them.
//
// function theme_allow_svg_upload( $mimes ) {
//   $mimes['svg'] = 'image/svg+xml';
//   return $mimes;
// }
// add_filter( 'upload_mimes', 'theme_allow_svg_upload' );
