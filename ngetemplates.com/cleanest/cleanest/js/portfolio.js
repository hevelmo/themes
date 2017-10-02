$(function(){
	'use-strict';

     // portfolio filter container
    $('.filtr-container').filterizr();

    // portfolio filter
    $('.simplefilter li').click(function() {
        $('.simplefilter li').removeClass('active');
        $(this).addClass('active');
    });

    // portfolio image-popup
    $(".image-popup").magnificPopup({
        type: "image",
        removalDelay: 300,
        mainClass: "mfp-fade"
    });

});