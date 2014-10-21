<?php /* Template Name: OC | Dashboard */
get_header();
global $post;
$pID = KCPL_get_highest_ancestor($post);
$sidebar = KCPL_get_sidebar($pID);
$color = get_field('section_color',$pID);
$settings = get_option('kcpl-oc');
$color = 'red';
?>


<?php if(have_posts()){while(have_posts()){the_post(); ?>

<?php include_once(locate_template('partials/module-breadcrumbs.php')); ?>

<div id="content">
  <div class="container">
    <?php include_once(locate_template('partials/module-sidebar-nav.php')); ?>

    <div class="columns eight omega" id="contentPrimary">

      <?php $li = is_user_logged_in();
        if($li == true){ ?>
      <div class="columns four alpha">
        <?php KCPL_OC_profile::showProfile(); ?>

        <div class="KCPL_listing4">
          <span class="title KCPL_background-red">Most Recommended Books</span>
          <div class="gutter">
            <?php KCPL_OC_recommended::getMostRecommended(); ?>
          </div>
        </div>



      </div>

      <div class="columns four omega">

        <?php
          $args = array(
          	'user_id' => get_current_user_id(),
          );
          $comments = get_comments($args);
          $i=0;
          foreach($comments as $comment){
            $post = get_post($comment->comment_post_ID); ?>
            <div class="KCPL_single-featured">
              <span class="title KCPL_background-red">Your Recent Discussion</span>
              <div class="gutter">
                 <div class="entry">
                    <span class="entry-title"><?php echo $post->post_title; ?></span>
                    <div class="entry-excerpt">
                        <?php echo $comment->comment_content; ?>
                    </div>
                    <a href="<?php echo get_permalink($post->ID); ?>" class="KCPL_readmore">Go to discussion ≈</a>
                 </div>
              </div>
            </div>
          <?php $i++;
            if($i >= 1){break;}
          }
        ?>

        <a href="<?php echo get_permalink($settings['discussions']); ?>">
          <div class="KCPL_horz-multi KCPL_background-red">
            <div class="gutter">
               <span>Join Discussions</span>
            </div>
          </div>
        </a>

        <a href="<?php echo get_permalink($settings['recommended']); ?>">
          <div class="KCPL_horz-multi KCPL_background-red">
            <div class="gutter">
               <span>Give Recommendations</span>
            </div>
          </div>
        </a>

        <a href="<?php echo get_permalink($settings['recommend']); ?>">
          <div class="KCPL_horz-multi KCPL_background-red">
            <div class="gutter">
               <span>Search Recommended Books</span>
            </div>
          </div>
        </a>

        <div class="KCPL_listing4">
          <span class="title KCPL_background-red">User Curated List</span>
          <div class="gutter clearfix">
            <div class="row">
              <?php $bl = KCPL_OC_booklist::getUserBooklists(4,1,get_current_user_id(),false);
                if(is_array($bl)){
                  $i=1;
                  foreach($bl[0] as $b){
                    echo "<div class='entry kcpl_oc-mylist' id='kcpl_oc-mylist-".$b['id']."'>
                            <div class='image'><img src='".$b['img']."'/></div>
                            <div class='number'>".$i."</div>
                            <div class='content'>
                              <span class='entry-title'><a href='http://kana.ent.sirsi.net/client/en_US/http:/search/results/?ln=en_US&q=".str_replace(' ', '+', esc_html($b['title']))."&lm=PRINTONLY&qf=&rw=0'>".$b['title']."</a></span>
                              <span class='entry-author'>".$b['author']."</span>
                            </div>
                          </div>";
                    $i++;
                  }
                }else{
                  echo $bl;
                } ?>
            </div>
          </div>
        </div>

        <?php KCPL_OC_booklist::booklistNewButton(); ?>

        <?php KCPL_Calendar::relatedEvents(); ?>

      </div>
      <?php }else{ ?>
        <h2>Join Our Online Community Today!</h2>
        <p>We are proud to announce we have a new online community you can join for free. Now you can connect with your library from home with ease. Participate in online discussions, create and share reading lists, recommend books to others and more!
         Login or create a free account below by providing a username, password and valid email address.</p><p>Current library cardholders must register for an account and cannot use their library card and PIN to access the Online Community.</p>


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
