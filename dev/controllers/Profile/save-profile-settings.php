<?php
	session_start();  //start session
	require_once "../../db/db.php";  //connect database

	//get current user
	$user_email = $_SESSION['user_login'];
    $get_user = "SELECT * FROM users WHERE email='$user_email'";
    $user = mysqli_fetch_array($conn->query($get_user));
    $user_id = $user['id'];

	if (isset($_POST['save_profile_setting'])) {
		
		#name and surname
		if (isset($_POST['name'])) $user_name = $_POST['name']; else unset($user_name);
		if (isset($_POST['surname'])) $user_surname = $_POST['surname']; else unset($user_surname);
		
		#users birthday
		if (isset($_POST['day'])) $user_day = $_POST['day']; else unset($user_day);
		if (isset($_POST['month'])) $user_month = $_POST['month']; else unset($user_month);
		if (isset($_POST['year'])) $user_year = $_POST['year']; else unset($user_year);
		
		#web-site
		if (isset($_POST['web_site'])) $user_web_site = $_POST['web_site']; else unset($user_web_site);
		
		#users phone
		if (isset($_POST['phone'])) $user_phone = $_POST['phone']; else unset($user_phone);
		
		#users email
		if (isset($_POST['email'])) $user_email = $_POST['email']; else unset($user_email);
		
		#users public phone/email options
		if (isset($_POST['public_phone'])) $user_public_phone = $_POST['public_phone']; else unset($user_public_phone);
		if (isset($_POST['public_email'])) $user_public_email = $_POST['public_email']; else unset($user_public_email);

		#user name and surname must be filled anyway
		if (empty($user_name) or empty($user_surname) or empty($user_email)) die('Поля: Имя, Фамилия и Почта должны быть заполнены. <a href="../../profile-settings.php">Назад</a>');
		
		$user_name = htmlspecialchars($user_name);  //converting special characters to HTML entities
    	$user_surname = htmlspecialchars($user_surname);

    	#checking for email matches
    	$check_email = "SELECT * FROM users WHERE email='$user_email'";
    	$check_email_result = $conn->query($check_email); 

		#if some user already have this email adress
    	if ($check_email_result->num_rows > 1) {
			die ('Пользователь с таким электронным адресом уже зарегистрирован <a href="../../profile-settings.php">Попробуйте выбрать другой файл.</a>');
    	} else {
    		#upload user profile picture
			if (!empty($_FILES['user_img']['tmp_name'])) {
				#if some error occured during uploading picture
				if (!empty($_FILES['user_img']['error'])) die('Ошибка загрузки фотографии. <a href="../../profile-settings.php">Попробуйте выбрать другой файл.</a>');

				#if user picture has size more tham 3MB
				if ($_FILES['user_img']['size'] > 3 * 1024 * 1024) die('Похоже вы загружаете слижком большую по размеру фотографию. <a href="../../profile-settings.php">Попробуйте выбрать другой файл.</a>');
				
				switch ($_FILES['user_img']['type']) {
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
						die('Вы загружаете файл с недопустимым форматом. <a href="../../profile-settings.php">Попробуйте выбрать другой файл.</a>');
						break;
				}

				$original_file_name = $_FILES['user_img']['name'];  //user file name
		    	$file_tmp = $_FILES['user_img']['tmp_name'];  //user photo
				$extension = pathinfo($original_file_name, PATHINFO_EXTENSION);  //get extention of photo
				$file_name = md5(uniqid(rand(),1)) . '.' . $extension;  //generate new name 

				//if user dont have own media folder
				if (empty($user['user_folder'])) {
					$user_folder = 'user_' . md5(uniqid(rand(),1));  //generate name for users folder
					mkdir('../../users-media/' . $user_folder);  //create necessary folders
					mkdir('../../users-media/' . $user_folder . '/images');
					mkdir('../../users-media/' . $user_folder . '/images/profile-images');
					$path = '../../users-media/' . $user_folder . '/images/profile-images/';  //generate path
				} else { 
					//if user already have media folder
					$user_folder = $user['user_folder'];
					if (!file_exists('../../users-media/' . $user_folder . '/images/profile-images'))
						mkdir('../../users-media/' . $user_folder . '/images/profile-images');
					$path = '../../users-media/' . $user_folder . '/images/profile-images/'; 
				}

				if (!empty($user['profile_pic'])) {
					$prev_profile_pic = $user['profile_pic'];  //remember user previous profile pic
				} else { $prev_profile_pic = NULL; }  //if user dont have profile pic yet

				//upload photo to server
				if (!move_uploaded_file($file_tmp, $path . $file_name)) die('Ошибка при загрузке фотографии на сервер. <a href="../../profile-settings.php">Попробуйте еще раз.</a>');
			} else { 
				//if user dont upload any profile pictures
				$file_name = $user['profile_pic']; 
				$user_folder = $user['user_folder'];
				$prev_profile_pic = $user['prev_profile_pic'];
			}

		    //query for update user data
			$update_user_settings = "UPDATE users SET name='$user_name', surname='$user_surname', profile_pic='$file_name', prev_profile_pic='$prev_profile_pic', birth_day='$user_day', birth_month='$user_month', birth_year='$user_year', web_site='$user_web_site', phone='$user_phone', email='$user_email', public_phone='$user_public_phone', public_email='$user_public_email', user_folder='$user_folder' WHERE id = '$user_id'";
    		
    		if ($conn->query($update_user_settings)) { //if data inserted successfully
				header('Location: /dev/profile-settings.php');  //jump to user home page
		    } else { die ("Произошла ошибка во время обновления пользовательских данных " . $conn->error . " <a href=\"../../profile-settings.php\">Назад</a>"); }
    	}
	}
?>