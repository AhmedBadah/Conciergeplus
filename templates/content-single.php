<?php while (have_posts()) : the_post(); ?>

  <div class="main" role="main">
    <div id="content" class="content full" style="padding:0">
    <?php $header_image = get_field('header_image');
    if ($header_image!='') { ?>
    <div id="featred-img" style="background: url('<?=$header_image?>') no-repeat;background-size: cover;background-position: center;">
    <div class="ovr-lyed"></div>
    </div>
    <?php } ?>
    <?php 
		$params = array( 'width'=> 577 ,'height' => 385 );
    	if ( get_the_post_thumbnail(get_the_ID()) != '' )
        {
      	  $featured_image=wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
          $featured_image=bfi_thumb( $featured_image, $params );
        }
        else
        {
          // No post thumbnail, try attachments instead.
          $featured_image=catch_that_image(); //located at lib/extras.php
          $featured_image=bfi_thumb( $featured_image, $params );
        }
    ?>
      <div class="container">
      <?php 
        if(!empty(get_field('scripts_to_be_added_at_the_top')))
        {
          ?>
          <div class="row">
            <div class="col-md-12">
            <?php the_field('scripts_to_be_added_at_the_top')?>
            </div>
          </div>
          <?php
        }
      ?>
        <div class="row">
          <div class="col-md-12 content-single-no-pad">
          <h1><?php the_title(); ?></h1>
          <p class="singl-auth-metas"> <span class="auth"><?php the_author();?></span> <span class="dottt"></span> <span class="dat"><?php echo get_the_date('F j, Y');?></span></p>
            <article id="theContent" class="post-content">
              <?php the_content();?>
            </article>
            <div class="sharing-stuuf">
              <div class="row">
                <div class="container">
                  <div class="col-md-6 col-sm-6 fst-col">
                    <span class="share-titl">Share This Post</span><?php $url=get_permalink();?>
                    <ul class="post-singl-socils">
                      <li class="email-icon"><a href="mailto:?subject=<?php the_title();?>&body=<?php the_permalink();?>"><i class="fa fa-envelope"></i></a></li>
                      <li class="face-icon"><a href="javascript:poptastic('http://www.facebook.com/share.php?u=<?=$url?>&title=<?php the_title(); ?>');"><i class="fa fa-facebook"></i></a></li>
                      <li class="twitt-icon"><a href="javascript:poptastic('http://twitter.com/intent/tweet?status=<?php the_title(); ?>+<?=$url?>');"><i class="fa fa-twitter"></i></a></li>
                      <li class="google-icon"><a href="javascript:poptastic('https://plus.google.com/share?url=<?=$url?>');"><i class="fa fa-google-plus"></i></a></li>
                      <li class="pinterest-icon"><a href="javascript:poptastic('http://pinterest.com/pin/create/bookmarklet/?media=<?php echo $featured_image; ?>&url=<?=$url?>&is_video=false&description=<?php the_title(); ?>');"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                  </div>
                  <div class="col-md-6 col-sm-6 post-categoriez"><?php the_category(' / '); ?></div>
                </div>
              </div>
            </div>
            <?php comments_template('/templates/comments.php'); ?>
          </div>
        </div>
        <div class="row next-and-prev">
              <div class="col-md-6 col-sm-6 preve"><?php previous_post_link('%link', '<< PREVIOUS POST', TRUE); ?></div>
              <div class="col-md-6 col-sm-6 nexty"><?php next_post_link('%link', 'Next POST >>', TRUE); ?></div>
          </div>
          <?php 
          if(!empty(get_field('scripts_to_be_added_at_the_bottom')))
          {
            ?>
            <div class="row">
              <div class="col-md-12">
              <?php the_field('scripts_to_be_added_at_the_bottom')?>
              </div>
            </div>
            <?php
          }
        ?>
      </div>
    </div>
  </div>

<?php endwhile; ?>
