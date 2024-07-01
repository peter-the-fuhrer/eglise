<?php 
require './config.php';
header('Access-Control-Allow-Origin:*');
session_start();
if (isset($_SESSION["id"])) {
	if (isset($_GET['event_id']) AND !empty($_GET['event_id']) AND isset($_GET['event_img']) AND !empty($_GET['event_img'])) {
		$del_id=mysqli_real_escape_string($c,$_GET['event_id']);
		$query=mysqli_query($c,"DELETE FROM event WHERE id='$del_id'");
		if ($query) {
				echo 'deleted';
				if ($_GET['event_img']!="none") {
					
				unlink('../photo/'.$_GET['event_img']);
				header("location:../dashboard.php");
				}
			}else{
				echo "failed query";
			}
		}else{
			echo "Please contact the developper";
		}
}

?>