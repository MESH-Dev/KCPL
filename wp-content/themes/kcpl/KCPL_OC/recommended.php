<?php /* Template Name: OC | Recommended */
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
      <?php if(is_user_logged_in()){ ?>
        <div class="KCPL_listing4">
          <span class="title KCPL_background-red">Most Recommended Books</span>
          <div class="gutter">
            <?php KCPL_OC_recommended::getMostRecommended(4); ?>
          </div>
        </div>

        <?php KCPL_OC_recommended::searchRecommended(10,"Search Recommended Books"); ?>
      <?php }else{ ?>
        <p>You must be logged in to access the Online Community. Joining is fast and free, just log in or register if you have not already.</p>

        <br/>

        <div class="">

            <div id="verification">
              <?php KCPL_OC_auth::processVerify(); ?>
            </div>
            <div class="columns four alpha">
              <div class='KCPL_listing4'>
                <span class='title KCPL_background-red'>Log In</span>
                <div class="gutter">
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
              </div>
            </div>

            <div class="columns four omega">
              <div class='KCPL_listing4'>
                <span class='title KCPL_background-red'>Register</span>
                <div class='gutter'>
                  <?php KCPL_OC_auth::registerForm(); ?>
                </div>
              </div>
            </div>


        </div>
      <?php } ?>
    </div>

  </div>
</div>

<?php } } ?>

<?php get_footer(); ?>
