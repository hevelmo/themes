jQuery(function($){

	$.fn.piCounter = function(){

		var types = [
			'simple',
			'line',
			'circle'
		],
		defaultType = types[0],
		defaultFrom = 0,
		defaultTo = 100,
		defaultFramesPerSecond = 20,
		defaultDuration = 3000,
		defaultEasing = 'none',
		defaultColorStart = '#835fbb',
		defaultColorStop = '#835fbb',
		defaultColorStroke = '#edeff3',
		defaultLineWidth = 0.025,
		defaultCircleAnimationSpeed = 32;

		return this.each(function() {

			var $el = $(this),
				$elColors = $el.find('.pi-counter-circle-colors'),
				$blockNum = $el.find('.pi-counter-number'),
				$blockProgress = $el.find('.pi-counter-progress'),
				/*elId = $el.attr('id') ? $el.attr('id') : '',*/
				type = $el.data('counterType') ? $el.data('counterType') : defaultType,
				start = $el.data('countFrom') ? $el.data('countFrom') : defaultFrom,
				end = $el.data('countTo') ? $el.data('countTo') : defaultTo,
				duration = $el.data('duration') ? $el.data('duration') : defaultDuration,
				easing = $el.data('easing') ? $el.data('easing') : defaultEasing,
				frameRate = 1000 / ($el.data('framesPerSecond') ? $el.data('framesPerSecond') :defaultFramesPerSecond),
				_colorStart = $elColors.css('background-color') ? rgb2hex($elColors.css('background-color')) : defaultColorStart,
				_colorStop = $elColors.css('background-color') ? rgb2hex($elColors.css('background-color')) : defaultColorStop,
				_colorStroke = $elColors.css('border-color') ? rgb2hex($elColors.css('border-color')) : defaultColorStroke,
				_lineWidth = $el.data('lineWidth') ? $el.data('lineWidth') : defaultLineWidth,
				_circleAnimationSpeed = $el.data('circleAnimationSpeed') ? $el.data('circleAnimationSpeed') : defaultCircleAnimationSpeed,
				step = Math.abs(end - start) / (duration / frameRate),
				current = start,
				currentTime = 0;

			function updateNum(){
				if(easing === 'none'){
					current += step;
				} else if($.easing[easing]) {
					step = $.easing[easing](0, currentTime, start, end, duration);
					if(step > end){
						step = end;
					}
					current = step;
				}
				$blockNum.html(parseInt(current, 10));
			}

			function updateWidth(){
				$blockProgress.css({
					width: parseInt(end, 10) + '%'
				});
			}

			function startAnimation(){
				if(type === types[0]) {
					setInitialNum();
					if($blockNum.length){
						animate();
					}
				} else if(type === types[1]) {
					setInitialWidth();
					if($blockProgress.length){
						setTimeout(function(){
							updateWidth();
						},100);
					}
				} else if(type === types[2]){
						var opts = {
							lines: 12, // The number of lines to draw
							angle: 0.5, // The length of each line
							lineWidth: _lineWidth, // The line thickness
							limitMax: 'false',   // If true, the pointer will not go past the end of the gauge
							colorStart: _colorStart,   // Colors
							colorStop: _colorStop,    // just experiment with them
							strokeColor: _colorStroke, // to see which ones work best for you
							generateGradient: false
						};
						var target = $el.find('canvas')[0]; // your canvas element
						var gauge = new Donut(target).setOptions(opts); // create sexy gauge!
						gauge.maxValue = 100; // set max gauge value
						gauge.animationSpeed = _circleAnimationSpeed; // set animation speed (32 is default value)
						gauge.set(end); // set actual value
					}

				/*}*/
			}

			function setInitialNum(){
				$blockNum.html(parseInt(start, 10));
			}

			function setInitialWidth(){
				$blockProgress.css({
					width: parseInt(start, 10) + '%'
				});
			}

			function animate(){
				setTimeout(function(){
					if(currentTime < duration){
						currentTime += frameRate;
						if(type === types[0]) {
							updateNum();
						}
						animate();
					}
				}, frameRate );
			}

			function init(){
				startAnimation();
			}

			init();

		});
	};

});