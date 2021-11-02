<div class="main" role="main">
    <div id="content" class="content full">
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
			<?php the_content(); ?>
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
			<?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
		</div>
	</div>
</div>