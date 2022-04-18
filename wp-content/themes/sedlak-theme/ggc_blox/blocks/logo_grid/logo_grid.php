<?php

if( get_post_type() == 'industry' ){
	$repeater = get_field('client_logos' );
	if(get_field('partner_headline')){
		$logo_grid_headline = get_field('partner_headline');
	}
}else{
	$repeater = get_sub_field('partner_logos');
	if(get_sub_field('logo_grid_headline')){
		$logo_grid_headline = get_sub_field('logo_grid_headline');
	}
}

	$logos = array();


if( is_array( $repeater ) ){
	foreach( $repeater as $logo_id ):
  	$logo = array();
		$logo['image'] = get_field('logo', $logo_id);
  	array_push($logos, $logo);
  endforeach;
}



?>

<section class="row logo-carousel-block pt-3 <?php if(get_post_type() == 'industry'): ?>industry pad-bot-1 <?php endif; ?>">
	<div class="col">
		<div class="container">

			<?php if(isset($logo_grid_headline)): ?>
				<div class="row">
					<div class="col text-center pt-5 <?php if(get_post_type() == 'industry'): ?>pb-1 <?php endif; ?>">
						<h2><?php echo $logo_grid_headline; ?></h2>
					</div>
				</div>
			<?php endif; ?>

			<?php if(sizeof($logos) > 0): ?>
				<div class="row">
					<div class="col-12 col-xl-10 offset-xl-1">
						<div class="fade_left"></div>
						<div class="fade_right"></div>
						<div class="owl-carousel logo-grid-owl-carousel">
							<?php foreach ($logos as $logo_key => $logo): ?>
							  <div class="text-center" style="width:auto; height:0; padding-bottom: 56.25%; background-image: url(<?php echo $logo['image']['sizes']['logo']; ?>);"></div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			<?php endif; ?>

		</div>
	</div>
</section>

<script>
	(function ($) {
		$(document).ready(function(){
		  $(".logo-grid-owl-carousel").owlCarousel({
		    loop:true,
		    margin:10,
		    responsiveClass:true,
		    autoplay:true,
				slideTransition: 'linear',
		    autoplaySpeed: 6000,
		    smartSpeed: 6000,
		    touchDrag: true,
		    // center:true,
		    nav:false,
		    responsive:{
	        0:{
	            items:4,
							center:true,
	        },
	        768:{
	            items:4,
							center:true,
	        },
	        992:{
	            items:5
	        },
	        1200:{
	            items:5
	        }
	    	}
	   	});
		});
	})(jQuery);
</script>
