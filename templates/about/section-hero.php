<?php 
global $index,$sections;
$data=$sections[$index];
?>
<section class="section section-hero about-hero">
  <div class="container">
    <div class="content">
      <h2><?php echo $data['title']; ?></h2>
      <?php echo $data['description']; ?>
      <a class="btn-white" href="<?php echo $data['button_url']; ?>"><?php echo $data['button_label']; ?></a>
    </div>
  </div>
</section>