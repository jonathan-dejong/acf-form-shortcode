<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/jonathan-dejong
 * @since             1.0.0
 * @package           Acf_Form_Shortcode
 *
 * @wordpress-plugin
 * Plugin Name:       ACF Form Shortcode
 * Plugin URI:        https://tigerton.se
 * Description:       Creates a shortcode for the acf_form() function to be used in the content editor
 * Version:           1.0.0
 * Author:            Jonathan de Jong
 * Author URI:        https://github.com/jonathan-dejong
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       acf-form-shortcode
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-acf-form-shortcode-activator.php
 */
function activate_acf_form_shortcode() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-acf-form-shortcode-activator.php';
	Acf_Form_Shortcode_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-acf-form-shortcode-deactivator.php
 */
function deactivate_acf_form_shortcode() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-acf-form-shortcode-deactivator.php';
	Acf_Form_Shortcode_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_acf_form_shortcode' );
register_deactivation_hook( __FILE__, 'deactivate_acf_form_shortcode' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-acf-form-shortcode.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_acf_form_shortcode() {

	$plugin = new Acf_Form_Shortcode();
	$plugin->run();

}
run_acf_form_shortcode();
