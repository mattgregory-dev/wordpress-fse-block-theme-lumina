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
├── scripts/             # Dev tooling (block-audit.js)
└── ...                  # vite.config.js, package.json, lint configs
```

## Build

```bash
npm install
npm run dev          # Vite dev server on :5175 (HMR)
npm run build        # Vite build + compile src/style.scss -> dist/assets/main.css (autoprefixed)
npm run lint         # eslint + stylelint + phpcs + block-grammar audit
npm run lint:blocks  # block-grammar audit on its own (patterns/, templates/, parts/)
```

For live dev, add `define('CUSTOM_WP_VITE_DEV', true);` to `wp-config.php`.

### Block-grammar audit (`lint:blocks`)

`scripts/block-audit.js` stack-parses every `<!-- wp:x -->` / `<!-- /wp:x -->`
comment in `patterns/`, `templates/`, and `parts/` and fails (exit 1) on any
unclosed or mismatched block. Self-closing blocks (`... /-->`) are ignored.

Why it exists: a single missing block closer serializes as valid HTML but breaks
the block tree, so it stays invisible until the editor loads the file and throws
**"This block contains unexpected or invalid content."** The audit catches it at
the terminal instead. It runs as part of `npm run lint`; it is **not** a
pre-commit hook (deliberately — run it on demand).

## Fonts

Lato + Marcellus are **self-hosted** (`assets/fonts/*.woff2`) and registered in
`theme.json` via `fontFace`. WordPress loads them on the front end, in the editor
canvas, and lists them in the Font Library — no JS font imports, no CDN calls.
To add a family: drop the woff2 in `assets/fonts/` and add a `fontFace` entry to
the matching `settings.typography.fontFamilies` item.

## Development gotchas (WordPress caching)

Block themes edit as flat files, but WordPress caches a lot of what it derives
from those files in the database. Several times during the build a change to a
file "didn't take" — every instance traced back to a stale cache, not a bad edit.
Reach for these before assuming the file is wrong:

- **New/edited patterns render blank or stale.** Registered patterns are cached
  in transients. After adding or changing a `patterns/*.php` file, flush them:
  `wp transient delete --all` (or SQL:
  `DELETE FROM wp_options WHERE option_name LIKE '_transient_%' OR option_name LIKE '_site_transient_%';`).
- **theme.json changes don't show up.** The Site Editor writes user
  customizations to a `wp_global_styles` custom post in the DB, and **that copy
  overrides the theme.json file**. If a color/type/spacing change to `theme.json`
  is ignored, it's because a saved Global Styles record is winning. Reset it in
  the editor (**Styles → Revert to theme defaults / Reset**) or clear the
  `wp_global_styles` post for this theme. Same mechanism applies to templates and
  template parts edited in the Site Editor — the DB version shadows the file until
  you clear it.
- **A new page/slug 404s, or a template won't resolve.** Rewrite rules are cached.
  Flush after changing slugs or adding templates: `wp rewrite flush` (or delete
  the `rewrite_rules` option and reload).
- **General rule.** When behavior contradicts the file on disk, suspect the DB/
  transient layer first. A full clear is `wp transient delete --all && wp rewrite flush`,
  plus a Global Styles revert if `theme.json` is involved. (Object-cache plugins
  or a persistent cache add another layer — `wp cache flush` — but this theme's
  local stack doesn't use one.)

> Not a cache: if a **font size** looks wrong (e.g. core's 13/20/36/42 instead of
> the ladder), that's `settings.typography.defaultFontSizes` — it defaults to
> `true`, which merges core's sizes on top of yours. This theme sets it to
> `false`. See `theme.json`.

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
