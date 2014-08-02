<?php
class KCPL_branch_info extends WP_Widget{
	//register widget
	function __construct(){
		parent::__construct(
			'KCPL_branch_info', // Base ID
			__('KCPL Branch Info', 'text_domain'), // Name
			array('description' => __('Branch information for footer')) // Args
		);
	}

	//Display
	public function widget($args,$instance){
		$title = apply_filters('widget_title',$instance['title']);
    $open = $instance['open'];
    $close = $instance['close'];
    $address = $instance['address'];

    //check time
    date_default_timezone_set(get_option('timezone_string'));
    $curTime = date('G:i');
    if($curTime > $open && $curTime < $close){
      $flag = 'Open Now';
      $class='open';
    }else{
      $flag = 'Closed Now';
      $class='closed';
    }

    //before widget
		echo $args['before_widget'];

    //output
    echo "<div class='footer-location-widget'>";
    if (!empty($title)){
      echo $args['before_title'] . $title . $args['after_title'];
    }
    echo   "<div class='hour-cont'>
              <span class='hours'>Hours</span> <span class='$class'>$flag</span>
            </div>
            <span class='address'>$address</span>
          </div>";

    //after widget
		echo $args['after_widget'];
	}

	//widget form
	public function form($instance){
		if(isset($instance['title'])){
			$title   = $instance['title'];
      $open    = $instance['open'];
      $close   = $instance['close'];
      $address = $instance['address'];
		}else{
			$title = __('New title');
		}
		?>
		<p>
  		<label for="<?php echo $this->get_field_id('title'); ?>">Branch Name</label>
  		<input class="widefat KCPL_branch_info-text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
		</p>
    <p>
      <label for="<?php echo $this->get_field_id('hours'); ?>">Hours</label><br>
      <span><em>Open:</em> </span><input class="widefat KCPL_branch_info-time" id="<?php echo $this->get_field_id('open'); ?>" name="<?php echo $this->get_field_name('open'); ?>" type="time" value="<?php echo esc_attr($open); ?>"><br>
      <span><em>Close:</em> </span><input class="widefat KCPL_branch_info-time" id="<?php echo $this->get_field_id('close'); ?>" name="<?php echo $this->get_field_name('close'); ?>" type="time" value="<?php echo esc_attr($close); ?>"><br>
    </p>
    <p>
      <label for="address">Address</label><br>
      <textarea class="widefat KCPL_branch_info-textarea" rows="4" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>"><?php echo esc_attr($address); ?></textarea>
    </p>
		<?php
	}

	//sanitize inputs
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']):'';
    $instance['open'] = (!empty($new_instance['open'])) ? strip_tags($new_instance['open']):'';
    $instance['close'] = (!empty($new_instance['close'])) ? strip_tags($new_instance['close']):'';
    $instance['address'] = (!empty($new_instance['address'])) ? strip_tags($new_instance['address']):'';

		return $instance;
	}

}

// register KCPL_branch_info widget
function register_KCPL_branch_info() {
    register_widget( 'KCPL_branch_info' );
}
add_action( 'widgets_init', 'register_KCPL_branch_info' );
