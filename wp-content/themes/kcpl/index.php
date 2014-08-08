<?php get_header(); ?>
<div id="bannerHome" class="KCPL_background-red">
  <div class="container">
    <div class="columns seven">
      <div class="gutter">
        <h1>top</h1>
        <h2>bottom</h2>
      </div>
    </div>
  </div>
</div>
<div id="content">
   <div class="container">

     <div class="row">

       <div class="columns eight alpha clearfix">

         <div class="KCPL_comments">
            <div id="comments" class="comments-area">
            	<ol class="comment-list">
            	  <li class="comment even thread-even depth-1 parent" id="comment-1">

            			<div class="comment-img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/phIMG.png" /></div>
                     <div class="comment-content">
                        <span class="name">User Namename</span>
                        <span class="date">July 17, 2014 2 PM</span>
                        <div class="comment-comment">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod dictum gravida. Nullam semper dui elit, non fermentum consequat a dui. Etiam suscipit nibh at consequat gravida.</div>
                        <a class="reply KCPL_readmore" href="#">Reply ≈</a>
                        <a class="leave-comment KCPL_readmore" href="#">Leave a Comment ≈</a>
                     </div>

            	    <ol class="children">

            		   <li class="comment byuser comment-author-admin bypostauthor odd alt depth-2" id="comment-2">

                     <!-- comment l2 !-->

                     </li>

                  </ol>
                 </li>

         	     <li class="comment even thread-odd thread-alt depth-1" id="comment-12">

         		      <!-- comment l1 !-->

         		  </li>

            	</ol>

            </div>
			</div>

       </div>

     </div>

   </div>
</div>


<?php get_footer(); ?>
