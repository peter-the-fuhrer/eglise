<?php
require './config.php';
header('Access-Control-Allow-Origin:*');
session_start();
if (isset($_SESSION["id"])) {
	if (isset($_POST['url']) AND !empty($_POST['url']) AND isset($_POST['content']) AND !empty($_POST['content']) AND isset($_POST['title']) OR isset($_FILES['file']) AND !empty($_POST['title'])  OR !empty($_FILES['file'])) {
		$content=mysqli_real_escape_string($c,$_POST['content']);
		$title=mysqli_real_escape_string($c,$_POST['title']);
		$url=mysqli_real_escape_string($c,$_POST['url']);
		$date=date('d/m/Y');
		$img_name=$_FILES['file']['name'];
		$img_tmp=$_FILES['file']['tmp_name'];
		$fid=md5(sha1($img_name.$title.$date.$content));
	
					$file_ext=strrchr($img_name, '.');
					$allowed_ext=[".png",'.jpg','.PNG','.JPG','.gif','.GIF','.jpeg','.JPEG','.webp','.WEBP'];
					if (in_array($file_ext, $allowed_ext)) {
						if (move_uploaded_file($img_tmp, '../photo/'.$img_name)) {
						$in=$fid.$file_ext;
						rename('../photo/'.$img_name, '../photo/'.$fid.$file_ext);
	
						$sql=mysqli_query($c, "INSERT INTO event (title,img,youtube_url,content,date) VALUES ('$title','$in','$url','$content','$date')");
						if ($sql) {
							echo "succeed";
						} else {
							echo "Query Error Contact The Developer 0";
						}
						
						} else {
							echo "Error Contact The developper 1";
						}
						
					}else{
						echo "Only Photo Are Allowed";
					}
	}else{
		echo 'Please contact the developper';
	}
}
?>