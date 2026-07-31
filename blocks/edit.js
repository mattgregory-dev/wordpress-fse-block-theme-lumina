import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	RichText,
	InspectorControls,
} from '@wordpress/block-editor';
import { PanelBody, SelectControl } from '@wordpress/components';

/**
 * Editor UI. Mirrors render.php's markup/classes so the theme stylesheet
 * (loaded into the canvas via add_editor_style) styles the preview identically.
 * The style variation (Centered / Legal) is handled by the core Styles panel
 * from block.json; here we only add the heading-level control.
 */
export default function Edit( { attributes, setAttributes } ) {
	const { eyebrow, title, subtitle, level } = attributes;
	const blockProps = useBlockProps();
	const TitleTag = 'h1' === level ? 'h1' : 'h2';

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
						className="intro-section__title"
						value={ title }
						onChange={ ( value ) => setAttributes( { title: value } ) }
						placeholder={ __( 'Title', 'lumina-blocks' ) }
						allowedFormats={ [] }
					/>
					<RichText
						tagName="p"
						className="intro-section__subtitle"
						value={ subtitle }
						onChange={ ( value ) => setAttributes( { subtitle: value } ) }
						placeholder={ __( 'Subtitle (optional)', 'lumina-blocks' ) }
						allowedFormats={ [ 'core/bold', 'core/italic' ] }
					/>
				</div>
			</section>
		</>
	);
}
