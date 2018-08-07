jQuery(function($){

//region Columns fix
	var $w = $(window),
		$galleries = $('.pi-gallery.pi-column-fix'),
		$liquidGalleries = $galleries.filter('[class*=pi-liquid-col]');

	$liquidGalleries.each(function(){

		var $g = $(this),
			$gItems = $g.find('.pi-gallery-item'),
			isStacked = $g.hasClass('pi-stacked'),
			itemsWidthRejected = 0;

		detectColumnSizeNumber($g,'gallery');

		$w.load(function () {
			var tmt;

			$w.resize(function(){
				if(!itemsWidthRejected){
					itemsWidthRejected = 1;
					$gItems.each(function(i){
						var $el = $(this);
						$el.css('width', '');
					});
				}
			});

			$w.resize(function(){
				clearTimeout(tmt);
				tmt = setTimeout(function(){

					itemsWidthRejected = 0;

					if(isStacked){
						$g.css('cssText', 'margin-right: 0 !important');
					}

					var cols = $g.data('width-' + window.piCurrentBound),
						galleryWidth = $g.width(),
						galleryItemPadding = parseInt($gItems.eq(0).css('padding-left'), 10) + parseInt($gItems.eq(0).css('padding-right'), 10),
						galleryWidthWithoutPadding = galleryWidth - cols*galleryItemPadding,
						itemWidthExcess = galleryWidthWithoutPadding % cols,
						galleryItemWidth = (galleryWidthWithoutPadding - itemWidthExcess) / cols;

					if(itemWidthExcess && isStacked){
						galleryItemWidth++;
						$g.css('cssText', 'margin-right: -' + cols + 'px !important');
					} else if(isStacked) {
						$g.css('cssText', 'margin-right: 0 !important');
					}

					$gItems.each(function(i){
						var $el = $(this);
						$el.width(galleryItemWidth);
					});

				}, 100);

			});
			$w.trigger('resize');
		});

	});

	var $colsToFix = $('.pi-column-fix').filter('[class*=pi-col-]');

	if($colsToFix.length){

		$w.load(function () {

			var tmt;

			$colsToFix.each(function(){
				detectColumnSizeNumber($(this),'grid');
			});

			$w.resize(function(){

				clearTimeout(tmt);

				tmt = setTimeout(function(){

					$colsToFix.each(function(){

						var $el = $(this),
							elPadding = parseInt($el.css('padding-left'), 10) + parseInt($el.css('padding-right'), 10),
							newWidth = Math.floor( $el.parent().width() / 12 * $el.data('width-' + window.piCurrentBound ) ) - elPadding;

						$(this).width(newWidth);

					});

				}, 100);
			});

			$w.trigger('resize');
		});

	}

	function detectColumnSizeNumber($el, gridType){

		var classesList = $el.attr('class'),
			gClasses = classesList.match(/pi-liquid-col-\d?\D\D-\d/g) || classesList.match(/pi-col-\d?\D\D-\d/g),
			bounds = {};

		for(var i = 0; i < gClasses.length; i++){
			var bound = gClasses[i].match(/pi-liquid-col-(\d?\D\D)-(\d)/i) || gClasses[i].match(/pi-col-(\d?\D\D)-(\d)/i);
			if(bound){
				bounds[bound[1]] = bound[2];
			}
		}

		if(gridType == 'gallery'){
			if(!bounds['3xs']) {
				bounds['3xs'] = 1;
			}
		} else {
			if(!bounds['3xs']) {
				bounds['3xs'] = 12;
			}
		}

		if(!bounds['2xs']) {
			bounds['2xs'] = bounds['3xs'];
		}
		if(!bounds['xs']) {
			bounds['xs'] = bounds['2xs'];
		}
		if(!bounds['sm']) {
			bounds['sm'] = bounds['xs'];
		}
		if(!bounds['md']) {
			bounds['md'] = bounds['sm'];
		}
		if(!bounds['lg']) {
			bounds['lg'] = bounds['md'];
		}

		for(var bound in bounds){
			$el.data('width-' + bound, bounds[bound]);
		}
	}
	//endregion

});