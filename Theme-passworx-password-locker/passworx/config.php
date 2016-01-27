<?php
	error_reporting(0);
	ini_set('display_errors', '0');

	date_default_timezone_set('America/New_York');

	$dbhost = 'localhost';
	$dbuser = 'hevelmo060683@gmail.com';
	$dbpass = '123456789';
	$dbname = 'camcardb';

	//Connect
	$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
	if (mysqli_connect_errno()) {
		printf("MySQLi connection failed: ", mysqli_connect_error());
		exit();
	}

	// Change character set to utf8
	if (!$mysqli->set_charset('utf8')) {
		printf('Error loading character set utf8: %s\n', $mysqli->error);
	}
?>