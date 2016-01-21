<?php
	// Check if install.php is present
	if(is_dir('install')) {
		header("Location: install/install.php");
	} else {
		if(!isset($_SESSION)) session_start();

		// Access DB Info
		include('config.php');

		// Get Settings Data
		include ('includes/settings.php');
		$set = mysqli_fetch_assoc($setRes);

		// Include Functions
		include('includes/functions.php');

		// Include Sessions & Localizations
		include('includes/sessions.php');

		$activeAccount = $nowActive = '';

		if((isset($_GET['usrEmail']) && !empty($_GET['usrEmail'])) && (isset($_GET['hash']) && !empty($_GET['hash']))) {
			$usrEmail = htmlspecialchars($_GET['usrEmail']);
			$hash = htmlspecialchars($_GET['hash']);

			// Check to see if there is an account that matches the link
			$check1 = $mysqli->query("SELECT
										userEmail,
										hash,
										isActive
									FROM
										users
									WHERE
										userEmail = '".$usrEmail."' AND
										hash = '".$hash."' AND
										isActive = 0
			");
			$match = mysqli_num_rows($check1);

			// Check if account has all ready been activated
			$check2 = $mysqli->query("SELECT 'X' FROM users WHERE userEmail = '".$usrEmail."' AND hash = '".$hash."' AND isActive = 1");
			if ($check2->num_rows) {
				$activeAccount = 'true';
			}

			// Match found, update the User's account to active
			if ($match > 0) {
				$isActive = '1';

				$stmt = $mysqli->prepare("UPDATE users SET isActive = ? WHERE userEmail = ?");
				$stmt->bind_param('ss', $isActive, $usrEmail);
				$stmt->execute();
				$nowActive = 'true';
				$stmt->close();
			}
		}
?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="description" content="">
			<meta name="author" content="">

			<title><?php echo $set['siteName']; ?> &middot; <?php echo $activatePageTitle; ?></title>

			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/font.css">
			<link rel="stylesheet" href="css/font-awesome.css">
			<link rel="stylesheet" href="css/custom.css">
			<link rel="stylesheet" href="css/styles.css">

			<!--[if lt IE 9]>
				<script src="js/html5shiv.min.js"></script>
				<script src="js/respond.min.js"></script>
			<![endif]-->
		</head>

		<body>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="loginCont">
							<p class="logo"><a href="index.php"><img alt="<?php echo $set['siteName']; ?>" src="images/logo.png" /></a></p>

							<?php if ($msgBox) { echo $msgBox; } ?>

							<div class='login'>
								<?php
									// The account has been activated - show a Signin button
									if ($nowActive != '') {
								?>
										<h5 class="mt-20"><?php echo $activateTitle1; ?></h5>
										<div class="alertMsg info">
											<div class="msgIcon pull-left">
												<i class="fa fa-check"></i>
											</div>
											<?php echo $activateQuip1; ?>
										</div>
										<a href="sign-in.php" class="btn btn-primary btn-icon mb-20"><i class="fa fa-check-square-o"></i> <?php echo $activateBtn1; ?></a>
								<?php
										// Add Recent Activity
										$activityType = '15';
										$uid = '0';
										$activityTitle = $activateAct1.' '.$usrEmail;
										updateActivity($uid,$activityType,$activityTitle);

									// An account match was found and has all ready been activated
									} else if ($activeAccount != '') {
								?>
										<h5 class="mt-20"><?php echo $activateTitle2; ?></h5>
										<p><?php echo $activateQuip2; ?></p>
										<div class="alertMsg info">
											<div class="msgIcon pull-left">
												<i class="fa fa-check"></i>
											</div>
											<?php echo $activateMsg1; ?>
										</div>
										<a href="sign-in.php" class="btn btn-primary btn-icon mb-20"><i class="fa fa-check-square-o"></i> <?php echo $activateBtn2; ?></a>
								<?php
										// Add Recent Activity
										$activityType = '0';
										$uid = '0';
										$activityTitle = $activateAct2.' '.$usrEmail;
										updateActivity($uid,$activityType,$activityTitle);

									// An account match was not found/or the User tried to directly access this page
									} else {
										// Add Recent Activity
										$activityType = '0';
										$uid = '0';
										$activityTitle = $activateAct3;
										updateActivity($uid,$activityType,$activityTitle);
								?>
										<h5 class="mt-20"><?php echo $activateTitle3; ?></h5>
										<p><?php echo $activateQuip3; ?></p>
										<div class="alertMsg warning">
											<div class="msgIcon pull-left">
												<i class="fa fa-warning"></i>
											</div>
											<?php echo $activateMsg2; ?>
										</div>
								<?php } ?>
								
							</div>
						</div>
					</div>
				</div>
			</div>

			<script src="js/jquery.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="js/custom.js"></script>
		</body>
		</html>
<?php
	}
?>