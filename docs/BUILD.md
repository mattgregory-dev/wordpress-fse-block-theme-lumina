# Build & tooling

Two independent build pipelines:

- **Vite + SCSS** compiles the theme's front-end bundle (`src/` → `dist/`): the
  escape-hatch stylesheet and JS behavior modules.
- **`@wordpress/scripts`** compiles the custom blocks (`blocks/` → `build/`): the
  JSX editor UI plus the `render.php`/`block.json` that WordPress registers.

Design lives in `theme.json` tokens and block markup, not utility classes.

## Commands

```bash
npm install

npm run dev          # Vite dev server on :5175 (HMR) for src/ assets
npm run build        # full build: vite build + src/style.scss → dist/ + blocks → build/
npm run build:blocks # compile the custom blocks only (blocks/ → build/)
npm run start:blocks # watch-compile the custom blocks during development
npm run lint         # eslint + stylelint + phpcs + block-grammar audit
npm run lint:css     # stylelint on the SCSS layer
npm run lint:blocks  # block-grammar audit (patterns/, templates/, parts/)
```

The theme loads its compiled bundle from `dist/`. For live development with
hot-module reload, add the following to `wp-config.php` and run `npm run dev`:

```php
define( 'CUSTOM_WP_VITE_DEV', true );
```

With that flag on, `inc/enqueue.php` loads assets from the Vite dev server
instead of `dist/`; with it off (production), it enqueues the built files with a
`filemtime()` cache-buster.

## Custom blocks (`build:blocks`)

The blocks in `blocks/` are compiled by `@wordpress/scripts` (webpack) into
`build/`, and `inc/blocks.php` registers each block from that **built** copy.
`npm run build` runs this as its final step; during block development,
`npm run start:blocks` watch-compiles.

Because WordPress loads the built copy, editing a file under `blocks/` — the JSX
in `edit.js`/`index.js`, or the `render.php`/`block.json` that get copied verbatim
into `build/` — has no effect until the block build runs. Rebuild after any
change under `blocks/`. `dist/` (Vite) and `build/` (wp-scripts) are separate
pipelines and both are git-ignored.

## Block-grammar audit (`lint:blocks`)

`scripts/block-audit.js` stack-parses every `<!-- wp:x -->` / `<!-- /wp:x -->`
comment across `patterns/`, `templates/`, and `parts/`, and exits non-zero on
any unclosed or mismatched block. Self-closing blocks (`… /-->`) are ignored.

**Why it exists:** a single missing block closer serializes as perfectly valid
HTML, so it's invisible until the editor loads the file and throws *"This block
contains unexpected or invalid content."* The audit surfaces it in the terminal
instead. It runs as part of `npm run lint` and is intentionally **not** a
pre-commit hook — it's run on demand.

A passing run reports, e.g.:

```
Audited 62 files — ALL BALANCED ✅
```

## Editor parity

`inc/enqueue.php` registers the compiled bundle as an editor style
(`add_editor_style`) so custom CSS (image radius, form/FAQ styling, button
variations) previews in the Site Editor the same as on the front end. See
[GOTCHAS.md](GOTCHAS.md) for the one place this deliberately does *not* reach
(the Custom HTML block sandbox) and how logo styling works around it.
