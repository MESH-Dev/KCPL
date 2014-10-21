<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kanawha County Public Library | <?php wp_title(); ?></title>
  <meta name="verify-v1" content="9zrmS6tl/6nvEfCC7csXM9yv6LDXWCvvZe4fhXCuX2k="/>
  <meta property="fb:page_id" content="162450860303"/>
  <meta name="description"
            content="kanawhalibrary.org is a Kanawha County Libraries card holder's gateway to traditional and online audio, video, and print resources in the county's public and school library collections."/>
  <link rel="image_src" href="<?php echo get_site_url(); ?>/wp-content/uploads/2014/10/KCPL_HorizLogo_blue.jpg"/>
  <meta property="og:image" content="<?php echo get_site_url(); ?>/wp-content/uploads/2014/10/KCPL_HorizLogo_blue.jpg"/>
  <script>
   (function(d) {
     var config = {
       kitId: 'drm7klb',
       scriptTimeout: 3000
     },
     h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='//use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)})(document);
  </script>

  <?php wp_head(); ?>
  <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/modernizr.min.js"></script>
  <![endif]-->
  <!--[if lte IE 8]>
  <style>
    input[type="password"] {
      font-family: Arial !important;
    }
  </style>
  <![endif]-->
</head>
<body <?php if(wp_is_mobile()){$mobileClass="KCPLmobile";}else{$mobileClass="KCPLmobile";} body_class($mobileClass);?>>

<?php if(wp_is_mobile()){ ?>
  <div id='mobileWrap'>
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
<?php } ?>

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
          <?php if(wp_is_mobile()){ ?>
            <div id='mobileMenuTrigger'>
              <i></i>
              <i></i>
            </div>
          <?php } ?>
          <a href="<?php echo home_url(); ?>"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>px" width="<?php echo get_custom_header()->width; ?>px" alt="Kanawha County Public Library logo" /></a>
          <?php if(wp_is_mobile()){ ?>
            <div id='mobileSearchTrigger'>
              <i class="fa fa-lg fa-search"></i>
            </div>
          <?php } ?>
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
              <div id="header-search-catalog">
                <a href="http://kana.ent.sirsi.net/client/en_US/default/"><b></b><span>Search Collection</span></a>
              </div>
              <div id="header-search">
                <b></b><span>Search Site</span>
              </div>


              <?php if(is_user_logged_in()){ ?>
                <div id="header-login">
                  <a href="<?php echo wp_logout_url( home_url() ); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logout.png" alt="Log Out" />
                  </a>
                </div>
              <?php }else{ ?>
                <div id="header-login">
                  <a href="<?php
                    $settings = get_site_option('kcpl-oc');
                    echo get_permalink($settings['dashboard']); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/login.png" alt="Log In" />
                  </a>
                </div>
              <?php } ?>
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
