<?php

$success_headline = get_sub_field('headline');
$pad_top = get_sub_field('pad_top');
$pad_bot = get_sub_field('pad_bot');
$relationship = get_sub_field('case_study_relationship');


$relationship_object = get_post($relationship);


$args = array(
  'numberposts' => 100,
  'post_type' => 'case-study',
  'orderby' => 'DATE',
  'order' => 'DESC',
  'fields' => 'ids'
);


$case_study_ids = get_posts( $args );

$case_studies = array();
foreach( $case_study_ids as $case_id ){
    $case_study = array();
    $case_study['url'] = get_the_permalink($case_id);
    $case_study['title'] = get_the_title($case_id);
    $case_study['summary'] = get_field('summary', $case_id);
    $image = get_field('cover', $case_id);
    $case_study['image'] = $image['sizes']['case-study-cover'];

    $industry = get_field('related_industry', $case_id );
    $service = get_field('related_service', $case_id );

    if( is_array( $industry ) ){
      foreach( $industry as $ind ){
        if( $ind->ID == $relationship ){
          array_push($case_studies, $case_study);
        }
      }
    }

    if( is_array( $service ) ){
      foreach( $service as $serv ){
        if( $serv->ID == $relationship ){
          array_push($case_studies, $case_study);
        }
      }
    }

}
?>
<section class="row case-study-carousel pad-top-<?php echo $pad_top; ?> pad-bot-<?php echo $pad_bot; ?>">
  <div class="col">

    <?php if( $success_headline != '' ): ?>
      <div class="row pb-4">
        <div class="col">
            <h2 class="pl-1"><?php echo $success_headline; ?></h2>
        </div>
      </div>
    <?php endif; ?>

    <?php if(sizeof($case_studies) > 0): ?>
      <div class="row pt-2">
        <div class="col-12">
          <div class="owl-carousel case-study-owl-carousel">
            <?php foreach ($case_studies as $cs_key => $casestudy): ?>
                <div class="tile-wrap m-1">
                  <div class="row">
                    <div class="col">
                      <?php print_r($casestudy['service']); ?>
                      <a title="<?php echo $casestudy['title'];?>" href="<?php echo $casestudy['url']; ?>" target="self" class="d-block case-study-logo-image">
                        <img alt="<?php echo $casestudy['title']; ?>" src="<?php echo $casestudy['image']; ?>" width="480" height="220" class="img-fluid my-auto d-block">
                      </a>
                    </div>
                  </div>
                  <div class="row px-4 py-5 tile-content">
                    <div class="col">
                      <h5><?php echo $casestudy['title'];?></h5>
                      <p><?php echo $casestudy['summary'];?></p>
                      <a title="Continue Reading" href="<?php echo $casestudy['url']; ?>">Continue Reading</a>
                    </div>
                  </div>

                </div>

            <?php endforeach; ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>

</section>
<script>
	(function ($) {
		$(document).ready(function(){
		  $(".case-study-owl-carousel").owlCarousel({
		    loop:true,
		    margin:15,
		    responsiveClass:true,
		    autoplay:false,
		    touchDrag: true,
		    slideTransition: 'linear',
		    //nav:false,
        dots: true,
		    responsive:{
	        0:{
	            items:1,
	        },
          991 : {
              items:2,
          }
	    	}
	   	});
		});


	})(jQuery);
</script>
