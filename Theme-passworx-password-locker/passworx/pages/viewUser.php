<?php
	$userId = htmlspecialchars_decode($_GET['userId']);
	$todayDt = date("Y-m-d H:i:s");
	
	// Delete Category and ALL Category Entries
	if (isset($_POST['submit']) && $_POST['submit'] == 'delUser') {
		$theUser = htmlspecialchars($_POST['theUser']);

		$stmt = $mysqli->prepare("DELETE FROM entries WHERE userId = ?");
		$stmt->bind_param('s', $userId);
		$stmt->execute();
		$stmt->close();

		$stmt = $mysqli->prepare("DELETE FROM categories WHERE userId = ?");
		$stmt->bind_param('s', $userId);
		$stmt->execute();
		$stmt->close();
		
		$stmt = $mysqli->prepare("DELETE FROM users WHERE userId = ?");
		$stmt->bind_param('s', $userId);
		$stmt->execute();
		$stmt->close();

		// Add Recent Activity
		$activityType = '12';
		$activityTitle = $delUsrAccAct.' "'.$theUser.'"';
		updateActivity($pw_userId,$activityType,$activityTitle);

		header('Location: index.php?page=users&deleted=user');
	}

	// Update Account Profile
	if (isset($_POST['submit']) && $_POST['submit'] == 'saveProfile') {
		// User Validations
		if($_POST['userEmail'] == '') {
			$msgBox = alertBox($updUsrEmailReq, "<i class='fa fa-times-circle'></i>", "danger");
		} else if($_POST['firstName'] == '') {
			$msgBox = alertBox($updUsrFirstReq, "<i class='fa fa-times-circle'></i>", "danger");
		} else if($_POST['lastName'] == '') {
			$msgBox = alertBox($updUsrLastReq, "<i class='fa fa-times-circle'></i>", "danger");
		} else {
			$userEmail = htmlspecialchars($_POST['userEmail']);
			$firstName = htmlspecialchars($_POST['firstName']);
			$lastName = htmlspecialchars($_POST['lastName']);
			$receiveEmails = htmlspecialchars($_POST['recEmails']);
			$isActive = htmlspecialchars($_POST['isActive']);

			$stmt = $mysqli->prepare("UPDATE
										users
									SET
										userEmail = ?,
										firstName = ?,
										lastName = ?,
										recEmails = ?,
										isActive = ?,
										lastUpdated = ?
									WHERE
										userId = ?"
			);
			$stmt->bind_param('sssssss',
									$userEmail,
									$firstName,
									$lastName,
									$receiveEmails,
									$isActive,
									$todayDt,
									$userId
			);
			$stmt->execute();
			$stmt->close();

			// Add Recent Activity
			$activityType = '12';
			$activityTitle = $updUsrAccAct.' '.$firstName.' '.$lastName;
			updateActivity($pw_userId,$activityType,$activityTitle);

			$msgBox = alertBox($updUsrAccMsg." ".$firstName." ".$lastName." ".$theCatUpdMsg2, "<i class='fa fa-check-square'></i>", "success");
		}
	}

	// Get Data
	$qry = "SELECT
				users.*,
				(SELECT COUNT(*) FROM categories WHERE categories.userId = users.userId) AS totalCats,
				(SELECT COUNT(*) FROM entries WHERE entries.userId = users.userId) AS totalEntries
			FROM
				users
			WHERE users.userId = ".$userId;
	$res = mysqli_query($mysqli, $qry) or die('-1' . mysqli_error());
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
	
	if ($row['isActive'] == '0') {
		$accountStat = '<strong class="text-danger">'.$inactiveText.'</strong>';
		$active = '';
	} else {
		$accountStat = '<strong class="text-success">'.$activeText.'</strong>';
		$active = 'selected';
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
	
	$mngPage = 'true';
	$pageTitle = $viewUserPageTitle;

	include 'includes/header.php';
	
	if ($pw_superUser != '') {
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
					<strong><?php echo $viewUsrAccStatusText; ?></strong>: <?php echo $accountStat; ?>
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
			
			<a data-toggle="modal" href="#delUser" class="btn btn-danger btn-xs btn-icon"><i class="fa fa-trash"></i> <?php echo $delUsrAccBtn; ?></a>
			
			<div class="modal fade" id="delUser" tabindex="-1" role="dialog" aria-labelledby="resetPassword" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<form action="" method="post">
							<div class="modal-body">
								<p class="lead">
									<?php echo $delUsrAccConf1; ?> <?php echo clean($row['userEmail']); ?>?<br />
									<small><?php echo $delUsrAccConf2; ?></small>
								</p>
							</div>
							<div class="modal-footer">
								<input name="theUser" type="hidden" value="<?php echo clean($row['userEmail']); ?>" />
								<button type="input" name="submit" value="delUser" class="btn btn-success btn-icon"><i class="fa fa-check-square-o"></i> <?php echo $delUsrAccConfBtn; ?></button>
								<button type="button" class="btn btn-default btn-icon" data-dismiss="modal"><i class="fa fa-times-circle-o"></i> <?php echo $cancelBtn; ?></button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<h5 class="mb-20"><?php echo $updUsrAccProfH5; ?></h5>
			<form action="" method="post">
				<div class="form-group">
					<label for="userEmail"><?php echo $usrEmailAddyField; ?></label>
					<input type="text" class="form-control" name="userEmail" required="required" value="<?php echo clean($row['userEmail']); ?>" />
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="firstName"><?php echo $usrFirstNameField; ?></label>
							<input type="text" class="form-control" name="firstName" required="required" value="<?php echo $firstName; ?>" />
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="lastName"><?php echo $usrLastNameField; ?></label>
							<input type="text" class="form-control" name="lastName" required="required" value="<?php echo $lastName; ?>" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="recEmails"><?php echo $updUsrNotifyEmailsField; ?></label>
							<select class="form-control" name="recEmails" id="recEmails">
								<option value="0"><?php echo $noBtn; ?></option>
								<option value="1" <?php echo $emails; ?>><?php echo $yesBtn; ?></option>
							</select>
							<span class="help-block"><?php echo $updUsrNotifyEmailsHelp; ?></span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="isActive"><?php echo $viewUsrAccStatusText; ?></label>
							<select class="form-control" name="isActive" id="isActive">
								<option value="0"><?php echo $inactiveText; ?></option>
								<option value="1" <?php echo $active; ?>><?php echo $activeText; ?></option>
							</select>
							<span class="help-block"><?php echo $usrStatusInactHelp; ?></span>
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
		$activityTitle = $pageAccError.' '.$viewUserPageError;
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