<?php
  /* Template Name: OC | Booklist */
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

      <?php
        if(is_user_logged_in()){
          KCPL_OC_booklist::searchBooklists();
        }else{
         echo "<p>You must be logged in to access the Online Community</p>";
       } ?>

    </div>

  </div>
</div>

<?php } } ?>

<?php get_footer(); ?>
