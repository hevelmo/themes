jQuery(function ($) {

	//region Video Full Height
	var $w = $(window),
		$sections = $('.pi-section-video'),
		resizeTMT;

	function adjust($el) {

		var parent = $el.get(0).parent,
			parentW = parent.width(),
			parentH = parent.height(),
			parentAspectRatio = $el.get(0).parentAspectRatio = parentW / parentH,
			videoAspectRatio = $el.get(0).videoAspectRatio,
			videoInitialW = $el.get(0).videoInitialW,
			videoInitialH = $el.get(0).videoInitialH;

		if (parentAspectRatio > videoAspectRatio) {
			$el.css({
				width: parentW + 'px',
				height: 'auto',
				top: (parentH - parentW / videoAspectRatio) / 2 + 'px',
				left: 0
			});
		} else {
			$el.css({
				width: 'auto',
				height: parentH + 'px',
				top: 0,
				left: (parentW - parentH * videoAspectRatio) / 2 + 'px'
			});
		}

	}

	$sections.each(function () {
		var $el = $(this);
		$el.get(0).parent = $el.parent();
		$el.get(0).parentAspectRatio = $el.get(0).parent.width() / $el.get(0).parent.height();
		$el.get(0).videoAspectRatio = $el.width() / $el.height();
		$el.get(0).videoInitialW = $el.width();
		$el.get(0).videoInitialH = $el.height();
		adjust($el);
	});

	$w.resize(function () {
		clearTimeout(resizeTMT);
		resizeTMT = setTimeout(function () {

			$sections.each(function () {
				var $el = $(this);
				adjust($el);
			});

		}, 100);
	});

	//endregion

});