<?php
global $post;
$page_id = $post->ID;
$page_title = get_the_title($page_id);

?>

<?php get_header(); ?>
<main id="main">
	<div class="page-wrap page-not-found">

		<div class="container-fluid one-column anchor">
				<div class="row">
					<div class="col">


						<section class="row marquee-title " style="background-image: url(http://jasedlak:8888/wp-content/uploads/2021/11/gettyimages-1209030907-170667a-1300x222.png);">
						    <div class="col">
						      <div class="container">

						        <div class="row pad-top-2 pad-bot-2">
						          <div class="col-12 col-lg-6">

						              <div class="row">
						                <div class="col-12 col-md-10 mb-2">
						                  <h1>404 | Page Not Found</h1>
						                </div>
						              </div>

						          </div>
						        </div>

						      </div>
						    </div>
						  </section>


					</div>
				</div>
			</div>

	    <div class="container search_results search-results"  style="min-height: 50vh;">
	      <div class="row pt-5">


					<div class="col-12 text-left mb-5">
						<h2>Sorry, we can't find this page.</h2>
						<p>The page you were looking for doesn’t exist, or may have been moved. Try searching the site below or check in the main menu for the page you are looking for.</p>
					</div>

					<div class="col col-lg-10 offset-lg-1 search_results_for py-5">
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

					</div>

	      </div>
	    </div>

	</div>
</main>

<?php get_footer(); ?>
