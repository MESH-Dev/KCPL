<?php /* Template Name: Auth */
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
      <h1>Authenticate</h1>
      <?php KCPL_OC_auth::loginForm(); ?>

      <?php if(isset($_COOKIE['ezproxy'])){
        echo 'ezproxy: '.$_COOKIE['ezproxy'];
      }else{
        echo "NO COOKIES MUTHAFUCKA!";
      } ?>
    </div>

  </div>
</div>

<?php } } ?>

<?php get_footer(); ?>
