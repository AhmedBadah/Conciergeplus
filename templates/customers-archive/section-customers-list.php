<?php 
global $index,$sections;
$data=$sections[$index];
?>
<section class="section customer-stories-posts">
  <div class="container">
    <?php $customers=$data['customers'];
    if(is_array($customers)){
    for($i=0;$i<count($customers);$i++){ ?>
    <article class="flex">
      <div class="image-container">
        <img src="<?php echo $customers[$i]['image']; ?>" alt="">
      </div>
      <div class="content">
        <h2><?php echo $customers[$i]['title']; ?></h2>
        <?php echo $customers[$i]['content']; ?>
        <a class="read-more-link" href="<?php echo $customers[$i]['link_url']; ?>"><?php echo $customers[$i]['link_label']; ?></a>
      </div>
    </article>
    <?php }} ?>
  </div>
</section>