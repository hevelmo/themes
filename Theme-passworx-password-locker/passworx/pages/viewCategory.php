<?php
	$catId = htmlspecialchars_decode($_GET['catId']);
	$todayDt = date("Y-m-d H:i:s");
	$actIp = $_SERVER['REMOTE_ADDR'];
	
	// Delete Category and ALL Category Entries
	if (isset($_POST['submit']) && $_POST['submit'] == 'delCategory') {
		$deleteId = htmlspecialchars($_POST['deleteId']);
		$catTitle = htmlspecialchars($_POST['catTitle']);

		$stmt = $mysqli->prepare("DELETE FROM entries WHERE catId = ?");
		$stmt->bind_param('s', $deleteId);
		$stmt->execute();
		$stmt->close();

		$stmt = $mysqli->prepare("DELETE FROM categories WHERE catId = ?");
		$stmt->bind_param('s', $deleteId);
		$stmt->execute();
		$stmt->close();

		// Add Recent Activity
		$activityType = '7';
		$activityTitle = $delCatAct.' "'.$catTitle.'"';
		updateActivity($pw_userId,$activityType,$activityTitle);

		header('Location: index.php?deleted=category');
	}
	
	// Add New Entry
	if (isset($_POST['submit']) && $_POST['submit'] == 'newEntry') {
		// User Validations
		if($_POST['entryTitle'] == '') {
			$msgBox = alertBox($entryTitleReq, "<i class='fa fa-times-circle'></i>", "danger");
		} else if($_POST['entryDesc'] == '') {
			$msgBox = alertBox($entryDescReq, "<i class='fa fa-times-circle'></i>", "danger");
		} else if($_POST['password1'] == '') {
			$msgBox = alertBox($entryPassReq, "<i class='fa fa-times-circle'></i>", "danger");
		} else if($_POST['password1'] != $_POST['password2']) {
			$msgBox = alertBox($entryPassNoMatch, "<i class='fa fa-times-circle'></i>", "danger");
		} else {
			$entTitle = htmlspecialchars($_POST['entryTitle']);
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
			
			$password1 = encodeIt($_POST['password1']);

			$stmt = $mysqli->prepare("
								INSERT INTO
									entries(
										catId,
										userId,
										entryTitle,
										entryDesc,
										entryUsername,
										entryPass,
										entryUrl,
										entryNotes,
										entryDate,
										ipAddress
									) VALUES (
										?,
										?,
										?,
										?,
										?,
										?,
										?,
										?,
										?,
										?
									)
			");
			$stmt->bind_param('ssssssssss',
				$catId,
				$pw_userId,
				$entryTitle,
				$entryDesc,
				$entryUsername,
				$password1,
				$entryUrl,
				$entryNotes,
				$todayDt,
				$actIp
			);
			$stmt->execute();
			$stmt->close();

			// Add Recent Activity
			$activityType = '8';
			$activityTitle = $newEntryNavLink.' "'.$entTitle.' '.$createdText;
			updateActivity($pw_userId,$activityType,$activityTitle);

			$msgBox = alertBox($theNewEntryText." \"".$entTitle."\" ".$newcatMsg2, "<i class='fa fa-check-square'></i>", "success");

			// Clear the Form of values
			$_POST['entryTitle'] = $_POST['entryDesc'] = $_POST['entryNotes'] = $_POST['entryUsername'] = $_POST['entryUrl'] = '';
		}
	}
	
	// Update Category
	if (isset($_POST['submit']) && $_POST['submit'] == 'saveCategory') {
		// User Validations
		if($_POST['catTitle'] == '') {
			$msgBox = alertBox($catTitleReq, "<i class='fa fa-times-circle'></i>", "danger");
		} else if($_POST['catDesc'] == '') {
			$msgBox = alertBox($catDescReq, "<i class='fa fa-times-circle'></i>", "danger");
		} else {
			$catTitle = htmlspecialchars($_POST['catTitle']);
			$catDesc = htmlspecialchars($_POST['catDesc']);

			$stmt = $mysqli->prepare("UPDATE
										categories
									SET
										catTitle = ?,
										catDesc = ?,
										lastUpdated = ?
									WHERE
										catId = ?"
			);
			$stmt->bind_param('ssss',
									$catTitle,
									$catDesc,
									$todayDt,
									$catId
			);
			$stmt->execute();
			$stmt->close();

			// Add Recent Activity
			$activityType = '7';
			$activityTitle = $updCatAct.' "'.$catTitle.'"';
			updateActivity($pw_userId,$activityType,$activityTitle);

			$msgBox = alertBox($theCatUpdMsg1." ".$catTitle." ".$theCatUpdMsg2, "<i class='fa fa-check-square'></i>", "success");
		}
	}
	
	// Delete Entry
	if (isset($_POST['submit']) && $_POST['submit'] == 'delEntry') {
		$deleteId = htmlspecialchars($_POST['deleteId']);
		$entryTitle = decodeIt($_POST['entryTitle']);

		$stmt = $mysqli->prepare("DELETE FROM entries WHERE entryId = ?");
		$stmt->bind_param('s', $deleteId);
		$stmt->execute();
		$stmt->close();

		// Add Recent Activity
		$activityType = '8';
		$activityTitle = $delEntryAct.' "'.$entryTitle.'"';
		updateActivity($pw_userId,$activityType,$activityTitle);

		$msgBox = alertBox($delEntryMsg, "<i class='fa fa-check-square'></i>", "success");
	}
	
	// Get Category Data
	$sql = "SELECT
				categories.*,
				CONCAT(users.firstName,' ',users.lastName) AS catOwner
			FROM
				categories
				LEFT JOIN users ON categories.userId = users.userId
			WHERE categories.catId = ".$catId;
	$res = mysqli_query($mysqli, $sql) or die('-1' . mysqli_error());
	$rows = mysqli_fetch_assoc($res);
	
	if ($rows['lastUpdated'] != '0000-00-00 00:00:00') {
		$lastUpdated = shortMonthFormat($rows['lastUpdated']);
	} else {
		$lastUpdated = 'None';
	}
	
	// Get Entries Data
	$qry = "SELECT * FROM entries WHERE catId = ".$catId;
	$result = mysqli_query($mysqli, $qry) or die('-2' . mysqli_error());
	$ttl = mysqli_num_rows($result);
	
	$catsPage = 'true';
	$pageTitle = $viewCatTooltip;
	$addCss = '<link href="css/dataTables.css" rel="stylesheet">';
	$dataTables = 'true';
	$jsFile = 'viewCategory';

	include 'includes/header.php';
	
	if ($pw_userId == $rows['userId'] || $pw_superUser != '') {
?>
	<h3 class="mb-20"><?php echo $pageTitle; ?> &mdash; <?php echo clean($rows['catTitle']); ?></h3>
	<?php if ($msgBox) { echo $msgBox; } ?>
	
	<div class="row">
		<div class="col-md-4">
			<ul class="list-group pw-lists">
				<?php if ($pw_superUser != '') { ?>
					<li class="list-group-item">
						<strong><?php echo $ownerText; ?></strong>: <?php echo clean($rows['catOwner']); ?>
					</li>
				<?php } ?>
				<li class="list-group-item">
					<strong><?php echo $catTitleField; ?></strong>: <?php echo clean($rows['catTitle']); ?>
				</li>
				<li class="list-group-item">
					<strong><?php echo $descTh; ?></strong>: <?php echo nl2br(clean($rows['catDesc'])); ?>
				</li>
				<li class="list-group-item">
					<strong><?php echo $dateCreatedTh; ?></strong>: <?php echo shortMonthFormat($rows['catDate']); ?>
				</li>
				<li class="list-group-item">
					<strong><?php echo $lastUpdText; ?></strong>: <?php echo $lastUpdated; ?>
				</li>
				<li class="list-group-item">
					<strong><?php echo $numEntriesText; ?></strong>: <?php echo $ttl; ?>
				</li>
			</ul>
			<a data-toggle="modal" href="#newEntry" class="btn btn-success btn-xs btn-icon mb-20"><i class="fa fa-plus"></i> <?php echo $newEntryNavLink; ?></a>
			<a data-toggle="modal" href="#delCategory" class="btn btn-danger btn-xs btn-icon mb-20"><i class="fa fa-trash"></i> <?php echo $delCatBtn; ?></a>
			
			<div class="modal fade" id="newEntry" tabindex="-1" role="dialog" aria-labelledby="resetPassword" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
							<h4 class="modal-title"><?php echo $addNewAccEntryH4; ?></h4>
						</div>
						<form action="" method="post">
							<div class="modal-body">
								<div class="form-group">
									<label for="entryTitle"><?php echo $entryTitleField; ?></label>
									<input type="text" class="form-control" name="entryTitle" required="required" value="<?php echo isset($_POST['entryTitle']) ? $_POST['entryTitle'] : ''; ?>" />
									<span class="help-block"><?php echo $entryTitleHelp; ?></span>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="entryDesc"><?php echo $descTh; ?></label>
											<textarea class="form-control" name="entryDesc" required="required" rows="2"><?php echo isset($_POST['entryDesc']) ? $_POST['entryDesc'] : ''; ?></textarea>
											<span class="help-block"><?php echo $entryDescHelp; ?></span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="entryNotes"><?php echo $notesField; ?></label>
											<textarea class="form-control" name="entryNotes" rows="2"><?php echo isset($_POST['entryNotes']) ? $_POST['entryNotes'] : ''; ?></textarea>
											<span class="help-block"><?php echo $notesNewHelp; ?></span>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="entryUsername"><?php echo $usernameTh; ?></label>
											<input type="text" class="form-control" name="entryUsername" value="<?php echo isset($_POST['entryUsername']) ? $_POST['entryUsername'] : ''; ?>" />
										</div>
									</div>
									<div class="col-md-8">
										<div class="form-group">
											<label for="entryUrl"><?php echo $urlLinkField; ?></label>
											<input type="text" class="form-control" name="entryUrl" value="<?php echo isset($_POST['entryUrl']) ? $_POST['entryUrl'] : ''; ?>" />
										</div>
									</div>
								</div>
								
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
								<button type="input" name="submit" value="newEntry" class="btn btn-success btn-icon"><i class="fa fa-check-square-o"></i> <?php echo $saveBtn; ?></button>
								<button type="button" class="btn btn-default btn-icon" data-dismiss="modal"><i class="fa fa-times-circle-o"></i> <?php echo $cancelBtn; ?></button>
							</div>
						</form>
					</div>
				</div>
			</div>
			
			<div class="modal fade" id="delCategory" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog text-left">
					<div class="modal-content">
						<form action="" method="post">
							<div class="modal-body">
								<p class="lead mt-0">
									<?php echo $delCatConf1; ?> "<?php echo clean($rows['catTitle']); ?>"?<br />
									<small><?php echo $delCatConf2; ?></small>
								</p>
							</div>
							<div class="modal-footer">
								<input name="deleteId" type="hidden" value="<?php echo $rows['catId']; ?>" />
								<input name="catTitle" type="hidden" value="<?php echo clean($rows['catTitle']); ?>" />
								<button type="input" name="submit" value="delCategory" class="btn btn-success btn-icon"><i class="fa fa-check-square-o"></i> <?php echo $delCatConfBtn; ?></button>
								<button type="button" class="btn btn-default btn-icon" data-dismiss="modal"><i class="fa fa-times-circle-o"></i> <?php echo $cancelBtn; ?></button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<h5 class="mb-20"><?php echo $updCatH5; ?></h5>
			<form action="" method="post">
				<div class="form-group">
					<label for="catTitle"><?php echo $catTitleField; ?></label>
					<input type="text" class="form-control" name="catTitle" required="required" value="<?php echo clean($rows['catTitle']); ?>" />
				</div>
				<div class="form-group">
					<label for="catDesc"><?php echo $descTh; ?></label>
					<textarea class="form-control" name="catDesc" required="required" rows="3"><?php echo clean($rows['catDesc']); ?></textarea>
				</div>
				<button type="input" name="submit" value="saveCategory" class="btn btn-success btn-icon mb-20"><i class="fa fa-check-square-o"></i> <?php echo $saveChangesBtn; ?></button>
			</form>
		</div>
	</div>

	<hr />
	
	<h3 class="mb-20"><?php echo $catAccEntriesH3; ?> <?php echo clean($rows['catTitle']); ?></h3>
	<?php if ($ttl > 0) { ?>
		<table id="entries" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th><?php echo $titleTh; ?></th>
					<th><?php echo $usernameTh; ?></th>
					<th><?php echo $urlTh; ?></th>
					<th class="text-center"><?php echo $dateCreatedTh; ?></th>
					<th class="text-center"><?php echo $lastUpdatedTh; ?></th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php
					while ($row = mysqli_fetch_assoc($result)) {
						if (!empty($row['entryUsername']) && $row['entryUsername'] != '') {
							$entryUsername = decodeIt($row['entryUsername']);
						} else {
							$entryUsername = '';
						}
						
						if (!empty($row['entryUrl']) && $row['entryUrl'] != '') {
							$entryUrl = '<a href="'.decodeIt($row['entryUrl']).'" target="_blank" data-toggle="tooltip" data-placement="right" title="'.$openLinkTooltip.'">'.decodeIt($row['entryUrl']).'</a>';
						} else {
							$entryUrl = '';
						}
						
						if ($row['lastUpdated'] != '0000-00-00 00:00:00') {
							$lastUpdated = shortMonthFormat($row['lastUpdated']);
						} else {
							$lastUpdated = '';
						}
				?>
					<tr>
						<td>
							<a href="index.php?page=viewEntry&entryId=<?php echo $row['entryId']; ?>" data-toggle="tooltip" data-placement="right" title="<?php echo $viewEntryTooltip; ?>">
								<?php echo decodeIt($row['entryTitle']); ?>
							</a>
						</td>
						<td><?php echo $entryUsername; ?></td>
						<td><?php echo $entryUrl; ?></td>
						<td class="text-center"><?php echo shortMonthFormat($row['entryDate']); ?></td>
						<td class="text-center"><?php echo $lastUpdated; ?></td>
						<td class="text-right">
							<a data-toggle="modal" href="#delEntry<?php echo $row['entryId']; ?>">
								<i class="fa fa-trash text-danger" data-toggle="tooltip" data-placement="left" title="<?php echo $delEntryTooltip; ?>"></i>
							</a>
							
							<div class="modal fade" id="delEntry<?php echo $row['entryId']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog text-left">
									<div class="modal-content">
										<form action="" method="post">
											<div class="modal-body">
												<p class="lead mt-0"><?php echo $delEntryConf; ?> "<?php echo decodeIt($row['entryTitle']); ?>"?</p>
											</div>
											<div class="modal-footer">
												<input name="deleteId" type="hidden" value="<?php echo $row['entryId']; ?>" />
												<input name="entryTitle" type="hidden" value="<?php echo clean($row['entryTitle']); ?>" />
												<button type="input" name="submit" value="delEntry" class="btn btn-success btn-icon"><i class="fa fa-check-square-o"></i> <?php echo $delCatConfBtn; ?></button>
												<button type="button" class="btn btn-default btn-icon" data-dismiss="modal"><i class="fa fa-times-circle-o"></i> <?php echo $cancelBtn; ?></button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	<?php } else { ?>
		<div class="alertMsg default">
			<div class="msgIcon pull-left">
				<i class="fa fa-info-circle"></i>
			</div>
			<?php echo $noEntriesSavedMsg; ?>
		</div>
	<?php } ?>
<?php
	} else {
		// Add Recent Activity
		$activityType = '0';
		$activityTitle = $pageAccError.' '.$viewCatTooltip;
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