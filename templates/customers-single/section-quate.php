  <?php 
global $index,$sections;
$data=$sections[$index];
?>
<section class="section section-blockquote gray-bg">
    <div class="container">
      <div class="centered-content">
    <div class="quote-block">
      <blockquote><?php echo $data['quote']; ?></blockquote>
      <div class="quote-meta flex">
        <div class="image-container">
          <a href="javascript:;"><img src="<?php echo $data['publisher_image']; ?>" alt=""></a>
        </div>
        <div class="meta-content">
          <h5><?php echo $data['publisher_name']; ?></h5>
          <p><?php echo $data['publisher_details']; ?></p>
        </div>
      </div>
    </div>
  </div>
    </div>
  </section>