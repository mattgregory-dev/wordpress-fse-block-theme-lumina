# Lumina Blocks

A block-based (Full Site Editing) WordPress starter theme. **Design lives in
`theme.json`; layouts live in patterns; templates are block markup.** Custom
SCSS/JS is an escape hatch, not the main event. The build pipeline is
**Vite + SCSS** — no Tailwind (utility-in-markup conflicts with the block
editor's compose-in-place model).

Sibling to **Starter Classic** (`../starter-classic`), the classic PHP-template
version this was seeded from.

## The styling model (read this first)

Priority order — always reach for the highest one that can do the job:

1. **theme.json** — colors, fluid type scale, spacing rhythm, shadows,
   `styles.elements` (headings, links, buttons, captions) and `styles.blocks`
   (per-block-type defaults). ~90% of the design. Single source of truth; it
   emits `--wp--preset--*` custom properties.
2. **Block markup / patterns** — per-instance layout and styling, set as block
   attributes (which serialize to inline styles — that's canonical FSE, not a
   smell). See `patterns/`.
3. **Block style variations** (`register_block_style`) — reusable custom looks
   applied via an `is-style-*` class.
4. **`src/style.scss`** — escape hatch ONLY: pseudo-elements, `:has()`,
   keyframe animations, JS-state styling. Reference `var(--wp--preset--*)`;
   never redefine tokens here.

## Structure

```
lumina-blocks/
├── style.css            # Theme header
├── theme.json           # Design source of truth
├── functions.php        # Loads inc/ modules
├── templates/           # Block templates: index, single, page, archive,
│                        #   search, 404, front-page, page-full-width
├── parts/               # header.html, footer.html
├── patterns/            # hero, feature-columns, cta  (composed into front-page)
├── inc/                 # Self-contained PHP modules
├── src/                 # style.scss (escape hatch) + main.js (fonts)
└── ...                  # vite.config.js, package.json, lint configs
```

## Build

```bash
npm install
npm run dev        # Vite dev server on :5175 (HMR)
npm run build      # Vite build + compile src/style.scss -> dist/assets/main.css (autoprefixed)
npm run lint       # eslint + stylelint + phpcs
```

For live dev, add `define('CUSTOM_WP_VITE_DEV', true);` to `wp-config.php`.

## Fonts

Lato + Marcellus are **self-hosted** (`assets/fonts/*.woff2`) and registered in
`theme.json` via `fontFace`. WordPress loads them on the front end, in the editor
canvas, and lists them in the Font Library — no JS font imports, no CDN calls.
To add a family: drop the woff2 in `assets/fonts/` and add a `fontFace` entry to
the matching `settings.typography.fontFamilies` item.

## Accessibility

Baseline a11y is built in — the intent is to match the care taken in Starter
Classic, using block-theme-native mechanisms instead of hand-rolled markup.

**Handled by the theme / core:**
- **Skip link** — WordPress adds a "Skip to content" link automatically in block
  themes (`.skip-link` / `.screen-reader-text`). We theme it to the palette and
  guarantee it reveals on focus (`src/styles/_accessibility.scss`).
- **Landmarks** — templates render real `<header>`, `<main>`, `<footer>` elements
  (block `tagName`), and the Navigation block outputs a labelled `<nav>`.
- **Visible focus** — a consistent `:focus-visible` outline (primary color) on all
  interactive elements; mouse users are unaffected.
- **Reduced motion** — `prefers-reduced-motion` neutralizes animation, transition
  and smooth-scroll.
- **Screen-reader utility** — `.screen-reader-text` is available for visually
  hidden labels in patterns / custom HTML.
- **Heading order** — one `<h1>` per page (post/query title or hero `h1`), with
  `<h2>`/`<h3>` for sections.

**Depends on content / editor discipline (the intention):**
- Set meaningful **alt text** on images (empty alt for purely decorative).
- Keep **heading order** logical in content — don't skip levels for size; use the
  font-size control instead.
- Write **descriptive link text** ("View pricing", not "click here").
- Label any custom **forms** added later.
- Re-check **color contrast** if palette values change.

These utilities live in the escape-hatch SCSS layer (`src/styles/`), compiled by
Vite into `dist/assets/main.css` and loaded on the front end and in the editor.
