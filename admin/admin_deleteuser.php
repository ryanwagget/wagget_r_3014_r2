<?php
	require_once('phpscripts/config.php');
	//confirm_logged_in();

	$tbl = "tbl_user";
	$users = getAll($tbl);
?>
<!doctype html>
<html>
<head>
<link rel="stylesheet" href="css/deleteuser.css">
<meta charset="UTF-8">
<title>Welcome to our admin panel login</title>
</head>
<body>
	<h2>Please choose a user to delete</h2>
	<?php
		while($row = mysqli_fetch_array($users))
		{
			echo "{$row['user_fname']}<a href=\"phpscripts/caller.php?caller_id=delete&id={$row['user_id']}\">Remove</a><br>";
		}
	?>
</body>
</html>
