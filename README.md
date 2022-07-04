# JUMP Child Theme

## Features

- [Config-based](https://www.alainschlesser.com/config-files-for-reusable-code/), OOP modular architecture
- [Bootstrap 5](https://getbootstrap.com) as a Sass toolkit
- [Laravel Mix 6](https://laravel-mix.com/) for automating development build tasks and synchronized browser testing
- [NPM](https://www.npmjs.com/) for managing Node dependencies
- [Composer](https://getcomposer.org/) for managing PHP dependencies and autoloading
- [Namespaced](http://php.net/manual/en/language.namespaces.basics.php) to avoid naming conflicts
- [Gutenberg](https://wordpress.org/plugins/gutenberg/) support for latest blocks and admin editor styles

## Requirements

| Requirement | How to Check | How to Install |
| :---------- | :----------- | :------------- |
| PHP >= 8.0 | `php -v` | [php.net](http://php.net/manual/en/install.php) |
| WordPress >= 6.0 | `Admin Footer` | [wordpress.org](https://codex.wordpress.org/Installing_WordPress) |
| Genesis >= 3.1.1 | `Theme Page` | [studiopress.com](http://www.shareasale.com/r.cfm?b=346198&u=1459023&m=28169&urllink=&afftrack=) |
| Composer >= 2.0.0 | `composer --version` | [getcomposer.org](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx) |
| Node >= 16.14.2 | `node -v` | [nodejs.org](https://nodejs.org/) |
| NPM >= 8.10.0 | `npm -v` | [npm.js](https://www.npmjs.com/) |

## Structure

```shell
jump/    # → Root directory
├── assets/         		# → Front-end assets
├── config/         		# → Config directory
├── includes/       		# → Theme functions
│   ├── classes/structure/  # → Structural functions
├── templates/      		# → Page templates
├── vendor/         		# → Composer packages
├── node_modules/   		# → Node.js packages
├── composer.json   		# → Composer settings
├── package.json    		# → Node dependencies
├── webpack.mix.js  		# → Laravel mix config
├── screenshot.png  		# → Theme screenshot
├── functions.php   		# → Loads init files
└── style.css       		# → Blank stylesheet
```

## Usage

Static assets are organized in the `assets` directory. This folder contains theme scripts, styles, images, fonts, views and language translation files. All of the main theme styles are contained in the `assets/css/frontend-styles.css` file, the `style.css` file at the root of the theme is left blank intentionally and only contains the required stylesheet header comment. 

### Autoloading classes and files

#### Classes

The theme automatically loads classes placed in the `lib/classes/` directory via the Composer autoloader. If you are cloning this repository for the first time, you must run the following command to build the autoloader:

```shell
composer install
```

Once you have added your additional files, run the following command to regenerate the autoloader:

```shell
composer dump-autoload
```

#### Files

File loading is handled by the `functions.php` file. Simply add or remove files from the directory/filename array. 

## Development

All build tasks are located in the theme's `package.json` file, under the *scripts* section.

## Contributing

[View the guidelines to get started](./CONTRIBUTING.md).