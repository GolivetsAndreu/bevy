<?php
	session_start();
	require_once "db/db.php";
    $user_email = $_SESSION['user_login'];
    $get_user = "SELECT * FROM users WHERE email='$user_email'";
    $user = mysqli_fetch_array($conn->query($get_user));
    $user_id = $user['id'];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <title>Новости</title>
    <meta name="description" content="Social">
    <meta name="keywords" content="social">
    <link rel="shortcut icon" href="img/common/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="libs/normalize/normalize.css"> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="libs/bootstrap/bootstrap.css">
    <!-- Styles CSS -->
    <link rel="stylesheet" href="css/News/news-main.css"> 
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="wrapper">
        
		<?php require_once "layouts/nav.php"; ?>

        <div class="content">
            <div class="container">
            	<div class ="row">
            		<div class="col">
            			<div class="new-post d-flex justify-content-between align-items-center">
                           <div class="new-post-left d-flex align-items-center">
                              <a class="profile-prew" href="#" style="background: url(<?php if (!empty($user['profile_pic']) and !empty($user['user_folder'])) echo 'users-media/' . $user['user_folder'] . '/images/profile-images/' . $user['profile_pic']; else echo 'img/Profile-Main/profile_default.jpg'; ?>) no-repeat center top / cover;"></a>
                              <textarea id="post_text" name="post_text" class="textarea" placeholder="Добавить запись"></textarea>
                            </div>
                           <div class="new-post-right d-flex align-items-center justify-content-between">
                              <i class="fa fa-camera"></i>
                              <i class="fa fa-music"></i>
                              <button id="add_post" class="new-post-btn">Добавить</button>
                           </div>
                        </div>
                        <div id="posts" class="posts"> 

							

					        <!-- <div class="post">
					        	<div class="post-heading d-flex align-items-center justify-content-between">
					            	<div class="post-info-left d-flex align-items-center">
					                	<a class="profile-prew" href="#" style="background: url(img/Profile-Main/profile-default.jpg) no-repeat center top / cover;"></a>
					                	<div class="post-info">
					                    	<div class="post-author"><a href="#">Иван Иванов</a></div>
					                    	<div class="post-date">19 окт. 2018г. 19:40</div>
					                	</div> 
					            	</div>
					            	<div class="post-info-right">
					                	<div class="post-settings d-flex align-items-center relative">
					                    	<i class="fa fa-ellipsis-h post_edit"></i>
					                    	<div class="post-settings-drop absolute d-none post_edit_drop">
					                        	<a href="#">Редактировать</a>
					                        	<a href="#">Удалить</a>
					                    	</div>
					                	</div>
					            	</div>
					        	</div>
					        	<div class="post-content">
					            	<div class="post-text">
					                	Какой прекрасный день!
					            	</div>
					            	<div class="post-attachment">
					                	<img class="img-responsive" src="img/Profile-Main/IMG_20180624_210459.jpg" alt="PHOTO">
					            	</div>
					            	<div class="post-comments">
					                	<div class="post-comment">
					                    	<div class="post-info-left d-flex align-items-center">
					                        	<a class="profile-prew" href="#" style="background: url(img/Profile-Main/comment-profile.png) no-repeat center top / cover;"></a>
					                        	<div class="post-info">
					                            	<div class="post-author"><a href="#">Ichigo Kurosaki</a></div>
					                            	<div class="post-date">19 окт. 2018г. 19:45</div>
					                        	</div> 
					                    	</div>
					                    	<div class="post-comment-text">
					                        	This is shit real shit!
					                    	</div>
											<div class="post-edit-comment">
						                    	<span>Ответить</span>
						                    	<span>Удалить</span>
						                	</div>
					                	</div>
					            	</div>
					        	</div>
					        	<div class="post-add-comment new-post d-flex justify-content-between align-items-center">
					            	<div class="new-post-left d-flex align-items-center">
					                	<a class="profile-prew" href="#" style="background: url(img/Profile-Main/profile-default.jpg) no-repeat center top / cover;"></a>
					                	<textarea class="textarea" placeholder="Добавить комментарий"></textarea>
					            	</div>
					            	<div class="post-add-comment-media new-post-right d-flex align-items-center justify-content-between">
					                	<button class="new-post-btn">Добавить</button>
					                	<i class="fa fa-heart like" id="like"></i>
					                	<i class="fa fa-share share" id="share"></i>
					            	</div>
					        	</div>
					    	</div> -->

							

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
<!-- Main Js -->
<script src="js/news/news.js"></script>
<!-- Add post js -->
<script src="js/add-post.js"></script>
<!-- Header js -->
<script src="js/header.js"></script>
<!-- Post js -->
<script src="js/post.js"></script>
</body>
</html>