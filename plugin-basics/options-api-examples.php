<?php
/**
 * How to use Options API.
 *
 * @link              https://tassawer.com/
 * @since             1.0.0
 * @package           Plugin_Basics
 *
 * @wordpress-plugin
 * Plugin Name:       Options API Examples
 * Plugin URI:        https://tassawer.com/
 * Description:       Examples demonstrating how to add, update, and delete options using the Options API.
 * Version:           1.0.0
 * Author:            Tassawer Hussain
 * Author URI:        https://tassawer.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt 
 */


// add option
function myplugin_add_option() {

	/*
		add_option(
			string      $option,
			mixed       $value = '',
			string      $deprecated = '',
			string|bool $autoload = 'yes'
		)
	*/
	$option_value = 'Example option value';
	add_option( 'myplugin-option-name', $option_value );

}
// add_action( 'admin_init', 'myplugin_add_option' );



// update option
function myplugin_update_option() {

	/*
		update_option(
			string      $option,
			mixed       $value,
			string|bool $autoload = null
		)
	*/
	$option_value = array( 'option1' => 'val1', 'option2' => 'val2', 'option3' => 'val3' );
	update_option( 'myplugin-option-name', $option_value );

}
// add_action( 'admin_init', 'myplugin_update_option' );


// delete option
function myplugin_delete_option() {

	/*
		delete_option(
			string $option
		)
	*/
	delete_option( 'myplugin-option-name' );

}
// add_action( 'admin_init', 'myplugin_delete_option' );




