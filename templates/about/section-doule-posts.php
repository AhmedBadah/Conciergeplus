<?php 
global $index,$sections;
$data=$sections[$index];
?>
    <section class="section double-post-view">
      <div class="container">
        <?php $list=$data['cta'];
        if(is_array($list)){ ?>
        <ul>
          <?php for($i=0;$i<count($list);$i++){ ?>
          <li>
            <div class="image-container">
              <img src="<?php echo $list[$i]['image']; ?>" alt="">
            </div>
            <div class="content">
              <h5><?php echo $list[$i]['subtitle']; ?></h5>
              <h3><?php echo $list[$i]['title']; ?></h3>
              <?php echo $list[$i]['description']; ?>
              <a class="secondary-btn" href="<?php echo $list[$i]['button_url']; ?>"><?php echo $list[$i]['button_label']; ?></a>
            </div>
          </li>
          <?php } ?>
        </ul>
      <?php } ?>
      </div>
    </section>