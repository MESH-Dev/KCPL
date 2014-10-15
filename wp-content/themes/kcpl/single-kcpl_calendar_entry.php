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

        <?php // echo KCPL_calendar::KCPL_Calendar_sidebar(); ?>

    </div>
    <div class="columns nine omega page-content" id="contentPrimary">
      <?php
        $url = get_permalink(get_option('KCPL_Calendar')['pageID']);
        $monthsAb = array('jan','feb','mar','apr','may','june','july','aug','sept','oct','nov','dec');
        if(isset($_GET['c_month']) && is_numeric($_GET['c_month']) && $_GET['c_month'] <= 12){
          $curMonth = $_GET['c_month'];
        }else{
          $curMonth = (int)date('n');
        }
        //month traversing url builder
        if(isset($_GET['c_month']) && is_numeric($_GET['c_month']) && $_GET['c_month'] <= 12){
          $nextMonth = $_GET['c_month']+1;
          $prevMonth = $_GET['c_month']-1;
          if($prevMonth == 0){
            $prevMonth = 12;
            $prevCheck = true;
          }
          if($nextMonth == 13){
            $nextMonth = 1;
            $nextCheck = true;
          }
        }else{
          $nextMonth = date('n')+1;
          $prevMonth = date('n')-1;
          if($prevMonth == 0){
            $prevMonth = 12;
            $prevCheck = true;
          }
          if($nextMonth == 13){
            $nextMonth = 1;
            $nextCheck = true;
          }
        }
        if(isset($_GET['c_year']) && is_numeric($_GET['c_year'])){
          if($prevCheck == true){
            $prevYear = $_GET['c_year']-1;
          }else{
            $prevYear = $_GET['c_year'];
          }
          if($nextCheck == true){
            $nextYear = $_GET['c_year']+1;
          }else{
            $nextYear = $_GET['c_year'];
          }
        }else{
          if(isset($prevCheck) && $prevCheck == true){
            $prevYear = date('Y')-1;
          }else{
            $prevYear = date('Y');
          }
          if(isset($nextCheck) && $nextCheck == true){
            $nextYear = date('Y')+1;
          }else{
            $nextYear = date('Y');
          }
        }
        $nextMonthL = "$url?c_month=$nextMonth&c_year=$nextYear&c_view=list&c_mode=$viewmode";
        $prevMonthL = "$url?c_month=$prevMonth&c_year=$prevYear&c_view=list&c_mode=$viewmode";


        if(isset($_GET['c_mode'])){
          $vb = $_GET['c_mode'];
        }else{
          $vb = 'month';
        }

        if(isset($_GET['c_year']) && is_numeric($_GET['c_year'])){
          $vbyear = $_GET['c_year'];
        }else{
          $vbyear = date('Y');
        }
        if(isset($_GET['c_month']) && is_numeric($_GET['c_month']) && $_GET['c_month'] <= 12){
          $vbmonth = $_GET['c_month'];
        }else{
          $vbmonth = date('n');
        }
        if(isset($_GET['c_week']) && is_numeric($_GET['c_week'])){
          $vbweek = $_GET['c_week'];
        }else{
          $vbweek = date('W');
        }
        if(isset($_GET['c_day']) && is_numeric($_GET['c_day'])){
          $vbday = $_GET['c_day'];
        }else{
          $vbday = date('j');
        }

        $vbmonthurl = "$url?c_month=$vbmonth&year=$vbyear";
        $vbweekurl  = "$url?c_view=list&c_mode=week&c_week=$vbweek&c_year=$vbyear";
        $vbdayurl  = "$url?c_view=list&c_mode=day&c_day=$vbday&c_month=$vbmonth&c_year=$vbyear";

        //viewby
        $output = "<div id='KCPL_Calendar_viewby'>
                      <span>View by</span>
                      <a href='$vbmonthurl' ";
        if($vb=='month'){
          $output .= "class='active'";
        }
        $output .=		">Month</a>
                      <a href='$vbweekurl' ";
        if($vb=='week'){
          $output .= "class='active'";
        }
        $output .= 		">Week</a>
                      <a href='$vbdayurl' ";
        if($vb=='day'){
          $output .= "class='active'";
        }
        $output .=		">Day</a>
                    </div>";
        echo $output;
        //build the listview
        $output = "<div id='KCPL_Calendar_listview'>
                      <div id='KCPL_Calendar_monthsel'>
                        <a id='KCPL_Calendar_prev' href='$prevMonthL'>Previous Month</a>";
                  for($x=0;$x<=11;$x++){
                    $xx = $x+1;
                  if($curMonth == $xx){
                    $class='active';
                  }else{$class='';}
                    $output .= "<a class='$class' href='$url?c_month=".$xx."'>$monthsAb[$x]</a>";
                  }
                  $output .=	" <a id='KCPL_Calendar_next' href='$nextMonthL'>Next Month</a>
                    </div>
                  </div>";
        echo $output;
      ?>

      <div class="gutter">

       <?php
        $postid          = get_the_ID();
        $post            = get_post($postid);
        $meta            = get_post_meta($postid);
        $time            = $meta['time'][0];
        $ce              = $meta['event_or_class'][0];
        $desc            = $meta['description'][0];
        $location        = $meta['location_details'][0];
        $day             = date('F j',$result['sort_date']);
        $presenter_name  = $meta['presenter_name'][0];
        $presenter_email = $meta['presenter_email'][0];
        $contact_name    = $meta['contact_nam'][0];
        $contact_email   = $meta['contact_email'][0];


        //tax arr
        $postAge = get_the_terms($postid,'kcpl_calendar_tax-age');
        $age = array();
          if(count($postAge) != 0){
            foreach($postAge as $agetax){
              $age[] = $agetax->name;
            }
            $age = join(", ", $age);
          }
        $postLoc = get_the_terms($postid,'kcpl_calendar_tax-branch');
        $loc = array();
          if(count($postLoc) != 0){
            foreach($postLoc as $loctax){
              $loc[] = $loctax->name;
            }
            $loc = join(", ", $loc);
          }
        $postType = get_the_terms($postid,'kcpl_calendar_tax-type');
        $type = array();
          if(count($postType) != 0){
            foreach($postType as $typetax){
              $type[] = $typetax->name;
            }
            $type = join(", ", $type);
          }
        $postTopic = get_the_terms($postid,'kcpl_calendar_tax-topic');
        $topic = array();
          if(count($postTopic) != 0){
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
          <p><strong> Presenter Email: </strong> <a href="mailto:<?php echo $presenter_email; ?>"><?php echo $presenter_email; ?></a></p>
        <?php endif; ?>

        <?php if ($contact_name): ?>
          <p><strong> Contact Name: </strong> <?php echo $contact_name; ?></p>
        <?php endif; ?>

        <?php if ($contact_email): ?>
          <p><strong> Contact Email: </strong> <a href="mailto:<?php echo $contact_email; ?>"><?php echo $contact_email; ?></a></p>
        <?php endif; ?>


      </div>
    </div>
  </div>
</div>

<?php } } ?>

<?php get_footer(); ?>
