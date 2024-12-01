# DWS WordPress Framework - Bootstrapper

[![GPLv3 License](https://img.shields.io/badge/License-GPL%20v3-yellow.svg)](https://opensource.org/licenses/)
[![PHP Syntax Errors](https://github.com/deep-web-solutions/wordpress-framework-bootstrapper/actions/workflows/php-syntax-errors.yml/badge.svg)](https://github.com/deep-web-solutions/wordpress-framework-bootstrapper/actions/workflows/php-syntax-errors.yml)
[![WordPress Coding Standards](https://github.com/deep-web-solutions/wordpress-framework-bootstrapper/actions/workflows/wordpress-coding-standards.yml/badge.svg)](https://github.com/deep-web-solutions/wordpress-framework-bootstrapper/actions/workflows/wordpress-coding-standards.yml)
[![Codeception Tests](https://github.com/deep-web-solutions/wordpress-framework-bootstrapper/actions/workflows/codeception-tests.yml/badge.svg)](https://github.com/deep-web-solutions/wordpress-framework-bootstrapper/actions/workflows/codeception-tests.yml)


## Description

A set of related functions that help bootstrap and version the other DWS WordPress Framework components.

The *bootstrap.php* file is designed to be one of the very first things that Composer will autoload when calling `require vendor/autoload.php`
because it is mentioned specifically as a file to autoload in *composer.json*. Composer autoloads files on every request, immediately after setting up
the autoloader.

Upon loading, the file will define the necessary functions and validate its own minimum requirements. The end-plugin can now make use of the same functions
to check for minimum WP and PHP requirements, and also use the same functions for outputting an error message.


## Documentation

Documentation for this module and the rest of the DWS WP Framework can be found [here](https://framework.deep-web-solutions.com/bootstrapper-module/motivation).


## Installation

The package is designed to be installed via Composer. It may work as a stand-alone but that is not officially supported.
The package's name is `deep-web-solutions/wp-framework-bootstrapper`.

If the package will be used outside a composer-based installation, e.g. inside a regular WP plugin, you should install
using the `--ignore-platform-reqs` option. If you don't do that, the package will only be able to perform checks for the
WordPress version because composer will throw an error in case of an incompatible PHP version.


## Contributing

Contributions both in the form of bug-reports and pull requests are more than welcome!


## Frequently Asked Questions

- What is the purpose of this package?

It is a good idea for every WordPress plugin to first check the PHP and WP versions present before running, and,
if minimum requirements are not fulfilled, to stop execution and display an error message. This package provides an
easy way of doing just that!

- Can this be used outside the DWS framework?

While this package was built to be used by the DWS WordPress Framework, it does come with a whitelabel functionality.
If you define the constants checked for in *includes/whitelabel.php* before calling `require vendor/autoload.php` you
can customize quite a lot of things.

- Will you support earlier versions of WordPress and PHP?

The bootstrapper module itself will run on any PHP version back to 5.3 -- however, it will do so only to let the user know
that they should update to at least PHP 8.4. As of writing this (December 2024), more than half the WordPress installations
use version 6.7 so we won't be supporting anything below that.

- Is this bug-free?

Hopefully yes, probably not. If you found any problems, please raise an issue on GitHub!


## Changelog

### 2.0.0 (TBD)
* Entire rewrite to cut down on verbosity, constants, and improve performance.

### 1.3.0 (January 13th, 2022)
* Updated hooks to conform to new format in the rest of the framework.
* Replaced `wp_kses` with `wp_kses_post` in the `requirements-error.php` template file.
* Replaced usage of `DIRECTORY_SEPARATOR` with calls to `wp_normalize_path`.
* Improved automated testing.

### 1.2.0 (May 27th, 2021)
* Replaced all references to `sprintf` with `wp_sprintf`.

### 1.1.6 (April 23rd, 2021)
* Changed the default support URL.
* Migrated from Travis CI to Github Actions.

### 1.1.5 (April 9th, 2021)
* Development tools updates.

### 1.1.4 (March 19th, 2021)
* Created an export of all used WP functions and classes.
* Tweaked development tools configurations.

### 1.1.3 (March 16th, 2021)
* Tweaked the `dws_wp_framework_get_bootstrapper_init_status` function.

### 1.1.2 (March 16th, 2021)
* Added `declare( strict_types = 1 )` to test files.
* Fixed minor tweaks and typos in tests.

### 1.1.1 (March 15th, 2021)
* Prefixed all functions from the global namespace to clear ambiguity.
* Fixed some typos in the documentation.

### 1.1.0 (March 14th, 2021)
* Moved module-specific functions to their own non-autoloaded file.
* Added automated testing via Codeception
* Improved Travis-CI pipeline

### 1.0.0 (February 28th, 2021)
* First official release.
