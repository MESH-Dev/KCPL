<?php /* Template Name: Homepage  */ ?>

<?php get_header();
$pID = get_the_ID();
$sidebar = KCPL_get_sidebar($pID);
?>


<div id="bannerHome" class="KCPL_background-red">
  <div class="container">

    <div class="seven columns ">
      <div class="gutter">
        <h1><?php the_field('banner_callout');?></h1>
        <h2><?php the_field('banner_callout_secondary_text');?></h2>
      </div>
    </div>

    <div class="five columns " >
      <?php include_once(locate_template('partials/module-search-condensed.php')); ?>
    </div>

  </div>
</div>
<div id="content" class="frontpage">
   <div class="container">

      <div class="four columns alpha">

       <?php include_once(locate_template('partials/module-content-engagement.php')); ?>

       <?php include_once(locate_template('partials/module-sidebar-widgets.php')); ?>

      </div>

      <div class="column eight omega" id="contentPrimary">


        <?php
            // Partial to use for two side-by-side 4 column content blocks
            include_once(locate_template('partials/module-content-4column.php'));
        ?>


      </div>

    </div>

</div>


<?php get_footer(); ?>
