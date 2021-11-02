<?php 
global $index,$sections;
$data=$sections[$index];
?>  
    <section class="section team gray-bg">
      <div class="container">
        <h3 class="subhead"><?php echo $data['subtitle']; ?></h3>
        <h2 class="main-headline"><?php echo $data['title']; ?></h2>
        <?php $team_members=$data['team_members'];
        if(is_array($team_members)){ ?>
        <ul>
          <?php for($i=0;$i<count($team_members);$i++){ ?>
          <li>
            <div class="image-container">
              <a href="javascript:;"><img src="<?php echo $team_members[$i]['image']; ?>" alt=""></a>
            </div>
            <div class="content-container">
              <h4><?php echo $team_members[$i]['name']; ?></h4>
              <h5><?php echo $team_members[$i]['position']; ?></h5>
            </div>
          </li>
          <?php } ?>
        </ul>
      <?php } ?>
      <?php if(is_array($team_members)){ ?>
        <ul class="owl-theme owl-carousel">
          <?php for($i=0;$i<count($team_members);$i++){ ?>
          <li>
            <div class="image-container">
              <a href="javascript:;"><img src="<?php echo $team_members[$i]['image']; ?>" alt=""></a>
            </div>
            <div class="content-container">
              <h4><?php echo $team_members[$i]['name']; ?></h4>
              <h5><?php echo $team_members[$i]['position']; ?></h5>
            </div>
          </li>
          <?php } ?>
        </ul>
      <?php } ?>
      </div>
    </section>
