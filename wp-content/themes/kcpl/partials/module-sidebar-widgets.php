<?php $pID = KCPL_get_menu_parent_ID();
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

  <?php }else{
    echo "Hasn't been configured yet. Deal with it.";
  }
} ?>
