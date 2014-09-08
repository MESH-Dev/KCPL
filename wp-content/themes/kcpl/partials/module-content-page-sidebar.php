<?php foreach($rightSidebar as $widget){

    if($widget['field_type'] == 'info-box'){  ?>
        <div class="KCPL_single-featured ?>">
          <span class="title KCPL_background-<?php echo $widget['field_color']; ?>"><?php echo $widget['field_title']; ?></span>
          <div class="gutter">

             <div class="entry">
                <span class="entry-title"><?php echo $widget['title']; ?></span>
                <span class="entry-date"><?php echo $widget['supporting_info']; ?></span>
                <div class="entry-excerpt">
                    <?php echo $widget['description']; ?>
                </div>
                <a href="<?php echo $widget['link_url']; ?>" class="KCPL_readmore"><?php echo $widget['link_text']; ?></a>
             </div>
          </div>
        </div>
  <?php }

  if($widget['field_type'] == 'button'){  ?>
      <a href="<?php echo $widget['link_url']; ?>">
        <div class="KCPL_short-callout KCPL_background-<?php echo $widget['field_color']; ?>">
          <span><?php echo $widget['field_title']; ?></span>
        </div>
      </a>
  <?php  }





}?>