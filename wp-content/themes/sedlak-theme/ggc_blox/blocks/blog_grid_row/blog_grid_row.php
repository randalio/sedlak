<?php

if( !empty(get_sub_field('blog_grid_row_headline')) ){
  $blog_grid_row_headline = get_sub_field('blog_grid_row_headline');
}else{
  $blog_grid_row_headline = NULL;
}

if( !empty(get_sub_field('blog_grid_row_cta_text')) ){
  $blog_grid_row_button_text = get_sub_field('blog_grid_row_cta_text');
}else{
  $blog_grid_row_button_text = NULL;
}

if( !empty(get_sub_field('blog_grid_row_cta_link')) ){
  $blog_grid_row_button_link = get_sub_field('blog_grid_row_cta_link');
}else{
  $blog_grid_row_button_link = NULL;
}

$posts_query = get_posts(
  array(
    'numberposts' => 3,
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

<section class="blog-grid-row py-5">
    <div class="row mx-0 my-4">

      <?php if( $blog_grid_row_headline != NULL ): ?>
        <div class="col-12 text-center headline">
          <h2><?php echo $blog_grid_row_headline; ?></h2>
        </div>
      <?php endif; ?>

      <?php if( $blog_grid_row_button_text != NULL && $blog_grid_row_button_link != NULL ): ?>
        <div class="col-12 text-center cta-button">
          <a href="<?php echo $blog_grid_row_button_link['url']; ?>"><?php echo $blog_grid_row_button_text; ?></a>
        </div>
      <?php endif; ?>

    </div>
    <div class="row">
      <div class="col col-12">
        <div class="row">

            <?php foreach($blogs as $blog): ?>
              <div class="item col-12 col-md-4">
                <div class="row">
                  <div class="col-12 grid-blog-image">
                    <a href="<?php echo $blog['permalink'];?>" class="d-block">
                      <img src="<?php echo $blog['image']; ?>" />
                    </a>
                  </div>
                </div>
                <div class="row px-5 px-md-4 pt-4">
                  <div class="col-12 grid-blog-title py-0">
                    <a href="<?php echo $blog['permalink'];?>" class="d-block">
                      <h4><?php echo $blog['title']; ?></h4>
                    </a>
                  </div>
                </div>
                <div class="row px-5 px-md-4 pb-3">
                  <div class="col-12 grid-blog-excerpt">
                    <?php echo $blog['excerpt']; ?>
                  </div>
                </div>
                <div class="row px-5 px-md-4 pb-4">
                  <div class="col-12 grid-blog-cta pt-2">
                    <a href="<?php echo $blog['permalink'];?>">Read Blog Post</a>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>

        </div>
      </div>
    </div>
</section>
