<?php
/**
 * Title: Retreat Hero
 * Slug: lumina-blocks/retreat-hero
 * Categories: banner, featured
 * Description: Split hero for the Retreat page — headline, intro and CTAs beside a Sedona image.
 *
 * @package lumina-blocks
 */
?>
<!-- wp:group {"tagName":"section","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:columns {"verticalAlignment":"top","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns are-vertically-aligned-top"><!-- wp:column {"verticalAlignment":"top","width":"55%"} -->
<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:55%"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.15em"}},"fontSize":"x-small"} -->
<p class="has-x-small-font-size" style="text-transform:uppercase;letter-spacing:0.15em">Sedona, Arizona · January 2027</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">You Know Your Patterns Better Than Anybody. Finally Break Free of Them.</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"large"} -->
<p>You've already done a tremendous amount of work. You've gained insight, learned valuable tools, and experienced moments of real growth. Yet there may still be something beneath the surface — a deeper pattern, wound, or unconscious belief that continues to shape your life and limit lasting change.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>At Lumina, we help you uncover what lies at the root of those recurring struggles and guide you through a process of genuine transformation. Through our unique 4-E Process, deep self-inquiry, somatic healing practices, and sacred plant medicine ceremonies, we create the conditions for profound insight, healing, and integration.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>This is more than a retreat. It is an opportunity to finally understand what has been holding you back, release what no longer serves you, and step forward with greater freedom, clarity, and authenticity than ever before.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50)"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/apply/">Apply for the Retreat</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-secondary"} -->
<div class="wp-block-button is-style-secondary"><a class="wp-block-button__link wp-element-button">Book a Free Consultation</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:paragraph {"fontSize":"x-small"} -->
<p class="has-x-small-font-size">Or text or call us at <a href="tel:6027536573">(602) 753-6573</a> — we'll get right back to you.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top","width":"45%"} -->
<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:45%"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/placeholder-vertical.webp' ) ); ?>" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></section>
<!-- /wp:group -->
