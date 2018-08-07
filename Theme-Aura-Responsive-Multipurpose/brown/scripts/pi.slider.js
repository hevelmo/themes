
function PiSlider(el, options) {

	var o = {},
		$ = jQuery;

	o.$el = el;

	o.s = {
		speed: 2000,
		slideDelay: 35,
		autoplayDelay: 0,
		preload: 0,
		preloadDelay: 1000,
		action: 'fade',
		circular: 0,
		enableArrows: 0,
		enablePagination: 0,
		enableSwipes: 0,
		enableKeys: 0,
		c: {
			pane: 'pi-slider',
			paneWrapper: 'pi-slider-wrapper',
			paneFast: 'pi-slider-fast',
			slide: 'pi-slide',
			slideTransparent: 'pi-slide-transparent',
			pagination: 'pi-slider-pagination',
			page: 'pi-slider-page',
			arrow: 'pi-slider-arrow',
			arrowLeft: 'pi-slider-arrow-left',
			arrowRight: 'pi-slider-arrow-right',
			slideActive: 'pi-slide-active',
			pageActive: 'pi-slider-page-active',
			arrowActive: 'pi-slider-arrow-active',
			arrowDisabled: 'pi-slider-arrow-disabled'
		},
		debug: 0
	};

	if (options) {
		$.extend(o.s, options);
	}

	o.init = function () {
		o.$doc = $(document);
		o.cssTransisions = 1;
		o.$paneWrapper = o.$el.parents('.' + o.s.c.paneWrapper).eq(0);
		o.$pane = o.$el.hasClass(o.s.c.pane) ? o.$el : o.$el.find('.' + o.s.c.pane);
		o.$slides = o.$el.find('.' + o.s.c.slide);
		o.autoPlayInterval = 0;
		o.slidesQ = o.$slides.length;

		if (o.slidesQ <= 0) {
			return;
		}

		o.slideWidth = o.$slides.eq(0).width();
		o.slideOuterWidth = o.$slides.eq(0).outerWidth();
		o.slideMargin = (o.slideOuterWidth - o.slideWidth) / 2;
		o.slidesWidth = o.slideOuterWidth * o.slidesQ;
		o.sceneWidth = o.$paneWrapper.width();
		o.margin = (o.sceneWidth - o.slideWidth) / 2;
		o.way = o.slideWidth - o.margin;

		o.slidesTransparent = [];

		o.current = -1;

		if (o.s.debug) {
			console.log('SCENE' + o.sceneWidth);
			console.log('MARGIN' + o.margin);
			console.log('WAY' + o.way);
		}

		o.beforeStart();
		o.addSwipeActions();
	}

	o.beforeStart = function () {
		if (o.s.preload) {
			var preloader = new PiImagesLoader(o.$paneWrapper, o.start, o.s.preloadDelay);
		} else {
			o.start();
		}
	}

	o.start = function () {

		if (o.s.enablePagination && o.slidesQ > 1) {

			o.$paneWrapper.append('<div class="' + o.s.c.pagination + '"></div>');
			o.$pagination = o.$paneWrapper.find('.' + o.s.c.pagination);

			var n = 0;
			o.$slides.each(function () {

				if (n == 0) {
					active = o.s.c.pageActive;
				} else {
					active = '';
				}

				o.$pagination.append('<span class="' + o.s.c.page + ' ' + active + '"><span></span></span>');
				n++;
			});

			o.$pages = o.$pagination.find('.' + o.s.c.page);

			o.$pages.click(function () {
				var n = $(this).index();

				if (o.current != n) {
					o.applyAnimation(n);
				}

			});
			if(o.s.action == 'slide'){
				o.prepareSlides();
			}

		}

		if (o.s.enableArrows && o.slidesQ > 1) {

			o.$paneWrapper.append('<div class="' + o.s.c.arrow + ' ' + o.s.c.arrowLeft +' "><span></span></div>');
			o.$paneWrapper.append('<div class="' + o.s.c.arrow + ' ' + o.s.c.arrowRight +' "><span></span></div>');
			o.$leftArrow = o.$paneWrapper.find('.' + o.s.c.arrowLeft);
			o.$rightArrow = o.$paneWrapper.find('.' + o.s.c.arrowRight);

			if(!o.s.circular) {
				o.$leftArrow.addClass(o.s.c.arrowDisabled);
			}

			o.$leftArrow.click(function () {
				o.toPrev();
			});
			o.$rightArrow.click(function () {
				o.toNext();
			});
		}

		if (o.s.enableKeys && o.slidesQ > 1) {

			o.$doc.keydown(function (e) {
				if ((e.keyCode || e.which) == '37') {
					o.toPrev();
				} else if ((e.keyCode || e.which) == '39') {
					o.toNext();
				}
			});

		}

		o.applyAnimation(0);
		if(o.s.autoplayDelay){
			o.startAutoplay();
		}

		o.resizeGallery();

	}

	o.applyAnimation = function (n, f) {

		if (!f) {
			f = 0;
		}

		if (o.s.action == 'slide') {
			o.moveSlide(n, f);
		} else if (o.s.action == 'fade') {
			o.fadeSlide(n);
		}

		o.current = n;
		o.checkArrowsState(n);
		o.checkPagesState(n);

	}

	o.checkPagesState = function (n) {
		if (o.s.enablePagination && o.slidesQ > 1) {
			o.$pages.removeClass(o.s.c.pageActive);
			o.$pages.eq(n).addClass(o.s.c.pageActive);
		}
	}

	o.checkArrowsState = function (n) {
		if (o.s.enableArrows && o.slidesQ > 1 && !o.s.circular) {
			if (n == 0) {
				o.$leftArrow.addClass(o.s.c.arrowDisabled);
			} else {
				o.$leftArrow.removeClass(o.s.c.arrowDisabled);
			}
			if (n == o.slidesQ - 1) {
				o.$rightArrow.addClass(o.s.c.arrowDisabled);
			} else {
				o.$rightArrow.removeClass(o.s.c.arrowDisabled);
			}
		}
	}

	o.moveSlide = function(n, f) {

		var fast = f || 0,
			speed = fast ? 0 : o.s.speed,
			$prev = o.$slides.eq(o.current),
			$next = o.$slides.eq(n);

		$prev.removeClass(o.s.c.slideActive);

		if(!o.cssTransisions){
			$prev.stop().animate({
				left: -o.slideOuterWidth,
				opacity: 0
			}, speed, 'easeInOutExpo',function(){
				$(this).css({
					left: o.slideOuterWidth
				});
			});
			$next.stop().animate({
				left: 0,
				opacity: 1
			}, speed, 'easeInOutExpo');
			$next.addClass(o.s.c.slideActive);

		} else {
			$prev.css({
				'-webkit-transform': 'translateX(' + -o.slideOuterWidth + 'px)',
				'-moz-transform': 'translateX(' + -o.slideOuterWidth + 'px)',
				'-o-transform': 'translateX(' + -o.slideOuterWidth + 'px)',
				'transform': 'translateX(' + -o.slideOuterWidth + 'px)'
			});
			$next.addClass('pi-no-transitions').css({
				'-webkit-transform': 'translateX(' + o.slideOuterWidth + 'px)',
				'-moz-transform': 'translateX(' + o.slideOuterWidth + 'px)',
				'-o-transform': 'translateX(' + o.slideOuterWidth + 'px)',
				'transform': 'translateX(' + o.slideOuterWidth + 'px)'
			});
			//debugger;
			setTimeout(function(){
				$next.removeClass('pi-no-transitions').addClass(o.s.c.slideActive).css({
					'-webkit-transform': 'translateX(' + 0 + 'px)',
					'-moz-transform': 'translateX(' + 0 + 'px)',
					'-o-transform': 'translateX(' + 0 + 'px)',
					'transform': 'translateX(' + 0 + 'px)'
				});
			},10);
		}

	}


	o.fadeSlide = function (n) {

		var $prev = o.$slides.eq(o.current),
			$next = o.$slides.eq(n);

		$prev.removeClass(o.s.c.slideActive);
		$next.addClass(o.s.c.slideActive);

		if(!o.cssTransisions){
			$next.stop().animate({
				opacity: 1
			}, o.s.speed, 'easeOutQuad', function () {
				$prev.fadeTo(0, 0);
			});
		}

	}

	o.prepareSlides = function () {

		o.$slides.each(function(i){
			if(i != 0) {
				if (o.cssTransisions) {
					$(this).css({
						'-webkit-transform': 'translateX(' + o.slideOuterWidth + 'px)',
						'-moz-transform': 'translateX(' + o.slideOuterWidth + 'px)',
						'-o-transform': 'translateX(' + o.slideOuterWidth + 'px)',
						'transform': 'translateX(' + o.slideOuterWidth + 'px)'
					});
				} else {
					$(this).css({
						'left': o.slideOuterWidth + 'px'
					});
				}
			}
		});

	}

	o.toNext = function () {
		if (o.current < o.slidesQ - 1) {
			o.applyAnimation(o.current + 1);
		} else if(o.s.circular){
			o.applyAnimation(0);
		}
	}

	o.toPrev = function () {
		if (o.current > 0) {
			o.applyAnimation(o.current - 1);
		} else if(o.s.circular){
			o.applyAnimation(o.slidesQ - 1);
		}
	}

	o.startAutoplay = function(){
		o.autoPlayInterval = setInterval(function(){
			o.toNext();
		}, o.s.autoplayDelay);
	}

	o.stopAutoplay = function(){
		clearInterval(o.autoPlayInterval);
	}

	o.resizeGallery = function () {
		/*o.slideOuterWidth = o.$slides.eq(0).outerWidth();
		o.sceneWidth = o.$paneWrapper.width();
		o.margin = (o.sceneWidth - o.slideOuterWidth) / 2;

		if (o.s.action == 'fade') {
			o.$pane.css('left', o.margin);
		}*/
	}

	o.addSwipeActions = function() {
		if(o.s.enableSwipes && $.fn.swipe && typeof($.fn.swipe) === 'function') {
			o.$pane.swipe({
				swipeStatus:function(event, phase, direction, distance, duration, fingers){
					if (phase == 'end'){
						if(direction == 'left'){
							o.toNext();
						} else if(direction == 'right'){
							o.toPrev();
						}
					}
				},
				allowPageScroll:"vertical",
				excludedElements:''
			});
		}
	}

	o.init();

	return o;

}
