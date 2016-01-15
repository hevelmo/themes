var   
	  loadingError = '<p class="error s-bold midpadding">Cannot find project.</p>',
      current,
	  next, 
	  prev,
	  target, 
	  hash,
	  url,
	  page,
	  title,
	  projectIndex,
	  scrollPostition,
	  projectLength,
      wrapperHeight,	  
      cache = false,  	  	  
	  ajaxLoading = false,
	  pageRefresh = true,
	  content = false,
      easing = 'easeOutExpo',
	  folderName = 'projects',
	loader = $('div.loader'),
	  portfolioGrid = $('#projects.grid'),
	  projectContainer = $('div#ajax-inside'),
	  projectNavigation = $('.ajax-nav ul.icon-nav'),
	  exitProject = $('.closeProject  a');	


exitProject.hide();
projectNavigation.hide();
	  
$(function(){	


  $(window).bind( 'hashchange', function() {
  		 
 hash = $(window.location).attr('hash'); 
 var root = '#!'+ folderName +'/';
 var rootLength = root.length;	
 
 	 
	if( hash.substr(0,rootLength) != root ){
		return;						
	} else {	

		// var correction = 0;
		// var headerH = $('header').outerHeight()+correction;
		 hash = $(window.location).attr('hash'); 
	     url = hash.replace(/[#\!]/g, '' ); 
		 
		 
       
		portfolioGrid.find('li.grid-item.current').children().removeClass('active');
		portfolioGrid.find('li.grid-item.current').removeClass('current' );
		
		


		/* ADDRESS BAR LOAD */
		if(pageRefresh == true && hash.substr(0,rootLength) ==  root){	

													
					loadProject();																									  
				
				
		/* PROJECT NAVIGATION / CLICK LOAD */
		}else if(pageRefresh == false && hash.substr(0,rootLength) == root){				
		
					if(content == false){						
						loadProject();							
					}else{	
						projectContainer.animate({opacity:0,height:wrapperHeight},function(){
						loadProject();
						});
					}
							
					projectNavigation.fadeOut('100');
					exitProject.fadeOut('100');
							
					
			
		/* BROWSER NAVIGATION */	
		}else if(hash=='' && pageRefresh == false || hash.substr(0,rootLength) != root && pageRefresh == false || hash.substr(0,rootLength) != root && pageRefresh == true){	
		        scrollPostition = hash; 
							
					removeProject();								
							
				
				
		}

		/* ADD ACTIVE CLASS TO CLICKED PROJECT */
		 portfolioGrid.find('li.grid-item .grid-project a[href="#!' + url + '"]' ).parent().parent().addClass( 'current' );
		 portfolioGrid.find('li.grid-item.current').find('.grid-project').addClass('active');

  }
	  
	});	  
	  	/* AJAX LOAD PROJECT */		
		function loadProject(){
		loader.fadeIn();
			
		if(!ajaxLoading) {				
	            ajaxLoading = true;
			
				projectContainer.load( url +' div#ajaxpage', function(xhr, statusText, request){
																   
						if(statusText == "success"){			
								
								ajaxLoading = false;
								
									page =  $('div#ajaxpage');		
		
								setTimeout(function() {
								$('.loading-screen').addClass('inactive');
								}, 1800);
								
								setTimeout(function() {
								$('#portfolio-detail').addClass('active');
								}, 600);
									
								setTimeout(function() {
								$('.action').addClass('ajax-active');
								}, 600);	
								
								setTimeout(function() {
								$('.blocker').addClass('active');
								}, 600);	
			
			
									$('#slides.project-slider').superslides({
									pagination: false,
									});

										function slideAnimationAjax(element, animation){
											$element = $(element);
											$(document).on('animated.slides',
												function() {
													$element.addClass('animated ' + animation);   
													window.setTimeout( function(){
														$element.removeClass('animated' + animation);
													}, 1000);       
												}
											);
										}
										slideAnimationAjax('.full-screen-project .do-animate', 'fadeInUp');
									
			
									Gumby.initialize('switches');
									
													
									/* Project Detail Scrollbar
										Also goes in ajax.js
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
											$('.slides-navigation').fadeOut();
											$('#ajaxpage #slides').addClass('inactive');
										});	
										// close portfolio details
										$('a.close-details').on(Gumby.click,function(){
											$('#project-detail-scrollarea').getNiceScroll().remove();
											$('.slides-navigation').fadeIn();
											$('#ajaxpage #slides').removeClass('inactive');
										});	
									
			
									 $('.full-slider').flexslider({
									animation: "slide",
									directionNav: true,
									smoothHeight: false,
									controlNav: false,
								  });

									hideLoader();	
		
						}
						
						if(statusText == "error"){
						
								loader.addClass('loadingError').append(loadingError);
								

						}
					 
					});
				
			}
			
		}
	
		function hideLoader(){
		loader.fadeOut('slow', function(){													  
					showProject();					
		});			 
	}	
		
	function showProject(){
			if(content==false){
				   // wrapperHeight = projectContainer.children('div#ajaxpage').outerHeight()+'px';
				    wrapperHeight = projectContainer.children('div#ajaxpage')+'px';
					projectContainer.animate({opacity:1,height:wrapperHeight}, function(){
				        
						scrollPostition = $('html,body').scrollTop();
						projectNavigation.fadeIn();
						exitProject.fadeIn();
						content = true;	
								
					});
					
			}else{
				// wrapperHeight = projectContainer.children('div#ajaxpage').outerHeight()+'px';
                    wrapperHeight = projectContainer.children('div#ajaxpage')+'px';
					projectContainer.animate({opacity:1,height:wrapperHeight}, function(){																		  
					
						scrollPostition = $('html,body').scrollTop();
						projectNavigation.fadeIn();
						exitProject.fadeIn();
						
					});

			
		
			}
					
			
projectNavigation.fadeIn('800');
					exitProject.fadeIn('800');

			projectIndex = portfolioGrid.find('li.grid-item.current').index();
			projectLength = $('li.grid-item.current .grid-project').length-1;
			
			
			if(projectIndex == projectLength){
				
				$('ul li.nextProject a').addClass('disabled');
				$('ul li.prevProject a').removeClass('disabled');
				
			}else if(projectIndex == 0){
				
				$('ul li.prevProject a').addClass('disabled');
				$('ul li.nextProject a').removeClass('disabled');
				
			}else{
				
				$('ul li.nextProject a,ul li.prevProject a').removeClass('disabled');
				
			}
		
	  }
	  
	  function removeProject(closeURL){
				
				projectNavigation.fadeOut(150);
				exitProject.fadeOut(150);				
				projectContainer.animate({opacity:0,height:'0px'});
				projectContainer.empty();
				
			if(typeof closeURL!='undefined' && closeURL!='') {
				location = '#_';
			}
			portfolioGrid.find('li.grid-item.current').children().removeClass('active');
			portfolioGrid.find('li.grid-item.current').removeClass('current' );	

			setTimeout(function() {
			$('#portfolio-detail').removeClass('active');
			}, 400);	
			
			setTimeout(function() {
			$('.action').removeClass('ajax-active');
			}, 400);
			
			setTimeout(function() {
			$('.blocker').removeClass('active');
			}, 400);	
			
			$('.loading-screen').removeClass('inactive');
		

	  }
	  
	  
     /* PROJECT BUTTON NAVIGATION */
	  $('.nextProject a').on('click',function () {											   							   
					 
		    current = portfolioGrid.find('li.grid-item.current');
		    next = current.next('li.grid-item');
		    target = $(next).children('div').children('a').attr('href');
			$(this).attr('href', target);
			
		
			if (next.length === 0) { 
				 return false;			  
			 } 
		   
		   current.removeClass('current'); 
		   current.children().removeClass('active');
		   next.addClass('current');
		   next.children().addClass('active');	
	   				   
		});

	    $('.prevProject a').on('click',function () {			
			
		  current = portfolioGrid.find('li.grid-item.current');
		  prev = current.prev('li.grid-item');
		  target = $(prev).children('div').children('a').attr('href');
		  $(this).attr('href', target);
			
		   
		   if (prev.length === 0) {
			  return false;			
		   }
		   
		   current.removeClass('current');  
		   current.children().removeClass('active');
		   prev.addClass('current');
		   prev.children().addClass('active');
		   
		});		
         /* CLOSE PROJECT BUTTON */
		 $('.closeProject a').on('click',function () {
			 
		    removeProject($(this).attr('href')); 			
			portfolioGrid.find('li.grid-item.current').children().removeClass('active');			
			loader.fadeOut();
			return false;	

		});		 
                $(window).trigger( 'hashchange' );
		 
		 /* FIX CONTENT POSITIONING */
		 $(window).bind('resize',function(){						
			$(projectContainer).css({height:'auto'});
											 
		}); 
		 pageRefresh = false;	  


});


