import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	useInnerBlocksProps,
	InspectorControls,
	BlockControls,
	MediaPlaceholder,
	MediaReplaceFlow,
} from '@wordpress/block-editor';
import { PanelBody, SelectControl, TextControl } from '@wordpress/components';
import { useSelect } from '@wordpress/data';

/**
 * Editor UI. Mirrors render.php's markup/classes so the theme stylesheet
 * (loaded into the canvas via add_editor_style) styles the preview identically.
 *
 * The title is always a typed attribute; `level` only chooses the heading tag
 * (H1 for a page hero, H2 for a mid-page feature). Unlike intro-section, there
 * is no page-title binding — spotlight headlines never match the page title.
 */

const ALLOWED_BLOCKS = [ 'core/paragraph', 'core/buttons' ];
const TEMPLATE = [ [ 'core/paragraph', { placeholder: __( 'Add spotlight text…', 'lumina-blocks' ) } ] ];

export default function Edit( { attributes, setAttributes } ) {
	const { imageId, imageAlt, imagePosition, verticalAlignment, eyebrow, level, title } = attributes;
	const isH1 = 'h1' === level;
	const TitleTag = isH1 ? 'h1' : 'h2';

	const blockProps = useBlockProps( {
		className: `is-position-${ imagePosition } is-valign-${ verticalAlignment }` + ( imageId ? '' : ' has-no-media' ),
	} );

	const innerBlocksProps = useInnerBlocksProps(
		{ className: 'spotlight__body' },
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
		<figure className="spotlight__media">
			{ imageId ? (
				<img src={ image?.source_url } alt={ imageAlt } />
			) : (
				<MediaPlaceholder
					icon="format-image"
					labels={ { title: __( 'Spotlight image', 'lumina-blocks' ) } }
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
							{ label: __( 'Right', 'lumina-blocks' ), value: 'right' },
							{ label: __( 'Left', 'lumina-blocks' ), value: 'left' },
						] }
						onChange={ ( value ) => setAttributes( { imagePosition: value } ) }
						__nextHasNoMarginBottom
					/>
					<SelectControl
						label={ __( 'Vertical alignment', 'lumina-blocks' ) }
						help={ __( 'Applies above 1160px; narrower screens stack and top-align.', 'lumina-blocks' ) }
						value={ verticalAlignment }
						options={ [
							{ label: __( 'Center', 'lumina-blocks' ), value: 'center' },
							{ label: __( 'Top', 'lumina-blocks' ), value: 'top' },
						] }
						onChange={ ( value ) => setAttributes( { verticalAlignment: value } ) }
						__nextHasNoMarginBottom
					/>
				</PanelBody>
				<PanelBody title={ __( 'Content', 'lumina-blocks' ) }>
					<TextControl
						label={ __( 'Eyebrow (optional)', 'lumina-blocks' ) }
						value={ eyebrow }
						onChange={ ( value ) => setAttributes( { eyebrow: value } ) }
						__nextHasNoMarginBottom
					/>
					<TextControl
						label={ __( 'Title', 'lumina-blocks' ) }
						value={ title }
						onChange={ ( value ) => setAttributes( { title: value } ) }
						__nextHasNoMarginBottom
					/>
					<SelectControl
						label={ __( 'Title heading level', 'lumina-blocks' ) }
						help={ __( 'Sets the heading tag only: H1 for a page hero, H2 for a mid-page feature.', 'lumina-blocks' ) }
						value={ level }
						options={ [
							{ label: __( 'H2 — in-page feature', 'lumina-blocks' ), value: 'h2' },
							{ label: __( 'H1 — page hero', 'lumina-blocks' ), value: 'h1' },
						] }
						onChange={ ( value ) => setAttributes( { level: value } ) }
						__nextHasNoMarginBottom
					/>
				</PanelBody>
				{ imageId && (
					<PanelBody title={ __( 'Image', 'lumina-blocks' ) }>
						<TextControl
							label={ __( 'Alt text', 'lumina-blocks' ) }
							help={ __( 'Describe the image for screen readers.', 'lumina-blocks' ) }
							value={ imageAlt }
							onChange={ ( value ) => setAttributes( { imageAlt: value } ) }
							__nextHasNoMarginBottom
						/>
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
				<div className="spotlight__inner">
					<div className="spotlight__text">
						{ eyebrow && <p className="spotlight__eyebrow">{ eyebrow }</p> }
						{ title && (
							<TitleTag className="spotlight__title">{ title }</TitleTag>
						) }
						<div { ...innerBlocksProps } />
					</div>
					{ media }
				</div>
			</section>
		</>
	);
}
