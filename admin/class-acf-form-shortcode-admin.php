<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/jonathan-dejong
 * @since      1.0.0
 *
 * @package    Acf_Form_Shortcode
 * @subpackage Acf_Form_Shortcode/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Acf_Form_Shortcode
 * @subpackage Acf_Form_Shortcode/admin
 * @author     Jonathan de Jong <jonathan@tigerton.se>
 */
class Acf_Form_Shortcode_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}


	/**
	 * Our main shortcode function
	 * Outputs the acf_form (or rather returns it)
	 *
	 * @since	1.0.0
	 */
	public function show_acf_form( $options ){

		/**
		 * Setup form arguments
		 */
		$options = shortcode_atts( array(

			/* (string) Unique identifier for the form. Defaults to 'acf-form' */
			'id' => 'acf-form',

			/* (int|string) The post ID to load data from and save data to. Defaults to the current post ID.
			Can also be set to 'new_post' to create a new post on submit */
			'post_id' => false,

			/* (array) An array of post data used to create a post. See wp_insert_post for available parameters.
			The above 'post_id' setting must contain a value of 'new_post' */
			'new_post' => false,

			/* (array) An array of field group IDs/keys to override the fields displayed in this form */
			'field_groups' => false,

			/* (array) An array of field IDs/keys to override the fields displayed in this form */
			'fields' => false,

			/* (boolean) Whether or not to show the post title text field. Defaults to false */
			'post_title' => false,

			/* (boolean) Whether or not to show the post content editor field. Defaults to false */
			'post_content' => false,

			/* (boolean) Whether or not to create a form element. Useful when a adding to an existing form. Defaults to true */
			'form' => true,

			/* (array) An array or HTML attributes for the form element */
			'form_attributes' => array(),

			/* (string) The URL to be redirected to after the form is submit. Defaults to the current URL with a GET parameter '?updated=true'.
			A special placeholder '%post_url%' will be converted to post's permalink (handy if creating a new post) */
			'return' => '?updated=true',

			/* (string) Extra HTML to add before the fields */
			'html_before_fields' => '',

			/* (string) Extra HTML to add after the fields */
			'html_after_fields' => '',

			/* (string) The text displayed on the submit button */
			'submit_value' => __("Update", 'acf'),

			/* (string) A message displayed above the form after being redirected. Can also be set to false for no message */
			'updated_message' => __("Post updated", 'acf'),

			/* (string) Determines where field labels are places in relation to fields. Defaults to 'top'.
			Choices of 'top' (Above fields) or 'left' (Beside fields) */
			'label_placement' => 'top',

			/* (string) Determines where field instructions are places in relation to fields. Defaults to 'label'.
			Choices of 'label' (Below labels) or 'field' (Below fields) */
			'instruction_placement' => 'label',

			/* (string) Determines element used to wrap a field. Defaults to 'div'
			Choices of 'div', 'tr', 'td', 'ul', 'ol', 'dl' */
			'field_el' => 'div',

			/* (string) Whether to use the WP uploader or a basic input for image and file fields. Defaults to 'wp'
			Choices of 'wp' or 'basic'. Added in v5.2.4 */
			'uploader' => 'wp',

			/* (boolean) Whether to include a hidden input field to capture non human form submission. Defaults to true. Added in v5.3.4 */
			'honeypot' => true

		), $options, 'show_acf_form' );


		/**
		 * Reformat all arrays back to being actual arrays
		 */

		$options['field_groups'] = ( $options['field_groups'] ? explode(',', $options['field_groups']) : $options['field_groups'] );
		$options['fields'] = ( $options['fields'] ? explode(',', $options['fields']) : $options['fields'] );

		/**
		 * Fix associative arrays
		 */

		$options['form_attributes'] = ( $options['form_attributes'] ? explode(',', $options['form_attributes']) : $options['form_attributes'] );
		if( is_array($options['form_attributes']) ){
			foreach ( $options['form_attributes'] as $key => $value ){
				$pair = explode('|', $value);
				if( count($pair) > 1 ){
					unset($options['form_attributes'][$key]);
					$options['form_attributes'][$pair[0]] = $pair[1];

				}

			}

		}

		$options['new_post'] = ( $options['new_post'] ? explode(',', $options['new_post']) : $options['new_post'] );
		if( is_array($options['new_post']) ){
			foreach ( $options['new_post'] as $key => $value ){
				$pair = explode('|', $value);
				if( count($pair) > 1 ){
					unset($options['new_post'][$key]);
					$options['new_post'][$pair[0]] = $pair[1];

				}

			}

		}

		/**
		 * Output acf form to buffer and then return it for the shortcode
		 */
		ob_start();
		acf_form($options);
		$form = ob_get_clean();
		return $form;

	}

}
