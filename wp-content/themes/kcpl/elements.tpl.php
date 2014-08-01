<?php /* Template Name: Elements */ get_header(); ?>

<?php if(have_posts()){while(have_posts()){the_post(); ?>

<div id="bannerHome" class="KCPL_background-yellow">
  <div class="container">
    <div class="columns seven">
      <div class="gutter">
        <h1>Your library is more than millions of resources at your fingertips, We are your community center.</h1>
        <h2>Share your thoughts on our new site!</h2>
      </div>
    </div>
  </div>
</div>

<div id="content">
  <div class="container">
    <div class="columns four alpha" id="contentSecondary">
      <?php if(has_nav_menu('main_nav')){
          $defaults = array(
            'theme_location'  => 'main_nav',
            'menu'            => 'main_nav',
            'container'       => 'div',
            'container_class' => '',
            'container_id'    => 'secondary-sidebar-nav',
            'menu_class'      => 'menu clearfix',
            'menu_id'         => 'main_nav_secondary',
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
    <div class="column seven omega offset-by-one" id="contentPrimary">
      <?php the_content(); ?>
    </div>
  </div>
</div>

<?php } } ?>

<?php get_footer(); ?>
