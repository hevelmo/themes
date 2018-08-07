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
		
		// Set some variables
		$todayDt 		= date("Y-m-d H:i:s");
		$userDocsPath	= $set['userDocsPath'];
		$installUrl		= $set['installUrl'];
		$siteName		= $set['siteName'];
		$siteEmail		= $set['siteEmail'];
		$allowReg		= $set['allowRegistrations'];

		// Account Sign In Form
		if (isset($_POST['submit']) && $_POST['submit'] == 'signIn') {
			if($_POST['userEmail'] == '') {
				$msgBox = alertBox($accEmailReq, "<i class='fa fa-times-circle'></i>", "danger");
			} else if($_POST['password'] == '') {
				$msgBox = alertBox($accPassReq, "<i class='fa fa-times-circle'></i>", "danger");
			} else {
				$usrEmail = htmlspecialchars($_POST['userEmail']);

				// Check if the Account is Active
				$check = "SELECT userId, firstName, lastName, isActive FROM users WHERE userEmail = '".$usrEmail."'";
				$res = mysqli_query($mysqli, $check) or die('-1' . mysqli_error());
				$row = mysqli_fetch_assoc($res);
				$count = mysqli_num_rows($res);

				if ($count > 0) {
					// If the account is Active - Allow the sign in
					if ($row['isActive'] == '1') {
						$userEmail = htmlspecialchars($_POST['userEmail']);
						$password = encodeIt($_POST['password']);

						if($stmt = $mysqli -> prepare("
												SELECT
													userId,
													superUser,
													userEmail,
													firstName,
													lastName,
													recEmails
												FROM
													users
												WHERE
													userEmail = ?
													AND password = ?
						")) {
							$stmt -> bind_param("ss",
												$userEmail,
												$password
							);
							$stmt -> execute();
							$stmt -> bind_result(
										$userId,
										$superUser,
										$userEmail,
										$firstName,
										$lastName,
										$recEmails
							);
							$stmt -> fetch();
							$stmt -> close();

							if (!empty($userId)) {
								if(!isset($_SESSION))session_start();
								$_SESSION['pw']['userId']			= $userId;
								$_SESSION['pw']['userEmail'] 		= $userEmail;
								$_SESSION['pw']['firstName']		= $firstName;
								$_SESSION['pw']['lastName']			= $lastName;
								$_SESSION['pw']['recEmails']		= $recEmails;
								$_SESSION['pw']['superUser']		= $superUser;

								// Add Recent Activity
								$activityType = '5';
								$activityTitle = $accSignInAct1;
								updateActivity($userId,$activityType,$activityTitle);

								// Update the Last Login Date for User
								$todayDt = date("Y-m-d H:i:s");
								$sqlStmt = $mysqli->prepare("UPDATE users SET lastVisited = ? WHERE userId = ?");
								$sqlStmt->bind_param('ss', $todayDt,$userId);
								$sqlStmt->execute();
								$sqlStmt->close();

								header('Location: index.php');
							} else {
								// Add Recent Activity
								$activityType = '0';
								$uid = $row['userId'];
								$activityTitle = $accSignInActErr;
								updateActivity($uid,$activityType,$activityTitle);

								$msgBox = alertBox($accSignInErrMsg, "<i class='fa fa-warning'></i>", "warning");
							}
						}
					} else {
						// Add Recent Activity
						$activityType = '0';
						$uid = $row['userId'];
						$activityTitle = $inacticeAccActErr;
						updateActivity($uid,$activityType,$activityTitle);

						// If the account is not active, show a message
						$msgBox = alertBox($inactiveAccErrMsg, "<i class='fa fa-warning'></i>", "warning");
						$_POST['userEmail'] = '';
					}
				} else {
					// Add Recent Activity
					$activityType = '0';
					$uid = '0';
					$activityTitle = $noAccountActErr;
					updateActivity($uid,$activityType,$activityTitle);

					// No account found
					$msgBox = alertBox($noAccountErrMsg, "<i class='fa fa-times-circle'></i>", "danger");
					$_POST['userEmail'] = '';
				}
			}
		}
		
		// Reset Password
		if (isset($_POST['submit']) && $_POST['submit'] == 'resetPass') {
			if($_POST['theEmail'] == '') {
				$msgBox = alertBox($resetPassEmailReq, "<i class='fa fa-times-circle'></i>", "danger");
			} else {
				$usrEmail = htmlspecialchars($_POST['theEmail']);
				
				// Check for an Active Account
				$sql = "SELECT userId, isActive FROM users WHERE userEmail = '".$usrEmail."'";
				$res = mysqli_query($mysqli, $sql) or die('-1' . mysqli_error());
				$row = mysqli_fetch_assoc($res);
				$userId = $row['userId'];
				$isActive = $row['isActive'];
				
				if ($isActive == '1') {
					// Generate a RANDOM Hash for a password
					$randomPassword = uniqid(rand());

					// Take the first 8 digits and use them as the password we intend to email the Employee
					$emailPassword = substr($randomPassword, 0, 8);

					// Encrypt $emailPassword for the database
					$newpassword = encodeIt($emailPassword);

					// Update password in database
					$updatesql = "UPDATE users SET password = ? WHERE userEmail = ?";
					$update = $mysqli->prepare($updatesql);
					$update->bind_param("ss",$newpassword,$usrEmail);
					$update->execute();
					
					// Send the New Password via Email to the User
					$resetvars = array();

					$resetvars['installUrl']				= $installUrl;
					$resetvars['siteName']					= $siteName;
					$resetvars['noReplyText']				= $noReplyText;
					$resetvars['emailFooterText1']			= $emailFooterText1;
					$resetvars['emailFooterText2']			= $emailFooterText2;
					$resetvars['thankYouText']				= $thankYouText;

					$resetvars['emailPassword']				= $emailPassword;
					$resetvars['resetPassTitle']			= $resetPassTitle;
					$resetvars['resetPassSubject']			= $resetPassSubject;
					$resetvars['resetPassVar1']				= $resetPassVar1;
					$resetvars['resetPassVar2']				= $resetPassVar2;
					$resetvars['signinBtnText']				= $signinBtnText;
					
					$email_template = file_get_contents("emails/reset_password.php");
					
					foreach($resetvars as $k => $v) {
						$email_template = str_replace('{{'.$k.'}}', $v, $email_template);
					}

					$subject = $siteName.' '.$resetPassTitle;
					
					$headers = "From: ".$siteName." <".$siteEmail.">\r\n";
					$headers .= "Reply-To: ".$siteEmail."\r\n";
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
					
					// Send out the email in HTML
					mail($usrEmail, $subject, $email_template, $headers);

					// Add Recent Activity
					$activityType = '14';
					$activityTitle = $resetPassAct1.' '.$usrEmail;
					updateActivity($userId,$activityType,$activityTitle);

					$msgBox = alertBox($resetPassMsg1, "<i class='fa fa-check-square'></i>", "success");
				} else {
					// Add Recent Activity
					$activityType = '0';
					$uid = '0';
					$activityTitle = $resetPassAct2;
					updateActivity($uid,$activityType,$activityTitle);

					$msgBox = alertBox($resetPassMsg2, "<i class='fa fa-warning'></i>", "warning");
				}
			}
		}
		
		// New Account
		if (isset($_POST['submit']) && $_POST['submit'] == 'createAccount') {
			if($_POST['newEmail'] == '') {
				$msgBox = alertBox($validEmailReq, "<i class='fa fa-times-circle'></i>", "danger");
			} else if($_POST['firstName'] == '') {
				$msgBox = alertBox($yourFirstNameReq, "<i class='fa fa-times-circle'></i>", "danger");
			} else if($_POST['lastName'] == '') {
				$msgBox = alertBox($yourLastNameReq, "<i class='fa fa-times-circle'></i>", "danger");
			} else if($_POST['password1'] == '') {
				$msgBox = alertBox($newAccPassReq, "<i class='fa fa-times-circle'></i>", "danger");
			} else if($_POST['password1'] != $_POST['password2']) {
				$msgBox = alertBox($newAccPassNoMatch, "<i class='fa fa-times-circle'></i>", "danger");
			} else if($_POST['captchaanswer'] == '') {
				$msgBox = alertBox($captchaCodeReq, "<i class='fa fa-times-circle'></i>", "danger");
			} else if($_POST['isEmpty'] != '') {
				$msgBox = alertBox($newAccErrMsg, "<i class='fa fa-times-circle'></i>", "danger");
				$_POST['newEmail'] = $_POST['firstName'] = $_POST['lastName'] = '';
			} else {
				if(strtolower($_POST['captchaanswer']) == $_SESSION['thecode']) {
					// Set some variables
					$dupEmail = '';
					$emailAddy = htmlspecialchars($_POST['newEmail']);
					$firstName = htmlspecialchars($_POST['firstName']);
					$lastName = htmlspecialchars($_POST['lastName']);
					
					// Check for Duplicate email
					$check = $mysqli->query("SELECT 'X' FROM users WHERE userEmail = '".$emailAddy."'");
					if ($check->num_rows) {
						$dupEmail = 'true';
					}
					
					// If duplicates are found
					if ($dupEmail != '') {
						// Add Recent Activity
						$activityType = '0';
						$uid = '0';
						$activityTitle = $newAccDupErrAct;
						updateActivity($uid,$activityType,$activityTitle);

						$msgBox = alertBox($newAccDupErrMsg, "<i class='fa fa-times-circle'></i>", "danger");
						$_POST['newEmail'] = $_POST['firstName'] = $_POST['lastName'] = '';
					} else {
						$accPass = htmlspecialchars($_POST['password1']);
						$password = encodeIt($_POST['password1']);
						
						// Generate a RANDOM Hash
						$randomHash = uniqid(rand());
						$randHash = substr($randomHash, 0, 8);
						$hash = md5(rand(0,1000));
						
						// Create the User's Documents Folder
						// Replace any spaces with an underscore and set to all lower-case
						$docFolderName = $firstName.'_'.$lastName;
						$userFldr = str_replace(' ', '_', $docFolderName);

						$usrDocsFolder = strtolower($userFldr).'_'.$randHash;
						
						// Create the User Document Directory
						if (mkdir($userDocsPath.$usrDocsFolder, 0755, true)) {
							$newDir = $userDocsPath.$usrDocsFolder;
						}
						
						$stmt = $mysqli->prepare("
											INSERT INTO
												users(
													userEmail,
													password,
													firstName,
													lastName,
													userFolder,
													joinDate,
													recEmails,
													isActive,
													hash
												) VALUES (
													?,
													?,
													?,
													?,
													?,
													?,
													1,
													0,
													?
												)
						");
						$stmt->bind_param('sssssss',
							$emailAddy,
							$password,
							$firstName,
							$lastName,
							$usrDocsFolder,
							$todayDt,
							$hash
						);
						$stmt->execute();
						$stmt->close();
						
						// Send Activation Email
						$mailvars = array();

						$mailvars['installUrl']				= $installUrl;
						$mailvars['siteName']				= $siteName;
						$mailvars['noReplyText']			= $noReplyText;
						$mailvars['emailFooterText1']		= $emailFooterText1;
						$mailvars['emailFooterText2']		= $emailFooterText2;
						$mailvars['thankYouText']			= $thankYouText;

						$mailvars['usrEmail']				= $emailAddy;
						$mailvars['accEmail']				= $emailAddy;
						$mailvars['accPass']				= $accPass;
						$mailvars['hash']					= $hash;
						$mailvars['newAccountTitle']		= $newAccountTitle;
						$mailvars['newAccountSubject']		= $newAccountSubject;
						$mailvars['newAccountVar1']			= $newAccountVar1;
						$mailvars['newAccountVar2']			= $newAccountVar2;
						$mailvars['newAccountVar3']			= $newAccountVar3;
						$mailvars['newAccountVar4']			= $newAccountVar4;
						$mailvars['newAccountBtnLink']		= $newAccountBtnLink;
						
						$email_template = file_get_contents("emails/new_account.php");
						
						foreach($mailvars as $k => $v) {
							$email_template = str_replace('{{'.$k.'}}', $v, $email_template);
						}

						$subject = $siteName.' '.$newAccountTitle;
						
						$headers = "From: ".$siteName." <".$siteEmail.">\r\n";
						$headers .= "Reply-To: ".$siteEmail."\r\n";
						$headers .= "MIME-Version: 1.0\r\n";
						$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
						
						// Send out the email in HTML
						mail($emailAddy, $subject, $email_template, $headers);
						
						// Get the Users new userId
						$qry = "SELECT userId FROM users WHERE userEmail = '".$emailAddy."' AND hash = '".$hash."'";
						$results = mysqli_query($mysqli, $qry) or die('-1' . mysqli_error());
						$row = mysqli_fetch_assoc($results);
						$newId = $row['userId'];

						// Add Recent Activity
						$activityType = '13';
						$activityTitle = $newAccAct.' '.$emailAddy;
						updateActivity($newId,$activityType,$activityTitle);

						$msgBox = alertBox($newAccMsg, "<i class='fa fa-check-square'></i>", "success");
						$_POST['newEmail'] = $_POST['firstName'] = $_POST['lastName'] = '';
						
					}
				} else {
					// Add Recent Activity
					$activityType = '0';
					$uid = '0';
					$activityTitle = $newAccActErr;
					updateActivity($uid,$activityType,$activityTitle);

					$msgBox = alertBox($newAccMsgMsg, "<i class='fa fa-warning'></i>", "warning");
				}
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

			<title><?php echo $set['siteName']; ?> &middot; <?php echo $signInPageTitle; ?></title>

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
					<div class="col-md-6 col-md-offset-3">
						<div class="loginCont">
							<p class="logo"><a href="index.php"><img alt="<?php echo $set['siteName']; ?>" src="images/logo.png" /></a></p>

							<?php if ($msgBox) { echo $msgBox; } ?>

							<div class='login text-center'>
								<h2>Please Sign In</h2>
								<form action="" method="post">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
										<input type="email" class="form-control" required="required" placeholder="<?php echo $emailAddyField; ?>" name="userEmail" id="email" />
									</div>
									<br />
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock"></i></span>
										<input type="password" class="form-control" required="required" placeholder="<?php echo $passwordField; ?>" name="password" id="password" />
									</div>
									<small class="pull-right"><a data-toggle="modal" href="#resetPassword"><i class="fa fa-unlock-alt"></i> <?php echo $lostPassText; ?></a></small>
									<button type="input" name="submit" value="signIn" class="btn btn-login btn-icon"><i class="fa fa-sign-in"></i> <?php echo $signInBtn; ?></button>
								</form>
								<?php if ($allowReg == '1') { ?>
									<p><?php echo $dontHaveAccText1; ?> <a data-toggle="modal" href="#newAccount"><?php echo $dontHaveAccText2; ?> <i class="fa fa-long-arrow-right"></i></a></p>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade" id="resetPassword" tabindex="-1" role="dialog" aria-labelledby="resetPassword" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
							<h4 class="modal-title"><?php echo $resetPassH4; ?></h4>
						</div>
						<form action="" method="post">
							<div class="modal-body">
								<div class="form-group">
									<label for="theEmail"><?php echo $emailAddyField; ?></label>
									<input type="email" class="form-control" required="required" name="theEmail" id="theEmail" value="" />
									<span class="help-block"><?php echo $resetPassEmailHelp; ?></span>
								</div>
							</div>
							<div class="modal-footer">
								<button type="input" name="submit" value="resetPass" class="btn btn-success btn-icon"><i class="fa fa-unlock-alt"></i> <?php echo $resetPassH4; ?></button>
								<button type="button" class="btn btn-default btn-icon" data-dismiss="modal"><i class="fa fa-times-circle-o"></i> <?php echo $cancelBtn; ?></button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<?php if ($allowReg == '1') { ?>
				<div class="modal fade" id="newAccount" tabindex="-1" role="dialog" aria-labelledby="newAccount" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
								<h4 class="modal-title"><?php echo $newAccountH4; ?></h4>
							</div>
							<form action="" method="post">
								<div class="modal-body">
									<div class="form-group">
										<label for="newEmail"><?php echo $emailAddyField; ?></label>
										<input type="email" class="form-control" required="required" name="newEmail" value="" />
										<span class="help-block"><?php echo $newAccValidEmailHelp; ?></span>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="firstName"><?php echo $firstNameField; ?></label>
												<input type="text" class="form-control" required="required" name="firstName" />
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="lastName"><?php echo $lastNameField; ?></label>
												<input type="text" class="form-control" required="required" name="lastName" />
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="password1"><?php echo $passwordField; ?></label>
												<input type="password" class="form-control" required="required" name="password1" />
												<span class="help-block"><?php echo $newAccPassHelp; ?></span>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="password2"><?php echo $newAccRepeatPassField; ?></label>
												<input type="password" class="form-control" required="required" name="password2" />
												<span class="help-block"><?php echo $newAccRepeatPassHelp; ?></span>
											</div>
										</div>
									</div>
									<div class="row mb-10">
										<div class="col-md-3">
											<img src="includes/captcha.php" data-toggle="tooltip" data-placement="top" title="<?php echo $captchaCodeText; ?>" class="captcha-code" />
										</div>
										<div class="col-md-9">
											<div class="form-group">
												<label for="captchaanswer"><?php echo $captchaCodeText; ?></label>
												<input type="password" class="form-control" required="required" name="captchaanswer" />
											</div>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<input name="isEmpty" id="isEmpty" value="" type="hidden">
									<button type="input" name="submit" value="createAccount" class="btn btn-success btn-icon"><i class="fa fa-check-square-o"></i> <?php echo $createAccBtn; ?></button>
									<button type="button" class="btn btn-default btn-icon" data-dismiss="modal"><i class="fa fa-times-circle-o"></i> <?php echo $cancelBtn; ?></button>
								</div>
							</form>
						</div>
					</div>
				</div>
			<?php } ?>

			<script src="js/jquery.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="js/custom.js"></script>
		</body>
		</html>
<?php
	}
?>