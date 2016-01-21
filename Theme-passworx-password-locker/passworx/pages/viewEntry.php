<?php
	$entryId = htmlspecialchars_decode($_GET['entryId']);
	$todayDt = date("Y-m-d H:i:s");
	$actIp = $_SERVER['REMOTE_ADDR'];
	
	// Change Entry Password
	if (isset($_POST['submit']) && $_POST['submit'] == 'chngPass') {
		// User Validations
		if($_POST['password1'] == '') {
			$msgBox = alertBox($entryPassReq, "<i class='fa fa-times-circle'></i>", "danger");
		} else if($_POST['password1'] != $_POST['password2']) {
			$msgBox = alertBox($entryPassNoMatch, "<i class='fa fa-times-circle'></i>", "danger");
		} else {
			$entryTitle = decodeIt($_POST['entryTitle']);
			$password1 = encodeIt($_POST['password1']);

			$stmt = $mysqli->prepare("UPDATE
										entries
									SET
										entryPass = ?,
										lastUpdated = ?
									WHERE
										entryId = ?"
			);
			$stmt->bind_param('sss',
									$password1,
									$todayDt,
									$entryId
			);
			$stmt->execute();
			$stmt->close();

			// Add Recent Activity
			$activityType = '8';
			$activityTitle = $updEntryPassAct.' "'.$entryTitle.'"';
			updateActivity($pw_userId,$activityType,$activityTitle);

			$msgBox = alertBox($updEntryPassMsg." \"".$entryTitle."\" ".$theCatUpdMsg2, "<i class='fa fa-check-square'></i>", "success");
		}
	}
	
	// Delete Entry
	if (isset($_POST['submit']) && $_POST['submit'] == 'delEntry') {
		$entryTitle = decodeIt($_POST['entryTitle']);

		$stmt = $mysqli->prepare("DELETE FROM entries WHERE entryId = ?");
		$stmt->bind_param('s', $entryId);
		$stmt->execute();
		$stmt->close();

		// Add Recent Activity
		$activityType = '8';
		$activityTitle = $delEntryAct.' "'.$entryTitle.'"';
		updateActivity($pw_userId,$activityType,$activityTitle);

		header('Location: index.php?deleted=entry');
	}
	
	// Update Entry
	if (isset($_POST['submit']) && $_POST['submit'] == 'saveEntry') {
		// User Validations
		if($_POST['entryTitle'] == '') {
			$msgBox = alertBox($entryTitleReq, "<i class='fa fa-times-circle'></i>", "danger");
		} else if($_POST['entryDesc'] == '') {
			$msgBox = alertBox($entryDescReq, "<i class='fa fa-times-circle'></i>", "danger");
		} else {
			if ($_POST['catId'] == '...') {
				$catId = htmlspecialchars($_POST['catIdOld']);
			} else {
				$catId = htmlspecialchars($_POST['catId']);
			}
			
			$entryTitleOld = decodeIt($_POST['entryTitleOld']);
			$entryTitle = encodeIt($_POST['entryTitle']);
			$entryDesc = encodeIt($_POST['entryDesc']);
			
			if ($_POST['entryNotes'] != '') {
				$entryNotes = encodeIt($_POST['entryNotes']);
			} else {
				$entryNotes = null;
			}
			
			if ($_POST['entryUsername'] != '') {
				$entryUsername = encodeIt($_POST['entryUsername']);
			} else {
				$entryUsername = null;
			}
			
			if ($_POST['entryUrl'] != '') {
				$entryUrl = encodeIt($_POST['entryUrl']);
			} else {
				$entryUrl = null;
			}

			$stmt = $mysqli->prepare("UPDATE
										entries
									SET
										catId = ?,
										entryTitle = ?,
										entryDesc = ?,
										entryUsername = ?,
										entryUrl = ?,
										entryNotes = ?,
										lastUpdated = ?
									WHERE
										entryId = ?"
			);
			$stmt->bind_param('ssssssss',
									$catId,
									$entryTitle,
									$entryDesc,
									$entryUsername,
									$entryUrl,
									$entryNotes,
									$todayDt,
									$entryId
			);
			$stmt->execute();
			$stmt->close();

			// Add Recent Activity
			$activityType = '8';
			$activityTitle = $theEntryText.' "'.$entryTitleOld.'" '.$wasUpdatedText;
			updateActivity($pw_userId,$activityType,$activityTitle);

			$msgBox = alertBox($theEntryText." \"".$entryTitleOld."\" ".$theCatUpdMsg2, "<i class='fa fa-check-square'></i>", "success");
		}
	}
	
	// Get Entry Data
	$sql = "SELECT
				entries.*,
				categories.catId,
				categories.catTitle,
				CONCAT(users.firstName,' ',users.lastName) AS entOwner
			FROM
				entries
				LEFT JOIN categories ON entries.catId = categories.catId
				LEFT JOIN users ON entries.userId = users.userId
			WHERE entries.entryId = ".$entryId;
	$res = mysqli_query($mysqli, $sql) or die('-1' . mysqli_error());
	$row = mysqli_fetch_assoc($res);
	
	if (!empty($row['entryUsername']) && $row['entryUsername'] != '') {
		$entryUsername = '<span class="usrname">'.decodeIt($row['entryUsername']).'<span>';
		$entryUser = decodeIt($row['entryUsername']);
	} else {
		$entryUsername = $entryUser = '';
	}
	
	if (!empty($row['entryNotes']) && $row['entryNotes'] != '') {
		$entryNotes = decodeIt($row['entryNotes']);
	} else {
		$entryNotes = '';
	}
	
	if (!empty($row['entryUrl']) && $row['entryUrl'] != '') {
		$entryUrl = '<a href="'.decodeIt($row['entryUrl']).'" target="_blank" data-toggle="tooltip" data-placement="top" title="'.$openLinkTooltip.'">'.decodeIt($row['entryUrl']).'</a>';
		$entUrl = decodeIt($row['entryUrl']);
	} else {
		$entryUrl = $entUrl = '';
	}
	
	if ($row['lastUpdated'] != '0000-00-00 00:00:00') {
		$lastUpdated = shortMonthFormat($row['lastUpdated']);
	} else {
		$lastUpdated = $noneText;
	}
	
	$pageTitle = $viewEntryPageTitle;
	$jsFile = 'viewEntry';

	include 'includes/header.php';
	
	if ($pw_userId == $row['userId'] || $pw_superUser != '') {
?>
	<h3 class="mb-20"><?php echo $pageTitle; ?> &mdash; <?php echo decodeIt($row['entryTitle']); ?></h3>
	<?php if ($msgBox) { echo $msgBox; } ?>
	
	<div class="row">
		<div class="col-md-4">
			<ul class="list-group pw-lists">
				<?php if ($pw_superUser != '') { ?>
					<li class="list-group-item">
						<strong><?php echo $ownerText; ?></strong>: <?php echo clean($row['entOwner']); ?>
					</li>
				<?php } ?>
				<li class="list-group-item">
					<strong><?php echo $entryTitleField; ?></strong>: <?php echo decodeIt($row['entryTitle']); ?>
				</li>
				<li class="list-group-item">
					<strong><?php echo $categoryTh; ?></strong>:
					<a href="index.php?page=viewCategory&catId=<?php echo $row['catId']; ?>" data-toggle="tooltip" data-placement="right" title="<?php echo $viewCatTooltip; ?>">
						<?php echo clean($row['catTitle']); ?>
					</a>
				</li>
				<li class="list-group-item">
					<strong><?php echo $descTh; ?></strong>: <?php echo nl2br(decodeIt($row['entryDesc'])); ?>
				</li>
				<li class="list-group-item">
					<strong><?php echo $urlTh; ?></strong>: <?php echo $entryUrl; ?>
				</li>
				<li class="list-group-item">
					<strong><?php echo $usernameTh; ?></strong>: <?php echo $entryUsername; ?>
				</li>
				<li class="list-group-item">
					<strong><?php echo $passwordField; ?></strong>: <span class="passwd"><?php echo decodeIt($row['entryPass']); ?></span>
				</li>
				<li class="list-group-item">
					<strong><?php echo $dateCreatedTh; ?></strong>: <?php echo shortMonthFormat($row['entryDate']); ?>
				</li>
				<li class="list-group-item">
					<strong><?php echo $lastUpdText; ?></strong>: <?php echo $lastUpdated; ?>
				</li>
			</ul>
			<a data-toggle="modal" href="#chngPass" class="btn btn-success btn-xs btn-icon mb-20"><i class="fa fa-lock"></i> <?php echo $chnPasswordBtn; ?></a>
			<a data-toggle="modal" href="#delEntry" class="btn btn-danger btn-xs btn-icon mb-20"><i class="fa fa-trash"></i> <?php echo $delEntryTooltip; ?></a>
			
			<div class="modal fade" id="chngPass" tabindex="-1" role="dialog" aria-labelledby="resetPassword" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
							<h4 class="modal-title"><?php echo $changeEntryPassH4; ?></h4>
						</div>
						<form action="" method="post">
							<div class="modal-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="password1"><?php echo $entryPassField; ?></label>
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
											<label for="password2"><?php echo $repeatEntPassField; ?></label>
											<input type="password" class="form-control" name="password2" id="password2" required="required" autocomplete="off" value="" />
											<span class="help-block"><?php echo $repeatEntPassHelp; ?></span>
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<input name="entryTitle" type="hidden" value="<?php echo clean($row['entryTitle']); ?>" />
								<button type="input" name="submit" value="chngPass" class="btn btn-success btn-icon"><i class="fa fa-check-square-o"></i> <?php echo $saveBtn; ?></button>
								<button type="button" class="btn btn-default btn-icon" data-dismiss="modal"><i class="fa fa-times-circle-o"></i> <?php echo $cancelBtn; ?></button>
							</div>
						</form>
					</div>
				</div>
			</div>
			
			<div class="modal fade" id="delEntry" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog text-left">
					<div class="modal-content">
						<form action="" method="post">
							<div class="modal-body">
								<p class="lead mt-0"><?php echo $delAccEntryConf; ?> "<?php echo decodeIt($row['entryTitle']); ?>"?</p>
							</div>
							<div class="modal-footer">
								<input name="entryTitle" type="hidden" value="<?php echo clean($row['entryTitle']); ?>" />
								<button type="input" name="submit" value="delEntry" class="btn btn-success btn-icon"><i class="fa fa-check-square-o"></i> <?php echo $delCatConfBtn; ?></button>
								<button type="button" class="btn btn-default btn-icon" data-dismiss="modal"><i class="fa fa-times-circle-o"></i> <?php echo $cancelBtn; ?></button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<h5 class="mb-20"><?php echo $updAccEntryH5; ?></h5>
			<form action="" method="post">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="catId"><?php echo $changeCatField; ?></label>
							<select class="form-control" name="catId" id="catId">
								<option value="..."><?php echo $changeCatOpt; ?></option>
								<?php
									$sqlStmt = "SELECT
													catId,
													catTitle,
													UNIX_TIMESTAMP(catDate) AS orderDate
												FROM
													categories
												WHERE
													userId = ".$pw_userId." AND
													catId != ".$row['catId']."
												ORDER BY orderDate DESC";
									$results = mysqli_query($mysqli, $sqlStmt) or die('-2'.mysqli_error());
								?>
								<?php while ($col = mysqli_fetch_assoc($results)) { ?>
									<option value="<?php echo $col['catId']; ?>"><?php echo clean($col['catTitle']); ?></option>
								<?php } ?>
							</select>
							<span class="help-block"><?php echo $changeCatHelp; ?></span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="entryTitle"><?php echo $entryTitleField; ?></label>
					<input type="text" class="form-control" name="entryTitle" required="required" value="<?php echo decodeIt($row['entryTitle']); ?>" />
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="entryDesc"><?php echo $descTh; ?></label>
							<textarea class="form-control" name="entryDesc" required="required" rows="3"><?php echo decodeIt($row['entryDesc']); ?></textarea>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="entryNotes"><?php echo $notesField; ?></label>
							<textarea class="form-control" name="entryNotes" rows="3"><?php echo $entryNotes; ?></textarea>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="entryUsername"><?php echo $usernameTh; ?></label>
							<input type="text" class="form-control" name="entryUsername" value="<?php echo $entryUser; ?>" />
						</div>
					</div>
					<div class="col-md-8">
						<div class="form-group">
							<label for="entryUrl"><?php echo $urlLinkField; ?></label>
							<input type="text" class="form-control" name="entryUrl" value="<?php echo $entUrl; ?>" />
						</div>
					</div>
				</div>
				<input name="catIdOld" type="hidden" value="<?php echo clean($row['catId']); ?>" />
				<input name="entryTitleOld" type="hidden" value="<?php echo clean($row['entryTitle']); ?>" />
				<button type="input" name="submit" value="saveEntry" class="btn btn-success btn-icon mb-20"><i class="fa fa-check-square-o"></i> <?php echo $saveChangesBtn; ?></button>
			</form>
		</div>
	</div>
<?php
	} else {
		// Add Recent Activity
		$activityType = '0';
		$activityTitle = $pageAccError.' '.$viewEntryTooltip;
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