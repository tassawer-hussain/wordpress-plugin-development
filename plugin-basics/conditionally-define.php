<?php
/**
 * Usage of Conditional Tags in defining the functions, classess and code block.
 *
 * @link              https://tassawer.com/
 * @since             1.0.0
 * @package           Plugin_Basics
 *
 * @wordpress-plugin
 * Plugin Name:       Conditions Example
 * Plugin URI:        https://tassawer.com/
 * Description:       Example demonstrating how to declare code block conditionally to avoid conflict.
 * Version:           1.0.0
 * Author:            Tassawer Hussain
 * Author URI:        https://tassawer.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       conditionally-define
 */


// example: conditional loading - On only admin faces pages.
if ( is_admin() ) {
	require_once( dir_name( __FILE__ ) . '/admin/do-stuff.php' );
}


// example: check if function exists
if ( function_exists( 'myplugin_customize_something' ) ) {

	function myplugin_customize_something() {
  		// do stuff
  	}

}


// example: OOP
if ( ! class_exists( 'Example_Plugin' ) ) {

	class Example_Plugin {

		public static function init() {
			// do stuff..
		}
		public static function register() {
			// do stuff..
		}
		public static function modify() {
			// do stuff..
		}

	}

	Example_Plugin::init();
	Example_Plugin::register();
	Example_Plugin::modify();

}
