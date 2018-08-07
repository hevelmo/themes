jQuery(function($){

	//region Socials jumps
	$('.pi-jump a,' +
		'.pi-jump-bg a').each(function () {
			var $el = $(this);
			$el.append($el.find('i').clone());
		});

	$('.pi-social-icons-big a i').wrap('<span></span>');
	//endregion

});