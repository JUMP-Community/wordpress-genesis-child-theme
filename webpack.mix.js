/**
 * Laravel Mix configuration file.
 *
 * Laravel Mix is a layer built on top of Webpack that simplifies much of the
 * complexity of building out a Webpack configuration file. Use this file
 * to configure how your assets are handled in the build process.
 *
 * https://laravel-mix.com/
 */

// Import required packages.
const mix = require('laravel-mix');
require('laravel-mix-simple-image-processing');

/*
 * Sets the path to the generated assets. By default, this is the root folder in
 * the theme. If doing something custom, make sure to change this everywhere.
 */
mix.setPublicPath('dist');

/*
 * Set Laravel Mix options.
 */
mix.options({
	processCssUrls: false,
});

/*
 * Builds sources maps for assets.
 */
mix.sourceMaps();

/*
 * Versioning and cache busting. Append a unique hash for production assets. If
 * you only want versioned assets in production, do a conditional check for
 * `mix.inProduction()`.
 */
mix.version();

// Javascript
mix.js('assets/js/frontend/frontend.js', 'dist/js');

// CSS
mix.sass('assets/css/frontend.scss', 'dist/css', {
	sassOptions: {
		outputStyle: 'compressed',
		indentType: 'tab',
		indentWidth: 1,
	},
});

// Images
mix.imgs({
	source: 'assets/images',
	destination: 'dist/images',
});

// Fonts
mix.copyDirectory('assets/fonts', 'dist/fonts');