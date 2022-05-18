const DEFAULT_CONFIG = require('10up-toolkit/config/webpack.config');
const StylelintPlugin = require('stylelint-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
	...DEFAULT_CONFIG,
	plugins: [
		new StylelintPlugin({
			configFile: '.stylelintrc', // if your config is in a non-standard place
			files: 'assets/css/*.scss', // location of your CSS files
			fix: true, // if you want to auto-fix some of the basic rules
		}),
		new MiniCssExtractPlugin(),
	],
	module: {
		rules: [
			{
				test: /\.(css|sass|scss)$/,
				use: [
					MiniCssExtractPlugin.loader,
					{
						loader: 'css-loader',
						options: {
							importLoaders: 2,
							sourceMap: true,
						},
					},
					{
						loader: 'sass-loader',
						options: {
							sourceMap: true,
						},
					},
				],
			},
		],
	},
};
