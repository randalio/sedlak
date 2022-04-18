/*
*
*  AUTOSED
*  Goldstein Group Communications - @2019 UID
*
*/

(function ($) {
	'use strict';

// GLOBAL VARIABLES


if (typeof SED == 'undefined') {
  var SED = {};
}

SED.site = function() {
	return {

		init: function () {
			SED.site.initEvents();
		},
		initEvents: function () {
			//SED.site.animateReveal();
			SED.site.stickyHeader();
			SED.site.scaleBGVideo();
			SED.site.gridItemText();
			SED.site.mobileMenu();
			SED.site.isoInit();
			SED.site.gridItemText();
			SED.site.headerSearch();
			SED.site.sidebarMenu();
			SED.site.testimonialCarousel();
			SED.site.blogIsotope();


			$(window).resize( function() {
				//SED.site.animateReveal();
				SED.site.gridItemText();
				SED.site.headerSearch();
				SED.site.scaleBGVideo();
			});

			$(window).scroll(function() {
				//SED.site.animateReveal();
				SED.site.stickyHeader();
			});
		},
		windowWidth: function(){
			var windowWidth = window.innerWidth ? window.innerWidth : $(window).width();
			return windowWidth;
		},
		windowHeight: function(){
			var windowHeight = window.innerHeight ? window.innerHeight : $(window).height();
			return windowHeight;
		},
		setLargestHeight: function(element){
			var tallestHeight = 0;
			element.each(function(){
				var thisHeight = $(this).outerHeight();
				if(parseInt(thisHeight) > parseInt(tallestHeight) ){
					tallestHeight = thisHeight;
				}
			});
			element.height(tallestHeight);

			},
			setBiggestWidth: function(element){
				var biggestWidth = 0;
				element.each(function(){
					var thisWidth = $(this).outerWidth();
					if(parseInt(thisWidth) > parseInt(biggestWidth) ){
						biggestWidth = thisWidth;
					}
				});
				element.width(biggestWidth + 7);

			},
			scaleBGVideo: function(){
				var windowWidth = SED.site.windowWidth();
				if($('.video-container').length){

					$('.video-container').find('video').css({ 'width': 'auto', 'height': 'auto', 'object-fit': 'cover'}).fadeIn(1000);

					if(768 < windowWidth){

						$('.video-container').each(function(){
							var containerHeight		= $(this).outerHeight();
							var containerWidth		= $(this).outerWidth();

							var videoWidth 			= $(this).find('video').width();
							var videoHeight 		= $(this).find('video').height();

							var videoRatio = (videoWidth / videoHeight).toFixed(2);

							var widthRatio = containerWidth / videoWidth
								, heightRatio = containerHeight / videoHeight;

							var newWidth = 0,
									newHeight = 0;

								if(widthRatio > heightRatio) {
						        newWidth = containerWidth;
						        newHeight = Math.ceil( containerWidth / videoRatio );
						    }else{
						        newHeight = containerHeight;
						        newWidth = Math.ceil( containerHeight * videoRatio );
						    }

							$(this).find('video').css({ 'width': newWidth, 'height': newHeight, 'object-fit': 'cover' });
						});
					}
				}
			},
			isIE: function() {
			    return !!window.navigator.userAgent.match(/MSIE|Trident/);
			},
			stickyHeader: function(){
				var windowWidth = SED.site.windowWidth();

				var head_height = $('.site-header').outerHeight();
				var	logo_height = $('.header-logo img').outerHeight();

				//if( windowWidth > 991){
					//alert('window widxth greater than 991');
					var scrollTop = Math.max(window.pageYOffset, document.documentElement.scrollTop, document.body.scrollTop)

					if (scrollTop >= 0 ) {
						$('.site-header').addClass('sticky');
						$('#main').css('padding-top', head_height + 'px');
						//$('.header-logo img').css('height', sticky_logo_height );
					}
					// else {
					// 	$('.site-header').removeClass('sticky');
					// 	$('#main').css('padding-top', 0 + 'px');
					// }
				//}
			},
			gridItemText: function(){

					if($('.case-study-owl-carousel').length){
						var windowWidth = SED.site.windowWidth();
						if($('.tile-wrap').length){
							$('.tile-wrap').height('auto');
							//if(768 < windowWidth){
								$('.case-study-owl-carousel').each(function(){
									var _this = $(this);
									var item = _this.find('.tile-wrap');
									SED.site.setLargestHeight(item);
								});
							//}
						}
					}

			},
			mobileMenu: function(){
				setTimeout(function(){
					$('.navbar-toggler').removeClass('pe-none');
				}, 1000);

				$('.navbar-toggler').on('click', function(){
					$('.navbar-toggler .fa-times').toggleClass('d-none');
					$('.navbar-toggler .fa-bars').toggleClass('d-none');
					$('.top-right-menu-mobile').toggleClass('d-none');
				});
			},
			getArgs: function() {
				var args = new Object();
				var query = location.search.substring(1);  // Get query string.
				var pairs = query.split("&");              // Break at comma.
				for(var i = 0; i < pairs.length; i++) {
						var pos = pairs[i].indexOf('=');       // Look for "name=value".
						if (pos == -1) continue;               // If not found, skip.
						var argname = pairs[i].substring(0,pos);  // Extract the name.
						var value = pairs[i].substring(pos+1); // Extract the value.
						args[argname] = unescape(value);          // Store as a property.
				}
				return args;                               // Return the object.
			},
			isoInit: function(){

				if( $('.resource-filter-grid').length ){

					var args = SED.site.getArgs();
					var filter = args.filter;
					if( filter == null || filter == "****"){
						history.pushState(null, '', '?filter=****');
					}

						//init Isotope
						var $grid = $('.resource-gallery').isotope({
							itemSelector: '.resource-tile ',
							layoutMode: 'masonry',
							masonry: {
						    horizontalOrder: true
						  }
						});

						// store filter for each group
						var filters = {};

						//flatten and concatenate values
						function concatValues( obj ) {
							var value = '';
							for ( var prop in obj ) {
								value += obj[ prop ];
							}
							return value;
						}

						$('select').on( 'change', function( event ) {
							var $select = $( event.target );
							// get group key
							var filterGroup = $select.attr('value-group');
							// set filter for group
							filters[ filterGroup ] = event.target.value;
							// combine filters
							var filterValue = concatValues( filters );
							// set filter for Isotope
							$grid.isotope({ filter: filterValue });

							history.pushState(null, '', '?filter='+filterValue);
							//console.log('?combo='+filterValue);
						});


						if( filter != "****" && filter != null ){
							//filter = filter.replace('*','');
							var filter_arrary = filter.split('.');

							$('option').each( function(){
								//console.log( $(this).val() );
								if( '.'+filter_arrary[0] == $(this).val() ){
									$(this).parent('select').val( '.'+filter_arrary[0] );
								}
								if( '.'+filter_arrary[1] == $(this).val() ){
									$(this).parent('select').val( '.'+filter_arrary[1] );
								}
								if( '.'+filter_arrary[2] == $(this).val() ){
									$(this).parent('select').val( '.'+filter_arrary[2] );
								}
								if( '.'+filter_arrary[3] == $(this).val() ){
									$(this).parent('select').val( '.'+filter_arrary[3] );
								}
								$( "select" ).trigger( "change" );

							});

						}



						$('#for_type').on('click', function(){
							$('#type_filter').click();
						});
						$('#for_process').on('click', function(){
							$('#process_filter').click();
						});
						$('#for_industry').on('click', function(){
							$('#industry_filter').click();
						});
						$('#for_product_type').on('click', function(){
							$('#product_type_filter').click();
						});




				}

				if( $('.search-results-grid').length  ){
					//init Isotope
					setTimeout(function() {
						var $grid = $('.search-results-grid').isotope({
							itemSelector: '.tile ',
							layoutMode: 'masonry',
							masonry: {
								horizontalOrder: true
							}
						});
					}, 1000);

				}

			},
			headerSearch: function(){

				var windowWidth = SED.site.windowWidth();
				if( windowWidth < 991){
					var li_width = $('.li-icon').outerWidth();
					var fb_width = $('.fb-icon').outerWidth();
					var btn_width = $('#searchsubmit').outerWidth() + 45;
					var space = li_width + fb_width + btn_width;

					$('#siteSearch').css('width', 'calc(100% - '+space+'px)');
				}else{
					$('#siteSearch').attr('style', '');
				}


			},
			sidebarMenu: function(){

				$('#menu-services-menu > li.menu-item-has-children > ul').each( function(){
					var outerHeight = $(this).outerHeight();
					$(this).attr('data-height', outerHeight + 'px' );
					if( !$(this).closest('li').hasClass('current-menu-parent') ){
						$(this).css('height', '0');
						$(this).closest('li').removeClass('active');
					}else{
						$(this).css('height', outerHeight+'px');
						$(this).closest('li').addClass('active');
					}

				});

				$('#menu-services-menu > li.menu-item-has-children > a').on( 'click', function(e){
					e.preventDefault();
					if( $(this).next('ul.sub-menu').outerHeight() == 0 ){
						//alert( $(this).next('ul.sub-menu').attr('data-height') );
						$(this).next('ul.sub-menu').css('height', $(this).next('ul.sub-menu').attr('data-height') );
					}else{
						$(this).next('ul.sub-menu').css('height', '0' );
					}
					$(this).closest('li.menu-item-has-children').toggleClass('active');
				});


			},
			testimonialCarousel: function(){

				var tallest_height = 0;
				var this_height = 0;
				$('.testimonial-carousel-item').each( function(){

						var this_height = $(this).height();
						// console.log(this_height);
						// $(this).height(this_height);
						if( this_height > tallest_height ){
							tallest_height = this_height;
						}
				});
				$('.carousel-item').height(tallest_height);
				$('.carousel-item').removeClass('active');
				$('.carousel-item:first-child').addClass('active');

			},
			getArgs: function() {
				var args = new Object();
				var query = location.search.substring(1);  // Get query string.
				var pairs = query.split("&");              // Break at comma.
				for(var i = 0; i < pairs.length; i++) {
						var pos = pairs[i].indexOf('=');       // Look for "name=value".
						if (pos == -1) continue;               // If not found, skip.
						var argname = pairs[i].substring(0,pos);  // Extract the name.
						var value = pairs[i].substring(pos+1); // Extract the value.
						args[argname] = unescape(value);          // Store as a property.
				}
				return args;                               // Return the object.
			},
			blogIsotope: function(){
				if( $('.blog-grid-category-filter').length ){
					var initial_items = 6;
					var show_items = 6;

					// $('html').css('overflow-y', 'scroll');

					var $grid = $('.blog-roll');
					$grid.isotope({
					  layoutMode: 'vertical',
						// masonry: {
					  //   horizontalOrder: true
					  // }
					});

						var args = SED.site.getArgs();
						var filter = args.topic;
						if( filter == null || filter == ".all"){
							history.pushState(null, '', '?topic=.all');
						}else{
							$grid.isotope({ filter: filter });
						}


						$('.select_filter_wrap').on( 'click', 'button', function() {
						  var filterValue = $(this).attr('data-filter');
						  // use filter function if value matches
						  //filterValue = filterFns[ filterValue ] || filterValue;
						  $grid.isotope({ filter: filterValue });
							history.pushState(null, '', '?topic='+filterValue);
							load_initial();
						});

						//triggering 1 time here... need to delete?
						load_initial();

						function load_initial(){
							var counter = 0;
							console.log('loading initial');
							console.log(initial_items);


								var iso = $grid.data('isotope');

								if(iso==undefined){
									return;
								}

								if(iso!==undefined){
									var filtered_items = iso.filteredItems;


								filtered_items.forEach(function(item,i){
									//console.log('INDEX:'+i);
									counter = parseInt(i+1);
									//console.log(counter);
									if(counter <= initial_items){
										console.log('hi there');
										$(item.element).addClass('visible');
										$(item.element).removeClass('hidden');
									}else{
										console.log('bye there');
										$(item.element).addClass('hidden');
										$(item.element).removeClass('visible');
										//console.log(item);
									}
								});
								setTimeout( $grid.isotope('layout'), 2000);
								///;

								}

							/*$grid.find('.blog-tile-wrap').each(function(e){
								counter++;

								if(counter<=initial_items){
									//$(this).addClass('visible');
									$(this).toggleClass('hidden');
								}else{
									//$(this).addClass('hidden');
								}
							});*/
							$grid.isotope('layout');
							iso_show_more();
						}

						function iso_show_more(){
							var iso = $grid.data('isotope');

							//console.log(iso.filteredItems.length);
							// add class to first 6 elements
							/*
							iso.filteredItems.forEach( function( item, i ) {
							  if ( i < 6 ) {
							    $( item.element ).addClass('first-6');
							  }
							});
							*/
							//Need to make show more hide if total value is already set visible
						console.log('in iso_show_more show more');
							if(iso.filteredItems.length < initial_items){
								//show show more button
								$('#showMore').css('display','none');
							}else{
								//show show more button
								$('#showMore').css('display','block');
							}

						}

						$('#showMore').on('click',function(){
							//console.log('hi!');
							//var filtered_items = $grid.isotope('getFilteredItems');
							var iso = $grid.data('isotope');

							console.log('TOTAL ITEMS:'+iso.filteredItems.length);
							var curr_filtered = iso.filteredItems.length;
							var curr_vis = $('.visible').length;
							//don't need to worry about counting as the button won't show if it doesn't need to
							iso.filteredItems.forEach( function( item, i ) {




								//console.log('item '+item);
								//console.log('i '+i);
								//console.log('Curr vis'+curr_vis);
								//console.log('Show items'+show_items);
								//maybe count howmany are currently visible, then go from there
							  if ( i < parseInt(curr_vis + show_items)){
									console.log('COMBO AMOUNT'+parseInt(curr_vis + show_items));
									$(item.element).addClass('visible');
									$(item.element).removeClass('hidden');
								}else{
									//console.log('bye there');
									$(item.element).addClass('hidden');
									$(item.element).removeClass('visible');
								}
							});

							if (parseInt(curr_vis + show_items) <= curr_filtered){
								console.log('show me!');
							}else{
								console.log('hide me!');
								$('#showMore').css('display','none');
							}

							$grid.isotope('layout');

						});



				}

			},
		};  //init
}(); // HEAD

// HELPER METHODS

$( document ).ready(function() {
  SED.site.init();
});

})(jQuery);
