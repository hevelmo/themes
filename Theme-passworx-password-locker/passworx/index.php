<?php
	if(!isset($_SESSION)) session_start();

	if (!isset($_SESSION['pw']['userId'])) {
		header ('Location: sign-in.php');
		exit;
	}

	// Access DB Info
	include('config.php');
	
	// Get Settings Data
	include ('includes/settings.php');
	$set = mysqli_fetch_assoc($setRes);
	
	// Include Functions
	include('includes/functions.php');

	// Include Sessions
	include('includes/sessions.php');
	
	// Logout
	if (isset($_GET['action']) && $_GET['action'] == 'logout') {
		// Add Recent Activity
		$activityType = '6';
		$activityTitle = 'Signed Out of their Account';
		updateActivity($pw_userId,$activityType,$activityTitle);

		session_destroy();
		header ('Location: sign-in.php');
	}

	// Link to the Page
	if (isset($_GET['page']) && $_GET['page'] == 'myProfile') {					$page = 'myProfile';
	} else if (isset($_GET['page']) && $_GET['page'] == 'newCategory') {		$page = 'newCategory';
	} else if (isset($_GET['page']) && $_GET['page'] == 'viewCategory') {		$page = 'viewCategory';
	} else if (isset($_GET['page']) && $_GET['page'] == 'editCategory') {		$page = 'editCategory';
	} else if (isset($_GET['page']) && $_GET['page'] == 'users') {				$page = 'users';
	} else if (isset($_GET['page']) && $_GET['page'] == 'viewUser') {			$page = 'viewUser';
	} else if (isset($_GET['page']) && $_GET['page'] == 'newUser') {			$page = 'newUser';
	} else if (isset($_GET['page']) && $_GET['page'] == 'activityLogs') {		$page = 'activityLogs';
	} else if (isset($_GET['page']) && $_GET['page'] == 'siteSettings') {		$page = 'siteSettings';
	} else if (isset($_GET['page']) && $_GET['page'] == 'newEntry') {			$page = 'newEntry';
	} else if (isset($_GET['page']) && $_GET['page'] == 'viewEntry') {			$page = 'viewEntry';
	} else {																	$page = 'dashboard';}

	if (file_exists('pages/'.$page.'.php')) {
		// Load the Page
		include('pages/'.$page.'.php');
	} else {
		$pageTitle = $pageNotFoundHeader;

		include('includes/header.php');

		// Else Display an Error
		echo '
				<h3>'.$pageNotFoundHeader.'</h3>
				<div class="alertMsg warning mt-20">
					<div class="msgIcon pull-left">
						<i class="fa fa-warning"></i>
					</div>
					'.$pageNotFoundMsg.'
				</div>
			';
	}

	include('includes/footer.php');
?>