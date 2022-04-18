<?php
global $post;
$page_id = $post->ID;
$page_title = get_the_title($page_id);
$video_description = get_field('summary');
$youtube_code = get_field('youtube_code');
$videos_repeater = get_field('related_videos_repeater');
$related_videos = array();

// $site_pages = get_field('content_types_pages_groups', 'option');
// print_r($site_pages);
$videos_page = get_field('videos_page', 'option');
$videos_page = get_the_permalink($videos_page);

$video_topic = get_the_terms($page_id, 'topic');


if( !is_array( $videos_repeater ) ){
  $args = array(
    'numberposts' => 3,
    'post_type' => 'video',
    'orderby' => 'DATE',
    'order' => 'DESC',
    'post__not_in' => array($page_id),
  );

  $related_videos_query = get_posts( $args );

  foreach( $related_videos_query as $i => $video ){
  	$array =  array();
  	$array['title']     = get_the_title( $video->ID );
  	$array['link']      = get_the_permalink( $video->ID );
  	$array['btn_text']  = 'Watch Video';
  	array_push( $related_videos, $array );
  }

}else{

  foreach( $videos_repeater as $i => $video ){
    $array =  array();
  	$array['title']     = get_the_title( $video['video_object']->ID );
  	$array['link']      = get_the_permalink( $video['video_object']->ID );
  	$array['btn_text']  = 'Watch Video';
  	array_push( $related_videos, $array );
  }

}

?>

<?php get_header(); ?>

<main id="main" class="m-scene">

  <section class="page-title">
		<div class="container-fluid page-title">
				<div class="row">
					<div class="col">
						<div class="container">
							<div class="row px-0">
								<div class="col">
									<h1 class="m-0"><?php echo get_the_title();?></h1>
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>
	</section>



  <section class="breadcrumbs row">
    <div class="col">
        <div class="container">
            <div class="row py-2">
                <div class="col-12">
                  <span>
                    <a href="/">Home</a>
                  </span>
                <?php if( !empty( $videos_page ) ): ?>
                  <span>
                    <a href="<?php echo $videos_page; ?>?filter=.videos">Videos</a>
                  </span>
                <?php endif; ?>
                <?php if( $post->post_title != '' ): ?>
                    <span><?php echo $post->post_title; ?></span>
                <?php endif; ?>
                </div>
            </div>
        </div> <!-- container -->
    </div> <!-- col -->
  </section>



		<div class="container video-content">
			<section class="row video-block resource-list pad-top-1 pad-bot-2 mx-0">

				<div class="col-12 col-md-8 pr-0 pr-md-4">
					<div class="row">

						<div class="col-12">
							<div class="plyr__video-embed" id="player" data-plyr-provider="youtube" data-plyr-embed-id="<?php echo $youtube_code; ?>">
								<iframe
							    src="https://www.youtube.com/embed/<?php echo $youtube_code; ?>?origin=https://plyr.io&iv_load_policy=3&modestbranding=1&playsinline=1&showinfo=0&rel=0&enablejsapi=1"
							    allowfullscreen allowtransparency allow="autoplay" ></iframe>
							</div>
						</div>

						<div class="col-12 video-text">
						  <div class="row">
						    <div class="col-12 p-4">
						      <?php if( $page_title != ''): ?><h2><?php echo $page_title; ?></h2><?php endif; ?>
						      <?php if( $video_description != ''): ?><p><?php echo $video_description; ?></p><?php endif; ?>
						    </div>
						  </div>
					  </div>

					</div>
				</div>

				<div class="col-12 col-md-4 video-list pl-0 pl-md-5">

					<div class="row list-title mr-md-0 pb-3">
	          <div class="col pl-0 ">
	            <h3 class="d-inline">Videos</h3>
	          </div>
	        </div>

					<?php foreach( $related_videos as $i => $resource ): ?>
	            <div class="row video mr-md-0">
	              <div class="col pl-0 pb-4">
	                  <div class="play_dot">
	                    <div class="play_icon">
	                      <i class="fas fa-play"></i>
	                    </div>
	                  </div>
	                <a href="<?php echo $resource['link']; ?>" class="d-block">
	                  <b><?php echo $resource['title']; ?></b>
	                  <span class="link d-block pt-1"><?php echo $resource['btn_text']; ?></span>
	                </a>

	              </div>

	            </div>

	        <?php endforeach; ?>

				</div>

			</section>
		</div>


    <div id="page_content_container" class="scene-main scene-main--fadein main-inner-wrap">
  		<?php blox_content(); ?>
  		<?php the_content();?>
  	</div>
</main>

<?php get_footer(); ?>
