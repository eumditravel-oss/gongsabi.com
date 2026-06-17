$(function() {
	// 메인 상단 슬라이더
	var main_slider = $('.main_slider').owlCarousel({
		autoplay: true,
	    autoplayTimeout: 5000,
	    autoplaySpeed: 1500,

    	center: true,
	    loop: true,
	    nav: false,
	    items: 1,
	    dots: false,
	    onChanged: function(event) {
	    	var index = event.item.index;
	    	var desc = $('.owl-item').eq(index).find('.item').attr('data-desc');
	    	if ( desc !== undefined )
	    		$('.main_slider_sub_title > span').html(desc);
	    }
	});

	$('.main_slider_arrow_r > a').click(function(e) {
		e.preventDefault();
	    main_slider.trigger('next.owl.carousel');
	});

	$('.main_slider_arrow_l > a').click(function(e) {
		e.preventDefault();
	    main_slider.trigger('prev.owl.carousel');
	});

	// 메인 중간 슬라이더
	var main_front_slider = $('.main_front_slider').owlCarousel({
		autoplay: true,
	    autoplayTimeout: 7000,
	    autoplayHoverPause: true,
	    loop: true,
	    nav: false,
	    items: 3,
	    dots: false,
	    margin: 47
	});

	$('.main_front_slider_arrow_r > a').click(function(e) {
		e.preventDefault();
	    main_front_slider.trigger('next.owl.carousel');
	});

	$('.main_front_slider_arrow_l > a').click(function(e) {
		e.preventDefault();
	    main_front_slider.trigger('prev.owl.carousel');
	});
});