<?php

namespace DeepWebSolutions\Framework;

defined( 'ABSPATH' ) || exit;

// Make sure that the whitelabel options are defined. If not, set the defaults.
defined( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_WHITELABEL_NAME' ) || define( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_WHITELABEL_NAME', 'Deep Web Solutions' );
defined( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_WHITELABEL_LOGO' ) || define( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_WHITELABEL_LOGO', __DIR__ . '/src/assets/dws_logo.svg' );

$wp_upload_dir = wp_get_upload_dir();
defined( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_TEMP_DIR_NAME' ) || define( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_TEMP_DIR_NAME', 'deep-web-solutions' );
defined( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_TEMP_DIR_PATH' ) || define( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_TEMP_DIR_PATH', $wp_upload_dir['basedir'] . DIRECTORY_SEPARATOR . constant( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_TEMP_DIR_NAME' ) . DIRECTORY_SEPARATOR );
defined( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_TEMP_DIR_URL' ) || define( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_TEMP_DIR_URL', $wp_upload_dir['baseurl'] . '/' . dws_wp_framework_get_temp_dir_name() . '/' );

defined( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_WHITELABEL_SUPPORT_EMAIL' ) || define( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_WHITELABEL_SUPPORT_EMAIL', 'support@deep-web-solutions.com' );
defined( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_WHITELABEL_SUPPORT_URL' ) || define( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_WHITELABEL_SUPPORT_URL', 'https://support.deep-web-solutions.com' );

/**
 * Returns the whitelabel name of the framework within the context of the current plugin.
 *
 * @since   1.0.0
 * @version 1.0.0
 *
 * @return  string
 */
function dws_wp_framework_get_whitelabel_name() {
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
function dws_wp_framework_get_whitelabel_logo() {
	return constant( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_WHITELABEL_LOGO' );
}

/**
 * Returns the name of the temp directory within the context of the current plugin.
 *
 * @since   1.0.0
 * @version 1.0.0
 *
 * @return  string
 */
function dws_wp_framework_get_temp_dir_name() {
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
function dws_wp_framework_get_temp_dir_path() {
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
function dws_wp_framework_get_temp_dir_url() {
	return constant( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_TEMP_DIR_URL' );
}

/**
 * Returns the whitelabel support email of the framework within the context of the current plugin.
 *
 * @since   1.0.0
 * @version 1.0.0
 *
 * @return  string
 */
function dws_wp_framework_get_whitelabel_support_email() {
	return constant( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_WHITELABEL_SUPPORT_EMAIL' );
}

/**
 * Returns the whitelabel support URL of the framework within the context of the current plugin.
 *
 * @since   1.0.0
 * @version 1.0.0
 *
 * @return  string
 */
function dws_wp_framework_get_whitelabel_support_url() {
	return constant( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_WHITELABEL_SUPPORT_URL' );
}
