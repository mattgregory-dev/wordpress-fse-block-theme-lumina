# Architecture

How Lumina Blocks is put together, and the reasoning behind the layering. This
is a **bespoke Full Site Editing theme** built for one production site — not a
starter or boilerplate — so the decisions below are deliberate rather than
defaults left in place.

## The styling model (read this first)

The theme has a strict priority order. Always reach for the **highest** layer
that can do the job; drop to a lower one only when the layer above genuinely
can't express it.

1. **`theme.json`** — colors, fluid type scale, spacing rhythm, shadows,
   `styles.elements` (headings, links, buttons, captions) and `styles.blocks`
   (per-block-type defaults). This is ~90% of the design and the single source
   of truth; it emits `--wp--preset--*` custom properties consumed everywhere
   else.
2. **Block markup / patterns / custom blocks** — per-instance layout and styling,
   set as block attributes. These serialize to inline styles, which is canonical
   FSE (the editor writes the same markup) — not a code smell. See `patterns/`
   and the custom section blocks in `blocks/`.
3. **Block style variations** (`register_block_style`) — reusable custom looks
   applied via an `is-style-*` class (e.g. `is-style-checklist`).
4. **`src/style.scss`** — an escape hatch **only**: pseudo-elements, `:has()`,
   keyframe animations, and styling tied to JS-added state classes. It always
   references `var(--wp--preset--*)` and never redefines a design token.

### `theme.json` `styles.css` vs. `src/style.scss`

`theme.json` exposes a `styles.css` string (used here for a base `img` reset, a
flex `min-width:0` fix, and the logo colors). The rule of thumb for where a raw
CSS rule belongs:

- **Foundational resets that must also apply inside the editor canvas →
  `theme.json` `styles.css`.** That string is injected into both the front end
  *and* the editor automatically, alongside the `--wp--preset--*` variables (so
  it sits at the correct cascade position), with no build step and no separate
  editor enqueue.
- **Anything with real CSS logic** (pseudo-elements, `:has()`, keyframes,
  state) **→ `src/style.scss`.** It only loads where enqueued and only after a
  build.

`styles.css` is raw CSS inside JSON — no nesting, not covered by stylelint. Once
it grows past a handful of one-liners, that's the signal to move it into the
SCSS layer with an editor enqueue instead.

## Project structure

```
lumina-blocks/
├── style.css            # Theme header (required by WordPress)
├── theme.json           # Design source of truth (v3)
├── functions.php        # Loads the inc/ modules
├── templates/           # Block templates: page, home, index, single, archive,
│                        #   search, 404, page-full-width
├── parts/               # header, footer, library-sidebar (template parts)
├── patterns/            # Reusable section starters (one "Lumina" category)
├── blocks/              # Custom block source (edit.js/render.php/block.json);
│                        #   each compiled by @wordpress/scripts → build/
├── build/               # Compiled blocks (git-ignored; what WordPress registers)
├── inc/                 # Self-contained PHP modules (enqueue, images, blocks, …)
├── src/                 # Front-end source (compiled by Vite → dist/)
│   ├── main.js          #   JS entry — imports behavior modules from scripts/
│   ├── style.scss       #   SCSS entry (escape-hatch layer) — imports styles/
│   ├── scripts/         #   JS behavior modules (e.g. scroll-top.js)
│   └── styles/          #   SCSS partials (_buttons, _forms, _hero, blocks/, …)
├── scripts/             # Node build tooling (block-audit.js) — not shipped
├── dist/                # Compiled theme CSS/JS (git-ignored; build output)
└── assets/              # Self-hosted fonts, images
```

Pages are delivered as **content in the database, rendered through a shared
template.** A page's sections are authored in the editor — from the custom blocks
in `blocks/` and the starter patterns in `patterns/` — and stored in
`post_content`. `templates/page.html` renders that content inside the
header/footer chrome (`page-full-width.html` is the alternate). The starters in
`patterns/` are reusable *starting points* an author inserts and edits, **not**
page definitions composed by templates. The library index (`home.html` /
`archive.html`) is the exception that still composes structure directly, including
the `library-sidebar` template part.

## Custom blocks

Six section-level blocks live in `blocks/` — `hero`, `spotlight`, `bio`,
`intro-section`, `cta-band`, and `checklist-section`. They exist so a section's
*structure* stays in git while its *content* lives in the database: each is a
**dynamic block** where `edit.js` provides the editor UI, `render.php` emits the
front-end markup from block attributes, and inner blocks hold the freeform body
(paragraphs, buttons, lists).

- **Source → build.** `@wordpress/scripts` compiles `blocks/<name>/` (block.json,
  edit.js, index.js, render.php) into `build/<name>/`. WordPress registers each
  block from `build/` in `inc/blocks.php`, **not** from the source — so an edit
  under `blocks/` (including `render.php`, which is *copied* into `build/`) has no
  effect until the block build runs. See [BUILD.md](BUILD.md#custom-blocks-buildblocks)
  and [GOTCHAS.md](GOTCHAS.md#5-editing-blocks-does-nothing-until-you-rebuild).
- **Attributes in the DB, markup in git.** Typed fields (eyebrow, heading, image
  ID, overlay color, …) serialize into the block comment; `render.php` reads them
  and never trusts raw input in an attribute context — e.g. the hero overlay
  color is validated against a hex/rgb pattern before it reaches a `style`.
- **Editor parity.** `edit.js` mirrors `render.php`'s classes and markup, so the
  canvas — with the compiled bundle loaded via `add_editor_style` — previews the
  same as the front end. Per-block styling lives in `src/styles/blocks/`.

## Images: portable, deploy-safe references

Attachment IDs are assigned per WordPress install, so the same file has a
different ID on dev vs. production. Hardcoding IDs in patterns therefore breaks
the moment the theme is deployed to a site where that file uploaded under a
different ID.

Instead, patterns reference images **by filename** and resolve the local ID at
render time via two helpers in `inc/images.php`:

- `lumina_attachment_id_by_filename( $filename )` — resolves the current
  install's attachment ID from the base filename (cached per request).
- `lumina_image_block( $filename, $alt, $link_url = '' )` — renders the full
  `core/image` block, writing the resolved ID into the block comment, the
  `src`, and the `wp-image-<id>` class **together**, so the markup stays
  internally consistent and portable — and because a real ID is emitted,
  WordPress still adds responsive `srcset`/`sizes`.

```php
<?php echo lumina_image_block( 'lotus-pond-4.webp', 'White water lilies in a dark pond' ); ?>
```

If the file isn't in that install's media library, the image renders empty
rather than pointing at a dead ID — it self-heals the moment the file is
uploaded.

## Fonts

Lato and Marcellus are **self-hosted** (`assets/fonts/*.woff2`) and registered
in `theme.json` via `fontFace`. WordPress loads them on the front end, in the
editor canvas, and lists them in the Font Library — no JS font loaders, no CDN
calls. To add a family: drop the woff2 in `assets/fonts/` and add a `fontFace`
entry to the matching `settings.typography.fontFamilies` item.

## Accessibility

Baseline accessibility is built in using block-theme-native mechanisms rather
than hand-rolled markup.

**Handled by the theme / core:**

- **Skip link** — WordPress adds a "Skip to content" link automatically in
  block themes; the theme styles it to the palette and guarantees it reveals on
  focus (`src/styles/_accessibility.scss`).
- **Landmarks** — templates render real `<header>`, `<main>`, `<footer>`
  elements (block `tagName`), and the Navigation block outputs a labelled
  `<nav>`.
- **Visible focus** — a consistent `:focus-visible` outline on all interactive
  elements; mouse users are unaffected.
- **Reduced motion** — `prefers-reduced-motion` neutralizes animation,
  transition, and smooth-scroll.
- **Screen-reader utility** — `.screen-reader-text` is available for visually
  hidden labels.
- **Heading order** — one `<h1>` per page, with `<h2>`/`<h3>` for sections.

**Depends on content / editor discipline:**

- Meaningful **alt text** on images (empty alt for purely decorative).
- Logical **heading order** — use the font-size control for size, don't skip
  levels.
- **Descriptive link text** ("View pricing", not "click here").
- Label any custom **forms**, and re-check **color contrast** if palette values
  change.

These utilities live in the escape-hatch SCSS layer, compiled by Vite into
`dist/assets/main.css` and loaded on both the front end and the editor.
