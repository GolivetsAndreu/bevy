<?php
	session_start();

	require_once "../../db/db.php";
    $user_email = $_SESSION['user_login'];
    $get_user = "SELECT * FROM users WHERE email='$user_email'";
    $user = mysqli_fetch_array($conn->query($get_user));
    $user_id = $user['id'];

    if (isset($_POST['upload_song_sub'])) {
    	if (isset($_POST['song_name'])) $song_name = $_POST['song_name']; else unset($song_name);
    	if (isset($_POST['song_artist'])) $song_artist = $_POST['song_artist']; else unset($song_artist);

    	if (!empty($_FILES['filename']['name'])) {
    		if (!empty($_FILES['filename']['error'])) die('Ошибка загрузки аудиозаписи. <a href="../../music.php">Попробуйте еще раз.</a>');
    		
	    	$file_tmp = $_FILES['filename']['tmp_name'];  //user song
			$file_name = md5(uniqid(rand(), 1)) . '.mp3';  //generate new name 
			
			//if user dont have own media folder
			if (empty($user['user_folder'])) {
				$user_folder = 'user_' . md5(uniqid(rand(), 1));  //generate unique name for users folder
				mkdir('../../users-media/' . $user_folder);  //create necessary folders
				mkdir('../../users-media/' . $user_folder . '/music');
				$path = '../../users-media/' . $user_folder . '/music/';  //generate path
				$set_users_folder = "INSERT INTO users (user_id, user_folder) VALUES ('$user_id', '$user_folder')";
				mysqli_query($conn, $set_users_folder) or die(mysqli_error($conn));
			} else { 
				//if user already have media folder
				$user_folder = $user['user_folder'];
				$path = '../../users-media/' . $user_folder . '/music/'; 
			}

			$route = $path . $file_name;  //path to the song on server

			if (move_uploaded_file($file_tmp, $path . $file_name)) {
				$upload_song = "INSERT INTO music (user_id, rout, author, name) VALUES ('$user_id', '$route', '$song_artist', '$song_name')";
				mysqli_query($conn, $upload_song) or die(mysqli_error($conn));
				header('Location: /dev/music.php');
			} else { die('Ошибка загрузки аудиозаписи. <a href="../../music.php">Попробуйте еще раз.</a>'); }
    	}
    } else { die('Ошибка загрузки аудиозаписи. <a href="../../music.php">Попробуйте еще раз.</a>'); }
?>