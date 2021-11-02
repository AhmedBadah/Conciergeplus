<?php 
global $index,$sections;
$data=$sections[$index];
?>

<section class="section resources-list gray-bg">
      <div class="container">
        <div class="content">
          <img src="<?php echo $data['intro_icon']; ?>" alt="">
          <h2><?php echo $data['intro_title']; ?></h2>
          <?php echo $data['intro_content']; ?>
          <a class="btn-dark-blue" href="<?php echo $data['intro_button_url']; ?>"><?php echo $data['intro_button_label']; ?></a>
          <?php $resources_list = $data['resources_list'];
          if(is_array($resources_list)){ ?>
          <ul>
            <?php for($i=0;$i<count($resources_list);$i++){ ?>
            <li>
              <img src="<?php echo $resources_list[$i]['image']; ?>" alt="">
              <h3><?php echo $resources_list[$i]['title']; ?></h3>
              <?php echo $resources_list[$i]['content']; ?>
              <a class="read-more-link" href="<?php echo $resources_list[$i]['button_url']; ?>"><?php echo $resources_list[$i]['button_label']; ?></a>
            </li>
            <?php } ?>
          </ul>
        <?php } ?>
        </div>
      </div>
    </section>