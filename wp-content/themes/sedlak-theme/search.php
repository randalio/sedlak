<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Shape
 * @since Shape 1.0
 */

get_header(); ?>
<?php
$default_image = get_field('default_resource_image', 'option');
$items = array();
?>
<?php if ( have_posts() ) : ?>
  <?php while ( have_posts() ) : the_post(); ?>
    <?php
    $item = array();
    $item['ID'] = get_the_ID();
    $item['title'] = get_the_title();
    $item['post_type'] = get_post_type();
    $item['image'] = '/wp-content/uploads/2021/11/gettyimages-1209030907-170667a.png';

    $fields = get_fields(get_the_ID());
    $marquee_image = $fields['row_type_'.get_post_type()][0]['content_blocks_one_col_row_service'][0]['image']['sizes']['medium'];
    $summary_text  = $fields['row_type_'.get_post_type()][0]['content_blocks_one_col_row_service'][0]['content']['text'];

    if( get_post_type() == 'page' || get_post_type() == 'service' || get_post_type() == 'industry' ){
      if( !empty( $marquee_image ) ){
        $item['image'] = $marquee_image;
      }

      $item['summary'] = $summary_text;
      $item['button_text'] = 'Read More';
    }
    if( get_post_type() == 'post' ){
      $featured_image = get_the_post_thumbnail_url( get_the_ID() );
      if( !empty( $marquee_image ) ){
        $item['image'] = $featured_image;
      }
      $item['summary'] = get_the_excerpt(get_the_ID());
      $item['button_text'] = 'Read Blog';
    }

    if( get_post_type() == 'white-paper' || get_post_type() == 'case-study' ){
      $cover = get_field('cover', get_the_ID());
      $summary = get_field('summary', get_the_ID());
      //$item['image'] = $cover['sizes']['medium'];
      if( !empty( $cover ) ){
        $item['image'] = $cover['sizes']['medium'];
      }
      $item['summary'] = $summary;
      $item['button_text'] = 'Read White Paper';
    }

    if( get_post_type() == 'case-study' ){
      $item['button_text'] = 'Read Success Story';
    }

    $item['link'] = get_the_permalink(get_the_ID());
      array_push($items, $item);
    ?>
  <?php endwhile; ?>
<?php endif; ?>




<main id="main" class="m-scene">
	<div id="page_content_container" class="scene-main scene-main--fadein main-inner-wrap">


    <div class="container search-results search_results">


      <div class="row py-5">
        <div class="col-12 col-lg-8 offset-lg-2 searchbox">
          <div class="search_terms">
            <form action="/" method="get">
              <!-- <div class="search-wrap"> -->
                <span class="search-label">Search for: &nbsp;</span><input type="text" name="s" id="searchPageInput" placeholder="search..." value="<?php echo get_search_query();?>" class=""/>
                <button type="submit" id="searchPageSubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" class="pull-right"/><i class="fas fa-search"></i></button>
              <!-- </div> -->
            </form>
          </div>
        </div>
      </div>





      <div class="row search-results-grid">

        <?php foreach( $items as $tile ): ?>
          <div class="col col-md-4 mb-4 tile <?php echo $tile['post_type']; ?>">

                <div class="row px-2">
                  <div class="col tile-border">

                    <div class="row content-type text-center py-1">
                      <div class="col">
                        <span class="d-block"><?php echo $tile['tile_label']; ?></span>
                      </div>
                    </div>

                    <div class="row image px-0">
                      <a href="<?php echo $tile['link']; ?>" class="">
                        <div class="col px-0">
                          <img src="<?php echo $tile['image']; ?>" class="img-fluid" width="480" height="320"/>
                        </div>
                      </a>
                    </div>

                    <div class="row title pt-4 px-4">
                      <div class="col">
                        <h3><?php echo $tile['title']; ?></h3>
                      </div>
                    </div>

                    <div class="row summary pb-3 px-4">
                      <div class="col">
                        <p><?php echo $tile['summary']; ?></p>
                      </div>
                    </div>

                    <div class="row link pb-5 px-4">
                      <div class="col">
                        <a href="<?php echo $tile['link']; ?>" class="" target="<?php echo $tile['target'];?>"><?php echo $tile['button_text']; ?></a>
                      </div>
                    </div>

                  </div>
                </div>
          </div>
        <?php endforeach; ?>

      </div>






    </div>

  </div>
</main>





<?php get_footer(); ?>
