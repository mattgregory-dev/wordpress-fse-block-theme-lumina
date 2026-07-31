<?php
/**
 * Title: Care Spotlight — Before You Arrive
 * Slug: lumina-blocks/care-screening
 * Categories: featured
 * Description: Image-left / text-right spotlight — careful screening before acceptance.
 *
 * @package lumina-blocks
 */
?>
<!-- wp:group {"tagName":"section","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"42%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:42%"><?php echo lumina_image_block( 'sedona-spire.webp', 'A person meditating beneath a towering Sedona rock spire' ); ?></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"58%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:58%"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.15em"}},"fontSize":"x-small"} -->
<p class="has-x-small-font-size" style="text-transform:uppercase;letter-spacing:0.15em">Before You Arrive</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading">Careful Screening, for Your Sake</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Not everyone who applies is the right fit, and that's by design. Every guest is personally screened before being accepted. We take the time to understand your history and what's bringing you here, so we can be sure the retreat is right for you. If it isn't, or the timing isn't, we'll tell you honestly and talk through other options. Being accepted means we're confident we can care for you well.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></section>
<!-- /wp:group -->
