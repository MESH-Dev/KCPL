<?php
  /* Template Name: OC | Booklist Edit */
get_header();
global $post;
$pID = KCPL_get_highest_ancestor($post);
$sidebar = KCPL_get_sidebar($pID);
$color = get_field('section_color',$pID);
$bid = $_GET['bid'];
$np = get_post($bid);

?>


<?php if(have_posts()){while(have_posts()){the_post(); ?>

<?php include_once(locate_template('partials/module-breadcrumbs.php')); ?>

<div id="content">
  <div class="container">
    <?php include_once(locate_template('partials/module-sidebar-nav.php')); ?>

    <div class="columns eight omega" id="contentPrimary">

      <?php if(isset($bid) && $np->post_type == 'kcpl_oc-booklist'){
        if($np->post_author == get_current_user_id()){
          $valid = true;
        }else{
          $valid = false;
          echo "You don't have permission to edit this booklist. How about creating a new booklist?";
        }
      }else{
        $valid = false;
        echo "This booklist doesn't exist anymore, sorry about that. Head back to your booklists and edit another one.";
      } ?>
      <?php if($valid == true){ ?>
        <div class="columns four alpha">
          <div class='KCPL_listing4'>
            <span class='title KCPL_background-red'><?php echo $np->post_title ?></span>
            <div class='gutter clearfix'>
          <?php KCPL_OC_booklist::bookListForm('Name of list','Tags, Tags','Search to add materials',$bid); ?>
            </div>
          </div>
        </div>
        <div class="columns four omega">
          <?php KCPL_OC_booklist::bookListSaveButton();
                KCPL_OC_booklist::bookListCont("Your Books",'red',true,$bid); ?>
        </div>
      <?php } ?>

    </div>

  </div>
</div>

<?php } } ?>

<?php get_footer(); ?>
