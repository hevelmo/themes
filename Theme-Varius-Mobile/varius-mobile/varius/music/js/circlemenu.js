function circlemenu() {
	var ulc=$("ul#navs");
	var lic=$("#navs li");
	var i=lic.length;
	var n=i-1;
	var r=60;
	ulc.click(function(){
		$(this).toggleClass('active');
		if($(this).hasClass('active')){
			for(var a=0;a<i;a++){
				lic.eq(a).css({
					'transition-delay':""+(50*a)+"ms",
					'-webkit-transition-delay':""+(50*a)+"ms",
					'left':(-r*Math.cos(90/n*a*(Math.PI/180))),
					'top':(-r*Math.sin(90/n*a*(Math.PI/180)))	
				});
			}
		}else{
			lic.removeAttr('style');
		}
	});
}
