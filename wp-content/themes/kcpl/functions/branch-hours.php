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
    $page_link = $instance['page_link'];
    $mon_open    = $instance['mon_open'];
    $mon_close   = $instance['mon_close'];
    $tues_open    = $instance['tues_open'];
    $tues_close   = $instance['tues_close'];
    $wed_open    = $instance['wed_open'];
    $wed_close   = $instance['wed_close'];
    $thurs_open    = $instance['thurs_open'];
    $thurs_close   = $instance['thurs_close'];
    $fri_open    = $instance['fri_open'];
    $fri_close   = $instance['fri_close'];
    $sat_open    = $instance['sat_open'];
    $sat_close   = $instance['sat_close'];
    $address = $instance['address'];
    $phone = $instance['phone'];

    //check time
    date_default_timezone_set(get_option('timezone_string'));
    $curTime = date('H:i');
    $curDay = date('w');


    switch ($curDay) {
      case 0: //Sunday
          $open = 0;
          $close = 0;
          break;
      case 1: //Monday
          $open = $mon_open;
          $close = $mon_close;
          break;
      case 2: //Tuesday
          $open = $tues_open;
          $close = $tues_close;
          break;
      case 3: //Wednesday
          $open = $wed_open;
          $close = $wed_close;
          break;
      case 4: //Thursday
          $open = $thurs_open;
          $close = $thurs_close;
          break;
      case 5: //Friday
          $open = $fri_open;
          $close = $fri_close;
          break;
      case 6: //Saturday
          $open = $sat_open;
          $close = $sat_close;
          break;
    }

 

    if($curTime > $open && $curTime < $close){
      $flag = 'Open Now';
      $class='open';
    }else{
      $flag = 'Closed Now';
      $class='closed';
    }

    //before widget
		echo $args['before_widget'];

    //Set time to 12-hour for hours display
    $closehour = date('g:i a', strtotime($close));
    $openhour = date('g:i a', strtotime($open));

    //output
    echo "<div class='footer-location-widget'>";
    if (!empty($title)){
      echo $args['before_title'] . "<a href='".$page_link."' title='". $title . "'>". $title . "</a>". $args['after_title'];
    }

 
    $directions = preg_replace( "/\r|\n/", " ", $address);
    
 
    echo   "<div class='hour-cont'>
              <span class='hours'> $openhour - $closehour</span> <br><span class='$class'>$flag</span>
            </div>
            <span class='address'><a href='https://www.google.com/maps/place/".$directions."' target='_blank' title='directions' />$address</a><br>$phone</span>
          </div>";

    //after widget
		echo $args['after_widget'];
	}

	//widget form
	public function form($instance){
		if(isset($instance['title'])){
			$title   = $instance['title'];
      $page_link = $instance['page_link'];
      $mon_open    = $instance['mon_open'];
      $mon_close   = $instance['mon_close'];
      $tues_open    = $instance['tues_open'];
      $tues_close   = $instance['tues_close'];
      $wed_open    = $instance['wed_open'];
      $wed_close   = $instance['wed_close'];
      $thurs_open    = $instance['thurs_open'];
      $thurs_close   = $instance['thurs_close'];
      $fri_open    = $instance['fri_open'];
      $fri_close   = $instance['fri_close'];
      $sat_open    = $instance['sat_open'];
      $sat_close   = $instance['sat_close'];
      $address = $instance['address'];
      $phone   = $instance['phone'];
		}else{
			$title = __('New title');
		}
		?>
		<p>
  		<label for="<?php echo $this->get_field_id('title'); ?>">Branch Name</label>
  		<input class="widefat KCPL_branch_info-text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
		</p>
    <p>
      <label for="<?php echo $this->get_field_id('page_link'); ?>">Page Link</label>
      <input class="widefat KCPL_branch_info-text" id="<?php echo $this->get_field_id('page_link'); ?>" name="<?php echo $this->get_field_name('page_link'); ?>" type="text" value="<?php echo esc_attr($page_link); ?>">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('hours'); ?>">Monday Hours</label><br>
      <span><em>Open:</em> </span><input class="widefat KCPL_branch_info-time" id="<?php echo $this->get_field_id('mon_open'); ?>" name="<?php echo $this->get_field_name('mon_open'); ?>" type="time" value="<?php echo esc_attr($mon_open); ?>"><br>
      <span><em>Close:</em> </span><input class="widefat KCPL_branch_info-time" id="<?php echo $this->get_field_id('mon_close'); ?>" name="<?php echo $this->get_field_name('mon_close'); ?>" type="time" value="<?php echo esc_attr($mon_close); ?>"><br>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('hours'); ?>">Tuesday Hours</label><br>
      <span><em>Open:</em> </span><input class="widefat KCPL_branch_info-time" id="<?php echo $this->get_field_id('tues_open'); ?>" name="<?php echo $this->get_field_name('tues_open'); ?>" type="time" value="<?php echo esc_attr($tues_open); ?>"><br>
      <span><em>Close:</em> </span><input class="widefat KCPL_branch_info-time" id="<?php echo $this->get_field_id('tues_close'); ?>" name="<?php echo $this->get_field_name('tues_close'); ?>" type="time" value="<?php echo esc_attr($tues_close); ?>"><br>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('hours'); ?>">Wednesday Hours</label><br>
      <span><em>Open:</em> </span><input class="widefat KCPL_branch_info-time" id="<?php echo $this->get_field_id('wed_open'); ?>" name="<?php echo $this->get_field_name('wed_open'); ?>" type="time" value="<?php echo esc_attr($wed_open); ?>"><br>
      <span><em>Close:</em> </span><input class="widefat KCPL_branch_info-time" id="<?php echo $this->get_field_id('wed_close'); ?>" name="<?php echo $this->get_field_name('wed_close'); ?>" type="time" value="<?php echo esc_attr($wed_close); ?>"><br>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('hours'); ?>">Thursday Hours</label><br>
      <span><em>Open:</em> </span><input class="widefat KCPL_branch_info-time" id="<?php echo $this->get_field_id('thurs_open'); ?>" name="<?php echo $this->get_field_name('thurs_open'); ?>" type="time" value="<?php echo esc_attr($thurs_open); ?>"><br>
      <span><em>Close:</em> </span><input class="widefat KCPL_branch_info-time" id="<?php echo $this->get_field_id('thurs_close'); ?>" name="<?php echo $this->get_field_name('thurs_close'); ?>" type="time" value="<?php echo esc_attr($thurs_close); ?>"><br>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('hours'); ?>">Friday Hours</label><br>
      <span><em>Open:</em> </span><input class="widefat KCPL_branch_info-time" id="<?php echo $this->get_field_id('fri_open'); ?>" name="<?php echo $this->get_field_name('fri_open'); ?>" type="time" value="<?php echo esc_attr($fri_open); ?>"><br>
      <span><em>Close:</em> </span><input class="widefat KCPL_branch_info-time" id="<?php echo $this->get_field_id('fri_close'); ?>" name="<?php echo $this->get_field_name('fri_close'); ?>" type="time" value="<?php echo esc_attr($fri_close); ?>"><br>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('hours'); ?>">Saturday Hours</label><br>
      <span><em>Open:</em> </span><input class="widefat KCPL_branch_info-time" id="<?php echo $this->get_field_id('sat_open'); ?>" name="<?php echo $this->get_field_name('sat_open'); ?>" type="time" value="<?php echo esc_attr($sat_open); ?>"><br>
      <span><em>Close:</em> </span><input class="widefat KCPL_branch_info-time" id="<?php echo $this->get_field_id('sat_close'); ?>" name="<?php echo $this->get_field_name('sat_close'); ?>" type="time" value="<?php echo esc_attr($sat_close); ?>"><br>
    </p>
    <p>
      <label for="address">Address</label><br>
      <textarea class="widefat KCPL_branch_info-textarea" rows="4" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>"><?php echo esc_attr($address); ?></textarea>
    </p>
    <p>
      <label for="phone">Phone</label>
      <input class="widefat KCPL_branch_info-text" id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" type="text" value="<?php echo esc_attr($phone); ?>">
    </p>
		<?php
	}

	//sanitize inputs
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']):'';
    $instance['page_link'] = (!empty($new_instance['page_link'])) ? strip_tags($new_instance['page_link']):'';
    $instance['mon_open'] = (!empty($new_instance['mon_open'])) ? strip_tags($new_instance['mon_open']):'';
    $instance['mon_close'] = (!empty($new_instance['mon_close'])) ? strip_tags($new_instance['mon_close']):'';
    $instance['tues_open'] = (!empty($new_instance['tues_open'])) ? strip_tags($new_instance['tues_open']):'';
    $instance['tues_close'] = (!empty($new_instance['tues_close'])) ? strip_tags($new_instance['tues_close']):'';
    $instance['wed_open'] = (!empty($new_instance['wed_open'])) ? strip_tags($new_instance['wed_open']):'';
    $instance['wed_close'] = (!empty($new_instance['wed_close'])) ? strip_tags($new_instance['wed_close']):'';
    $instance['thurs_open'] = (!empty($new_instance['thurs_open'])) ? strip_tags($new_instance['thurs_open']):'';
    $instance['thurs_close'] = (!empty($new_instance['thurs_close'])) ? strip_tags($new_instance['thurs_close']):'';
    $instance['fri_open'] = (!empty($new_instance['fri_open'])) ? strip_tags($new_instance['fri_open']):'';
    $instance['fri_close'] = (!empty($new_instance['fri_close'])) ? strip_tags($new_instance['fri_close']):'';
    $instance['sat_open'] = (!empty($new_instance['sat_open'])) ? strip_tags($new_instance['sat_open']):'';
    $instance['sat_close'] = (!empty($new_instance['sat_close'])) ? strip_tags($new_instance['sat_close']):'';
    $instance['address'] = (!empty($new_instance['address'])) ? strip_tags($new_instance['address']):'';
    $instance['phone'] = (!empty($new_instance['phone'])) ? strip_tags($new_instance['phone']):'';

		return $instance;
	}

}

// register KCPL_branch_info widget
function register_KCPL_branch_info() {
    register_widget( 'KCPL_branch_info' );
}
add_action( 'widgets_init', 'register_KCPL_branch_info' );
