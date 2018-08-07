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