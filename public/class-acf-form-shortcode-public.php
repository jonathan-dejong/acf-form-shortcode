<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/jonathan-dejong
 * @since      1.0.0
 *
 * @package    Acf_Form_Shortcode
 * @subpackage Acf_Form_Shortcode/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Acf_Form_Shortcode
 * @subpackage Acf_Form_Shortcode/public
 * @author     Jonathan de Jong <jonathan@tigerton.se>
 */
class Acf_Form_Shortcode_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}


	/**
	 * Enqueues acf_form_header() if the shortcode can be found in the_content
	 *
	 * @since	1.0.0
	 */
	public function enqueue_acf_form(){

		if( is_admin() )
			return;

		global $post;
		if( has_shortcode( $post->post_content, 'show_acf_form' ) ){
			acf_form_head();

		}

	}


	/**
	 * Runs ACF Through kses to avoid XSS hacks
	 *
	 * @since	1.0.0
	 */
	public function acf_kses_post( $value ){
		// is array
		if( is_array($value) ) {
			return array_map(array($this, 'acf_kses_post'), $value);

		}

		// return
		return wp_kses_post( $value );

	}


}
