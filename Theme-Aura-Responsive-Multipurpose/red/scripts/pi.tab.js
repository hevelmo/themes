/* ========================================================================
 * PI: pi.tabs.js v1.0.0
 * base on bootstrap 3.0.0. tabs
 * http://twbs.github.com/bootstrap/javascript.html#tabs
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
 * ======================================================================== */



(function ($) {
	"use strict";

	// TAB CLASS DEFINITION
	// ====================

	var activeClass = "pi-active";

	var Tab = function (element) {
		this.element = $(element)
	}

	Tab.prototype.show = function () {
		var $this = this.element
		var $ul = $this.closest('ul:not(.dropdown-menu)')
		var selector = $this.attr('data-target')

		if (!selector) {
			selector = $this.attr('href')
			selector = selector && selector.replace(/.*(?=#[^\s]*$)/, '') //strip for ie7
		}

		if ($this.parent('li').hasClass(activeClass)) return

		var previous = $ul.find('.' + activeClass + ':last a')[0]
		var e = $.Event('show.bs.tab', {
			relatedTarget: previous
		})

		$this.trigger(e)

		if (e.isDefaultPrevented()) return

		var $target = $(selector)

		this.activate($this.parent('li'), $ul)
		this.activate($target, $target.parent(), function () {
			$this.trigger({
				type: 'shown.bs.tab', relatedTarget: previous
			})
		})
	}

	Tab.prototype.activate = function (element, container, callback) {
		var $active = container.find('> .' + activeClass)
		var transition = callback
			&& $.support.transition
			&& $active.hasClass('fade')

		function next() {
			$active
				.removeClass(activeClass)
				.find('> .dropdown-menu > .' + activeClass)
				.removeClass(activeClass)

			element.addClass(activeClass)

			if (transition) {
				element[0].offsetWidth // reflow for transition
				element.addClass('in')
			} else {
				element.removeClass('fade')
			}

			if (element.parent('.dropdown-menu')) {
				element.closest('li.dropdown').addClass(activeClass)
			}

			callback && callback()
		}

		transition ?
			$active
				.one($.support.transition.end, next)
				.emulateTransitionEnd(150) :
			next()

		$active.removeClass('in')
	}


	// TAB PLUGIN DEFINITION
	// =====================

	var old = $.fn.tab

	$.fn.tab = function (option) {
		return this.each(function () {
			var $this = $(this)
			var data = $this.data('bs.tab')

			if (!data) $this.data('bs.tab', (data = new Tab(this)))
			if (typeof option == 'string') data[option]()
		})
	}

	$.fn.tab.Constructor = Tab


	// TAB NO CONFLICT
	// ===============

	$.fn.tab.noConflict = function () {
		$.fn.tab = old
		return this
	}


	// TAB DATA-API
	// ============

	$(document).on('click.bs.tab.data-api', '[data-toggle="tab"], [data-toggle="pill"]', function (e) {
		e.preventDefault()
		$(this).tab('show')
	})

})(window.jQuery);
