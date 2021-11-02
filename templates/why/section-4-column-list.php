<?php 
global $index,$sections;
$data=$sections[$index];
?>
<section class="section details-with-list gray-bg white-list">
      <div class="container">
        <?php $list=$data['list'];
        if(is_array($list)){ ?>
        <ul>
          <?php for($i=0;$i<count($list);$i++){ ?>
          <li>
            <a href="javascript:;"><img src="<?php echo $list[$i]['image']; ?>" alt=""></a>
            <h4><?php echo $list[$i]['title']; ?></h4>
          </li>
        <?php } ?>
        </ul>
      <?php } ?>
      </div>
    </section>