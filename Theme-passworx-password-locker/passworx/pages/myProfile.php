<?php
	$todayDt = date("Y-m-d H:i:s");
	$actIp = $_SERVER['REMOTE_ADDR'];
	
	// Change Account Password
	if (isset($_POST['submit']) && $_POST['submit'] == 'chngPass') {
		// User Validations
		if($_POST['currPassword'] == '') {
			$msgBox = alertBox($currAccPassReq, "<i class='fa fa-times-circle'></i>", "danger");
		} else if($_POST['password1'] == '') {
			$msgBox = alertBox($yourNewAccPassReq, "<i class='fa fa-times-circle'></i>", "danger");
		} else if($_POST['password1'] != $_POST['password2']) {
			$msgBox = alertBox($newAccPassNoMatch, "<i class='fa fa-times-circle'></i>", "danger");
		} else {
			$currPassword = htmlspecialchars($_POST['currPassword']);
			$passwordOld = decodeIt($_POST['passwordOld']);

			if ($currPassword == $passwordOld) {
				$password1 = encodeIt($_POST['password1']);

				$stmt = $mysqli->prepare("UPDATE
											users
										SET
											password = ?,
											lastUpdated = ?
										WHERE
											userId = ?"
				);
				$stmt->bind_param('sss',
										$password1,
										$todayDt,
										$pw_userId
				);
				$stmt->execute();
				$stmt->close();

				// Add Recent Activity
				$activityType = '9';
				$activityTitle = $myProfPassUpdAct1;
				updateActivity($pw_userId,$activityType,$activityTitle);

				$msgBox = alertBox($myProfPassUpdMsg1, "<i class='fa fa-check-square'></i>", "success");
			} else {
				// Add Recent Activity
				$activityType = '0';
				$activityTitle = $myProfPassUpdAct2;
				updateActivity($pw_userId,$activityType,$activityTitle);

				$msgBox = alertBox($myProfPassUpdMsg2, "<i class='fa fa-warning'></i>", "warning");
			}
		}
	}
	
	// Update Account Profile
	if (isset($_POST['submit']) && $_POST['submit'] == 'saveProfile') {
		// User Validations
		if($_POST['userEmail'] == '') {
			$msgBox = alertBox($accEmailReq, "<i class='fa fa-times-circle'></i>", "danger");
		} else if($_POST['firstName'] == '') {
			$msgBox = alertBox($yourFirstNameReq, "<i class='fa fa-times-circle'></i>", "danger");
		} else if($_POST['lastName'] == '') {
			$msgBox = alertBox($yourLastNameReq, "<i class='fa fa-times-circle'></i>", "danger");
		} else {
			$userEmail = htmlspecialchars($_POST['userEmail']);
			$firstName = htmlspecialchars($_POST['firstName']);
			$lastName = htmlspecialchars($_POST['lastName']);
			$receiveEmails = htmlspecialchars($_POST['recEmails']);

			$stmt = $mysqli->prepare("UPDATE
										users
									SET
										userEmail = ?,
										firstName = ?,
										lastName = ?,
										recEmails = ?,
										lastUpdated = ?
									WHERE
										userId = ?"
			);
			$stmt->bind_param('ssssss',
									$userEmail,
									$firstName,
									$lastName,
									$receiveEmails,
									$todayDt,
									$pw_userId
			);
			$stmt->execute();
			$stmt->close();

			// Add Recent Activity
			$activityType = '9';
			$activityTitle = $myProfUpdAct;
			updateActivity($pw_userId,$activityType,$activityTitle);

			$msgBox = alertBox($myProfUpdMsg, "<i class='fa fa-check-square'></i>", "success");
		}
	}
	
	// Get Data
	$sql = "SELECT * FROM users WHERE userId = ".$pw_userId;
	$res = mysqli_query($mysqli, $sql) or die('-1' . mysqli_error());
	$row = mysqli_fetch_assoc($res);
	
	if (!empty($row['firstName']) && $row['firstName'] != '') {
		$firstName = clean($row['firstName']);
	} else {
		$firstName = '';
	}
	
	if (!empty($row['lastName']) && $row['lastName'] != '') {
		$lastName = clean($row['lastName']);
	} else {
		$lastName = '';
	}
	
	if ($row['recEmails'] == '0') {
		$recEmails = $noBtn;
		$emails = '';
	} else {
		$recEmails = $yesBtn;
		$emails = 'selected';
	}
	
	if ($row['superUser'] == '0') {
		$accType = $standUserText;
	} else {
		$accType = $adminText;
	}
	
	if ($row['lastVisited'] != '0000-00-00 00:00:00') {
		$lastVisited = shortMonthFormat($row['lastVisited']);
	} else {
		$lastVisited = '';
	}
	
	if ($row['lastUpdated'] != '0000-00-00 00:00:00') {
		$lastUpdated = shortMonthFormat($row['lastUpdated']);
	} else {
		$lastUpdated = '';
	}
	
	$pageTitle = $myProfilePageTitle;
	$jsFile = 'myProfile';

	include 'includes/header.php';
	
	if ($pw_userId == $row['userId'] || $pw_superUser != '') {
?>
	<h3 class="mb-20"><?php echo $pageTitle; ?></h3>
	<?php if ($msgBox) { echo $msgBox; } ?>

	<div class="row">
		<div class="col-md-4">
			<ul class="list-group pw-lists">
				<li class="list-group-item">
					<strong><?php echo $fullNameText; ?></strong>: <?php echo $firstName.' '.$lastName; ?>
				</li>
				<li class="list-group-item">
					<strong><?php echo $emailAddyField; ?></strong>: <?php echo clean($row['userEmail']); ?>
				</li>
				<li class="list-group-item">
					<strong><?php echo $recEmailsText; ?></strong>: <?php echo $recEmails; ?>
				</li>
				<li class="list-group-item">
					<strong><?php echo $accTypeText; ?></strong>: <?php echo $accType; ?>
				</li>
				<li class="list-group-item">
					<strong><?php echo $joinDateText; ?></strong>: <?php echo shortMonthFormat($row['joinDate']); ?>
				</li>
				<li class="list-group-item">
					<strong><?php echo $lastSignInText; ?></strong>: <?php echo $lastVisited; ?>
				</li>
				<li class="list-group-item">
					<strong><?php echo $lastUpdText; ?></strong>: <?php echo $lastUpdated; ?>
				</li>
			</ul>
			<a data-toggle="modal" href="#chngPass" class="btn btn-success btn-xs btn-icon"><i class="fa fa-lock"></i> <?php echo $changeAccPassBtn; ?></a>
			
			<div class="modal fade" id="chngPass" tabindex="-1" role="dialog" aria-labelledby="resetPassword" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
							<h4 class="modal-title"><?php echo $changeAccPassBtn; ?></h4>
						</div>
						<form action="" method="post">
							<div class="modal-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="currPassword"><?php echo $currAccPassField; ?></label>
											<input type="password" class="form-control" name="currPassword" id="currPassword" required="required" autocomplete="off" value="" />
											<span class="help-block"><?php echo $currAccPassHelp; ?></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="password1"><?php echo $newAccPassField; ?></label>
											<div class="input-group">
												<input type="password" class="form-control" name="password1" id="password1" required="required" autocomplete="off" value="" />
												<span class="input-group-addon"><a href="" id="generate" data-toggle="tooltip" data-placement="top" title="<?php echo $genPasswordTooltip; ?>"><i class="fa fa-key"></i></a></span>
											</div>
											<span class="help-block">
												<a href="" id="showIt" class="btn btn-warning btn-help"><?php echo $showTextBtn; ?></a>
												<a href="" id="hideIt" class="btn btn-info btn-help"><?php echo $hideTextBtn; ?></a>
												<a href="" id="clearIt" class="btn btn-default btn-help"><?php echo $clearPassFieldsBtn; ?></a>
											</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="password2"><?php echo $repeatAccPassField; ?></label>
											<input type="password" class="form-control" name="password2" id="password2" required="required" autocomplete="off" value="" />
											<span class="help-block"><?php echo $accPassMustMatchHelp; ?></span>
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<input name="passwordOld" type="hidden" value="<?php echo clean($row['password']); ?>" />
								<button type="input" name="submit" value="chngPass" class="btn btn-success btn-icon"><i class="fa fa-check-square-o"></i> <?php echo $saveBtn; ?></button>
								<button type="button" class="btn btn-default btn-icon" data-dismiss="modal"><i class="fa fa-times-circle-o"></i> <?php echo $cancelBtn; ?></button>
							</div>
						</form>
					</div>
				</div>
			</div>
			
			<div class="well well-sm accInfo mt-20 mb-20">
				<h5 class="mt-5 mb-10"><?php echo $persInfoSecureH5; ?></h5>
				<small><?php echo $persInfoSecureQuip; ?></small>
			</div>
		</div>
		<div class="col-md-8">
			<h5 class="mb-20">Update Account Profile</h5>
			<form action="" method="post">
				<div class="form-group">
					<label for="userEmail"><?php echo $emailAddyField; ?></label>
					<input type="text" class="form-control" name="userEmail" required="required" value="<?php echo clean($row['userEmail']); ?>" />
					<span class="help-block"><?php echo $emailAddProfHelp; ?></span>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="firstName"><?php echo $firstNameField; ?></label>
							<input type="text" class="form-control" name="firstName" required="required" value="<?php echo $firstName; ?>" />
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="lastName"><?php echo $lastNameField; ?></label>
							<input type="text" class="form-control" name="lastName" required="required" value="<?php echo $lastName; ?>" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="recEmails"><?php echo $recEmailsField; ?></label>
							<select class="form-control" name="recEmails" id="recEmails">
								<option value="0"><?php echo $noBtn; ?></option>
								<option value="1" <?php echo $emails; ?>><?php echo $yesBtn; ?></option>
							</select>
							<span class="help-block"><?php echo $recEmailsHelp; ?> <?php echo $set['siteName']; ?>.</span>
						</div>
					</div>
				</div>
				<button type="input" name="submit" value="saveProfile" class="btn btn-success btn-icon mb-20"><i class="fa fa-check-square-o"></i> <?php echo $saveChangesBtn; ?></button>
			</form>
		</div>
	</div>
<?php
	} else {
		// Add Recent Activity
		$activityType = '0';
		$activityTitle = $pageAccError.' '.$myProfilePageTitle;
		updateActivity($pw_userId,$activityType,$activityTitle);
?>
	<h3><?php echo $accessErrorHeader; ?></h3>
	<div class="alertMsg warning">
		<div class="msgIcon pull-left">
			<i class="fa fa-warning"></i>
		</div>
		<?php echo $permissionDenied; ?>
	</div>
<?php } ?>