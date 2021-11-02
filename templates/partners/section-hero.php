<?php 
global $index,$sections;
$data=$sections[$index];
?>

<section class="section partners-hero">
  <div class="container">
    <div class="content">
      <h2><?php echo $data['title']; ?></h2>
      <?php echo $data['content']; ?>
    </div>
    
  </div>
</section>