<?php
function my_acf_google_map_api( $api ){
	
	$api['key'] = 'AIzaSyBP-dRHpWm6nwN9ONbKMa_3_yapg-mAsX4';
	
	return $api;
	
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
add_filter( 'acf/fields/post_object/query', 'change_posts_order' );
function change_posts_order( $args ) {
	$args['orderby'] = 'date';
	$args['order'] = 'DESC';
	return $args;
}
if( function_exists('acf_add_options_page') ) {

	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Home Page Settings',
		'menu_title'	=> 'Home Page',
		'parent_slug'	=> 'theme-general-settings',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Customers Archive',
		'menu_title'	=> 'Customers Options',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Customers Details Options',
		'menu_title'	=> 'Customers Details Options',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Partners Archive',
		'menu_title'	=> 'Partners Options',
		'parent_slug'	=> 'theme-general-settings',
	));

	
}

