<?php
  /* Template Name: OC | Booklist My */
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
          KCPL_OC_booklist::searchUserBooklists();
        }else{ ?>
          <div class="four columns alpha">
       <h2>Join Our Online Community</h2>
        <p>We are proud to announce we have a new online community you can join for free. Now you can connect with your library from home with ease. Participate in online discussions, create and share reading lists, recommend books to others and more!
         Login or create a free account below by providing a username, password and valid email address.</p><p style="font-style: italic"> <em>NOTE: This account is different from your library card account. You cannot use your library card PIN to access the Online Community. Please create a separate account through the Online Community.</em></p>
      

        <br/>

        <div class="">

            <div id="verification">
              <?php KCPL_OC_auth::processVerify(); ?>
            </div>
         
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
                  <p> Dont have an account? Register Below!</p>
                </div>
              </div>
          

          
              <div class='KCPL_listing4'>
                <span class='title KCPL_background-red'>Register</span>
                <div class='gutter'>
                  <?php KCPL_OC_auth::registerForm(); ?>
                </div>
              </div>
       


        </div>
      </div> <!-- end oc login -->

      <div class="four columns omega">
       <h2>Online Catalog Login</h2>
        <p>To access your online catalog account to place holds and review your checkout history, click the button below to login with your library card and PIN. </p>
        <p><br/>
<!--<a class="cal_button" href="#" style="background-color: #FFA751"><strong>Catalog Login</strong></a></p>-->
<a href="
http://kana.ent.sirsi.net/client/default/search/patronlogin/http:$002f$002fkana.ent.sirsi.net$002fclient$002fdefault$002fsearch$002faccount$003f">
  <div class="KCPL_horz-single KCPL_background-yellow"  >
          <div class="gutter">
             <span style="color: #fff !important">Catalog login</span>
          </div>
        </div></a>
      </div> <!-- end ent login -->
      
        <?php } ?>

    </div>

  </div>
</div>

<?php } } ?>

<?php get_footer(); ?>
