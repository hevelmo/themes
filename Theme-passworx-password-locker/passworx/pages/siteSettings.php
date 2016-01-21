<?php
	$todayDt = date("Y-m-d H:i:s");
	$actIp = $_SERVER['REMOTE_ADDR'];
	$hasComps = '';
	
	// Update Site Settings
	if (isset($_POST['submit']) && $_POST['submit'] == 'saveSettings') {
		// User Validations
		if($_POST['installUrl'] == '') {
			$msgBox = alertBox($installUrlReq, "<i class='fa fa-times-circle'></i>", "danger");
		} else if($_POST['siteName'] == '') {
			$msgBox = alertBox($siteNameReq, "<i class='fa fa-times-circle'></i>", "danger");
		} else if($_POST['siteEmail'] == '') {
			$msgBox = alertBox($siteEmailReq, "<i class='fa fa-times-circle'></i>", "danger");
		} else {
			$installUrl = htmlspecialchars($_POST['installUrl']);
			if(substr($installUrl, -1) != '/') {
				$install = $installUrl.'/';
			} else {
				$install = $installUrl;
			}

			$siteName = htmlspecialchars($_POST['siteName']);
			$siteEmail = htmlspecialchars($_POST['siteEmail']);
			$localization = htmlspecialchars($_POST['localization']);
			$allowRegistrations = htmlspecialchars($_POST['allowRegistrations']);

			$stmt = $mysqli->prepare("UPDATE
										sitesettings
									SET
										installUrl = ?,
										siteName = ?,
										siteEmail = ?,
										localization = ?,
										allowRegistrations = ?,
										lastUpdated = ?"
			);
			$stmt->bind_param('ssssss',
									$install,
									$siteName,
									$siteEmail,
									$localization,
									$allowRegistrations,
									$todayDt
			);
			$stmt->execute();
			$stmt->close();

			// Add Recent Activity
			$activityType = '11';
			$activityTitle = $siteSetUpdAct;
			updateActivity($pw_userId,$activityType,$activityTitle);

			$msgBox = alertBox($siteSetUpdMsg, "<i class='fa fa-check-square'></i>", "success");
		}
	}
	
	// Get Data
	$sql = "SELECT * FROM sitesettings";
	$res = mysqli_query($mysqli, $sql) or die('-1' . mysqli_error());
	$row = mysqli_fetch_assoc($res);
	
	if ($row['localization'] == 'custom') { $custom = 'selected'; } else { $custom = ''; }
	if ($row['allowRegistrations'] == '1') { $reg = 'selected'; } else { $reg = ''; }
	
	// Check for installed Components
	$checkComps = $mysqli->query("SELECT 'X' FROM components LIMIT 1");
	if ($checkComps->num_rows) {
		$hasComps = 'true';
	}
	
	$mngPage = 'true';
	$pageTitle = $siteSetNavLink;

	include 'includes/header.php';
	
	if ($pw_superUser != '') {
?>
	<h3 class="mb-20"><?php echo $pageTitle; ?></h3>
	<?php if ($msgBox) { echo $msgBox; } ?>
	
	<form action="" method="post">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="installUrl"><?php echo $installUrlField; ?></label>
					<input type="text" class="form-control" name="installUrl" required="required" value="<?php echo $row['installUrl']; ?>" />
					<span class="help-block"><?php echo $installUrlHelp; ?></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="siteName"><?php echo $siteNameField; ?></label>
					<input type="text" class="form-control" name="siteName" required="required" value="<?php echo $row['siteName']; ?>" />
					<span class="help-block"><?php echo $siteNameHelp.' '.$set['siteName']; ?>.</span>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="siteEmail"><?php echo $siteEmailField; ?></label>
					<input type="text" class="form-control" required="" name="siteEmail" id="siteEmail" value="<?php echo $row['siteEmail']; ?>" />
					<span class="help-block"><?php echo $siteEmailHelp; ?></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="localization"><?php echo $localField; ?></label>
					<select class="form-control" name="localization" id="localization">
						<option value="english">English - language/english.php</option>
						<option value="custom" <?php echo $custom; ?>>Custom - language/custom.php</option>
					</select>
					<span class="help-block"><?php echo $localHelp; ?></span>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="allowRegistrations"><?php echo $selfRegField; ?></label>
					<select class="form-control" name="allowRegistrations" id="allowRegistrations">
						<option value="0"><?php echo $noBtn; ?></option>
						<option value="1" <?php echo $reg; ?>><?php echo $yesBtn; ?></option>
					</select>
					<span class="help-block"><?php echo $selfRegHelp; ?></span>
				</div>
			</div>
		</div>
		
		<button type="input" name="submit" value="saveSettings" class="btn btn-success btn-icon mb-20"><i class="fa fa-check-square-o"></i> <?php echo $saveChangesBtn; ?></button>
	</form>

	<?php if ($hasComps == 'true') { ?>
		<hr />
		<h3 class="mb-20"><?php echo $installedCompH3; ?></h3>
		
	<?php } ?>
<?php
	} else {
		// Add Recent Activity
		$activityType = '0';
		$activityTitle = $pageAccError.' '.$siteSetNavLink;
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