<?php $pID = KCPL_get_menu_parent_ID();
$sidebar = KCPL_get_sidebar($pID);

foreach($sidebar as $widget){
  if($widget['field_type'] == 'horizontal-callout-single'){ ?>

    <div class="KCPL_horz-single KCPL_background-<?php echo $widget['field_color']; ?>">
      <div class="gutter">
         <span><?php echo $widget['horizontal_callout-single_title']; ?></span>
      </div>
    </div>

  <?php }elseif($widget['field_type'] == 'horizontal-callout-multi'){ ?>

    <div class="KCPL_horz-multi KCPL_background-<?php echo $widget['field_color']; ?>">
      <div class="gutter">
         <span><?php echo $widget['horizontal_callout-multi_title']; ?></span>
      </div>
    </div>

  <?php }else{
    echo "Hasn't been configured yet. Deal with it.";
  }
} ?>
