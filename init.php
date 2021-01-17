<?php
/**
 * Initialize plugin functionality
 *
 * @package    BS_Plugin
 * @subpackage Init
 * @category   Core
 * @since      1.0.0
 */

namespace BS_Plugin;

// Alias namespaces.
use
BS_Plugin\Classes          as Classes,
BS_Plugin\Classes\Core     as Core,
BS_Plugin\Classes\Settings as Settings,
BS_Plugin\Classes\Tools    as Tools,
BS_Plugin\Classes\Media    as Media,
BS_Plugin\Classes\Users    as Users,
BS_Plugin\Classes\Admin    as Admin,
BS_Plugin\Classes\Front    as Front,
BS_Plugin\Classes\Vendor   as Vendor;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Load plugin text domain
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function text_domain() {

	// Standard plugin installation.
	load_plugin_textdomain(
		BS_CONFIG['domain'],
		false,
		dirname( BS_BASENAME ) . '/languages'
	);

	// If this is in the must-use plugins directory.
	load_muplugin_textdomain(
		BS_CONFIG['domain'],
		dirname( BS_BASENAME ) . '/languages'
	);
}

/**
 * Core plugin function
 *
 * Loads and runs PHP classes.
 * Removes unwanted features.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function bs_plugin() {

	// Load text domain. Hook to `init` rather than `plugins_loaded`.
	add_action( 'init', __NAMESPACE__ . '\text_domain' );

	/**
	 * Class autoloader
	 *
	 * The autoloader registers plugin classes for later use,
	 * such as running new instances below.
	 */
	require_once BS_PATH . 'includes/autoloader.php';
}

// Run the plugin.
bs_plugin();
