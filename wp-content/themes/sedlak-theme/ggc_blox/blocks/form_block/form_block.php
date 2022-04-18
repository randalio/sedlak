<?php
$form_content = get_sub_field('content_group');
$form_headline = $form_content['headline'];
$form_subheadline = $form_content['sub_head'];
$form_line_text = $form_content['line_text'];
$form_embed_code = get_sub_field('form_embed_code');

$pad_top = get_sub_field('padding_top');
$pad_bot = get_sub_field('padding_bot');

if( get_post_type() == 'profile'){
  $form_headline = get_field('team_form_headline', 'option');
  $form_line_text = get_field('team_form_text', 'option');
  $form_embed_code = get_field('team_form', 'option');
  $form_content['layout_style'] = 'full-width';
  $pad_top = '2';
  $pad_bot = '2';
}


?>

<section class="form-block row pad-top-<?php echo $pad_top;?>  pad-bot-<?php echo $pad_bot;?>  <?php echo $form_content['layout_style']; ?>">
  <div class="container">
    <div class="col">
      <div class="row">

        <div class="col-12 <?php if( $form_content['layout_style'] == 'full-width'): ?>col-lg-6 col-xl-5 pr-4<?php endif; ?>">

          <?php if( $form_headline != '' ): ?>
            <h2 class="pb-3"><?php echo $form_headline; ?></h2>
          <?php endif; ?>

          <?php if( $form_content['layout_style'] == 'sidebar'): ?>
            <?php if( $form_subheadline != '' ): ?>
              <h4 class="pb-3"><?php echo $form_subheadline; ?></h4>
            <?php endif; ?>
          <?php endif; ?>

          <?php if( $form_line_text != '' ): ?>
            <p><?php echo $form_line_text; ?></p>
          <?php endif; ?>

        </div>

        <div class="col-12 <?php if( $form_content['layout_style'] == 'full-width'): ?>col-lg-6 offset-xl-1<?php endif; ?>">
          <?php //echo $form_embed_code; ?>
          <?php echo do_shortcode('[gravityform id="'.$form_embed_code.'" title="false" description="false" ajax="true"]'); ?>
        </div>

      </div>
    </div>
  </div>
</section>
