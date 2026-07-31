<?php
/**
 * Title: Spotlight — Our Next Retreat
 * Slug: lumina-blocks/home-spotlight-retreat
 * Categories: featured
 * Description: Text-left / image-right spotlight for the next retreat.
 *
 * @package lumina-blocks
 */
?>
<!-- wp:group {"tagName":"section","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.15em"}},"fontSize":"x-small"} -->
<p class="has-x-small-font-size" style="text-transform:uppercase;letter-spacing:0.15em">Our Next Retreat</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading">Seven Days in Sedona — January 2027</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>A small group, a private home, and seven days dedicated entirely to your healing. Guided ceremony, the full 4-E process, clean food, and the space to do the work without the noise of everyday life. Two paths to attend, with and without medicine.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50)"><!-- wp:button {"url":"/retreat/"} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/retreat/">Explore the Retreat</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%"><?php echo lumina_image_block( 'archway-sedona-2.webp', 'Towering Sedona red-rock spires framing a distant valley view' ); ?></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></section>
<!-- /wp:group -->
