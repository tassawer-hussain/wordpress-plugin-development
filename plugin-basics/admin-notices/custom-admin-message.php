<?php

// display admin notices
function myplugin_admin_notices() {

	// get the current screen
	$screen = get_current_screen();

	// return if not myplugin settings page
	if ( $screen->id !== 'toplevel_page_myplugin' ) return;

	// check if settings updated
	if ( isset( $_GET[ 'settings-updated' ] ) ) {
		
		// if settings updated successfully
		if ( 'true' === $_GET[ 'settings-updated' ] ) : 
		
		?>
			
			<div class="notice notice-success is-dismissible">
				<p><strong><?php _e( 'Congratulations, you are awesome!', 'myplugin' ); ?></strong></p>
			</div>
			
		<?php 
		
		// if there is an error.
		else : 
		
		?>
			
			<div class="notice notice-error is-dismissible">
				<p><strong><?php _e( 'Houston, we have a problem.', 'myplugin' ); ?></strong></p>
			</div>
			
		<?php 
		
		endif;
		
	}

}
add_action( 'admin_notices', 'myplugin_admin_notices' );


