<?php 
if ( ! defined('ABSPATH') ) {
    
    require_once('../../../../wp-load.php' );
}


do_action('clear_database');
do_action('insert_api_categories');
// do_action('insert_merchats_info');
// do_action('insert_deals_info');
// do_action('insert_api_logos');

?>