<?php
/**
 * Custom block style variations.
 *
 * Registers the reusable `is-style-*` looks that show up as selectable styles
 * in the editor. The look itself is defined in the escape-hatch SCSS
 * (src/styles/_buttons.scss, _lists.scss); this file only makes the options
 * available.
 *
 * @package lumina-blocks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function theme_register_block_styles() {
	// Secondary button — filled inverse of the default (white fill, black text,
	// black border); hover inverts it. Styled in src/styles/_buttons.scss.
	register_block_style(
		'core/button',
		array(
			'name'  => 'secondary',
			'label' => __( 'Secondary', 'lumina-blocks' ),
		)
	);

	// Checklist — swaps list bullets for a bordered checkmark marker. core/list
	// has no styles by default, so registering this also surfaces a "Default"
	// option alongside it. Styled in src/styles/_lists.scss.
	register_block_style(
		'core/list',
		array(
			'name'  => 'checklist',
			'label' => __( 'Checklist', 'lumina-blocks' ),
		)
	);
}
add_action( 'init', 'theme_register_block_styles' );
