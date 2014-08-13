<?php
/**
    * Plugin Name: KCPL - Plugin Package
    * Plugin URI: http://meshfresh.com
    * Description: Plugin package for KCPL containing Advanced Custom Fields and Formidable
    * Version: 1.0
    * Author: MESH Design
    * Author URI: http://meshfresh.com
*/
   require WPMU_PLUGIN_DIR.'/advanced-custom-fields/acf.php';
   require WPMU_PLUGIN_DIR.'/acf-repeater/acf-repeater.php';
   require WPMU_PLUGIN_DIR.'/acf-wordpress-wysiwyg-field-master/acf-wp_wysiwyg.php';
   require WPMU_PLUGIN_DIR.'/ACF-limiter-field-wysiwyg/acf-limiter.php';
   require WPMU_PLUGIN_DIR.'/advanced-custom-fields-oembed-field/acf-oembed.php';
   require WPMU_PLUGIN_DIR.'/formidable/formidable.php';
?>
