<?php
$default_cover = get_field('default_resource_image', 'option');

$args = array(
  'numberposts' => -1,
  'post_type' => array('case-study','white-paper','video'),
  'orderby' => 'DATE',
  'order' => 'DESC',
);
$resources_results = get_posts($args);

$resources_grid = array();

$services_filters = array();
$industry_filters = array();
$type_filters = array();

foreach( $resources_results as $i => $result ):
  $array = array();

  $service_filter = array();
  $industry_filter = array();
  $type_filter = array();

  $array['link'] = get_the_permalink($result->ID);
  $array['target'] = '_self';


  $array['title'] = $result->post_title;
  $array['post_type'] = $result->post_type;

  // Add Post Type to Type Filter
  $type_filter['post_type'] = $result->post_type;


  if( $result->post_type == 'video' ){
    $array['button_text'] = 'Watch Video';
    $type_filter['post_type_label'] = 'Videos';
  }
  if( $result->post_type == 'white-paper' ){
    $array['button_text'] = 'Download Now';
    $type_filter['post_type_label'] = 'White Papers';
  }
  if( $result->post_type == 'case-study' ){
    $array['button_text'] = 'Continue Reading';
    $type_filter['post_type_label'] = 'Success Stories';
  }


  $cover = get_field('cover', $result->ID);
  if( is_array($cover) ){
    $array['cover'] = $cover['sizes']['cover-small'];
    $array['cover_width'] = $cover['sizes']['cover-small-width'];
    $array['cover_height'] = $cover['sizes']['cover-small-height'];
  }else{
    //print_r( $default_cover );
    $array['cover'] = $default_cover['sizes']['cover-small'];
    $array['cover_width'] = $default_cover['sizes']['cover-small-width'];
    $array['cover_height'] = $default_cover['sizes']['cover-small-height'];
  }
  $array['summary'] = get_field('summary', $result->ID);

  $related_service = get_field('related_service', $result->ID);
  //print_r($related_service);
  $services = array();

  if( is_array( $related_service ) ){
    foreach($related_service as $serv){
      $service = array();
      $service['name'] = $serv->post_title;
      $service['slug'] = $serv->post_name;
      array_push( $services, $service );
      array_push( $services_filters, $service );
    }
  }



  $array['service'] = $services;

  $related_industry = get_field('related_industry', $result->ID);
  $industries = array();


  if( is_array( $related_industry ) ){
    foreach($related_industry as $ind){
      $industry = array();
      $industry['name'] = $ind->post_title;
      $industry['slug'] = $ind->post_name;
      array_push( $industries, $industry );
      array_push( $industry_filters, $industry );
    }
  }

  $array['industry'] = $industries;

  array_push( $resources_grid, $array );
  array_push( $services_filters, $service_filter );
  array_push( $industry_filters, $industry_filter );
  array_push( $type_filters, $type_filter );


endforeach;
$services_filters = array_map("unserialize", array_unique(array_map("serialize", $services_filters)));
$industry_filters = array_map("unserialize", array_unique(array_map("serialize", $industry_filters)));
$type_filters = array_map("unserialize", array_unique(array_map("serialize", $type_filters)));
?>

<pre>
  <?php //print_r( $resources_grid ); ?>
</pre>
<section class="resource-filter-grid row pad-top-0 pad-bot-1">
  <div class="col">

      <div class="row controls my-5">
        <div class="col filter-group">

          <div class="row">
            <div class="col-md-3">
              <label for="type_filter" class="type_control d-block">Resource Type:
                <select name="type" id="type_filter" class="filter-select" value-group="type">
                  <option value="*">All</option>
                  <?php foreach($type_filters as $category):?>
                    <?php if( $category['post_type'] != '' ): ?>
                      <option value=".<?php echo $category['post_type'];?>" data-slug="<?php echo $category['post_type'];?>"><?php echo $category['post_type_label'];?></option>
                    <?php endif; ?>
                  <?php endforeach;?>
                </select>
                <button id="for_type"><i class="fas fa-play fa-rotate-90"></i></button>

              </label>
            </div>

            <div class="col-md-3">
              <label for="process_filter" class="type_control d-block">Services:
                <select name="process" id="process_filter" class="filter-select" value-group="process">
                  <option value="*">All</option>
                  <?php foreach($services_filters as $service):?>
                    <?php if( $service['slug'] != '' ): ?>
                      <option value=".<?php echo $service['slug'];?>" data-slug="<?php echo $service['slug'];?>"><?php echo $service['name'];?></option>
                    <?php endif; ?>
                  <?php endforeach;?>
                </select>
                <button id="for_process"><i class="fas fa-play fa-rotate-90"></i></button>

              </label>
            </div>

            <div class="col-md-3">
              <label for="industry_filter" class="type_control d-block">Industry:
                <select name="industry" id="industry_filter" class="filter-select" value-group="industry">
                  <option value="*">All</option>
                  <?php foreach($industry_filters as $category):?>
                    <?php if( $category['slug'] != '' ): ?>
                      <option value=".<?php echo $category['slug'];?>" data-slug="<?php echo $category['slug'];?>"><?php echo $category['name'];?></option>
                    <?php endif; ?>
                  <?php endforeach;?>
                </select>
                <button id="for_industry"><i class="fas fa-play fa-rotate-90"></i></button>

              </label>
            </div>



          </div>




        </div>
      </div>


    <div class="row resource-gallery">
      <?php foreach( $resources_grid as $tile ): ?>

        <div class="col col-md-4 mb-4 resource-tile <?php echo $tile['post_type']; ?> <?php foreach( $tile['service'] as $serv_class): ?><?php echo $serv_class['slug'].' '; ?><?php endforeach; ?><?php foreach( $tile['industry'] as $ind_class): ?><?php echo $ind_class['slug'].' '; ?><?php endforeach; ?>">
              <div class="row px-2">
                <div class="col tile-border">

                  <div class="row image px-0">
                    <a href="<?php echo $tile['link']; ?>" class="d-inline-block" target="<?php echo $tile['target'];?>">
                      <div class="col px-0">
                        <img src="<?php echo $tile['cover']; ?>" class="img-fluid" width="<?php echo $tile['cover_width']; ?>" height="<?php echo $tile['cover_height']; ?>"/>
                      </div>
                    </a>
                  </div>

                  <div class="row title pt-3 px-4">
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
</section>
