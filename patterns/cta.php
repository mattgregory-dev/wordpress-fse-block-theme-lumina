<?php
/**
 * Title: Call to Action
 * Slug: starter-blocks/cta
 * Categories: call-to-action, featured
 * Description: Centered call-to-action card on a gradient with a dramatic shadow.
 *
 * @package starter-blocks
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:group {"gradient":"sunrise","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"blockGap":"1.25rem"},"border":{"radius":"20px"},"shadow":"var:preset|shadow|dramatic"},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-sunrise-gradient-background has-background" style="border-radius:20px;box-shadow:var(--wp--preset--shadow--dramatic);padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--50)"><!-- wp:heading {"textAlign":"center","textColor":"background","fontSize":"x-large"} -->
<h2 class="wp-block-heading has-text-align-center has-background-color has-text-color has-x-large-font-size">Ready to build?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"background","fontSize":"large"} -->
<p class="has-text-align-center has-background-color has-text-color has-large-font-size">Duplicate this starter, tune theme.json, and ship.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30)"><!-- wp:button {"backgroundColor":"background","textColor":"contrast"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-contrast-color has-background-background-color has-text-color has-background wp-element-button">Start now</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
