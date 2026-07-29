# Build & tooling

The front-end pipeline is **Vite + SCSS** — no Tailwind, by design.
Utility-in-markup fights the block editor's compose-in-place model and
duplicates what `theme.json` already expresses as design tokens.

## Commands

```bash
npm install

npm run dev          # Vite dev server on :5175 (HMR)
npm run build        # Vite build + compile src/style.scss → dist/assets/main.css (autoprefixed, minified)
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
