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
<!-- wp:group {"tagName":"section","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.15em"}},"fontSize":"x-small"} -->
<p class="has-x-small-font-size" style="text-transform:uppercase;letter-spacing:0.15em">Transformative Retreats in Sedona</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">Become the Person You've Always Known You Could Be</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"large"} -->
<p>You know yourself better than anyone. You've read the books, attended the workshops, and sat with the hard questions. Yet when you look at your life, the same patterns are there, they quietly take hold — the ones you thought you had already moved beyond, and your suffering continues. Lumina Retreats are designed to help you see beyond those limitations, uncover what is truly driving them, and step into a deeper level of freedom, clarity, and authentic transformation.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50)"><!-- wp:button {"url":"/retreat/"} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/retreat/">Explore the Retreat</a></div>
<!-- /wp:button -->

<!-- wp:button {"url":"https://calendly.com/marco-luminasedona/30min","linkTarget":"_blank","rel":"noreferrer noopener","className":"is-style-secondary book-consultation"} -->
<div class="wp-block-button is-style-secondary book-consultation"><a class="wp-block-button__link wp-element-button" href="https://calendly.com/marco-luminasedona/30min" target="_blank" rel="noreferrer noopener">Book a Free Consultation</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:paragraph {"fontSize":"x-small"} -->
<p class="has-x-small-font-size">Or text or call us at <a href="tel:6027536573">(602) 753-6573</a> — we'll get right back to you.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%"><!-- wp:image {"id":571,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( wp_get_attachment_image_url( 571, 'full' ) ); ?>" alt="Sedona red-rock canyon framed by a cave opening" class="wp-image-571"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></section>
<!-- /wp:group -->
