/* SORTING */ 

jQuery(function(){
  "use strict";	
  if (jQuery('.fs_blog_module').size() > 0) {
  		var $container = jQuery('.fs_blog_module');
  } else {
		var $container = jQuery('.fs_grid_portfolio, .portf_columns');
  }

  $container.isotope({
	itemSelector : '.element'
  });
    
  var $optionSets = jQuery('.optionset'),
	  $optionLinks = $optionSets.find('a');

  $optionLinks.click(function(){
	var $this = jQuery(this);
	// don't proceed if already selected
	if ( $this.parent('li').hasClass('selected') ) {
	  return false;
	}
	var $optionSet = $this.parents('.optionset');
	$optionSet.find('.selected').removeClass('selected');
	$optionSet.find('.fltr_before').removeClass('fltr_before');
	$optionSet.find('.fltr_after').removeClass('fltr_after');
	$this.parent('li').addClass('selected');
	$this.parent('li').next('li').addClass('fltr_after');
	$this.parent('li').prev('li').addClass('fltr_before');

	// make option object dynamically, i.e. { filter: '.my-filter-class' }
	var options = {},
		key = $optionSet.attr('data-option-key'),
		value = $this.attr('data-option-value');
	// parse 'false' as false boolean
	value = value === 'false' ? false : value;
	options[ key ] = value;
	if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
	  // changes in layout modes need extra logic
	  changeLayoutMode( $this, options )
	} else {
	  // otherwise, apply new options
	  $container.isotope(options);	
		if (jQuery('.fs_blog_module').size() > 0) {
			setTimeout("jQuery('.fs_blog_module').isotope('reLayout')", 500);
		} else {
			setTimeout("jQuery('.fs_grid_portfolio, .portf_columns').isotope('reLayout')", 500);
		} 
	}	
	return false;	
  });

	if (jQuery('.fs_blog_module').size() > 0) {
		jQuery('.fs_blog_module').find('img').load(function(){
			$container.isotope('reLayout');
		}); 	
	} else {
		jQuery('.fs_grid_portfolio, .portf_columns').find('img').load(function(){
			$container.isotope('reLayout');
		}); 	
	}	
});

jQuery(window).load(function(){		
	"use strict";
	if (jQuery('.fs_blog_module').size() > 0) {
		jQuery('.fs_blog_module').isotope('reLayout');
		setTimeout("jQuery('.fs_blog_module').isotope('reLayout')", 500);
	} else {
		jQuery('.fs_grid_portfolio, .portf_columns').isotope('reLayout');
		setTimeout("jQuery('.fs_grid_portfolio, .portf_columns').isotope('reLayout')", 500);
	}	
});
jQuery(window).resize(function(){
	"use strict";
	if (jQuery('.fs_blog_module').size() > 0) {
		jQuery('.fs_blog_module').isotope('reLayout');
	} else {
		jQuery('.fs_grid_portfolio, .portf_columns').isotope('reLayout');
	}	
});

jQuery.fn.portfolio_addon = function(addon_options) {
	"use strict";
	//Set Variables
	var addon_el = jQuery(this),
		addon_base = this,
		img_count = addon_options.items.length,
		img_per_load = addon_options.load_count,
		$newEls = '',
		loaded_object = '',
		$container = jQuery('.image-grid');
	
	jQuery('.load_more_works').on( 'click', function(){
		$newEls = '';
		loaded_object = '';									   
		var loaded_images = $container.find('.added').size();
		if ((img_count - loaded_images) > img_per_load) {
			var now_load = img_per_load;
		} else {
			var now_load = img_count - loaded_images;
		}
		
		if ((loaded_images + now_load) == img_count) jQuery(this).fadeOut();

		if (loaded_images < 1) {
			var i_start = 1;
		} else {
			var i_start = loaded_images+1;
		}

		if (now_load > 0) {			
			// load more elements
			for (var i = i_start-1; i < i_start+now_load-1; i++) {
				loaded_object = loaded_object + '<div data-category="'+ addon_options.items[i].category +' " class="blogpost_preview_fw element '+ addon_options.items[i].category +'"><div class="fw_preview_wrapper"><div class="gallery_item_wrapper"><a href="'+ addon_options.items[i].url +'" ><img src="'+ addon_options.items[i].src +'" alt="" class="fw_featured_image" width="540"><div class="gallery_fadder"></div><span class="gallery_ico"><i class="stand_icon icon-eye"></i></span></a></div><div class="grid-port-cont"><h6><a href="'+ addon_options.items[i].url +'">'+ addon_options.items[i].title +'</a></h6><div class="block_likes"><div class="post-views"><i class="stand_icon icon-eye"></i> <span>'+ addon_options.items[i].view +'</span></div><div class="gallery_likes gallery_likes_add"><i class="stand_icon icon-heart-o"></i> <span>'+ addon_options.items[i].like +'</span></div></div></div></div></div>';
			}
			  
			$newEls = jQuery(loaded_object);
			$container.isotope('insert', $newEls, function() {
				$container.isotope('reLayout');								
			});			
		}
	});
}
