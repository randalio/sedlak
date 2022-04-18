<?php

$icons = array();

if( !empty(get_sub_field('blog_cats_list_headline')) ){
  $blog_cats_list_headline = get_sub_field('blog_cats_list_headline');
}else{
  $blog_cats_list_headline = NULL;
}


// BACKGROUND Settings

if ( have_rows( 'blog_cats_list_bg_options' ) ) :
	while ( have_rows( 'blog_cats_list_bg_options' ) ) : the_row();
		$background_type = get_sub_field('background_type');
		if( $background_type == 'image'):
			$blog_cats_list_bg_img = get_sub_field( 'blog_cats_list_bg_img' );
			$bg_color = get_sub_field( 'blog_cats_list_bg_color' );
			$text_color = get_sub_field( 'blog_cats_list_text_color' );
			$pad_top = get_sub_field( 'blog_cats_list_text_padding_top' );
			$pad_bot = get_sub_field( 'blog_cats_list_text_padding_bot' );
			$margin = get_sub_field( 'blog_cats_list_text_margin' );
			$parallax = get_sub_field( 'bg_parallax' );
			$parallax_speed = get_sub_field( 'bg_parallax_speed' );
			$marquee_video_mp4 = NULL;
		elseif($background_type == 'video'):
			$marquee_video_mp4 = get_sub_field( 'background_video_mp4' );
			$blog_cats_list_bg_img = get_sub_field( 'blog_cats_list_bg_img' );
			$bg_color = get_sub_field( 'blog_cats_list_bg_color' );
			$text_color = get_sub_field( 'blog_cats_list_text_color' );
			$pad_top = get_sub_field( 'blog_cats_list_text_padding_top' );
			$pad_bot = get_sub_field( 'blog_cats_list_text_padding_bot' );
			$margin = get_sub_field( 'blog_cats_list_text_margin' );
			$parallax_speed = NULL;
			$parallax = NULL;
		elseif($background_type == 'color'):
			$bg_color = get_sub_field( 'blog_cats_list_bg_color' );
			$text_color = get_sub_field( 'blog_cats_list_text_color' );
			$pad_top = get_sub_field( 'blog_cats_list_text_padding_top' );
			$pad_bot = get_sub_field( 'blog_cats_list_text_padding_bot' );
			$margin = get_sub_field( 'blog_cats_list_text_margin' );
			$marquee_video_mp4 = NULL;
			$blog_cats_list_bg_img = NULL;
			$parallax_speed = NULL;
			$parallax = NULL;
		else:
			$blog_cats_list_bg_img = NULL;
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

<section class="blog-cats-list-row <?php echo $text_color. ' '.$parallax; ?> pad-bot-<?php echo $pad_bot;?> pad-top-<?php echo $pad_top; ?>" style="background-image: url('<?php echo $one_col_bg_img['sizes']['ex-large']; ?>'); <?php if($bg_color != NULL ):?> background-color: <?php echo $bg_color; ?><?php endif;?>;" data-image-src="<?php echo $blog_cats_list_bg_img['sizes']['ex-large']; ?>" data-speed="<?php echo $parallax_speed; ?>">
  <div class="container">


    <?php if( $blog_cats_list_headline != NULL ||  $blog_cats_list_button_text != NULL || $blog_cats_list_button_link != NULL): ?>
      <div class="row posts-by-topic mx-0 my-4">

        <?php if( $blog_cats_list_headline != NULL ): ?>
          <div class="col-12 text-center headline">
            <h4 class="<?php if($blog_cats_list_headline_anim != NULL):?>animate_this<?php endif; ?>" <?php if($blog_cats_list_headline_anim != NULL):?>data-animation="<?php echo $blog_cats_list_headline_anim;?>"<?php endif; ?>><?php echo $blog_cats_list_headline; ?></h4>
          </div>
        <?php endif; ?>

        <?php
        $args = array(
          'hide_empty' => FALSE,
          'title_li'=> __( '' ),
          'show_count'=> 1,
          'hide_empty'=>1,
          'echo'=> 0,
        );
          $all_link = get_post_type_archive_link('post');

          /*
          $all_cats = get_categories( 'category',array('hide_empty'=>true) );

          $count_total = 0;
          foreach($all_cats as $cat):
            $count_total = $count_total + intval($cat->count);
          endforeach;
          */
          $post_args = array(
           'post_type' => 'post'
           );
        $count_query = new WP_Query( $post_args );
        $all_posts_count = $count_query->found_posts;
        //echo $count_query->found_posts;

          $blog_cats = wp_list_categories($args);
          $all_text = '<li><a href="'.$all_link.'">All Posts</a> ('.$all_posts_count.')</li>';
          echo '<ul>'.$all_text.$blog_cats.'</ul>';
          //echo $blog_cats;
        ?>


      </div>
    <?php endif;?>

  </div>

</section>
