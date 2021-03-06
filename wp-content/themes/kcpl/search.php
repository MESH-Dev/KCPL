<?php
$search_refer = $_GET["search-type"];
if ($search_refer == 'resources') { load_template(TEMPLATEPATH . '/resources-search.php'); }
else{

get_header();
global $post;
$pID = KCPL_get_highest_ancestor($post);
$sidebar = KCPL_get_sidebar($pID);
$color = get_field('section_color',$pID);

?>

<div id="banner" class="KCPL_background-blue">
  <div class="container">
      <div class="gutter">
        <div id="searchResults">
          <span>Search Results</span>
        </div>
      </div>
  </div>
</div>


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
                    <?php

                      if ($post->post_type == 'kcpl_calendar_entry') {
                        $t = get_post_meta($post->ID, 'description', true);
                        echo $t;
                        echo '<a class="read-more" href="'. get_permalink( $post->ID ) . '">' . __('View Event »', 'your-text-domain') . '</a>';
                      } elseif ($post->post_type == 'kcpl_oc-discussion') {
                        echo '<a class="read-more" href="'. get_permalink( $post->ID ) . '">' . __('View Discussion »', 'your-text-domain') . '</a>';
                      } elseif ($post->post_type == 'resources') {
                        echo '<a class="read-more" href="'. get_field( 'url' , $post->ID ) . '">' . __('View Resource »', 'your-text-domain') . '</a>';
                      } else {
                        echo '<a class="read-more" href="'. get_permalink( $post->ID ) . '">' . __('Read More »', 'your-text-domain') . '</a>';
                      }

                    ?>
                    <p>
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

      <?php } } else { ?>

        <div class="eight columns alpha page-content">
          <div class="gutter">
            <h3>No results returned! Try another search.</h3>
            <div class="search-box">
              <?php get_search_form(); ?>
            </div>
          </div>
        </div>

      <?php } ?>

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

<?php get_footer();

}?>
