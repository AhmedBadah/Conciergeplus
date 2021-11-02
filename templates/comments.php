<?php
  if (post_password_required()) {
    return;
  }
?>

<section id="comments" class="comments row">
   <?php
  $commenter = wp_get_current_commenter();
  // $req = get_option( 'require_name_email' );
  $aria_req = ( $req ? " aria-required='true'" : '' );
  $before_form_text=get_field('before_comment_form_text','option');
  $fields =  array(
  'author' =>
    '<p class="comment-form-author form-group">
    <input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
    '" size="30" placeholder="Your Name"' . $aria_req . ' /></p>'
);
  $args = array(
    'title_reply'=>' ',
    'comment_notes_before' => '<p class="comment-notes">' .$before_form_text.'</p>',
    'fields' => apply_filters( 'comment_form_default_fields', $fields ),
    'comment_notes_after'=>'',
    'label_submit' => 'Post',
    'comment_field'=>'<p class="comment-form-comment form-group"><textarea class="form-control" placeholder="Add Comment" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>'
 );

  ?>


  <div id="comment_section" class="col-md-6" >
    <form data-id="<?php echo get_the_ID(); ?>">
      <p class="comment-notes"></p>
      
      <p class="comment-form-comment form-group">
        <textarea class="form-control comment" placeholder="Add Comment" cols="45" rows="8" aria-required="true"></textarea>
      </p>
      <p class="form-submit text-right">
        <?php if(!get_current_user_id()){
          $class='submit btn btn-primary modal-toggle';
          $meta='data-target="login-lightbox"';
        }else{
          $class='submit btn btn-primary';
          $meta='';
        } ?>
        <button data-id="<?php echo get_the_ID(); ?>" <?php echo $meta; ?> class="<?php echo $class; ?>">Post</button>
        <input type="hidden" name="comment_post_ID" value="<?php echo get_the_ID(); ?>" class="comment_post_ID">
      </p>      
    </form>


  </div>
  <div class="col-md-6">
  <?php if (have_comments()) : ?>
    <ol class="comment-list">
      <?php 
      $comments=get_comments(array('post_id'=> get_the_ID()));
      foreach ($comments as $comment) {
        ?>
    <div id="comment-<?php echo $comment->comment_ID?>" class="comment byuser comment-author-<?php echo $comment->comment_author;?>   even thread-even">
      <article id="div-comment-<?php echo $comment->comment_ID?>" class="comment-body">
        <footer class="comment-meta">
          <div class="comment-author vcard">
                        <b class="fn"><?php echo $comment->comment_author; ?></b> <span class="says">says:</span>          </div><!-- .comment-author -->

          <div class="comment-metadata">
            
              <time datetime="2018-05-11T12:06:18+00:00">
               <?php echo $comment->comment_date; ?>            
              </time>
            
            

                  </footer><!-- .comment-meta -->

        <div class="comment-content">
          <p><?php echo $comment->comment_content; ?></p>
        </div><!-- .comment-content -->

      </article><!-- .comment-body -->
</div>
<?php
       
      }
       ?>
    </ol>

    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
      <nav>
        <ul class="pager">
          <?php if (get_previous_comments_link()) : ?>
            <li class="previous"><?php previous_comments_link(__('&larr; Older comments', 'roots')); ?></li>
          <?php endif; ?>
          <?php if (get_next_comments_link()) : ?>
            <li class="next"><?php next_comments_link(__('Newer comments &rarr;', 'roots')); ?></li>
          <?php endif; ?>
        </ul>
      </nav>
    <?php endif; ?>
  <?php endif; // have_comments() ?>
  </div>
  <?php if (!comments_open() && get_comments_number() != '0' && post_type_supports(get_post_type(), 'comments')) : ?>
    <div class="alert alert-warning">
      <?php _e('Comments are closed.', 'roots'); ?>
    </div>
  <?php endif; ?>
<!-- '' -->

</section>
<script type="text/javascript">
jQuery(document).ready(function(){
  jQuery("#comment_section input#submit").click(function(e){
    var email=jQuery('#email').val();
    var author=jQuery('#author').val();
    var comment=jQuery('#comment').val();
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var emailCheck = false;

    if(jQuery('#email').length == 0 && jQuery('#author').length == 0){email = 'logged@logged.com';author = 'logged';}
    if(regex.test(email))
    {
      emailCheck = true;
    }

    if(author == '' || !emailCheck || comment == '')
    {
      if(!jQuery("#commentform .alert").length) /*prevent create error msg many time*/
      {
        jQuery("#commentform").prepend('<div id="comment-error" class="alert alert-danger" role="alert"><strong>ERROR:</strong> please fill the required fields (name, email, comment).</div>');
        jQuery("html, body").animate({ scrollTop: jQuery('#comment-error').offset().top - 70 }, 1000);
      }
      e.preventDefault();
    }

  });
});
</script>