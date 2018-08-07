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