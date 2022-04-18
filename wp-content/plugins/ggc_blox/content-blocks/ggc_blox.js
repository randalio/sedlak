/*
*
*  BLOX JS
*  Goldstein Group Communications - @2019 UID
*
*/

(function ($) {
	'use strict';

// GLOBAL VARIABLES

if (typeof BLOX == 'undefined') {
  var BLOX = {};
}

$.fn.isInViewport = function() {
	var elementTop = $(this).offset().top;
	var elementBottom = elementTop + $(this).outerHeight();
	var viewportTop = $(window).scrollTop();
	var viewportBottom = viewportTop + ($(window).height() - 100);
	return elementBottom > viewportTop && elementTop < viewportBottom;
};

BLOX.site = function() {
	return {

		init: function () {
			BLOX.site.initEvents();
		},

		initEvents: function () {

			// INIT JQUERY EVENTS
      BLOX.site.parallax();
      BLOX.site.revealOnScroll();
			BLOX.site.formFieldsSize();
			//BLOX.site.twoColBG_sizing();

			$(window).resize( function() {
        BLOX.site.parallax();
        BLOX.site.revealOnScroll();
				//BLOX.site.twoColBG_sizing();
			});

			 $(window).scroll(function() {
        BLOX.site.revealOnScroll();
        BLOX.site.parallax();
			 });
		},
		setHeightToTallest: function (elem) {
			elem.height('auto');
			let tallestHeight = 0;
			if (elem.length){
				elem.each(function(){
					let thisHeight = $(this).height();
					if(thisHeight > tallestHeight){
						tallestHeight = thisHeight;
					}
				});
				elem.height(tallestHeight);
			}
		},
    windowWidth: function(){
			let windowWidth = window.innerWidth ? window.innerWidth : $(window).width();
			return windowWidth;
		},
		windowHeight: function(){
			let windowHeight = window.innerHeight ? window.innerHeight : $(window).height();
			return windowHeight;
		},
		isElementVisible: function (element) {
			if(element.is(':visible')){
				//console.log('element is visible');
				return true;
			}
			else {
				//console.log('element is hidden');
				return false;
			}
		},
    parallax: function(elem) {
      let windowWidth = BLOX.site.windowWidth();
      if(575 < windowWidth){
        var scrolled = $(window).scrollTop()
        $('.parallax').each(function(index, element) {
          var initY = 0
          var height = $(this).height()
          var endY  = initY + $(this).height()
          var speed = $(this).data('speed');
          // Check if the element is in the viewport.
          var visible = BLOX.site.isElementVisible($(this));
          if(visible) {
            var diff = scrolled - initY
            var ratio = Math.round((diff / height) * 25)
            $(this).css('background-position','center ' + parseInt(-(ratio * speed)) + 'px')
          }
        });
      }
    },
		formFieldsSize: function() {
			if($('.form-block').length){
				$('li.gfield').each( function(){
					var $this = $(this),
					col = $this.find('input').attr('class');
					//$this.find('input').removeClass(col);
					$this.addClass(col);
				});
			};
    },
    revealOnScroll: function() {
		    $(".animate_this:not(.animated)").each(function(){
					if($(this).isInViewport()){
						console.log('animation');
						$(this).addClass('animated ' + $(this).data('animation')).removeClass('animate_this'); //fadeInUpBig fadeInUp
					}
				});
		 },
		 twoColBG_sizing: function() {
 		    if( $('.two-columns').length ){
					var rowWidth = $('.two-columns').outerWidth();
					let windowWidth = BLOX.site.windowWidth();

					var margin;
					margin = windowWidth - rowWidth;
					margin = margin / 2;

					$('.two-columns .col').each( function(){
						var $this = $(this);
						var colWidth = $this.outerWidth();
						var calcWidth = colWidth + margin;
						$this.find('.background_div').css('width', calcWidth+'px');
					});

				}
 		 }
	};
}();

// HELPER METHODS

$( document ).ready(function() {
  BLOX.site.init();
});

})(jQuery);
