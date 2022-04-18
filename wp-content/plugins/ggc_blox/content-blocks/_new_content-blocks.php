<?php

global $wpdb;
global $results;
global $block_page;
global $block_page2;

global $new_blocks;

if( is_archive() ){
  $page_id = 'option';
  global $wpdb;
  global $block_page;
  global $block_page2;
  $object = get_queried_object();
  $overview = $object->rewrite['slug'];
  $block_page = 'acf-options-'.str_replace('-','-',$overview) . '-overview';
  $block_page2 = str_replace('-','_',$overview).'_overview';
}else{
  global $post;
  global $block_page;
  global $block_page2;
  $page_id = $post->ID;
  $block_page = get_post_type($page_id);
  $block_page2 = get_post_type($page_id);
  //echo $block_page;
}


if(have_rows('row_type_'.$block_page, $page_id)){
  while ( have_rows('row_type_'.$block_page, $page_id) ) : the_row();


    if( get_row_layout() == 'one_column_layout_'.$block_page2 ):
      $layout = get_row_layout();
      if(have_rows('content_blocks_one_col_row_settings_'.$block_page2) ):
        while ( have_rows('content_blocks_one_col_row_settings_'.$block_page2, $page_id) ) : the_row();
          $row_1col_container = get_sub_field('content_blocks_one_col_row_container');
          $row_1col_ID = get_sub_field('content_blocks_one_col_row_id');
          $row_1col_class = get_sub_field('content_blocks_one_col_row_class');
          $row_1col_bg_color = get_sub_field('content_blocks_one_col_row_bg_color');
          $row_1col_bg_img_field = get_sub_field('content_blocks_one_col_row_bg_img');
          $row_1col_bg_img = wp_get_attachment_image_src( $row_1col_bg_img_field, 'ex-large' );
        endwhile;
      endif; ?>

      <div class="one-column-wrapper" style="<?php if( $row_1col_bg_color != ''): ?>background-color: <?php echo $row_1col_bg_color; ?>;<?php endif;?> <?php if( is_array($row_1col_bg_img) ): ?>background-image: url(<?php echo $row_1col_bg_img['0']; ?>); background-size: cover;<?php endif; ?>">
        <div class="<?php echo $row_1col_container; ?> one-column anchor" <?php if($row_1col_ID != ''): ?>id="<?php echo $row_1col_ID; ?>"<?php endif; ?>>
          <div class="row">
            <div class="col px-0">
                <?php
                if(have_rows('content_blocks_one_col_row_'.$block_page2, $page_id)):
                  while ( have_rows('content_blocks_one_col_row_'.$block_page2, $page_id) ) : the_row();
                    $block = get_row_layout();
                    $post_type = get_post_type();

                    $block = substr($block, 0, strrpos( $block, '_'.$post_type));
                    //error_log( 'block layout: '.$block );

                    echo render_blocks( $block );
                  endwhile;
                endif;
                ?>
              </div>
            </div>
          </div>
        </div>
    <?php endif; ?>

    <?php
    if( get_row_layout() == 'two_column_layout_'.$block_page2 ): ?>
        <?php
        if(have_rows('content_blocks_two_col_row_settings_'.$block_page2) ):
          while ( have_rows('content_blocks_two_col_row_settings_'.$block_page2, $page_id) ) : the_row();

            $row_2col_container = get_sub_field('content_blocks_two_col_row_container');
            $row_2col_ID = get_sub_field('content_blocks_two_col_row_id');
            $row_2col_class = get_sub_field('content_blocks_two_col_row_class');
            $row_layout = get_sub_field('content_blocks_two_col_row_columns');

            if(have_rows('content_blocks_two_col_row_left_bg_group') ):
              while ( have_rows('content_blocks_two_col_row_left_bg_group') ) : the_row();
                $left_bg_color = get_sub_field('content_blocks_two_col_row_left_bg_color');
                $left_bg_image = get_sub_field('content_blocks_two_col_row_left_bg_image');
              endwhile;
            endif;

            if(have_rows('content_blocks_two_col_row_right_bg_group') ):
              while ( have_rows('content_blocks_two_col_row_right_bg_group') ) : the_row();
                $right_bg_color = get_sub_field('content_blocks_two_col_row_right_bg_color');
                $right_bg_image = get_sub_field('content_blocks_two_col_row_right_bg_image');
              endwhile;
            endif;

          endwhile;
        endif;
      ?>


      <div class="<?php echo $row_2col_container.' '.$row_layout; ?>  px-0 <?php echo $row_2col_class; ?> two-columns anchor" <?php if($row_2col_ID != ''): ?>id="<?php echo $row_2col_ID; ?>"<?php endif; ?>>
        <div class="row">

          <div class="col col-12 <?php if($row_layout == 'even_split'): ?>col-md-6<?php endif; ?><?php if( $row_layout  == 'sidebar_l' ): ?>col-md-5 col-lg-4 order-last order-md-first pr-5<?php endif; ?><?php if( $row_layout  == 'sidebar_r' ): ?>col-md-7 col-lg-8 order-first pr-5<?php endif; ?>" <?php if( $left_bg_color != ''): ?>style="background-color: <?php echo $left_bg_color; ?>"<?php endif;?>>
            <div class="background_div" style="<?php if($left_bg_color != ''): ?> background-color: <?php echo $left_bg_color; ?>;<?php endif; ?><?php if($left_bg_image != ''): ?> background-image: url(<?php echo $left_bg_image['url']; ?>);<?php endif; ?>"></div>
            <?php if(have_rows('content_blocks_two_col_main_even_left_'.$block_page2, $page_id)): ?>
              <?php while ( have_rows('content_blocks_two_col_main_even_left_'.$block_page2, $page_id) ) : the_row();?>
                <?php
                $block = get_row_layout();
                $post_type = get_post_type();
                $block = substr($block, 0, strrpos( $block, '_'.$post_type));
                ?>
                <?php echo render_blocks( $block ); ?>
              <?php endwhile;?>
            <?php endif;?>
          </div>

          <div class="col col-12 <?php if($row_layout == 'even_split'): ?>col-md-6<?php endif; ?><?php if( $row_layout  == 'sidebar_l' ): ?>col-md-7 col-lg-8 order-first px-4 pl-5<?php endif; ?><?php if( $row_layout  == 'sidebar_r' ): ?>col-md-5 col-lg-4 order-last pl-md-5<?php endif; ?>" <?php if( $right_bg_color != ''): ?>style="background-color: <?php echo $right_bg_color; ?>"<?php endif;?>>
            <div class="background_div" style="<?php if($right_bg_color != ''): ?> background-color: <?php echo $right_bg_color; ?>;<?php endif; ?><?php if($right_bg_image != ''): ?> background-image: url(<?php echo $right_bg_image['url']; ?>);<?php endif; ?>"></div>
            <?php if(have_rows('content_blocks_two_col_main_even_right_'.$block_page2, $page_id)): ?>
              <?php while ( have_rows('content_blocks_two_col_main_even_right_'.$block_page2, $page_id) ) : the_row();?>
                <?php
                $block = get_row_layout();
                $post_type = get_post_type();
                $block = substr($block, 0, strrpos( $block, '_'.$post_type));
                ?>
                <?php echo render_blocks( $block ); ?>
              <?php endwhile;?>
            <?php endif;?>
          </div>


        </div>
      </div>
    <?php endif; ?>

  <?php endwhile; ?>
<?php } ?>
