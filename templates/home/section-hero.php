<?php 
global $index,$sections;
$data=$sections[$index];
?>
<section class="section section-hero home-hero">
      <div class="container">
        <h2><?php echo $data['title']; ?></h2>
        <p><?php echo $data['subtitle']; ?></p>
        
        <img class="visible-mobile" src="<?php echo $data['mobile_image']; ?>" alt="">
        <a class="hero-btn" href="<?php echo $data['button_url']; ?>"><?php echo $data['button_label']; ?></a>
        <div class="screens-img-container">
            <img class="hidden-mobile" style="visibility: hidden;" src="<?php echo $data['desktop_image']; ?>" alt="">
            <div class="ainmation-container">
               <img class="hero-desktop" src="<?php echo get_template_directory_uri(); ?>/assets/img/desktop.png">
               <img class="hero-mobile" src="<?php echo get_template_directory_uri(); ?>/assets/img/mobile.png">
               <img class="hero-tap" src="<?php echo get_template_directory_uri(); ?>/assets/img/tablet.png">
            </div>
        </div>
      </div>
	<div class="stars-container">
        <div class="stars-container-inner">
          <img class="Large-DarkBlue" src="<?php echo get_template_directory_uri(); ?>/assets/img/Star_Large_DarkBlue.svg">
          <img class="Large-LightBlue" src="<?php echo get_template_directory_uri(); ?>/assets/img/Star_Large_LightBlue.svg">
          <img class="Small-DarkBlue" src="<?php echo get_template_directory_uri(); ?>/assets/img/Star_Small_DarkBlue.svg">
          <img class="Small-LightBlue" src="<?php echo get_template_directory_uri(); ?>/assets/img/Star_Small_LightBlue.svg">
        </div>
      </div>

</section>