<?php 
global $index,$sections;
$data=$sections[$index];
?>
<section class="section section-reviews">
      <div class="container">
        <?php $reviews_list=$data['reviews_list'];
        if(is_array($reviews_list)){ ?>
        <ul id="reviews" class="owl-theme owl-carousel">
          <?php for($i=0;$i<count($reviews_list);$i++){ ?>
          <li>
              <h2 ><?php echo $reviews_list[$i]['review_text'] ?></h2>
                <p ><?php echo $reviews_list[$i]['reviewer_name'] ?><br/><?php echo $reviews_list[$i]['reviewer_business_title'] ?></p>
          </li>
          <?php } ?>
        </ul>
      <?php } ?>
      </div>
    </section> 