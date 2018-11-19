<?php
	session_start();  //start session
	require_once "../../db/db.php";  //connect database

	//get current user
	$user_email = $_SESSION['user_login'];
    $get_user = "SELECT * FROM users WHERE email='$user_email'";
    $user = mysqli_fetch_array($conn->query($get_user));
    $user_id = $user['id'];

    if (isset($_POST['post_text'])) {
    	$post_text = $_POST['post_text'];
    	if (empty($_POST['post_text'])) return false;

    	$post_text = htmlspecialchars(addslashes($post_text));
    	$post_date = date('j/m/Y h:i A');

    	$push_post_query = "INSERT INTO user_posts (`user_id`, `post_text`, `post_date`) VALUES ('$user_id', '$post_text', '$post_date')";

    	if (!$conn->query($push_post_query)) die('Ошибка при добавлении записи <a href="../../index.php">Попробуйте еще раз.</a>');
    }
?>