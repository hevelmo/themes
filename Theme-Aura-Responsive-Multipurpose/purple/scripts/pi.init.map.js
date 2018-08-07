jQuery(function($){

	//region Google Map
	if($.fn.gMap){
		$('.pi-google-map').each(function (i) {
			var $map = $(this),
				markers = [],
				type = $map.data('mapType') || 'roadmap',
				zoom = $map.data('mapZoom') || 14,
				style = $map.data('mapStyle') || [],
				scrollwheel = $map.data('mapScrollWheel') || 0,
				markerImg = $map.data('mapMarker') || '',
				markerImgSize = $map.data('mapMarkerSize') || [],
				markerAnchor = $map.data('mapMarkerAnchor') || [];

			if(markerImg) {

				if(markerImgSize.length > 1){
					markerImgSize = markerImgSize.split(',');
					markerImgSize[0] = parseInt(markerImgSize[0], 10);
					markerImgSize[1] = parseInt(markerImgSize[1], 10);
				}

				if(markerAnchor.length > 1){
					markerAnchor = markerAnchor.split(',');
					markerAnchor[0] = parseInt(markerAnchor[0], 10);
					markerAnchor[1] = parseInt(markerAnchor[1], 10);
				}

			}

			buildMarkers();

			function buildMarkers(){

				var data = $map.data(),
					dataArray = [],
					addresses = [],
					titles = [],
					coords = [];

				for(var prop in data){
					if (data.hasOwnProperty(prop)) {
						dataArray[prop] = data[prop];
					}
				}

				for(var prop2 in dataArray){
					if (dataArray.hasOwnProperty(prop2)) {
						if(~prop2.indexOf('mapAddress')){
							addresses.push(dataArray[prop2]);
						} else if(~prop2.indexOf('mapCoords')){
							var c = dataArray[prop2].split(';');
							if(c.length > 1){
								coords.push({
									latitude: c[0],
									longitude: c[1]
								});
							}
						} else if(~prop2.indexOf('mapTitle')){
							titles.push(dataArray[prop2]);
						}
					}
				}

				for(var i = addresses.length - 1; i >= 0; i--){
					var marker = {
						address: addresses[i] ? addresses[i] : '',
						title: titles[i] ? titles[i] : ''
					};

					if(markerImg){
						marker.icon = {
							image: markerImg,
							iconsize: markerImgSize,
							iconanchor: markerAnchor
						}
					}

					markers.push(marker);
				}

				for(var j = coords.length - 1; j >= 0; j--){
					var marker2 = {
						latitude: coords[j] ? coords[j].latitude : '',
						longitude: coords[j] ? coords[j].longitude : '',
						title: titles[j] ? titles[j] : ''
					};

					if(markerImg){
						marker2.icon = {
							image: markerImg,
							iconsize: markerImgSize,
							iconanchor: markerAnchor
						}
					}

					markers.push(marker2);
				}

			}

			if(style && window['googleMapStyle_' + style] && window['googleMapStyle_' + style].length){
				style = window['googleMapStyle_' + style];
			}


			if(markers[0].address){
				$map.gMap({
					maptype: type,
					address: markers[0].address,
					zoom: zoom,
					styles: style,
					scrollwheel: scrollwheel,
					markers: markers
				});
			} else if(markers[0].latitude) {
				$map.gMap({
					maptype: type,
					latitude: markers[0].latitude,
					longitude: markers[0].longitude,
					zoom: zoom,
					styles: style,
					scrollwheel: scrollwheel,
					markers: markers
				});
			}

		});
	}
	//endregion

});