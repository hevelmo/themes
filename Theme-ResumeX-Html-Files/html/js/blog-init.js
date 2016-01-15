(function ($) {
    "use strict";
    $(document).ready(function () {
        $(function () {
            $('.top-nav').superfish();
            /*==Syntax Higlighter ===*/
            window.prettyPrint && prettyPrint();

            /*==Scroll Top===*/
            $.scrollUp({
                scrollName: 'scrollUp', // Element ID
                topDistance: '300', // Distance from top before showing element (px)
                topSpeed: 300, // Speed back to top (ms)
                animation: 'slide', // Fade, slide, none
                animationInSpeed: 200, // Animation in speed (ms)
                animationOutSpeed: 200, // Animation out speed (ms)
                scrollText: '<i class="fa fa-angle-double-up"></i>' // Text for element
            });

            $(' #scrollUp').smoothScroll({
                offset: -80,
                easing: 'easeInExpo',
                speed: 500,
                // $.fn.smoothScroll only: whether to prevent the default click action
                preventDefault: true
            });

            $('.navigation').waypoint('sticky', {
                stuckClass: 'sticky-nav'
            });

        });

    });

})(jQuery);

/*==WOW JS==*/
wow = new WOW({
    animateClass: 'animated',
    offset: 0
});
wow.init();