(function($) {

	var init = function() {

	$(".modal").on('hidden.bs.modal', function (e) {
	    $(this).find("iframe").attr("src", $(this).find(" iframe").attr("src"));
	    $(this).find("fb_iframe_widget").attr("src", $(this).find(" fb_iframe_widget").attr("src"));
	});

	$( ".copyright p a" ).addClass( "secondary-color" );

	// $("#wpcf7-f369-o1 .wpcf7-form").addClass("input-group justify-content-center mb-3");

	// $( "#datepicker" ).datepicker({
	// 	minDate: new Date()
	// });

	// $( "#departure" ).datepicker({
	// 	minDate: new Date()
	// });

	$( ".wpcf7-form .input-group p" ).remove();

	$(".container .wp-pagenavi").addClass('text-center');

	$("#gallery .gallery-content .attachment-defgalleryFt").addClass('w-100');

	//MATCH HEIGHT
	$('.archive-watergate .card-body .card-text').matchHeight({
		byRow: 0,
		property: 'height'
	});

	$('.archive-watergate .card-body .card-title').matchHeight({
		byRow: 0,
		property: 'height'
	});

	$('.unique-right .content-box .text').matchHeight({
		byRow: 0,
		property: 'height'
	});

	$('.unique-right .content-box .title').matchHeight({
		byRow: 0,
		property: 'height'
	});

	$('.card .suite-body .card-text').matchHeight({
		byRow: 0,
		property: 'height'
	});

	$('.archive-watergate .card-img-top').matchHeight({
		byRow: 0,
		property: 'height'
	});

	$('.category-watergate .card-body').matchHeight({
		byRow: 0,
		property: 'height'
	});

	$('.category-watergate .card-img-top').matchHeight({
		byRow: 0,
		property: 'height'
	});

	$('.post-style-one .inner-box .image-box img').matchHeight({
		byRow: 0,
		property: 'height'
	});

	$('.suite-body .card-title').matchHeight({
		byRow: 0,
		property: 'height'
	});

	$('.gallery-single-content .gallMatch').matchHeight({
		byRow: 0,
		property: 'height'
	});

	// $('#bootstrap-touch-slider').bsTouchSlider();

	$(window).on('resize', function(){
		window_resize();
		// alert('success');
	});

	function window_resize() {
	    // $('#events').html($(window).width());
	    if($(window).width() > 767 && $(window).width() <= 991 ) {
	    	$('.up-event .unique-box').addClass('left-image').removeClass('top-image');
	    	$('.unique-left').addClass('col-md-6 float-left');
	    	$('.unique-right').addClass('col-md-6 float-right');
	    } else if($(window).width() >= 1024 ) {
	    	$('.up-event .unique-box').removeClass('left-image').addClass('top-image');
	    	$('.unique-left').removeClass('col-md-6 float-left');
	    	$('.unique-right').removeClass('col-md-6 float-right');
	    }
	};

	window_resize();


	var responsiveMenu = function() {
        var menuType = 'desktop';
 
        $(window).on('load resize', function() {
            var currMenuType = 'desktop';
 
            if ( matchMedia( 'only screen and (max-width: 1024px)' ).matches ) {
                currMenuType = 'mobile';
            }
 
            if ( currMenuType !== menuType ) {
                menuType = currMenuType;
 
                if ( currMenuType === 'mobile' ) {
                    // mobile logo should be inserted
                    $('#logoimage').attr('src','https://watergate.weareph.com/wp-content/uploads/2018/04/mobilelogo.png');
                    $('.inner-box .content-box').addClass('without-after-element');
                } else {
                    // desktop logo should be used.
                    $('#logoimage').attr('src','https://watergate.weareph.com/wp-content/uploads/2018/03/watergatelogo.png');
                    $('.inner-box .content-box').removeClass('without-after-element');
                }
            }
        });
    }

    responsiveMenu();


	$('.wg-nav .dropdown').hover(function() {
	$(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();

	}, function() {
	$(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp();

	});

	$('.navbar-nav .dropdown').append('<span class="btn-submenu" style="position: absolute; top: 5px; right: 5px; height: 30px; width: 45px; display: flex; align-items: center; justify-content: center; color: white;"><i class="fa fa-angle-down fa-2x"></i></span>');

	$('.wg-nav .dropdown').on('click', 'span.btn-submenu', function(e){
		e.preventDefault();
		var dropdown = $(this).parent().find('.dropdown-menu');
		if($(dropdown).is(':hidden')) {
			$(dropdown).show();
		} else {
			$(dropdown).hide();
		}
	});

	$('.wg-nav .dropdown > a').click(function(e) {
		e.preventDefault();
		location.href = this.href;
	});


	/*

	dependencies:

	//cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js
	//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js
	//cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js

	*/

	$(".carousel").swipe({

	  swipe: function(event, direction, distance, duration, fingerCount, fingerData) {

	    if (direction == 'left') $(this).carousel('next');
	    if (direction == 'right') $(this).carousel('prev');

	  },
	  allowPageScroll:"vertical"

	});

	 AOS.init({
        easing: 'ease-in-out-sine'
      });

	};

    // DOM Ready
    $(function() {
        init();
    });

})(jQuery);



