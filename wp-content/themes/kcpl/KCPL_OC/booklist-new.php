<?php
  /* Template Name: OC | Booklist New */
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
      <?php }else{ ?>
         <h2>Join Our Online Community Today!</h2>
        <p>We are proud to announce we have a new online community you can join for free. Now you can connect with your library from home with ease. Participate in online discussions, create and share reading lists, recommend books to other and more!
         Login or create a free account below by providing a username, password and valid email address.</p><p>Current library cardholder must register for an account and cannot use their library card and PIN to access the Online Community.</p>


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
