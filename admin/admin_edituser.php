<?php

//ini_set('display_errors',1);
//error_reporting(E_ALL);
	require_once('phpscripts/config.php');
	//confirm_logged_in();

	$id = $_SESSION['user_id'];
	$tbl = "tbl_user";
	$col = "user_id";
	$popForm = getSingle($tbl, $col, $id);
	$info = mysqli_fetch_array($popForm);
	//echo $info;

	if(isset($_POST['submit'])){
		$fname = trim($_POST['fname']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$email = trim($_POST['email']);
		$result = editUser($fname, $username, $password, $email, $id);
		$message = $result;
	}
?>
<!doctype html>
<html>
<head>
<link rel="stylesheet" href="css/editUser.css">
<meta charset="UTF-8">
<title>Edit User</title>
</head>
<body>
	<h2>Edit User</h2>
	<?php if(!empty($message)){echo $message;} ?>
	<form action="admin_edituser.php" method="post">
		<label>First Name:</label>
			<input type="text" name="fname" poster="" value="<?php echo $info['user_fname']; ?>"><br><br>
		<label>Username:</label>
			<input type="text" name="username" poster="" value="<?php echo $info['user_name']; ?>"><br><br>
		<label>Password:</label>
			<input type="text" name="password" poster="" value="<?php echo $info['user_pass']; ?>"><br><br>
		<label>Email:</label>
			<input type="text" name="email" poster="" value="<?php echo $info['user_email']; ?>"><br><br>
		<input type="submit" name="submit" value="Edit Account"><br><br>
	</form>
</body>
</html>
