<?php get_header(); ?>

<div id="banner" class="KCPL_background-grey">
  <div class="container">
      <div class="gutter">
        <div id="main_navBannerCont" class="menu-main-navigation-container">
          <ul id="main_nav_breadcrumbs" class="menu clearfix">
            <li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-110 current_page_item menu-item-158">
              <a href="/events-classes/">Events &amp; Classes</a>
            </li>
          </ul>
        </div>
     </div>
  </div>
</div>

<?php if(have_posts()){while(have_posts()){the_post(); ?>

<div id="content">
  <div class="container">
    <div class="columns three alpha" id="contentPrimary">

        <?php echo KCPL_calendar::KCPL_Calendar_sidebar(); ?>

    </div>
    <div class="columns nine omega page-content" id="contentPrimary">
      <div class="gutter">
       <?php
        $postid = get_the_ID();
        $post = get_post($postid);
        $meta = get_post_meta($postid);
        $time = $meta['time'][0];
        $ce   = $meta['event_or_class'][0];
        $desc = $meta['description'][0];
        $location  = $meta['location_details'][0];
        $day = date('F j',$result['sort_date']/1000);

        


        $presenter_name = $meta['presenter_name'][0];
        $presenter_email = $meta['presenter_email'][0];
        $contact_name = $meta['contact_nam'][0];
        $contact_email = $meta['contact_email'][0];


        //tax arr
        $postAge = get_the_terms($postid,'kcpl_calendar_tax-age');
        $age = array();
          if($postAge && !is_wp_error($postAge)){
            foreach($postAge as $agetax){
              $age[] = $agetax->name;
            }
            $age = join(", ", $age);
          }
        $postLoc = get_the_terms($postid,'kcpl_calendar_tax-branch');
        $loc = array();
          if($postLoc && !is_wp_error($postLoc)){
            foreach($postLoc as $loctax){
              $loc[] = $loctax->name;
            }
            $loc = join(", ", $loc);
          }
        $postType = get_the_terms($postid,'kcpl_calendar_tax-type');
        $type = array();
          if($postType && !is_wp_error($postType)){
            foreach($postType as $typetax){
              $type[] = $typetax->name;
            }
            $type = join(", ", $type);
          }
        $postTopic = get_the_terms($postid,'kcpl_calendar_tax-topic');
        $topic = array();
          if($postTopic && !is_wp_error($postTopic)){
            foreach($postTopic as $topictax){
              $topic[] = $topictax->name;
            }
            $topic = join(", ", $topic);
          }?>



        <h3><?php the_title();?></h3>
        <h4> <?php echo $day; ?> <?php echo $time; ?> </h4>
        <?php echo $loc; ?> <br>
        <?php echo $type . ' ' .  $age . ' ' . $topic; ?>
        <br><br>
        <p><?php echo $desc; ?></p>

        <?php if ($location): ?>
          <p><strong> Location Details: </strong> <?php echo $location; ?></p>
        <?php endif; ?>

        <?php if ($presenter_name): ?>
          <p><strong> Presenter Name: </strong> <?php echo $presenter_name; ?></p>
        <?php endif; ?>

        <?php if ($presenter_email): ?>
          <p><strong> Presenter Email: </strong> <?php echo $presenter_email; ?></p>
        <?php endif; ?>

        <?php if ($contact_name): ?>
          <p><strong> Contact Name: </strong> <?php echo $contact_name; ?></p>
        <?php endif; ?>

        <?php if ($contact_email): ?>
          <p><strong> Contact Email: </strong> <?php echo $contact_email; ?></p>
        <?php endif; ?>


      </div>
    </div>
  </div>
</div>

<?php } } ?>

<?php get_footer(); ?>
