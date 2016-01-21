$(document).ready( function () {
	/** ******************************
	 * Password Generator
	 ****************************** **/
	$('#hideIt').hide();

	// Show the Password field as plain text
	$('#showIt').click(function(e) {
		e.preventDefault();
		$('#password1').prop('type','text');
		$('#password2').prop('type','text');
		$('#showIt').hide();
		$('#hideIt').show();
	});
	// Show the Password field as asterisks
	$('#hideIt').click(function(e) {
		e.preventDefault();
		$('#password1').prop('type','password');
		$('#password2').prop('type','password');
		$('#hideIt').hide();
		$('#showIt').show();
	});
	// Clear the Password fields
	$('#clearIt').click(function(e) {
		e.preventDefault();
		$('#password1, #password2').val('');
	});

	// Generate Random Password
	$('#generate').click(function (e) {
		e.preventDefault();

		// You can change the password length by changing the
		// integer to the length you want in generatePassword(12).
		var pwd = generatePassword(14);

		// Populates the fields with the new generated password
        $('#password1').val(pwd);
		$('#password2').val(pwd);
    });
});