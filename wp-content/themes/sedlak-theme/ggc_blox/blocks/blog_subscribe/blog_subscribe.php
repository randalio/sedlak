<?php

if( !empty(get_sub_field('blog_subscribe_headline')) ){
  $blog_headline= get_sub_field('blog_subscribe_headline');
}else{
  $blog_headline = NULL;
}
if( !empty(get_sub_field('hs_form')) ){
  $form_id = get_sub_field('hs_form');
  $blog_form = get_field('hs_form_embed_code',$form_id);
}else{
  $blog_form = NULL;
}


if(!empty(get_sub_field('blog_subscribe_cta_text'))){
  $blog_cta = get_sub_field('blog_subscribe_cta_text');
}else{
  $blog_cta = NULL;
}

?>

  <div class="container-fluid blog-subscribe">
   <div class="row">
    <div class="col py-3 text-center subscribe-cta">
      <?php if( $blog_headline != NULL ): ?>
        <span class="subscribe-cta-text"><?php echo $blog_headline; ?></span>
      <?php endif; ?>
      <?php if( $blog_cta != NULL): ?>
        <button id="blog-signup-btn" class="btn btn-lg"><?php echo $blog_cta; ?></span>
      <?php endif; ?>
    </div>
  </div>
    <div class="row">
      <div class="col py-3 text-center subscribe-form">
        <?php echo $blog_form; ?>
      </div>
    </div>
</div>

<script>
jQuery( document ).ready(function() {
    jQuery('#blog-signup-btn').on('click',function(){
      jQuery('.blog-subscribe .subscribe-form').toggle();
    });
});
</script>
