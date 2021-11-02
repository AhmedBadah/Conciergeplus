<?php 
global $index,$sections;
$data=$sections[$index];
?>
    <section class="section related-features">
      <div class="container">
        <h2>Explore Related Features</h2>
        <?php $related=$data['features_list'];
        if(is_array($related)){ ?>
        <ul class="flex space-between">
          <?php for($i=0;$i<count($related);$i++){ ?>
          <li>
            <a class="learn-more-link" href="<?php echo $related[$i]['button_url']; ?>"><img src="<?php echo $related[$i]['feature_icon']; ?>" alt="">
            </a>
            
            <h4><?php echo $related[$i]['feature_title']; ?></h4>
            <?php echo $related[$i]['feature_content']; ?>
            <a class="learn-more-link" href="<?php echo $related[$i]['button_url']; ?>"><?php echo $related[$i]['button_label']; ?></a>
          </li>
          <?php } ?>
        </ul>
      <?php } ?>
      </div>
    </section>