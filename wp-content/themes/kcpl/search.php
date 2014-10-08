<?php get_header();
global $post;
$pID = KCPL_get_highest_ancestor($post);
$sidebar = KCPL_get_sidebar($pID);
$color = get_field('section_color',$pID);

?>

<?php include_once(locate_template('partials/module-breadcrumbs.php')); ?>

<div id="content">
  <div class="container">
    <?php include_once(locate_template('partials/module-sidebar-nav.php')); ?>

    <div class="columns eight omega" id="contentPrimary">

      <?php $i = 0; ?>

      <?php if(have_posts()){while(have_posts()){the_post(); ?>

        <?php

          // Open the row

          if($i%2 == 0) {
            echo '<div class="row">';
          }

        ?>

        <div class="columns four <?php if($i%2 == 0) { echo 'alpha'; } else { echo 'omega'; } ?>">
          <div class="gutter">

            <div class="KCPL_single-featured">
              <span class="title KCPL_background-blue"><?php the_title(); ?></span>
              <div class="gutter">
                <div class="entry">
                  <div class="entry-excerpt">
                    <?php the_excerpt(); ?>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

        <?php

          // Close the row

          if($i%2 == 1) {
            echo '</div>';
          }

        ?>

      <?php $i = $i + 1; ?>

      <?php } } ?>

      <?php if($i%2 == 1) {

        // If the number of results was odd, close the row

        echo '</div>';
      } ?>

      <?php if($rsCount != 0){ ?>

        <div class="columns two omega">
          <?php include_once(locate_template('partials/module-content-page-sidebar.php')); ?>
        </div>

      <?php } ?>

      <div class="search-page-numbers-container">

        <?php
        global $wp_query;

        $big = 999999999; // need an unlikely integer

        echo paginate_links( array(
        	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        	'format' => '?paged=%#%',
          'prev_text' => ('<i class="fa fa-angle-double-left"></i>'),
          'next_text' => ('<i class="fa fa-angle-double-right"></i>'),
        	'current' => max( 1, get_query_var('paged') ),
        	'total' => $wp_query->max_num_pages
        ) );
        ?>

      </div>

    </div>

  </div>
</div>

<?php get_footer(); ?>
