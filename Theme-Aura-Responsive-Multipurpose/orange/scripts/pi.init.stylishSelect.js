jQuery(function($){

	//region Stylish Select
	if($.fn.sSelect){
		$('.pi-stylish-select').sSelect({
			ddMaxHeight: '200px'
		});
		$('.newListSelected').append('<span class="pi-select-icon"></span>')
	}
	//endregion

});