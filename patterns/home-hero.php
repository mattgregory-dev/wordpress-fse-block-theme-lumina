<?php
/**
 * Title: Home Hero
 * Slug: lumina-blocks/home-hero
 * Categories: banner, featured
 * Description: Split hero — headline, intro and CTAs beside a Sedona image.
 *
 * @package lumina-blocks
 */
?>
<!-- wp:lumina-blocks/spotlight {"align":"full","imageId":<?php echo (int) lumina_attachment_id_by_filename( 'sedona-cave-1.webp' ); ?>,"imageAlt":"Sedona red-rock canyon framed by a cave opening","imagePosition":"right","eyebrow":"Transformative Retreats in Sedona","level":"h1","title":"Become the Person You've Always Known You Could Be"} -->
<div class="spotlight__body"><!-- wp:paragraph {"fontSize":"large"} -->
<p>You know yourself better than anyone. You've read the books, attended the workshops, sat with the hard questions. And still, in the moments that matter, the same pattern takes over — the one you swore you were past. Lumina is a seven-day retreat in Sedona for breaking through what holds you back.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"url":"/retreat/"} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/retreat/">Explore the Retreat</a></div>
<!-- /wp:button -->

<!-- wp:button {"url":"https://calendly.com/marco-luminasedona/30min","linkTarget":"_blank","rel":"noreferrer noopener","className":"is-style-secondary book-consultation"} -->
<div class="wp-block-button is-style-secondary book-consultation"><a class="wp-block-button__link wp-element-button" href="https://calendly.com/marco-luminasedona/30min" target="_blank" rel="noreferrer noopener">Book a Free Consultation</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:paragraph {"fontSize":"x-small"} -->
<p class="has-x-small-font-size">Or text or call us at <a href="tel:6027536573">(602) 753-6573</a> — we'll get right back to you.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:lumina-blocks/spotlight -->
