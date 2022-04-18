<?php



if( is_array( get_sub_field('logo_grid_repeater') ) ){
  $logos = get_sub_field('logo_grid_repeater');
}else{
  $logos = NULL;
}

$client_groups = get_sub_field('client_logo_grid_groups');


$client_array = array();
$client_modals = array();
foreach( $client_groups as $i => $group ){
  $client_array[$i]['group_title'] = $group['group_headline'];
  $clients = $group['clients'];
  foreach( $clients as $client_id ){
    $client_array[$i]['clients'][$client_id]['client_id'] = $client_id;
    $client_array[$i]['clients'][$client_id]['name'] = get_the_title($client_id);
    $client_array[$i]['clients'][$client_id]['content'] = get_the_content($client_id);
    // $client_array[$i]['clients'][$client_id]['categories'] = get_the_terms($client_id, 'client_category');
    $logo = '';
    $logo = get_field('logo', $client_id);
    $client_array[$i]['clients'][$client_id]['logo'] = $logo['sizes']['cover-small'];
    $client_modals[$client_id]['title'] = get_the_title($client_id);
    $client_modals[$client_id]['logo'] = $logo['sizes']['cover-small'];
    $client_modals[$client_id]['content'] = get_post($client_id);
  }
}

$logos_pad_top = get_sub_field('padding_top');
$logos_pad_bot = get_sub_field('padding_top');
//
// echo '<pre>';
// print_r($client_array);
// echo '</pre>';


?>
<section class="logo-grid pad-top-<?php echo $logos_pad_top;?> pad-bot-<?php echo $logos_pad_bot;?>">
  <div class="row">
    <div class="col">

      <?php foreach( $client_array as $client_item ): ?>
        <div class="row group-title mb-4">
          <div class="col">
            <h4><?php echo $client_item['group_title']; ?></h4>
          </div>
        </div>

        <div class="row logo-w-lightbox mb-5">
          <?php foreach( $client_item['clients'] as $logo_tile  ): ?>
            <?php if( $logo_tile['logo'] != '' ): ?>
                <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-5 client">

                  <div class="row tile mx-1">
                    <div class="col">

                      <div class="row client-logo py-2">
                        <div class="col">
                          <a href="#" class="d-block text-center" role="button" data-toggle="modal" data-target="#modal_<?php echo $logo_tile['client_id']; ?>">
                            <img src="<?php echo $logo_tile['logo'];?>" class="img-fluid" />
                          </a>
                        </div>
                      </div>
                      <div class="row client-info py-3">
                        <div class="col">
                            <h6><?php echo $logo_tile['name']; ?></h6>
                            <a href="#" class="d-inline-block" role="button" data-toggle="modal" data-target="#modal_<?php echo $logo_tile['client_id']; ?>">Details</a>
                        </div>
                      </div>

                    </div>
                  </div>

                </div>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>

    </div>
  </div>

<?php foreach( $client_modals as $client_id => $modal ): ?>
  <!-- Modal -->
  <div class="modal fade" id="modal_<?php echo $client_id;?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $client_id ;?>Title" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body mb-4 p-5">
          <img src="<?php echo $modal['logo'];?>" class="img-fluid d-block mx-auto"/>
          <hr />
          <?php echo $modal['content']->post_content; ?>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>

</section>
