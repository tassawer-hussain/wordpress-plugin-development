<?php
/**
 * How to create Custom Post Type.
 *
 * @link              https://tassawer.com/
 * @since             1.0.0
 * @package           Plugin_Basics
 *
 * @wordpress-plugin
 * Plugin Name:       Custom Post Type Example
 * Plugin URI:        https://tassawer.com/
 * Description:       Example demonstrating how to add a Custom Post Type via plugin.
 * Version:           1.0.0
 * Author:            Tassawer Hussain
 * Author URI:        https://tassawer.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt 
 */



// add custom post type
function myplugin_add_custom_post_type() {

	/*
		register_post_type(
			string       $post_type,
			array|string $args = array()
		)

		For a list of $args, check out:
		https://developer.wordpress.org/reference/functions/register_post_type/

	*/

	$args = array(
		'labels'             => array( 'name' => 'Movies' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'movie' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    );

	register_post_type( 'movie', $args );

}
add_action( 'init', 'myplugin_add_custom_post_type' );


