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
                              <span class='entry-title'>".$b['title']."</span>
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
      <?php }else{
        echo "<p>You must be logged in to access the Online Community</p>"; ?>
    </div>

  </div>
</div>

<?php } } ?>

<?php get_footer(); ?>
