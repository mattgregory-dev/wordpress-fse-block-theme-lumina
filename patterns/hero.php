<?php
/**
 * Title: Hero
 * Slug: starter-blocks/hero
 * Categories: banner, featured
 * Description: Full-width gradient hero with an eyebrow, large fluid headline, lead paragraph and CTAs.
 *
 * @package starter-blocks
 */
?>
<!-- wp:cover {"gradient":"primary-deep","dimRatio":100,"minHeight":80,"minHeightUnit":"vh","contentPosition":"center center","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80);min-height:80vh"><span aria-hidden="true" class="wp-block-cover__background has-primary-deep-gradient-background has-background-gradient has-background-dim-100 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"1.25rem"}},"layout":{"type":"constrained","contentSize":"800px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.2em"}},"textColor":"background","fontSize":"small"} -->
<p class="has-text-align-center has-background-color has-text-color has-small-font-size" style="text-transform:uppercase;letter-spacing:0.2em">A block-based starter</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":1,"textColor":"background","fontSize":"huge"} -->
<h1 class="wp-block-heading has-text-align-center has-background-color has-text-color has-huge-font-size">Build modern sites, faster.</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"background","fontSize":"large"} -->
<p class="has-text-align-center has-background-color has-text-color has-large-font-size">Design lives in <code>theme.json</code>. Layouts live in patterns. Clean markup, a real type scale, and room to grow — no 1990s in sight.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30)"><!-- wp:button {"backgroundColor":"background","textColor":"contrast"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-contrast-color has-background-background-color has-text-color has-background wp-element-button">Get started</a></div>
<!-- /wp:button -->

<!-- wp:button {"textColor":"background","className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-background-color has-text-color wp-element-button">Learn more</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
