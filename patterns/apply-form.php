<?php
/**
 * Title: Apply — Your Application (Form)
 * Slug: lumina-blocks/apply-form
 * Categories: featured
 * Description: Application form section — heading, confidentiality note, and the Forminator form.
 *
 * @package lumina-blocks
 */
?>
<!-- wp:group {"tagName":"section","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|80"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<section class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--80)"><!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">Your Application</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","className":"has-balanced-text"} -->
<p class="has-text-align-center has-balanced-text">Everything you share is confidential. The more honest you can be, the better we can understand how to care for you.</p>
<!-- /wp:paragraph -->

<!-- wp:shortcode -->
[forminator_form id="1239"]
<!-- /wp:shortcode --></section>
<!-- /wp:group -->
