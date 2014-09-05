<?php

if(isset($_GET['search-type'])) {
    $type = $_GET['search-type'];
    if($type == 'resources') {
        load_template(TEMPLATEPATH . '/resources-search.php');
    }  
}
?>
