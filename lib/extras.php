<?php

/**
 * Clean up the_excerpt()
 */
function roots_excerpt_more() {
  return ' &hellip; <a class="read-more-link"  href="' . get_permalink() . '">' .'READ COUNTERPARTS SUCCESS STORY'. '</a>';
  return '';
}

add_filter('excerpt_more', 'roots_excerpt_more');

function custom_excerpt_length( $length ) {
    return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );



function ve_breadcrumbs() {
 
  $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter = ''; // delimiter between crumbs
  $home = 'Home'; // text for the 'Home' link
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $before = '<li class="active">'; // tag before the current crumb
  $after = '</li>'; // tag after the current crumb
 
  global $post;
  $homeLink = get_bloginfo('url');
 
  if (is_home() || is_front_page()) {
 
    if ($showOnHome == 1) echo '<ol class="breadcrumb"><li><a href="' . $homeLink . '">Home</a></li></ol>';
 
  } else {
 
    echo '<ol class="breadcrumb"><li><a class="home-icon" href="' . $homeLink . '">Home</a></li>';
 
    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ');
      echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
 
    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;
 
    } elseif ( is_day() ) {
      echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> </li>';
      echo '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> </li>';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ';
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->name . '</a></li>';
        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
        echo '<li>'.$cats.'</li>';
        if ($showCurrent == 1) echo $before . get_the_title() . $after;
      }
 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->name . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo '<li>'.get_category_parents($cat, TRUE, ' ' . $delimiter . ' ').'</li>';
      echo '<li><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li>';
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
      }
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;
 
    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
     // echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</ol>';
 
  }
} // breadcrumbs()

function get_merchants_csv(){
  $url='http://services.fmtc.co/v2/getMerchants?key=e0c8ceaf175771e9b5175d3a217b7675';
  global $wp_version;
  $args = array(
    'timeout'     => 50,
    'redirection' => 5,
    'httpversion' => '1.0',
    'user-agent'  => 'WordPress/' . $wp_version . '; ' . home_url(),
    'blocking'    => true,
    'headers'     => array(),
    'cookies'     => array(),
    'body'        => null,
    'compress'    => false,
    'decompress'  => true,
    'sslverify'   => true,
    'stream'      => false,
    'filename'    => null
  ); 
  $response = wp_remote_get( $url, $args );
  
  if(is_array(str_getcsv($response['body']))){
    $results=str_getcsv($response['body']);
    $new_post_id='';
    for($i=28;$i<count($results);$i++){
      if($i%28==0){
        if(isset($results[$i+13])){
        $title=$results[$i+1];
        $status='draft';
        if(trim($results[$i+11])=='active'){
          $status='publish';
        }
        $post_date ='';
        $post_date=$results[$i+12];
        $post_date=str_replace('T', ' ', $post_date);

        $post_modified ='';
        $post_modified=$results[$i+13];
        $post_modified=str_replace('T', ' ', $post_modified);
        $defaults = array(
          'post_content' => '',
          'post_content_filtered' => '',
          'post_title' => $title,
          'post_excerpt' => '',
          'post_status' => $status,
          'post_date' => $post_date,
          'post_modified'=> $post_modified,
          'post_type' => 'merchants',
          'comment_status' => '',
          'ping_status' => '',
          'post_password' => '',
          'to_ping' =>  '',
          'pinged' => '',
          'post_parent' => 0,
          'menu_order' => 0,
          'guid' => '',
          'import_id' => 0,
          'context' => '',
        );
        $new_post_id=wp_insert_post($defaults);
        update_post_meta($new_post_id,'merchantid',trim(str_replace('FreshPressURL', '', $results[$i])));
        update_post_meta($new_post_id,'_merchantid','field_5abcbd997cf74');
      }
      }else if($i%28==2){
        update_post_meta($new_post_id,'network',trim($results[$i]));
        update_post_meta($new_post_id,'_network','field_5abcbda07cf75');
      }else if($i%28==3){
        update_post_meta($new_post_id,'networkid',trim($results[$i]));
        update_post_meta($new_post_id,'_networkid','field_5abcbde57cf76');
      }else if($i%28==4){
        update_post_meta($new_post_id,'networknotes',trim($results[$i]));
        update_post_meta($new_post_id,'_networknotes','field_5abcbdfa7cf77');
      }else if($i%28==5){
        update_post_meta($new_post_id,'dualmerchant',trim($results[$i]));
        update_post_meta($new_post_id,'_dualmerchant','field_5abcbe097cf78');
      }else if($i%28==6){
        update_post_meta($new_post_id,'relatedmerchants',trim($results[$i]));
        update_post_meta($new_post_id,'_relatedmerchants','field_5abcbe7a7cf79');
      }else if($i%28==7){
        update_post_meta($new_post_id,'parentmerchantid',trim($results[$i]));
        update_post_meta($new_post_id,'_parentmerchantid','field_5abcbe987cf7a');
      }else if($i%28==8){
        update_post_meta($new_post_id,'affiliateurl',trim($results[$i]));
        update_post_meta($new_post_id,'_affiliateurl','field_5abcbed47cf7b');
      }else if($i%28==9){
        update_post_meta($new_post_id,'skimlinksurl',trim($results[$i]));
        update_post_meta($new_post_id,'_skimlinksurl','field_5abcbef87cf7c');
      }else if($i%28==10){
        update_post_meta($new_post_id,'homepageurl',trim($results[$i]));
        update_post_meta($new_post_id,'_homepageurl','field_5abcbf007cf7d');
      }else if($i%28==14){
        update_post_meta($new_post_id,'selectedstatus',trim($results[$i]));
        update_post_meta($new_post_id,'_selectedstatus','field_5abcbf0f7cf7e');
      }else if($i%28==15){
        update_post_meta($new_post_id,'relationshipstatus',trim($results[$i]));
        update_post_meta($new_post_id,'_relationshipstatus','field_5abcbfa37cf7f');
      }else if($i%28==16){
        update_post_meta($new_post_id,'primarycountry',trim($results[$i]));
        update_post_meta($new_post_id,'_primarycountry','field_5abcbfb27cf80');
      }else if($i%28==17){
        update_post_meta($new_post_id,'shipstocountries',trim($results[$i]));
        update_post_meta($new_post_id,'_shipstocountries','field_5abcbfbe7cf81');
      }else if($i%28==18){ 
        update_post_meta($new_post_id,'apofpo',trim($results[$i]));
        update_post_meta($new_post_id,'_apofpo','field_5abcc0247cf82');
      }else if($i%28==21){ 
        update_post_meta($new_post_id,'specialpaymentoptions',trim($results[$i]));
        update_post_meta($new_post_id,'_specialpaymentoptions','field_5abcc0997cf84');
      }else if($i%28==22){ 
        update_post_meta($new_post_id,'mobilecertified',trim($results[$i]));
        update_post_meta($new_post_id,'_mobilecertified','field_5abcc0c37cf85');
      }else if($i%28==26){
        update_post_meta($new_post_id,'customdescription',trim($results[$i]));
        update_post_meta($new_post_id,'_customdescription','field_5abcc1277cf89');
      }else if($i%28==27){
        update_post_meta($new_post_id,'nmastermerchantid',trim($results[$i]));
        update_post_meta($new_post_id,'_nmastermerchantid','field_5abcc0fd7cf87');
      }
    }

  }
}
function get_merchants_json(){
  $url='http://services.fmtc.co/v2/getMerchants?key=e0c8ceaf175771e9b5175d3a217b7675';
  global $wp_version;
  $args = array(
    'timeout'     => 50,
    'redirection' => 5,
    'httpversion' => '1.0',
    'user-agent'  => 'WordPress/' . $wp_version . '; ' . home_url(),
    'blocking'    => true,
    'headers'     => array(),
    'cookies'     => array(),
    'body'        => null,
    'compress'    => false,
    'decompress'  => true,
    'sslverify'   => true,
    'stream'      => false,
    'filename'    => null
  ); 
  $response = wp_remote_get( $url, $args );
  $data=json_decode($response['body']);
  // var_dump($data);
  for($i=0;$i<count($data);$i++){
    $merchant=$data[$i];
    $args=array(
      'post_type'=>'merchants',
      'posts_per_page'=>-1,
      'meta_key'=>'merchantid',
      'meta_value'=>$merchant->nMerchantID,
      'meta_compare'=>'='
      );
    $old_merchant = new WP_Query($args);
    if(!$old_merchant->found_posts){
      // die();
      $merchant=$data[$i];
      // var_dump($merchant);die();
      $status='draft';
      if(trim($merchant->cStatus)=='active'){
        $status='publish';
      }
      $post_date ='';
      $post_date=$merchant->dtCreated;
      $post_date=str_replace('T', ' ', $post_date);
      $post_modified ='';
      $post_modified=$merchant->dtLastUpdated;
      $post_modified=str_replace('T', ' ', $post_modified);

      $defaults = array(
        'post_content' => '',
        'post_content_filtered' => '',
        'post_title' => $merchant->cName,
        'post_excerpt' => '',
        'post_status' => $status,
        'post_date' => $post_date,
        'post_modified'=> $post_modified,
        'post_type' => 'merchants',
        'comment_status' => '',
        'ping_status' => '',
        'post_password' => '',
        'to_ping' =>  '',
        'pinged' => '',
        'post_parent' => 0,
        'menu_order' => 0,
        'guid' => '',
        'import_id' => 0,
        'context' => '',
      );

      $new_post_id=wp_insert_post($defaults);
      update_post_meta($new_post_id,'merchantid',$merchant->nMerchantID);
      update_post_meta($new_post_id,'_merchantid','field_5abcbd997cf74');
      update_post_meta($new_post_id,'network',$merchant->cNetwork);
      update_post_meta($new_post_id,'_network','field_5abcbda07cf75');
      update_post_meta($new_post_id,'networkid',$merchant->cProgramID);
      update_post_meta($new_post_id,'_networkid','field_5abcbde57cf76');
      update_post_meta($new_post_id,'networknotes',$merchant->cNetworkNotes);
      update_post_meta($new_post_id,'_networknotes','field_5abcbdfa7cf77');

      
      $logo=$merchant->aLogos;
      if(is_array($logo)){
        for ($j=0; $j < count($logo) ; $j++) { 
          if($j==0){
            update_post_meta($new_post_id,'xsmall_logo',$logo[$j]->cFilename);
          } else if($j==1){
            update_post_meta($new_post_id,'small_logo',$logo[$j]->cFilename);
          } else if($j==2){
            update_post_meta($new_post_id,'normal_logo',$logo[$j]->cFilename);
          } else if($j==3){
            update_post_meta($new_post_id,'large_logo',$logo[$j]->cFilename);
          }
        }
      }
      $dualmerchant=0;
      if(isset($merchant->dualmerchant[0])){
        $dualmerchant=1;
      }
      update_post_meta($new_post_id,'dualmerchant',$dualmerchant);
      update_post_meta($new_post_id,'_dualmerchant','field_5abcbe097cf78');
      $merchants='';
      if(is_array($merchant->aDualMerchants) && isset($merchant->aDualMerchants[0])){
        for ($j=0; $j < count($merchant->aDualMerchants); $j++) { 
          if($j!=0){ $merchants=$merchants.', ';}
          $merchants=$merchants.$merchant->aDualMerchants[$j]->cName;
        }
      }
      update_post_meta($new_post_id,'relatedmerchants',$merchants);
      update_post_meta($new_post_id,'_relatedmerchants','field_5abcbe7a7cf79');
      update_post_meta($new_post_id,'parentmerchantid',$merchant->nParentMerchantID);
      update_post_meta($new_post_id,'_parentmerchantid','field_5abcbe987cf7a');
      update_post_meta($new_post_id,'affiliateurl',$merchant->cAffiliateURL);
      update_post_meta($new_post_id,'_affiliateurl','field_5abcbed47cf7b');
      update_post_meta($new_post_id,'skimlinksurl',$merchant->cSkimlinksURL);
      update_post_meta($new_post_id,'_skimlinksurl','field_5abcbef87cf7c');
      update_post_meta($new_post_id,'homepageurl',$merchant->cHomepageURL);
      update_post_meta($new_post_id,'_homepageurl','field_5abcbf007cf7d');
      update_post_meta($new_post_id,'selectedstatus',$merchant->bSelected);
      update_post_meta($new_post_id,'_selectedstatus','field_5abcbf0f7cf7e');
      update_post_meta($new_post_id,'relationshipstatus',$merchant->bRelationshipExists);
      update_post_meta($new_post_id,'_relationshipstatus','field_5abcbfa37cf7f');
      update_post_meta($new_post_id,'primarycountry',$merchant->cPrimaryCountry);
      update_post_meta($new_post_id,'_primarycountry','field_5abcbfb27cf80');
      $aShipToCountries='';
      // var_dump($merchant);
      if(is_array($merchant->aShipToCountries) && isset($merchant->aShipToCountries[0])){
        for ($j=0; $j < count($merchant->aShipToCountries); $j++) { 
          if($j!=0){ $aShipToCountries=$aShipToCountries.', ';}
          $aShipToCountries=$aShipToCountries.$merchant->aShipToCountries[$j];
        }
      }
      update_post_meta($new_post_id,'shipstocountries',$aShipToCountries);
      update_post_meta($new_post_id,'_shipstocountries','field_5abcbfbe7cf81');
      update_post_meta($new_post_id,'apofpo',$merchant->bAPOFPO);
      update_post_meta($new_post_id,'_apofpo','field_5abcc0247cf82');
      update_post_meta($new_post_id,'specialpaymentoptions',$merchant->aPaymentOptions);
      update_post_meta($new_post_id,'_specialpaymentoptions','field_5abcc0997cf84');
      update_post_meta($new_post_id,'mobilecertified',$merchant->bMobileCertified);
      update_post_meta($new_post_id,'_mobilecertified','field_5abcc0c37cf85');
      update_post_meta($new_post_id,'customdescription',$merchant->cCustomMerchantDescription);
      update_post_meta($new_post_id,'_customdescription','field_5abcc1277cf89');
      update_post_meta($new_post_id,'nmastermerchantid',$merchant->nMasterMerchantID);
      update_post_meta($new_post_id,'_nmastermerchantid','field_5abcc0fd7cf87');

      $cPrimaryCategory=$merchant->aCategoriesV2;
      $all_category=array();
      foreach ($cPrimaryCategory as $category) {
        $category_name=$category->cName;
        // var_dump($category_name);
        $term=get_term_by('name',$category_name,'merchants-categories');
        // var_dump($term);
        $term_id=$term->term_id;
        array_push($all_category, $term_id);
      }
       wp_set_post_terms($new_post_id,$all_category,'merchants-categories');

      update_post_meta($new_post_id,'cprimarycategory',$cat);
      update_post_meta($new_post_id,'_cprimarycategory','field_5ad7462d42a50');
    }
  }

}
add_action('insert_merchats_info','get_merchants_json',12);
// get_merchants_json();
function get_merchants_categories(){
  $url='http://services.fmtc.co/v2/getCategories?key=e0c8ceaf175771e9b5175d3a217b7675';
  global $wp_version;
  $args = array(
    'timeout'     => 50,
    'redirection' => 5,
    'httpversion' => '1.0',
    'user-agent'  => 'WordPress/' . $wp_version . '; ' . home_url(),
    'blocking'    => true,
    'headers'     => array(),
    'cookies'     => array(),
    'body'        => null,
    'compress'    => false,
    'decompress'  => true,
    'sslverify'   => true,
    'stream'      => false,
    'filename'    => null
  );
  $response = wp_remote_get( $url, $args );
  if(is_array(str_getcsv($response['body']))){

    $results=str_getcsv($response['body']);
    
    $new_post_id='';

    for($i=3;$i<count($results);$i++){
      if($i%3==0){
        if(isset($results[$i]) && trim($results[$i]) ==''){
          break;
        }
        $title=$results[$i+2];
        $defaults = array(
            'post_content' => '',
            'post_content_filtered' => '',
            'post_title' => $title,
            'post_excerpt' => '',
            'post_status' => 'publish',
            'post_type' => 'merchant-category',
            'comment_status' => '',
            'ping_status' => '',
            'post_password' => '',
            'to_ping' =>  '',
            'pinged' => '',
            'post_parent' => 0,
            'menu_order' => 0,
            'guid' => '',
            'import_id' => 0,
            'context' => '',
          );
        $new_post_id=wp_insert_post($defaults);
        $both=explode('^^^^^', preg_replace('/\n/','^^^^^', $results[$i]));
        $new_row=explode('^^^^^',  preg_replace('/\n/','^^^^^', $results[$i+3]));
        
          $restricted= trim($new_row[0]);
          $category_id=trim($both[1]);

        update_post_meta($new_post_id,'_category_id','field_5abcde07c7854');
        update_post_meta($new_post_id,'category_id',$category_id);
        update_post_meta($new_post_id,'_restricted','field_5abcde34c7856');
        update_post_meta($new_post_id,'restricted', $restricted);

      }else if($i%3==1){
        update_post_meta($new_post_id,'_parent_id','field_5abcde1cc7855');
        update_post_meta($new_post_id,'parent_id',$results[$i]);
      }

    }
    
  }
  
}

function get_merchants_categories_json(){
	$url='http://services.fmtc.co/v2/getCategories?key=e0c8ceaf175771e9b5175d3a217b7675';
  	global $wp_version;
  	$args = array(
	    'timeout'     => 50,
	    'redirection' => 5,
	    'httpversion' => '1.0',
	    'user-agent'  => 'WordPress/' . $wp_version . '; ' . home_url(),
	    'blocking'    => true,
	    'headers'     => array(),
	    'cookies'     => array(),
	    'body'        => null,
	    'compress'    => false,
	    'decompress'  => true,
	    'sslverify'   => true,
	    'stream'      => false,
	    'filename'    => null
	);
  $response = wp_remote_get( $url, $args );
  $data=json_decode($response['body']);
  
  for($i=0;$i<count($data);$i++){
  	$merchant_category=$data[$i];

  	$defaults = array(
        'post_content' => '',
        'post_content_filtered' => '',
        'post_title' => $merchant_category->cName,
        'post_excerpt' => '',
        'post_status' => 'publish',
        'post_type' => 'merchant-category',
        'comment_status' => '',
        'ping_status' => '',
        'post_password' => '',
        'to_ping' =>  '',
        'pinged' => '',
        'post_parent' => 0,
        'menu_order' => 0,
        'guid' => '',
        'import_id' => 0,
        'context' => '',
    );

    $new_post_id=wp_insert_post($defaults);

    update_post_meta($new_post_id,'_category_id','field_5abcde07c7854');
    update_post_meta($new_post_id,'category_id',$merchant_category->nCategoryID);
    update_post_meta($new_post_id,'_restricted','field_5abcde34c7856');
    update_post_meta($new_post_id,'restricted', $merchant_category->bRestricted);
    update_post_meta($new_post_id,'_parent_id','field_5abcde1cc7855');
    update_post_meta($new_post_id,'parent_id',$merchant_category->nParentID);
  }
}
// get_merchants_categories_json();


function get_deals_csv(){
	$url='http://services.fmtc.co/v2/getDeals?key=e0c8ceaf175771e9b5175d3a217b7675';
  	global $wp_version;
  	$args = array(
	    'timeout'     => 50,
	    'redirection' => 5,
	    'httpversion' => '1.0',
	    'user-agent'  => 'WordPress/' . $wp_version . '; ' . home_url(),
	    'blocking'    => true,
	    'headers'     => array(),
	    'cookies'     => array(),
	    'body'        => null,
	    'compress'    => false,
	    'decompress'  => true,
	    'sslverify'   => true,
	    'stream'      => false,
	    'filename'    => null
	);
  $response = wp_remote_get( $url, $args );
  $results=str_getcsv($response['body']);
  
}
// get_deals_csv();
function get_deals_json(){
  $url='http://services.fmtc.co/v2/getDeals?key=e0c8ceaf175771e9b5175d3a217b7675';
    global $wp_version;
    $args = array(
      'timeout'     => 50,
      'redirection' => 5,
      'httpversion' => '1.0',
      'user-agent'  => 'WordPress/' . $wp_version . '; ' . home_url(),
      'blocking'    => true,
      'headers'     => array(),
      'cookies'     => array(),
      'body'        => null,
      'compress'    => false,
      'decompress'  => true,
      'sslverify'   => true,
      'stream'      => false,
      'filename'    => null
  );
  $response = wp_remote_get( $url, $args );
  
  $results=json_decode($response['body']);

  foreach ($results as $deal ) {
    $args=array(
      'post_type'=>'deals',
      'posts_per_page'=>-1,
      'meta_key'=>'ncouponid',
      'meta_value'=>$deal->nCouponID,
      'meta_compare'=>'='
      );
    $old_deal=new WP_Query($args);
    if(!$old_deal->found_posts){
      $post_date ='';
      $post_date=$deal->cCreated;
      $post_date=str_replace('T', ' ', $post_date);
      $post_modified ='';
      $post_modified=$deal->cLastUpdated;
      $post_modified=str_replace('T', ' ', $post_modified);
  
      $defaults = array(
        'post_content' => '',
        'post_content_filtered' => '',
        'post_title' => $deal->cLabel,
        'post_excerpt' => '',
        'post_status' => 'publish',
        'post_date' => $post_date,
        'post_modified'=> $post_modified,
        'post_type' => 'Deals',
        'comment_status' => '',
        'ping_status' => '',
        'post_password' => '',
        'to_ping' =>  '',
        'pinged' => '',
        'post_parent' => 0,
        'menu_order' => 0,
        'guid' => '',
        'import_id' => 0,
        'context' => '',
      );
  
      $new_post_id=wp_insert_post($defaults);
      
      update_post_meta($new_post_id,'ncouponid',$deal->nCouponID);
      update_post_meta($new_post_id,'_ncouponid','field_5ac0bc185b6ae');
      $nMerchantID=$deal->nMerchantID;
      $args=array(
        'post_type'=>'merchants',
        'meta_query' =>array(
          'relation'=> 'AND',
          array(
            'key'=>'merchantid',
            'value' => $nMerchantID,
            'compare' => '='
            )
          )
        );
      $merchant_id='';
      $merchant= new WP_Query($args);
      if($merchant->have_posts()): $merchant->the_post();
        $merchant_id=get_the_ID();
      endif; 
      update_post_meta($new_post_id,'merchant',$merchant_id);
      update_post_meta($new_post_id,'_merchant','field_5ac0bc265b6af');
      update_post_meta($new_post_id,'cnetwork',$deal->cNetwork);
      update_post_meta($new_post_id,'_cnetwork','field_5ac0bd1002e82');
      update_post_meta($new_post_id,'cstatus',$deal->cStatus);
      update_post_meta($new_post_id,'_cstatus','field_5ac0bd3c02e83');
      update_post_meta($new_post_id,'cImage',$deal->cImage);
      update_post_meta($new_post_id,'crestrictions',$deal->cRestrictions);
      update_post_meta($new_post_id,'_crestrictions','field_5ac0bd7602e85');
      update_post_meta($new_post_id,'code',$deal->cCode);
      update_post_meta($new_post_id,'_code','field_5ac0bdba02e86');
      $dtStartDate=$deal->dtStartDate;
      if(preg_match('/(T)/', $dtStartDate,$returned)){
        $dtStartDate=str_replace('T', ' ', $dtStartDate);
        update_post_meta($new_post_id,'dtstartdate',$dtStartDate);
        update_post_meta($new_post_id,'_dtstartdate','field_5ac0be0002e87');
      }
      $dtEndDate=$deal->dtEndDate;
      if(preg_match('/(T)/', $dtEndDate,$returned)){
        $dtEndDate=str_replace('T', ' ', $dtEndDate);
        update_post_meta($new_post_id,'dtenddate',$dtEndDate);
        update_post_meta($new_post_id,'_dtenddate','field_5ac0be5102e88');
      }
      
      update_post_meta($new_post_id,'caffiliateurl',$deal->cAffiliateURL);
      update_post_meta($new_post_id,'_caffiliateurl','field_5ac0be8202e89');
      update_post_meta($new_post_id,'cdirecturl',$deal->cDirectURL);
      update_post_meta($new_post_id,'_cdirecturl','field_5ac0be9202e8a');
  
  
      update_post_meta($new_post_id,'cskimlinksurl',$deal->cSkimlinksURL);
      update_post_meta($new_post_id,'cfreshpressurl',$deal->cFreshPressURL);
      update_post_meta($new_post_id,'cfmtcurl',$deal->cFMTCURL);
      update_post_meta($new_post_id,'cpixelhtml',$deal->cPixelHTML);
      $temp='';
      $aTypes= $deal->aTypes;
      if(is_array($aTypes)){
        for($i=0;$i<count($aTypes);$i++){
          if($i!=0) $temp=$temp.', ';
          $temp=$temp.$aTypes[$i];
        }
      }
      update_post_meta($new_post_id,'atypes',$temp);
      update_post_meta($new_post_id,'fsaleprice',$deal->fSalePrice);
      update_post_meta($new_post_id,'fwasprice',$deal->fWasPrice);
      update_post_meta($new_post_id,'fdiscount',$deal->fDiscount);
      update_post_meta($new_post_id,'npercent',$deal->nPercent);
      update_post_meta($new_post_id,'fthreshold',$deal->fThreshold);
      update_post_meta($new_post_id,'frating',$deal->fRating);
      update_post_meta($new_post_id,'bstarred',$deal->bStarred);
      update_post_meta($new_post_id,'abrands',$deal->aBrands);
      update_post_meta($new_post_id,'alocal',$deal->aLocal);
      $temp='';
      $aCategoriesV2= $deal->aCategoriesV2;
      if(is_array($aCategoriesV2)){
        for($i=0;$i<count($aCategoriesV2);$i++){
          if($i!=0) $temp=$temp.', ';
          $temp=$temp.$aCategoriesV2[$i]->cName;
        }
      }
      
      update_post_meta($new_post_id,'acategoriesv2',$temp);
      update_post_meta($new_post_id,'nlinkid',$deal->nLinkID);
      update_post_meta($new_post_id,'_cskimlinksurl','field_5ac0beb302e8b');
      update_post_meta($new_post_id,'_cfreshpressurl','field_5ac0beda02e8c');
      update_post_meta($new_post_id,'_cfmtcurl','field_5ac0bef502e8d');
      update_post_meta($new_post_id,'_cpixelhtml','field_5ac0bf0f02e8e');
      update_post_meta($new_post_id,'_atypes','field_5ac0c0ec02e8f');
      update_post_meta($new_post_id,'_fsaleprice','field_5ac0c11302e90');
      update_post_meta($new_post_id,'_fwasprice','field_5ac0c12402e91');
      update_post_meta($new_post_id,'_fdiscount','field_5ac0c13502e92');
      update_post_meta($new_post_id,'_npercent','field_5ac0c14402e93');
      update_post_meta($new_post_id,'_fthreshold','field_5ac0c15102e94');
      update_post_meta($new_post_id,'_frating','field_5ac0c1ca02e95');
      update_post_meta($new_post_id,'_bstarred','field_5ac0c1d002e96');
      update_post_meta($new_post_id,'_abrands','field_5ac0c1dc02e97');
      update_post_meta($new_post_id,'_alocal','field_5ac0c22702e98');
      update_post_meta($new_post_id,'_acategoriesv2','field_5ac0c24002e99');
      update_post_meta($new_post_id,'_nlinkid','field_5ac0c34f02e9a');
    }
  }
}
add_action('insert_deals_info','get_deals_json',12);
// get_deals_json();

function get_networks_jason(){
  $url='http://services.fmtc.co/v2/getNetworks?key=e0c8ceaf175771e9b5175d3a217b7675';
  global $wp_version;
  $args = array(
    'timeout'     => 50,
    'redirection' => 5,
    'httpversion' => '1.0',
    'user-agent'  => 'WordPress/' . $wp_version . '; ' . home_url(),
    'blocking'    => true,
    'headers'     => array(),
    'cookies'     => array(),
    'body'        => null,
    'compress'    => false,
    'decompress'  => true,
    'sslverify'   => true,
    'stream'      => false,
    'filename'    => null
  );
  $response = wp_remote_get( $url, $args );
  $results=json_decode($response['body']);
  
  foreach ($results as $network ) {
    $defaults = array(
        'post_content' => '',
        'post_content_filtered' => '',
        'post_title' => $network->cName,
        'post_excerpt' => '',
        'post_status' => 'publish',
        'post_type' => 'networks',
        'comment_status' => '',
        'ping_status' => '',
        'post_password' => '',
        'to_ping' =>  '',
        'pinged' => '',
        'post_parent' => 0,
        'menu_order' => 0,
        'guid' => '',
        'import_id' => 0,
        'context' => '',
      );

    $new_post_id=wp_insert_post($defaults);
    update_post_meta($new_post_id,'cslug',$network->cSlug);
    update_post_meta($new_post_id,'_cslug','field_5ac0ded21273b');

    $temp='';
    $aCountries= $network->aCountries;
    if(is_array($aCountries)){
      for($i=0;$i<count($aCountries);$i++){
        if($i!=0) $temp=$temp.', ';
        $temp=$temp.$aCountries[$i];
      }
    }
    update_post_meta($new_post_id,'acountries',$temp);
    update_post_meta($new_post_id,'_acountries','field_5ac0def91273c');

  }

}
// get_networks_jason();

function get_types_jason(){
  $url='http://services.fmtc.co/v2/getTypes?key=e0c8ceaf175771e9b5175d3a217b7675';
  global $wp_version;
  $args = array(
    'timeout'     => 50,
    'redirection' => 5,
    'httpversion' => '1.0',
    'user-agent'  => 'WordPress/' . $wp_version . '; ' . home_url(),
    'blocking'    => true,
    'headers'     => array(),
    'cookies'     => array(),
    'body'        => null,
    'compress'    => false,
    'decompress'  => true,
    'sslverify'   => true,
    'stream'      => false,
    'filename'    => null
  );
  $response = wp_remote_get( $url, $args );
  $results=json_decode($response['body']);
  

   foreach ($results as $type ) {
    $defaults = array(
        'post_content' => '',
        'post_content_filtered' => '',
        'post_title' => $type->cName,
        'post_excerpt' => '',
        'post_status' => 'publish',
        'post_type' => 'types',
        'comment_status' => '',
        'ping_status' => '',
        'post_password' => '',
        'to_ping' =>  '',
        'pinged' => '',
        'post_parent' => 0,
        'menu_order' => 0,
        'guid' => '',
        'import_id' => 0,
        'context' => '',
      );

    $new_post_id=wp_insert_post($defaults);
    update_post_meta($new_post_id,'cslug',$type->cSlug);
    update_post_meta($new_post_id,'_cslug','field_5ac0e3c1b3203');
  }
  

}
// get_types_jason();




function get_coupon_data($coupon_id){

  if(!$coupon_id) return;

  $args=array(
    'post_type'=>'deals',
    'post__in' =>array($coupon_id)
    );
  $coup=new WP_Query($args);
  if($coup->have_posts()): $coup->the_post(); 
  ?>
  <!-- card -->
  <div <?php post_class('card'); ?> >
    <!-- card-header -->
    <div class="card-header" id="<?php echo 'deals-'.get_the_ID(); ?>">
      <?php 
      $logo=get_post_meta(get_field('merchant'),'small_logo',true);
      $uploads=wp_upload_dir();
      $logo=$uploads['baseurl'].'/logos/'.$logo;
      ?>
      <div class="img-wrp">
        <img src="<?php echo get_coupon_logo(get_the_ID()); ?>"  >
      </div>
      <div class="cont-wrp">
        <div class="left-cont">
          <h3><?php the_title(); ?></h3>

          <span class="subtitle"><?php echo get_the_title(get_field('merchant')); ?></span>
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#<?php echo 'deal-'.get_the_ID(); ?>" aria-expanded="true" aria-controls="collapseOne">
              See Notes
            </button>
          </h5>
        </div>
        <div class="right-cont" data-target="<?php echo get_the_ID(); ?>">
          <?php $button_text='Get Discount';if(get_field('code')) $button_text='Get Coupon'; ?>
          <button class="btn btn-primary" data-toggle="modal" data-target="#discount-<?php echo get_the_ID(); ?>"><?php echo $button_text; ?></button>
          <?php 
          $end_date=get_field('dtenddate');
          $today=date('Y-m-d h:i:sa');
          $today=strtotime($today);
          $end_date=strtotime($end_date);
          $remaining_days=ceil(((($end_date-$today)/24)/60)/60);
          if($remaining_days>30) $remaining_days=30;
          if($remaining_days<0){
            $text='Expired';
          }else{
            $text='Ends in '.abs($remaining_days).' days';
          } ?>
          <ul class="activities">
            <li><i class="fa fa-clock-o"></i><?php echo $text; ?></li>
            <?php if(get_current_user_id()){
              $link_meta='data-id="'.get_the_ID().'"';
              if(alread_saved(get_the_ID())){
                $save_class='save-deal-link liked';
              }else{
                $save_class='save-deal-link run';
              }

              if(already_liked(get_the_ID())){
                $link_class='like-deal-link saved';
              }else{
                $link_class='like-deal-link run';
              }
            }else{
              $link_meta='data-target="login-lightbox"';
              $link_class='like-deal-link modal-toggle';
              $save_class='save-deal-link modal-toggle';
            }


            $likes_number=get_post_meta(get_the_ID(),'liked_post',true);
            $saved_number=get_post_meta(get_the_ID(),'saved_post',true);
             ?>
            <li class="like <?php if($likes_number) echo 'active'; ?>"><?php if($likes_number){ ?><span><?php echo $likes_number; ?>&nbsp;</span><?php } ?><a <?php echo $link_meta; ?> class="<?php echo $link_class; ?>" href="">Like</a></li>
            <?php if(!is_page('my-account')){ ?>
            <li class="save <?php if($saved_number) echo 'active'; ?>"><?php if($saved_number){ ?><span><?php echo $saved_number; ?>&nbsp;</span><?php } ?><a <?php echo $link_meta; ?> class="<?php echo $save_class; ?>" href="">Save</a></li>
            <?php } ?>

          </ul>
        </div>
      </div>
    </div>
    <!-- card-header -->
    <!-- collapse -->
    <div id="<?php echo 'deal-'.get_the_ID(); ?>" class="collapse" aria-labelledby="<?php echo 'deal-'.get_the_ID(); ?>" data-parent="#accordion">
      <!-- card-body -->
      <div class="card-body">
        <!-- nav-tabs -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link" id="home-tab" data-toggle="tab" href="#home-<?php echo get_the_ID(); ?>" role="tab" aria-controls="home-<?php echo get_the_ID(); ?>" aria-selected="false">any comments?</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile-<?php echo get_the_ID(); ?>" role="tab" aria-controls="profile-<?php echo get_the_ID(); ?>" aria-selected="true">notes on this promotion</a>
          </li>
        </ul>
        <!-- nav-tabs -->
        <!-- tab-content -->
        <div class="tab-content" id="myTabContent">
          <!-- tab-pane -->
          <div class="tab-pane fade" id="home-<?php echo get_the_ID(); ?>" role="tabpanel" aria-labelledby="home-tab">
            
            
                <?php 
                global $withcomments;
                  $withcomments = true; 
                comments_template('/templates/comments.php'); ?>
              
             
          </div>
          <!-- tab-pane -->
          <!-- tab-pane -->
          <div class="tab-pane fade show active" id="profile-<?php echo get_the_ID(); ?>" role="tabpanel" aria-labelledby="profile-tab">
            <!-- row -->
            <div class="row">

            
              <?php 
              $notes=get_field('deal_notes_on_promotion');
              $notes_store=get_field('stores_note_on_promotion',get_field('merchant'));
              if(is_array($notes)){
               foreach ($notes as $note) {
                 if($note['acf_fc_layout']=='two_boxes_note'){?>
              <!-- col -->
              <div class="col-md-6">
                <?php echo $note['first_box_details']; ?>
              </div>
              <!-- col -->
              <!-- col -->
              <div class="col-md-6">
                <?php echo $note['second_box_details']; ?>
              </div>
              <!-- col -->
                 <?php
                  }else if($note['acf_fc_layout']=='one_box_content'){?>
                    <div class="col-md-6">
                      <?php echo $note['details']; ?>
                    </div>
                  <?php
                  }
               }
              }else if(is_array($notes_store)){
                $notes=$notes_store;
                foreach ($notes as $note) {
                 if($note['acf_fc_layout']=='two_boxes_note'){?>
              <!-- col -->
              <div class="col-md-6">
                <?php echo $note['first_box_details']; ?>
              </div>
              <!-- col -->
              <!-- col -->
              <div class="col-md-6">
                <?php echo $note['second_box_details']; ?>
              </div>
              <!-- col -->
                 <?php
                  }else if($note['acf_fc_layout']=='one_box_content'){?>
                    <div class="col-md-6">
                      <?php echo $note['details']; ?>
                    </div>
                  <?php
                  }
               }
              }else{
                $notes=get_field('note_on_promotion','option');
                if(is_array($notes)){
               foreach ($notes as $note) {
                 if($note['acf_fc_layout']=='two_boxes_note'){?>
              <!-- col -->
              <div class="col-md-6">
                <?php echo $note['first_box_details']; ?>
              </div>
              <!-- col -->
              <!-- col -->
              <div class="col-md-6">
                <?php echo $note['second_box_details']; ?>
              </div>
              <!-- col -->
                 <?php
                  }else if($note['acf_fc_layout']=='one_box_content'){?>
                    <div class="col-md-6">
                      <?php $note_description=$note['details'];
                      $date=date('Y.m.d');
                      $title=get_the_title(get_field('merchant'));
                      $note_description=str_replace('[date]', $date, $note_description);
                      $note_description=str_replace('[merchant name]', $title, $note_description);
                      echo $note_description;
                       ?>
                    </div>
                  <?php
                  }
               }
              }
              }


              $notes=get_field('note_on_promotion','option');
              
               ?>
              
            </div>
            <!-- row -->
          </div>
          <!-- tab-pane -->
        </div>
        <!-- tab-content -->
      </div>
      <!-- card-body -->
    </div>
    <!-- collapse -->
  </div>
  <!-- modal -->
  <div class="modal fade" id="discount-<?php echo get_the_ID(); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php the_title(); ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="mod-body">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-target="#discount-<?php echo get_the_ID(); ?>">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/close.png" alt="">
          </button>
          <h3><?php echo get_the_title(get_field('merchant')); ?></h3>
          <span class="subtitle"><?php the_title(); ?></span>
          <label>Copy and paste code at <a href="<?php the_field('homepageurl',get_field('merchant')); ?>"><?php the_field('homepageurl',get_field('merchant')); ?></a></label>
          <div class="copy">
            <?php if(get_field('code')){ ?>
            <input id="control-<?php echo get_the_ID(); ?>" type="text" name="" value="<?php the_field('code'); ?>" class="form-control ">
            <button data-url="<?php the_field('caffiliateurl'); ?>" data-id="<?php echo get_the_ID(); ?>" class="btn btn-primary">Copy</button>
            <?php }else{ ?>
            <a href="<?php the_field('caffiliateurl'); ?>" target="_blank" data-id="<?php echo get_the_ID(); ?>" class="btn btn-primary">Visit Site</a>
            <?php } ?>
          </div>
          <p>Please enter your coupon code into the “coupon” or “promo code” area on the website</p>
          <a href="#" class="view-more">Continue to <?php the_field('homepageurl',get_field('merchant')); ?> &#187;</a>
          <ul class="activities">
            <li><i class="fa fa-clock-o"></i> Ends in <?php echo $remaining_days; ?> days</li>
            <li class="like <?php if($likes_number) echo 'active'; ?>"><?php if($likes_number){ ?><span><?php echo $likes_number; ?></span><?php } ?>&nbsp;<a <?php echo $link_meta; ?> class="<?php echo $link_class; ?>" href="">Like</a></li>
            <li class="save <?php if($saved_number) echo 'active'; ?>"><?php if($saved_number){ ?><span><?php echo $saved_number; ?></span><?php } ?>&nbsp;<a <?php echo $link_meta; ?> class="<?php echo $save_class; ?>" href="">Save</a></li>

          </ul>
          <ul class="activities admin-activities">
          <?php if( current_user_can('editor') || current_user_can('administrator') ) {  ?> 
          <?php 
          $featured_list=featured_list();

          if(in_array(get_the_ID(), $featured_list)){?>
            <li class="feature">This Coupon is already featured</li>
          <?php }else{ ?>
            <li class="feature"><a data-target="<?php echo get_the_ID(); ?>" class="" href="">Feature this Coupon</a></li>
            <?php }
          } ?>
          </ul>
        </div>
        <?php $merchant=get_field('merchant');
        $terms=wp_get_post_terms($merchant,'merchants-categories');
        $all_terms=array();
        foreach ($terms as $term) {
          array_push($all_terms, $term->term_id);
        }
        $args=array(
          'post_type'=>'merchants',
          'posts_per_page'=>4,
          'tax_query'=>array(
            'relation'=>'AND',
            array(
              'taxonomy'=>'merchants-categories',
              'field'=>'term_id',
              'terms'=>$all_terms,
              'operator'=>'IN'
              )
            )
          );
        
        $merchants=new WP_Query($args);
        if($merchants->have_posts()){
         ?>
        <div class="mod-footer">
          <h4>Similar stores</h4>
          <ul>
            <?php while ($merchants->have_posts()){ $merchants->the_post(); ?>
             
            
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php } ?>
            
          </ul>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <!-- modal -->
  <!-- card -->
  <?php
  endif;
}


function get_deals($args=array()){

  if(isset($_REQUEST['page_type']) && $_REQUEST['page_type']=='merchants'){
    $args=array(
      'post_type'=>'deals',
      'posts_per_page' =>10,
      'meta_query'=>array(
        'relation' => 'OR',
        array(
          'key'=> 'merchant',
          'value'=>  $_REQUEST['object_id'],
          'compare' =>'='
        ),
        array(
          'key'=> 'merchants',
          'value'=>  $_REQUEST['object_id'],
          'compare' =>'LIKE'
        )
    
      ),
    
      
      );
    // var_dump($args);
  }else if(isset($_REQUEST['page_type']) && $_REQUEST['page_type']=='merchants-categories'){
    $args=array(
      'post_type'=>'merchants',
      'posts_per_page'=>-1,
      'tax_query'=>array(
        'relation'=>'AND',
        array(
          'taxonomy'=>'merchants-categories',
          'field'=>'term_id',
          'terms'=>$_REQUEST['object_id'],
          'include_children'=>true,
          'operator'=>'IN'
          ),
        )
      );
    $merchants=new WP_Query($args);
    
    $results=array();
    while($merchants->have_posts()): $merchants->the_post();
    array_push($results, get_the_ID());
    endwhile;
    // var_dump(!$merchants->found_posts);
    if(!$merchants->found_posts){
      $args=array(
        'post_type'=>'Deals',
        'posts_per_page'=>10,
        'meta_query'=> array(
          'relation'=>'AND',
          array(
            'key'=>'merchants-categories',
            'value'=> $term_id,
            'compare' =>'LIKE'
            )
          )
      );
    }else{
      $args=array(
      'post_type'=>'deals',
      'posts_per_page' =>6,
      'meta_query'=>array(
        'relation'=>'AND',
        array(
          'key'=> 'merchant',
          'value'=> $results,
          'compare' =>'IN'
          )
        )
      );
    }
    
    
  }else if(isset($_REQUEST['page_type']) && $_REQUEST['page_type']=='home'){
    $args=array(
      'post_type'=>'deals',
      'posts_per_page' =>6,
    );


  }else if(isset($_REQUEST['page_type']) && $_REQUEST['page_type']=='coupon'){
    $args=array(
  'post_type'=>'deals',
  'posts_per_page' =>6,
  'meta_query'=>array(
    array(
          'key'=> 'code',
          'value'=> '',
          'compare' =>'!='
        )

    )

  );
  }else if(isset($_REQUEST['page_type']) && $_REQUEST['page_type']=='deals'){
     $args=array(
      'post_type'=>'deals',
      'posts_per_page' =>6,
      'meta_query'=>array(
        array(
              'key'=> 'code',
              'value'=> '',
              'compare' =>'='
            )
    
        )
    
    );
  }
  

  
  if(isset($_REQUEST['offset']) && !empty($_REQUEST['offset'])){
    
    $args['paged']=$_REQUEST['offset'];
  }

  if(isset($_REQUEST['orderby']) && $_REQUEST['orderby']!=''){
    
    if($_REQUEST['orderby']=='date'){
      
      $args['paged']=$_REQUEST['offset'];
      $args['order']     = 'ASC';
      $args['orderby']   = 'meta_value';
      $args['meta_key']  = 'dtenddate';
      $args['meta_type'] = 'DATE';
    }else if($_REQUEST['orderby']=='featured'){
      $featured=get_field('featured_deals','option');
      $featured_array=array();
      
      foreach ($featured as $coupon) {
        array_push($featured_array, $coupon['deal']->ID);
      }
      if(empty($featured_array)){
        $featured_array=array(9999999999999999);
      }
      $args=array(
      'post_type'=>'deals',
      'posts_per_page' =>-1,
      'post__in'=>$featured_array,
      

    );
      $args['paged']=$_REQUEST['offset'];

    }else{
      $args=array(
      'post_type'=>'deals',
      'posts_per_page' =>6,

    );
      $args['paged']=$_REQUEST['offset'];
    }
  }
  
  $deals=new WP_Query($args);
  
  while($deals->have_posts()): $deals->the_post();
        get_coupon_data(get_the_ID());
  endwhile;
  if(isset($_REQUEST['offset'])) die();
}
add_action( 'wp_ajax_get_deals', 'get_deals' );
add_action('wp_ajax_nopriv_get_deals', 'get_deals');

function store_name_category_autocomplete() {
  if(!isset($_REQUEST['search'])){
    $search='a';
  }else{
     $search=$_REQUEST['search'];
  }
  Global $wpdb;

    $mypostids = $wpdb->get_col("select ID from $wpdb->posts where post_title LIKE '".$search['term']."%' "); 

    
  
  $args = array(
      'post__in'=> $mypostids,
      'post_type'=>'merchants',
      'orderby'=>'title',
      'order'=>'ASC'
  );


  

  $res = new WP_Query($args);

  $items = array();
  while($res->have_posts()): $res->the_post();
   $result=array("urls"=> get_permalink(),
   "value"=> html_entity_decode(get_the_title())
   );
    $items[] = $result;

  endwhile;
  $terms = get_terms( "merchants-categories", array( 'name__like' => $search['term'],'hide_empty'=>false ) );
  foreach ($terms as $term) {
    $result=array("urls"=> get_term_link($term,'merchants-categories'),
    "value"=>html_entity_decode($term->name)
    );
    $items[] = $result;
  }
  $items_new=array();
  
  wp_send_json_success( $items );
}

add_action( 'wp_ajax_store_name_category_autocomplete', 'store_name_category_autocomplete' );
add_action('wp_ajax_nopriv_store_name_category_autocomplete', 'store_name_category_autocomplete');


function create_categories_terms(){
  $url='http://services.fmtc.co/v2/getCategories?key=e0c8ceaf175771e9b5175d3a217b7675';
    global $wp_version;
    $args = array(
      'timeout'     => 50,
      'redirection' => 5,
      'httpversion' => '1.0',
      'user-agent'  => 'WordPress/' . $wp_version . '; ' . home_url(),
      'blocking'    => true,
      'headers'     => array(),
      'cookies'     => array(),
      'body'        => null,
      'compress'    => false,
      'decompress'  => true,
      'sslverify'   => true,
      'stream'      => false,
      'filename'    => null
  );
  $response = wp_remote_get( $url, $args );

  
  

  $data=json_decode($response['body']);

  for($i=0;$i<count($data);$i++){
    $merchant_category=$data[$i]; 
      wp_insert_term(
        $merchant_category->cName, // the term 
        'merchants-categories'   // the taxonomy
      );
}

for($i=0;$i<count($data);$i++){
    $merchant_category=$data[$i];
    if($merchant_category->nParentID){
      
    foreach($data as $struct) {
        if ($merchant_category->nParentID == $struct->nCategoryID) {
            $parent_name = $struct->cName;
            break;
        }
    }
    if(term_exists($parent_name,'merchants-categories')){
      
      $term=get_term_by('name',$parent_name,'merchants-categories');
      $parent=$term->term_id;
      $child_term=get_term_by('name',$merchant_category->cName,'merchants-categories');
      $child_id=$child_term->term_id;
      wp_update_term($child_id,'merchants-categories',array('parent'=>$parent));
      }
      
    }
  }
}
// create_categories_terms();
add_action('insert_api_categories','create_categories_terms',11);

function get_terms_like($clauses) {
  // remove_filter('term_clauses','get_terms_like');
  $pattern = '|(name LIKE )\'%(.+%)\'|';
  $clauses['where'] = preg_replace($pattern,'$1 \'$2\'',$clauses['where']);
  return $clauses;
}
add_filter('terms_clauses','get_terms_like');
// function testing123(){
  
// }
// add_action('init', 'testing123',11);
// $letter = 'str'; // test


function move_comment_to_bottom( $fields ) {
  $comment_field = $fields['comment'];
  unset( $fields['comment'] );
  $fields['comment'] = $comment_field;
  return $fields;
}
 
add_filter( 'comment_form_fields', 'move_comment_to_bottom' );

function alread_saved($post_id){
  $user_id=get_current_user_id();
  $saved=get_user_meta($user_id, 'saved_deals', true);

  if(is_array($saved)){
  if(in_array($post_id, $saved)) { return true;} else {return false;}
  }else{
    
    return false;
  }
}

function already_liked($post_id){
  $user_id=get_current_user_id();
  $likes=get_user_meta($user_id, 'liked_deals', true);
  
  if(is_array($likes)){
  if(in_array($post_id, $likes)) {return true;} else {return false; }
  }else{
    return false;
  }

}
function save_deal($post_id){
  if(isset($_REQUEST['post_id'])) $post_id=$_REQUEST['post_id'];
  if(!$post_id) return;
  $user_id=get_current_user_id();
  $saved=get_user_meta($user_id, 'saved_deals', true);

  if(is_array($saved)){
    array_push($saved, $post_id);
  }else{
    $saved=array($post_id);
  }
  update_user_meta($user_id,'saved_deals', $saved);
  $saved_post=get_post_meta($post_id,'saved_post',true);
  if($saved_post){
    $saved_post=intval($saved_post);
    $saved_post++;
    update_post_meta($post_id,'saved_post',$saved_post);
    echo $saved_post;
  }else{
    update_post_meta($post_id,'saved_post',1);
    echo 1;
  }
  die();
}
add_action( 'wp_ajax_save_deal', 'save_deal' );
add_action('wp_ajax_nopriv_save_deal', 'save_deal');

function like_deal($post_id){
  if(isset($_REQUEST['post_id'])) $post_id=$_REQUEST['post_id'];
  if(!$post_id) return; 
  $user_id=get_current_user_id();
  $saved=get_user_meta($user_id, 'liked_deals', true);
  if(is_array($saved)){
    array_push($saved, $post_id);
  }else{
    $saved=array($post_id);
  }
  update_user_meta($user_id,'liked_deals', $saved);
  $saved_post=get_post_meta($post_id,'liked_post',true);
  
  if($saved_post){
    $saved_post=intval($saved_post);
   
    $saved_post++;

    update_post_meta($post_id,'liked_post',$saved_post);
    echo $saved_post;
  }else{
    update_post_meta($post_id,'liked_post',1);
    echo 1;
  }
  die();
}
add_action( 'wp_ajax_like_deal', 'like_deal' );
add_action('wp_ajax_nopriv_like_deal', 'like_deal');



function register_user_information() {
  $name=$_REQUEST['name'];
  $email=$_REQUEST['email'];
  $password=$_REQUEST['password'];
  
  $user_id=wp_create_user( $email, $password, $email );
  // var_dump($user_id);die();
  if(!is_wp_error($user_id)){
  update_user_meta($user_id,'first_name',$name);
  update_user_meta($user_id,'nickname',$name);
  
  $user = get_user_by( 'id', $user_id ); 
  if( $user ) {
      wp_set_current_user( $user_id, $user->user_login );
      wp_set_auth_cookie( $user_id );
      do_action( 'wp_login', $user->user_login );
      echo '<div class="alert alert-success">you have successfully registered</div>';

  }
  }else{
    echo '<div class="alert alert-danger">'.$user_id->get_error_message().'</div>';
  }
 die();
  
}
add_action( 'wp_ajax_register_user_information', 'register_user_information' );
add_action('wp_ajax_nopriv_register_user_information', 'register_user_information');



function login_user() {

  $user_email = get_user_by('email' , $_REQUEST['email'] );
  $user_password = $_REQUEST['password'];
  $user_id=$user_email->data->ID;
  if($user_email){
  	if (wp_check_password($user_password,$user_email->data->user_pass, $user_email->ID)) {
  		wp_set_current_user( $user_id, $user->user_login );
      	wp_set_auth_cookie( $user_id );
      	do_action( 'wp_login', $user->user_login );
        echo '<div class="alert alert-success">You are logged in</div>';
  	}else{
  		echo '<div class="alert alert-danger">Incorrect Username or Password</div>';
  	}
  }else{
    echo '<div class="alert alert-danger">Incorrect Username or Password</div>';
  }
  die();
}
add_action( 'wp_ajax_login_user', 'login_user' );
add_action('wp_ajax_nopriv_login_user', 'login_user');

function add_deal_comment(){
  $user_id=get_current_user_id();
  $user=wp_get_current_user();
  $author=$user->user_login;
  $email=$user->user_email;
  $comment=$_REQUEST['comment'];
  $time = current_time('mysql');
  $data = array(
    'comment_post_ID' => $_REQUEST['id'],
    'comment_author' => $author,
    'comment_author_email' => $email,
    'comment_author_url' => '',
    'comment_content' => $comment,
    'comment_type' => '',
    'comment_parent' => 0,
    'user_id' => $user_id,
    'comment_date' => $time,
    'comment_approved' => 0,
);
  

  

wp_insert_comment($data);
die();
}

add_action( 'wp_ajax_add_deal_comment', 'add_deal_comment' );
add_action('wp_ajax_nopriv_add_deal_comment', 'add_deal_comment');


function get_logos(){
  $uploadsdir=wp_upload_dir();
  $uploadsdir=$uploadsdir['basedir'].'/logos/';
  $files = glob($uploadsdir.'*'); 
  
  foreach($files as $file){ 
    
    if(is_file($file))
      unlink($file); 
  }
  
  $url='http://services.fmtc.co/v2/getLogos?key=e0c8ceaf175771e9b5175d3a217b7675';
  $uploadsdir=wp_upload_dir();
  $uploadsdir=$uploadsdir['basedir'].'/logos/';

  file_put_contents($uploadsdir."Tmpfile.zip", fopen($url, 'r'));


    $file = $uploadsdir."Tmpfile.zip";
    
    // get the absolute path to $file
    $path = pathinfo(realpath($file), PATHINFO_DIRNAME);
    
    $zip = new ZipArchive;
    $res = $zip->open($file);
    if ($res === TRUE) {
      // extract it to the path we determined above
      $zip->extractTo($path);
      $zip->close();
      echo "WOOT! $file extracted to $path";
    } else {
      echo "Doh! I couldn't open $file";
    }
  
}
// get_logos();
add_action('insert_api_logos','get_logos',11);

function get_alpha_merchant($str=''){
  global $wpdb;
  if(isset($_REQUEST['letter']))  $str = $_REQUEST['letter'];
  
  if($str=='Num' || $str=='#') {
    $str="^[0-9]";
    $mypostids = $wpdb->get_col("select ID from $wpdb->posts where post_title REGEXP '".$str."' ");
  }else{
    $mypostids = $wpdb->get_col("select ID from $wpdb->posts where post_title LIKE '".$str."%' ");  
  }
  $args = array(
      'post__in'=> $mypostids,
      'post_type'=>'merchants',
      'orderby'=>'title',
      'order'=>'ASC'
  );

  $res = new WP_Query($args);

  ?>
  <div class="stores-result">
    <ul class="row">
      <?php while( $res->have_posts() ) : $res->the_post(); ?>
        <li class="col-md-4"><a href="<?php the_permalink() ?>"><?php  the_title() ?></a></li>
  <?php
  endwhile;
  ?>
    </ul>
  </div>
  
<?php
if(isset($_REQUEST['letter'])) die();
}


add_action( 'wp_ajax_get_alpha_merchant', 'get_alpha_merchant' );
add_action('wp_ajax_nopriv_get_alpha_merchant', 'get_alpha_merchant');

function get_alpha_merchant_cat($str='',$cat_id=''){
  global $wpdb;
  if(isset($_REQUEST['cat_id']))  $cat_id = $_REQUEST['cat_id'];
  if(empty($cat_id)) return;
  if(isset($_REQUEST['letter']))  $str = $_REQUEST['letter'];
  if(isset($_REQUEST['cat_id']))  $cat_id = $_REQUEST['cat_id'];
  // var_dump($cat_id);
  if($str=='Num' || $str=='#') {
    $str="^[0-9]";
    $mypostids = $wpdb->get_col("select ID from $wpdb->posts where post_title REGEXP '".$str."' ");
  }else{
    $mypostids = $wpdb->get_col("select ID from $wpdb->posts where post_title LIKE '".$str."%' ");  
  }
  // var_dump($mypostids);
  $args = array(
      'post__in'=> $mypostids,
      'post_type'=>'merchants',
      'orderby'=>'title',
      'order'=>'ASC',
      'posts_per_page'=>-1,
      'tax_query'=>array(
        array(
          'taxonomy'=>'merchants-categories',
          'field'=>'term_id',
          'terms'=>$cat_id
          )
        
        )
  );

  $res = new WP_Query($args);

  ?>
  <div class="stores-result">
    <ul class="row">
      <?php while( $res->have_posts() ) : $res->the_post(); ?>
        <li class="col-md-4"><a href="<?php the_permalink() ?>"><?php  the_title() ?></a></li>
  <?php
  endwhile;
  ?>
    </ul>
  </div>
  
<?php
if(isset($_REQUEST['letter'])) die();
}
add_action( 'wp_ajax_get_alpha_merchant_cat', 'get_alpha_merchant_cat' );
add_action('wp_ajax_nopriv_get_alpha_merchant_cat', 'get_alpha_merchant_cat');

function add_feature(){
  $post_id = $_REQUEST['post_id'];
  $row = array(
  'deal' => $post_id,
  
  );

  $i = add_row('field_5ae0f5b8d9226', $row, 'option');
}

add_action( 'wp_ajax_add_feature', 'add_feature' );
add_action('wp_ajax_nopriv_add_feature', 'add_feature');

function get_coupon_logo($c_id=''){
  if(empty($c_id)) return;
  $merchant=get_field('merchant',$c_id);
  $logo=get_merchant_logo($merchant);
  return $logo;
}


function get_merchant_logo($m_id=''){
  
  $merchant=$m_id;
  $uploadsdir=wp_upload_dir();
  $uploadsdir_new=$uploadsdir['baseurl'].'/logos/';

$logo_name=get_post_meta($merchant,'large_logo',true);
  if($logo_name){
    $logo=$uploadsdir_new.$logo_name;
    $logo_file=$uploadsdir['basedir'].'/logos/'.$logo_name;
    if(file_exists($logo_file)){
      return $logo;
    }
  }
  
  $logo_name=get_post_meta($merchant,'normal_logo',true);
  if($logo_name){
    $logo=$uploadsdir_new.$logo_name;
    $logo_file=$uploadsdir['basedir'].'/logos/'.$logo_name;
    if(file_exists($logo_file)){
      return $logo;
    }
  }
  

  
  
  $logo_name=get_post_meta($merchant,'xsmall_logo',true);
  if($logo_name){
    $logo=$uploadsdir_new.$logo_name;
    $logo_file=$uploadsdir['basedir'].'/logos/'.$logo_name;
    if(file_exists($logo_file)){
      return $logo;
    }
  }
  
  $logo_name=get_post_meta($merchant,'small_logo',true);
  $logo_name=get_post_meta($merchant,'xsmall_logo',true);
  if($logo_name){
    $logo=$uploadsdir_new.$logo_name;
    $logo_file=$uploadsdir['basedir'].'/logos/'.$logo_name;
    if(file_exists($logo_file)){
      return $logo;
    }
  }


  // var_dump($logo);
  // die();
  
  
  
  $logo=get_field('default_merchant_image','option');

  return $logo;
}
// get_merchant_logo('22336');

function clear_database(){
  $args=array(
    'post_type'=> array('deals','merchants'),
    'posts_per_page'=>-1
    );
  $all_posts=new WP_Query($args);
  while ($all_posts->have_posts()): $all_posts->the_post();
  wp_delete_post(get_the_ID(),true);
  delete_post_meta(get_the_ID(),'merchantid');
  delete_post_meta(get_the_ID(),'_merchantid');
  delete_post_meta(get_the_ID(),'network');
  delete_post_meta(get_the_ID(),'_network');
  delete_post_meta(get_the_ID(),'networkid');
  delete_post_meta(get_the_ID(),'_networkid');
  delete_post_meta(get_the_ID(),'networknotes');
  delete_post_meta(get_the_ID(),'_networknotes');
  delete_post_meta(get_the_ID(),'xsmall_logo');
  delete_post_meta(get_the_ID(),'small_logo');
  delete_post_meta(get_the_ID(),'normal_logo');
  delete_post_meta(get_the_ID(),'large_logo');
  delete_post_meta(get_the_ID(),'dualmerchant');
  delete_post_meta(get_the_ID(),'_dualmerchant');
  delete_post_meta(get_the_ID(),'relatedmerchants');
  delete_post_meta(get_the_ID(),'_relatedmerchants');
  delete_post_meta(get_the_ID(),'parentmerchantid');
  delete_post_meta(get_the_ID(),'_parentmerchantid');
  delete_post_meta(get_the_ID(),'affiliateurl');
  delete_post_meta(get_the_ID(),'_affiliateurl');
  delete_post_meta(get_the_ID(),'skimlinksurl');
  delete_post_meta(get_the_ID(),'_skimlinksurl');
  delete_post_meta(get_the_ID(),'homepageurl');
  delete_post_meta(get_the_ID(),'_homepageurl');
  delete_post_meta(get_the_ID(),'selectedstatus');
  delete_post_meta(get_the_ID(),'_selectedstatus');
  delete_post_meta(get_the_ID(),'relationshipstatus');
  delete_post_meta(get_the_ID(),'_relationshipstatus');
  delete_post_meta(get_the_ID(),'primarycountry');
  delete_post_meta(get_the_ID(),'_primarycountry');
  delete_post_meta(get_the_ID(),'shipstocountries');
  delete_post_meta(get_the_ID(),'_shipstocountries');
  delete_post_meta(get_the_ID(),'apofpo');
  delete_post_meta(get_the_ID(),'_apofpo');
  delete_post_meta(get_the_ID(),'specialpaymentoptions');
  delete_post_meta(get_the_ID(),'_specialpaymentoptions');
  delete_post_meta(get_the_ID(),'mobilecertified');
  delete_post_meta(get_the_ID(),'_mobilecertified');
  delete_post_meta(get_the_ID(),'customdescription');
  delete_post_meta(get_the_ID(),'_customdescription');
  delete_post_meta(get_the_ID(),'nmastermerchantid');
  delete_post_meta(get_the_ID(),'_nmastermerchantid');
  delete_post_meta(get_the_ID(),'cprimarycategory');
  delete_post_meta(get_the_ID(),'_cprimarycategory');
  delete_post_meta(get_the_ID(),'ncouponid');
  delete_post_meta(get_the_ID(),'_ncouponid');
  delete_post_meta(get_the_ID(),'merchant');
  delete_post_meta(get_the_ID(),'_merchant');
  delete_post_meta(get_the_ID(),'cnetwork');
  delete_post_meta(get_the_ID(),'_cnetwork');
  delete_post_meta(get_the_ID(),'cstatus');
  delete_post_meta(get_the_ID(),'_cstatus');
  delete_post_meta(get_the_ID(),'cImage');
  delete_post_meta(get_the_ID(),'crestrictions');
  delete_post_meta(get_the_ID(),'_crestrictions');
  delete_post_meta(get_the_ID(),'code');
  delete_post_meta(get_the_ID(),'_code');
  delete_post_meta(get_the_ID(),'dtstartdate');
  delete_post_meta(get_the_ID(),'_dtstartdate');
  delete_post_meta(get_the_ID(),'dtenddate');
  delete_post_meta(get_the_ID(),'_dtenddate');
  delete_post_meta(get_the_ID(),'caffiliateurl');
  delete_post_meta(get_the_ID(),'_caffiliateurl');
  delete_post_meta(get_the_ID(),'cdirecturl');
  delete_post_meta(get_the_ID(),'_cdirecturl');
  delete_post_meta(get_the_ID(),'cskimlinksurl');
  delete_post_meta(get_the_ID(),'cfreshpressurl');
  delete_post_meta(get_the_ID(),'cfmtcurl');
  delete_post_meta(get_the_ID(),'cpixelhtml');
  delete_post_meta(get_the_ID(),'atypes');
  delete_post_meta(get_the_ID(),'fsaleprice');
  delete_post_meta(get_the_ID(),'fwasprice');
  delete_post_meta(get_the_ID(),'fdiscount');
  delete_post_meta(get_the_ID(),'npercent');
  delete_post_meta(get_the_ID(),'fthreshold');
  delete_post_meta(get_the_ID(),'frating');
  delete_post_meta(get_the_ID(),'bstarred');
  delete_post_meta(get_the_ID(),'abrands');
  delete_post_meta(get_the_ID(),'alocal');
  delete_post_meta(get_the_ID(),'acategoriesv2');
  delete_post_meta(get_the_ID(),'nlinkid');
  delete_post_meta(get_the_ID(),'_cskimlinksurl');
  delete_post_meta(get_the_ID(),'_cfreshpressurl');
  delete_post_meta(get_the_ID(),'_cfmtcurl');
  delete_post_meta(get_the_ID(),'_cpixelhtml');
  delete_post_meta(get_the_ID(),'_atypes');
  delete_post_meta(get_the_ID(),'_fsaleprice');
  delete_post_meta(get_the_ID(),'_fwasprice');
  delete_post_meta(get_the_ID(),'_fdiscount');
  delete_post_meta(get_the_ID(),'_npercent');
  delete_post_meta(get_the_ID(),'_fthreshold');
  delete_post_meta(get_the_ID(),'_frating');
  delete_post_meta(get_the_ID(),'_bstarred');
  delete_post_meta(get_the_ID(),'_abrands');
  delete_post_meta(get_the_ID(),'_alocal');
  delete_post_meta(get_the_ID(),'_acategoriesv2');
  delete_post_meta(get_the_ID(),'_nlinkid');
  endwhile;
  
  $terms = get_terms( 'merchants-categories', array( 'fields' => 'ids', 'hide_empty' => false ) );
  foreach ( $terms as $value ) {
       wp_delete_term( $value, 'merchants-categories' );
  }

}
add_action('clear_database','clear_database',11);

function featured_list(){
  $featured=get_field('featured_deals','option');
  $results=array();
  if(is_array($featured) && is_object($featured[0]) ){
  foreach ($featured as $deal) {
    array_push($results, $deal['deal']->ID);
  }
  }
  return $results;
}
function feature_merchant($merchant=''){
  if(isset($_REQUEST['merchant'])) $merchant=$_REQUEST['merchant'];

  if(empty($merchant)) return;

  $user=get_current_user_id();

  $fav_merchants=get_user_meta($user,'fav_merchants',true);

  if(is_array($fav_merchants)){
    if(!in_array($merchant, $fav_merchants)){
      array_push($fav_merchants, $merchant);
    }

  }else{
    $fav_merchants=array($merchant);
  }
  update_user_meta($user,'fav_merchants',$fav_merchants);
}
add_action( 'wp_ajax_feature_merchant', 'feature_merchant' );
add_action('wp_ajax_nopriv_feature_merchant', 'feature_merchant');



function store_name_autocomplete() {
  $user=get_current_user_id();
  if(!$user) return;
  $saved_stores=get_user_meta($user,'fav_merchants',true);
  if(!is_array($saved_stores)) $saved_stores=array(999999999999999999999);
  if(!isset($_REQUEST['search'])){
    $search='a';
  }else{
     $search=$_REQUEST['search'];
  }
  if(isset($_REQUEST['review'])){
    $saved_stores=array();
    $args=array(
      'post_type'=> 'reviews',
      'posts_per_page'=> -1,
      'author'=> $user,
      'post_status'=> array('publish','draft')
    ); 
    $reviews=new WP_Query($args);
    while ($reviews->have_posts()): $reviews->the_post();
      $merchant=get_field('review_merchant');
      array_push($saved_stores, $merchant);
      endwhile;
  }
  $args=array(
    'post_type'     => array('merchants'),
    'posts_per_page'=> -1,
    's'=>$search['term'],
    'post__not_in' =>$saved_stores
  );

  $res = new WP_Query($args);

  $items = array();
  while($res->have_posts()): $res->the_post();
   $result=array(
    "id"=> get_the_ID(),
    "urls"=> get_permalink(),
    "value"=> get_the_title()
   );
    $items[] = $result;

  endwhile;
  
  wp_send_json_success( $items );
}

add_action( 'wp_ajax_store_name_autocomplete', 'store_name_autocomplete' );
add_action('wp_ajax_nopriv_store_name_autocomplete', 'store_name_autocomplete');




function un_feature_merchant($merchant=''){
  if(isset($_REQUEST['merchant'])) $merchant=$_REQUEST['merchant'];

  if(empty($merchant)) return;

  $user=get_current_user_id();

  $fav_merchants=get_user_meta($user,'fav_merchants',true);

  if(is_array($fav_merchants)){
    if(in_array($merchant, $fav_merchants)){
      $index=array_search($merchant, $fav_merchants);
      unset($fav_merchants[$index]);
      
    }

  }else{
    $fav_merchants=array();
  }
  // var_dump($fav_merchants);
  update_user_meta($user,'fav_merchants',$fav_merchants);
}
add_action( 'wp_ajax_un_feature_merchant', 'un_feature_merchant' );
add_action('wp_ajax_nopriv_un_feature_merchant', 'un_feature_merchant');

function go_search_header(){

  if(!isset($_REQUEST['search'])){
    $search='a';
  }else{
     $search=$_REQUEST['search'];
  }
  $args=array(
    'post_type'     => array('merchants'),
    'posts_per_page'=> 10,
    'title'=>$search,
  );
  $res = new WP_Query($args);

  $items = array();
  while($res->have_posts()): $res->the_post();
   $result=array("urls"=> get_permalink(),
   "value"=> get_the_title()
   );
    $items[] = $result;

  endwhile;
  $terms = get_terms( "merchants-categories", array( 'name' => $search['term'],'hide_empty'=>false ) );
  foreach ($terms as $term) {
    $result=array("urls"=> get_term_link($term,'merchants-categories'),
    "value"=>$term->name 
    );
    $items[] = $result;
  }

  if(count($items) > 0){
    wp_send_json_success( $items );
  }else{
    return false;
  }
  
}
add_action( 'wp_ajax_go_search_header', 'go_search_header' );
add_action('wp_ajax_nopriv_go_search_header', 'go_search_header');

add_action('after_setup_theme', 'remove_admin_bar');
 
function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}

function get_all_coupons_with_republish(){
  $args=array(
      'post_type'=>'deals',
      'posts_per_page'=>-1,
      'meta_query'=>array(
          'relation'=>'AND',
          array(
              'key'=>'number_of_days',
              'value'=>'',
              'compare'=>'!='
            )
        )
    );

  $coupons=new WP_Query($args);

  while ($coupons->have_posts()):$coupons->the_post();
  $today=date('d-m-Y');
  
  $today=strtotime($today);
  $publish_date=get_the_date( 'd-m-Y' ,get_the_ID() );
  
  $publish_date=strtotime(get_the_date( 'd-m-Y' ,get_the_ID() ));
  
  
  $difference_in_days=((($today-$publish_date)/60)/60)/24;
  if($difference_in_days>=get_field('number_of_days')){
$time = current_time('mysql');
    wp_update_post(
        array(
            'ID'            => get_the_ID(), 
            'post_date'     => $time,
            'post_date_gmt' => get_gmt_from_date( $time )
        )
    );
    
  }

  endwhile;
}
register_activation_hook(__FILE__, 'my_activation');

function my_activation() {
    if (! wp_next_scheduled ( 'my_hourly_event' )) {
  wp_schedule_event(time(), 'hourly', 'get_all_coupons_with_republish');
    }
}

add_action('get_all_coupons_with_republish', 'get_all_coupons_with_republish');

