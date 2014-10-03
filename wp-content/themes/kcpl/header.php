<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php wp_title(); ?></title>
  <?php wp_head(); ?>
</head>
<body <?php if(wp_is_mobile()){$mobileClass="KCPLmobile";}else{$mobileClass="KCPLmobile";} body_class($mobileClass);?>>



<div id="contentWrap">
  <header>
    <div id="KCPL_header-search">
       <div class="container">
          <?php get_search_form(); ?>
       </div>
    </div>
    <div id="header-util">
      <div class="container clearfix">
        <div id="header-logo">
          <a href="<?php echo home_url(); ?>"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" /></a>
        </div>
        <div class="gutter clearfix">
          <?php if(has_nav_menu('util_nav')){
              $defaults = array(
                'theme_location'  => 'util_nav',
                'menu'            => 'util_nav',
                'container'       => false,
                'container_class' => '',
                'container_id'    => 'util_navCont',
                'menu_class'      => 'menu',
                'menu_id'         => 'util_nav',
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
              echo "<p><em>util_nav</em> doesn't exist! Create it and it'll render here.</p>";
            } ?>
            <div id="header-extra">
              <div id="header-search">
                <b></b><span>Search</span>
              </div>
              <div id="header-newsletter">
                <b></b><span>Newsletter</span>
              </div>
              <div id="header-login">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/login.png"/>
              </div>
            </div>
        </div>
      </div>
    </div>
    <div id="header-nav">
      <div class="container clearfix">
        <div class="gutter clearfix">
          <?php if(has_nav_menu('main_nav')){
              $defaults = array(
              	'theme_location'  => 'main_nav',
              	'menu'            => 'main_nav',
              	'container'       => false,
              	'container_class' => '',
              	'container_id'    => 'main_navCont',
              	'menu_class'      => 'menu',
              	'menu_id'         => 'main_nav',
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
  </header>
