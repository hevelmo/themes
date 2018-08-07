var piBounds = {
	lg: 1140,
	md: 992,
	sm: 768,
	xs: 480,
	xs2: 320
};

jQuery(function($){

	var $w = $(window),
		$d = $(document),
		resizeTMT;

	window.piViewportSize = getViewportSize();
	window.piViewportWidth = window.piViewportSize.width;
	window.piViewportHeight = window.piViewportSize.height;
	window.piCurrentBound = piBounds[0];

	function checkBound(){

		var previousBound = window.piCurrentBound;

		window.piViewportSize = getViewportSize();
		window.piViewportWidth = window.piViewportSize.width;
		window.piViewportHeight = window.piViewportSize.height;

		if(window.piViewportWidth >= piBounds.lg && window.piCurrentBound != 'lg'){
			window.piCurrentBound = 'lg';
		} else if(window.piViewportWidth >= piBounds.md && window.piViewportWidth < piBounds.lg && window.piCurrentBound != 'md') {
			window.piCurrentBound = 'md';
		} else if(window.piViewportWidth >= piBounds.sm && window.piViewportWidth < piBounds.md && window.piCurrentBound != 'sm') {
			window.piCurrentBound = 'sm';
		} else if(window.piViewportWidth >= piBounds.xs && window.piViewportWidth < piBounds.sm && window.piCurrentBound != 'xs') {
			window.piCurrentBound = 'xs';
		} else if(window.piViewportWidth >= piBounds.xs2 && window.piViewportWidth < piBounds.xs && window.piCurrentBound != '2xs') {
			window.piCurrentBound = '2xs';
		} else if(window.piViewportWidth < piBounds.xs2 && window.piCurrentBound != '3xs') {
			window.piCurrentBound = '3xs';
		}
		if(previousBound != window.piCurrentBound){
			$d.trigger('piBoundChanged');
		}

	}

	$w.resize(function(){
		clearTimeout(resizeTMT);
		resizeTMT = setTimeout(function(){
			checkBound();
		}, 10);
	});

	$w.trigger('resize');


});