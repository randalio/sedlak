<?php

$professionals = get_sub_field('team_grid');

$pad_top = get_sub_field('padding_top');
$pad_bot = get_sub_field('padding_bot');

?>


<section class="team-grid row pad-top-<?php echo $pad_top; ?> pad-bot-<?php echo $pad_bot; ?> ">
  <div class="col">
    <div class="row">

      <?php foreach( $professionals as $team ): ?>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-5">
          <?php //print_r($team); ?>

          <?php
          $bio_group_1 = get_field('pro_bio_group_1', $team->ID );
          $pro_image = $bio_group_1['pro_image']['sizes']['team-grid'];
          // $bio_group_2 = get_field('pro_bio_group_2', $team->ID);
          $pro_title = $bio_group_1['pro_job_title'];
          ?>

          <div class="tile-wrap">
            <div class="row photo mb-2">
              <div class="col">
                <?php if( $pro_image != '' ): ?>
                  <a href="<?php echo get_the_permalink($team->ID); ?>" class="d-block">
                    <img src="<?php echo $pro_image;?> " class="img-fluid w-100"/>
                  </a>
                <?php endif; ?>
              </div>
            </div>

            <div class="row name mb-0 px-4 pt-2">
              <div class="col">
                <?php if( get_the_title($team->ID) != '' ): ?>
                  <a href="<?php echo get_the_permalink($team->ID); ?>" class="d-block">
                    <strong><?php echo get_the_title($team->ID); ?></strong>
                  </a>
                <?php endif;?>
              </div>
            </div>

            <div class="row title px-4 pb-4">
              <div class="col">
                <?php if( $pro_title != '' ): ?>
                  <a href="<?php echo get_the_permalink($team->ID); ?>" class="d-block">
                    <i><?php echo $pro_title; ?></i>
                  </a>
                <?php endif; ?>
              </div>
            </div>
          </div>

        </div>
      <?php endforeach; ?>

    </div>
  </div>
</section>
