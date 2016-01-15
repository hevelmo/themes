/*! jQuery UI - v1.8.23 - 2012-08-15
* https://github.com/jquery/jquery-ui
* Includes: jquery.ui.widget.js
* Copyright (c) 2012 AUTHORS.txt; Licensed MIT, GPL */
(function(a,b){if(a.cleanData){var c=a.cleanData;a.cleanData=function(b){for(var d=0,e;(e=b[d])!=null;d++)try{a(e).triggerHandler("remove")}catch(f){}c(b)}}else{var d=a.fn.remove;a.fn.remove=function(b,c){return this.each(function(){return c||(!b||a.filter(b,[this]).length)&&a("*",this).add([this]).each(function(){try{a(this).triggerHandler("remove")}catch(b){}}),d.call(a(this),b,c)})}}a.widget=function(b,c,d){var e=b.split(".")[0],f;b=b.split(".")[1],f=e+"-"+b,d||(d=c,c=a.Widget),a.expr[":"][f]=function(c){return!!a.data(c,b)},a[e]=a[e]||{},a[e][b]=function(a,b){arguments.length&&this._createWidget(a,b)};var g=new c;g.options=a.extend(!0,{},g.options),a[e][b].prototype=a.extend(!0,g,{namespace:e,widgetName:b,widgetEventPrefix:a[e][b].prototype.widgetEventPrefix||b,widgetBaseClass:f},d),a.widget.bridge(b,a[e][b])},a.widget.bridge=function(c,d){a.fn[c]=function(e){var f=typeof e=="string",g=Array.prototype.slice.call(arguments,1),h=this;return e=!f&&g.length?a.extend.apply(null,[!0,e].concat(g)):e,f&&e.charAt(0)==="_"?h:(f?this.each(function(){var d=a.data(this,c),f=d&&a.isFunction(d[e])?d[e].apply(d,g):d;if(f!==d&&f!==b)return h=f,!1}):this.each(function(){var b=a.data(this,c);b?b.option(e||{})._init():a.data(this,c,new d(e,this))}),h)}},a.Widget=function(a,b){arguments.length&&this._createWidget(a,b)},a.Widget.prototype={widgetName:"widget",widgetEventPrefix:"",options:{disabled:!1},_createWidget:function(b,c){a.data(c,this.widgetName,this),this.element=a(c),this.options=a.extend(!0,{},this.options,this._getCreateOptions(),b);var d=this;this.element.bind("remove."+this.widgetName,function(){d.destroy()}),this._create(),this._trigger("create"),this._init()},_getCreateOptions:function(){return a.metadata&&a.metadata.get(this.element[0])[this.widgetName]},_create:function(){},_init:function(){},destroy:function(){this.element.unbind("."+this.widgetName).removeData(this.widgetName),this.widget().unbind("."+this.widgetName).removeAttr("aria-disabled").removeClass(this.widgetBaseClass+"-disabled "+"ui-state-disabled")},widget:function(){return this.element},option:function(c,d){var e=c;if(arguments.length===0)return a.extend({},this.options);if(typeof c=="string"){if(d===b)return this.options[c];e={},e[c]=d}return this._setOptions(e),this},_setOptions:function(b){var c=this;return a.each(b,function(a,b){c._setOption(a,b)}),this},_setOption:function(a,b){return this.options[a]=b,a==="disabled"&&this.widget()[b?"addClass":"removeClass"](this.widgetBaseClass+"-disabled"+" "+"ui-state-disabled").attr("aria-disabled",b),this},enable:function(){return this._setOption("disabled",!1)},disable:function(){return this._setOption("disabled",!0)},_trigger:function(b,c,d){var e,f,g=this.options[b];d=d||{},c=a.Event(c),c.type=(b===this.widgetEventPrefix?b:this.widgetEventPrefix+b).toLowerCase(),c.target=this.element[0],f=c.originalEvent;if(f)for(e in f)e in c||(c[e]=f[e]);return this.element.trigger(c,d),!(a.isFunction(g)&&g.call(this.element[0],c,d)===!1||c.isDefaultPrevented())}}})(jQuery);;/*! jQuery UI - v1.8.23 - 2012-08-15
* https://github.com/jquery/jquery-ui
* Includes: jquery.effects.core.js
* Copyright (c) 2012 AUTHORS.txt; Licensed MIT, GPL */
jQuery.effects||function(a,b){function c(b){var c;return b&&b.constructor==Array&&b.length==3?b:(c=/rgb\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*\)/.exec(b))?[parseInt(c[1],10),parseInt(c[2],10),parseInt(c[3],10)]:(c=/rgb\(\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*\)/.exec(b))?[parseFloat(c[1])*2.55,parseFloat(c[2])*2.55,parseFloat(c[3])*2.55]:(c=/#([a-fA-F0-9]{2})([a-fA-F0-9]{2})([a-fA-F0-9]{2})/.exec(b))?[parseInt(c[1],16),parseInt(c[2],16),parseInt(c[3],16)]:(c=/#([a-fA-F0-9])([a-fA-F0-9])([a-fA-F0-9])/.exec(b))?[parseInt(c[1]+c[1],16),parseInt(c[2]+c[2],16),parseInt(c[3]+c[3],16)]:(c=/rgba\(0, 0, 0, 0\)/.exec(b))?e.transparent:e[a.trim(b).toLowerCase()]}function d(b,d){var e;do{e=(a.curCSS||a.css)(b,d);if(e!=""&&e!="transparent"||a.nodeName(b,"body"))break;d="backgroundColor"}while(b=b.parentNode);return c(e)}function h(){var a=document.defaultView?document.defaultView.getComputedStyle(this,null):this.currentStyle,b={},c,d;if(a&&a.length&&a[0]&&a[a[0]]){var e=a.length;while(e--)c=a[e],typeof a[c]=="string"&&(d=c.replace(/\-(\w)/g,function(a,b){return b.toUpperCase()}),b[d]=a[c])}else for(c in a)typeof a[c]=="string"&&(b[c]=a[c]);return b}function i(b){var c,d;for(c in b)d=b[c],(d==null||a.isFunction(d)||c in g||/scrollbar/.test(c)||!/color/i.test(c)&&isNaN(parseFloat(d)))&&delete b[c];return b}function j(a,b){var c={_:0},d;for(d in b)a[d]!=b[d]&&(c[d]=b[d]);return c}function k(b,c,d,e){typeof b=="object"&&(e=c,d=null,c=b,b=c.effect),a.isFunction(c)&&(e=c,d=null,c={});if(typeof c=="number"||a.fx.speeds[c])e=d,d=c,c={};return a.isFunction(d)&&(e=d,d=null),c=c||{},d=d||c.duration,d=a.fx.off?0:typeof d=="number"?d:d in a.fx.speeds?a.fx.speeds[d]:a.fx.speeds._default,e=e||c.complete,[b,c,d,e]}function l(b){return!b||typeof b=="number"||a.fx.speeds[b]?!0:typeof b=="string"&&!a.effects[b]?!0:!1}a.effects={},a.each(["backgroundColor","borderBottomColor","borderLeftColor","borderRightColor","borderTopColor","borderColor","color","outlineColor"],function(b,e){a.fx.step[e]=function(a){a.colorInit||(a.start=d(a.elem,e),a.end=c(a.end),a.colorInit=!0),a.elem.style[e]="rgb("+Math.max(Math.min(parseInt(a.pos*(a.end[0]-a.start[0])+a.start[0],10),255),0)+","+Math.max(Math.min(parseInt(a.pos*(a.end[1]-a.start[1])+a.start[1],10),255),0)+","+Math.max(Math.min(parseInt(a.pos*(a.end[2]-a.start[2])+a.start[2],10),255),0)+")"}});var e={aqua:[0,255,255],azure:[240,255,255],beige:[245,245,220],black:[0,0,0],blue:[0,0,255],brown:[165,42,42],cyan:[0,255,255],darkblue:[0,0,139],darkcyan:[0,139,139],darkgrey:[169,169,169],darkgreen:[0,100,0],darkkhaki:[189,183,107],darkmagenta:[139,0,139],darkolivegreen:[85,107,47],darkorange:[255,140,0],darkorchid:[153,50,204],darkred:[139,0,0],darksalmon:[233,150,122],darkviolet:[148,0,211],fuchsia:[255,0,255],gold:[255,215,0],green:[0,128,0],indigo:[75,0,130],khaki:[240,230,140],lightblue:[173,216,230],lightcyan:[224,255,255],lightgreen:[144,238,144],lightgrey:[211,211,211],lightpink:[255,182,193],lightyellow:[255,255,224],lime:[0,255,0],magenta:[255,0,255],maroon:[128,0,0],navy:[0,0,128],olive:[128,128,0],orange:[255,165,0],pink:[255,192,203],purple:[128,0,128],violet:[128,0,128],red:[255,0,0],silver:[192,192,192],white:[255,255,255],yellow:[255,255,0],transparent:[255,255,255]},f=["add","remove","toggle"],g={border:1,borderBottom:1,borderColor:1,borderLeft:1,borderRight:1,borderTop:1,borderWidth:1,margin:1,padding:1};a.effects.animateClass=function(b,c,d,e){return a.isFunction(d)&&(e=d,d=null),this.queue(function(){var g=a(this),k=g.attr("style")||" ",l=i(h.call(this)),m,n=g.attr("class")||"";a.each(f,function(a,c){b[c]&&g[c+"Class"](b[c])}),m=i(h.call(this)),g.attr("class",n),g.animate(j(l,m),{queue:!1,duration:c,easing:d,complete:function(){a.each(f,function(a,c){b[c]&&g[c+"Class"](b[c])}),typeof g.attr("style")=="object"?(g.attr("style").cssText="",g.attr("style").cssText=k):g.attr("style",k),e&&e.apply(this,arguments),a.dequeue(this)}})})},a.fn.extend({_addClass:a.fn.addClass,addClass:function(b,c,d,e){return c?a.effects.animateClass.apply(this,[{add:b},c,d,e]):this._addClass(b)},_removeClass:a.fn.removeClass,removeClass:function(b,c,d,e){return c?a.effects.animateClass.apply(this,[{remove:b},c,d,e]):this._removeClass(b)},_toggleClass:a.fn.toggleClass,toggleClass:function(c,d,e,f,g){return typeof d=="boolean"||d===b?e?a.effects.animateClass.apply(this,[d?{add:c}:{remove:c},e,f,g]):this._toggleClass(c,d):a.effects.animateClass.apply(this,[{toggle:c},d,e,f])},switchClass:function(b,c,d,e,f){return a.effects.animateClass.apply(this,[{add:c,remove:b},d,e,f])}}),a.extend(a.effects,{version:"1.8.23",save:function(a,b){for(var c=0;c<b.length;c++)b[c]!==null&&a.data("ec.storage."+b[c],a[0].style[b[c]])},restore:function(a,b){for(var c=0;c<b.length;c++)b[c]!==null&&a.css(b[c],a.data("ec.storage."+b[c]))},setMode:function(a,b){return b=="toggle"&&(b=a.is(":hidden")?"show":"hide"),b},getBaseline:function(a,b){var c,d;switch(a[0]){case"top":c=0;break;case"middle":c=.5;break;case"bottom":c=1;break;default:c=a[0]/b.height}switch(a[1]){case"left":d=0;break;case"center":d=.5;break;case"right":d=1;break;default:d=a[1]/b.width}return{x:d,y:c}},createWrapper:function(b){if(b.parent().is(".ui-effects-wrapper"))return b.parent();var c={width:b.outerWidth(!0),height:b.outerHeight(!0),"float":b.css("float")},d=a("<div></div>").addClass("ui-effects-wrapper").css({fontSize:"100%",background:"transparent",border:"none",margin:0,padding:0}),e=document.activeElement;try{e.id}catch(f){e=document.body}return b.wrap(d),(b[0]===e||a.contains(b[0],e))&&a(e).focus(),d=b.parent(),b.css("position")=="static"?(d.css({position:"relative"}),b.css({position:"relative"})):(a.extend(c,{position:b.css("position"),zIndex:b.css("z-index")}),a.each(["top","left","bottom","right"],function(a,d){c[d]=b.css(d),isNaN(parseInt(c[d],10))&&(c[d]="auto")}),b.css({position:"relative",top:0,left:0,right:"auto",bottom:"auto"})),d.css(c).show()},removeWrapper:function(b){var c,d=document.activeElement;return b.parent().is(".ui-effects-wrapper")?(c=b.parent().replaceWith(b),(b[0]===d||a.contains(b[0],d))&&a(d).focus(),c):b},setTransition:function(b,c,d,e){return e=e||{},a.each(c,function(a,c){var f=b.cssUnit(c);f[0]>0&&(e[c]=f[0]*d+f[1])}),e}}),a.fn.extend({effect:function(b,c,d,e){var f=k.apply(this,arguments),g={options:f[1],duration:f[2],callback:f[3]},h=g.options.mode,i=a.effects[b];return a.fx.off||!i?h?this[h](g.duration,g.callback):this.each(function(){g.callback&&g.callback.call(this)}):i.call(this,g)},_show:a.fn.show,show:function(a){if(l(a))return this._show.apply(this,arguments);var b=k.apply(this,arguments);return b[1].mode="show",this.effect.apply(this,b)},_hide:a.fn.hide,hide:function(a){if(l(a))return this._hide.apply(this,arguments);var b=k.apply(this,arguments);return b[1].mode="hide",this.effect.apply(this,b)},__toggle:a.fn.toggle,toggle:function(b){if(l(b)||typeof b=="boolean"||a.isFunction(b))return this.__toggle.apply(this,arguments);var c=k.apply(this,arguments);return c[1].mode="toggle",this.effect.apply(this,c)},cssUnit:function(b){var c=this.css(b),d=[];return a.each(["em","px","%","pt"],function(a,b){c.indexOf(b)>0&&(d=[parseFloat(c),b])}),d}});var m={};a.each(["Quad","Cubic","Quart","Quint","Expo"],function(a,b){m[b]=function(b){return Math.pow(b,a+2)}}),a.extend(m,{Sine:function(a){return 1-Math.cos(a*Math.PI/2)},Circ:function(a){return 1-Math.sqrt(1-a*a)},Elastic:function(a){return a===0||a===1?a:-Math.pow(2,8*(a-1))*Math.sin(((a-1)*80-7.5)*Math.PI/15)},Back:function(a){return a*a*(3*a-2)},Bounce:function(a){var b,c=4;while(a<((b=Math.pow(2,--c))-1)/11);return 1/Math.pow(4,3-c)-7.5625*Math.pow((b*3-2)/22-a,2)}}),a.each(m,function(b,c){a.easing["easeIn"+b]=c,a.easing["easeOut"+b]=function(a){return 1-c(1-a)},a.easing["easeInOut"+b]=function(a){return a<.5?c(a*2)/2:c(a*-2+2)/-2+1}})}(jQuery);;

/*! Copyright (c) 2011 Brandon Aaron (http://brandonaaron.net)
 * Licensed under the MIT License (LICENSE.txt).
 *
 * Thanks to: http://adomas.org/javascript-mouse-wheel/ for some pointers.
 * Thanks to: Mathias Bank(http://www.mathias-bank.de) for a scope bug fix.
 * Thanks to: Seamus Leahy for adding deltaX and deltaY
 *
 * Version: 3.0.6
 * 
 * Requires: 1.2.2+
 */
(function(a){function d(b){var c=b||window.event,d=[].slice.call(arguments,1),e=0,f=!0,g=0,h=0;return b=a.event.fix(c),b.type="mousewheel",c.wheelDelta&&(e=c.wheelDelta/120),c.detail&&(e=-c.detail/3),h=e,c.axis!==undefined&&c.axis===c.HORIZONTAL_AXIS&&(h=0,g=-1*e),c.wheelDeltaY!==undefined&&(h=c.wheelDeltaY/120),c.wheelDeltaX!==undefined&&(g=-1*c.wheelDeltaX/120),d.unshift(b,e,g,h),(a.event.dispatch||a.event.handle).apply(this,d)}var b=["DOMMouseScroll","mousewheel"];if(a.event.fixHooks)for(var c=b.length;c;)a.event.fixHooks[b[--c]]=a.event.mouseHooks;a.event.special.mousewheel={setup:function(){if(this.addEventListener)for(var a=b.length;a;)this.addEventListener(b[--a],d,!1);else this.onmousewheel=d},teardown:function(){if(this.removeEventListener)for(var a=b.length;a;)this.removeEventListener(b[--a],d,!1);else this.onmousewheel=null}},a.fn.extend({mousewheel:function(a){return a?this.bind("mousewheel",a):this.trigger("mousewheel")},unmousewheel:function(a){return this.unbind("mousewheel",a)}})})(jQuery);


/*!
	jQuery.kinetic v1.5
	Dave Taylor http://the-taylors.org/jquery.kinetic

	The MIT License (MIT)
	Copyright (c) <2011> <Dave Taylor http://the-taylors.org>
*/
/*global define,require */
(function ($) {
	'use strict';

	var DEFAULT_SETTINGS = { decelerate: true
							  , triggerHardware: false
							  , y: true
							  , x: true
							  , slowdown: 0.9
							  , maxvelocity: 40
							  , throttleFPS: 60
							  , movingClass: {
							  	up: 'kinetic-moving-up'
								, down: 'kinetic-moving-down'
								, left: 'kinetic-moving-left'
								, right: 'kinetic-moving-right'
							  }
							  , deceleratingClass: {
							  	up: 'kinetic-decelerating-up'
								, down: 'kinetic-decelerating-down'
								, left: 'kinetic-decelerating-left'
								, right: 'kinetic-decelerating-right'
							  }
	},
		SETTINGS_KEY = 'kinetic-settings',
		ACTIVE_CLASS = 'kinetic-active';

	/**
	* Provides requestAnimationFrame in a cross browser way.
	* http://paulirish.com/2011/requestanimationframe-for-smart-animating/
	*/
	if (!window.requestAnimationFrame) {

		window.requestAnimationFrame = (function () {

			return window.webkitRequestAnimationFrame ||
			window.mozRequestAnimationFrame ||
			window.oRequestAnimationFrame ||
			window.msRequestAnimationFrame ||
			function ( /* function FrameRequestCallback */callback, /* DOMElement Element */element) {
				window.setTimeout(callback, 1000 / 60);
			};

		} ());

	}

	// add touch checker to jQuery.support
	$.support = $.support || {};
	$.extend($.support, {
		touch: "ontouchend" in document
	});
	var selectStart = function () { return false; };

	var decelerateVelocity = function (velocity, slowdown) {
		return Math.floor(Math.abs(velocity)) === 0 ? 0 // is velocity less than 1?
			   : velocity * slowdown; // reduce slowdown
	};

	var capVelocity = function (velocity, max) {
		var newVelocity = velocity;
		if (velocity > 0) {
			if (velocity > max) {
				newVelocity = max;
			}
		} else {
			if (velocity < (0 - max)) {
				newVelocity = (0 - max);
			}
		}
		return newVelocity;
	};

	var setMoveClasses = function (settings, classes) {
		this.removeClass(settings.movingClass.up)
			.removeClass(settings.movingClass.down)
			.removeClass(settings.movingClass.left)
			.removeClass(settings.movingClass.right)
			.removeClass(settings.deceleratingClass.up)
			.removeClass(settings.deceleratingClass.down)
			.removeClass(settings.deceleratingClass.left)
			.removeClass(settings.deceleratingClass.right);

		if (settings.velocity > 0) {
			this.addClass(classes.right);
		}
		if (settings.velocity < 0) {
			this.addClass(classes.left);
		}
		if (settings.velocityY > 0) {
			this.addClass(classes.down);
		}
		if (settings.velocityY < 0) {
			this.addClass(classes.up);
		}

	};

	var stop = function ($scroller, settings) {
		if (typeof settings.stopped === 'function') {
			settings.stopped.call($scroller, settings);
		}
	};

	/** do the actual kinetic movement */
	var move = function ($scroller, settings) {
		var scroller = $scroller[0];
		// set scrollLeft
		if (settings.x && scroller.scrollWidth > 0) {
			scroller.scrollLeft = settings.scrollLeft = scroller.scrollLeft + settings.velocity;
			if (Math.abs(settings.velocity) > 0) {
				settings.velocity = settings.decelerate ?
					decelerateVelocity(settings.velocity, settings.slowdown) : settings.velocity;
			}
		} else {
			settings.velocity = 0;
		}

		// set scrollTop
		if (settings.y && scroller.scrollHeight > 0) {
			scroller.scrollTop = settings.scrollTop = scroller.scrollTop + settings.velocityY;
			if (Math.abs(settings.velocityY) > 0) {
				settings.velocityY = settings.decelerate ?
					decelerateVelocity(settings.velocityY, settings.slowdown) : settings.velocityY;
			}
		} else {
			settings.velocityY = 0;
		}

		setMoveClasses.call($scroller, settings, settings.deceleratingClass);

		if (typeof settings.moved === 'function') {
			settings.moved.call($scroller, settings);
		}

		if (Math.abs(settings.velocity) > 0 || Math.abs(settings.velocityY) > 0) {
			// tick for next movement
			window.requestAnimationFrame(function () { move($scroller, settings); });
		} else {
			stop($scroller, settings);
		}
	};

	var callOption = function (method, options) {
		var methodFn = $.kinetic.callMethods[method]
		, args = Array.prototype.slice.call(arguments)
		;
		if (methodFn) {
			this.each(function () {
				var opts = args.slice(1), settings = $(this).data(SETTINGS_KEY);
				opts.unshift(settings);
				methodFn.apply(this, opts);
			});
		}
	};

	var attachListeners = function ($this, settings) {
		var element = $this[0];
		if ($.support.touch) {
			element.addEventListener('touchstart', settings.events.touchStart, false);
			element.addEventListener('touchend', settings.events.inputEnd, false);
			element.addEventListener('touchmove', settings.events.touchMove, false);
		} else {
			$this
			.mousedown(settings.events.inputDown)
			.mouseup(settings.events.inputEnd)
			.mousemove(settings.events.inputMove);
		}
		$this.click(settings.events.inputClick)
		.bind("selectstart", selectStart); // prevent selection when dragging
		$this.bind('dragstart', settings.events.dragStart);
	};
	var detachListeners = function ($this, settings) {
		var element = $this[0];
		if ($.support.touch) {
			element.removeEventListener('touchstart', settings.events.touchStart, false);
			element.removeEventListener('touchend', settings.events.inputEnd, false);
			element.removeEventListener('touchmove', settings.events.touchMove, false);
		} else {
			$this
			.unbind('mousedown', settings.events.inputDown)
			.unbind('mouseup', settings.events.inputEnd)
			.unbind('mousemove', settings.events.inputMove);
		}
		$this.unbind('click', settings.events.inputClick)
		.unbind("selectstart", selectStart); // prevent selection when dragging
		$this.unbind('dragstart', settings.events.dragStart);
	};

	var initElements = function (options) {
		this
		.addClass(ACTIVE_CLASS)
		.each(function () {

			var settings = $.extend({}, DEFAULT_SETTINGS, options);

			var self = this
			, $this = $(this)
			, xpos
			, prevXPos = false
			, ypos
			, prevYPos = false
			, mouseDown = false
			, scrollLeft
			, scrollTop
			, throttleTimeout = 1000 / settings.throttleFPS
			, lastMove
			, elementFocused
			;

			settings.velocity = 0;
			settings.velocityY = 0;

			// make sure we reset everything when mouse up
			var resetMouse = function () {
				xpos = false;
				ypos = false;
				mouseDown = false;
			};
			$(document).mouseup(resetMouse).click(resetMouse);

			var calculateVelocities = function () {
				settings.velocity = capVelocity(prevXPos - xpos, settings.maxvelocity);
				settings.velocityY = capVelocity(prevYPos - ypos, settings.maxvelocity);
			};
			var useTarget = function (target) {
				if ($.isFunction(settings.filterTarget)) {
					return settings.filterTarget.call(self, target) !== false;
				}
				return true;
			};
			var start = function (clientX, clientY) {
				mouseDown = true;
				settings.velocity = prevXPos = 0;
				settings.velocityY = prevYPos = 0;
				xpos = clientX;
				ypos = clientY;
			};
			var end = function () {
				if (xpos && prevXPos && settings.decelerate === false) {
					settings.decelerate = true;
					calculateVelocities();
					xpos = prevXPos = mouseDown = false;
					move($this, settings);
				}
			};
			var inputmove = function (clientX, clientY) {
				if (!lastMove || new Date() > new Date(lastMove.getTime() + throttleTimeout)) {
					lastMove = new Date();

					if (mouseDown && (xpos || ypos)) {
						if (elementFocused) {
							$(elementFocused).blur();
							elementFocused = null;
							$this.focus();
						}
						settings.decelerate = false;
						settings.velocity = settings.velocityY = 0;
						$this[0].scrollLeft = settings.scrollLeft = settings.x ? $this[0].scrollLeft - (clientX - xpos) : $this[0].scrollLeft;
						$this[0].scrollTop = settings.scrollTop = settings.y ? $this[0].scrollTop - (clientY - ypos) : $this[0].scrollTop;
						prevXPos = xpos;
						prevYPos = ypos;
						xpos = clientX;
						ypos = clientY;

						calculateVelocities();
						setMoveClasses.call($this, settings, settings.movingClass);

						if (typeof settings.moved === 'function') {
							settings.moved.call($this, settings);
						}
					}
				}
			};

			// Events
			settings.events = {
				touchStart: function (e) {
					if (useTarget(e.target)) {
						start(e.touches[0].clientX, e.touches[0].clientY);
						e.stopPropagation();
					}
				},
				touchMove: function (e) {
					if (mouseDown) {
						inputmove(e.touches[0].clientX, e.touches[0].clientY);
						if (e.preventDefault) { e.preventDefault(); }
					}
				},
				inputDown: function (e) {
					if (useTarget(e.target)) {
						start(e.clientX, e.clientY);
						elementFocused = e.target;
						if (e.target.nodeName === 'IMG') {
							e.preventDefault();
						}
						e.stopPropagation();
					}
				},
				inputEnd: function (e) {
					end();
					elementFocused = null;
					if (e.preventDefault) { e.preventDefault(); }
				},
				inputMove: function (e) {
					if (mouseDown) {
						inputmove(e.clientX, e.clientY);
						if (e.preventDefault) { e.preventDefault(); }
					}
				},
				inputClick: function (e) {
					if (Math.abs(settings.velocity) > 0) {
						e.preventDefault();
						return false;
					}
				},
				// prevent drag and drop images in ie
				dragStart: function (e) {
					if (elementFocused) {
						return false;
					}
				}
			};

			attachListeners($this, settings);
			$this.data(SETTINGS_KEY, settings).css("cursor", "move");

			if (settings.triggerHardware) {
				$this.css('-webkit-transform', 'translate3d(0,0,0)');
			}
		});
	};

	$.kinetic = {
		settingsKey: SETTINGS_KEY,
		callMethods: {
			start: function (settings, options) {
				var $this = $(this);
				settings = $.extend(settings, options);
				if (settings) {
					settings.decelerate = false;
					move($this, settings);
				}
			},
			end: function (settings, options) {
				var $this = $(this);
				if (settings) {
					settings.decelerate = true;
				}
			},
			stop: function (settings, options) {
				settings.velocity = 0;
				settings.velocityY = 0;
				settings.decelerate = true;
			},
			detach: function (settings, options) {
				var $this = $(this);
				detachListeners($this, settings);
				$this
				.removeClass(ACTIVE_CLASS)
				.css("cursor", "");
			},
			attach: function (settings, options) {
				var $this = $(this);
				attachListeners($this, settings);
				$this
				.addClass(ACTIVE_CLASS)
				.css("cursor", "move");
			}
		}
	};
	$.fn.kinetic = function (options) {
		if (typeof options === 'string') {
			callOption.apply(this, arguments);
		} else {
			initElements.call(this, options);
		}
		return this;
	};

} (window.jQuery || window.Zepto));


(function(e){e.widget("thomaskahn.smoothDivScroll",{options:{scrollingHotSpotLeftClass:"scrollingHotSpotLeft",scrollingHotSpotRightClass:"scrollingHotSpotRight",scrollableAreaClass:"scrollableArea",scrollWrapperClass:"scrollWrapper",hiddenOnStart:!1,getContentOnLoad:{},countOnlyClass:"",startAtElementId:"",hotSpotScrolling:!0,hotSpotScrollingStep:15,hotSpotScrollingInterval:10,hotSpotMouseDownSpeedBooster:3,visibleHotSpotBackgrounds:"hover",hotSpotsVisibleTime:5e3,easingAfterHotSpotScrolling:!0,easingAfterHotSpotScrollingDistance:10,easingAfterHotSpotScrollingDuration:300,easingAfterHotSpotScrollingFunction:"easeOutQuart",mousewheelScrolling:"",mousewheelScrollingStep:70,easingAfterMouseWheelScrolling:!0,easingAfterMouseWheelScrollingDuration:300,easingAfterMouseWheelScrollingFunction:"easeOutQuart",manualContinuousScrolling:!1,autoScrollingMode:"",autoScrollingDirection:"endlessLoopRight",autoScrollingStep:1,autoScrollingInterval:10,touchScrolling:!1,scrollToAnimationDuration:1e3,scrollToEasingFunction:"easeOutQuart"},_create:function(){var t=this,n=this.options,r=this.element;r.data("scrollWrapper",r.find("."+n.scrollWrapperClass)),r.data("scrollingHotSpotRight",r.find("."+n.scrollingHotSpotRightClass)),r.data("scrollingHotSpotLeft",r.find("."+n.scrollingHotSpotLeftClass)),r.data("scrollableArea",r.find("."+n.scrollableAreaClass)),r.data("scrollingHotSpotRight").length>0&&r.data("scrollingHotSpotRight").detach(),r.data("scrollingHotSpotLeft").length>0&&r.data("scrollingHotSpotLeft").detach(),r.data("scrollableArea").length===0&&r.data("scrollWrapper").length===0?(r.wrapInner("<div class='"+n.scrollableAreaClass+"'>").wrapInner("<div class='"+n.scrollWrapperClass+"'>"),r.data("scrollWrapper",r.find("."+n.scrollWrapperClass)),r.data("scrollableArea",r.find("."+n.scrollableAreaClass))):r.data("scrollWrapper").length===0?(r.wrapInner("<div class='"+n.scrollWrapperClass+"'>"),r.data("scrollWrapper",r.find("."+n.scrollWrapperClass))):r.data("scrollableArea").length===0&&(r.data("scrollWrapper").wrapInner("<div class='"+n.scrollableAreaClass+"'>"),r.data("scrollableArea",r.find("."+n.scrollableAreaClass))),r.data("scrollingHotSpotRight").length===0?(r.prepend("<div class='"+n.scrollingHotSpotRightClass+"'></div>"),r.data("scrollingHotSpotRight",r.find("."+n.scrollingHotSpotRightClass))):r.prepend(r.data("scrollingHotSpotRight")),r.data("scrollingHotSpotLeft").length===0?(r.prepend("<div class='"+n.scrollingHotSpotLeftClass+"'></div>"),r.data("scrollingHotSpotLeft",r.find("."+n.scrollingHotSpotLeftClass))):r.prepend(r.data("scrollingHotSpotLeft")),r.data("speedBooster",1),r.data("scrollXPos",0),r.data("hotSpotWidth",r.data("scrollingHotSpotLeft").innerWidth()),r.data("scrollableAreaWidth",0),r.data("startingPosition",0),r.data("rightScrollingInterval",null),r.data("leftScrollingInterval",null),r.data("autoScrollingInterval",null),r.data("hideHotSpotBackgroundsInterval",null),r.data("previousScrollLeft",0),r.data("pingPongDirection","right"),r.data("getNextElementWidth",!0),r.data("swapAt",null),r.data("startAtElementHasNotPassed",!0),r.data("swappedElement",null),r.data("originalElements",r.data("scrollableArea").children(n.countOnlyClass)),r.data("visible",!0),r.data("enabled",!0),r.data("scrollableAreaHeight",r.data("scrollableArea").height()),r.data("scrollerOffset",r.offset()),n.touchScrolling&&r.data("enabled")&&r.data("scrollWrapper").kinetic({y:!1,moved:function(e){n.manualContinuousScrolling&&(r.data("scrollWrapper").scrollLeft()<=0?t._checkContinuousSwapLeft():t._checkContinuousSwapRight())},stopped:function(e){r.data("scrollWrapper").stop(!0,!1),t.stopAutoScrolling()}}),r.data("scrollingHotSpotRight").bind("mousemove",function(e){if(n.hotSpotScrolling){var t=e.pageX-(this.offsetLeft+r.data("scrollerOffset").left);r.data("scrollXPos",Math.round(t/r.data("hotSpotWidth")*n.hotSpotScrollingStep)),(r.data("scrollXPos")===Infinity||r.data("scrollXPos")<1)&&r.data("scrollXPos",1)}}),r.data("scrollingHotSpotRight").bind("mouseover",function(){n.hotSpotScrolling&&(r.data("scrollWrapper").stop(!0,!1),t.stopAutoScrolling(),r.data("rightScrollingInterval",setInterval(function(){r.data("scrollXPos")>0&&r.data("enabled")&&(r.data("scrollWrapper").scrollLeft(r.data("scrollWrapper").scrollLeft()+r.data("scrollXPos")*r.data("speedBooster")),n.manualContinuousScrolling&&t._checkContinuousSwapRight(),t._showHideHotSpots())},n.hotSpotScrollingInterval)),t._trigger("mouseOverRightHotSpot"))}),r.data("scrollingHotSpotRight").bind("mouseout",function(){n.hotSpotScrolling&&(clearInterval(r.data("rightScrollingInterval")),r.data("scrollXPos",0),n.easingAfterHotSpotScrolling&&r.data("enabled")&&r.data("scrollWrapper").animate({scrollLeft:r.data("scrollWrapper").scrollLeft()+n.easingAfterHotSpotScrollingDistance},{duration:n.easingAfterHotSpotScrollingDuration,easing:n.easingAfterHotSpotScrollingFunction}))}),r.data("scrollingHotSpotRight").bind("mousedown",function(){r.data("speedBooster",n.hotSpotMouseDownSpeedBooster)}),e("body").bind("mouseup",function(){r.data("speedBooster",1)}),r.data("scrollingHotSpotLeft").bind("mousemove",function(e){if(n.hotSpotScrolling){var t=this.offsetLeft+r.data("scrollerOffset").left+r.data("hotSpotWidth")-e.pageX;r.data("scrollXPos",Math.round(t/r.data("hotSpotWidth")*n.hotSpotScrollingStep)),(r.data("scrollXPos")===Infinity||r.data("scrollXPos")<1)&&r.data("scrollXPos",1)}}),r.data("scrollingHotSpotLeft").bind("mouseover",function(){n.hotSpotScrolling&&(r.data("scrollWrapper").stop(!0,!1),t.stopAutoScrolling(),r.data("leftScrollingInterval",setInterval(function(){r.data("scrollXPos")>0&&r.data("enabled")&&(r.data("scrollWrapper").scrollLeft(r.data("scrollWrapper").scrollLeft()-r.data("scrollXPos")*r.data("speedBooster")),n.manualContinuousScrolling&&t._checkContinuousSwapLeft(),t._showHideHotSpots())},n.hotSpotScrollingInterval)),t._trigger("mouseOverLeftHotSpot"))}),r.data("scrollingHotSpotLeft").bind("mouseout",function(){n.hotSpotScrolling&&(clearInterval(r.data("leftScrollingInterval")),r.data("scrollXPos",0),n.easingAfterHotSpotScrolling&&r.data("enabled")&&r.data("scrollWrapper").animate({scrollLeft:r.data("scrollWrapper").scrollLeft()-n.easingAfterHotSpotScrollingDistance},{duration:n.easingAfterHotSpotScrollingDuration,easing:n.easingAfterHotSpotScrollingFunction}))}),r.data("scrollingHotSpotLeft").bind("mousedown",function(){r.data("speedBooster",n.hotSpotMouseDownSpeedBooster)}),r.data("scrollableArea").mousewheel(function(e,i,s,u){if(r.data("enabled")&&n.mousewheelScrolling.length>0){var a;n.mousewheelScrolling==="vertical"&&u!==0?(t.stopAutoScrolling(),e.preventDefault(),a=Math.round(n.mousewheelScrollingStep*u*-1),t.move(a)):n.mousewheelScrolling==="horizontal"&&s!==0?(t.stopAutoScrolling(),e.preventDefault(),a=Math.round(n.mousewheelScrollingStep*s*-1),t.move(a)):n.mousewheelScrolling==="allDirections"&&(t.stopAutoScrolling(),e.preventDefault(),a=Math.round(n.mousewheelScrollingStep*i*-1),t.move(a))}}),n.mousewheelScrolling&&r.data("scrollingHotSpotLeft").add(r.data("scrollingHotSpotRight")).mousewheel(function(e){e.preventDefault()}),e(window).bind("resize",function(){t._showHideHotSpots(),t._trigger("windowResized")}),jQuery.isEmptyObject(n.getContentOnLoad)||t[n.getContentOnLoad.method](n.getContentOnLoad.content,n.getContentOnLoad.manipulationMethod,n.getContentOnLoad.addWhere,n.getContentOnLoad.filterTag),n.hiddenOnStart&&t.hide(),e(window).load(function(){n.hiddenOnStart||t.recalculateScrollableArea(),n.autoScrollingMode.length>0&&!n.hiddenOnStart&&t.startAutoScrolling();if(n.autoScrollingMode!=="always")switch(n.visibleHotSpotBackgrounds){case"always":t.showHotSpotBackgrounds();break;case"onStart":t.showHotSpotBackgrounds(),r.data("hideHotSpotBackgroundsInterval",setTimeout(function(){t.hideHotSpotBackgrounds(250)},n.hotSpotsVisibleTime));break;case"hover":r.mouseenter(function(e){n.hotSpotScrolling&&(e.stopPropagation(),t.showHotSpotBackgrounds(250))}).mouseleave(function(e){n.hotSpotScrolling&&(e.stopPropagation(),t.hideHotSpotBackgrounds(250))});break;default:}t._showHideHotSpots(),t._trigger("setupComplete")})},_setOption:function(e,t){var n=this,r=this.options,i=this.element;r[e]=t,e==="hotSpotScrolling"?t===!0?n._showHideHotSpots():(i.data("scrollingHotSpotLeft").hide(),i.data("scrollingHotSpotRight").hide()):e==="autoScrollingStep"||e==="easingAfterHotSpotScrollingDistance"||e==="easingAfterHotSpotScrollingDuration"||e==="easingAfterMouseWheelScrollingDuration"?r[e]=parseInt(t,10):e==="autoScrollingInterval"&&(r[e]=parseInt(t,10),n.startAutoScrolling())},showHotSpotBackgrounds:function(e){var t=this,n=this.element,r=this.option;e!==undefined?(n.data("scrollingHotSpotLeft").addClass("scrollingHotSpotLeftVisible"),n.data("scrollingHotSpotRight").addClass("scrollingHotSpotRightVisible"),n.data("scrollingHotSpotLeft").add(n.data("scrollingHotSpotRight")).fadeTo(e,.35)):(n.data("scrollingHotSpotLeft").addClass("scrollingHotSpotLeftVisible"),n.data("scrollingHotSpotLeft").removeAttr("style"),n.data("scrollingHotSpotRight").addClass("scrollingHotSpotRightVisible"),n.data("scrollingHotSpotRight").removeAttr("style")),t._showHideHotSpots()},hideHotSpotBackgrounds:function(e){var t=this.element,n=this.option;e!==undefined?(t.data("scrollingHotSpotLeft").fadeTo(e,0,function(){t.data("scrollingHotSpotLeft").removeClass("scrollingHotSpotLeftVisible")}),t.data("scrollingHotSpotRight").fadeTo(e,0,function(){t.data("scrollingHotSpotRight").removeClass("scrollingHotSpotRightVisible")})):(t.data("scrollingHotSpotLeft").removeClass("scrollingHotSpotLeftVisible").removeAttr("style"),t.data("scrollingHotSpotRight").removeClass("scrollingHotSpotRightVisible").removeAttr("style"))},_showHideHotSpots:function(){var e=this,t=this.element,n=this.options;n.hotSpotScrolling?n.manualContinuousScrolling&&n.hotSpotScrolling&&n.autoScrollingMode!=="always"?(t.data("scrollingHotSpotLeft").show(),t.data("scrollingHotSpotRight").show()):n.autoScrollingMode!=="always"&&n.hotSpotScrolling?t.data("scrollableAreaWidth")<=t.data("scrollWrapper").innerWidth()?(t.data("scrollingHotSpotLeft").hide(),t.data("scrollingHotSpotRight").hide()):t.data("scrollWrapper").scrollLeft()===0?(t.data("scrollingHotSpotLeft").hide(),t.data("scrollingHotSpotRight").show(),e._trigger("scrollerLeftLimitReached"),clearInterval(t.data("leftScrollingInterval")),t.data("leftScrollingInterval",null)):t.data("scrollableAreaWidth")<=t.data("scrollWrapper").innerWidth()+t.data("scrollWrapper").scrollLeft()?(t.data("scrollingHotSpotLeft").show(),t.data("scrollingHotSpotRight").hide(),e._trigger("scrollerRightLimitReached"),clearInterval(t.data("rightScrollingInterval")),t.data("rightScrollingInterval",null)):(t.data("scrollingHotSpotLeft").show(),t.data("scrollingHotSpotRight").show()):(t.data("scrollingHotSpotLeft").hide(),t.data("scrollingHotSpotRight").hide()):(t.data("scrollingHotSpotLeft").hide(),t.data("scrollingHotSpotRight").hide())},_setElementScrollPosition:function(t,n){var r=this.element,i=this.options,s=0;switch(t){case"first":return r.data("scrollXPos",0),!0;case"start":if(i.startAtElementId!==""&&r.data("scrollableArea").has("#"+i.startAtElementId))return s=e("#"+i.startAtElementId).position().left,r.data("scrollXPos",s),!0;return!1;case"last":return r.data("scrollXPos",r.data("scrollableAreaWidth")-r.data("scrollWrapper").innerWidth()),!0;case"number":if(!isNaN(n))return s=r.data("scrollableArea").children(i.countOnlyClass).eq(n-1).position().left,r.data("scrollXPos",s),!0;return!1;case"id":if(n.length>0&&r.data("scrollableArea").has("#"+n))return s=e("#"+n).position().left,r.data("scrollXPos",s),!0;return!1;default:return!1}},jumpToElement:function(e,t){var n=this,r=this.element;if(r.data("enabled")&&n._setElementScrollPosition(e,t)){r.data("scrollWrapper").scrollLeft(r.data("scrollXPos")),n._showHideHotSpots();switch(e){case"first":n._trigger("jumpedToFirstElement");break;case"start":n._trigger("jumpedToStartElement");break;case"last":n._trigger("jumpedToLastElement");break;case"number":n._trigger("jumpedToElementNumber",null,{elementNumber:t});break;case"id":n._trigger("jumpedToElementId",null,{elementId:t});break;default:}}},scrollToElement:function(e,t){var n=this,r=this.element,i=this.options,s=!1;r.data("enabled")&&n._setElementScrollPosition(e,t)&&(r.data("autoScrollingInterval")!==null&&(n.stopAutoScrolling(),s=!0),r.data("scrollWrapper").stop(!0,!1),r.data("scrollWrapper").animate({scrollLeft:r.data("scrollXPos")},{duration:i.scrollToAnimationDuration,easing:i.scrollToEasingFunction,complete:function(){s&&n.startAutoScrolling(),n._showHideHotSpots();switch(e){case"first":n._trigger("scrolledToFirstElement");break;case"start":n._trigger("scrolledToStartElement");break;case"last":n._trigger("scrolledToLastElement");break;case"number":n._trigger("scrolledToElementNumber",null,{elementNumber:t});break;case"id":n._trigger("scrolledToElementId",null,{elementId:t});break;default:}}}))},move:function(e){var t=this,n=this.element,r=this.options;n.data("scrollWrapper").stop(!0,!0);if(e<0&&n.data("scrollWrapper").scrollLeft()>0||e>0&&n.data("scrollableAreaWidth")>n.data("scrollWrapper").innerWidth()+n.data("scrollWrapper").scrollLeft())r.easingAfterMouseWheelScrolling?n.data("scrollWrapper").animate({scrollLeft:n.data("scrollWrapper").scrollLeft()+e},{duration:r.easingAfterMouseWheelScrollingDuration,easing:r.easingAfterMouseWheelFunction,complete:function(){t._showHideHotSpots(),r.manualContinuousScrolling&&(e>0?t._checkContinuousSwapRight():t._checkContinuousSwapLeft())}}):(n.data("scrollWrapper").scrollLeft(n.data("scrollWrapper").scrollLeft()+e),t._showHideHotSpots(),r.manualContinuousScrolling&&(e>0?t._checkContinuousSwapRight():t._checkContinuousSwapLeft()))},getFlickrContent:function(t,n){var r=this,i=this.element;e.getJSON(t,function(t){function c(t,a){var p=t.media.m,d=p.replace("_m",s[a].letter),v=e("<img />").attr("src",d);v.load(function(){this.height<i.data("scrollableAreaHeight")?a+1<s.length?c(t,a+1):h(this):h(this);if(l===f){switch(n){case"addFirst":i.data("scrollableArea").children(":first").before(o);break;case"addLast":i.data("scrollableArea").children(":last").after(o);break;default:i.data("scrollableArea").html(o)}r.recalculateScrollableArea(),r._showHideHotSpots(),r._trigger("addedFlickrContent",null,{addedElementIds:u})}})}function h(t){var n=i.data("scrollableAreaHeight")/t.height,r=Math.round(t.width*n),s=e(t).attr("src").split("/"),a=s.length-1;s=s[a].split("."),e(t).attr("id",s[0]),e(t).css({height:i.data("scrollableAreaHeight"),width:r}),u.push(s[0]),o.push(t),l++}var s=[{size:"small square",pixels:75,letter:"_s"},{size:"thumbnail",pixels:100,letter:"_t"},{size:"small",pixels:240,letter:"_m"},{size:"medium",pixels:500,letter:""},{size:"medium 640",pixels:640,letter:"_z"},{size:"large",pixels:1024,letter:"_b"}],o=[],u=[],a,f=t.items.length,l=0;i.data("scrollableAreaHeight")<=75?a=0:i.data("scrollableAreaHeight")<=100?a=1:i.data("scrollableAreaHeight")<=240?a=2:i.data("scrollableAreaHeight")<=500?a=3:i.data("scrollableAreaHeight")<=640?a=4:a=5,e.each(t.items,function(e,t){c(t,a)})})},getAjaxContent:function(t,n,r){var i=this,s=this.element;e.ajaxSetup({cache:!1}),e.get(t,function(o){var u;r!==undefined?r.length>0?u=e("<div>").html(o).find(r):u=t:u=o;switch(n){case"addFirst":s.data("scrollableArea").children(":first").before(u);break;case"addLast":s.data("scrollableArea").children(":last").after(u);break;default:s.data("scrollableArea").html(u)}i.recalculateScrollableArea(),i._showHideHotSpots(),i._trigger("addedAjaxContent")})},getHtmlContent:function(t,n,r){var i=this,s=this.element,o;r!==undefined?r.length>0?o=e("<div>").html(t).find(r):o=t:o=t;switch(n){case"addFirst":s.data("scrollableArea").children(":first").before(o);break;case"addLast":s.data("scrollableArea").children(":last").after(o);break;default:s.data("scrollableArea").html(o)}i.recalculateScrollableArea(),i._showHideHotSpots(),i._trigger("addedHtmlContent")},recalculateScrollableArea:function(){var t=0,n=!1,r=this.options,i=this.element;i.data("scrollableArea").children(r.countOnlyClass).each(function(){r.startAtElementId.length>0&&e(this).attr("id")===r.startAtElementId&&(i.data("startingPosition",t),n=!0),t+=e(this).outerWidth(!0)}),n||i.data("startAtElementId",""),i.data("scrollableAreaWidth",t),i.data("scrollableArea").width(i.data("scrollableAreaWidth")),i.data("scrollWrapper").scrollLeft(i.data("startingPosition")),i.data("scrollXPos",i.data("startingPosition"))},getScrollerOffset:function(){var e=this.element;return e.data("scrollWrapper").scrollLeft()},stopAutoScrolling:function(){var e=this,t=this.element;t.data("autoScrollingInterval")!==null&&(clearInterval(t.data("autoScrollingInterval")),t.data("autoScrollingInterval",null),e._showHideHotSpots(),e._trigger("autoScrollingStopped"))},startAutoScrolling:function(){var e=this,t=this.element,n=this.options;t.data("enabled")&&(e._showHideHotSpots(),clearInterval(t.data("autoScrollingInterval")),t.data("autoScrollingInterval",null),e._trigger("autoScrollingStarted"),t.data("autoScrollingInterval",setInterval(function(){if(!t.data("visible")||t.data("scrollableAreaWidth")<=t.data("scrollWrapper").innerWidth())clearInterval(t.data("autoScrollingInterval")),t.data("autoScrollingInterval",null);else{t.data("previousScrollLeft",t.data("scrollWrapper").scrollLeft());switch(n.autoScrollingDirection){case"right":t.data("scrollWrapper").scrollLeft(t.data("scrollWrapper").scrollLeft()+n.autoScrollingStep),t.data("previousScrollLeft")===t.data("scrollWrapper").scrollLeft()&&(e._trigger("autoScrollingRightLimitReached"),clearInterval(t.data("autoScrollingInterval")),t.data("autoScrollingInterval",null),e._trigger("autoScrollingIntervalStopped"));break;case"left":t.data("scrollWrapper").scrollLeft(t.data("scrollWrapper").scrollLeft()-n.autoScrollingStep),t.data("previousScrollLeft")===t.data("scrollWrapper").scrollLeft()&&(e._trigger("autoScrollingLeftLimitReached"),clearInterval(t.data("autoScrollingInterval")),t.data("autoScrollingInterval",null),e._trigger("autoScrollingIntervalStopped"));break;case"backAndForth":t.data("pingPongDirection")==="right"?t.data("scrollWrapper").scrollLeft(t.data("scrollWrapper").scrollLeft()+n.autoScrollingStep):t.data("scrollWrapper").scrollLeft(t.data("scrollWrapper").scrollLeft()-n.autoScrollingStep),t.data("previousScrollLeft")===t.data("scrollWrapper").scrollLeft()&&(t.data("pingPongDirection")==="right"?(t.data("pingPongDirection","left"),e._trigger("autoScrollingRightLimitReached")):(t.data("pingPongDirection","right"),e._trigger("autoScrollingLeftLimitReached")));break;case"endlessLoopRight":t.data("scrollWrapper").scrollLeft(t.data("scrollWrapper").scrollLeft()+n.autoScrollingStep),e._checkContinuousSwapRight();break;case"endlessLoopLeft":t.data("scrollWrapper").scrollLeft(t.data("scrollWrapper").scrollLeft()-n.autoScrollingStep),e._checkContinuousSwapLeft();break;default:}}},n.autoScrollingInterval)))},_checkContinuousSwapRight:function(){var t=this.element,n=this.options;t.data("getNextElementWidth")&&(n.startAtElementId.length>0&&t.data("startAtElementHasNotPassed")?(t.data("swapAt",e("#"+n.startAtElementId).outerWidth(!0)),t.data("startAtElementHasNotPassed",!1)):t.data("swapAt",t.data("scrollableArea").children(":first").outerWidth(!0)),t.data("getNextElementWidth",!1));if(t.data("swapAt")<=t.data("scrollWrapper").scrollLeft()){t.data("swappedElement",t.data("scrollableArea").children(":first").detach()),t.data("scrollableArea").append(t.data("swappedElement"));var r=t.data("scrollWrapper").scrollLeft();t.data("scrollWrapper").scrollLeft(r-t.data("swappedElement").outerWidth(!0)),t.data("getNextElementWidth",!0)}},_checkContinuousSwapLeft:function(){var t=this.element,n=this.options;t.data("getNextElementWidth")&&(n.startAtElementId.length>0&&t.data("startAtElementHasNotPassed")?(t.data("swapAt",e("#"+n.startAtElementId).outerWidth(!0)),t.data("startAtElementHasNotPassed",!1)):t.data("swapAt",t.data("scrollableArea").children(":first").outerWidth(!0)),t.data("getNextElementWidth",!1)),t.data("scrollWrapper").scrollLeft()===0&&(t.data("swappedElement",t.data("scrollableArea").children(":last").detach()),t.data("scrollableArea").prepend(t.data("swappedElement")),t.data("scrollWrapper").scrollLeft(t.data("scrollWrapper").scrollLeft()+t.data("swappedElement").outerWidth(!0)),t.data("getNextElementWidth",!0))},restoreOriginalElements:function(){var e=this,t=this.element;t.data("scrollableArea").html(t.data("originalElements")),e.recalculateScrollableArea(),e.jumpToElement("first")},show:function(){var e=this.element;e.data("visible",!0),e.show()},hide:function(){var e=this.element;e.data("visible",!1),e.hide()},enable:function(){var e=this.element;e.data("enabled",!0)},disable:function(){var e=this,t=this.element;e.stopAutoScrolling(),clearInterval(t.data("rightScrollingInterval")),clearInterval(t.data("leftScrollingInterval")),clearInterval(t.data("hideHotSpotBackgroundsInterval")),t.data("enabled",!1)},destroy:function(){var t=this,n=this.element;t.stopAutoScrolling(),clearInterval(n.data("rightScrollingInterval")),clearInterval(n.data("leftScrollingInterval")),clearInterval(n.data("hideHotSpotBackgroundsInterval")),n.data("scrollingHotSpotRight").unbind("mouseover"),n.data("scrollingHotSpotRight").unbind("mouseout"),n.data("scrollingHotSpotRight").unbind("mousedown"),n.data("scrollingHotSpotLeft").unbind("mouseover"),n.data("scrollingHotSpotLeft").unbind("mouseout"),n.data("scrollingHotSpotLeft").unbind("mousedown"),n.unbind("mousenter"),n.unbind("mouseleave"),n.data("scrollingHotSpotRight").remove(),n.data("scrollingHotSpotLeft").remove(),n.data("scrollableArea").remove(),n.data("scrollWrapper").remove(),n.html(n.data("originalElements")),e.Widget.prototype.destroy.apply(this,arguments)}})})(jQuery);