<?php 
global $index,$sections;
$data=$sections[$index];
?>
<?php $direction=$data['direction'];
$class_direction='';
if($direction=='Image Left Side'){
  $class_direction='row-reverse';
} ?>
    <section class="section information-grid">
      <div class="container">
        <ul>
          <li class="flex <?php echo $class_direction; ?>">
            <div class="content">
              <h3><?php echo $data['subtitle']; ?></h3>
              <h2><?php echo $data['title']; ?></h2>
              <?php echo $data['content']; ?>
            </div>
            <div class="image-container">
              <img src="<?php echo $data['image']; ?>" alt="">
            </div>
          </li>
        </ul>
      </div>
    </section>