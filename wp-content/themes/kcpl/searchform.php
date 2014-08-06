<form role="search" method="get" id="searchform" class="searchform" action="<?php esc_url(home_url('/')); ?>">
	<input type="text" value="<?php get_search_query(); ?>" name="s" id="s" placeholder="Search Our Site" />
	<input type="submit" id="searchsubmit" value="<?php esc_attr_x('Search','submit button'); ?>" />
</form>
