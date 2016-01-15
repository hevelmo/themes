<?php
// change this email address to your own email id where you want to receive newsletter sign-ups.
define("CONTACT_EMAIL", 'youremail@domain.com');

function ValidateEmail($email)
	{
	/*
	(@ sign)
	(Domain) (with possible subdomain(s) ).
	Contains only letters, numbers, dots and hyphens (up to 255 characters)
	(. sign)
	(Extension) Letters only (up to 10 (can be increased in the future) characters)
	*/

	$regex = '/([a-z0-9_.-]+)'. # name

	'@'. # at

	'([a-z0-9.-]+){2,255}'. # domain & possibly subdomains

	'.'. # period

	'([a-z]+){2,10}/i'; # domain extension 

	if($email == '') { 
			return false;
		}
		else {
			$eregi = preg_replace($regex, '', $email);
	}

	return empty($eregi) ? true : false;
} // end function ValidateEmail



error_reporting (E_ALL ^ E_NOTICE);

$post = (!empty($_POST)) ? true : false;

if($post) {

	$name = 'Subscribe';
	$email = trim($_POST['email']);
	$subject = 'Newsletter Subscription';
	$message = $email;

	$error = '';

	// Check email

	if(!$email) {
		if (!$error) $error .= '';
		$error .= 'Please enter an e-mail address.';
	}

	if($email && !ValidateEmail($email)) {
		if (!$error) $error .= '';	
		$error .= 'Please enter a valid e-mail address';
	}

	// Check message (length)

		if(!$error) {
		$mail = mail(CONTACT_EMAIL, $subject, $message,
			 "From: ".$name." <".$email.">\r\n"
			."Reply-To: ".$email."\r\n"
			."X-Mailer: PHP/" . phpversion());


		if($mail) {
			echo '<div class="secondary alert">Thank you. You are now subscribed to our newsletter.</div>';
		} else {
			echo '<div class="danger alert">Subscription failed. Error! Please try again.</div>';
		}

	}
	else
	{
		$error .= '';
		echo '<div class="danger alert">'.$error.'</div>';
	}

}
?>