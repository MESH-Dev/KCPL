<?php
  if($color==''){
    $color='red';
  }
?>
<div id="banner" class="KCPL_background-<?php echo $color; ?>">
  <div class="container">
      <div class="gutter">
        <?php

        $posttest = get_post($pID);
        $slug = $posttest->post_name;


        if (($slug == 'collection') || ($slug == 'events-classes') || ($slug == 'learning-lab') || ($slug == 'community') || ($slug == 'online-community')){
          $nav = 'main_nav';
        }
        else{
          $nav = 'util_nav';
        }


        if(has_nav_menu('main_nav')){
            $defaults = array(
              'theme_location'  => $nav,
              'menu'            => $nav,
              'container'       => 'div',
              'container_class' => '',
              'container_id'    => 'main_navBannerCont',
              'menu_class'      => 'menu clearfix',
              'menu_id'         => 'main_nav_breadcrumbs',
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
            echo "<p><em>main_nav</em> doesn't exist! Create it and it'll render here.</p>";
          } ?>
      </div>
  </div>
</div>
