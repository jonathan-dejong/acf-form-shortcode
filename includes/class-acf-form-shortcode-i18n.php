<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/jonathan-dejong
 * @since      1.0.0
 *
 * @package    Acf_Form_Shortcode
 * @subpackage Acf_Form_Shortcode/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Acf_Form_Shortcode
 * @subpackage Acf_Form_Shortcode/includes
 * @author     Jonathan de Jong <jonathan@tigerton.se>
 */
class Acf_Form_Shortcode_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'acf-form-shortcode',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
