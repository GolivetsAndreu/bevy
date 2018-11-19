<?php
	session_start();
	require_once "../../db/db.php";

    $user_email = $_SESSION['user_login'];
    $get_user = "SELECT * FROM users WHERE email='$user_email'";
    $user = mysqli_fetch_array($conn->query($get_user));
    $user_id = $user['id'];

    if (isset($_POST['update_pass'])) {
    	if (isset($_POST['cur_pass'])) $cur_pass = $_POST['cur_pass']; else unset($cur_pass);
    	if (isset($_POST['new_pass'])) $new_pass = $_POST['new_pass']; else unset($new_pass);
    	if (isset($_POST['repeat_new_pass'])) $repeat_new_pass = $_POST['repeat_new_pass']; else unset($repeat_new_pass);

    	if (empty($cur_pass) or empty($new_pass) or empty($repeat_new_pass)) die('Для обновление пароля заполните пожалуйста все поля <a href="../../settings.php">Назад</a>');
    	
    	$current_user_password = $user['password'];

    	$cur_pass = htmlspecialchars($cur_pass);
    	$new_pass = htmlspecialchars($new_pass);
    	$repeat_new_pass = htmlspecialchars($repeat_new_pass);
    	$cur_pass = md5($cur_pass);

    	if ($cur_pass !== $current_user_password) die('Вы ввели не правильный текущий пароль <a href="../../settings.php">Назад</a>');
    	if ($new_pass !== $repeat_new_pass) die('Пожалуйста, корректно введите новый пароль еще раз <a href="../../settings.php">Назад</a>');

    	$new_pass = md5($new_pass);

    	$update_user_password = "UPDATE users SET password='$new_pass' WHERE id = '$user_id'";

    	if ($conn->query($update_user_password)) header('Location: /dev/password-update-success.php');
    	else die('Ошибка при изменении пароля <a href="../../settings.php">Попробуйте еще раз</a>');
    }
?>