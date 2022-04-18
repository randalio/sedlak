<?php
$blog_headline = get_sub_field('headline');
$layout_style = get_sub_field('layout_style');

$cat_id = get_sub_field('category_id');

$pad_top = get_sub_field('pad_top');
$pad_bot = get_sub_field('pad_bot');

$args = array(
  'numberposts' => 3,
  'post_type' => 'post',
  'orderby' => 'DATE',
  'order' => 'DESC',
);

if( !empty( $cat_id ) ){
  $args['cat'] = $cat_id;
}

$blog_query = get_posts( $args );

$blog_list = array();
foreach( $blog_query as $blog ){
  $blog_list_item['title'] = $blog->post_title;
  $blog_list_item['excerpt'] = get_the_excerpt($blog->ID);
  $blog_list_item['url'] = get_the_permalink($blog->ID);
  array_push($blog_list, $blog_list_item);
}

?>
<section class="row blog-<?php echo $layout_style; ?> pad-top-<?php echo $pad_top; ?> pad-bot-<?php echo $pad_bot; ?>">
  <div class="col">
    <div class="container">

    <?php if( $blog_headline != '' ): ?>
      <div class="row pb-4">
        <div class="col">
            <h2><?php echo $blog_headline; ?></h2>
        </div>
      </div>
    <?php endif; ?>

      <div class="row">
        <?php foreach( $blog_list as $blog ): ?>
          <div class="col-12 <?php if($layout_style == 'grid' ): ?>col-lg-4<?php endif; ?> mb-5">

            <div class="row title">
              <div class="col">
                <h5><a href="<?php echo $blog['url']; ?>"><?php echo $blog['title']; ?></a></h5>
              </div>
            </div>
            <div class="row excerpt">
              <div class="col">
                <p><?php echo $blog['excerpt']; ?></p>
              </div>
            </div>
            <div class="row read-more">
              <div class="col">
                <a href="<?php echo $blog['url']; ?>">Continue Reading</a>
              </div>
            </div>

          </div>
        <?php endforeach; ?>
      </div>

    </div>
  </div>
</section>
