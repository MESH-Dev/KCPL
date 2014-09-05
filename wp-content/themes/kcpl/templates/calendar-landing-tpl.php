<?php /* Template Name: Calendar  */ ?>

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
     <div class="three column alpha">
        
        <?php KCPL_Calendar_sidebar(); ?>

     </div>
    
    <div class="column nine omega" id="contentPrimary">

        <?php KCPL_Calendar_gridlayout(); ?>

    </div>
  </div>
</div>

<?php } } ?>

<?php get_footer(); ?>