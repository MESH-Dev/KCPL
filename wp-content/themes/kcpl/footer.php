  <footer>
    <div class="container">
      <div class="gutter">
        <div class="row">
          <div class="columns two alpha">
            <?php dynamic_sidebar('footer-col1'); ?>
          </div>
          <div class="columns two">
            <?php dynamic_sidebar('footer-col2'); ?>
          </div>
          <div class="columns two">
            <?php dynamic_sidebar('footer-col3'); ?>
          </div>
          <div class="columns two">
            <?php dynamic_sidebar('footer-col4'); ?>
          </div>
          <div class="columns three offset-by-one omega">
            <div>
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
            </div>

            <span class="title">Newsletter Sign Up</span>
            <div id="footer-newsletter">

                <span>Sign up for our newsletter to receive updates from your library.</span>
                <a href="<?php get_bloginfo('url') ?>/newsletter"  >Sign up now</a>

            </div>
            <div>
              <span class="title">Donate</span>
              <div id="footer-donate">
                  <span>Please support the annual fund. Your gift supports vital library services for everyone in the community.</span>
                  <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=9ACRUJ255P4BN" target="_blank">Make a Donation</a>
              </div>
            </div>
            <div>
              <div id="footer-credit">
                <span>&#169; Kanawha County Public Library <?php echo date('Y')?>, Site by <a href="http://meshfresh.com">MESH</a></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
</div>
<?php wp_footer(); ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46432156-2', 'kanawhalibrary.org');
  ga('send', 'pageview');

</script>

</body>
</html>
