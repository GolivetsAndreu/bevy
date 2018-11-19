<?php
	session_start();  //start the session
	require_once "../../db/db.php";  //include database

    //get current user
    $user_email = $_SESSION['user_login']; 
    $get_user = "SELECT * FROM users WHERE email='$user_email'";
    $user = mysqli_fetch_array($conn->query($get_user));
    $user_id = $user['id'];
    $user_folder = $user['user_folder'];

    //query to delete profile

    $delete_profile = "DELETE FROM users WHERE id='$user_id'";

    //queries to delete all users data from db

    $delete_user_posts = "DELETE FROM user_posts WHERE user_id='$user_id'";
    $delete_user_music = "DELETE FROM music WHERE user_id='$user_id'";
    $delete_user_messages = "DELETE FROM messages WHERE userFrom='$user_id'";
    $delete_user_friends = "DELETE FROM friends WHERE idUser='$user_id'";
    $delete_user_gallery = "DELETE FROM gallery WHERE user_id='$user_id'";

    if ($conn->query($delete_profile) and $conn->query($delete_user_posts) and
        $conn->query($delete_user_music) and $conn->query($delete_user_messages) and
        $conn->query($delete_user_friends) and $conn->query($delete_user_gallery))
    {
    	rmRec('../../users-media/' . $user_folder);  //recoursive deleting of user media directory
    	session_destroy();  //stop the session
		header('Location: /dev/index.php');    //jump to the root
    } else { die('Во время удаления профиля произошла ошибка <a href="../../settings.php">Попробуйте снова.</a>'); }

    function rmRec($path) {
        if (is_file($path)) return unlink($path);
        if (is_dir($path)) {
            foreach (scandir($path) as $p) 
                if (($p != '.') && ($p != '..')) rmRec($path . DIRECTORY_SEPARATOR . $p);
            return rmdir($path); 
        }
        return false;
    }
?>