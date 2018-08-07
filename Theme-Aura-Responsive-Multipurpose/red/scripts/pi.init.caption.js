jQuery(function($){

	//region Captions animations
	$('.pi-overlay-slide:not(.pi-caption-opened)').each(function () {
		var $caption = $(this),
			$parent = $caption.parents('.pi-img-w'),
			height = $caption.outerHeight(true);

		if ($caption.hasClass('pi-show-heading')) {
			height -= $caption.find('h2,h3,h4,h5,h6').eq(0).outerHeight(true) + parseInt($caption.css('padding-top'), 10);
		}

		$caption.css({
			bottom: -height,
			visibility: 'visible'
		});

		$parent.hover(function () {
			$caption.css({
				bottom: 0
			})
		}, function () {
			$caption.css({
				bottom: -height
			})
		});

	});
	//endregion

});