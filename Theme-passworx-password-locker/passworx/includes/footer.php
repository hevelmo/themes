	</div>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<?php if (isset($dataTables)) { echo '<script type="text/javascript" src="js/dataTables.js"></script>'; } ?>
	<?php if (isset($jsFile)) { echo '<script type="text/javascript" src="js/includes/'.$jsFile.'.js"></script>'; } ?>
	<script src="js/custom.js"></script>
</body>
</html>