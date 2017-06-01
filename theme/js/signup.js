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

    $('#signup').modal({
        backdrop: 'static',
        keyboard: false
    }).modal('show');

    $('.isThemeBtn').addClass("btn-" + themeColor.replace("css/app", "green"));
    $('.isThemeText').addClass("text-" + themeColor.replace("css/app", "green"));

    $('input, textarea').placeholder();

})(jQuery);