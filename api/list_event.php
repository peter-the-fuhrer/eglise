<?php 
require './config.php';
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: GET, POST');
session_start();
if (isset($_GET['start'])) {
	$start=mysqli_real_escape_string($c,intval($_GET['start']));
	$last=$start+5;
	$query=mysqli_query($c,"SELECT * FROM event WHERE  id < '$start' ORDER BY id DESC  LIMIT 0,6");
if ($query) {
	if (mysqli_num_rows($query)>0) {
		$data=array();
		while ($list=mysqli_fetch_assoc($query)) {
			$data[]=$list;
		}
		echo json_encode($data);
	}else{
		echo "end";
	}
	}else{
		echo "Error Query";
	}
	} else {
		$query=mysqli_query($c,'SELECT * FROM event ORDER BY id DESC LIMIT 0,6 ');
	if ($query) {
		if (mysqli_num_rows($query)>0) {
			$data=array();
			while ($list=mysqli_fetch_assoc($query)) {
				$data[]=$list;
			}
			echo json_encode($data);
		}else{
			echo "empty";
		}
	}else{
		echo "Error Query";
	}
	}


?>