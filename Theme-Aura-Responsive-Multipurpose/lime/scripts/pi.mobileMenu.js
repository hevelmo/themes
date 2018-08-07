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