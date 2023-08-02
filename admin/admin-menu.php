<?php // WordPress Plugin Development - Admin Menu

// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


function wpd_add_admin_menu() {
	
	
	// add top-level administrative menu
	// Menu pages added as top level menu will not render the admin notices of saving the options.
	// We need to call the settings_error() function on menu page markup after the page title.
	add_menu_page(
		esc_html__( 'MyLearning Settings', 'wordpress-plugin-development'),			// string   $page_title, 
		esc_html__( 'MyLearning', 'wordpress-plugin-development'),					// string   $menu_title, 
		'manage_options',															// string   $capability,
		'mylearning',																// string   $menu_slug, 
		'wpd_display_settings_page',												// callable $function = '', 
		'dashicons-admin-generic', 													// string   $icon_url = '', 
		null 																		// int      $position = null 
	);
	

	/*
	// add sub-level administrative menu
	// Menu pages added under the settings page, automatically maange the admin notices.
	add_submenu_page(
		'options-general.php',														// string   $parent_slug,
		esc_html__( 'MyLearning Settings', 'wordpress-plugin-development'),			// string   $page_title,
		esc_html__( 'MyLearning', 'wordpress-plugin-development'),					// string   $menu_title,
		'manage_options',															// string   $capability,
		'mylearning',																// string   $menu_slug,
		'wpd_display_settings_page'													// callable $function = ''
	);
	*/

}
add_action( 'admin_menu', 'wpd_add_admin_menu' );
