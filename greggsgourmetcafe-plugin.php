<?php
/**
 * Plugin Name:       Gregg's Gourmet Cafe Plugin
 * Description:       Shortcodes for Gregg's Gourmet Cafe website
 * Version:           1.0.0
 * Author:            Matt Crandell
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Define global constants.
 *
 * @since 1.0.0
 */
// Plugin version.
if ( ! defined( 'ABS_VERSION' ) ) {
	define( 'ABS_VERSION', '2.0.0' );
}

if ( ! defined( 'ABS_NAME' ) ) {
	define( 'ABS_NAME', trim( dirname( plugin_basename( __FILE__ ) ), '/' ) );
}

if ( ! defined( 'ABS_DIR' ) ) {
	define( 'ABS_DIR', WP_PLUGIN_DIR . '/' . ABS_NAME );
}

if ( ! defined( 'ABS_URL' ) ) {
	define( 'ABS_URL', WP_PLUGIN_URL . '/' . ABS_NAME );
}

/**
 * Bootstrap Breadcrumb.
 *
 * @since 1.0.0
 */
if ( file_exists( ABS_DIR . '/shortcode/shortcode-bootstrap-breadcrumbs.php' ) ) {
	require_once( ABS_DIR . '/shortcode/shortcode-bootstrap-breadcrumbs.php' );
}

/**
 * Child Pages.
 *
 * @since 1.0.0
 */
if ( file_exists( ABS_DIR . '/shortcode/shortcode-child-pages.php' ) ) {
	require_once( ABS_DIR . '/shortcode/shortcode-child-pages.php' );
}