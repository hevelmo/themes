<?php
	ini_set('session.cookie_httponly', TRUE); 			// Helps mitigate xss
	ini_set('session.session.use_only_cookies', TRUE);	// Prevents session fixation
	ini_set('session.cookie_lifetime', FALSE);			// Smaller exploitation window for xss/csrf/clickjacking...
	ini_set('session.cookie_secure', TRUE);				// Owasp a9 violations
	
	// Start Sessions
	if(!isset($_SESSION))session_start();				// Session Start
	
	// Set Localization
	$local = $set['localization'];
	switch ($local) {
		case 'custom':	include ('language/custom.php');	break;
		case 'english':	include ('language/english.php');	break;
	}
	
	// Session Data
	if ((isset($_SESSION['pw']['userId'])) && ($_SESSION['pw']['userId'] != '')) {
		// Keep some User data available
		$pw_userId 		= $_SESSION['pw']['userId'];
		$pw_userEmail 	= $_SESSION['pw']['userEmail'];
		$pw_firstName 	= $_SESSION['pw']['firstName'];
		$pw_lastName 	= $_SESSION['pw']['lastName'];
		$pw_recEmails	= $_SESSION['pw']['recEmails'];
		$pw_superUser	= $_SESSION['pw']['superUser'];
	} else {
		$pw_userId = $pw_userEmail = $pw_firstName = $pw_lastName = $pw_userLoc = $pw_recEmails = $pw_superUser = '';
	}

	$msgBox = '';