<?php 
global $index,$sections;
$data=$sections[$index];
?>
<section class="section why-video gray-bg">
      <div class="container">
      	<div class="video-container">
        <?php echo $data['video_iframe']; ?>
        </div>
        <?php if(!empty($data['title']) || !empty($data['content'])){ ?>
        <div class="content">
          <h4><?php echo $data['title']; ?></h4>
          <?php echo $data['content']; ?>
        </div>
      <?php } ?>
      </div>
    </section>