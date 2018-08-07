function PiImagesLoader($el, callback, delay) {

	var o = {},
		$ = jQuery;

	o.$el = $el ? typeof($el) == 'string' ? jQuery($el) : $el : 0;
	o.$imgs = o.$el.find('img');
	o.imgsQ = o.$imgs.length;
	o.imgsQ_loaded = 0;
	o.delay = delay ? delay : 0;
	o.started = 0;
	o.loaderShown = 0;
	o.$loadingAnimation = 0;
	o.$dots = 0;

	o.s = {
		c: {}
	};
	o.s.dotDistance = 14;
	o.s.dotQuantity = 3;
	o.s.dotAnimationSpeed = 100;
	o.s.c.loading = 'pi-loader';
	o.s.c.dot = 'pi-loader-dot';
	o.s.c.dotActive = 'pi-loader-dot-active';
	o.callback = (callback && (typeof(callback) == 'function')) ? callback : function () {
	};

	o.addLoadingAnimation = function () {

			o.loaderShown = true;

			var appendHtml = '<span class="' + o.s.c.loading + '"><span><span>';

			for (var i = 0; i < o.s.dotQuantity; i++) {
				appendHtml += '<span class="' + o.s.c.dot + '"></span>';
			}

			appendHtml += '</span></span></span>';

			$(appendHtml).appendTo(o.$el);

			o.$loadingAnimation = o.$el.find('.' + o.s.c.loading);
			o.$dots = o.$loadingAnimation.find('.' + o.s.c.dot);

			o.activeDotNum = 0;

			requestAnimationFrame(o.loadingDotsAnimate, o.$el);

	}

	o.hideLoadingAnimation = function () {
		o.loaderShown = 0;
		o.$dots.each(function () {
			$(this).removeClass(o.s.c.dotActive);
		});
		o.$loadingAnimation.remove();
	}

	o.loadingDotsAnimate = function (time) {

			if(!o.$loadingAnimation) {
				return;
			}
			if(!o.loadingAnimationStartTime) {
				o.loadingAnimationStartTime = time;
			}

			var needToRedraw = (time - o.loadingAnimationStartTime) >= 200 ? 1 : 0;

			if (needToRedraw) {

				o.loadingAnimationStartTime = time;

				var $currentDot = o.$dots.eq(o.activeDotNum),
					$previousDot = $currentDot.prev();

				if (!$previousDot.get(0)) {
					$previousDot = o.$dots.eq(o.s.dotQuantity - 1);
				}

				$currentDot.addClass(o.s.c.dotActive);
				$previousDot.removeClass(o.s.c.dotActive);

				o.activeDotNum++;

				if (o.activeDotNum >= o.s.dotQuantity + 1) {
					o.activeDotNum = 0;
				}
			}
			requestAnimationFrame(o.loadingDotsAnimate);

	}

	o.check_images_states = function () {

		o.$imgs.each(function(){

			var oldImg = new Image(),
				newImg = new Image(),
				imgSrc = $(this).attr('src');

			oldImg.src = imgSrc;

			if (oldImg.complete) {
				o.image_was_loaded();
			} else {

				jQuery(newImg).load(function () {
					o.image_was_loaded();
				}).error(function () {
						o.image_was_loaded();
					});

				newImg.src = imgSrc;

			}

		});

		o.addLoadingAnimation();

	}

	o.image_was_loaded = function () {
		o.imgsQ_loaded++;
		o.check_ready_state();
	}

	o.check_ready_state = function () {

		if (o.imgsQ == o.imgsQ_loaded && !o.started) {

			o.started = true;

			setTimeout(function () {
				o.callback();
				if (o.loaderShown) {
					o.hideLoadingAnimation();
				}
			}, o.delay);

		}

	}

	o.init = function () {
		if (o.imgsQ > 0) {
			o.check_images_states();
		} else {
			o.callback();
		}
	}

	o.init();
}