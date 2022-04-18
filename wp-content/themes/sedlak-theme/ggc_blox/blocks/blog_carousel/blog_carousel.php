<?php

if( !empty(get_sub_field('blog_carousel_headline')) ){
  $blog_carousel_headline = get_sub_field('blog_carousel_headline');
}else{
  $blog_carousel_headline = NULL;
}

if( !empty(get_sub_field('blog_carousel_cta_text')) ){
  $blog_carousel_button_text = get_sub_field('blog_carousel_cta_text');
}else{
  $blog_carousel_button_text = NULL;
}

if( !empty(get_sub_field('blog_carousel_cta_link')) ){
  $blog_carousel_button_link = get_sub_field('blog_carousel_cta_link');
}else{
  $blog_carousel_button_link = NULL;
}

$posts_query = get_posts(
  array(
    'numberposts' => 6,
    'orderby'     => 'date',
    'order'       => 'DESC',
    'fields'      => 'ids',
    'category_name' => 'news',
  )
);
$blogs = array();

foreach( $posts_query as $post_id ){
  $blog['title']     = get_the_title($post_id);
  $blog['image']     = get_the_post_thumbnail_url($post_id);
  $blog['date']      = get_the_date('F j\, Y',$post_id);
  $blog['excerpt']   = get_the_excerpt($post_id);
  $blog['permalink'] = get_the_permalink($post_id);
  array_push($blogs, $blog);
}



?>

<section class="blog-carousel py-5">
  <div class="container">
    <div class="row mx-0 my-4">

      <?php if( $blog_carousel_headline != NULL ): ?>
        <div class="col-12 text-center headline">
          <h2><?php echo $blog_carousel_headline; ?></h2>
        </div>
      <?php endif; ?>

      <?php if( $blog_carousel_button_text != NULL && $blog_carousel_button_link != NULL ): ?>
        <div class="col-12 text-center cta-button">
          <a href="<?php echo $blog_carousel_button_link['url']; ?>"><?php echo $blog_carousel_button_text; ?></a>
        </div>
      <?php endif; ?>

    </div>
    <div class="row">
      <div class="col-12">
        <div class="owl-carousel owl-theme">

            <?php foreach($blogs as $blog): ?>
              <div class="item">
                <div class="row">
                  <div class="col-12 carousel-blog-image">
                    <img src="<?php echo $blog['image']; ?>" />
                  </div>
                </div>
                <div class="row px-5 px-md-4 pt-4">
                  <div class="col-12 carousel-blog-title py-0">
                    <a href="<?php echo $blog['permalink'];?>">
                      <?php echo $blog['title']; ?>
                    </a>
                  </div>
                </div>
                <div class="row px-5 px-md-4 pb-4">
                  <div class="col-12 carousel-blog-date">
                    <span><?php echo $blog['date']; ?></span>
                  </div>
                </div>
                <div class="row px-5 px-md-4 pb-4">
                  <div class="col-12 carousel-blog-excerpt">
                    <?php echo $blog['excerpt']; ?>
                  </div>
                </div>
                <div class="row px-5 px-md-4 pb-4">
                  <div class="col-12 carousel-blog-cta pt-2">
                    <a href="<?php echo $blog['permalink'];?>">Read More</a>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>

        </div>
      </div>
    </div>
  </div>
</section>

<?php if(sizeof($blogs) > 0): ?>
	<script>
		(function ($) {
			$(document).ready(function(){
				if($(".owl-carousel").length){
					$(".owl-carousel").owlCarousel({
				    loop:true,
				    margin:20,
				    responsiveClass:true,
            startPosition: 0,
				    autoplay:false,
				    touchDrag: false,
				    slideTransition: 'linear',
				    center:false,
				    nav:true,
            dots: false,
				    responsive:{
			        0:{
			            items:1
			        },
			        768:{
			            items:2
			        },
			        992:{
			            items:3
			        },
              1024:{
			            items:4
			        },
			    	}
			   	});
				}
			});
		})(jQuery);
	</script>
<?php endif; ?>
