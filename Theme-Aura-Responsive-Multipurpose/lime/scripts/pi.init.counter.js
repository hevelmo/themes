jQuery(function($){

	//region piCounter
	if($.fn.piCounter){
		$('.pi-counter').each(function(){
			$(this).one('inview',function(){
				$(this).piCounter();
			});
		});
	}
	//endregion

});