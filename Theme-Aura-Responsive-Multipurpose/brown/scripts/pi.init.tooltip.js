jQuery(function($){

	//region Tooltip
	if($.fn.tooltip){
		$('.pi-tooltip').each(function(){
			var $el = $(this),
				size = $el.data('tooltipSize');
			if($el.hasClass('pi-tooltip-base')){
				$el.tooltip({
					template: '<div class="tooltip pi-base"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
					trigger: 'hover',
					size: size
				});
			} else {
				$el.tooltip({
					template: '<div class="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
					trigger: 'hover',
					size: size
				});
			}
		});
	}
	//endregion

});