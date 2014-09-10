<?php get_header(); ?>

<?php 

global $wp_query;
//$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array( 'post_type' => 'resources', 'posts_per_page' => '-1');
$args = array_merge( $args, $wp_query->query );
query_posts( $args );
 
?>

<div id="banner" class="KCPL_background-yellow">
	<div class="container">
		<div class="gutter">
			<div id="main_navBannerCont" class="menu-main-navigation-container">
				<ul id="main_nav_breadcrumbs" class="menu clearfix">
					<li class="menu-item menu-item-type-post_type menu-item-object-page current-page-ancestor current-menu-ancestor current-menu-parent current-page-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-157"><a href="http://localhost/kcpl/collection/">The Collection</a>
						<ul class="sub-menu">
							<li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-126 current_page_item menu-item-331"><a href="http://localhost/kcpl/collection/research/">Research</a></li>
						</ul>
					</li>
				</ul>
			</div>      
		</div>
	</div>
</div>

<div id="content">
	<div class="container">

	<?php include_once(locate_template('partials/module-search-expanded.php')); ?>		
 
	<?php 

	$ctr = 1; //to add alpha/omega class
	if(have_posts()){while(have_posts()): the_post(); ?>
		<?php if ($ctr%3 == 1){
				$class = 'alpha';}
			else if ($ctr%3 == 0){
				$class = 'omega';}
			else{$class = '';}
		?>
 		<div class="four columns <?php echo $class; $ctr++;?>">
			<div class="KCPL_single-featured">
			     <span class="title KCPL_background-yellow"></span>
			     <div class="gutter">
			        <div class="entry">
			           <span class="entry-title"><?php the_title(); ?></span>
			           <div class="entry-excerpt">
			              <?php the_content(); ?>
			           </div>
			           <a href="<?php the_field('url');?>" class="KCPL_readmore">Learn more ≈</a>
			        </div>
			     </div>
		   </div>
		</div>

<?php endwhile; } ?>

	<div class="pagination clearfix"> 

	<?php 
 /*

echo paginate_links( array(
	'prev_text'    => __('<i class="fa fa-angle-double-left"></i>'),
	'next_text'    => __('<i class="fa fa-angle-double-right"></i>')
) );
 
?>

<?php next_posts_link();  */?>
</div>
	<!--
	<a class="previous page-numbers" href=""><i class="fa fa-angle-double-left"></i></a>
	<span class='page-numbers current'>1</span>
	<a class='page-numbers' href=''>2</a>
	<a class="next page-numbers" href=""><i class="fa fa-angle-double-right"></i></a>
-->

	</div>
</div>	

<?php get_footer(); ?>
