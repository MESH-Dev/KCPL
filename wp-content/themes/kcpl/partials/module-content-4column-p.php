<?php

  $contentArr = get_field('four_column_widgets');


  if($contentArr){
    echo "<div id='KCPL_content_8col' class='clearfix'>";
  }

  $count = 1;
  $p = 1;
  $len = count($contentArr);

  // array
  echo "<div class='columns eight alpha'>";

  $count = 0;

  for($x=0; $x < $len; $x++){

    $count = $count + 1;

    if($x%9 == 0){
      echo "<div class='paginate p-". $p ."'>";

      if($p == 1)
        $y = 0;
      else
         $y = ($p*10)-10;

      $stop = $y+10;
      $ctr = 0;

      //LEFT COLUMN DIVS
      for($y; $y < $stop; $y++){
        if($y%2 == 0){
          if($y%10 == 0){
            echo "<div class='columns four alpha'>";
          } ?>

        <?php if($contentArr[$y]['single_featured_item_description'] !=''){ ?>
        <div class="KCPL_single-featured <?php if($contentArr[$y]['single_featured_item_image'] != false){echo 'fimage';} ?>">
          <span class="title KCPL_background-<?php echo $contentArr[$y]['field_color']; ?>"><?php echo $contentArr[$y]['field_title']; ?></span>
          <div class="gutter">
            <?php if($contentArr[$y]['single_featured_item_image'] != false){ ?>
              <div class="image">
                <img src="<?php echo $contentArr[$y]['single_featured_item_image']; ?>" />
              </div>
            <?php } ?>
             <div class="entry">
                <span class="entry-title"><?php echo $contentArr[$y]['single_featured_item']; ?></span>
                <span class="entry-date"><?php echo $contentArr[$y]['single_featured_item_supporting_info']; ?></span>
                <div class="entry-excerpt">
                    <?php echo $contentArr[$y]['single_featured_item_description']; ?>
                </div>
                 <?php if($contentArr[$y]['single_featured_item_link_url'] !=''){ ?>
              <a href="<?php echo $contentArr[$y]['single_featured_item_link_url']; ?>" class="KCPL_readmore"><?php echo $contentArr[$y]['single_featured_item_link_text']; ?></a>
              <?php }?>
             </div>
          </div>
        </div>

        <?php }

          if($ctr!=0 && $ctr%8 == 0){
            echo "</div>";
          }
        } //end left odd loop
        $ctr++;
      }//end left 10's loop



      if($p == 1)
        $y = 0;
      else
         $y = ($p*10)-10;

      $stop = $y+10;
      $ctr = 0;

      //RIGHTCOLUMN DIVS
      for($y; $y < $stop; $y++){
        if($y%2 == 1){
          if($y%10 == 1){
            echo "<div class='columns four omega'>";
          }?>

        <?php if($contentArr[$y]['single_featured_item_description'] !=''){ ?>
        <div class="KCPL_single-featured <?php if($contentArr[$y]['single_featured_item_image'] != false){echo 'fimage';} ?>">
          <span class="title KCPL_background-<?php echo $contentArr[$y]['field_color']; ?>"><?php echo $contentArr[$y]['field_title']; ?></span>
          <div class="gutter">
            <?php if($contentArr[$y]['single_featured_item_image'] != false){ ?>
              <div class="image">
                <img src="<?php echo $contentArr[$y]['single_featured_item_image']; ?>" />
              </div>
            <?php } ?>
             <div class="entry">
                <span class="entry-title"><?php echo $contentArr[$y]['single_featured_item']; ?></span>
                <span class="entry-date"><?php echo $contentArr[$y]['single_featured_item_supporting_info']; ?></span>
                <div class="entry-excerpt">
                    <?php echo $contentArr[$y]['single_featured_item_description']; ?>
                </div>
                 <?php if($contentArr[$y]['single_featured_item_link_url'] !=''){ ?>
              <a href="<?php echo $contentArr[$y]['single_featured_item_link_url']; ?>" class="KCPL_readmore"><?php echo $contentArr[$y]['single_featured_item_link_text']; ?></a>
              <?php }?>
             </div>
          </div>
        </div>
        <?php }


          if($ctr%9 == 0){
            echo "</div>";
          }

        }//end right odd loop
        $ctr++;
      }//End loop of 10's


      $p = $p + 1; // increase first set
      echo "</div>"; //end of pagination set

    }//end loop for pagination wrap

  }//END FULL OUTER LOOP

 ?>
</div>

<div class="clearfix"></div>

    <?php if($count > 10) { ?>

    <div class="page-numbers-container">
    </div>

    <?php } ?>

<!--
        <div class="KCPL_single-featured <?php if($contentArr[$y]['single_featured_item_image'] != false){echo 'fimage';} ?>">
          <span class="title KCPL_background-<?php echo $contentArr[$y]['field_color']; ?>"><?php echo $contentArr[$y]['field_title']; ?></span>
          <div class="gutter">
            <?php if($contentArr[$y]['single_featured_item_image'] != false){ ?>
              <div class="image">
                <img src="<?php echo $contentArr[$y]['single_featured_item_image']; ?>" />
              </div>
            <?php } ?>
             <div class="entry">
                <span class="entry-title"><?php echo $contentArr[$y]['single_featured_item']; ?></span>
                <span class="entry-date"><?php echo $contentArr[$y]['single_featured_item_supporting_info']; ?></span>
                <div class="entry-excerpt">
                    <?php echo $contentArr[$y]['single_featured_item_description']; ?>
                </div>
                 <?php if($contentArr[$y]['single_featured_item_link_url'] !=''){ ?>
              <a href="<?php echo $contentArr[$y]['single_featured_item_link_url']; ?>" class="KCPL_readmore"><?php echo $contentArr[$y]['single_featured_item_link_text']; ?></a>
              <?php }?>
             </div>
          </div>
        </div>

        <div class="clearfix"></div>
    <div class="page-numbers-container">
    </div>

-->
