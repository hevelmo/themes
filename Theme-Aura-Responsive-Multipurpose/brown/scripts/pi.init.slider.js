jQuery(function($){

	//region Sliders
	if(typeof(PiSlider) === 'function'){
		$('.pi-slider').each(function(){
			var slider = new PiSlider($(this), {
				debug: 0,
				preload: $(this).data('sliderPreloader') !== undefined ? $(this).data('sliderPreloader') : 1,
				preloadDelay: $(this).data('sliderPreloaderDelay') !== undefined ? $(this).data('sliderPreloaderDelay') : 1000,
				circular: $(this).data('sliderCircular') !== undefined ? $(this).data('sliderCircular') : 1,
				enableSwipes: $(this).data('sliderSwipes') !== undefined ? $(this).data('sliderSwipes') : 1,
				enablePagination: $(this).data('sliderPagination') !== undefined ? $(this).data('sliderPagination') : 1,
				enableArrows: $(this).data('sliderArrows') !== undefined ? $(this).data('sliderArrows') : 1,
				enableKeys: $(this).data('sliderKeys') !== undefined ? $(this).data('sliderKeys') : 1,
				autoplayDelay: $(this).data('sliderAutoplayDelay') !== undefined ? $(this).data('sliderAutoplayDelay') : 0,
				action: $(this).data('sliderAction')
			});
		});
	}
	//endregion

});