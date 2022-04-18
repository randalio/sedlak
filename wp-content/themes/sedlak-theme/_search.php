<?php
global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

foreach($query_args as $key => $string) {
	$query_split = explode("=", $string);
	$search_query[$query_split[0]] = $query_split[1];
} // endforeach

$search = new WP_Query($search_query);

$default_image = get_field('default_resource_image', 'option');

$search_results = $search->posts;
$items = array();
foreach( $search_results as $result ){

	$item = array();
	$item['ID'] = $result->ID;
	$item['title'] = $result->post_title;
	$item['post_type'] = $result->post_type;
	$item['image'] = $default_image['sizes']['grid-three-items'];

	$fields = get_fields($result->ID);
  $marquee_image = $fields['row_type_'.$result->post_type][0]['content_blocks_one_col_row_service'][0]['image']['sizes']['medium'];
	$summary_text  = $fields['row_type_'.$result->post_type][0]['content_blocks_one_col_row_service'][0]['content']['text'];

	if( $result->post_type == 'page' || $result->post_type == 'service' || $result->post_type == 'industry' ){
		$item['image'] = $marquee_image;
		$item['summary'] = $summary_text;
		$item['button_text'] = 'Read More';
	}
	if( $result->post_type == 'post' ){
		$featured_image = get_the_post_thumbnail_url($result->ID);
		$item['image'] = $featured_image;
		$item['summary'] = get_the_excerpt($result->ID);
		$item['button_text'] = 'Read Blog';
	}


	if( $result->post_type == 'white-paper' || $result->post_type == 'case-study' ){
		$cover = get_field('cover', $result->ID);
		$summary = get_field('summary', $result->ID);
		$item['image'] = $cover['sizes']['medium'];
		$item['summary'] = $summary;
		$item['button_text'] = 'Read White Paper';
	}

	if( $result->post_type == 'case-study' ){
		$item['button_text'] = 'Read Success Story';
	}

	$item['link'] = get_the_permalink($result->ID);
	array_push($items, $item);
}//endforeach
?>
<?php get_header(); ?>
<main id="main" class="m-scene">
	<div id="page_content_container" class="scene-main scene-main--fadein main-inner-wrap">


<div class="container search-results">

	<div class="row py-5">
		<div class="col-12 col-lg-8 offset-lg-2 searchbox">
			<div class="search_terms">
				<form action="/" method="get">
					<!-- <div class="search-wrap"> -->
						<span class="search-label">Search for: &nbsp;</span><input type="text" name="s" id="searchPageInput" placeholder="Search..." value="<?php echo get_search_query();?>" class=""/>
						<button type="submit" id="searchPageSubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" class="pull-right"/><i class="fas fa-search"></i></button>
					<!-- </div> -->
				</form>
			</div>
		</div>
	</div>

	<div class="row search-results-grid">


		<?php foreach( $items as $tile ): ?>
			<div class="col col-md-4 mb-4 tile <?php echo $tile['post_type']; ?>">

						<div class="row px-2">
							<div class="col tile-border">

								<!-- <div class="row content-type text-center py-1">
									<div class="col">
										<span class="d-block"><?php echo $tile['tile_label']; ?></span>
									</div>
								</div> -->

								<?php if( $tile['image'] != '' ): ?>
										<div class="row image px-0">
											<a href="<?php echo $tile['link']; ?>" class="">
												<div class="col px-0">
													<img src="<?php echo $tile['image']; ?>" class="img-fluid" width="480" height="320"/>
												</div>
											</a>
										</div>
								<?php endif; ?>

								<div class="row title pt-4 px-4">
									<div class="col">
										<a href="<?php echo $tile['link']; ?>" class="">
											<h3><?php echo $tile['title']; ?></h3>
										</a>
									</div>
								</div>

								<div class="row summary pb-3 px-4">
									<div class="col">
										<p><?php echo $tile['summary']; ?></p>
									</div>
								</div>

								<div class="row link pb-5 px-4">
									<div class="col">
										<a href="<?php echo $tile['link']; ?>" class="" target="<?php echo $tile['target'];?>"><?php echo $tile['button_text']; ?></a>
									</div>
								</div>

							</div>
						</div>
			</div>
		<?php endforeach; ?>

	</div>





</div> <!-- container -->

</div>
</main>

<?php get_footer(); ?>
