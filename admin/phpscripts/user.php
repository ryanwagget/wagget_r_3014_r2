<?php

function createUser($fname, $username, $password, $email, $lvllist)
{
  include('connect.php');
  $encrypt = md5($password);
  $userstring = "INSERT INTO tbl_user VALUES(NULL, '{$fname}', '{$username}', '{$encrypt}', '{$email}',  NULL, '{$lvllist}', 'no', NULL)";
  //echo $userstring;
  $userquery = mysqli_query($link, $userstring);
  if($userquery)
  {
    redirect_to('admin_index.php');
  }else{
    $message = "User was unable to be created";
    return $message;
  }
  mysqli_close($link);
}

 ?>
