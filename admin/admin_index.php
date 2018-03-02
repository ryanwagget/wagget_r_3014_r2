<?php
   ini_set('display_errors',1);
   error_reporting(E_ALL);

   require_once('phpscripts/config.php');
   confirm_logged_in();
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/main.css">
<title>CMS Portal Login</title>
</head>
<body>
  <h1>Welcome to The Admin Page!</h1>

  <?php
  date_default_timezone_set("America/Toronto");
  $hour = date('H');
  if ($hour >= 05 && $hour <= 11)
  {
    echo "<h2> {$_SESSION['user_name']}</h2>";
  }else if ( $hour >= 12 || $hour <= 18)
  {
    echo "<h2>Good afternoon {$_SESSION['user_name']}!</h2>";
  }else if ( $hour >= 19 || $hour <= 04)
  {
    echo "<h2>Go to bed {$_SESSION['user_name']}!</h2>";
  }
  ?>

  <?php echo "<p>Your final login: {$_SESSION['user_lastLog']}</p>"; ?>

  <a id="hi" href="admin_createuser.php">Create User</a>
  <a href="admin_edituser.php">Edit User</a>
	<a href="admin_deleteuser.php">Delete User</a>
	<a href="phpscripts/caller.php?caller_id=logout">Sign Out</a>
</body>
</html>
