<!DOCTYPE html>
<html>
<head>
	<title>Reset Wordpress</title>
</head>
<body>

	<?php
		include "wp-config.php";
		
		if (isset($_POST['reset'])) {
			system('mysql -u '.DB_USER.' -p'.DB_PASSWORD.' --execute="drop database wp; create database wp;"');
			echo system('mysql -u '.DB_USER.' -p'.DB_PASSWORD.' '.DB_NAME.' < wp.sql');
			system("rm -fr wp-content/plugins/*");
			system("rm -fr wp-content/uploads/*");
			echo '<script>alert("wordpress has been reset")</script>';
		}
	?>

	<center>
		<h3>Reset Wordpress </h3>
		<form action="" method="post">
			<button type="submit" name="reset" onclick="return confirm('reset now?')">Reset Now!</button>
		</form>
	</center>

</body>
</html>