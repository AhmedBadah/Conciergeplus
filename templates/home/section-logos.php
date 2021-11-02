<?php 
global $index,$sections;
$data=$sections[$index];
?>
<section class="section section-logos">
      <div class="">
        <h2><?php echo $data['title']; ?></h2>
        <div style="overflow: hidden;">
        <div class="marque">
        <?php $logos= $data['logos'];
        shuffle($logos);
       
        $first_count=ceil(count($logos)/2);
        if(is_array($logos)){
        ?>
        <ul class="flex space-between center wrap">
          <?php 
          for($i=0;$i<$first_count;$i++){ ?>
          <li><img src="<?php echo $logos[$i]; ?>" alt=""></li>
          <?php } ?>
        </ul>
        <?php } ?>
        <?php 
        if(is_array($logos)){
        ?>
        <ul class="flex space-between center wrap">
          <?php for($i=0;$i<$first_count;$i++){ ?>
          <li><img src="<?php echo $logos[$i]; ?>" alt=""></li>
          <?php } ?>
        </ul>
        <?php } ?>
        <?php 
        
        if(is_array($logos)){
        ?>
        <ul class="flex space-between center wrap">
          <?php for($i=0;$i<$first_count;$i++){ ?>
          <li><img src="<?php echo $logos[$i]; ?>" alt=""></li>
          <?php } ?>
        </ul>
        <?php } ?>
        </div>



        <div class="marque reverse">
        <?php 
        
        if(is_array($logos)){
        ?>
        <ul class="flex space-between center wrap">
          <?php 
          for($i=$first_count;$i<count($logos);$i++){ ?>
          <li><img src="<?php echo $logos[$i]; ?>" alt=""></li>
          <?php } ?>
        </ul>
        <?php } ?>
        <?php 
        if(is_array($logos)){
        ?>
        <ul class="flex space-between center wrap">
          <?php for($i=$first_count;$i<count($logos);$i++){  ?>
          <li><img src="<?php echo $logos[$i]; ?>" alt=""></li>
          <?php } ?>
        </ul>
        <?php } ?>
        <?php 
        
        if(is_array($logos)){
        ?>
        <ul class="flex space-between center wrap">
          <?php for($i=$first_count;$i<count($logos);$i++){  ?>
          <li><img src="<?php echo $logos[$i]; ?>" alt=""></li>
          <?php } ?>
        </ul>
        <?php } ?>
        </div>
        </div>
      </div>
    </section>