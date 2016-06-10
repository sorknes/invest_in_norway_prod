/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
        // Hide Header on on scroll down
        var didScroll;
        var lastScrollTop = 0;
        var delta = 5;
        var navbarHeight = $("header").outerHeight();

        $(window).scroll(function(event) {
            didScroll = true;
        });

        function hasScrolled() {
            var st = $(this).scrollTop();

            // Make sure they scroll more than delta
            if (Math.abs(lastScrollTop - st) <= delta) {
                return;
            }

            // If they scrolled down and are past the navbar, add class .nav-up.
            // This is necessary so you never see what is "behind" the navbar.
            if (st > lastScrollTop && st > navbarHeight) {
                // Scroll Down
                $("header.main-header").removeClass("nav-down").addClass("nav-up");
            } else {
                // Scroll Up
                if (st + $(window).height() < $(document).height()) {
                    $("header.main-header").removeClass("nav-up").addClass("nav-down");
                }
            }

            lastScrollTop = st;
        }

        setInterval(function() {
            if (didScroll) {
                hasScrolled();
                didScroll = false;
            }
        }, 300);

        // Smooth scroll
        $('a[href^="#"]').click(function(){
			$('html, body').animate({
				scrollTop: $( $.attr(this, 'href') ).offset().top
			}, 1000);

			return false;
		});

        // Parallax
		var top_header = $('.jumbo-wrapper');
			top_header.css({'background-position' : 'center center'}); // better use CSS

		$(window).scroll(function () {
			var st = $(this).scrollTop();
			top_header.css({'background-position' : 'center calc(50% + '+ (st * 0.25) +'px)'});
		});
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
        // Isotope
		$(window).load(function(){
			$('.grid').isotope();
		});

		$('.grid').isotope({
			itemSelector: '.grid-item',
			percentPosition: true,
			masonry: {
				columnWidth: '.grid-sizer'
			}
		});
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // Resources page
    'category': {
      init: function() {
        // JavaScript to be fired on the home page
        // Isotope
		$(window).load(function(){
			$('.grid').isotope();
		});

		$('.grid').isotope({
			itemSelector: '.grid-item',
			percentPosition: true,
			masonry: {
				columnWidth: '.grid-sizer'
			}
		});
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    },
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
