<?php
	$home_url = home_url();
	$header_logo = get_field('header_logo', 'option');

	$contact_page = get_field('contact_us_page', 'option');
	$facebook_url = get_field('facebook_url', 'option');
	$linkedin_url = get_field('linkedin_url', 'option');
?>



<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta charset="<?php bloginfo('charset'); ?>" />
	<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge" /> -->
	<META http-equiv="X-UA-Compatible" content="IE=9">
	<title><?php wp_title( '|', true, 'right' ); ?> <?php //bloginfo('name'); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) { gtm4wp_the_gtm_tag(); } ?>

<div class="siteWrapper" id="site_wrapper"> <!-- Closes in footer.php -->
	<header class="site-header" id="site_header">

		<h2 class="sr-only"><?php print get_bloginfo( 'name', 'display' ); ?></h2>

		<div class="main-header" id="site_nav">
			<div class="nav-wrap">
				<div class="container pb-3 px-auto px-xl-0">

					<div class="row">
						<div class="col-10 col-lg-7 col-xl-8 logo-wrapper order-1 order-md-1 order-lg-2 order-xl-1 pr-0 my-auto">
							<?php if($header_logo != NULL): ?>
								<a href="<?php echo $home_url; ?>" class="d-block img-fluid">
									<img src="<?php echo $header_logo['url']; ?>" id="site_logo" class="img-fluid" width="auto" height="<?php echo $header_logo['height']; ?>"/>
								</a>
							<?php endif; ?>
						</div>

						<div class="col-2 d-lg-none nav-toggle text-right order-2 order-md-2 order-xl-2 pl-0 pr-0">
							<h3 class="sr-only">Site Navigation</h3>
							<button class="navbar-toggler pe-none" type="button" data-toggle="collapse" data-target="#sedlak_navigation" aria-controls="sedlak_navigation" aria-expanded="false" aria-label="Toggle navigation">
								<div class="menu_bars">
									<span class="bar bar-1"></span>
									<span class="bar bar-2"></span>
									<span class="bar bar-3"></span>
								</div>
								<!-- <i class="fas fa-times d-none"></i> -->
							</button>
						</div>

						<div class="col-12 col-md-4 col-lg-3 col-lg-4 col-xl-3 top-right-menu pt-lg-3 pt-xl-2 order-1 order-md-7 order-xl-3 d-none d-md-block text-left text-lg-right my-auto my-lg-0">

								<?php wp_nav_menu( array(
									'menu' 						=> 'top_right',
									'depth'	          => 2, // 1 = no dropdowns, 2 = with dropdowns.
									'container'       => 'div',
									'container_class' => 'p-0 float-xl-right',
									'container_id'    => 'sedlak_top_right_navigation',
									'menu_class'      => 'top_right_nav',
									'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
									'theme_location'	=> 'top_right',
									'walker'          => new WP_Bootstrap_Navwalker(),
								)); ?>
						</div>

						<div class="col-3 col-md-1 col-xl-1 header_contact_link text-right pl-0 pt-lg-2 pt-xl-0 order-2 order-md-12 order-xl-4 d-none d-md-block">
								<a href="<?php echo get_the_permalink($contact_page);?>" class="nav-link d-inline-block"><span>Contact</span></a>
						</div>

						<div class="col-12 col-xl-9 primary-navigation order-12 order-xl-5 my-auto">
							<nav class="navbar navbar-expand-lg p-0">

									<?php wp_nav_menu( array(
										'menu' 						=> 'primary',
										'depth'	          => 2, // 1 = no dropdowns, 2 = with dropdowns.
										'container'       => 'div',
										'container_class' => 'collapse navbar-collapse',
										'container_id'    => 'sedlak_navigation',
										'menu_class'      => 'navbar-nav primary_nav',
										'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
										'theme_location'	=> 'primary',
										'walker'          => new WP_Bootstrap_Navwalker(),
									)); ?>


							</nav>
						</div>

						<div class="col-12 col-md-7 col-lg-5 offset-0 offset-lg-7 offset-xl-0 col-xl-3 text-right social-search order-11 order-md-9 order-lg-1 order-xl-6 pt-2 pr-md-4 pr-lg-3 pt-lg-3 pt-xl-0">
							<form action="/" method="get">

								<div class="social-wrap">
									<?php if( $linkedin_url != ''): ?>
										<a href="<?php echo $linkedin_url;?>" target="_blank" class="d-block float-right li-icon"><i class="fab fa-linkedin"></i></a>
									<?php endif; ?>
									<?php if( $facebook_url != ''): ?>
										<a href="<?php echo $facebook_url;?>" target="_blank" class="d-block float-right fb-icon"><i class="fab fa-facebook-square"></i></a>
									<?php endif; ?>
								</div>

								<div class="search-wrap d-block">
									<input type="text" name="s" id="siteSearch" placeholder="Search..." class=""/>
									<button type="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" class=""/><i class="fas fa-search"></i></button>
								</div>

							</div>
						</form>
					</div>
				</div>
				<div class="header-border"></div>


			</div>
		</div>

	</header>
