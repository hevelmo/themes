(function($) {
  "use strict";
$(window).load(function() { // makes sure the whole site is loaded
 $('#status').fadeOut('slow');
 $('#preloader').fadeOut('slow');     
});

// Gumby is ready to go
Gumby.ready(function() {
	Gumby.log('Anthem is ready to go...', Gumby.dump());

	
/* Responsive Header Ipad and below
=========================*/
if (matchMedia('only screen and (max-width: 768px)').matches) {

  //block slider
	$('.block-slider').flexslider({
        animation: "slide",
		directionNav: true,
		smoothHeight: false,
		controlNav: true,
		slideshow:false,
		controlsContainer: ".block-nav",
		manualControls: ".block-slider-nav li.nav-button"
      });

}

	
/* Main Content Scrollbar
========================= */
if (matchMedia('only screen and (min-width: 1025px)').matches) {
	$('.content #scrollarea').niceScroll({
		cursorcolor:'#B163A3',
		cursorwidth: '14px',
		background:'#333333',
		horizrailenabled: false,
		autohidemode: false,
		cursorborder: false,
		grabcursorenabled: true,
		zindex: 1500,	
	});
}

if (matchMedia('only screen and (min-width: 768px)').matches) {
	$('.content #scrollarea').niceScroll({
		cursorcolor:'#B163A3',
		background:'#333333',
		horizrailenabled: false,
		autohidemode: false,
		cursorborder: false,
		grabcursorenabled: true,
		zindex: 1500,	
	});
}
	
/* Header Scrollbar
=========================*/
	$('.trigger-box a i.fa-bars').on(Gumby.click,function(){
		$('#header-scrollarea').niceScroll({
			cursorcolor:'#B163A3',
			horizrailenabled: false,
			autohidemode: false,
			cursorborder: false,
			grabcursorenabled: true,
			zindex: 1500,
			railpadding: {
			right:4,
			},		
		});
		 $('.side-logo').fadeOut();
	});

	 if (matchMedia('only screen and (max-width: 768px)').matches) {
	 $('.trigger-box a i.fa-bars').on(Gumby.click,function(){
		$('body').css('overflow-y', 'hidden');
		});
	 }
	
	// close header remove header scrollbar
	$('.trigger-box a i.fa-times').on(Gumby.click,function(){
		$('#header-scrollarea').getNiceScroll().remove();
		 $('.side-logo').fadeIn();
	});
	
	 if (matchMedia('only screen and (max-width: 768px)').matches) {
	 $('.trigger-box a i.fa-times').on(Gumby.click,function(){
		$('body').css('overflow-y', 'scroll');
		});
	 }
	
/* Planner
=========================*/
	$('a.planner-btn').on(Gumby.click,function(){
		$('.planner-modal').addClass('active');
		// create planner custom scroll bar    
	  $('#planner-scrollarea').niceScroll({
			cursorcolor:'#B163A3',
			horizrailenabled: false,
			autohidemode: false,
			cursorborder: false,
			grabcursorenabled: true,
			zindex: 1500,
			railpadding: {
			right:4,
			},		
		});
	 });	 
	 if (matchMedia('only screen and (max-width: 768px)').matches) {
	 $('a.planner-btn').on(Gumby.click,function(){
		$('.content.custom-scroll').height('100%');
		$('body').css('overflow-y', 'hidden');
		});
	 }
	 
	 //close planner remove planner scrollbar 
	 $('a.remove-planner').on(Gumby.click,function(){
		$('.planner-modal').removeClass('active');
		$('#planner-scrollarea').getNiceScroll().remove();
	 });
	 
	 if (matchMedia('only screen and (max-width: 768px)').matches) {
	 $('a.remove-planner').on(Gumby.click,function(){
		$('.content.custom-scroll').css('height', 'auto');
		$('body').css('overflow-y', 'scroll');
		});
	 }
	
	
/* Hidden Sidebar
=========================*/
	$('a.open-sidebar').on(Gumby.click,function(){
	   $('.content #scrollarea').getNiceScroll().hide();
		// create sidebar scroll bar    
	   $('#sidebar-scrollarea').niceScroll({
			cursorcolor:'#B163A3',
			horizrailenabled: false,
			autohidemode: false,
			cursorborder: false,
			grabcursorenabled: true,
			zindex: 1500,
			railpadding: {
			right:4,
			},		
		});
	 });	 
	 if (matchMedia('only screen and (max-width: 768px)').matches) {
	 $('a.open-sidebar').on(Gumby.click,function(){
		$('.content.custom-scroll').height('100%');
		$('body').css('overflow-y', 'hidden');
		});
	 }

	 
	// close sidebar remove sidebar scrollbar
	$('a.close-sidebar').on(Gumby.click,function(){
		$('#sidebar-scrollarea').getNiceScroll().remove();
		$('.content #scrollarea').getNiceScroll().show();
	});
	
	 if (matchMedia('only screen and (max-width: 768px)').matches) {
	 $('a.close-sidebar').on(Gumby.click,function(){
		$('.content.custom-scroll').css('height', 'auto');
		$('body').css('overflow-y', 'scroll');
		});
	 }

/* Project Detail Scrollbar
=========================*/
	$('a.open-details').on(Gumby.click,function(){
		$('#project-detail-scrollarea').niceScroll({
			cursorcolor:'#B163A3',
			horizrailenabled: false,
			autohidemode: false,
			cursorborder: false,
			grabcursorenabled: true,
			zindex: 1500,
			railpadding: {
			right:4,
			},
		});	
	});
	
	 if (matchMedia('only screen and (max-width: 768px)').matches) {
	 $('a.open-slide').on(Gumby.click,function(){
		$('.content.custom-scroll').height('100%');
		$('body').css('overflow-y', 'hidden');
		});
	 }
	// close portfolio details
	$('a.close-details').on(Gumby.click,function(){
		$('#project-detail-scrollarea').getNiceScroll().remove();
	});
	 if (matchMedia('only screen and (max-width: 768px)').matches) {
	$('.closeProject a').on(Gumby.click,function(){
		$('.content.custom-scroll').css('height', 'auto');
		$('body').css('overflow-y', 'scroll');
		});
	 }
	

	$('.content #scrollarea').scroll(function(){    
		var scroll = $('.content #scrollarea').scrollTop();
		
		//hide side logo
		if (matchMedia('only screen and (min-width: 769px)').matches) {
			if (scroll >= 800) {
				 $('.side-logo').fadeOut('slow');
			} else {
				 $('.side-logo').fadeIn('slow');
			}
		}
		// Display back to top button
		//disable side logo
		if (scroll >= 850) {
			$('.back-to-top').addClass('active');
			$('.side-logo').addClass('inactive');
		} else {
			$('.back-to-top').removeClass('active');
			$('.side-logo').removeClass('inactive');
		}
		
		// fade slideshow caption on scroll
		if (scroll >= 250){
			$('.slide-caption .do-fade').addClass('fade');
		}else{
			$('.slide-caption .do-fade').removeClass('fade')
		}

	});

	//back to top button
	 $('a#top-trigger').on(Gumby.click,function(){
		$('.content #scrollarea').animate( { scrollTop:0}, 750);
	 });
	
/* Modal Scrollbar
=========================*/	 
$('.modal > .content').niceScroll({
		cursorcolor:'#B163A3',
		cursorwidth: '4px',
		horizrailenabled: false,
		autohidemode: false,
		cursorborder: false,
		grabcursorenabled: true,
		zindex: 1500,	
	});		
	
/* Number Counter
=========================*/
	$('.stat-counter').appear(function() {
		$('.stat-counter').each(function(){
			$('.stat-counter').countTo({
			speed: 1000,
			refreshInterval: 50,
			});
		});
	 }); 
	 
/*	Piechart
=========================*/
	$('.chart').appear(function() {
		$('.chart').easyPieChart({
			animate: 1300,
			size: 120,
			scaleColor: false,
			lineWidth: 10,
			trackColor: '#E9EDEE',	
		});
	});	
	
	
/* Sliders
=========================*/
	// intro text slider
	$('.intro-text-slider').flexslider({
        animation: "fade",
		directionNav: false,
		smoothHeight: false,
		slideshow: false,
      });
	  
	  // single project page
	  $('.full-slider').flexslider({
        animation: "slide",
		directionNav: true,
		smoothHeight: false,
		controlNav: false,
      });
	  

if (matchMedia('only screen and (min-width: 768px)').matches) {
	  //block slider
	$('.block-slider').flexslider({
        animation: "slide",
		directionNav: false,
		smoothHeight: false,
		controlNav: true,
		slideshow:false,
		controlsContainer: ".block-nav",
		manualControls: ".block-slider-nav li.nav-button"
      });
}	  
	  //img nav slider
	  $('.img-nav-slider').flexslider({
        animation: "fade",
		smoothHeight: false,
		controlNav: true,
		directionNav: true,
		slideshow:false,
		controlsContainer: ".img-nav",
		manualControls: ".img-slider-nav li.nav-button"
      });

	//home-default-slider
	$('#slides.home').superslides({
	play:3400,
	});
	function slideAnimation(element, animation){	
		element = $('.slide-caption');
		$(document).on('animated.slides',
			function() {
				element.addClass('animated ' + animation);   
				window.setTimeout( function(){
					element.removeClass('animated' + animation);
				}, 1000);       
			}
		);
	}
	slideAnimation('.slide-caption', 'fadeInRightBig');
	
/* Header Click
=========================*/
	$('.trigger-box a').on(Gumby.click,function(){
		$('.blocker').toggleClass('active');
		$('.trigger').toggleClass('active');
		//$('header.main').toggleClass('active');
		$('.trigger-box a i.fa-bars').toggleClass('active');
		$('.trigger-box a i.fa-times').toggleClass('active');
	});	
	
	if (matchMedia('only screen and (min-width: 769px)').matches) {
	$('.trigger-box a').on(Gumby.click,function(){
			$('.action').toggleClass('active');
		});		
	}
	
	

/*Lightbox
=========================*/
	$("a[rel^='prettyPhoto']").prettyPhoto({
		theme:'light_square',
		social_tools: '',
		deeplinking:false,
		slideshow: false,
		markup:'<div class="pp_pic_holder"> 						<div class="ppt"> </div> 											<div class="pp_content_container"> 							<div class="pp_left"> 							<div class="pp_right"> 								<div class="pp_content"> 									<div class="pp_loaderIcon"></div> 									<div class="pp_fade"> 										<a href="#" class="pp_expand" title="Expand the image">Expand</a> 																	<div id="pp_full_res"></div> 										<div class="pp_details"> 											<div class="pp_nav"> 												<a href="#" class="pp_arrow_previous"><i class="fa fa-chevron-left"></i></a> 												<p class="currentTextHolder">0/0</p> 	<p class="pp_description"></p> 											<a href="#" class="pp_arrow_next"><i class="fa fa-chevron-right"></i></a> 											</div> 																						 											<a class="pp_close" href="#"><i class="fa fa-times"></i></a> 										</div> 									</div> 								</div> 							</div> 							</div> 						</div> 						 					</div> 					<div class="pp_overlay"></div>',
		gallery_markup:'<div class="pp_gallery"> 								<a href="#" class="pp_arrow_previous"></a> 								<div> 									<ul> 										{gallery} 									</ul> 								</div> 								<a href="#" class="pp_arrow_next"></a> 							</div>',
	});

	
/* Search
=========================*/
	 $('a.search-btn').on(Gumby.click,function(){
		$('.search-modal').addClass('active');
	 });
	 
	 $('a.remove-search').on(Gumby.click,function(){
		$('.search-modal').removeClass('active');
	 });
	 	 
/* Video Modal
=========================*/
	$('a.open-video').on(Gumby.click,function(){
		var videoBox = $('div.video');
		//add video source here
		videoBox.prepend('<iframe src="http://player.vimeo.com/video/72442303?autoplay=1"></iframe>');
	});

	$('a.remove-video').on(Gumby.click,function(){
		$("div.video > iframe").remove().fadeOut(300);
	});

/* Member Info
=========================*/
	$('.member a.open').on(Gumby.click,function(){
		$('.member').addClass('active');
	});
	
	$('.member-more-info a.close').on(Gumby.click,function(){
		$('.member a.open').removeClass('active');
		$('.member').removeClass('active');
	});
	
/* Intro 100% Height
========================= */
if (matchMedia('only screen and (min-width: 769px)').matches) {
	var viewportHeight = $(window).height();
	 $('#intro').css('height', viewportHeight + 'px');
	 $(window).resize(function() {
        var viewportHeight = $(window).height();
        $('#intro').css('height', viewportHeight + 'px');
    });
}


/* Newsletter
========================= */
$('#newsletter .submit').click(function(){
	$.post("subscribe.php", $("#newsletter").serialize(),  function(response) {
		$('#newsletter')[0].reset();
		$('#subscribe-msg').fadeIn('slow').html(response);
		$('#subscribe-msg').delay('5000').fadeOut('slow');
	});
	return false;
});

/* MatchHeight
=========================*/
	$('.equals').each(function() {
		$('.equals .do-equal').matchHeight();
	});
	
	// placeholder polyfil
	if(Gumby.isOldie || Gumby.$dom.find('html').hasClass('ie9')) {
		$('input, textarea').placeholder();
	}

	// skip link and toggle on one element
	// when the skip link completes, trigger the switch
	$('#skip-switch').on('gumby.onComplete', function() {
		$(this).trigger('gumby.trigger');
	});

// Oldie document loaded
}).oldie(function() {
	Gumby.warn("This is an oldie browser...");

// Touch devices loaded
}).touch(function() {
	Gumby.log("This is a touch enabled device...");
});

/* portfolio filters
=========================*/
$(window).load(function(){
	 // cache container
	var $container = $('.grid.filter');
	// initialize isotope
	$container.isotope();
	$container.isotope('reLayout');
	// filter items when filter link is clicked
	$('#filters a').click(function(){
		var selector = $(this).attr('data-filter');
		$container.isotope({ filter: selector });
		return false;
	});
	var $optionSets = $('#options .option-set'),
		$optionLinks = $optionSets.find('a');
		$optionLinks.click(function(){
			var $this = $(this);
			// don't proceed if already selected
			if ( $this.hasClass('selected') ) {
			  return false;
			}
			var $optionSet = $this.parents('.option-set');
			$optionSet.find('.selected').removeClass('selected');
			$this.addClass('selected');
		});
});

})(jQuery);

/* Project Planner
=========================*/
function CheckAll(x)
{
    
if (ISBLANK(x.fieldnm_1.value)) 
	{ 	
		    alert("Please fill in your name field.");
    	    return false;
    }

if (ISBLANK(x.fieldnm_2.value)) 
	{ 	
		    alert("Please fill in your email field.");
    	    return false;
    }

if (ISBLANK(x.fieldnm_11.value)) 
	{ 	
		    alert("Please fill in your budget field.");
    	    return false;
    }

 
	 return true;
}

/// email check

function checkemail(myemail)
{
var str=myemail;
var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
if (filter.test(str))
{
testresults=true
}
else
{
testresults=false
}
return (testresults)
}

/// to check that perticular value is EMPTY OR NOT
function ISBLANK(xx)
{ 
        var cc=0,tt;
		for(tt=0; tt<xx.length; tt++)
		{
		     if (xx.charAt(tt)==' ')
			 {
			 	cc=cc+1; // count blank character
			 }
		}
		if (cc==xx.length)
		{
			return true;  //// means it is BLANK
		}
	     return false;	//// means it is NOT BLANK
}

function is_radio_button_selected(fieldnm)
{
// set var radio_choice to false
var radio_choice = false;

// Loop from zero to the one minus the number of radio button selections
for (counter = 0; counter < fieldnm.length; counter++)
{
// If a radio button has been selected it will return true
// (If not it will return false)
if (fieldnm[counter].checked)
radio_choice = true; 
}

if (!radio_choice)
{
return (false); /// means not selected
}
return (true); /// means selected
}