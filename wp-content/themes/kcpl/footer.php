<footer>
  <div class="container">
    <div class="gutter">
      <div class="row">
        <div class="columns two alpha">

          <div class="footer-location-widget">
            <span class="title">Main Library</span>
            <div class="hour-cont">
              <span class="hours">Hours</span> <span class="open">Open Now</span>
            </div>
            <span class="address">123 Capitol St.<br>
            Charleston, WV 25301<br>
            304-343-4646</span>
          </div>

          <div class="footer-location-widget">
            <span class="title">Main Library</span>
            <span class="hours">Hours</span> <span class="closed">Open Now</span>
            <span class="address">123 Capitol St.<br>
            Charleston, WV 25301<br>
            304-343-4646</span>
          </div>

        </div>
        <div class="columns two">
          <div class="footer-location-widget">
            <span class="title">Main Library</span>
            <div class="hour-cont">
              <span class="hours">Hours</span> <span class="open">Open Now</span>
            </div>
            <span class="address">123 Capitol St.<br>
            Charleston, WV 25301<br>
            304-343-4646</span>
          </div>

          <div class="footer-location-widget">
            <span class="title">Main Library</span>
            <span class="hours">Hours</span> <span class="closed">Open Now</span>
            <span class="address">123 Capitol St.<br>
            Charleston, WV 25301<br>
            304-343-4646</span>
          </div>
        </div>
        <div class="columns two">
          <div class="footer-location-widget">
            <span class="title">Main Library</span>
            <div class="hour-cont">
              <span class="hours">Hours</span> <span class="open">Open Now</span>
            </div>
            <span class="address">123 Capitol St.<br>
            Charleston, WV 25301<br>
            304-343-4646</span>
          </div>

          <div class="footer-location-widget">
            <span class="title">Main Library</span>
            <span class="hours">Hours</span> <span class="closed">Open Now</span>
            <span class="address">123 Capitol St.<br>
            Charleston, WV 25301<br>
            304-343-4646</span>
          </div>
        </div>
        <div class="columns two">
          <div class="footer-location-widget">
            <span class="title">Main Library</span>
            <div class="hour-cont">
              <span class="hours">Hours</span> <span class="open">Open Now</span>
            </div>
            <span class="address">123 Capitol St.<br>
            Charleston, WV 25301<br>
            304-343-4646</span>
          </div>

          <div class="footer-location-widget">
            <span class="title">Main Library</span>
            <span class="hours">Hours</span> <span class="closed">Open Now</span>
            <span class="address">123 Capitol St.<br>
            Charleston, WV 25301<br>
            304-343-4646</span>
          </div>
        </div>
        <div class="columns three offset-by-one omega">

          <span class="title">Reach Out</span>
          <?php if(has_nav_menu('social_nav')){
              $defaults = array(
                'theme_location'  => 'social_nav',
                'menu'            => 'social_nav',
                'container'       => 'div',
                'container_class' => 'clearfix',
                'container_id'    => 'social_navCont',
                'menu_class'      => 'menu',
                'menu_id'         => 'social_nav',
                'echo'            => true,
                'fallback_cb'     => 'wp_page_menu',
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth'           => 0,
                'walker'          => ''
              ); wp_nav_menu( $defaults );
            }else{
              echo "<p><em>social_nav</em> doesn't exist! Create it and it'll render here.</p>";
            } ?>
          <span class="title">Donate</span>
          <div id="footer-donate">
              <span>Please support the annual fund</span>
              <a href="#">Make a Donation</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
