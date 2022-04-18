<?php

$blogs = get_posts(
  array(
    'numberposts' => -1,
    'orderby'     => 'date',
    'order'       => 'DESC',
    'fields'      => 'ids',
  )
);

$categories_filter = array();
$blogroll = array();
foreach( $blogs as $blog_id){
    $this_blog = array();
    //$this_blog['image'] = get_the_post_thumbnail_url($blog_id);
    //$attachment_image = wp_get_attachment_metadata(  get_post_thumbnail_id($blog_id) );

    $attachment_image = get_the_post_thumbnail_url($blog_id, 'video-cover');
    if( $attachment_image != ''){
      $this_blog['image'] = $attachment_image;
      $this_blog['image_width'] = 640;
      $this_blog['image_height'] = 320;
    }


  $this_blog['title'] = get_the_title($blog_id);
    $this_blog['excerpt'] = get_the_excerpt($blog_id);
    $this_blog['permalink'] = get_permalink($blog_id);
    $categories = wp_get_post_categories($blog_id);
    $cats = array();
    foreach( $categories as $cat_id ){
      $this_category = array();
      $this_category = get_category($cat_id);
      $filter = array();
      $filter['name'] = $this_category->name;
      $filter['slug'] = $this_category->slug;
      $filter['count'] = $this_category->category_count;
      array_push($categories_filter, $filter);
      array_push( $cats, get_category($cat_id) );
    }
    $this_blog['categories'] = $cats;
    array_push($blogroll, $this_blog);
}
//REMOVE DUPLICATES
$categories_filter = array_map("unserialize", array_unique(array_map("serialize", $categories_filter)));
asort($categories_filter);

?>

<section class="blog-list blog-grid-category-filter">

  <div class="container">
    <div class="row pt-5 pb-4 filters">
      <div class="col mt-1 mb-4 text-center filter-button-group">
        <div class="row">
  				<div class="col mt-5 mb-2 text-center filter-title">
          <span class="view-by-topic">View by Topic</span>
  				</div>
			  </div>
        <div class="row">
				<div class="col">
					<hr>
				</div>
			</div>
        <div class="select_filter_wrap d-inline-block">
          <?php
            $args = array(
               "type"      => "post",
               "orderby"   => "name",
               "order"     => "ASC"
            );
           $topics = get_categories($args);

           ?>

           <h4 class="mb-3">View by Topic</h4>
           <ul>
             <?php foreach( $topics as $i=> $topic ): ?>
               <?php if( $i <= 5): ?>
               <li><a href="<?php echo $blog_page_url.'?topic=.'.$topic->slug ?>"><strong><?php echo $topic->name; ?></strong> (<?php echo $topic->category_count; ?>)</a></li>
               <?php endif; ?>
             <?php endforeach; ?>
           </ul>

           <div class="dropdown mt-4">
             <button class="btn dropdown-toggle px-4" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               All Topics <span class="ml-5"><i class="fas fa-caret-down"></i></span>
             </button>
             <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
               <?php foreach( $topics as $i=> $topic ): ?>
                 <?php if( $i > 5): ?>
                   <a href="<?php echo $blog_page_url.'?topic=.'.$topic->slug ?>" class="d-block dropdown-item"><strong><?php echo $topic->name; ?></strong> (<?php echo $topic->category_count; ?>)</a>
                 <?php endif; ?>
               <?php endforeach; ?>
             </div>
           </div>

        </div>
      </div>
    </div>

    <div class="row blog-roll">
      <?php foreach( $blogroll as $blog ): ?>
        <div class="col-12 px-0 blog-tile-wrap transition all <?php foreach( $blog['categories'] as $category ):?> <?php echo $category->slug.' '; ?><?php endforeach; ?>" data-category="transition">
          <div class="row blog-tile p-3 mx-4 mb-5">
            <div class="col px-0">


              <?php if( $blog['image'] != '' ): ?>
                <div class="row">
                <div class="col-12 col-lg-6">
              <?php endif; ?>

              <div class="row">
                <div class="col">
                  <a href="<?php echo $blog['permalink'];?>">

                    <img src="<?php echo $blog['image']; ?>" width="<?php echo $blog['image_width']; ?>" height="<?php echo $blog['image_height']; ?>" class="w-100 img-fluid mb-4"/>
                  </a>
                </div>
              </div>

              <?php if( $blog['image'] != '' ): ?>
                </div>
              <?php endif; ?>

              <?php if( $blog['image'] != '' ): ?>
                      <div class="col-12 col-lg-6">
              <?php endif; ?>
              <div class="row blog-title px-4">
                <div class="col">
                  <a href="<?php echo $blog['permalink'];?>">
                    <h5><?php echo $blog['title']; ?></h5>
                  </a>
                </div>
              </div>


              <div class="row blog-excerpt px-4">
                <div class="col">
                  <p><?php echo $blog['excerpt']; ?></p>
                </div>
              </div>


              <div class="row blog-readmore px-4 pb-4">
                <div class="col">
                  <a href="<?php echo $blog['permalink']; ?>" class="btn-link">Read Blog</a>
                </div>
              </div>

              <?php if( $blog['image'] != '' ): ?>
                  </div>
                </div>
              <?php endif; ?>



            </div>
          </div>

        </div>
      <?php endforeach; ?>
    </div>

    			<div class="row">
    				<div class="col my-5">
    					<button class="btn btn-lg btn-block" id="showMore"><?php if(isset($blog_list_load_more_btn)): ?><?php echo $blog_list_load_more_btn; ?><?php else: ?>Load More<?php endif; ?></button>
    				</div>
    			</div>

  </div>
</section>
