// PostCSS runs after Sass to add vendor prefixes to the compiled bundle.
// No Tailwind here — this is a block theme; design tokens live in theme.json.
module.exports = {
  plugins: {
    autoprefixer: {},
  },
};
