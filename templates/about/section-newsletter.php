<?php 
global $index,$sections;
$data=$sections[$index];
?>
<section id="newsletter" class="section newsletter">
      <div class="container">
        <div class="flex space-between">
          <div class="headlines-container">
            <h3 class="subhead"><?php echo $data['subtitle']; ?></h3>
            <h2 class="main-headline"><?php echo $data['title']; ?></h2>
          </div>
          <div class="content">
            <?php echo $data['description']; ?>
          </div>
        </div>

        <div class="form-container">
          <!--[if lte IE 8]>
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
<![endif]-->
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
<script>
  hbspt.forms.create({
                region: "na1",
                portalId: "4335718",
                formId: "e54f3384-b4a0-47ba-8c8d-3e93e376de17"
});
</script>
          
        </div>
        
      </div>
    </section>