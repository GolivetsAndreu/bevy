<?php
	require_once "../../db/db.php";

	session_start();  

	if (isset($_POST['log'])) {
		//if login exists create variable with user login value
	    if (isset($_POST['email'])) $user_email = $_POST['email']; else unset($user_email); //else destroy login variable
	    if (isset($_POST['password'])) $user_password = $_POST['password']; else unset($user_password);
	    //if user dont fill login or password input
	    if (empty($user_email) or empty($user_password)) die('Введите ВСЕ данные для входа. <a href="login.php">Назад</a>');

	    $user_email = htmlspecialchars($user_email);  //converting special characters to HTML entities
    	$user_password = htmlspecialchars($user_password);
    	$user_password = md5($user_password);//encrypt password
    	//select all users from db
     	$sql = "SELECT * FROM users WHERE email='$user_email' AND password='$user_password'";
		$result = $conn->query($sql);
		//if we have more than 0 users with similar data
        if ($result->num_rows > 0) {
			$_SESSION['user_login'] = $user_email;  //log in successful - start session with this user
	        header('Location: /dev/index.php');
		} else { echo "Данный пользователь еще не зарегистрирован. <a href=\"/dev/login.php\">Попробуйте еще раз</a>"; }
		
    }
?>
