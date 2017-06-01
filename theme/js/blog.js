(function($) {
    "use strict";

    if($.cookie("css")) {
        $("#app").attr("href",$.cookie("css"));
    }
    var themeColorPath = $("#app").attr("href");
    var themeColorFile = themeColorPath.replace("css/app-", "");
    var themeColor = themeColorFile.replace(".css", "");

    setTimeout(function() {
        $('body').removeClass('notransition');
    }, 300);

    if(!(('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch)) {
        $('body').addClass('no-touch');
    }

    $('.home-navHandler').click(function() {
        $('.blog-nav').toggleClass('active');
        $(this).toggleClass('active');
    });

    //Enable swiping
    $(".carousel-inner").swipe( {
        swipeLeft:function(event, direction, distance, duration, fingerCount) {
            $(this).parent().carousel('next'); 
        },
        swipeRight: function() {
            $(this).parent().carousel('prev');
        }
    });

    $('.toggle-search').click(function() {
        $('.blog-search').toggleClass('active');
        $(this).toggleClass('active');
    });

    $('.isThemeBtn').addClass("btn-" + themeColor.replace("css/app", "green"));
    $('.isThemeText').addClass("text-" + themeColor.replace("css/app", "green"));

    $('input, textarea').placeholder();

})(jQuery);