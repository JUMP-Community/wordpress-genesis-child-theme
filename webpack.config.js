import StyleLintPlugin from 'stylelint-webpack-plugin';

export default function() [
	new StyleLintPlugin({
		configFile: '.stylelintrc', // if your config is in a non-standard place
		files: 'src/**/*.css', // location of your CSS files
		fix: true, // if you want to auto-fix some of the basic rules
	}),
];
