import { registerBlockType } from '@wordpress/blocks';

import metadata from './block.json';
import Edit from './edit.js';

/**
 * Intro Section is a dynamic block: the markup lives in render.php (in git),
 * the content lives in block attributes (in the database). `save` returns null
 * so nothing is serialized to post_content except the attributes.
 */
registerBlockType( metadata.name, {
	edit: Edit,
	save: () => null,
} );
