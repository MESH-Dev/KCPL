<?php
//get parent ID
function KCPL_get_menu_parent_ID(){
  $slugs = array('main_nav','util_nav');
  //print_r($slugs);
  foreach($slugs as $menu_slug)
  {
    $locations = get_nav_menu_locations();
    $menu_id   = $locations[$menu_slug];
    $post_id        = get_the_ID();
    $menu_items     = wp_get_nav_menu_items($menu_id);
    $parent_item_id = wp_filter_object_list($menu_items,array('object_id'=>$post_id),'and','menu_item_parent');
    $parent_item_id = array_shift( $parent_item_id );
    if(!empty($parent_item_id)){
      return checkForParent($parent_item_id,$menu_items);
    } 
  }
  return $post_id;

}

function checkForParent($parent_item_id,$menu_items){
  $parent_post_id = wp_filter_object_list( $menu_items, array( 'ID' => $parent_item_id ), 'and', 'object_id' );
  $parent_item_id = wp_filter_object_list($menu_items,array('ID'=>$parent_item_id),'and','menu_item_parent');
  $parent_item_id = array_shift( $parent_item_id );
  if($parent_item_id=="0"){
    $parent_post_id = array_shift($parent_post_id);
    return $parent_post_id;
  }else{
    return checkForParent($parent_item_id,$menu_items);
  }
}

//get sidebar widget from KCPL_get_menu_parent_ID()
function KCPL_get_sidebar($postID){
  return get_field('sidebar_fields',intval($postID));
}

//cycle
function cycle($first_value, $values = '*') {
  static $count = array();
  $values = func_get_args();
  $name = 'default';
  $last_item = end($values);
  if( substr($last_item, 0, 1) === ':' ) {
    $name = substr($last_item, 1);
    array_pop($values);
  }
  if( !isset($count[$name]) )
    $count[$name] = 0;
  $index = $count[$name] % count($values);
  $count[$name]++;
  return $values[$index];
}

// get highest level ancestor ID

function KCPL_get_highest_ancestor($post) {
    if ($post->post_parent)	{
    	$ancestors=get_post_ancestors($post->ID);
    	$root=count($ancestors)-1;
    	$parent = $ancestors[$root];
        return $parent;
    } else {
    	$parent = $post->ID;
        return $parent;
    }
}
