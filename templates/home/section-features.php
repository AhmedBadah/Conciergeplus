<?php 
global $index,$sections;
$data=$sections[$index];
?>
<section class="section section-features gray-bg">
  <div class="container">
    <h3 ><?php echo $data['subtitle']; ?></h3>
    <h2 animate="animate"><?php echo $data['title']; ?></h2>
    <?php $features_list=$data['features_list'];
    if(is_array($features_list)){ ?>
    <ul class="hidden-mobile">
    <?php for($i=0;$i<count($features_list);$i++){ ?>
      <li>
        <img animate="animate-fade" src="<?php echo $features_list[$i]['icon']; ?>" alt="">
        <h4 ><?php echo $features_list[$i]['title']; ?></h4>
        <div ><?php echo $features_list[$i]['description']; ?></div>
        <a class="read-more-link" href="<?php echo $features_list[$i]['button_url']; ?>"><?php echo $features_list[$i]['button_label']; ?></a>
      </li>
      <?php } ?>
    </ul>
    <?php } ?>
    <?php if(is_array($features_list)){ ?>
    <ul id="features" class="visible-mobile owl-theme owl-carousel">
      <?php for($i=0;$i<count($features_list);$i++){ ?>
      <li>
        <img src="<?php echo $features_list[$i]['icon']; ?>" alt="">
        <h4 animate="animate"><?php echo $features_list[$i]['title']; ?></h4>
        <div animate="animate"><?php echo $features_list[$i]['description']; ?></div>
        <a class="read-more-link" href="javascript:;">LEARN MORE</a>
      </li>
      <?php } ?>
    </ul>
    <?php } ?>
    <a class="btn-green hidden-mobile" href="<?php echo $data['button_url']; ?>"><?php echo $data['button_label']; ?></a>
  </div>
</section>