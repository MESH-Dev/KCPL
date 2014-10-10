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
      <p>Your Online Community and your Library logins are separate. If this is your first time logging in, use your library card and PIN, then you can change your password later on if you want to.</p>

      <br/>

      <div class="page-content">
        <div class="gutter">
          <div class="login-form">
            <?php
            $options = get_site_option('kcpl-oc');
            $args = array(
              'echo'           => true,
              'redirect'       => get_permalink($options['dashboard']),
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
            <?php wp_login_form( $args ); ?>
          </div>
        </div>
      </div>

  </div>
</div>

<?php } } ?>

<?php get_footer(); ?>
