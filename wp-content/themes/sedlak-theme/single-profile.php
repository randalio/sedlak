<?php
global $post;
$page_id = $post->ID;
$page_title = get_the_title($page_id);

$header_image = get_field('pro_header_image', 'option');
$header_text = get_field('pro_header_label', 'option');

$bio_group_1 = get_field('pro_bio_group_1');
$values = $bio_group_1['pro_values'];
$bio_group_2 = get_field('pro_bio_group_2');
$team_page = get_field('team_page', 'option');

$team_post_object = get_post($team_page);

?>

<?php get_header(); ?>
<main id="main">
	<section class="page-title">
		<div class="container-fluid page-title">
				<div class="row">
					<div class="col">
						<div class="container">
							<div class="row px-0">
								<div class="col">
									<h1 class="m-0"><?php echo get_the_title();?></h1>
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>
	</section>



  <section class="breadcrumbs row">
    <div class="col">
        <div class="container">
            <div class="row py-2">
                <div class="col-12">
                  <span>
                    <a href="/">Home</a>
                  </span>
								<?php if( $team_post_object->post_parent > 0 ): ?>
									<span>
										<a href="<?php echo get_the_permalink( $team_post_object->post_parent ); ?>"><?php echo get_the_title( $team_post_object->post_parent ); ?></a>
									</span>
								<?php endif; ?>
                <?php if( !empty( $team_page ) ): ?>
                  <span>
                    <a href="<?php echo get_the_permalink( $team_page ); ?>"><?php echo get_the_title( $team_page ); ?></a>
                  </span>
                <?php endif; ?>
                <?php if( $post->post_title != '' ): ?>
                    <span><?php echo $post->post_title; ?></span>
                <?php endif; ?>
                </div>
            </div>
        </div> <!-- container -->
    </div> <!-- col -->
  </section>


	<div class="page-wrap">

    <div class="container profile my-5">
      <div class="row mt-5">

        <div class="col-md-4 mb-3">
          <div class="row image">
            <div class="col">
              <img src="<?php echo $bio_group_1['pro_image']['sizes']['team-grid']; ?>" class="img-fluid w-100"/>
            </div>
          </div>

        </div>

        <div class="col-md-8">

          <div class="row name">
            <div class="col">
              <h4><?php echo get_the_title(); ?></h4>
            </div>
          </div>

          <div class="row title mb-2">
            <div class="col">
              <h6><?php echo $bio_group_1['pro_job_title']; ?></h6>
            </div>
          </div>


          <div class="row bio">
            <div class="col">
              <?php if( $bio_group_2['pro_long_bio'] != '' ): ?>
                <?php echo $bio_group_2['pro_long_bio']; ?>
              <?php endif; ?>
            </div>
          </div>

					<?php if( $bio_group_1['pro_linkedin'] != ''): ?>
	          <div class="row connect-icons mt-2 mb-4">
	            <div class="col">

	              <?php if( $bio_group_1['pro_linkedin'] != '' ): ?>
	                <a href="<?php echo $bio_group_1['pro_linkedin']; ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
	              <?php endif; ?>

	            </div>
	          </div>
					<?php endif; ?>


        </div>

      </div>
    </div>

		<div class="container-fluid">
			<?php include get_template_directory().'/ggc_blox/blocks/form_block/form_block.php'; ?>
		</div>


		<?php blox_content(); ?>
		<?php the_content();?>
	</div>


</main>

<?php get_footer(); ?>
