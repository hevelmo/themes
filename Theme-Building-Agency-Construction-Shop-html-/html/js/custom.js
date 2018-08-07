/*
| ----------------------------------------------------------------------------------
| TABLE OF CONTENT
| ----------------------------------------------------------------------------------
-SETTING     
-Sticky Header   
-BX CAROUSELS   
-Zoom Images   
-CAROUSEL PRODUCTS           
-POST SLIDER   
-PARALAX   
-Disable  Animated  
-HOME SLIDER   
-Dropdown Menu Fade    
-Animated Entrances    
-SCROLL TOP   
-PRICE RANGE   
-Chars Start   
-Prefooter 
-ISOTOPE FILTER
*/
$(document).ready(function() {


    "use strict";


    /////////////////////////////////////////////////////////////////
    // SETTING
    /////////////////////////////////////////////////////////////////

    var windowHeight = $(window).height();
    var windowWidth = $(window).width();



    $('ul li:last-child').addClass('li-last');




    var tabletWidth = 767;
    var mobileWidth = 640;



    /////////////////////////////////////
    //  Sticky Header
    /////////////////////////////////////



    if (windowWidth > tabletWidth) {



        var headerSticky = $(".layout-theme").data("header");
        var headerTop = $(".layout-theme").data("header-top");


        if (headerSticky.length) {
            $(window).on('scroll', function() {
                var winH = $(window).scrollTop();
                var $pageHeader = $('.header');
                if (winH > headerTop) {

                    $('.yamm').addClass("animated");
                    $('.yamm').addClass("animation-done");
                    $('.yamm').addClass("bounce");
                    $pageHeader.addClass('sticky');



                } else {

                    $('.yamm').removeClass("bounce");
                    $('.yamm').removeClass("animated");
                    $('.yamm').removeClass("animation-done");
                    $pageHeader.removeClass('sticky');

                }


            });
        }

    }

    /////////////////////////////////////
    //  BX CAROUSELS
    /////////////////////////////////////


    function carouselReload() {



        $(".bxslider").each(function(i) {


            var widthslides = $(this).data("width-slides");
            var marginslides = $(this).data("margin-slides");
            var autoslides = $(this).data("auto-slides");
            var moveslides = $(this).data("move-slides");
            var infiniteslides = $(this).data("infinite-slides");
            var maxslides = $(this).data("max-slides");
            var minslides = $(this).data("min-slides");
            var verticaleslides = $(this).data("vertical-slides");




            $(this).bxSlider({
                slideWidth: widthslides,
                minSlides: minslides,
                maxSlides: maxslides,
                slideMargin: marginslides,
                auto: autoslides,
                moveSlides: moveslides,
                mode: verticaleslides,
                infiniteLoop: false,
                hideControlOnEnd: true
            });


            $('.bx-next').html(' <i class="fa fa-angle-right"></i>')
            $('.bx-prev').html(' <i class="fa fa-angle-left"></i>')

        });

    }



    carouselReload();



    /////////////////////////////////////
    //  Zoom Images
    /////////////////////////////////////

    $("a.magnific").magnificPopup({
        type: 'image'
    });

    $("a.prettyphoto").prettyPhoto();



    ////////////////////////////////////////////   
    // CAROUSEL PRODUCTS
    ///////////////////////////////////////////  



    if ($('#slider-product').length > 0) {


        $('#carousel').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            itemWidth: 105,
            itemMargin: 4,
            asNavFor: '#slider-product'
        });

        $('#slider-product').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            sync: "#carousel"
        });


    }



    /////////////////////////////////////
    // POST SLIDER
    /////////////////////////////////////


    $('.carousel-post').bxSlider({
        minSlides: 1, // item 5
        maxSlides: 1, // item 4
        slideWidth: 850,
        infiniteLoop: true,
        auto: true,
        hideControlOnEnd: true,
        nextSelector: '#slider-next',
        prevSelector: '#slider-prev',
        nextText: '<i class="fa fa-angle-right"></i>',
        prevText: '<i class="fa fa-angle-left"></i>'
    });




    ////////////////////////////////////////////  
    // PARALAX
    ///////////////////////////////////////////  

    $(window).scroll(function(e) {
        parallax();

    });

    function parallax() {
        var scrolled = $(window).scrollTop();
        $('.bg-section').css('top', -(scrolled * 0.3) + 'px');
    }




    if (windowWidth < mobileWidth) {


        /////////////////////////////////////
        //  Disable Mobile Animated
        /////////////////////////////////////


        $("body").removeClass("animated-css");




    }


    $('.animated-css .animated:not(.animation-done)').waypoint(function() {



        var animation = $(this).data('animation');

        $(this).addClass('animation-done').addClass(animation);

    }, {
        triggerOnce: true,
        offset: '90%'
    });




    ////////////////////////////////////////////  
    // HOME SLIDER
    ///////////////////////////////////////////  

    if ($('#iview').length > 0) {


        $('#iview').iView({
            pauseTime: 6000,
            pauseOnHover: false,
            directionNavHoverOpacity: 0,
            timer: "Bar",
            timerDiameter: "20%",
            timerPadding: 0,
            timerStroke: 0,
            timerBarStroke: 0,
            timerColor: "#FFF",
            timerPosition: "bottom-right",
            nextLabel: "",
            previousLabel: "",
        });


    }




    /////////////////////////////////////////////////////////////////
    //   Dropdown Menu Fade 
    /////////////////////////////////////////////////////////////////




    $(".dropdown").hover(
        function() {
            $('.dropdown-menu', this).stop(true, true).slideDown("fast");
            $(this).toggleClass('open');
        },
        function() {
            $('.dropdown-menu', this).stop(true, true).slideUp("fast");
            $(this).toggleClass('open');
        }
    );


    $(".yamm .navbar-nav>li").hover(
        function() {
            $('.dropdown-menu', this).fadeIn("fast");
        },
        function() {
            $('.dropdown-menu', this).fadeOut("fast");
        });




    window.prettyPrint && prettyPrint()
    $(document).on('click', '.yamm .dropdown-menu', function(e) {
        e.stopPropagation()
    })




    //////////////////////////////
    // Animated Entrances
    //////////////////////////////



    if (windowWidth > 1200) {


        $(window).scroll(function() {
            $('.animatedEntrance').each(function() {
                var imagePos = $(this).offset().top;

                var topOfWindow = $(window).scrollTop();
                if (imagePos < topOfWindow + 400) {
                    $(this).addClass("slideUp"); // slideUp, slideDown, slideLeft, slideRight, slideExpandUp, expandUp, fadeIn, expandOpen, bigEntrance, hatch
                }
            });
        });

    }




    /////////////////////////////////////
    //  SCROLL TOP
    /////////////////////////////////////


    if ($('body').length) {
        $(window).on('scroll', function() {
            var winH = $(window).scrollTop();

            if (winH > 500) {
                $(".scroll-top").addClass('scroll-top-view');
            } else {
                $(".scroll-top").removeClass('scroll-top-view');
            }
        });
    }


    $('.scroll-top').click(function(event) {
        event.preventDefault();

        $('html, body').animate({
            scrollTop: 0
        }, 300);
    });




    /////////////////////////////////////////////////////////////////
    //PRICE RANGE
    /////////////////////////////////////////////////////////////////


    if ($('#slider-start').length > 0) {


        $("#slider-start").noUiSlider({
            start: [20, 80],
            range: {
                'min': [0],
                'max': [100]
            }
        });

    }

    /////////////////////////////////////
    //  Chars Start
    /////////////////////////////////////


    if ($('body').length) {
        $(window).on('scroll', function() {
            var winH = $(window).scrollTop();

            $('.featured-item-simple-icon').waypoint(function() {
                $('.chart').each(function() {
                    CharsStart();
                });
            }, {
                offset: '80%'
            });


        });
    }



    function CharsStart() {


        $('.chart').easyPieChart({

            barColor: false,
            trackColor: false,
            scaleColor: false,
            scaleLength: false,
            lineCap: false,
            lineWidth: false,
            size: false,
            animate: 7000,


            onStep: function(from, to, percent) {

                $(this.el).find('.percent').text(Math.round(percent));



            }
        });

    }




    /*Prefooter*/

    $('.pre-footer').click(function() {

        $('.pre-footer-content').toggle();

    })




});




////////////////////////////////////////////  
// ISOTOPE FILTER
///////////////////////////////////////////	 




$(window).load(function() {

    var $container = $('.isotope-filter');

    $container.imagesLoaded(function() {
        $container.isotope({
            // options
            itemSelector: '.isotope-item'
        });
    });

    // filter items when filter link is clicked
    $('#filter  a').click(function() {
        var selector = $(this).attr('data-filter');
        $container.isotope({
            filter: selector
        });
        return false;
    });

});