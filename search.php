<?php 
$args=array(
  'post_type'=>'deals',
  'posts_per_page' =>-1,
  's'=>get_query_var('s')
  );
$search_results=new WP_Query($args);
?>

<section class="products">
  <div class="container">
    
    <h2>Search Results for: <?php echo get_query_var('s'); ?></h2>
    
    <ul class="sort-list">
      <li>Sort by :</li>
      <li class="active"><a href="" data-target="recent">Most Recent</a></li>
      <li><a href="" data-target="featured">Featured</a></li>
      <li><a href="" data-target="date">Expiring Soon</a></li>
    </ul>
    <div id="accordion">

      <?php 
      if($search_results->found_posts){
      get_deals($args); 
      }else{
        echo '<div class="alert alert-warning"><strong>No Results Found!</strong> Please refine your search.</div>';
      }
      ?>
    </div>
    <!-- accordions -->
    
  </div>
  <!-- container -->
  
</section>

