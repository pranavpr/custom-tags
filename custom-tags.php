<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://pranavprakash.net
 * @since             1.0.0
 * @package           Custom_Tags
 *
 * @wordpress-plugin
 * Plugin Name:       Custom Tags
 * Plugin URI:        http://pranavprakash.net
 * Description:       Fetches tag from custom API.
 * Version:           1.0.0
 * Author:            Pranav Prakash
 * Author URI:        http://pranavprakash.net
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       custom-tags
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-custom-tags-activator.php
 */
function activate_custom_tags() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-custom-tags-activator.php';
	Custom_Tags_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-custom-tags-deactivator.php
 */
function deactivate_custom_tags() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-custom-tags-deactivator.php';
	Custom_Tags_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_custom_tags' );
register_deactivation_hook( __FILE__, 'deactivate_custom_tags' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-custom-tags.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_custom_tags() {

	$plugin = new Custom_Tags();
	$plugin->run();

}
run_custom_tags();
