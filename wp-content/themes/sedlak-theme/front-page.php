<?php
global $post;
$page_id = $post->ID;
$page_title = get_the_title($page_id);

?>

<?php get_header(); ?>
<main id="main" class="m-scene">
	<div id="page_content_container" class="scene-main scene-main--fadein main-inner-wrap">
		<?php blox_content(); ?>
		<?php the_content(); ?>
	</div>
</main>

<?php get_footer(); ?>
