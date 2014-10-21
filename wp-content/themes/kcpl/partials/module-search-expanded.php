<div id="KCPL_search" class="extended">
 <div class="gutter clearfix">

 <?php //echo do_shortcode( '[acps id="344"]'); ?>

    <form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
      <div id="searchField">
        <i class="fa fa-lg fa-search searchicon"></i>
        <input type="search" placeholder="Search Our Research Tools and Resources" name="s" id="s" value=''/>
        <input type="hidden" name="search-type" value="resources" />
        <input type="submit" value="<?php echo esc_attr_x('Search','submit button'); ?>" />
      </div>
      <div id="exFields">
        <div id="left">
         <select name="topic" id="search-topic">
            <option value="">&#x25BC; Select Topic</option>
            <?php
            $terms = get_terms("resources-category");
            if ( !empty( $terms ) && !is_wp_error( $terms ) ){
               foreach ( $terms as $term ) {
                 echo "<option value='" . $term->slug . "'>" . $term->name . "</li>";
               }
            } ?>

         </select>
         <p>
          Access to many of these resources require a library card and PIN and are only available to library patrons. If you do not have a library card, <a href="<?php bloginfo('url') ?>/get-involved/get-your-free-library-card/" >sign up now!</a> 
         </p>
        </div>
        <div id="right">
         <select name="audience" id="search-audience">
            <option value="">&#x25BC; Select Audience </option>
            <?php
            $terms = get_terms("audience");
            if ( !empty( $terms ) && !is_wp_error( $terms ) ){
               foreach ( $terms as $term ) {
                 echo "<option value='" . $term->slug . "'>" . $term->name . "</li>";
               }
            } ?>
         </select>
         <div id="search-online">
             <input type="checkbox" name="online" value="online" id="online"/><label class="KCPL_meta-small" for="checkboxONE">Online</label>
         </div>
         <div id="search-libraryCard">
             <input type="checkbox" name="withcard" value="with-library-card-only" id="with-library-card"/><label class="KCPL_meta-small" for="checkboxTWO">With Library Card</label>
         </div>
         <div id="search-inLibrary">
             <input type="checkbox" name="inlib" value="in-library-only" id="in-library-only"/><label class="KCPL_meta-small" for="checkboxTHREE">In Library Only</label>
         </div>
        </div>
      </div>

    </form>
 </div>

 <div id="search-params" class="extended-params">
    <div class="gutter clearfix">
        <div id="type">
         <span class="top">
             Browse by
         </span>
         <span class="bottom">
            <a class="media-active active">Media Type</a>
            <a class="audience-active">Audience</a>
         </span>
        </div>
        <div id="select" class="media-active clearfix">
         <div class="media">
            <div class="search-btn first books inactive">
              <div class="iconCont">
                <a href="<?php echo get_permalink(119); ?>"><div class="icon KCPL_sprite-book"></div></a>
              </div>
              <hr>
              <span class="KCPL_caption-minion-italicbold">Books</span>
            </div>
            <div class="search-btn music inactive">
              <div class="iconCont">
                <a href="<?php echo get_permalink(120); ?>"><div class="icon KCPL_sprite-headphones"></div></a>
              </div>
              <hr>
              <span class="KCPL_caption-minion-italicbold">Music</span>
            </div>
            <div class="search-btn research active">
              <div class="iconCont">
                <a href="<?php echo get_permalink(126); ?>"><div class="icon KCPL_sprite-document"></div></a>
              </div>
              <hr>
              <span class="KCPL_caption-minion-italicbold">Research Tools<br>and Resources</span>
            </div>
            <div class="search-btn magazines inactive">
              <div class="iconCont">
                <a href="<?php echo get_permalink(123); ?>"><div class="icon KCPL_sprite-periodical"></div></a>
              </div>
              <hr>
              <span class="KCPL_caption-minion-italicbold">Magazines</span>
            </div>
            <div class="search-btn video inactive">
              <div class="iconCont">
                <a href="<?php echo get_permalink(124); ?>"><div class="icon KCPL_sprite-video"></div></a>
              </div>
              <hr>
              <span class="KCPL_caption-minion-italicbold">Video</span>
            </div>
            <div class="search-btn ebooks inactive">
              <div class="iconCont">
                <a href="<?php echo get_permalink(121); ?>"><div class="icon KCPL_sprite-tablet"></div></a>
              </div>
              <hr>
              <span class="KCPL_caption-minion-italicbold">E-books</span>
            </div>
            <div class="search-btn audiobooks inactive">
              <div class="iconCont">
                <a href="<?php echo get_permalink(122); ?>"><div class="icon KCPL_sprite-audiobook"></div></a>
              </div>
              <hr>
              <span class="KCPL_caption-minion-italicbold">Audio Books</span>
            </div>
            <div class="search-btn last download inactive">
              <div class="iconCont">
                <a href="<?php echo get_permalink(125); ?>"><div class="icon KCPL_sprite-download"></div></a>
              </div>
              <hr>
              <span class="KCPL_caption-minion-italicbold">Downloadables</span>
            </div>
          </div>
         <div class="audience">
            <div class="search-btn first kids inactive">
              <div class="iconCont">
                <a href="<?php echo get_permalink(128); ?>"><div class="icon KCPL_sprite-kids"></div></a>
              </div>
              <hr>
              <span class="KCPL_caption-minion-italicbold">Kids</span>
            </div>
            <div class="search-btn teens inactive">
              <div class="iconCont">
                <a href="<?php echo get_permalink(127); ?>"><div class="icon KCPL_sprite-teens"></div></a>
              </div>
              <hr>
              <span class="KCPL_caption-minion-italicbold">Teens</span>
            </div>
 
          </div>
        </div>
      </div>
   </div>
</div>
