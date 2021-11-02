<?php 
global $index,$sections;
$data=$sections[$index];
?>
<section class="section customer-stories-archive-info gray-bg">
  <div class="container">
    <div class="content">
      <h3 class="subhead"><?php echo $data['subtitle']; ?></h3>
      <h2 class="main-headline"><?php echo $data['title']; ?></h2>
      <?php echo $data['content']; ?>
    </div>
  </div>
</section>