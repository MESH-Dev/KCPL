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

      <div id="authContainer" class="active">
        <div id="authContainer-load">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/loading.gif" />
          <h5>The gears are turning and we're authenticating you with the Online Community.</h5>
        </div>
        <div id="authContainer-success">

        </div>
        <div id="authContainer-fail">
          <h5>Something went horribly wrong and we couldn't authenticate you with the Online Community.</h5>
        </div>
      </div>

    </div>

  </div>
</div>

<?php } } ?>

<?php get_footer(); ?>
