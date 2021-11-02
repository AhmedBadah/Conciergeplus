<?php 
global $index,$sections;
$data=$sections[$index];
?>

<section class="section partners-webinar">
  <div class="container">
    <div class="content">
      <h4><?php echo $data['title']; ?></h4>
      <?php echo $data['content']; ?>
      <a class="btn-white" href="<?php echo $data['button_url']; ?>"><?php echo $data['button_label']; ?></a>
    </div>
  </div>
</section>