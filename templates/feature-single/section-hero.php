<?php 
global $index,$sections;
$data=$sections[$index];
?>
<section class="section hero-section feature-detail-hero">
  <div class="container">
    <div class="flex space-between">
      <div class="content">
        <h5><?php echo $data['hero_category']; ?></h5>
        <h2><?php echo $data['title']; ?></h2>
        <h3><?php echo $data['subtitle']; ?></h3>
        <?php echo $data['description']; ?>
        <a class="btn-white" href="<?php echo $data['button_url']; ?>"><?php echo $data['button_label']; ?></a>
      </div>

      <style type="text/css">
        .feature-detail-hero .image-container:after {
            content: '';
            position: absolute;
            display: block;
            width: 156px;
            height: 156px;
            background: url(<?php echo $data['hero_side_image_badge']; ?>);
            top: -30px;
            right: -40px;
            background-size: cover;
        }
      </style>
      <div class="image-container">
        <img src="<?php echo $data['hero_side_image']; ?>" alt="">
      </div>
    </div>
  </div>
</section>