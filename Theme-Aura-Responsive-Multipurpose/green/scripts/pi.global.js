

/*_____ scripts/pi.helpers.js*/

//region getViewportSize
function getViewportSize(){
	var e = window, a = 'inner';
	if (!('innerWidth' in window )) {
		a = 'client';
		e = document.documentElement || document.body;
	}
	return { width : e[ a+'Width' ] , height : e[ a+'Height' ] };
}
//endregion

//region old IE rgba backgrounds fix
function fixIE8rgba() {
	var $ = jQuery;

	if(isOldIE() === 8){
		var selectors = [
				'.pi-tooltip'
			],
			$elements = $(selectors.join(','));
		$elements.each(function(){
			var $el = $(this),
				bg = $el.css('background'),
				rgba = bg.match(/rgba\((\d{1,3}),(\d{1,3}),(\d{1,3}),(\d{1,3})\)/),
				hex = rgba ? rgba2hex(rgba[1],rgba[2],rgba[3],rgba[4]) : '#000000';
			if(rgba && hex){
				$el.css('background', 'filter: progid:DXImageTransform.Microsoft.gradient(startColorStr=' + hex + ', EndColorStr=' + hex + ')')
			}
		});
	}
}
//endregion

//region old IE detection
function isOldIE() {
	var version = navigator.appVersion.match(/MSIE (\d)\.\d*/);
	if(version){
		return version[1];
	}
	return false;
}
//endregion

//region RGB -> HEX
var hexDigits = new Array
("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f");

function rgb2hex(rgb) {
	if(!rgb) {
		rgb ='rgb(0,0,0)';
	}
	rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
	return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
}

function hex(x) {
	return isNaN(x) ? "00" : hexDigits[(x - x % 16) / 16] + hexDigits[x % 16];
}
//endregion

//region RGBA -> HEX
function rgba2hex(r, g, b, a) {
	if (r > 255 || g > 255 || b > 255 || a > 255)
		throw "Invalid color component";
	return (256 + r).toString(16).substr(1) +((1 << 24) + (g << 16) | (b << 8) | a).toString(16).substr(1);
}
//endregion

function getElementHeight($el){
	var $ = jQuery,
		h = 0,
		vis = $el.css('visibility'),
		display = $el.css('display');

	if(display == 'none' || display == 'none !important'){
		$el.css({
			visibility: 'hidden',
			display: 'block'
		});
		h = $el.outerHeight();
		$el.css({
			visibility: vis,
			display: display
		});
	} else {
		h = $el.outerHeight();
	}
	return h;
}


/*_____ scripts/pi.boundManager.js*/
var piBounds = {
	lg: 1140,
	md: 992,
	sm: 768,
	xs: 480,
	xs2: 320
};

jQuery(function($){

	var $w = $(window),
		$d = $(document),
		resizeTMT;

	window.piViewportSize = getViewportSize();
	window.piViewportWidth = window.piViewportSize.width;
	window.piViewportHeight = window.piViewportSize.height;
	window.piCurrentBound = piBounds[0];

	function checkBound(){

		var previousBound = window.piCurrentBound;

		window.piViewportSize = getViewportSize();
		window.piViewportWidth = window.piViewportSize.width;
		window.piViewportHeight = window.piViewportSize.height;

		if(window.piViewportWidth >= piBounds.lg && window.piCurrentBound != 'lg'){
			window.piCurrentBound = 'lg';
		} else if(window.piViewportWidth >= piBounds.md && window.piViewportWidth < piBounds.lg && window.piCurrentBound != 'md') {
			window.piCurrentBound = 'md';
		} else if(window.piViewportWidth >= piBounds.sm && window.piViewportWidth < piBounds.md && window.piCurrentBound != 'sm') {
			window.piCurrentBound = 'sm';
		} else if(window.piViewportWidth >= piBounds.xs && window.piViewportWidth < piBounds.sm && window.piCurrentBound != 'xs') {
			window.piCurrentBound = 'xs';
		} else if(window.piViewportWidth >= piBounds.xs2 && window.piViewportWidth < piBounds.xs && window.piCurrentBound != '2xs') {
			window.piCurrentBound = '2xs';
		} else if(window.piViewportWidth < piBounds.xs2 && window.piCurrentBound != '3xs') {
			window.piCurrentBound = '3xs';
		}
		if(previousBound != window.piCurrentBound){
			$d.trigger('piBoundChanged');
		}

	}

	$w.resize(function(){
		clearTimeout(resizeTMT);
		resizeTMT = setTimeout(function(){
			checkBound();
		}, 10);
	});

	$w.trigger('resize');


});


/*_____ scripts/pi.imagesLoader.js*/
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


/*_____ scripts/pi.ddMenu.js*/
jQuery(function($){

	var $w = $(window),
		$mainWrapperWidth = $('#pi-all').width(),
		mainWrapDifference = (window.piViewportWidth - $mainWrapperWidth)/2,
		classLeftSide = 'pi-submenu-left-side';

	//region Menu DD side fix
	function checkMenus($submenu, initialOffset){
		var offset = $submenu.offset().left - mainWrapDifference,
			width = $submenu.width();
		if($mainWrapperWidth - offset < width){
			$submenu.addClass(classLeftSide);
		} else if($mainWrapperWidth - initialOffset > width) {
			$submenu.removeClass(classLeftSide);
		}
	}

	$('.pi-submenu').each(function(){

		var $el = $(this),
			initialOffset = $el.offset().left - mainWrapDifference,
			timer;

		$w.on('resize', function(){
			clearTimeout(timer);
			timer = setTimeout(function(){
				$mainWrapperWidth = $('#pi-all').width();
				mainWrapDifference = (window.piViewportWidth - $mainWrapperWidth)/2;
				checkMenus($el,initialOffset);
			}, 200);
		});
		checkMenus($el,initialOffset);

	});
	//endregion

});


/*_____ scripts/pi.init.removeLastElMargin.js*/
jQuery(function($){

	//region Remove Last Header Element Margin
	var $w = $(window),
		$hrs = $('.pi-section-header'),
		clsFloatRight = 'pi-pull-right',
		clsHeaderBlock = 'pi-row-block',
		tmt,
		hrObjects = [];

	$hrs.each(function(){
		var $curHr = $(this),
			$blocks = $curHr.find('.' + clsHeaderBlock).filter('.' + clsFloatRight);
		hrObjects.push({
			$hr: $curHr,
			$blocks: $blocks,
			currentBlock: false
		});
	});

	function checkHeaderBlocks(){
		for (var i = 0; i < hrObjects.length; i++) {

			var $curHr = hrObjects[i],
				$firstVisibleBlock = $curHr.$blocks.not(':hidden').first();

			if($firstVisibleBlock.length <1) {
				continue;
			}

			if(!$curHr.currentBlock || ($curHr.currentBlock.get(0) != $firstVisibleBlock.get(0) ) ){

				if($curHr.currentBlock) {
					$curHr.currentBlock.css({
						marginRight: $curHr.currentBlock.get(0).initialMarginRight + 'px'
					});
				}

				$curHr.currentBlock = $firstVisibleBlock;
				if(!$curHr.currentBlock.get(0).initialMarginRight){
					$curHr.currentBlock.get(0).initialMarginRight = parseInt($firstVisibleBlock.css('margin-right'), 10);
				}

				$firstVisibleBlock.css({
					marginRight: 0
				});

			}

		}
	}

	$w.resize(function(){

		clearTimeout(tmt);

		tmt = setTimeout(function(){

			checkHeaderBlocks();

		}, 300);

	});

	checkHeaderBlocks();

	//endregion

});




/*_____ scripts/pi.init.sectionHigh.js*/
jQuery(function($){

	//region Section Full Height
	var $w = $(window),
		$sections = $('.pi-section-high, .pi-block-high'),
		resizeTMT;

	$w.resize(function(){
		clearTimeout(resizeTMT);
		resizeTMT = setTimeout(function(){
			setSectionHeight();
		}, 100);
	});

	setSectionHeight();

	function setSectionHeight(){
		$sections.each(function(){
			var $el = $(this);
			$el.height(window.piViewportHeight);
		});
	}

	//endregion

});


/*_____ scripts/pi.fixedHeader.js*/
jQuery(function($){

	//region Fixed header
	var $w = $(window),
		$b = $('body'),
		classRow = 'pi-section-w',
		сlassFixedRow = 'pi-header-row-fixed',
		сlassFixedRows = 'pi-header-rows-fixed',
		сlassFixed = '',
		classReducible = 'pi-row-reducible',
		classReduced = 'pi-row-reduced',
		$stickyHeader = $('.pi-header-sticky'),
		$reducibleRow = $stickyHeader.find('.' + classReducible),
		rowsQuantity = $stickyHeader.find('.' + classRow).length,
		reduceTreshold = 400,
		stateFixed = 'default',
		stateReduce = 'default',
		headerTopOffset = 0 ,
		scrollTop = 0;

	if($stickyHeader.length){
		init();
		checkHeader();
	}

	function init(){

		scrollTop = $w.scrollTop();
		headerTopOffset += $stickyHeader.offset().top;

		сlassFixed = rowsQuantity > 1 ? сlassFixedRows : сlassFixedRow;

		$w.scroll(function(){
			scrollTop = $w.scrollTop();
			checkHeader();
		});
	}

	function checkHeader(){
		fixHeader();
		if($reducibleRow.length) {
			reduceHeader();
		}
	}

	function fixHeader(){
		if(scrollTop >= headerTopOffset){
			if(stateFixed == 'default'){
				requestAnimationFrame(function(){
					$b.addClass(сlassFixed);
				});
				stateFixed = 'fixed';
			}
		} else {
			if(stateFixed == 'fixed'){
				requestAnimationFrame(function(){
					$b.removeClass(сlassFixed);
				});
				stateFixed = 'default';
			}
		}
	}

	function reduceHeader(){
		var scrollTopExcess = scrollTop - headerTopOffset;

		if (scrollTopExcess > reduceTreshold && stateReduce != 'reduced') {
			requestAnimationFrame(function(){
				$reducibleRow.addClass(classReduced);
			});
			stateReduce = 'reduced';
		} else if(scrollTopExcess <= reduceTreshold && stateReduce != 'default') {
			requestAnimationFrame(function(){
				$reducibleRow.removeClass(classReduced);
			});
			stateReduce = 'default';
		}

	}

	//endregion

});


/*_____ scripts/pi.mobileMenu.js*/
jQuery(function ($) {

	//region Mobile menus
	var $d = $(document),
		$w = $(window),
		resizeTmt;

	new MobileMenus();

	function MobileMenus() {

		var mobileMenus = [],
			settings = {
				classMenuItemHasSubmenu: 'pi-has-dropdown',
				classParentRowWrapper: 'pi-header-row-sticky',
				classOpen: 'pi-menu-open',
				classParentRow: 'pi-section-header-w',
				classMenuWrapper: 'pi-section-menu-mobile-w',
				classMenu: 'pi-section-menu-mobile'
			};

		function init() {

			//remove targetting from regular menu in tablet wide mode.
			$('.' + settings.classMenuItemHasSubmenu).each(function(){
				$(this).find(' > a').on('click', function(e){
					if(window.piCurrentBound != 'lg'){
						e.preventDefault();
					}
				});
			});

			$('.pi-mobile-menu-toggler').each(function () {
				var $el = $(this);

				if ($el.get(0).piMenuWasInitialized) {
					return;
				}

				$el.get(0).piMenuWasInitialized = 1;

				var mobileMenu = {
					$parentRowWrapper: null,
					$toggler: $el,
					$wrapper: null,
					$menu: null,
					height: null,
					top: null,
					state: 0
				};

				mobileMenu.$parentRowWrapper = $(mobileMenu.$toggler.parents('.' + settings.classParentRowWrapper));
				mobileMenu.$wrapper = $(mobileMenu.$toggler.data('target'));
				mobileMenu.$menu = mobileMenu.$wrapper.find('.' + settings.classMenu);
				mobileMenu.$menuElements = mobileMenu.$menu.find('li');

				mobileMenu.height = mobileMenu.$menu.outerHeight();

				mobileMenu.$toggler.click(function () {
					toggleMenu(mobileMenu);
				});

				mobileMenu.$menuElements.each(function () {
					var $li = $(this);

					$li.get(0).$link = $li.find(' > a');
					$li.get(0).$siblings = $li.siblings();
					$li.get(0).$list = $li.find(' > ul');

					if ($li.get(0).$list.length) {
						$li.get(0).$link.click(function (e) {
							toggleSubmenu(mobileMenu, $li);
							e.preventDefault();
						});
					}
				});

				$d.bind('piBoundChanged', function () {
					if (mobileMenu.state && mobileMenu.$toggler.is(':hidden')) {
						toggleMenu(mobileMenu);
					}
				});

				mobileMenus.push(mobileMenu);

			});

			$w.resize(function () {
				clearTimeout(resizeTmt);
				resizeTmt = setTimeout(function () {
					checkMobileSubmenuHeight();
				}, 100);
			});

			checkMobileSubmenuHeight();

		};

		function toggleSubmenu(mobileMenu, $li) {
			if ($li.get(0).$list.hasClass('pi-active')) {
				mobileMenu.height = mobileMenu.height - $li.get(0).listHeight;
				mobileMenu.$wrapper.height(mobileMenu.height);
				$li.get(0).$list.removeClass('pi-active');
				$li.get(0).$list.animate({
					height: 0
				}, 500, function () {
					changeParentsListHeight($li, $li.get(0).listHeight, 'take');
				});
			} else {
				mobileMenu.height = mobileMenu.height + $li.get(0).listHeight;
				mobileMenu.$wrapper.height(mobileMenu.height);
				$li.get(0).$list.addClass('pi-active');
				$li.get(0).$list.animate({
					height: $li.get(0).listHeight
				}, 500, function () {
					changeParentsListHeight($li, $li.get(0).listHeight, 'add');
					$(this).height('auto');
				});
				$li.get(0).$siblings.each(function () {
					if ($(this).find(' > ul.pi-active').length) {
						toggleSubmenu(mobileMenu, $(this));
					}
				});
			}
		}

		function changeParentsListHeight($li, h, action) {
			var parentLI = $li.parents('li').length ? $li.parents('li').eq(0) : null;
			if (parentLI && parentLI.get(0).listHeight) {
				if (action == 'add') {
					parentLI.get(0).listHeight += h;
				} else {
					parentLI.get(0).listHeight -= h;
				}
				changeParentsListHeight(parentLI, h, action);
			}
		}

		function checkMobileSubmenuHeight() {
			for (var i = 0; i < mobileMenus.length; i++) {
				mobileMenus[i].$menuElements.each(function () {
					var $li = $(this);
					if ($li.get(0).$list.length) {
						var initH = getElementHeight($li.get(0).$list);
						if (initH != 0) {
							$li.get(0).listHeight = initH;
						} else {
							$li.get(0).$list.height('auto');
							$li.get(0).listHeight = getElementHeight($li.get(0).$list);
							$li.get(0).$list.height(initH);
						}
					}
				});
			}
		}

		function toggleMenu(m) {
			m.$wrapper.toggleClass(settings.classOpen);
			if (!m.$wrapper.hasClass(settings.classOpen)) {
				m.$wrapper.height(0);
				m.$wrapper.css({
					overflow: 'none'
				});
				m.state = 0;
			} else {
				m.$wrapper.height(m.height);
				m.$wrapper.css({
					overflow: 'auto'
				});
				m.state = 1;
			}
		}

		init();

		return mobileMenus;
	}

	//endregion

});


/*_____ scripts/pi.columnFix.js*/
jQuery(function($){

//region Columns fix
	var $w = $(window),
		$galleries = $('.pi-gallery.pi-column-fix'),
		$liquidGalleries = $galleries.filter('[class*=pi-liquid-col]');

	$liquidGalleries.each(function(){

		var $g = $(this),
			$gItems = $g.find('.pi-gallery-item'),
			isStacked = $g.hasClass('pi-stacked'),
			itemsWidthRejected = 0;

		detectColumnSizeNumber($g,'gallery');

		$w.load(function () {
			var tmt;

			$w.resize(function(){
				if(!itemsWidthRejected){
					itemsWidthRejected = 1;
					$gItems.each(function(i){
						var $el = $(this);
						$el.css('width', '');
					});
				}
			});

			$w.resize(function(){
				clearTimeout(tmt);
				tmt = setTimeout(function(){

					itemsWidthRejected = 0;

					if(isStacked){
						$g.css('cssText', 'margin-right: 0 !important');
					}

					var cols = $g.data('width-' + window.piCurrentBound),
						galleryWidth = $g.width(),
						galleryItemPadding = parseInt($gItems.eq(0).css('padding-left'), 10) + parseInt($gItems.eq(0).css('padding-right'), 10),
						galleryWidthWithoutPadding = galleryWidth - cols*galleryItemPadding,
						itemWidthExcess = galleryWidthWithoutPadding % cols,
						galleryItemWidth = (galleryWidthWithoutPadding - itemWidthExcess) / cols;

					if(itemWidthExcess && isStacked){
						galleryItemWidth++;
						$g.css('cssText', 'margin-right: -' + cols + 'px !important');
					} else if(isStacked) {
						$g.css('cssText', 'margin-right: 0 !important');
					}

					$gItems.each(function(i){
						var $el = $(this);
						$el.width(galleryItemWidth);
					});

				}, 100);

			});
			$w.trigger('resize');
		});

	});

	var $colsToFix = $('.pi-column-fix').filter('[class*=pi-col-]');

	if($colsToFix.length){

		$w.load(function () {

			var tmt;

			$colsToFix.each(function(){
				detectColumnSizeNumber($(this),'grid');
			});

			$w.resize(function(){

				clearTimeout(tmt);

				tmt = setTimeout(function(){

					$colsToFix.each(function(){

						var $el = $(this),
							elPadding = parseInt($el.css('padding-left'), 10) + parseInt($el.css('padding-right'), 10),
							newWidth = Math.floor( $el.parent().width() / 12 * $el.data('width-' + window.piCurrentBound ) ) - elPadding;

						$(this).width(newWidth);

					});

				}, 100);
			});

			$w.trigger('resize');
		});

	}

	function detectColumnSizeNumber($el, gridType){

		var classesList = $el.attr('class'),
			gClasses = classesList.match(/pi-liquid-col-\d?\D\D-\d/g) || classesList.match(/pi-col-\d?\D\D-\d/g),
			bounds = {};

		for(var i = 0; i < gClasses.length; i++){
			var bound = gClasses[i].match(/pi-liquid-col-(\d?\D\D)-(\d)/i) || gClasses[i].match(/pi-col-(\d?\D\D)-(\d)/i);
			if(bound){
				bounds[bound[1]] = bound[2];
			}
		}

		if(gridType == 'gallery'){
			if(!bounds['3xs']) {
				bounds['3xs'] = 1;
			}
		} else {
			if(!bounds['3xs']) {
				bounds['3xs'] = 12;
			}
		}

		if(!bounds['2xs']) {
			bounds['2xs'] = bounds['3xs'];
		}
		if(!bounds['xs']) {
			bounds['xs'] = bounds['2xs'];
		}
		if(!bounds['sm']) {
			bounds['sm'] = bounds['xs'];
		}
		if(!bounds['md']) {
			bounds['md'] = bounds['sm'];
		}
		if(!bounds['lg']) {
			bounds['lg'] = bounds['md'];
		}

		for(var bound in bounds){
			$el.data('width-' + bound, bounds[bound]);
		}
	}
	//endregion

});


/*_____ scripts/pi.alert.js*/
/* ========================================================================
 * PI: pi.alert.js v1.0.0
 * BASED ON: bootstrap-alert.js v2.3.2
 * http://getbootstrap.com/2.3.2/javascript.html#alerts
 * ==========================================================
 * Copyright 2013 Twitter, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ========================================================== */


!function ($) {

	"use strict"; // jshint ;_;


	/* ALERT CLASS DEFINITION
	 * ====================== */

	var dismiss = '[data-dismiss="alert"]'
		, Alert = function (el) {
			$(el).on('click', dismiss, this.close);
		}

	Alert.prototype.close = function (e) {
		var $this = $(this)
			, selector = $this.attr('data-target')
			, $parent;

		if (!selector) {
			selector = $this.attr('href');
			selector = selector && selector.replace(/.*(?=#[^\s]*$)/, ''); //strip for ie7
		}

		$parent = $(selector);

		e && e.preventDefault();

		$parent.length || ($parent = $this.hasClass('pi-alert') ? $this : $this.parent());

		$parent.trigger(e = $.Event('close'));

		if (e.isDefaultPrevented()) return;

		$parent.removeClass('in');

		function removeElement() {
			$parent
				.trigger('closed')
				.remove();
		}

		if($.support.transition && $parent.hasClass('fade')) {
			$this.on($.support.transition.end, function(e){
				e.stopPropagation();
			});
			$parent.on($.support.transition.end, removeElement);
		} else {
			removeElement();
		}

	}


	/* ALERT PLUGIN DEFINITION
	 * ======================= */

	var old = $.fn.alert

	$.fn.alert = function (option) {
		return this.each(function () {
			var $this = $(this)
				, data = $this.data('alert');
			if (!data) $this.data('alert', (data = new Alert(this)));
			if (typeof option == 'string') data[option].call($this);
		});
	}

	$.fn.alert.Constructor = Alert;


	/* ALERT NO CONFLICT
	 * ================= */

	$.fn.alert.noConflict = function () {
		$.fn.alert = old;
		return this;
	}


	/* ALERT DATA-API
	 * ============== */

	$(document).on('click.alert.data-api', dismiss, Alert.prototype.close);

}(window.jQuery);


/*_____ scripts/pi.init.formsBlurClasses.js*/
jQuery(function ($) {

	//region Input blur styles
	var $b = $('body'),
		cls = {
			changed: 'pi-form-control-changed',
			focused: 'pi-form-control-focused',
			withIcon: 'pi-input-with-icon'
		};
	$b.delegate('.form-control', 'keyup',function () {
		var $el = $(this),
			val = $el.val();
		if (val !== 'placeholder' && $.trim(val)) {
			$el.addClass(cls.changed);
			$el.parents('form').addClass(cls.changed);
		} else {
			$el.removeClass(cls.changed);
			$el.parents('form').removeClass(cls.changed);
		}
	}).delegate('.form-control', 'focus',function () {
		var $el = $(this);
		$el.parents('form').addClass(cls.focused);
		$el.parents('.' + cls.withIcon).addClass(cls.focused);
	}).delegate('.form-control', 'blur', function () {
		var $el = $(this);
		$el.parents('form').removeClass(cls.focused);
		$el.parents('.' + cls.withIcon).removeClass(cls.focused);
	});
	//endregion

});


/*_____ scripts/pi.init.placeholder.js*/
jQuery(function($){

	//region form placeholder
	if($.fn.placeholder){
		$('input, textarea').placeholder();
	}
	//endregion

});


/*_____ scripts/pi.init.jqueryScrollTo.js*/
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


/*_____ scripts/pi.scrollTopArrow.js*/
jQuery(function($){

	//region Scroll Top Arrow logic

	var $w = $(window),
		$d = $(document),
		$arrow = $('.pi-scroll-top-arrow'),
		classActive = 'pi-active',
		classBottom = 'pi-scroll-top-arrow-footer',
		footerHeight = 100,
		treshold = 400,
		scrollCheckTmt;

	if($arrow.length) {
		$w.on('scroll resize', function(){
			clearTimeout(scrollCheckTmt);
			scrollCheckTmt = setTimeout(function(){
				checkArrow();
			}, 100);
		});

		$arrow.on('click', function(){
			$arrow.removeClass(classActive);
		});
	}

	function checkArrow(){
		var scrollTop = $w.scrollTop(),
			documentHeight = $d.height(),
			nearFooter = (window.piViewportHeight + scrollTop) >= documentHeight - footerHeight;

		if(scrollTop >= treshold){
			$arrow.addClass(classActive);
		} else {
			$arrow.removeClass(classActive);
		}

		if(nearFooter && window.piCurrentBound != 'lg'){
			$arrow.addClass(classBottom);
		} else {
			$arrow.removeClass(classBottom);
		}

	}

	//endregion

});


/*_____ scripts/pi.init.social.js*/
jQuery(function($){

	//region Socials jumps
	$('.pi-jump a,' +
		'.pi-jump-bg a').each(function () {
			var $el = $(this);
			$el.append($el.find('i').clone());
		});

	$('.pi-social-icons-big a i').wrap('<span></span>');
	//endregion

});


/*_____ scripts/pi.init.caption.js*/
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


/*_____ scripts/pi.init.submitFormContact.js*/
jQuery(function($){

	//region Init Footer Form submit
	$('.pi-contact-form').submit(function(){

		var $form = $(this),
			$error = $form.find('.pi-error-container'),
			action  = $form.attr('action');

		$error.slideUp(750, function() {
			$error.hide();

			var $name = $form.find('.form-control-name'),
				$email = $form.find('.form-control-email'),
				$companyName = $form.find('.form-control-company-name'),
				$phone = $form.find('.form-control-phone'),
				$budjet = $form.find('.form-control-budjet'),
				$comments = $form.find('.form-control-comments'),
				captchaEnabled = $form.data('captcha') == 'no' ? 0 : 1,
				$recaptcha = $form.find('#recaptcha_response_field'),
				$recaptcha_challenge = $form.find('#recaptcha_challenge_field');

			$.post(action, {
					name: $name.val(),
					email: $email.val(),
					companyName: $companyName.val(),
					phone: $phone.val(),
					budjet: $budjet.val(),
					comments: $comments.val(),
					captchaEnabled: captchaEnabled,
					recaptcha: $recaptcha.val(),
					recaptcha_challenge: $recaptcha_challenge.val()
				},
				function(data){
					$error.html(data);
					$error.slideDown('slow');

					if (data.match('success') != null) {
						$name.val('');
						$email.val('');
						$companyName.val('');
						$phone.val('');
						$budjet.val('');
						$comments.val('');
					}
				}
			);

		});

		return false;

	});
	//endregion

});


/*_____ scripts/pi.init.colorbox.js*/
jQuery(function($){

	//region colorbox
	if($.fn.colorbox){

		var $d = $(document),
			$w = $(window),
			$colorboxLinks = $('.pi-colorbox'),
			//Breakpoints could be 3xs, 2xs, xs, sm, md, lg
			breakpoints = [
				'sm',
				'md',
				'lg'
			],
			colorboxState = 0,
			colorboxNeeded = 0;


		function piColorboxInit(){

			colorboxNeeded = 0;

			for(var i in breakpoints){
				if(breakpoints[i] == window.piCurrentBound){
					colorboxNeeded = 1;
					break;
				}
			}

			if(colorboxNeeded && !colorboxState){
				$colorboxLinks.each(function(){
					var $el = $(this),
						videoData = $el.data('videoSize'),
						videoSize = videoData ? videoData.split(',') : 0,
						groupFromData = $el.data('colorboxGroup'),
						group = groupFromData ? groupFromData : 'pi-group';

					if(videoSize[0]){
						videoSize[0] = parseInt(videoSize[0], 10);
						videoSize[1] = parseInt(videoSize[1], 10);
						if(typeof(videoSize[0]) == 'number' && typeof(videoSize[1]) == 'number'){
							$el.colorbox({
								rel:group,
								iframe:true,
								innerWidth: videoSize[0],
								innerHeight: videoSize[1],
								maxWidth:'95%',
								maxHeight:'95%'
							});
						}
					} else {
						$el.colorbox({
							rel:group,
							maxWidth:'95%',
							maxHeight:'95%'
						});
					}

				});
				colorboxState = 1;
			} else if(!colorboxNeeded && colorboxState) {
				$colorboxLinks.colorbox.remove();
				colorboxState = 0;
			}
		}

		$d.bind('piBoundChanged', piColorboxInit);
		piColorboxInit();

	}
	//endregion

});