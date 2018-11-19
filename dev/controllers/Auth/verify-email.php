<?php
	require_once "../../db/db.php";
	require_once "register-user.php";

	if (isset($_POST['verify_email_send'])) {
		if (isset($_POST['verify_email'])) $users_code = $_POST['verify_email']; else unset($users_code);
		if (empty($users_code)) die('Вы не ввели код подтверждения <a href=\"verify-email.php\">Назад</a>');

		if ($virify_code === $users_code) {
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