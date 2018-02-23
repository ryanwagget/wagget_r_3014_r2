<?php

function sendMail($email, $username, $password)
{
  $to = $email;
  $subject = "Login Information";
  $msg = "Your Username". $username. "\n\nPassword:". $password. "\n\nLogin Here:http://localhost:8888/wagget_r_3014_r2/admin/admin_createuser.php";
  mail($to, $subject, $msg);
  echo"We've sent you an email with your account information! Go look!";
}


 ?>
