<?php
	require_once "../../db/db.php";

	if (isset($_POST['reg'])) {
		if (isset($_POST['name'])) $user_name = $_POST['name']; else unset($user_name);
		if (isset($_POST['surname'])) $user_surname = $_POST['surname']; else unset($user_surname);
		if (isset($_POST['email'])) $user_email = $_POST['email']; else unset($user_email);
		if (isset($_POST['password'])) $user_password = $_POST['password']; else unset($user_password);

		if (empty($user_name) or empty($user_surname) or empty($user_email) or empty($user_password) or empty($_POST['repeat_password'])) die('Введите ВСЕ данные для регистрации. <a href="register.php">Назад</a>');
		
		$user_name = htmlspecialchars($user_name);  //converting special characters to HTML entities
    	$user_surname = htmlspecialchars($user_surname);
    	$user_password = md5($user_password);  //encrypt password

    	$check_email = "SELECT * FROM users WHERE email='$user_email'";
    	$check_email_result = $conn->query($check_email);

    	if ($check_email_result->num_rows > 0) {
			die ("Пользователь с таким электронным адресом уже зарегистрирован " . " <a href=\"../../register.php\">Назад</a>");
    	} else {
   //  		$fromEmail = 'communitybroome@gmail.com';
   //  		$virify_code = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
    		
			// if (mail($user_email, 'Подтверждение регистрации на BROOME.', $virify_code, "Content-type:text/plain; charset = utf-8\r\nПолучено от: $fromEmail")) {
			// 	header('Location: /dev/verify.php');
			// } else {
			// 	die ("Произошла ошибка во время регистрации " . $conn->error . " <a href=\"../../register.php\">Назад</a>");
			// }


			$register_user = "INSERT INTO users (`name`, `surname`, `email`, `password`, `created_at`) VALUES ('$user_name', '$user_surname', '$user_email', '$user_password', now())";
			if ($conn->query($register_user) == TRUE) { //if data inserted successfully
				session_start();
				$_SESSION['user_login'] = $user_email;
		    	header('Location: /dev/index.php');  //jump to user home page
		    } else {
		 	   die ("Произошла ошибка во время регистрации " . $conn->error . " <a href=\"../../register.php\">Назад</a>");
		    }
    	}
	}
?>