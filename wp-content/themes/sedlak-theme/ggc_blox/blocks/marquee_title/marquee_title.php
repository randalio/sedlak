<?php

  global $post;

  $parent_id      = wp_get_post_parent_id( $post->ID );
  $parent         = get_post( $parent_id );
  $grandaddy_id   = wp_get_post_parent_id( $parent->ID );
  $grandaddy      = get_post($grandaddy_id);

  $content = get_sub_field('content');
  $image = get_sub_field('image');
  $headline = $content['headline'];
  $size = $content['size'];
  $text = $content['text'];
  $button_text = $content['button_text'];
  $button_link = $content['button_link'];
  $breadcrumbs = $content['breadcrumbs'];

?>
<?php if( is_array($image) && $headline != '' ): ?>
  <section class="row marquee-title" style="background-image: url(<?php echo $image['sizes']['slide-background']; ?>);">
    <div class="col">
      <div class="container">

        <div class="row pad-top-2 pad-bot-2">
          <div class="col-12 col-lg-6">

              <div class="row">
                <div class="col-12 col-md-10 mb-2">
                  <h1><?php echo $headline; ?></h1>
                </div>
              </div>

              <?php if( $size == 'expanded' ): ?>
                <div class="row">
                  <div class="col-12 col-md-10">
                    <p><?php echo $text; ?></p>
                  </div>
                </div>
              <?php endif; ?>

              <?php if( $button_text != '' && is_array($button_link) ): ?>
                <div class="row">
                  <div class="col-12 col-md-10">
                    <a href="<?php echo $button_link['url']; ?>" class="cta d-inline-block"><?php echo $button_text; ?></a>
                  </div>
                </div>
              <?php endif; ?>


          </div>
        </div>

      </div>
    </div>
  </section>
<?php endif; ?>

  <?php if( get_post_type() == 'industry' ): ?>

    <?php include get_template_directory() . '/ggc_blox/blocks/logo_grid/logo_grid.php'; ?>

  <?php endif; ?>

<?php if( $breadcrumbs == 'show'): ?>
  <section class="row breadcrumbs py-2">
    <div class="col-12">
      <div class="container px-0">
        <span>
          <a href="/">Home</a>
        </span>

        <?php if( $grandaddy_id != 0 ): ?>
          <span>
            <a href="<?php echo get_the_permalink($grandaddy->ID); ?>"><?php echo $grandaddy->post_title; ?></a>
          </span>
        <?php endif; ?>

        <?php if( $parent_id != 0 ): ?>
          <span>
            <a href="<?php echo get_the_permalink($parent->ID); ?>"><?php echo $parent->post_title; ?></a>
          </span>
        <?php endif; ?>

        <?php if( $post->post_title != '' ): ?>
          <span><?php echo $post->post_title; ?></span>
        <?php endif; ?>
      </div>
    </div>
  </section>
<?php endif; ?>
