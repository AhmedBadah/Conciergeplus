<?php 
global $index,$sections;
$data=$sections[$index];
?>
<section class="section contact-info gray-bg">
  <div class="container">
    <ul>
      <li>
        <div class="flex space-between">
          <?php echo $data['first_widget']; ?>
        </div>
      </li>
      <li>
        <div class="flex space-between">
          <?php echo $data['second_widget']; ?>
        </div>
      </li>
      <li>
        <div class="content">
          <?php echo $data['third_widget']; ?>
        </div>
      </li>
    </ul>
  </div>
</section>