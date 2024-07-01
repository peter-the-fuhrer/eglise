<?php
require 'config.php';
header('Access-Control-Allow-Origin:*');
session_start();
if (isset($_POST['username']) AND isset($_POST['password']) AND !empty($_POST['username'])  AND !empty($_POST['password'])) {
	$username=mysqli_real_escape_string($c,$_POST['username']);
	$pass=md5(mysqli_real_escape_string($c,$_POST['password']));
	$query=mysqli_query($c,"SELECT * FROM admin WHERE username='$username' AND password='$pass'");
		if ($query) {
			if (mysqli_num_rows($query)>0) {
				while ($row=mysqli_fetch_assoc($query)) {
					
					$_SESSION["id"]=$row['id'];
					$data=array('id' => $row['id'],'status'=>'Connected' );
					echo json_encode($data);
				}
			}else{
					$data=array('status'=>'Check Your Username And Password' );
					echo json_encode($data);
			}
		}else{
				$data=array('status'=>'Q1 Please contact the developper' );
				echo json_encode($data);
		}
		

}else{
		$data=array('status'=>'Please contact the developper' );
		echo json_encode($data);
}
?>