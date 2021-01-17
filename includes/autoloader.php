<?php
/**
 * Register plugin classes
 *
 * The autoloader registers plugin classes for later use.
 *
 * @package    BS_Plugin
 * @subpackage Includes
 * @category   Classes
 * @since      1.0.0
 */

namespace BS_Plugin;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Class files
 *
 * Defines the class directories and file prefixes.
 *
 * @since 1.0.0
 * @var   array Defines an array of class file paths.
 */
define( 'BS_CLASS', [
	'core'     => BS_PATH . 'includes/classes/core/class-',
	'settings' => BS_PATH . 'includes/classes/settings/class-',
	'tools'    => BS_PATH . 'includes/classes/tools/class-',
	'media'    => BS_PATH . 'includes/classes/media/class-',
	'users'    => BS_PATH . 'includes/classes/users/class-',
	'vendor'   => BS_PATH . 'includes/classes/vendor/class-',
	'admin'    => BS_PATH . 'includes/classes/backend/class-',
	'front'    => BS_PATH . 'includes/classes/frontend/class-',
	'general'  => BS_PATH . 'includes/classes/class-',
] );

/**
 * Array of classes to register
 *
 * When you add new classes to your version of this plugin you may
 * add them to the following array rather than requiring the file
 * elsewhere. Be sure to include the precise namespace.
 *
 * @since 1.0.0
 * @var   array Defines an array of class files to register.
 */
define( 'BS_CLASSES', [

	// Base class.
	'BS_Plugin\Classes\Base' => BS_CLASS['general'] . 'base.php',

	// Core classes.
	// 'BS_Plugin\Classes\Class' => BS_CLASS['core'] . 'file.php',

	// Settings classes.
	// 'BS_Plugin\Classes\Class' => BS_CLASS['settings'] . 'file.php',

	// Tools classes.
	// 'BS_Plugin\Classes\Class' => BS_CLASS['tools'] . 'file.php',

	// Media classes.
	// 'BS_Plugin\Classes\Class' => BS_CLASS['media'] . 'file.php',

	// Users classes.
	// 'BS_Plugin\Classes\Class' => BS_CLASS['users'] . 'file.php',

	// Vendor classes.
	// 'BS_Plugin\Classes\Class' => BS_CLASS['vendor'] . 'file.php',

	// Backend/admin classes,
	// 'BS_Plugin\Classes\Class' => BS_CLASS['admin'] . 'file.php',

	// Frontend classes.
	// 'BS_Plugin\Classes\Class' => BS_CLASS['front'] . 'file.php',

	// General/miscellaneos classes.
	// 'BS_Plugin\Classes\Class' => BS_CLASS['general'] . 'file.php',

] );

/**
 * Autoload class files
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
spl_autoload_register(
	function ( string $class ) {
		if ( isset( BS_CLASSES[ $class ] ) ) {
			require BS_CLASSES[ $class ];
		}
	}
);
