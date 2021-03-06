<div id="KCPL_search" class="condensed">
  <div class="gutter clearfix">
    <form method="get" id="searchForm" action="http://kana.ent.sirsi.net/client/embedded.search/http://kana.ent.sirsi.net/client/default" target="_blank">
      <input type="hidden" name="ln" value="en_US">
      <div id="searchField">
        <i class="fa fa-lg fa-search searchicon"></i>
        <input type="search" id="q" name="q" placeholder="Search the Collection" />
        <input type="submit" value="<?php echo esc_attr_x('Search','submit button'); ?>" />
      </div>
      <div id="search-params">
        <div class="cat_btn"><a href="http://kana.ent.sirsi.net/client/en_US/default/" title="Catalog Search">Search the Catalog Directly</a> <br /></div>
        <div id="type">
          <span class="top">  or Browse by</span>
          <span class="bottom">  
            <a class="media-active active">Media Type |</a>
            <a class="audience-active">Audience</a>
          </span>
        </div>
        <div id="select" class="media-active clearfix">
          <div class="media">
            <div class="search-btn first books">
              <div class="iconCont">
                <a href="<?php echo get_permalink(119); ?>"><div class="icon KCPL_sprite-book" title="Search Books"></div></a>
              </div>
              <hr>
              <span class="KCPL_caption-minion-italicbold">Books</span>
            </div>
            <div class="search-btn music">
              <div class="iconCont">
                <a href="<?php echo get_permalink(120); ?>"><div class="icon KCPL_sprite-headphones"></div></a>
              </div>
              <hr>
              <span class="KCPL_caption-minion-italicbold">Music</span>
            </div>
            <div class="search-btn research">
              <div class="iconCont">
                <a href="<?php echo get_permalink(126); ?>"><div class="icon KCPL_sprite-document"></div></a>
              </div>
              <hr>
              <span class="KCPL_caption-minion-italicbold">Research Tools<br>and Resources</span>
            </div>
            <div class="search-btn magazines">
              <div class="iconCont">
                <a href="<?php echo get_permalink(123); ?>"><div class="icon KCPL_sprite-periodical"></div></a>
              </div>
              <hr>
              <span class="KCPL_caption-minion-italicbold">Magazines</span>
            </div>
            <div class="search-btn video">
              <div class="iconCont">
                <a href="<?php echo get_permalink(124); ?>"><div class="icon KCPL_sprite-video"></div></a>
              </div>
              <hr>
              <span class="KCPL_caption-minion-italicbold">Video</span>
            </div>
            <div class="search-btn ebooks">
              <div class="iconCont">
                <a href="<?php echo get_permalink(121); ?>"><div class="icon KCPL_sprite-tablet"></div></a>
              </div>
              <hr>
              <span class="KCPL_caption-minion-italicbold">E-books</span>
            </div>
            <div class="search-btn audiobooks">
              <div class="iconCont">
                <a href="<?php echo get_permalink(122); ?>"><div class="icon KCPL_sprite-audiobook"></div></a>
              </div>
              <hr>
              <span class="KCPL_caption-minion-italicbold">Audio Books</span>
            </div>
            <div class="search-btn last download">
              <div class="iconCont">
                <a href="<?php echo get_permalink(125); ?>"><div class="icon KCPL_sprite-download"></div></a>
              </div>
              <hr>
              <span class="KCPL_caption-minion-italicbold">Downloadables</span>
            </div>
          </div>
          <div class="audience">
            <div class="search-btn first kids">
              <div class="iconCont">
                <a href="<?php echo get_permalink(128); ?>"><div class="icon KCPL_sprite-kids"></div></a>
              </div>
              <hr>
              <span class="KCPL_caption-minion-italicbold">Kids</span>
            </div>
            <div class="search-btn teens">
              <div class="iconCont">
                <a href="<?php echo get_permalink(127); ?>"><div class="icon KCPL_sprite-teens"></div></a>
              </div>
              <hr>
              <span class="KCPL_caption-minion-italicbold">Teens</span>
            </div>

          </div>
        </div>
      </div>
    </form>
  </div>
</div>
