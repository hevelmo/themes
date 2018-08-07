jQuery(function($){

	//region colorbox
	if($.fn.colorbox){

		var $d = $(document),
			$w = $(window),
			$colorboxLinks = $('.pi-colorbox'),
			//Breakpoints could be 3xs, 2xs, xs, sm, md, lg
			breakpoints = [
				'sm',
				'md',
				'lg'
			],
			colorboxState = 0,
			colorboxNeeded = 0;


		function piColorboxInit(){

			colorboxNeeded = 0;

			for(var i in breakpoints){
				if(breakpoints[i] == window.piCurrentBound){
					colorboxNeeded = 1;
					break;
				}
			}

			if(colorboxNeeded && !colorboxState){
				$colorboxLinks.each(function(){
					var $el = $(this),
						videoData = $el.data('videoSize'),
						videoSize = videoData ? videoData.split(',') : 0,
						groupFromData = $el.data('colorboxGroup'),
						group = groupFromData ? groupFromData : 'pi-group';

					if(videoSize[0]){
						videoSize[0] = parseInt(videoSize[0], 10);
						videoSize[1] = parseInt(videoSize[1], 10);
						if(typeof(videoSize[0]) == 'number' && typeof(videoSize[1]) == 'number'){
							$el.colorbox({
								rel:group,
								iframe:true,
								innerWidth: videoSize[0],
								innerHeight: videoSize[1],
								maxWidth:'95%',
								maxHeight:'95%'
							});
						}
					} else {
						$el.colorbox({
							rel:group,
							maxWidth:'95%',
							maxHeight:'95%'
						});
					}

				});
				colorboxState = 1;
			} else if(!colorboxNeeded && colorboxState) {
				$colorboxLinks.colorbox.remove();
				colorboxState = 0;
			}
		}

		$d.bind('piBoundChanged', piColorboxInit);
		piColorboxInit();

	}
	//endregion

});