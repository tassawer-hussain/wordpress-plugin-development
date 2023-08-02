<?php // WordPress Plugin Development - Settings Callbacks

// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// radio field options
function mylearning_options_radio() {
	
	return array(
		
		'enable'  => esc_html__('Enable custom styles', 'wordpress-plugin-development'),
		'disable' => esc_html__('Disable custom styles', 'wordpress-plugin-development')
		
	);
	
}

// select field options
function mylearning_options_select() {
	
	return array(
		
		'default'   => esc_html__('Default',   'wordpress-plugin-development'),
		'light'     => esc_html__('Light',     'wordpress-plugin-development'),
		'blue'      => esc_html__('Blue',      'wordpress-plugin-development'),
		'coffee'    => esc_html__('Coffee',    'wordpress-plugin-development'),
		'ectoplasm' => esc_html__('Ectoplasm', 'wordpress-plugin-development'),
		'midnight'  => esc_html__('Midnight',  'wordpress-plugin-development'),
		'ocean'     => esc_html__('Ocean',     'wordpress-plugin-development'),
		'sunrise'   => esc_html__('Sunrise',   'wordpress-plugin-development'),
		
	);
	
}

// callback: login section
function mylearning_callback_section_login() {

	echo '<p>'. esc_html__('These settings enable you to customize the WP Login screen.', 'wordpress-plugin-development') .'</p>';

}


// callback: admin section
function mylearning_callback_section_admin() {

	echo '<p>'. esc_html__('These settings enable you to customize the WP Admin Area.', 'wordpress-plugin-development') .'</p>';

}


// callback: text field
function mylearning_callback_field_text( $args ) {

	$options = get_option( 'mylearning_options', mylearning_options_default() );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
	echo '<input id="mylearning_options_'. $id .'" name="mylearning_options['. $id .']" type="text" size="40" value="'. $value .'"><br />';
	echo '<label for="mylearning_options_'. $id .'">'. $label .'</label>';

}


// callback: radio field
function mylearning_callback_field_radio( $args ) {

	$options = get_option( 'mylearning_options', mylearning_options_default() );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$selected_option = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
	$radio_options = mylearning_options_radio();
	
	foreach ( $radio_options as $value => $label ) {
		
		$checked = checked( $selected_option === $value, true, false );
		
		echo '<label><input name="mylearning_options['. $id .']" type="radio" value="'. $value .'"'. $checked .'> ';
		echo '<span>'. $label .'</span></label><br />';
		
	}

}


// callback: textarea field
function mylearning_callback_field_textarea( $args ) {

	$options = get_option( 'mylearning_options', mylearning_options_default() );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$allowed_tags = wp_kses_allowed_html( 'post' );
	
	$value = isset( $options[$id] ) ? wp_kses( stripslashes_deep( $options[$id] ), $allowed_tags ) : '';
	
	echo '<textarea id="mylearning_options_'. $id .'" name="mylearning_options['. $id .']" rows="5" cols="50">'. $value .'</textarea><br />';
	echo '<label for="mylearning_options_'. $id .'">'. $label .'</label>';

}


// callback: checkbox field
function mylearning_callback_field_checkbox( $args ) {

	$options = get_option( 'mylearning_options', mylearning_options_default() );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$checked = isset( $options[$id] ) ? checked( $options[$id], 1, false ) : '';
	
	echo '<input id="mylearning_options_'. $id .'" name="mylearning_options['. $id .']" type="checkbox" value="1"'. $checked .'> ';
	echo '<label for="mylearning_options_'. $id .'">'. $label .'</label>';

}


// callback: select field
function mylearning_callback_field_select( $args ) {

	$options = get_option( 'mylearning_options', mylearning_options_default() );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$selected_option = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
	$select_options = mylearning_options_select();
	
	echo '<select id="mylearning_options_'. $id .'" name="mylearning_options['. $id .']">';
	
	foreach ( $select_options as $value => $option ) {
		
		$selected = selected( $selected_option === $value, true, false );
		
		echo '<option value="'. $value .'"'. $selected .'>'. $option .'</option>';
		
	}
	
	echo '</select> <label for="mylearning_options_'. $id .'">'. $label .'</label>';

}

