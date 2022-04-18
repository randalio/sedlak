<?php
if ( have_rows( 'one_col_img_txt_bg_options' ) ) :
	while ( have_rows( 'one_col_img_txt_bg_options' ) ) : the_row();
		$background_type = get_sub_field('background_type');
		if( $background_type == 'image'):
			$one_col_bg_img = get_sub_field( 'one_col_bg_img' );
			$bg_color = get_sub_field( 'one_col_bg_color' );
			$bg_filter = get_sub_field( 'one_col_bg_filter' );
			$text_color = get_sub_field( 'one_col_text_color' );
			$pad_top = get_sub_field( 'one_col_text_padding_top' );
			$pad_bot = get_sub_field( 'one_col_text_padding_bot' );
			$margin = get_sub_field( 'one_col_text_margin' );
			$parallax = get_sub_field( 'bg_parallax' );
			$parallax_speed = get_sub_field( 'bg_parallax_speed' );
			$marquee_video_webm = NULL;
			$marquee_video_mp4 = NULL;
		elseif($background_type == 'video'):
			$marquee_video_webm = get_sub_field( 'background_video_webm' );
			$marquee_video_mp4 = get_sub_field( 'background_video_mp4' );
			$one_col_bg_img = get_sub_field( 'one_col_bg_img' );
			$bg_color = get_sub_field( 'one_col_bg_color' );
			$bg_filter = get_sub_field( 'one_col_bg_filter' );
			$text_color = get_sub_field( 'one_col_text_color' );
			$pad_top = get_sub_field( 'one_col_text_padding_top' );
			$pad_bot = get_sub_field( 'one_col_text_padding_bot' );
			$margin = get_sub_field( 'one_col_text_margin' );
			$parallax_speed = NULL;
			$parallax = NULL;
		elseif($background_type == 'color'):
			$bg_color = get_sub_field( 'one_col_bg_color' );
			$text_color = get_sub_field( 'one_col_text_color' );
			$pad_top = get_sub_field( 'one_col_text_padding_top' );
			$pad_bot = get_sub_field( 'one_col_text_padding_bot' );
			$margin = get_sub_field( 'one_col_text_margin' );
			$marquee_video_webm = NULL;
			$marquee_video_mp4 = NULL;
			$one_col_bg_img = NULL;
			$bg_filter = NULL;
			$parallax_speed = NULL;
			$parallax = NULL;
		else:
			$one_col_bg_img = NULL;
			$bg_color = NULL;
			$bg_filter = NULL;
			$text_color = NULL;
			$padding = NULL;
			$margin = NULL;
			$parallax = NULL;
			$parallax_speed = NULL;
			$marquee_video_webm = NULL;
			$marquee_video_mp4 = NULL;
		endif;
	endwhile;
endif;

if($bg_filter == 'white'){
	$bg_filter = 'filter_lt';
}elseif($bg_filter == 'black'){
	$bg_filter = 'filter_drk';
}elseif($bg_filter == 'none'){
	$bg_filter = '';
}

if($text_color == 'white'){
	$text_color = 'txt_lt';
}elseif($text_color == 'black'){
	$text_color = 'txt_drk';
}

if(get_sub_field('one_col_text_center_text')){
	$one_col_text_center = get_sub_field('one_col_text_center_text');
}
else {
	$one_col_text_center = NULL;
}

if(get_sub_field('one_col_txt_headline')){
	$one_col_text_headline = get_sub_field('one_col_txt_headline');
}
else {
	$one_col_text_headline = NULL;
}

if(get_sub_field('one_col_txt_sub_head')){
	$one_col_text_sub_headline = get_sub_field('one_col_txt_sub_head');
}
else {
	$one_col_text_sub_headline = NULL;
}

if(get_sub_field('one_col_txt_text')){
	$one_col_text_one_col_text = get_sub_field('one_col_txt_text');
}
else {
	$one_col_text_one_col_text = NULL;
}


if(get_sub_field('one_col_txt_button_text')){
	$one_col_txt_button_text = get_sub_field('one_col_txt_button_text');
}
else {
	$one_col_txt_button_text = NULL;
}

if(get_sub_field('one_col_txt_button_link')){
	$one_col_txt_button_link = get_sub_field('one_col_txt_button_link');
}
else {
	$one_col_txt_button_link = NULL;
}

if(get_sub_field('one_col_txt_headline_style')){
	$one_col_txt_headline_style = get_sub_field('one_col_txt_headline_style');
}else {
	$one_col_txt_headline_style = NULL;
}




if ( have_rows( 'animation_settings' ) ) :
		while ( have_rows( 'animation_settings' ) ) : the_row();
			$head_anim_one_col_text = get_sub_field( 'headline_animation' );
			$text_anim_one_col_text = get_sub_field( 'text_animation' );
			$button_anim_one_col_text = get_sub_field( 'button_animation' );
		endwhile;
else:
	$head_anim_one_col_text = NULL;
	$text_anim_one_col_text = NULL;
	$button_anim_one_col_text = NULL;
endif;

?>

<?php if( $one_col_text_headline != NULL ||  $one_col_text_sub_headline != NULL || $one_col_text_one_col_text != NULL ): ?>
<section class="row one-col-text-block <?php echo $bg_filter .' '. $text_color. ' '.$parallax.' header-'. $one_col_txt_headline_style; ?> pad-bot-<?php echo $pad_bot;?> pad-top-<?php echo $pad_top;?> mar-<?php echo $margin; ?>" style="<?php if( is_array($one_col_bg_img )): ?>background-image: url('<?php echo $one_col_bg_img['sizes']['ex-large']; ?>');<?php endif; ?> <?php if($bg_color != '' ):?> background-color: <?php echo $bg_color; ?>;<?php endif;?>" <?php if( is_array($one_col_bg_img )): ?>data-image-src="<?php echo $one_col_bg_img['sizes']['ex-large']; ?>" data-speed="<?php echo $parallax_speed; ?>"<?php endif;?>>

	<?php if($background_type === 'video'): ?>
		<div class="video-container">
			<div class="one-col-video-background">
				<div class="one-col-video-foreground">
					<video autoplay muted loop id="marqueeVideo">
						<?php if( !empty($marquee_video_webm['url'])): ?>
							<source src="<?php echo $marquee_video_webm['url']; ?>" type="video/webm">
						<?php endif; ?>
						<?php if(!empty($marquee_video_mp4['url'])): ?>
							<source src="<?php echo $marquee_video_mp4['url']; ?>" type="video/mp4">
						<?php endif; ?>
					</video>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<div class="col">
			<div class="container px-0">
				<div class="row">
					<div class="col-md-12">

						<?php if(isset($one_col_text_headline)): ?>
							<div class="row <?php if( $head_anim_one_col_text != NULL):?>animate_this<?php endif; ?>" <?php if($head_anim_one_col_text != NULL):?>data-animation="<?php echo $head_anim_one_col_text;?>" data-timeout="400"<?php endif; ?>>
								<div class="col <?php if($one_col_text_center): ?>text-center<?php endif; ?>">
									<h2><?php echo $one_col_text_headline; ?></h2>
								</div>
							</div>
						<?php endif; ?>

						<?php if(isset($one_col_text_sub_headline)): ?>
							<div class="row duration-2s <?php if($head_anim_one_col_text != NULL):?>animate_this<?php endif; ?>" <?php if($head_anim_one_col_text != NULL):?>data-animation="<?php echo $head_anim_one_col_text;?>" data-timeout="600"<?php endif; ?>>
								<div class="col <?php if($one_col_text_center): ?>text-center<?php endif; ?>">
									<h4><?php echo $one_col_text_sub_headline; ?></h4>
								</div>
							</div>
						<?php endif; ?>

						<?php if(isset($one_col_text_one_col_text)): ?>
							<div class="row del-250 duration-2s <?php if($text_anim_one_col_text != NULL):?>animate_this<?php endif; ?>" <?php if($text_anim_one_col_text != NULL):?>data-animation="<?php echo $text_anim_one_col_text;?>" data-timeout="600"<?php endif; ?>>
								<div class="col <?php if($one_col_text_center): ?>text-center<?php endif; ?>">
									<div>
										<?php echo $one_col_text_one_col_text; ?>
									</div>
								</div>
							</div>
						<?php endif; ?>

						<?php if( $one_col_txt_button_text != NULL && $one_col_txt_button_link != NULL ): ?>
							<div class="row del-500 duration-1s <?php if($button_anim_one_col_text != NULL):?>animate_this<?php endif; ?>" <?php if($button_anim_one_col_text != NULL):?>data-animation="<?php echo $button_anim_one_col_text;?>" data-timeout="600"<?php endif; ?>>
								<div class="col <?php if($one_col_text_center): ?>text-center<?php endif; ?>">
									<div>
										<a href="<?php echo $one_col_txt_button_link['url']; ?>" target="<?php echo $one_col_txt_button_link['target']; ?>" class="button">
											<span class=""><?php echo $one_col_txt_button_text; ?></span>
										</a>
									</div>
								</div>
							</div>
						<?php endif; ?>

					</div>
				</div>
			</div>

  </div>
</section>
<?php endif; ?>
