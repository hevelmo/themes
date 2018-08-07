jQuery(function ($) {

	//region init animations
	$('[data-animation]').each(function () {

		var $el = $(this),
			animationType = $el.data('animation'),
			animationDelay = $el.data('animationDelay') || 1,
			animationDirection = ~animationType.indexOf('Out') ? 'back' : 'forward';
		
		if(animationDirection == 'forward'){
			$el.one('inview', function () {
				setTimeout(function () {
					$el.addClass(animationType + ' visible');
				}, animationDelay);
			});
		} else {
			$el.addClass('visible');
			$el.one('click', function () {
				setTimeout(function () {
					$el.addClass(animationType);
				}, 0);
			});
		}

	});
	//endregion


});