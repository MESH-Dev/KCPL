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
            <div>
              <span class="title">Donate</span>
              <div id="footer-donate">
                  <span>Please support the annual fund</span>
                  <a href="#">Make a Donation</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
