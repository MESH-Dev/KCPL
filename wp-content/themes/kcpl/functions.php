<?php
  include_once('functions/toolbox.php');
  include_once('functions/branch-hours.php');

  //enqueue scripts and styles *use production assets. Dev assets are located in assets/css and assets/js
  function KCPL_scripts() {
    wp_enqueue_style('font-awesome','//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css');
  	wp_enqueue_style( 'KCPL-style', get_stylesheet_uri() );
    wp_enqueue_style('jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
      wp_enqueue_script('jquery-ui-core');
      wp_enqueue_script('jquery-effects-slide');
  	wp_enqueue_script( 'KCPL-script', get_template_directory_uri().'/assets/prod/KCPL.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script('typekit','//use.typekit.net/drm7klb.js');
    wp_localize_script( 'KCPL-script', 'KCPL',array(
      'ajaxurl' => admin_url('admin-ajax.php'),
      'curUser' => get_current_user_id()
      )
    );
  }
  add_action( 'wp_enqueue_scripts', 'KCPL_scripts' );

  //theme supports
  add_theme_support('post-thumbnails');
  $defaults = array(
    'flex-height'   => true,
    'flex-width'    => true,
    'height'        => 78,
    'width'         => 194,
    'default-image' => get_template_directory_uri() . '/assets/img/logo.png',
    'header-text'   => false
  );
  add_theme_support('custom-header', $defaults);
  add_theme_support('custom-background');
  add_theme_support('html5');
  add_theme_support('automatic-feed-links');

  //menus
  register_nav_menus(array(
  	'main_nav'   => 'Header and breadcrumb trail heirarchy',
    'util_nav'   => 'Utility Nav in header',
  	'social_nav' => 'Social menu used throughout'
  ));

  // unregister all widgets
 function unregister_default_widgets() {
     unregister_widget('WP_Widget_Pages');
     unregister_widget('WP_Widget_Calendar');
     unregister_widget('WP_Widget_Archives');
     unregister_widget('WP_Widget_Links');
     unregister_widget('WP_Widget_Meta');
     unregister_widget('WP_Widget_Search');
     unregister_widget('WP_Widget_Categories');
     unregister_widget('WP_Widget_Recent_Posts');
     unregister_widget('WP_Widget_Recent_Comments');
     unregister_widget('WP_Widget_RSS');
     unregister_widget('WP_Widget_Tag_Cloud');
     unregister_widget('WP_Nav_Menu_Widget');
     unregister_widget('Twenty_Eleven_Ephemera_Widget');
 } add_action('widgets_init', 'unregister_default_widgets', 11);

  //widgets
  register_sidebar(array(
	   'name'          => __( 'Footer - Column One' ),
	   'id'            => 'footer-col1',
	   'description'   => '',
     'class'         => 'footer-location-widget',
	   'before_widget' => '',
	   'after_widget'  => '',
	   'before_title'  => '<span class="title">',
	   'after_title'   => '</span>' ));
  register_sidebar(array(
     'name'          => __( 'Footer - Column Two' ),
     'id'            => 'footer-col2',
     'description'   => '',
     'class'         => 'footer-location-widget',
     'before_widget' => '',
     'after_widget'  => '',
     'before_title'  => '<span class="title">',
     'after_title'   => '</span>' ));
  register_sidebar(array(
     'name'          => __( 'Footer - Column Three' ),
     'id'            => 'footer-col3',
     'description'   => '',
     'class'         => 'footer-location-widget',
     'before_widget' => '',
     'after_widget'  => '',
     'before_title'  => '<span class="title">',
     'after_title'   => '</span>' ));
  register_sidebar(array(
     'name'          => __( 'Footer - Column Four' ),
     'id'            => 'footer-col4',
     'description'   => '',
     'class'         => 'footer-location-widget',
     'before_widget' => '',
     'after_widget'  => '',
     'before_title'  => '<span class="title">',
     'after_title'   => '</span>' ));

  //editor style
  add_editor_style('assets/css/wp-editor.css');

  //login page style
  function KCPL_loginCSS() {
	   echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_directory').'/assets/img/wp-login.css"/>';
  } add_action('login_head', 'KCPL_loginCSS');

  //footer attribution
  function KCPL_footer_admin () {
	   echo 'Theme developed by <a href="http://meshfresh.com">MESH Design</a>.';
  } add_filter('admin_footer_text', 'KCPL_footer_admin');

  //disable code editors
  define('DISALLOW_FILE_EDIT', true);

  //research CPT
  add_action('init','KCPL_researchCPT');
  function KCPL_researchCPT() {
  	$labels = array(
  		'name'               => _x('Research Tools & Resources','post type general name'),
  		'singular_name'      => _x('Research Tool or Resource','post type singular name'),
  		'menu_name'          => _x('Research Tools & Resources','admin menu'),
  		'name_admin_bar'     => _x('Research Tool or Resource','add new on admin bar'),
  		'add_new'            => _x('Add New','add new'),
  		'add_new_item'       => __('Add New Research Tool or Resource'),
  		'new_item'           => __('New Research Tool or Resource'),
  		'edit_item'          => __('Edit Research Tool or Resource'),
  		'view_item'          => __('View Research Tool or Resource'),
  		'all_items'          => __('All Research Tools & Resources'),
  		'search_items'       => __('Search Research Tools & Resources'),
  		'parent_item_colon'  => __('Parent Research Tools & Resources:'),
  		'not_found'          => __('No Research Tools or Resources found.'),
  		'not_found_in_trash' => __('No Research Tools or Resources found in Trash.')
  	);

  	$args = array(
  		'labels'             => $labels,
  		'public'             => true,
  		'publicly_queryable' => true,
  		'show_ui'            => true,
  		'show_in_menu'       => true,
  		'query_var'          => true,
  		'rewrite'            => array( 'slug' => 'resources'),
  		'capability_type'    => 'post',
  		'has_archive'        => true,
  		'hierarchical'       => false,
  		'menu_position'      => null,
  		'supports'           => array('title','editor','author','thumbnail','excerpt','comments')
  	); register_post_type('resources',$args);
  }

  //research Tax
  add_action( 'init', 'KCPL_researchTax' );
  function KCPL_researchTax() {
  	register_taxonomy(
  		'resources-category',
  		'resources',
  		array(
  			'label' => __('Resource Category'),
  			'rewrite' => array('slug'=>'resource-category'),
  			'hierarchical' => true,
  		)
  	);
  }

  //Audience Taxonomy
  function KCPL_audience_tax() {

    $labels = array(
      'name'                       => 'Audiences',
      'singular_name'              => 'Audience',
      'menu_name'                  => 'Audiences',
      'all_items'                  => 'All Audience',
      'parent_item'                => 'Parent Audience',
      'parent_item_colon'          => 'Parent Audience:',
      'new_item_name'              => 'New Audience Name',
      'add_new_item'               => 'Add New Audience',
      'edit_item'                  => 'Edit Audience',
      'update_item'                => 'Update Audience',
      'separate_items_with_commas' => 'Separate Audience with commas',
      'search_items'               => 'Search Audience',
      'add_or_remove_items'        => 'Add or remove Audiences',
      'choose_from_most_used'      => 'Choose from the most used items',
      'not_found'                  => 'Not Found',
    );
    $args = array(
      'labels'                     => $labels,
      'hierarchical'               => true,
      'public'                     => true,
      'show_ui'                    => true,
      'show_admin_column'          => true,
      'show_in_nav_menus'          => true,
    );
    register_taxonomy( 'audience', array( 'resources' ), $args );
  }
  add_action( 'init', 'KCPL_audience_tax');

  //Audience Taxonomy
  function KCPL_access_tax() {

    $labels = array(
      'name'                       => 'Access',
      'singular_name'              => 'Access',
      'menu_name'                  => 'Access',
      'all_items'                  => 'All Access',
      'parent_item'                => 'Parent Access',
      'parent_item_colon'          => 'Parent Access:',
      'new_item_name'              => 'New Access Name',
      'add_new_item'               => 'Add New Access',
      'edit_item'                  => 'Edit Access',
      'update_item'                => 'Update Access',
      'separate_items_with_commas' => 'Separate Access with commas',
      'search_items'               => 'Search Access',
      'add_or_remove_items'        => 'Add or remove Access',
      'choose_from_most_used'      => 'Choose from the most used items',
      'not_found'                  => 'Not Found',
    );
    $args = array(
      'labels'                     => $labels,
      'hierarchical'               => true,
      'public'                     => true,
      'show_ui'                    => true,
      'show_admin_column'          => true,
      'show_in_nav_menus'          => true,
    );
    register_taxonomy( 'access', array( 'resources' ), $args );
  }
  add_action( 'init', 'KCPL_access_tax');






  //Comment walker
	function comments_walker($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);
		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
	?>
		<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? 'clearfix' : 'clearfix parent' ) ?> id="comment-<?php comment_ID() ?>">
		<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body clearfix">
		<?php endif; ?>
    <div class="comment-wrap clearfix">
      <?php edit_comment_link( __( '(Edit)' ), '  ', '' ); ?>
       <div class="comment-img"><?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?></div>
       <div class="comment-content">
          <span class="name"><?php printf( __( 'Posted by %s' ),get_comment_author_link()); ?></span>
          <span class="date"><?php printf( __('%1$s'), get_comment_date()); ?></span>
          <div class="comment-comment">
            <?php if ( $comment->comment_approved == '0' ){ ?>
              <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
              <br />
            <?php } ?>
            <?php comment_text(); ?></div>
          <!--<a class="reply KCPL_readmore" href="#">Reply ≈</a>!-->
          <?php comment_reply_link(array_merge($args,array('reply_text'=>'Reply ≈','add_below'=>$add_below,'depth'=>$depth,'max_depth'=>$args['max_depth']))); ?>
          <a class="leave-comment KCPL_readmore" href="#KCPL_commentbox">Leave a Comment ≈</a>
       </div>
    </div>
		<?php if ( 'div' != $args['style'] ) : ?>
		</div>
		<?php endif; ?>
	<?php
	}


 //ADMIN CLEANUP
 add_action('admin_menu','remove_dashboard_widgets'); // cleaning dashboard widgets
 add_action('admin_menu', 'delete_menu_items'); // deleting menu items from admin area
 add_action('admin_menu','customize_meta_boxes'); // remove some meta boxes from pages and posts edition page


/*** cleaning up the dashboard- ----------------------------------------*/
function remove_dashboard_widgets(){

  //remove_meta_box('dashboard_right_now','dashboard','core'); // right now overview box
  remove_meta_box('dashboard_incoming_links','dashboard','core'); // incoming links box
  remove_meta_box('dashboard_quick_press','dashboard','core'); // quick press box
  remove_meta_box('dashboard_plugins','dashboard','core'); // new plugins box
  //remove_meta_box('dashboard_recent_drafts','dashboard','core'); // recent drafts box
  remove_meta_box('dashboard_recent_comments','dashboard','core'); // recent comments box
  remove_meta_box('dashboard_primary','dashboard','core'); // wordpress development blog box
  remove_meta_box('dashboard_secondary','dashboard','core'); // other wordpress news box


}

/*----------------------------------------------------------------------*/


/* Remove some menus froms the admin area*/
function delete_menu_items() {

  /*** Remove menu http://codex.wordpress.org/Function_Reference/remove_menu_page
  syntaxe : remove_menu_page( $menu_slug )  **/
  //remove_menu_page('index.php'); // Dashboard
  remove_menu_page('edit.php'); // Posts
  //remove_menu_page('upload.php'); // Media
  remove_menu_page('link-manager.php'); // Links
  //remove_menu_page('edit.php?post_type=page'); // Pages
  remove_menu_page('edit-comments.php'); // Comments
  //remove_menu_page('themes.php'); // Appearance
  //remove_menu_page('plugins.php'); // Plugins
  //remove_menu_page('users.php'); // Users
  //remove_menu_page('tools.php'); // Tools
  //remove_menu_page('options-general.php'); // Settings

}

/*----------------------------------------------------------------------*/


/* remove some meta boxes from pages and posts -------------------------
feel free to comment / uncomment  */

function customize_meta_boxes() {

  /* Removes meta boxes from pages */
  //remove_meta_box('postcustom','page','normal'); // custom fields metabox
  remove_meta_box('trackbacksdiv','page','normal'); // trackbacks metabox
  remove_meta_box('commentstatusdiv','page','normal'); // comment status metabox
  remove_meta_box('commentsdiv','page','normal'); // comments  metabox
  remove_meta_box('authordiv','page','normal'); // author metabox
  //remove_meta_box('revisionsdiv','page','normal'); // revisions  metabox
  //remove_meta_box('postimagediv','page','side'); // featured image metabox
  //remove_meta_box('slugdiv','page','normal'); // slug metabox

}

function custom_menu_order($menu_ord) {
    if (!$menu_ord) return true;

    return array(
        'index.php', // Dashboard
        'separator1', // First separator
        'edit.php?post_type=page', // Pages
        'edit.php?post_type=kcpl_calendar_entry', //Calendar
        'edit.php?post_type=resources',
        'separator2', // Second separator

        'upload.php', // Media
        'themes.php', // Appearance
        'separator-last', // Last separator
        'users.php', // Users
        'plugins.php', // Plugins

        'tools.php', // Tools
        'options-general.php', // Settings

    );
}
add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order
add_filter('menu_order', 'custom_menu_order');

?>
