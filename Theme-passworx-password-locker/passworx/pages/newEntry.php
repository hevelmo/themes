<?php
	$todayDt = date("Y-m-d H:i:s");
	$actIp = $_SERVER['REMOTE_ADDR'];
	
	// Add New Entry
	if (isset($_POST['submit']) && $_POST['submit'] == 'saveEntry') {
		// User Validations
		if($_POST['catId'] == '...') {
			$msgBox = alertBox($catReq, "<i class='fa fa-times-circle'></i>", "danger");
		} else if($_POST['entryTitle'] == '') {
			$msgBox = alertBox($entryTitleReq, "<i class='fa fa-times-circle'></i>", "danger");
		} else if($_POST['entryDesc'] == '') {
			$msgBox = alertBox($entryDescReq, "<i class='fa fa-times-circle'></i>", "danger");
		} else if($_POST['password1'] == '') {
			$msgBox = alertBox($entryPassReq, "<i class='fa fa-times-circle'></i>", "danger");
		} else if($_POST['password1'] != $_POST['password2']) {
			$msgBox = alertBox($entryPassNoMatch, "<i class='fa fa-times-circle'></i>", "danger");
		} else {
			$catId = htmlspecialchars($_POST['catId']);
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
	
	$pageTitle = $newEntryNavLink;
	$jsFile = 'newEntry';

	include 'includes/header.php';
?>
<h3 class="mb-20"><?php echo $addAText; ?> <?php echo $pageTitle; ?></h3>
<?php if ($msgBox) { echo $msgBox; } ?>

<form action="" method="post">
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label for="catId"><?php echo $selCatField; ?></label>
				<select class="form-control" name="catId" id="catId">
					<option value="..."><?php echo $selectOption; ?></option>
					<?php
						$sqlStmt = "SELECT
										catId,
										catTitle,
										UNIX_TIMESTAMP(catDate) AS orderDate
									FROM
										categories
									WHERE
										userId = ".$pw_userId."
									ORDER BY orderDate DESC";
						$results = mysqli_query($mysqli, $sqlStmt) or die('-2'.mysqli_error());
					?>
					<?php while ($row = mysqli_fetch_assoc($results)) { ?>
						<option value="<?php echo $row['catId']; ?>"><?php echo clean($row['catTitle']); ?></option>
					<?php } ?>
				</select>
				<span class="help-block">
					<?php echo $selCatHelp1; ?>
					<button type="button" class="btn btn-link btn-help" data-container="body" data-toggle="popover" data-placement="top" data-content="<?php echo $selCatHelp2; ?>">
						<i class="fa fa-question-circle"></i>
					</button>
				</span>
			</div>
		</div>
	</div>
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

	<button type="input" name="submit" value="saveEntry" class="btn btn-success btn-icon mt-10 mb-20"><i class="fa fa-check-square-o"></i> <?php echo $saveNewEntryBtn; ?></button>
</form>