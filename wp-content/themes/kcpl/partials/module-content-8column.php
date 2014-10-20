<?php
  $content = get_field('full_width_callouts');
  if($content){
    echo "<div id='KCPL_content_8col' class='clearfix'>";
  }
  foreach($content as $widget){
    if($widget['field_type'] == 'listing-style-4'){
      //CURATED LISTING ?>
      <div class="KCPL_listing4 curated">
        <span class="title KCPL_background-<?php echo $widget['field_color']; ?>"><?php echo $widget['field_title']; ?></span>
        <div class="gutter">
           <div class="row">

              <?php $i=0;
              foreach($widget['listing_style_4'] as $entry){

                if($i%2==0 && $i!=0){echo '</div><div class="row">';}
                $img = wp_get_attachment_image_src($entry['image'],'small'); ?>
              <div class="entry">
                  <div class="image"><img src="<?php echo $img[0]; ?>" /></div>
                  <!--<div class="number"><?php echo $i+1; ?></div>-->
                  <div class="content">
                    <span class="entry-title">
                      <?php if($entry['link']!=''){ ?>
                         <a href="<?php echo $entry['link']; ?>"><?php echo $entry['title']; ?></a>

                      <?php }else{echo $entry['title']; }?>
                    </span>
                    <span class="entry-author"><?php echo $entry['author']; ?></span>
                  </div>
              </div>
              <?php $i++; } ?>



           </div>

             <?php if($widget['field_link'] !=''){ ?>
                <a href="<?php echo $widget['field_link']; ?>" class="KCPL_readmore">See More ≈ </a>
              <?php } ?>

        </div>
      </div>
    <?php }elseif($widget['field_type'] == '8-column-featured'){
      //8 column featured ?>
      <div class="KCPL_featured KCPL_background-l-<?php echo $widget['field_color']; ?> clearfix">
        <div class="gutter clearfix">
          <?php foreach($widget['8_column_featured'] as $entry){ ?>
           <div class="entry <?php echo cycle('left','center','right'); ?>">
              <div class="gutter">
                <div class="image ">
                    <div class="wrap">
                       <img src="<?php echo $entry['icon']; ?>" />
                    </div>
                </div>
                <span class="title"><?php echo $entry['title']; ?></span>
                <div class="excerpt">
                    <?php echo $entry['excerpt']; ?>
                </div>
                <a href="<?php echo $entry['read_more_link']; ?>" class="KCPL_readmore"><?php echo $entry['read_more_text']; ?></a>
              </div>
           </div>
           <?php } ?>
        </div>
      </div>
    <?php }

    elseif($widget['field_type'] == 'video'){
      echo "<div class='KCPL_videoembed'>".$widget['video_embedded']."</div>";
    }
    elseif($widget['field_type'] == 'wysiwyg'){ ?>
    <div class="KCPL_listing4 wysiwyg">
       <span class="title KCPL_background-<?php echo $widget['field_color']; ?>"><?php echo $widget['field_title']; ?></span>
       <div class="gutter">
        <?php echo $widget['content']; ?>
       </div>
     </div>


    <?}
    else{
      echo "field type not valid";
    }
  }
  if($content){
    echo "</div>";
  }

?>
