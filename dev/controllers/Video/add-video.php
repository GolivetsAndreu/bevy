<?php
	session_start();

	require_once "../../db/db.php";
    $user_email = $_SESSION['user_login'];
    $get_user = "SELECT * FROM users WHERE email='$user_email'";
    $user = mysqli_fetch_array($conn->query($get_user));
    $user_id = $user['id'];

    if (isset($_POST['upload_video_sub'])) {
    	if (!empty($_FILES['video']['name'])) {
    		if (!empty($_FILES['video']['error'])) die('Ошибка загрузки видео. <a href="../../videos.php">Попробуйте еще раз.</a>');
    		
    		#if user picture has size more tham 3MB
			//if ($_FILES['video']['size'] > 200 * 1024 * 1024) die('Похоже вы загружаете слижком большое по размеру видео. <a href="../../videos.php">Попробуйте выбрать другой файл.</a>');

			$original_file_name = $_FILES['video']['name'];  //user file name
	    	$file_tmp = $_FILES['video']['tmp_name'];  //user photo
			$extension = pathinfo($original_file_name, PATHINFO_EXTENSION);  //get extention of photo
			$file_name = md5(uniqid(rand(),1)) . '.' . $extension;  //generate new name 
			
			//if user dont have own media folder
			if (empty($user['user_folder'])) {
				$user_folder = 'user_' . md5(uniqid(rand(), 1));  //generate unique name for users folder
				mkdir('../../users-media/' . $user_folder);  //create necessary folders
				mkdir('../../users-media/' . $user_folder . '/videos');
				$path = '../../users-media/' . $user_folder . '/videos/';  //generate path
				$set_users_folder = "UPDATE users SET user_folder='$user_folder' WHERE id='$user_id'";
				mysqli_query($conn, $set_users_folder) or die(mysqli_error($conn));
			} else { 
				//if user already have media folder
				$user_folder = $user['user_folder'];
				if (!file_exists('../../users-media/' . $user_folder . '/videos'))
					mkdir('../../users-media/' . $user_folder . '/videos');
				$path = '../../users-media/' . $user_folder . '/videos/'; 
			}

			if (move_uploaded_file($file_tmp, $path . $file_name)) {
				$upload_video = "INSERT INTO videos (user_id, user_video) VALUES ('$user_id', '$file_name')";
				mysqli_query($conn, $upload_video) or die(mysqli_error($conn));
				header('Location: /dev/videos.php');
			} else { die('Ошибка загрузки видео. <a href="../../videos.php">Попробуйте еще раз.</a>'); }
    	}
    } else { die('Ошибка загрузки видео3. <a href="../../videos.php">Попробуйте еще раз.</a>'); }
?>