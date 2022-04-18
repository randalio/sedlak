<?php

$blogs = get_posts(
  array(
    'numberposts' => -1,
    'orderby'     => 'date',
    'order'       => 'DESC',
    'fields'      => 'ids',
  )
);


$form_headline = get_field( 'subscribe_headline', 'option' );
$subscribe_form = get_field( 'subscribe_form', 'option' );

$categories_filter = array();
$blogroll = array();
foreach( $blogs as $blog_id){
    $this_blog = array();
    //$this_blog['image'] = get_the_post_thumbnail_url($blog_id);
    $attachment_image = wp_get_attachment_metadata(  get_post_thumbnail_id($blog_id) );
    $uploads_dir = wp_get_upload_dir();
    if( $attachment_image != ''){
      $this_blog['image'] = $uploads_dir['baseurl'].'/'.$attachment_image['file'];
      $this_blog['image_width'] = $attachment_image['width'];
      $this_blog['image_height'] = $attachment_image['height'];
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
// $categories_filter = array_map("unserialize", array_unique(array_map("serialize", $categories_filter)));
// asort($categories_filter);

$categories = get_categories(
    array(
    'hide_empty' => true,
    'orderby' => 'count',
    'order' => 'DESC',
    )
  );

?>

<section class="blog-grid blog-grid-category-filter">

  <div class="container">
    <div class="row pt-5 pb-4 filters">
      <div class="col mt-1 mb-4 text-center filter-button-group">
        <span class="view-by-topic d-inline-block">View by Topic</span>

        <div class="select_filter_wrap d-inline-block">


          <button data-filter=".all" id="all_filter" data-slug="all">All Topics (<?php echo count($blogroll); ?>)</button>
          <?php foreach($categories as $i => $category):?>
            <?php /*<option value=".<?php echo $category['slug'];?>" data-slug="<?php echo $category['slug'];?>"><?php echo $category['name'];?></option>*/ ?>
            <?php if( $i < 3 ): ?>
              <button class="<?php echo $category->slug; ?>-button" data-filter=".<?php echo $category->slug; ?>"><?php echo $category->name; ?> (<?php echo $category->count; ?>)</button>
            <?php endif; ?>
          <?php endforeach;?>

            <div class="d-inline-block ml-4">
              <div class="dropdown mt-4">
                <div class="dropdown-toggle pl-3" data-display="static" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  More Topics <span class="ml-3"><i class="fas fa-caret-down p-3"></i></span>
                </div>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                  <?php foreach( $categories as $i=> $topic ): ?>
                    <?php if( $i >= 3): ?>
                      <button class="<?php echo $topic->slug; ?>-button d-inline-block w-100 text-left px-3" data-filter=".<?php echo $topic->slug; ?>"><strong><?php echo $topic->name; ?></strong> (<?php echo $topic->count; ?>)</a>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>

        </div>
      </div>
    </div>


<div class="row">
<div class="col-md-9">

    <div class="row blog-roll">
      <?php foreach( $blogroll as $blog ): ?>
        <div class="col-12 px-0 blog-tile-wrap transition all <?php foreach( $blog['categories'] as $category ):?> <?php echo $category->slug.' '; ?><?php endforeach; ?>" data-category="transition">
          <div class="row blog-tile mx-4 mb-5">
            <div class="col px-0">
              <div class="row p-3">

              <?php if( $blog['image'] != '' ): ?>
                <div class="col-md-6">
                  <a href="<?php echo $blog['permalink'];?>">
                    <img src="<?php echo $blog['image']; ?>" width="<?php echo $blog['image_width']; ?>" height="<?php echo $blog['image_height']; ?>" class="w-100 img-fluid mb-4 d-block"/>
                  </a>
                </div>
              <?php endif; ?>


                <div class="col">
                  <a href="<?php echo $blog['permalink'];?>"><h5><?php echo $blog['title']; ?></h5></a>
                    <p><?php echo $blog['excerpt']; ?></p>
                    <a href="<?php echo $blog['permalink']; ?>" class="btn-link">Continue Reading</a>
                  </a>
                </div>
              </div>

            </div>
          </div>

        </div>
      <?php endforeach; ?>
    </div>

</div>
<div class="col-md-3">
            <div class="row subscription-form mb-5 pb-4">
              <div class="col-12 px-4 pt-4">
                <h4><?php echo $form_headline?></h4>
                <?php gravity_form( $subscribe_form , false ); ?>
              </div>
            </div>
</div>
</div>




    <div class="row">
    	<div class="col col-md-9 my-5">
    		<button class="btn btn-lg btn-block" id="showMore"><?php if(isset($blog_list_load_more_btn)): ?><?php echo $blog_list_load_more_btn; ?><?php else: ?>Load More<?php endif; ?></button>
    	</div>
    </div>

  </div>
</section>
