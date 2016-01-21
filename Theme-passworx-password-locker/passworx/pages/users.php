<?php
	if (isset($_GET['deleted']) && $_GET['deleted'] == 'user') {
		$msgBox = alertBox($userAccDelMsg, "<i class='fa fa-check-square'></i>", "success");
	}

	// Get Data
	$qry = "SELECT
				users.*,
				(SELECT COUNT(*) FROM categories WHERE categories.userId = users.userId) AS totalCats,
				(SELECT COUNT(*) FROM entries WHERE entries.userId = users.userId) AS totalEntries
			FROM
				users";
	$res = mysqli_query($mysqli, $qry) or die('-1' . mysqli_error());
	
	$mngPage = 'true';
	$pageTitle = $mngUsersText;
	$addCss = '<link href="css/dataTables.css" rel="stylesheet">';
	$dataTables = 'true';
	$jsFile = 'users';

	include 'includes/header.php';
	
	if ($pw_superUser != '') {
?>
	<h3 class="mb-20"><?php echo $pageTitle; ?></h3>
	<?php if ($msgBox) { echo $msgBox; } ?>
	
	<table id="tabledata" class="display" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th><?php echo $userTh; ?></th>
				<th><?php echo $emailTh; ?></th>
				<th class="text-center"><?php echo $accTypeTh; ?></th>
				<th class="text-center"><?php echo $statusTh; ?></th>
				<th class="text-center"><?php echo $emailsTh; ?></th>
				<th class="text-center"><i class="fa fa-folder-open-o" data-toggle="tooltip" data-placement="top" title="<?php echo $catNavLink; ?>"></i></th>
				<th class="text-center"><i class="fa fa-file-text-o" data-toggle="tooltip" data-placement="top" title="<?php echo $accEntriesTooltip; ?>"></i></th>
				<th class="text-center"><?php echo $lastSignInText; ?></th>
			</tr>
		</thead>

		<tbody>
			<?php
				while ($row = mysqli_fetch_assoc($res)) {
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
					
					if ($row['isActive'] == '0') {
						$isActive = '<strong class="text-danger">'.$inactiveText.'</strong>';
					} else {
						$isActive = '<strong class="text-success">'.$activeText.'</strong>';
					}
					
					if ($row['recEmails'] == '0') {
						$recEmails = $noBtn;
					} else {
						$recEmails = $yesBtn;
					}
					
					if ($row['superUser'] == '0') {
						$accType = $userTh;
					} else {
						$accType = $adminText;
					}
					
					if ($row['lastVisited'] != '0000-00-00 00:00:00') {
						$lastVisited = shortMonthFormat($row['lastVisited']);
					} else {
						$lastVisited = '';
					}
			?>
					<tr>
						<td><?php echo $firstName.' '.$lastName; ?></td>
						<td>
							<?php if ($row['userId'] != '1') { ?>
								<a href="index.php?page=viewUser&userId=<?php echo $row['userId']; ?>" data-toggle="tooltip" data-placement="right" title="<?php echo $editUserTooltip; ?>">
									<?php echo clean($row['userEmail']); ?>
								</a>
							<?php } else { ?>
								<?php echo clean($row['userEmail']); ?>
							<?php } ?>
						</td>
						<td class="text-center"><?php echo $accType; ?></td>
						<td class="text-center"><?php echo $isActive; ?></td>
						<td class="text-center"><?php echo $recEmails; ?></td>
						<td class="text-center"><?php echo $row['totalCats']; ?></td>
						<td class="text-center"><?php echo $row['totalEntries']; ?></td>
						<td class="text-center"><?php echo $lastVisited; ?></td>
					</tr>
			<?php } ?>
		</tbody>
	</table>
<?php
	} else {
		// Add Recent Activity
		$activityType = '0';
		$activityTitle = $pageAccError.' '.$mngUsersText;
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