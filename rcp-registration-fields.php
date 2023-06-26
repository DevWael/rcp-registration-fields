<?php
/**
 * Plugin Name: RCP Registration Fields
 * Plugin URI: https://github.com/devwael/rcp-registration-fields
 * Description: Add custom fields to the RCP registration form.
 * Version: 1.0.0
 * Author: Ahmad Wael
 * Author URI: https://github.com/devwael
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: rcp-registration-fields
 */

namespace Devwael\RcpRegistrationFields;

/**
 * Check if loaded inside a WordPress environment.
 */
defined( '\ABSPATH' ) || exit;

/**
 * Load composer packages
 */
$rcprf_auto_load = plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';
if ( ! class_exists( Main::class ) && is_readable( $rcprf_auto_load ) ) {
	// check if the Main plugin class is loaded.
	// @noinspection PhpIncludeInspection.
	require_once $rcprf_auto_load;
}

/**
 * Create instance from the main plugin class
 */
class_exists( Main::class ) && Main::instance();
