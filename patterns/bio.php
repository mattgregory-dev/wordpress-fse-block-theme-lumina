<?php
/**
 * Title: Bio
 * Slug: lumina-blocks/bio
 * Categories: lumina-blocks
 * Block Types: lumina-blocks/bio
 * Description: Person bio — a portrait beside a role, name, biography, and social links. Swap the placeholder portrait for your own.
 *
 * @package lumina-blocks
 */
?>
<!-- wp:lumina-blocks/bio {"align":"full","imageId":<?php echo (int) lumina_attachment_id_by_filename( 'placeholder-vertical.webp' ); ?>,"imageAlt":"","imagePosition":"left","eyebrow":"Role","title":"Full Name"} -->
<div class="bio__body"><!-- wp:paragraph -->
<p>Open with a paragraph that introduces the person and what drew them to this work — grounded and specific, not a résumé.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Add a second paragraph to develop their background, approach, or role on the team.</p>
<!-- /wp:paragraph -->

<!-- wp:social-links -->
<ul class="wp-block-social-links"><!-- wp:social-link {"url":"#","service":"instagram"} /-->

<!-- wp:social-link {"url":"#","service":"linkedin"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:lumina-blocks/bio -->
