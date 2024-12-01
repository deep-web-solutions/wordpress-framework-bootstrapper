# DWS WordPress Framework - Bootstrapper

[![GPLv3 License](https://img.shields.io/badge/License-GPL%20v3-yellow.svg)](https://opensource.org/licenses/)
[![PHP Syntax Errors](https://github.com/deep-web-solutions/wordpress-framework-bootstrapper/actions/workflows/php-syntax-errors.yml/badge.svg)](https://github.com/deep-web-solutions/wordpress-framework-bootstrapper/actions/workflows/php-syntax-errors.yml)
[![PHP Quality Assurance](https://github.com/deep-web-solutions/wordpress-framework-bootstrapper/actions/workflows/php-quality-assurance.yml/badge.svg)](https://github.com/deep-web-solutions/wordpress-framework-bootstrapper/actions/workflows/php-quality-assurance.yml)
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
