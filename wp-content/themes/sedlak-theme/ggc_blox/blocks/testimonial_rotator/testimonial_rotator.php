<?php
$slides = array();
$i = 0;

//BLOCK ID
$rand_id = rand(111111, 999999);
$rand_id = 'marquee-'.$rand_id;

$testimonial_slider_headline = get_sub_field('testimonial_rotator_headline');
$testimonials								 = get_sub_field('testimonial_rotator_relationships');
$testimonial_image					 = get_sub_field('testimonial_icon_image');

//echo $testimonial_slider_headline;
foreach( $testimonials as $testimonial ){
	$slide['author'] 	= $testimonial->post_title;
	$slide['slide_text'] = $testimonial->post_content;
	$slide['rand_id'] = 'slide-'.rand(1111, 9999);
	array_push($slides, $slide);
}


?>

<section class="row testimonial-rotator-block py-5">

	<div class="col-12 col-lg-4 col-xl-3 offset-xl-1 pt-3 carousel-tagline pb-3 pl-lg-5 pl-xl-auto">
			<div class="row">
				<div class="col-9 col-lg-6 px-lg-auto text-lg-right order-last order-lg-first px-lg-0">
					<h3><?php echo $testimonial_slider_headline; ?></h3>
				</div>

				<div class="col-3 col-lg-6">
					<img src="/wp-content/themes/sedlak-theme/images/testimonial.png" alt="Testimonials" class="img-fluid float-right"/>
				</div>
		</div>
	</div>

	<div id="<?php echo $rand_id; ?>" class="col-12 col-lg-7 carousel carousel-fade py-1 <?php if(sizeof($slides) > 1 ): ?>multi-slide<?php endif; ?> slide" data-ride="carousel" data-interval="4000">
			<div class="carousel-inner">
					<?php foreach( $slides as $index => $slide ): ?>
						<div class="carousel-item testimonial-carousel-item active" <?php if($slide['slide_bg_color'] != ''):?> style="background-color: <?php echo $slide['slide_bg_color']; ?>" <?php endif;?>>
								<div class="row slide_inner">
									<div class="col-12 text-background">
											<div class="content-container text-left">
												<?php if( $slide['slide_text'] != '' ): ?><?php echo apply_filters('the_content', $slide['slide_text']); ?><?php endif; ?>
											</div>
									</div>
								</div>
							</div>
					<?php endforeach; ?>
				</div>
				<div class="carousel_border del-500 duration-2s animate_this" data-animation="fadeIn"></div>
		</div>


			<a class="carousel-control-prev arrow-control" href="#<?php echo $rand_id; ?>" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"><i class="fal fa-chevron-left"></i></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next arrow-control" href="#<?php echo $rand_id; ?>" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"><i class="fal fa-chevron-right"></i></span>
				<span class="sr-only">Next</span>
			</a>


</section>
