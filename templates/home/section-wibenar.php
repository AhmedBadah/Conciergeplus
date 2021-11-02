<?php 
global $index,$sections;
$data=$sections[$index];
?>
<style type="text/css">
	.section-parking{
	    background: url(<?php echo $data['background_image']; ?>);
    	background-attachment: fixed;
    	background-repeat: no-repeat;
    	background-size: cover;
    	background-position-y: center;
	}
</style>
<section class="section section-parking">
  <div class="container">
    <h3 ><?php echo $data['subtitle'] ?></h3>
    <h2 ><?php echo $data['title'] ?></h2>
    <?php echo $data['details'] ?>
    <a target="_blank" class="btn-white" href="<?php echo $data['button_url'] ?>"><?php echo $data['button_label'] ?></a>
  </div>
</section>