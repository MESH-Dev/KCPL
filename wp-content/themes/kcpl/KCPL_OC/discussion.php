<?php
  /* Template Name: OC | Discussions */
get_header();
global $post;
$pID = KCPL_get_highest_ancestor($post);
$sidebar = KCPL_get_sidebar($pID);
$color = get_field('section_color',$pID);
$settings = get_option('kcpl-oc'); ?>

<?php include_once(locate_template('partials/module-breadcrumbs.php')); ?>

<div id="content">
  <div class="container">
    <div class="columns four alpha" id="contentSecondary">
      <?php if(has_nav_menu('main_nav')){
          $defaults = array(
            'theme_location'  => 'main_nav',
            'menu'            => 'main_nav',
            'container'       => 'div',
            'container_class' => '',
            'container_id'    => 'secondary-sidebar-nav',
            'menu_class'      => 'menu clearfix',
            'menu_id'         => 'main_nav_secondary',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth'           => 0,
            'walker'          => ''
          ); wp_nav_menu( $defaults );
        }else{
          echo "<p><em>main_nav</em> doesn't exist! Create it and it'll render here.</p>";
        } ?>
      <?php get_template_part('partials/module','sidebar-widgets'); ?>
    </div>
    <div class="columns eight omega" id="contentPrimary">
      <?php
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $posts = get_posts(array(
        'post_type' => 'kcpl_oc-discussion',
        'paged'     => $paged,
      ));
      $postCount = count($posts);
      $lCol = array_slice($posts,0,$postCount/2);
      $rCol = array_slice($posts,$postCount/2); ?>

      <div class="columns four alpha">
        <?php foreach($lCol as $post){
          setup_postdata($post); ?>

          <div class="KCPL_single-featured">
             <span class="title KCPL_background-red"> </span>
             <div class="gutter">
                <div class="entry">
                   <span class="entry-title"><?php the_title(); ?></span>
                   <div class="entry-excerpt">
                       <?php the_excerpt(); ?>
                   </div>
                   <a href="<?php the_permalink(); ?>" class="KCPL_readmore">Join ≈</a>
                </div>
             </div>
           </div>

        <?php } ?>
      </div>
      <div class="columns four omega">
        <?php foreach($rCol as $post){
          setup_postdata($post); ?>

          <div class="KCPL_single-featured">
             <span class="title KCPL_background-red"> </span>
             <div class="gutter">
                <div class="entry">
                   <span class="entry-title"><?php the_title(); ?></span>
                   <div class="entry-excerpt">
                       <?php the_excerpt(); ?>
                   </div>
                   <a href="<?php the_permalink(); ?>" class="KCPL_readmore">Join ≈</a>
                </div>
             </div>
           </div>

        <?php } ?>
      </div>



    </div>
  </div>
</div>

<?php get_footer(); ?>
