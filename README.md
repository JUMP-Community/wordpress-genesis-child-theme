# JUMP Starter Theme

A developer-friendly starter theme used for creating commercial child themes for the Genesis Framework.
## Table of Contents

* [Features](#features)
* [Requirements](#requirements)
* [Installation](#installation)
* [Usage](#usage)
    * [Autoloading classes and files](#autoloading-classes-and-files)
* [Development](#development)
* [Structure](#structure)

## Features

The Genesis Starter Theme aims to modernize, organize and enhance some aspects of Genesis child theme development. Take a look at what is waiting for you:

- [Config-based](https://www.alainschlesser.com/config-files-for-reusable-code/), OOP modular architecture
- [Bootstrap](https://github.com/seothemes/genesis-starter-theme/tree/master/assets/scss) as a lightweight Sass toolkit
- [@wordpress/scripts](https://laravel.com/docs/5.8/mix) for automating development build tasks and synchronized browser testing
- [NPM](https://www.npmjs.com/) for managing Node dependencies
- [Composer](https://getcomposer.org/) for managing PHP dependencies and autoloading
- [Namespaced](http://php.net/manual/en/language.namespaces.basics.php) to avoid naming conflicts
- [Gutenberg](https://wordpress.org/plugins/gutenberg/) support for latest blocks and admin editor styles

## Requirements

| Requirement | How to Check | How to Install |
| :---------- | :----------- | :------------- |
| PHP >= 5.4 | `php -v` | [php.net](http://php.net/manual/en/install.php) |
| WordPress >= 5.2 | `Admin Footer` | [wordpress.org](https://codex.wordpress.org/Installing_WordPress) |
| Genesis >= 3.1.1 | `Theme Page` | [studiopress.com](http://www.shareasale.com/r.cfm?b=346198&u=1459023&m=28169&urllink=&afftrack=) |
| Composer >= 1.5.0 | `composer --version` | [getcomposer.org](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx) |
| Node >= 9.10.1 | `node -v` | [nodejs.org](https://nodejs.org/) |
| NPM >= 5.6.0 | `npm -v` | [npm.js](https://www.npmjs.com/) |

## Installation

Install the latest development version of the Genesis Starter Theme using Composer from your WordPress themes directory (replace `your-theme-name` below with the name of your theme):

```shell
composer create-project seothemes/genesis-starter-theme your-theme-name dev-master
```

Navigate into the theme's root directory:

```shell
cd your-theme-name
```

Install node dependencies, build the theme assets and kick-off BrowserSync:

```shell
npm install && npm run build
```

## Structure

```shell
your-theme-name/    # → Root directory
├── assets/         # → Front-end assets
├── config/         # → Config directory
├── includes/       # → Theme functions
│   ├── functions/  # → General functions
│   ├── plugins/    # → Plugin functions
│   ├── shortcodes/ # → Shortcode functions
│   ├── structure/  # → Structural functions
├── templates/      # → Page templates
├── tests/          # → PHP Unit tests
├── vendor/         # → Composer packages
├── node_modules/   # → Node.js packages
├── composer.json   # → Composer settings
├── package.json    # → Node dependencies
├── webpack.mix.js  # → Laravel mix config
├── screenshot.png  # → Theme screenshot
├── functions.php   # → Loads init files
└── style.css       # → Blank stylesheet
```

## Usage

Project details such as theme name, author, version number etc should only ever be changed from the `package.json` file. Laravel Mix reads this file and automatically places the relevant information to the correct locations throughout the theme. 

Static assets are organized in the `assets` directory. This folder contains theme scripts, styles, images, fonts, views and language translation files. All of the main theme styles are contained in the `assets/css/main.css` file, the `style.css` file at the root of the theme is left blank intentionally and only contains the required stylesheet header comment. 

### Autoloading classes and files

#### Classes

The Genesis Starter Theme automatically loads classes placed in the `lib/classes/` directory via the Composer autoloader. Once you have added your additional files, run the following command to regenerate the autoloader:

```shell
composer dump-autoload --no-dev
```

#### Files

File loading is handled by the `functions.php` file. Simply add or remove files from the directory/filename array. 

## Development

All build tasks are located in the theme's `package.json` file, under the *scripts* section.

## Contributing

Contributions are welcome from everyone. We have guidelines to help you get started.