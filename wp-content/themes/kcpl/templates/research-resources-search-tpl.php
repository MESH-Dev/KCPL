<?php /* Template Name: Research & Resources Search */ ?>


<?php get_header();
global $post;

$pID = KCPL_get_highest_ancestor($post);

$sidebar = KCPL_get_sidebar($pID);
$color = get_field('section_color',$pID); 
$thisID = get_the_ID();?>

<h1><?php $pID ?></h1>

<?php if(have_posts()){while(have_posts()){the_post(); ?>

<?php include_once(locate_template('partials/module-breadcrumbs.php')); ?>

<div id="content">
  <div class="container">

    <?php include_once(locate_template('partials/module-search-expanded.php')); ?>
    <?php include_once(locate_template('partials/module-content-topcallout.php')); ?>

        <div class="column four alpha">
            <?php include_once(locate_template('partials/module-sidebar-widgets.php')); ?>
        </div>
        <div class="column eight omega">
            <?php
                // Partial to use for 8 column (full width) content blocks
                include_once(locate_template('partials/module-content-8column.php'));
            ?>

            <?php
                // Partial to use for two side-by-side 4 column content blocks
                include_once(locate_template('partials/module-content-4column.php'));
            ?>
        </div>
  </div>
</div>

<?php } } ?>

<?php get_footer(); ?>




