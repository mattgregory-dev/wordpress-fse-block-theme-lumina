<?php
/**
 * Title: Call to Action
 * Slug: lumina-blocks/cta
 * Categories: lumina-blocks
 * Description: Full-width call-to-action band with eyebrow, heading, supporting text, buttons, and fine print.
 * Block Types: lumina-blocks/cta-band
 *
 * @package lumina-blocks
 */
?>
<!-- wp:lumina-blocks/cta-band {"align":"full","eyebrow":"January 2027 · Sedona","title":"Ready to Take the Next Step?"} -->
<div class="cta-band__body"><!-- wp:paragraph {"align":"center","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size">Supporting copy goes here — a sentence or two that makes the invitation clear and leads the reader toward the actions below.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"url":"#"} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#">Primary Action</a></div>
<!-- /wp:button -->

<!-- wp:button {"url":"#","className":"is-style-secondary"} -->
<div class="wp-block-button is-style-secondary"><a class="wp-block-button__link wp-element-button" href="#">Secondary Action</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:paragraph {"align":"center","fontSize":"x-small"} -->
<p class="has-text-align-center has-x-small-font-size">Or text or call us at <a href="tel:5551234567">(555) 123-4567</a> — we'll get right back to you.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:lumina-blocks/cta-band -->
