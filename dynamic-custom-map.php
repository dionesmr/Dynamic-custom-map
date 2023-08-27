<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://dcpi.org
 * @since             1.0.0
 * @package           Dynamic_Custom_Map
 *
 * @wordpress-plugin
 * Plugin Name:       Dynamic Custom Map
 * Plugin URI:        https://https://www.linkedin.com/in/diones-ramos-6a0616128/
 * Description:       A custom dynamic map based on CPT
 * Version:           1.0.0
 * Author:            Diones Ramos
 * Author URI:        https://dcpi.org
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       dynamic-custom-map
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'DYNAMIC_CUSTOM_MAP_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-dynamic-custom-map-activator.php
 */
function activate_dynamic_custom_map() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-dynamic-custom-map-activator.php';
	Dynamic_Custom_Map_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-dynamic-custom-map-deactivator.php
 */
function deactivate_dynamic_custom_map() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-dynamic-custom-map-deactivator.php';
	Dynamic_Custom_Map_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_dynamic_custom_map' );
register_deactivation_hook( __FILE__, 'deactivate_dynamic_custom_map' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-dynamic-custom-map.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_dynamic_custom_map() {

	$plugin = new Dynamic_Custom_Map();
	$plugin->run();

}
run_dynamic_custom_map();
