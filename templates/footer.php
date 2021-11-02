<footer class="">
    <div class="container ">
      <div class="flex space-between footer-top">
        <div class="logo-container">
          <a href="https://concierge-staging.riizmlw6-liquidwebsites.com/">
            <img src="<?php the_field('footer_label','option'); ?>" alt="">
          </a>
        </div>
        <p class="btn-container"><a class="btn-light-blue" href="<?php the_field('footer_top_button_url','option'); ?>"><?php the_field('footer_top_button_label','option'); ?></a></p>
      </div>
    </div>
    <hr class="light-blue"/>
    <div class="container">
      <div class="flex space-between footer-body">
        <div class="contact-info widget">
          <?php the_field('column_options','option'); ?>
        </div>
        <div class="links-widget  widget">
          <?php the_field('second_column_copy','option'); ?>
        </div>
        <div class="links-widget other-links-widget widget">
          <?php the_field('third_column_copy','option'); ?>
        </div>
        <div style="display: none;" class="footer-image">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/badge.png" alt="">
        </div>
        <div class="footer-main-links widget">
          <?php the_field('fourth_column_options','option'); ?>
        </div>
      </div>
    </div>
    <hr class="light-blue"/>
    <div class="container">
      <div class="flex space-between footer-bottom">
        <div class="terms">
          <p class="copyright-text">© <?php echo date("Y"); ?> Concierge Plus. All rights reserved.</p>
          
        </div>
        <div class="members">
          <h6>PROUD MEMBERS OF</h6>
          <?php $logos=get_field('logos','option');
          if(is_array($logos)){ ?>
          <ul class="flex space-between">
            <?php for($i=0;$i<count($logos);$i++){
            $logo_class='cci';
            if($i==1){
              $logo_class='amco';
            }else if($i==2){
              $logo_class='community';
            }else if($i==3){
              $logo_class='narm';
            } ?>
            <li>
              <a target="_blank" href="<?php echo $logos[$i]['link_url']; ?>">
                <img class="<?php echo $logo_class; ?>" src="<?php echo $logos[$i]['logo']; ?>" alt="">
              </a>
            </li>
            <?php } ?>
          </ul>
          <?php } ?>
        </div>
        <div class="socials">
          <ul class="flex space-between">
            <li><a href="<?php the_field('linkedin_link','option') ?>"><img class="linkedin" src="<?php echo get_template_directory_uri(); ?>/assets/img/LinkedIn.svg" alt=""></a></li>
            <li><a href="<?php the_field('youtube_link','option') ?>"><img class="YouTube" src="<?php echo get_template_directory_uri(); ?>/assets/img/YouTube.svg" alt=""></a></li>
            <li><a href="<?php the_field('twitter_link','option') ?>"><img class="Twitter"  src="<?php echo get_template_directory_uri(); ?>/assets/img/Twitter.svg" alt=""></a></li>
            <li><a href="<?php the_field('facebook_link','option') ?>"><img class="facebook" src="<?php echo get_template_directory_uri(); ?>/assets/img/Facebook.svg" alt=""></a></li>
          </ul>
        </div>
      </div>
    </div> 
  </footer>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/vendor/modernizr-3.11.2.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/vendor/jquery-3.5.1.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/vendor/owl.carousel.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/main-2.js"></script>

	<?php wp_footer(); ?>
	