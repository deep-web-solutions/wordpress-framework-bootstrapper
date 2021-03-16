# DWS WordPress Framework - Bootstrapper

**Contributors:** Antonius Hegyes, Deep Web Solutions GmbH  
**Requires at least:** 5.5  
**Tested up to:** 5.7  
**Requires PHP:** 7.4  
**Stable tag:** 1.1.2  
**License:** GPLv3 or later  
**License URI:** http://www.gnu.org/licenses/gpl-3.0.html  


## Description

[![Build Status](https://travis-ci.com/deep-web-solutions/wordpress-framework-bootstrapper.svg?branch=master)](https://travis-ci.com/deep-web-solutions/wordpress-framework-bootstrapper)
[![Maintainability](https://api.codeclimate.com/v1/badges/b9f94cc3e336c49975b2/maintainability)](https://codeclimate.com/github/deep-web-solutions/wordpress-framework-bootstrapper/maintainability)

A set of related functions that help bootstrap and version the other DWS WordPress Framework components.

The *bootstrap.php* file is designed to be one of the very first things that Composer will autoload when calling `require vendor/autoload.php`
because it is mentioned specifically as a file to autoload in *composer.json*. Composer autoloads files on every request, immediately after setting up
the autoloader.

Upon loading, the file will define the necessary functions and validate its own minimum requirements. Moreover, it will set
the constant *DWS_WP_FRAMEWORK_BOOTSTRAPPER_INIT* to either true or false depending on whether the self-check was successful or not.

The end-plugin can now make use of the same functions to check for minimum WP and PHP requirements, and also use the same functions
for outputting an error message.

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
If you define the constants in *bootstrap-whitelabel.php* before calling `require vendor/autoload.php` you can customize
quite a lot of things.

- Will you support earlier versions of WordPress and PHP?

The bootstrapper module itself will run on any PHP version back to 5.3 -- however, it will do so only to let the user know
that they should update to at least PHP 7.4. As of this writing (March 2021), PHP 7.3 is close to EOL, and we consider 7.4 
to provide a few features that are absolutely amazing. Moreover, WP 5.5 introduced a few new features that we really want 
to use as well, and we consider it to be one of the first versions of WordPress to have packed a more-or-less mature version of Gutenberg.

If you're using older versions of either one, you should really consider upgrading at least for security reasons.

- Is this bug-free?

Hopefully yes, probably not. If you found any problems, please raise an issue on Github!


## Changelog

=== 1.1.2 (March 16th, 2021)
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
