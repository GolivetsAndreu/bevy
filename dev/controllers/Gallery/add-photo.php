<?php
	session_start();

	require_once "../../db/db.php";
    $user_email = $_SESSION['user_login'];
    $get_user = "SELECT * FROM users WHERE email='$user_email'";
    $user = mysqli_fetch_array($conn->query($get_user));
    $user_id = $user['id'];

    if (isset($_POST['upload_photo_sub'])) {
    	if (!empty($_FILES['photo']['name'])) {
    		if (!empty($_FILES['photo']['error'])) die('Ошибка загрузки фотографии. <a href="../../gallery.php">Попробуйте еще раз.</a>');
    		
    		#if user picture has size more tham 3MB
			if ($_FILES['photo']['size'] > 3 * 1024 * 1024) die('Похоже вы загружаете слижком большую по размеру фотографию. <a href="../../gallery.php">Попробуйте выбрать другой файл.</a>');
			
			switch ($_FILES['photo']['type']) {
				#jpg
				case 'image/jpeg':
				case 'image/pjpeg':
					$user_profile_image_type = 'jpeg';
					break;

				#png
				case 'image/png':
				case 'image/x-png':
					$user_profile_image_type = 'png';
					break;

				#gif
				case 'image/gif':
					$user_profile_image_type = 'gif';
					break;
				
				#not supported type of images
				default:
					die('Вы загружаете файл с недопустимым форматом. <a href="../../gallery.php">Попробуйте выбрать другой файл.</a>');
					break;
			}

			$original_file_name = $_FILES['photo']['name'];  //user file name
	    	$file_tmp = $_FILES['photo']['tmp_name'];  //user photo
			$extension = pathinfo($original_file_name, PATHINFO_EXTENSION);  //get extention of photo
			$file_name = md5(uniqid(rand(),1)) . '.' . $extension;  //generate new name 
			
			//if user dont have own media folder
			if (empty($user['user_folder'])) {
				$user_folder = 'user_' . md5(uniqid(rand(), 1));  //generate unique name for users folder
				mkdir('../../users-media/' . $user_folder);  //create necessary folders
				mkdir('../../users-media/' . $user_folder . '/images');
				$path = '../../users-media/' . $user_folder . '/images/';  //generate path
				$set_users_folder = "UPDATE users SET user_folder='$user_folder' WHERE id='$user_id'";
				mysqli_query($conn, $set_users_folder) or die(mysqli_error($conn));
			} else { 
				//if user already have media folder
				$user_folder = $user['user_folder'];
				$path = '../../users-media/' . $user_folder . '/images/'; 
			}

			if (move_uploaded_file($file_tmp, $path . $file_name)) {
				$upload_photo = "INSERT INTO gallery (user_id, user_photo) VALUES ('$user_id', '$file_name')";
				mysqli_query($conn, $upload_photo) or die(mysqli_error($conn));
				header('Location: /dev/gallery.php');
			} else { die('Ошибка загрузки фотографии2. <a href="../../gallery.php">Попробуйте еще раз.</a>'); }
    	}
    } else { die('Ошибка загрузки фотографии3. <a href="../../gallery.php">Попробуйте еще раз.</a>'); }
?>