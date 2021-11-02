<?php 
global $index,$sections;
$data=$sections[$index];
?>
<section class="section resources-intro gray-bg">
      <div class="container">
        <div class="content">
          <h3><?php echo $data['subtitle']; ?></h3>
          <h2><?php echo $data['title']; ?></h2>
          <?php echo $data['content']; ?>
        </div>
      </div>
    </section>