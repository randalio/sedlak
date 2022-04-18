<?php

if ( have_rows( 'video_block_content_group' ) ) :
	while ( have_rows( 'video_block_content_group' ) ) : the_row();

      $video_headline = get_sub_field('video_block_headline');
      $video_description = get_sub_field('video_block_description');
      $video_background_color = get_sub_field('video_block_background');
      $video_text_color = get_sub_field('video_block_text_color');

			$video_btn_link = get_sub_field('video_block_button_link');
			$video_btn_text = get_sub_field('video_block_button_text');

  endwhile;
endif;

if ( have_rows( 'video_block_video_group' ) ) :
	while ( have_rows( 'video_block_video_group' ) ) : the_row();

      $video_type = get_sub_field('video_block_video_type');
      $video_code = get_sub_field('video_block_youtube_code');
      $video_file_mp4 = get_sub_field('video_block_mp4_file');
      if( $video_type == 'youtube'){
        $video_cover = get_sub_field('video_block_youtube_cover_image');
      }
      if( $video_type == 'mp4'){
        $video_cover = get_sub_field('video_block_video_cover_image');
      }

  endwhile;
endif;


$video_pad_top = get_sub_field('video_block_padding_top');
$video_pad_bot = get_sub_field('video_block_padding_bot');

?>

<section class="video-block row <?php echo $video_text_color; ?> pad-top-<?php echo $video_pad_top;?> pad-bot-<?php echo $video_pad_bot; ?>">

	<div class="col-12 col-md-12 col-lg-4 video-text order-last order-lg-first" <?php if($video_background_color): ?> style="background-color: <?php echo $video_background_color; ?>;"<?php endif; ?>>

	  <div class="row">
	    <div class="col-12 p-5">
	      <?php if( $video_headline != ''): ?><h2><?php echo $video_headline; ?></h2><?php endif; ?>
	      <?php if( $video_description != ''): ?><p><?php echo $video_description; ?></p><?php endif; ?>
				<?php if( $video_btn_text != '' && is_array($video_btn_link) ): ?><a href="<?php echo $video_btn_link['url'];?>" class="btn btn-quaternary px-5"><?php echo $video_btn_text;?></a> <?php endif; ?>
	    </div>
	  </div>

  </div>

  <div class="col-12 col-md-12 col-lg-8 px-0 video order-first order-lg-last">

		<?php if( $video_type == "youtube" ): ?>
			<div class="plyr__video-embed" id="player" data-plyr-provider="youtube" data-plyr-embed-id="<?php echo $video_code; ?>">
				<iframe
			    src="https://www.youtube.com/embed/<?php echo $video_code; ?>?origin=https://plyr.io&iv_load_policy=3&modestbranding=1&playsinline=1&showinfo=0&rel=0&enablejsapi=1"
			    allowfullscreen allowtransparency allow="autoplay" ></iframe>
			</div>
		<?php else: ?>
			<video id="player" playsinline controls preload="none" poster="<?php echo $video_cover['url']; ?>">
			  <source src="<?php echo $video_file_mp4['url']; ?>" type="video/mp4" />
			</video>
		<?php endif; ?>




	</div>

</section>
