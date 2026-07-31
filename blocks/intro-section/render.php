<?php
/**
 * Intro Section — server render.
 *
 * Title source depends on `level`:
 *   - h1 → the page title (`get_the_title()`); the typed `title` attribute is
 *          ignored (edit.js hides the field in this mode).
 *   - h2 → the typed `title` attribute.
 * The (optional) eyebrow and subtitle always come from their attributes,
 * regardless of level. An empty title renders no heading tag at all, so the
 * document outline never gets a stray empty <h1>/<h2>.
 *
 * @package lumina-blocks
 *
 * @var array $attributes Block attributes.
 */

$intro_level    = ( isset( $attributes['level'] ) && 'h1' === $attributes['level'] ) ? 'h1' : 'h2';
$intro_eyebrow  = trim( $attributes['eyebrow'] ?? '' );
$intro_subtitle = trim( $attributes['subtitle'] ?? '' );

if ( 'h1' === $intro_level ) {
	$intro_title = trim( wp_strip_all_tags( get_the_title() ) );
} else {
	$intro_title = trim( $attributes['title'] ?? '' );
}

// Nothing to show — don't emit an empty band.
if ( '' === $intro_eyebrow && '' === $intro_title && '' === $intro_subtitle ) {
	return '';
}
?>
<section <?php echo get_block_wrapper_attributes( array( 'class' => 'alignfull' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped by core. ?>>
	<div class="intro-section__inner">
		<?php if ( '' !== $intro_eyebrow ) : ?>
			<p class="intro-section__eyebrow"><?php echo esc_html( $intro_eyebrow ); ?></p>
		<?php endif; ?>
		<?php if ( '' !== $intro_title ) : ?>
			<<?php echo esc_attr( $intro_level ); ?> class="intro-section__title"><?php echo esc_html( $intro_title ); ?></<?php echo esc_attr( $intro_level ); ?>>
		<?php endif; ?>
		<?php if ( '' !== $intro_subtitle ) : ?>
			<p class="intro-section__subtitle"><?php echo wp_kses_post( $intro_subtitle ); ?></p>
		<?php endif; ?>
	</div>
</section>
