<?php
/**
 * Human-readable titles and descriptions for the theme's custom
 * page-{slug} templates in the Site Editor.
 *
 * Standard templates (index, 404, single, page…) receive friendly names from
 * WordPress core's default template-type list. Custom slugs such as
 * `page-about` have no core entry, so they fall back to the raw filename.
 *
 * This module supplies names/descriptions for those custom templates WITHOUT
 * registering them in theme.json `customTemplates` — which would also expose
 * them as selectable templates in every page's Template panel. We only want
 * the labels in the Templates list, not the selector clutter.
 *
 * @package lumina-blocks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Map of custom template slug => array( title, description ).
 *
 * @return array<string, array{0:string,1:string}>
 */
function theme_custom_template_labels() {
	return array(
		'page-retreat'       => array(
			__( 'Retreat', 'lumina-blocks' ),
			__( 'The retreat offer — hero, the work, itinerary, pricing, and FAQ.', 'lumina-blocks' ),
		),
		'page-about'         => array(
			__( 'About', 'lumina-blocks' ),
			__( 'The people behind Lumina — founder bios and the story.', 'lumina-blocks' ),
		),
		'page-beliefs'       => array(
			__( 'Beliefs', 'lumina-blocks' ),
			__( 'The philosophy and values behind the work.', 'lumina-blocks' ),
		),
		'page-care-protocol' => array(
			__( 'Care Protocol', 'lumina-blocks' ),
			__( 'Screening, preparation, and how guests are supported.', 'lumina-blocks' ),
		),
		'page-apply'         => array(
			__( 'Apply', 'lumina-blocks' ),
			__( 'The application page — steps, the Forminator form, and an alternative-path CTA.', 'lumina-blocks' ),
		),
	);
}

/**
 * Apply our custom label + description to a single template object.
 *
 * Templates are objects, so mutating the passed instance is enough; the return
 * value is provided for the single-template filters.
 *
 * @param WP_Block_Template|null $template Template object, or null when not found.
 * @return WP_Block_Template|null
 */
function theme_apply_custom_template_label( $template ) {
	if ( ! $template instanceof WP_Block_Template ) {
		return $template;
	}

	$labels = theme_custom_template_labels();

	if ( isset( $labels[ $template->slug ] ) ) {
		$template->title       = $labels[ $template->slug ][0];
		$template->description = $labels[ $template->slug ][1];
	}

	return $template;
}

/**
 * Relabel our custom templates in the Site Editor template list.
 *
 * @param WP_Block_Template[] $query_result  Retrieved templates.
 * @param array               $query         The query arguments (unused).
 * @param string              $template_type 'wp_template' or 'wp_template_part'.
 * @return WP_Block_Template[]
 */
function theme_filter_block_templates_titles( $query_result, $query, $template_type ) {
	if ( 'wp_template' !== $template_type ) {
		return $query_result;
	}

	foreach ( $query_result as $template ) {
		theme_apply_custom_template_label( $template );
	}

	return $query_result;
}
add_filter( 'get_block_templates', 'theme_filter_block_templates_titles', 10, 3 );

/**
 * Relabel a single custom template (editing it directly, REST, etc.).
 *
 * @param WP_Block_Template|null $block_template Template object.
 * @return WP_Block_Template|null
 */
function theme_filter_single_block_template_title( $block_template ) {
	return theme_apply_custom_template_label( $block_template );
}
add_filter( 'get_block_template', 'theme_filter_single_block_template_title', 10, 1 );
add_filter( 'get_block_file_template', 'theme_filter_single_block_template_title', 10, 1 );
