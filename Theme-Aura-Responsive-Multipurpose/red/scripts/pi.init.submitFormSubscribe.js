jQuery(function($){

	//region Init Subscribe Form submit
	$('.pi-subscribe-form').submit(function(){

		var $form = $(this),
			$error = $form.find('.pi-error-container'),
			action  = $form.attr('action');

		$error.slideUp(750, function() {
			$error.hide();

			var $email = $form.find('.form-control-email'),
				$fname = $form.find('.form-control-fname'),
				$lname = $form.find('.form-control-lname');

			$.post(action, {
					fname: $fname.val(),
					lname: $lname.val(),
					email: $email.val()
				},
				function(data){
					$error.html(data);
					$error.slideDown('slow');

					if (data.match('success') != null) {
						$fname.val('');
						$lname.val('');
						$email.val('');
					}
				}
			);

		});

		return false;

	});
	//endregion

});