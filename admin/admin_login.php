<?php
   //ini_set('display_errors',1);
   //error_reporting(E_ALL);

   require_once('phpscripts/config.php');
   $ip = $_SERVER['REMOTE_ADDR']; // gets the ip address of the computer accessing
   //echo $ip;
   if(isset($_POST['submit'])){
     $username = trim($_POST['username']); //trim removes the 'whitespace' aka spaces at the start or end of the username; might be there if copy/pasted in
     $password = trim($_POST['password']);
     if($username !== "" && $password !== ""){ //!== "" means not exactly equal to, so they have to put in a password/username
       $result = logIn($username, $password, $ip);
       $message = $result;
     }else{
       $message = "Please fill in the required fields.";
     }
   }
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/login.css">
<title>CMS Portal Login</title>
</head>
<body>
  <h1>Welcome to The Movie Database!</h1>
  <?php if(!empty($message)){echo $message;}?>
  <form action="admin_login.php" method="post">
    <input id="username" type="text" name="username" placeholder="Username">
    <br>
    <input id="password" type="password" name="password" placeholder="Password">
    <br>
    <input id="submit" type="submit" name="submit" value="Log in!">
  </form>
</body>
</html>
