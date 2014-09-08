<?php get_header();
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

      <div class="columns <?php if($rsCount != 0){echo 'six';}else{echo 'eight omega';} ?> alpha">
        <?php the_content(); ?>  
      </div>

      <?php if($rsCount != 0){ ?>

        <div class="columns two omega">
          <?php include_once(locate_template('partials/module-content-page-sidebar.php')); ?>
        </div>

      <?php } ?>

    </div>

  </div>
</div>

<?php } } ?>

<?php get_footer(); ?>
