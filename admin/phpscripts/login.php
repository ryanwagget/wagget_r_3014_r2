<?php

   function logIn($username, $password, $ip)
   {
     require_once('connect.php');
     $username = mysqli_real_escape_string($link, $username); // mysqli_real_escape_string to stop sql injections
     $password = mysqli_real_escape_string($link, $password);
     $encryptPass = md5($password);
     $loginstring = "SELECT * FROM tbl_user WHERE user_name = '{$username}' AND user_pass = '{$encryptPass}'"; //usrname & password from the database, puts it in loginstring
     $user_set = mysqli_query($link, $loginstring);

     if(mysqli_num_rows($user_set)){
       $found_user = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
       $id = $found_user['user_id'];
       $_SESSION['user_id'] = $id; // sessions can't be saved or cashed, deleted on page close. Temp file.
       $_SESSION['user_name'] = $found_user['user_fname'];
       //$_SESSION['final_login'] = $found_user['user_lastLog'];

       if(mysqli_query($link, $loginstring))
       {
         $updatestring = "UPDATE tbl_user SET user_ip = '{$ip}' WHERE user_id={$id}";
         $updateLastLog = "UPDATE tbl_user SET user_lastLog = NOW() WHERE user_id = {$id}";
         $updatequery = mysqli_query($link, $updatestring);
         $updatequery2 = mysqli_query($link, $updateLastLog);//DELETE OR NO????????????

         $firstLog = $found_user['user_firstLog'];
         $_SESSION['user_firstLog'] = $firstLog;

         if($firstLog === "no")
         {
         redirect_to('admin_index.php');
         }else if($firstLog === 'yes')
         {
         redirect_to("admin_edituser.php");
         }

       } // updates the ip in the database.
      //redirect_to("admin_index.php");
    }else{
      $message = "Username and or password is incorrect";
      return $message;
    }

     mysqli_close($link);
 }
?>
