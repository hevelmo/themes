jQuery(function($){

	//region Section Full Height
	var $w = $(window),
		$sections = $('.pi-section-high, .pi-block-high'),
		resizeTMT;

	$w.resize(function(){
		clearTimeout(resizeTMT);
		resizeTMT = setTimeout(function(){
			setSectionHeight();
		}, 100);
	});

	setSectionHeight();

	function setSectionHeight(){
		$sections.each(function(){
			var $el = $(this);
			$el.height(window.piViewportHeight);
		});
	}

	//endregion

});