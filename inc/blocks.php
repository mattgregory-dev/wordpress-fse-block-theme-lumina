<?php
/**
 * Custom block registration.
 *
 * Native blocks whose structural markup must stay in git while their content
 * lives in the database (editing surface = block attributes only). Source is in
 * blocks/; @wordpress/scripts compiles it to build/. Each block is registered
 * from its built block.json.
 *
 * @package lumina-blocks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function lumina_register_blocks() {
	register_block_type( get_template_directory() . '/build/intro-section' );
	register_block_type( get_template_directory() . '/build/spotlight' );
}
add_action( 'init', 'lumina_register_blocks' );
