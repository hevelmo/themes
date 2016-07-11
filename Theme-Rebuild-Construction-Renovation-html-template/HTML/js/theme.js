/*
Name: 			Theme Initializer
Written by: 	JanXcode Themes - (http://www.janxcode.com)
Version: 		1.0
*/

(function() {

	"use strict";

	var Theme = {

		initialized: false,

		initialize: function() {

			if (this.initialized) return;
			this.initialized = true;

			this.build();
			this.events();

		},

		build: function() {

			//Items on ready
			this.onReady();
			
			//Items on load
			this.onLoad();			
		
			// Nav Menu
			this.stickyMenu();
			
			//Mobile Menu
			jQuery('#jx-main-menu,#jx-main-menu-2').slicknav();

			// ScrollTop
			this.scrollTop();

			// Word Rotate
			this.wordAnimate();
			
			// Animation
			this.animation();

			
			// Toggle
			this.toggle();
			
			// Tabs
			this.tabs();	
		
			// Lightbox
			this.prettyPhoto();
			
			// Parallax
			this.parallax();
			
			// Isotope
			this.isotope();
			
			//Counter
			this.counter();

			
			//Alert
			this.alertBox();
			
		
			//Theme Styler
			this.themestyler();

		},

		events: function() {
			
			// Window Resize
			jQuery(window).afterResize(function() {

				// Revolution Slider Fix
				Theme.fixRevolutionSlider();

				// Isotope
				if($(".isotope").get(0)) {
					$(".isotope").isotope('reLayout');
				}

			});


		},
		
		
		//Items on Ready
		onReady: function(){				
			
			
			jQuery(document).ready(function(){				
				
				if (jQuery(".select-box").length > 0){
					jQuery(".select-box").selectbox();
				}
					
				
					var words = jQuery(".jx-counter-up-box").text().split("");
					jQuery(".jx-counter-up-box").empty();
					jQuery.each(words, function(i, v) {
						
						if(v==','){
							jQuery(".jx-counter-up-box").append(jQuery("<span class='comma'>").text(v));
						}else{
							jQuery(".jx-counter-up-box").append(jQuery("<span class='jx-counter-up-stat'>").text(v));
						}
					});
					if (jQuery(".jx-counter-up-stat").length > 0){
						jQuery(".jx-counter-up-stat").counterUp({ 
							delay: 10, 
							time: 1000 
						});
					}
						
								
				
				//Count Down
				if (jQuery(".countdown").length > 0){
					jQuery(".countdown").jCounter({
						date: "1 january 2016 12:00:00", 
						timezone: "Europe/Bucharest",
						format: "dd:hh:mm:ss",
						twoDigits: 'on',
						fallback: function() { console.log("Counter finished!") }
					});
				}
				
				//Mobile Menu
				jQuery('.slicknav_nav li.col > ul').children().unwrap();
				jQuery('.slicknav_nav li.col').children().unwrap();
				jQuery('.slicknav_nav li.clear').remove();
				jQuery('.slicknav_nav ul.submenu a.slicknav_item').remove();
				
				
				//Mobile Chk
				var isMobile = {
					Android: function() {
						return navigator.userAgent.match(/Android/i);
					},
					BlackBerry: function() {
						return navigator.userAgent.match(/BlackBerry/i);
					},
					iOS: function() {
						return navigator.userAgent.match(/iPhone|iPad|iPod/i);
					},
					Opera: function() {
						return navigator.userAgent.match(/Opera Mini/i);
					},
					Windows: function() {
						return navigator.userAgent.match(/IEMobile/i);
					},
					any: function() {
						return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
					}
				};
				
				if( isMobile.any() ) {
				   jQuery('.jx-rev-slider-holder').removeClass('jx-animate-header');
				}			
			
			});
			
			
			//Form validator
			jQuery.validate({
				modules : 'date, security'
			});	 
			
			
			// Menu Active
			var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
				 jQuery(".menu > li").each(function(){
					  if(jQuery(this).find("a").attr("href") == pgurl || jQuery(this).find("a").attr("href") == '' )
					  jQuery(this).addClass("active");
				 });
	
			
		},	
		//Items on windows load
		onLoad: function(){
			
			jQuery(window).on("load",function(){

				"use strict";
				jQuery('.spinner').fadeOut(); // will first fade out the loading animation
				jQuery('.loader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
				jQuery('body').delay(350).css({'overflow':'visible'});
		
				
				[].slice.call(document.querySelectorAll('img.tilt-effect')).forEach(function(img) {
					new TiltFx(img, JSON.parse(img.getAttribute('data-tilt-options')));
				});
						
				
				
				getWidthAndHeight();
				
				/* Page Scroll to id fn call */
				jQuery("a[href='#top'],.menu li a").mPageScroll2id({
					highlightSelector:".menu li a"
				});
	
				
				
				/*Flexslider*/
				jQuery('.jx-blog-1 .flexslider').flexslider({
					animation: "slide",
					directionNav:false,
					slideshowSpeed:"8000"
				});
				
				/*Service Flexslider*/
				jQuery('.jx-service-flexslider .flexslider').flexslider({
					animation: "slide",
					directionNav:false,
					slideshowSpeed:"8000"
				});
				
				
				/*Testimonial Flexslider*/
				jQuery('.jx-testimonial-slider.jx-flexslider').flexslider({
					animation: "slide",
					directionNav:false,
					slideshowSpeed:"8000",
					directionNav: true,
					controlNav:false
				});
				
				
				
				/*Projects Flexslider*/			
				jQuery('.jx-protfolio-details #slider').flexslider({
					animation: "slide",
					directionNav:false,
					slideshowSpeed:"8000"
				});
				
				jQuery('.jx-protfolio-details #carousel').flexslider({
					animation: "slide",
					controlNav: false,
					animationLoop: false,
					slideshow: false,
					itemWidth: 153,
					asNavFor: '#slider',
					prevText:'',
					nextText:''
				  });
								
				jQuery('.jx-parallax-fullwidth').css({'height':((jQuery(window).height()))+'px'});
				
				
				getWidthAndHeight();
				
				function getWidthAndHeight (){
					var winWidth = jQuery(window).width();
					var winHeight = jQuery(window).height();
					jQuery('.jx-middle').css({'height': winHeight});
					
					jQuery('.jx-middle').each(function(){	
						  var $pa = jQuery(this);
						  var $ch = $pa.find('.jx-counting-down');
						  var paH = $pa.innerHeight();
						  var chH = $ch.innerHeight();
						
						  $ch.css({marginTop: (paH-chH)/2});
						
						});
				}
							
				});
				
				jQuery(window).resize(function(){ // On resize
					jQuery('.jx-parallax-fullwidth').css({'height':((jQuery(window).height()))+'px'});	
					
					getWidthAndHeight();
					
					function getWidthAndHeight (){
					var winWidth = jQuery(window).width();
					var winHeight = jQuery(window).height();
					jQuery('.jx-middle').css({'height': winHeight});
					
					jQuery('.jx-middle').each(function(){	
						  var $pa = jQuery(this);
						  var $ch = $pa.find('.jx-counting-down');
						  var paH = $pa.innerHeight();
						  var chH = $ch.innerHeight();
						
						  $ch.css({marginTop: (paH-chH)/2});
						
						});
					}
					
					
					
								
				});					
			
		},

		stickyMenu: function() {
			//Menu
			 var s = jQuery(".jx-sticky");
    		 var pos = s.position();  
			 var top = s.css('top');
			 var home_slider = jQuery('.jx-slider');
			 var count_down = jQuery('.jx-counting-down');		 
			 var page_titlebar = jQuery('.jx-page-titlebar');
			 var page_titlebar_title = jQuery('.jx-page-titlebar .jx-titlebar');

			var count_down_margintop= count_down.css('marginTop');
			 //Page Header
			 var nav_height = s.height();
			 
			 jQuery(window).on("scroll",function() {

				var scroll = getCurrentScroll();
					
				
				if ((s.length >0)){	
				
					if ( scroll >= pos.top+1){
						s.addClass('fixed');
						
						//Home slider
						if (home_slider.length > 0){
							//home_slider.css({'marginTop':nav_height});
							count_down.css({'marginTop':count_down_margintop+nav_height});
						}
						
						//Page titlebar
						if (page_titlebar.length > 0){
							//page_titlebar.css({'marginTop':nav_height});
							//page_titlebar_title.css({'paddingTop':'29px'});
						}
						
					}else{
						s.removeClass('fixed');
						
						//Home slider
						if (home_slider.length > 0){
							//home_slider.css({'marginTop':0});
							count_down.css({'marginTop':count_down_margintop+0});
						}
						
						//Page titlebar
						if (page_titlebar.length > 0){
							//page_titlebar.css({'marginTop':0});
							//page_titlebar_title.css({'paddingTop':'29px'});
						}
					}
				  
				 }
				 
				
			});
			
		
			function getCurrentScroll() {
				return window.pageYOffset || document.documentElement.scrollTop;
			}
			
		},
		
		animation:function(){

			// Animation Appear
			$("[data-appear-animation]").each(function() {

				var $this = $(this);

				$this.addClass("appear-animation");

				if(!$("html").hasClass("no-csstransitions") && $(window).width() > 767) {

					$this.appear(function() {

						var delay = ($this.attr("data-appear-animation-delay") ? $this.attr("data-appear-animation-delay") : 1);

						if(delay > 1) $this.css("animation-delay", delay + "ms");
						$this.addClass($this.attr("data-appear-animation"));

						setTimeout(function() {
							$this.addClass("appear-animation-visible");
						}, delay);

					}, {accX: 0, accY: -150});

				} else {

					$this.addClass("appear-animation-visible");

				}

			});
			
			
			//Sill Bar
			// Animation Progress Bars
			$("[data-progress-animate]").each(function() {

				var $this = $(this);

				$this.appear(function() {

					var delay = ($this.attr("data-appear-animation-delay") ? $this.attr("data-appear-animation-delay") : 1);

					if(delay > 1) $this.css("animation-delay", delay + "ms");
					$this.addClass($this.attr("data-appear-animation"));

					setTimeout(function() {

						$this.animate(
						{
							width: $this.attr("data-progress-animate")
						}, 1500, "easeOutQuad", function() {
							$this.find(".percenttext").animate({opacity: 1,left:$this.attr("data-progress-animate")}, 500, "easeOutQuad");
						});

					}, delay);

				}, {accX: 0, accY: -50});

			});
			
			
			//circle Progressbar			
			jQuery('.circliful').appear();
			
		},

		fixRevolutionSlider: function() {

			$(".revslider-initialised").each(function() {
				try{
					$(this).revredraw();
				} catch(e) {}
			});

		},
		
		scrollTop: function(){
		
			jQuery.scrollUp({
						scrollName: 'scrollUp', // Element ID
						scrollDistance: 300, // Distance from top/bottom before showing element (px)
						scrollFrom: 'top', // 'top' or 'bottom'
						scrollSpeed: 300, // Speed back to top (ms)
						easingType: 'linear', // Scroll to top easing (see http://easings.net/)
						animation: 'fade', // Fade, slide, none
						animationInSpeed: 200, // Animation in speed (ms)
						animationOutSpeed: 200, // Animation out speed (ms)
						scrollTitle: false, // Set a custom <a> title if required. Defaults to scrollText
						scrollImg: false, // Set true to use image
						activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
						zIndex: 2147483647 // Z-Index for the overlay
					});
					
			jQuery(function($){
				jQuery('.destroy').on("click",function($){
					$.scrollUp.destroy();
				})
			});			
			
		},
		wordAnimate: function(){
		//set animation timing
			var animationDelay = 2500,
				//loading bar effect
				barAnimationDelay = 3800,
				barWaiting = barAnimationDelay - 3000, //3000 is the duration of the transition on the loading bar - set in the scss/css file
				//letters effect
				lettersDelay = 50,
				//type effect
				typeLettersDelay = 150,
				selectionDuration = 500,
				typeAnimationDelay = selectionDuration + 800,
				//clip effect 
				revealDuration = 600,
				revealAnimationDelay = 1500;
			
			initHeadline();
			
		
			function initHeadline() {
				//insert <i> element for each letter of a changing word
				singleLetters(jQuery('.jx-headline.letters').find('b'));
				//initialise headline animation
				animateHeadline(jQuery('.jx-headline'));
			}
		
			function singleLetters($words) {
				$words.each(function(){
					var word = $(this),
						letters = word.text().split(''),
						selected = word.hasClass('is-visible');
					for (i in letters) {
						if(word.parents('.rotate-2').length > 0) letters[i] = '<em>' + letters[i] + '</em>';
						letters[i] = (selected) ? '<i class="in">' + letters[i] + '</i>': '<i>' + letters[i] + '</i>';
					}
					var newLetters = letters.join('');
					word.html(newLetters).css('opacity', 1);
				});
			}
		
			function animateHeadline($headlines) {
				var duration = animationDelay;
				$headlines.each(function(){
					var headline = jQuery(this);
					
					if(headline.hasClass('loading-bar')) {
						duration = barAnimationDelay;
						setTimeout(function(){ headline.find('.jx-words-wrapper').addClass('is-loading') }, barWaiting);
					} else if (headline.hasClass('clip')){
						var spanWrapper = headline.find('.jx-words-wrapper'),
							newWidth = spanWrapper.width() + 10
						spanWrapper.css('width', newWidth);
					} else if (!headline.hasClass('type') ) {
						//assign to .jx-words-wrapper the width of its longest word
						var words = headline.find('.jx-words-wrapper b'),
							width = 0;
						words.each(function(){
							var wordWidth = jQuery(this).width();
							if (wordWidth > width) width = wordWidth;
						});
						headline.find('.jx-words-wrapper').css('width', width);
					};
		
					//trigger animation
					setTimeout(function(){ hideWord( headline.find('.is-visible').eq(0) ) }, duration);
				});
			}
		
			function hideWord($word) {
				var nextWord = takeNext($word);
				
				if($word.parents('.jx-headline').hasClass('type')) {
					var parentSpan = $word.parent('.jx-words-wrapper');
					parentSpan.addClass('selected').removeClass('waiting');	
					setTimeout(function(){ 
						parentSpan.removeClass('selected'); 
						$word.removeClass('is-visible').addClass('is-hidden').children('i').removeClass('in').addClass('out');
					}, selectionDuration);
					setTimeout(function(){ showWord(nextWord, typeLettersDelay) }, typeAnimationDelay);
				
				} else if($word.parents('.jx-headline').hasClass('letters')) {
					var bool = ($word.children('i').length >= nextWord.children('i').length) ? true : false;
					hideLetter($word.find('i').eq(0), $word, bool, lettersDelay);
					showLetter(nextWord.find('i').eq(0), nextWord, bool, lettersDelay);
		
				}  else if($word.parents('.jx-headline').hasClass('clip')) {
					$word.parents('.jx-words-wrapper').animate({ width : '2px' }, revealDuration, function(){
						switchWord($word, nextWord);
						showWord(nextWord);
					});
		
				} else if ($word.parents('.jx-headline').hasClass('loading-bar')){
					$word.parents('.jx-words-wrapper').removeClass('is-loading');
					switchWord($word, nextWord);
					setTimeout(function(){ hideWord(nextWord) }, barAnimationDelay);
					setTimeout(function(){ $word.parents('.jx-words-wrapper').addClass('is-loading') }, barWaiting);
		
				} else {
					switchWord($word, nextWord);
					setTimeout(function(){ hideWord(nextWord) }, animationDelay);
				}
			}
		
			function showWord($word, $duration) {
				if($word.parents('.jx-headline').hasClass('type')) {
					showLetter($word.find('i').eq(0), $word, false, $duration);
					$word.addClass('is-visible').removeClass('is-hidden');
		
				}  else if($word.parents('.jx-headline').hasClass('clip')) {
					$word.parents('.jx-words-wrapper').animate({ 'width' : $word.width() + 10 }, revealDuration, function(){ 
						setTimeout(function(){ hideWord($word) }, revealAnimationDelay); 
					});
				}
			}
		
			function hideLetter($letter, $word, $bool, $duration) {
				$letter.removeClass('in').addClass('out');
				
				if(!$letter.is(':last-child')) {
					setTimeout(function(){ hideLetter($letter.next(), $word, $bool, $duration); }, $duration);  
				} else if($bool) { 
					setTimeout(function(){ hideWord(takeNext($word)) }, animationDelay);
				}
		
				if($letter.is(':last-child') && $('html').hasClass('no-csstransitions')) {
					var nextWord = takeNext($word);
					switchWord($word, nextWord);
				} 
			}
		
			function showLetter($letter, $word, $bool, $duration) {
				$letter.addClass('in').removeClass('out');
				
				if(!$letter.is(':last-child')) { 
					setTimeout(function(){ showLetter($letter.next(), $word, $bool, $duration); }, $duration); 
				} else { 
					if($word.parents('.jx-headline').hasClass('type')) { setTimeout(function(){ $word.parents('.jx-words-wrapper').addClass('waiting'); }, 200);}
					if(!$bool) { setTimeout(function(){ hideWord($word) }, animationDelay) }
				}
			}
		
			function takeNext($word) {
				return (!$word.is(':last-child')) ? $word.next() : $word.parent().children().eq(0);
			}
		
			function takePrev($word) {
				return (!$word.is(':first-child')) ? $word.prev() : $word.parent().children().last();
			}
		
			function switchWord($oldWord, $newWord) {
				$oldWord.removeClass('is-visible').addClass('is-hidden');
				$newWord.removeClass('is-hidden').addClass('is-visible');
			}	
		},
		
		toggle: function(){
			
			jQuery('#accordion-1 [data-accordion],#accordion-2 [data-accordion],#accordion-3 [data-accordion],#accordion-4 [data-accordion]').accordion();
			
			jQuery('.accordion [data-accordion]').accordion({
			  singleOpen: false
			});
			
			jQuery(".isotope").isotope('reLayout');

			
		},
		tabs:function(){
			
		 jQuery('#verticalTab-1').easyResponsiveTabs({ 
			type: 'vertical', //Types: default, vertical, accordion 
			width: 'auto', //auto or any width like 600px 
			fit: true, // 100% fit in a container 
			closed: 'accordion', // Start closed if in accordion view 
			 
		 }); 
		 

		 jQuery('#verticalTab-2').easyResponsiveTabs({ 
			type: 'vertical', //Types: default, vertical, accordion 
			width: 'auto', //auto or any width like 600px 
			fit: true, // 100% fit in a container 
			closed: 'accordion', // Start closed if in accordion view 
			 
		 }); 
		 
		 
		 jQuery('#verticalTab-3').easyResponsiveTabs({ 
			type: 'vertical', //Types: default, vertical, accordion 
			width: 'auto', //auto or any width like 600px 
			fit: true, // 100% fit in a container 
			closed: 'accordion', // Start closed if in accordion view 
			 
		 }); 
		 
		 
		jQuery('#verticalTab-4').easyResponsiveTabs({ 
			type: 'vertical', //Types: default, vertical, accordion 
			width: 'auto', //auto or any width like 600px 
			fit: true, // 100% fit in a container 
			closed: 'accordion', // Start closed if in accordion view 
			 
		 }); 
		 
		 jQuery('#verticalTab-5').easyResponsiveTabs({ 
			type: 'vertical', //Types: default, vertical, accordion 
			width: 'auto', //auto or any width like 600px 
			fit: true, // 100% fit in a container 
			closed: 'accordion', // Start closed if in accordion view 
			 
		 }); 
		 
		 jQuery('#verticalTab-6').easyResponsiveTabs({ 
			type: 'vertical', //Types: default, vertical, accordion 
			width: 'auto', //auto or any width like 600px 
			fit: true, // 100% fit in a container 
			closed: 'accordion', // Start closed if in accordion view 
			 
		 }); 
		 
		 jQuery('#horizontalTab-1').easyResponsiveTabs({ 
			type: 'default', //Types: default, vertical, accordion 
			width: 'auto', //auto or any width like 600px 
			fit: true, // 100% fit in a container 
			closed: 'accordion', // Start closed if in accordion view 
			 
		 });
		 
		 jQuery('#horizontalTab-2').easyResponsiveTabs({ 
			type: 'default', //Types: default, vertical, accordion 
			width: 'auto', //auto or any width like 600px 
			fit: true, // 100% fit in a container 
			closed: 'accordion', // Start closed if in accordion view 
			 
		 }); 
		 
		  jQuery('#horizontalTab-3').easyResponsiveTabs({ 
			type: 'default', //Types: default, vertical, accordion 
			width: 'auto', //auto or any width like 600px 
			fit: true, // 100% fit in a container 
			closed: 'accordion', // Start closed if in accordion view 
			 
		 });
		 
		 jQuery('#horizontalTab-4').easyResponsiveTabs({ 
			type: 'default', //Types: default, vertical, accordion 
			width: 'auto', //auto or any width like 600px 
			fit: true, // 100% fit in a container 
			closed: 'accordion', // Start closed if in accordion view 
			 
		 }); 
		 
		 jQuery('#horizontalTab-5').easyResponsiveTabs({ 
			type: 'default', //Types: default, vertical, accordion 
			width: 'auto', //auto or any width like 600px 
			fit: true, // 100% fit in a container 
			closed: 'accordion', // Start closed if in accordion view 
			 
		 }); 
		 
		
		},	
		prettyPhoto: function(){
			
		var prettyPhoto_parameters = {
					animation_speed: 'fast',
					slideshow: true, /* false OR interval time in ms */
					theme:'facebook',
					opacity: 1,
					show_title:true, /* true/false */
					allow_resize: true, /* Resize the photos bigger than viewport. true/false */
					default_width: 920,
					default_height: 540,
				   counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
					hideflash: false, /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */
					wmode: 'opaque', /* Set the flash wmode attribute */
					autoplay: true, /* Automatically start videos: True/False */
					modal: false, /* If set to true, only the close button will close the window */
					overlay_gallery: true
				};	
				
						
					jQuery('a[href$=jpg], a[href$=JPG], a[href$=jpeg], a[href$=JPEG], a[href$=png], a[href$=gif], a[href$=bmp]:has(img),a[class^="prettyPhoto"],a[data-rel^="prettyPhoto"]').prettyPhoto(prettyPhoto_parameters);
	
				
				jQuery('a[class^="prettyPhoto"],a[data-rel^="prettyPhoto"]').prettyPhoto(prettyPhoto_parameters); //prettyPhoto_parameters	
			
		},
		
		parallax: function(){
		
		jQuery('.parallax').scrolly({bgParallax: true});
			
		},
		
		isotope: function(){
		
			jQuery(window).on("load",function(){
			
			// Grid Box Portfolio
			var $container = jQuery('.jx-portfolio-grid');		
			
			$container.isotope({
				itemSelector: '.grid-item',
				layoutMode: 'fitRows',
			  });
		 
			jQuery('.jx-portfolio-filter a').on("click",function(){
				jQuery('.jx-portfolio-filter .current').removeClass('current');
				jQuery(this).addClass('current');
		 
				var selector = jQuery(this).attr('data-filter');
				$container.isotope({
					itemSelector: '.grid-item',
					filter: selector,
					layoutMode: 'fitRows',
				 });
				 return false;
			});	
			
			
			// Grid Box Portfolio
			var $container_1 = jQuery('.jx-portfolio-columns');		
			
			$container_1.isotope({
				itemSelector: '.portfolio-item',
				layoutMode: 'fitRows',
			  });
		 
			jQuery('.jx-portfolio-filter a').on("click",function(){
				jQuery('.jx-portfolio-filter .current').removeClass('current');
				jQuery(this).addClass('current');
		 
				var selector = jQuery(this).attr('data-filter');
				$container_1.isotope({
					itemSelector: '.portfolio-item',
					filter: selector,
					layoutMode: 'fitRows',
				 });
				 return false;
			});	
			
			
			
			});	
			
			
		
		},
		
		counter: function(){
		
			
			if (jQuery('.jx-count-up').length >0){
				jQuery(".jx-count-up").counterUp({ 
					delay: 10, 
					time: 1000 
				});
			}
		
		},

	
		alertBox: function(){
						
		jQuery('.jx-close').on("click",function($) { 
			jQuery(this).parent().hide(); 
			}); 
		},

		
		themestyler: function(){
			
		var $b = jQuery('body'),
			$h = jQuery('head'),
			$w = jQuery(window);
		
		
		$b.append('<div style="left: 0px;" id="rebuild-styleswitcher"><div class="rebuild-styleswitcher-body"><div class="toggle-switchme"><div class="rebuild-styleswitcher-toogle"><i class="fa fa-gear fa-gear-animate"></i></div><div class="rebuild-styleswitcher-head">Style Switcher</div></div><div class="rebuild-styleswitcher-section"><strong>Layout Style</strong><select name="layout"><option>Wide</option><option>Boxed</option></select></div><div class="rebuild-styleswitcher-section colors clearfix"><strong>Color Versions</strong><a href="#" title="Blue"><div class="color_css" id="3ea7d7"style="background:#3ea7d7; width:20px; height:20px;"></div></a><a href="#" title="Green Crayola"><div class="color_css" id="1DA879"style="background:#1DA879; width:20px; height:20px;"></div></a><a href="#" title="Red"><div class="color_css" id="d80000"style="background:#d80000; width:20px; height:20px;"></div></a><a href="#" title="Orange"><div class="color_css" id="E5493A"style="background:#E5493A; width:20px; height:20px;"></div></a><a href="#" title="Pink"><div class="color_css" id="E22467"style="background:#E22467; width:20px; height:20px;"></div></a><a href="#" title="Sun"><div class="color_css" id="f5a823"style="background:#f5a823; width:20px; height:20px;"></div></a><a href="#" title="GreenTea"><div class="color_css" id="9dc032"style="background:#9dc032; width:20px; height:20px;"></div></a><a href="#" title="Torquze"><div class="color_css" id="32b4c0"style="background:#32b4c0; width:20px; height:20px;"></div></a></div><div class="rebuild-styleswitcher-section patterns clearfix"><strong>Patterns for Boxed Version</strong><a href="#" title="bg1"><div class="bg2"></div></a><a href="#" title="bg2"><div class="bg17"></div></a><a href="#" title="bg3"><div class="bg3"></div></a><a href="#" title="bg4"><div class="bg4"></div></a><a href="#" title="bg5"><div class="bg5"></div></a><a href="#" title="bg6"><div class="bg6"></div></a><a href="#" title="bg7"><div class="bg7"></div></a><a href="#" title="bg8"><div class="bg8"></div></a><a href="#" title="bg9"><div class="bg9"></div></a><a href="#" title="bg10"><div class="bg10"></div></a><a href="#" title="bg11"><div class="bg11"></div></a><a href="#" title="bg12"><div class="bg12"></div></a><a href="#" title="bg13"><div class="bg13"></div></a><a href="#" title="bg14"><div class="bg14"></div></a><a href="#" title="bg15"><div class="bg15"></div></a></div><div class="rebuild-styleswitcher-section patterns clearfix last"><strong>Images for Boxed Version</strong><a href="#" title="bg_demo1" class="fullimage"><div class="bg_demo1_thumb"></div></a><a href="#" title="bg_demo2" class="fullimage"><div class="bg_demo2_thumb"></div></a><a href="#" title="bg_demo3" class="fullimage"><div class="bg_demo3_thumb"></div></a><a href="#" title="bg_demo4" class="fullimage"><div class="bg_demo4_thumb"></div></a><a href="#" title="bg_demo5" class="fullimage"><div class="bg_demo5_thumb"></div></a><a href="#" title="bg_demo6" class="fullimage"><div class="bg_demo6_thumb"></div></a><a href="#" title="bg_demo7" class="fullimage"><div class="bg_demo7_thumb"></div></a><a href="#" title="bg_demo8" class="fullimage"><div class="bg_demo8_thumb"></div></a><a href="#" title="bg_demo9" class="fullimage"><div class="bg_demo9_thumb"></div></a></div></div></div>');
		
		
		$h.append('<style type="text/css">.bg0,.bg10,.bg11,.bg12,.bg13,.bg14,.bg15,.bg16,.bg17,.bg18,.bg2,.bg3,.bg4,.bg5,.bg6,.bg7,.bg8,.bg9,.bg_demo1_thumb,.bg_demo2_thumb,.bg_demo3_thumb,.bg_demo4_thumb,.bg_demo5_thumb,.bg_demo6_thumb,.bg_demo7_thumb,.bg_demo8_thumb,.bg_demo9_thumb{background:url(http://janxcode.com/rebuild/images/background_setting_sprite.png) no-repeat}.bg4{background-position:-51px 0;width:19px;height:19px;border:1px solid #999}.bg0{background-position:0 0;width:19px;height:19px;border:1px solid #999}.bg2{background-position:-95px -1px;width:19px;height:19px;border:1px solid #999}.bg3{background-position:-145px 0;width:19px;height:19px;border:1px solid #999}.bg5{background-position:-196px 0;width:19px;height:19px;border:1px solid #999}.bg6{background-position:-250px -1px;width:19px;height:19px;border:1px solid #999}.bg7{background-position:-299px 0;width:19px;height:19px;border:1px solid #999}.bg8{background-position:-345px -1px;width:19px;height:19px;border:1px solid #999}.bg12{background-position:-394px -3px;width:19px;height:19px;border:1px solid #999}.bg9{background-position:-447px -1px;width:19px;height:19px;border:1px solid #999}.bg10{background-position:-498px 0;width:19px;height:19px;border:1px solid #999}.bg11{background-position:-550px -3px;width:19px;height:19px;border:1px solid #999}.bg13{background-position:-602px -3px;width:19px;height:19px;border:1px solid #999}.bg14{background-position:-2px -50px;width:19px;height:19px;border:1px solid #999}.bg15{background-position:-48px -50px;width:19px;height:19px;border:1px solid #999}.bg16{background-position:-95px -50px;width:19px;height:19px;border:1px solid #999}.bg18{background-position:-146px -51px;width:19px;height:19px;border:1px solid #999}.bg17{background-position:-198px -53px;width:19px;height:19px;border:1px solid #999}.bg_demo9_thumb{background-position:-1px -102px;width:19px;height:19px;border:1px solid #999}.bg_demo1_thumb{background-position:-599px -53px;width:19px;height:19px;border:1px solid #999}.bg_demo2_thumb{background-position:-548px -55px;width:19px;height:19px;border:1px solid #999}.bg_demo3_thumb{background-position:-500px -52px;width:19px;height:19px;border:1px solid #999}.bg_demo4_thumb{background-position:-451px -55px;width:19px;height:19px;border:1px solid #999}.bg_demo5_thumb{background-position:-402px -52px;width:19px;height:19px;border:1px solid #999}.bg_demo6_thumb{background-position:-352px -50px;width:19px;height:19px;border:1px solid #999}.bg_demo7_thumb{background-position:-301px -50px;width:19px;height:19px;border:1px solid #999}.bg_demo8_thumb{background-position:-252px -51px;width:19px;height:19px;border:1px solid #999}#loginform p{margin:10px 0 0;padding:0}.login_new_registration{margin-top:-45px;text-align:right}.login_new_registration a:hover{color:#CCC}#rebuild-styleswitcher{position:fixed;z-index:99999;top:120px;left:-240px!important;width:240px}.rebuild-styleswitcher-toogle{float:right;background:#333;width:52px;height:52px;margin-right:-50px;border-radius:0 5px 5px 0;padding-top:15px;font-size:23px;color:#fff;cursor:pointer;-webkit-box-shadow:0 0 5px 0 rgba(0,0,0,.2);box-shadow:0 0 5px 0 rgba(0,0,0,.2);text-align:center}.rebuild-styleswitcher-head{background:#333;color:#fff;padding:18px 20px;margin-right:0;font-size:18px;font-weight:700;cursor:pointer;position:relative;z-index:1;height:52px}.rebuild-styleswitcher-body{background:#f1f1f1;-webkit-border-radius:0 0 3px;border-radius:0 0 3px;color:#fff;-webkit-box-shadow:0 0 5px 0 rgba(0,0,0,.2);box-shadow:0 0 5px 0 rgba(0,0,0,.2);position:relative;z-index:0}.rebuild-styleswitcher-section{padding:10px 25px 20px;border-bottom:1px dashed #666;margin-bottom:5px}.rebuild-styleswitcher-section.last{border:none;color:#333}.rebuild-styleswitcher-section select{background:#555;color:#fff;margin:0;padding:6px}.rebuild-styleswitcher-section a{float:left;margin:10px 5px 0}.rebuild-styleswitcher-section a img{display:block;width:20px;height:20px;border:2px solid #999}.rebuild-styleswitcher-body strong{display:block;margin-bottom:10px}.previewoptions{color:#ccc;font-size:11px;line-height:19px}.rebuild-styleswitcher-section .color_css{padding:5px;border:2px solid #999;width:37px!important;height:37px!important}@media only screen and (max-width:767px){#rebuild-styleswitcher{display:none}}@media only screen and (max-width:1000px){#boxed-layout #header,#boxed-layout #header-v2 #navigation,#boxed-layout #header-v3,#boxed-layout #header-v4 #navigation,#boxed-layout #header-v5 #navigation,#boxed-layout #header-v6{width:100%!important}}.fa-gear-animate{animation:rotation 2s infinite steps(30);-webkit-animation:rotation 2s infinite steps(30);-moz-animation:rotation 2s infinite steps(30)}@keyframes rotation{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}@-webkit-keyframes rotation{0%{-webkit-transform:rotate(0)}100%{-webkit-transform:rotate(360deg)}}@-moz-keyframes rotation{0%{-moz-transform:rotate(0)}100%{-moz-transform:rotate(360deg)}}</style>');
		
	if(jQuery.cookie("css")) {
		jQuery("#skin").attr("href",jQuery.cookie("css"));
	}
	
	if(jQuery.cookie("body-layout")) {
		if(jQuery.cookie("body-layout") == 'boxed') {
			$b.addClass('boxed');			
			$b.css('background', 'url(http://janxcode.com/rebuild/images/bg/bg12.png) repeat fixed center center transparent');
			$b.css('background-size', 'auto');
			$w.resize();
			
		}else if(jQuery.cookie("body-layout") == 'Wide') {
			$b.removeClass('boxed');
			$w.resize();			
		}
		
	}
			
	var i=0;
	jQuery('#rebuild-styleswitcher .toggle-switchme').click(function(){	
	if (i==0){ 
		jQuery(this).parent().animate({'left' : '240px'}, 300, 'easeOutExpo');
		i=1;
	}else{
		jQuery(this).parent().animate({'left' : '0px'}, 300, 'easeOutExpo');
		i=0;		
	}
	});
	
	jQuery('#rebuild-styleswitcher select[name=layout]').change(function() {
		var current = $(this).find('option:selected').val();
		

		if(current == 'Boxed') {
			$b.addClass('boxed');			
			$b.css('background', 'url(http://janxcode.com/rebuild/images/bg/bg12.png) repeat fixed center center transparent');
			$b.css('background-size', 'auto');
			$w.resize();
			jQuery.cookie("body-layout","boxed", {expires: 365, path: '/'});
			
		}else if(current == 'Wide') {
			$b.removeClass('boxed');
			jQuery.cookie("body-layout","wide", {expires: 365, path: '/'});			
			$w.resize();			
		}

	});
	
	jQuery('.patterns a').click(function() {
		var current = jQuery('#rebuild-styleswitcher select[name=layout]').find('option:selected').val();

		if(current == 'Boxed') {
			
			var pattern = jQuery(this).attr('title');
			
			if(jQuery(this).hasClass('fullimage')) {
				$b.css('background', 'url(http://janxcode.com/rebuild/images/bg-image/'+pattern+'.jpg) no-repeat center center fixed');
				$b.css('background-size', 'cover');
			} else {
				$b.css('background', 'url(http://janxcode.com/rebuild/images/bg/'+pattern+'.png) repeat center center fixed');
				$b.css('background-size', 'auto');
			}
		}else {
		alert('Please select Boxed Layout');
		}
	});

	//Color Skin Switcher
	
	jQuery('.color_css').click(function(e) {
	
	var color = jQuery(this).attr('id');
      
	  if (color == "3ea7d7") {
      var skin_link="http://janxcode.com/rebuild/css/skins/blue.css";
	  jQuery('#skin').attr('href', skin_link);
      $b.css('background-color',color);
	  jQuery.cookie("css",skin_link, {expires: 365, path: '/'});
	  return false;   
	  }
	  
	  if (color == "1DA879") {
      var skin_link="http://janxcode.com/rebuild/css/skins/green.css";
	  jQuery('#skin').attr('href', skin_link);
      $b.css('background-color',color);
	  jQuery.cookie("css",skin_link, {expires: 365, path: '/'});
	  return false;      
	  }
	  
	  if (color == "d80000") {
      var skin_link="http://janxcode.com/rebuild/css/skins/red.css";
	  jQuery('#skin').attr('href', skin_link);
      $b.css('background-color',color);
	  jQuery.cookie("css",skin_link, {expires: 365, path: '/'});
	  return false;      
	  }
	  
	  if (color == "E5493A") {
      var skin_link="http://janxcode.com/rebuild/css/skins/orange.css";
	  jQuery('#skin').attr('href', skin_link);
      $b.css('background-color',color);
	  jQuery.cookie("css",skin_link, {expires: 365, path: '/'});
	  return false;      
	  }
	  
	  if (color == "E22467") {
      var skin_link="http://janxcode.com/rebuild/css/skins/pink.css";
	  jQuery('#skin').attr('href', skin_link);
      $b.css('background-color',color);
	  jQuery.cookie("css",skin_link, {expires: 365, path: '/'});
	  return false;    
	  }
	  
	  if (color == "f5a823") {
      var skin_link="http://janxcode.com/rebuild/css/skins/sun.css";
	  jQuery('#skin').attr('href', skin_link);
      $b.css('background-color',color);
	  jQuery.cookie("css",skin_link, {expires: 365, path: '/'});
	  return false;     
	  }
	  
	  if (color == "9dc032") {
      var skin_link="http://janxcode.com/rebuild/css/skins/greentea.css";
	  jQuery('#skin').attr('href', skin_link);
      $b.css('background-color',color);
	  jQuery.cookie("css",skin_link, {expires: 365, path: '/'});
	  return false;   
	  }
	  
	  if (color == "32b4c0") {
      var skin_link="http://janxcode.com/rebuild/css/skins/torquze.css";
	  jQuery('#skin').attr('href', skin_link);
      $b.css('background-color',color);
	  jQuery.cookie("css",skin_link, {expires: 365, path: '/'});
	  return false;    
	  }
	
	 });  
		
		}		

	};

	Theme.initialize();

})();