<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://dcpi.org
 * @since      1.0.0
 *
 * @package    Dynamic_Custom_Map
 * @subpackage Dynamic_Custom_Map/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Dynamic_Custom_Map
 * @subpackage Dynamic_Custom_Map/includes
 * @author     Diones Ramos <dionesmenqui@dcpi.org>
 */
class Dynamic_Custom_Map_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'dynamic-custom-map',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
