<?php 
global $index,$sections;
$data=$sections[$index];
?>


    <section class="section partners-list gray-bg">
      <div class="container">
        <div class="intro">
          <img src="<?php echo $data['intro_icon']; ?>" alt="">
          <?php echo $data['intro_content']; ?>
        </div>
        <?php $partners=$data['partners'];
        if(is_array($partners)){ ?>
        <ul>
          <?php for($i=0;$i<count($partners);$i++){ ?>
          <li>
            <div class="flex">
              <div class="content">
                <h4><?php echo $partners[$i]['title']; ?></h4>
                <?php echo $partners[$i]['content']; ?>
                <a target="_blank" href="<?php echo $partners[$i]['button_url']; ?>"><?php echo $partners[$i]['button_label']; ?></a>
              </div>
              <div class="image-container">
                <img src="<?php echo $partners[$i]['image']; ?>" alt="">
              </div>
            </div>  
          </li>
          <?php } ?>
        </ul>
      <?php } ?>
      </div>
    </section>