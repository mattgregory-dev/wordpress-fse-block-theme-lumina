<?php
/**
 * Title: Application Form
 * Slug: lumina-blocks/apply-form
 * Categories: lumina-blocks
 * Description: Section with the application form embed.
 *
 * @package lumina-blocks
 */
?>
<!-- wp:group {"tagName":"section","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|80"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<section class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--80)"><!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">A Section Heading</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","className":"has-balanced-text"} -->
<p class="has-text-align-center has-balanced-text">A short line introducing the form and reassuring the reader.</p>
<!-- /wp:paragraph -->

<!-- wp:shortcode -->
[forminator_form id="1239"]
<!-- /wp:shortcode --></section>
<!-- /wp:group -->
