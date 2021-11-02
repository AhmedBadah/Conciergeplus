<?php 
global $index,$sections;
$data=$sections[$index];
?>
    <section class="section gray-bg three-column-info">
      <div class="container">
        <h3><?php echo $data['title']; ?></h3>
        <?php $column_info=$data['column_info'];
        if(is_array($column_info)){ ?>
        <ul class="three-column-grid">
          <?php for ($i=0; $i < count($column_info) ; $i++) { ?>
          <li>
            <div class="icon-container">
              <img src="<?php echo $column_info[$i]['image']; ?>" alt="">
            </div>
            <div class="content">
              <h4><?php echo $column_info[$i]['title']; ?></h4>
              <?php echo $column_info[$i]['description']; ?>
            </div>
          </li>
          <?php } ?>
        </ul>
      <?php } ?>
      </div>
    </section>