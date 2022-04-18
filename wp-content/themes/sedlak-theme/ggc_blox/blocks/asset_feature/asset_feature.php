<?php
$asset_content = get_sub_field('asset_feature_content');
$asset_id = $asset_content['asset_id'];
$wp_image = get_field('cover', $asset_id);
$wp_summary = get_field('summary', $asset_id);
?>
<?php if( $asset_id != '' ): ?>
<section class="asset-feature row pad-top-2 pad-bot-2">
  <div class="col-12">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-5 col-xl-6 my-auto">
          <?php if( is_array( $wp_image ) ): ?>
            <img src="<?php echo $wp_image['sizes']['large'];?>" width="<?php echo $wp_image['sizes']['large-width'];?>" height="<?php echo $wp_image['sizes']['large-height'];?>" class="w-100 img-fluid"/>
          <?php endif; ?>
        </div>
        <div class="col-12 col-lg-7 col-xl-6 my-auto">
          <h2 class="pb-2"><a class="d-block" href="<?php echo get_the_permalink($asset_id); ?>"><?php echo $asset_content['asset_feature_headline'];?></a></h2>
          <h4 class="pb-1"><a class="d-block" href="<?php echo get_the_permalink($asset_id); ?>"><?php echo get_the_title($asset_id); ?></a></h4>
          <p class="pb-4"><?php echo $wp_summary; ?></p>
          <a class="btn btn-bar px-4" href="<?php echo get_the_permalink($asset_id); ?>"><span><?php echo $asset_content['asset_feature_button_text'];?></span></a>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
