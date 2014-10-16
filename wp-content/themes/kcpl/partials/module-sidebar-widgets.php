<?php
$len = count($sidebar);
$left = array_slice($sidebar, 0, round($len/2));
$right = array_slice($sidebar, round($len/2));

echo "<div class='kcpl_m-sidebar-l'>";
foreach($left as $widget){
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

  <?php }elseif($widget['field_type'] == 'card'){
    //card ?>

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

    <?php if($widget['field_link'] != ''){ ?>
      <a target="_blank" href="<?php echo $widget['field_link']; ?>">
    <?php } ?>
      <div class="KCPL_horz-multi KCPL_background-<?php echo $widget['field_color']; ?>">
        <div class="gutter">
          <?php if($widget['horizontal_callout_alert'] == 'yes'){?> <span class="alert"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/alert.png" /> </span><?php } ?>
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

  <?php }elseif($widget['field_type'] == 'listing-style1-2'){
    //listing style 1-2 ?>

    <div class="KCPL_listing1-list KCPL_background-<?php echo $widget['field_color']; ?>">
       <span class="title"><?php echo $widget['field_title']; ?></span>
       <div class="gutter">
          <span class="list-title"><?php echo $widget['listing_title'];?></span>
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
   elseif($widget['field_type'] == 'vertical-block'){ ?>

     <div class="KCPL_vertical-callout clearfix">
    <?php
    //2-COLS HERE
    $ctr = 1;
    foreach($widget['vertical_blocks'] as $entry){

      if($entry['vertical_type'] == "small-single"){ ?>
       <div class="columns two <?php if($ctr == 1) echo 'alpha'; else echo 'omega';?> ">
        <div class="KCPL_single-featured ?>">
          <span class="title KCPL_background-<?php echo $widget['field_color']; ?>"><?php echo $entry['section_title']; ?></span>
          <div class="gutter">

             <div class="entry">
                <span class="entry-title"><?php echo $entry['title']; ?></span>
                <span class="entry-date"><?php echo $entry['supporting_info']; ?></span>
                <div class="entry-excerpt">
                    <?php echo $entry['description']; ?>
                </div>
                <a href="<?php echo $entry['page_link']; ?>" class="KCPL_readmore"><?php echo $entry['page_link_text']; ?></a>
             </div>
          </div>
        </div>
      </div>

      <?php
      }
      elseif($entry['vertical_type'] == "vertical-button"){ ?>
       <div class="columns two <?php if($ctr == 1) echo 'alpha'; else echo 'omega';?>">
        <a href="<?php echo $entry['page_link']; ?>">
          <div class="KCPL_short-callout KCPL_background-<?php echo $widget['field_color']; ?>">
            <span><?php echo $entry['title']; ?></span>
          </div>
        </a>
      </div>

      <?php
      }
      elseif($entry['vertical_type'] == "social-feed"){ ?>
         <div class="columns two <?php if($ctr == 1) echo 'alpha'; else echo 'omega';?> ">
          <div class="KCPL_social-callout">
           <div class="KCPL_social-callout-header">
               <span>Follow Us</span>
           </div>
           <div class="KCPL_social-callout-body">
              <div class='icons'>
                <a href="https://www.facebook.com/KanawhaLibrary" target="_blank"><div class="KCPL_sprite-facebook KCPL_social-callout-icon"></div></a>
                <a href="http://www.pinterest.com/kanawhalibrary/" target="_blank"><div class="KCPL_sprite-pinterest KCPL_social-callout-icon"></div></a>
                <a href="http://twitter.com/KanawhaLibrary" target="_blank"><div class="KCPL_sprite-twitter KCPL_social-callout-icon"></div></a>
              </div>

               <div class="clear"></div>

               <?php

               $settings = array(
                    'oauth_access_token' => "83915658-qoSmzFO1D0QbPupw9BhX3XOiA11BeYdt0VDqg3oSp",
                    'oauth_access_token_secret' => "WGKKZkm5hxYkxW8JHfGBwQpps1NKE1llVCqwLkNEzpOoB",
                    'consumer_key' => "ajAwYUZL83PVw78lL2RVlTchh",
                    'consumer_secret' => "2g9khxKkgvG7pR9WAQ5rF16RVlR9B7Z4LrhgrtStax68uNjgJY"
                  );

                $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
                $getfield = '?screen_name=KanawhaLibrary&count=1';
                $requestMethod = 'GET';

                $twitter = new TwitterAPIExchange($settings);
                $response = $twitter->setGetfield($getfield)
                             ->buildOauth($url, $requestMethod)
                             ->performRequest();

                $result = json_decode($response, true);
                $tweet = $result[0]['text'];
                $date = $result[0]['created_at'];
                $newDate = date("M j", strtotime($date));

               ?>

               <a href="https://twitter.com/KanawhaLibrary" target="_blank">
                 <div class="KCPL_social-callout-tweet">
                     <span class="KCPL_social-callout-tweet-content"><?php echo $tweet; ?></span><br/>
                     <span class="KCPL_social-callout-tweet-date"><?php echo $newDate; ?></span>
                 </div>
               </a>
           </div>
         </div>
        </div>
      <?php
     }
      else{

      }
      $ctr++;

    } ?>
    </div> <?php

  }else{
    //echo "Hasn't been configured yet. Deal with it.";
  }
} echo "</div>";














echo "<div class='kcpl_m-sidebar-r'>";
foreach($right as $widget){
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

  <?php }elseif($widget['field_type'] == 'card'){
    //card ?>

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

    <?php if($widget['field_link'] != ''){ ?>
      <a target="_blank" href="<?php echo $widget['field_link']; ?>">
    <?php } ?>
      <div class="KCPL_horz-multi KCPL_background-<?php echo $widget['field_color']; ?>">
        <div class="gutter">
          <?php if($widget['horizontal_callout_alert'] == 'yes'){?> <span class="alert"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/alert.png" /> </span><?php } ?>
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

  <?php }elseif($widget['field_type'] == 'listing-style1-2'){
    //listing style 1-2 ?>

    <div class="KCPL_listing1-list KCPL_background-<?php echo $widget['field_color']; ?>">
       <span class="title"><?php echo $widget['field_title']; ?></span>
       <div class="gutter">
          <span class="list-title"><?php echo $widget['listing_title'];?></span>
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
   elseif($widget['field_type'] == 'vertical-block'){ ?>

     <div class="KCPL_vertical-callout clearfix">
    <?php
    //2-COLS HERE
    $ctr = 1;
    foreach($widget['vertical_blocks'] as $entry){

      if($entry['vertical_type'] == "small-single"){ ?>
       <div class="columns two <?php if($ctr == 1) echo 'alpha'; else echo 'omega';?> ">
        <div class="KCPL_single-featured ?>">
          <span class="title KCPL_background-<?php echo $widget['field_color']; ?>"><?php echo $entry['section_title']; ?></span>
          <div class="gutter">

             <div class="entry">
                <span class="entry-title"><?php echo $entry['title']; ?></span>
                <span class="entry-date"><?php echo $entry['supporting_info']; ?></span>
                <div class="entry-excerpt">
                    <?php echo $entry['description']; ?>
                </div>
                <a href="<?php echo $entry['page_link']; ?>" class="KCPL_readmore"><?php echo $entry['page_link_text']; ?></a>
             </div>
          </div>
        </div>
      </div>

      <?php
      }
      elseif($entry['vertical_type'] == "vertical-button"){ ?>
       <div class="columns two <?php if($ctr == 1) echo 'alpha'; else echo 'omega';?>">
        <a href="<?php echo $entry['page_link']; ?>">
          <div class="KCPL_short-callout KCPL_background-<?php echo $widget['field_color']; ?>">
            <span><?php echo $entry['title']; ?></span>
          </div>
        </a>
      </div>

      <?php
      }
      elseif($entry['vertical_type'] == "social-feed"){ ?>
         <div class="columns two <?php if($ctr == 1) echo 'alpha'; else echo 'omega';?> ">
          <div class="KCPL_social-callout">
           <div class="KCPL_social-callout-header">
               <span>Follow Us</span>
           </div>
           <div class="KCPL_social-callout-body">
              <div class='icons'>
                <a href="https://www.facebook.com/KanawhaLibrary" target="_blank"><div class="KCPL_sprite-facebook KCPL_social-callout-icon"></div></a>
                <a href="http://www.pinterest.com/kanawhalibrary/" target="_blank"><div class="KCPL_sprite-pinterest KCPL_social-callout-icon"></div></a>
                <a href="https://twitter.com/KanawhaLibrary" target="_blank"><div class="KCPL_sprite-twitter KCPL_social-callout-icon"></div></a>

              </div>
               <div class="clear"></div>


               <?php

               $settings = array(
                    'oauth_access_token' => "83915658-qoSmzFO1D0QbPupw9BhX3XOiA11BeYdt0VDqg3oSp",
                    'oauth_access_token_secret' => "WGKKZkm5hxYkxW8JHfGBwQpps1NKE1llVCqwLkNEzpOoB",
                    'consumer_key' => "ajAwYUZL83PVw78lL2RVlTchh",
                    'consumer_secret' => "2g9khxKkgvG7pR9WAQ5rF16RVlR9B7Z4LrhgrtStax68uNjgJY"
                  );

                $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
                $getfield = '?screen_name=KanawhaLibrary&count=1';
                $requestMethod = 'GET';

                $twitter = new TwitterAPIExchange($settings);
                $response = $twitter->setGetfield($getfield)
                             ->buildOauth($url, $requestMethod)
                             ->performRequest();

                $result = json_decode($response, true);
                $tweet = $result[0]['text'];
                $date = $result[0]['created_at'];
                $newDate = date("M j", strtotime($date));

               ?>

               <a href="https://twitter.com/KanawhaLibrary" target="_blank">
                 <div class="KCPL_social-callout-tweet">
                     <span class="KCPL_social-callout-tweet-content"><?php echo $tweet; ?></span><br/>
                     <span class="KCPL_social-callout-tweet-date"><?php echo $newDate; ?></span>
                 </div>
               </a>
           </div>
         </div>
        </div>
      <?php
     }
      else{

      }
      $ctr++;

    } ?>
    </div> <?php

  }else{
    //echo "Hasn't been configured yet. Deal with it.";
  }
} echo "</div>"; ?>
