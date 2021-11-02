<?php 
global $index,$sections;
$data=$sections[$index];
?>
<section id="get-your-demo" class="section lets-talk gray-bg">
  <div class="container">
    <div class="flex space-between">
      <div class="content">
        <h3><?php echo $data['subtitle']; ?></h3>
        <h2><?php echo $data['title']; ?></h2>
        <?php echo $data['text']; ?>
        <a class="btn-blue hidden-mobile" href="<?php echo $data['button_url']; ?>"><?php echo $data['button_label']; ?></a>
      </div>
      <div class="form-container">
        <?php echo $data['form_code']; ?>
      </div>
    </div>
  </div>
</section>