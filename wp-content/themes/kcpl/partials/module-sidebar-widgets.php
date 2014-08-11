<?php global $post;
$pID = KCPL_get_menu_parent_ID();
$sidebar = KCPL_get_sidebar($pID);

foreach($sidebar as $widget){
  //horizontal callout - single
  if($widget['field_type'] == 'horizontal-callout-single'){ ?>

    <?php if($widget['field_link'] != ''){ ?>
      <a target="_blank" href="<?php echo $widget['field_link']; ?>">
    <?php } ?>
        <div class="KCPL_horz-single KCPL_background-<?php echo $widget['field_color']; ?>">
          <div class="gutter">
             <span><?php echo $widget['horizontal_callout-single_title']; ?></span>
          </div>
        </div>
    <?php if($widget['field_link'] != ''){ ?>
      </a>
    <?php } ?>


  <?php }elseif($widget['field_type'] == 'horizontal-callout-multi'){
    //horizontal callout - multi ?>

    <?php if($widget['field_link'] != ''){ ?>
      <a target="_blank" href="<?php echo $widget['field_link']; ?>">
    <?php } ?>
      <div class="KCPL_horz-multi KCPL_background-<?php echo $widget['field_color']; ?>">
        <div class="gutter">
           <span><?php echo $widget['horizontal_callout-multi_title']; ?></span>
           <?php if($widget['field_link'] != ''){ ?>
             <a class="KCPL_readmore" href="<?php echo $widget['field_link']; ?>">Read More ≈</a>
           <?php } ?>
        </div>
      </div>

    <?php if($widget['field_link'] != ''){ ?>
      </a>
    <?php } ?>

  <?php }elseif($widget['field_type'] == 'listing-style-1-1'){
    //listing style 1-1 ?>

    <div class="KCPL_listing1-article KCPL_background-<?php echo $widget['field_color']; ?>">
      <span class="title"><?php echo $widget['field_title']; ?></span>
      <div class="gutter">
        <?php foreach($widget['resources'] as $post){
          setup_postdata($post); ?>
          <div class="entry">
             <a href="<?php the_permalink(); ?>"><span class="entry-title"><?php the_title(); ?></span></a>
             <div class="entry-excerpt">
                 <?php the_excerpt(); ?>
             </div>
             <a href="<?php the_permalink(); ?>" class="KCPL_readmore">Learn more ≈</a>
          </div>
        <?php } wp_reset_postdata(); ?>
      </div>
    </div>

  <?php }elseif($widget['field_type'] == 'listing-style1-2'){
    //listing style 1-2 ?>

    <div class="KCPL_listing1-list KCPL_background-<?php echo $widget['field_color']; ?>">
       <span class="title"><?php echo $widget['field_title']; ?></span>
       <div class="gutter">
          <span class="list-title"><?php echo $widget['listing_title'];?></span>
          <ul>
             <?php foreach($widget['urls'] as $list){ ?>
                <li><a href="<?php echo $list['url']; ?>"><?php echo $list['title']; ?></a></li>
             <?php } ?>
          </ul>
          <?php if($widget['field_link'] != ''){ ?>
            <a class="KCPL_readmore" href="<?php echo $widget['field_link']; ?>">More Info ≈</a>
          <?php } ?>
       </div>
    </div>

  <?php }elseif($widget['field_type'] == 'listing-style-3'){
    //listing style 3 ?>

    <div class="KCPL_listing-style-3">
        <div class="KCPL_listing-style-3-header">
            <span><?php echo $widget['field_title']; ?></span>
        </div>
        <?php foreach($widget['posts'] as $post){
          setup_postdata($post); ?>
          <div class="KCPL_listing-style-3-body">
              <a href="<?php the_permalink(); ?>"><span class="KCPL_listing-style-3-body-title"><?php the_title(); ?></span></a>
              <span class="KCPL_listing-style-3-body-date"><?php the_time('F j, Y'); ?></span>
              <span class="KCPL_listing-style-3-body-excerpt"><?php the_excerpt(); ?></span>
              <a class="KCPL_listing-style-3-body-link KCPL_readmore" href="<?php the_permalink(); ?>">More &nbsp; ≈</a>
          </div>
        <?php } wp_reset_postdata(); ?>
        <div class="KCPL_listing-style-3-body">
            <a class="KCPL_listing-style-3-body-link KCPL_readmore" href="<?php echo get_post_type_archive_link('post'); ?>">Read all &nbsp; ≈</a>
        </div>
    </div>

  <?php }else{
    echo "Hasn't been configured yet. Deal with it.";
  }
} ?>
