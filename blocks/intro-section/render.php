<?php
/**
 * Intro Section — server render.
 *
 * Title is always the typed `title` attribute; `level` only chooses the heading
 * tag (h1 for a page hero, h2 for a mid-page intro). Consistent with the other
 * blocks — no page-title binding. The (optional) eyebrow and subtitle come from
 * their attributes. An empty title renders no heading tag at all, so the
 * document outline never gets a stray empty <h1>/<h2>.
 *
 * @package lumina-blocks
 *
 * @var array $attributes Block attributes.
 */

$intro_level    = ( isset( $attributes['level'] ) && 'h1' === $attributes['level'] ) ? 'h1' : 'h2';
$intro_eyebrow  = trim( $attributes['eyebrow'] ?? '' );
$intro_subtitle = trim( $attributes['subtitle'] ?? '' );
$intro_title    = trim( $attributes['title'] ?? '' );

// Nothing to show — don't emit an empty band.
if ( '' === $intro_eyebrow && '' === $intro_title && '' === $intro_subtitle ) {
	return '';
}
?>
<section <?php echo get_block_wrapper_attributes( array( 'class' => 'alignfull' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped by core. ?>>
	<div class="intro-section__inner">
		<?php if ( '' !== $intro_eyebrow ) : ?>
			<p class="intro-section__eyebrow"><?php echo esc_html( wptexturize( $intro_eyebrow ) ); ?></p>
		<?php endif; ?>
		<?php if ( '' !== $intro_title ) : ?>
			<<?php echo esc_attr( $intro_level ); ?> class="intro-section__title"><?php echo esc_html( wptexturize( $intro_title ) ); ?></<?php echo esc_attr( $intro_level ); ?>>
		<?php endif; ?>
		<?php if ( '' !== $intro_subtitle ) : ?>
			<p class="intro-section__subtitle"><?php echo wp_kses_post( wptexturize( $intro_subtitle ) ); ?></p>
		<?php endif; ?>
	</div>
</section>
