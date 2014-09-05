<?php get_header();
global $post;
$pID = KCPL_get_highest_ancestor($post);

$sidebar = KCPL_get_sidebar($pID);
$color = get_field('section_color',$pID); 
echo $pID;
?>


<?php if(have_posts()){while(have_posts()){the_post(); ?>

<?php include_once(locate_template('partials/module-breadcrumbs.php')); ?>

<div id="content">
  <div class="container">
    <?php include_once(locate_template('partials/module-sidebar-nav.php')); ?>

    <div class="column eight omega" id="contentPrimary">
      <!-- <div class="column eight alpha omega">
        <?php include_once(locate_template('partials/module-content-topcallout.php')); ?>
      </div> -->

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
