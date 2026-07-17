<?php
/**
 * Lumina Blocks — theme bootstrap.
 *
 * @package lumina-blocks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Theme module manifest. Each file is self-contained — comment out any
// require_once below to disable that module without removing the file.
$theme_inc = get_template_directory() . '/inc';

require_once $theme_inc . '/theme-setup.php';
require_once $theme_inc . '/template-titles.php';
require_once $theme_inc . '/library.php';
require_once $theme_inc . '/enqueue.php';
require_once $theme_inc . '/preload.php';
require_once $theme_inc . '/branding.php';
require_once $theme_inc . '/cpt.php';
require_once $theme_inc . '/attachments.php';
require_once $theme_inc . '/images.php';
require_once $theme_inc . '/heartbeat.php';
require_once $theme_inc . '/security.php';
require_once $theme_inc . '/comments.php';
require_once $theme_inc . '/analytics.php';
require_once $theme_inc . '/bloat.php';
