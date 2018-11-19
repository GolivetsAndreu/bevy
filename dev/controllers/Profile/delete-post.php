<?php
	require_once "../../db/db.php";  //connect database

    if (isset($_POST['post_id'])) {
    	$post_id = $_POST['post_id'];
    	$delete_post = "DELETE FROM user_posts WHERE id='$post_id'";  //query to delete post

    	if (!$conn->query($delete_post)) die('Ошибка при удалении поста <a href="../../index.php">Попробуйте снова.</a>');
    }
?>