<?php
    session_start();
	require_once "controllers/index/indexController.php";
	require "db/db.php";
	if (!isset($_SESSION['user_login'])) {
		header('Location: login.php');
	} 
	else if(!isset($_GET['user'])) {
		$user_email = $_SESSION['user_login'];
		$get_user = "SELECT * FROM users WHERE email='$user_email'";
		$user = mysqli_fetch_array($conn->query($get_user));
		$user_id = $user['id'];

        $get_gallery = "SELECT * FROM gallery WHERE user_id='$user_id' ORDER BY id DESC LIMIT 4" ;
        $photos = $conn->query($get_gallery);
	}
	else {
		$user_id = $_GET['user'];
		$get_user = "SELECT * FROM users WHERE id='$user_id'";
		$user = mysqli_fetch_array($conn->query($get_user));
		if(empty($user)){
			echo'Такого пользователя не существует!<a href="index.php">На главную</a>'; 
			exit;
		}
	}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <title><?php echo $user['name'] . ' ' . $user['surname']; ?></title>
    <meta name="description" content="Social">
    <meta name="keywords" content="social">
    <link rel="shortcut icon" href="img/common/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="libs/normalize/normalize.css"> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="libs/bootstrap/bootstrap.css">
    <!-- Styles CSS -->
    <link rel="stylesheet" href="css/Profile-Main/profile-main.css"> 
    <!-- Media Queries -->
    <link rel="stylesheet" href="css/Profile-Main/profile-main-media.css"> 
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="profile-wrapper wrapper">
        
        <?php 
			require_once "layouts/nav.php";
			validForFriends();
		?>

        <div class="profile-content content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="profile-content__left">
                            <div class="profile-content__user-photo relative">
                                <img src="<?php if (!empty($user['profile_pic']) and !empty($user['user_folder'])) echo 'users-media/' . $user['user_folder'] . '/images/profile-images/' . $user['profile_pic']; else echo 'img/Profile-Main/profile_default.jpg'; ?>" alt="<?php echo $user['name'] . ' ' . $user['surname']; ?>" title="<?php echo $user['name'] . ' ' . $user['surname']; ?>" class="img-responsive">
                            </div>
                            <div class="profile-content__user-data">
                                <div class="profile-content__user-name">
                                    <h2><?php echo $user['name']; ?></h2>
                                    <h2><?php echo $user['surname']; ?></h2>
                                </div>
                                <div class="profile-content__user-data">
                                    <ul>
                                        <li class="profile-content__user-data-item">
                                            <?php 
                                                if (!empty($user['birth_day']) and !empty($user['birth_month']) and !empty($user['birth_year']))
                                                    echo $user['birth_day'] . '/' . $user['birth_month'] . '/' . $user['birth_year']; 
                                            ?>
                                        </li>
                                        <li class="profile-content__user-data-item">
                                            <?php 
                                                echo $user['country']; 
                                            ?>
                                        </li>
                                        <li class="profile-content__user-data-item">
                                            <?php 
                                                echo $user['city']; 
                                            ?>
                                        </li>
                                        <li class="profile-content__user-data-item">
                                            <?php 
                                                if ($user['public_email'] === '1') echo $user['email']; 
                                            ?>
                                        </li>
                                        <li class="profile-content__user-data-item">
                                            <?php 
                                                if ($user['public_phone'] === '1') echo $user['phone']; 
                                            ?>
                                        </li>
                                        <li class="profile-content__user-data-item">
                                            <a target="_blank" href="<?php echo $user['web_site']; ?>"><?php echo $user['web_site']; ?></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="profile-content__right">
                            <div class="profile-content__right-media">
                                <!-- <div class="profile-content__media-block">
                                    <div class="profile-content__media-block-heading">
                                        <a href="#">
                                            <i class="fa fa-music"></i>
                                            <span>Моя музыка</span>
                                        </a>
                                    </div>
                                    <div class="profile-content__media-block-content">
                                        <div class="profile-content__media-block-inner d-flex justify-content-around align-items-center">
                                            <div class="profile-content__media-block-item">
                                                <i class="fa fa-play"></i> <span>Bring Me The Horizon - Mantra</span>
                                            </div>
                                            <div class="profile-content__media-block-item">
                                                <i class="fa fa-play"></i> Bring Me The Horizon - Mantra
                                            </div>
                                            <div class="profile-content__media-block-item">
                                                <i class="fa fa-play"></i> Bring Me The Horizon - Mantra
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile-content__media-block-footer text-center">
                                        <a href="#">Показать ещё</a>
                                    </div>
                                </div> -->
    
                                <?php if ($photos->num_rows > 0) { ?>

                                <div class="profile-content__media-block">
                                    <div class="profile-content__media-block-heading">
                                        <a href="gallery.php">
                                            <i class="fa fa-camera"></i>
                                            <span>Моя галерея</span>
                                        </a>
                                    </div>
                                    <div class="profile-content__media-block-content">
                                        <div class="profile-content__media-block-inner profile-content__gallery-inner d-flex justify-content-around align-items-center">
                                            
                                            <?php while ($photo = mysqli_fetch_array($photos)) { ?>

                                            <div class="profile-content__media-block-item profile-content__gallary-item" style="background: url(<?php echo 'users-media/' . $user['user_folder'] . '/images/' . $photo['user_photo']; ?>) no-repeat center top / cover;"></div>
                                            
                                            <?php } ?>

                                        </div>
                                    </div>
                                    <div class="profile-content__media-block-footer text-center">
                                        <a href="gallery.php">Показать ещё</a>
                                    </div>
                                </div>
                                
                                <?php } ?>

                            </div>
                            <div class="new-post d-flex justify-content-between align-items-center">
                                <div class="new-post-left d-flex align-items-center">
                                    <a class="profile-prew" href="#" style="background: url(<?php if (!empty($user['profile_pic']) and !empty($user['user_folder'])) echo 'users-media/' . $user['user_folder'] . '/images/profile-images/' . $user['profile_pic']; else echo 'img/Profile-Main/profile_default.jpg'; ?>) no-repeat center top / cover;"></a>
                                    <textarea id="post_text" class="textarea" name="post_text" placeholder="Добавить запись"></textarea>
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
                                                <div class="post-date">23 окт. 2018г. 07:31</div>
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
                                            Привет всем!
                                        </div>
                                        <div class="post-attachment">
                                           
                                        </div>
                                        <div class="post-comments">
                                            <div class="post-comment">
                                                <div class="post-info-left d-flex align-items-center">
                                                    <a class="profile-prew" href="#" style="background: url(img/Profile-Main/comment-profile.png) no-repeat center top / cover;"></a>
                                                    <div class="post-info">
                                                        <div class="post-author"><a href="#">Ichigo Kurosaki</a></div>
                                                        <div class="post-date">23 окт. 2018г. 10:13</div>
                                                    </div> 
                                                </div>
                                                <div class="post-comment-text">
                                                    Hi there!
                                                </div>
                                            </div>
                                            <div class="post-edit-comment">
                                                <span>Ответить</span>
                                                <span>Удалить</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post-add-comment new-post d-flex justify-content-between align-items-center">
                                        <div class="new-post-left d-flex align-items-center">
                                            <a class="profile-prew" href="#" style="background: url(img/Profile-Main/profile-fullsize.jpg) no-repeat center top / cover;"></a>
                                            <textarea class="textarea" placeholder="Добавить комментарий"></textarea>
                                        </div>
                                        <div class="post-add-comment-media new-post-right d-flex align-items-center justify-content-between">
                                            <button class="new-post-btn">Добавить</button>
                                            <i class="fa fa-heart like" id="like"></i>
                                            <i class="fa fa-share share" id="share"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="post">
                                    <div class="post-heading d-flex align-items-center justify-content-between">
                                        <div class="post-info-left d-flex align-items-center">
                                            <a class="profile-prew" href="#" style="background: url(img/Profile-Main/profile-fullsize.jpg) no-repeat center top / cover;"></a>
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
                                            </div>
                                            <div class="post-edit-comment">
                                                <span>Ответить</span>
                                                <span>Удалить</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post-add-comment new-post d-flex justify-content-between align-items-center">
                                        <div class="new-post-left d-flex align-items-center">
                                            <a class="profile-prew" href="#" style="background: url(img/Profile-Main/profile-fullsize.jpg) no-repeat center top / cover;"></a>
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
<script src="js/profile-main/profile-main.js" async></script>
<!-- Add post js -->
<script src="js/header.js"></script>
<!-- Header js -->
<script src="js/add-post.js"></script>
<!-- Post js -->
<script src="js/post.js"></script>
</body>
</html>
