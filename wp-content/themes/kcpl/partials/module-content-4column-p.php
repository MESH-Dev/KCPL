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
