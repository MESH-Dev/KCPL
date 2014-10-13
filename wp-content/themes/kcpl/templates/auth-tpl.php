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
      <h2>Welcome to the Online Community</h2>

      <?php if(is_user_logged_in()){ ?>

        <p>You're already logged in, head over to the dashboard.</p>

      <?php }else{ ?>
        <p>Your Online Community and your Library logins are separate. If this is your first time logging in, use your library card and PIN, then you can change your password later on if you want to.</p>

        <br/>

        <div class="">

            <div id="verification">
              <?php KCPL_OC_auth::processVerify(); ?>
            </div>
            <div class="columns four alpha">
              <h5>Login</h5>
              <div class="login-form">
                <?php
                $options = get_site_option('kcpl-oc');
                $args = array(
                  'echo'           => true,
                  'redirect'       => get_permalink($options['dashboard']),
                  'form_id'        => 'loginform',
                  'label_username' => __( 'Username' ),
                  'label_password' => __( 'Password' ),
                  'label_log_in'   => __( 'Log In' ),
                  'id_username'    => 'user_login',
                  'id_password'    => 'user_pass',
                  'id_remember'    => 'rememberme',
                  'id_submit'      => 'wp-submit',
                  'remember'       => false,
                  'value_username' => NULL,
                  'value_remember' => false
                ); ?>
                <?php wp_login_form( $args ); ?>
              </div>
            </div>

            <div class="columns four omega">
              <h5>Register</h5>
              <?php KCPL_OC_auth::registerForm(); ?>
            </div>


        </div>
      <?php } ?>
  </div>
</div>

<?php } } ?>

<?php get_footer(); ?>
