<?php get_header();
global $post;
$pID = KCPL_get_highest_ancestor($post);
$sidebar = KCPL_get_sidebar($pID);
$color = get_field('section_color',$pID);

?>

<?php $post->ID = 212; ?>

<?php include_once(locate_template('partials/module-breadcrumbs.php')); ?>

<div id="content">
  <div class="container">
    <?php include_once(locate_template('partials/module-sidebar-nav.php')); ?>

    <div class="columns eight omega page-content" id="contentPrimary">
      <div class="column eight alpha omega">
        <div class="gutter">
          <h3>We're sorry, we couldn't find what you're looking for.</h3>
          <p>Suggestions:
            <ul>
              <li>If you typed in a specific URL, check for error and resubmit.</li>
              <li>Click the back button on your browser and search again.</li>
              <li>Type what you're looking for into our search bar.</li>
            </ul>
          </p>
          <div class="search-box">
             <?php get_search_form(); ?>
          </div>
        </div>
      </div>

    </div>

  </div>
</div>

<?php get_footer(); ?>
