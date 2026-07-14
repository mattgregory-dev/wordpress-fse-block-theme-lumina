import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';
import { defineConfig } from 'vite';
import fullReload from 'vite-plugin-full-reload';

const themeRoot = fileURLToPath(new URL('.', import.meta.url));
const mainEntry = path.resolve(themeRoot, 'src/main.js');
const blocksRoot = path.resolve(themeRoot, 'blocks');

// Discover block entry files at /blocks/*/index.js and map to blocks/[name].
const getBlockEntries = () => {
  if (!fs.existsSync(blocksRoot)) {
    return {};
  }

  return fs.readdirSync(blocksRoot, { withFileTypes: true })
    .filter((dirent) => dirent.isDirectory())
    .reduce((entries, dirent) => {
      const entryPath = path.resolve(blocksRoot, dirent.name, 'index.js');
      if (fs.existsSync(entryPath)) {
        entries[`blocks/${dirent.name}`] = entryPath;
      }
      return entries;
    }, {});
};

const getBlockCssOutput = (assetInfo) => {
  if (!assetInfo || !Array.isArray(assetInfo.originalFileNames)) {
    return null;
  }

  const blockSource = assetInfo.originalFileNames.find((name) => (
    typeof name === 'string' && name.replace(/\\/g, '/').includes('/blocks/')
  ));

  if (!blockSource) {
    return null;
  }

  const normalized = blockSource.replace(/\\/g, '/');
  const match = normalized.match(/\/blocks\/([^/]+)\//);
  if (!match) {
    return null;
  }

  return `blocks/${match[1]}.css`;
};

export default defineConfig({
  // Use ./src as the project root for dev/build.
  root: 'src',
  plugins: [
    fullReload([
      '**/*.php',
      '../**/*.php',
    ]),
  ],
  server: {
    // Local dev server port.
    port: 5175,
    strictPort: true,
    // Allow Vite to serve files from the theme root (blocks live outside /src).
    fs: {
      allow: [themeRoot],
    },
  },
  css: {
    // Enable CSS sourcemaps in dev (build maps handled by Sass CLI).
    devSourcemap: true,
    preprocessorOptions: {
      scss: {
        // Allow Sass to emit source maps during dev.
        sourceMap: true,
        sourceMapIncludeSources: true,
      },
    },
  },
  build: {
    // Emit build output into the theme's /dist folder.
    outDir: '../dist',
    emptyOutDir: true,
    // Keep JS sourcemaps for debugging.
    sourcemap: true,
    rollupOptions: {
      // Use WordPress-provided packages at runtime instead of bundling them.
      external: [
        '@wordpress/blocks',
        '@wordpress/block-editor',
        '@wordpress/components',
        '@wordpress/element',
      ],
      // Multi-entry: main theme bundle + one entry per block.
      input: {
        main: mainEntry,
        ...getBlockEntries(),
      },
      output: {
        // Keep entry names stable and readable.
        entryFileNames: (chunk) => (
          chunk.name === 'main' ? 'main.js' : `${chunk.name}.js`
        ),
        chunkFileNames: 'chunks/[name].js',
        assetFileNames: (assetInfo) => {
          // Preserve per-entry CSS names (e.g. blocks/hero.css).
          if (assetInfo.name && assetInfo.name.endsWith('.css')) {
            return getBlockCssOutput(assetInfo) || 'assets/[name][extname]';
          }
          return 'assets/[name][extname]';
        },
      },
    },
  },
});
