<?php 
global $index,$sections;
$data=$sections[$index];
?>

<section class="section features-list gray-bg">
      <div class="container">
        <div class="section-info">
          <h3><?php echo $data['subtitle']; ?></h3>
          <h2><?php echo $data['title']; ?></h2>
          <?php echo $data['description']; ?>
        </div>
      </div>
      <?php $lists= $data['features_lists'];
      for($i=0;$i<count($lists);$i++){ ?>
      <div class="featured-list-ul-container">
        <div class="container">
          <?php $features_list=$lists[$i]['features_list']; ?>
          <ul class="features-list-ul">
            <?php for($j=0;$j<4;$j++){?>
            <li>
              <?php 
              if(array_key_exists($j,$features_list)){?>
              <img src="<?php echo  $features_list[$j]['feature_icon']; ?>" alt="">
              <h4><?php echo  $features_list[$j]['feature_title']; ?></h4>
              <?php echo  $features_list[$j]['feature_content']; ?>

              <a class="read-more-link" href="<?php echo  $features_list[$j]['link_url']; ?>"><?php echo  $features_list[$j]['link_label']; ?></a> 
            <?php } ?>
            </li>
            <?php } ?>
            
          </ul>
        </div>
      </div>
    <?php } ?>
      
    </section>