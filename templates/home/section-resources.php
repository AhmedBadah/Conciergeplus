<?php 
global $index,$sections;
$data=$sections[$index];
?>
<section class="section section-resources gray-bg">
  <div class="container">
    <h3><?php echo $data['subtitle']; ?></h3>
    <h2><?php echo $data['title']; ?></h2>
    <?php $resources = $data['resources'];
    if(is_array($resources)){ ?>
    <ul class="flex space-between">
      <?php for($i=0;$i<count($resources);$i++){ ?>
      <li>
        <div class="icon-container">
          <?php if($i==0){ ?>
          <img class="dark-icon"  src="<?php echo get_template_directory_uri(); ?>/assets/img/Guide_DarkBlue.svg" alt="">
          <img class="light-icon"  src="<?php echo get_template_directory_uri(); ?>/assets/img/Guide_LightBlue.svg" alt="">
        <?php }else if($i==1){ ?>
          <img class="dark-icon-1"  src="<?php echo get_template_directory_uri(); ?>/assets/img/Story_DarkBlue.svg" alt="">
          <img class="light-icon-1"  src="<?php echo get_template_directory_uri(); ?>/assets/img/Story_LightBlue.svg" alt="">
        <?php }else{ ?>
          <img class="dark-icon-2"  src="<?php echo get_template_directory_uri(); ?>/assets/img/Webinar_DarkBlue.svg" alt="">
          <img class="light-icon-2"  src="<?php echo get_template_directory_uri(); ?>/assets/img/Webinar_LightBlue.svg" alt="">
          <img class="arrow-icon"  src="<?php echo get_template_directory_uri(); ?>/assets/img/Webinar_PlayButton.svg" alt="">
        <?php } ?>
          <!-- <img  src="<?php echo $resources[$i]['icon']; ?>" alt=""> -->
        </div>
        <h5><?php echo $resources[$i]['title']; ?></h5>
        <h4><?php echo $resources[$i]['subtitle']; ?></h4>
        <a class="btn-blue" href="<?php echo $resources[$i]['button_url']; ?>"><?php echo $resources[$i]['button_label']; ?></a>
      </li>
      <?php } ?>
      
    </ul>
  <?php } ?>
  </div>
</section>