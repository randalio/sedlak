<?php
global $post;
$page_id = $post->ID;
$page_title = get_the_title($page_id);

$blog_page = get_field('blog_page', 'option');
$blog_page_url = get_the_permalink($blog_page );

$form_headline = get_field( 'subscribe_headline', 'option' );
$subscribe_form = get_field( 'subscribe_form', 'option' );

$blog_author = get_field('blog_author');


$blogs = get_posts(
  array(
    'numberposts' => 4,
    'orderby'     => 'date',
    'order'       => 'DESC',
    'fields'      => 'ids',
  )
);
//print_r($blogs);
$categories_filter = array();
$blogroll = array();
foreach( $blogs as $blog_id){
    $this_blog = array();
    $this_blog['image'] = get_the_post_thumbnail_url($blog_id, 'video-cover');
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

<?php get_header(); ?>

<main id="main" class="m-scene">

  <section class="page-title">
    <div class="container-fluid page-title">
        <div class="row">
          <div class="col">
            <div class="container">
              <div class="row px-md-0">
                <div class="col">
                  <h1 class="m-0"><?php echo get_the_title($blog_page);?></h1>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </section>

  <section class="breadcrumbs row pb-5 mx-auto">
    <div class="col">
        <div class="container pl-0">
            <div class="row py-2">
                <div class="col-12">
                  <span>
                    <a href="/">Home</a>
                  </span>
                <?php if( !empty( $blog_page_url ) ): ?>
                  <span>
                    <a href="<?php echo $blog_page_url; ?>">Blog</a>
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

  <div class="container blog-single">
  	<div class="row blog">
  		<div class="col-12 col-lg-9 blog-content px-auto pl-md-0 pr-md-5">

  			<div class="row pr-4">
  				<div class="col">
  					<h1 class="mb-0"><?php the_title(); ?></h1>
            <span class="date d-block"><?php echo get_the_date(); ?></span>

  					<?php $topics = get_the_category(); ?>
  					<span class="topics">
              <?php if( !empty($blog_author) ): ?> By: <a href="<?php echo get_the_permalink($blog_author ); ?>"><?php echo get_the_title( $blog_author ); ?></a><?php endif; ?>
              <?php if( !empty($blog_author) && is_array( $topics )  ): ?><span class="d-inline-block px-2">|</span><?php endif; ?>
              <?php if( is_array( $topics ) ): ?>
                Topics:
    						<?php foreach( $topics as $i => $topic ): ?>
    							<a href="<?php echo $blog_page_url;?>?topic=.<?php echo $topic->slug; ?>"><?php echo $topic->name; ?></a><?php if( $i < sizeof($topics) - 1 ):?>, <?php endif; ?>
    						<?php endforeach; ?>
              <?php endif; ?>
  					</span>
  					<img src="<?php echo get_the_post_thumbnail_url($page_id, 'large'); ?>" class="w-100 img-fluid mt-3 mb-4"/>

  					<div class="share mb-4 py-3">
  						Share:
              <a href="mailto:?&subject=Check<?php echo 'Check out this blog from JA Sedlak: '.get_the_title(); ?>&body=<?php echo get_permalink(); ?>" target="_blank"><i class="far fa-envelope"></i></a>
              <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink(); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
              <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
              <a href="https://twitter.com/home?status=<?php echo get_permalink(); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
            </div>

  					<?php the_content(); ?>
  				</div>
  			</div>

  		</div>

  		<div class="col-12 col-lg-3">

  			<div class="row h-100 d-flex flex-column">
  				<div class="col d-flex h-100 flex-column">

  					<div class="row subscription-form mb-5 pb-4">
  						<div class="col-12 px-4 pt-4">
  							 <!-- HS FORM -->
  							 <h4><?php echo $form_headline?></h4>
  							 <?php gravity_form( $subscribe_form , false ); ?>
  						</div>
  					</div>

  					<div class="row blog-topics d-flex flex-column flex-grow-1 mb-5 pb-5">
  						<div class="col-12">
  							 <!-- BLOG TOPICS -->
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

                  <div class="dropdown mt-4 d-inline-block">
                    <div class="dropdown-toggle pl-4" data-display="static" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      All Topics <span class="ml-4"><i class="fas fa-caret-down p-3"></i></span>
                    </div>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                      <?php foreach( $topics as $i=> $topic ): ?>
                        <?php if( $i >= 3): ?>
                          <a href="<?php echo $blog_page_url.'?topic=.'.$topic->slug ?>" class="-button d-inline-block w-100 text-right px-3"><strong><?php echo $topic->name; ?></strong> (<?php echo $topic->count; ?>)</a>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </div>
                  </div>

                  <h4 class="mb-3" style="margin-top: 30px;">Recent Posts</h4>
                    <ul>
                    <?php $the_query = new WP_Query( 'posts_per_page=5' ); ?>
                    <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
                    <li><a href="<?php the_permalink() ?>"><strong><?php the_title(); ?></strong></a></li>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                    </ul>

  						</div>
  					</div>
  				</div>
  			</div>
  		</div>

  	</div>

  	<div class="row recent-posts blog-grid mt-5 px-md-0 ">
  		<div class="col px-md-0">

  			<div class="row my-4 pt-3">
  				<div class="col">
  					<h6 class="d-inline-block">Recent Posts</h6> <a href="<?php echo $blog_page_url; ?>">View All</a>
  				</div>
  			</div>


  			<div class="row blog-list px-auto">
  				<?php foreach( $blogroll as $blog ): ?>
  	        <div class="col-12 col-xl-9 blog-tile-wrap transition all <?php foreach( $blog['categories'] as $category ):?> <?php echo $category->slug.' '; ?><?php endforeach; ?>" data-category="transition">
  	          <div class="row blog-tile mx-auto mb-5">
  	            <div class="col px-md-0">


                  <?php if( $blog['image'] != '' ): ?>
                    <div class="row">
                    <div class="col-12 col-lg-6">
                  <?php endif; ?>

                      <div class="row">
                        <div class="col">
                          <a href="<?php echo $blog['permalink'];?>">
                            <img src="<?php echo $blog['image']; ?>" class="w-100 img-fluid mb-4 pr-4"/>
                          </a>
                        </div>
                      </div>

                  <?php if( $blog['image'] != '' ): ?>
                    </div>
                  <?php endif; ?>


                <?php if( $blog['image'] != '' ): ?>
                        <div class="col-12 col-lg-6">
                <?php endif; ?>

  	              <div class="row blog-title">
  	                <div class="col">
  	                  <a href="<?php echo $blog['permalink'];?>">
  	                    <h5><?php echo $blog['title']; ?></h5>
  	                  </a>
  	                </div>
  	              </div>
  	              <div class="row blog-excerpt">
  	                <div class="col">
  	                  <p><?php echo $blog['excerpt']; ?></p>
  	                </div>
  	              </div>
  	              <div class="row blog-readmore pb-4">
  	                <div class="col mb-5">
  	                  <a href="<?php echo $blog['permalink']; ?>" class="btn-link">Continue Reading</a>
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

  		</div>
  	</div>
  </div>

</main>

<?php get_footer(); ?>
