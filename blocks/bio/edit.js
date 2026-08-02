import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	useInnerBlocksProps,
	InspectorControls,
	BlockControls,
	MediaPlaceholder,
	MediaReplaceFlow,
} from '@wordpress/block-editor';
import { PanelBody, SelectControl, TextControl, Button } from '@wordpress/components';
import { useSelect } from '@wordpress/data';

/**
 * Editor UI. Mirrors render.php's markup/classes so the theme stylesheet
 * (loaded into the canvas via add_editor_style) styles the preview identically.
 *
 * Unlike Spotlight, Bio has no `level` control: a bio is never the page H1
 * (the About page's intro-section owns that), so the name is always a typed H2.
 * Fewer knobs, and it can't be misused.
 */

const ALLOWED_BLOCKS = [ 'core/paragraph', 'core/buttons', 'core/social-links' ];
const TEMPLATE = [ [ 'core/paragraph', { placeholder: __( 'Add bio…', 'lumina-blocks' ) } ] ];

export default function Edit( { attributes, setAttributes } ) {
	const { imageId, imageAlt, imagePosition, verticalAlignment, eyebrow, title } = attributes;

	const blockProps = useBlockProps( {
		className: `is-position-${ imagePosition } is-valign-${ verticalAlignment }` + ( imageId ? '' : ' has-no-media' ),
	} );

	const innerBlocksProps = useInnerBlocksProps(
		{ className: 'bio__body' },
		{ allowedBlocks: ALLOWED_BLOCKS, template: TEMPLATE, templateLock: false }
	);

	// Media object for the selected image (source URL for the canvas preview).
	const image = useSelect(
		( select ) => ( imageId ? select( 'core' ).getMedia( imageId ) : null ),
		[ imageId ]
	);

	const onSelectImage = ( media ) =>
		setAttributes( { imageId: media.id, imageAlt: media.alt || '' } );

	const media = (
		<figure className="bio__media">
			{ imageId ? (
				<img src={ image?.source_url } alt={ imageAlt } />
			) : (
				<MediaPlaceholder
					icon="format-image"
					labels={ { title: __( 'Portrait', 'lumina-blocks' ) } }
					accept="image/*"
					allowedTypes={ [ 'image' ] }
					onSelect={ onSelectImage }
				/>
			) }
		</figure>
	);

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Layout', 'lumina-blocks' ) }>
					<SelectControl
						label={ __( 'Image position', 'lumina-blocks' ) }
						value={ imagePosition }
						options={ [
							{ label: __( 'Left', 'lumina-blocks' ), value: 'left' },
							{ label: __( 'Right', 'lumina-blocks' ), value: 'right' },
						] }
						onChange={ ( value ) => setAttributes( { imagePosition: value } ) }
						__nextHasNoMarginBottom
					/>
					<SelectControl
						label={ __( 'Vertical alignment', 'lumina-blocks' ) }
						help={ __( 'Applies above 1160px; narrower screens stack and top-align.', 'lumina-blocks' ) }
						value={ verticalAlignment }
						options={ [
							{ label: __( 'Top', 'lumina-blocks' ), value: 'top' },
							{ label: __( 'Center', 'lumina-blocks' ), value: 'center' },
						] }
						onChange={ ( value ) => setAttributes( { verticalAlignment: value } ) }
						__nextHasNoMarginBottom
					/>
				</PanelBody>
				<PanelBody title={ __( 'Content', 'lumina-blocks' ) }>
					<TextControl
						label={ __( 'Role', 'lumina-blocks' ) }
						help={ __( 'The eyebrow line, e.g. “Founder” or “Ceremony Facilitator.”', 'lumina-blocks' ) }
						value={ eyebrow }
						onChange={ ( value ) => setAttributes( { eyebrow: value } ) }
						__nextHasNoMarginBottom
					/>
					<TextControl
						label={ __( 'Name', 'lumina-blocks' ) }
						value={ title }
						onChange={ ( value ) => setAttributes( { title: value } ) }
						__nextHasNoMarginBottom
					/>
				</PanelBody>
				{ imageId && (
					<PanelBody title={ __( 'Image', 'lumina-blocks' ) }>
						<TextControl
							label={ __( 'Alt text', 'lumina-blocks' ) }
							help={ __( 'Describe the portrait for screen readers.', 'lumina-blocks' ) }
							value={ imageAlt }
							onChange={ ( value ) => setAttributes( { imageAlt: value } ) }
							__nextHasNoMarginBottom
						/>
						<Button
							variant="link"
							isDestructive
							onClick={ () => setAttributes( { imageId: undefined, imageAlt: '' } ) }
						>
							{ __( 'Remove portrait', 'lumina-blocks' ) }
						</Button>
					</PanelBody>
				) }
			</InspectorControls>

			{ imageId && (
				<BlockControls>
					<MediaReplaceFlow
						mediaId={ imageId }
						mediaURL={ image?.source_url }
						allowedTypes={ [ 'image' ] }
						accept="image/*"
						onSelect={ onSelectImage }
					/>
				</BlockControls>
			) }

			<section { ...blockProps }>
				<div className="bio__inner">
					<div className="bio__text">
						{ eyebrow && <p className="bio__eyebrow">{ eyebrow }</p> }
						{ title && <h2 className="bio__title">{ title }</h2> }
						<div { ...innerBlocksProps } />
					</div>
					{ media }
				</div>
			</section>
		</>
	);
}
