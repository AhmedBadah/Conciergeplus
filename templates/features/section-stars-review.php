<?php 
global $index,$sections;
$data=$sections[$index];
?>
    <section class="section one-review one-review-with-stars">
      <div class="container">
        <div class="content">
          <?php echo $data['review_text']; ?>
          <h4><?php echo $data['review_publisher']; ?><br/><?php echo $data['publisher_business_title']; ?></h4>
          <?php if($data['stars_review']){ ?>
          <ul>
            <?php $stars_number=$data['stars_number'];
            for($i=0;$i<$stars_number;$i++){ ?>
            <li><img src="<?php echo get_template_directory_uri(); ?>/assets/img/star.png" alt=""></li>
          <?php } ?>
          </ul>
          <h5><?php echo $data['rating_text']; ?></h5>
          <?php } ?>
        </div>
      </div>
    </section>