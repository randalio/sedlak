<?php

$hero_content = get_sub_field('hero_slider_content');

?>


<section class="row hero-slider pad-top-1">
  <div class="col px-0">

    <div id="heroCarousel" class="carousel slide" data-ride="carousel">
      <!-- NAVIGATION DOTS -->
      <?php if( is_array($hero_content) ): ?>
        <?php if( sizeof($hero_content) > 1 ): ?>
          <ol class="carousel-indicators">
            <?php foreach( $hero_content as $i => $slide ): ?>
              <li data-target="#heroCarousel" data-slide-to="<?php echo $i; ?>" <?php if($i==0): ?>class="active"<?php endif;?>></li>
            <?php endforeach; ?>
          </ol>
          <?php endif; ?>
      <?php endif; ?>


      <!-- carousel slides -->
      <div class="carousel-inner">

        <?php foreach( $hero_content as $i => $slide ): ?>
          <div class="carousel-item <?php if($i == 0): ?>active<?php endif; ?>" style="background-image: url(<?php echo $slide['slide_background_settings']['slide_image']['sizes']['slide-background'];?>);">
            <div class="slide-wrap">

              <?php if($slide['slide_background_settings']['slide_video']['url'] != ''): ?>
                <div class="video-container d-none d-lg-block">
                  <div class="hero-slider-video-background">
                    <div class="hero-slider-foreground">
                      <video autoplay muted loop id="marqueeVideo">
                        <?php if(!empty($slide['slide_background_settings']['slide_video']['url'])): ?>
                          <source src="<?php echo $slide['slide_background_settings']['slide_video']['url']; ?>" type="video/mp4">
                        <?php endif; ?>
                      </video>
                    </div>
                  </div>
                </div>
              <?php endif; ?>


              <div class="container">
                <h1>
                  <span class="h1_sm_gray d-block"><?php echo $slide['two_col_content_group']['line_one'];?></span>
                  <span class="h1_lg_gray d-block"><?php echo $slide['two_col_content_group']['line_two'];?></span>
                  <span class="h1_lg_green d-block"><?php echo $slide['two_col_content_group']['line_three'];?></span>
                </h1>
                <a href="<?php echo $slide['two_col_content_group']['two_col_button_link']['url'];?>"  target="<?php echo $slide['two_col_content_group']['two_col_button_link']['target'];?>" class="hero-cta d-inline-block mt-3 py-3 pl-3 pr-4"><span><?php echo $slide['two_col_content_group']['cta_text'];?> <i class="fas fa-caret-right ml-3"></i></span></a>
              </div>
            </div>

          </div>
        <?php endforeach; ?>

    </div>






  </div>
</section>
