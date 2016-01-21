<?php
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
	
	if (isset($_GET['deleted']) && $_GET['deleted'] == 'category') {
		$msgBox = alertBox($catDelConfMsg, "<i class='fa fa-check-square'></i>", "success");
	}
	if (isset($_GET['deleted']) && $_GET['deleted'] == 'entry') {
		$msgBox = alertBox($delEntryMsg, "<i class='fa fa-check-square'></i>", "success");
	}
	
	// Get All Entries
	$sql = "SELECT
				entries.*,
				categories.catId,
				categories.catTitle
			FROM
				entries
				LEFT JOIN categories ON entries.catId = categories.catId
			WHERE
				entries.userId = ".$pw_userId;
	$res = mysqli_query($mysqli, $sql) or die('-1' . mysqli_error());
	$ttl = mysqli_num_rows($res);

	$dashPage = 'true';
	$pageTitle = $dashboardNavLink;
	$addCss = '<link href="css/dataTables.css" rel="stylesheet">';
	$dataTables = 'true';
	$jsFile = 'dashboard';

	include 'includes/header.php';
?>
<h3 class="mb-20"><?php echo $pageTitle; ?> &mdash; <?php echo $allEntriesText; ?></h3>
<?php if ($msgBox) { echo $msgBox; } ?>

<?php if ($ttl > 0) { ?>
	<table id="entries" class="display" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th><?php echo $titleTh; ?></th>
				<th><?php echo $categoryTh; ?></th>
				<th><?php echo $usernameTh; ?></th>
				<th><?php echo $urlTh; ?></th>
				<th class="text-center"><?php echo $dateCreatedTh; ?></th>
				<th class="text-center"><?php echo $lastUpdatedTh; ?></th>
				<th></th>
			</tr>
		</thead>

		<tbody>
			<?php
				while ($row = mysqli_fetch_assoc($res)) {
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
					<td>
						<a href="index.php?page=viewCategory&catId=<?php echo $row['catId']; ?>" data-toggle="tooltip" data-placement="right" title="<?php echo $viewCatTooltip; ?>">
							<?php echo clean($row['catTitle']); ?>
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
											<button type="input" name="submit" value="delEntry" class="btn btn-success btn-icon"><i class="fa fa-check-square-o"></i> <?php echo $delEntryBtn; ?></button>
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

<div class="well well-sm accInfo mb-20">
	<h5 class="mt-5 mb-10"><?php echo $entriesSecureH5; ?></h5>
	<small><?php echo $entriesSecureQuip; ?></small>
</div>