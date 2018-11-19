<?php
    session_start();
    require_once "db/db.php";
    $user_email = $_SESSION['user_login'];
    $get_user = "SELECT * FROM users WHERE email='$user_email'";
    $user = mysqli_fetch_array($conn->query($get_user));
    $user_id = $user['id'];

    $get_user_photos = $conn->query("SELECT * FROM gallery WHERE user_id='$user_id' ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <title>Галерея</title>
    <meta name="description" content="Social">
    <meta name="keywords" content="social">
    <link rel="shortcut icon" href="img/common/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="libs/normalize/normalize.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="libs/bootstrap/bootstrap.css">
    <!-- Styles CSS -->
    <link rel="stylesheet" href="css/Gallery/gallery.css">
    <!-- Media Queries -->
    <link rel="stylesheet" href="css/Gallery/gallery-media.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body id="body">
    <div class="upload-photo d-none fixed relative" id="upload_photo">
        <div class="upload-photo__close absolute">
            <i class="fa fa-times" id="upload_photo_close"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="upload-photo__wrapper">
                        <div class="upload-photo__heading text-center">
                            <h3>Загрузка фотографии</h3>
                        </div>
                        <form action="controllers/Gallery/add-photo.php" method="POST" enctype="multipart/form-data">
                            <div class="upload-photo__content">
                                <div class="upload-photo__content-block">
                                    <label>Выберите фотографию: </label>
                                    <input required type="file" name="photo">
                                </div>
                                <div class="upload-photo__footer text-center">
                                    <button type="submit" name="upload_photo_sub">Загрузить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="pop-up" class="pop-up d-none justify-content-center align-items-center relative">
        <div class="closePopUp-wrapper absolute">
            <i class="fa fa-times closePopUp"></i>
        </div>
        <div class="pop-up__wrapper">
            <div class="pop-up__image-wrapper">
                <img class="pop-Image" src="img/gallery/img.jpg"></img>
            </div>
            <form action="controllers/Gallery/delete-photo.php" method="POST" class="d-flex justify-content-end">
                <input type="hidden" name="index" id="photo_index">
                <input type="hidden" name="photo" id="photo_name">
                <button class="delete-photo" name="del_photo">Удалить фото</button>
            </form>
            <div class="post-comments commentPad">
                <!-- <div class="post-comment">
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
                </div> -->
            </div>
            <div class="post-add-comment new-post d-flex justify-content-between align-items-center">
                <div class="new-post-left d-flex align-items-center">
                    <a class="profile-prew" href="#" style="background: url(<?php if (!empty($user['profile_pic']) and !empty($user['user_folder'])) echo 'users-media/' . $user['user_folder'] . '/images/profile-images/' . $user['profile_pic']; else echo 'img/Profile-Main/profile_default.jpg'; ?>) no-repeat center top / cover;"></a>
                    <textarea class="textarea" placeholder="Добавить комментарий"></textarea>
                </div>
                <div class="post-add-comment-media new-post-right d-flex align-items-center justify-content-between">
                    <button class="new-post-btn">Добавить</button>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper">
        
        <?php require_once "layouts/nav.php"; ?>

        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="flex-button">
                            <button id="add_photo" class="buttonAdd">Добавить</button>
                        </div>
                        <div class="flex-container">
                            <?php while($photo = mysqli_fetch_array($get_user_photos)) { ?>
                            <div class="ImageContainer" data-photo="<?php echo $photo['user_photo']; ?>" data-index="<?php echo $photo['id']; ?>" data-path="<?php echo 'users-media/' . $user['user_folder'] . '/images/' . $photo['user_photo']; ?>" style="background: url(<?php echo 'users-media/' . $user['user_folder'] . '/images/' . $photo['user_photo']; ?>) no-repeat center top / cover;"></div>
                            <?php } ?>
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
<script src="js/gallery/gallery.js"></script>
<!-- Header js -->
<script src="js/header.js"></script>
<!-- Post js -->
<script src="js/post.js"></script>
<!-- Add post js -->
<script src="js/add-post.js"></script>
</body>
</html>