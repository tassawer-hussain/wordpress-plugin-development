<?php // WordPress Plugin Development - Settings Page

// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// display the plugin settings page
function wpd_display_settings_page() {
	
	// check if user is allowed access
	if ( ! current_user_can( 'manage_options' ) ) return;
	
	?>
	
	<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		
		<!-- Either use this function to display the admin notices or add an action_hook for it -->
		<!-- This function use default messages. For custom admin notices, we must add the action_hook and remove this function call. -->
		<!-- add_action( 'admin_notices', 'mylearning_admin_notices' ); -->
		<?php // settings_errors(  ); ?>
		<form action="options.php" method="post">
			
			<?php
			
			// output security fields
			settings_fields( 'mylearning_options' ); // string $option_group
			
			// output setting sections
			do_settings_sections( 'mylearning' ); // string $page
			
			// submit button
			submit_button();
			
			?>
			
		</form>
	</div>
	
	<?php
	
}


// display admin notices
function mylearning_admin_notices() {

	// get the current screen
	$screen = get_current_screen();

	// return if not mylearning settings page
	// $screen->id -> 'toplevel_page_' . SLUG_OF_ADMIN_PAGE
	if ( $screen->id !== 'toplevel_page_mylearning' ) return;

	// check if settings updated
	if ( isset( $_GET[ 'settings-updated' ] ) ) {
		
		// if settings updated successfully
		if ( 'true' === $_GET[ 'settings-updated' ] ) : 
		
		?>
			
			<div class="notice notice-success is-dismissible">
				<p><strong><?php _e( 'Congratulations, you are awesome!', 'mylearning' ); ?></strong></p>
			</div>
			
		<?php 
		
		// if there is an error
		else : 
		
		?>
			
			<div class="notice notice-error is-dismissible">
				<p><strong><?php _e( 'Houston, we have a problem.', 'mylearning' ); ?></strong></p>
			</div>
			
		<?php 
		
		endif;
		
	}

}
add_action( 'admin_notices', 'mylearning_admin_notices' );


