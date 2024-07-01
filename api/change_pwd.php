<?php
	include './config.php';
	header('Access-Control-Allow-Origin:*');
	session_start();
	if (isset($_POST['current']) AND !empty($_POST['current']) AND isset($_POST['newpassword']) AND !empty($_POST['newpassword']) AND isset($_SESSION["id"])) {
		
		$newpassword=mysqli_real_escape_string($c,$_POST['newpassword']);
		$current=md5(mysqli_real_escape_string($c,$_POST['current']));
		$pwd=md5($newpassword);
		$id=$_SESSION["id"];
		if (strlen($newpassword) >= 8) {
			$query=mysqli_query($c,"SELECT * FROM admin WHERE password='$current' AND id='$id'");
		if ($query) {
			if (mysqli_num_rows($query) > 0) {
				$update=mysqli_query($c,"UPDATE admin SET password='$pwd' WHERE id='$id'");
				if ($update) {
					echo "succeed";
				}else{
					echo "Error";
				}
			}else{
				echo "The Entered Current Password Is Incorrect";
			}
		}
		}else{
			echo "The new password must be at least 8 caracters";
		}
	} else {
		echo "Please contact the developper";
	}
	
?>