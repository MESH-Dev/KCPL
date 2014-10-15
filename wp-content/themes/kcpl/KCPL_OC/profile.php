<?php /* Template Name: OC | Profile */
get_header();
global $post;
$pID = KCPL_get_highest_ancestor($post);
$sidebar = KCPL_get_sidebar($pID);
$color = get_field('section_color',$pID);
$color = 'red';
?>


<?php if(have_posts()){while(have_posts()){the_post(); ?>

<?php include_once(locate_template('partials/module-breadcrumbs.php')); ?>

<div id="content">
  <div class="container">
    <?php include_once(locate_template('partials/module-sidebar-nav.php')); ?>

    <div class="columns eight omega" id="contentPrimary">
      <?php if(is_user_logged_in()){ ?>
        <div class="column eight alpha omega">

          <?php include_once(locate_template('partials/module-content-topcallout.php')); ?>
        </div>

        <div class="columns eight alpha omega">

          <?php include_once(locate_template('partials/module-content-8column.php')); ?>
        </div>

        <?php $rightSidebar = get_field('page_sidebar');
              $rsCount = count($rightSidebar); ?>

        <div class="columns page-content eight alpha omega">
            <?php
              $curid = get_current_user_id();
              if(isset($_GET['uid'])){
                $uid = $_GET['uid'];
                $ud = get_userdata($uid);
                if($ud==false){
                  $pr = false;
                  $er = "Member does not exist";
                }else{
                  $pr = true;
                }
              }elseif($curid != 0){
                $uid = $curid;
                $pr = true;
              }else{
                $pr = false;
                $er = "You must be logged in to see your profile";
              }

              if($pr = true){
                KCPL_OC_profile::showProfile($uid);
              }else{
                echo $er;
              } ?>
        </div>

        <div class="columns eight alpha omega">
          <div class="KCPL_listing4">
            <span class="title KCPL_background-red">Materials I Have Recommended</span>
            <div class="gutter">
              <?php KCPL_OC_recommended::getUserRecommended($uid); ?>
            </div>
          </div>
        </div>

        <div class="columns four alpha">
          <div class="KCPL_listing4">
            <span class="title KCPL_background-red">My Recent Book List</span>
            <div class="gutter">
              <div class="row">
                <?php $bl = KCPL_OC_booklist::getUserBooklists(4,1,$uid,false);
                  if(is_array($bl)){
                    $i=1;
                    foreach($bl[0] as $b){
                      echo "<div class='entry kcpl_oc-mylist' id='kcpl_oc-mylist-".$b['id']."'>
                              <div class='image'><img src='".$b['img']."'/></div>
                              <div class='number'>".$i."</div>
                              <div class='content'>
                                <span class='entry-title'>".$b['title']."</span>
                                <span class='entry-author'>".$b['author']."</span>
                              </div>
                            </div>";
                      $i++;
                    }
                  }else{
                    echo $bl;
                  } ?>
              </div>
            </div>
          </div>
        </div>

        <div class="columns four omega">
          <?php KCPL_OC_discussions::getUserDiscussion(2,$uid); ?>
        </div>

      <?php }else{
        echo "<p>You must be logged in to access the Online Community</p>";
      } ?>


    </div>

  </div>
</div>

<?php } } ?>

<?php get_footer(); ?>
