(function($) {
    "use strict";

    $(".menu-responsive").toggle(function(){
        $('.menu').addClass('active');
    },function() {
        $('.menu').removeClass('active');
    });
    $('body:not(".menu")').on('click', function(){
        $('.menu').removeClass('active');
    });

    $(".menu > ul > li.dropdown > a").toggle(function(){
        $(this).parent().removeClass('open');
        $(this).next().addClass('show');
    },function() {
        $(this).parent().removeClass('open');
        $(this).next().removeClass('show');
    });

    /* Clicks within the dropdown won't make it past the dropdown itself */
    $(".menu,.menu-responsive").on('click', function(e){
        e.stopPropagation();
    });

    $(window).on('scroll', function(){
        if ($(this).scrollTop() < 200) {
            $('#totop').fadeOut();
        } else {
            $('#totop').fadeIn();
        }
    });
    $('#totop').on('click', function(){
        $('html, body').animate({scrollTop:0}, 'fast');
        return false;
    });

    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 90) {
            $("body").addClass("page-header-scroll");
        } else {
            $("body").removeClass("page-header-scroll");
        }
    });

    $('.carousel').carousel();

})(jQuery);
