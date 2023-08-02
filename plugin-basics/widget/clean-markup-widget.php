<?php
/**
 * How to create a widget.
 *
 * @link              https://tassawer.com/
 * @since             1.0.0
 * @package           Plugin_Basics
 *
 * @wordpress-plugin
 * Plugin Name:       Clean Markup Widget
 * Plugin URI:        https://tassawer.com/
 * Description:       Add clean, well-formatted markup to any widgetized area.
 * Version:           1.0.0
 * Author:            Tassawer Hussain
 * Author URI:        https://tassawer.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       clean-markup-widget
 */


// widget example: clean markup
class Clean_Markup_Widget extends WP_Widget {

	public function __construct() {

		$id = 'clean_markup_widget';

		$title = esc_html__('Clean Markup Widget', 'custom-widget');

		$options = array(
			'classname' => 'clean-markup-widget',
			'description' => esc_html__('Adds clean markup that is not modified by WordPress.', 'custom-widget')
		);

		parent::__construct( $id, $title, $options );

	}

	public function widget( $args, $instance ) {

		/**
		 * extract( $args );
		 * 
		 * Contains the following variables.
		 * - $name			// Sidebar Name
		 * - $id			// Sidebar ID where this widget is active
		 * - $description	// Sidebar description.
		 * - $class
		 * - $before_widget
		 * - $after_widget
		 * - $before_title
		 * - $after_title
		 * - $before_sidebar
		 * - $after_sidebar
		 * - $show_in_rest
		 * - $widget_id
		 * - $widget_name
		 * 
		 */

		$markup = '';

		if ( isset( $instance['markup'] ) ) {

			echo wp_kses_post( $instance['markup'] );

		}

	}

	public function update( $new_instance, $old_instance ) {

		$instance = array();

		// Update field 1.
		if ( isset( $new_instance['markup'] ) && ! empty( $new_instance['markup'] ) ) {
			$instance['markup'] = $new_instance['markup'];
		}

		// Update field 2.
		if ( isset( $new_instance['markup_2'] ) && ! empty( $new_instance['markup_2'] ) ) {
			$instance['markup_2'] = $new_instance['markup_2'];
		}

		return $instance;

	}

	public function form( $instance ) {

		// These variables use for the field markup. - Field 1
		$id = $this->get_field_id( 'markup' );
		$for = $this->get_field_id( 'markup' );
		$name = $this->get_field_name( 'markup' );
		$label = __( 'Markup/text:', 'custom-widget' );

		$markup = '<p>'. __( 'Clean markup.', 'custom-widget' ) .'</p>';

		if ( isset( $instance['markup'] ) && ! empty( $instance['markup'] ) ) {
			$markup = $instance['markup'];
		}
		?>

		<p>
			<label for="<?php echo esc_attr( $for ); ?>"><?php echo esc_html( $label ); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $name ); ?>"><?php echo esc_textarea( $markup ); ?></textarea>
		</p>

		<?php
		// These variables use for the field markup. - Field 2
		$id = $this->get_field_id( 'markup_2' );
		$for = $this->get_field_id( 'markup_2' );
		$name = $this->get_field_name( 'markup_2' );
		$label = __( 'Markup/text:', 'custom-widget' );

		$markup = '<p>'. __( 'Clean markup.', 'custom-widget' ) .'</p>';

		if ( isset( $instance['markup_2'] ) && ! empty( $instance['markup_2'] ) ) {
			$markup = $instance['markup_2'];
		}
		?>

		<p>
			<label for="<?php echo esc_attr( $for ); ?>"><?php echo esc_html( $label ); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $name ); ?>"><?php echo esc_textarea( $markup ); ?></textarea>
		</p>

<?php }

}

// register widget
function myplugin_register_widgets() {

	register_widget( 'Clean_Markup_Widget' );

}
add_action( 'widgets_init', 'myplugin_register_widgets' );
