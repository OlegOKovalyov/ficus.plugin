<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://ficus.plugin/
 * @since      1.0.0
 *
 * @package    Ficus_Films_Btn
 * @subpackage Ficus_Films_Btn/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Ficus_Films_Btn
 * @subpackage Ficus_Films_Btn/includes
 * @author     Oleg Kovalyov <koa2003@ukr.net>
 */
class Ficus_Films_Btn_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'ficus-films-btn',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
