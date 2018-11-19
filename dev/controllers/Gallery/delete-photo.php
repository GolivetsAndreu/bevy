<?php
	session_start(); //start session
	require_once "../../db/db.php";  //connect db

    //get current user
    $user_email = $_SESSION['user_login'];
    $get_user = "SELECT * FROM users WHERE email='$user_email'";
    $user = mysqli_fetch_array($conn->query($get_user));
    $user_id = $user['id'];
    $users_folder = $user['user_folder'];  //get own user media folder

    if (isset($_POST['del_photo'])) {
        if (isset($_POST['index']) and isset($_POST['photo'])) {
            //scan users media directory
            $user_pictures = scandir('../../users-media/' . $users_folder . '/images/', 1);
            $index = $_POST['index'];
            $photo = $_POST['photo'];

            //update profile picture query
            $delete_user_pic = "DELETE FROM gallery WHERE id='$index'";

            //delete user picture from media directory 
            if ($conn->query($delete_user_pic)) {
                unlink('../../users-media/' . $users_folder . '/images/' . $photo);
                header('Location: /dev/gallery.php');  
            } else { die('Во время удаления фотографии произошла ошибка <a href="../../gallery.php">Попробуйте снова.</a>'); }
        }
    }
?>