<?php
  /* Template Name: OC | Booklist New */
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
      <?php if(is_user_logged_in()){ ?>
        <div class="columns four alpha">
          <div class='KCPL_listing4'>
            <span class='title KCPL_background-red'>My Book List</span>
            <div class='gutter clearfix'>
              <?php KCPL_OC_booklist::bookListForm(); ?>
            </div>
          </div>
        </div>


        <div class="columns four omega">
          <?php KCPL_OC_booklist::bookListSaveButton();
                KCPL_OC_booklist::bookListCont("My Book List"); ?>
        </div>
      <?php }else{
        echo "<p>You must be logged in to access the Online Community</p>
              <div class='KCPL_listing4'>
                <span class='title KCPL_background-red'>Log In</span>
                <div class='gutter'>";
        $options = get_site_option('kcpl-oc');
        $args = array(
          'echo'           => true,
          'redirect'       => site_url( $_SERVER['REQUEST_URI'] ),
          'form_id'        => 'loginform',
          'label_username' => __( 'Card Number' ),
          'label_password' => __( 'PIN Number' ),
          'label_log_in'   => __( 'Log In' ),
          'id_username'    => 'user_login',
          'id_password'    => 'user_pass',
          'id_remember'    => 'rememberme',
          'id_submit'      => 'wp-submit',
          'remember'       => false,
          'value_username' => NULL,
          'value_remember' => false
        ); ?>
        <?php wp_login_form( $args );
      }
      echo "</div></div>"; ?>

    </div>

  </div>
</div>

<?php } } ?>

<?php get_footer(); ?>
