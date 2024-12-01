# Changelog

## 1.3.0 (January 13th, 2022)
* Updated hooks to conform to new format in the rest of the framework.
* Replaced `wp_kses` with `wp_kses_post` in the `requirements-error.php` template file.
* Replaced usage of `DIRECTORY_SEPARATOR` with calls to `wp_normalize_path`.
* Improved automated testing.

## 1.2.0 (May 27th, 2021)
* Replaced all references to `sprintf` with `wp_sprintf`.

## 1.1.6 (April 23rd, 2021)
* Changed the default support URL.
* Migrated from Travis CI to Github Actions.

## 1.1.5 (April 9th, 2021)
* Development tools updates.

## 1.1.4 (March 19th, 2021)
* Created an export of all used WP functions and classes.
* Tweaked development tools configurations.

## 1.1.3 (March 16th, 2021)
* Tweaked the `dws_wp_framework_get_bootstrapper_init_status` function.

## 1.1.2 (March 16th, 2021)
* Added `declare( strict_types = 1 )` to test files.
* Fixed minor tweaks and typos in tests.

## 1.1.1 (March 15th, 2021)
* Prefixed all functions from the global namespace to clear ambiguity.
* Fixed some typos in the documentation.

## 1.1.0 (March 14th, 2021)
* Moved module-specific functions to their own non-autoloaded file.
* Added automated testing via Codeception
* Improved Travis-CI pipeline

## 1.0.0 (February 28th, 2021)
* First official release.
