<?php
/**
 * Library / post helpers.
 *
 * - Fallback featured image (a default attachment) when a post has none.
 * - Exclude the current post from secondary query-loop blocks on single views.
 *
 * @package lumina-blocks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Attachment ID used as the fallback featured image.
 */
if ( ! defined( 'THEME_FALLBACK_IMAGE_ID' ) ) {
	define( 'THEME_FALLBACK_IMAGE_ID', 1181 );
}

/**
 * Render a fallback featured image when a post has none. Posts that DO have a
 * featured image are untouched (their image wins).
 *
 * @param string   $block_content Rendered block HTML (empty string when no thumbnail).
 * @param array    $block         Parsed block.
 * @param WP_Block $instance      Block instance.
 * @return string
 */
function theme_fallback_featured_image( $block_content, $block, $instance ) {
	if ( '' !== trim( (string) $block_content ) ) {
		return $block_content;
	}

	$post_id = isset( $instance->context['postId'] ) ? (int) $instance->context['postId'] : get_the_ID();
	$attrs   = isset( $block['attrs'] ) ? $block['attrs'] : array();

	$style = '';
	if ( ! empty( $attrs['style']['border']['radius'] ) ) {
		$style .= 'border-radius:' . $attrs['style']['border']['radius'] . ';';
	}
	if ( ! empty( $attrs['aspectRatio'] ) ) {
		$style .= 'aspect-ratio:' . $attrs['aspectRatio'] . ';object-fit:cover;width:100%;';
	}

	$img = wp_get_attachment_image(
		THEME_FALLBACK_IMAGE_ID,
		'large',
		false,
		array(
			'class' => 'wp-post-image',
			'style' => $style,
			'alt'   => '',
		)
	);

	if ( '' === $img ) {
		return $block_content;
	}

	if ( ! empty( $attrs['isLink'] ) && $post_id ) {
		$img = '<a href="' . esc_url( get_permalink( $post_id ) ) . '">' . $img . '</a>';
	}

	return '<figure class="wp-block-post-featured-image">' . $img . '</figure>';
}
add_filter( 'render_block_core/post-featured-image', 'theme_fallback_featured_image', 10, 3 );

/**
 * Exclude the current post from secondary (non-inherited) query-loop blocks on
 * single post views — e.g. the "You May Also Like" related grid.
 *
 * @param array    $query Query args for the query-loop block.
 * @param WP_Block $block Block instance.
 * @param int      $page  Current page.
 * @return array
 */
function theme_exclude_current_from_query_loop( $query, $block, $page ) {
	if ( is_single() ) {
		$current = get_queried_object_id();
		if ( $current ) {
			$existing              = isset( $query['post__not_in'] ) ? (array) $query['post__not_in'] : array();
			$query['post__not_in'] = array_merge( $existing, array( $current ) );
		}
	}
	return $query;
}
add_filter( 'query_loop_block_query_vars', 'theme_exclude_current_from_query_loop', 10, 3 );
