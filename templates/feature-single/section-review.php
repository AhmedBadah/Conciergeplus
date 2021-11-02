<?php 
global $index,$sections;
$data=$sections[$index];
?>
<section class="section one-review">
  <div class="container">
    <div class="content">
      <img src="<?php echo $data['icon']; ?>" alt="">
      <?php echo $data['review_text']; ?>
      <h4><?php echo $data['review_publisher']; ?><br/><?php echo $data['publisher_information']; ?></h4>
    </div>
  </div>
</section>