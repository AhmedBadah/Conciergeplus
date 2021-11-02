<?php 
global $index,$sections;
$data=$sections[$index];
?>
<section class="section about-details gray-bg">
      <div class="container flex space-between">
        <div class="headings">
          <h3 class="subhead"><?php echo $data['subtitle']; ?></h3>
          <h2 class="main-headline"><?php echo $data['title']; ?></h2>
        </div>
        <div class="content">
          <?php echo $data['content']; ?>
        </div>
      </div>
    </section>