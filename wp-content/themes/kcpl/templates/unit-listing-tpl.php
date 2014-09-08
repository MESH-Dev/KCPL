<?php /* Template Name: Unit Listing */ ?>

<?php get_header();

global $post;

// Couldn't get this to work
// $pID = KCPL_get_menu_parent_ID();

// See toolbox.php for this function
$pID = KCPL_get_highest_ancestor($post);

$sidebar = KCPL_get_sidebar($pID);
$color = get_field('section_color',$pID); ?>

<?php if(have_posts()){while(have_posts()){the_post(); ?>

<?php include_once(locate_template('partials/module-breadcrumbs.php')); ?>

<div id="content">
  <div class="container">
    <?php include_once(locate_template('partials/module-sidebar-nav.php')); ?>
    <div class="column eight omega" id="contentPrimary">

      <?php include_once(locate_template('partials/module-content-8column.php')); ?>
      <?php include_once(locate_template('partials/module-content-4column-p.php')); ?>
      <?php the_content(); ?>
    </div>
  </div>
</div>

<?php } } ?>

<?php get_footer(); ?>
