<?php 
global $index,$sections;
$data=$sections[$index];
?>
<section class="section about-logos">
      <div class="container">
        <h4><?php echo $data['title']; ?></h4>
        <?php $logos=$data['logos'];
        if(is_array($logos)){ ?>
        <ul class="flex space-between">
          <?php for($i=0;$i<count($logos);$i++){ ?>
          <li><a href="javascript:;"><img src="<?php echo $logos[$i]; ?>" alt=""></a></li>
          <?php } ?>
        </ul>
      <?php } ?>
      </div>
    </section>