<?php
	session_start();
	require "db/db.php";
	require_once "controllers/index/indexController.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <title>Сообщения</title>
    <meta name="description" content="Social">
    <meta name="keywords" content="social">
    <link rel="shortcut icon" href="img/common/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="libs/normalize/normalize.css"> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="libs/bootstrap/bootstrap.css">
    <!-- Styles CSS -->
    <link rel="stylesheet" href="css/Friends/friends.css">
    <!-- Media Queries -->
    <link rel="stylesheet" href="css/Friends/friends-media.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="wrapper">

        <?php require_once "layouts/nav.php"; ?>

        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 col-sm-12 m-auto">
                       <div class="friends__wrapper">
                            <div class="search-friends d-flex justify-content-between align-items-center">
                                <input id="searchOnFriendsPage" type="search" placeholder="Найти друзей"></input>
                                <div class="icon-search">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>
                            <div class="list-friends d-flex justify-content-between flex-wrap">
                                <?php returnFriends();?>
                            </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once "layouts/footer.php"; ?>

    </div>
<!-- Jquery -->
<script src="libs/jquery/jquery-3.3.1.min.js"></script>
<!-- Bootstrap -->
<script src="libs/bootstrap/bootstrap.min.js"></script>
<!-- Autoresize -->
<script src="libs/autoresize/autoresize.jquery.js"></script>
<!-- Main -->
<script src="js/profile-main/profile-main.js"></script>
<!-- Add post js -->
<script src="js/add-post.js"></script>
<!-- Header js -->
<script src="js/header.js"></script>
<!-- Post js -->
<script src="js/post.js"></script>
</body>
</html>