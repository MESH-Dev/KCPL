<?php
  $content = get_field('full_width_callouts');
  foreach($content as $widget){

    if($widget['field_type'] == 'listing-style-4'){
      //listing style 4 ?>
      <div class="KCPL_listing4">
        <span class="title KCPL_background-<?php echo $widget['field_color']; ?>">title</span>
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

    <?php }elseif($widget['field_type'] == '8-column-featured'){
      //8 column featured ?>


    <?php }else{
      echo "field type not valid";
    }

  }

?>
