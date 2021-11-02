<?php
/**
 * Scripts and stylesheets
 *
 * Enqueue stylesheets in the following order:
 * 1. /theme/assets/css/main.css
 *
 * Enqueue scripts in the following order:
 * 1. jquery-1.11.1.min.js via Google CDN
 * 2. /theme/assets/js/vendor/modernizr.min.js
 * 3. /theme/assets/js/scripts.js
 *
 * Google Analytics is loaded after enqueued scripts if:
 * - An ID has been defined in config.php
 * - You're not logged in as an administrator
 */
function roots_scripts() {
  /**
   * The build task in Grunt renames production assets with a hash
   * Read the asset names from assets-manifest.json
   */
  
    $assets = array(
      // 'font'      => 'https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i',
      // 'bootstrap' => '/assets/css/bootstrap.min.css',
      // 'jqueryui_css'=> 'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css',
      // 'owl_coursel_css'=> '/assets/css/owl.carousel.css',
      // 'fontawsome' => '/assets/css/font-awesome.min.css',
      // 'normalize' => '/assets/css/normalize.css',
      // 'maincss' => '/assets/css/main.css',
      // 'gforms'=> '/assets/css/forms.css',
      // 'mainstyle'=> '/assets/css/style.css',
      // 'responsive'=> '/assets/css/responsive.css',
      // 'options'=> '/assets/css/options.css'         
      
    );
  
    foreach ($assets as $key => $asset) {
      if (strpos($asset, 'https://') !== false) {
        wp_enqueue_style($key,$asset, false, null);
      }else{
        wp_enqueue_style($key, get_stylesheet_directory_uri() . $asset, false, null);
      }
      
    }
    wp_enqueue_script('modernizr', get_stylesheet_directory_uri() . '/assets/js/vendor/modernizr-3.5.0.min.js', array(), null, false);
    wp_enqueue_script('jquery','https://code.jquery.com/jquery-3.2.1.min.js', array(), null, false);
    wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', array(), null, true);
    wp_enqueue_script('owl', get_stylesheet_directory_uri() . '/assets/js/owl.carousel.min.js', array(), null, true);
    wp_enqueue_script('jQueryUI','https://code.jquery.com/ui/1.12.1/jquery-ui.js', array(), null, true);
    wp_enqueue_script('plugins', get_stylesheet_directory_uri() . '/assets/js/plugins.js', array(), null, true);
    wp_enqueue_script('main', get_stylesheet_directory_uri() . '/assets/js/main.js', array(), null, true);
    
}
add_action('wp_enqueue_scripts', 'roots_scripts', 100);

function generate_css_options(){
  $screen = get_current_screen();
  if($screen->id == "theme-settings_page_acf-options-style-options"){
    $result='';

    if(get_field('header_background_color','option')){
      $result=$result.'header{
        background-color:'.get_field('header_background_color','option').'
      }';
    }
    if(get_field('go_button_color','option')){
    	$result=$result.'header .form-inline .btn{
    		background-color:'.get_field('go_button_color','option').'
    	}';
    }

    if(get_field('home_page_hero_section_border_color','option')){
      $result=$result.'.hero-section {
        border-top-color: '.get_field('home_page_hero_section_border_color','option').';
        border-bottom-color: '.get_field('home_page_hero_section_border_color','option').';
      }';
    }

    if(get_field('hero_section_title_style','option')){
      $result=$result.'.hero-section h1 {
        color: '.get_field('hero_section_title_style','option').'
      }';
    }

    if(get_field('hero_section_subtitle_style','option')){
      $result=$result.'.hero-section span.subtitle {
        color: '.get_field('hero_section_subtitle_style','option').'
      }';
    }

    if(get_field('menu_background_color','option')){
      $result=$result.'.header .navbar .navbar-collapse {
        background-color: '.get_field('menu_background_color','option').'
      }';
    }

    if(get_field('menu_text_color','option')){
      $result=$result.'header .navbar-light .navbar-nav .nav-link {
        color: '.get_field('menu_text_color','option').'
      }';
    }

    if(get_field('menu_drop_down_text_color','option')){
      $result=$result.'.navbar-collapse .navbar-nav .dropdown-menu .dropdown-item {
        color: '.get_field('menu_drop_down_text_color','option').'
      }';
    }

    if(get_field('coupon_section_title','option')){
      $result=$result.'.products h2 {
        color: '.get_field('coupon_section_title','option').'
      }';
    }

    if(get_field('coupon_section_sort_list_color','option')){
      $result=$result.'.products ul.sort-list li.active a {
        color: '.get_field('coupon_section_sort_list_color','option').'
      }';
    }

    if(get_field('coupon_section_product_card_title_color','option')){
      $result=$result.'.products .card .card-header .cont-wrp h3 {
        color: '.get_field('coupon_section_product_card_title_color','option').'
      }';
    }

    if(get_field('coupon_section_product_card_subtitle_color','option')){
      $result=$result.'.products .card .card-header .cont-wrp span.subtitle {
        color: '.get_field('coupon_section_product_card_subtitle_color','option').'
      }';
    }

    if(get_field('coupon_section_product_card_border','option')){
      $result=$result.'.products .card .card-header {
        border-color: '.get_field('coupon_section_product_card_border','option').'
      }';
    }

    if(get_field('coupon_section_product_card_border_active','option')){
      $result=$result.'.products .card .card-header.active,.products .card .card-body {
        border-color: '.get_field('coupon_section_product_card_border_active','option').'
      }';

      $result=$result.'.products .card .card-body .tab-content form .btn {
        background-color: '.get_field('coupon_section_product_card_border_active','option').'
      }';
    }

    if(get_field('coupon_section_product_card_background','option')){
      $result=$result.'.products .card .card-header {
       	background-color: '.get_field('coupon_section_product_card_background','option').'
      }';
    }

    if(get_field('coupon_section_product_card_button_color','option')){
      $result=$result.'.products .card .card-header .cont-wrp .right-cont .btn-primary {
       	background-color: '.get_field('coupon_section_product_card_button_color','option').'
      }';
    }

    if(get_field('coupon_section_product_card_save_and_like_color','option')){
      $result=$result.'ul.activities li.like, ul.activities li.save{
       	color: '.get_field('coupon_section_product_card_save_and_like_color','option').'
      }';
    }

    if(get_field('coupon_section_product_card_save_and_like_active_color','option')){
      $result=$result.'ul.activities li.save.active a, ul.activities li.active span, ul.activities li.like.active a:before {
       	color: '.get_field('coupon_section_product_card_save_and_like_active_color','option').'
      }';
    }

    if(get_field('coupon_section_product_card_see_note_button','option')){
      $result=$result.'.products .card .btn-link {
       	color: '.get_field('coupon_section_product_card_see_note_button','option').'
      }';
    }

    if(get_field('coupon_section_product_card_body_tab_color','option')){
      $result=$result.'.products .card .card-body .nav-tabs .nav-link {
       	color: '.get_field('coupon_section_product_card_body_tab_color','option').'
      }';
    }

    if(get_field('coupon_section_product_card_body_active_tab_color','option')){
      $result=$result.'.products .card .card-body .nav-tabs .nav-link.active {
       	color: '.get_field('coupon_section_product_card_body_active_tab_color','option').'
      }';
    }

    if(get_field('coupon_section_product_card_body_text_color','option')){
      $result=$result.'.products .card .card-body .tab-content p {
       	color: '.get_field('coupon_section_product_card_body_text_color','option').'
      }';
    }

    if(get_field('coupon_section_view_more_button_color','option')){
      $result=$result.'.products .btn.view-more:active, .btn.btn-primary:focus, .btn.btn-primary:hover, .btn.btn-primary:active, .btn.btn-primary {
       	background-color: '.get_field('coupon_section_view_more_button_color','option').'
      }';
    }

    if(get_field('about_us_section_background','option')){
      $result=$result.'.home .about-us {
       	background-color: '.get_field('about_us_section_background','option').'
      }';
    }
    
    if(get_field('about_us_title_color','option')){
      $result=$result.'.home .about-us h2 {
       	color: '.get_field('about_us_title_color','option').'
      }';
    }

    if(get_field('about_us_subtitle_color','option')){
      $result=$result.'.home .about-us .header p {
       	color: '.get_field('about_us_subtitle_color','option').'
      }';
    }

    if(get_field('about_us_description_color','option')){
      $result=$result.'.home .about-us p {
       	color: '.get_field('about_us_description_color','option').'
      }';
    }

    if(get_field('store_section_background','option')){
      $result=$result.'.popular-stories {
       	background-color: '.get_field('store_section_background','option').'
      }';
    }

    if(get_field('store_section_title_color','option')){
      $result=$result.'.popular-stories h2 {
       	color: '.get_field('store_section_title_color','option').'
      }';
    }

    if(get_field('store_section_stores_name_color','option')){
      $result=$result.'.popular-stories ul li a, .popular-stories ul li a:hover {
       	color: '.get_field('store_section_stores_name_color','option').'
      }';
    }

    if(get_field('popular_store_section_background_color','option')){
      $result=$result.'.popular-searches {
       	background-color: '.get_field('popular_store_section_background_color','option').'
      }';
    }

    if(get_field('popular_store_title_color','option')){
      $result=$result.'.popular-searches h2 {
       	color: '.get_field('popular_store_title_color','option').'
      }';
    }

    if(get_field('popular_store_stores_name_color','option')){
      $result=$result.'.popular-searches ul li a, .popular-searches ul li a:hover {
       	color: '.get_field('popular_store_stores_name_color','option').'
      }';
    }

    if(get_field('footer_text_color','option')){
      $result=$result.'.footer ul li a, .footer ul li a:hover {
       	color: '.get_field('footer_text_color','option').'
      }';
    }





    $path=get_template_directory().'/assets/css/options.css';
    file_put_contents($path,$result);
    
  }else{
    return;
  }
  
}

add_action('acf/save_post', 'generate_css_options', 20);