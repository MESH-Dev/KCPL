<?php /* Template Name: OC | Reset Password */
get_header();
global $post;
$pID = KCPL_get_highest_ancestor($post);
$sidebar = KCPL_get_sidebar($pID);
$color = get_field('section_color',$pID);
$color = 'red';
$settings = get_site_option('kcpl-oc');
?>


<?php if(have_posts()){while(have_posts()){the_post(); ?>

<?php include_once(locate_template('partials/module-breadcrumbs.php')); ?>

<div id="content">
  <div class="container">
    <?php include_once(locate_template('partials/module-sidebar-nav.php')); ?>

    <div class="columns eight omega" id="contentPrimary">
      <?php if(is_user_logged_in()){ ?>

        already logged in
        
      <?php }elseif(isset( $_GET['reset']) && $_GET['reset'] == 'true' ){ ?>

        <h3>An email has been sent with instructions on how to reset your password.</h3>

      <?php }else{ ?>

        <div id='resetresponse'>

        </div>
        <form id="passreset">
          <label>What email address is your account under?</label>
          <input type="email" placeholder="email@email.com" />
          <input type="submit" value="Reset Password" />
        </form>

      <?php } ?>

    </div>

  </div>
</div>

<?php } } ?>

<?php get_footer(); ?>
