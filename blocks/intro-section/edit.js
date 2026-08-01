import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	useInnerBlocksProps,
	RichText,
	InspectorControls,
} from '@wordpress/block-editor';
import { PanelBody, SelectControl, ToggleControl } from '@wordpress/components';

/**
 * Editor UI. Mirrors render.php's markup/classes so the theme stylesheet
 * (loaded into the canvas via add_editor_style) styles the preview identically.
 *
 * The title is always a typed attribute, edited inline; `level` only chooses the
 * heading tag (H1 for a page hero, H2 for a mid-page intro). No page-title
 * binding — consistent with the other blocks.
 *
 * Below the subtitle is an optional InnerBlocks body (paragraphs) for centered-
 * header / left-body prose sections; it stays empty (and renders nothing) unless
 * paragraphs are added.
 *
 * The two balance toggles add `has-balanced-text` (text-wrap: balance) to the
 * title / subtitle so short headings and ledes wrap into even lines. Applied
 * live in the canvas so the effect is visible while editing.
 */

const ALLOWED_BLOCKS = [ 'core/paragraph' ];

export default function Edit( { attributes, setAttributes } ) {
	const { eyebrow, title, subtitle, level, titleBalance, subtitleBalance } = attributes;
	const blockProps = useBlockProps();
	const TitleTag = 'h1' === level ? 'h1' : 'h2';

	const innerBlocksProps = useInnerBlocksProps(
		{ className: 'intro-section__body' },
		{ allowedBlocks: ALLOWED_BLOCKS, template: [], templateLock: false }
	);

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Intro settings', 'lumina-blocks' ) }>
					<SelectControl
						label={ __( 'Title heading level', 'lumina-blocks' ) }
						help={ __(
							'Use H1 only when this is the page hero; H2 for a mid-page intro.',
							'lumina-blocks'
						) }
						value={ level }
						options={ [
							{ label: __( 'H2 — in-page intro', 'lumina-blocks' ), value: 'h2' },
							{ label: __( 'H1 — page hero', 'lumina-blocks' ), value: 'h1' },
						] }
						onChange={ ( value ) => setAttributes( { level: value } ) }
						__nextHasNoMarginBottom
					/>
					<ToggleControl
						label={ __( 'Balance title lines', 'lumina-blocks' ) }
						checked={ !! titleBalance }
						onChange={ ( value ) => setAttributes( { titleBalance: value } ) }
						__nextHasNoMarginBottom
					/>
					<ToggleControl
						label={ __( 'Balance subtitle lines', 'lumina-blocks' ) }
						checked={ !! subtitleBalance }
						onChange={ ( value ) => setAttributes( { subtitleBalance: value } ) }
						__nextHasNoMarginBottom
					/>
				</PanelBody>
			</InspectorControls>

			<section { ...blockProps }>
				<div className="intro-section__inner">
					<RichText
						tagName="p"
						className="intro-section__eyebrow"
						value={ eyebrow }
						onChange={ ( value ) => setAttributes( { eyebrow: value } ) }
						placeholder={ __( 'Eyebrow (optional)', 'lumina-blocks' ) }
						allowedFormats={ [] }
					/>
					<RichText
						tagName={ TitleTag }
						className={ 'intro-section__title' + ( titleBalance ? ' has-balanced-text' : '' ) }
						value={ title }
						onChange={ ( value ) => setAttributes( { title: value } ) }
						placeholder={ __( 'Title', 'lumina-blocks' ) }
						allowedFormats={ [] }
					/>
					<RichText
						tagName="p"
						className={ 'intro-section__subtitle' + ( subtitleBalance ? ' has-balanced-text' : '' ) }
						value={ subtitle }
						onChange={ ( value ) => setAttributes( { subtitle: value } ) }
						placeholder={ __( 'Subtitle (optional)', 'lumina-blocks' ) }
						allowedFormats={ [ 'core/bold', 'core/italic' ] }
					/>
					<div { ...innerBlocksProps } />
				</div>
			</section>
		</>
	);
}
