<?php

if(get_field('contact_info_headline', 'option')){
	$contact_info_headline = get_field('contact_info_headline', 'option');
}else {
	$contact_info_headline = NULL;
}


if(get_field('contact_info_email_text', 'option')){
	$contact_info_email_text = get_field('contact_info_email_text', 'option');
}else {
	$contact_info_email_text = NULL;
}

if(get_field('contact_info_email_text', 'option')){
	$contact_info_email_text = get_field('contact_info_email_text', 'option');
}else {
	$contact_info_email_text = NULL;
}

if(get_field('contact_info_tel_text', 'option')){
	$contact_info_tel_text = get_field('contact_info_tel_text', 'option');
}else {
	$contact_info_tel_text = NULL;
}

if(get_field('contact_info_office_text', 'option')){
	$contact_info_office_text = get_field('contact_info_office_text', 'option');
}else {
	$contact_info_office_text = NULL;
}

$site_page = get_field('other_pages_group', 'option');
$site_phone = get_field('contact_phone', 'option');
$ph_number_stripped = preg_replace("/[^0-9]/", "", $site_phone );

$contact_link  = get_the_permalink( get_field('contact_us_page', 'option') );




?>
<section class="contact-info">
  <div class="row px-0 pad-top-1 pad-bot-1">
    <div class="col">
      <?php if( $contact_info_headline != NULL): ?>
        <div class="row text-center mb-4">
          <div class="col-lg-8 offset-lg-2">
            <h2><?php echo $contact_info_headline; ?></h2>
          </div>
        </div>
      <?php endif; ?>
      <?php if( $contact_info_email_text != NULL && $contact_info_tel_text != NULL && $contact_info_office_text != NULL): ?>
        <div class="row">
          <div class="col col-md-8 col-lg-6 offset-md-2 offset-lg-3">
            <div class="row text-center">
              <div class="col-12 col-sm-4 ">
                <a href="<?php echo $contact_link;?>" class="contact-btn-bar"><i class="fas fa-envelope"></i> Email</a>
								<span><?php echo $contact_info_email_text;?></span>
              </div>
              <div class="col-12 col-sm-4 d-md-none">
                <a href="tel:<?php echo $ph_number_stripped;?>" class="contact-btn-bar"><i class="fas fa-mobile-alt"></i> Call</a>
								<span><?php echo $contact_info_tel_text;?></span>
              </div>
              <div class="col-12 col-sm-4 d-none d-md-block">
								<a href="<?php echo $contact_link;?>" class="contact-btn-bar"><i class="fas fa-phone-square-alt"></i> Call</a>
								<span><?php echo $contact_info_tel_text;?></span>
              </div>
              <div class="col-12 col-sm-4">
                <a href="<?php echo $contact_link;?>" class="contact-btn-bar"><img src="/wp-content/themes/sedlak-theme/images/visit_icon.png" /> Visit</a>
								<span><?php echo $contact_info_office_text;?></span>
              </div>

            </div>

          </div>
        </div>
      <?php endif; ?>

    </div>
  </div>


</section>
