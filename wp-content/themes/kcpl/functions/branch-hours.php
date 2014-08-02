<?php
class KCPL_branch_info extends WP_Widget {
	//register widget
	function __construct() {
		parent::__construct(
			'KCPL_branch_info', // Base ID
			__('Branch Info', 'text_domain'), // Name
			array( 'description' => __( 'Widget for branch information in footer')) // Args
		);
	}

	//Display
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );

    //before widget
		echo $args['before_widget'];

    //title
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

    //content
		echo __( 'Hello, World!');

    //after widget
		echo $args['after_widget'];
	}

	//widget form
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title');
		}
		?>
		<p>
  		<label for="<?php echo $this->get_field_id( 'title' ); ?>">Branch Name</label>
  		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
    <p>
      <label for="hours">Hours</label><br>
      <span>Open: </span><input class="widefat" id="open" name="open" type="time" value=""><br>
      <span>Close: </span><input class="widefat" id="close" name="close" type="time" value=""><br>
    </p>
    <p>
      <label for="address">Address</label><br>
      <textarea rows="4" id="address" name="address"></textarea>
    </p>
		<?php
	}

	//sanitize inputs
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

}

// register KCPL_branch_info widget
function register_KCPL_branch_info() {
    register_widget( 'KCPL_branch_info' );
}
add_action( 'widgets_init', 'register_KCPL_branch_info' );
