<?php
/**
 * Intro Section — server render.
 *
 * The markup lives here (in git); the content arrives as block attributes
 * (from the database). Used as a full-bleed band: a page hero when level=h1,
 * or a mid-page intro when level=h2.
 *
 * @package lumina-blocks
 *
 * @var array $attributes Block attributes.
 */

$intro_eyebrow  = trim( $attributes['eyebrow'] ?? '' );
$intro_title    = trim( $attributes['title'] ?? '' );
$intro_subtitle = trim( $attributes['subtitle'] ?? '' );
$intro_level    = ( isset( $attributes['level'] ) && 'h1' === $attributes['level'] ) ? 'h1' : 'h2';

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
		<<?php echo esc_attr( $intro_level ); ?> class="intro-section__title"><?php echo esc_html( $intro_title ); ?></<?php echo esc_attr( $intro_level ); ?>>
		<?php if ( '' !== $intro_subtitle ) : ?>
			<p class="intro-section__subtitle"><?php echo wp_kses_post( $intro_subtitle ); ?></p>
		<?php endif; ?>
	</div>
</section>
