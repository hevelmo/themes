$(window).load(function() {
    /***********************************************************
     * ISOTOPE
     ***********************************************************/
    var isotope_works = $('.properties-items');
    isotope_works.isotope({
        'itemSelector': '.property-item'
    });

    $('.properties-filter a').click(function() {
        $(this).parent().parent().find('li').removeClass('selected');
        $(this).parent().addClass('selected');

        var selector = $(this).attr('data-filter');
        isotope_works.isotope({ filter: selector });
        return false;
    });
});

$(document).ready(function() {
	'use strict';

    /***********************************************************
     * FLEXSLIDER
     ***********************************************************/
    $('.flexslider').flexslider({
        animation: "slide",
        controlNav: "thumbnails"
    });

    /***********************************************************
     * CHAINED SELECT BOXES
     ***********************************************************/
    $('#select-location').chained('#select-country');
    $('#select-sublocation').chained('#select-location');

    /***********************************************************
     * BXSLIDER
     ***********************************************************/
	$('.bxslider').bxSlider({
  		minSlides: 1,
  		maxSlides: 6,
  		slideWidth: 170,
  		slideMargin: 30,
        responsive: false
	});

    /***********************************************************
     * ACCORDION
     ***********************************************************/
    $('.panel-heading a[data-toggle="collapse"]').on('click', function () {
        if ($(this).closest('.panel-heading').hasClass('active')) {
            $(this).closest('.panel-heading').removeClass('active');
        } else {
            $('.panel-heading a[data-toggle="collapse"]').closest('.panel-heading').removeClass('active');
            $(this).closest('.panel-heading').addClass('active');
        }
    });

    /***********************************************************
     * MAP
     ***********************************************************/
    var locations = new Array();
    var contents = new Array();
    var types = new Array();
    var images = new Array();

    // various map styles
    var styles = new Array(
        [{"featureType":"landscape","stylers":[{"hue":"#FFA800"},{"saturation":0},{"lightness":0},{"gamma":1}]},{"featureType":"road.highway","stylers":[{"hue":"#53FF00"},{"saturation":-73},{"lightness":40},{"gamma":1}]},{"featureType":"road.arterial","stylers":[{"hue":"#FBFF00"},{"saturation":0},{"lightness":0},{"gamma":1}]},{"featureType":"road.local","stylers":[{"hue":"#00FFFD"},{"saturation":0},{"lightness":30},{"gamma":1}]},{"featureType":"water","stylers":[{"hue":"#00BFFF"},{"saturation":6},{"lightness":8},{"gamma":1}]},{"featureType":"poi","stylers":[{"hue":"#679714"},{"saturation":33.4},{"lightness":-25.4},{"gamma":1}]}],
        [{"stylers":[{"visibility":"off"}]},{"featureType":"road","stylers":[{"visibility":"on"},{"color":"#ffffff"}]},{"featureType":"road.arterial","stylers":[{"visibility":"on"},{"color":"#fee379"}]},{"featureType":"road.highway","stylers":[{"visibility":"on"},{"color":"#fee379"}]},{"featureType":"landscape","stylers":[{"visibility":"on"},{"color":"#f3f4f4"}]},{"featureType":"water","stylers":[{"visibility":"on"},{"color":"#7fc8ed"}]},{},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#83cead"}]},{"elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"weight":0.9},{"visibility":"off"}]}],
        [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#a2daf2"}]},{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"color":"#f7f1df"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"color":"#d0e3b4"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#bde6ab"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.medical","elementType":"geometry","stylers":[{"color":"#fbd3da"}]},{"featureType":"poi.business","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffe15f"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#efd151"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"black"}]},{"featureType":"transit.station.airport","elementType":"geometry.fill","stylers":[{"color":"#cfb2db"}]}],
        [{"featureType":"water","stylers":[{"color":"#19a0d8"}]},{"featureType":"administrative","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"},{"weight":6}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#e85113"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#efe9e4"},{"lightness":-40}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#efe9e4"},{"lightness":-20}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"lightness":100}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"lightness":-100}]},{"featureType":"road.highway","elementType":"labels.icon"},{"featureType":"landscape","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape","stylers":[{"lightness":20},{"color":"#efe9e4"}]},{"featureType":"landscape.man_made","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"lightness":100}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"lightness":-100}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"hue":"#11ff00"}]},{"featureType":"poi","elementType":"labels.text.stroke","stylers":[{"lightness":100}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"hue":"#4cff00"},{"saturation":58}]},{"featureType":"poi","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#f0e4d3"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#efe9e4"},{"lightness":-25}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#efe9e4"},{"lightness":-10}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"simplified"}]}],
        [{"featureType":"administrative","stylers":[{"visibility":"off"}]},{"featureType":"poi","stylers":[{"visibility":"simplified"}]},{"featureType":"road","stylers":[{"visibility":"simplified"}]},{"featureType":"water","stylers":[{"visibility":"simplified"}]},{"featureType":"transit","stylers":[{"visibility":"simplified"}]},{"featureType":"landscape","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"visibility":"off"}]},{"featureType":"road.local","stylers":[{"visibility":"on"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"road.arterial","stylers":[{"visibility":"off"}]},{"featureType":"water","stylers":[{"color":"#5f94ff"},{"lightness":26},{"gamma":5.86}]},{},{"featureType":"road.highway","stylers":[{"weight":0.6},{"saturation":-85},{"lightness":61}]},{"featureType":"road"},{},{"featureType":"landscape","stylers":[{"hue":"#0066ff"},{"saturation":74},{"lightness":100}]}],
        [{"featureType":"road","elementType":"labels","stylers":[{"visibility":"simplified"},{"lightness":20}]},{"featureType":"administrative.land_parcel","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"labels","stylers":[{"visibility":"simplified"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"labels","stylers":[{"visibility":"simplified"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"hue":"#a1cdfc"},{"saturation":30},{"lightness":49}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"hue":"#f49935"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"hue":"#fad959"}]}],
        [{"featureType":"water","stylers":[{"saturation":43},{"lightness":-11},{"hue":"#0088ff"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"hue":"#ff0000"},{"saturation":-100},{"lightness":99}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"color":"#808080"},{"lightness":54}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#ece2d9"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#ccdca1"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#767676"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#b8cb93"}]},{"featureType":"poi.park","stylers":[{"visibility":"on"}]},{"featureType":"poi.sports_complex","stylers":[{"visibility":"on"}]},{"featureType":"poi.medical","stylers":[{"visibility":"on"}]},{"featureType":"poi.business","stylers":[{"visibility":"simplified"}]}],
        [{"featureType":"water","stylers":[{"visibility":"on"},{"color":"#b5cbe4"}]},{"featureType":"landscape","stylers":[{"color":"#efefef"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#83a5b0"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#bdcdd3"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#e3eed3"}]},{"featureType":"administrative","stylers":[{"visibility":"on"},{"lightness":33}]},{"featureType":"road"},{"featureType":"poi.park","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":20}]},{},{"featureType":"road","stylers":[{"lightness":20}]}],
        [{"elementType":"geometry","stylers":[{"hue":"#ff4400"},{"saturation":-68},{"lightness":-4},{"gamma":0.72}]},{"featureType":"road","elementType":"labels.icon"},{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"hue":"#0077ff"},{"gamma":3.1}]},{"featureType":"water","stylers":[{"hue":"#00ccff"},{"gamma":0.44},{"saturation":-33}]},{"featureType":"poi.park","stylers":[{"hue":"#44ff00"},{"saturation":-23}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"hue":"#007fff"},{"gamma":0.77},{"saturation":65},{"lightness":99}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"gamma":0.11},{"weight":5.6},{"saturation":99},{"hue":"#0091ff"},{"lightness":-86}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"lightness":-48},{"hue":"#ff5e00"},{"gamma":1.2},{"saturation":-23}]},{"featureType":"transit","elementType":"labels.text.stroke","stylers":[{"saturation":-64},{"hue":"#ff9100"},{"lightness":16},{"gamma":0.47},{"weight":2.7}]}]
    );

    function get_gps_ranges(center_lat, center_lng, range_level_lat, range_level_lng) {
        var lat = center_lat + (Math.random() * (range_level_lat + range_level_lat) - range_level_lat);
        var lng = center_lng + (Math.random() * (range_level_lng + range_level_lng) - range_level_lng);
        return Array(lat, lng);
    }
    var icons = new Array('apartment', 'building-area', 'condo', 'cottage', 'family-house', 'flatblocks', 'flatblocks2', 'house', 'single-home', 'villa');

    // generate random content for properties map
    for (var i=0; i < 50; i++) {
        var icon_name = icons[Math.floor(Math.random()*icons.length)];
        locations.push(get_gps_ranges(40.67, -73.94, 0.08, 0.60));
        contents.push('<div class="infobox"><div class="infobox-header"><h3 class="infobox-title"><a href="#">30 Miller Pl Apt 3</a></h3><h4 class="infobox-subtitle"><a href="#">San Francisco, CA</a></h4></div><div class="infobox-picture"><a href="#"><img src="assets/img/tmp/properties/medium/'+Math.floor((Math.random()*10)+1) +'.jpg" alt=""></a><div class="infobox-price">$ 13,000</div></div></div>');
        types.push('apartment');
        images.push('<img src="assets/img/icons/' + icon_name + '.png" alt="">');
    }

    if ($('#map').length !== 0) {
        var map = $('#map').aviators_map({
            locations: locations,
            contents: contents,
            types: types,
            images: images,
            transparentMarkerImage: 'assets/img/marker-transparent.png',
            transparentClusterImage: 'assets/img/clusterer-transparent.png',
            zoom: 11,
            center: {
                latitude: 40.67,
                longitude: -73.94
            },
            enableGeolocation: false,
            styles: styles[$('#map').data('style')]
        });
    }

    /***********************************************************
     * PROPERTY MAP
     ***********************************************************/
    if ($('#map-property').length !== 0) {
        var map = $('#map-property').aviators_map({
            locations: new Array([40.67, -73.94]),
            contents: new Array(['<div class="infobox"><div class="infobox-header"><h3 class="infobox-title"><a href="#">30 Miller Pl Apt 3</a></h3><h4 class="infobox-subtitle"><a href="#">San Francisco, CA</a></h4></div><div class="infobox-picture"><a href="#"><img src="assets/img/tmp/properties/medium/' + Math.floor((Math.random()*10)+1) + '.jpg" alt=""></a><div class="infobox-price">$ 13,000</div></div></div>']),
            types: types,
            images: images,
            transparentMarkerImage: 'assets/img/marker-transparent.png',
            transparentClusterImage: 'assets/img/clusterer-transparent.png',
            zoom: 11,
            center: {
                latitude: 40.67,
                longitude: -73.94
            },
            enableGeolocation: false,
            styles: styles[6]
        });
    }

    /***********************************************************
     * PALETTE
     ***********************************************************/
    $('.palette-colors a').click(function(e) {
        e.preventDefault();
        var newCSSHref = $(this).attr('href');
        $('#css-main').attr('href', newCSSHref);
    });
    // close the palette on click
    $('.palette-toggle').click(function() {
        $('.palette-wrapper').toggleClass('palette-closed');
    });

    // change page layout from palette
    $('.palette-layout').change(function() {
        $('body').removeClass('layout-wide').removeClass('layout-boxed');
        $('body').addClass($(this).find(":selected").attr('value'));
    });

    // change page header style from palette
    $('.palette-header').change(function() {
        $('body').removeClass('header-light').removeClass('header-dark');
        $('body').addClass($(this).find(":selected").attr('value'));
    });

    // change page footer style from palette
    $('.palette-footer').change(function() {
        $('body').removeClass('footer-light').removeClass('footer-dark');
        $('body').addClass($(this).find(":selected").attr('value'));
    });

    // change navigation style from palette
    $('.palette-map-navigation').change(function() {
        $('body').removeClass('map-navigation-light').removeClass('map-navigation-dark');
        $('body').addClass($(this).find(":selected").attr('value'));
    });

    // select a background pattern from palette
    $('.palette-patterns a').click(function() {
        var activePattern = $('.palette-patterns a.active');
        $('body').removeClass(activePattern.attr('class'));
        activePattern.removeClass('active');

        $('body').addClass($(this).attr("class"));
        $(this).addClass('active');
    });
});