<?php 
global $index,$sections;
$data=$sections[$index];
?>   
    <section class="section contact-form gray-bg">
      <div class="container">
        <div class="content">
          <?php //echo do_shortcode('[gravityform id="'.$data['form_id'].'" title="false" description="false"]'); ?>
          <!--[if lte IE 8]>
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
<![endif]-->
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
<script>
  hbspt.forms.create({
                region: "na1",
                portalId: "4335718",
                formId: "982e57f2-d281-46c4-bd7c-0aca95dc77c1"
});
</script>
        </div>
      </div>
    </section>