<?php

namespace DeepWebSolutions\Framework;

defined( 'ABSPATH' ) || exit;

// region Settings that can be overwritten on a plugin-by-plugin basis.

defined( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_WHITELABEL_NAME' ) || define( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_WHITELABEL_NAME', 'Deep Web Solutions' );
defined( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_WHITELABEL_LOGO' ) || define( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_WHITELABEL_LOGO', __DIR__ . '/src/assets/dws_logo.svg' );
defined( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_BOOTSTRAPPER_NAME' ) || define( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_BOOTSTRAPPER_NAME', constant( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_WHITELABEL_NAME' ) . ': Framework Bootstrapper' );

defined( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_TEMP_DIR_NAME' ) || define( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_TEMP_DIR_NAME', 'deep-web-solutions' );
defined( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_TEMP_DIR_PATH' ) || define( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_TEMP_DIR_PATH', wp_get_upload_dir() ['basedir'] . DIRECTORY_SEPARATOR . constant( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_TEMP_DIR_NAME' ) . DIRECTORY_SEPARATOR );
defined( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_TEMP_DIR_URL' ) || define( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_TEMP_DIR_URL', wp_get_upload_dir() ['baseurl'] . '/' . constant( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_TEMP_DIR_NAME' ) . '/' );

// endregion

// region A few general-use functions for retrieving the values of the constants defined above.

/**
 * Returns the whitelabel name of the framework within the context of the current plugin.
 *
 * @since   1.0.0
 * @version 1.0.0
 *
 * @return  string
 */
function dws_wp_framework_get_whitelabel_name(): string {
	return constant( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_WHITELABEL_NAME' );
}

/**
 * Returns the path to the whitelabel logo of the framework within the context of the current plugin.
 *
 * @since   1.0.0
 * @version 1.0.0
 *
 * @return  string
 */
function dws_wp_framework_get_whitelabel_logo(): string {
	return constant( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_WHITELABEL_LOGO' );
}

/**
 * Returns the whitelabel name of the framework's bootstrapper within the context of the current plugin.
 *
 * @since   1.0.0
 * @version 1.0.0
 *
 * @return  string
 */
function dws_wp_framework_get_bootstrapper_name(): string {
	return constant( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_BOOTSTRAPPER_NAME' );
}

/**
 * Returns the name of the temp directory within the context of the current plugin.
 *
 * @since   1.0.0
 * @version 1.0.0
 *
 * @return  string
 */
function dws_wp_framework_get_temp_dir_name(): string {
	return constant( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_TEMP_DIR_NAME' );
}

/**
 * Returns the path to the temp directory within the context of the current plugin.
 *
 * @since   1.0.0
 * @version 1.0.0
 *
 * @return  string
 */
function dws_wp_framework_get_temp_dir_path(): string {
	return constant( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_TEMP_DIR_PATH' );
}

/**
 * Returns the URL of the temp directory within the context of the current plugin.
 *
 * @since   1.0.0
 * @version 1.0.0
 *
 * @return  string
 */
function dws_wp_framework_get_temp_dir_url(): string {
	return constant( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_TEMP_DIR_URL' );
}

// endregion
