<?php
	// If you use an SSL Certificate - HTTPS://
	// Uncomment (remove the double slashes) from lines 5 - 9
	// ************************************************************************
	//if (!isset($_SERVER["HTTPS"]) && strtolower($_SERVER["HTTPS"]) != "on") {
	//	$url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	//	header("Location: $url");
	//	exit;
	//}

	$dashNav = $catsNav = $mngNav = '';
	if (isset($dashPage)) { $dashNav = 'active'; } else { $dashNav = ''; }
	if (isset($catsPage)) { $catsNav = 'active'; } else { $catsNav = ''; }
	if (isset($mngPage)) { $mngNav = 'active'; } else { $mngNav = ''; }

	// Get Category List for the logged in User
	$cats = "SELECT catId, catTitle FROM categories WHERE userId = ".$pw_userId;
	$catsres = mysqli_query($mysqli, $cats) or die('Header Error: Category list' . mysqli_error());
	$catttl = mysqli_num_rows($catsres);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?php echo $set['siteName']; ?> &middot; <?php echo $pageTitle; ?></title>

	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/font.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<?php if (isset($addCss)) { echo $addCss; } ?>
	<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="css/styles.css">

	<!--[if lt IE 9]>
		<script src="js/html5shiv.min.js"></script>
		<script src="js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-collapse" aria-expanded="false">
					<span class="sr-only"><?php echo $toggleNavText; ?></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				
				<a class="navbar-logo" href=""><img alt="<?php echo $set['siteName']; ?>" src="images/logo.png" /></a>
			</div>

			<div class="collapse navbar-collapse" id="nav-collapse">
				<ul class="nav navbar-nav">
					<li class="<?php echo $dashNav; ?>"><a href="index.php"><?php echo $dashboardNavLink; ?></a></li>
					<li class="dropdown <?php echo $catsNav; ?>">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $catNavLink; ?> <i class="fa fa-angle-down"></i></a>
						<ul class="dropdown-menu">
							<?php
								if ($catttl > 0) {
									while ($catsrow = mysqli_fetch_assoc($catsres)) {
										echo '<li><a href="index.php?page=viewCategory&catId='.$catsrow['catId'].'">'.$catsrow['catTitle'].'</a></li>';
									}
								} else {
									echo '<li><a href="index.php?page=newCategory">'.$newCatNavLink.'</a></li>';
								}
							?>
						</ul>
					</li>
					<?php if ($pw_superUser != '') { ?>
						<li class="dropdown <?php echo $mngNav; ?>">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $manageNavLink; ?> <i class="fa fa-angle-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="index.php?page=users"><?php echo $usersNavLink; ?></a></li>
								<li><a href="index.php?page=newUser"><?php echo $newUserNavLink; ?></a></li>
								<li><a href="index.php?page=activityLogs"><?php echo $actLogsNavLink; ?></a></li>
								<li><a href="index.php?page=siteSettings"><?php echo $siteSetNavLink; ?></a></li>
							</ul>
						</li>
					<?php } ?>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.php?page=newCategory" class="btn btn-primary"><?php echo $newCatNavLink; ?></a></li>
					<li><a href="index.php?page=newEntry" class="btn btn-success"><?php echo $newEntryNavLink; ?></a></li>
					<li><a href="index.php?page=myProfile"><?php echo $profileNavLink; ?></a></li>
					<li data-toggle="tooltip" data-placement="bottom" title="Sign Out"><a data-toggle="modal" href="#signOut"><i class="fa fa-sign-out"></i></a></li>
				</ul>
			</div>
		</div>
	</nav>
	
	<div class="modal fade" id="signOut" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<form action="" method="post">
					<div class="modal-body">
						<p class="lead"><?php echo $pw_firstName.$logoutConfirmationMsg; ?></p>
					</div>
					<div class="modal-footer">
						<a href="index.php?action=logout" class="btn btn-success btn-icon-alt"><?php echo $signOutConfBtn; ?> <i class="fa fa-sign-out"></i></a>
						<button type="button" class="btn btn-warning btn-icon" data-dismiss="modal"><i class="fa fa-times-circle-o"></i> <?php echo $cancelBtn; ?></button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<div class="container main-content mb-20">