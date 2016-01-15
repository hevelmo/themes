function masonryInit()
{
	if ($('.content_inner .item').length)
	{
		masonryResize(true);
		$('.content_inner').masonry({
				itemSelector : '.item, .itemx2',
				isInitLayout:false,
		});
	}
}

function masonryDestroy()
{
	$('.content_inner').masonry("destroy");
}

var screen_size = $(window).width() || window.screen.availWidth;
var max_items = 4;
var maxitemwidth = 450;
maxitemwidth = screen_size / max_items;

function masonryResize(no_reinit)
{
	if ($('.content_inner .item').length < 1) return;
	$products = jQuery('#content');
	var productswidth = $products.width();
	
	totalwidth = productswidth;


	//screen_size = $(window).width();
	if (jQuery("#container").hasClass("left"))
	{
		max_items = 3;
	} else
	{
		max_items = 4;
	}


	if ((typeof window.matchMedia !== 'undefined') && 
		(window.matchMedia("(min-width: 767px) and (max-width: 1020px)").matches || window.matchMedia("(min-width: 480px) and (max-width: 767px)").matches))  
	{
		if (jQuery("#container").hasClass("left"))
		{
			max_items = 1;
		} else
		{
			max_items = 2;
		}
	}


	if ((typeof window.matchMedia !== 'undefined') && window.matchMedia("(max-width: 480px)").matches) 
	{
		max_items = 1;
	}

	maxitemwidth = productswidth / max_items;
	
	var rows = Math.ceil(productswidth/maxitemwidth);
	var itemwidth = Math.ceil((productswidth)/rows);

	itemheight = Math.round(itemwidth / 1.6);

	if (rows > 1)
	{
		jQuery('.itemx2, .itemx2 iframe', $products).css({ 'width': (itemwidth * 2) +'px', 'height':  (itemheight * 2) + 'px' });
	} else
	{
		jQuery('.itemx2, .itemx2 iframe', $products).css({ 'width': (itemwidth * 2) +'px', 'height':  itemheight + 'px' });
	}

	jQuery('.item, .item .mask, .item img', $products).css({ 'width': itemwidth+'px','height':itemheight + 'px'});
	productWidth = itemwidth;
	
	if (!no_reinit)
	$('.content_inner').masonry({columnWidth:itemwidth});
}

function hideMasonry(callback)
{
			if ($("#ajax").css("overflow") == "hidden") return false;
			$("#ajax").addClass("anim_close");//attr({style:"height:0px"});
			$("body").css({overflow:"auto"});
			$("#container").removeClass("left");
			masonryResize();
			return false;
}

var loaded = false;


var extension =/\.[0-9a-z]{1,5}$/i
var is_http =/^http:/i
var domain = location.href.replace("http://","").replace("https://","").split("/")[0];


function loadUrl(url, right, no_hash)
{
			//camera and video slider break ajax
			if (window.location.href.indexOf("video-slider.php")  > -1 || window.location.href.indexOf("camera-slider.php")  > -1  || url.indexOf("slider.php")  > -1) {window.location = url;return false};
			
			if (url) var ext = url.match(extension); else return;
			
			if (no_hash !== true)
			if (url == "" || url == window.location.href || url.indexOf("#") > -1  || (ext != '.php' && ext != '') || 
			(url.match(is_http) && url.replace("http://",'').replace("https://","").split("/")[0] !== domain)) return true; 

			var $content = $("#container");
			var $ajax_right = $("#ajax");
			var $container = $content;
			
			if (right == 't')
			{
				var $container = $ajax_right;
			} else
			{
				var $container = $content;	
			}

			hideMasonry();
			var ajax_url = url;
			if (no_hash !== true)
			{
				if (History.pushState && url.indexOf("_suid=") == -1) {last_url = url;History.pushState({right:right, hash:url}, null, url);}
			}			

			if (url.indexOf("?") == -1) ajax_url +=  "?ajax=true"; else ajax_url += "&ajax=true";
			$.ajax(
			{
			  url: ajax_url,
			  beforeSend:function() 
				{
					jQuery("#loading").css({display:"block",opacity:0}).animate({opacity:1}, 1000);
				}
			}).done(function( html ) 
		    {
				if (right == 't')
				{
					$("body").css({overflow:"hidden"});
					$container.replaceWith(html);			
					jQuery("#loading").fadeOut(1000, function() {jQuery(this).css({display:"none"})});
					$("#ajax").attr({style:""});
					if ($("#ajax").css("overflow") == "hidden") 
					{
						$('#ajax,.flexslider').css({"width":"auto"});
						var flexi = $('.flexslider')		
						if (flexi.length > 0) flexi.data('flexslider').resize();
						
 						setTimeout(function() { $("#container").addClass("left"); $('#ajax').attr("style","").animate({scrollTop: 0}, 0);if (flexi.length > 0)flexi.data('flexslider').resize();}, 500);
						clearTimeout(resize);
						resize = setTimeout(function() { masonryResize();}, 2500);
						return false;
					} else
					{
					}	
				} else
				{
					jQuery("#loading").fadeOut(1000, function() {jQuery(this).css({display:"none"})});
					$container = $container.replaceWith(html);
					masonryInit();masonryResize();	
					$container.animate({opacity:1}, 1000);
				}
				jQuery(".success, .warning, .attention, .information").hide();
			}).error(function(html)
			{
				$container.stop().animate({opacity:1}, 1500);
			});
			return false;
}

var resize;
var $container;
var last_hash = '';

function resize()
{
	clearTimeout(resize);
	resize = setTimeout(function() { masonryResize();}, 1000);//allow some time to dom to rearrange items
}

jQuery(window).resize(resize);	

jQuery(document).ready(function() 
{
		if (loaded) return; else loaded = true;
		masonryInit();
		masonryResize();
		if (jQuery("#container").hasClass("left")) resize();
		
		$(".navbar-search input[type=text].search-query").autocomplete("autocomplete-ajax.php");

		
		jQuery(".page-container").delegate("a.close", "click", function() 
		{
			hideMasonry();
		});
		
		jQuery(".page-container").on("click", "a", function (e) 
		{
			var $this = jQuery(this);
			var url = $this.attr("href");
			if ($this.hasClass("no_ajax") || typeof url =="undefined"  || url == "") return true; 
			var url = $this.attr("href");
			var right = 'f';

			if ($this.hasClass("ajax_right"))
			{
				right = 't';
			}

			if (!loadUrl(url, right))
			{
				e.preventDefault();	
			};
		});


		// Bind to StateChange Event
		if (typeof History != 'undefined' && History.Adapter)
		History.Adapter.bind(window,'statechange',function(e) 
		{ 
			// Note: We are using statechange instead of popstate
			var state = History.getState();
			var url = state.data.hash || state.hash || state.url ;

			if (url != last_url)
			{
				last_url = state.data.hash;
				loadUrl(url, state.data.right);
			}
		});
});
