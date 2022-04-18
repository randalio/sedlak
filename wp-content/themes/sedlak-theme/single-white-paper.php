<?php
global $post;
$page_id = $post->ID;
$page_title = get_the_title($page_id);

$whitepapers_form = get_field('whitepapers_form', 'option');
$whitepapers_form_headline = get_field('whitepapers_form_headline', 'option');
$whitepapers_page = get_field('whitepapers_page', 'option');
$whitepapers_page = get_the_permalink($whitepapers_page);

$cover_image = get_field('cover');
$summary = get_field('summary');
$pdf = get_field('pdf');
$pdf_url = $pdf['url'];


if( isset( $_GET['whitepaper'] ) ){
	$whitepaper_id = $_GET['whitepaper'];
}else{
	$whitepaper_id = '';
}

if( $whitepaper_id == get_the_ID() ){
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $pdf_url");
		exit();
}
?>

<?php get_header(); ?>
<main id="main" class="m-scene <?php if( $whitepaper_id != '' ):?> no-scroll<?php endif;?>">

	<section class="page-title">
		<div class="container-fluid page-title">
				<div class="row">
					<div class="col">
						<div class="container">
							<div class="row px-0">
								<div class="col">
									<h1 class="m-0">White Papers</h1>
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
                <?php if( $whitepapers_page != '' ): ?>
                  <span>
                    <a href="<?php echo $whitepapers_page; ?>?filter=.white-paper" id="whitepaper_home">White Papers</a>
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

	<div id="page_content_container" class="scene-main scene-main--fadein main-inner-wrap">
		<div class="container pt-5">

			<div class="row whitepaper">
				<div class="col-12 col-lg-7">

					<h2 class="pt-3"><?php echo get_the_title(); ?></h2>

					<img src="<?php echo $cover_image['url']; ?>" class="img-fluid w-100 px-4" />

					<p><?php echo $summary; ?></p>

				</div>
				<div class="col-12 col-lg-5 sidebar">

					<div class="row m-5">
						<div class="col">
							<h3 class="pb-3"><?php echo $whitepapers_form_headline; ?></h3>
							<?php echo do_shortcode('[gravityform id="'.$whitepapers_form.'" title="false" description="false" ajax="true"]'); ?>
						</div>
					</div>

					<?php if( $whitepaper_id == get_the_ID()  ): ?>
						<a href="<?php echo $pdf['url']; ?>" id="pdflink" target="_blank">pdflink</a>
					<?php endif; ?>
				</div>
			</div>

		</div>
	</div>

</main>



<?php get_footer(); ?>
