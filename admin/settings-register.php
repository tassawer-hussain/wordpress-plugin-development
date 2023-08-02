<?php // WordPress Plugin Development - Register Settings

// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// register plugin settings
function mylearning_register_settings() {

	// Step 1 - Register the settings
	register_setting(
		'mylearning_options',					// string   $option_group, MUST be same with settings_fields( 'mylearning_options' ); parameter.
		'mylearning_options',					// string   $option_name, All settings saved in DB against this option name in wp_options table.
		'mylearning_callback_validate_options'	// callable $sanitize_callback = ''
	);

	// Step 2 - Register the section.
	add_settings_section(
		'mylearning_section_login',				// string   $id, - Section unique ID
		esc_html__('Customize Login Page', 'wordpress-plugin-development'), 					// string   $title, - Title of the section
		'mylearning_callback_section_login',	// callable $callback, - Function to display the section descriptions.
		'mylearning'							// string   $page - Menu/Submenu page slug. - Must be same with add_submenu_page slug parameter.
	);

	// Step 3 - Add fields to the section. Can be add any number of fields. - Added 4 fields.
	add_settings_field(
		'custom_url',					// string   $id, - Unique ID for each field- Access value using this ID as array index of option_name
		esc_html__('Custom URL', 'wordpress-plugin-development'),					// string   $title, - Title of the field
		'mylearning_callback_field_text',	// callable $callback, - Function used to define the HTML markup for this field.
		'mylearning',						// string   $page, - Where this filed will be appear.
		'mylearning_section_login',			// string   $section = 'default', - Section of the page from which this field belong.
		[ 'id' => 'custom_url', 'label' => esc_html__('Custom URL for the login logo link', 'wordpress-plugin-development')  ] // array    $args = [] - Args pass to the callback function.
	);

	add_settings_field(
		'custom_title',
		esc_html__('Custom Title', 'wordpress-plugin-development'),
		'mylearning_callback_field_text',
		'mylearning',
		'mylearning_section_login',
		[ 'id' => 'custom_title', 'label' => esc_html__('Custom title attribute for the logo link', 'wordpress-plugin-development') ]
	);

	add_settings_field(
		'custom_style',
		esc_html__('Custom Style', 'wordpress-plugin-development'),
		'mylearning_callback_field_radio',
		'mylearning',
		'mylearning_section_login',
		[ 'id' => 'custom_style', 'label' => esc_html__('Custom CSS for the Login screen', 'wordpress-plugin-development') ]
	);

	add_settings_field(
		'custom_message',
		esc_html__('Custom Message', 'wordpress-plugin-development'),
		'mylearning_callback_field_textarea',
		'mylearning',
		'mylearning_section_login',
		[ 'id' => 'custom_message', 'label' => esc_html__('Custom text and/or markup', 'wordpress-plugin-development') ]
	);

	// Step 2 - Repeat - Register another section.
	add_settings_section(
		'mylearning_section_admin',
		esc_html__('Customize Admin Area', 'wordpress-plugin-development'), 
		'mylearning_callback_section_admin',
		'mylearning'
	);

	// Step 3 - Repeat - Add fields to second section. We can add any number of sections to any settings page with any number of fields.
	add_settings_field(
		'custom_footer',
		esc_html__('Custom Footer', 'wordpress-plugin-development'),
		'mylearning_callback_field_text',
		'mylearning',
		'mylearning_section_admin',
		[ 'id' => 'custom_footer', 'label' => esc_html__('Custom footer text', 'wordpress-plugin-development') ]
	);

	add_settings_field(
		'custom_toolbar',
		esc_html__('Custom Toolbar', 'wordpress-plugin-development'),
		'mylearning_callback_field_checkbox',
		'mylearning',
		'mylearning_section_admin',
		[ 'id' => 'custom_toolbar', 'label' => esc_html__('Remove new post and comment links from the Toolbar', 'wordpress-plugin-development') ]
	);

	add_settings_field(
		'custom_scheme',
		esc_html__('Custom Scheme', 'wordpress-plugin-development'),
		'mylearning_callback_field_select',
		'mylearning',
		'mylearning_section_admin',
		[ 'id' => 'custom_scheme', 'label' => esc_html__('Default color scheme for new users', 'wordpress-plugin-development') ]
	);

}
add_action( 'admin_init', 'mylearning_register_settings' );


