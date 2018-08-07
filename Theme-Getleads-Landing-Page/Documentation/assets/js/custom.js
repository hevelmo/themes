// Javascript Document

/* ===========================================================
   MAILCHIMP NEWSLETTER
============================================================== */
/*
$(function() {
    "use strict";

    $("#mailchimpForm").formchimp(); 

});
*/



/* =================================
   HIDE MOBILE MENU AFTER CLICKING 
=================================== */
$(document).on('click',function(){
    "use strict";

    $('.collapse').collapse('hide');
});




/* ==================================================== */
/* ==================================================== */
/* =======================================================
   DOCUMENT READY
======================================================= */
/* ==================================================== */
/* ==================================================== */

$(document).ready(function() {


"use strict";


/* ===========================================================
   NAVBAR COLLAPSE ON SCROLL
============================================================== */
$(window).scroll(function() {
    if( $('#main-navbar').length )         
    {
        if ($(".navbar").offset().top > 60) {
                $(".navbar-fixed-top").addClass("top-nav-collapse");
            } else {
                $(".navbar-fixed-top").removeClass("top-nav-collapse");
            }
    }

    
});


/* ===========================================================
   PAGE SCROLLING FEATURE
============================================================== */
$(function() {
    $('a.smooth-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top + 20
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});


/* ===========================================================
   MAGNIFIC POPUP
============================================================== */
$('.mp-singleimg').magnificPopup({
    type: 'image'
});

$('.mp-gallery').magnificPopup({ 
    type: 'image',
    gallery:{enabled:true},
});

$('.mp-iframe').magnificPopup({
    type: 'iframe'
});


/* ==========================================
   FUNCTION FOR EMAIL ADDRESS VALIDATION
============================================= */
function isValidEmail(emailAddress) {

    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);

    return pattern.test(emailAddress);

}

/* ==========================================
   FUNCTION FOR PHONE NUMBER VALIDATION
============================================= */
function isValidPhoneNumber(phoneNumber) {

    //match elements that could contain a phone number
    return phoneNumber.match(/[0-9-()+]{3,20}/);
}


/* ==========================================
   CONTACT FORM
============================================= */
$("#contactForm").submit(function(e) {
    
    e.preventDefault();
    var data = {
        name: $("#cfName").val(),
        email: $("#cfEmail").val(),
        subject: $("#cfSubject").val(),
        message: $("#cfMessage").val()
    };

    if ( isValidEmail(data['email']) && (data['message'].length > 1) && (data['name'].length > 1) && (data['subject'].length > 1) ) {
        $.ajax({
            type: "POST",
            url: "assets/php/contact.php",
            data: data,
            success: function() {
                $('.email-success').delay(500).fadeIn(1000);
                $('.email-failed').fadeOut(500);
            }
        });
    } else {
        $('.email-failed').delay(500).fadeIn(1000);
        $('.email-success').fadeOut(500);
    }

    return false;
});

/* ==========================================
   CALLBACK FORM
============================================= */
$("#callbackForm").submit(function(e) {
    e.preventDefault();
    var data = {
        name: $("#cbName").val(),
        email: $("#cbEmail").val(),
        phone: $("#cbPhone").val()
    };

    if ( isValidEmail(data['email']) && (data['name'].length > 1) && isValidPhoneNumber(data['phone']) ) {
        $.ajax({
            type: "POST",
            url: "assets/php/callback.php",
            data: data,
            success: function() {
                $('.callback-success').delay(500).fadeIn(1000);
                $('.callback-failed').fadeOut(500);
            }
        });
    } else {
        $('.callback-failed').delay(500).fadeIn(1000);
        $('.callback-success').fadeOut(500);
    }

    return false;
});

/* ==========================================
   QUOTE FORM
============================================= */
$("#quoteForm").submit(function(e) {
    e.preventDefault();
    var data = {
        name: $("#qName").val(),
        email: $("#qEmail").val(),
        phone: $("#qPhone").val(),
        message: $("#qMessage").val()
    };

    if ( isValidEmail(data['email']) && (data['name'].length > 1) && (data['message'].length > 1) && isValidPhoneNumber(data['phone']) ) {
        $.ajax({
            type: "POST",
            url: "assets/php/quote.php",
            data: data,
            success: function() {
                $('.quote-success').delay(500).fadeIn(1000);
                $('.quote-failed').fadeOut(500);
            }
        });
    } else {
        $('.quote-failed').delay(500).fadeIn(1000);
        $('.quote-success').fadeOut(500);
    }

    return false;
});

/* ==========================================
   SIGNUP FORM / ONLY EMAIL
============================================= */
$("#signupForm").submit(function(e) {
    e.preventDefault();
    var data = {
        email: $("#sfEmail").val(),
    };
        
    if ( isValidEmail(data['email']) ) {
        $.ajax({
            type: "POST",
            url: "assets/php/emails.php",
            data: data,
            success: function() {
                $('.signup-success').delay(500).fadeIn(1000);
                $('.signup-failed').fadeOut(500);
            }
        });
    } else {
        $('.signup-failed').delay(500).fadeIn(1000);
        $('.signup-success').fadeOut(500);
    }

    return false;
});


/* ===========================================================
   BOOTSTRAP FIX FOR IE10 in Windows 8 and Windows Phone 8  
============================================================== */
if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
    var msViewportStyle = document.createElement('style');
    msViewportStyle.appendChild(
        document.createTextNode(
            '@-ms-viewport{width:auto!important}'
            )
        );
    document.querySelector('head').appendChild(msViewportStyle);
}



});




