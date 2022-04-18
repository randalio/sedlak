<?php
global $post;
$page_id = $post->ID;
$page_title = get_the_title($page_id);

$destination = get_field('destination_url', $page_id);
$redirect = get_field('redirect', $page_id);

if( $redirect == 1 && $destination != '' ){
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $destination");
	exit();
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

	<div id="page_content_container" class="scene-main scene-main--fadein main-inner-wrap">
		<!-- <div class="container"> -->
			<?php blox_content(); ?>
			<?php //the_content();?>
		<!-- </div> -->

	</div>
</main>

<?php get_footer(); ?>
