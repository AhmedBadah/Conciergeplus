<?php 
global $index,$sections;
$data=$sections[$index];
?>
<section class="section section-hero about-hero why-hero">
  <div class="container">
    <div class="content">
      <h2><?php echo $data['title'] ?></h2>
      <?php echo $data['content'] ?>
      <?php $target=$data['button_open_in_new_tab'];
      if($target){
      	$target='target="_blank"';
      }else{
      	$target='target="_self"';
      } ?>
      <a <?php echo $target; ?> class="btn-white" href="<?php echo $data['button_url'] ?>"><?php echo $data['button_label'] ?></a>
    </div>
  </div>
</section>