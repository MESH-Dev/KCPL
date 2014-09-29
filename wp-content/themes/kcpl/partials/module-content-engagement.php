<?php $fields = get_field('engagement_campaign');


$ctr = 1;
?>
<div class="KCPL_home-engagement">
  <span class="title "> </span>

  <?php foreach($fields as $entry){ ?>

  <?php if($ctr == 1){ ?>
  <div id="engage-first" class="single-row KCPL_background-green" data-color='green'>
    <div class="gutter">
      <?php echo $entry['section title']; ?>
    </div>
  </div>
  <?php }
   elseif($ctr == 2){ ?>
  <div id="engage-second" class="single-row KCPL_background-red" data-color='red'>
    <div class="gutter">
      <?php echo $entry['section title']; ?>
    </div>
  </div>
  <?php }
  elseif($ctr == 3){ ?>
  <div id="engage-third" class="single-row KCPL_background-grey" data-color='grey'>
    <div class="gutter">
       <?php echo $entry['section title']; ?>
    </div>
  </div>
   <?php } else{ ?>
  <div id="engage-fourth"  class="single-row KCPL_background-yellow" data-color='yellow'>
    <div class="gutter">
       <?php echo $entry['section title']; ?>
    </div>
  </div>
   <?php }    $ctr++;
  } ?>


 <?php
 $ctr = 1; ?>

   <div id="row-expanded">
    <span class="title"> </span>
    <span class="close">close x</span>

 <?php foreach($fields as $entry){ ?>

    <?php if($ctr == 1){ ?>
    <div id="content-first" class="engage-content hide KCPL_background-green">
       <div class="KCPL_featured  clearfix">
        <div class="gutter clearfix">
          <?php foreach($entry['section_contents'] as $section){ ?>
           <div class="entry <?php echo cycle('left','center','right'); ?>">
              <div class="gutter">
                <div class="image ">
                    <div class="wrap">
                       <img src="<?php echo $section['icon']; ?>" />
                    </div>
                </div>
                <span class="section-title"><?php echo $section['title']; ?></span>
                <div class="excerpt">
                    <?php echo $section['excerpt']; ?>
                </div>
                <a href="<?php echo $section['read_more_link']; ?>" class="KCPL_readmore"><?php echo $section['read_more_text']; ?></a>
              </div>
           </div>
           <?php } ?>
        </div>
      </div>
    </div>
    <?php } ?>

     <?php if($ctr == 2){ ?>
     <div id="content-second" class="engage-content hide KCPL_background-red">
       <div class="KCPL_featured  clearfix">
        <div class="gutter clearfix">
          <?php foreach($entry['section_contents'] as $section){ ?>
           <div class="entry <?php echo cycle('left','center','right'); ?>">
              <div class="gutter">
                <div class="image ">
                    <div class="wrap">
                       <img src="<?php echo $section['icon']; ?>" />
                    </div>
                </div>
                <span class="section-title"><?php echo $section['title']; ?></span>
                <div class="excerpt">
                    <?php echo $section['excerpt']; ?>
                </div>
                <a href="<?php echo $section['read_more_link']; ?>" class="KCPL_readmore"><?php echo $section['read_more_text']; ?></a>
              </div>
           </div>
           <?php } ?>
        </div>
      </div>
    </div>
    <?php } ?>

     <?php if($ctr == 3){ ?>
     <div id="content-third" class="engage-content hide KCPL_background-grey">
       <div class="KCPL_featured  clearfix">
        <div class="gutter clearfix">
          <?php foreach($entry['section_contents'] as $section){ ?>
           <div class="entry <?php echo cycle('left','center','right'); ?>">
              <div class="gutter">
                <div class="image ">
                    <div class="wrap">
                       <img src="<?php echo $section['icon']; ?>" />
                    </div>
                </div>
                <span class="section-title"><?php echo $section['title']; ?></span>
                <div class="excerpt">
                    <?php echo $section['excerpt']; ?>
                </div>
                <a href="<?php echo $section['read_more_link']; ?>" class="KCPL_readmore"><?php echo $section['read_more_text']; ?></a>
              </div>
           </div>
           <?php } ?>
        </div>
      </div>
    </div>
    <?php } ?>

     <?php if($ctr == 4){ ?>
     <div id="content-fourth" class="engage-content hide KCPL_background-yellow">
       <div class="KCPL_featured  clearfix">
        <div class="gutter clearfix">
          <?php foreach($entry['section_contents'] as $section){ ?>
           <div class="entry <?php echo cycle('left','center','right'); ?>">
              <div class="gutter">
                <div class="image ">
                    <div class="wrap">
                       <img src="<?php echo $section['icon']; ?>" />
                    </div>
                </div>
                <span class="section-title"><?php echo $section['title']; ?></span>
                <div class="excerpt">
                    <?php echo $section['excerpt']; ?>
                </div>
                <a href="<?php echo $section['read_more_link']; ?>" class="KCPL_readmore"><?php echo $section['read_more_text']; ?></a>
              </div>
           </div>
           <?php } ?>
        </div>
      </div>
    </div>
    <?php }
    $ctr++;
  }
  ?>
  </div>
</div>
