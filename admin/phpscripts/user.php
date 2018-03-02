<?php

function createUser($fname, $username, $password, $email, $lvllist)
{
  include('connect.php');
  $date = "NULL";
  $encrypt = md5($password);
  $userstring = "INSERT INTO tbl_user VALUES(NULL, '{$fname}', '{$username}', '{$encrypt}', '{$email}',  '{$date}', '{$lvllist}', 'no', NULL, 'yes')";
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

function editUser($fname, $username, $encrypt, $email, $id) {
		include('connect.php');
		$updatestring = "UPDATE tbl_user SET user_fname = '{$fname}', user_name = '{$username}', user_pass = '{$encrypt}', user_email = '{$email}', user_firstLog = 'no' WHERE user_id = '{$id}'";
		//echo $updatestring;
		$updatequery = mysqli_query($link, $updatestring);
		if($updatestring)
    {
			redirect_to("admin_index.php");
		}else{
			$message = "There was a problem changing your information, please fix it.";
			return $message;
		}
		mysql_close($link);
	}

	function deleteUser($id) {
		// echo $id;
		include('connect.php');
		$delstring = "DELETE FROM tbl_user WHERE user_id = {$id}";
		$delquery = mysqli_query($link, $delstring);
		if($delquery){
			redirect_to("../admin_index.php");
		}else{
			$message = "User has been deleted.";
			return $message;
		}

		mysqli_close($link);
	}
 ?>
