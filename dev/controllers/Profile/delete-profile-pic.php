<?php
	session_start(); //start session
	require_once "../../db/db.php";  //connect db

    //get current user
    $user_email = $_SESSION['user_login'];
    $get_user = "SELECT * FROM users WHERE email='$user_email'";
    $user = mysqli_fetch_array($conn->query($get_user));
    $user_id = $user['id'];
    $users_folder = $user['user_folder'];  //get own user media folder

    //scan users media directory
    $profile_pictures = scandir('../../users-media/' . $users_folder . '/images/profile-images/', 1);

    //remember users previous profile picture
    $user_prev_profile_pic = $user['prev_profile_pic'];

    //get new previous user picture which will be set after deleting current picture
    if (count($profile_pictures) != 3) {
        for ($i = 0; $i < count($profile_pictures) - 2; $i++) {
            if ($profile_pictures[$i] != $user['profile_pic'] and $profile_pictures[$i] != $user['prev_profile_pic']) {
                $cur_prev_profile_pic = $profile_pictures[$i];
                break;
            }
        }
    } else { $cur_prev_profile_pic = NULL; }   //if we have last profile picture

    //update profile picture query
    $delete_profile_pic = "UPDATE users SET profile_pic='$user_prev_profile_pic', prev_profile_pic='$cur_prev_profile_pic' WHERE id='$user_id'";

    //delete user picture from media directory 
    if ($conn->query($delete_profile_pic)) {
    	unlink('../../users-media/' . $users_folder . '/images/profile-images/' . $user['profile_pic']);
		header('Location: /dev/profile-settings.php');  
    } else { die('Во время удаления фотографии профиля произошла ошибка <a href="../../settings.php">Попробуйте снова.</a>'); }
?>