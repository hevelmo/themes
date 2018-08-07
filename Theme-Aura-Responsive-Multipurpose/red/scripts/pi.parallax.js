/*
 Plugin: PI Parallax
 Version 1.0.0
 Author: Pavel Shlykov

 Dual licensed under the MIT and GPL licenses:
 http://www.opensource.org/licenses/mit-license.php
 http://www.gnu.org/licenses/gpl.html
 */

jQuery(function($) {
	var $w = $(window),
		$d = $(document),
		windowHeight = $w.height(),
		elements = [];

	$w.resize(function () {
		windowHeight = $w.height();
	});

	$.fn.parallax = function () {

		$(this).each(function () {

			var $el = $(this),
				el = {
					$el: $el,
					t: $el.offset().top,
					x: $el.data('parallaxX') || '50%',
					y: $el.data('parallaxY') || 0,
					s: $el.data('parallaxSpeed') || 0.5,
					h: getHeight($el, ($el.data('parallaxOuterHeight') || 1))
				};

			elements.push(el);

		});

	};

	$d.on('piBoundChanged', function(){
		checkParallaxState();
	});
	checkParallaxState();

	function checkParallaxState(){
		if(window.piCurrentBound == 'lg'){
			enableParallax();
		} else {
			disableParallax();
		}
	}

	function update() {
		var scrollTop = $w.scrollTop();

		for (var i = 0; i < elements.length; i++) {
			var o = elements[i];
				o.t = o.$el.offset().top;
				o.h = getHeight(o.$el, 1);

			if (o.t + o.h > scrollTop && o.t < scrollTop + windowHeight) {
				o.$el.css('backgroundPosition', o.x + " " + Math.round((o.t - scrollTop + o.y) * o.s) + "px");
			}
		}
	}

	function getHeight($el, outerHeight) {
		if (outerHeight) {
			return $el.outerHeight(true);
		} else {
			return $el.height();
		}
	}

	function enableParallax(){
		$w.on('scroll.piParallax resize.piParallax', update);
		update();
	}

	function disableParallax(){
		$w.off('scroll.piParallax resize.piParallax');
		for (var i = 0; i < elements.length; i++) {
			var o = elements[i];
			o.$el.css('backgroundPosition', '');
		}
	}


});