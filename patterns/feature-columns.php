<?php
/**
 * Title: Feature Columns
 * Slug: starter-blocks/feature-columns
 * Categories: columns, featured
 * Description: Three-card feature grid on a surface band, with soft shadows and rounded corners.
 *
 * @package starter-blocks
 */
?>
<!-- wp:group {"align":"full","backgroundColor":"surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-surface-background-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)"><!-- wp:heading {"textAlign":"center","fontSize":"x-large"} -->
<h2 class="wp-block-heading has-text-align-center has-x-large-font-size">Everything you need to start</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"muted","fontSize":"large"} -->
<p class="has-text-align-center has-muted-color has-text-color has-large-font-size">Opinionated where it helps, flexible where it counts.</p>
<!-- /wp:paragraph -->

<!-- wp:columns {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"},"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns" style="margin-top:var(--wp--preset--spacing--50)"><!-- wp:column {"backgroundColor":"background","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"border":{"radius":"14px"},"shadow":"var:preset|shadow|soft"}} -->
<div class="wp-block-column has-background-background-color has-background" style="border-radius:14px;box-shadow:var(--wp--preset--shadow--soft);padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)"><!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size">theme.json first</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"muted"} -->
<p class="has-muted-color has-text-color">Colors, type scale, spacing and block styles are centralized — edit once, apply everywhere.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"backgroundColor":"background","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"border":{"radius":"14px"},"shadow":"var:preset|shadow|soft"}} -->
<div class="wp-block-column has-background-background-color has-background" style="border-radius:14px;box-shadow:var(--wp--preset--shadow--soft);padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)"><!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size">Pattern-driven</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"muted"} -->
<p class="has-muted-color has-text-color">Real layouts — heroes, grids, CTAs — composed from core blocks and reused across pages.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"backgroundColor":"background","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"border":{"radius":"14px"},"shadow":"var:preset|shadow|soft"}} -->
<div class="wp-block-column has-background-background-color has-background" style="border-radius:14px;box-shadow:var(--wp--preset--shadow--soft);padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)"><!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size">Modern build</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"muted"} -->
<p class="has-muted-color has-text-color">Vite + SCSS for the genuinely custom bits. No Tailwind fighting the editor.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
