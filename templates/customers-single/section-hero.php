<?php 
global $index,$sections;
$data=$sections[$index];
?>

<section class="section section-hero customers-stories-details-hero">
  <div class="container">
    <div class="image-container">
      <img class="hidden-mobile" src="<?php echo $data['hero_image']; ?>" alt="">
      <img class="visible-mobile" src="<?php echo $data['mobile_hero_image']; ?>" alt="">
      <div class="content">
        <h5><?php echo $data['subtitle']; ?></h5>
        <h2><?php echo $data['title']; ?></h2>
        <a href="javascript:;"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/down-arrow.png" alt=""></a>
      </div>
    </div>
  </div>
</section>