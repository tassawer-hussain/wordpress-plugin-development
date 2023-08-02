<?php
/**
 * How to create Csutom Taxonomy.
 *
 * @link              https://tassawer.com/
 * @since             1.0.0
 * @package           Plugin_Basics
 *
 * @wordpress-plugin
 * Plugin Name:       Custom Taxonomy Example
 * Plugin URI:        https://tassawer.com/
 * Description:       Example demonstrating how to add a Custom Taxonomy via plugin.
 * Version:           1.0.0
 * Author:            Tassawer Hussain
 * Author URI:        https://tassawer.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt 
 */

// add custom taxonomy
function myplugin_add_custom_taxonomy() {

	/*
		register_taxonomy(
			string       $taxonomy,
			array|string $object_type,
			array|string $args = array()
		)

		For a list of $args, check out:
		https://developer.wordpress.org/reference/functions/register_taxonomy/

	*/

	$args = array(
		'labels'            => array( 'name' => 'Art' ),
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
	);

	register_taxonomy( 'art', 'post', $args );

}
add_action( 'init', 'myplugin_add_custom_taxonomy' );


