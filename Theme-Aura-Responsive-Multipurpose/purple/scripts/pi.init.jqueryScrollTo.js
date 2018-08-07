jQuery(function($){

	//region Scroll To
	if($.fn.scrollTo){

		var $w = $(window),
			defaultOffset = -100,
			defaultOffsetMin = -20,
			defaultDuration = 750,
			defaultEasing = 'easeOutExpo';

		$('[data-scroll-to]').each(function(){

			var $el = $(this),
				target = $el.data('scrollTo'),
				duration = $el.data('scrollToDuration') || defaultDuration,
				offset = $el.data('scrollToOffset') || defaultOffset,
				initialOffset = offset,
				easing = $el.data('scrollToEasing') || defaultEasing;

			target = $(target).length ? $(target) : target;

			$el.bind('click', function(e){

				$.scrollTo.window().stop(true);

				if(window.piCurrentBound != 'lg'){
					offset = defaultOffsetMin;
				} else {
					offset = initialOffset;
				}

				$w.scrollTo(target, duration, {
					offset: offset,
					easing: easing
				});

				e.preventDefault();

			});

		});
	}
	//endregion

});