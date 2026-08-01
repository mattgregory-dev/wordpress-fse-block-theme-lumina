<?php
/**
 * Intro Section — server render.
 *
 * Title is always the typed `title` attribute; `level` only chooses the heading
 * tag (h1 for a page hero, h2 for a mid-page intro). Consistent with the other
 * blocks — no page-title binding. The (optional) eyebrow and subtitle come from
 * their attributes. An empty title renders no heading tag at all, so the
 * document outline never gets a stray empty <h1>/<h2>. An optional inner-block
 * body (paragraphs) renders below the subtitle; when it is empty, no wrapper is
 * emitted, so attribute-only instances are byte-identical to before.
 *
 * @package lumina-blocks
 *
 * @var array  $attributes Block attributes.
 * @var string $content    Inner blocks markup (optional body), or ''.
 */

$intro_level    = ( isset( $attributes['level'] ) && 'h1' === $attributes['level'] ) ? 'h1' : 'h2';
$intro_eyebrow  = trim( $attributes['eyebrow'] ?? '' );
$intro_subtitle = trim( $attributes['subtitle'] ?? '' );
$intro_title    = trim( $attributes['title'] ?? '' );
$intro_body     = trim( $content );

// Optional line-balancing (text-wrap: balance) per element; off by default so
// existing instances stay byte-identical.
$intro_title_class    = 'intro-section__title' . ( ! empty( $attributes['titleBalance'] ) ? ' has-balanced-text' : '' );
$intro_subtitle_class = 'intro-section__subtitle' . ( ! empty( $attributes['subtitleBalance'] ) ? ' has-balanced-text' : '' );

// Nothing to show — don't emit an empty band.
if ( '' === $intro_eyebrow && '' === $intro_title && '' === $intro_subtitle && '' === $intro_body ) {
	return '';
}
?>
<section <?php echo get_block_wrapper_attributes( array( 'class' => 'alignfull' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped by core. ?>>
	<div class="intro-section__inner">
		<?php if ( '' !== $intro_eyebrow ) : ?>
			<p class="intro-section__eyebrow"><?php echo esc_html( wptexturize( $intro_eyebrow ) ); ?></p>
		<?php endif; ?>
		<?php if ( '' !== $intro_title ) : ?>
			<<?php echo esc_attr( $intro_level ); ?> class="<?php echo esc_attr( $intro_title_class ); ?>"><?php echo esc_html( wptexturize( $intro_title ) ); ?></<?php echo esc_attr( $intro_level ); ?>>
		<?php endif; ?>
		<?php if ( '' !== $intro_subtitle ) : ?>
			<p class="<?php echo esc_attr( $intro_subtitle_class ); ?>"><?php echo wp_kses_post( wptexturize( $intro_subtitle ) ); ?></p>
		<?php endif; ?>
		<?php if ( '' !== $intro_body ) : ?>
			<div class="intro-section__body"><?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Inner blocks, escaped by core. ?></div>
		<?php endif; ?>
	</div>
</section>
