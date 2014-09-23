<?php /* Template Name: OC | Profile Edit */
get_header();
global $post;
$pID = KCPL_get_highest_ancestor($post);
$sidebar = KCPL_get_sidebar($pID);
$color = get_field('section_color',$pID);

?>


<?php if(have_posts()){while(have_posts()){the_post(); ?>

<?php include_once(locate_template('partials/module-breadcrumbs.php')); ?>

<div id="content">
  <div class="container">
    <?php include_once(locate_template('partials/module-sidebar-nav.php')); ?>

    <div class="columns eight omega" id="contentPrimary">
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
            if($curid != 0){
              $uid = $curid;
              $pr = true;
            }else{
              $pr = false;
              $er = "You must be logged in to see your profile";
            }

            if($pr = true){
              KCPL_OC_profile::showProfile($uid,true);
            }else{
              echo $er;
            } ?>
      </div>

      <div class="columns eight alpha omega">
        <?php
          if($pr = true){
            KCPL_OC_profile::editProfile();
          }else{
            echo "You must be logged in to view your profile";
          }
        ?>
      </div>

    </div>

  </div>
</div>

<?php } } ?>

<?php get_footer(); ?>
