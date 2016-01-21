<?php
	// Mark all active Logs as Deleted
	if (isset($_POST['submit']) && $_POST['submit'] == 'deleteLogs') {
		$stmt = $mysqli->prepare("UPDATE activity SET markDeleted = 1 WHERE markDeleted = 0");
		$stmt->execute();
		$stmt->close();

		// Add Recent Activity
		$activityType = '10';
		$activityTitle = $delLogsAct;
		updateActivity($pw_userId,$activityType,$activityTitle);

		$msgBox = alertBox($delLogsMsg, "<i class='fa fa-check-square'></i>", "success");
	}
	
	// Get Data
	$sql = "SELECT
				activity.*,
				users.userEmail,
				CONCAT(users.firstName,' ',users.lastName) AS activityBy
			FROM
				activity
				LEFT JOIN users ON activity.userId = users.userId
			WHERE markDeleted = 0";
	$res = mysqli_query($mysqli, $sql) or die('-1' . mysqli_error());
	
	$mngPage = 'true';
	$pageTitle = $activityLogsPageTitle;
	$addCss = '<link href="css/dataTables.css" rel="stylesheet">';
	$dataTables = 'true';
	$jsFile = 'activityLogs';

	include 'includes/header.php';
	
	if ($pw_superUser != '') {
?>
	<h3 class="mb-20"><?php echo $pageTitle; ?></h3>
	<?php if ($msgBox) { echo $msgBox; } ?>
	
	<table id="tabledata" class="display" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th><?php echo $idTh; ?></th>
				<th><?php echo $userTh; ?></th>
				<th><?php echo $activityTh; ?></th>
				<th><?php echo $descTh; ?></th>
				<th class="text-center"><?php echo $dateTh; ?></th>
				<th class="text-center"><?php echo $ipAddyTh; ?></th>
			</tr>
		</thead>

		<tbody>
			<?php
				while ($row = mysqli_fetch_assoc($res)) {
					if (is_null($row['activityBy']) || $row['activityBy'] == '') {
						$activityBy = clean($row['userEmail']);
					} else {
						$activityBy = clean($row['activityBy']);
					}

					if ($row['ipAddress'] == '::1') {
						$ipAddress = $localHostText;
					} else if ($row['ipAddress'] == '') {
						$ipAddress = '<strong class="text-danger">'.$notSetText.'<strong>';
					} else {
						$ipAddress = $row['ipAddress'];
					}
					
					$activityType = $otherText;
					if ($row['activityType'] == '0') { $activityType = '<strong class="text-danger">'.$errorText.'</strong>'; }
					if ($row['activityType'] == '1') { $activityType = $signUpText; }
					if ($row['activityType'] == '2') { $activityType = ''; }
					if ($row['activityType'] == '3') { $activityType = ''; }
					if ($row['activityType'] == '4') { $activityType = ''; }
					if ($row['activityType'] == '5') { $activityType = $signinBtnText; }
					if ($row['activityType'] == '6') { $activityType = $signOutConfBtn; }
					if ($row['activityType'] == '7') { $activityType = $catNavLink; }
					if ($row['activityType'] == '8') { $activityType = $entriesText; }
					if ($row['activityType'] == '9') { $activityType = $profUpdsText; }
					if ($row['activityType'] == '10') { $activityType = $activityLogsPageTitle; }
					if ($row['activityType'] == '11') { $activityType = $siteSetNavLink; }
					if ($row['activityType'] == '12') { $activityType = $mngUsersText; }
					if ($row['activityType'] == '13') { $activityType = $newAccsText; }
					if ($row['activityType'] == '14') { $activityType = $resetPassTitle; }
					if ($row['activityType'] == '15') { $activityType = $activatePageTitle; }
			?>
					<tr>
						<td><?php echo $row['activityId']; ?></td>
						<td><?php echo $activityBy; ?></td>
						<td><?php echo $activityType; ?></td>
						<td><?php echo clean($row['activityTitle']); ?></td>
						<td class="text-center"><?php echo shortDateTimeFormat($row['activityDate']); ?></td>
						<td class="text-center"><?php echo $ipAddress; ?></td>
					</tr>
			<?php } ?>
		</tbody>
	</table>
	
	<hr class="mt-0" />
	<a href="#deleteLogs" data-toggle="modal" class="btn btn-warning btn-sm btn-icon mb-20"><i class="fa fa-trash"></i> <?php echo $delAllLogsBtn; ?></a>

	<div class="modal fade" id="deleteLogs" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="" method="post">
					<div class="modal-body">
						<p class="lead"><?php echo $delAllLogsConf; ?></p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default btn-icon" data-dismiss="modal"><i class="fa fa-times-circle-o"></i> <?php echo $cancelBtn; ?></button>
						<button type="input" name="submit" value="deleteLogs" class="btn btn-success btn-icon"><i class="fa fa-check-square-o"></i> <?php echo $yesBtn; ?></button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php
	} else {
		// Add Recent Activity
		$activityType = '0';
		$activityTitle = $pageAccError.' '.$activityLogsPageTitle;
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