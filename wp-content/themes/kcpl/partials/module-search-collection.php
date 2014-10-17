<div id="KCPL_search">
  <div class="gutter clearfix">

    <?php
    $active = 'media';

    if($thisID == 119 ){
      $placeholder = "Search the Collection for Books";
    }
    elseif ($thisID == 120) {
      $placeholder = "Search the Collection for Music";
    }
    elseif ($thisID == 123) {
      $placeholder = "Search the Collection for Magazines";
    }
    elseif ($thisID == 124) {
      $placeholder = "Search the Collection for Videos";
    }
    elseif ($thisID == 121) {
      $placeholder = "Search the Collection for E-Books";
    }
    elseif ($thisID == 122) {
      $placeholder = "Search the Collection for Audio Books";
    }
     elseif ($thisID == 125) {
      $placeholder = "Search the Collection for Downloadables";
    }
    elseif ($thisID == 128) {
      $placeholder = "Search the Collection for Kids Materials";
      $active = 'audience';
    }
    elseif ($thisID == 127) {
      $placeholder = "Search the Collection for Teen Materials";
      $active = 'audience';
    }
    elseif ($thisID == 423) {
      $placeholder = "Search the Collection for Adult Materials";
      $active = 'audience';
    }
    else
      $placeholder = "Search the Collection";





    ?>



    <form method="get" id="searchForm" action="http://kana.ent.sirsi.net/client/embedded.search/http://kana.ent.sirsi.net/client/default" target="_blank">
      <input type="hidden" name="ln" value="en_US">
      <div id="searchField">
        <i class="fa fa-lg fa-search searchicon"></i>
        <input type="search"  id="q" name="q" placeholder="<?php echo $placeholder;?>" />
        <input type="hidden" id="lm" name="lm" />
        <input type="hidden" id="qf" name="qf" />
        <input type="submit" value="<?php echo esc_attr_x('Search','submit button'); ?>" />
      </div>
      <div id="search-params">
        <div id="type">
          <span class="top">
            Search or<br>Browse by
          </span>
          <span class="bottom">
            <a class="media-active <?php if($active =='media') echo 'active'; ?>">Media Type</a>
            <a class="audience-active <?php if($active =='audience') echo 'active'; ?>">Audience</a>
          </span>
        </div>
        <div id="select" class="<?php if($active =='media') echo 'media-active'; else echo 'audience-active'?> clearfix">
          <div class="media">
            <div class="search-btn first books <?php if($thisID == 109 || $thisID == 119) echo 'active'; else echo 'inactive'; ?>  ">
              <div class="iconCont">
                <a href="<?php echo get_permalink(119); ?>"><div class="icon KCPL_sprite-book"></div></a>
              </div>
              <hr>
              <span class="KCPL_caption-minion-italicbold">Books</span>
            </div>
            <div class="search-btn music <?php if($thisID == 109 || $thisID == 120) echo 'active'; else echo 'inactive'; ?>">
              <div class="iconCont">
                <a href="<?php echo get_permalink(120); ?>"><div class="icon KCPL_sprite-headphones"></div></a>
              </div>
              <hr>
              <span class="KCPL_caption-minion-italicbold">Music</span>
            </div>
            <div class="search-btn research <?php if($thisID == 109 || $thisID == 126) echo 'active'; else echo 'inactive'; ?>">
              <div class="iconCont">
                <a href="<?php echo get_permalink(126); ?>"><div class="icon KCPL_sprite-document"></div></a>
              </div>
              <hr>
              <span class="KCPL_caption-minion-italicbold">Research Tools<br>and Resources</span>
            </div>
            <div class="search-btn magazines <?php if($thisID == 109 || $thisID == 123) echo 'active'; else echo 'inactive'; ?>">
              <div class="iconCont">
                <a href="<?php echo get_permalink(123); ?>"><div class="icon KCPL_sprite-periodical"></div></a>
              </div>
              <hr>
              <span class="KCPL_caption-minion-italicbold">Magazines</span>
            </div>
            <div class="search-btn video <?php if($thisID == 109 || $thisID == 124) echo 'active'; else echo 'inactive'; ?>">
              <div class="iconCont">
                <a href="<?php echo get_permalink(124); ?>"><div class="icon KCPL_sprite-video"></div></a>
              </div>
              <hr>
              <span class="KCPL_caption-minion-italicbold">Video</span>
            </div>
            <div class="search-btn ebooks <?php if($thisID == 109 || $thisID == 121) echo 'active'; else echo 'inactive'; ?>">
              <div class="iconCont">
                <a href="<?php echo get_permalink(121); ?>"><div class="icon KCPL_sprite-tablet"></div></a>
              </div>
              <hr>
              <span class="KCPL_caption-minion-italicbold">E-books</span>
            </div>
            <div class="search-btn audiobooks <?php if($thisID == 109 || $thisID == 122) echo 'active'; else echo 'inactive'; ?>">
              <div class="iconCont">
                <a href="<?php echo get_permalink(122); ?>"><div class="icon KCPL_sprite-audiobook"></div></a>
              </div>
              <hr>
              <span class="KCPL_caption-minion-italicbold">Audio Books</span>
            </div>
            <div class="search-btn last download <?php if($thisID == 109 || $thisID == 125) echo 'active'; else echo 'inactive'; ?>">
              <div class="iconCont">
                <a href="<?php echo get_permalink(125); ?>"><div class="icon KCPL_sprite-download"></div></a>
              </div>
              <hr>
              <span class="KCPL_caption-minion-italicbold">Downloadables</span>
            </div>
          </div>
          <div class="audience">
            <div class="search-btn first kids <?php if($thisID == 109 || $thisID == 128) echo 'active'; else echo 'inactive'; ?>">
              <div class="iconCont">
                <a href="<?php echo get_permalink(128); ?>"><div class="icon KCPL_sprite-kids"></div></a>
              </div>
              <hr>
              <span class="KCPL_caption-minion-italicbold">Kids</span>
            </div>
            <div class="search-btn teens <?php if($thisID == 109 || $thisID == 127) echo 'active'; else echo 'inactive'; ?>">
              <div class="iconCont">
                <a href="<?php echo get_permalink(127); ?>"><div class="icon KCPL_sprite-teens"></div></a>
              </div>
              <hr>
              <span class="KCPL_caption-minion-italicbold">Teens</span>
            </div>
            <div class="search-btn last adults <?php if($thisID == 109 || $thisID == 423) echo 'active'; else echo 'inactive'; ?>">
              <div class="iconCont">
                <a href="<?php echo get_permalink(423); ?>"><div class="icon KCPL_sprite-adult"></div></a>
              </div>
              <hr>
              <span class="KCPL_caption-minion-italicbold">Adults</span>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
