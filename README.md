# Lumina Blocks

A bespoke **Full Site Editing** WordPress theme for [Lumina Healing Center](https://luminaretreatcenter.com),
a retreat center in Sedona, Arizona. Built the modern block-native way — **design
tokens in `theme.json`, page sections as block patterns, pages as block
templates** — with no page builder and no starter-theme scaffolding left behind.

![Lumina Blocks — homepage](assets/images/lumina-blocks.jpg)

> Production theme, built and maintained end-to-end. Client-approved for use as a
> portfolio piece; reference available on request.

---

## What makes it worth a look

- **`theme.json` (v3) as the single source of truth.** The palette, fluid type
  scale, spacing rhythm, and element/block styles all live in `theme.json` and
  emit `--wp--preset--*` tokens. Custom CSS is a deliberate, documented *escape
  hatch* — not the primary layer.
- **True Full Site Editing.** Block templates + template parts render real
  `<header>`/`<main>`/`<footer>` landmarks and stay editable in the Site Editor.
- **Custom dynamic blocks.** Section blocks (`hero`, `spotlight`, `bio`,
  `intro-section`, `cta-band`, `checklist-section`) built with
  `@wordpress/scripts` — editor UI in `edit.js`, front-end markup in `render.php`,
  content in the database. Source in `blocks/`, compiled to `build/`.
- **Reusable starter patterns.** Section starters in `patterns/`, auto-registered
  under one "Lumina" category, that authors insert and edit — page content lives
  in the database, not hardcoded in templates.
- **A hand-built Vite + SCSS pipeline** — autoprefixed, minified, HMR in dev —
  chosen over a bloated starter boilerplate.
- **Tooling that catches invisible bugs.** stylelint plus a custom
  **block-grammar linter** that stack-parses block comments to catch the
  unclosed-block error *before* the editor throws "unexpected or invalid
  content."
- **Deploy-safe images.** A filename → attachment-ID resolver so image
  references survive dev → production (where IDs differ), while still emitting
  responsive `srcset`.
- **Performance & accessibility by default.** Self-hosted fonts, responsive
  images with LCP prioritization, skip links, visible focus states, and
  reduced-motion support.

## Tech stack

WordPress (Full Site Editing) · `theme.json` v3 · custom blocks
(`@wordpress/scripts`) · PHP · SCSS · Vite · JavaScript (ES modules) ·
stylelint / eslint / phpcs

## Quick start

```bash
npm install
npm run build        # compile assets → dist/
npm run lint         # eslint + stylelint + phpcs + block-grammar audit
```

For live development with hot reload, set `define( 'CUSTOM_WP_VITE_DEV', true );`
in `wp-config.php` and run `npm run dev`. Full details in
[docs/BUILD.md](docs/BUILD.md).

## Documentation

The engineering detail lives in [`docs/`](docs/):

- **[Architecture](docs/ARCHITECTURE.md)** — the styling model and layer
  priority, project structure, the portable image helper, fonts, and
  accessibility.
- **[Build & tooling](docs/BUILD.md)** — the Vite/SCSS pipeline, lint commands,
  and the block-grammar audit.
- **[Gotchas & root-cause notes](docs/GOTCHAS.md)** — an engineering notebook of
  the non-obvious WordPress problems solved along the way (caching layers, the
  media-grid/`WP_DEBUG_DISPLAY` trap, the inline-SVG-logo editor sandbox, and
  more).

## Credits

Design & development by Matthew Gregory. Built for Lumina Healing Center,
Sedona AZ, and published here with the client's permission.
