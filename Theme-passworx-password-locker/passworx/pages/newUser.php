<?php
	$todayDt = date("Y-m-d H:i:s");
	$userDocsPath = $set['userDocsPath'];
	
	// Create New Account
	if (isset($_POST['submit']) && $_POST['submit'] == 'newAccount') {
		// User Validations
		if($_POST['userEmail'] == '') {
			$msgBox = alertBox($usrEmailReq, "<i class='fa fa-times-circle'></i>", "danger");
		} else if($_POST['firstName'] == '') {
			$msgBox = alertBox($usrFirstReq, "<i class='fa fa-times-circle'></i>", "danger");
		} else if($_POST['lastName'] == '') {
			$msgBox = alertBox($usrLastReq, "<i class='fa fa-times-circle'></i>", "danger");
		} else if($_POST['password1'] == '') {
			$msgBox = alertBox($newUsrAccPassReq, "<i class='fa fa-times-circle'></i>", "danger");
		} else if($_POST['password1'] != $_POST['password2']) {
			$msgBox = alertBox($newAccPassNoMatch, "<i class='fa fa-times-circle'></i>", "danger");
		} else {
			$dupEmail = '';
			$isActive = htmlspecialchars($_POST['isActive']);
			$userEmail = htmlspecialchars($_POST['userEmail']);
			$firstName = htmlspecialchars($_POST['firstName']);
			$lastName = htmlspecialchars($_POST['lastName']);
			$accPass = htmlspecialchars($_POST['password1']);
			$password1 = encodeIt($_POST['password1']);
			
			// Check for Duplicate email
			$check = $mysqli->query("SELECT 'X' FROM users WHERE userEmail = '".$userEmail."'");
			if ($check->num_rows) {
				$dupEmail = 'true';
			}
			
			// If duplicates are found
			if ($dupEmail != '') {
				// Add Recent Activity
				$activityType = '0';
				$activityTitle = $newUsrAccDupAct.' '.$userEmail;
				updateActivity($pw_userId,$activityType,$activityTitle);

				$msgBox = alertBox($newUsrAccDupMsg." ".$userEmail, "<i class='fa fa-warning'></i>", "warning");
			} else {
				// Generate a RANDOM Hash
				$randomHash = uniqid(rand());
				$randHash = substr($randomHash, 0, 8);
				$hash = md5(rand(0,1000));

				// Create the User's Documents Folder
				// Replace any spaces with an underscore and set to all lower-case
				$docFolderName = $firstName.'_'.$lastName;
				$userFldr = str_replace(' ', '_', $docFolderName);

				$usrDocsFolder = strtolower($userFldr).'_'.$randHash;
				
				// Create the User Document Directory
				if (mkdir($userDocsPath.$usrDocsFolder, 0755, true)) {
					$newDir = $userDocsPath.$usrDocsFolder;
				}

				$stmt = $mysqli->prepare("
									INSERT INTO
										users(
											userEmail,
											password,
											firstName,
											lastName,
											userFolder,
											joinDate,
											recEmails,
											isActive,
											hash
										) VALUES (
											?,
											?,
											?,
											?,
											?,
											?,
											1,
											?,
											?
										)
				");
				$stmt->bind_param('ssssssss',
					$userEmail,
					$password1,
					$firstName,
					$lastName,
					$usrDocsFolder,
					$todayDt,
					$isActive,
					$hash
				);
				$stmt->execute();
				$stmt->close();
				
				if ($isActive == '0') {
					// Send Out the Account Activation Email
					$installUrl	= $set['installUrl'];
					$siteName	= $set['siteName'];
					$siteEmail	= $set['siteEmail'];
					
					// Send Activation Email
					$mailvars = array();

					$mailvars['installUrl']				= $installUrl;
					$mailvars['siteName']				= $siteName;
					$mailvars['noReplyText']			= $noReplyText;
					$mailvars['emailFooterText1']		= $emailFooterText1;
					$mailvars['emailFooterText2']		= $emailFooterText2;
					$mailvars['thankYouText']			= $thankYouText;

					$mailvars['usrEmail']				= $userEmail;
					$mailvars['accEmail']				= $userEmail;
					$mailvars['accPass']				= $accPass;
					$mailvars['hash']					= $hash;
					$mailvars['newAccountTitle']		= $newAccountTitle;
					$mailvars['newAccountSubject']		= $newAccountSubject;
					$mailvars['newAccountVar1']			= $newAccountVar1;
					$mailvars['newAccountVar2']			= $newAccountVar2;
					$mailvars['newAccountVar3']			= $newAccountVar3;
					$mailvars['newAccountVar4']			= $newAccountVar4;
					$mailvars['newAccountBtnLink']		= $newAccountBtnLink;
					
					$email_template = file_get_contents("emails/new_account.php");
					
					foreach($mailvars as $k => $v) {
						$email_template = str_replace('{{'.$k.'}}', $v, $email_template);
					}

					$subject = $siteName.' '.$newAccountTitle;
					
					$headers = "From: ".$siteName." <".$siteEmail.">\r\n";
					$headers .= "Reply-To: ".$siteEmail."\r\n";
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
					
					// Send out the email in HTML
					mail($userEmail, $subject, $email_template, $headers);
					
				}

				// Add Recent Activity
				$activityType = '13';
				$activityTitle = $newUsrAccSavedAct.' '.$firstName.' '.$lastName;
				updateActivity($pw_userId,$activityType,$activityTitle);

				$msgBox = alertBox($newUsrAccSavedMsg." ".$firstName." ".$lastName." ".$newcatMsg2, "<i class='fa fa-check-square'></i>", "success");
			}
			// Clear the Form of values
			$_POST['userEmail'] = $_POST['firstName'] = $_POST['lastName'] = '';
		}
	}
	
	$mngPage = 'true';
	$pageTitle = $newUserPageTitle;
	$jsFile = 'newUser';

	include 'includes/header.php';
	
	if ($pw_superUser != '') {
?>
	<h3 class="mb-20"><?php echo $createAText; ?> <?php echo $pageTitle; ?></h3>
	<?php if ($msgBox) { echo $msgBox; } ?>
	
	<form action="" method="post">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="isActive"><?php echo $setNewUsrActField; ?></label>
					<select class="form-control" name="isActive" id="isActive">
						<option value="0"><?php echo $noBtn; ?></option>
						<option value="1" selected><?php echo $yesBtn; ?></option>
					</select>
					<span class="help-block"><?php echo $setNewUsrActHelp; ?></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="userEmail"><?php echo $newUsrEmailField; ?></label>
					<input type="text" class="form-control" name="userEmail" required="required" value="<?php echo isset($_POST['userEmail']) ? $_POST['userEmail'] : ''; ?>" />
					<span class="help-block"><?php echo $newUsrEmailHelp; ?></span>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="firstName"><?php echo $usrFirstNameField; ?></label>
					<input type="text" class="form-control" name="firstName" required="required" value="<?php echo isset($_POST['firstName']) ? $_POST['firstName'] : ''; ?>" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="lastName"><?php echo $usrLastNameField; ?></label>
					<input type="text" class="form-control" name="lastName" required="required" value="<?php echo isset($_POST['lastName']) ? $_POST['lastName'] : ''; ?>" />
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="password1"><?php echo $accPasswordField; ?></label>
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
					<label for="password2"><?php echo $repAccPasswordField; ?></label>
					<input type="password" class="form-control" name="password2" id="password2" required="required" autocomplete="off" value="" />
					<span class="help-block"><?php echo $accPassMustMatchHelp; ?></span>
				</div>
			</div>
		</div>

		<button type="input" name="submit" value="newAccount" class="btn btn-success btn-icon mt-10 mb-20"><i class="fa fa-check-square-o"></i> <?php echo $saveNewAccBtn; ?></button>
	</form>
<?php
	} else {
		// Add Recent Activity
		$activityType = '0';
		$activityTitle = $pageAccError.' '.$newUserNavLink;
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