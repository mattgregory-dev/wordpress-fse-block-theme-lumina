<?php
/**
 * Custom block style variations.
 *
 * Registers the reusable `is-style-*` looks that show up as selectable styles
 * in the editor. The look itself is defined in the escape-hatch SCSS
 * (src/styles/_buttons.scss); this file only makes the option available.
 *
 * @package lumina-blocks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Secondary button — a filled inverse of the default (primary) button:
 * white fill, black text, black border. Hover inverts it.
 */
function theme_register_block_styles() {
	register_block_style(
		'core/button',
		array(
			'name'  => 'secondary',
			'label' => __( 'Secondary', 'lumina-blocks' ),
		)
	);
}
add_action( 'init', 'theme_register_block_styles' );
