/*
Name: 			Contact 
Written by: 	JanXcode Themes - (http://www.janxcode.com)
Version: 		1.0
*/

(function() {
		"use strict";
		var form = $('#contactForm'); // contact form
		var submit = $('#submit');	// submit button
		var alert = $('.jx-contact-message'); // alert div for show alert message
	
		// form submit event
		form.on('submit', function(e) {
			e.preventDefault(); // prevent default form submit
			// sending ajax request through jQuery
			$.ajax({
				url: '', // form action url
				type: 'POST', // form submit method get/post
				dataType: 'html', // request type html/json/xml
				data: form.serialize(), // serialize form data 
				beforeSend: function() {
					alert.fadeOut();
					submit.html('<i class="fa icon-paper-plane"></i> Sending....'); // change submit button text
				},
				success: function(data) {
					alert.html(data).fadeIn(); // fade in response data
					form.trigger('reset'); // reset form
					submit.html('<i class="fa icon-paper-plane"></i> Send Email'); // reset submit button text
				},
				error: function(e) {
					console.log(e)
				}
			});
		});
})();