<?php
	// Errors on for the Install
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	
	function alertBox($msg, $icon = "", $type = "") {
        return "
				<div class=\"alertMsg $type\">
					<div class=\"msgIcon pull-left\">$icon</div>
					$msg
					<a class=\"msgClose\" title=\"Close\" href=\"#\"><i class=\"fa fa-times\"></i></a>
				</div>
			";
    }
	
	function generateSalt($v) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $v; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}
	
	$installSalt = generateSalt('32');

	$msgBox = '';

	$step = 'check';
	$canInstall = 'true';
	$svrErr	= 'false';
	$folderErr = 'false';

	// Check for PHP Version, MySQLi & other Core Functions
	if (version_compare(PHP_VERSION, '5.3.0', '>=')) {
		$phpversion = PHP_VERSION;
		$phpcheck = '<i class="fa fa-check text-success"></i> PASS';
	} else {
		$phpversion = 'You need to have PHP Version 5.3 or higher Installed to run Passworx V2.';
		$phpcheck = '<i class="fa fa-times text-danger"></i> FAIL';
		$canInstall = 'false';
		$svrErr	= 'true';
	}
	if (function_exists('mysqli_connect')) {
		$mysqliver = '<i class="fa fa-check text-success"></i> PASS';
	} else {
		$mysqliver = '<i class="fa fa-times text-danger"></i> FAIL';
		$canInstall = 'false';
		$svrErr	= 'true';
	}
	if (function_exists('mcrypt_encrypt')) {
		$hasmcrypt = '<i class="fa fa-check text-success"></i> PASS';
	} else {
		$hasmcrypt = '<i class="fa fa-times text-danger"></i> FAIL';
		$canInstall = 'false';
		$svrErr	= 'true';
	}
	if (function_exists('imagecreatefrompng')) {
		$haspng = '<i class="fa fa-check text-success"></i> PASS';
	} else {
		$haspng = '<i class="fa fa-times text-danger"></i> FAIL';
		$canInstall = 'false';
		$svrErr	= 'true';
	}
	if (function_exists('fgetcsv')) {
		$hascsv = '<i class="fa fa-check text-success"></i> PASS';
	} else {
		$hascsv = '<i class="fa fa-times text-danger"></i> FAIL';
		$canInstall = 'false';
		$svrErr	= 'true';
	}

	// Check if the following Directories are writeable
	$mainDir = substr(sprintf('%o', fileperms('../')), -4);

	if ($mainDir >= '0755') {
		$hasMain = '<i class="fa fa-check text-success"></i> WRITEABLE';
	} else {
		$hasMain = '<i class="fa fa-times text-danger"></i> NOT WRITEABLE';
		$canInstall = 'false';
		$folderErr = 'true';
	}

	if(isset($_POST['submit']) && $_POST['submit'] == 'nextStep') {
		$step = '1';
		$file = false;
	}

	if(isset($_POST['submit']) && $_POST['submit'] == 'On to Step 2') {
        // Validation
        if($_POST['dbhost'] == '') {
			$msgBox = alertBox("Please enter in your Host name. This is usually 'localhost'.", "<i class='fa fa-times-circle'></i>", "danger");
        } else if($_POST['dbuser'] == '') {
			$msgBox = alertBox("Please enter the username for the database.", "<i class='fa fa-times-circle'></i>", "danger");
        } else if($_POST['dbname'] == '') {
			$msgBox = alertBox("Please enter the database name.", "<i class='fa fa-times-circle'></i>", "danger");
        } else {
			$dbhost = $_POST['dbhost'];
			$dbuser = $_POST['dbuser'];
			$dbpass = $_POST['dbpass'];
			$dbname = $_POST['dbname'];
			$timezone = $_POST['timezone'];

            $str ="<?php
	error_reporting(0);
	ini_set('display_errors', '0');

	date_default_timezone_set('".$timezone."');

	$"."dbhost = '".$dbhost."';
	$"."dbuser = '".$dbuser."';
	$"."dbpass = '".$dbpass."';
	$"."dbname = '".$dbname."';

	".file_get_contents('config.txt')."
?>";
            if (!file_put_contents('../config.php', $str)) {
                $no_perm = true;
            }
        }
    }

	if (is_file('../config.php')) {
		include ('../config.php');

		// Errors on for the Install
		error_reporting(E_ALL);
		ini_set('display_errors', '1');

		if (!$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname)) {
            $step = '1';
            $file = true;
        } else {
			if (mysqli_connect_errno()) {
                $step = '1';
            } else {
				$dbsql = file_get_contents('install.sql');
				if (!$dbsql){
					die ('Error opening file');
				}
				mysqli_multi_query($mysqli, $dbsql) or die('-1' . mysqli_error());
				$step = '2';
			}
		}

		if(isset($_POST['submit']) && $_POST['submit'] == 'Complete Install') {
			include ('../config.php');

			// Errors on for the Install
			error_reporting(E_ALL);
			ini_set('display_errors', '1');

			// Settings Validations
			if($_POST['installUrl'] == "") {
				$msgBox = alertBox("Please enter the Installation URL (include the trailing slash).", "<i class='fa fa-times-circle'></i>", "danger");
			} else if($_POST['siteName'] == "") {
				$msgBox = alertBox("Please enter a Site Name.", "<i class='fa fa-times-circle'></i>", "danger");
			} else if($_POST['siteEmail'] == "") {
				$msgBox = alertBox("Please enter the main site reply-to Email address.", "<i class='fa fa-times-circle'></i>", "danger");
			}
			// Main Admin Account Validations
			else if($_POST['userEmail'] == '') {
				$msgBox = alertBox("Please enter a valid email for the Primary Admin. Email addresses are used as your account login.", "<i class='fa fa-times-circle'></i>", "danger");
			} else if($_POST['password'] == '') {
				$msgBox = alertBox("Please enter a password for the Primary Admin's Account.", "<i class='fa fa-times-circle'></i>", "danger");
			} else if($_POST['r-password'] == '') {
				$msgBox = alertBox("Please re-enter the password for the Primary Admin's Account.", "<i class='fa fa-times-circle'></i>", "danger");
			} else if($_POST['password'] != $_POST['r-password']) {
				$msgBox = alertBox("The password for the Primary Admin's Account does not match.", "<i class='fa fa-times-circle'></i>", "danger");
			} else if($_POST['firstName'] == '') {
				$msgBox = alertBox("Please enter the Primary Admin's First Name.", "<i class='fa fa-times-circle'></i>", "danger");
			} else if($_POST['lastName'] == '') {
				$msgBox = alertBox("Please enter the Primary Admin's Last Name.", "<i class='fa fa-times-circle'></i>", "danger");
			} else {
				$instSalt = htmlspecialchars($_POST['installationSalt']);

				function encodeIt($value) {
					global $instSalt;
					return trim(
						base64_encode(
							mcrypt_encrypt(
								MCRYPT_RIJNDAEL_256,
								$instSalt,
								$value,
								MCRYPT_MODE_ECB,
								mcrypt_create_iv(
									mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB),
									MCRYPT_RAND
								)
							)
						)
					);
				}

				// Add the trailing slash if there is not one
				$installUrl = htmlspecialchars($_POST['installUrl']);
				if(substr($installUrl, -1) != '/') {
					$install = $installUrl.'/';
				} else {
					$install = $installUrl;
				}
				$siteName = htmlspecialchars($_POST['siteName']);
				$siteEmail = htmlspecialchars($_POST['siteEmail']);
				$saltCode = htmlspecialchars($_POST['installationSalt']);
				$userDocsPath = '../docs/';
				$todayDt = date("Y-m-d H:i:s");

				// Add data to the siteSettings Table
				$stmt = $mysqli->prepare("
									INSERT INTO
										sitesettings(
											installUrl,
											siteName,
											siteEmail,
											localization,
											saltCode,
											allowRegistrations,
											calLocalization,
											avatarFolder,
											userDocsPath,
											avatarTypesAllowed,
											fileTypesAllowed,
											weatherLoc,
											weekStart,
											lastUpdated
										) VALUES (
											?,
											?,
											?,
											'english',
											?,
											1,
											'en',
											'avatars/',
											?,
											'jpg,png',
											'jpg,png,gif,txt,pdf,xls,xlsx,doc,docx,zip,rar',
											'Washington, DC',
											0,
											'0000-00-00 00:00:00'
										)");
				$stmt->bind_param('sssss',
										$install,
										$siteName,
										$siteEmail,
										$saltCode,
										$userDocsPath
				);
				$stmt->execute();
				$stmt->close();

				$userEmail = htmlspecialchars($_POST['userEmail']);
				$password = htmlspecialchars($_POST['password']);
				$firstName = htmlspecialchars($_POST['firstName']);
				$lastName = htmlspecialchars($_POST['lastName']);

				// Encrypt Password
				$newPassword = encodeIt($password);
				
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

				// Add the new Admin Account
				$stmt = $mysqli->prepare("
									INSERT INTO
										users(
											superUser,
											userEmail,
											password,
											firstName,
											lastName,
											location,
											userFolder,
											userAvatar,
											joinDate,
											recEmails,
											isActive,
											hash,
											lastVisited,
											lastUpdated
										) VALUES (
											1,
											?,
											?,
											?,
											?,
											'Washington, DC',
											?,
											'userAvatar.png',
											?,
											1,
											1,
											?,
											'0000-00-00 00:00:00',
											'0000-00-00 00:00:00'
										)");
				$stmt->bind_param('sssssss',
									$userEmail,
									$newPassword,
									$firstName,
									$lastName,
									$usrDocsFolder,
									$todayDt,
									$hash
				);
				$stmt->execute();
				$stmt->close();

                if (is_file('../config.php')) {
					include ('../config.php');

					// Errors on for the Install
					error_reporting(E_ALL);
					ini_set('display_errors', '1');

                    // Get Settings Data
                    $settingsql  = "SELECT installUrl, siteName, siteEmail FROM sitesettings";
                    $settingres = mysqli_query($mysqli, $settingsql) or die('-2' . mysqli_error());
                    $set = mysqli_fetch_assoc($settingres);

                    // Get Admin Data
                    $adminsql  = "SELECT userEmail, firstName, lastName FROM users";
                    $adminres = mysqli_query($mysqli, $adminsql) or die('-3' . mysqli_error());
                    $admin = mysqli_fetch_assoc($adminres);

                    // Email out a confirmation
                    $siteName = $set['siteName'];
                    $siteEmail = $set['siteEmail'];
                    $installUrl = $set['installUrl'];
                    $userEmail = $admin['userEmail'];

                    $emailBody = "Congratulations, Passworx V3 has been successfully installed.

Your Admin Account details:
-------------------------------------
Login: ".$userEmail."
Password: The password you set up during Installation


For security reasons and to stop any possible re-installations please,
DELETE or RENAME the \"install\" folder, otherwise you will not be able
to sign in.

You can sign in to your Admin account at ".$installUrl."sign-in.php
after the install folder has been taken care of.

If you lose or forget your password, you can use the \"Reset Password\"
link located at ".$installUrl."sign-in.php

Thank you,
".$siteName."

This email was automatically generated.";

                    $subject = 'Passworx V3 Installation Successful';

                    $mail = mail($userEmail, $subject, $emailBody,
                    "From: ".$siteName." <".$siteEmail.">\r\n"
                    ."Reply-To: ".$siteEmail."\r\n"
                    ."X-Mailer: PHP/" . phpversion());
                }

				$step = '3';
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Passworx &middot; Installation &amp; Set Up</title>

	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/font.css">
	<link rel="stylesheet" href="../css/font-awesome.css">
	<link rel="stylesheet" href="../css/custom.css">
	<link rel="stylesheet" href="../css/styles.css">

	<!--[if lt IE 9]>
		<script src="../js/html5shiv.min.js"></script>
		<script src="../js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="signin-logo mt-20 mb-20 text-center">
					<a href="index.php"><img src="../images/email_logo.png" /></a>
				</div>
			</div>
		</div>
		
		<?php if ($step == '1') { ?>
			<p class="lead text-center">Four steps and generally less then 5 minutes. Ready? Set...</p>
		<?php } else if ($step == '3') { ?>
			<p class="lead text-center">Done! Get started using Passworx.</p>
		<?php } ?>
		
		<?php if ($msgBox) { echo $msgBox; } ?>
		
		<?php if ($step == 'check') { ?>

			<div class="panel panel-danger mt-10">
				<div class="panel-heading">Pre-Installation Check</div>
				<div class="panel-body">
					<p class="text-warning"><strong>Before we get started, we need to check that your server supports all needed functions to run Passworx.</strong></p>
					<table class="table">
						<tbody>
							<tr>
								<th style="width:33.333%;">PHP Version</th>
								<th class="text-center" style="width:33.333%;">Your Version</th>
								<th class="text-right" style="width:33.333%;">RESULT</th>
							</tr>
							<tr>
								<td data-th="PHP Version">V 5.3+ Required</td>
								<td class="text-center" data-th="Your Version"><?php echo $phpversion; ?></td>
								<td class="text-right" data-th="Pass / Fail"><?php echo $phpcheck; ?></td>
							</tr>
						</tbody>
					</table>

					<table class="table">
						<tr>
							<th style="width:50%;">PHP Base Functions</th>
							<th class="text-right" style="width:50%;">RESULT</th>
						</tr>
						<tr>
							<td>MySQLi Supported</td>
							<td class="text-right"><?php echo $mysqliver; ?></td>
						</tr>
						<tr>
							<td>mcrypt_encrypt Supported</td>
							<td class="text-right"><?php echo $hasmcrypt; ?></td>
						</tr>
						<tr>
							<td>PNG Image Support</td>
							<td class="text-right"><?php echo $haspng; ?></td>
						</tr>
						<tr>
							<td>CSV File Support</td>
							<td class="text-right"><?php echo $hascsv; ?></td>
						</tr>
					</table>

					<p class="text-warning">
						<strong>We also need to check that the main (where Passworx is uploaded), uploads and ads directories/folders are writeable (CHMOD numeric value 0755).</strong>
						<small class="text-muted">Network Solutions has some good info and instructions about CHMOD <a href="http://www.networksolutions.com/support/how-to-change-file-or-directory-permissions-via-ftp/" target="_blank">here</a>.</small>
					</p>

					<table class="table">
						<tr>
							<th style="width:50%;">Directory/Folder Name</th>
							<th class="text-right" style="width:50%;">RESULT</th>
						</tr>
						<tr>
							<td>Main Install Folder</td>
							<td class="text-right"><?php echo $hasMain; ?></td>
						</tr>
					</table>

					<?php if ($canInstall == 'true') { ?>
						<span class="pull-right">
							<form action="" method="post">
								<button type="input" name="submit" value="nextStep" class="btn btn-success btn-lg btn-icon mt-10"><i class="fa fa-check-square-o"></i> Go! Start the Installation</button>
							</form>
						</span>
					<?php
						} else {
							if ($svrErr == 'true') {
								echo '<div class="alert alert-warning" role="alert">Looks like your server configuration is not compatible with Passworx. Please contact your Web Host to see if they can help.</div>';
							}
							if ($folderErr == 'true') {
								echo '<div class="alert alert-warning" role="alert">Looks like one or more of the Directories/Folders is not writeable. Please CHMOD the directory to 0755 to continue the installation.</div>';
							}
						}
					?>
				</div>
			</div>

		<?php } else if ($step == '1') { ?>

			<div class="panel panel-danger mt-10">
				<div class="panel-heading">Step 1 <i class="fa fa-long-arrow-right"></i> Configure Database and Select Time Zone</div>
				<div class="panel-body">
					<?php if (isset($no_perm)) { ?>
						<p class="lead">
							You haven't the permissions to create a new file. Please CHMOD the root folder to 755 and then <a href="install.php">refresh this page</a>.<br />
							Not sure how? There are many <a href="https://www.google.com/search?q=how+to+cmod&ie=utf-8&oe=utf-8" target="_blank">tutorials on the web</a> that explain this in detail.
						</p>
						<a href="install.php" class="btn btn-primary">Refreash Page</a>
					<?php } elseif (!$file) { ?>
						<p class="lead">Please type in your database information &amp; select a Time Zone.</p>
						<form action="" method="post" class="mt-10">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="dbhost">Host Name</label>
										<input type="text" class="form-control" name="dbhost" required="required" value="localhost" />
										<span class="help-block">Usually 'localhost'. Check with your Host Provider.</span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="dbname">Database Name</label>
										<input type="text" class="form-control" name="dbname" required="required" value="<?php echo isset($_POST['dbname']) ? $_POST['dbname'] : '' ?>" />
										<span class="help-block">The Database Name you want to use for Passworx.</span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="dbuser">Database Username</label>
										<input type="text" class="form-control" name="dbuser" required="required" value="<?php echo isset($_POST['dbuser']) ? $_POST['dbuser'] : '' ?>" />
										<span class="help-block">The User allowed to connect to the Database.</span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="dbpass">Database User Password</label>
										<input type="text" class="form-control" name="dbpass" value="<?php echo isset($_POST['dbpass']) ? $_POST['dbpass'] : '' ?>" />
										<span class="help-block">The Password for the User allowed to connect to the Database.</span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="timezone">Select Time Zone</label>
								<select class="form-control" name="timezone">
									<option value="Pacific/Midway">(GMT-11:00) Midway Island, Samoa</option>
									<option value="America/Adak">(GMT-10:00) Hawaii-Aleutian</option>
									<option value="Etc/GMT+10">(GMT-10:00) Hawaii</option>
									<option value="Pacific/Marquesas">(GMT-09:30) Marquesas Islands</option>
									<option value="Pacific/Gambier">(GMT-09:00) Gambier Islands</option>
									<option value="America/Anchorage">(GMT-09:00) Alaska</option>
									<option value="America/Ensenada">(GMT-08:00) Tijuana, Baja California</option>
									<option value="Etc/GMT+8">(GMT-08:00) Pitcairn Islands</option>
									<option value="America/Los_Angeles">(GMT-08:00) Pacific Time (US & Canada)</option>
									<option value="America/Denver">(GMT-07:00) Mountain Time (US & Canada)</option>
									<option value="America/Chihuahua">(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
									<option value="America/Dawson_Creek">(GMT-07:00) Arizona</option>
									<option value="America/Belize">(GMT-06:00) Saskatchewan, Central America</option>
									<option value="America/Cancun">(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
									<option value="Chile/EasterIsland">(GMT-06:00) Easter Island</option>
									<option value="America/Chicago">(GMT-06:00) Central Time (US & Canada)</option>
									<option value="America/New_York" selected>(GMT-05:00) Eastern Time (US & Canada)</option>
									<option value="America/Havana">(GMT-05:00) Cuba</option>
									<option value="America/Bogota">(GMT-05:00) Bogota, Lima, Quito, Rio Branco</option>
									<option value="America/Caracas">(GMT-04:30) Caracas</option>
									<option value="America/Santiago">(GMT-04:00) Santiago</option>
									<option value="America/La_Paz">(GMT-04:00) La Paz</option>
									<option value="Atlantic/Stanley">(GMT-04:00) Faukland Islands</option>
									<option value="America/Campo_Grande">(GMT-04:00) Brazil</option>
									<option value="America/Goose_Bay">(GMT-04:00) Atlantic Time (Goose Bay)</option>
									<option value="America/Glace_Bay">(GMT-04:00) Atlantic Time (Canada)</option>
									<option value="America/St_Johns">(GMT-03:30) Newfoundland</option>
									<option value="America/Araguaina">(GMT-03:00) UTC-3</option>
									<option value="America/Montevideo">(GMT-03:00) Montevideo</option>
									<option value="America/Miquelon">(GMT-03:00) Miquelon, St. Pierre</option>
									<option value="America/Godthab">(GMT-03:00) Greenland</option>
									<option value="America/Argentina/Buenos_Aires">(GMT-03:00) Buenos Aires</option>
									<option value="America/Sao_Paulo">(GMT-03:00) Brasilia</option>
									<option value="America/Noronha">(GMT-02:00) Mid-Atlantic</option>
									<option value="Atlantic/Cape_Verde">(GMT-01:00) Cape Verde Is.</option>
									<option value="Atlantic/Azores">(GMT-01:00) Azores</option>
									<option value="Europe/Belfast">(GMT) Greenwich Mean Time : Belfast</option>
									<option value="Europe/Dublin">(GMT) Greenwich Mean Time : Dublin</option>
									<option value="Europe/Lisbon">(GMT) Greenwich Mean Time : Lisbon</option>
									<option value="Europe/London">(GMT) Greenwich Mean Time : London</option>
									<option value="Africa/Abidjan">(GMT) Monrovia, Reykjavik</option>
									<option value="Europe/Amsterdam">(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>
									<option value="Europe/Belgrade">(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>
									<option value="Europe/Brussels">(GMT+01:00) Brussels, Copenhagen, Madrid, Paris</option>
									<option value="Africa/Algiers">(GMT+01:00) West Central Africa</option>
									<option value="Africa/Windhoek">(GMT+01:00) Windhoek</option>
									<option value="Asia/Beirut">(GMT+02:00) Beirut</option>
									<option value="Africa/Cairo">(GMT+02:00) Cairo</option>
									<option value="Asia/Gaza">(GMT+02:00) Gaza</option>
									<option value="Africa/Blantyre">(GMT+02:00) Harare, Pretoria</option>
									<option value="Asia/Jerusalem">(GMT+02:00) Jerusalem</option>
									<option value="Europe/Minsk">(GMT+02:00) Minsk</option>
									<option value="Asia/Damascus">(GMT+02:00) Syria</option>
									<option value="Europe/Moscow">(GMT+03:00) Moscow, St. Petersburg, Volgograd</option>
									<option value="Africa/Addis_Ababa">(GMT+03:00) Nairobi</option>
									<option value="Asia/Tehran">(GMT+03:30) Tehran</option>
									<option value="Asia/Dubai">(GMT+04:00) Abu Dhabi, Muscat</option>
									<option value="Asia/Yerevan">(GMT+04:00) Yerevan</option>
									<option value="Asia/Kabul">(GMT+04:30) Kabul</option>
									<option value="Asia/Yekaterinburg">(GMT+05:00) Ekaterinburg</option>
									<option value="Asia/Tashkent">(GMT+05:00) Tashkent</option>
									<option value="Asia/Kolkata">(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
									<option value="Asia/Katmandu">(GMT+05:45) Kathmandu</option>
									<option value="Asia/Dhaka">(GMT+06:00) Astana, Dhaka</option>
									<option value="Asia/Novosibirsk">(GMT+06:00) Novosibirsk</option>
									<option value="Asia/Rangoon">(GMT+06:30) Yangon (Rangoon)</option>
									<option value="Asia/Bangkok">(GMT+07:00) Bangkok, Hanoi, Jakarta</option>
									<option value="Asia/Krasnoyarsk">(GMT+07:00) Krasnoyarsk</option>
									<option value="Asia/Hong_Kong">(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi</option>
									<option value="Asia/Irkutsk">(GMT+08:00) Irkutsk, Ulaan Bataar</option>
									<option value="Australia/Perth">(GMT+08:00) Perth</option>
									<option value="Australia/Eucla">(GMT+08:45) Eucla</option>
									<option value="Asia/Tokyo">(GMT+09:00) Osaka, Sapporo, Tokyo</option>
									<option value="Asia/Seoul">(GMT+09:00) Seoul</option>
									<option value="Asia/Yakutsk">(GMT+09:00) Yakutsk</option>
									<option value="Australia/Adelaide">(GMT+09:30) Adelaide</option>
									<option value="Australia/Darwin">(GMT+09:30) Darwin</option>
									<option value="Australia/Brisbane">(GMT+10:00) Brisbane</option>
									<option value="Australia/Hobart">(GMT+10:00) Hobart</option>
									<option value="Asia/Vladivostok">(GMT+10:00) Vladivostok</option>
									<option value="Australia/Lord_Howe">(GMT+10:30) Lord Howe Island</option>
									<option value="Etc/GMT-11">(GMT+11:00) Solomon Is., New Caledonia</option>
									<option value="Asia/Magadan">(GMT+11:00) Magadan</option>
									<option value="Pacific/Norfolk">(GMT+11:30) Norfolk Island</option>
									<option value="Asia/Anadyr">(GMT+12:00) Anadyr, Kamchatka</option>
									<option value="Pacific/Auckland">(GMT+12:00) Auckland, Wellington</option>
									<option value="Etc/GMT-12">(GMT+12:00) Fiji, Kamchatka, Marshall Is.</option>
									<option value="Pacific/Chatham">(GMT+12:45) Chatham Islands</option>
									<option value="Pacific/Tongatapu">(GMT+13:00) Nuku'alofa</option>
									<option value="Pacific/Kiritimati">(GMT+14:00) Kiritimati</option>
								</select>
							</div>
							<span class="pull-right">
								<button type="input" name="submit" value="On to Step 2" class="btn btn-success btn-lg btn-icon mt-10"><i class="fa fa-check-square-o"></i> On to Step 2</button>
							</span>
						</form>
					<?php } else { ?>
						<div class="alertMsg danger">
							<i class='fa fa-times-circle'></i> Your database information is incorrect. Please delete the generated <strong>config.php</strong> file (in the main folder) and then <a href="install.php">refresh this page</a>.
						</div>
					<?php } ?>
				</div>
			</div>
		<?php
			} else if ($step == '2') {
				include('../config.php');

				// Errors on for the Install
				error_reporting(E_ALL);
				ini_set('display_errors', '1');

				$isSetup = '';

				// Check for Data
				if ($result = $mysqli->query("SELECT * FROM sitesettings LIMIT 1")) {
					if ($obj = $result->fetch_object()) {
						$isSetup = 'true';
					}
					$result->close();
				}

				if($isSetup == '') {

				// Get the install URL
				$siteURL = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
				$installURL = str_replace("install/install.php", "", $siteURL);
		?>
				<div class="alertMsg success">
					<div class="msgIcon pull-left">
						<i class="fa fa-check-square-o"></i>
					</div>
					Your database has been correctly configured.
				</div>

				<div class="panel panel-danger mt-10">
					<div class="panel-heading">Step 2 <i class="fa fa-long-arrow-right"></i> Global Settings</div>
					<div class="panel-body">
						<p class="lead">Now take a few minutes and complete the information below in order to finish installing Passworx.</p>
						<form action="" method="post">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="installUrl">Installation URL</label>
										<input type="text" class="form-control" name="installUrl" required="required" value="<?php echo $installURL; ?>" />
										<span class="help-block">Used in Notification emails. Must include the trailing slash. Change the default value if it is not correct.</span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="siteName">Site Name</label>
										<input type="text" class="form-control" name="siteName" required="required" value="<?php echo isset($_POST['siteName']) ? $_POST['siteName'] : ''; ?>" />
										<span class="help-block">ie. Passworx (Appears at the top of the browser, the header logo, in the footer and in other headings throughout the site).</span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="siteEmail">Site Email</label>
								<input type="email" class="form-control" name="siteEmail" required="required" value="<?php echo isset($_POST['siteEmail']) ? $_POST['siteEmail'] : ''; ?>" />
								<span class="help-block">Used in email notifications as the "from/reply to" email address.</span>
							</div>

							<p class="lead">Finally, set up the Primary Admin Account.</p>

							<div class="adminNote highlight"></div>
							<div class="form-group">
								<label for="userEmail">Administrator's Email</label>
								<input type="email" class="form-control" name="userEmail" required="required" value="<?php echo isset($_POST['userEmail']) ? $_POST['userEmail'] : ''; ?>" />
								<span class="help-block">Your email address is also used for your Account log In.</span>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="firstName">Administrator's First Name</label>
										<input type="text" class="form-control" name="firstName" required="required" value="<?php echo isset($_POST['firstName']) ? $_POST['firstName'] : ''; ?>" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="lastName">Administrator's Last Name</label>
										<input type="text" class="form-control" name="lastName" required="required" value="<?php echo isset($_POST['lastName']) ? $_POST['lastName'] : ''; ?>" />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="password">Administrator's Password</label>
										<input type="text" class="form-control" name="password" required="required" value="" />
										<span class="help-block">Type a Password for your Account.</span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="r-password">Re-type Administrator's Password</label>
										<input type="text" class="form-control" name="r-password" required="required" value="" />
										<span class="help-block">Please type your desired Password again. Passwords MUST Match.</span>
									</div>
								</div>
							</div>
							<span class="pull-right">
								<input name="installationSalt" value="<?php echo $installSalt; ?>" type="hidden">
								<button type="input" name="submit" value="Complete Install" class="btn btn-success btn-lg btn-icon mt-10"><i class="fa fa-check-square-o"></i> Complete Install</button>
							</span>
						</form>
					</div>
				</div>

			<?php } else { ?>
				<div class="alertMsg success">
					<div class="msgIcon pull-left">
						<i class="fa fa-check-square-o"></i>
					</div>
					Done! Installation Complete
				</div>

				<div class="panel panel-danger">
					<div class="panel-heading">Step 3 <i class="fa fa-long-arrow-right"></i> Passworx Installation Complete</div>
					<div class="panel-body">
						<div class="alertMsg info">
							<div class="msgIcon pull-left">
								<i class="fa fa-info-circle"></i>
							</div>
							Whoops! Looks like the <strong>"install"</strong> folder is still there!
						</div>
						<p class="lead">
							For security reasons and to stop any possible re-installations please, <strong>DELETE or RENAME</strong> the "install" folder,
							otherwise you will not be able to sign in.
						</p>
						<div class="alertMsg warning">
							<div class="msgIcon pull-left">
								<i class="fa fa-times-circle"></i>
							</div>
							Please <strong>DELETE or RENAME</strong> the "install" folder.
						</div>
						<a href="../sign-in.php" class="btn btn-info btn-icon mt-10 mb-20"><i class="fa fa-sign-in"></i> Sign In</a>
					</div>
				</div>
			<?php } ?>
		<?php } else { ?>
			<div class="alertMsg success">
				<div class="msgIcon pull-left">
					<i class="fa fa-check-square-o"></i>
				</div>
				Done! Installation Complete
			</div>

			<div class="panel panel-danger">
				<div class="panel-heading">Step 3 <i class="fa fa-long-arrow-right"></i> Passworx Installation Complete</div>
				<div class="panel-body">
					<p class="lead">
						For security reasons and to stop any possible re-installations please, <strong>DELETE or RENAME</strong> the "install" folder,
						otherwise you will not be able to sign in.
						<br />
						A confirmation email has been sent to the email address you supplied for the Primary Administrator.
					</p>
					<div class="alertMsg warning">
						<div class="msgIcon pull-left">
							<i class="fa fa-times-circle"></i>
						</div>
						Please <strong>DELETE or RENAME</strong> the "install" folder.
					</div>
					<a href="../sign-in.php" class="btn btn-info btn-icon mt-10 mb-20"><i class="fa fa-sign-in"></i> Sign In</a>
				</div>
			</div>
		<?php } ?>
	
	</div>

</body>
</html>