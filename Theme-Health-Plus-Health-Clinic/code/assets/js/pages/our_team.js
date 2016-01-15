(function($) {
    "use strict";

    $(window).on('load', function() {
        var $container = $('.isotope');
        $container.isotope({
            itemSelector: '.element-item',
            layoutMode: 'fitRows'
        });
        $('#filters > ul > li > a').on('click', function() {
            var filterValue = $( this ).attr('data-filter');
            $container.isotope({ filter: filterValue });
            $('#filters > ul > li').removeClass('active');
            $(this).parent().addClass('active');
        });

    });

})(jQuery);


