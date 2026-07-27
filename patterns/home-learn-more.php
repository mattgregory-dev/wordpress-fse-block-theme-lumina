<?php
/**
 * Title: Learn More Cards
 * Slug: lumina-blocks/home-learn-more
 * Categories: columns, featured
 * Description: Three linked cards — Our Story, Care & Safety, What We Believe.
 *
 * @package lumina-blocks
 */
?>
<!-- wp:group {"tagName":"section","align":"full","className":"learn-more-cards","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull learn-more-cards" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)"><!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">Learn More</h2>
<!-- /wp:heading -->

<!-- wp:columns {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"},"blockGap":{"left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns" style="margin-top:var(--wp--preset--spacing--50)"><!-- wp:column {"backgroundColor":"white","style":{"border":{"radius":"14px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|30"},"shadow":"var:preset|shadow|soft"}} -->
<div class="wp-block-column has-white-background-color has-background" style="border-radius:14px;box-shadow:var(--wp--preset--shadow--soft);padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)"><!-- wp:image {"id":1261,"sizeSlug":"full","linkDestination":"custom"} -->
<figure class="wp-block-image size-full"><a href="/about/"><img src="<?php echo esc_url( wp_get_attachment_image_url( 1261, 'full' ) ); ?>" alt="A Lumina facilitator during a ceremony" class="wp-image-1261"/></a></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Our Story</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The people behind Lumina, and the path that led here.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><a href="/about/">Meet Us →</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"backgroundColor":"white","style":{"border":{"radius":"14px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|30"},"shadow":"var:preset|shadow|soft"}} -->
<div class="wp-block-column has-white-background-color has-background" style="border-radius:14px;box-shadow:var(--wp--preset--shadow--soft);padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)"><!-- wp:image {"id":1262,"sizeSlug":"full","linkDestination":"custom"} -->
<figure class="wp-block-image size-full"><a href="/care-protocol/"><img src="<?php echo esc_url( wp_get_attachment_image_url( 1262, 'full' ) ); ?>" alt="A balanced stack of smooth river stones" class="wp-image-1262"/></a></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Care &amp; Safety</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>How we screen, prepare, and care for every guest, before, during, and after.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><a href="/care-protocol/">See Our Care Protocol →</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"backgroundColor":"white","style":{"border":{"radius":"14px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|30"},"shadow":"var:preset|shadow|soft"}} -->
<div class="wp-block-column has-white-background-color has-background" style="border-radius:14px;box-shadow:var(--wp--preset--shadow--soft);padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)"><!-- wp:image {"id":1263,"sizeSlug":"full","linkDestination":"custom"} -->
<figure class="wp-block-image size-full"><a href="/beliefs/"><img src="<?php echo esc_url( wp_get_attachment_image_url( 1263, 'full' ) ); ?>" alt="Golden light over the Sedona landscape framed by a tree" class="wp-image-1263"/></a></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">What We Believe</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The spirit and intention behind the medicine and the work.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><a href="/beliefs/">Read More →</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></section>
<!-- /wp:group -->
