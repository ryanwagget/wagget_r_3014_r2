<?php
//ini_set('display_errors',1);
//error_reporting(E_ALL);


	require_once('phpscripts/config.php');
	confirm_logged_in();


	//so my idea here was that if the current time equaled the time created+72 hours, then the submit button would redirect the user to admin_locked.php instead of admin_index.php
	// $time = time()
	// $maxTime = 2*24*60*60;
	// if(($time - $timestamp) > $maxTime)
	// {
	// 	//echo "You've taken too long. You've been locked out.";
	// 	redirect_to("admin_locked.php");
	// }

	if(isset($_POST['submit']))
	{
		$fname = trim($_POST['fname']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$email = trim($_POST['email']);
		$lvllist = $_POST['lvllist'];
		if(empty($lvllist))
			{
				$message = "Please select a user level";
			}else{
				$sendMail = sendMail($email, $username, $password);
				$result = createUser($fname, $username, $password, $email, $lvllist);
				$message = $result;
			}
	}
	//echo $encrypt;
?>
<!doctype html>
<html>
<head>
<link rel="stylesheet" href="css/createUser.css">
<meta charset="UTF-8">
<title>Welcome to our admin panel login</title>
</head>
<body>
	<h2>Create User</h2>
	<?php if(!empty($message)){echo $message;} ?>
	<form action="admin_createuser.php" method="post">
			<input type="text" name="fname" value="" placeholder="First Name"><br><br>
			<input type="text" name="username" value="" placeholder="Username"><br><br>
			<input type="text" name="password" value="" placeholder="Password"><br><br>
			<input type="text" name="email" value="" placeholder="Email"><br><br>
		<select name="lvllist">
			<option value="">Select User Level</option><br><br>
			<option value="2">Web Admin</option><br><br>
			<option value="1">Web Master</option><br><br>
		</select>
		<input type="submit" name="submit" value="Create User"><br><br>
	</form>
</body>
</html>
