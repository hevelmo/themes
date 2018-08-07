/** ******************************
 * Generate a Random Password
 ****************************** **/
function generatePassword(limit) {
	limit = limit || 14;
	var password = '';
	// You can add or remove any characters you wish between the two single quote marks (')
	// Do NOT use singe quote marks in your characters list (')
	var chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!$&=^*#_-@+,.';
	var list = chars.split('');
	var len = list.length,
	i = 0;
	do {
		i++;
		var index = Math.floor(Math.random() * len);
		password += list[index];
	}
	while (i < limit);
	// Return the newly generated password
	return password;
}

$(document).ready(function () {
	/** ******************************
	 * Alert Message Boxes
	 ****************************** **/
	$('.msgClose').click(function(e){
		e.preventDefault();
		$(this).closest('.alertMsg').fadeOut("slow", function() {
			$(this).addClass('hidden');
		});
	});

	/** ******************************
	 * Activate Tool-tips
	 ****************************** **/
    $("[data-toggle='tooltip']").tooltip();

	/** ******************************
	 * Activate Popovers
	 ****************************** **/
	$("[data-toggle='popover']").popover();
	
	/** ******************************
	 * Form Placeholders
	 ****************************** **/
	var placehold = {
		init: function(){
			$('input[type="text"], input[type="email"], input[type="password"], textarea').each(placehold.replace);
		},
		replace: function(){
			var txt = $(this).data('placeholder');
			if (txt) {
				if ($(this).val()=='') {
					$(this).val(txt);
				}
				$(this).focus(function(){
					if ($(this).val() == txt){
						$(this).val('');
					}
				}).blur(function(){
					if ($(this).val() == ''){
						$(this).val(txt);
					}
				});
			}
		}
	}
	placehold.init();

	/** ******************************
	 * Required Fields
	 ****************************** **/
	$("form :input[required='required']").blur(function() {
		if (!$(this).val()) {
			$(this).addClass('hasError');
		} else {
			if ($(this).hasClass('hasError')) {
				$(this).removeClass('hasError');
			}
		}
	});
	$("form :input[required='required']").change(function() {
		if ($(this).hasClass('hasError')) {
			$(this).removeClass('hasError');
		}
	});
});