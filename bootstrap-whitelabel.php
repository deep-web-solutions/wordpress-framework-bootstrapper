<?php

namespace DeepWebSolutions\Framework;

defined( 'ABSPATH' ) || exit;

// Make sure that the whitelabel options are defined. If not, set the defaults.
defined( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_WHITELABEL_NAME' ) || define( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_WHITELABEL_NAME', 'Deep Web Solutions' );
defined( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_WHITELABEL_LOGO' ) || define( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_WHITELABEL_LOGO', __DIR__ . '/src/assets/dws_logo.svg' );

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
