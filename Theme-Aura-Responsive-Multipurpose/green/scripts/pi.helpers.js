
//region getViewportSize
function getViewportSize(){
	var e = window, a = 'inner';
	if (!('innerWidth' in window )) {
		a = 'client';
		e = document.documentElement || document.body;
	}
	return { width : e[ a+'Width' ] , height : e[ a+'Height' ] };
}
//endregion

//region old IE rgba backgrounds fix
function fixIE8rgba() {
	var $ = jQuery;

	if(isOldIE() === 8){
		var selectors = [
				'.pi-tooltip'
			],
			$elements = $(selectors.join(','));
		$elements.each(function(){
			var $el = $(this),
				bg = $el.css('background'),
				rgba = bg.match(/rgba\((\d{1,3}),(\d{1,3}),(\d{1,3}),(\d{1,3})\)/),
				hex = rgba ? rgba2hex(rgba[1],rgba[2],rgba[3],rgba[4]) : '#000000';
			if(rgba && hex){
				$el.css('background', 'filter: progid:DXImageTransform.Microsoft.gradient(startColorStr=' + hex + ', EndColorStr=' + hex + ')')
			}
		});
	}
}
//endregion

//region old IE detection
function isOldIE() {
	var version = navigator.appVersion.match(/MSIE (\d)\.\d*/);
	if(version){
		return version[1];
	}
	return false;
}
//endregion

//region RGB -> HEX
var hexDigits = new Array
("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f");

function rgb2hex(rgb) {
	if(!rgb) {
		rgb ='rgb(0,0,0)';
	}
	rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
	return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
}

function hex(x) {
	return isNaN(x) ? "00" : hexDigits[(x - x % 16) / 16] + hexDigits[x % 16];
}
//endregion

//region RGBA -> HEX
function rgba2hex(r, g, b, a) {
	if (r > 255 || g > 255 || b > 255 || a > 255)
		throw "Invalid color component";
	return (256 + r).toString(16).substr(1) +((1 << 24) + (g << 16) | (b << 8) | a).toString(16).substr(1);
}
//endregion

function getElementHeight($el){
	var $ = jQuery,
		h = 0,
		vis = $el.css('visibility'),
		display = $el.css('display');

	if(display == 'none' || display == 'none !important'){
		$el.css({
			visibility: 'hidden',
			display: 'block'
		});
		h = $el.outerHeight();
		$el.css({
			visibility: vis,
			display: display
		});
	} else {
		h = $el.outerHeight();
	}
	return h;
}