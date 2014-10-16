<?php

  $contentArrL = get_field('four_column_widgets-left');
  $contentArrR = get_field('four_column_widgets-right');
  if($contentArrL || $contentArrR){
    echo "<div id='KCPL_content_4col' class='clearfix'>";
  }

  //left array
  echo "<div class='columns four alpha'>";
  foreach($contentArrL as $widget){

     if($widget['field_type'] == 'horizontal-callout-single'){ ?>

    <?php if($widget['new_tab'][0] == '_blank'){ $target = "_blank"; } else $target = "_self";?>
    <?php if($widget['field_link'] != ''){ ?>
      <a target="<?php echo $target; ?>" href="<?php echo $widget['field_link']; ?>">
    <?php } ?>
        <div class="KCPL_horz-single KCPL_background-<?php echo $widget['field_color']; ?>">
          <div class="gutter">
             <span><?php echo $widget['horizontal_callout-single_title']; ?></span>
          </div>
        </div>
    <?php if($widget['field_link'] != ''){ ?>
      </a>
    <?php } ?>

  <?php }elseif($widget['field_type'] == 'card'){
    //horizontal callout - multi ?>

    <?php if($widget['field_link'] != ''){ ?>
      <a target="_blank" href="<?php echo $widget['field_link']; ?>">
    <?php } ?>
        <div class="KCPL_horz-card KCPL_background-<?php echo $widget['field_color']; ?>">
          <div class="gutter">
             <span class="KCPL_horz-card-first">Get your free</span> <span class="KCPL_horz-card-last">library card</span>
          </div>
        </div>
    <?php if($widget['field_link'] != ''){ ?>
      </a>
    <?php } ?>

  <?php }elseif($widget['field_type'] == 'horizontal-callout-multi'){
    //horizontal callout - multi ?>

    <?php if($widget['new_tab'][0] == '_blank'){ $target = "_blank"; } else $target = "_self";?>
    <?php if($widget['field_link'] != ''){ ?>
      <a target="<?php echo $target; ?>" href="<?php echo $widget['field_link']; ?>">
    <?php } ?>
      <div class="KCPL_horz-multi KCPL_background-<?php echo $widget['horizontal_callout_color']; ?>">
        <div class="gutter">
          <?php if($widget['horizontal_callout_alert'] == 'yes'){?> <span class="alert"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/alert.png" /> </span><?php } ?>
           <span><?php echo $widget['horizontal_callout-multi_title']; ?></span>
           <?php if($widget['field_link'] != ''){ ?>
             <a class="KCPL_readmore" href="<?php echo $widget['field_link']; ?>" target="<?php echo $target; ?>">Read More ≈</a>
           <?php } ?>
        </div>
      </div>

    <?php if($widget['field_link'] != ''){ ?>
      </a>
    <?php } ?>

  <?php }
    elseif($widget['field_type'] == 'single-featured'){
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
              <?php if($widget['new_tab'][0] == '_blank'){ $target = "_blank"; } else $target = "_self";?>
              <?php if($widget['single_featured_item_link_url'] !=''){ ?>
              <a href="<?php echo $widget['single_featured_item_link_url']; ?>" target="<?php echo $target; ?>" class="KCPL_readmore"><?php echo $widget['single_featured_item_link_text']; ?></a>
              <?php }?>
           </div>
        </div>
      </div>

    <?php }elseif($widget['field_type'] == 'listing-style-1-1'){
      //Multi Link list ?>

      <div class="KCPL_listing1-article KCPL_background-l-<?php echo $widget['field_color']; ?>">
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
            <?php if($entry['new_tab'][0] == '_blank'){ $target = "_blank"; } else $target = "_self";?>
            <div class="entry">
               <a href="<?php echo $link; ?>" target="<?php echo $target;?>"><span class="entry-title"><?php echo $title; ?></span></a>
               <div class="entry-excerpt">
                   <?php echo $excerpt; ?>
               </div>
               <a href="<?php echo $link; ?>" target="<?php echo $target;?>" class="KCPL_readmore"><?php echo $entry['link_text']; ?></a>
            </div>
          <?php } wp_reset_postdata(); ?>
        </div>
      </div>

    <?php }elseif($widget['field_type'] == 'listing-style1-2'){
      //listing style 1-2 ?>

      <div class="KCPL_listing1-list KCPL_background-l-<?php echo $widget['field_color']; ?>">
         <span class="title"><?php echo $widget['field_title']; ?></span>
         <div class="gutter">

            <ul>
               <?php foreach($widget['urls'] as $list){ ?>
                <?php if($list['tab'][0] == '_blank'){ $target = "_blank"; } else $target = "_self";?>
                <li><a href="<?php echo $list['url']; ?>" target="<?php echo $target;?>"><?php echo $list['title']; ?></a></li>
               <?php } ?>
            </ul>
            <?php if($widget['field_link'] != ''){ ?>
              <a class="KCPL_readmore" href="<?php echo $widget['field_link']; ?>">More Info ≈</a>
            <?php } ?>
         </div>
      </div>

    <?php } elseif($widget['field_type'] == 'listing-style-4'){
      //CURATED LISTING ?>

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

    <?php }
    elseif($widget['field_type'] == 'recs'){
    //OC Recommendations  ?>

    <div class="KCPL_listing4">
      <span class="title KCPL_background-red">Most Recommended Books<?php echo $widget['field_title']; ?></span>
      <div class="gutter">
        <?php KCPL_OC_recommended::getMostRecommended(); ?>
      </div>
    </div>

  <?php }
  elseif($widget['field_type'] == 'listing-style-3'){
    //OC Discussions  ?>

    <div class="KCPL_single-featured">
      <span class="title KCPL_background-red"><?php echo $widget['field_title']; ?></span>
      <div class="gutter">
        <?php KCPL_OC_discussions::getSocialDiscussion(5); ?>
      </div>
    </div>

  <?php }
  elseif($widget['field_type'] == 'ask'){
    //listing style 3 ?>

    <div class="KCPL_single-featured ">
       <span class="title KCPL_background-<?php echo $widget['field_color']; ?>">Ask A Librarian</span>
       <div class="gutter">

        <iframe src="http://libraryh3lp.com/chat/kcpltest@chat.libraryh3lp.com?skin=13921&amp;theme=alphamod&amp;title=&amp;identity=KCPL&amp;sounds=true" frameborder="1" style="width: 100%; height: 360px; border: none;"> </iframe>

       </div>
    </div>

  <?php }
   elseif($widget['field_type'] == 'listing-style-2-1'){
    //listing style 3
    ?>

    <?php KCPL_Calendar::upcomingEvents(); ?>

  <?php }
  elseif($widget['field_type'] == 'vertical-block'){
    //NEED TO SET UP 2-COLS HERE ?>

    <div class=" KCPL_background-<?php echo $widget['field_color']; ?>">
       <span class="title"><?php echo $widget['field_title']; ?></span>
       <div class="gutter">



        </div>

    </div>

  <?php }

  elseif($widget['field_type'] == 'vertical-graphic-callout'){
    //Graphic Callouts

    $i = 0;

    echo '<div class="KCPL_vertical-callout clearfix">';

    foreach($widget['vertical_graphic_callout'] as $entry){

      if ($i == 0) {
          echo '<div class="two columns alpha">';
          $i = $i + 1;
      } else {
        echo '<div class="two columns omega">';
      }

      if ($entry['graphic_callout_type'] == 'blue-shapes') {
        echo '<img src="' . get_template_directory_uri() . '/assets/img/verticalgraphiccallouts01_blue.png">';
      } elseif ($entry['graphic_callout_type'] == 'green-shapes') {
        echo '<img src="' . get_template_directory_uri() . '/assets/img/verticalgraphiccallouts01_green.png">';
      } elseif ($entry['graphic_callout_type'] == 'purple-shapes') {
        echo '<img src="' . get_template_directory_uri() . '/assets/img/verticalgraphiccallouts01_purple.png">';
      } elseif ($entry['graphic_callout_type'] == 'red-shapes') {
        echo '<img src="' . get_template_directory_uri() . '/assets/img/verticalgraphiccallouts01_red.png">';
      } elseif ($entry['graphic_callout_type'] == 'yellow-shapes') {
        echo '<img src="' . get_template_directory_uri() . '/assets/img/verticalgraphiccallouts01_yellow.png">';
      } elseif ($entry['graphic_callout_type'] == 'blue-exclamation') {
        echo '<img src="' . get_template_directory_uri() . '/assets/img/verticalgraphiccallouts02_blue.png">';
      } elseif ($entry['graphic_callout_type'] == 'green-exclamation') {
        echo '<img src="' . get_template_directory_uri() . '/assets/img/verticalgraphiccallouts02_green.png">';
      } elseif ($entry['graphic_callout_type'] == 'purple-exclamation') {
        echo '<img src="' . get_template_directory_uri() . '/assets/img/verticalgraphiccallouts02_purple.png">';
      } elseif ($entry['graphic_callout_type'] == 'red-exclamation') {
        echo '<img src="' . get_template_directory_uri() . '/assets/img/verticalgraphiccallouts02_red.png">';
      } elseif ($entry['graphic_callout_type'] == 'yellow-exclamation') {
        echo '<img src="' . get_template_directory_uri() . '/assets/img/verticalgraphiccallouts02_yellow.png">';
      } else {
        // Nothing here.
      }

      echo '</div>';

    }

    echo '</div>';

  }

  elseif($widget['field_type'] == 'horizontal-graphic-callout'){
     //Graphic Callouts

       echo '<div class="KCPL_vertical-callout clearfix"><div class="four columns alpha">';

       if ($widget['horizontal_graphic_callout'] == 'blue-lines') {
         echo '<img src="' . get_template_directory_uri() . '/assets/img/HorizontalGraphicCallouts01_blue.png">';
       } elseif ($widget['horizontal_graphic_callout'] == 'green-lines') {
         echo '<img src="' . get_template_directory_uri() . '/assets/img/HorizontalGraphicCallouts01_green.png">';
       } elseif ($widget['horizontal_graphic_callout'] == 'purple-lines') {
         echo '<img src="' . get_template_directory_uri() . '/assets/img/HorizontalGraphicCallouts01_purple.png">';
       } elseif ($widget['horizontal_graphic_callout'] == 'red-lines') {
         echo '<img src="' . get_template_directory_uri() . '/assets/img/HorizontalGraphicCallouts01_red.png">';
       } elseif ($widget['horizontal_graphic_callout'] == 'yellow-lines') {
         echo '<img src="' . get_template_directory_uri() . '/assets/img/HorizontalGraphicCallouts01_yellow.png">';
       } elseif ($widget['horizontal_graphic_callout'] == 'blue-shapes') {
         echo '<img src="' . get_template_directory_uri() . '/assets/img/HorizontalGraphicCallouts02_blue.png">';
       } elseif ($widget['horizontal_graphic_callout'] == 'green-shapes') {
         echo '<img src="' . get_template_directory_uri() . '/assets/img/HorizontalGraphicCallouts02_green.png">';
       } elseif ($widget['horizontal_graphic_callout'] == 'purple-shapes') {
         echo '<img src="' . get_template_directory_uri() . '/assets/img/HorizontalGraphicCallouts02_purple.png">';
       } elseif ($widget['horizontal_graphic_callout'] == 'red-shapes') {
         echo '<img src="' . get_template_directory_uri() . '/assets/img/HorizontalGraphicCallouts02_red.png">';
       } elseif ($widget['horizontal_graphic_callout'] == 'yellow-shapes') {
         echo '<img src="' . get_template_directory_uri() . '/assets/img/HorizontalGraphicCallouts02_yellow.png">';
       } else {
         // Nothing here.
       }

       echo '</div></div>';

    }

    else{
      //echo "Hasn't been configured yet. Deal with it.";
    }
  }
  echo "</div>";




  //right array
  echo "<div class='columns four omega'>";
  foreach($contentArrR as $widget){

     if($widget['field_type'] == 'horizontal-callout-single'){ ?>

    <?php if($widget['new_tab'][0] == '_blank'){ $target = "_blank"; } else $target = "_self";?>
    <?php if($widget['field_link'] != ''){ ?>
      <a target="<?php echo $target; ?>" href="<?php echo $widget['field_link']; ?>">
    <?php } ?>
        <div class="KCPL_horz-single KCPL_background-<?php echo $widget['field_color']; ?>">
          <div class="gutter">
             <span><?php echo $widget['horizontal_callout-single_title']; ?></span>
          </div>
        </div>
    <?php if($widget['field_link'] != ''){ ?>
      </a>
    <?php } ?>

  <?php }elseif($widget['field_type'] == 'card'){
    //horizontal callout - multi ?>

      <?php if($widget['field_link'] != ''){ ?>
        <a target="_blank" href="<?php echo $widget['field_link']; ?>">
      <?php } ?>
          <div class="KCPL_horz-card KCPL_background-<?php echo $widget['field_color']; ?>">
            <div class="gutter">
               <span class="KCPL_horz-card-first">Get your free</span> <span class="KCPL_horz-card-last">library card</span>
            </div>

    <?php if($widget['field_link'] != ''){ ?>
      <a target="_blank" href="<?php echo $widget['field_link']; ?>">
    <?php } ?>
        <div class="KCPL_horz-card KCPL_background-<?php echo $widget['field_color']; ?>">
          <div class="gutter">
             <span class="KCPL_horz-card-first">Get your free</span> <span class="KCPL_horz-card-last">library card</span>
          </div>
        </div>
    <?php if($widget['field_link'] != ''){ ?>
      </a>
    <?php } ?>

  <?php }elseif($widget['field_type'] == 'horizontal-callout-multi'){
    //horizontal callout - multi ?>

    <?php if($widget['new_tab'][0] == '_blank'){ $target = "_blank"; } else $target = "_self";?>
    <?php if($widget['field_link'] != ''){ ?>
      <a target="<?php echo $target; ?>" href="<?php echo $widget['field_link']; ?>">
    <?php } ?>
      <div class="KCPL_horz-multi KCPL_background-<?php echo $widget['field_color']; ?>">
        <div class="gutter">
          <?php if($widget['horizontal_callout_alert'] == 'yes'){?> <span class="alert"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/alert.png" /> </span><?php } ?>
           <span><?php echo $widget['horizontal_callout-multi_title']; ?></span>
           <?php if($widget['field_link'] != ''){ ?>
             <a class="KCPL_readmore" href="<?php echo $widget['field_link']; ?>" target="<?php echo $target; ?>">Read More ≈</a>
           <?php } ?>
        </div>
      </div>

    <?php if($widget['field_link'] != ''){ ?>
      </a>
    <?php } ?>

  <?php }
    elseif($widget['field_type'] == 'single-featured'){
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
              <?php if($widget['new_tab'][0] == '_blank'){ $target = "_blank"; } else $target = "_self";?>
              <?php if($widget['single_featured_item_link_url'] !=''){ ?>
              <a href="<?php echo $widget['single_featured_item_link_url']; ?>" target="<?php echo $target; ?>" class="KCPL_readmore"><?php echo $widget['single_featured_item_link_text']; ?></a>
              <?php }?>
           </div>
        </div>
      </div>

    <?php }elseif($widget['field_type'] == 'listing-style-1-1'){
      //Multi LInk list ?>

      <div class="KCPL_listing1-article KCPL_background-l-<?php echo $widget['field_color']; ?>">
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
            <?php if($entry['new_tab'][0] == '_blank'){ $target = "_blank"; } else $target = "_self";?>
            <div class="entry">
               <a href="<?php echo $link; ?>" target="<?php echo $target;?>"><span class="entry-title"><?php echo $title; ?></span></a>
               <div class="entry-excerpt">
                   <?php echo $excerpt; ?>
               </div>
               <a href="<?php echo $link; ?>" target="<?php echo $target;?>" class="KCPL_readmore"><?php echo $entry['link_text']; ?></a>
            </div>
          <?php } wp_reset_postdata(); ?>
        </div>
      </div>

    <?php }elseif($widget['field_type'] == 'listing-style1-2'){
      //listing style 1-2 ?>

      <div class="KCPL_listing1-list KCPL_background-l-<?php echo $widget['field_color']; ?>">
         <span class="title"><?php echo $widget['field_title']; ?></span>
         <div class="gutter">

            <ul>
               <?php foreach($widget['urls'] as $list){ ?>
                <?php if($list['tab'][0] == '_blank'){ $target = "_blank"; } else $target = "_self";?>
                <li><a href="<?php echo $list['url']; ?>" target="<?php echo $target;?>"><?php echo $list['title']; ?></a></li>
               <?php } ?>
            </ul>
            <?php if($widget['field_link'] != ''){ ?>
              <a class="KCPL_readmore" href="<?php echo $widget['field_link']; ?>">More Info ≈</a>
            <?php } ?>
         </div>
      </div>

    <?php } elseif($widget['field_type'] == 'listing-style-4'){
      //CURATED LISTING ?>

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

    <?php }
    elseif($widget['field_type'] == 'recs'){
    //OC Recommendations  ?>

    <div class="KCPL_listing4">
      <span class="title KCPL_background-red">Most Recommended Books<?php echo $widget['field_title']; ?></span>
      <div class="gutter">
        <?php KCPL_OC_recommended::getMostRecommended(); ?>
      </div>
    </div>

  <?php }
  elseif($widget['field_type'] == 'listing-style-3'){
    //OC Discussions  ?>

    <div class="KCPL_single-featured">
      <span class="title KCPL_background-red"><?php echo $widget['field_title']; ?></span>
      <div class="gutter">
        <?php KCPL_OC_discussions::getSocialDiscussion(5); ?>
      </div>
    </div>

  <?php }
  elseif($widget['field_type'] == 'ask'){
    //listing style 3 ?>

    <div class="KCPL_single-featured ">
       <span class="title KCPL_background-<?php echo $widget['field_color']; ?>">Ask A Librarian</span>
       <div class="gutter">

        <iframe src="http://libraryh3lp.com/chat/kcpltest@chat.libraryh3lp.com?skin=13921&amp;theme=alphamod&amp;title=&amp;identity=KCPL&amp;sounds=true" frameborder="1" style="width: 100%; height: 360px; border: none;"> </iframe>

       </div>
    </div>

  <?php }
   elseif($widget['field_type'] == 'listing-style-2-1'){
    //listing style 3 ?>

    <?php KCPL_Calendar::upcomingEvents(); ?>

  <?php }
  elseif($widget['field_type'] == 'vertical-block'){
    //NEED TO SET UP 2-COLS HERE ?>

    <div class=" KCPL_background-<?php echo $widget['field_color']; ?>">
       <span class="title"><?php echo $widget['field_title']; ?></span>
       <div class="gutter">



        </div>

    </div>

  <?php }

  elseif($widget['field_type'] == 'vertical-graphic-callout'){
    //Graphic Callouts

    $i = 0;

    echo '<div class="KCPL_vertical-callout clearfix">';

    foreach($widget['vertical_graphic_callout'] as $entry){

      if ($i == 0) {
          echo '<div class="two columns alpha">';
          $i = $i + 1;
      } else {
        echo '<div class="two columns omega">';
      }

      if ($entry['graphic_callout_type'] == 'blue-shapes') {
        echo '<img src="' . get_template_directory_uri() . '/assets/img/verticalgraphiccallouts01_blue.png">';
      } elseif ($entry['graphic_callout_type'] == 'green-shapes') {
        echo '<img src="' . get_template_directory_uri() . '/assets/img/verticalgraphiccallouts01_green.png">';
      } elseif ($entry['graphic_callout_type'] == 'purple-shapes') {
        echo '<img src="' . get_template_directory_uri() . '/assets/img/verticalgraphiccallouts01_purple.png">';
      } elseif ($entry['graphic_callout_type'] == 'red-shapes') {
        echo '<img src="' . get_template_directory_uri() . '/assets/img/verticalgraphiccallouts01_red.png">';
      } elseif ($entry['graphic_callout_type'] == 'yellow-shapes') {
        echo '<img src="' . get_template_directory_uri() . '/assets/img/verticalgraphiccallouts01_yellow.png">';
      } elseif ($entry['graphic_callout_type'] == 'blue-exclamation') {
        echo '<img src="' . get_template_directory_uri() . '/assets/img/verticalgraphiccallouts02_blue.png">';
      } elseif ($entry['graphic_callout_type'] == 'green-exclamation') {
        echo '<img src="' . get_template_directory_uri() . '/assets/img/verticalgraphiccallouts02_green.png">';
      } elseif ($entry['graphic_callout_type'] == 'purple-exclamation') {
        echo '<img src="' . get_template_directory_uri() . '/assets/img/verticalgraphiccallouts02_purple.png">';
      } elseif ($entry['graphic_callout_type'] == 'red-exclamation') {
        echo '<img src="' . get_template_directory_uri() . '/assets/img/verticalgraphiccallouts02_red.png">';
      } elseif ($entry['graphic_callout_type'] == 'yellow-exclamation') {
        echo '<img src="' . get_template_directory_uri() . '/assets/img/verticalgraphiccallouts02_yellow.png">';
      } else {
        // Nothing here.
      }

      echo '</div>';

    }

    echo '</div>';

   }

   elseif($widget['field_type'] == 'horizontal-graphic-callout'){
     //Graphic Callouts

       echo '<div class="KCPL_vertical-callout clearfix"><div class="four columns alpha">';

       if ($widget['horizontal_graphic_callout'] == 'blue-lines') {
         echo '<img src="' . get_template_directory_uri() . '/assets/img/HorizontalGraphicCallouts01_blue.png">';
       } elseif ($widget['horizontal_graphic_callout'] == 'green-lines') {
         echo '<img src="' . get_template_directory_uri() . '/assets/img/HorizontalGraphicCallouts01_green.png">';
       } elseif ($widget['horizontal_graphic_callout'] == 'purple-lines') {
         echo '<img src="' . get_template_directory_uri() . '/assets/img/HorizontalGraphicCallouts01_purple.png">';
       } elseif ($widget['horizontal_graphic_callout'] == 'red-lines') {
         echo '<img src="' . get_template_directory_uri() . '/assets/img/HorizontalGraphicCallouts01_red.png">';
       } elseif ($widget['horizontal_graphic_callout'] == 'yellow-lines') {
         echo '<img src="' . get_template_directory_uri() . '/assets/img/HorizontalGraphicCallouts01_yellow.png">';
       } elseif ($widget['horizontal_graphic_callout'] == 'blue-shapes') {
         echo '<img src="' . get_template_directory_uri() . '/assets/img/HorizontalGraphicCallouts02_blue.png">';
       } elseif ($widget['horizontal_graphic_callout'] == 'green-shapes') {
         echo '<img src="' . get_template_directory_uri() . '/assets/img/HorizontalGraphicCallouts02_green.png">';
       } elseif ($widget['horizontal_graphic_callout'] == 'purple-shapes') {
         echo '<img src="' . get_template_directory_uri() . '/assets/img/HorizontalGraphicCallouts02_purple.png">';
       } elseif ($widget['horizontal_graphic_callout'] == 'red-shapes') {
         echo '<img src="' . get_template_directory_uri() . '/assets/img/HorizontalGraphicCallouts02_red.png">';
       } elseif ($widget['horizontal_graphic_callout'] == 'yellow-shapes') {
         echo '<img src="' . get_template_directory_uri() . '/assets/img/HorizontalGraphicCallouts02_yellow.png">';
       } else {
         // Nothing here.
       }

       echo '</div></div>';

    }

    else{
      //echo "Hasn't been configured yet. Deal with it.";
    }
  }
  echo "</div>";

  if($content){
    echo "</div>";
  }
?>
