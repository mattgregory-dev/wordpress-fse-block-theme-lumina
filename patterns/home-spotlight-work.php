<?php
/**
 * Title: Spotlight — The Work
 * Slug: lumina-blocks/home-spotlight-work
 * Categories: featured
 * Description: Image-left / text-right spotlight for "The Work".
 *
 * @package lumina-blocks
 */
?>
<!-- wp:group {"tagName":"section","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/placeholder-vertical.webp' ) ); ?>" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.15em"}},"fontSize":"x-small"} -->
<p class="has-x-small-font-size" style="text-transform:uppercase;letter-spacing:0.15em">The Work</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading">Medicine Opens the Door. Then the Real Work Begins.</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Sacred plant medicine can do something almost nothing else can: it shows you, directly, that there's far more to you and to life than the day-to-day surface of labels, roles, and habits. You don't need any self-help background or practice to experience it. For many people the medicine alone can be a profound experience, and for some it's the whole reason they come.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>But an open door is not the same as walking through it. Most people get the experience and little else — a powerful night that fades back into the old life. Real, lasting change comes from what you do while that door is open: meeting the pattern at its root, where it truly lives, and integrating the work so it takes hold. That's what we're built for. And that's you taking responsibility for your life.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50)"><!-- wp:button {"className":"is-style-secondary"} -->
<div class="wp-block-button is-style-secondary"><a class="wp-block-button__link wp-element-button">How the Work Goes Deeper</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></section>
<!-- /wp:group -->
