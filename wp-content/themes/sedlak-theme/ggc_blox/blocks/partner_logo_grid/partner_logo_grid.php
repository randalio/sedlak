<?php



if( is_array( get_sub_field('logo_grid_repeater') ) ){
  $logos = get_sub_field('logo_grid_repeater');
}else{
  $logos = NULL;
}

$partner_groups = get_sub_field('partner_logo_grid_groups');


$partner_array = array();
$partner_modals = array();
foreach( $partner_groups as $i => $group ){
  $partner_array[$i]['group_title'] = $group['group_headline'];
  $partners = $group['partners'];
  foreach( $partners as $partner_id ){
    $partner_array[$i]['partners'][$partner_id]['partner_id'] = $partner_id;
    $partner_array[$i]['partners'][$partner_id]['name'] = get_the_title($partner_id);
    $partner_array[$i]['partners'][$partner_id]['content'] = get_the_content($partner_id);
    $partner_array[$i]['partners'][$partner_id]['categories'] = get_the_terms($partner_id, 'partner_category');
    $logo = '';
    $logo = get_field('logo', $partner_id);
    $partner_array[$i]['partners'][$partner_id]['logo'] = $logo['sizes']['logo'];
    $partner_modals[$partner_id]['title'] = get_the_title($partner_id);
    $partner_modals[$partner_id]['logo'] = $logo['sizes']['medium'];
    $partner_modals[$partner_id]['content'] = get_post($partner_id);
  }
}

$logos_pad_top = get_sub_field('padding_top');
$logos_pad_bot = get_sub_field('padding_top');
//
// echo '<pre>';
// print_r($partner_array);
// echo '</pre>';


?>
<section class="logo-grid pad-top-<?php echo $logos_pad_top;?> pad-bot-<?php echo $logos_pad_bot;?>">
  <div class="row">
    <div class="col">

      <?php foreach( $partner_array as $partner_item ): ?>
        <div class="row group-title mb-4">
          <div class="col">
            <h4><?php echo $partner_item['group_title']; ?></h4>
          </div>
        </div>

        <div class="row logo-w-lightbox mb-5">
          <?php foreach( $partner_item['partners'] as $logo_tile  ): ?>
            <?php if( $logo_tile['logo'] != '' ): ?>
                <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-5 partner">

                  <div class="row tile mx-1">
                    <div class="col">

                      <div class="row partner-logo py-2 justify-content-center align-items-center">
                        <div class="col">
                          <a href="#" class="d-block text-center logo-image" role="button" data-toggle="modal" data-target="#modal_<?php echo $logo_tile['partner_id']; ?>">
                            <img src="<?php echo $logo_tile['logo'];?>" class="img-fluid" />
                          </a>
                        </div>
                      </div>
                      <div class="row partner-info py-3">
                        <div class="col">
                            <h6><?php echo $logo_tile['name']; ?></h6>
                            <div class="categories mb-2">
                              <?php foreach( $logo_tile['categories'] as $i => $cat ): $i++;
                                echo $cat->name; ?><?php if( sizeof( $logo_tile['categories'] ) != $i ):?>, <?php endif;?>
                              <?php endforeach;?>
                            </div>
                            <a href="#" class="d-inline-block" role="button" data-toggle="modal" data-target="#modal_<?php echo $logo_tile['partner_id']; ?>">Details</a>
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

<?php foreach( $partner_modals as $partner_id => $modal ): ?>
  <!-- Modal -->
  <div class="modal fade" id="modal_<?php echo $partner_id;?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $partner_id ;?>Title" aria-hidden="true">
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
