<?php get_header();
global $post;
$pID = KCPL_get_menu_parent_ID();
$sidebar = KCPL_get_sidebar($pID);
$color = get_field('section_color',$pID); ?>

<?php if(have_posts()){while(have_posts()){the_post(); ?>

<div id="banner" class="KCPL_background-<?php echo $color; ?>">
  <div class="container">
      <div class="gutter">
        <?php if(has_nav_menu('main_nav')){
            $defaults = array(
              'theme_location'  => 'main_nav',
              'menu'            => 'main_nav',
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
      <?php include_once(locate_template('partials/module-sidebar-widgets.php')); ?>
    </div>

    <div class="column eight omega" id="contentPrimary">
      <div class="column eight alpha omega">
        <?php include_once(locate_template('partials/module-content-topcallout.php')); ?>
      </div>

      <div class="column eight alpha omega">
        <?php include_once(locate_template('partials/module-content-8column.php')); ?>
      </div>

      <?php $rightSidebar = get_field('sidebar_callouts');
            $rsCount = count($rightSidebar); ?>

      <div class="column <?php if($rsCount != 0){echo 'six';}else{echo 'eight omega';} ?> alpha">
        <?php the_content(); ?>
      </div>

      <?php if($rsCount != 0){ ?>

        <div class="column two omega">
          <?php foreach($rightSidebar as $widget){
              echo $widget['field_type'];
          }?>

        </div>

      <?php } ?>

    </div>

  </div>
</div>

<?php } } ?>

<?php get_footer(); ?>
