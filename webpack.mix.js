const mix = require( 'laravel-mix' );

/*
 * Sets the path to the generated assets. By default, this is the root folder in
 * the theme. If doing something custom, make sure to change this everywhere.
 */
mix.setPublicPath( './dist' );
mix.setResourceRoot( '../' );

/*
 * Versioning and cache busting. Append a unique hash for production assets. If
 * you only want versioned assets in production, do a conditional check for
 * `mix.inProduction()`.
 */
mix.version();

// Javascript
mix.js( 'assets/js/frontend/frontend.js', 'dist/js' );

// Styles
mix.sass( 'assets/css/frontend-style.scss', 'dist/css', {
	sassOptions: {
		outputStyle: 'compressed',
	},
} );
