<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://frydigital.com
 * @since             1.0.0
 * @package           Sos_Modal
 *
 * @wordpress-plugin
 * Plugin Name:       SOS Modal
 * Plugin URI:        https://frydigital.com/plugins/sos-modal
 * Description:       Slide Out Search (SOS) Modal is a simple search button that activates full screen modal search functionality.
 * Version:           1.0.2
 * Author:            Shaun Fry
 * Author URI:        https://frydigital.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sos-modal
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
define( 'SOS_MODAL_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-sos-modal-activator.php
 */
function activate_sos_modal() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sos-modal-activator.php';
	Sos_Modal_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-sos-modal-deactivator.php
 */
function deactivate_sos_modal() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sos-modal-deactivator.php';
	Sos_Modal_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_sos_modal' );
register_deactivation_hook( __FILE__, 'deactivate_sos_modal' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-sos-modal.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_sos_modal() {

	$plugin = new Sos_Modal();
	$plugin->run();

}
run_sos_modal();

/**
 * 
 * Plugin update checker
 * 
 * Check for Github version release and update
 * https://github.com/YahnisElsts/plugin-update-checker
 * 
 * @since	1.0.0
 */

require 'plugin-update-checker/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$myUpdateChecker = PucFactory::buildUpdateChecker(
	'https://github.com/fryshaun/wp-sos-modal/',
	__FILE__,
	'wp-sos-modal'
);

//Set the branch that contains the stable release.
$myUpdateChecker->setBranch('master');

//Optional: If you're using a private repository, specify the access token like this:
//$myUpdateChecker->setAuthentication('your-token-here');