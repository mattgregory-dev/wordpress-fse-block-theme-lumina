<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Google Analytics 4 (gtag.js) output.
 *
 * Active by default but no-ops unless `THEME_GA_MEASUREMENT_ID` is defined
 * in `wp-config.php`. To enable, add:
 *
 *     define( 'THEME_GA_MEASUREMENT_ID', 'G-XXXXXXXXXX' );
 *
 * Skips:
 *   - Vite dev mode (CUSTOM_WP_VITE_DEV) — no analytics from local work.
 *   - Logged-in users — admins clicking around shouldn't pollute stats.
 *
 * Performance:
 *   - Emits `<link rel="preconnect">` to googletagmanager.com and
 *     google-analytics.com so TLS handshakes start before the gtag.js
 *     request fires (saves ~100-300ms on first event).
 *   - Loads gtag.js with `async` so it doesn't block parsing or rendering.
 *
 * Hooked at `wp_head` priority 5 so it runs early in <head> (before
 * preloads and stylesheets), giving preconnect the maximum head start.
 */
function theme_output_google_analytics_tag() {
	if ( theme_is_vite_dev() || is_user_logged_in() ) {
		return;
	}

	if ( ! defined( 'THEME_GA_MEASUREMENT_ID' ) ) {
		return;
	}

	$ga_measurement_id = trim( (string) THEME_GA_MEASUREMENT_ID );
	if ( '' === $ga_measurement_id ) {
		return;
	}

	$ga_script_url = add_query_arg( 'id', $ga_measurement_id, 'https://www.googletagmanager.com/gtag/js' );
	?>
	<!-- Google tag (gtag.js) -->
	<link rel="preconnect" href="https://www.googletagmanager.com" crossorigin>
	<link rel="preconnect" href="https://www.google-analytics.com" crossorigin>
	<script async src="<?php echo esc_url( $ga_script_url ); ?>"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', <?php echo wp_json_encode( $ga_measurement_id ); ?>);
	</script>
	<?php
}
add_action( 'wp_head', 'theme_output_google_analytics_tag', 5 );
