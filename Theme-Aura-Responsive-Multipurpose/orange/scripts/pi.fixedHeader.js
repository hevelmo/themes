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