<?php
	include '../config.php';
	header('Access-Control-Allow-Origin:*');
	if (isset($_FILES['newprofil']) AND isset($_POST['id']) AND !empty($_FILES['newprofil']) AND !empty($_POST['id']) AND isset($_POST['img']) AND !empty($_POST['img'])) {
		$id=mysqli_real_escape_string($c,$_POST['id']);
		$newprofil=$_FILES['newprofil']['name'];
		$newprofilserver="profil/".$newprofil;
		$tmpnewprofil=$_FILES['newprofil']['tmp_name'];
		$act=explode('.', $_POST['img']);
		$name=sha1(md5($id));

				$file_ext=strrchr($newprofil, '.');
				$link="profil/".$name.$file_ext;
				$allowed_ext=[".png",'.jpg','.PNG','.JPG','.JPG','.gif','.GIF','.jpeg','.JPEG','.webp','.WEBP'];
		if (in_array($file_ext,$allowed_ext)) {
			if (move_uploaded_file($tmpnewprofil,'./profil/'.$newprofil)) {
			$query=mysqli_query($c,"UPDATE users SET profil='$link' WHERE id='$id'");
			if ($query) {
				if ($_POST['img'] != 'profil/user.jpg') {
					$u=unlink('./'.$_POST['img']);
					rename('./profil/'.$newprofil,'./profil/'.$name.$file_ext);
				}
				echo "ok";
			}
		}
		} else {
			echo "The Extension Of Your File Is not Allowed";
		}
		
	} else {
		echo "Please contact the developper";
	}
	
?>