<?php

if( !empty(get_sub_field('blog_subscribe_sidebar_headline')) ){
  $blog_headline= get_sub_field('blog_subscribe_sidebar_headline');
}else{
  $blog_headline = NULL;
}
if( !empty(get_sub_field('hs_form')) ){
  $form_id = get_sub_field('hs_form');
  $blog_form = get_field('hs_form_embed_code',$form_id);
}else{
  $blog_form = NULL;
}


if(!empty(get_sub_field('blog_subscribe_sidebar_cta_text'))){
  $blog_cta = get_sub_field('blog_subscribe_sidebar_cta_text');
}else{
  $blog_cta = NULL;
}


if( !empty(get_sub_field('blog_subscribe_sidebar_headline')) ){
  $blog_subscribe_sidebar_headline = get_sub_field('blog_subscribe_sidebar_headline');
}else{
  $blog_subscribe_sidebar_headline = NULL;
}


// BACKGROUND Settings

if ( have_rows( 'blog_subscribe_sidebar_bg_options' ) ) :
	while ( have_rows( 'blog_subscribe_sidebar_bg_options' ) ) : the_row();
		$background_type = get_sub_field('background_type');
		if( $background_type == 'image'):
			$blog_subscribe_sidebar_bg_img = get_sub_field( 'blog_subscribe_sidebar_bg_img' );
			$bg_color = get_sub_field( 'blog_subscribe_sidebar_bg_color' );
			$text_color = get_sub_field( 'blog_subscribe_sidebar_text_color' );
			$pad_top = get_sub_field( 'blog_subscribe_sidebar_text_padding_top' );
			$pad_bot = get_sub_field( 'blog_subscribe_sidebar_text_padding_bot' );
			$margin = get_sub_field( 'blog_subscribe_sidebar_text_margin' );
			$parallax = get_sub_field( 'bg_parallax' );
			$parallax_speed = get_sub_field( 'bg_parallax_speed' );
			$marquee_video_mp4 = NULL;
		elseif($background_type == 'video'):
			$marquee_video_mp4 = get_sub_field( 'background_video_mp4' );
			$blog_subscribe_sidebar_bg_img = get_sub_field( 'blog_subscribe_sidebar_bg_img' );
			$bg_color = get_sub_field( 'blog_subscribe_sidebar_bg_color' );
			$text_color = get_sub_field( 'blog_subscribe_sidebar_text_color' );
			$pad_top = get_sub_field( 'blog_subscribe_sidebar_text_padding_top' );
			$pad_bot = get_sub_field( 'blog_subscribe_sidebar_text_padding_bot' );
			$margin = get_sub_field( 'blog_subscribe_sidebar_text_margin' );
			$parallax_speed = NULL;
			$parallax = NULL;
		elseif($background_type == 'color'):
			$bg_color = get_sub_field( 'blog_subscribe_sidebar_bg_color' );
			$text_color = get_sub_field( 'blog_subscribe_sidebar_text_color' );
			$pad_top = get_sub_field( 'blog_subscribe_sidebar_text_padding_top' );
			$pad_bot = get_sub_field( 'blog_subscribe_sidebar_text_padding_bot' );
			$margin = get_sub_field( 'blog_subscribe_sidebar_text_margin' );
			$marquee_video_mp4 = NULL;
			$blog_subscribe_sidebar_bg_img = NULL;
			$parallax_speed = NULL;
			$parallax = NULL;
		else:
			$blog_subscribe_sidebar_bg_img = NULL;
			$bg_color = NULL;
			$text_color = NULL;
			$pad_top = NULL;
			$pad_bot = NULL;
			$margin = NULL;
			$parallax = NULL;
			$parallax_speed = NULL;
			$marquee_video_mp4 = NULL;
		endif;
	endwhile;
endif;


$cols = '';
$offset = '';



?>

  <div class="container-fluid blog-subscribe-sidebar <?php echo $text_color. ' '.$parallax; ?> pad-bot-<?php echo $pad_bot;?> pad-top-<?php echo $pad_top; ?>" style="background-image: url('<?php echo $blog_subscribe_sidebar_bg_img['sizes']['ex-large']; ?>'); <?php if($bg_color != NULL ):?> background-color: <?php echo $bg_color; ?><?php endif;?>;<?php if($text_color!=NULL): ?>color:<?php echo $text_color; endif; ?>;" data-image-src="<?php echo $blog_subscribe_sidebar_bg_img['sizes']['ex-large']; ?>" data-speed="<?php echo $parallax_speed; ?>">
   <div class="row">
    <div class="col py-3 text-center subscribe-sidebar-cta">
      <h3 class="subscribe-cta-text">
      <?php if( $blog_headline != NULL ): ?>
        <span><?php echo $blog_headline; ?></span>
      <?php endif; ?>
      <?php if( $blog_cta != NULL): ?>
        <?php echo $blog_cta; ?>
      <?php endif; ?>
    </h3>
    </div>
  </div>
    <div class="row">
      <div class="col py-3 text-center subscribe-sidebar-form">
        <?php echo $blog_form; ?>
      </div>
    </div>
</div>
