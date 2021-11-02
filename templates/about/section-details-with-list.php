<?php 
global $index,$sections;
$data=$sections[$index];
?>
    <section class="section details-with-list">
      <div class="container flex space-between">
        <div class="headlines-container">
          <h3 class="subhead"><?php echo $data['subtitle']; ?></h3>
          <h2 class="main-headline"><?php echo $data['title']; ?></h2>
        </div>
        <div class="content">
          <?php echo $data['content']; ?>
        </div>
      </div>
      <div class="container">
        <?php $list = $data['list'];
        if(is_array($list)){ ?>
        <ul>
          <?php for($i=0;$i<count($list);$i++){ ?>
          <li>
            <a href="javascript:;"><img src="<?php echo $list[$i]['image']; ?>" alt=""></a>
            <h4><?php echo $list[$i]['description']; ?></h4>
          </li>
          <?php } ?>
        </ul>
      <?php } ?>
      </div>
    </section>