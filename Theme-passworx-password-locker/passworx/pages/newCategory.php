<?php
	$todayDt = date("Y-m-d H:i:s");
	$actIp = $_SERVER['REMOTE_ADDR'];

	// Add New Category
	if (isset($_POST['submit']) && $_POST['submit'] == 'saveCategory') {
		// User Validations
		if($_POST['catTitle'] == '') {
			$msgBox = alertBox($catTitleReq, "<i class='fa fa-times-circle'></i>", "danger");
		} else if($_POST['catDesc'] == '') {
			$msgBox = alertBox($catDescReq, "<i class='fa fa-times-circle'></i>", "danger");
		} else {
			$catTitle = htmlspecialchars($_POST['catTitle']);
			$catDesc = htmlspecialchars($_POST['catDesc']);

			$stmt = $mysqli->prepare("
								INSERT INTO
									categories(
										userId,
										catTitle,
										catDesc,
										catDate,
										ipAddress
									) VALUES (
										?,
										?,
										?,
										?,
										?
									)
			");
			$stmt->bind_param('sssss',
				$pw_userId,
				$catTitle,
				$catDesc,
				$todayDt,
				$actIp
			);
			$stmt->execute();
			$stmt->close();

			// Add Recent Activity
			$activityType = '7';
			$activityTitle = $newCatNavLink.' "'.$catTitle.' '.$createdText;
			updateActivity($pw_userId,$activityType,$activityTitle);

			$msgBox = alertBox($newcatMsg1." ".$catTitle." ".$newcatMsg2, "<i class='fa fa-check-square'></i>", "success");

			// Clear the Form of values
			$_POST['catTitle'] = $_POST['catDesc'] = '';
		}
	}

	$catsPage = 'true';
	$pageTitle = $newCatNavLink;

	include 'includes/header.php';
?>
<h3 class="mb-20">Create a <?php echo $pageTitle; ?></h3>
<?php if ($msgBox) { echo $msgBox; } ?>

<form action="" method="post">
	<div class="form-group">
		<label for="catTitle"><?php echo $catTitleField; ?></label>
		<input type="text" class="form-control" name="catTitle" required="required" value="<?php echo isset($_POST['catTitle']) ? $_POST['catTitle'] : ''; ?>" />
		<span class="help-block"><?php echo $catTitleHelp; ?></span>
	</div>
	<div class="form-group">
		<label for="catDesc"><?php echo $descTh; ?></label>
		<textarea class="form-control" name="catDesc" required="required" rows="2"><?php echo isset($_POST['catDesc']) ? $_POST['catDesc'] : ''; ?></textarea>
		<span class="help-block"><?php echo $newCatDescHelp; ?></span>
	</div>

	<button type="input" name="submit" value="saveCategory" class="btn btn-success btn-icon mb-20"><i class="fa fa-check-square-o"></i> <?php echo $saveNewCatBtn; ?></button>
</form>