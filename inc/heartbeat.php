<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Throttle the WP heartbeat from 15s (editor default) to 60s.
function theme_throttle_heartbeat( $settings ) {
	$settings['interval'] = 60;
	return $settings;
}
add_filter( 'heartbeat_settings', 'theme_throttle_heartbeat' );

// Disable heartbeat entirely on the front-end. Heartbeat exists for the
// admin (autosave, post-locking, etc.) and has no purpose on public pages.
function theme_disable_heartbeat_on_frontend() {
	if ( ! is_admin() ) {
		wp_deregister_script( 'heartbeat' );
	}
}
add_action( 'init', 'theme_disable_heartbeat_on_frontend', 1 );
