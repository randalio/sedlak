<?php
global $post;
$page_id = $post->ID;
$page_title = get_the_title($page_id);

?>
<?php get_header(); ?>
<main id="main" class="m-scene">

<?php if( !is_front_page() ): ?>
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
<?php endif; ?>

	<div id="page_content_container" class="scene-main scene-main--fadein main-inner-wrap">
		<?php blox_content(); ?>
		<?php // the_content();?>
	</div>
</main>

<?php get_footer(); ?>
