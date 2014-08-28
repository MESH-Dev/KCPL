<?php

  $contentArr = get_field('four_column_widgets');

  if($contentArr){
    echo "<div id='KCPL_content_8col' class='clearfix'>";
  }

  $count = 1;
  $p = 1;
  $len = count($contentArr);

  // array
  echo "<div class='columns eight'>";

  foreach($contentArr as $widget){

    // If it's the first one, open a div

    if ($count % 10 == 1) {
        echo "<div class='paginate p-". $p ."'>";
        $p = $p + 1;
    }

    // Start of the single items

    if($widget['field_type'] == 'single-featured'){

      echo "<div class='columns four ".cycle('alpha','omega')."'>";

      //single featured item ?>

        <div class="KCPL_single-featured <?php if($widget['single_featured_item_image'] != false){echo 'fimage';} ?>">
          <span class="title KCPL_background-<?php echo $widget['field_color']; ?>"><?php echo $widget['field_title']; ?></span>
          <div class="gutter">
            <?php if($widget['single_featured_item_image'] != false){ ?>
              <div class="image">
                <img src="<?php echo $widget['single_featured_item_image']; ?>" />
              </div>
            <?php } ?>
             <div class="entry">
                <span class="entry-title"><?php echo $widget['single_featured_item']; ?></span>
                <span class="entry-date"><?php echo $widget['single_featured_item_supporting_info']; ?></span>
                <div class="entry-excerpt">
                    <?php echo $widget['single_featured_item_description']; ?>
                </div>
                <a href="<?php echo $widget['single_featured_item_link_url']; ?>" class="KCPL_readmore"><?php echo $widget['single_featured_item_link_text']; ?></a>
             </div>
          </div>
        </div>

      </div>

    <?php }elseif($widget['field_type'] == 'listing-style-1-1'){

      echo "<div class='columns four ".cycle('alpha','omega')."'>";

      //listing style 1-1 ?>

        <div class="KCPL_listing1-article KCPL_background-<?php echo $widget['field_color']; ?>">
          <span class="title"><?php echo $widget['field_title']; ?></span>
          <div class="gutter">
            <?php foreach($widget['listing_style_1-1'] as $entry){
              if($entry['reference'] == true){
                $post = $entry['reference_post'];
                setup_postdata($post);
                $link = get_permalink();
                $title = get_the_title();
                $excerpt = get_the_excerpt();
              }else{
                $title= $entry['title'];
                $excerpt = $entry['description'];
                $link = $entry['link_url'];
              } ?>
              <div class="entry">
                 <a href="<?php echo $link; ?>"><span class="entry-title"><?php echo $title; ?></span></a>
                 <div class="entry-excerpt">
                     <?php echo $excerpt; ?>
                 </div>
                 <a href="<?php echo $link; ?>" class="KCPL_readmore"><?php echo $entry['link_text']; ?></a>
              </div>
            <?php } wp_reset_postdata(); ?>
          </div>
        </div>

      </div>

    <?php }elseif($widget['field_type'] == 'listing-style1-2'){

      echo "<div class='columns four ".cycle('alpha','omega')."'>";

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

      </div>

    <?php }elseif($widget['field_type'] == 'listing-style-3'){
      //listing style 3 ?>

      listing-style-3

    <?php }elseif($widget['field_type'] == 'listing-style-4'){

      echo "<div class='columns four ".cycle('alpha','omega')."'>";

      //listing style 4 ?>

        <div class="KCPL_listing4">
          <span class="title KCPL_background-<?php echo $widget['field_color']; ?>"><?php echo $widget['field_title']; ?></span>
          <div class="gutter">
             <div class="row">

                <?php $i=0;
                foreach($widget['listing_style_4'] as $entry){
                  if($i%2==0 && $i!=0){echo '</div><div class="row">';}
                  $img = wp_get_attachment_image_src($entry['image'],'small'); ?>
                <div class="entry">
                    <div class="image"><img src="<?php echo $img[0]; ?>" /></div>
                    <div class="number"><?php echo $i+1; ?></div>
                    <div class="content">
                      <span class="entry-title"><?php echo $entry['title']; ?></span>
                      <span class="entry-author"><?php echo $entry['author']; ?></span>
                    </div>
                </div>
                <?php $i++; } ?>

             </div>
          </div>
        </div>

      </div>

    <?php }else{
      echo "Hasn't been configured yet. Deal with it.";
    }

    // End of the single items

    // If it's the last one, close the div

    if ($count%10==0 || $count == $len) {
        echo "</div>";
    }

    $count = $count + 1;

  }

  if ($count > 11) { ?>

    <div class="clearfix"></div>
    <div class="page-numbers-container">
    </div>

  <?php }

  echo "</div>";

  if($content){
    echo "</div>";
  }
?>
