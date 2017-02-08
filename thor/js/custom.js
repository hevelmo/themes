(function ($) {
    "use strict";
    $(function () {
        $('a[href*=#]:not([href=#])').on('click', function () {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });


    /*fixed nav on scroll*/
    $(window).scroll(function () {
        if ($(window).scrollTop() > 120) {
            $('#top-header').addClass('fixed ');
        }
        else {
            $('#top-header').removeClass('fixed');

        }
    });



    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        $(".parallax-zoom-blur img").css({
            width: (100 + scroll / 10) + "%",
            top: -(scroll / 10) + "%",
            "-webkit-filter": "blur(" + (scroll / 100) + "px)",
            filter: "blur(" + (scroll / 100) + "px)"
        });
    });

    //menu hover
    $(function () {

        $('#main-nav ul').find('ul').show().hide();
        $('#main-nav  li').hover(function () {
            $(this).children('ul').stop().fadeIn(300);
        }, function () {
            $(this).children('ul').stop().fadeOut('fast');
        });
    });


    $('#btn-menu').on('click', function () {
        $('#main-nav').slideToggle(300);
        $("i", this).toggleClass("fa-list fa-close ");
    });

    $(window).on('resize', function () {
        var win = $(this); //this = window
        if (win.width() >= 1000) {
            $('#main-nav').css({
                display: 'block'
            });
        }
    });




//main-slider
    $('.main-slider').owlCarousel({
        items: 1,
        rtl: true,
        nav: true,
        dots: false,
        navText: [
            "PREV",
            'NEXT'
        ]
    });
    //testimoniol-slider
    $('.testimoniol-slider').owlCarousel({
        items: 1,
        trl: true,
        margin: 30,
        stagePadding: 30,
        smartSpeed: 450
    });
//our-team-slider
    $('.our-team-slider').owlCarousel({
        margin: 30,
        responsiveClass: true,
        trl: true,
        loop: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3,
                loop: false
            }
        }
    });
//our-clients-slider
    $('.our-clients-slider').owlCarousel({
        margin: 30,
        trl: true,
        lazyLoad: false,
        responsiveClass: true,
        responsive: {
            400: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 2
            }
        }
    });
    $('.gallary-post ul,.post-slide ul').owlCarousel({
        margin: 30,
        trl: true,
        items: 1,
        nav: true,
        navText: [
            '<i class="fa fa-angle-double-left"></i>',
            '<i class="fa fa-angle-double-right"></i>'
        ]
    });
    $('.single-post-img').owlCarousel({
        margin: 5,
        autoplay: true,
        trl: true,
        items: 1,
        nav: true, navText: [
            '<i class="fa fa-angle-double-left"></i>',
            '<i class="fa fa-angle-double-right"></i>'
        ]
    });



    // page transitions
    $(".animsition").animsition({
        inClass: 'fade-in-down-sm',
        outClass: 'fade-out-down-sm',
        inDuration: 2000,
        outDuration: 800,
        // linkElement           :   '.animsition-link',
        loading: true,
        loadingParentElement: 'body', //animsition wrapper element
        loadingClass: 'animsition-loading',
        unSupportCss: ['animation-duration',
            '-webkit-animation-duration',
            '-o-animation-duration'
        ],
        overlay: false,
        overlayClass: 'animsition-overlay-slide',
        overlayParentElement: 'body'
    });

//lighbox
    $('.sb').fancybox();

//isotope portfolio
    $(window).load(function () {
        var $container = $('.portfolioContainer');
        $container.isotope({
            filter: '*',
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        });
        $('.portfolioFilter a').on('click', function () {
            $('.portfolioFilter .current').removeClass('current');
            $(this).addClass('current');
            var selector = $(this).attr('data-filter');
            $container.isotope({
                filter: selector,
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });
            return false;
        });
    });


// google map
// When the window has finished loading create our google map below
    google.maps.event.addDomListener(window, 'load', init);
    function init() {
        // Basic options for a simple Google Map
        // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
        var mapOptions = {
            // How zoomed in you want the map to start at (always required)
            zoom: 11,
            // The latitude and longitude to center the map (always required)
            center: new google.maps.LatLng(40.6700, -73.9400), // New York

            // How you would like to style the map. 
            // This is where you would paste any style found on Snazzy Maps.
            styles: [{"featureType": "landscape", "stylers": [{"saturation": -100}, {"lightness": 65}, {"visibility": "on"}]}, {"featureType": "poi", "stylers": [{"saturation": -100}, {"lightness": 51}, {"visibility": "simplified"}]}, {"featureType": "road.highway", "stylers": [{"saturation": -100}, {"visibility": "simplified"}]}, {"featureType": "road.arterial", "stylers": [{"saturation": -100}, {"lightness": 30}, {"visibility": "on"}]}, {"featureType": "road.local", "stylers": [{"saturation": -100}, {"lightness": 40}, {"visibility": "on"}]}, {"featureType": "transit", "stylers": [{"saturation": -100}, {"visibility": "simplified"}]}, {"featureType": "administrative.province", "stylers": [{"visibility": "off"}]}, {"featureType": "water", "elementType": "labels", "stylers": [{"visibility": "on"}, {"lightness": -25}, {"saturation": -100}]}, {"featureType": "water", "elementType": "geometry", "stylers": [{"hue": "#ffff00"}, {"lightness": -25}, {"saturation": -97}]}]
        };
        // Get the HTML DOM element that will contain your map 
        // We are using a div with id="map" seen below in the <body>
        var mapElement = document.getElementById('map');
        // Create the Google Map using our element and options defined above
        var map = new google.maps.Map(mapElement, mapOptions);
        // Let's also add a marker while we're at it
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(40.6700, -73.9400),
            map: map,
            title: 'Snazzy!'
        });
    }

    // Sections backgrounds
    var pageSection = $("div,section");
    pageSection.each(function (indx) {

        if ($(this).attr("data-background")) {
            $(this).css("background-image", "url(" + $(this).data("background") + ")");
        }
    });

    // Parallax        
    $(".parallax-1").parallax("50%", -1);


//parallax2
    $('.parallax-2').mousemove(function (e) {
        var x = (e.pageX * -0.3 / 2), y = (e.pageY * -1 / 2);
        $(this).css('background-position', x + 'px ' + y + 'px');
    });


// to top
    $(window).scroll(function () {
        if ($(this).scrollTop() > 400) {
            $('.go-up').fadeIn();
        } else {
            $('.go-up').fadeOut();
        }
    });
    $('.go-up').on('click', function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
})(jQuery); //end