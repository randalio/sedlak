(function ($) {
	'use strict';

    $(document).ready(function(){

      // Populate images from data attributes.
      var scrolled = $(window).scrollTop()
      $('.parallax').each(function(index) {
          var imageSrc = $(this).data('image-src')
          var speed = $(this).data('speed');
          var imageHeight = $(this).data('height')
          $(this).css('background-image','url(' + imageSrc + ')')
          $(this).css('height', imageHeight)

          // Adjust the background position.
          var initY = 0
          var height = $(this).height()
          var diff = scrolled - initY
          var ratio = Math.round((diff / height) * 25)
          $(this).css('background-position','center ' + parseInt(-(ratio * speed)) + 'px')
      })

      // Attach scroll event to window. Calculate the scroll ratio of each element
      // and change the image position with that ratio.
      // https://codepen.io/lemagus/pen/RWxEYz
      $(window).scroll(function() {
        var scrolled = $(window).scrollTop()
        $('.parallax').each(function(index, element) {
          var initY = 0
          var height = $(this).height()
          var endY  = initY + $(this).height()
          var speed = $(this).data('speed');
          // Check if the element is in the viewport.
          var visible = isInViewport(this)
          if(visible) {
            var diff = scrolled - initY
            var ratio = Math.round((diff / height) * 25)
            $(this).css('background-position','center ' + parseInt(-(ratio * speed)) + 'px')
          }
        });

      })
    })



    // Check if the element is in the viewport.
    // http://www.hnldesign.nl/work/code/check-if-element-is-visible/
    function isInViewport(node) {
      // Am I visible? Height and Width are not explicitly necessary in visibility
      // detection, the bottom, right, top and left are the essential checks. If an
      // image is 0x0, it is technically not visible, so it should not be marked as
      // such. That is why either width or height have to be > 0.
      var rect = node.getBoundingClientRect()
      return (
        (rect.height > 0 || rect.width > 0) &&
        rect.bottom >= 0 &&
        rect.right >= 0 &&
        rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.left <= (window.innerWidth || document.documentElement.clientWidth)
      )
    }

		$(function () {

		  var $window = $(window)

		  $window.on('scroll', revealOnScroll);

		  function() {
		    var scrolled = $window.scrollTop(),
		    win_height_padded = $window.height() * 1.1;

		    // Showed...
		    $(".animate_this:not(.animated)").each(function () {
		      var $this = $(this),
		      offsetTop = $this.offset().top;

		      if (scrolled + win_height_padded > offsetTop) {
		        if ($this.data('timeout')) {
		          window.setTimeout(function () {
		            $this.addClass('animated ' + $this.data('animation')).removeClass('animate_this');
		          }, parseInt($this.data('timeout'), 10));
		        } else {
		          $this.addClass('animated ' + $this.data('animation')).removeClass('animate_this');
		        }
		      }
		    });
		    // Hidden...
		    $(".animate_this.animated").each(function (index) {
		      var $this = $(this),
		      offsetTop = $this.offset().top;
		      if (scrolled + win_height_padded < offsetTop) {
		        //$(this).removeClass('animated');
		      }
		    });
		  }

		  revealOnScroll();
		});


})(jQuery);
