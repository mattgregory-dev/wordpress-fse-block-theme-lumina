import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	RichText,
	InspectorControls,
} from '@wordpress/block-editor';
import { PanelBody, SelectControl } from '@wordpress/components';
import { useSelect } from '@wordpress/data';

/**
 * Editor UI. Mirrors render.php's markup/classes so the theme stylesheet
 * (loaded into the canvas via add_editor_style) styles the preview identically.
 *
 * Title source is keyed on `level` (matching render.php):
 *   - H1 → the block is the page hero, so the title is bound to the WP page
 *          title. The Title field is hidden; the canvas shows the live page
 *          title (falling back to a [Page title] placeholder while empty).
 *   - H2 → the title is a typed block attribute, edited inline as normal.
 */
export default function Edit( { attributes, setAttributes } ) {
	const { eyebrow, title, subtitle, level } = attributes;
	const blockProps = useBlockProps();
	const isH1 = 'h1' === level;
	const TitleTag = isH1 ? 'h1' : 'h2';

	// Live (possibly unsaved) page title, for the bound-title preview in H1 mode.
	const pageTitle = useSelect(
		( select ) => select( 'core/editor' )?.getEditedPostAttribute( 'title' ),
		[]
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
					{ isH1 && (
						<p className="components-base-control__help">
							{ __(
								'Title uses the page title (set it in the Page panel).',
								'lumina-blocks'
							) }
						</p>
					) }
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
					{ isH1 ? (
						<TitleTag className="intro-section__title">
							{ pageTitle || __( '[Page title]', 'lumina-blocks' ) }
						</TitleTag>
					) : (
						<RichText
							tagName={ TitleTag }
							className="intro-section__title"
							value={ title }
							onChange={ ( value ) => setAttributes( { title: value } ) }
							placeholder={ __( 'Title', 'lumina-blocks' ) }
							allowedFormats={ [] }
						/>
					) }
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
