<?php
	// Get Settings Data
	$setSql = "SELECT * FROM sitesettings";
	$setRes = mysqli_query($mysqli, $setSql) or die('-99'.mysqli_error());
?>